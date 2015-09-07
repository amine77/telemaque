<style>
    #bloc_contenu {
        margin-bottom: 100px;
    }
</style>
<script>
    $(function() {
        $("#validate_article").click(function() {

            $.ajax({
                method: 'POST',
                url: "<?= base_url('admin/validate_article') ?>",
                dataType: 'json',
                data: {id:<?= $article->article_id ?>}
            }).success(function(data) {
                console.log('article valide');
                if (data.statut == 'OK') {
                    $('#validate_article_success').delay(6000).fadeOut();
                } else {
                    $('#validate_article_failed').delay(6000).fadeOut();
                }
            }).error(function() {
                console.log('erreur ajax');
            });

            return false;
        })
    });
</script>
<div id="bloc_contenu">
    <h4><a href="<?= base_url('admin/liste_articles') ?>">Liste des articles</a></h4>
    <h1><?= $article->article_label ?></h1>
    <?php //var_dump($article);
    ?>

</div>
<div class="container">
    <div class="row">
        <span id="validate_article_success"></span>
        <span id="validate_article_failed"></span>
        
        <strong>Ajouté le : </strong><?= $article->created_at ?><br><br>
        <?php $status = ($article->is_verified == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>'; ?>
        <strong>Staut : </strong> <?= $status ?>  
        <?php if ($article->is_verified == 1) { ?>

            <button name="validate_article" id="validate_article" type="button" class="btn btn-lg btn-success">Activer</button>
        <?php } ?>
        <br>
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
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "articleupdateform", "name" => "articleupdateform");
            echo form_open("admin/validate_article/" . $id, $attributes);
            ?>

            <?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>
        </div>

    </div>
</div>


