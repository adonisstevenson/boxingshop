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

	public function getElementsByCategory($category){

		$query = $this->db->get_where('offers', array('category' => $category), 12, 0);

		return $query;
	}
}