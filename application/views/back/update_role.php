<div id="bloc_contenu">
    <h4><a href="<?=  base_url('admin/liste_roles') ?>">Liste des roles</a></h4>
    <h1>Modifier un rôle</h1>

    <?php echo $this->session->flashdata('success'); ?>
    <?php
    $attributes = array("class" => "form-horizontal", "id" => "roleupdateform", "name" => "roleupdateform");
    echo form_open("admin/update_role/" . $id, $attributes);
    ?>

    <table class="tableau_formulaire" id="tableau_form_categories">
        <tr>
            <td class="col_label">
                <label for="txt_category">
                    Rôle :
                </label>
            </td>
            <td class="col_input">
                <input class="form-control" id="txt_password" name="txt_role" placeholder="Rôle" type="text" value="<?php echo($role['role_label']) ?>" />
                <span class="text-danger"><?php echo form_error('txt_role'); ?></span>
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
                <input id="btn_update" name="btn_update" type="submit" class="btn btn-default" value="Modifier" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
            </td>
        </tr>
    </table>

    <?php echo form_close(); ?>
    <?php echo $this->session->flashdata('msg'); ?>

</div>