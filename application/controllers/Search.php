<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site_model');

    }

    public function index() {
        $key = $this->input->post('recherche');

        $this->data['articles'] = $this->articles_model->search($key);
        $this->data['recherche'] = $key;
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = 'front/search';
        $this->load->view('front/template/layout', $this->data);
    }

}
