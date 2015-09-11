<div id="bloc_contenu">
    <div class="col-md-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="3" style="font-size: 17px;text-align: center">Fiche utilisateur</th>
                </tr>
            </thead>
            <tr>
                <th>Nom : </th>
                <td><?= $userInfo['user_name'] ?> </td>
            </tr>
            <tr>
                <th>Prenom : </th>
                <td><?= $userInfo['user_surname'] ?> </td>
            </tr>
            <tr>
                <th>Mail : </th>
                <td><?= $userInfo['mail'] ?> </td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>

    <h3>Exemplaires en vente</h3>   
    <?php
    if (count($vendeur_articles) > 0) {
        foreach ($vendeur_articles as $row) :
            ?>
            <div class="vendeurs" style="margin-bottom: 5px">






                <div class="encadre_vendeur">
                    <div class="title">
                        <h4>  <?= ucfirst($row->title) ?> </h4>
                    </div>

                    <table id="tableau_liste_exemplaires">
                        <tr>
                            <td class="image_mini col_1"><?= $row->img ?></td>

                            <td class="carac col_2" style="width:235px">
                                Etat : <?= ($row->state == 1) ? "Neuf" : "Occasion"; ?>

                            </td>
                            <td class="col_3" style="width:150px"></td>
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