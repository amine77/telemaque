<?php
class Articles_model extends CI_Model {
 
    public function __construct() {
        $this->load->database();
    }

    public function get_articles($nb) {
      
        $query = $this->db->query("SELECT * FROM articles LIMIT $nb");
       
        return $query;
    }
    
    

}
