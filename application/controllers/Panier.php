<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'panier_model'));

        $this->load->library('session');
    }

    public function index() {


        $this->data['title'] = 'Panier';
        $this->data['articles'] = $this->articles_model->get_articles(6);
        $this->data['nb_article'] = $this->panier_model->get_nb_articles();


//$this->panier_model->vider();
        $this->load->view('front/template/layout', $this->data);
    }

    public function add_article() {

        $this->output->set_content_type('application/json');
        if (!isset($_SESSION['panier'][$id_article]))
            $_SESSION['panier'][$id_article] = 0;
        $id_article = json_decode($this->input->post('id_article'));
        $_SESSION['panier'][$id_article] ++;
        echo json_encode($this->panier_model->get_nb_articles());


        return;
    }

}
