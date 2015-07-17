<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_articles($nb) {

        $query = $this->db->query("SELECT * FROM articles LIMIT $nb");

        return $query;
    }

    public function search($key) {
        $sql = "SELECT article_id,article_label
            FROM articles
            WHERE article_label LIKE '%$key%'
            UNION 
            SELECT  articles.article_id, article_label FROM articles, tags, tags_articles
            WHERE articles.article_id = tags_articles.article_id  AND tags_articles.tag_id = tags.tag_id
            AND tag_label like '%$key%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
