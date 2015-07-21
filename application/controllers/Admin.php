<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('login_model');
        $this->load->model('category_model');
        $this->load->model('tag_model');
        $this->load->model('articles_model');
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
            $this->load->view('back/login_view', $data);
//            $this->load->view('back/template/layout', $data);
        } else {

            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                //check if username and password is correct
                $usr_result = $this->login_model->get_user($username, $password);
                if (count($usr_result) > 0) { //active user record is present
                    //set the session variables
                    $ip =$this->input->ip_address();
                    $sessiondata = array(
                        'login' => $username,
                        'loginuser' => TRUE,
                        'ip'=>$ip,
                        'role'=>$usr_result['role_label']
                    );
                    $this->session->set_userdata($sessiondata);
                    $now = new DateTime();
                    $toDay = $now->format('Y-m-d');
                    $this->login_model->update_connection_infos($usr_result['user_id'], $ip , $toDay);
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

    public function liste_exemplaires() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('exemplaires');
        $data['view'] = 'back/liste_exemplaires';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }

//    public function liste_categories() {
//        if (!$this->session->has_userdata('login')) {
//            redirect('admin');
//        }
//        $data['title'] = 'un titre';
//        $data['additional_css'] = array('categories');
//        $data['view'] = 'back/liste_categories';
//        $data['show_header'] = TRUE;
//        $this->load->view('back/template/layout', $data);
//    }
    public function liste_tags() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'tous les mots clés';
        $data['view'] = 'back/liste_tags';
        $data['show_header'] = TRUE;

        $data['tags'] = $this->tag_model->get_all();
        $this->load->view('back/template/layout', $data);
    }
    public function delete_tag($id) {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $this->tag_model->delete_tag($id);
        redirect('admin/liste_tags');
    }

    public function liste_categories() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_categories';
        $data['show_header'] = TRUE;
        $data['categories'] = $this->category_model->get_all();
        $this->load->view('back/template/layout', $data);
    }

    public function delete_category($id) {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $this->category_model->delete_category($id);
        redirect('admin/liste_categories');
    }

    public function update_category($category_id = null) {
        //$this->output->enable_profiler(TRUE);
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $parent = $this->input->post("txt_parent");
        $category = $this->input->post("txt_category");
        if ($parent == '0') {
            $category = strtoupper($category);
        } else {
            $category = ucfirst($category);
        }

        $this->form_validation->set_rules("txt_category", "Category", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['cat'] = $this->category_model->get_category($category_id);
            $data['categories'] = $this->category_model->get_all();
            $data['view'] = 'back/update_category';
            $data['show_header'] = TRUE;
            $data['id'] = $category_id;


            $this->load->view('back/template/layout', $data);
            //$this->load->view('back/update_category', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                $this->category_model->update_category($parent, $category_id, $category);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'La nouvelle catégorie a été mis à jour avec succès !</div>');
                redirect("admin/update_category/" . $category_id);
            } else {
                redirect('admin/update_category/' . $category_id);
            }
        }
    }
    public function update_tag($tag_id = null){
         if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $tag_label = $this->input->post("txt_tag");
        $articles = $this->input->post('articles');
        $this->form_validation->set_rules("txt_tag", "Tag", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['cat'] = $this->tag_model->get_tag($tag_id);
            $data['articles'] = $this->articles_model->get_articles();
            $data['articles_associes_ids'] = $this->tag_model->find_articles($tag_id);
            $data['view'] = 'back/update_tag';
            $data['show_header'] = TRUE;
            $data['id'] = $category_id;


            $this->load->view('back/template/layout', $data);
            //$this->load->view('back/update_category', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                $this->category_model->update_category($parent, $category_id, $category);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'La nouvelle catégorie a été mis à jour avec succès !</div>');
                redirect("admin/update_category/" . $category_id);
            } else {
                redirect('admin/update_category/' . $category_id);
            }
        }
    }

    public function ajouter_tag() {
        if (!$this->session->has_userdata('login')) {
//            redirect('admin/home');
            echo 'admin/home';
        }
        $tag_label = $this->input->post("txt_tag");
        $articles = $this->input->post('articles');
        $this->form_validation->set_rules("txt_tag", "Tag", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['articles'] = $this->articles_model->get_articles();
            $data['view'] = 'back/ajouter_tag';
            $data['show_header'] = TRUE;

            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_ajouter') == "Ajouter") {

                if ($this->tag_model->add_tag($tag_label, $articles)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouveau mot clé a été ajouté avec succès !</div>');
                    redirect("admin/ajouter_tag");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Echec. Mot clé non ajouté !</div>');
                    redirect('admin/ajouter_tag');
                }
            } else {
                redirect('admin/ajouter_tag');
            }
        }
    }

    public function ajouter_category() {
        if (!$this->session->has_userdata('login')) {
//            redirect('admin/home');
            echo 'admin/home';
        }

        $parent = $this->input->post("txt_parent");
        $category = $this->input->post("txt_category");
        if ($parent == '0') {
            $category = strtoupper($category);
        } else {
            $category = ucfirst($category);
        }

        $this->form_validation->set_rules("txt_category", "Category", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['categories'] = $this->category_model->get_all();
            $data['view'] = 'back/ajouter_category';
            $data['show_header'] = TRUE;

            $this->load->view('back/template/layout', $data);
        } else {


            if ($this->input->post('btn_ajouter') == "Ajouter") {

                if ($this->category_model->add_category($parent, $category)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">La nouvelle catégorie a été ajoutée avec succès !</div>');
                    redirect("admin/ajouter_category");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('admin/ajouter_category');
                }
            } else {
                redirect('admin/ajouter_category');
            }
        }
    }

    public function liste_administrateurs() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['view'] = 'back/liste_administrateurs';
        $data['administrateurs'] = $this->login_model->get_all_administrators();
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
        
    }
    public function delete_admin($id){
      if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $this->login_model->delete_user($id);
        redirect('admin/liste_administrateurs');  
    }
    public function update_admin($user_id=null){
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }

        $nom = $this->input->post("txt_nom");
        $prenom = $this->input->post("txt_prenom");
        $mail = $this->input->post("txt_mail");
        $role = $this->input->post("txt_role_id");
        $status = $this->input->post("txt_status_id");
        

        $this->form_validation->set_rules("txt_nom", "Nom", "trim|required");
        $this->form_validation->set_rules("txt_prenom", "Prénom", "trim|required");
        $this->form_validation->set_rules("txt_mail", "Email", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['user'] = $this->login_model->get_user_by_id($user_id);
            $data['roles'] = $this->login_model->get_all_roles();
            $data['view'] = 'back/update_category';
            $data['show_header'] = TRUE;
            $data['id'] = $category_id;


            $this->load->view('back/template/layout', $data);
            //$this->load->view('back/update_category', $data);
        } else {


            if ($this->input->post('btn_update') == "Update") {

                $this->category_model->update_category($parent, $category_id, $category);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">'
                        . 'La nouvelle catégorie a été mis à jour avec succès !</div>');
                redirect("admin/update_category/" . $category_id);
            } else {
                redirect('admin/update_category/' . $category_id);
            }
        }
    }

    public function liste_vendeurs() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('vendeurs');
        $data['view'] = 'back/liste_vendeurs';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }

    public function form_administrateurs() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('administrateurs');
        $data['view'] = 'back/form_administrateurs';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }

    public function liste_roles() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('roles');
        $data['view'] = 'back/liste_roles';
        $data['show_header'] = TRUE;
        $this->load->view('back/template/layout', $data);
    }

    public function form_roles() {
        if (!$this->session->has_userdata('login')) {
            redirect('admin');
        }
        $data['title'] = 'un titre';
        $data['additional_css'] = array('roles');
        $data['view'] = 'back/form_roles';
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
