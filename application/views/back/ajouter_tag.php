<div id="bloc_contenu">
    <h4><a href="<?=  base_url('admin/liste_tags') ?>">Liste des mots clés</a></h4>
    <h1>Ajouter un mot clé</h1>
    
    
</div>








<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "tagaddform", "name" => "tagaddform");
            echo form_open("admin/ajouter_tag", $attributes);
            ?>
            <fieldset>
                <legend>Ajouter un mot clé</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_tag" class="control-label">Mot clé</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_tag" placeholder="Tag" type="text" value="<?php echo set_value('txt_tag'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_tag'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_parent" class="control-label">Articles</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                           foreach ($articles->result() as $row) {
                                echo '<input type="checkbox" name="articles[]" value=" ' . $row->article_id . ' " />' 
                                        . $row->article_label . '<br>';
                            }
                            ?>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_ajouter" name="btn_ajouter" type="submit" class="btn btn-default" value="Ajouter" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>

    </div>
</div>
