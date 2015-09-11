<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usr extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'panier_model', 'login_model','users_articles_model', 'message_model', 'comment_model', 'module_model'));
    }

    public function index() {

        $user_id = $this->uri->segment(2);
        $this->data['title'] = 'Utilisateur';
        $this->data['site'] = $this->site_model->get_site_configurations();
       
        $oData = $this->db->get_where('users', array('user_id' => $user_id))->row_array();
        // $this->utils->getIm()
       // $this->debug($oData);
        $this->data['userInfo']= $oData;
        $this->data['view'] = 'front/usr';
        $this->data['vendeur_articles'] = $this->users_articles_model->list_user_article('',$user_id,true);
       $this->load->view('front/template/layout', $this->data);
    }

}
