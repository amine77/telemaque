<?php

class Personnes_model extends CI_Model {


    public function get_personnes() {

        $query = $this->db->get('personnes');
        return $query->result_array();
    }

}
