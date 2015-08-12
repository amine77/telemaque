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

    function get_all()
    {
        //trouver les messages qui n'ont pas pas de sender, dans ce cas le mail du sender se trouve dans le champ sender_mail de la table messages
        $sql = "SELECT sender, mail, message_id, messages.title , date, content, is_new, mail_sender FROM users RIGHT JOIN messages ON messages.sender = users.user_id";
        $query = $this->db->query($sql);
        return $query->result_array();
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
        if (is_int($sender)) {
            $data['sender'] = $sender;
        } elseif (is_string($sender)) {
            $data['mail_sender'] = $sender;
        }

        $this->db->insert('messages', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function get_message_by_id($message_id)
    {
        $sql = "SELECT sender, mail, message_id, messages.title , date, content, is_new, mail_sender FROM users RIGHT JOIN messages ON messages.sender = users.user_id "
                . "WHERE messages.message_id = $message_id";
        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {
            return $query->row_array();
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

