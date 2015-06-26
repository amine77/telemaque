<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model('login_model');
    }

    public function index()
    {

        if ($this->session->has_userdata('login')) {
            redirect('admin/home');
        }
        //get the posted values
        $login = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");
        $user_name = $this->input->post("txt_user_name");
        $user_surname = $this->input->post("txt_user_surname");
        $phone = $this->input->post("txt_phone");
        $mobile = $this->input->post("txt_mobile");
        $mail = $this->input->post("txt_mail");
        $born_at = $this->input->post("txt_born_at");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");
        $this->form_validation->set_rules("txt_user_name", "Nom", "trim|required");
        $this->form_validation->set_rules("txt_user_surname", "Prénom", "trim|required");
        $this->form_validation->set_rules("txt_born_at", "Né(e) le", "trim|required");
        $this->form_validation->set_rules("txt_phone", "Téléphone", "trim|required");
        $this->form_validation->set_rules("txt_mobile", "Mobile", "trim|required");
        $this->form_validation->set_rules("txt_mail", "E-mail", "trim|required|valid_email|callback_mail_existant");

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('front/signup_view');
        } else {

            //validation succeeds
            if ($this->input->post('btn_signup') == "Sign up") {
                //check if username and password is correct
                if( $this->login_model->signup_user($user_name, $user_surname, $login, $password, $born_at, $phone, $mobile, $mail)){
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Félicitations ! '
                            . 'Votre inscription a été créée avec succès. Attendez qu\'elle soit validée par un administrateur, avant de pouvoir vendre ou acheter.'
                            . '<p>Vous serez dirigé à l\'accueil d\'ici quelques instants.</p></div>'
                            . '<script>setTimeout(function(){ document.location.href="'. base_url("/").' ";}, 10000) </script>');
                    redirect('inscription/index');
                }  else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Un problème est survenu. Votre inscription a échoué.</div>');
                    redirect('inscription/index');
                }
                
                
                
            } else {
                redirect('inscription/index');
            }
        }
    }

    function mail_existant($key)
    {
        $this->login_model->mail_exists($key);
    }

}
