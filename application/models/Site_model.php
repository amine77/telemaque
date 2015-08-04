<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_site_configurations() {


        $sql = "SELECT *
                FROM site_identity, images
                WHERE site_identity.logo = images.image_id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function update_site_name($new_name){
        $data = array(
            'site_name' => $new_name
        );

        $this->db->where('id', 1);
        $this->db->update('site_identity', $data);
        return true;
    }
    function update_site_slogan($new_slogan)
    {
        $data = array(
            'slogan' => $new_slogan
        );

        $this->db->where('id', 1);
        $this->db->update('site_identity', $data);
        return true;
    }


}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

