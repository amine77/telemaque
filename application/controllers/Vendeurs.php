<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendeurs extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'vendeurs_model', 'users_articles_model', 'site_model', 'login_model'));
    }

    public function index() {
        $this->data['title'] = 'Liste des vendeurs';
        $this->data['vendeurs'] = $this->vendeurs_model->liste_vendeurs();

        $this->load->view('front/template/layout', $this->data);
    }

    public function details() {

        $vendeur_id = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->db->get_where('users', array('user_id' => $vendeur_id));
        $this->data['view'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

    public function liste_vendeurs_article() {



        $id_article = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($id_article);

        $this->data['view'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

    public function nouvelle_vente() {

        // $this->debug($this->data['categories']);
         if (!$this->session->has_userdata('login')) {
            redirect('connexion');
        }
        $this->data['additional_js'] = array('functions');

        $this->data['view'] = "front/nouvelle_vente";
        //Exemple upload photo 
        if (isset($_FILES['pic'])) {
            if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                $im_id = $this->utils_model->img_insert($_FILES['pic']);
                $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id);
            }
        } else {
            $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
        }
        $this->load->view('front/template/layout', $this->data);
    }

    public function select_product() {
        $cat_id = json_decode($_POST['cat_id']);
        
        $articles = $this->articles_model->get_articles_by_category($cat_id);
        $this->debug($articles);
        echo json_encode($articles);
       
    }

}
