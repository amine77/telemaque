<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $this->load->view('front/welcome_message');
    }

    public function login() {
        $this->load->view('front/login');
    }

}
