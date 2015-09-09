<script>
    $(function() {
        $('#sandbox-container input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr"
        });

    });
</script>
<div id="bloc_contenu">
    

                <div class="bloc_form_connex" style="float:left;width:40%;margin-right:10%;">
                    <?php
                    $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                    echo form_open("login", $attributes);
                    ?>
                    <fieldset>
                        <legend>Connexion</legend>
                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_username" class="control-label">Username</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_password" class="control-label">Password</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 col-sm-12 text-center">
                                <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Valider" />
                                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                            </div>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
    
    
    
    
                <div class="bloc_form_inscription" style="float:left;width:40%">
                        <?php
                        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                        echo form_open("inscription/index", $attributes);
                        ?>
                        <fieldset>
                            <legend>Inscription</legend>
                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_username" class="control-label">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_username" name="username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_password" class="control-label">Password</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_user_name" class="control-label">Nom</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="user_name" placeholder="Nom" type="text" value="<?php echo set_value('txt_user_name'); ?>" />
                                        <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_user_surname" class="control-label">Prénom</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="user_surname" placeholder="Prénom" type="text" value="<?php echo set_value('user_surname'); ?>" />
                                        <span class="text-danger"><?php echo form_error('user_surname'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_born_at" class="control-label">Né(e) le</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8" id="sandbox-container">
                                        <input class="form-control input-sm" id="txt_password" name="born_at" placeholder="Date de naissance" type="text" value="<?php echo set_value('born_at'); ?>" />
                                        <span class="text-danger"><?php echo form_error('born_at'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_phone" class="control-label">Téléphone</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_phone" placeholder="Téléphone" type="text" value="<?php echo set_value('txt_phone'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_phone'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_mobile" class="control-label">Mobile</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_mobile" placeholder="Mobile" type="text" value="<?php echo set_value('txt_mobile'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_mobile'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-4 col-sm-4">
                                        <label for="txt_mail" class="control-label">E-mail</label>
                                    </div>
                                    <div class="col-lg-8 col-sm-8">
                                        <input class="form-control" id="txt_password" name="txt_mail" placeholder="E-mail" type="text" value="<?php echo set_value('txt_mail'); ?>" />
                                        <span class="text-danger"><?php echo form_error('txt_mail'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12 col-sm-12 text-center">
                                    <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-default" value="S'inscrire" />
                                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>
<?php echo $this->session->flashdata('msg'); ?>
                    </div>
    <div class="clear"></div>

         
</div>
