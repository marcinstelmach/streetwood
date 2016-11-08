<?php 

class O extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function Index()
	{
		$this->load->view('header');
		$this->load->view('o/ofirmie');
		$this->load->view('footer');
	}
	public function firmie()
	{
		$this->load->view('header');
		$this->load->view('o/ofirmie');
		$this->load->view('footer');
	}
	public function produkcie()
	{
		$this->load->view('header');
		$this->load->view('o/oprodukcie');
		$this->load->view('footer');
	}
	public function opis_techniczny()
	{
		$this->load->view('header');
		$this->load->view('o/opistechniczny');
		$this->load->view('footer');
	}
	public function kontakt()
	{
		$this->load->view('header');
		$this->load->view('o/kontakt');
		$this->load->view('footer');
	}

	public function test()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('footer'); 
	}
	
}