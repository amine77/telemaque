<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('login_model');
    }

    public function index() {

        if ($this->session->has_userdata('login')) {
            redirect('admin/home');
        }
        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");


        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            //validation fails
            $data['title'] = 'un titre';
            $data['view'] = 'back/login_view';
            $data['show_header'] = TRUE;
            $this->load->view('back/template/layout', $data);
        } else {
           
            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                //check if username and password is correct
                $usr_result = $this->login_model->get_user($username, $password);
                if ($usr_result > 0) { //active user record is present
                    //set the session variables
                    $sessiondata = array(
                        'login' => $username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("admin/home");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('admin/index');
                }
            } else {
                redirect('admin/index');
            }
        }
    }

    public function logout() {
        session_destroy();
        redirect(base_url('/'), 'refresh');

    }

    public function login() {

        $_SESSION['login'] = 'user@test.com';
        echo 'Bonjour ici la page de login ' . $_SESSION['login'];
    }

    public function home() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('tableau_de_bord');
        $data['view'] = 'back/home';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }

     public function liste_articles() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('articles');
        $data['view'] = 'back/liste_articles';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }
    
    public function form_articles() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('articles');
        $data['view'] = 'back/form_articles';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }
    
    public function lister_personnes() {
        $data['title'] = 'un titre';
        $data['personnes'] = $this->personnes_model->get_personnes();
        $data['view'] = 'personnes_view';
        $this->load->view('template/template', $data);
    }

}
