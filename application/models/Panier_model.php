<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Panier_model
 *
 * @author LinkFox
 */
class Panier_model extends CI_Model {

    public function add_article() {
        
    }

    public function delete_article() {
        
    }

    public function vider() {
        $_SESSION['panier'] = "";
    }

    public function get_nb_articles() {

        $nb_article = 0; // car dans le tableau on compte aussi nb_article
        if (count($_SESSION['panier']) > 1) {
            foreach ($_SESSION['panier'] as $key => $value) {
                if ($key != 'nb_article') {

                    $nb_article+=$value;
                }
            }
        }
        $_SESSION['panier']['nb_article'] = $nb_article;

        return $nb_article;
    }

}
