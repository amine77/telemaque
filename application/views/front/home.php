<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>
    <form method="GET">
        <input type="search" name="search" id="search"/>
        <input type="submit" value="Valider">
    </form>
    <h1>Bienvenue sur la page d'accueil!</h1>
    <h2>Liste des Articles</h2>
    <?php
// Affiche les articles

    foreach ($articles->result() as $row) {
        echo "<div style='width:32%;height:150px;background-color:yellow;display:inline-block;margin:0 0.5%'>
             <h3>" . $row->article_label . "</h3>
             <a href='#' data-role='".$row->article_id."'>Voir les details</a><br/>   
             ";
        echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
        echo '</div>';
    }
    ?>
</div>