<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_articles($nb = '') {
        $limit = "";
        if ($nb != '')
            $limit = "LIMIT $nb";
        $query = $this->db->query("SELECT * FROM articles $limit");

        return $query;
    }

    public function get_article($article_id = '') {

        if ($article_id == '')
            return;

        $query = $this->db->query("SELECT * FROM articles WHERE article_id='$article_id'");
        $oData = $query->result();
        $spec = $this->specification($article_id);
        $oData = $oData[0];
        $oData->spec = $spec;
        //Insertion image
        $oData->img = $this->utils_model->get_im($oData->image_id);
        return $oData;
    }

    //cette fonction effectue une recherche sur les labels des articles ainsi que leurs mots clés associés
    public function search($key) {
        $sql = "SELECT  articles.article_id, article_label, image_path
            FROM images
           RIGHT JOIN articles ON articles.image_id = images.image_id
           RIGHT JOIN tags_articles ON tags_articles.article_id = articles.article_id
           RIGHT JOIN tags ON tags.tag_id = tags_articles.tag_id
           WHERE article_label LIKE '%$key%' OR tag_label like '%$key%'  ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function specification($article_id = '') {
        $with_article = "";
        if ($article_id != "")
            $with_article = " WHERE a.article_id = '$article_id'  ";
        $sql = "SELECT specification_label,specification_value
               FROM articles_specifications artsp 
               LEFT JOIN specifications sp ON artsp.specification_id = sp.specification_id 
               AND artsp.article_id  ='$article_id' 
               AND artsp.visible = '1'
               ";
        $query = $this->db->query($sql);

        return $query->result();
    }

}
