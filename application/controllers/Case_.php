<?php

class Case_ extends CI_Controller
{
    private $kategorie='';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
    }
    
    public function iphone()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['case_iphone'] = $this->Model_m->pobierz_wszystkie_produkty_kategorii('Iphone');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/cases_iphone', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $par=substr($par, 0, strpos($par, '-'));
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/case_iphone', $dane);
            $this->load->view('footer');
        }
    }

    public function inne_modele()
    {
        $this->load->view('header', $this->kategorie);
        $this->load->view('przedmioty/category', $this->kategorie);
        $this->load->view('przedmioty/inne_modele');
        $this->load->view('footer');
    }
    
}