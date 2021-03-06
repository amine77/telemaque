<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class category_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_category_by_slug($slug) {
        $query = $this->db->get_where('categories', array('slug' => $slug), 1);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function get_category_child() {
        
        $sql = " SELECT enfant.category_id, mere.category_label AS categorie_parent, enfant.category_label AS categorie, enfant.slug
                 FROM categories AS mere, categories AS enfant
                 WHERE mere.category_id = enfant.parent_category
                 ORDER BY enfant.category_label ASC LIMIT 0,30";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all() {
//        $sql = "select category_id, parent_category, category_label as category from categories where parent_category=0"
//                . " UNION "
//                . "select enfant.category_id, mere.category_label as categorie_parent, enfant.category_label as categorie from categories as mere, categories as enfant where mere.category_id = enfant.parent_category";
        $sql = "SELECT category_id, parent_category, category_label AS category, slug
            FROM categories
            WHERE parent_category =0
            UNION
            SELECT enfant.category_id, mere.category_label AS categorie_parent, enfant.category_label AS categorie, enfant.slug
            FROM categories AS mere, categories AS enfant
            WHERE mere.category_id = enfant.parent_category";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /*
     * retourne uniquement les categories parents et non pas les sous-catégories
     */

    function get_only_parents() {
        $sql = "SELECT category_id, parent_category, category_label AS category, slug
            FROM categories
            WHERE parent_category =0";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add_category($parent_category, $category_label) {
        $data = array(
            'parent_category' => $parent_category,
            'category_label' => $category_label,
            'slug' => url_title(mb_strtolower($category_label, 'UTF-8'))
        );

        $this->db->insert('categories', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function delete_category($id) {
        $this->db->delete('categories', array('category_id' => $id));
    }

    function get_category($id) {
        $query = $this->db->get_where('categories', array('category_id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function update_category($parent_category, $category_id, $category_label) {
        $data = array(
            'parent_category' => $parent_category,
            'category_label' => $category_label,
            'slug' => url_title(mb_strtolower($category_label, 'UTF-8'))
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

