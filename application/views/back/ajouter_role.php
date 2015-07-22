<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "roleaddform", "name" => "roleaddform");
            echo form_open("admin/ajouter_role", $attributes);
            ?>
            <fieldset>
                <legend>Ajouter un mot clé</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_role" class="control-label">Rôle</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_role" placeholder="Rôle" type="text" value="<?php echo set_value('txt_role'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_role'); ?></span>
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
