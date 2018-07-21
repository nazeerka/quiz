<?php

class Type_model extends CI_Model{

    var $id;
    
    public function select_type(){
        $query = "SELECT * FROM type where true";
        $query = $this->db->query($query);
	return $query->result_array();
    }
}