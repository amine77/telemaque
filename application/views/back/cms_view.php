

<script>
    tinymce.init({
        selector: "#cgv",
        plugins: [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime textcolor table contextmenu paste"
        ],
        toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor"
    });
    tinymce.init({
        selector: "#legal_notice",
        plugins: [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime textcolor table contextmenu paste"
        ],
        toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor"
    });

    var rafraichir = function () {
        setTimeout(function () {
            location.reload();
        }, 2500);
    }
    $(function () {

        $('#update_site_name').click(function (e) {
            e.preventDefault();
            var site_name = $('input[name="site_name"]');
            site_name.attr('readonly', false);
            site_name.focus();
            $('#btn_update_site_name').show();

        });
        $('#btn_update_site_name').click(function (e) {
            e.preventDefault();
            $('btn_update_site_name').hide();
            var site_name = $('input[name="site_name"]');
            var new_site_name = $('input[name="site_name"]').val();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_site_name",
                data: {new_name: new_site_name}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {
                            rafraichir();
                            $('#update_site_name_success').css("display", "inline").fadeOut(2500);

//                            site_name.attr('readonly', true);
//                            site_name.focusout();
//                            $('#btn_update_site_name').hide();

                        } else {
                            $('#update_site_name_failed').css("display", "inline").fadeOut(2500);

                            site_name.attr('readonly', true);
                            site_name.focusout();
                            $('#btn_update_site_name').hide();
                        }
                    });
        });
        $('#update_site_address').click(function (e) {
            e.preventDefault();
            $('#btn_update_site_address').show();
            var zip_code = $('input[name="zip_code"]'), address = $('input[name="address"]'), city = $('input[name="city"]'), country = $('input[name="country"]');

            zip_code.attr('readonly', false);
            address.attr('readonly', false);
            city.attr('readonly', false);
            country.attr('readonly', false);
            address.focus();
        });
        $('#btn_update_site_address').click(function (e) {
            e.preventDefault();
            var zip_code = $('input[name="zip_code"]'), address = $('input[name="address"]'), city = $('input[name="city"]'), country = $('input[name="country"]');
            var zip_code_val = zip_code.val(), address_val = address.val(), city_val = city.val(), country_val = country.val();

            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_site_address",
                data: {zip_code: zip_code_val, address: address_val, city: city_val, country: country_val}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {
                            zip_code.attr('readonly', true);
                            address.attr('readonly', true);
                            city.attr('readonly', true);
                            country.attr('readonly', true);
                            $('#btn_update_site_address').hide();
                            $('#update_site_address_success').css("display", "inline").fadeOut(2500);

                        } else {
                            $('#update_site_address_failed').css("display", "inline").fadeOut(2500);
                            $('#btn_update_site_address').hide();
                        }
                    });


        });
        $('#update_slogan').click(function (e) {
            e.preventDefault();
            var slogan = $('input[name="slogan"]');
            slogan.attr('readonly', false);
            slogan.focus();
            $('#btn_update_slogan').show();

        });
        $('#btn_update_slogan').click(function (e) {
            e.preventDefault();
            $('btn_update_slogan').hide();
            var slogan = $('input[name="slogan"]');
            var new_slogan = $('input[name="slogan"]').val();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_slogan",
                data: {new_slogan: new_slogan}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {
                            slogan.attr('readonly', true);
                            slogan.focusout();
                            $('#btn_update_slogan').hide();
                            $('#update_slogan_success').css("display", "inline").fadeOut(2500);

                        } else {
                            $('#update_slogan_failed').css("display", "inline").fadeOut(2500);

                            slogan.attr('readonly', true);
                            slogan.focusout();
                            $('#btn_update_slogan').hide();
                        }
                    });
        });
        $('#update_phone').click(function (e) {
            e.preventDefault();
            var phone = $('input[name="phone"]');
            phone.attr('readonly', false);
            phone.focus();
            $('#btn_update_phone').show();

        });
        $('#btn_update_phone').click(function (e) {
            e.preventDefault();
            $('btn_update_phone').hide();
            var phone = $('input[name="phone"]');
            var new_phone = $('input[name="phone"]').val();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_phone",
                data: {new_phone: new_phone}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {
                            phone.attr('readonly', true);
                            phone.focusout();
                            $('#btn_update_phone').hide();
                            $('#update_phone_success').css("display", "inline").fadeOut(2500);

                        } else {
                            $('#update_phone_failed').css("display", "inline").fadeOut(2500);

                            phone.attr('readonly', true);
                            phone.focusout();
                            $('#btn_update_phone').hide();
                        }
                    });
        });
        $('#update_logo').click(function (e) {
            e.preventDefault();

            $('#logo_update').toggle();

        });



        $('#update_social_networks').click(function (e) {
            e.preventDefault();
            var twitter = $('#twitter_input');
            twitter.attr('readonly', false);
            $('#facebook_input').attr('readonly', false);
            $('#google_plus_input').attr('readonly', false);
            $('#btn_update_social_networks').toggle();
            twitter.focus();

        });
        $('#btn_update_social_networks').click(function (e) {
            e.preventDefault();
            var facebook = $('input[name="facebook_input"]');
            var twitter = $('input[name="twitter_input"]');
            var google_plus = $('input[name="google_plus_input"]');
            var new_facebook = facebook.val();
            var new_twitter = twitter.val();
            var new_google_plus = google_plus.val();

            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_social_networks",
                data: {facebook: new_facebook, twitter: new_twitter, google_plus: new_google_plus}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {
                            rafraichir();
                            $('#update_social_networks_success').css("display", "inline").fadeOut(2500);

                        } else {
                            rafraichir();
                            $('#update_social_networks_failed').css("display", "inline").fadeOut(2500);
                        }
                    });

        });
        $('#update_cgv').click(function (e) {
            e.preventDefault();
            var new_cgv = tinyMCE.get('cgv').getContent();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_cgv",
                data: {cgv: new_cgv}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {


                            $('#update_cgv_success').css("display", "inline").fadeOut(2500);

                        } else {
                            $('#update_cgv_failed').css("display", "inline").fadeOut(2500);
                        }
                    });
        });
        $('#update_legal_notice').click(function (e) {
            e.preventDefault();
            var new_legal_notice = tinyMCE.get('legal_notice').getContent();
            $.ajax({
                method: "POST",
                dataType: "json",
                url: "<?= base_url() ?>admin/update_legal_notice",
                data: {legal_notice: new_legal_notice}
            })
                    .done(function (message) {

                        if (message.state === 'OK') {


                            $('#update_legal_notice_success').css("display", "inline").fadeOut(2500);

                        } else {
                            $('#update_legal_notice_failed').css("display", "inline").fadeOut(2500);

                        }
                    });
        });
        $('a[data-confirm]').click(function (ev) {
            var href = $(this).attr('href');

            if (!$('#dataConfirmModal').length) {
                $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show: true});

            return false;
        });
    });

