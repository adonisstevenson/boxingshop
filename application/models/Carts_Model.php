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

	public function getCartItemsQuantityByLogin(){
		$this->db->select('id');
		$query = $this->db->get_where('carts', array('owner'=>$this->owner)); 

		return $query->num_rows();
	}


}