<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends Front_Controller {

    public function __construct() {
        parent::__construct();
        //load the login model
        $this->load->model(array('articles_model',
            'panier_model',
            'login_model',
            'message_model',
            'site_model',
            'comment_model',
            'module_model',
            'role_model')
        );
    }

    public function admin() {
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
                    if ($usr_result['status'] != 1) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Votre compte n\'a pas été encore validé.<br>Merci pour votre compréhension et votre patience. </div>');
                        redirect('login/admin');
                    } else {
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
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('login/admin');
                }
            } else {
                redirect('login/admin');
            }
        }
    }

    public function index() {
        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");



        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $this->data['title'] = 'un titre';
            $this->data['view'] = 'front/connexion';
            $this->data['site'] = $this->site_model->get_site_configurations();
            $this->load->view('front/template/layout', $this->data);
        } else {


            if ($this->input->post('btn_login') == "Valider") {

                $usr_result = $this->login_model->get_user($username, $password);
                if (count($usr_result) > 0) {
                    if ($usr_result['status'] != 1) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Votre compte n\'a pas été encore validé.<br>Merci pour votre compréhension et votre patience. </div>');
                        redirect('login/index');
                    } else {
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
                            redirect(base_url());
                        } else {
                            redirect(base_url());
                        }
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('login/index');
                }
            } else {
                redirect('login/index');
            }
        }
    }

    public function inscription() {
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
        $this->form_validation->set_rules("txt_username", "Login", "trim|required");
        $this->form_validation->set_rules("txt_password", "Mot de passe", "trim|required");
        $this->form_validation->set_rules("txt_user_name", "Nom", "trim|required");
        $this->form_validation->set_rules("txt_user_surname", "Prénom", "trim|required");
        $this->form_validation->set_rules("txt_born_at", "Né(e) le", "trim|required");
        $this->form_validation->set_rules("txt_phone", "Téléphone", "trim|required");
        $this->form_validation->set_rules("txt_mobile", "Mobile", "trim|required");
        $this->form_validation->set_rules("txt_mail", "E-mail", "trim|required|valid_email");

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'un titre';
            $data['view'] = 'front/signup_view';
            $data['categories'] = $this->category_model->get_all();
            $data['nb_article'] = $this->panier_model->get_nb_articles();
            $data['site'] = $this->site_model->get_site_configurations();
            $data['show_header'] = TRUE;
            $data['lib_js'] = array('datepicker/js/bootstrap-datepicker', 'datepicker/locales/bootstrap-datepicker.fr.min');
            $this->load->view('front/template/layout', $data);
        } else {

            //validation succeeds
            if ($this->input->post('btn_signup') == "Créer mon compte") {
                //check if username and password is correct
                if ($this->login_model->signup_user($user_name, $user_surname, $login, $password, $born_at, $phone, $mobile, $mail)) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Félicitations ! '
                            . 'Votre inscription a été créée avec succès. Attendez qu\'elle soit validée par un administrateur, avant de pouvoir vendre ou acheter.'
                            . '<p>Vous serez dirigé à l\'accueil d\'ici quelques instants.</p></div>'
                            . '<script>setTimeout(function(){ document.location.href="' . base_url("/") . ' ";}, 10000) </script>');
                    redirect('inscription/index');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Un problème est survenu. Votre inscription a échoué.</div>');
                    redirect('inscription/index');
                }
            } else {
                redirect('inscription/index');
            }
        }
    }

}
