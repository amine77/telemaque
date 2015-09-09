<script>

    $(function () {
        $('form[name="moduleslideshowupdateform"]').submit(function (e) {
            e.preventDefault();
            var articles = [];

            $("#slideshow input:checkbox:checked").map(function () {
                articles.push($(this).val());
            });
            $.ajax({
                method: 'POST',
                url: '<?= base_url("admin/put_in_slideshow") ?>',
                dataType: 'json',
                data: {articles_in_slideshow: articles}
            }).success(function (message) {
                console.log('success ajax');
                if (message.state === 'OK') {
                    console.log('yes = ' + JSON.stringify(message));
                    $('#put_in_slideshow_success').css("display", "inline").delay(7000).fadeOut();
                } else {
                    $('#put_in_slideshow_error').css("display", "inline").delay(7000).fadeOut();
                    console.log('no = ' + message.state);

                }

            }).error(function () {
                console.log('erreur ajax')
            });
        });
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
    .container{
        margin-bottom: 200px;
    }
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
    #put_in_slideshow_success , #put_in_slideshow_error{
        font-size: 14px;
        display: none;
    }

</style>
<div id="bloc_contenu">
    <h4><a href="<?= base_url('admin/liste_modules') ?>">Liste des modules</a></h4>
    <h1>Mettre à jour le module "<?php echo($module['module_label']) ?>"</h1>



<div class="container">
    <div class="row">
        <br><br>
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "moduleupdateform", "name" => "moduleupdateform");
            echo form_open("admin/update_module/" . $id, $attributes);
            ?>
            
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
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-success" value="Valider" />
                    </div>
                </div>
            
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <?php
    if ($module['module_id'] == 2) {
        $this->load->view('back/update_module_comments');
    } elseif ($module['module_id'] == 1) {
        $this->load->view('back/update_module_slideshow');
    }
    ?>
</div>


</div>