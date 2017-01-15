<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Products_Model', 'products');
		$this->load->model('user_Model', 'user');
	}

	function index()
	{	
		$data['title'] = 'Boxingshop || Home';
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function defense($subcategory = NULL){

		if($subcategory == NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('defense');
			$data['category'] = "defense";

			$data['title'] = 'Boxingshop || Ochraniacze';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
			$this->load->view('footer');
		}
	}

	public function training($subcategory = NULL){
		
		if($subcategory == NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('training');
			$data['category'] = "training";

			$data['title'] = 'Boxingshop || Trening';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
			$this->load->view('footer');
		}
	}

	public function shoes($subcategory = NULL){
		
		if($subcategory==NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('shoes');
			$data['category'] = "shoes";

			$data['title'] = 'Boxingshop || Obuwie';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
			$this->load->view('footer');
		}
	}

	public function clothes($subcategory = NULL){
		
		if($subcategory == NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('clothes');
			$data['category'] = "clothes";

			$data['title'] = 'Boxingshop || Odzież';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
			$this->load->view('footer');
		}
	}

	public function show($product){
		if($data['query'] = $this->products->getOfferInfoByName($product)){
			$data['quantity'] = $this->products->getProductQuantityByTitle($product);
			$data['comments'] = $this->products->getOfferCommentsByTitle($product);

			$this->load->view('header', $data);
			$this->load->view('productShow');
			$this->load->view('footer');
		}else show_404();
	}
	public function auth(){
		 $this->load->library('form_validation');

		 $this->form_validation->set_rules('login', 'User login', 'required');
		 $this->form_validation->set_rules('password', 'Password', 'required');

		 if($this->form_validation->run()){ //if data from form is required
		 	//pass data to model function, which gonna check if user in $login exists in DB
			 $this->user->login = $this->input->post('login');
			 $this->user->password = $this->input->post('password');
			 if($this->user->auth()){ //if the function returns true
			 	$userdata = array(
					 	'login'=>$this->input->post('login'),
						'password'=>$this->input->post('password'),
						'logged_in'=>TRUE
				 );

				 $this->session->set_userdata($userdata);

				 redirect('/');
			 }else{ //id posted data to model function returns false
			 	echo "user not exists";
			 }
			 //if model will response true, we're gonna make a session with email, login an logged_in and redirect to index page
		 }else{
			 $this->load->library('user_agent');
			 redirect($this->agent->referrer()); //redirect to previous page
		 }
	}
	public function logout(){
		if($this->session->has_userdata('login')){
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('password');
			$this->session->unset_userdata('logged_in');
			 redirect('/');
		}else{
			show_404();
		}
	}
}
