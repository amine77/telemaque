<style>

    #bloc_contenu {
        margin-bottom: 100px;
    }
    #chartContainer2{
        height: 300px;
        width: 100%;
    }
</style>

<script>
    $(function () {
        
        <?php  
        if(isset($all_commands) && is_array($all_commands) && count($all_commands)> 0){
        ?>
                var tab = [];
                
                <?php foreach ($all_commands as $command){?>
                    var t = "<?= $command['created_at']?>".split(/[- :]/);
                    var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
                    var obj = {x:d, y:<?=$command['prix_total'] ?>};
                    tab.push(obj);
                    
               <?php } ?>
             var chart = new CanvasJS.Chart("chartContainer2",
	{
		animationEnabled: true,
		title:{
			text: "Total des commandes en fonction de temps",
                        fontSize :22
		},
		data: [
		{
			type: "spline", //change type to bar, line, area, pie, etc   
			dataPoints: tab
			}
		]
	});

	chart.render();   
        <?php  } ?>
        
         <?php if (isset($articles_per_category) && is_array($articles_per_category)){ ?>
                 
                 <?php $firsttime= true;
                 ?>
        var chart = new CanvasJS.Chart("chartContainer",
                {
                    title: {
                        text: "Pourcentage d'articles par catgéorie"
                    },
                    
                    exportFileName: "nb_articles_par_categorie",
                    exportEnabled: true,
                    animationEnabled: true,
                    legend: {
                        verticalAlign: "bottom",
                        horizontalAlign: "center"
                    },
                    data: [
                        {
                            type: "pie",
                            showInLegend: true,
                            toolTipContent: "{legendText}: <strong>{y}%</strong>",
                            indexLabel: "{label} {y}%",
                            dataPoints: [
                        <?php if (count($articles_per_category)>0 ) {
                            $somme =0;
                            foreach ($articles_per_category as $line) {
                            $somme+=$line['nb_articles_per_category']; 
                            }
                        } ?>
                                <?php if (count($articles_per_category)>0 ) foreach ($articles_per_category as $line) { ?>
                                        <?php
                                        
                                        if($firsttime){
                                           $firsttime=false;$exploded='exploded: true,';
                                        }else{
                                            $exploded='';
                                        } ?>
                                            {y: <?= round((($line['nb_articles_per_category']/$somme)*100),2) ?>, legendText: "<?= $line['category_label'] ?>", <?= $exploded?> label: "<?= $line['category_label'] ?>"},
                                <?php } ?>

                            ]
                        }
                    ]
                });
        chart.render();
         <?php } ?>

        $('#sandbox-container-from input, #sandbox-container-to input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr",
            todayBtn: "linked",
            autoclose: true
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
                        <tbody><tr><td><strong>Total des articles en vente</strong> : <span class="label label-success"><?= $total_items_for_sale ?> </span></td></tr>
                            <tr><td><strong>Total des exemplaires en vente</strong>: <span class="label label-success"><?= $total_copies_for_sale ?> </span></td></tr>
                            <tr><td><strong>Total des catégories d'articles</strong> : <span class="label label-success"><?= $total_categories ?> </span></td></tr>
                            <tr><td><strong>L'exemplaire d'article le plus cher</strong> : <span class="label label-success"><?= $most_expensive_item_copy ?></span></td></tr>
                            <tr><td><strong>L'exemplaire d'article le moins cher</strong> :  <span class="label label-success"><?= $cheapest_item_copy ?></span></td></tr>
                            <tr><td><strong>L'article qui dispose le plus d'exemplaires</strong> : <span class="label label-success"><?= $item_that_has_most_of_copies ?></span></td></tr>
                            <tr><td><strong>L'article le plus vu</strong> : <span class="label label-success"><?= $item_most_seen ?></span></td></tr>
                            <tr><td><strong>L'article le plus ancien</strong> : <span class="label label-success"><?= $oldest_item ?></span></td></tr>
                            <tr><td><strong>L'article le plus récent</strong> : <span class="label label-success"><?= $last_item ?></span></td></tr>
                            <tr><td><strong>L'exemplaire le plus récent</strong> :  <span class="label label-success"><?= $last_item_copy ?></span></td></tr>
                            <tr><td><strong>Date du dernier achat</strong> : <span class="label label-success"><?= $last_purchase_date ?></span></td></tr>
                        </tbody></table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Répartition des articles par catégorie</h3>
                </div>
                <div class="panel-body">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
            </div>

        </div>
    </div>    
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Commandes</h3>
                </div>
                <div class="panel-body">
                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;5 dernières commandes</h3>
                </div>
                <div class="panel-body">
                    <?php if (isset($last_five_command) && is_array($last_five_command) && count($last_five_command) > 0) { ?>
                        <table class="table">
                            <tr>
                                <th>Date</th><th>Acheteur</th><th>Prix total</th>
                            </tr>
                            <?php foreach ($last_five_command as $command) { ?>
                                <tr><td><?= $command['created_at'] ?></td><td><?= $command['user_name'] ?>  <?= $command['user_surname'] ?></td><td><?= $command['prix_total'] ?> €</td></tr>
                            <?php } ?>
                        </table>
                    <?php } else { ?>
                        <span class="label label-success">Aucune commande trouvée</span>
                    <?php } ?>
                </div>
            </div>
        </div>
        
    </div>

    <div class="clear">
    </div>


</div>

