

<script>

    $(function() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');

            if (!$('#dataConfirmModal').length) {
                $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show: true});

            return false;
        });


        $('a[title="voir"]').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
//            console.log('href = '+href);
            $.ajax({
                method: "GET",
                dataType: "html",
                url: href
            })
                    .done(function(response) {


                        if (!$('#messageContentModal').length) {
                            $('body').append('<div id="messageContentModal" class="modal" role="dialog" aria-labelledby="messageContentLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="messageContentLabel">Message</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button></div></div></div></div>');
                        }
                        $('#messageContentModal').find('.modal-body').html(response);
                        $('#messageContentModal').modal({show: true});
                    });

            return false;
        });
    });

</script>

<div id="bloc_contenu">
    <div class="row">
        <div class="col-lg-6">
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?= $user['user_name'] ?>&nbsp;<?= $user['user_surname'] ?> &nbsp;&nbsp;&nbsp; <a title="modifier" href="<?= base_url('admin/update_user/' . $user['user_id']) ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <table>
                            <?php
                            $now = new DateTime();
                            $naissance = new DateTime($user['born_at']);
                            $age = $now->diff($naissance)->y;
                            ?>
                            <tr><td><strong>Age </strong> :  <?= $age ?>&nbsp;ans&nbsp-&nbspné(e) le: <?= $user['born_at'] ?>  </td></tr>
                            <tr><td><strong>Dernière visite </strong>: <?= $user['last_connection_date'] ?></td></tr>
                            <tr><td><strong>Status</strong> : <?= ($user['status'] == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>' ?></td></tr>
                            <tr><td><strong>Téléphone fixe</strong> : <?= $user['phone'] ?></td></tr>
                            <tr><td><strong>Portable</strong> : <?= $user['mobile'] ?></td><td></td></tr>
                        </table>
                    </div>
                </div>

            </div>
            <div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Commandes&nbsp;&nbsp;&nbsp; <span class="badge"> 
                                <?php
                                if ($commandes['Total_Cmd'] == 0) {
                                    echo 0;
                                } else {
                                    echo count($commandes) - 1;
                                }
                                ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <?php if ($commandes['Total_Cmd'] == 0) { ?>
                                <h5>Aucun article commandé.</h5>
<?php } else { ?>
                                <tr>
                                    <th>ID</th><th>Date</th><td>Total</td>
                                </tr>
    <?php foreach ($commandes as $key => $commande) { ?>
        <?php if (is_int($key)) { ?>
                                        <td><?= $commande['command_id'] ?></td>
                                        <td><?= $commande['created_at'] ?></td>
                                        <td><?= $commande['montant_commande'] ?> €</td>

                                    <?php
                                    }
                                }
                                ?>
<?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ventes &nbsp;&nbsp;&nbsp; <span class="badge"><?php if(is_array($ventes)){count($ventes);}else{echo 0 ;}?></span></h3>
                    </div>
                    <div class="panel-body">
<?php if (is_array($ventes) && count($ventes) > 0) { ?>
                            <table class="table">
                                <tr> <th>ID</th>
                                    <th>Date</th>
                                    <th>Article</th>
                                    <th>Prix TTC</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($ventes as $article_vendu) { ?>
                                <?php $status = ($article_vendu['is_verified'] == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>'; ?>
                                    <tr><td><?= $article_vendu['article_id'] ?></td><td><?= $article_vendu['created_at'] ?></td><td><?= $article_vendu['title'] ?></td><td><?= $article_vendu['price'] ?></td><td><?= $status ?></td></tr>
                            <?php } ?>
                            </table>
<?php } else { ?>
                            <h5>Cet utilisateur ne possède pas des articles en vente.</h5>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;Messages &nbsp;&nbsp;&nbsp; <span class="badge"><?= count($messages) ?></span></h3>
                    </div>
                    <div class="panel-body">
<?php if (is_array($messages) && count($messages) > 0) { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>Date</th>
                                    <th>Sujet</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($messages as $message) { ?>
                                    <?php
                                    $new = ($message['is_new'] == 1) ? '<span class="label label-warning">Nouveau</span>' : '';
                                    $title = (strlen($message['title']) > 25) ? $new . ' ' . substr($message['title'], 0, 27) . '...' : $new . ' ' . $message['title'];
                                    ?>
                                    <tr><td><?= $message['date'] ?></td><td><?= $title ?></td><td><a  title="supprimer" href="<?= base_url('admin/delete_message/' . $user['user_id'] . '/' . $message['message_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer ce message?">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> / <a title="voir" href="<?= base_url('admin/view_message/' . $message['message_id']) ?>">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a></td></tr>                                   
    <?php } ?>
                            </table>
                        <?php } else { ?>
                            Aucun message.

<?php } ?>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;Dernière Connection&nbsp;&nbsp;&nbsp;</h3>
                </div>
                <div class="panel-body">
                    <table>
                        <tr><td><strong>Date </strong> : <?= $user['last_connection_date'] ?></td></tr>
                        <tr><td><strong>Adresse IP </strong> : <?= $user['ip_address'] ?></td></tr>
                    </table>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Rôles &nbsp;&nbsp;&nbsp; <span class="badge">1</span></h3>
                </div>
                <div class="panel-body">
                    <table>
                        <tr><td>ID : <?= $role->role_id ?></td><td></td></tr>
                        <tr><td>Nom : <?= $role->role_label ?></td><td></td></tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;Adresses&nbsp;&nbsp;&nbsp; <span class="badge"><?= count($adresses) ?></span></h3>
                </div>
                <div class="panel-body">
<?php if (is_array($adresses) && count($adresses) > 0) { ?>
                        <table class="table-bordered">
                            <tr> <th>Adresse</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Pays</th>
                            </tr>

    <?php foreach ($adresses as $adresse) { ?>
                                <tr><td><?= $adresse['address'] ?></td><td><?= $adresse['zip_code'] ?></td><td><?= $adresse['city'] ?></td><td><?= $adresse['country'] ?></td></tr>
                        <?php } ?>

                        </table>

<?php } else { ?>
                        <p>Aucune adresse trouvée !</p>
<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>    