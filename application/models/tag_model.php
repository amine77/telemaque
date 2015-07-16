<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tag_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all() {
//        $sql = "select * from tags, articles, tags_articles 
//                where tags.tag_id = tags_articles.tag_id
//                and articles.article_id = tags_articles.article_id ";
        
        $sql = "SELECT tags_articles.tag_id, tags.tag_label, count( * ) AS nb_articles
                FROM tags_articles, tags
                WHERE tags_articles.tag_id = tags.tag_id
                GROUP BY tag_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add_tag($parent_category, $tag_label) {
        $data = array(
            'parent_category' => $parent_category,
            'category_label' => $category_label
        );

        $this->db->insert('categories', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function delete_tag($id) {
        $this->db->delete('categories', array('category_id' => $id));
    }

    function get_tag($id) {
        $query = $this->db->get_where('categories', array('category_id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function update_tag($parent_category, $category_id, $category_label) {
        $data = array(
            'parent_category' => $parent_category,
            'category_label' => $category_label
        );

        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

