<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cmd_model
 *
 * @author Linkfox
 */
class Cmd_model extends CI_Model{
    
    public function get_facture($cmd_id) {
        
        
    }
 
    public function add_cmd($data){
        
      
        $aData = array(
                        'user_id' => $data['user_id'],
                        'address_id' => $data['address_id'],
                    );
        $this->db->insert('command', $aData);
        $command_id = $this->db->insert_id();
        
        foreach($data['products'] as $user_article_id => $productQty){
            $price = $this->db->query("SELECT price FROM users_articles WHERE user_article_id='$user_article_id'")->row()->price;
            $data = array(
             'quantity'=> $productQty,
             'price'=>  $price, 
             'command_id' =>$command_id,
             'user_article_id'=> $user_article_id 
            );
            $this->db->insert('command_lines', $data);
        }
    }
    
}
