<?php 

class Koszyk extends CI_Controller
{
    private $kategorie='';
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
	}
	
	public function dodaj()
	{
        if($this->input->post('size'))
            $size=$this->input->post('size');
        else
            $size='n/d';
        $data = array(
               'id'      => $this->input->post('id_produktu'),
               'qty'     => $this->input->post('ilosc'),
               'price'   => $this->input->post('cena'),
               'name'    => $this->input->post('nazwa'),
               'options' => array('Size' => $size)
            );
        //'options' => array('Size' => $this->input->post('size'), 'Color' => 'Red')
		$this->cart->insert($data);
		header('Location: '.$this->input->post('actual_adress'));
	}

	public function wyswietl()
	{
		$this->session->set_userdata('krok_zaloguj', TRUE);
        $this->load->view('header', $this->kategorie);
        $this->load->view('przedmioty/category', $this->kategorie);
		$this->load->view('koszyk/koszyk');
		$this->load->view('footer');
	}

	public function update()
	{

		if ($this->input->post('update_cart'))
		{
			unset($_POST['update_cart']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$info = array(
			   'rowid' => $content['rowid'],
			   'qty'   => $content['qty']
			);

				$this->cart->update($info);

			}
		}
		header('Location: '.base_url().'koszyk/wyswietl/');
		$this->session->set_userdata('updated', TRUE);
	}

	public function remove()
	{
		if ($this->input->post('update_cart'))
		{
			unset($_POST['update_cart']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$info = array(
			   'rowid' => $content['rowid'],
			   'qty'   => $content['qty']
			);

				$this->cart->update($info);

			}
		}
	}

	public function usun($rowid)
	{
		$this->cart->remove($rowid);	
		$this->session->set_userdata('deleted', TRUE);
		header('Location: '.base_url().'koszyk/wyswietl/');
	}

	public function destroy()
	{
		$this->cart->destroy();
		$this->session->set_userdata('destroyed', TRUE);
		header('Location: '.base_url().'koszyk/wyswietl/');
	}

	public function test()
    {
        echo $this->input->post('id_produktu').'<br />';
        echo $this->input->post('ilosc').'<br />';
        echo $this->input->post('cena').'<br />';
        echo $this->input->post('nazwa').'<br />';
        echo $this->input->post('size').'<br />';
    }
			
}