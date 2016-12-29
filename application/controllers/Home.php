<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	function index()
	{	
		$data['title'] = 'Boxingshop || Home';
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

}
