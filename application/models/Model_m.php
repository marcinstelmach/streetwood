<?php 

class Model_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function dodaj($tabela, $dane)
	{
		$this->db->insert($tabela, $dane);
	}

	public function update($tabela, $dane, $par1, $par2)
	{
		$this->db->where($par1, $par2);
		$this->db->update($tabela, $dane); 
	}

	public function get($tabela)
	{
		$query = $this->db->get($tabela);
		return $query->result();
	}

	public function where($par1, $par2, $tabela)
	{
		$this->db->where($par1, $par2);
		$query = $this->db->get($tabela); 
		if ($query->num_rows() > 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	public function log($login, $haslo, $tabela)
	{
		$this->db->where('login', $login);
		$query = $this->db->get($tabela); 
		if ($query->num_rows() > 0)
		{
			$wiersz=$query->row();
			$haslo_hash=$wiersz->haslo;

			if ((password_verify($haslo, $haslo_hash)))
			{
				return 2;  //zalogowano
			}
			else
			{
				return 3;  //nie prawidlowe hasło
			}
			echo $haslo_hash;
		}
		else
		{
			return 0;  //nie jesteje taki login
		}
	}

	public function logadmin($login, $haslo, $tabela)
	{
		$this->db->where('login', $login);
		$query = $this->db->get($tabela); 
		if ($query->num_rows() > 0)
		{
			$wiersz=$query->row();
			if($wiersz->typ_konta=='administrator')
			{
				$haslo_hash=$wiersz->haslo;

				if ((password_verify($haslo, $haslo_hash)))
				{
					return 2;  //zalogowano
				}
				else
				{
					return 3;  //nie prawidlowe hasło
				}
				echo $haslo_hash;
			}
		}
		else
		{
			return 0;  //nie jesteje taki login
		}
	}

	public function pobierzgdzie($par1, $par2, $tabela)
	{
		$this->db->where($par1, $par2);
		$query = $this->db->get($tabela); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function pobierzID($login){
		$this->db->select('id_uzytkownika');
		$this->db->where('login',$login);
		$query=$this->db->get('uzytkownicy');

		if($query->num_rows()==1){
			foreach($query->result() as $row){
				$id=$row->id_uzytkownika;
			}
			return $id;
		}
		else{
			return FALSE;
		}
	}
	

	public function select($par1,$par2, $tabela)
	{
		$this->db->select($par1, $par2);
		$query = $this->db->get($tabela);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function pobierz_historie($id_zamowienia)
	{
		$this->db->where('id_zamowienia', $id_zamowienia);
		$this->db->order_by('data_zmiany', 'ASC');
		$query = $this->db->get('status_zam');		
		return $query->result();
	}

	public function query($zapytanie)
	{
		$query = $this->db->query($zapytanie);
		return $query->result();
	}

	public function delete($id, $id_org, $tabela)
	{
		$this->db->where($id_org, $id);
		$this->db->delete($tabela); 
	}

	public function delete_zdjecie($id_produktu)
	{
		$this->db->where('id_produktu', $id_produktu);
		$this->db->delete('zdjecia');
	}

	public function pobierz_kategorie()
	{
		$kategorie=$this->db->query('select k.id_kategorii, k.nazwa_kategorii from kategorie k where k.parent is null');
		return $kategorie->result();
	}

	public function pobierz_nazwe_kategorii($id_kategorii)
	{
		$nazwa=$this->db->query('select k.nazwa_kategorii from kategorie k where k.id_kategorii='.$id_kategorii);
		return $nazwa->result();
	}

	public function pobierz_liste_kategorii()
	{
		$kategorie=$this->db->query('SELECT t1.nazwa_kategorii AS lev1, t2.nazwa_kategorii as lev2, t2.id_kategorii as id_kategorii, t1.id_kategorii AS id_kategorii_1 FROM kategorie AS t1 JOIN kategorie AS t2 ON t2.parent = t1.id_kategorii ORDER by t1.nazwa_kategorii');
		return $kategorie->result();
	}

	public function pobierz_przedmiot($id_przedmiotu)
	{
		$przedmioty=$this->db->query('select p.id_produktu, p.nazwa, p.cena, p.stan, k.nazwa_kategorii, k.id_kategorii as id_kategorii, t1.id_kategorii as id_pod_kategorii, t1.nazwa_kategorii as nazwa_pod_kategorii from produkty p, kategorie k LEFT JOIN kategorie AS t1 ON t1.parent = k.id_kategorii where t1.id_kategorii=p.id_kategorii and p.id_produktu='.$id_przedmiotu);
		return $przedmioty->result();
	}

    public function pobierz_sznureczki()
    {
        $sznureczki=$this->db->query('SELECT p.nazwa as nazwa_przedmiotu, z.nazwa_zdjecia as nazwa_zdjecia from produkty p, zdjecia z, kategorie k WHERE p.id_produktu=z.id_produktu AND p.id_kategorii=k.id_kategorii AND k.nazwa_kategorii="Sznureczek"');
        return $sznureczki->result();
    }

    public function pobierz_drzewko_kategorii()
    {
        $drzewko = $this->db->query('select t1.nazwa_kategorii as nazwa_kategorii, t2.nazwa_kategorii as nazwa_pod_kategorii from kategorie as t1 join kategorie as t2 on t1.id_kategorii=t2.parent where t2.nazwa_kategorii != "zawieszki" ORDER by t1.nazwa_kategorii, t2.nazwa_kategorii');
        return $drzewko->result();
    }

    public function pobierz_kategorii_zawieszek()
    {
        $kategorie_zawieszek=$this->db->query('SELECT kz.nazwa_kategorii_zawieszek, kz.id_kategorii_zawieszek from kategorie_zawieszek kz');
        return $kategorie_zawieszek->result();
    }

    public function pobierz_zawieszki()
    {
        $sznureczki=$this->db->query('SELECT p.nazwa as nazwa_zawieszki, kz.nazwa_kategorii_zawieszek as nazwa_kategorii_zawieszek, z.nazwa_zdjecia as nazwa_zdjecia from produkty p, kategorie_zawieszek kz, zdjecia z where p.id_kategorii_zawieszek=kz.id_kategorii_zawieszek and p.id_produktu=z.id_produktu ORDER by kz.nazwa_kategorii_zawieszek');
        return $sznureczki->result();
    }

    public function pobierz_wszystkie_produkty_kategorii($kategoria)
    {
        $czapki=$this->db->query('SELECT p.nazwa as nazwa_produktu, z.nazwa_zdjecia as nazwa_zdjecia, p.cena as cena, p.id_produktu as id_produktu from produkty p, zdjecia z, kategorie k WHERE p.id_produktu=z.id_produktu AND p.id_kategorii=k.id_kategorii AND k.nazwa_kategorii="'.$kategoria.'" AND z.glowne=true ORDER BY p.nazwa');
        return $czapki->result();
    }

    public function pobierz_dane_produktu($par)
    {
        $produkt=$this->db->query('SELECT p.nazwa as nazwa, p.cena as cena, p.id_produktu as id_produktu, p.opis as opis from produkty p WHERE p.id_produktu='.$par);
        return $produkt->result();
    }

    public function pobierz_zdjecia_produktu($par)
    {
        $zdjecia=$this->db->query('SELECT z.nazwa_zdjecia, z.glowne from zdjecia z, produkty p where p.id_produktu=z.id_produktu and p.id_produktu='.$par);
        return $zdjecia->result();
    }


    public function pobierz_stale($id)
    {
        $stale=$this->db->query('SELECT * FROM stale_ceny where id_stalej_ceny='.$id);
        return $stale->result();
    }

    public function pobierz_guziki()
    {
        $sznureczki=$this->db->query('SELECT p.nazwa as nazwa_przedmiotu, z.nazwa_zdjecia as nazwa_zdjecia from produkty p, zdjecia z, kategorie k WHERE p.id_produktu=z.id_produktu AND p.id_kategorii=k.id_kategorii AND k.nazwa_kategorii="Guzik"');
        return $sznureczki->result();
    }

    public function SetMainPhoto($id_zdjecia, $id_produktu)
    {
        $this->db->query('UPDATE zdjecia z SET z.glowne=true WHERE z.id_zdjecia='.$id_zdjecia);
        $this->db->query('UPDATE zdjecia z SET z.glowne=false WHERE z.id_produktu = '.$id_produktu.' AND z.id_zdjecia<>'.$id_zdjecia);
    }

	public function czy_moje_zamowienie($id_zamowienia, $id_uzytkownika)
	{
		$query=$this->db->query('SELECT z.id_zamowienia FROM zamowienia z, uzytkownicy u WHERE z.id_uzytkownika=u.id_uzytkownika AND u.id_uzytkownika='.$id_uzytkownika.' and z.id_zamowienia='.$id_zamowienia);

		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}