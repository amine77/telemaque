<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $oData = $vendeurs_articles[0];
 // $this->utils_model->debug($oData);
    ?>


    <div class="article">

        <div style='min-height:350px;border:1px solid grey;margin:0 0.5% 15px 0.5%'>
            <h3><?= (is_null($oData->title) || empty($oData->title)) ? $oData->article_label :$oData->title  ?></h3>
            <div id="image-produit"><?= $img ?></div>
            <a href="<?= base_url() . 'usr/' . $oData->user_id ?>">
                <strong><?= $oData->user_name . ' ' . $oData->user_surname; ?>
                </strong>
            </a>
            <div id="carac"></div>
            <p id="description"><?= $oData->description ?></p>
          
            <div class="quantity">

                <?php
                $qty_user = (isset($_SESSION['panier'][$oData->user_article_id])) ? $_SESSION['panier'][$oData->user_article_id] : 0 ;
                echo '<span style="font-size:15px;">' . $oData->quantity . '</span> exemplaire';
                echo (intval($oData->quantity) > 1) ? 's' : ''
                ?>
            </div>
            <div id="prix">
                <h3><?= $oData->price ?> €</h3>
            </div>
              
            <button class='btn btn-default add_article' data-role="<?= $oData->user_article_id ?>" data-qty="<?=$qty_user?>" data-qty-max="<?= $oData->quantity ?>">Ajouter au panier </button>
            <a class="btn btn-primary" href="<?= base_url() . 'articles/' . $oData->article_id ?>">Retour</a>
        </div>

    </div>




</div>