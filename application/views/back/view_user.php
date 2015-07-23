

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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Commandes&nbsp;&nbsp;&nbsp; <span class="badge">42</span></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table-bordered">
                            <tr> <th>ID</th>
                                <th>Date</th>
                                <th>Produits</th>
                                <th>Total</th>
                            </tr>
                            <tr><td>1</td><td>29/02/2015</td><td>3</td><td>122.35€</td></tr>
                            <tr><td>2</td><td>29/11/2015</td><td>1</td><td>75.35€</td></tr>
                        </table>
                    </div>
                </div>
            </div>
            <div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ventes &nbsp;&nbsp;&nbsp; <span class="badge">12</span></h3>
                    </div>
                    <div class="panel-body">
                        <table class="table-bordered">
                            <tr> <th>ID</th>
                                <th>Date</th>
                                <th>Produits</th>
                                <th>Total</th>
                            </tr>
                            <tr><td>1</td><td>29/02/2015</td><td>3</td><td>122.35€</td></tr>
                            <tr><td>2</td><td>29/11/2015</td><td>1</td><td>75.35€</td></tr>
                        </table>
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

                                    <tr><td><?= $message['date'] ?></td><td><?= $message['title'] ?></td><td><a  title="supprimer" href="<?= base_url('admin/delete_message/' . $user['user_id'] . '/' . $message['message_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer ce message?">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> / <a title="voir" href="<?= base_url('admin/view_message/' . $message['message_id']) ?>">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a></td></tr>                                   
                                <?php } ?>
                            </table>
                        <?php } else { ?>
                            Aucun message

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