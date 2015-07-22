<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "contactaddform", "name" => "contactaddform");
            echo form_open("admin/ajouter_contact", $attributes);
            ?>
            <fieldset>
                <legend>Ajouter contact</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_titre" class="control-label">Titre</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_titre" name="txt_titre" placeholder="Titre" type="text" value="<?php echo set_value('txt_titre'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_titre'); ?></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_email" class="control-label">Email</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_email" name="txt_email" placeholder="Email" type="text" value="<?php echo set_value('txt_email'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_description" class="control-label">Description</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <textarea class="form-control" id="txt_description" name="txt_description" placeholder="Description"  value="<?php echo set_value('txt_description'); ?>" ></textarea>
                            <span class="text-danger"><?php echo form_error('txt_description'); ?></span>
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
