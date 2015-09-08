<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends Front_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('articles_model', 'users_articles_model', 'site_model', 'module_model', 'comment_model'));
    }

    public function index($page = '', $article_id = '', $exemplaire_id = '')
    {

        if (empty($article_id)) {

            $this->data['title'] = 'Liste des articles';

            $this->data['additional_js'] = array('functions');
            $this->data['articles'] = $this->articles_model->get_articles(6);
            $this->data['site'] = $this->site_model->get_site_configurations();
            $this->data['view'] = 'front/articles';

            $this->load->view('front/template/layout', $this->data);
        } else {
            $this->details($article_id, $exemplaire_id);
        }
    }

    public function details($article_id = '', $exemplaire_id = '')
    {


        if (empty($exemplaire_id)) {
            
            
            $this->data['article'] = $this->articles_model->get_article($article_id);

            $this->data['vendeurs_articles'] = $this->users_articles_model->list_user_article($article_id);

            $this->data['site'] = $this->site_model->get_site_configurations();
            $activated_modules = $this->module_model->get_activated_modules();
            $data['module'] = $module = $this->module_model->get_module_by_id(2);
            if($activated_modules!=FALSE) foreach ($activated_modules as $module) {
                if ($module['module_id'] == 2 && $module['module_status'] == 1) {
                    $this->data['comments'] = $this->comment_model->get_comments_by_article_id($article_id);
                }
            }
            $this->data['view'] = "front/details_article";
            $this->articles_model->set_viewed($article_id);
            // $this->debug($this->data['vendeurs_articles']);
            //Exemple upload photo 
            /* if(isset($_FILES['pic'])){
              if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
              $im_id = $this->utils_model->img_insert($_FILES['pic']);
              $this->data['form_upload_img'] = $this->utils_model->form_upload_img($im_id );
              }
              }else{
              $this->data['form_upload_img'] = $this->utils_model->form_upload_img();
              } */
        } else {
            $userActicle = $this->users_articles_model->user_exemplaire($article_id, $exemplaire_id);
            //$this->output->enable_profiler(TRUE);

            if (count($userActicle) == 0) {
                redirect(base_url() . 'articles/' . $article_id, 'location');
            }

            $this->data['additional_js'] = array('functions');
            $this->data['lib_css'] = array('jquery-ui.min');
            $this->data['article'] = $this->db->get_where('articles', array('article_id' => $article_id));
            $this->data['vendeurs_articles'] = $userActicle;

            if (!is_null($userActicle[0]->image_id)) {

                $this->data['img'] = $this->utils_model->get_im($userActicle[0]->image_id, 300);
                $this->debug($this->data['img']);
                $this->data['img'] = $this->data['img']['imsrc'];
            } else {
                $this->data['img'] = "<img src='" . base_url() . "assets/img/img_none.jpg' width='350px' alt='image produit'/>";
            }
            $this->data['view'] = "front/details_user_article";
        }
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->load->view('front/template/layout', $this->data);
    }

    public function liste_vendeurs_article()
    {



        $id_article = $this->uri->segment(2);
        $this->data['vendeurs_articles'] = $this->users_articles_model->list_ua($id_article);
        $this->data['site'] = $this->site_model->get_site_configurations();
        $this->data['view_type'] = "vendeurs_article";
        $this->load->view('front/template/layout', $this->data);
    }

}
