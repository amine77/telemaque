
</style>
<div id="bloc_contenu" >

        <?php
        $attributes = array("class" => "form-horizontal", "id" => "profil", "name" => "profil");
        echo form_open("account", $attributes);
        ?>

        <fieldset>
            <legend >Informations Profil</legend>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-2 col-sm-2">
                        <label>Mail : </label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="email" class="form-control input-sm" required="required" disabled="disabled" value="<?= $userInfo->mail ?>"/>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <label>Login : </label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="texte" class="form-control input-sm" name="login"   value="<?= $userInfo->login ?>"/>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-2 col-sm-2">
                        <label>Nom : <span class="required">*</span></label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="texte" class="form-control input-sm" name="user_name" required="required"  value="<?= $userInfo->user_name ?>"/>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <label>Prénom : <span class="required">*</span></label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="texte" class="form-control input-sm" name="user_surname" required="required"  value="<?= $userInfo->user_surname ?>"/>

                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row colbox">
                    <div class="col-lg-2 col-sm-2">
                        <label>Tel : </label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="texte" class="form-control input-sm" name="phone" maxlength="10" value="<?= $userInfo->phone ?>"/>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <label>Mobile : </label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="texte" class="form-control input-sm" name="mobile" maxlength="10"  value="<?= $userInfo->mobile ?>"/>

                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Reinitialiser votre mot de passe
            </button>
            <br><br>

            <div class="form-group collapse" id="collapseExample" >
                <div class="row colbox">
                    <div class="col-lg-2 col-sm-2">
                        <label>Mot de passe : <span class="required">*</span></label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="password" class="form-control input-sm" name="password" />

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <label>Retaper mot de passe : </label>

                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <input type="password" class="form-control input-sm" name="repassword"  />

                    </div>
                </div>

            </div>
            <div class="form-group" style="text-align: center;">

                <div>
                    <input id="btn_signup" name="update-profil" type="submit" class="btn btn-success" value="Valider" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                </div>
            </div>
        </fieldset>

        <?php echo form_close(); ?>
    </div>

</div>