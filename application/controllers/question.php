<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {
    
//    public function __construct(){
//        parent::__construct();
//        if(!$this->session->userdata['id'])
//            redirect(base_url().'home/log');
//    }

    public function index(){
//        $this->log();
    }
    
    
    public function new_question($id_quiz='') {
        if(!$this->session->userdata['id'])
        redirect(base_url().'home/log');
        $this->load->model('quiz_model');
        $this->quiz_model->id = $id_quiz;
        $data["quiz"]=$this->quiz_model->select_quiz();
//         $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("question/add_question",$data);
        $this->load->view("footer");
    }
    
    public function add_question(){
        if(!$this->session->userdata['id'])
        redirect(base_url().'home/log');
        $this->load->model('quiz_model');
        $quiz_id = $this->input->post("quiz_id");
        $this->load->model('question_model');
        $this->question_model->text = $this->db->escape_str($this->input->post("text"));
//        $this->question_model->text = $this->input->post("text");
        $this->question_model->source = $this->db->escape_str($this->input->post("source"));
        $this->question_model->time = $this->input->post("time");
        $this->question_model->quiz_id = $quiz_id;
        $this->question_model->image = 'question.jpg';
        $id_question = $this->question_model->add_question();
        $this->load->model('answer_model');
        $ans_count = $this->input->post('ans_num');
        for($i=1;$i< $ans_count+1 ;$i++){
            if($this->input->post('answer_'.$i)!=''){
                $this->answer_model->text = $this->input->post('answer_'.$i);
                $this->answer_model->question_id = $id_question;
                $this->answer_model->point = $this->input->post('point_'.$i);
                $this->answer_model->correct = ($this->input->post('correct_'.$i) != "on")?"0":"1";
                $this->answer_model->add_answer();
            }
        }
        $this->load->library('upload');
        $config['upload_path'] = './images/question_img/';
//        $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG';
        $config['max_size'] = '3000';
        $config['max_size'] = '100';
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $id_question;
        $this->upload->initialize($config);
            if ($this->upload->do_upload('imageUpload'))
            {
                $picture = $this->upload->data();
                $this->question_model->image = $picture['orig_name'];
                $this->question_model->id = $id_question;
                $this->question_model->edit_question();
            }
            else
            {
                echo $this->upload->display_errors();
            } 
        redirect(base_url().'question/quiz_question/'.$quiz_id);
    }

    public function show_edit_question($id="") {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->question_model->id = $id;
        $data["question"]=$this->question_model->select_question();
        $this->answer_model->question_id = $data["question"]['0']['id'];
        $data["answer"]=$this->answer_model->select_answer();
//        $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("question/edit_question",$data);
        $this->load->view("footer");
    }
    
    public function quiz_question($id="") {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->question_model->quiz_id = $id;
        $data["quiz"]['0']['id']=$id;
        $data["question"]=$this->question_model->select_question();
        if(!empty($data["question"])){
            $this->answer_model->question_id = $data["question"]['0']['id'];
            $data["answer"]=$this->answer_model->select_answer(); 
        }
//        $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
        $userData = $this->globalclass->get_global_data();
        $this->load->view("header",$userData);
        $this->load->view("question/quiz_questions",$data);
        $this->load->view("footer");
    }
    
    function edit_question(){
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $quiz_id = $this->input->post("quiz_id");
        $this->load->model('question_model');
        $this->question_model->text = $this->db->escape_str($this->input->post("text"));
        $this->question_model->source = $this->db->escape_str($this->input->post("source"));
        $this->question_model->time = $this->input->post("time");
        $this->question_model->id = $this->input->post("question_id");
        $this->question_model->edit_question();
        $this->load->model('answer_model');
        $this->answer_model->question_id = $this->input->post("question_id");
        $this->answer_model->delete_answer();
        $ans_count = $this->input->post('ans_num');
        for($i=1;$i< $ans_count+1 ;$i++){
            if($this->input->post('answer_'.$i)!=''){
                $this->answer_model->text = $this->input->post('answer_'.$i);
                $this->answer_model->point = $this->input->post('point_'.$i);
                $this->answer_model->correct = ($this->input->post('correct_'.$i) != "on")?"0":"1";
                $this->answer_model->add_answer();
            }
        }
        $this->load->library('upload');
        $config['upload_path'] = './images/question_img/';
//        $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG';
        $config['max_size'] = '3000';
        $config['min_size'] = '100';
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->input->post("question_id");
        $this->upload->initialize($config);
            if ($this->upload->do_upload('imageUpload'))
            {
                $picture = $this->upload->data();
                $this->question_model->image = $picture['orig_name'];
                $this->question_model->id = $this->input->post("question_id");
                $this->question_model->edit_question();
            }
            else
            {
                echo $this->upload->display_errors();
            }
        redirect(base_url().'question/quiz_question/'.$quiz_id);
    }
    
    public function delete_question($id='') {
        $this->load->model('question_model');
        $this->load->model('answer_model');
        $this->answer_model->question_id = $id;
        $this->answer_model->delete_answer();
        $this->question_model->id = $id;
        $question=$this->question_model->select_question();
        $this->question_model->delete_question();
        redirect(base_url().'question/quiz_question/'.$question[0]['quiz_id']);
    }
    
    public function duplicate_question($question_id='') {
        if(!$this->session->userdata['id']){
            redirect(base_url().'home/log');
        }
        $this->load->model('quiz_model');
        $this->load->model('question_model');
        $this->question_model->id = $question_id;
        $question = $this->question_model->select_question();
        $this->question_model->text = $this->db->escape_str($question[0]['text']);
        $this->question_model->source = $this->db->escape_str($question[0]['source']);
        $this->question_model->time = $question[0]['time'];
        $this->question_model->quiz_id = $question[0]['quiz_id'];
        $this->question_model->image = 'question.jpg';
        $new_question_id = $this->question_model->add_question();
        $this->load->model('answer_model');
        $this->answer_model->question_id = $question_id;
        $answer = $this->answer_model->select_answer();  
        for($i=0;$i< count($answer) ;$i++){
                $this->answer_model->text = $this->db->escape_str($answer[$i]['text']);
                $this->answer_model->question_id = $new_question_id;
                $this->answer_model->point = $answer[$i]['point'];
                $this->answer_model->correct = $answer[$i]['correct'];
                $this->answer_model->add_answer();
        }
        redirect(base_url().'question/quiz_question/'.$question[0]['quiz_id']);
    }
 
    
}