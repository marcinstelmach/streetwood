<?php 

class Koszyk extends CI_Controller
{ 
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_m');
	}
	
	public function dodaj($id)
	{
		$wyniki=$this->Model_m->pobierzgdzie('id_produktu', $id, 'produkty');
		foreach($wyniki as $key)
		{
			$data = array(
               'id'      => $key->id_produktu,
               'qty'     => 1,
               'price'   => $key->cena,
               'name'    => $key->nazwa,
               //'options' => array('Size' => 'L', 'Color' => 'Red')
            );
		}
		$this->cart->insert($data);
		header('Location: '.base_url().'sklep/');
	}

	public function wyswietl()
	{
		$this->session->set_userdata('krok_zaloguj', TRUE);
		$this->load->view('header');
		$this->load->view('koszyk/koszyk');
		$this->load->view('footer');
	}

	public function update()
	{

		if ($this->input->post('update_cart'))
		{
			unset($_POST['update_cart']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$info = array(
			   'rowid' => $content['rowid'],
			   'qty'   => $content['qty']
			);

				$this->cart->update($info);

			}
		}
		header('Location: '.base_url().'koszyk/wyswietl/');
		$this->session->set_userdata('updated', TRUE);
	}

	public function remove()
	{
		if ($this->input->post('update_cart'))
		{
			unset($_POST['update_cart']);
			$contents = $this->input->post();
			
			foreach ($contents as $content)
			{
				$info = array(
			   'rowid' => $content['rowid'],
			   'qty'   => $content['qty']
			);

				$this->cart->update($info);

			}
		}
	}

	public function usun($rowid)
	{
		$this->cart->remove($rowid);	
		$this->session->set_userdata('deleted', TRUE);
		header('Location: '.base_url().'koszyk/wyswietl/');
	}

	public function destroy()
	{
		$this->cart->destroy();
		$this->session->set_userdata('destroyed', TRUE);
		header('Location: '.base_url().'koszyk/wyswietl/');
	}

			
			
}