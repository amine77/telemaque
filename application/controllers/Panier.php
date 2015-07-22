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

        $this->data['exemplaires'] = array();
        //$this->panier_model->vider();
        unset($panier_exemplaire['nb_article']);
        $panier_exemplaire = array_keys($panier_exemplaire);
        if (count($panier_exemplaire) > 0) {

            $this->data['additional_js'] = array('functions');
            $this->data['exemplaires'] = $this->users_articles_model->exemplaire($panier_exemplaire);
     
            $this->data['panier'] = $this->panier_model->get_cart($this->data['exemplaires']);
        } else {
            $this->data['panier'] = $this->panier_model->get_cart();
        }
        $this->debug($panier_exemplaire);
        $this->debug($this->data['exemplaires']);
        $this->load->view('front/template/layout', $this->data);
    }

    public function add_article($action = "") {
        // ajout un exemplaire d'un article 

        $html = $this->action_cart(json_decode($this->input->post('user_article_id')), "add_article", $action);
        echo $html;
    }

    public function delete_sample_article() {
        // suprimer un exemplaire d'un exemplaire 
        $this->action_cart(json_decode($this->input->post('user_article_id')), "delete_sample_article");
    }

    public function delete_article() {
   
    }

    public function empty_cart() {
        // Vider le panier
        $this->panier_model->vider();
        echo json_encode($this->panier_model->get_cart());
    }

    public function action_cart($ua_id="", $type = "", $action = "") {
        //methode commune
        if($ua=="")
         $ua_id = json_decode($this->input->post('user_article_id'));
        $panier_exemplaire = $_SESSION['panier'];
        if (!isset($_SESSION['panier'][$ua_id]))
            $_SESSION['panier'][$ua_id] = 0;
        if ($type == "add_article")
            $_SESSION['panier'][$ua_id] ++;
        else if ($type == "delete_sample")
            $_SESSION['panier'][$ua_id] --;
   

        $this->panier_model->get_nb_articles();
        
        if ($action == "")
            $html = json_encode($this->panier_model->get_cart());
        else
            $html = json_encode($this->panier_model->get_nb_articles());
        return $html;
    }

}
