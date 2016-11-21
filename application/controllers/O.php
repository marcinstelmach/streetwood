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
		$this->load->view('slider');
		$this->load->view('body');
		$this->load->view('footer');
	}
}