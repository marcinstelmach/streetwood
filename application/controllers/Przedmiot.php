<?php

class Przedmiot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
    }

    public function t_shirt()
    {
        $this->load->view('header');
        $this->load->view('przedmioty/tshirt');
        $this->load->view('footer');
    }
}