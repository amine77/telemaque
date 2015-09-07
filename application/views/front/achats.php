
<div id="bloc_contenu">
    <h3>Voici la liste de vos achats</h3>
    <?php
    foreach ($listCommand as $key => $cmd):
        if ($key != 'Total_Cmd'):;
            ?>

    <table id="command_num_<?= $key ?>" style="margin-bottom: 20px" class="table table-hover">
                <caption>Commande numero <?= $key ?></caption>
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Vendeur</th>
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
                            <td>" . $value['user_id'] . "</td>
                            
                  </tr> ";
                    }
                }

                echo "</table>";

            endif;

        endforeach;
        ?>


        <a href="<?= base_url() ?>panier/facture" class="btn btn-default"> Voir la commande </a>



</div>