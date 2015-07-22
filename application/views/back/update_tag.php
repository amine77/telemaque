<div class="container">
    <div class="row">

        <?php
        $ids = array();
        foreach ($articles_by_tag as $value) {
            $ids[] = $value['article_id'];
        }
        ?>
        <div class="col-lg-4 col-sm-4 well">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "tagupdateform", "name" => "tagupdateform");
            echo form_open("admin/update_tag/" . $id, $attributes);
            ?>
            <fieldset>
                <legend>Mise à jour </legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_tag" class="control-label">Mot clé</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input required="required" class="form-control" id="txt_password" name="txt_tag" placeholder="Mot clé" type="text" value="<?php echo($tag['tag_label']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_tag'); ?></span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_parent" class="control-label">Articles</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                            foreach ($articles->result() as $row) {
                                $checked = (in_array($row->article_id, $ids))? 'checked':'';
                                echo '<input type="checkbox" '.$checked.' name="articles[]" value=" ' . $row->article_id . ' " />'
                                . $row->article_label . '<br>';
                            }
                            ?>
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


