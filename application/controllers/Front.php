<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->router->fetch_class() == "front")
            $this->load->model(array('articles_model', 'panier_model'));

        if (!isset($_SESSION['panier']))
            $_SESSION['panier'] = array();
    }

    public function index() {

        $data['additional_js'] = array('functions');
        $data['title'] = 'Home';
        $data['articles'] = $this->articles_model->get_articles(6);
        $data['nb_article'] = $this->panier_model->get_nb_articles();
        $data['view'] = 'front/home';
        $data['show_header'] = true;
        
        $this->load->view('front/template/layout', $data);
    }


}
