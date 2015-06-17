<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('personnes_model');
        }
	public function accueil($nom ='', $prenom  ='')
	{
            $data['title'] = 'un titre';
            $data['nom'] = $nom;
            $data['prenom'] = $prenom;
            $this->load->view('accueil_view', $data);
            //$this->load->view('welcome_message');
	}

        public function lister_personnes(){
            $data['title'] = 'un titre';
            $data['personnes'] = $this->personnes_model->get_personnes();
            $this->load->view('personnes_view', $data);
        }
}
