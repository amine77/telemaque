<div id="bloc_contenu">
    <h4><a href="<?=  base_url('admin/liste_users') ?>">Liste des utilisateurs</a></h4>
    <h1>Mettre à jour un utilisateur</h1>
    
    

<div class="container">
    <div class="row">
        <br><br>
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "userupdateform", "name" => "userupdateform");
            echo form_open("admin/update_user/" . $id, $attributes);
            ?>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_nom" class="control-label">Nom</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input required="required" class="form-control" id="txt_nom" name="txt_nom" placeholder="Nom" type="text" value="<?php echo($user['user_name']) ?>" />
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
                            <input required="required" class="form-control" id="txt_prenom" name="txt_prenom" placeholder="Prénom" type="text" value="<?php echo($user['user_surname']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_prenom'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_mail" class="control-label">Email</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input required="required" class="form-control" id="txt_mail" name="txt_mail" placeholder="Email" type="text" value="<?php echo($user['mail']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_mail'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_role" class="control-label">Rôle</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                        <select name="txt_role"  class="form-control">
                            <?php
                            
                            foreach ($roles as $role) {
                                $selected =($user['role_id']==$role['role_id'])?'selected':'';
                                echo '<option '.$selected.' value="' . $role['role_id'] . '">' . $role['role_label'] . '</option>';
                            }
                            ?>
                        </select>
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
                            $checked =($user['status'] == 1)?'checked="checked" ':'';
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
</div>


</div>