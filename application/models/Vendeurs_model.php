<?php

class Vendeurs_model extends CI_Model {


    public function add_sell() {

       
    }

    public function get_sell($user_article_id='',$user_id=0,$is_verified=1) {
        $table="";
        if($user_id>0){
            $user_id= "AND user_id='$user_id' AND ua.user_article_id=cl.user_article_id";
            $table = ", command_lines cl";
        }
      
        if($user_article_id!=''){
            $user_article_id="AND user_article_id='$user_article_id'";
            $table = ",command_lines cl";
        }
        $sql = "SELECT *,cl.quantity as qtycl
              FROM users_articles ua $table
              WHERE is_verified = '$is_verified' $user_id $user_article_id 
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
