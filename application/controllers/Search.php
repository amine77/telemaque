<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Front_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $key = $this->input->post('recherche');

        $this->data['articles'] = $this->articles_model->search($key);
        $this->data['recherche'] = $key;
        $this->data['view'] = 'front/search';
        $this->load->view('front/template/layout', $this->data);
    }

}
