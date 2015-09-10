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
class Cmd_model extends CI_Model {

    public function get_facture($cmd_id) {
        
    }

    public function get_cmd($cmd_id = '', $user_id, $nb = '', $width = '') {
        $limit = "";
        if ($cmd_id != '') {
            $cmd_id = " AND cmd.command_id='$cmd_id'";
        }
        if ($nb != '')
            $limit = "LIMIT $nb";


        $sql = "SELECT *,cmdl.price price,cmdl.quantity quantity,ua.image_id as enfant_im ,cmd.created_at as created_at
                FROM command cmd ,command_lines cmdl,users_articles ua,articles a  
                WHERE cmd.user_id='$user_id' AND cmdl.command_id=cmd.command_id 
                    AND ua.user_article_id= cmdl.user_article_id
                    AND a.article_id = ua.article_id
                $cmd_id $limit
                    GROUP BY command_lines_id,cmd.command_id
                
               ";

        $query = $this->db->query($sql);
        $oData = $query->result();
        
        $totalCmd = 0;
        $tab = array();
        
        for ($i = 0; $i < count($oData); $i++) {
            $montantCmd= 0;
            $tab[$oData[$i]->command_id]['command_id'] = $oData[$i]->command_id;
            $tab[$oData[$i]->command_id]['created_at'] =  $oData[$i]->created_at;
            $totalCmd += $oData[$i]->price;
            $montantCmd+= $oData[$i]->price;
            $image_id = (is_null($oData[$i]->enfant_im)) ? $oData[$i]->image_id : $oData[$i]->enfant_im;
            $tab[$oData[$i]->command_id]['address_id'] = $oData[$i]->address_id;
            $image = $this->utils_model->get_im($image_id, $width)['imsrc'];
            $cmd_line = array(
                'quantity' => $oData[$i]->quantity,
                'user_id' => $oData[$i]->user_id,
                'price' => $oData[$i]->price,
                'user_article_id' => $oData[$i]->user_article_id,
                'title' => $oData[$i]->title,
                'image' => $image
            );
            $tab[$oData[$i]->command_id]['montant_commande'] = $montantCmd;
            $tab[$oData[$i]->command_id]['command_line_' . $oData[$i]->command_lines_id] = $cmd_line;
        }
        


        $tab['Total_Cmd'] = $totalCmd;

        return $tab;
    }

    public function add_cmd($data) {


        $aData = array(
            'user_id' => $data['user_id'],
            'address_id' => $data['address_id'],
        );
        $this->db->insert('command', $aData);
        $command_id = $this->db->insert_id();

        foreach ($data['products'] as $user_article_id => $productQty) {
            $aData = $this->db->query("SELECT price,quantity FROM users_articles WHERE user_article_id='$user_article_id'")->row();

            $data = array(
                'quantity' => $productQty,
                'price' => $productQty * $aData->price,
                'command_id' => $command_id,
                'user_article_id' => $user_article_id
            );
            $this->db->insert('command_lines', $data);

            $dataUpdate = array(
                'quantity' => intval($aData->quantity) - intval($productQty),
            );

            $this->db->where('user_article_id', $user_article_id);
            $this->db->update('users_articles', $dataUpdate);
        }
        return $command_id;
    }

}
