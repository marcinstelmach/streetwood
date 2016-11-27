<?php

class Case_iPhone extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('przedmioty/case');
        $this->load->view('footer');
    }

    public function case_iphone()
    {
        $this->load->view('header');
        $this->load->view('przedmioty/category');
        $this->load->view('przedmioty/case_iphone');
        $this->load->view('footer');
    }

    public function case_other()
    {
        $this->load->view('header');
        $this->load->view('przedmioty/category');
        $this->load->view('przedmioty/case_other');
        $this->load->view('footer');
    }
}