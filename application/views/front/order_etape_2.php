<div id="bloc_contenu">
    <div>
        <a class="btn btn-primary btn_base" href="<?= base_url() ?>panier/order">Retour</a>
    </div>
    <div id="select-address" style="float:left;width:40%;margin-right:10%;">
        <?php
        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
        echo form_open("panier/order", $attributes);
        ?>
        <fieldset>
            <legend>Information Bancaire</legend>
            <div class="form-group">
                <div class="row colbox">

                    <div class="col-lg-12 col-sm-2">
                        <select class="form-control input-sm" required="required">
                            <option value="">Sélectionner votre type de carte</option>
                            <option>Bleu</option>
                            <option>Visa</option>
                            <option>Mastercad</option>
                        </select>

                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">

                    <!--  <div class="col-lg-5 col-sm-5">
                          <input required="required" class="form-control" id="num_cart" name="num_cart" placeholder="N° carte Bancaire" type="text" maxlength="16" />
                      </div>-->

                    <div id="sandbox-container">
                        <div class="input-group date">
                            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div class="span5 col-md-5" id="sandbox-container"><div class="input-group date">
                            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <input required="required" class="form-control" id="pays" name="pays" placeholder="Pays" type="text"  />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-7 col-sm-7 text-center"></div>
                <div class="col-lg-5 col-sm-5 text-center">
                    <input id="btn_signup" name="select_adress" type="submit" class="btn btn-default" value="Valider" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg-select-adress'); ?>

    </div>
    <div class="clear"></div>
</div>

