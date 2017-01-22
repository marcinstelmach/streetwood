<?php

class Bransoletki extends CI_Controller
{
    private $kategorie='';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_m');
        $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
    }
    

    public function sznureczek()
    {
        $dane['stale_info']=$this->Model_m->pobierz_stale(1);
        $dane['sznureczki']=$this->Model_m->pobierz_sznureczki();
        $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
        $this->load->view('header', $this->kategorie);
        $this->load->view('przedmioty/category', $this->kategorie);
        $this->load->view('przedmioty/sznureczek', $dane);
        $this->load->view('footer');
    }


    public function guzik()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['guziki'] = $this->Model_m->pobierz_wszystkie_produkty_kategorii('Guzik');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/guziki', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $par=substr($par, 0, strpos($par, '-'));
            $dane['stale_info']=$this->Model_m->pobierz_stale(2);
            $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/guzik', $dane);
            $this->load->view('footer');
        }
    }

    public function kotwica()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['kotwice'] = $this->Model_m->pobierz_wszystkie_produkty_kategorii('Kotwica');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/kotwice', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $par=substr($par, 0, strpos($par, '-'));
            $dane['stale_info']=$this->Model_m->pobierz_stale(3);
            $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/kotwica', $dane);
            $this->load->view('footer');
        }
    }
    
}