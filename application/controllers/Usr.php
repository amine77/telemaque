<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usr extends Front_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model(array('panier_model','users_articles_model'));
    }

    public function index() {

        $user_id = $this->uri->segment(2);
        $this->data['title'] = 'Utilisateur';

         $query = $this->db->get_where('users', array('user_id' => $user_id));
       // $this->utils->getIm()
       var_dump($query->result()); 
        $this->data['view'] = 'front/usr';
        $this->data['show_header'] = true;


        $this->load->view('front/template/layout', $this->data);
    }
   

}