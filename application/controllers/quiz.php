<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

//    public function __construct(){
//        parent::__construct();
//        if(!$this->session->userdata['id'])
//            redirect(base_url().'home/log');
//    }

    public function index(){
//        $this->user_quiz();
    }

    public function user_quiz() {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->quiz_model->user_id = $this->session->userdata['id'];
        $data["user_id"]=$this->session->userdata['id'];
        $data["quiz"]=$this->quiz_model->select_quiz();
        $userData = $this->globalclass->get_global_data();
//        $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $this->load->view("header",$userData);
        $this->load->view("quiz/user_quiz",$data);
        $this->load->view("footer");
    }

    public function new_quiz() {
        if(!$this->session->userdata['id'])
            redirect(base_url().'home/log');
        $this->load->model('category_model');
        $data["category"]=$this->category_model->select_category();
        $this->load->model('type_model');
        $data["type"]=$this->type_model->select_type();
        $this->load->model('groups_model');
        $data["groups"]=$this->groups_model->select_groups();
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/add_quiz",$data);
        $this->load->view("footer");
    }

    public function add_quiz(){
        if(!$this->session->userdata['id'])
            redirect(base_url().'home/log');
        $this->load->model('quiz_model');
        $this->quiz_model->title = $this->db->escape_str($this->input->post("title"));
        $this->quiz_model->description = $this->db->escape_str($this->input->post("description"));
        $this->quiz_model->description_full = $this->db->escape_str($this->input->post("description_full"));
        $this->quiz_model->visibility = $this->input->post("visibility");
        $this->quiz_model->source = $this->input->post("source");
        $this->quiz_model->user_id = $this->session->userdata['id'];
        $this->quiz_model->groups_id = $this->input->post("groups_id");
        $this->quiz_model->type_id = $this->input->post("type_id");
        $this->quiz_model->category_id = $this->input->post("category_id");
        $this->quiz_model->image = 'quiz.jpg';
        $id_quiz = $this->quiz_model->add_quiz();

        $this->load->library('upload');
        $config['upload_path'] = './images/quiz_img';
        $config['allowed_types'] = '*';
        $config['max_size'] = '3000';
        $config['min_size'] = '100';
//        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $id_quiz;
        $this->upload->initialize($config);
            if ($this->upload->do_upload('imageUpload'))
            {
                $picture = $this->upload->data();
                $this->quiz_model->image = $picture['orig_name'];
                $this->quiz_model->id = $id_quiz;
                $this->quiz_model->edit_quiz();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        redirect(base_url().'question/new_question/'.$id_quiz);
    }

    public function show_edit_quiz($id="") {
        if(!$this->session->userdata['id'])
            redirect(base_url().'home/log');
        $this->load->model('category_model');
        $data["category"]=$this->category_model->select_category();
        $this->load->model('type_model');
        $data["type"]=$this->type_model->select_type();
        $this->load->model('groups_model');
        $data["groups"]=$this->groups_model->select_groups();
        $this->load->model('quiz_model');
        $this->quiz_model->id = $id;
        $data["quiz"]=$this->quiz_model->select_quiz();
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/edit_quiz",$data);
        $this->load->view("footer");
    }

    function edit_quiz(){
        if(!$this->session->userdata['id'])
            redirect(base_url().'home/log');
        $this->load->model('quiz_model');
        $this->quiz_model->id = $this->input->post("quiz_id");
        $this->quiz_model->title = $this->db->escape_str($this->input->post("title"));
        $this->quiz_model->description = $this->db->escape_str($this->input->post("description"));
        $this->quiz_model->description_full = $this->db->escape_str($this->input->post("description_full"));
        $this->quiz_model->visibility = $this->input->post("visibility");
        $this->quiz_model->source = $this->input->post("source");
        $this->quiz_model->user_id = $this->session->userdata['id'];
        $this->quiz_model->groups_id = $this->input->post("groups_id");
        $this->quiz_model->type_id = $this->input->post("type_id");
        $this->quiz_model->category_id = $this->input->post("category_id");
        $this->quiz_model->edit_quiz();

        $this->load->library('upload');
        $config['upload_path'] = './images/quiz_img';
        $config['allowed_types'] = '*';
        $config['max_size'] = '3000';
        $config['min_size'] = '100';
//        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->input->post("quiz_id");
        $this->upload->initialize($config);
            if ($this->upload->do_upload('imageUpload'))
            {
                $picture = $this->upload->data();
                $this->quiz_model->image = $picture['orig_name'];
                $this->quiz_model->id = $this->input->post("quiz_id");
                $this->quiz_model->edit_quiz();
            }
            else
            {
                echo $this->upload->display_errors();
            }

      redirect(base_url().'quiz/user_quiz');
    }

    public function quiz_details($id='') {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->quiz_model->id = $id;
        $data["quiz"]=$this->quiz_model->select_quiz();
        $this->question_model->quiz_id = $data["quiz"]['0']['id'];
        $data["question"]=$this->question_model->select_question();
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/quiz_details",$data);
        $this->load->view("footer");
    }

    public function delete_quiz($id='') {
        if(!$this->session->userdata['id'])
            redirect(base_url().'home/log');
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->quiz_model->id = $id;
        $question=$this->question_model->select_question();
        for($i=0;$i<count($question);$i++){
            $this->answer_model->question_id = $question[$i]['id'];
            $this->answer_model->delete_answer();
        }
        $this->question_model->quiz_id = $id;
        $this->question_model->delete_question();
        $this->quiz_model->delete_quiz();
        redirect(base_url().'quiz/user_quiz');
    }

    public function quiz_category($category_id=''){
        $this->load->model('quiz_model');
        $this->load->model('category_model');
        $this->quiz_model->category_id = $category_id;
//        $this->category_model->id = $category_id;
        $data['current_category']=$category_id;
        $this->quiz_model->visibility = "public";
        $data["quiz"]=$this->quiz_model->select_quiz();
        $data["category"]=$this->category_model->select_category();
        $this->load->model('type_model');
        $data["type"]=$this->type_model->select_type();
        $this->load->model('groups_model');
        $data["groups"]=$this->groups_model->select_groups();
        if(isset($this->session->userdata['id'])){
            for($i=0;$i< count($data["quiz"]);$i++){
                $this->quiz_model->quiz_id = $data["quiz"][$i]['id'];
                $this->quiz_model->user_id = $this->session->userdata['id'];
                $data["quiz"][$i]['is_favorite'] = $this->quiz_model->IsFavorite();
            }
        }
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/quiz_category",$data);
        $this->load->view("footer");
    }
    
    public function more_category(){
        $this->load->model('category_model');
        $data["category"]=$this->category_model->select_category();
        $userData = $this->globalclass->get_global_data();
//        $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $this->load->view("header",$userData);
        $this->load->view("quiz/more_category",$data);
        $this->load->view("footer");
    }
    
    public function search_quiz(){
        $this->load->model('quiz_model');
        $this->quiz_model->search = $this->input->post("name_search");
        $this->quiz_model->category_id = $this->input->post("category_search");
        $this->quiz_model->type_id = $this->input->post("type_search");
        $this->quiz_model->groups_id = $this->input->post("group_search");
        $this->load->model('category_model');
        $data["category"]=$this->category_model->select_category();
        $this->quiz_model->visibility = "public";
        $data["quiz"]=$this->quiz_model->search_quiz();
        $this->load->model('type_model');
        $data["type"]=$this->type_model->select_type();
        $this->load->model('groups_model');
        $data["groups"]=$this->groups_model->select_groups();
        if(isset($this->session->userdata['id'])){
            for($i=0;$i< count($data["quiz"]);$i++){
                $this->quiz_model->quiz_id = $data["quiz"][$i]['id'];
                $this->quiz_model->user_id = $this->session->userdata['id'];
                $data["quiz"][$i]['is_favorite'] = $this->quiz_model->IsFavorite();
            }
        }
        $data["check_category"]=$this->input->post("category_search");
        $data["check_type"]=$this->input->post("type_search");
        $data["check_groups"]=$this->input->post("group_search");
        $data["search"] = $this->input->post("name_search");
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/result",$data);
        $this->load->view("footer");
    }

    public function search_quiz1(){
        $this->load->model('quiz_model');
        $this->quiz_model->search = $this->input->post("name_search"); 
        $category_search = $this->input->post("category_search");
        if(isset($category_search)&& $category_search!=''){
            $this->quiz_model->category_id = implode(',', $this->input->post("category_search"));
        }
        $type_search = $this->input->post("type_search");
        if(isset($type_search)&& $type_search!=''){
          $this->quiz_model->type_id = implode(',', $this->input->post("type_search"));
        }
        $group_search = $this->input->post("group_search");
        if(isset($group_search)&& $group_search!=''){
          $this->quiz_model->groups_id = implode(',', $this->input->post("group_search"));
        }
        $this->quiz_model->visibility = "public";
        $quiz=$this->quiz_model->search_quiz();
        if(isset($this->session->userdata['id'])){
            for($i=0;$i< count($quiz);$i++){
                $this->quiz_model->quiz_id = $quiz[$i]['id'];
                $this->quiz_model->user_id = $this->session->userdata['id'];
                $quiz[$i]['is_favorite'] = $this->quiz_model->IsFavorite();
            }
        }
        echo json_encode($quiz);
    }
    
    public function add_favourite_quiz(){
        $this->load->model('quiz_model');
        $this->quiz_model->user_id = $this->session->userdata['id'];
        $this->quiz_model->quiz_id = $this->input->post("quiz_id");
        $data=$this->quiz_model->add_favourite_quiz();
        if($data){
        echo TRUE;
        }else {
            echo FALSE;
        }
    }
    
    public function delete_favourite_quiz(){
        $this->load->model('quiz_model');
        $user_id = $this->session->userdata['id'];
        $quiz_id = $this->input->post("quiz_id");
        $data = FALSE;
        if(isset($user_id)&&($user_id!='')&&isset($quiz_id)&&($quiz_id!='')){
            $this->quiz_model->user_id = $user_id;
            $this->quiz_model->quiz_id = $quiz_id;
            $this->quiz_model->delete_favourite_quiz();
            $data=TRUE;
        }
        echo $data;
    }
    
    public function user_favourite_quiz(){
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->quiz_model->user_id = $this->session->userdata['id'];
        $data["quiz"]=$this->quiz_model->select_favourite_quiz();
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/favourite_quiz",$data);
        $this->load->view("footer");
    }
    
    public function quiz_full_details($id='') {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->quiz_model->id = $id;
        $data["quiz"]=$this->quiz_model->select_quiz();
        $this->question_model->quiz_id = $data["quiz"]['0']['id'];
        $data["question"]=$this->question_model->select_question();
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("quiz/quiz_full_details",$data);
        $this->load->view("footer");
    }

}
