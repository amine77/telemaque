<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comment_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_comment_by_id($comment_id)
    {
        $query = $this->db->get_where('comments', array('comment_id' => $slug), 1);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function get_all()
    {
        $sql = "SELECT articles.article_id, articles.article_label, comments.*
            FROM comments, articles
            WHERE comments.article_id= articles.article_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function add_comment($parent_category, $category_label)
    {
        $data = array(
            'parent_category' => $parent_category,
            'category_label' => $category_label,
            'slug' => url_title(mb_strtolower($category_label, 'UTF-8'))
        );

        $this->db->insert('comments', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function delete_comment($comment_id)
    {
        $this->db->delete('comments', array('comment_id' => $comment_id));
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

