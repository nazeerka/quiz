<?php

class Question_model extends CI_Model{
    
    
    var $id;
    var $description;
    var $visibility;
    var $source;
    var $user_id;
    var $quiz_id;
    var $image;
    
    
    public function select_question(){
        $query = "SELECT qu.*
                FROM question qu where true";
        if(isset($this->quiz_id)&& ($this->quiz_id)!='')
        $query .=" AND qu.quiz_id ={$this->quiz_id}";
        if(isset($this->id)&& ($this->id)!='')
        $query .=" AND qu.id ={$this->id}";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
    public function add_question(){
        $query = "INSERT INTO  `sheen`.`question`
                (
                    text,
                    source,
                    time,
                    quiz_id,
                    image,
                    created_at,
                    updated_at
                )
                VALUES
                (
                    '{$this->text}',
                    '{$this->source}',
                    '{$this->time}',
                    '{$this->quiz_id}',
                    '{$this->image}',
                    CURRENT_TIMESTAMP,
                    CURRENT_TIMESTAMP
                )";
            $this->db->query($query);
	return $this->db->insert_id();
    }
    
    public function edit_question(){
        $query = "UPDATE `sheen`.`question`
                        SET updated_at = CURRENT_TIMESTAMP ";
        if(isset($this->text))
                $query .= " ,text='{$this->text}'";
        if(isset($this->source))
                $query .= " ,source='{$this->source}'";
        if(isset($this->time))
                $query .= " ,time='{$this->time}'";
        if(isset($this->quiz_id))
                $query .= " ,quiz_id='{$this->quiz_id}'";
        if(isset($this->image))
                $query .= " ,image='{$this->image}'";	
        $query .= " WHERE id = '{$this->id}'";
        $this->db->query($query);
        return true;
    }
    
    public function delete_question(){
        $query ="DELETE  FROM `sheen`.`question` 
        where true ";
        if($this->id != '')
                $query .= " AND id ='".$this->id."'";
        if($this->quiz_id != '')
                $query .= " AND quiz_id ='".$this->quiz_id."'";
        $this->db->query($query);
        return true;
    }
    
}