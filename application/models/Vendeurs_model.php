<?php

class Vendeurs_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function liste_vendeurs($id_article) {
        $sql = "SELECT u.user_id,u.user_name,user_surname 
               FROM users u
               JOIN users_articles ua ON u.user_id=ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               WHERE a.article_id = '$id_article'  
               ";
        $query = $this->db->query($sql);

        return $query;
    }

}
