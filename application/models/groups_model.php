<?php

class Groups_model extends CI_Model{
    
    var $id;
    
    
    public function select_groups(){
        $query = "SELECT * FROM groups where true";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
}