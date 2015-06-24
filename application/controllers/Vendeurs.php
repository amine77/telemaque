<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendeurs extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'vendeurs_model'));
    }

    public function index() {


        $this->data['title'] = 'Liste des articles';

        $this->data['nb_article'] = $this->panier_model->get_nb_articles();
       
        $this->data['show_header'] = true;


        $this->load->view('front/template/layout', $this->data);
    }

    public function details() {
        
    }

}
