<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles
    ?>

    <h3><?= $article->article_label ?></h3>


    <div id="bloc_details_article">
        <div id="image_article">
            <?= $article->img['imsrc'] ?>
        </div>

        <table id="caracteristiques">
            <caption><h4><b>Caracteristiques generaux </b></h4></caption>
            <tbody>
                <?php
                $trouve = false;
                for ($i = 0; $i < count($article->spec); $i++) {

                    $spec = $article->spec[$i];
                    if ($spec->specification_label != "") {
                        $trouve = true;
                        echo "<tr>
                                 <td class='col_1'> $spec->specification_label : </td>
                                 <td class='col_2'> $spec->specification_value</td>
                             </tr>";
                    }
                }
                if (!$trouve) {
                    echo "<tr><td colspan='2' align='center'>Il n'y pas de caracteristique</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="clear"></div>

        <div id="description">
            <h4><b>Description</b></h4>
<?= $article->description ?>
        </div>
    </div>

    <h3>Exemplaires en vente</h3>   
<?php
if (count($vendeurs_articles) > 0) {
    foreach ($vendeurs_articles as $row) :
        ?>
            <div class="vendeurs" style="margin-bottom: 5px">


 



                <div class="encadre_vendeur">
                    <div class="title">
                        <h4>  <?= ucfirst($row->title) ?> </h4>
                    </div>

                    <table id="tableau_liste_exemplaires">
                        <tr>
                            <td class="image_mini col_1"><?= $row->img ?></td>

                            <td class="carac col_2" style="width:155px">
        <?php
        for ($i = 0; $i < count($row->spec); $i++) {
            $spec = $row->spec[$i];
            echo $spec->specification_label . " : " . $spec->specification_value;
        }
        ?>
                            </td>
                            <td class="col_3">
                                Mis en vente par :
                                <a href="<?= base_url() . 'usr/' . $row->user_id ?>">
                                    <strong><?= $row->user_name . ' ' . $row->user_surname; ?>
                                    </strong>
                                </a>
                            </td>
                            <td class="col_4">
        <?php
        echo '<span style="font-size:15px;">' . $row->quantity . '</span> exemplaire';
        echo (intval($row->quantity) > 1) ? 's' : ''
        ?>
                            </td>
                            <td class="col_5">
                                <h3><?= $row->price ?>€</h3>
                            </td>
                            <td class="col_6">
                                <a class="btn_base" href="<?= base_url() . 'articles/' . $row->article_id . '/' . $row->user_article_id ?>">Voir le produit</a>
                            </td>
                        </tr>
                    </table>


                </div>



            </div>
        <?php
    endforeach;
} else {
    echo 'Pas de vendeur pour cette article';
}
?>
</div>
