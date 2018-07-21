<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Globalclass {
	
    public function __construct()
    {
	
    }

    public function get_global_data()
    {
            $CI =& get_instance();
            $CI->load->model('user_model');
            $id = $CI->session->userdata('id');
            if(isset($id)&&$id!=''){
                $CI->user_model->id = $id;
                $user = $CI->user_model->select_user();
                $CI->user_model->id = '';
                $data['user'] = $user[0];
            }else{
               $data['user'] = [];
            }
        return $data;
    }
}