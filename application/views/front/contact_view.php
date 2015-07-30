<div id="bloc_contenu">
    <h1>contactez-nous</h1>


</div>








<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "contactform", "name" => "contactform");
            echo form_open("admin/contact", $attributes);
            ?>
            <fieldset>
                <legend>Votre message</legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_receiver" class="control-label">Destinataire</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <select name="txt_receiver" class="form-control">
                                <?php
                                foreach ($contacts as $contact) {
                                    echo '<option value="' . $contact['user_id'] . '">' . $contact['mail'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_tag" class="control-label">Votre Email</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_password" name="txt_tag" placeholder="email@exemple.fr" type="text" value="<?php echo set_value('txt_tag'); ?>" />
                            <span class="text-danger"><?php echo form_error('txt_tag'); ?></span>
                        </div>
                    </div>
                </div>              
                
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_tag" class="control-label">Votre Email</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <textarea class="form-control" id="txt_content" name="txt_content" placeholder="Votre message" rows="10" cols="30"><?php echo set_value('txt_tag'); ?></textarea>
                            <span class="text-danger"><?php echo form_error('txt_tag'); ?></span>
                        </div>
                    </div>
                </div>      


                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_ajouter" name="btn_send" type="submit" class="btn btn-default" value="Envoyer" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>

    </div>
</div>
