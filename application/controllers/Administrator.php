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

	public function dodaj_przedmiot()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
                        //$this->load->view('index');
				die(); 
		}
		$data = array('error' => ' ',
				'rekordy'=>$this->Model_m->get('kategorie')
				);
		$this->load->view('administrator/header');
		$this->load->view('administrator/przedmiot/dodaj_przedmiot', $data);
		$this->load->view('administrator/footer'); 
	}

	
	function do_upload()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
                        //$this->load->view('index');
				die();
		}
		/* utworzenie zmiennych */
				$folder_upload="./assetss/uploads";
				if (isset($_FILES['my_file']))
            {
                $myFile = $_FILES['my_file'];
                $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++)
                {
                   
                        /* sprawdzenie, czy plik został wysłany */
                    if (!$myFile["tmp_name"][$i])
                    {
                        //exit("Nie wysłano żadnego pliku");
                    }
                    
                    /* sprawdzenie błędów */
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
                    
                    /* sprawdzenie rozszerzenia pliku - dzięki temu mamy pewność, że ktoś nie zapisze na serwerze pliku .php */
                    $dozwolone_rozszerzenia=array("jpg", "tif", "png", "gif");
                    $plik_rozszerzenie=pathinfo(strtolower($myFile["name"][$i]), PATHINFO_EXTENSION);
                    if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true))
                    {
                        exit("Niedozwolone rozszerzenie pliku.");
                    }
                        
                    /* przeniesienie pliku z folderu tymczasowego do właściwej lokalizacji */
                    if (!move_uploaded_file($myFile["tmp_name"][$i], $folder_upload."/".$myFile["name"][$i]))
                    {
                        exit("Nie udało się przenieść pliku.");
                    }
                    //wysłano pomyślnie
                    $this->thumb($myFile["name"][$i]);  //utworzenie miniaturki
                }
            }
				

			$this->form_validation->set_rules('nazwa', 'Nazwa', 'required');
			$this->form_validation->set_rules('opis', 'Opis', 'required');
			$this->form_validation->set_rules('cena', 'Cena', 'required');
			$this->form_validation->set_rules('id_kategorii', 'Kategoria', 'required');
			$this->form_validation->set_rules('dlugosc', 'Długość', 'required|numeric');
			$this->form_validation->set_rules('szerokosc', 'Szerokość', 'required|numeric');
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
					$data['id_kategorii']=strtolower($this->input->post('id_kategorii'));
					$data['dlugosc']=$this->input->post('dlugosc');
					$data['szerokosc']=strtolower($this->input->post('szerokosc'));		
					$data['stan']=$this->input->post('stan');	
					$data['opis']=$this->input->post('opis');	

					
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


	public function dodaj_kategorie()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
                        //$this->load->view('index');
				die();
		}
		$this->form_validation->set_rules('nazwa', 'Nazwa', 'required|min_length[2]');
		$this->form_validation->set_message('required', 'Pole %s jest wymagane');
		$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('administrator/header');
			$this->load->view('administrator/przedmiot/dodaj_kategorie');
			$this->load->view('administrator/footer'); 
		}
		else
		{
			
			$data['nazwa_kategorii']=ucwords($this->input->post('nazwa'));		
			$this->Model_m->dodaj('kategorie', $data);
			//$this->load->view('formsuccess', $data);
			echo "dodano kategorie";
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
                        //$this->load->view('index');
				die();
		}
		$args = func_get_args();

		if (empty($args))
			{
				$data['produkty']=$this->Model_m->query('select p.id_produktu, p.nazwa, p.cena, p.dlugosc, p.szerokosc, p.stan, k.nazwa_kategorii from produkty p, kategorie k where k.id_kategorii=p.id_kategorii');
				$this->load->view('administrator/header');
				$this->load->view('administrator/przedmiot/wyswietl_przedmioty', $data);
				$this->load->view('administrator/footer');
			}
		foreach ($args as $par)
		{
				$this->form_validation->set_rules('nazwa', 'Nazwa', 'min_length[2]');
				$this->form_validation->set_rules('id_kategorii', 'Kategoria');
				$this->form_validation->set_rules('cena', 'Cena', 'numeric');
				$this->form_validation->set_rules('dlugosc', 'Długość', 'numeric');
				$this->form_validation->set_rules('szerokosc', 'Szerokość', 'numeric');
				$this->form_validation->set_rules('stan', 'Stan');
				$this->form_validation->set_message('min_length', 'Pole %s jest za krótkie');
				$this->form_validation->set_message('numeric', 'Pole %s musi być liczbą !');
				$this->form_validation->set_message('required', 'Pole %s jest wymagane !');
				if ($this->form_validation->run() == FALSE)
				{
					$data['produkty']=$this->Model_m->query('select p.id_produktu, p.nazwa, p.cena, p.zdjecie, p.dlugosc, p.szerokosc, p.stan, k.nazwa_kategorii from produkty p, kategorie k where k.id_kategorii=p.id_kategorii and id_produktu='.$par);
					$data['kategorie']=$this->Model_m->get('kategorie');
					$data['error']='';
					$this->load->view('administrator/header');
					$this->load->view('administrator/przedmiot/modyfikuj_przedmiot', $data);
					$this->load->view('administrator/footer');
				}
				else
				{
					$stareDane=$this->Model_m->pobierzgdzie('id_produktu', $par, 'produkty');
					foreach($stareDane as $row){
						$stareD['nazwa']=$row->nazwa;
						$stareD['id_kategorii']=$row->id_kategorii;
						$stareD['cena']=$row->cena;
						$stareD['dlugosc']=$row->dlugosc;
						$stareD['szerokosc']=$row->szerokosc;
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

					if($this->input->post('dlugosc')!="")
						$dane['dlugosc']=$this->input->post('dlugosc');
					else
						$dane['dlugosc']=$stareD['dlugosc'];

					if($this->input->post('szerokosc')!="")
						$dane['szerokosc']=$this->input->post('szerokosc');
					else
						$dane['szerokosc']=$stareD['szerokosc'];

					if($this->input->post('stan')!="")
						$dane['stan']=$this->input->post('stan');
					else
						$dane['stan']=$stareD['stan'];
				

					$this->Model_m->update('produkty', $dane, 'id_produktu', $par);
					//$this->load->view('klient\klient_modyfikacja_sukces_view');
					header('location: '.base_url().'administrator/modyfikacja-przedmiotu');
				}
		}
		
	}
	public function modyfikacja_kategorii()
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
		$args = func_get_args();

		if (empty($args))
			{
				$data['kategorie']=$this->Model_m->get('kategorie');
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

	private function usun_produkt($id_produktu, $zdjecie)
	{
		$thumb= substr($zdjecie, 0, -4);
		$thumb=$thumb.'_thumb.jpg';
		$this->usun_zdjecie($zdjecie);
		$this->usun_zdjecie($thumb);
		$this->Model_m->delete($id_produktu, 'id_produktu', 'produkty');
		header('Location: '.base_url().'administrator/modyfikacja_przedmiotu');
	}

	private function usun_kategorie()
	{
		$id=$this->input->post('id_kategorii');
		$this->Model_m->delete($id, 'id_kategorii', 'kategorie');
		header('Location: '.base_url().'administrator/modyfikacja_kategorii');
	}


	public function wyloguj()
	{
		//$this->session->sess_destroy();
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

	private function email_check($str)
	{
		$wynik=$this->Model_m->where('email', $str, 'uzytkownicy');

		if($str=='')
		{
			$this->form_validation->set_message('email_check', 'Podaj email');
			return FALSE;
		}
		if ($wynik==0)
		{
			$this->form_validation->set_message('email_check', 'E-mail %s istnieje juz w bazie danych, wybierz inny :)');
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
		$dane['produkt']=$this->Model_m->query('select p.nazwa, p.dlugosc, p.szerokosc, p.cena, t.ilosc FROM produkty p, zamowienia z, zam_tow t WHERE p.id_produktu=t.id_produktu and t.id_zamowienia=z.id_zamowienia and z.id_zamowienia='.$id_zamowienia);
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

	private function usun_zdjecie($file_name)
	{
		if(! unlink("./assets/uploads/".$file_name))
		{
			echo "bład";
		}
		else
		{
			echo "usunięto";
		}
	}

	public function zmien_zdjecie($id_produktu, $zdjecie)
	{
		if(($this->session->userdata('administrator')==FALSE))
		{
			header('location: '.base_url());
				die();
		}
				/* utworzenie zmiennych */
				$folder_upload="./assets/uploads";
				$plik_nazwa=$_FILES['plik']['name'];
				$plik_lokalizacja=$_FILES['plik']['tmp_name']; //tymczasowa lokalizacja pliku
				$plik_mime=$_FILES['plik']['type']; //typ MIME pliku wysłany przez przeglądarkę
				$plik_rozmiar=$_FILES['plik']['size'];
				$plik_blad=$_FILES['plik']['error']; //kod błędu
				 
				/* sprawdzenie, czy plik został wysłany */
				if (!$plik_lokalizacja) {
				    exit("Nie wysłano żadnego pliku");
				}
				 
				/* sprawdzenie błędów */
				switch ($plik_blad) {
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
				 
				/* sprawdzenie rozszerzenia pliku - dzięki temu mamy pewność, że ktoś nie zapisze na serwerze pliku .php */
				$dozwolone_rozszerzenia=array("jpeg", "jpg", "tiff", "tif", "png", "gif");
				$plik_rozszerzenie=pathinfo(strtolower($plik_nazwa), PATHINFO_EXTENSION);
				if (!in_array($plik_rozszerzenie, $dozwolone_rozszerzenia, true)) {
				    exit("Niedozwolone rozszerzenie pliku.");
				}
				 
				/* przeniesienie pliku z folderu tymczasowego do właściwej lokalizacji */
				if (!move_uploaded_file($plik_lokalizacja, $folder_upload."/".$plik_nazwa)) {
				    exit("Nie udało się przenieść pliku.");
				}
				$this->thumb($plik_nazwa);  //utworzenie miniaturki
				/* nie było błędów */
				$thumb= substr($zdjecie, 0, -4);
				$thumb=$thumb.'_thumb.jpg';
				$this->usun_zdjecie($zdjecie);
				$this->usun_zdjecie($thumb);
				$dane['zdjecie']=$plik_nazwa;
				$this->Model_m->update('produkty', $dane, 'id_produktu', $id_produktu);
				header('location: '.base_url().'administrator/modyfikacja_przedmiotu/'.$id_produktu);
		}

		private function thumb($nazwa_zdjecia)
		{
			$config['image_library'] = 'gd2';
			$config['source_image']	= './assets/uploads/'.$nazwa_zdjecia;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 100;
			$config['height']	= 100;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();
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
}