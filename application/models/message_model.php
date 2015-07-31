<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class message_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function delete_message($id)
    {
        $this->db->delete('messages', array('message_id' => $id));
    }

    function send_message($sender, $receiver, $subject, $content)
    {
        $data = array(
            'title' => $subject,
            'content' => $content,
            'receiver' => $receiver
        );
        if($sender !=0){
            $data['sender']=$sender;
        }

        $this->db->insert('messages', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

