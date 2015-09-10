<script>
    $(function () {
        $('#sandbox-container input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr"
        });

    });
</script>

<div id="bloc_contenu">
    <div>
        <a class="btn btn-primary btn_base" href="<?= base_url() ?>panier/order"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Retour</a>
    </div>
    <div ><br>
        <?php
        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
        echo form_open("panier/order/etape-2", $attributes);
        ?>
        <fieldset>
            <legend>Informations Bancaires</legend>
            <div class="form-group">
                <div class="row colbox">

                    <div class="col-lg-4 col-sm-4">
                        <select  required="required" class="form-control input-sm" required="required">
                            <option value="">Sélectionner le type de votre carte</option>
                            <option>Bleue</option>
                            <option>Visa</option>
                            <option>Mastercad</option>
                        </select>

                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">

                    <div class="col-lg-4 col-sm-4">
                        <input  required="required" class="form-control" type="text" name="card_number" id="card_number" placeholder="Numéro de carte" minlength="16" maxlength="16"/>
                         
                    </div>
                    <div class="col-lg-4 col-sm-4">
                       <?php echo $this->session->flashdata('msg-cartnumber'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row colbox">

                    <div  class="col-lg-2 col-sm-4" id="sandbox-container">
                        <input required="required" type="text"  placeholder="Date d'expiration"class="form-control" >
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <input required="required" class="form-control" id="security_code" name="security_code" placeholder="Code de securité" type="text" maxlength="3"/>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                       <?php echo $this->session->flashdata('msg-crypto'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div></div>
                <div>
                    <input id="btn_signup" name="valid-cart" type="submit" class="btn btn-success" value="Valider" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
       

    </div>
    <div class="clear"></div>
</div>

