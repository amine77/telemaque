<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {

    public function __construct() {
        parent::__construct();
      
        if ($this->router->fetch_class() == "home")
            $this->load->model(array('articles_model', 'panier_model'));

    }

    public function index() {

        $this->data['additional_js'] = array('functions');
        $this->data['articles'] = $this->articles_model->get_articles(6);
        

        $this->data['show_header'] = true;
     
        $this->load->view('front/template/layout', $this->data);
        
       
    }


}
