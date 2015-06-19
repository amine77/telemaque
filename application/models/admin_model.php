<?php
class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_user($usr, $pwd)
     {
          $sql = "select * from users where login = '" . $usr . "' and password = '" . $pwd . "' ";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
        public function update_password($login,$data){
		$q=$this->db
			->where('login',$login)
			->update('users',$data);
	}
}