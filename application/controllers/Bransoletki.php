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
        $dane['sznureczki']=$this->Model_m->pobierz_sznureczki();
        $kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
        $this->load->view('header');
        $this->load->view('przedmioty/category', $kategorie);
        $this->load->view('przedmioty/sznureczek', $dane);
        $this->load->view('footer');
    }
}