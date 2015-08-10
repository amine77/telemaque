<?php  
if(isset($categories)&& is_array($categories)){
    //Ne pas proposer à une catégorie, elle même comme parent et du coup on doit la supprimer du tableau categories
    foreach ($categories as $i=>$categorie) {
        if($categorie['category_id'] ==$id){
            unset($categories[$i]);
        }
    }
}
?>
<div id="bloc_contenu">
    <h4><a href="<?=  base_url('admin/liste_categories') ?>">Liste des catégories</a></h4>
    <h1>Modifier une catégorie</h1>

    <?php echo $this->session->flashdata('success'); ?>
    <?php
    $attributes = array("class" => "form-horizontal", "id" => "categoryupdateform", "name" => "categoryupdateform");
    echo form_open("admin/update_category/" . $id, $attributes);
    ?>

    <table class="tableau_formulaire" id="tableau_form_categories">
        <tr>
            <td class="col_label">
                <label for="txt_category">
                    Catégorie :
                </label>
            </td>
            <td class="col_input">
                <input required="required" class="form-control" id="txt_password" name="txt_category" placeholder="Category" type="text" value="<?php echo($cat['category_label']) ?>" />
                <span class="text-danger"><?php echo form_error('txt_category'); ?></span>
            </td>
        </tr>
        <tr>
            <td class="col_label">
                <label for="txt_parent">
                    Parent :
                </label>
            </td>
            <td class="col_input">
                <select name="txt_parent" class="form-control">
                    <option value="0">Aucune</option>
                    <?php
                    foreach ($categories as $categorie) {

                        echo '<option value="' . $categorie['category_id'] . '">' . $categorie['category'] . '</option>';
                    }
                    ?>
                </select>
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