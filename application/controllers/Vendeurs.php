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

     public function nouvelle_vente_art($page = '', $etape = '') {

        // $this->debug($this->data['categories']);
        if (!$this->session->has_userdata('login')) {
            redirect('connexion');
        }


        if ($etape == 2 && ($_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente-art" || $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente-art/2" ) && (isset($_POST['add_product']) || count($_SESSION['vente']) > 0)) {


            $this->form_validation->set_rules("title", "Libellé produit", "trim|required");
            $this->form_validation->set_rules("select-category", "Selectionner une categorie", "trim|required");
            $this->form_validation->set_rules("price", "Prix", "trim|required|integer");
            $this->form_validation->set_rules("qty", "Quantité", "trim|required|integer");
            if ($this->form_validation->run() == TRUE || count($_SESSION['vente']) > 0) {




                //Exemple upload photo 
                if (isset($_FILES['pic'])) {
                    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                        $im_id = $this->utils_model->img_insert($_FILES['pic']);
                        $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id);
                    }
                } else {
                    $data = array(
                        'quantity' => $this->input->post("qty"),
                        'title' => $this->input->post("title"),
                        'quantity' => $this->input->post("qty"),
                        'description' => $this->input->post("description"),
                        'price' => $this->input->post("price"),
                        'article_id' => $this->input->post("select_product"),
                        'user_id' => $_SESSION['user_id'],
                    );
                    $_SESSION['vente'] = $data;
                    $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
                }

                if (isset($_POST['end_add_product'])) {
                    $data = $_SESSION['vente'];
                    if (isset($im_id)) {
                        $data['image_id'] = $im_id;
                    }
                    $this->db->insert('users_articles', $data);
                    $im_id = $this->db->insert_id();

                    $_SESSION['vente'] = array();

                    redirect(site_url() . "nouvelle-vente-art/3");
                }
                $this->data['view'] = "front/nouvelle_vente_art_2";
            } else
                redirect(site_url() . "nouvelle-vente");
        }else if ($etape == 3 && $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente/2") {
            $this->data['view'] = "front/nouvelle_vente_3";
        } else if ($etape != '') {
            redirect(site_url() . "nouvelle-vente-art");
        } else {
            $this->data['additional_js'] = array('functions');
            $this->data['souCat'] = $this->category_model->get_category_child();
            $this->data['view'] = "front/nouvelle_vente";
        }

        $this->load->view('front/template/layout', $this->data);
    }
    
    
    
    public function nouvelle_vente($page = '', $etape = '') {

        // $this->debug($this->data['categories']);
        if (!$this->session->has_userdata('login')) {
            redirect('connexion');
        }


        if ($etape == 2 && ($_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente" || $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente/2" ) && (isset($_POST['add_product']) || count($_SESSION['vente']) > 0)) {


            $this->form_validation->set_rules("title", "Libellé produit", "trim|required");
            $this->form_validation->set_rules("select-category", "Selectionner une categorie", "trim|required");
            $this->form_validation->set_rules("price", "Prix", "trim|required|integer");
            $this->form_validation->set_rules("qty", "Quantité", "trim|required|integer");
            if ($this->form_validation->run() == TRUE || count($_SESSION['vente']) > 0) {




                //Exemple upload photo 
                if (isset($_FILES['pic'])) {
                    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                        $im_id = $this->utils_model->img_insert($_FILES['pic']);
                        $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id);
                    }
                } else {
                    $data = array(
                        'quantity' => $this->input->post("qty"),
                        'title' => $this->input->post("title"),
                        'quantity' => $this->input->post("qty"),
                        'description' => $this->input->post("description"),
                        'price' => $this->input->post("price"),
                        'article_id' => $this->input->post("select_product"),
                        'user_id' => $_SESSION['user_id'],
                    );
                    $_SESSION['vente'] = $data;
                    $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
                }

                if (isset($_POST['end_add_product'])) {
                    $data = $_SESSION['vente'];
                    if (isset($im_id)) {
                        $data['image_id'] = $im_id;
                    }
                    $this->db->insert('users_articles', $data);
                    $im_id = $this->db->insert_id();

                    $_SESSION['vente'] = array();

                    redirect(site_url() . "nouvelle-vente/3");
                }
                $this->data['view'] = "front/nouvelle_vente_2";
            } else
                redirect(site_url() . "nouvelle-vente");
        }else if ($etape == 3 && $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente/2") {
            $this->data['view'] = "front/nouvelle_vente_3";
        } else if ($etape != '') {
            redirect(site_url() . "nouvelle-vente");
        } else {
            $this->data['additional_js'] = array('functions');
            $this->data['souCat'] = $this->category_model->get_category_child();
            $this->data['view'] = "front/nouvelle_vente";
        }

        $this->load->view('front/template/layout', $this->data);
    }

    public function select_product() {
        $article_id = json_decode($_POST['article_id']);

        $specs = $this->articles_model->specification_strict($article_id);

        if (!$specs)
            echo json_encode('vide');
        else
            echo json_encode($specs);
    }

    public function select_cat() {
        $cat_id = json_decode($_POST['cat_id']);

        $articles = $this->articles_model->get_articles_by_category($cat_id);

        if (!$articles)
            echo json_encode('vide');
        else
            echo json_encode($articles->result_array());
    }

}
