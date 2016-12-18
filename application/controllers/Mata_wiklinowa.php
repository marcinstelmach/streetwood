<?php 

class Mata_wiklinowa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
	}

	public function Index()
	{

		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
                        //$this->load->view('index');
				die();
		}
        elseif(($this->session->userdata('administrator')==TRUE))
        {
        	$this->load->view('administrator/header');
			$this->load->view('administrator/content');
			$this->load->view('administrator/footer');
		}
			
	}		
}