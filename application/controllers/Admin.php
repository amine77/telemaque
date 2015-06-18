<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('personnes_model');
        }
        public function index(){
            //on vérifie la session uilisateur s'il eest connecté
            //on renvoie vers la home_page de l'admin sinon on renvoie le formulaire
            $data['content'] = 'admin/welcome';
            $this->load->view('template/template', $data);  
            //echo '<h1>bienvenue sur l\'espace d\'administration</h1>';
        }

        public function accueil($nom ='', $prenom  ='')
	{
            $data['title'] = 'un titre';
            $data['nom'] = $nom;
            $data['prenom'] = $prenom;
            $data['content'] = 'accueil_view';
            $this->load->view('template/template', $data);
            //$this->load->view('welcome_message');
	}

        public function lister_personnes(){
            $data['title'] = 'un titre';
            $data['personnes'] = $this->personnes_model->get_personnes();
            $data['content'] = 'personnes_view';
            $this->load->view('template/template', $data);
        }
}
