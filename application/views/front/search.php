
<div id="bloc_contenu">
    <strong>Recherche "<?= $recherche ?>" <br><?= count($articles) ?> articles trouvé(s)</strong>
    <br><br>
    <div>
        <?php
            echo '<table>';
        
            foreach ($articles as $article) {
                if(trim($article['image_path'])==''){
                    $img="<img src='".base_url(). "assets/img/img_none.jpg' height='80'>";  
                }else{
                    $img="<img src='".base_url(). $article['image_path'] ."' height='80'>";
                }

                echo '
                        <tr>
                            <td class="col_1">
                                ' . $img . '
                            </td>
                            <td class="col_2">
                                <h3>' . $article['article_label'] . '</h3>
                            </td>
                            <td class="col_3">
                                <a href="' . base_url() . 'articles/' . $article["article_id"] . '" data-role="' . $article["article_id"] . '" class="btn btn-primary" >' . 'Voir les details</a><br/>
                            </td>
                        </tr>
                    ';
            }
            
            echo '</table>';
        ?>
        
        
    </div>    

</div>
