<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->main_page();
    }

    public function main_page(){
        $this->load->model('category_model');
        $this->category_model->limit = '6';
        $data["category"]=$this->category_model->select_category();
        $data["categories"]=$this->category_model->select_top_category();
        $this->load->model('type_model');
        $data["type"]=$this->type_model->select_type();
        $this->load->model('groups_model');
        $data["groups"]=$this->groups_model->select_groups();
        $userData = $this->globalclass->get_global_data();
//        $data1["user_id"]=(isset($this->session->userdata['id']))?$this->session->userdata['id']:NULL;
//        $data1["user_id"]=$this->session->userdata['id'];
        $this->load->view("header",$userData);
        $this->load->view("main_page",$data);
        $this->load->view("footer");
    }

    public function log() {
        $this->load->view('login_view');
    }

    public function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name','User Name','required|trim|xss_clean|callback_validate_credintials');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean|callback_validate_credintials');
        if($this->form_validation->run())
        {
            $this->load->model('user_model');
            $this->user_model->user_name = $this->input->post('user_name');
            $this->user_model->password = $this->input->post('password');
            $user = $this->user_model->log_in();
            if(isset($user[0]))
                {
                $data = array(
                            'id' => $user[0]['id'],
                            'user_name' => $user[0]['user_name']
                 );
                $this->session->set_userdata($data);
                    redirect('quiz/user_quiz');
            }
            else{
                $result['error'] = "Incorrect User Name/Password";
                $this->load->view("login_view",$result);
            }
        }
        else
        {
            $this->load->view("login_view");
        }

    }

    public function register_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name2','User Name','required|trim|xss_clean|callback_validate_credintials');
        $this->form_validation->set_rules('password2','Password','required|trim|xss_clean|callback_validate_credintials');
        $this->form_validation->set_rules('firstname','First Name','required|trim|xss_clean|callback_validate_credintials');
        $this->form_validation->set_rules('lastname','Last Name','required|trim|xss_clean|callback_validate_credintials');
        $this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credintials');
        if($this->form_validation->run())
        {
            $this->load->model('user_model');
            $this->user_model->user_name = $this->input->post('user_name2');
            $this->user_model->password = $this->input->post('password2');
            $user = $this->user_model->log_in();
            if(isset($user[0]))
            {
                $result['error2'] = "This name taken by a nother one...";
                $this->load->view("login_view",$result);
//                redirect('quiz/user_quiz');
            }else{
                $this->user_model->user_name = $this->input->post('user_name2');
                $this->user_model->password = $this->input->post('password2');
                $this->user_model->first_name = $this->input->post('first_name');
                $this->user_model->last_name = $this->input->post('last_name');
                $this->user_model->email = $this->input->post('email');
                $user = $this->user_model->add_user();
                $this->user_model->id = $user;
                $user1 = $this->user_model->select_user();
//                        print_r($user);
                $data = array(
                            'id' => $user1[0]['id'],
                            'user_name' => $user1[0]['user_name']
                        );
                $this->session->set_userdata($data);
                 redirect('quiz/user_quiz');
            }
        }
        else
        {
            $this->load->view("login_view");
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
//        $this->load->view("login_view");
        redirect(base_url().'home/main_page/');
    }
    
    public function profile(){
        if(!$this->session->userdata['id'])
        redirect(base_url().'home/log');
        $userData = $this->globalclass->get_global_data();
        $data["page"] = "Manage User";
        $this->load->view('header',$userData);
        $this->load->view('user_profile',$data);
        $this->load->view('footer');
    }
    
    public function validate_password(){
        $this->load->model("user_model");
        $this->user_model->id = $this->session->userdata['id'];
        $this->user_model->password = $this->input->post("password");
        $user = $this->user_model->select_user();
        if(count($user)>0)
                echo true;
        else
                echo false;
    }
    
    public function change_password(){
        $this->load->model("user_model");
        $this->user_model->id = $this->session->userdata['id'];
        $this->user_model->password = $this->input->post("password");
        echo $this->user_model->edit_user();
    }
    
    public function update_info(){
        $this->load->model("user_model");
        $this->user_model->id = $this->session->userdata['id'];
        $this->user_model->user_name = $this->input->post("user_name");
        $this->user_model->first_name = $this->input->post("first_name");
        $this->user_model->last_name = $this->input->post("last_name");
        $this->user_model->email = $this->input->post("email");
        $this->user_model->id_user = $this->session->userdata['id'];
        $this->user_model->edit_user();
     
        $this->load->library('upload');
            $config['upload_path'] = './images/image_profile/';
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $this->session->userdata['id'];
            $this->upload->initialize($config);
                    if ($this->upload->do_upload('imageUpload'))
                    {
                        $picture = $this->upload->data();
                        $this->user_model->image_profile = $picture['orig_name'];
                        $this->user_model->edit_user();
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
        redirect(base_url().'home/profile');
    }

}
