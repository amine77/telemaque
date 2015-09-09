
<div id="bloc_contenu">
    <h3>Voici la liste de vos achats</h3>
    <?php
    foreach ($listCommand as $key => $cmd):
        if ($key != 'Total_Cmd'):;
            ?>

    <table id="command_num_<?= $key ?>" style="margin-bottom: 20px" class="table table-hover">
                <caption>Commande numero <?= $key ?></caption>
                <tr>
                    <th width="15%">Image</th>
                    <th width="50%">Produit</th>
                    <th>Quantité</th>
                    <td width="10%">Prix UHT(€)</td>

                </tr>
                <?php
                foreach ($cmd as $key => $value) {
                    if (is_array($value)) {
                        echo "
                  <tr id='command_line_$key'>
                            <td>" . $value['image'] . "</td>
                            <td>" . $value['title'] . "</td>
                            <td>" . $value['quantity'] . "</td>
                            <td>" . $value['price'] . "</td>

                            
                  </tr> ";
                    }
                }

                echo "</table>";

            endif;

        endforeach;
        ?>


        <a href="<?= base_url() ?>panier/facture" class="btn btn-default"> Voir la commande </a>



</div>