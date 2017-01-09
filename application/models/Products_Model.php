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

	public function getOfferInfoByName($name){

		$query = $this->db->get_where('offers', array('title'=>urldecode($name)));
		if($query->num_rows()>0){
			$result = $query->row();

			return $result;
		}else return FALSE;
	}

	public function getProductQuantityByTitle($title){
		//getting the id of offer by title
		$this->db->select('id');
		$query = $this->db->get_where('offers', array('title'=>urldecode($title)))->row();
		$offer_id = $query->id;

		$this->db->where('offer_id', $offer_id);
		$this->db->from('products');

		$result = $this->db->count_all_results();
		return $result;
	}
}