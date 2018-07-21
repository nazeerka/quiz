<?php

class Category_model extends CI_Model{

    var $id;
    var $limit;

    public function select_category(){
        $query = "SELECT * FROM category where true";
        if(isset($this->id))
        $query .=" AND category.id ={$this->id}";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    public function select_top_category(){
        $query = "SELECT * FROM category where true";
        if(isset($this->limit))
        $query .=" limit {$this->limit}";
        $query = $this->db->query($query);
	return $query->result_array();
    }
}
