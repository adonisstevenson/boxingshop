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
	public $subcategory;
	public $photo;
	public $current_price;
	public $previous_price;
	//products
	public $product_id;
	public $quantity;
	public $status;
	public $ordered_by;
	//opinions
	public $comment_id;
	public $comment;
	public $author;
	public $time;
	//categories
	public $category_id;
	public $category_name;
	public $subcategory_title;

	function __construct()
	{
		parent::__construct();
	}

	public function getElementsByCategory($category){

		$query = $this->db->get_where('offers', array('category' => $category), 12, 0);

		return $query;
	}

	public function getElementsBySubCategory($subcategory){

		$query = $this->db->get_where('offers', array('subcategory' => $subcategory), 12, 0);

		return $query;
	}

	public function insertOffer(){
		$offerData = array(
						'title'=>$this->title,
						'description'=>$this->description,
						'category'=>$this->category,
						'subcategory'=>$this->subcategory,
						'photo'=>$this->photo,
						'current_price'=>$this->current_price
						);

		if($query = $this->db->insert('offers', $offerData)){
			$this->offer_id = $this->getOfferIdByTitle($this->title);
			$productData = array(
							'offer_id'=>$this->offer_id,
							'status'=>"available"
						);

			for ($i=0; $i <= $this->quantity ; $i++) { 
				$insertProducts = $this->db->insert('products', $productData);
			}

			return TRUE;
		}else return FALSE;

	}

	public function getOfferInfoByName($name){

		$query = $this->db->get_where('offers', array('title'=>urldecode($name)));
		if($query->num_rows()>0){
			$result = $query->row();

			return $result;
		}else return FALSE;
	}

	public function getOfferInfoById(){

		$query = $this->db->get_where('offers', array('id'=>$this->offer_id));
		if($query->num_rows()>0){
			$result = $query->row();

			return $result;
		}else return FALSE;
	}

	public function getProductQuantityByTitle($title){
		//getting the id of offer by title
		$offer_id = $this->getOfferIdByTitle(urldecode($title));

		$this->db->where('offer_id', $offer_id);
		$this->db->where('status', "available");
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
	
	public function getCategoryByTitle($title){
		$title = urldecode($title);

		$query = $this->db->get_where('offers', array('title'=>$title))->row();
		$category = $query->category;

		return $category;
	}

	public function deleteCommentById(){

		$del = $this->db->delete('comments', array('id'=>$this->comment_id));
		return TRUE;
	}

	public function deleteOfferById(){
		$deleteOffer = $this->db->delete('offers', array('id'=>$this->offer_id));
		$deleteProducts = $this->db->delete('products', array('offer_id'=>$this->offer_id));

	}
	public function getProductsQuantityById(){

		$this->db->where('offer_id', $this->offer_id);
		$this->db->where('status', 'available');
		$this->db->from('products');

		$result = $this->db->count_all_results();
		return $result;
	}
	public function editOffer(){
		$actualQuantity = $this->getProductsQuantityById();
		$previousPrice = $this->getOfferPriceById();
		if($previousPrice == $this->current_price){
			$previousPrice = NULL;
		}
		$inputedQuantity = $this->quantity;

		$dataToUpdate = array(
        'title' => $this->title,
        'description' => $this->description,
		'category'=>$this->category,
		'subcategory'=>$this->subcategory,
		'photo'=>$this->photo,
		'current_price'=>$this->current_price,
		'previous_price'=>$previousPrice
		);

		$this->db->where('id', $this->offer_id);
		$this->db->update('offers', $dataToUpdate);

		if($actualQuantity > $inputedQuantity){
			 $quantity = $actualQuantity - $inputedQuantity; //minus ... products
				 $this->db->limit($quantity);
				 $del =  $this->db->delete('products', array('offer_id'=>$this->offer_id));
		}
		elseif($actualQuantity < $inputedQuantity){
			 $quantity = $inputedQuantity - $actualQuantity; // plus ... products
			 for ($i=1; $i <=$quantity ; $i++) { 
				  $insert = $this->db->insert('products', array('offer_id'=>$this->offer_id, 'status'=>"available"));
			 }
			 
		}
		elseif($inputedQuantity == 0){
				$del =  $this->db->delete('products', array('offer_id'=>$this->offer_id));
			}

	

		return TRUE;
	}

	public function getOfferPriceById(){
		$query = $this->db->get_where('offers', array('id'=>$this->offer_id))->row();
		$price = $query->current_price;

		return $price;
	}
	public function convertTitleToSubCategory(){
		$convert = $this->db->get_where('subcategories', array('title'=>$this->subcategory_title));
		$result = $convert->row();

		return $result->subcategory;
	}
	public function findByCategory(){
		//$this->category_name;

		$check = $this->db->get_where('categories', array('category'=>$this->category));

		if($check->num_rows()>0){

		$offers = $this->getElementsByCategory($this->category);

		return $offers;
			
		}else return FALSE;
	}
	public function findBySubCategory($order=NULL){
			
		$check = $this->db->get_where('subcategories', array('subcategory'=>$this->subcategory));

		if($check->num_rows()>0){
			if($order!=NULL){

			if($order == "title") $this->db->order_by($order);
			elseif ($order == "title desc") $this->db->order_by('title', 'DESC');
			elseif ($order == "current_price") $this->db->order_by($order);
			elseif ($order == "current_price desc") $this->db->order_by('current_price', 'DESC');

		}

		$offers = $this->getElementsBySubCategory($this->subcategory);

		return $offers;
			
		}else return FALSE;
	}
	public function getSubCategory(){
		
		$get = $this->db->get_where('subcategories', array('category'=>$this->category));

		return $get;
	}
	public function setOrderedBy(){

		$data = array(
					'status'=>$this->status,
					'ordered_by'=>$this->ordered_by

						);
		
		$this->db->where('offer_id', $this->offer_id);
		$this->db->where('status', "available");
		$this->db->limit($this->quantity);
		if($this->db->update('products', $data)){
			return TRUE;
		}else return FALSE;
	}
}