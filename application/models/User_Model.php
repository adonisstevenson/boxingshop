<?php 

/**
* 
*/
class User_Model extends CI_Model
{
	
	public $id;
	public $login;
	public $password;
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


}