<div id="bloc_contenu">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $oData = $vendeurs_articles[0];
 // $this->utils_model->debug($oData);
    ?>
        
    <div id="détails_exemplaire">
        <h3><?= (is_null($oData->title) || empty($oData->title)) ? $oData->article_label :$oData->title  ?></h3>
        Vendu par <a href="<?= base_url() . 'usr/' . $oData->user_id ?>">
            <strong>
                <?= $oData->user_name . ' ' . $oData->user_surname; ?>
            </strong>
        </a>
        
        <br><br>
        
        <div id="image_exemplaire"><?= $img ?></div>
        
        <div id="description_exemplaire">
            <p>
                <?= $oData->description ?>
            </p>
            <br>
            <?php
                $qty_user = (isset($_SESSION['panier'][$oData->user_article_id])) ? $_SESSION['panier'][$oData->user_article_id] : 0 ;
                echo '<span style="font-size:15px;">' . $oData->quantity . '</span> exemplaire';
                echo (intval($oData->quantity) > 1) ? 's' : ''
            ?>
            <br>
            <h3><?= $oData->price ?> €</h3>
            <button class='btn btn-default add_article btn_base' data-role="<?= $oData->user_article_id ?>" data-qty="<?=$qty_user?>" data-qty-max="<?= $oData->quantity ?>">Ajouter au panier </button>
            <a class="btn btn-primary btn_base" href="<?= base_url() . 'articles/' . $oData->article_id ?>">Retour</a>
        </div>
        
        <div class="clear"></div>
    </div>

</div>