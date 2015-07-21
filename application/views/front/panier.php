
<div class="center">
    <h3>Panier</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Image</td>
                <td>label</td>
                <td>Quantité</td>
                <td>Prix</td>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($exemplaires) && count($exemplaires)>0 ; $i++): ?>

                <tr data-role="<?=$exemplaires[$i]->user_article_id?>">
                    <td><?= $exemplaires[$i]->img ?></td>
                    <td><?= (is_null($exemplaires[$i]->title)) ? $exemplaires[$i]->article_label : $exemplaires[$i]->title ?></td>

                    <td>
                        <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" ></span>
                        <input type="text" value="<?= $exemplaires[$i]->quantity ?>" size="3" maxlength="20" disabled="disabled" style="display:inline;text-align:center;"/>
                       
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" ></span><br>
                         <div class="glyphicon glyphicon-trash" aria-hidden="true" style="width:20px;margin:0 auto;"></div>
                    </td>
                    <td>
                        <?= floatval($exemplaires[$i]->price) * $exemplaires[$i]->quantity ?> €
                        <br>pu : <?= $exemplaires[$i]->price ?> €
                    </td>
                </tr>

            <?php endfor; ?>
                <?php if(count($exemplaires)==0):?>
                <tr>
                    <td colspan="4" align="center" style="padding: 10px">
                        Panier vide
                    </td>
                </tr>
                <?php endif;?> 
        </tbody>
    </table>
    <div>
        <a href="http://localhost/telemaque/articles/1" data-role="1" class="btn_details_articles">Valider la commande</a>
    </div>
</div>



