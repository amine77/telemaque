<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>

    <h2>Liste des Articles</h2>
    <div>
        <?php
        // Affiche les articles

        foreach ($articles->result() as $row) {
            echo "<div class='list-article' id='article_" . $row->article_id . "'>
             <div class='bloc_titre'>
                <h3>" . $row->article_label . "</h3>
             </div>
             
             <img src='" . base_url() . "assets/img/img_none.jpg'>";

            // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut mattis, velit vel scelerisque efficitur
            lectus neque facilisis tellus, id scelerisque turpis erat sit amet nunc. Vivamus fringilla posuere.</p><br>';
            
            echo '<div class="clear"></div>';
            
            echo "<a href='" . base_url() . "articles/$row->article_id' data-role='" . $row->article_id . "' class='btn_base' >Voir les details</a><br>";
            
            echo '<br></div>';
        }
        ?>
  
    </div>    
    <div class="clear"></div>
</div>
