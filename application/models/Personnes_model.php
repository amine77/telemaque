<?php

class Personnes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_personnes() {

        $query = $this->db->get('personnes');
        return $query->result_array();
    }

}
