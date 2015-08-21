<style>

    #bloc_contenu {
        margin-bottom: 100px;
    }
</style>
<script>
    $(function () {
        $('#sandbox-container-from input, #sandbox-container-to input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr",
            todayBtn: "linked",
            autoclose: true
        });

        $('#choose_date_range').click(function (e) {
            e.preventDefault();
            $('.collapse').collapse('toggle');
            var from_val = $('#from').val(), to_val = $('#to').val();
            console.log('from = ' + from_val);
            console.log('to = ' + to_val);
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin/statistic') ?>",
                dataType: 'json',
                data: {from: from_val, to: to_val}
            }).success(function (response) {
                console.log(response);
            }).error(function () {
                console.log('erreur ajax');
            });

        });
    });
</script>
<div id="bloc_contenu">
    <?php //echo '<pre>';print_r($_SESSION); echo '<pre>'; ?>
    <h1>Tableau de bord</h1><br>


    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Utilisateurs</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody><tr><td><strong>Utilisateurs inscrits</strong> :  <span class="label label-success"><?= $total_users ?> </span></td></tr>
                            <tr><td><strong>Nouveaux utilisateurs  </strong>: <span class="label label-success"><?= $total_new_users ?></span></td></tr>
                            <tr><td><strong>Utilisateurs non activés</strong> : <span class="label label-success"><?= $total_not_activated_users ?></span></td></tr>
                            <tr><td><strong>Moyenne d'age des utilisateurs</strong> : <span class="label label-success"><?= $average_users_age ?></span></td></tr>
                            <tr><td><strong>Département d'oû provient le plus des utilisateurs</strong> : <span class="label label-success"><?= $departement_of_most_users ?></span></td></tr>
                            <tr><td><strong>Date de dernière inscription d'utilisateur</strong> <span class="label label-success"><?= $last_user_inscription_date ?></span></td></tr>
                            <tr><td><strong>Date du dernier message </strong> <span class="label label-success"><?= $last_message_reception_date ?></span></td></tr>
                            <tr><td><strong>Le vendeur qui a vendu le plus d'articles</strong> : <span class="label label-success">0605040302</span></td></tr>
                            <tr><td><strong>Le vendeur qui a fait le plus grand chiffre d'affaires</strong> : <span class="label label-success">0605040302</span></td></tr>
                            <tr><td><strong>L'acheteur qui a acheté le plus d'articles</strong> : <span class="label label-success">0605040302</span></td></tr>
                            <tr><td><strong>L'acheteur qui a depensé le plus pour ses achats</strong> : <span class="label label-success">0605040302</span></td></tr>
                        </tbody></table>
                </div>
            </div>


        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>&nbsp;Articles & Exemplaires </h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody><tr><td><strong>Total des articles en vente</strong> :  </td></tr>
                            <tr><td><strong>Total des exemplaires en vente</strong>: </td></tr>
                            <tr><td><strong>Total des catégories d'articles</strong> : </td></tr>
                            <tr><td><strong>L'exemplaire d'article le plus cher</strong> : </td></tr>
                            <tr><td><strong>L'exemplaire d'article le moins cher</strong> : </td><td></td></tr>
                            <tr><td><strong>L'article qui dispose le plus d'exemplaires</strong> : </td><td></td></tr>
                            <tr><td><strong>L'article le plus vu</strong> : </td><td></td></tr>
                            <tr><td><strong>L'article le plus ancien</strong> : </td><td></td></tr>
                            <tr><td><strong>L'article le plus récent</strong> : </td><td></td></tr>
                            <tr><td><strong>L'exemplaire le plus récent</strong> : </td><td></td></tr>
                            <tr><td><strong>Date du dernier achat</strong> : </td><td></td></tr>
                        </tbody></table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Piechart répartition des articles par catégorie</h3>
                </div>
                <div class="panel-body">
                    <table>
                        <tbody><tr><td><strong>Total des articles en vente</strong> :  </td></tr>
                        </tbody></table>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;10 dernières commandes</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tbody><tr><td><strong>Utilisateurs inscrits</strong> :  15&nbsp;ans&nbsp;-&nbsp;né(e) le: 2000-08-12  </td></tr>
                            <tr><td><strong>Nouveaux utilisateurs  </strong>: 2015-08-12</td></tr>
                            <tr><td><strong>Utilisateurs non activés</strong> : <span class="label label-success">Activé</span></td></tr>
                            <tr><td><strong>Moyenne d'age des utilisateurs</strong> : 0102030405</td></tr>
                            <tr><td><strong>Département d'oû provient le plus des utilisateurs</strong> : 0605040302</td><td></td></tr>
                            <tr><td><strong>Dernier utilisateur inscrit :  le</strong> : 0605040302</td><td></td></tr>
                            <tr><td><strong>Le vendeur qui a vendu le plus d'articles</strong> : 0605040302</td><td></td></tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>    
    <hr>
    <div class="row">

        <div class="col-md-6 col-md-offset-6">
            <p class="text-right"><button class="btn btn-default" type="collapse" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><strong>Du</strong> 2015-07-14 <strong>Au</strong> 2015-08-18 &nbsp;<span class="caret"></span></button></p>
            <div class="collapse" id="collapseExample">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                    </div>
                    <div class="col-lg-3 col-sm-3" id="sandbox-container-from">
                        <strong>Du</strong> <input class="form-control" id="from" name="from" placeholder="yyyy-mm-jj" type="text"  />
                    </div>
                    <div class="col-lg-3 col-sm-3"  id="sandbox-container-to">
                        <strong>Jusqu'au</strong> <input class="form-control" id="to" name="to" placeholder="yyyy-mm-jj" type="text" />
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-10 col-sm-10"></div>
                    <div class="col-lg-2 col-sm-2">
                        <input class="btn btn-info" type="submit" id="choose_date_range" name="choose_date_range" value="Enregistrer"/>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Ventes</h3>
                </div>
                <div class="panel-body">
                    Ventes
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Commandes</h3>
                </div>
                <div class="panel-body">
                    Commandes
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Panier moyen</h3>
                </div>
                <div class="panel-body">
                    Panier moyen
                </div>
            </div>
        </div>
    </div>

    <div class="clear">
    </div>


</div>

