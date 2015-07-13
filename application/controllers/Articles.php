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
            $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($article_id);
            $this->data['view'] = "front/details_article";

       
          /*  if ($_FILES['pic']['name']){
                     $this->debug($_FILES['pic']);
            $this->utils_model->im_insert($_FILES['pic']);
            
            }*/
           



            $this->load->view('front/template/layout', $this->data);
        } else {
            $userActicle = $this->users_articles_model->user_with_article($article_id, $user_id);

            if (empty($userActicle->result()))
                redirect(base_url() . 'articles/' . $article_id, 'location');



            $this->data['article'] = $this->db->get_where('articles', array('article_id' => $article_id));
            $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($article_id);
            $this->data['view'] = "front/details_user_article";
            $this->load->view('front/template/layout', $this->data);
        }
    }

    public function liste_vendeurs_article() {



        $id_article = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($id_article);

        $this->data['view_type'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

}
