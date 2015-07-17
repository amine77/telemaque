<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_articles($nb='') {
        $limit="";
        if($nb!='')
            $limit =  "LIMIT $nb";
        $query = $this->db->query("SELECT * FROM articles $limit");

        return $query;
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

}
