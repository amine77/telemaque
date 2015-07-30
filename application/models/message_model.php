<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class message_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    

    function delete_message($id) {
        $this->db->delete('messages', array('message_id' => $id));
    }
    function send_message($sender, $receiver, $content, $title) {
        
    }

   

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

