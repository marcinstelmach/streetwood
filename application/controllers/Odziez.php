<?php

class Odziez extends CI_Controller
{
    private $kategorie='';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
    }

    public function t_shirt()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['czapki']=$this->Model_m->pobierz_wszystkie_produkty_kategorii('t-shirt');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/tshirts', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/tshirt', $dane);
            $this->load->view('footer');
        }
    }

    public function czapki()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['czapki']=$this->Model_m->pobierz_wszystkie_produkty_kategorii('Czapki');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/czapki', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/czapka', $dane);
            $this->load->view('footer');
        }
    }
}