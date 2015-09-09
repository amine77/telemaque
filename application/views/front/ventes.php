<div id="bloc_contenu">



    <div class="row">
        <h4 style="display:inline-block;padding:5px" class="bg-info">
            <span class="glyphicon glyphicon-hourglass"></span>&nbsp;
            Mes ventes en attente 
            
        </h4>
        <table style="margin-bottom: 20px" class="table table-hover col-sm-2">
            <tr>
                <td width="20%">Titre</td>
                <td width="40%">Description</td>
                <td width="20%">Date de la vente</td>
                <td width="10%">Quantité</td>
                <td width="10%">Prix UHT(€)</td>
            </tr>
            <?php if (!$vente_en_attente) : ?>
                <tr>
                    <td colspan="5" style="text-align: center">Pas de vente en attente</td>
                </tr>
            <?php
            else:;

                foreach ($vente_en_attente as $vente):
                    ?>
                    <tr>
                        <td class='col-sm-2'><?= $vente['title'] ?></td>
                        <td><?= substr($vente['description'], 0, 50) ?> <?= (strlen($vente['description']) > 50) ? '...' : '' ?> </td>
                        <td>
                            <?php
                            $date = date_create($vente['created_at']);
                            echo date_format($date, 'd/m/Y H:i:s');
                            ?>
                        </td>
                        <td><?= $vente['qtycl'] ?></td>
                        <td><?= $vente['price'] ?></td>
                    </tr>
                <?php
                endforeach;
            endif;
            ?>
        </table>
    </div>


    <div class="row">

         <h4 style="display:inline-block;padding:5px" class="bg-success">
            <span class="glyphicon glyphicon-refresh"></span>&nbsp;
           Mes ventes en cours
            
        </h4>
        <table style="margin-bottom: 20px" class="table table-hover col-sm-2">
            <tr>
                <td width="20%">Titre</td>
                <td width="40%">Description</td>
                <td width="20%">Date de la vente</td>
                <td width="10%">Quantité</td>
                <td width="10%">Prix UHT(€)</td>
            </tr>
<?php if (!$vente_en_cours) : ?>
                <tr>
                    <td colspan="5" style="text-align: center">Pas de vente en cours</td>
                </tr>
            <?php
            else:;

                foreach ($vente_en_cours as $vente):
                    ?>
                    <tr>
                        <td class='col-sm-2'><?= $vente['title'] ?></td>
                        <td><?= substr($vente['description'], 0, 50) ?> <?= (strlen($vente['description']) > 50) ? '...' : '' ?> </td>
                        <td>
                            <?php
                            $date = date_create($vente['created_at']);
                            echo date_format($date, 'd/m/Y H:i:s');
                            ?>
                        </td>
                        <td><?= $vente['qtycl'] ?></td>
                        <td><?= $vente['price'] ?></td>
                    </tr>
    <?php
    endforeach;
endif;
?>
        </table>
    </div>



</div>