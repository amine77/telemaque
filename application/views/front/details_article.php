<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles

    $oData = $article->result()[0];


    echo "<div style='height:150px;border:1px solid grey;margin-bottom:15px'>
             <h3>" . $oData->article_label . "</h3>";


    // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
    echo '</div>';

    if (count($vendeurs_articles->result())>0) {
        foreach ($vendeurs_articles->result() as $row) :
            ?>
            <div class="vendeurs">

                <div>

                    <a href="<?= base_url() . 'usr/' . $row->user_id ?>">
                        <strong><?= $row->user_name . ' ' . $row->user_surname; ?>
                        </strong>
                    </a>
                    <a class="btn btn-primary" href="<?= base_url() . 'articles/' . $row->article_id . '/' . $row->user_id ?>">Voir le produit</a>
                    <div class="quantity">

                        <?php echo '<span style="font-size:15px;">' . $row->quantity . '</span> exemplaire';
                        echo (intval($row->quantity) > 1) ? 's' : '' ?>
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