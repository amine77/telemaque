<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class statistics_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_total_users() {
        $sql = "SELECT * FROM role";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_total_new_users() {
        
    }
    function get_total_not_activated_users() {
        
    }
    function get_average_users_age() {
        
    }
    function get_departement_of_most_users() {
        
    }
    function get_last_user_inscription_date() {
        
    }
    function get_last_message_reception_date() {
        
    }
    function get_salesman_of_most_sold_articles() {
        
    }
    function get_seller_of_most_bigger_turnover() {
        
    }
    function get_buyer_of_most_bought_articles() {
        
    }
    function get_buyer_of_most_of_expenses() {
        
    }
    function get_total_items_for_sale() {
        
    }
    function get_total_copies_for_sale() {
        
    }
    function get_total_categories() {
        
    }
    function get_most_expensive_item_copy() {
        
    }
    function get_cheapest_item_copy() {
        
    }
    function get_item_that_has_most_of_copies() {
        
    }
    function get_most_commented_item() {
        
    }
    function get_item_most_seen() {
        
    }
    function get_oldest_item() {
        
    }
    function get_last_item() {
        
    }
    function get_last_purchase_date() {
        
    }


   

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

