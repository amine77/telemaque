<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles
    ?>
    <div style='min-height:150px;border:1px solid grey;margin-bottom:15px'>
        <h3><?= $article->article_label ?></h3>
        <div id="image_article">
            <?= $article->img['imsrc'] ?>
        </div>
        <table id="caracteristiques" width="300px">
            <caption><h4><b>Caracteristiques generaux </b></h4></caption>
            
            <tbody>
                <?php
                for ($i = 0; $i < count($article->spec); $i++) {
                    $spec = $article->spec[$i];
                    echo "<tr>
                             <td> $spec->specification_label</td>
                             <td> $spec->specification_value</td>
                         </tr>";
                }
                ?>
            </tbody>
        </table>
        <div id="description">
            <h4><b>Description</b></h4>
            <?= $article->description ?>
        </div>

    </div>
    <?php
    if (count($vendeurs_articles) > 0) {
        foreach ($vendeurs_articles as $row) :
            ?>
            <div class="vendeurs">

                <div>
                    <div class="title">
                        <h4>  <?= ucfirst($row->title) ?> </h4>
                    </div>
                    <div class="image_mini">
                        <?= $row->img ?>
                    </div>
                    <div class="carac">
                        <strong> Caracteristiques :</strong> <br/>
                        <table width="300px">
                      
                            <tbody>
                                <?php
                                    for ($i = 0; $i < count($row->spec); $i++) {
                                        $spec = $row->spec[$i];
                                        echo "<tr>
                                                <td> $spec->specification_label</td>
                                                <td> $spec->specification_value</td>
                                              </tr>";
                                    }
                                ?>
                            </tbody>
                        </table>  
                        <br/>
                    </div>
                    <a href="<?= base_url() . 'usr/' . $row->user_id ?>">
                        <strong><?= $row->user_name . ' ' . $row->user_surname; ?>
                        </strong>
                    </a>
                    <a class="btn btn-primary" href="<?= base_url() . 'articles/' . $row->article_id . '/' . $row->user_id ?>">Voir le produit</a>
                    <div class="quantity">

                        <?php
                        echo '<span style="font-size:15px;">' . $row->quantity . '</span> exemplaire';
                        echo (intval($row->quantity) > 1) ? 's' : ''
                        ?>
                    </div>
                    <div id="prix">
                        <h3><?= $row->price ?>€</h3>
                    </div>
                </div>

            </div>





            <?php
        endforeach;
    } else {
        echo 'Pas de vendeur pour cette article';
    }
    ?>


</div>