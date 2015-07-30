<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load the login model
        $this->load->model('login_model');
        $this->load->model('role_model');
    }

    public function index()
    {
        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");


        
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            
            $data['title'] = 'un titre';
            $data['view'] = 'back/login_view';
            $data['show_header'] = TRUE;
            $this->load->view('back/login_view', $data);

        } else {

            
            if ($this->input->post('btn_login') == "Login") {
                
                $usr_result = $this->login_model->get_user($username, $password);
                if (count($usr_result) > 0) { 
                    $ip = $this->input->ip_address();
                    $sessiondata = array(
                        'login' => $username,
                        'is_logged_in' => true,
                        'ip' => $ip,
                        'role' => $usr_result['role_label'],
                        'user_id' => $usr_result['user_id']
                    );
                    $this->session->set_userdata($sessiondata);
                    $now = new DateTime();
                    $toDay = $now->format('Y-m-d');
                    $this->login_model->update_connection_infos($usr_result['user_id'], $ip, $toDay);
                    if ($usr_result['role_label'] == 'ROLE_SUPER_ADMIN' || $usr_result['role_label'] == 'ROLE_ADMIN') {
                        redirect("admin/home");
                    } else {
                        redirect(base_url());
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('admin/index');
                }
            } else {
                redirect('admin/index');
            }
        }
    }

}
