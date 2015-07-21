<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'users_articles_model'));

        $this->load->library('session');
    }

    public function index() {


        $this->data['title'] = 'Panier';
        $panier_exemplaire = $_SESSION['panier'];
        $this->data['exemplaires']=array();
        if (count($panier_exemplaire) > 1) {

            unset($panier_exemplaire['nb_article']);
            $panier_exemplaire = array_keys($panier_exemplaire);

            $this->data['additional_js'] = array('functions');
            $this->data['exemplaires'] = $this->users_articles_model->exemplaire($panier_exemplaire);

            //>panier_model->get_nb_articles();
            //$this->panier_model->vider();
        }
        $this->debug(count($panier_exemplaire));
        $this->load->view('front/template/layout', $this->data);
    }

    public function add_article() {

        $this->output->set_content_type('application/json');
        $id_article = json_decode($this->input->post('id_article'));
        if (!isset($_SESSION['panier'][$id_article]))
            $_SESSION['panier'][$id_article] = 0;

        $_SESSION['panier'][$id_article] ++;
        echo json_encode($this->panier_model->get_nb_articles());


        return;
    }

}
