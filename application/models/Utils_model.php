<?php

class Utils_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_im($id, $width = 250, $height = '', $alt = '') {
        $wImg = '';
        $hImg = '';
        if ($width > 0)
            $wImg = 'width="' . $width . 'px"';
        if ($height > 0)
            $hImg = 'height="' . $height . 'px"';
        $query = $this->db->get_where('images', array('image_id' => $id));

        $query = $query->result();

        if (count($query) != 1) {
            $oData = array(
                'imsrc' => '<img src="' . base_url() .'assets/img/img_none.jpg"'  . $wImg  . $hImg . ' alt="image non trouvée"/>'
            );
            return $oData;
        }

        $oData = array(
            'imc' => '',
            'imsrc' => '<img src="' . base_url() . $query[0]->image_path . '" ' . $wImg . ' ' . $hImg . '  alt="' . $alt . '" />',
            'imname' => $query[0]->image_label,
        );
        return $oData;
    }

    /* public function im_insert($image_a_stocker, $delta_rep = '') {
      $dirim = '../assets/img/insert/';

      $is = filesize($image_a_stocker);
      var_dump($is);
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
     */

    public function form_upload_img($im_id = '', $preview = true, $width = 250, $height = '', $alt = '') {

        $html = form_open_multipart();
        $html.= " <table class='table'>
               <tr>
                   <td>Image</td>
                   <td>" . form_upload('pic') . "</td>    
               </tr>
               <tr>
                   <td>";
        if (isset($_FILES['pic']) && $preview) {
            
            $img = $this->get_im($im_id, $width, $height, $alt);
            $html.= $img['imsrc'];
        }

        $html.= "</td>
                   <td>" . form_submit('submit', 'Save', 'class="btn btn-primary"') . "</td>    
               </tr>
           </table>";
        return $html;
    }

    public function img_insert($img) {
        $type = explode('.', $img['name']);
        $type = $type[count($type) - 1];
        $url = "./assets/img/upload/" . uniqid(rand()) . '.' . $type;
        if (in_array($type, array("jpg", "jpeg", "gif", "png"))) {
            if (is_uploaded_file($img['tmp_name'])) {
                $datasize = getimagesize($img['tmp_name']);
                if (move_uploaded_file($img['tmp_name'], $url)) {

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
                    return $im_id;
                }
            }
        }
        return " Image non inséré";
    }

    /* public function save($data) {
      $this->db->insert('images', $data);

      $im_id = $this->db->insert_id();
      return $im_id;
      } */

    public function debug($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

}
