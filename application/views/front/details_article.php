<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

// Affiche les articles

    $oData = $article->result()[0];


    echo "<div style='height:150px;border:1px solid grey;margin:0 0.5% 15px 0.5%'>
             <h3>" . $oData->article_label . "</h3>";


    // echo "<button data-role='".$row->article_id."'>Ajouter au panier </button>";
    echo '</div>';

    if (!empty($vendeurs_articles->result())) {
        foreach ($vendeurs_articles->result() as $row) :
            $this->utils_model->debug($row);
            ?>
            <div class="vendeurs">
               
                <div>

                    <a href="<?= base_url() . 'usr/' . $row->user_id ?>">
                        <strong><?=$row->user_name. ' ' .$row->user_surname;?>
                        </strong>
                    </a>
                    <a class="btn btn-primary" href="<?= base_url() . 'articles/details/' . $row->article_id.'/fiche' ?>">Voir le produit</a>
                    <div class="quantity">
                                
                                <?php echo '<span style="font-size:15px;">'.$row->quantity.'</span> exemplaire';echo (intval($row->quantity)>1) ? 's' : ''?></div>
                </div>

            </div>

            <?php
        endforeach;
    } else {
        echo 'Pas de vendeur pour cette article';
    }
    ?>


</div>