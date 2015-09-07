<div id="bloc_contenu">
    <h3>Voici la page des ventes</h3>


    <div class="row">
        <h4>Mes ventes en attente</h4>
        <table style="margin-bottom: 20px" class="table table-hover col-sm-2">
            <tr>
                <td>Titre</td>
                <td>Description</td>
                <td>Date de la vente</td>
                <td>Prix</td>
            </tr>
            <?php if (!$vente_en_attente) : ?>
                <tr>
                    <td colspan="4" style="text-align: center">Pas de vente en attente</td>
                </tr>
            <?php else:;

                foreach ($vente_en_attente as $vente):
                    ?>
                    <tr>
                        <td><?= $vente['title'] ?></td>
                        <td><?= substr($vente['description'], 0, 50)?> <?= (strlen($vente['description']) > 50) ? '...' : '' ?> </td>
                        <td>
                            <?php
                            $date = date_create($vente['created_at']);
                            echo date_format($date, 'd/m/Y H:i:s');
                            ?>
                        </td>
                        <td><?= $vente['price'] ?></td>
                    </tr>
                <?php endforeach;
            endif;
            ?>
        </table>
    </div>
    
    
    <div class="row">
        <h4>Mes ventes en cours</h4>
        <table style="margin-bottom: 20px" class="table table-hover col-sm-2">
            <tr>
                <td>Titre</td>
                <td>Description</td>
                <td>Date de la vente</td>
                <td>Prix</td>
            </tr>
            <?php if (!$vente_en_cours) : ?>
                <tr>
                    <td colspan="4" style="text-align: center">Pas de vente en cours</td>
                </tr>
            <?php else:;

                foreach ($vente_en_cours as $vente):
                    ?>
                    <tr>
                        <td><?= $vente['title'] ?></td>
                        <td><?= substr($vente['description'], 0, 50)?> <?= (strlen($vente['description']) > 50) ? '...' : '' ?> </td>
                        <td>
                            <?php
                            $date = date_create($vente['created_at']);
                            echo date_format($date, 'd/m/Y H:i:s');
                            ?>
                        </td>
                        <td><?= $vente['price'] ?></td>
                    </tr>
                <?php endforeach;
            endif;
            ?>
        </table>
    </div>
    
    <div class="row">
        <h4>Mes ventes en passé</h4>
        <table style="margin-bottom: 20px" class="table table-hover col-sm-2">
            <tr>
                <td>Titre</td>
                <td>Description</td>
                <td>Date de la vente</td>
                <td>Prix</td>
            </tr>
            <?php if (!$vente_terminer) : ?>
                <tr>
                    <td colspan="4" style="text-align: center">Pas de vente terminé</td>
                </tr>
            <?php else:;

                foreach ($vente_terminer as $vente):
                    ?>
                    <tr>
                        <td><?= $vente['title'] ?></td>
                        <td><?= substr($vente['description'], 0, 50)?> <?= (strlen($vente['description']) > 50) ? '...' : '' ?> </td>
                        <td>
                            <?php
                            $date = date_create($vente['created_at']);
                            echo date_format($date, 'd/m/Y H:i:s');
                            ?>
                        </td>
                        <td><?= $vente['price'] ?></td>
                    </tr>
                <?php endforeach;
            endif;
            ?>
        </table>
    </div>

</div>