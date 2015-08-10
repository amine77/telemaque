<div id="bloc_contenu">
    <br><h1>CONTACTEZ-NOUS</h1><br>

    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "contactform", "name" => "contactform");
                echo form_open("contact", $attributes);
                ?>
                <fieldset>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-2 col-sm-4">
                                <label for="txt_receiver" class="control-label">Destinataire</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <select name="txt_receiver" class="form-control">
                                    <?php
                                    echo '<option selected disabled>Choisir</option>';
                                    foreach ($contacts as $contact) {
                                        echo '<option data-toggle="tooltip" data-placement="top" value="' . $contact['mail'] . '">' . $contact['mail'] . '&nbsp;&nbsp;&nbsp;(' . $contact['title'] . ' : ' . $contact['description'] . ')</option>';
                                    }
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('txt_receiver'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-2 col-sm-4">
                                <label for="txt_sender" class="control-label">Votre Email</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_sender" name="txt_sender" placeholder="email@exemple.fr" type="text" value="<?php echo set_value('txt_sender'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_sender'); ?></span>
                            </div>
                        </div>
                    </div>              

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-2 col-sm-4">
                                <label for="txt_subject" class="control-label">Sujet</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_title" name="txt_subject" placeholder="Sujet" type="text" value="<?php echo set_value('txt_subject'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_subject'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-2 col-sm-4">
                                <label for="txt_tag" class="control-label">Votre Message</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <textarea class="form-control" id="txt_content" name="txt_content" placeholder="Votre message" rows="10" cols="30"><?php echo set_value('txt_content'); ?></textarea>
                                <span class="text-danger"><?php echo form_error('txt_content'); ?></span>
                            </div>
                        </div>
                    </div>      


                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_ajouter" name="btn_send" type="submit" class="btn btn-success" value="Envoyer" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                        </div>
                    </div>
                </fieldset>

                <?php echo form_close(); ?>
            </div>
            <div class="col-xs-6 col-md-4">
                 
                
                <div class="row">
                    <h3><span class="label label-info">Nos coordonnées:</span></h3>
                </div>
                <div class="row">
                    <address>
                        <hr>
                        <strong><?= $site['site_name'] ?></strong><br>
                        <?=$site['address'] ?><br>
                         <?= $site['zip_code'] ?> <?= $site['city'] ?><br><?= $site['country'] ?> <br>
                        <abbr title="Téléphone"><?php if($site['phone']!='') {?>Téléphone:</abbr> <?= $site['phone'] ?><?php } ?><br>
                    </address>
                </div>
            </div>
        </div>









    </div>
</div>
</div>

