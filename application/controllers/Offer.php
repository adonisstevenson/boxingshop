<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

     public function __construct(){
		parent::__construct();
		$this->load->model('Products_Model', 'products');
		$this->load->model('User_Model', 'user');
	}

   public function show($product){
		if($data['query'] = $this->products->getOfferInfoByName($product)){
			$data['quantity'] = $this->products->getProductQuantityByTitle($product);
			$data['comments'] = $this->products->getOfferCommentsByTitle($product);
			$data['category'] = $this->products->getCategoryBytitle($product);
			$data['title'] = "Boxingshop || ".$data['query']->title;
			$this->load->view('header', $data);
			$this->load->view('productShow');
			$this->load->view('footer');
		}else show_404();
	}

    public function addOpinion($offer_id){
		$this->load->library('form_validation');

		 $this->form_validation->set_rules('comment', 'Content of comment', 'required|min_length[5]|max_length[500]');

		 if(!$this->form_validation->run()){
			 $this->load->library('user_agent');

			 $this->session->set_flashdata('opinion', 'Coś poszło nie po myśli. Upewnij się, że nie pozostawiłeś pustego pola, bądź Twój komentarz jest za długi');
			 redirect($this->agent->referrer());
		 }else{

			 $this->products->author = $this->session->login;
			 $this->products->time = time();
			 $this->products->comment = $this->input->post('comment');
			 $this->products->offer_id = $offer_id;

			 $this->products->addOpinion();

			 $this->load->library('user_agent');
			 $this->session->set_flashdata('opinion_success', 'Komentarz dodany pomyślnie. Dziękujemy za wyrażoną opinie');
			 redirect($this->agent->referrer().'#opinie');

		 }
		
	}

	
}
