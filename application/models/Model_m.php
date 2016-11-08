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
	
}