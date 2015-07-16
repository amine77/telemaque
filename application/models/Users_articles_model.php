<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_article
 *
 * @author yattlane
 */
class Users_articles_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function list_user_article($article_id = "All") {
        $with_article = "";
        if ($article_id != "All")
            $with_article = " WHERE a.article_id = '$article_id'  ";

        $sql = "SELECT u.user_id ,u.user_name ,u.user_surname,ua.quantity,ua.image_id,a.image_id,a.article_id,ua.price
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               $with_article 
               ";
        $query = $this->db->query($sql);

        return $query;
    }
    
    
    public function user_with_article($article_id,$user_id) {
 

        $sql = "SELECT u.user_id ,u.user_name ,u.user_surname,ua.image_id,ua.quantity,a.article_id,ua.price,ua.description
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               WHERE a.article_id = '$article_id' AND u.user_id = '$user_id'
               ";
        $query = $this->db->query($sql);

        return $query;
    }
    

}
