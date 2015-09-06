<div id="bloc_contenu">
    <br><h2>Nouvelle Vente</h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                echo form_open("inscription/index", $attributes);
                ?>
                <fieldset>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="nom_produit" id="nom_produit" class="form-control input-sm" placeholder="Nom">
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">

                                <select name="select-category" id="select-cat" class="form-control input-sm" >
                                    <option value="0">Selectionner une categorie</option>
                                    <?php
                                    foreach ($categories as $cat) {
                                        if ($cat['parent_category'] == '0') {
                                            echo "<option value='".$cat["category_id"]."'>".$cat['category']."</option>";
                                        }
                                    }
                                    ?>
                                    

                                </select>    
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control input-sm" placeholder="Télephone">
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" >
                                <input type="text" name="login" id="login" class="form-control input-sm" placeholder="Login" required="required">
                                <span class="text-danger"><?php echo form_error('login'); ?></span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group" id="sandbox-container">
                                <input type="text" name="born_at"  class="form-control input-sm" placeholder="Date de naissance">
                                <span class="text-danger"><?php echo form_error('born_at'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email" required="required">
                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Mot de passe" required="required">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Retaper mot de passe" required="required">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-success" value="Ajouter objet" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                        </div>
                    </div>
                </fieldset>
<?php echo form_close(); ?>
 <?=$form_upload_img;?>
            </div>

        </div>
    </div>

</div>
