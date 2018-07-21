<?php

class Quiz_model extends CI_Model{
    
    
    var $id;
    var $quiz_id;
    var $description;
    var $description_full;
    var $visibility;
    var $source;
    var $user_id;
    var $groups_id;
    var $category_id;
    var $type_id;
    var $image;
    var $limits;
    
    public function select_quiz(){
        $query = "SELECT qz.* , u.user_name AS user_name, u.image_profile AS user_image,
            ( SELECT COUNT(*)
            FROM  favourite_quiz where favourite_quiz.quiz_id = qz.id
            ) AS count_favorite,
            ( SELECT COUNT(*)
            FROM   played_quiz where played_quiz.quiz_id = qz.id
            ) AS count_played,
            ( SELECT COUNT(*)
            FROM question where question.quiz_id = qz.id
            ) AS count_question
            FROM quiz qz
            LEFT JOIN `user` u ON (qz.user_id = u.id)
            where true";
        if(isset($this->user_id)&& ($this->user_id)!='')
            $query .=" AND qz.user_id ={$this->user_id}";
        if(isset($this->visibility))
            $query .=" AND qz.visibility ='{$this->visibility}'";
        if(isset($this->id))
            $query .=" AND qz.id ={$this->id}";
        if(isset($this->category_id))
            $query .=" AND qz.category_id ={$this->category_id}";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
    public function search_quiz(){
            $query = "SELECT qz.* , u.user_name AS user_name, u.image_profile AS user_image,
            ( SELECT COUNT(*)
            FROM favourite_quiz where favourite_quiz.quiz_id = qz.id
            ) AS count_favorite,
            ( SELECT COUNT(*)
            FROM played_quiz where played_quiz.quiz_id = qz.id
            ) AS count_played,
            ( SELECT COUNT(*)
            FROM question where question.quiz_id = qz.id
            ) AS count_question
            FROM quiz qz
            LEFT JOIN `user` u ON (qz.user_id = u.id)
            where true";
        if(isset($this->visibility))
            $query .=" AND qz.visibility ='{$this->visibility}'";
        if(isset($this->search)&& ($this->search)!='')
            $query .=" AND qz.title like '%{$this->search}%'";
        if(isset($this->category_id)&& ($this->category_id)!='')
            $query .=" AND qz.category_id IN ({$this->category_id})";
        if(isset($this->type_id)&& ($this->type_id)!='')
            $query .=" AND qz.type_id IN ({$this->type_id})";
        if(isset($this->groups_id)&& ($this->groups_id)!='')
            $query .=" AND qz.groups_id IN ({$this->groups_id})";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
    public function add_quiz(){
        $query = "INSERT INTO  `sheen`.`quiz`
                (
                    title,
                    description,
                    description_full,
                    visibility,
                    source,
                    user_id,
                    groups_id,
                    type_id,
                    category_id,
                    created_at,
                    updated_at
                )
                VALUES
                (
                    '{$this->title}',
                    '{$this->description}',
                    '{$this->description_full}',
                    '{$this->visibility}',
                    '{$this->source}',
                    '{$this->user_id}',
                    '{$this->groups_id}',
                    '{$this->type_id}',
                    '{$this->category_id}',
                    CURRENT_TIMESTAMP,
                    CURRENT_TIMESTAMP
                )";
            $this->db->query($query);
	return $this->db->insert_id();
    }
    
    public function edit_quiz(){
        $query = "UPDATE `sheen`.`quiz`
                        SET updated_at = CURRENT_TIMESTAMP ";
        if(isset($this->title))
                $query .= " ,title='{$this->title}'";
        if(isset($this->description))
                $query .= " ,description='{$this->description}'";
        if(isset($this->description_full))
                $query .= " ,description_full='{$this->description_full}'";
        if(isset($this->visibility))
                $query .= " ,visibility='{$this->visibility}'";
        if(isset($this->source))
                $query .= " ,source='{$this->source}'";	
        if(isset($this->groups_id))
                $query .= " ,groups_id='{$this->groups_id}'";
        if(isset($this->type_id))
            $query .= " ,type_id='{$this->type_id}'";
        if(isset($this->category_id))
            $query .= " ,category_id='{$this->category_id}'";
        if(isset($this->image))
                $query .= " ,image='{$this->image}'";
        $query .= " WHERE id = '{$this->id}'";
        $this->db->query($query);
        return true;
    }
    
    public function delete_quiz(){
        $query = "DELETE FROM `sheen`.`quiz` where id IN({$this->id})";
        $this->db->query($query);
        return true;
    }
    
        public function add_favourite_quiz(){
        $query = "INSERT INTO  `sheen`.`favourite_quiz`
                (
                    user_id,
                    quiz_id,
                    created_at
                )
                VALUES
                (
                    '{$this->user_id}',
                    '{$this->quiz_id}',
                    CURRENT_TIMESTAMP
                )";
            $this->db->query($query);
	return $this->db->insert_id();
    }
    
    public function delete_favourite_quiz(){
        $query ="DELETE  FROM `sheen`.`favourite_quiz`
                where true ";
        if($this->user_id != '')
                $query .= " AND user_id ='".$this->user_id."'";
        if($this->quiz_id != '')
                $query .= " AND quiz_id ='".$this->quiz_id."'";
        $this->db->query($query);
        return true;
    }
    
    public function select_favourite_quiz(){
        $query = "SELECT qz.* , u.user_name AS user_name, u.image_profile AS user_image,
                ( SELECT COUNT(*)
                FROM  favourite_quiz where favourite_quiz.quiz_id = qz.id
                ) AS count_favorite,
                ( SELECT COUNT(*)
                FROM   played_quiz where played_quiz.quiz_id = qz.id
                ) AS count_played
                FROM quiz qz
                LEFT JOIN `user` u ON (qz.user_id = u.id)
                 where qz.id IN(SELECT DISTINCT fq.quiz_id from `sheen`.`favourite_quiz` fq where true and fq.user_id = '{$this->user_id}')";
//        $query ="SELECT q.*
//                FROM quiz q
//                    where q.id IN(SELECT DISTINCT fq.quiz_id from `sheen`.`favourite_quiz` fq where true and fq.user_id = '{$this->user_id}')";
        $query = $this->db->query($query);
	return $query->result_array();
    }
    
    public function IsFavorite(){
        $query = "SELECT fq.* FROM `sheen`.`favourite_quiz` fq 
                    where fq.user_id = '{$this->user_id}' AND fq.quiz_id = '{$this->quiz_id}'";
        $query = $this->db->query($query);
        if($query->num_rows() >= 1)
                return "favorite";
        else
                return "favorite_border";
    }
    
    
}