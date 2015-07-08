<?php



class Utils_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 
    public function getIm($id,$width=0,$height=0,$alt=''){
        $wImg='';
        $hImg='';
        if($width>0)
            $wImg='width="'.$width.'px"';
        if($height>0)
            $wImg='height="'.$height.'px"';
        $query = $this->db->get_where('images', array('id' => $id));
        $oData = array(
            'imc' =>  '',
            'imsrc' => '<img src="/assets/img/im-user/'.$query[0]['image_label'].'" '.$wImg.' '.$hImg.'  alt="'.$alt.'" />',
            'imname' =>$query[0]['image_label'],   
        );
        return $oData;
    }
}
