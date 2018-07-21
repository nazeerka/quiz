<?php

class Answer_model extends CI_Model{
    
    
    var $id;
    var $text;
    var $correct;
    var $point;
    var $question_id;
    
    
    public function select_answer(){
        $query = "SELECT ans.*
                FROM answer ans where true";
        if(isset($this->question_id)&& ($this->question_id)!='')
        $query .=" AND ans.question_id ={$this->question_id}";
        if(isset($this->id)&& ($this->id)!='')
        $query .=" AND ans.id ={$this->id}";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
    
    
    public function add_answer(){
        $query = "INSERT INTO  `sheen`.`answer`
                (
                    text,
                    correct,
                    question_id,
                    point,
                    created_at,
                    updated_at
                )
                VALUES
                (
                    '{$this->text}',
                    '{$this->correct}',
                    '{$this->question_id}',
                    '{$this->point}',
                    CURRENT_TIMESTAMP,
                    CURRENT_TIMESTAMP
                )";	
            $this->db->query($query);
	return $this->db->insert_id();
    }
    
    public function edit_answer(){
        $query = "UPDATE `sheen`.`answer`
                        SET updated_at = CURRENT_TIMESTAMP ";
        if(isset($this->text))
                $query .= " ,text='{$this->text}'";
        if(isset($this->correct))
                $query .= " ,correct='{$this->correct}'";
        if(isset($this->question_id))
                $query .= " ,question_id='{$this->question_id}'";
        if(isset($this->point))
                $query .= " ,point='{$this->point}'";
        $query .= " WHERE id = '{$this->id}'";
        $this->db->query($query);
        return true;
    }

    public function delete_answer(){
        $query ="DELETE  FROM `sheen`.`answer` 
                where true ";
        if($this->id != '')
                $query .= " AND id ='".$this->id."'";
        if($this->question_id != '')
                $query .= " AND question_id ='".$this->question_id."'";
        $this->db->query($query);
        return true;
    }

    
}