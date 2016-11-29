<?php

class Bransoletki extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
    }

    public function sznureczek()
    {
        $this->load->view('header');
        $this->load->view('przedmioty/category');
        $this->load->view('przedmioty/sznureczek');
        $this->load->view('footer');
    }
}