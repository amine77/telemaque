<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendeurs extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'vendeurs_model','users_articles_model'));
    }

    public function index() {


        $this->data['title'] = 'Liste des vendeurs';
       
        $this->data['vendeurs'] = $this->vendeurs_model->liste_vendeurs();

        $this->load->view('front/template/layout', $this->data);
    }

    public function details() {
        
        $vendeur_id = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->db->get_where('users', array('user_id' => $vendeur_id));
        $this->data['view_type'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
        
        
    }

    public function liste_vendeurs_article() {


        
        $id_article = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($id_article);
       
        $this->data['view_type'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

}
