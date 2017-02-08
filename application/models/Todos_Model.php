<?php 

/**
* 
*/
class Todos_Model extends CI_Model
{
	
	public $id;
	public $content;

	function __construct()
	{
		parent::__construct();
	}

	public function getAllTodos(){
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $get = $this->db->get('todos');

        return $get;
    }
    public function delTodoByID(){

        $this->db->where('id', $this->id);
        if($this->db->delete('todos')){
            return TRUE;
        }else return FALSE;

    }
    public function addTodo(){

        $this->db->set('content', $this->content);
        $this->db->insert('todos');

        
        return $this->db->insert_id();
    }
}