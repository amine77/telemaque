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
        $this->data['userInfo'] = $this->db->get_where('users', array('user_id' => $_SESSION['user_id']))->result()[0];
        //$this->debug($this->data['userInfo']);

        if (isset($_POST['update-profil'])) {

            $this->form_validation->set_rules("login", "Login", "trim|required|min_length[4]");
            $this->form_validation->set_rules("user_name", "Nom", "trim|required|min_length[3]");
            $this->form_validation->set_rules("user_surname", "Prenom", "trim|required|min_length[3]");
            if ($this->form_validation->run() == TRUE) {

                if ($this->input->post('password') == $this->input->post('password')) {

                    $data = array(
                        'login' => $_POST['login'],
                        'user_name' => $_POST['user_name'],
                        'user_surname' => $_POST['user_surname'],
                        'phone' => $_POST['phone'],
                        'mobile' => $_POST['mobile'],
                    );
                    if ($this->input->post('password') != '') {
                        $data['password'] = sha1($this->input->post('password'));
                    }
                    $this->db->update('users', $data, array('user_id' => $_SESSION['user_id']));
                    redirect(site_url() . 'account');
                }
            }
        }


        $this->data['view'] = "front/account";
        $this->load->view('front/template/layout', $this->data);
    }

    public function mesachats() {

        $this->data['additional_js'] = array('functions');

        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = "front/achats";
        $this->data['listCommand'] = $this->cmd_model->get_cmd('', $_SESSION['user_id'], '', 70);

        //  $this->debug($this->data['listCommand']);
        $this->load->view('front/template/layout', $this->data);
    }

    public function mesventes() {

        $this->data['additional_js'] = array('functions');

        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = "front/ventes";

        $this->data['vente_en_attente'] = $this->vendeurs_model->get_sell('', $_SESSION['user_id'], 0);

        $this->data['vente_en_cours'] = $this->vendeurs_model->get_sell('', $_SESSION['user_id'], 1);


        $this->load->view('front/template/layout', $this->data);
    }

}
