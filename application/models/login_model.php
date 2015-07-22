<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     function add_admin($nom, $prenom, $email, $role, $active){
      $data = array(
            'user_name' => $titre,
            'user_surname' => $description,
            'mail' => $email,
            'role_id' => $role,
            'status'=> $active
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.   
     }
     function add_user($titre, $email, $description){
      $data = array(
            'title' => $titre,
            'description' => $description,
            'mail' => $email,
            'role_id' => 2 //par défaut un contact créé est un admin
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.   
     }
     function get_adresses_by_user($user_id) {
        $sql = "SELECT * FROM address where user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
     function get_messages_by_user($user_id) {
        $sql = "SELECT * FROM messages where sender = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_ventes_by_user($user_id) {
        
    }
    function get_commandes_by_user($user_id) {
        
    }
     function get_all_administrators(){
         $sql = "SELECT * FROM users, role WHERE  role.role_id = users.role_id AND (users.role_id = 1 or users.role_id = 2 ) ";
          $query = $this->db->query($sql);
           return $query->result_array();
     }
     function get_all() {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
     function get_roles_by_user($user_id) {
        $sql = "SELECT * FROM role, users where users.role_id = role.role_id and user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql)->row();
        return $query;
    }
     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "SELECT * FROM users, role WHERE role.role_id = users.role_id AND login = '" . $usr . "' AND password = '" . $pwd . "' ";
          $query = $this->db->query($sql);
           return $query->row_array();
     }
     function get_all_contacts(){
         $sql = "SELECT * FROM users WHERE  (title IS NOT NULL OR description IS NOT NULL) ";
          $query = $this->db->query($sql);
           return $query->result_array();
     }
     function get_user_by_id($user_id){
         $sql = "SELECT * FROM users WHERE user_id = '" . $user_id . "' ";
          $query = $this->db->query($sql);
           return $query->row_array();
     }
     function update_connection_infos($user_id, $ip_address, $last_connection_date){
         $data = array(
            'last_connection_date' => $last_connection_date,
            'ip_address' => $ip_address
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
     }
     function signup_user($user_name, $user_surname, $login, $password, $born_at, $phone, $mobile, $mail)
    {

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'login' => $login,
            'password' => $password,
            'born_at' => $born_at,
            'phone' => $phone,
            'mobile' => $mobile,
            'mail' => $mail,
            'role_id'=>3   //par défaut les utilisateurs qui se connectent auront ROLE_USER
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.
    }

    function mail_exists($key)
    {
        $this->db->where('mail', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function delete_user($id){
         $this->db->delete('users', array('user_id' => $id));
    }
}?>