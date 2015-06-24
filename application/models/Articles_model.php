<?php
class Articles_model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
       
    }

    public function get_articles($nb) {
      
        $query = $this->db->query("SELECT * FROM articles LIMIT $nb");
       
        return $query;
    }
    
    

}
