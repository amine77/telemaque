<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "adminaddform", "name" => "adminaddform");
            echo form_open("admin/ajouter_admin", $attributes);
            ?>
            <fieldset>
                <legend>Ajouter admin</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_nom" class="control-label">Nom</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_nom" name="txt_nom" placeholder="Nom" type="text" value="<?php echo set_value('txt_nom'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_nom'); ?></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_prenom" class="control-label">Prénom</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_prenom" name="txt_prenom" placeholder="Prénom" type="text" value="<?php echo set_value('txt_prenom'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_prenom'); ?></span>
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
                            <label for="txt_role" class="control-label">Rôle</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <select name="txt_role" class="form-control">
                                <?php
                                foreach ($roles as $role) {
                                    echo '<option value="'.$role['role_id']. '">' . $role['role_label'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_titre" class="control-label">Activé</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            
                             <input type="checkbox" checked="checked" name="txt_active" value="1" /><br>
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
