<?php

class Articles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_articles($nb = '',$stock = false,$is_verified = false) {
        $limit = "";
        $table="";
        $image="";
        if($stock){
            $stock = "WHERE a.article_id = ua.article_id AND ua.quantity>0";
            $table = ",users_articles ua";   
            $image = ",a.image_id as image_id";
        }
        if ($nb != '')
            $limit = "LIMIT $nb";
        $query = $this->db->query("SELECT DISTINCT * $image "
                . "FROM articles a $table $stock"
                . " GROUP BY a.article_id $limit ");

        return $query;
    }

    public function get_all_copies() {
        $sql = "select ua.user_article_id, ua.title, ua.is_verified, a.article_label, ua.created_at,ua.price, u.user_name, u.user_surname from users_articles ua, articles a, users u
               where a.article_id = ua.article_id  and u.user_id= ua.user_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function get_copie_by_id($copy_id) {
        $sql = "select ua.user_article_id, ua.title,ua.quantity, ua.description, ua.is_verified, a.article_label, ua.created_at,ua.price, u.user_name, u.user_surname from users_articles ua, articles a, users u
               where a.article_id = ua.article_id  and u.user_id= ua.user_id and ua.user_article_id = $copy_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_all_with_number_of_copies() {
        $sql = "select a.article_id,a.created_at, a.article_label, a.is_new, a.is_verified, c.category_label, count(ua.user_article_id) as nb_copies_of_article 
                from  users_articles ua
                right join articles a on ua.article_id = a.article_id
                join categories c on c.category_id = a.category_id
                group by a.article_id order by a.created_at desc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function count_new_articles() {
        $sql = "SELECT COUNT(*) AS nb FROM articles where articles.is_new = 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function put_in_slideshow($articles) {
        $data = array(
            'in_carousel' => 0
        );
        $this->db->update('articles', $data);
        foreach ($articles as $article_id) {
            $data = array(
                'in_carousel' => 1
            );

            $this->db->where('article_id', $article_id);
            $this->db->update('articles', $data);
        }
        return TRUE;
    }

    public function get_articles_by_category($category_id = '') {
        $query = $this->db->get_where('articles', array('category_id' => $category_id));
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function set_viewed($article_id) {
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('article_id', $article_id);
        $this->db->update('articles');
        return true;
    }

    function set_old($article_id) {
        $data = array(
            'is_new' => 0
        );

        $this->db->where('article_id', $article_id);
        if ($this->db->update('articles', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }


    function set_valide_copy($copy_id) {
        $data = array(
            'is_verified' => 1
        );

        $this->db->where('user_article_id', $copy_id);
        if ($this->db->update('users_articles', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    function set_valide($article_id) {
        $data = array(
            'is_verified' => 1
        );

        $this->db->where('article_id', $article_id);
        if ($this->db->update('articles', $data)) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_article_restrict($article_id = '') {

        if ($article_id == '')
            return;

        $query = $this->db->query("SELECT * FROM articles WHERE article_id='$article_id'");
        $oData = $query->result();
        $spec = $this->specification_strict($article_id);
        $oData = $oData[0];
        $oData->spec = $spec;
        //Insertion image
        $oData->img = $this->utils_model->get_im($oData->image_id, 350);
        return $oData;
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
//        $sql = "SELECT DISTINCT articles.article_id, article_label, image_path
//            FROM images
//           RIGHT JOIN articles ON articles.image_id = images.image_id
//           RIGHT JOIN tags_articles ON tags_articles.article_id = articles.article_id
//           RIGHT JOIN tags ON tags.tag_id = tags_articles.tag_id
//           WHERE article_label LIKE '%$key%' OR tag_label like '%$key%'  ";
        
        $sql = "SELECT  articles.article_id, article_label, image_path
                FROM images
                RIGHT JOIN articles ON articles.image_id = images.image_id
                RIGHT JOIN tags_articles ON tags_articles.article_id = articles.article_id
                RIGHT JOIN tags ON tags.tag_id = tags_articles.tag_id
                WHERE tag_label like '%$key%'
                 UNION DISTINCT
                SELECT  articles.article_id, article_label, image_path
                 FROM images
                RIGHT JOIN articles ON articles.image_id = images.image_id
                WHERE article_label LIKE '%$key%' ";
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

    public function specification_strict($article_id = '') {
        $with_article = "";
        if ($article_id != "")
            $with_article = " WHERE a.article_id = '$article_id'  ";
        $sql = "SELECT specification_label,specification_value,sp.specification_id
               FROM articles_specifications artsp ,specifications sp
               WHERE artsp.specification_id = sp.specification_id 
               AND artsp.article_id  ='$article_id' 
               AND artsp.visible = '1'
               ";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function get_carousel_articles() {
        $sql = "SELECT  DISTINCT a.article_id, article_label, image_path, a.description
                FROM images
                RIGHT JOIN articles a ON a.image_id = images.image_id
                RIGHT JOIN users_articles ua ON ua.article_id = a.article_id
                WHERE a.in_carousel = 1 AND ua.quantity>0

                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    

}
