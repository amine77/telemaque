<?php

class Vendeurs_model extends CI_Model {


    public function add_sell() {

       
    }

    public function get_sell($user_article_id='',$user_id=0,$is_verified=1,$status='in progress') {
        if($user_id>0){
            $user_id= "AND user_id='$user_id'";
        }
        if($user_article_id!='')
            $user_article_id="AND user_article_id='$user_article_id'";
        $sql = "SELECT *
              FROM users_articles
              WHERE is_verified = '$is_verified' AND status='$status' $user_id $user_article_id
              ORDER BY created_at DESC
             ";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}
