<div id="bloc_contenu">
    <h1>Formulaire d'administrateurs</h1>

    <?php echo $this->session->flashdata('success'); ?>
    <?php
    $attributes = array("class" => "form-horizontal", "id" => "adminaddform", "name" => "adminaddform");
    echo form_open("admin/ajouter_admin", $attributes);
    ?>

    <form method="post" action="#">
        <table class="tableau_formulaire" id="tableau_form_administrateurs">
            <tr>
                <td class="col_label">
                    <label for="txt_nom">
                        Nom :
                    </label>
                </td>
                <td class="col_input">
                    <input class="form-control" id="txt_nom" name="txt_nom" placeholder="Nom" type="text" value="<?php echo set_value('txt_nom'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_nom'); ?></span>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_prenom">
                        Prénom :
                    </label>
                </td>
                <td class="col_input">
                    <input class="form-control" id="txt_prenom" name="txt_prenom" placeholder="Prénom" type="text" value="<?php echo set_value('txt_prenom'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_prenom'); ?></span>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_login">
                        Login :
                    </label>
                </td>
                <td class="col_input">
                    <input class="form-control" id="txt_email" name="txt_login" placeholder="Login" type="text" value="<?php echo set_value('txt_login'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_login'); ?></span>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_email">
                        Email :
                    </label>
                </td>
                <td class="col_input">
                    <input class="form-control" id="txt_email" name="txt_email" placeholder="Email" type="text" value="<?php echo set_value('txt_email'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_role">
                        Role :
                    </label>
                </td>
                <td class="col_input">
                    <select name="txt_role" class="form-control">
                        <?php
                        foreach ($roles as $role) {
                            echo '<option value="' . $role['role_id'] . '">' . $role['role_label'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_password">
                        Mot de passe :
                    </label>
                </td>
                <td class="col_input">
                    <input class="form-control" id="txt_email" name="txt_password" placeholder="Mot de passe" type="password" value="<?php echo set_value('txt_password'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                </td>
            </tr>
            <tr>
                <td class="col_label">
                    <label for="txt_active" class="control-label">Activé</label>
                </td>
                <td class="col_input">
                    <input type="checkbox" checked="checked" name="txt_active" value="1" />
                </td>
            </tr>
            
            <!-- ----------------- Separation ----------------- -->
            <tr>
                <td class="col_label separation">
                </td>
                <td class="col_input separation">
                </td>
            </tr>
            <!-- ----------------- Separation ----------------- -->

            <tr>
                <td class="col_label">
                </td>
                <td class="col_input">
                    <input id="btn_ajouter" name="btn_ajouter" type="submit" class="btn btn-default" value="Ajouter" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                </td>
            </tr>
            
        </table>
    </form>
    
    <?php echo form_close(); ?>
    <?php echo $this->session->flashdata('msg'); ?>
    
</div>