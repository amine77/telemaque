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
                FROM site_identity, images, address
                WHERE site_identity.logo = images.image_id
                AND site_identity.address_id = address.address_id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function update_site_address($zip_code, $address, $city, $country){
        $data = array(
            'zip_code' => $zip_code,
            'address' => $address,
            'city' => $city,
            'country' => $country,
        );

        $this->db->where('address_id', 1);//la première addresse qui doit être insérée correspond à l'adresse de la boutique
        $this->db->update('address', $data);
        return true;
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
    function update_site_phone($new_phone){
        $data = array(
            'phone' => $new_phone
        );

        $this->db->where('id', 1);
        $this->db->update('site_identity', $data);
        return true;
    }
    function update_site_social_networks($facebook, $twitter, $google_plus){
         $data = array(
            'facebook' => $facebook,
            'twitter' => $twitter,
            'google_plus' => $google_plus,
        );

        $this->db->where('id', 1);
        $this->db->update('site_identity', $data);
        return true;
    }
    function update_site_legal_notice($new_legal_notice){
        $data = array(
            'legal_notice' => $new_legal_notice
        );

        $this->db->where('id', 1);
        $this->db->update('site_identity', $data);
        return true;
    }
    function update_site_cgv($new_cgv){
        $data = array(
            'cgv' => $new_cgv
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

