<?php 

/**
* 
*/
class Carts_Model extends CI_Model
{
	
	public $id;
	public $product_id;
	public $offer_id;
	public $owner;

	function __construct()
	{
		parent::__construct();
	}


}