<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model','panier_model','user_article_model'));
      
        $this->load->library('session');
    }

    public function index() {


        $data['title'] = 'Liste des articles';
       
        $data['nb_article'] = $this->panier_model->get_nb_articles();
        $data['view'] = 'front/articles';
        $data['show_header'] = true;


        $this->load->view('front/template/layout', $data);
    }
   
   public function details(){
       
   }
}
