<?php 

class Uzytkownik extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
	}

	public function Index()
	{
		if(($this->session->userdata('zalogowany')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$dane['dane']=$this->Model_m->pobierzgdzie('login', $this->session->userdata('login'), 'uzytkownicy');

		$this->load->view('header');
		$this->load->view('uzytkownik/menu_boczne');
		$this->load->view('uzytkownik/wyswietl_dane', $dane);
		$this->load->view('footer');	 
	}

	public function Rejestracja()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('imie', 'Imię', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
		$this->form_validation->set_rules('haslo', 'Hasło', 'required');
		$this->form_validation->set_rules('haslo2', 'Hasła', 'required|matches[haslo]');
		$this->form_validation->set_rules('nazwisko', 'Nazwisko', 'required|min_length[2]');
		$this->form_validation->set_rules('login', 'Login', 'callback_username_check');
		$this->form_validation->set_rules('regulamin', 'Regulamin', 'required');
		$this->form_validation->set_rules('telefon', 'Telefon', 'min_length[9]');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
		$this->form_validation->set_message('valid_email', 'To nie jest poprawny email');
		$this->form_validation->set_message('matches', 'Hasła nie nie są identyczne');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('uzytkownik/rrejestracja'); 
		}
		else
		{
			
			$data['nazwisko']=ucwords($this->input->post('nazwisko'));
			$data['imie']=ucwords($this->input->post('imie'));
			$data['email']=strtolower($this->input->post('email'));
			$data['telefon']=$this->input->post('telefon');
			$data['login']=strtolower($this->input->post('login'));			
			$data['haslo']=password_hash($this->input->post('haslo'), PASSWORD_DEFAULT);
			$data['typ_konta']='kupiec';
			$data['data_utowrzenia']=time();
			
			$this->Model_m->dodaj('uzytkownicy', $data);
			header('location: '.base_url());
		}
	}

	public function Zaloguj()
	{
		
		if(($this->session->userdata('zalogowany')==TRUE))
		{
			header('location: '.base_url());
				die();
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('haslo', 'Hasło', 'required');
		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('uzytkownik/zaloguj');
		}
		else
		{
			$data['login']=strtolower($this->input->post('login'));			
			$data['haslo']=$this->input->post('haslo');
			
			$odp=$this->Model_m->log($data['login'], $data['haslo'], 'uzytkownicy');
			if($odp==2) //zalogowano
			{
				$id=$this->Model_m->pobierzID($data['login']);
				$newdata = array(                       //dodanie do sesji info o zalogowaniu
                   'login'  => $data['login'],
                   'zalogowany' => TRUE,
                   'id_uzytkownika'=>$id,
			  );

				$this->session->set_userdata($newdata);
				if($this->session->userdata('krok_zaloguj')==TRUE)
				{
					header('location: '.base_url().'zamowienie/krok_1');
				}
				else
				{
					header('location: '.base_url());	
				}

			}
			elseif ($odp==3)
			{
				$dane['komunikat']="Nieprawidlowe haslo";
				$this->load->view('uzytkownik/zaloguj', $dane);
		
			}
			elseif ($odp==0)
			{
				$dane['komunikat']="Nie istnieje użytkownik o takim loginie";
				$this->load->view('uzytkownik/zaloguj', $dane);
			}
			else
			{
				echo "Grubszy bład... ;///";
			}
		}
	}

	public function Modyfikacja()
	{
		if($this->session->userdata('zalogowany')!=FALSE)
		{
			if ($this->session->userdata('zalogowany')==TRUE)
			{
				$this->load->library('form_validation');
				$this->form_validation->set_rules('imie', 'Imię', 'min_length[3]');
				$this->form_validation->set_rules('telefon', 'Hasło');
				$this->form_validation->set_rules('haslo', 'Hasło');
				$this->form_validation->set_rules('haslo2', 'Hasła', 'matches[haslo]');
				$this->form_validation->set_rules('nazwisko', 'Nazwisko', 'min_length[4]');
				$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('header');
					$this->load->view('uzytkownik/menu_boczne');
					$this->load->view('uzytkownik/modyfikacja');
					$this->load->view('footer');
				}
				else
				{
					$stareDane=$this->Model_m->pobierzgdzie('login', $this->session->userdata('login'), 'uzytkownicy');
					foreach($stareDane as $row){
						$stareD['nazwisko']=$row->nazwisko;
						$stareD['imie']=$row->imie;
						$stareD['telefon']=$row->telefon;
					}
					if($this->input->post('nazwisko')!="")
						$dane['nazwisko']=ucwords($this->input->post('nazwisko'));
					else
						$dane['nazwisko']=$stareD['nazwisko'];
					if($this->input->post('imie')!="")
						$dane['imie']=ucwords($this->input->post('imie'));
					else
						$dane['imie']=$stareD['imie'];
					if($this->input->post('telefon')!="")
						$dane['telefon']=$this->input->post('telefon');	
					else
						$dane['telefon']=$stareD['telefon'];

					$this->Model_m->update('uzytkownicy', $dane, 'login', $this->session->userdata('login'));
					//$this->load->view('klient\klient_modyfikacja_sukces_view');
					echo "Zmodyfikowano";
				}

			}
			else
				echo "bład...";
		}
		else
		{
			header('location: '.$url.'zaloguj');
		}
	}

	

	public function wyloguj()
	{
		echo "Wylogowano";
		$this->session->sess_destroy();
		header('location: '.base_url());
	}




	function username_check($str)
	{
		$wynik=$this->Model_m->where('login', $str, 'uzytkownicy');

		if($str=='')
		{
			$this->form_validation->set_message('username_check', 'Podaj login');
			return FALSE;
		}
		if ($wynik==0)
		{
			$this->form_validation->set_message('username_check', 'Login %s istnieje juz w bazie danych, wybierz inny :)');
			return FALSE;
		}
		else
		{
			return TRUE;
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

	public function regulamin()
	{
		$this->load->view('regulamin');
	}

	public function zamowienia()
	{
		$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, u.id_uzytkownika, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika AND u.id_uzytkownika='.$this->session->userdata('id_uzytkownika').' GROUP by z.id_zamowienia');

		$this->load->view('header');
		$this->load->view('uzytkownik/menu_boczne');
		$this->load->view('uzytkownik/zamowienia', $dane);
		$this->load->view('footer');
	} 

	public function szczegoly_zamowienia($id_zamowienia)
	{
		$dane['adres']=$this->Model_m->query('select a.miasto, a.ulica, a.nr_domu, a.kod_pocztowy from adresy a, zamowienia z where a.id_adresu=z.id_adresu and z.id_zamowienia='.$id_zamowienia);
		$dane['uzytkownik']=$this->Model_m->query('select u.imie, u.nazwisko, u.email, u.telefon from uzytkownicy u, zamowienia z WHERE z.id_uzytkownika=u.id_uzytkownika and z.id_zamowienia='.$id_zamowienia);
		$dane['produkt']=$this->Model_m->query('select p.nazwa, p.dlugosc, p.szerokosc, p.cena, t.ilosc FROM produkty p, zamowienia z, zam_tow t WHERE p.id_produktu=t.id_produktu and t.id_zamowienia=z.id_zamowienia and z.id_zamowienia='.$id_zamowienia);
		$dane['id_zamowienia']=$id_zamowienia;
		$dane['zamowienie']=$this->Model_m->query('select z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from zamowienia z where z.id_zamowienia='.$id_zamowienia);

		$this->load->view('header');
		$this->load->view('uzytkownik/menu_boczne');
		$this->load->view('uzytkownik/szczegoly_zamowienia', $dane);
		$this->load->view('footer');
	}


}