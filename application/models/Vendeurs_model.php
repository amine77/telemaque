<?php

class Vendeurs_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function liste_vendeurs($article_id) {
        $sql = "SELECT u.user_id ,u.user_name ,u.user_surname
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               WHERE a.article_id = '$article_id'  
               ";
        $query = $this->db->query($sql);

        return $query;
    }

}
