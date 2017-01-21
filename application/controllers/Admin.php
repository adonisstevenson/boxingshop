<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if($this->session->has_userdata('rank') && $this->session->rank!="admin" || !$this->session->has_userdata('rank')){
            show_404();
        }
		$this->load->model('Products_Model', 'products');
		$this->load->model('User_Model', 'user');
	}

	function index()
	{	
		$data['title'] = 'Boxingshop || Panel Administracyjny';
		$this->load->view('header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('footer');
	}

	public function storeOffer(){
		$data['title'] = 'Boxingshop || Dodaj ofertę';
		$this->load->view('header', $data);
		$this->load->view('admin/storeOffer');
		$this->load->view('footer');
	}
	public function addOffer(){
		// echo $this->input->post('offerTitle').'<br>';
		// echo $this->input->post('offerDescription').'<br>';
		// echo $this->input->post('offerPrice').'<br>';
		// echo $this->input->post('offerCategory').'<br>';
		// echo $this->input->post('offerSubCategory').'<br>';
		// echo $this->input->post('offerPhoto').'<br>';

		$this->load->library('form_validation');

		$this->form_validation->set_rules('offerTitle', 'Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('offerDescription', 'Desc', 'required|min_length[5]');
		$this->form_validation->set_rules('offerPrice', 'Price', 'required|integer');
		$this->form_validation->set_rules('offerCategory', 'Category', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('offerSubCategory', 'SubCategory', 'required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('offerPhoto', 'Link to photo', 'required|min_length[5]|max_length[1000]');
		$this->form_validation->set_rules('offerQuantity', 'Quantity of products', 'required|integer');

		if(!$this->form_validation->run()){
			 $this->load->library('user_agent');
			 $this->session->set_flashdata('addOffer', 'Wystąpił błąd podczas wypełniania formularza. Upewnij się, że wszystkie pola wypełniłeś zgodnie z poleceniami, bądź nie pozostawiłeś ich pustych');
			 redirect($this->agent->referrer());
		}else{
				$this->products->title = $this->input->post('offerTitle');
				$this->products->description = $this->input->post('offerDescription');
				switch ($this->input->post('offerCategory')) {
					case 'trening':
						$this->products->category = 'training';
						break;

					case 'ochrona':
						$this->products->category = 'defense';
						break;

					case 'obuwie':
						$this->products->category = 'shoes';
						break;

					case 'odzież':
						$this->products->category = 'clothes';
						break;
					
					default:
						$this->products->category = $this->input->post('offerCategory');
						break;
				}

				$this->products->subcategory = $this->input->post('offerSubCategory');
				$this->products->photo = $this->input->post('offerPhoto');
				$this->products->quantity = $this->input->post('offerQuantity');

				header('Location:'.base_url().'produkty/'.urlencode($this->input->post('offerTitle')));
				

			}
	}

	
}
