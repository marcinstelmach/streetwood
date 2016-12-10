<?php 

class Administrator extends CI_Controller
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
				die();
		}
        elseif(($this->session->userdata('administrator')==TRUE))
        {
        	$this->load->view('administrator/header');
			$this->load->view('administrator/content');
			$this->load->view('administrator/footer');
		}
			 
			
	}

	public function dodaj_przedmiot()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die(); 
		}
		$data['error']='';
        $data['kategorie']=$this->Model_m->pobierz_liste_kategorii();
        $data['kategorie_zawieszek']=$this->Model_m->pobierz_kategorii_zawieszek();
		$this->load->view('administrator/header');
		$this->load->view('administrator/przedmiot/dodaj_przedmiot', $data);
		$this->load->view('administrator/footer'); 
	}

	
	public function do_upload()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$obie_kategorie=$this->input->post('id_kategorii');
		$obie_kategorie_explode = explode('|', $obie_kategorie);
		$a=$obie_kategorie_explode[0];
		$b=$obie_kategorie_explode[1];
		$pod_kategoria=$this->Model_m->query('SELECT k.nazwa_kategorii FROM kategorie k WHERE k.id_kategorii ='.$a);
		$kategoria=$this->Model_m->query('SELECT k.nazwa_kategorii FROM kategorie k WHERE k.id_kategorii ='.$b);
		foreach ($pod_kategoria as $key)
		{
			$nazwa_podkategorii=str_replace(' ', '_', strtolower($key->nazwa_kategorii));
            $org_nazwa_podkategorii=$key->nazwa_kategorii;
		}
		foreach ($kategoria as $key)
		{
			$nazwa_kategorii=str_replace(' ', '_', strtolower($key->nazwa_kategorii));
		}
		/* utworzenie zmiennych */
			$folder_upload='./assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_podkategorii;
			if (isset($_FILES['my_file']))
            {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                    // sprawdzenie, czy plik został wysłany
                    if (!$myFile["tmp_name"][$i]) {
                        //exit("Nie wysłano żadnego pliku");
                    }

                    //sprawdzenie błędów 
                    switch ($myFile["error"][$i]) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            exit("Brak pliku.");
                            break;
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            exit("Przekroczony maksymalny rozmiar pliku.");
                            break;
                        default:
                            exit("Nieznany błąd.");
                            break;
                    }

                    //sprawdzenie rozszerzenia pliku - dzięki temu mamy pewność, że ktoś nie zapisze na serwerze pliku .php 
                    $dozwolone_rozszerzenia = array("jpg", "tif", "png", "gif");
                    $plik_rozszerzenie = pathinfo(strtolower($myFile["name"][$i]), PATHINFO_EXTENSION);
                    if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true)) {
                        exit("Niedozwolone rozszerzenie pliku.");
                    }

                    // przeniesienie pliku z folderu tymczasowego do właściwej lokalizacji 
                    if (!move_uploaded_file($myFile["tmp_name"][$i], $folder_upload . "/" . $myFile["name"][$i])) {
                        exit("Nie udało się przenieść pliku.");
                    }
                    //wysłano pomyślnie
                    if($org_nazwa_podkategorii!='Zawieszki') {
                        $this->thumb($myFile['name'][$i], $nazwa_kategorii, $nazwa_podkategorii);
                    }
                    //$this->photo_resize($nazwa_kategorii, $nazwa_podkategorii, $myFile['name'][$i], 500, 500);
                }

                if($nazwa_podkategorii=='sznureczek')
                {
                    for ($i = 0; $i < $fileCount; $i++)
                    {
                        $this->photo_resize($nazwa_kategorii, $nazwa_podkategorii, $myFile['name'][$i], 600, 600);
                    }
                }
            }
				

			$this->form_validation->set_rules('nazwa', 'Nazwa', 'required');
			$this->form_validation->set_rules('opis', 'Opis', 'required');
			$this->form_validation->set_rules('cena', 'Cena', 'required');
			$this->form_validation->set_rules('id_kategorii', 'Kategoria', 'required');
			$this->form_validation->set_rules('stan', 'Stan', 'required');
			$this->form_validation->set_message('required', 'Pole %s jest wymagane');
			$this->form_validation->set_message('numeric', 'Pole %s musi być liczbą');
			if ($this->form_validation->run() == FALSE)
			{
				$dane['rekordy']=$this->Model_m->get('kategorie');
				$this->load->view('administrator/header');
				$this->load->view('administrator/przedmiot/dodaj_przedmiot', $dane);
				$this->load->view('administrator/footer'); 
			}
			
			else
			{
					$data['nazwa']=ucwords($this->input->post('nazwa'));
					$data['cena']=$this->input->post('cena');
					$data['id_kategorii']=$a;
					$data['stan']=$this->input->post('stan');	
					$data['opis']=$this->input->post('opis');
                    if($nazwa_podkategorii=='Zawieszki')
                    {
                        $data['id_kategorii_zawieszek'] = $this->input->post('id_kategorii_zawieszek');
                    }
                    if($this->input->post('zapamietaj')=="tak")
                    {
                        $zapamietaj=array(
                            'nazwa'=>$data['nazwa'],
                            'cena'=>$data['cena'],
                            'stan'=>data['stan'],
                            'opis'=>$data['opis'],
                            'id_kategorii'=>$data['id_kategorii'],
                            'zapamietaj'=>'tak'
                        );
                        if($this->input->post('id_kategorii_zawieszek'))
                        {
                            $zapamietaj['id_kategorii_zawieszek']=$data['id_kategorii_zawieszek'];
                        }
                        $this->session->set_userdata($zapamietaj);
                    }
                    else
                    {
                        $zapamietaj=array(
                            'nazwa',
                            'cena',
                            'stan',
                            'opis',
                            'id_kategorii',
                            'zapamietaj',
                            'id_kategorii_zawieszek'
                        );
                        $this->session->unset_userdata($zapamietaj);
                    }
					
					$this->Model_m->dodaj('produkty', $data);
					$newdata = array(
	                   'nazwa_przedmiotu' => $data['nazwa'],
				  	);
					$id_produktu=$this->db->insert_id();
					for ($i = 0; $i < $fileCount; $i++)
					{
						$zdjecia['nazwa_zdjecia']=$myFile['name'][$i];
						$zdjecia['id_produktu']=$id_produktu;
						$this->Model_m->dodaj('zdjecia', $zdjecia);

					}
					$this->session->set_userdata($newdata);
					header('location: '.base_url().'administrator/dodaj_przedmiot');
			}
	}

    public function test()
    {
        echo $this->session->userdata('id_kategorii_zawieszek');
    }

    private function photo_resize($nazwa_kategorii, $nazwa_pod_kategorii, $nazwa_zdjecia, $width, $height)
    {
        echo './assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_pod_kategorii.'/'.$nazwa_zdjecia;
        $config['image_library'] = 'gd2';
        $config['source_image']	= './assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_pod_kategorii.'/'.$nazwa_zdjecia;
        $config['maintain_ratio'] = TRUE;
        $config['width']	= $width;
        $config['height']	= $height;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);


        if ( ! $this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }

    public function zmien_zdjecie($id_produktu, $nazwa_kategorii, $nazwa_pod_kategorii)
    {
        if(($this->session->userdata('administrator')==FALSE))
        {
            header('location: '.base_url());
            die();
        }
        $folder_upload='./assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_pod_kategorii;
        if (isset($_FILES['my_file']))
        {
            $zdjecia=$this->Model_m->query('SELECT nazwa_zdjecia from zdjecia where id_produktu ='.$id_produktu);
            foreach ($zdjecia as $key)
            {
                $zdjecie=$key->nazwa_zdjecia;
                $this->usun_zdjecie($zdjecie, $nazwa_kategorii, $nazwa_pod_kategorii);// usuniecie zdjec z dysku
                $this->usun_thumb($zdjecie, $nazwa_kategorii, $nazwa_pod_kategorii);
            }
            $this->Model_m->delete_zdjecie($id_produktu); // usunięcie zdjęc z bazy dancyh
            $myFile = $_FILES['my_file'];
            $fileCount = count($myFile["name"]);

            for ($i = 0; $i < $fileCount; $i++)
            {

                // sprawdzenie, czy plik został wysłany
                if (!$myFile["tmp_name"][$i])
                {
                    //exit("Nie wysłano żadnego pliku");
                }

                //sprawdzenie błędów
                switch ($myFile["error"][$i])
                {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        exit("Brak pliku.");
                        break;
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        exit("Przekroczony maksymalny rozmiar pliku.");
                        break;
                    default:
                        exit("Nieznany błąd.");
                        break;
                }

                //sprawdzenie rozszerzenia pliku - dzięki temu mamy pewność, że ktoś nie zapisze na serwerze pliku .php
                $dozwolone_rozszerzenia=array("jpg", "tif", "png", "gif");
                $plik_rozszerzenie=pathinfo(strtolower($myFile["name"][$i]), PATHINFO_EXTENSION);
                if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true))
                {
                    exit("Niedozwolone rozszerzenie pliku.");
                }

                // przeniesienie pliku z folderu tymczasowego do właściwej lokalizacji
                if (!move_uploaded_file($myFile["tmp_name"][$i], $folder_upload."/".$myFile["name"][$i]))
                {
                    exit("Nie udało się przenieść pliku.");
                }
                //wysłano pomyślnie
                $this->thumb($myFile['name'][$i], $nazwa_kategorii, $nazwa_pod_kategorii);  //utworzenie miniaturki
            }
        }
        /* nie było błędów */

        for ($i = 0; $i < $fileCount; $i++)
        {
            $zdjecia_d['nazwa_zdjecia']=$myFile['name'][$i];
            $zdjecia_d['id_produktu']=$id_produktu;
            $this->Model_m->dodaj('zdjecia', $zdjecia_d);
        }
        header('location: '.base_url().'administrator/modyfikacja_przedmiotu/'.$id_produktu);
    }

    private function thumb($nazwa_zdjecia, $nazwa_kategorii, $nazwa_podkategorii)
    {
        $config['image_library'] = 'gd2';
        $config['source_image']	= './assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_podkategorii.'/'.$nazwa_zdjecia;
        $config['create_thumb'] = TRUE;
        $config['new_image'] = './assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_podkategorii.'/thumbs';
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']=false;
        $config['width']= 100;
        $config['height']= 100;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        $this->image_lib->clear();
    }


	public function dodaj_kategorie()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
                        //$this->load->view('index');
				die();
		}
		$kategorie['glowna']=$this->Model_m->pobierz_kategorie();
		$this->form_validation->set_rules('nazwa', 'Nazwa', 'required|min_length[2]|callback_category_check');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('administrator/header');
			$this->load->view('administrator/przedmiot/dodaj_kategorie', $kategorie);
			$this->load->view('administrator/footer'); 
		}
		else
		{
			$data['nazwa_kategorii']=ucwords($this->input->post('nazwa'));
			$data['parent']=NULL;
			$this->Model_m->dodaj('kategorie', $data);
			mkdir('./assetss/img/products/'.str_replace(' ', '_', strtolower($data['nazwa_kategorii'])), 0777);
			header('location: '.base_url().'administrator/dodaj-kategorie');
		}
	}

	public function dodaj_pod_kategorie()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
			//$this->load->view('index');
			die();
		}
		$kategorie['glowna']=$this->Model_m->pobierz_kategorie();
		$this->form_validation->set_rules('nazwa', 'Nazwa', 'required|min_length[2]|callback_category_check');
		$this->form_validation->set_rules('glowna', 'Główna kategoria', 'required');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('administrator/header');
			$this->load->view('administrator/przedmiot/dodaj_kategorie', $kategorie);
			$this->load->view('administrator/footer');
		}
		else
		{
			$glowna=$this->Model_m->pobierz_nazwe_kategorii($this->input->post('glowna'));
			foreach ($glowna as $key)
			{
				$nazwa_glowna=$key->nazwa_kategorii;
			}
			$data['nazwa_kategorii']=ucwords($this->input->post('nazwa'));
			$data['parent']=$this->input->post('glowna');
			$this->Model_m->dodaj('kategorie', $data);
			//$this->load->view('formsuccess', $data);
			mkdir('./assetss/img/products/'.str_replace(' ', '_', strtolower($nazwa_glowna)).'/'.str_replace(' ', '_', strtolower($data['nazwa_kategorii'])), 0777);
			mkdir('./assetss/img/products/'.str_replace(' ', '_', strtolower($nazwa_glowna)).'/'.str_replace(' ', '_', strtolower($data['nazwa_kategorii'])).'/thumbs', 0777);
			header('location: '.base_url().'administrator/dodaj-kategorie');
		}
	}
    
    public function dodaj_kategorie_zawieszek()
    {
        if(($this->session->userdata('administrator')==FALSE))
        {
            header('location: '.base_url());
            die();
        }
        $kategorie['glowna']=$this->Model_m->pobierz_kategorie();
        $this->form_validation->set_rules('nazwa_kategorii_zawieszek', 'Nazwa', 'required|min_length[2]|callback_category_check');
        $this->form_validation->set_message('required', 'Pole %s jest wymagane');
        $this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('administrator/header');
            $this->load->view('administrator/przedmiot/dodaj_kategorie', $kategorie);
            $this->load->view('administrator/footer');
        }
        else
        {
            $data['nazwa_kategorii_zawieszek']=ucwords($this->input->post('nazwa_kategorii_zawieszek'));
            $this->Model_m->dodaj('kategorie_zawieszek', $data);
            header('location: '.base_url().'administrator/dodaj-kategorie');
        }
    }

	public function zaloguj()
	{
		
		if(($this->session->userdata('zalogowany')==TRUE))
		{
			header('location: '.base_url());
				die();
		}
		if(($this->session->userdata('administrator')==TRUE))
		{
			header('location: '.base_url().'administrator/nowe-zamowienia');
				die();
		}

		$this->form_validation->set_rules('haslo', 'Hasło', 'required');
		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('administrator/header');
			$this->load->view('administrator/zaloguj');
			$this->load->view('administrator/footer');
		}
		else
		{
			$data['login']=strtolower($this->input->post('login'));			
			$data['haslo']=$this->input->post('haslo');
			
			$odp=$this->Model_m->logadmin($data['login'], $data['haslo'], 'uzytkownicy');
			if($odp==2) //zalogowano
			{
				$id=$this->Model_m->pobierzID($data['login']);
				$newdata = array(                       //dodanie do sesji info o zalogowaniu
                   'administrator' => TRUE,
			  );

				$this->session->set_userdata($newdata);
				header('location: '.base_url().'administrator/nowe-zamowienia');
			}
			elseif ($odp==3)
			{
				$dane['komunikat']="Nieprawidlowe haslo";
				$this->load->view('administrator/header');
				$this->load->view('administrator/zaloguj', $dane);
				$this->load->view('administrator/footer');
		
			}
			elseif ($odp==0)
			{
				$dane['komunikat']="Nie istnieje użytkownik o takim loginie";

				$this->load->view('administrator/header');
				$this->load->view('administrator/zaloguj', $dane);
				$this->load->view('administrator/footer');
			}
			else
			{
				echo "Grubszy bład... ;///";
			}
		}
	}

	public function modyfikacja_przedmiotu()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$args = func_get_args();

		if (empty($args))
			{
				$data['produkty']=$this->Model_m->query('select p.id_produktu, p.nazwa, p.cena, p.stan, t1.nazwa_kategorii as nazwa_kategorii, t2.nazwa_kategorii as nazwa_pod_kategorii from produkty p JOIN kategorie as t2 on t2.id_kategorii=p.id_kategorii LEFT JOIN kategorie as t1 on t1.id_kategorii=t2.parent');
				$this->load->view('administrator/header');
				$this->load->view('administrator/przedmiot/wyswietl_przedmioty', $data);
				$this->load->view('administrator/footer');
			}
		foreach ($args as $par)
		{
				$this->form_validation->set_rules('nazwa', 'Nazwa', 'min_length[2]');
				$this->form_validation->set_rules('id_kategorii', 'Kategoria');
				$this->form_validation->set_rules('cena', 'Cena', 'numeric');
				$this->form_validation->set_rules('stan', 'Stan');
				$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
				$this->form_validation->set_message('numeric', 'Pole %s musi być liczbą !');
				$this->form_validation->set_message('required', 'Pole %s jest wymagane !');
				if ($this->form_validation->run() == FALSE)
				{
					$data['produkty']=$this->Model_m->pobierz_przedmiot($par);
					$data['kategorie']=$this->Model_m->pobierz_liste_kategorii();
					$data['error']='';
					$data['zdjecia']=$this->Model_m->query('select * from zdjecia z where z.id_produktu='.$par);
					$this->load->view('administrator/header');
					$this->load->view('administrator/przedmiot/modyfikuj_przedmiot', $data);
					$this->load->view('administrator/footer');
				}
				else
				{
					$stareDane=$this->Model_m->pobierzgdzie('id_produktu', $par, 'produkty');
					foreach($stareDane as $row)
                    {
						$stareD['nazwa']=$row->nazwa;
						$stareD['id_kategorii']=$row->id_kategorii;
						$stareD['cena']=$row->cena;
						$stareD['stan']=$row->stan;
					}

					if($this->input->post('nazwa')!="")
						$dane['nazwa']=ucwords($this->input->post('nazwa'));
					else
						$dane['nazwa']=$stareD['nazwa'];

					if($this->input->post('id_kategorii')!="")
						$dane['id_kategorii']=$this->input->post('id_kategorii');
					else
						$dane['id_kategorii']=$stareD['id_kategorii'];

					if($this->input->post('cena')!="")
						$dane['cena']=$this->input->post('cena');
					else
						$dane['cena']=$stareD['cena'];

					if($this->input->post('stan')!="")
						$dane['stan']=$this->input->post('stan');
					else
						$dane['stan']=$stareD['stan'];
				

					$this->Model_m->update('produkty', $dane, 'id_produktu', $par);
					header('location: '.base_url().'administrator/modyfikacja-przedmiotu');
				}
		}
	}

	public function dodaj_podobny()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
			die();
		}
		$args = func_get_args();

		if (empty($args))
		{
			header('location: '.base_url());
			die();
		}
		foreach ($args as $par)
		{
			$this->form_validation->set_rules('nazwa', 'Nazwa', 'min_length[2]');
			$this->form_validation->set_rules('id_kategorii', 'Kategoria');
			$this->form_validation->set_rules('cena', 'Cena', 'numeric');
			$this->form_validation->set_rules('stan', 'Stan');
			$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
			$this->form_validation->set_message('numeric', 'Pole %s musi być liczbą !');
			$this->form_validation->set_message('required', 'Pole %s jest wymagane !');
			if ($this->form_validation->run() == FALSE)
			{
				$data['produkty']=$this->Model_m->query('select p.id_produktu, p.nazwa, p.cena, p.stan, p.opis, k.nazwa_kategorii, k.id_kategorii from produkty p, kategorie k where k.id_kategorii=p.id_kategorii and id_produktu='.$par);
				$data['kategorie']=$this->Model_m->get('kategorie');
				$data['error']='';
				//$data['zdjecia']=$this->Model_m->query('select * from zdjecia z where z.id_produktu='.$par);
				$this->load->view('administrator/header');
				$this->load->view('administrator/przedmiot/dodaj_podobny', $data);
				$this->load->view('administrator/footer');
			}
			else
			{
				$stareDane=$this->Model_m->pobierzgdzie('id_produktu', $par, 'produkty');
				foreach($stareDane as $row){
					$stareD['nazwa']=$row->nazwa;
					$stareD['id_kategorii']=$row->id_kategorii;
					$stareD['cena']=$row->cena;
					$stareD['stan']=$row->stan;
				}

				if($this->input->post('nazwa')!="")
					$dane['nazwa']=ucwords($this->input->post('nazwa'));
				else
					$dane['nazwa']=$stareD['nazwa'];

				if($this->input->post('id_kategorii')!="")
					$dane['id_kategorii']=$this->input->post('id_kategorii');
				else
					$dane['id_kategorii']=$stareD['id_kategorii'];

				if($this->input->post('cena')!="")
					$dane['cena']=$this->input->post('cena');
				else
					$dane['cena']=$stareD['cena'];

				if($this->input->post('stan')!="")
					$dane['stan']=$this->input->post('stan');
				else
					$dane['stan']=$stareD['stan'];


				$this->Model_m->dodaj('produkty', $dane);
				header('location: '.base_url().'administrator/modyfikacja-przedmiotu');
			}
		}

	}
	
	public function modyfikacja_kategorii() //Dodać zarządzanie katalogami ze zdjęciami
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$args = func_get_args();

		if (empty($args))
			{
				$data['kategorie']=$this->Model_m->query('SELECT t1.nazwa_kategorii AS lev1, t2.nazwa_kategorii as lev2, t2.id_kategorii as id_kategorii FROM kategorie AS t1 JOIN kategorie AS t2 ON t2.parent = t1.id_kategorii order by t1.nazwa_kategorii');
				$this->load->view('administrator/header');
				$this->load->view('administrator/przedmiot/wyswietl_kategorie', $data);
				$this->load->view('administrator/footer');
			}
		foreach ($args as $par)
		{
				$this->form_validation->set_rules('nazwa_kategorii', 'Nazwa', 'min_length[2]');
				if ($this->form_validation->run() == FALSE)
				{
					$data['kategorie']=$this->Model_m->pobierzgdzie('id_kategorii', $par, 'kategorie');
					$this->load->view('administrator/header');
					$this->load->view('administrator/przedmiot/modyfikuj_kategorie', $data);
					$this->load->view('administrator/footer');
				}
				else
				{
					$dane['nazwa_kategorii']=ucwords($this->input->post('nazwa_kategorii'));
					$this->Model_m->update('kategorie', $dane, 'id_kategorii', $par);
					header('Location: '.base_url().'administrator/modyfikacja_kategorii');
				}
		}
		
	}

	public function usun_produkt($id_produktu, $nazwa_kategorii, $nazwa_pod_kategorii)
	{
        $zdjecia=$this->Model_m->query('select nazwa_zdjecia from zdjecia z WHERE z.id_produktu='.$id_produktu);
        foreach($zdjecia as $key)
        {
            $zdjecie=$key->nazwa_zdjecia;
            $this->usun_zdjecie($zdjecie, $nazwa_kategorii, $nazwa_pod_kategorii);
            $this->usun_thumb($zdjecie, $nazwa_kategorii, $nazwa_pod_kategorii);
        }
		
		$this->Model_m->delete($id_produktu, 'id_produktu', 'produkty');
		header('Location: '.base_url().'administrator/modyfikacja_przedmiotu');
	}

    private function usun_zdjecie($file_name, $nazwa_kategorii, $nazwa_pod_kategorii)
    {
        if(! unlink('./assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_pod_kategorii.'/'.$file_name))
        {
            echo "bład";
        }
        else
        {
            echo "usunięto";
        }
    }

    private function usun_thumb($file_name, $nazwa_kategorii, $nazwa_pod_kategorii)
    {
        if(! unlink('./assetss/img/products/'.$nazwa_kategorii.'/'.$nazwa_pod_kategorii.'/thumbs/'.$file_name))
        {
            echo "bład";
        }
        else
        {
            echo "usunięto";
        }
    }

	public function usun_kategorie()
	{
        $nazwa_kategorii=str_replace(' ', '_', strtolower($this->input->post('nazwa_kategorii')));
		$id=$this->input->post('id_kategorii');
		$this->Model_m->delete($id, 'id_kategorii', 'kategorie');
		array_map('unlink', glob('./assetss/img/products/'.$nazwa_kategorii.'/*.*'));
		rmdir('./assetss/img/products/'.$nazwa_kategorii);
		header('Location: '.base_url().'administrator/modyfikacja_kategorii');
	}

	public function usun_pod_kategorie()
	{
		$nazwa_kategorii=str_replace(' ', '_', strtolower($this->input->post('nazwa_kategorii')));
		$id=$this->input->post('id_kategorii');
		$glowna=$this->Model_m->pobierz_nazwe_kategorii($id);
		foreach ($glowna as $key)
		{
			$nazwa_glowna=$key->nazwa_kategorii;
		};
		$this->Model_m->delete($id, 'id_kategorii', 'kategorie');
		array_map('unlink', glob('./assetss/img/products/'.str_replace(' ', '_', strtolower($nazwa_glowna)).'/'.$nazwa_kategorii.'/*.*'));
		rmdir('./assetss/img/products/'.str_replace(' ', '_', strtolower($nazwa_glowna)).'/'.$nazwa_kategorii);
		header('Location: '.base_url().'administrator/modyfikacja_kategorii');
	}

	public function wyloguj()
	{
		$this->session->unset_userdata('administrator');
		header('location: '.base_url());
	}

	private function username_check($str)
	{
		$wynik=$this->Model_m->where('login', $str, 'uzytkownicy');
		if($str=='')
		{
			$this->form_validation->set_message('username_check', 'Podaj login');
			return FALSE;
		}
		if ($wynik==0)
		{
			$this->form_validation->set_message('username_check', 'Login %s istnieje juz w bazie danych, wybierz inny :)');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function category_check($str)
	{
		$wynik=$this->Model_m->where('nazwa_kategorii', $str, 'kategorie');

		if($str=='')
		{
			$this->form_validation->set_message('category_check', 'Podaj email');
			return FALSE;
		}
		if ($wynik==0)
		{
			$this->form_validation->set_message('category_check', 'Taka kategoria istnieje juz w bazie danych');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	public function nowe_zamowienia()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url()); 
				die();
		}
		$args = func_get_args();
		if (empty($args))
		{
			$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
			goto end;
		}
		foreach ($args as $par)
		{
			if($par=='dzisiaj')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and DAY(z.data_zamowienia)=DAY(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='tydzien')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and WEEK(z.data_zamowienia)=WEEK(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='miesiac')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and MONTH(z.data_zamowienia)=MONTH(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
		}
		
		end:
		$this->load->view('administrator/header');
		$this->load->view('administrator/zamowienie/nowe_zamowienia', $dane);
		$this->load->view('administrator/footer');
	}

	public function szczegoly_zamowienia($id_zamowienia)
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$dane['adres']=$this->Model_m->query('select a.miasto, a.ulica, a.nr_domu, a.kod_pocztowy from adresy a, zamowienia z where a.id_adresu=z.id_adresu and z.id_zamowienia='.$id_zamowienia);
		$dane['uzytkownik']=$this->Model_m->query('select u.imie, u.nazwisko, u.email, u.telefon from uzytkownicy u, zamowienia z WHERE z.id_uzytkownika=u.id_uzytkownika and z.id_zamowienia='.$id_zamowienia);
		$dane['produkt']=$this->Model_m->query('select p.nazwa, p.cena, t.ilosc FROM produkty p, zamowienia z, zam_tow t WHERE p.id_produktu=t.id_produktu and t.id_zamowienia=z.id_zamowienia and z.id_zamowienia='.$id_zamowienia);
		$dane['id_zamowienia']=$id_zamowienia;
		$dane['zamowienie']=$this->Model_m->query('select z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from zamowienia z where z.id_zamowienia='.$id_zamowienia);

		$this->load->view('administrator/header');
		$this->load->view('administrator/zamowienie/szczegoly_zamowienia', $dane);
		$this->load->view('administrator/footer');
	}

	public function oczekujace_na_zaplate()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$args = func_get_args();
		if (empty($args))
		{
			$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_zaplacono=0 GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
		}
		foreach ($args as $par)
		{
			if($par=='dzisiaj')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_zaplacono=0 and DAY(z.data_zamowienia)=DAY(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='tydzien')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_zaplacono=0 and WEEK(z.data_zamowienia)=WEEK(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='miesiac')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_zaplacono=0 and MONTH(z.data_zamowienia)=MONTH(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
		}
		end:
		$this->load->view('administrator/header');
		$this->load->view('administrator/zamowienie/nowe_zamowienia', $dane);
		$this->load->view('administrator/footer');
	}

	public function nie_wyslane()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}

		$args = func_get_args();
		if (empty($args))
		{
			$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=0 GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
			goto end;
		}
		foreach ($args as $par)
		{
			if($par=='dzisiaj')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=0 and DAY(z.data_zamowienia)=DAY(NOW()) GROUP by z.id_zamowienia');
				goto end;
			}
			elseif($par=='tydzien')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=0 and WEEK(z.data_zamowienia)=WEEK(NOW()) GROUP by z.id_zamowienia');
				goto end;
			}
			elseif($par=='miesiac')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=0 and MONTH(z.data_zamowienia)=MONTH(NOW()) GROUP by z.id_zamowienia');
				goto end;
			}
		}
		end:
		$this->load->view('administrator/header');
		$this->load->view('administrator/zamowienie/nowe_zamowienia', $dane);
		$this->load->view('administrator/footer');
	}

	public function zakonczone()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$args = func_get_args();
		if (empty($args))
		{
			$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=1 and z.czy_zaplacono=1 GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
			goto end;
		}
		foreach ($args as $par)
		{
			if($par=='dzisiaj')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=1 and z.czy_zaplacono=1 and DAY(z.data_zamowienia)=DAY(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='tydzien')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=1 and z.czy_zaplacono=1 and WEEK(z.data_zamowienia)=WEEK(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
			elseif($par=='miesiac')
			{
				$dane['zamowienia']=$this->Model_m->query('select z.id_zamowienia, u.imie, u.nazwisko, z.czy_wyslano, z.czy_zaplacono, z.cena, z.data_zamowienia from uzytkownicy u, zamowienia z where u.id_uzytkownika=z.id_uzytkownika and z.czy_wyslano=1 and z.czy_zaplacono=1 and MONTH(z.data_zamowienia)=MONTH(NOW()) GROUP by z.id_zamowienia ORDER BY z.data_zamowienia DESC');
				goto end;
			}
		}
		end:
		$this->load->view('administrator/header');
		$this->load->view('administrator/zamowienie/nowe_zamowienia', $dane);
		$this->load->view('administrator/footer');
	}

	public function oplac($id_zamowienia)
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$dane['czy_zaplacono']=1;
		$this->Model_m->update('zamowienia', $dane, 'id_zamowienia', $id_zamowienia);
		header('location: '.base_url().'administrator/szczegoly-zamowienia/'.$id_zamowienia);
	}

	public function nieoplac($id_zamowienia)
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$dane['czy_zaplacono']=0;
		$this->Model_m->update('zamowienia', $dane, 'id_zamowienia', $id_zamowienia);
		header('location: '.base_url().'administrator/szczegoly-zamowienia/'.$id_zamowienia);
	}


	public function wyslij($id_zamowienia)
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$dane['czy_wyslano']=1;
		$this->Model_m->update('zamowienia', $dane, 'id_zamowienia', $id_zamowienia);
		header('location: '.base_url().'administrator/szczegoly-zamowienia/'.$id_zamowienia);
	}

	public function niewyslij($id_zamowienia)
	{
		$dane['czy_wyslano']=0;
		$this->Model_m->update('zamowienia', $dane, 'id_zamowienia', $id_zamowienia);
		header('location: '.base_url().'administrator/szczegoly-zamowienia/'.$id_zamowienia);
	}





		public function statystyki()
		{
			$data['dzisiaj']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where DAY(z.data_zamowienia)=DAY(NOW())');

			$data['tydzien']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where WEEK(z.data_zamowienia)=WEEK(NOW())');

			$data['miesiac']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where MONTH(z.data_zamowienia)=MONTH(NOW())');

			$data['rok']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where YEAR(z.data_zamowienia)=YEAR(NOW())');

			if($this->input->get('miesiac'))
			{
				$miesiac = $this->input->get('miesiac');
				$data['month_query']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where MONTH(z.data_zamowienia)='.$miesiac);
				$data['month_number']=$miesiac;
			}

			if($this->input->get('data'))
			{
				$date = $this->input->get('data');
				$data['date_query']=$this->Model_m->query('SELECT SUM(cena) AS dochod, COUNT(z.id_zamowienia) AS ilosc from zamowienia z where z.data_zamowienia='.$date);
			}

			$this->load->view('administrator/header');
			$this->load->view('administrator/statystyki/statystyki', $data);
			$this->load->view('administrator/footer');
		}

    public function przytnij_zdjecie()
    {
        echo '<img src="'.base_url().'assetss/img/przyklad/7.png" />';
        $config['image_library'] = 'ImageMagick';
        $config['library_path'] = 'C:\\Program Files\\ImageMagick';
        $config['source_image']	= './assetss/img/przyklad/7.png';
        $config['x_axis'] = '100';
        $config['y_axis'] = '300';
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);

        if ( ! $this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
        }
    }
}
