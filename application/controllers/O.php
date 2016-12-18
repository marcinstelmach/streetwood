<?php 

class O extends CI_Controller
{
    private $kategorie='';
	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
	}

	public function Index()
	{
		$this->load->view('header', $this->kategorie);
		$this->load->view('slider');
		$this->load->view('body');
		$this->load->view('footer');
	}
}