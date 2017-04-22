<?php

class Zamowienie extends CI_Controller
{
    private $kategorie='';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
	}

	public function krok_1()
	{
		
		if($this->session->userdata('zalogowany')==TRUE || $this->session->userdata('bez_rejestracji')==TRUE)
		{
            $dane['dostawy']=$this->Model_m->get('dostawa');
			$this->session->set_userdata('krok_1', TRUE);
			$this->load->view('header', $this->kategorie);
			//$this->load->view('przedmioty/category', $this->kategorie);
			//$this->load->view('zamowienie/krok_1');
			$this->load->view('zamowienie/calosc', $dane);
			$this->load->view('footer');
		}
		else
		{
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
			$this->load->view('zamowienie/zdecyduj');
			$this->load->view('footer');
		}
		if($this->session->userdata('krok_zaloguj')!=TRUE)
		{
			header('location: '.base_url()); 
		}
	}

	public function krok_2()
	{
		if($this->session->userdata('krok_1')!=TRUE)
		{
			header('location: '.base_url()); 
		}
		$this->session->set_userdata('krok_2', TRUE);
		$this->form_validation->set_rules('miasto', 'Miasto', 'required');
		$this->form_validation->set_rules('ulica', 'Ulica', 'required');
		$this->form_validation->set_rules('nr_domu', 'Nr domu', 'required');
		$this->form_validation->set_rules('kod_pocztowy', 'Kod pocztowy', 'required');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
			$this->load->view('zamowienie/krok_2');
			$this->load->view('footer'); 
		}
		else
		{		
			$data['miasto']=ucwords($this->input->post('miasto'));
			$data['ulica']=ucwords($this->input->post('ulica'));
			$data['nr_domu']=strtolower($this->input->post('nr_domu'));
			$data['kod_pocztowy']=strtolower($this->input->post('kod_pocztowy'));			
			$this->session->set_userdata($data);
			header('location: '.base_url().'zamowienie/krok-3'); 
		}
	}

	public function krok_3()
	{
		if($this->session->userdata('krok_2')!=TRUE)
		{
			header('location: '.base_url()); 
		}
		if($this->session->userdata('bez_rejestracji')==TRUE)
		{
			$data['dane']=$this->Model_m->pobierzgdzie('id_uzytkownika', $this->session->userdata('id_nowego'), 'uzytkownicy');
			$this->session->set_userdata('krok_3', TRUE);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
			$this->load->view('zamowienie/krok_3', $data);
			$this->load->view('footer');
		}
		else
		{
			$data['dane']=$this->Model_m->pobierzgdzie('id_uzytkownika', $this->session->userdata('id_uzytkownika'), 'uzytkownicy');
			$this->session->set_userdata('krok_3', TRUE);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
			$this->load->view('zamowienie/krok_3', $data);
			$this->load->view('footer');
		}
	}

	public function potwierdzenie()
	{
		if($this->session->userdata('krok_3')!=TRUE)
		{
			header('location: '.base_url()); 
		}

		$data['miasto']=$this->session->userdata('miasto');
		$data['ulica']=$this->session->userdata('ulica');
		$data['nr_domu']=$this->session->userdata('nr_domu');
		$data['kod_pocztowy']=$this->session->userdata('kod_pocztowy');
		$this->Model_m->dodaj('adresy', $data);
		$id_adresu=$this->db->insert_id();
		if($this->session->userdata('bez_rejestracji')==TRUE)
		{
			$zamowienie['id_uzytkownika']=$this->session->userdata('id_nowego');
		}
		else
		{
			$zamowienie['id_uzytkownika']=$this->session->userdata('id_uzytkownika');
		}
		$zamowienie['id_adresu']=$id_adresu;
		$zamowienie['czy_wyslano']=0;
		$zamowienie['czy_zaplacono']=0;
		$zamowienie['cena']=$this->cart->total();
		$zamowienie['data_zamowienia']=date("Y-m-d");
		$this->Model_m->dodaj('zamowienia', $zamowienie);
		$id_zamowienia=$this->db->insert_id();

		$mail['string']='<table>';
		foreach ($this->cart->contents() as $items)
		{
			$zam_tow['id_zamowienia']=$id_zamowienia;
			$zam_tow['id_produktu']=$items['id'];
			$zam_tow['ilosc']=$items['qty'];
			if ($this->cart->has_options($items['rowid']) == TRUE)
			{
				$option='';
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value)
				{
					$option.=$option_name.': '.$option_value.'<br>';
				}
			}
			$zam_tow['komentarz']=$option;

			$mail['string'].='<tr><td>'.$id_zamowienia.'</td><td>'.$items['id'].'</td><td>'.$items['qty'].'</td></tr>';

			$this->Model_m->dodaj('zam_tow', $zam_tow);
		}
		$mail['string'].="</table>";

		$this->cart->destroy();
		$this->session->sess_destroy();
		$this->load->view('emails/email_test', $mail);

		/*
		$this->load->view('header', $this->kategorie);
		$this->load->view('przedmioty/category', $this->kategorie);
		$this->load->view('zamowienie/potwierdzenie');
		$this->load->view('footer');*/

	}

	public function bez_rejestracji()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('imie', 'Imię', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
		$this->form_validation->set_rules('nazwisko', 'Nazwisko', 'required|min_length[2]');
		$this->form_validation->set_rules('regulamin', 'Regulamin', 'required');
		$this->form_validation->set_rules('telefon', 'Telefon', 'min_length[9]');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
		$this->form_validation->set_message('valid_email', 'To nie jest poprawny email');
		$this->form_validation->set_message('matches', 'Hasła nie nie są identyczne');
		if ($this->form_validation->run() == FALSE)
		{
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
			$this->load->view('zamowienie/zdecyduj');
			$this->load->view('footer'); 
		}
		else
		{
			
			$data['nazwisko']=ucwords($this->input->post('nazwisko'));
			$data['imie']=ucwords($this->input->post('imie'));
			$data['email']=strtolower($this->input->post('email'));
			$data['telefon']=$this->input->post('telefon');
			
			$this->Model_m->dodaj('uzytkownicy', $data);
			$this->session->set_userdata('bez_rejestracji', TRUE);
			$this->session->set_userdata('id_nowego', $this->db->insert_id());
			header('location: '.base_url().'zamowienie/krok-1');
		}
	}

	function email_check($str)
	{
		$wynik=$this->Model_m->where('email', $str, 'uzytkownicy');

		if($str=='')
		{
			$this->form_validation->set_message('email_check', 'Podaj email');
			return FALSE;
		}
		if ($wynik==0)
		{
			$this->form_validation->set_message('email_check', 'E-mail %s istnieje juz w bazie danych, wybierz inny :)');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function send_email()
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['smtp_host'] = 'localhost';
		$config['smtp_user'] = 'info@streetwood.pl';
		$config['smtp_pass'] = 'marcinrobiwww';
		$config['mailtype'] = 'html';


		$this->email->initialize($config);
		$this->email->from('info@streetwood.pl', 'Your Name');
		$this->email->to('marcinxd4@gmail.com'); 

		$this->email->subject('Email Test');
		$this->email->message('
			<!DOCTYPE html><html lang="pl"><head><meta charset="utf-8"></head>
			    <body>
			        <h3>Treść wiadomośći:</h3>
			        <p>Tresc</p>
			      <h4>Email od Zenus@o2.pl</h4>
			    </body>
			    </html>
			');	

		$this->email->send();

		echo $this->email->print_debugger();
	}

    public function test()
    {
        if ($this->session->has_userdata('bez_rejestracji'))
            echo $this->session->userdata('miasto');
        else
            echo 'niema';

        echo $this->session->userdata('miasto');
    }
			
}