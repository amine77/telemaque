<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tag_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all() {


        $sql = "SELECT tags_articles.tag_id, tags.tag_label, count( * ) AS nb_articles
                FROM tags_articles, tags
                WHERE tags_articles.tag_id = tags.tag_id
                GROUP BY tag_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add_tag($tag_label, $articles_id) {
        $data = array(
            'tag_label' => $tag_label
        );

        $this->db->insert('tags', $data);
        $insert_id = $this->db->insert_id();
        $insertion = ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
        if ($insertion) {
            $datas = array();
            foreach ($articles_id as $article_id) {
                
            }
            $datas[] = array(
                'tag_id' => $insert_id,
                'article_id' => $article_id
            );

            $this->db->insert_batch('tags_articles', $datas);
            return true;
        } else {
            return false;
        }
    }

    function delete_tag($id) {
        $this->db->delete('tags_articles', array('tag_id' => $id));
        $this->db->delete('tags', array('tag_id' => $id));
    }

    function find_articles($tag_id) {
        $sql = "SELECT  * FROM tags_articles WHERE tag_id= $tag_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_tag($id) {
        $query = $this->db->get_where('tags', array('tag_id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function update_tag($tag_id, $tag_label, $articles_id) {
        $data = array(
            'tag_label' => $tag_label
        );

        $this->db->where('tag_id', $tag_id);
        $this->db->update('tags', $data);
        $this->db->delete('tags_articles', array('tag_id' => $tag_id));
        $datas = array();
        foreach ($articles_id as $article_id) {
            $datas[] = array(
            'tag_id' => $tag_id,
            'article_id' => $article_id
        );
        }
        

        $this->db->insert_batch('tags_articles', $datas);
        return true;
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

