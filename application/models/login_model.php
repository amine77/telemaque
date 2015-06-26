<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "select * from users where login = '" . $usr . "' and password = '" . $pwd . "' ";
          $query = $this->db->query($sql);
          return $query->num_rows();
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
}?>