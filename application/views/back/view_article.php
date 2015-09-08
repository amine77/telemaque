<style>
    #bloc_contenu {
        margin-bottom: 100px;
    }
    #validate_article_success, #validate_article_failed{
        display: none;
        font-size: 12px;
    }
</style>
<script>
    $(function () {
        $("#validate_article").click(function () {

            $.ajax({
                method: 'POST',
                url: "<?= base_url('admin/validate_article') ?>",
                dataType: 'json',
                data: {article_id:<?= $article->article_id ?>}
            }).success(function (data) {
                console.log('article valide');
                if (data.state == 'OK') {
                    $('#validate_article_success').css("display", "inline").delay(6000).fadeOut();
                    setTimeout(function(){ location.reload(); }, 6000);
                       
                   
                } else {
                    $('#validate_article_failed').css("display", "inline").delay(6000).fadeOut();
                }
            }).error(function () {
                console.log('erreur ajax');
            });

            return false;
        })
    });
</script>
<div id="bloc_contenu">
    <h4><a href="<?= base_url('admin/liste_articles') ?>">Liste des articles</a></h4>
    <h1><?= $article->article_label ?></h1>


<div class="container">
    <div class="row">
        <span id="validate_article_success" class="label label-success">Cet article vient d'être vaildé. Il est désormais disponible en vente.</span>
        <span id="validate_article_failed" class="label label-danger">Echec. Un problème est survenu lors de la validation de cet article. Veuillez réessayer plus tard ou contacter le webmaster.</span>
        <br><br>
        <strong>Ajouté le : </strong><?= $article->created_at ?><br><br>
        <?php $status = ($article->is_verified == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>'; ?>
        <strong>Statut : </strong> <?= $status ?><br><br>
        <?= $article->img['imsrc'] ?><br>
        <strong>Description : </strong><br><?= $article->description ?><br><br>

        <strong>Caractéristiques </strong>:<br>
        <?php if (is_array($article->spec) && count($article->spec) > 0) foreach ($article->spec as $a_spec) { ?>
                <strong> <?= $a_spec->specification_label ?> </strong>: <?= $a_spec->specification_value ?><br>
                <?php
            }
        if (is_array($article->spec) && count($article->spec) == 0) {
            ?>
            Aucune caratéristique trouvée.
        <?php } ?>
        <div>


            <?php if ($article->is_verified != 1) { ?>
                <br><br><button name="validate_article" id="validate_article" type="button" class="btn btn-success btn-lg btn-block">Activer</button><br>
            <?php } ?>
        </div>

    </div>
</div>

</div>
