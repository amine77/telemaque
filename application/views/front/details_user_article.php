<div class="center">
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $oData = $vendeurs_articles->result()[0];
    $this->utils_model->debug($oData);
    ?>


    <div class="article">

        <div style='min-height:350px;border:1px solid grey;margin:0 0.5% 15px 0.5%'>
            <h3><?= $oData->article_label ?></h3>
            <a href="<?= base_url() . 'usr/' . $oData->user_id ?>">
                <strong><?= $oData->user_name . ' ' . $oData->user_surname; ?>
                </strong>
            </a>
            <p id="description"><?= $oData->description ?></p>
            <a class="btn btn-primary" href="<?= base_url() . 'articles/' . $oData->article_id ?>">Retour</a>
            <div class="quantity">

                <?php
                echo '<span style="font-size:15px;">' . $oData->quantity . '</span> exemplaire';
                echo (intval($oData->quantity) > 1) ? 's' : ''
                ?>
            </div>
            <div id="prix">
                <h3><?= $oData->price ?></h3>
            </div>
            <button class='btn btn-default' data-role="<?= $oData->article_id ?>">Ajouter au panier </button>
        </div>

    </div>









</div>