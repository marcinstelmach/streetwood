<?php 

class Sklep extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
	}

	public function Index()
	{
		$data['produkty']=$this->Model_m->get('produkty');
		$data['kategorie']=$this->Model_m->get('kategorie');
        $this->load->view('header');
		$this->load->view('sklep/lista', $data);
		$this->load->view('footer');
	}

	public function produkty($nazwa_kategorii)
	{
		$nazwa_kategorii=str_replace('-',' ', $nazwa_kategorii);
		$data['produkty']=$this->Model_m->query('SELECT * FROM produkty WHERE id_kategorii=(SELECT id_kategorii from kategorie WHERE nazwa_kategorii="'.$nazwa_kategorii.'")');
		$data['kategorie']=$this->Model_m->get('kategorie');
        $this->load->view('header');
		$this->load->view('sklep/lista', $data);
		$this->load->view('footer');
	}

			
			
}