<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model','panier_model'));
      
        $this->load->library('session');
    }

    public function index() {


        $data['title'] = 'Panier';
        $data['articles'] = $this->articles_model->get_articles(6);
        $data['nb_article'] = $this->panier_model->get_nb_articles();
        $data['view'] = 'front/panier';
        $data['show_header'] = true;


        $this->load->view('front/template/layout', $data);
    }
   
    public function add_article() {
        $this->output->set_content_type('application/json');

        $id_article = json_decode($this->input->post('id_article'));

        $nb_article = $_SESSION['panier'][$id_article] ++;
        echo  json_encode($this->panier_model->get_nb_articles());


        return;
    }

}
