<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles

    foreach ($articles->result() as $row) {
        echo "<div style='height:150px;background-color:yellow;margin:0 0.5% 15px 0.5%'>
             <h3>" . $row->article_label . "</h3>
             <a href='" . base_url() . "articles/$row->article_id' data-role='" . $row->article_id . "'>Voir les details</a><br/>   
             ";
        echo "<a href='" . base_url() . "vendeurs/$row->article_id' >Voir les vendeurs </a>";
        // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
        echo '</div>';
    }
    ?>


</div>