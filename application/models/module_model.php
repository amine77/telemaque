<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class module_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function is_carousel_activated() {
        $query = $this->db->get_where('modules', array('module_id' => 1));
        $row = $query->row(); //ou $array = $query->row_array();

        if ($row->module_status == 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_all() {
        $sql = "SELECT * FROM modules";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_module_by_id($module_id) {
        $query = $this->db->get_where('modules', array('module_id' => $module_id));

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function update_module($module_id, $module_status) {
        $data = array(
            'module_status' => $module_status
        );

        $this->db->where('module_id', $module_id);
        if ($this->db->update('modules', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_activated_modules() {
        $query = $this->db->get_where('modules', array('module_status' => 1));

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

