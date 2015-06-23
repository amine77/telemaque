<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articles_model');


        $this->load->helper('cookie');
    }

    public function index() {


        $data['title'] = 'Panier';
        $data['articles'] = $this->articles_model->get_articles(6);
        $data['view'] = 'front/panier';
        $data['show_header'] = true;



        echo '<pre>';
        var_dump($_COOKIE);
        echo '</pre>';
        $this->load->view('front/template/layout', $data);
    }

    public function add_article() {
        //header('Content-Type: application/json');
        $article = json_decode($this->input->post('article'));
        //$id_article = $article['id_article'];
        /*$panier = get_cookie('panier');
        $panier[$article['id_article']];
        $panier[$id_article]++;
        //setCookie('panier['.$id_article.']',$panier[$id_article]);*/

        echo '<pre>';
        var_dump( $article);
        echo '</pre>';

        // echo get_cookie('panier');
        echo "5";
        return;
    }

}
