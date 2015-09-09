<div id="bloc_contenu">
    <h4><a href="<?=  base_url('admin/liste_contacts') ?>">Liste des contacts</a></h4>
    <h1>Mettre àjour un contact</h1>
    
    

<div class="container">
    <div class="row">

        <div class="col-lg-6">
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "contactupdateform", "name" => "contactupdateform");
            echo form_open("admin/update_contact/" . $id, $attributes);
            ?>
            
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_titre" class="control-label">Titre</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_titre" name="txt_titre" placeholder="Titre" type="text" value="<?php echo($user['title']) ?>"  />
                            <span class="text-danger"><?php echo form_error('txt_titre'); ?></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_email" class="control-label">Email</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input class="form-control" id="txt_email" name="txt_email" placeholder="Email" type="text" value="<?php echo($user['mail']) ?>" />
                            <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="txt_description" class="control-label">Description</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <textarea class="form-control" id="txt_description" name="txt_description" placeholder="Description"><?php echo($user['description']) ?></textarea>
                            <span class="text-danger"><?php echo form_error('txt_description'); ?></span>
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