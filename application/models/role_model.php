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


}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

