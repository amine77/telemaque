<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articles_model');
        $this->load->helper('cookie');
        $cookie = array(
            'name' => 'panier',
            'value' => 0,
            'expire' => time() + 86500,
            
        );
        set_cookie($cookie);
       
       
    }

    public function index() {

        $data['additional_js'] = array('functions');
        $data['title'] = 'Home';
        $data['articles'] = $this->articles_model->get_articles(6);
        $data['view'] = 'front/home';
        $data['show_header'] = true;
        $this->load->view('front/template/layout', $data);
    }

}
