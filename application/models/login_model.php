<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     function get_all_administrators(){
         $sql = "SELECT * FROM users, role WHERE  role.role_id = users.role_id AND (users.role_id = 1 or users.role_id = 2 ) ";
          $query = $this->db->query($sql);
           return $query->result_array();
     }
     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "SELECT * FROM users, role WHERE role.role_id = users.role_id AND login = '" . $usr . "' AND password = '" . $pwd . "' ";
          $query = $this->db->query($sql);
           return $query->row_array();
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