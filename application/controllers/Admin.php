<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if(!$this->session->has_userdata('rank') && $this->session->rank!="admin"){
            redirect('/');
        }
		$this->load->model('Products_Model', 'products');
		$this->load->model('user_Model', 'user');
	}

	function index()
	{	
		$data['title'] = 'Boxingshop || Panel Administracyjny';
		$this->load->view('header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('footer');
	}

	
}
