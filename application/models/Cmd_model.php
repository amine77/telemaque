<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cmd_model
 *
 * @author Linkfox
 */
class Cmd_model {
    
    public function get_facture($cm) {
        
        
    }
    /*A modifier*/
    public function add_cmd($data){
         $data = array(
                        'format' => $type,
                        'image_label' => $img['name'],
                        'size' => $img['size'],
                        'width' => $datasize[0],
                        'height' => $datasize[1],
                        'image_path' => $url
                    );
        $this->db->insert('images', $data);
        $im_id = $this->db->insert_id();
    }
    
}
