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
		$this->load->model('Todos_Model', 'todos');
	}

	private function getCartItems(){
		if($this->session->has_userdata('login')){
			$this->carts->owner = $this->session->login;
			$items = $this->carts->getCartItemsQuantityByLogin();
			return $items;
		}else return 0;
	}

	function index()
	{	
		$points = [100, 400, 80, 10, 1000, 550, 450];
		$newpoints = [];
		$maxArray = max($points);
		if($maxArray>100 && $maxArray<500) $max = 500;
		if($maxArray>500 && $maxArray<800) $max = 800;
		if($maxArray>800 && $maxArray<1200) $max = 1200;
		$data['maxPer'] = $max/10;
		$arrayNum = 0;
		foreach ($points as $point) {

			$point = $point/$max;
			$point = $point*300;
			$point = 360 - $point;

			$newpoints[$arrayNum] = $point;
			$arrayNum++;
		}
		
		$data['points'] = $newpoints;
		$data['realValue'] = $points;
		$data['startX'] = 7;
		$data['startY'] = 45;
		$data['max'] = $max;
		$data['title'] = 'Boxingshop || Panel Administracyjny';

		$data['todos'] = $this->todos->getAllTodos();

		$this->load->view('header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('footer');
	}

	public function storeOffer(){
		$data['title'] = 'Boxingshop || Dodaj ofertę';
		$data['subcategories'] = $this->products->getAllSubcategories();
		$this->load->view('header', $data);
		$this->load->view('admin/storeOffer');
		$this->load->view('footer');
	}
	public function addOffer(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('offerTitle', 'Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('offerBrand', 'Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('offerDescription', 'Desc', 'required|min_length[5]');
		$this->form_validation->set_rules('offerPrice', 'Price', 'required|integer');
		$this->form_validation->set_rules('offerPhoto', 'Link to photo', 'required|min_length[5]|max_length[1000]');
		$this->form_validation->set_rules('offerQuantity', 'Quantity of products', 'required|integer');

		if(!$this->form_validation->run()){
			 $this->load->library('user_agent');
			 $this->session->set_flashdata('addOffer', 'Wystąpił błąd podczas wypełniania formularza. Upewnij się, że wszystkie pola wypełniłeś zgodnie z poleceniami, bądź nie pozostawiłeś ich pustych');
			 redirect($this->agent->referrer());
		}else{
				$this->products->brand = $this->input->post('offerBrand');
				$this->products->title = $this->input->post('offerTitle');
				$this->products->description = $this->input->post('offerDescription');
				$this->products->subcategory = $this->input->post('offerSubCategory');
				$this->products->photo = $this->input->post('offerPhoto');
				$this->products->current_price = $this->input->post('offerPrice');
				$this->products->quantity = $this->input->post('offerQuantity');

				if($try = $this->products->insertOffer()){
					header('Location:'.base_url().'produkty/'.urlencode($this->input->post('offerTitle')));
				}else{
					echo "error";
				}
				

			}
	}

	public function deleteComment($id){
		$this->products->comment_id = $id;
		if($delete = $this->products->deleteCommentById()){
			
		} else echo "Nie udało się usunąć komentarza!";
	}

	public function deleteOffer(){
		$this->products->offer_id = $this->input->post('offerId');

		$this->products->deleteOfferById();

		$this->session->set_flashdata('deleteOffer', 'Oferta jak i wszystkie produkty w magazynie z nią związane zostały usunięte');
		redirect('/');
	}

	public function editOffer(){
		$this->products->offer_id =  $this->input->post('offer_id');
		$data['title'] = "Boxingshop || Edytuj ofertę";
		$data['quantity'] = $this->products->getProductsQuantityById();
		$data['subcategories'] = $this->products->getAllSubcategories();
		$data['offer'] = $this->products->getOfferInfoById();
		$data['offer_id'] = $this->input->post('offer_id');
		$this->load->view('header', $data);
		$this->load->view('Admin/editOffer', $data);
		$this->load->view('footer');
	}
	public function doEdit(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('offerTitle', 'Title', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('offerDescription', 'Desc', 'required|min_length[5]');
		$this->form_validation->set_rules('offerPrice', 'Price', 'required|integer');
		$this->form_validation->set_rules('offerPhoto', 'Link to photo', 'required|min_length[5]|max_length[1000]');
		$this->form_validation->set_rules('offerQuantity', 'Quantity of products', 'required|integer|greater_than[-1]');

		if(!$this->form_validation->run()){
			 $this->load->library('user_agent');
			 $this->session->set_flashdata('addOffer', 'Wystąpił błąd podczas wypełniania formularza. Upewnij się, że wszystkie pola wypełniłeś zgodnie z poleceniami, bądź nie pozostawiłeś ich pustych');
			 redirect($this->agent->referrer());
		}else{
				$this->products->offer_id = $this->input->post('offer_id');
				$this->products->title = $this->input->post('offerTitle');
				$this->products->description = $this->input->post('offerDescription');
				$this->products->subcategory = $this->input->post('offerSubCategory');
				$this->products->photo = $this->input->post('offerPhoto');
				$this->products->current_price = $this->input->post('offerPrice');
				$this->products->quantity = $this->input->post('offerQuantity');

				if($try = $this->products->editOffer()){
					$this->session->set_flashdata('edit_success', 'Oferta edytowana pomyślnie.');
					redirect(base_url().'produkty/'.urlencode($this->products->title));

				}else{
					$this->session->set_flashdata('edit_error', 'Wystąpił błąd przy edytowaniu oferty. Sprawdź, czy nie pozostawiłeś żadnych pól pustych, bądź skonsultuj się z głównym administratorem strony');
					redirect(base_url().'produkty/'.urlencode($this->products->title));
				}

			}

	}
	public function delTodo($todoID){
		$this->todos->id = $todoID;

		if(!$this->todos->delTodoByID()){
			echo 0;
		}else echo 1;
	}
	public function addTodo(){
		$this->todos->content = $this->input->post('data');
		$id = $this->todos->addTodo();

		echo $id;
	}

	
}
