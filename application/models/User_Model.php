<?php 

/**
* 
*/
class User_Model extends CI_Model
{
	
	public $id;
	public $login;
	public $password;
	public $rank;
	public $first_name;
	public $last_name;
	public $city;
	public $street;
	public $street_nr;
	public $flat;
	public $email;
	public $phone_number; 

	function __construct()
	{
		parent::__construct();
	}

	public function auth(){
		$query = $this->db->get_where('users', array('login'=>$this->login, 'password'=>$this->password));
		if($query->num_rows() > 0){ // if exsists
			return TRUE;
		}else return FALSE; //if not exists
	}

	public function checkRankByName(){
		$query = $this->db->get_where('users', array('login'=>$this->login))->row();
		$rank = $query->rank;
		
		return $rank;
	}
}