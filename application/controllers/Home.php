<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Products_Model', 'products');
		$this->load->model('Carts_Model', 'carts');
		$this->load->model('User_Model', 'user');

	}


	function index()
	{	
		$data['title'] = 'Boxingshop || Home';
		$data['category'] = "index";

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}


	public function findByCategory($category){
		$this->products->category = $category;
		if($category = $this->products->findByCategory()){
			$data['productsCategory'] = $category;
			$data['subCategories'] = $this->products->getSubCategory();
			$data['category'] = $this->products->category;
			
			$data['title'] = 'Boxingshop || Produkty';
			$this->load->view('header', $data);
			$this->load->view('subcategory', $data);
			$this->load->view('footer');
		}else{
			show_404();
		}
	}
	public function showBySubcategory($category, $subcategory){

		$this->products->subcategory_title = $subcategory;
		$subcategory_pl = $this->products->convertTitleToSubCategory();	

		$this->products->category = $category;
		$this->products->subcategory = $subcategory_pl;

		if($checkCat = $this->products->findByCategory() && $data['offers'] = $this->products->findBySubCategory()){ // if inserted category exists
			if($this->input->get('sortby')) $data['offers'] = $this->products->findBySubCategory($this->input->get('sortby'));
			$data['title'] = 'Boxingshop || Produkty';
			$data['subcategory'] = $subcategory_pl;
			$this->load->view('header', $data);
			$this->load->view('category', $data);
			$this->load->view('footer');
		}else show_404();
	}
}
