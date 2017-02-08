<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

        public function __construct(){
		parent::__construct();
        
		$this->load->model('Carts_Model', 'cart');
        $this->load->model('Products_Model', 'products');
        $this->load->model('User_Model', 'user');
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
           if($this->session->has_userdata('login')) $user = $this->session->login;
                    
        elseif(!get_cookie('userID')){ // if cookie user doesn' exists
                $user = $this->user->createCookieUserWithID();
                setcookie('userID', $id, time()+30000);

       }elseif(get_cookie('userID')) $user = get_cookie('userID');

       
               $this->products->offer_id = $this->input->post('offer_id');
               $this->products->quantity = $this->input->post('quantity');
               $this->products->status = "ordered";
               $this->products->ordered_by = $user;

               $this->products->setOrderedBy();

               $this->cart->offer_id = $this->input->post('offer_id');
               $this->cart->owner = $user;
               $this->cart->quantity = $this->input->post('quantity');
               $this->cart->addItems();
                    
               $this->load->library('user_agent');
               $this->session->set_flashdata('cart_success', "Przedmioty dodane do koszyka pomyślnie");
               redirect($this->agent->referrer());

   }

   }
   public function getCartList(){
       if($this->session->has_userdata('login')){//logged in user
            $this->cart->owner = $this->session->login;
            $data['cart'] = $this->cart->getCartItemsByLogin();

            $this->load->view('Load/Cart', $data);
       }elseif(get_cookie('userID')){
           $this->cart->owner = get_cookie('userID');
           $data['cart'] = $this->cart->getCartItemsByLogin();

           $this->load->view('Load/Cart', $data);
       }else{
           $this->load->view('Load/Cart');
       }
   }

   public function deleteSelectedItems(){
       $data = json_decode(stripslashes($_POST['data']));

       if(!empty($data)){
           if(!$this->session->has_userdata('login')){
           $this->cart->owner = get_cookie('userID');

           if($this->cart->deleteFromCartByArray($data)){
               echo "Dane zostały pomyślnie usunięte";
           } else "Wystąpił błąd: Dane nie mogły zostać usunięte na etapie aktualizowania ich statusu";

           }else{
           
           $this->cart->owner = $this->session->login;

           if($this->cart->deleteFromCartByArray($data)){
               echo "Dane zostały pomyślnie usunięte";
           } else "Wystąpił błąd: Dane nie mogły zostać usunięte na etapie aktualizowania ich statusu";
           
           }
       }else echo "Nie ma co usuwać";
   }

   public function buyProducts(){
       foreach (array_combine($_POST['check'], $_POST['quantity']) as $check=>$quantity) {
           echo $check." ".$quantity.'<br>';
       }
   }

	
}
