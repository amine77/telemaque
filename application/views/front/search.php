
<div class="center">
    <strong>Recherche :<?= $recherche ?> <br><?= count($articles) ?> articles trouvé(s)</strong>
    <div>
        <?php

        foreach ($articles as $article) {
            echo "<div class='list-article' id='article_" . $article['article_id'] . "'>
             <h3>" . $article['article_label']. "</h3>
             <a href='" . base_url() . "articles/".$article['article_id']."' data-role='" . $article['article_id'] . "' class='btn btn-primary' >Voir les details</a><br/>   
             ";
            echo '</div>';
        }
        ?>

    </div>    

</div>
