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
	//opinions
	public $id;
	public $comment;
	public $author;
	public $time;


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
		$offer_id = $this->getOfferIdByTitle(urldecode($title));

		$this->db->where('offer_id', $offer_id);
		$this->db->from('products');

		$result = $this->db->count_all_results();
		return $result;
	}

	public function getOfferIdByTitle($title){
		$title = urldecode($title);

		$query = $this->db->get_where('offers', array('title'=>$title))->row();
		$offer_id = $query->id;

		return $offer_id;
	}

	public function getOfferCommentsByTitle($title){

		$id = $this->getOfferIdByTitle(urldecode($title));


		$comments = $this->db->get_where('comments', array('offer_id'=>$id));

		return $comments;

	}

	public function addOpinion(){
		$insert = $this->db->insert('comments', array('offer_id'=>$this->offer_id, 'comment'=>$this->comment, 'author'=>$this->author, 'date'=>$this->time));
	}
}