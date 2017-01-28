<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

        public function __construct(){
		parent::__construct();
        
		$this->load->model('Carts_Model', 'cart');
        $this->load->model('Products_Model', 'products');
	}

   function index(){

   }
   public function addItem(){
       $this->load->library('form_validation');
	   $this->form_validation->set_rules('quantity', 'Number of items', 'required|integer|less_than['.$this->input->post('max_quantity').']');

       if(!$this->form_validation->run()){
           $this->load->library('user_agent');
		   redirect($this->agent->referrer());
       }else{
           if($this->session->has_userdata('login')){
               //select all selected products as ordered by
               $this->products->offer_id = $this->input->post('offer_id');
               $this->products->quantity = $this->input->post('quantity');
               $this->products->status = "ordered";
               $this->products->ordered_by = $this->session->login;

               $this->products->setOrderedBy();

                    $this->cart->offer_id = $this->input->post('offer_id');
                    $this->cart->owner = $this->session->login;
                    $this->cart->addItems();
                    
                    $this->load->library('user_agent');
                    $this->session->set_flashdata('cart_success', "Przedmioty dodane do koszyka pomyślnie");
                    redirect($this->agent->referrer());

           }else{
               echo "cookie user";
           }
       }

   }

	
}
