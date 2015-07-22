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
    function add_role($role_label){
        $data = array(
            'role_label' => $role_label
        );

        $this->db->insert('role', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }
    function delete_role($role_id){
        $this->db->delete('role', array('role_id' => $role_id));
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

