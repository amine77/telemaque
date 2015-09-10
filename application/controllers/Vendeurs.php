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
        $sql = "SELECT DISTINCT * 
               FROM specifications s,articles_specifications asp
               WHERE asp.visible='1' AND s.specification_id=asp.specification_id
               ";
        $this->data['specs'] = $this->db->query($sql)->result_array();


        if ($etape == 2 && ($_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente-art" || $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente-art/2" ) && (isset($_POST['add_product']) || count($_SESSION['vente_art']) > 0)) {


            $this->form_validation->set_rules("title", "Libellé produit", "trim|required");
            $this->form_validation->set_rules("select-category", "Selectionner une categorie", "trim|required");

            if ($this->form_validation->run() == TRUE || count($_SESSION['vente_art']) > 0) {




                //Exemple upload photo 
                if (isset($_FILES['pic'])) {
                    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                        $im_id = $this->utils_model->img_insert($_FILES['pic']);
                        $_SESSION['vente_art']['image_id'] = $im_id;
                        $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id);
                    }
                } else {


                    $data = array(
                        'article_label' => $this->input->post("title"),
                        'description' => $this->input->post("description"),
                        'category_id' => $this->input->post("select-category"),
                        'user_id' => $_SESSION['user_id'],
                    );
                    $_SESSION['vente_art'] = $data;
                    foreach ($_POST as $key => $value) {
                        if (substr($key, 0, 4) == 'spec' && $value != '') {
                            $_SESSION['vente_art']['spec'][] = $value;
                        }
                    }
                    if ($_POST['playlist'] != 0) {

                        if (explode(',', $_POST['playlist']) > 1) {
                            $_SESSION['vente_art']['select_spec'] = explode(',', $_POST['playlist']);
                        } else {
                            $_SESSION['vente_art']['select_spec'] = $_POST['playlist'];
                        }
                    }
                    $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
                }

                if (isset($_POST['end_add_product'])) {
                    $data = $_SESSION['vente_art'];

                    $select_spec = $_SESSION['vente_art']['select_spec'];
                    unset($data['select_spec']);
                    $dataspec = $data['spec'];
                    unset($data['spec']);

                    if (isset($_SESSION['vente_art']['image_id'])) {
                        $data['image_id'] = $_SESSION['vente_art']['image_id'];
                    }
                    $this->db->insert('articles', $data);
                    $article_id = $this->db->insert_id();
                    foreach ($dataspec as $value) {
                        $this->db->insert('specifications', array('specification_label' => $value, 'article_id' => $article_id));
                    }

                    if (isset($_SESSION['vente_art']['select_spec'])) {

                        if (is_array($select_spec)) {
                            foreach ($select_spec as $value) {
                                $this->db->insert('specifications', array('specification_label' => $value, 'article_id' => $article_id));
                            }
                        } else
                            $this->db->insert('specifications', array('specification_label' => $value, 'article_id' => $article_id));
                    }

                    $_SESSION['vente_art'] = array();

                    redirect(site_url() . "nouvelle-vente-art/3");
                }
                $this->data['view'] = "front/nouvelle_vente_art_2";
            } else
                redirect(site_url() . "nouvelle-vente-art");
        }else if ($etape == 3 && $_SERVER['HTTP_REFERER'] == site_url() . "nouvelle-vente-art/2") {
            $this->data['view'] = "front/nouvelle_vente_art_3";
        } else if ($etape != '') {
            redirect(site_url() . "nouvelle-vente-art");
        } else {
            $this->data['additional_js'] = array('functions');
            $this->data['souCat'] = $this->category_model->get_category_child();
            $this->data['view'] = "front/nouvelle_vente_art";
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
                        $_SESSION['vente']['image_id'] = $im_id;
                    }
                } else {
                    $data = array(
                        'title' => $this->input->post("title"),
                        'quantity' => $this->input->post("qty"),
                        'description' => $this->input->post("description"),
                        'price' => $this->input->post("price"),
                        'article_id' => $this->input->post("select_product"),
                        'user_id' => $_SESSION['user_id'],
                    );
                    $_SESSION['vente'] = $data;


                    foreach ($_POST as $key => $value) {
                        if (substr($key, 0, 4) == 'spec' && $value != '') {
                            $_SESSION['vente']['spec'][substr($key, 8)] = $value;
                        }
                    }
                    
                    $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
                }

                if (isset($_POST['end_add_product'])) {
                    $data = $_SESSION['vente'];
                    $spec = "";
                    if (isset($_SESSION['vente']['spec'])) {
                        $spec = $_SESSION['vente']['spec'];
                    }

                    unset($data['spec']);
                    if (isset($_SESSION['vente']['image_id'])) {
                        $data['image_id'] = $_SESSION['vente']['image_id'];
                    }
                    $this->db->insert('users_articles', $data);
                    $user_article_id = $this->db->insert_id();
                    if ($spec != "") {
                        foreach ($spec as $key => $value) {
                            $this->db->insert('articles_specifications', array('specification_value' => $value, 'user_article_id' => $user_article_id, 'specification_id' => $key, 'specification_value' => $value, 'visible' => 0));
                            $spec_id = $this->db->insert_id();
                        }
                    }

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