</script>

<div id="bloc_contenu">
    <div class="row">
        <div class="col-lg-6">
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Nom de boutique&nbsp;&nbsp;&nbsp; <a id="update_site_name" title="modifier" href="<?= base_url('admin/update_site_name') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-8">
                            <input class="form-control" id="site_name" name="site_name" type="text" readonly="" value="<?= $site['site_name'] ?>"> 
                        </div>
                        <button id="btn_update_site_name" name="btn_update_site_name" type="button" title="sauvegarder" class="btn btn-default btn-sm"  style="display: none">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </button>
                        <span id="update_site_name_success" class="label label-success" style="display: none">Mise à jour réussie</span>
                        <span id="update_site_name_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span>
                    </div>
                </div>

            </div>
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;Coordonnées&nbsp;&nbsp;&nbsp; <a id="update_site_address" title="modifier" href="<?= base_url('admin/update_site_address') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;<button id="btn_update_site_address" name="btn_update_site_address" type="button" title="sauvegarder" class="btn btn-default btn-sm"  style="display: none">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </button> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <div class="row colbox">

                                    <div class="col-lg-7 col-sm-4">
                                        <input readonly="" required="required" class="form-control" placeholder="Adresse" id="address" name="address" type="text" value="<?= $site['address'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row colbox">
                                    <div class="col-lg-3 col-sm-3">
                                        <input readonly="" class="form-control" placeholder="Code postal" id="zip_code" name="zip_code" type="text" value="<?= $site['zip_code'] ?>">
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <input readonly=""  class="form-control"  placeholder="Ville" id="city" name="city" type="text" value="<?= $site['city'] ?>">
                                    </div>
                                    <div class="col-lg-5 col-sm-5">
                                        <input readonly="" class="form-control"  placeholder="Pays" id="country" name="country" type="text" value="<?= $site['country'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span id="update_site_address_success" class="label label-success" style="display: none">Mise à jour réussie</span>
                        <span id="update_site_address_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span>
                    </div>
                </div>

            </div>
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>&nbsp;Slogan&nbsp;&nbsp;&nbsp;  <a id="update_slogan" title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-8">
                            <input class="form-control" id="slogan" name="slogan" type="text" readonly="" value="<?= $site['slogan'] ?>">     
                        </div>

                        <button id="btn_update_slogan" name="btn_update_slogan" type="button" title="sauvegarder" class="btn btn-default btn-sm"  style="display: none">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </button>
                        <span id="update_slogan_success" class="label label-success" style="display: none">Mise à jour réussie</span>
                        <span id="update_slogan_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span>
                    </div>
                </div>

            </div>
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;Logo&nbsp;&nbsp;&nbsp;&nbsp; <a  id="update_logo" title="modifier" href="<?= base_url('admin/update_logo') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>  
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                                <img src="<?= base_url('assets/img/logo.png') ?>" >
                            </a>
                        </div>
                        <div id="logo_update" style="display: none">
                            <?php
                            if (isset($error)) {
                                echo $error;
                            }
                            ?>
                            <?php echo form_open_multipart('admin/do_upload'); ?>
                            <input class="form-control" value="Choisissez un fichier" type="file" name="logo"><br>
                            <p class="help-block">Idéalement une image de 300 x 120 px</p>
                            <input type="submit" value="Envoyer" class="btn btn-default">
                            </form>

                            <ul>
                                <?php if (isset($upload_data)) foreach ($upload_data as $item => $value) { ?>
                                        <li><?php echo $item; ?>: <?php echo $value; ?></li>
                                    <?php } ?>
                            </ul>

                        </div>

                    </div>
                </div>

            </div>
            <div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;Réseaux sociaux&nbsp;&nbsp;&nbsp; <a id="update_social_networks" title="modifier" href="<?= base_url('admin/update_social_networks') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;<button id="btn_update_social_networks" name="btn_update_social_networks" type="button" title="sauvegarder" class="btn btn-default btn-sm"  style="display: none">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </button></h3>

                    </div>
                    <div class="panel-body">

                        <span id="update_social_networks_success" class="label label-success"  style="display: none">Mise à jour réussie</span>
                        <span id="update_social_networks_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span><br><br>
                        <table class="table">
                            <tr>
                                <th>Nom</th>
                                <th>Url</th>
                            </tr>
                            <tr><td>Twitter</td>
                                <td>
                                    <div class="col-xs-8">
                                        <input class="form-control" id="twitter_input" name="twitter_input" type="text" readonly="" value="<?= $site['twitter'] ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr><td>Facebook</td>
                                <td>
                                    <div class="col-xs-8">
                                        <input class="form-control" id="facebook_input" name="facebook_input" type="text" readonly="" value="<?= $site['facebook'] ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr><td>Google+</td>
                                <td>
                                    <div class="col-xs-8">
                                        <input class="form-control" id="google_plus_input" name="google_plus_input" type="text" readonly="" value="<?= $site['google_plus'] ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div> <br><br><br><br>
            </div>
        </div>
        <div class="col-lg-6">
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>&nbsp;Téléphone&nbsp;&nbsp;&nbsp;  <a id="update_phone" title="modifier" href="<?= base_url('admin/update_phone') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-5">
                            <input class="form-control" id="phone" name="phone" type="text" readonly="" value="<?= $site['phone'] ?>">     
                        </div>

                        <button id="btn_update_phone" name="btn_update_phone" type="button" title="sauvegarder" class="btn btn-default btn-sm"  style="display: none">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </button>
                        <span id="update_phone_success" class="label label-success" style="display: none">Mise à jour réussie</span>
                        <span id="update_phone_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span>
                    </div>
                </div>

            </div>
            <div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Conditions générales de vente(CGV) &nbsp;&nbsp;&nbsp; <a id="update_cgv" title="modifier" href="<?= base_url('admin/update_cgv') ?>">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <br>
                        <h4><span id="update_cgv_success" class="label label-success" style="display: none;">Mise à jour réussie</span>
                            <span id="update_cgv_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span></h4>
                        <textarea class="form-control" id="cgv" name="content" style="width:100%; height:50%"><?= $site['cgv'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Mentions légales&nbsp;&nbsp;&nbsp; <a id="update_legal_notice" title="modifier" href="<?= base_url('admin/update_legal_notice') ?>">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </a> </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <h4><span id="update_legal_notice_success" class="label label-success" style="display: none">Mise à jour réussie</span>
                        <span id="update_legal_notice_failed" class="label label-danger" style="display: none">Echec de la mise à jour</span></h4>
                    <textarea class="form-control" id="legal_notice" name="content" style="width:100%; height:50%"><?= $site['legal_notice'] ?></textarea>
                </div>
            </div>


        </div>
    </div>


</div>

