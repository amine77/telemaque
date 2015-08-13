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
class Users_articles_model extends Articles_model {

    public function __construct() {
        parent::__construct();
    }

    public function list_user_article($article_id = "") {
        $with_article = "";
        if ($article_id != "")
            $with_article = " WHERE a.article_id = '$article_id'  ";

        $sql = "SELECT DISTINCT u.user_id ,u.user_name ,u.user_surname,ua.user_article_id,ua.quantity,ua.image_id,a.article_id,ua.price,ua.title
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               $with_article   
               ";

        $query = $this->db->query($sql);

        $oData = $query->result();

        foreach ($oData as $key => $value) {
            $spec = $this->user_article_specification($value->user_article_id);
            $oData[$key]->img = $this->utils_model->get_im($value->image_id, 100)['imsrc'];
            $oData[$key]->spec = $spec;
        }
        return $oData;
    }

    public function exemplaire($user_article = "") {
        
        $with_article = "";
        $oData="";
        if ($user_article != "" && is_array($user_article)) {
            $user_article = implode(",", $user_article);
            $with_article = " WHERE ua.user_article_id IN ($user_article)";
    
            $sql = "SELECT DISTINCT u.user_id ,u.user_name ,u.user_surname,ua.user_article_id,ua.quantity,ua.image_id,a.article_id,ua.price,ua.title,a.article_label
                
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               $with_article   
               ";

            $query = $this->db->query($sql);

            $oData = $query->result();

            foreach ($oData as $key => $value) {

                $oData[$key]->img = $this->utils_model->get_im($value->image_id, 100)['imsrc'];
            }
        }
        return $oData;
    }

    public function user_article_specification($user_article_id = '') {
        $with_user_article = "";
        if ($user_article_id != "")
            $with_user_article = " WHERE sp.user_article_id = '$user_article_id'  ";
        $sql = "SELECT specification_label,specification_value
               FROM articles_specifications artsp 
               LEFT JOIN specifications sp ON artsp.specification_id = sp.specification_id 
               $with_user_article
              
               ";

        $query = $this->db->query($sql);

        return $query->result();
    }

    public function user_with_article($article_id, $user_id) {


        $sql = "SELECT u.user_id ,u.user_name ,u.user_surname,ua.image_id,ua.quantity,ua.user_article_id,a.article_id,ua.price,ua.title,ua.description,a.article_label
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               WHERE a.article_id = '$article_id' AND u.user_id = '$user_id'
               ";
        $query = $this->db->query($sql);

        return $query;
    }
    
    public function user_exemplaire($article_id, $exemplaire_id) {


        $sql = "SELECT u.user_id ,u.user_name ,u.user_surname,ua.image_id,ua.quantity,ua.user_article_id,a.article_id,ua.price,ua.title,ua.description,a.article_label
               FROM users u
               JOIN users_articles ua ON u.user_id = ua.user_id
               JOIN articles a ON ua.article_id = a.article_id
               WHERE a.article_id = '$article_id' AND ua.user_article_id = '$exemplaire_id'
               ";
        $query = $this->db->query($sql);

        return $query;
    }

}
