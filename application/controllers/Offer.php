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
			$this->products->brand = $data['query']->brand;
			$this->products->subcategory = $data['query']->subcategory;
			$data['similar'] = $this->products->getSimilarOffers();
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

	public function addVoteUp($offerID){
		if(!get_cookie('has_voted_'.$offerID)){ // if user hasn't voted'
			setcookie('has_voted_'.$offerID, 'up', time() + (86400 * 30), "/");

			$this->products->offer_id = $offerID;
			if($this->products->addVoteUp()){
				echo 1;
			}

		}elseif(get_cookie('has_voted_'.$offerID) && get_cookie('has_voted_'.$offerID) == 'down'){ // user has voted down, but he press vote up. So we can say that he never voted
			delete_cookie('has_voted_'.$offerID);
			$this->products->offer_id = $offerID;
			if($this->products->delVoteDown()){
				echo 0;
			}
		}
	}

	public function addVoteDown($offerID){
		
		if(!get_cookie('has_voted_'.$offerID)){ // if user hasn't voted'
			setcookie('has_voted_'.$offerID, 'down', time() + (86400 * 30), "/");

			$this->products->offer_id = $offerID;
			if($this->products->addVoteDown()){
				echo 1;
			}
		}elseif(get_cookie('has_voted_'.$offerID) && get_cookie('has_voted_'.$offerID) == 'up'){ // user has voted up, but he press vote up. So we can say that he never voted
				delete_cookie('has_voted_'.$offerID);
				$this->products->offer_id = $offerID;
				if($this->products->delVoteUp()) echo 0;

			}

		
	}
	
}
