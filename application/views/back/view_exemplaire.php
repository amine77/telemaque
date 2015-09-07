<style>
    #bloc_contenu {
        margin-bottom: 100px;
    }
    #validate_copy_success, #validate_copy_failed{
        display: none;
        font-size: 12px;
    }
</style>
<script>
    $(function () {
        $("#validate_copy").click(function () {

            $.ajax({
                method: 'POST',
                url: "<?= base_url('admin/validate_copy') ?>",
                dataType: 'json',
                data: {copy_id:<?= $copy->user_article_id ?>}
            }).success(function (data) {
                console.log('copy valide');
                if (data.state == 'OK') {
                    $('#validate_copy_success').css("display", "inline").delay(6000).fadeOut();
                    setTimeout(function(){ location.reload(); }, 6000);
                       
                   
                } else {
                    $('#validate_copy_failed').css("display", "inline").delay(6000).fadeOut();
                }
            }).error(function () {
                console.log('erreur ajax');
            });

            return false;
        })
    });
</script>
<div id="bloc_contenu">
    <h4><a href="<?= base_url('admin/liste_exemplaires') ?>">Liste des exemplaires</a></h4>
    <h1><?= $copy->title ?></h1>


<div class="container">
    <div class="row">
        <span id="validate_copy_success" class="label label-success">Cet exemplaire vient d'être vaildé. Il est désormais disponible en vente.</span>
        <span id="validate_copy_failed" class="label label-danger">Echec. Un problème est survenu lors de la validation de cet exemplaire. Veuillez réessayer plus tard ou contacter le webmaster.</span>
        <br><br>
        <strong>Ajouté le : </strong><?= $copy->created_at ?><br><br>
        <strong>Vendu par : </strong><?= $copy->user_name ?>  <?= $copy->user_surname ?><br><br>
        <?php $status = ($copy->is_verified == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>'; ?>
        <strong>Statut : </strong> <?= $status ?><br><br>
        <strong>Article correspondant : </strong> <?= $copy->article_label ?><br><br>
        <strong>Quantité : </strong> <?= $copy->quantity ?><br><br>
        <strong>Prix : </strong> <?= $copy->price ?><br><br>
        <strong>Description : </strong><br><?= $copy->description ?><br><br>
        <div>


            <?php if ($copy->is_verified != 1) { ?>
                <br><br><button name="validate_copy" id="validate_copy" type="button" class="btn btn-success btn-lg btn-block">Activer</button><br>
            <?php } ?>
        </div>

    </div>
</div>

</div>
