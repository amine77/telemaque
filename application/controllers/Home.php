<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->router->fetch_class() == "home")
            $this->load->model(array('articles_model', 'panier_model', 'login_model'));
    }

    public function index()
    {

        $this->data['additional_js'] = array('functions');
        $this->data['articles'] = $this->articles_model->get_articles(6);


        $this->load->view('front/template/layout', $this->data);
    }

    public function view($slug='')
    {
        $slug = $this->uri->segment(2);
        $this->data['additional_js'] = array('functions');
        if ($this->category_model->get_category_by_slug($slug)) {
            $category = $this->category_model->get_category_by_slug($slug);
            $this->data['articles'] = $this->articles_model->get_articles_by_category($category['category_id']);
            
        }

        $this->data['view'] = 'front/articles';
        //var_dump($this->data['articles'] );
        //var_dump($this->category_model->get_category_by_slug($slug));
        //var_dump($slug);
        $this->load->view('front/template/layout', $this->data);
    }

    public function connexion($action = "")
    {


        $this->data['articles'] = $this->articles_model->get_articles(6);

        $this->data['view'] = 'front/connexion';
        $this->load->view('front/template/layout', $this->data);
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url('/'), 'refresh');
    }
    public function contact(){
        $sender = $this->input->post("txt_sender");
        $receiver = $this->input->post("txt_receiver");
        $content = $this->input->post("txt_content");
        $title = $this->input->post("txt_title");


        
        $this->form_validation->set_rules("txt_sender", "Vous", "trim|required");
        $this->form_validation->set_rules("txt_receiver", "Destinataire", "trim|required");
        $this->form_validation->set_rules("txt_content", "Contenu", "trim|required");
        $this->form_validation->set_rules("txt_title", "Titre", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            
            $data['title'] = 'un titre';
            $data['view'] = 'front/contact_view';
            $data['categories'] = $this->category_model->get_all();
            $data['nb_article'] = $this->panier_model->get_nb_articles(); 
            $data['show_header'] = TRUE;
            $data['contacts'] = $this->login_model->get_all_contacts();
            $this->load->view('front/template/layout', $data);

        } else {

            
            if ($this->input->post('btn_send') == "Envoyer") {
                
                if ($this->message_model->send_message($sender, $receiver, $content, $title)) { 
                    $this->send_mail($sender, $receiver, $content, $title);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Votre mail a bien été envoyé.Nous vous remercions de l\'intérêt que vous portez'
                            . ' à notre société et nous efforçons de vous répondre dans les meilleurs délais.</div>');
                    redirect('admin/contact');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">votre email n\'a pas été envoyé</div>');
                    redirect('admin/contact');
                }
            } else {
                redirect('admin/contact');
            }
        }
    }
}
