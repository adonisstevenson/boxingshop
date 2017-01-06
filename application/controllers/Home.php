<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Products_Model', 'products');
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
		}
	}

	public function training($subcategory = NULL){
		
		if($subcategory == NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('training');
			$data['category'] = "training";

			$data['title'] = 'Boxingshop || Trening';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
		}
	}

	public function shoes($subcategory = NULL){
		
		if($subcategory==NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('shoes');
			$data['category'] = "shoes";

			$data['title'] = 'Boxingshop || Obuwie';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
		}
	}

	public function clothes($subcategory = NULL){
		
		if($subcategory == NULL){ // get show subcategories and below recommended products from category...
			$data['productsCategory'] = $this->products->getElementsByCategory('clothes');
			$data['category'] = "clothes";

			$data['title'] = 'Boxingshop || Odzież';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
		}
	}
}
