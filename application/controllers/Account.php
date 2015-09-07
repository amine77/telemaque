<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Front_Controller {

    public function __construct() {
        parent::__construct();

            $this->load->model(array(
                'articles_model',
                'panier_model',
                'login_model',
                'message_model',
                'site_model',
                'module_model',
                'vendeurs_model',
                'cmd_model')
            );
    }

    public function index() {
       
        $this->data['additional_js'] = array('functions');
        
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = "front/account";
        $this->load->view('front/template/layout', $this->data);
    }

     public function mesachats() {
       
        $this->data['additional_js'] = array('functions');
        
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = "front/achats";
        $this->data['listCommand'] = $this->cmd_model->get_cmd('',$_SESSION['user_id']);
        //$this->debug($this->data['listCommand']);
        $this->load->view('front/template/layout', $this->data);
        
        
    }
    public function mesventes() {
       
        $this->data['additional_js'] = array('functions');
        
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = "front/ventes";
        
        $this->data['vente_en_attente'] = $this->vendeurs_model->get_sell('',$_SESSION['user_id'],0,'waiting');
        $this->data['vente_en_cours'] = $this->vendeurs_model->get_sell('',$_SESSION['user_id'],1);
        $this->data['vente_terminer'] = $this->vendeurs_model->get_sell('',$_SESSION['user_id'],1,'finish');

        $this->load->view('front/template/layout', $this->data);
    }
    

}
