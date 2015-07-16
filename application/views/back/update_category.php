<div class="container">
    <div class="row">

        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "categoryupdateform", "name" => "categoryupdateform");
            echo form_open("admin/update_category/".$id, $attributes);
            ?>
            <fieldset>
                <legend>Mise à jour </legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_category" class="control-label">Category</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input required="required" class="form-control" id="txt_password" name="txt_category" placeholder="Category" type="text" value="<?php echo($cat['category_label']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_category'); ?></span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_parent" class="control-label">Parent</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <select name="txt_parent" class="form-control">
                                <option value="0">Aucune</option>
                                <?php
                                foreach ($categories as $categorie) {

                                    echo '<option value="' . $categorie['category_id'] . '">' . $categorie['category'] . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-default" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>

    </div>
</div>


