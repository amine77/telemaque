<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function count_new_users(){
        $sql= "SELECT COUNT(*) AS nb FROM users where users.is_new = 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function update_user($user_id, $nom, $prenom, $mail, $role, $status)
    {
        $data = array(
            'user_name' => $nom,
            'user_surname' => $prenom,
            'mail' => $mail,
            'role_id' => $role,
            'status' => $status
        );

        $this->db->where('user_id', $user_id);
        if ($this->db->update('users', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    function set_old($user_id)
    {
        $data = array(
            'is_new' => 0
        );

        $this->db->where('user_id', $user_id);
        if ($this->db->update('users', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_admin($user_id, $nom, $prenom, $login, $email, $role, $password, $active)
    {
        $data = array(
            'user_name' => $nom,
            'user_surname' => $prenom,
            'login' => $login,
            'password' => sha1($password),
            'mail' => $email,
            'role_id' => $role,
            'status' => $active
        );

        $this->db->where('user_id', $user_id);
        if ($this->db->update('users', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_admin($nom, $prenom, $login, $email, $role, $password, $active)
    {
        $data = array(
            'user_name' => $nom,
            'user_surname' => $prenom,
            'login' => $login,
            'password' => sha1($password),
            'mail' => $email,
            'role_id' => $role,
            'status' => $active
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.   
    }

    function add_contact($titre, $email, $description)
    {
        $data = array(
            'title' => $titre,
            'description' => $description,
            'mail' => $email,
            'is_new' => 0,
            'role_id' => 2 //par défaut un contact créé est un admin
        );

        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.   
    }

    function add_adresse_by_user($user_id, $address, $zip_code, $city, $country, $user_receiver_id = '')
    {
        $data = array(
            'user_id' => $user_id,
            'address' => $address,
            'zip_code' => $zip_code,
            'city' => $city,
            'country' => $country
        );

        $this->db->insert('address', $data);
        return ($this->db->affected_rows() != 1) ? false : true; //pour vérifier si l'insertion s'est bien déroulée.   
    }

    function get_adresses_by_user($user_id)
    {
        $sql = "SELECT * FROM address where user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_messages_by_user($user_id)
    {
        $sql = "SELECT * FROM messages where sender = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_ventes_by_user($user_id)
    {
        
    }

    function get_commandes_by_user($user_id)
    {
        
    }

    function get_all_administrators()
    {
        $sql = "SELECT * FROM users, role WHERE  role.role_id = users.role_id AND (users.role_id = 1 or users.role_id = 2 ) ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all()
    {
        $sql = "SELECT * FROM users WHERE role_id =3";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_roles_by_user($user_id)
    {
        $sql = "SELECT * FROM role, users where users.role_id = role.role_id and user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql)->row();
        return $query;
    }

    //get the username & password from tbl_usrs
    function get_user($usr, $pwd)
    {
        $sql = "SELECT * FROM users, role WHERE role.role_id = users.role_id AND login = '" . $usr . "' AND password = '" . sha1($pwd) . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_all_contacts()
    {
        $sql = "SELECT * FROM users WHERE  (title IS NOT NULL OR description IS NOT NULL) ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_user_by_id($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '" . $user_id . "' ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function get_user_by_mail($email)
    {
        $this->db->where('mail', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function update_contact($user_id, $titre, $mail, $description)
    {
        $data = array(
            'title' => $titre,
            'mail' => $mail,
            'description' => $description
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
        return true;
    }

    function update_connection_infos($user_id, $ip_address, $last_connection_date)
    {
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
            'password' => sha1($password),
            'born_at' => $born_at,
            'phone' => $phone,
            'mobile' => $mobile,
            'mail' => $mail,
            'role_id' => 3   //par défaut les utilisateurs qui se connectent auront ROLE_USER
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

    function delete_user($id)
    {
        $this->db->delete('address', array('user_id' => $id));
        $this->db->delete('users', array('user_id' => $id));
    }

}

?>