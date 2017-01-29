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
	public $quantity;

	function __construct()
	{
		parent::__construct();
	}

	public function getCartItemsQuantityByLogin(){
		$this->db->select('id');
		$query = $this->db->get_where('carts', array('owner'=>$this->owner)); 

		return $query->num_rows();
	}
	public function addItems(){

		$products = $this->db->get_where('products', array('ordered_by'=>$this->owner, 'offer_id'=>$this->offer_id));
		$this->db->select('id');
		$this->db->where('ordered_by', $this->owner);
		$this->db->where('offer_id', $this->offer_id);
		$get = $this->db->get('products');

		foreach ($get->result() as $row){
			$this->db->set('owner', $this->owner);
			$this->db->set('offer_id', $this->offer_id);
			$this->db->set('product_id', $row->id);
			$this->db->set('quantity', $this->quantity);
			$this->db->insert('carts');
		}

	}
	public function getCartItemsByLogin(){

		$this->db->distinct();
		$this->db->select('carts.quantity, offers.title, offers.current_price, carts.offer_id');
		$this->db->where('owner', $this->owner);
		$this->db->from('carts');
		$this->db->join('offers', 'offers.id = carts.offer_id');
		$get = $this->db->get();

		return $get;
	}

}