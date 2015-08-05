<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->router->fetch_class() == "home")
            $this->load->model(array('articles_model', 'panier_model', 'login_model', 'message_model', 'site_model'));
    }

    public function index()
    {

        $this->data['additional_js'] = array('functions');
        $this->data['articles'] = $this->articles_model->get_articles(6);
        $this->data['site'] = $this->site_model->get_site_configurations();

        $this->load->view('front/template/layout', $this->data);
    }

    public function view($slug = '')
    {
        $slug = $this->uri->segment(2);
        $this->data['additional_js'] = array('functions');
        $this->data['site'] = $this->site_model->get_site_configurations();
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
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view'] = 'front/connexion';
        $this->load->view('front/template/layout', $this->data);
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('/'), 'refresh');
    }

    public function cgv()
    {
        $data['title'] = 'un titre';
        $data['view'] = 'front/cgv_view';
        $data['categories'] = $this->category_model->get_all();
        $data['nb_article'] = $this->panier_model->get_nb_articles();
        $data['site'] = $this->site_model->get_site_configurations();
        $data['show_header'] = TRUE;

        $this->load->view('front/template/layout', $data);
    }

    public function legal_notice()
    {
        $data['title'] = 'un titre';
        $data['view'] = 'front/legal_notice_view';
        $data['categories'] = $this->category_model->get_all();
        $data['nb_article'] = $this->panier_model->get_nb_articles();
        $data['site'] = $this->site_model->get_site_configurations();
        $data['show_header'] = TRUE;

        $this->load->view('front/template/layout', $data);
    }

    public function contact()
    {
        $sender = $this->input->post("txt_sender");
        $receiver = $this->input->post("txt_receiver");
        $subject = $this->input->post("txt_subject");
        $content = $this->input->post("txt_content");



        $this->form_validation->set_rules("txt_sender", "Votre Email", "trim|required");
        $this->form_validation->set_rules("txt_receiver", "Destinataire", "trim|required");
        $this->form_validation->set_rules("txt_content", "Contenu", "trim|required");
        $this->form_validation->set_rules("txt_subject", "Sujet", "trim|required");

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'un titre';
            $data['view'] = 'front/contact_view';
            $data['categories'] = $this->category_model->get_all();
            $data['nb_article'] = $this->panier_model->get_nb_articles();
            $data['show_header'] = TRUE;
            $data['contacts'] = $this->login_model->get_all_contacts();
            $data['site'] = $this->site_model->get_site_configurations();
            $this->load->view('front/template/layout', $data);
        } else {


            if ($this->input->post('btn_send') == "Envoyer") {

                $content_html = '<h3>Message de la part de <span style="color:red">' . $sender . '</span> :</h3>' . $content;
                $sender_array = $this->login_model->get_user_by_mail($sender);
                $receiver_array = $this->login_model->get_user_by_mail($receiver);
                //si le sender existe on enregistre son id, sinon on mettera 0
                $sender_id = ($sender_array != FALSE) ? $sender_array['user_id'] : 0;
                $receiver_id = ($receiver_array != FALSE) ? $receiver_array['user_id'] : 0;
                if ($this->send_mail($sender, $receiver, $subject, $content_html)) {
                    if ($this->message_model->send_message($sender_id, $receiver_id, $subject, $content)) {
                        $success = '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                     Votre mail a bien été envoyé.Nous vous remercions de l\'intérêt que vous portez à notre société et nous efforçons de vous répondre dans 
                                     les meilleurs délais.</div>';
                        $this->session->set_flashdata('msg', $success);
//                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Votre mail a bien été envoyé.Nous vous remercions de l\'intérêt que vous portez'
//                                . ' à notre société et nous efforçons de vous répondre dans les meilleurs délais.</div>');
                    }
                    redirect('contact');
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    votre email n\'a pas été envoyé.</div>';
                    $this->session->set_flashdata('msg', $error);
                    redirect('contact');
                }
            } else {
                redirect('contact');
            }
        }
    }

    protected function send_mail($sender, $receiver, $subject, $content)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '', // mettre ici votre email
            'smtp_pass' => '', // mettre ici votre mot de passe
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($sender, 'Internaute');
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($content);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
            return false;
        }
    }

}
