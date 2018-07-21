<?php

class User_model extends CI_Model{
    
    
    var $id;
    var $user_name;
    var $first_name;
    var $last_name;
    var $password;
    var $email;

    public function log_in(){
    		$query ="SELECT * from `sheen`.`user`
			where user_name ='{$this->user_name}'
			and password ='{$this->password}'LIMIT 1";
		$query =$this->db->query($query);
	return $query->result_array();
    }
    
    public function can_log_in(){
            $query = "SELECT * FROM `sheen`.`user` 
                        where user_name = '{$this->user_name}'
                        and password = '{$this->password}'";
            $query = $this->db->query($query);
            if($query->num_rows() == 1)
                    return true;
            else
                    return false;
    }

    public function select_user(){
        $query ="SELECT * from `sheen`.`user`where true ";
            if($this->id != '')
                    $query .="AND id ='{$this->id}'";
            if($this->password != '')
                    $query .="AND password ='{$this->password}'";
            $query =$this->db->query($query);
            return $query->result_array();
    }
    
    public function add_user(){
            $query = "INSERT INTO  `sheen`.`user`
                    (
                        user_name,
                        password,
                        first_name,
                        last_name,
                        email,
                        created_at
                    )
                    VALUES
                    (
                        '{$this->user_name}',
                        '{$this->password}',
                        '{$this->first_name}',
                        '{$this->last_name}',
                        '{$this->email_name}',
                         CURRENT_TIMESTAMP
                    )";	
            $this->db->query($query);
            return $this->db->insert_id();	
    }
    public function edit_user(){
            $query ="UPDATE `sheen`.`user` SET id = '{$this->id}'";
            if(isset($this->user_name))
                    $query .= " ,user_name='{$this->user_name}'";
            if(isset($this->first_name))
                    $query .= " ,first_name='{$this->first_name}'";
            if(isset($this->last_name))
                    $query .= " ,last_name='{$this->last_name}'";
            if(isset($this->email))			
                    $query .= " ,email='{$this->email}'";
            if(isset($this->image_profile))			
                    $query .= " ,image_profile='{$this->image_profile}'";
            if(isset($this->password) && $this->password !='')
                    $query .= " ,password='{$this->password}'";
            $query .= " WHERE id = '{$this->id}'";
            $this->db->query($query);
        return true;
    }
    
}