<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>

    <h1>Bienvenue sur la page d'accueil!</h1>
    <h2>Liste des Articles</h2>
    <div>
        <?php
        // Affiche les articles

        foreach ($articles->result() as $row) {
            echo "<div class='list-article' id='article_" . $row->article_id . "'>
             <h3>" . $row->article_label . "</h3>
             <a href='" . base_url() . "articles/$row->article_id' data-role='" . $row->article_id . "' class='btn btn-primary' >Voir les details</a><br/>   
             ";

            // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
            echo '</div>';
        }
        ?>
  
    </div>    

</div>
