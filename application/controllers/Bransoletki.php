<?php

class Bransoletki extends CI_Controller
{
    private $kategorie='';

    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(TRUE);
        $this->load->model('Model_m');
        $this->load->driver('cache', array('adapter' => 'file'));
        if(!$this->kategorie['drzewko']=$this->cache->get('kategorie'))
        {
            $this->kategorie['drzewko']=$this->Model_m->pobierz_drzewko_kategorii();
            $this->cache->save('kategorie', $this->kategorie['drzewko'], 1000);
        }

    }
    //$this->cache->delete(cacheID);

    public function sznureczek()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cacheID='listing';
        if (!$dane=$this->cache->get($cacheID))
        {
            $dane['stale_info']=$this->Model_m->pobierz_stale(1);
            $dane['sznureczki']=$this->Model_m->pobierz_sznureczki();
            $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
            $this->cache->save($cacheID, $dane, 900);
        }


        $this->load->view('header', $this->kategorie);
        $this->load->view('przedmioty/category', $this->kategorie);
        $this->load->view('przedmioty/sznureczek', $dane);
        $this->load->view('footer');
    }


    public function guzik()
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $args = func_get_args();

        if (empty($args))
        {
            if (!$dane['guziki']=$this->cache->get('guziki'))
            {
                $dane['guziki'] = $this->Model_m->pobierz_wszystkie_produkty_kategorii('Guzik');
                $this->cache->save('guziki', $dane['guziki'], 1000);
            }

            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/guziki', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $par=substr($par, 0, strpos($par, '-'));
            if (!$dane=$this->cache->get('guzik'.$par))
            {
                $dane['stale_info']=$this->Model_m->pobierz_stale(2);
                $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
                $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
                $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);

                $this->cache->save('guzik'.$par, $dane, 1000);
            }


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

    public function koraliki()
    {
        $args = func_get_args();

        if (empty($args))
        {
            $dane['koraliki'] = $this->Model_m->pobierz_wszystkie_produkty_kategorii('Koraliki');
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/koraliki', $dane);
            $this->load->view('footer');
        }
        foreach ($args as $par)
        {
            $par=substr($par, 0, strpos($par, '-'));
            $dane['stale_info']=$this->Model_m->pobierz_stale(4);
            $dane['zawieszki']=$this->Model_m->pobierz_zawieszki();
            $dane['produkt']=$this->Model_m->pobierz_dane_produktu($par);
            $dane['zdjecia']=$this->Model_m->pobierz_zdjecia_produktu($par);
            $this->load->view('header', $this->kategorie);
            $this->load->view('przedmioty/category', $this->kategorie);
            $this->load->view('przedmioty/koralikii', $dane);
            $this->load->view('footer');
        }
    }
    
}