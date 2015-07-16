<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Front_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('articles_model', 'users_articles_model'));
    }

    public function index($page = '', $article_id = '', $user_id = '') {

        if (empty($article_id)) {

            $this->data['title'] = 'Liste des articles';

            $this->data['additional_js'] = array('functions');
            $this->data['articles'] = $this->articles_model->get_articles(6);
            $this->data['view'] = 'front/articles';

            $this->load->view('front/template/layout', $this->data);
        } else {
            $this->details($article_id, $user_id);
        }
    }

    public function details($article_id = '', $user_id = '') {


        if (empty($user_id)) {

            $this->data['article'] = $this->db->get_where('articles', array('article_id' => $article_id));
            $this->data['vendeurs_articles'] = $this->users_articles_model->list_user_article($article_id);

            $this->data['view'] = "front/details_article";
            
            //Exemple upload photo 
            /*if(isset($_FILES['pic'])){
                if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                   $im_id = $this->utils_model->img_insert($_FILES['pic']);
                   $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id ); 
                }
            }else{
               $this->data['form_upload_img'] = $this->utils_model->form_upload_img(); 
            }*/
            
        } else {
            $userActicle = $this->users_articles_model->user_with_article($article_id, $user_id);
            //$this->output->enable_profiler(TRUE);

            if (count($userActicle->result()) == 0) {
                redirect(base_url() . 'articles/' . $article_id, 'location');
            }


            $this->data['article'] = $this->db->get_where('articles', array('article_id' => $article_id));
            $this->data['vendeurs_articles'] = $userActicle;
            
            
            $this->data['view'] = "front/details_user_article";
        }
        $this->load->view('front/template/layout', $this->data);
    }

    public function liste_vendeurs_article() {



        $id_article = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($id_article);

        $this->data['view_type'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

}
