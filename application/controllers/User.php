<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

        public function __construct(){
		parent::__construct();
        
		$this->load->model('Products_Model', 'products');
		$this->load->model('User_Model', 'user');
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
			 $rank = $this->user->checkRankByName();
			 	$userdata = array(
					 	'login'=>$this->input->post('login'),
						'password'=>$this->input->post('password'),
						'logged_in'=>TRUE,
						'rank'=>$rank
				 );

				 $this->session->set_userdata($userdata);

			 $this->load->library('user_agent');
			 redirect($this->agent->referrer());
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
			$this->session->unset_userdata('rank');
			 redirect('/');
		}else{
			show_404();
		}
	}

	
}
