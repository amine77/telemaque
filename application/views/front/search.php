
<div class="center">
    <strong>Recherche "<?= $recherche ?>" <br><?= count($articles) ?> articles trouvé(s)</strong>
    <div>
        <?php

        foreach ($articles as $article) {
            if(trim($article['image_path'])==''){
              $img="";  
            }else{
                $img="<img src='".base_url(). $article['image_path'] ."' width='250'>";
            }
            
            echo "<div class='list-article' id='article_" . $article['article_id'] . "'>
             <h3>" . $article['article_label']. "</h3>
             <a href='" . base_url() . "articles/".$article['article_id']."' data-role='" . $article['article_id'] . "' class='btn btn-primary' >"
                    . $img."Voir les details</a><br/>";
            echo '</div><div class="clear"></div>';
        }
        ?>

    </div>    

</div>
