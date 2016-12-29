<?php 

/**
* 
*/
class Products_Model extends CI_Model
{
	
	//offers
	public $offer_id;
	public $title;
	public $description;
	public $category;
	public $photo;
	//products
	public $product_id;
	public $status;
	public $ordered_by;


	function __construct()
	{
		parent::__construct();
	}

	
}