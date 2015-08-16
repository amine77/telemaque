<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comment_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_comment($article_id, $pseudo, $comment) {
        $data = array(
            'pseudo' => $pseudo,
            'comment_text' => $comment,
            'article_id' => $article_id
        );

        $this->db->insert('comments', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function get_comment_by_id($comment_id) {
        $query = $this->db->get_where('comments', array('comment_id' => $slug), 1);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function publish_comment($comment_id) {
        $data = array(
            'is_published' => 1
        );

        $this->db->where('comment_id', $comment_id);
        $this->db->update('comments', $data);
        return TRUE;
    }

    function get_all() {
        $sql = "SELECT articles.article_id, articles.article_label, comments.*
            FROM comments, articles
            WHERE comments.article_id= articles.article_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function delete_comment($comment_id) {
        $this->db->delete('comments', array('comment_id' => $comment_id));
    }

    function get_comments_by_article_id($article_id) {
        $query = $this->db->get_where('comments', array('article_id' => $article_id));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

