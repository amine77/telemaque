<script>

    $(function () {
        $('a[data-confirm]').click(function (ev) {
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

<style>
    #comments {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        width: 100%;
        border-collapse: collapse;
    }

    #comments td, #comments th {
        font-size: 1em;
        border: 1px solid black;
        padding: 3px 7px 2px 7px;
    }

    #comments th {
        font-size: 1.1em;
        text-align: left;
        padding-top: 5px;
        padding-bottom: 4px;
        background-color: #4E6CD4;
        color: #ffffff;
    }

</style>
<div id="bloc_contenu">
    <h4><a href="<?= base_url('admin/liste_modules') ?>">Liste des modules</a></h4>
    <h1>Mettre à jour le module "<?php echo($module['module_label']) ?>"</h1>


</div>
<div class="container">
    <div class="row">

        <div class="col-lg-6 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "moduleupdateform", "name" => "moduleupdateform");
            echo form_open("admin/update_module/" . $id, $attributes);
            ?>
            <fieldset>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_module" class="control-label">Nom de module</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input readonly="" class="form-control" id="txt_module" name="txt_module" placeholder="Nom de module" type="text" value="<?php echo($module['module_label']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_module'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_status" class="control-label">Activé</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            $checked = ($module['module_status'] == 1) ? 'checked="checked" ' : '';
                            ?>
                            <input type="checkbox" <?= $checked ?> name="txt_status" value="1" /><br>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-default" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <?php if ($module['module_status'] == 1) { ?>
        <div class="row">
            <div id="comments" class=".col-xs-12 .col-md-8">
                <?php
                if (isset($comments) && is_array($comments)) {

                    if (count($comments) > 0) {
                        ?>
                        <h4>Liste des commentaires</h4>
                        <table id="comments" class="table-hover">
                            <tr>
                                <th>Date</th>
                                <th>Pseudo</th>
                                <th>Article concerné</th>
                                <th>Commentaire</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($comments as $comment) { ?>
                                <tr>
                                    <?php
                                    $is_published = ($comment['is_published'] == 1 ) ? '<span class="label label-success">Publié</span>' : '<span class="label label-info">En attente</span>';
                                    $publish = ($comment['is_published'] != 1 ) ? '<a title="publier" href="' . base_url('admin/publish_comment/' . $comment['comment_id']) . '"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></a>' : '';
                                    ?> 
                                    <td><?= $comment['created_at'] ?></td>
                                    <td><?= $comment['pseudo'] ?></td>
                                    <td><a target="_blank" href="<?= base_url('articles/' . $comment['article_id']) ?>"><?= $comment['article_label'] ?></a></td>
                                    <td><?= $comment['comment_text'] ?></td>
                                    <td><?= $is_published ?></td>
                                    <td> <?= $publish ?> <a title="supprimer"   data-confirm="Etes-vous certain de vouloir supprimer ce commentaire?" href="<?= base_url('admin/delete_comment/' . $comment['comment_id']) ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                </tr>
                            <?php } ?>

                            <?php
                        } else {
                            echo '<p>Aucun commentaire trouvé.</p>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>


