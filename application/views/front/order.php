<div id="bloc_contenu">
    <h2>Selectionner une adresse</h2>
    <div id="commande">
        <span class="btn btn-default">Récapitulatif de la commande</span>
        <a href="<?= base_url() ?>articles" class="btn btn-default" style="display:inline">Continuer mes achats</a>
        <div id="cart-order" style="display:none;">
            <?= $panier ?>
        </div>

    </div>

    <div id="adresse">
        <div id="select-address">
        <?php var_dump($adresses);?>
        </div>
        <div id="add-address">
        </div>    
        <!--<div id="new-count">
                    <?php
                    $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                    echo form_open("inscription/index", $attributes);
                    ?>
                    <fieldset>
                        <legend>Ajout une nouvelle adresse</legend>
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
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_user_name" class="control-label">Nom</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_password" name="txt_user_name" placeholder="Nom" type="text" value="<?php echo set_value('txt_user_name'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_user_name'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_user_surname" class="control-label">Prénom</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_password" name="txt_user_surname" placeholder="Prénom" type="text" value="<?php echo set_value('txt_user_surname'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_user_surname'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">
                                <div class="col-lg-4 col-sm-4">
                                    <label for="txt_born_at" class="control-label">Né(e) le</label>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <input class="form-control" id="txt_password" name="txt_born_at" placeholder="Date de naissance" type="text" value="<?php echo set_value('txt_born_at'); ?>" />
                                    <span class="text-danger"><?php echo form_error('txt_born_at'); ?></span>
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
                                <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-default" value="Valider" />
                                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                            </div>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>-->
        
           


        </div>
    </div>

