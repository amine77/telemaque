<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class statistics_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_total_users()
    {
        $sql = "SELECT * FROM users, role WHERE users.role_id = role.role_id AND role_label='ROLE_USER' ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function get_total_new_users()
    {
        $sql = "SELECT * FROM users, role WHERE users.role_id = role.role_id AND role_label='ROLE_USER' AND is_new =1 ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function get_total_not_activated_users()
    {
        $sql = "SELECT * FROM users, role WHERE users.role_id = role.role_id AND role_label='ROLE_USER' AND status =0 ";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function get_average_users_age()
    {
        $sql = "select floor(avg((year(now())- year(born_at) ))) as average from users, role where users.role_id = role.role_id and role_label = 'ROLE_USER'";
        $query = $this->db->query($sql);
        return $query->row()->average;
    }

    function get_departement_of_most_users()
    {
        $sql = "select count(*) as nb_occurences, substr(zip_code, 1, 2) as departement from address group by departement order by nb_occurences desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->departement;
    }

    function get_last_user_inscription_date()
    {
        $sql = "SELECT users.created_at FROM users, role WHERE users.role_id = role.role_id AND role_label='ROLE_USER' order by created_at desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->created_at;
    }

    function get_last_message_reception_date()
    {
        $sql = "SELECT * FROM messages  order by date desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->date;
    }

    function get_salesman_of_most_sold_articles()
    {
        
    }

    function get_seller_of_most_bigger_turnover()
    {
        
    }

    function get_buyer_of_most_bought_articles()
    {
        
    }

    function get_buyer_of_most_of_expenses()
    {
        
    }

    // un article est à vendre s'il a été vérifié par l'administrateur
    function get_total_items_for_sale()
    {
        $sql = "select count(*) as total_articles from articles where is_verified = 1";
        $query = $this->db->query($sql);
        return $query->row()->total_articles;
    }

    // un exemplaire est à vendre s'il a été vérifié par l'administrateur
    function get_total_copies_for_sale()
    {
        $sql = "select count(*) as total_samples from users_articles where is_verified = 1";
        $query = $this->db->query($sql);
        return $query->row()->total_samples;
    }

    function get_total_categories()
    {
        $sql = "select count(*) as total_categories from categories";
        $query = $this->db->query($sql);
        return $query->row()->total_categories;
    }

    function get_most_expensive_item_copy()
    {
        $sql = "SELECT articles.article_label as article_title, users_articles.title as copy_title FROM   users_articles, articles WHERE articles.article_id =  users_articles.article_id order by price desc limit 1";
        $query = $this->db->query($sql);
        return ($query->row()->article_title != '') ? $query->row()->article_title : $query->row()->copy_title;
    }

    function get_cheapest_item_copy()
    {
        $sql = "SELECT articles.article_label as article_title, users_articles.title as copy_title FROM   users_articles, articles WHERE articles.article_id =  users_articles.article_id order by price limit 1";
        $query = $this->db->query($sql);
        return ($query->row()->article_title != '') ? $query->row()->article_title : $query->row()->copy_title;
    }

    function get_item_that_has_most_of_copies()
    {
        $sql = "select a.article_id, a.article_label, sum(ua.quantity) as total_exemplaires from users_articles ua, articles a where a.article_id = ua.article_id group by ua.article_id order by total_exemplaires";
        $query = $this->db->query($sql);
        return $query->row()->article_label;
    }

    function get_item_most_seen()
    {
        //
        $sql = "select article_label from articles order by views desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->article_label;
    }

    function get_oldest_item()
    {
        //
        $sql = "select article_label from  articles order by created_at asc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->article_label;
    }

    function get_last_item()
    {
        //
        $sql = "select article_label from  articles order by created_at desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->article_label;
    }

    function get_last_item_copy()
    {
        //
        $sql = "select title from  users_articles order by created_at desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->title;
    }

    function get_last_purchase_date()
    {
        $sql = "select created_at from  command order by created_at desc limit 1";
        $query = $this->db->query($sql);
        return $query->row()->created_at;
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

