<?php

class Utils_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_im($id, $width = 0, $height = 0, $alt = '') {
        $wImg = '';
        $hImg = '';
        if ($width > 0)
            $wImg = 'width="' . $width . 'px"';
        if ($height > 0)
            $wImg = 'height="' . $height . 'px"';
        $query = $this->db->get_where('images', array('image_id' => $id));
        $oData = array(
            'imc' => '',
            'imsrc' => '<img src="/assets/img/im/' . $query[0]['image_label'] . '" ' . $wImg . ' ' . $hImg . '  alt="' . $alt . '" />',
            'imname' => $query[0]['image_label'],
        );
        return $oData;
    }

    public function im_insert($image_a_stocker, $delta_rep = '') {
        $dirim = '../images/im/';
        $is = @filesize($image_a_stocker);
        if ($is > 0) {
            list($iw, $ih, $it) = @getimagesize($image_a_stocker);
            switch ($it) {
                case 1: $ext = 'gif';
                    break;
                case 2: $ext = 'jpg';
                    break;
                case 3: $ext = 'png';
                    break;
                case 4: $ext = 'swf';
                    break;
                case 5: $ext = 'psd';
                    break;
                case 6: $ext = 'bmp';
                    break;
                case 7: $ext = 'tif';
                    break;
                case 8: $ext = 'tif';
                    break;
                case 9: $ext = 'jpc';
                    break;
                case 10: $ext = 'jp2';
                    break;
                case 11: $ext = 'jpx';
                    break;
                case 12: $ext = 'jb2';
                    break;
                case 13: $ext = 'swc';
                    break;
                case 14: $ext = 'iff';
                    break;
                case 15: $ext = 'bmp';
                    break;
                case 16: $ext = 'xbm';
                    break;
                default: $ext = substr($image_a_stocker, -3, 3);
                    break;
            }
            if (($it != 1) && ($it != 2) && ($it != 3)) {
                //pas un format convenable alors on change
                $convert2jpeg = true;
                $ext = 'jpg';
                $im_fichier = basename($image_a_stocker) . '.' . $ext;
            } else {
                $im_fichier = basename($image_a_stocker);
            }

            $this->db->insert('images', array(
                'format' => $ext,
                'image_label' => $im_fichier,
                'size' => $is,
                'width' => $iw,
                'height' => $ih,
                'image_path' => $delta_rep . $im_fichier
            ));
            $im_id = $this->db->insert_id();
            $newfile = $dirim . md5($im_id . $is) . '_' . $is . '.' . $ext;
            if ($convert2jpeg) {
                $image = new Imagick($image_a_stocker);
                $image->setImageCompression(Imagick::COMPRESSION_JPEG);
                $image->setImageCompressionQuality(90);
                $image->writeImage($delta_rep . $newfile);
                $image->destroy();
            } else {
                copy($image_a_stocker, $delta_rep . $newfile);
            }
            return $im_id;
        }
    }
    
    public function debug($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

}
