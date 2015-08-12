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
        $sql = "SELECT sender, mail, message_id, messages.title , date, content, messages.is_new, mail_sender FROM users RIGHT JOIN messages ON messages.sender = users.user_id";
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

    function count_new_messages(){
        $sql= "SELECT COUNT(*) AS nb FROM messages where messages.is_new = 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function get_message_by_id($message_id)
    {
        $sql = "SELECT sender, mail, message_id, messages.title , date, content, messages.is_new, mail_sender FROM users RIGHT JOIN messages ON messages.sender = users.user_id "
                . "WHERE messages.message_id = $message_id";
        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    function set_old($message_id)
    {
        $data = array(
            'is_new' => 0
        );

        $this->db->where('message_id', $message_id);
        if ($this->db->update('messages', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

