<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->router->fetch_class() == "home")
            $this->load->model(array('articles_model', 'panier_model'));
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

}
