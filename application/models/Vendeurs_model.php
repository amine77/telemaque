<?php
class Vendeurs_model extends CI_Model {
 
    public function __construct() {
        $this->load->database();
    }

    public function liste_vendeur($nb) {
      
        $query = $this->db->query("SELECT * FROM articles LIMIT $nb");
       
        return $query;
    }
    
    

}
