<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class role_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all() {
        $sql = "SELECT * FROM role";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add_role($role_label) {
        $data = array(
            'role_label' => $role_label
        );

        $this->db->insert('role', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function delete_role($role_id) {
        $this->db->delete('role', array('role_id' => $role_id));
    }

    function update_role($role_id, $role_label) {
        $data = array(
            'role_label' => $role_label
        );

        $this->db->where('role_id', $role_id);
        if ($this->db->update('role', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_role_by_id($role_id) {
        $sql = "SELECT * FROM role WHERE role_id = '" . $role_id . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

