

<script>

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
                            setTimeout(function () {
                                location.reload();
                            }, 2500);
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Nom de boutique&nbsp;&nbsp;&nbsp; <a id="update_site_name" title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">

                        <input id="site_name" name="site_name" type="text" readonly="" value="<?= $site['site_name'] ?>"> 
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
                        <h3 class="panel-title"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>&nbsp;Slogan&nbsp;&nbsp;&nbsp;  <a title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <input id="slogan" name="slogan" type="text" readonly="" value="<?= $site['slogan'] ?>"> 
                        <button id="btn_update_slogan" name="btn_update_slogan" type="button" title="sauvegarder" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </button>

                    </div>
                </div>

            </div>
            <div>              

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;Logo&nbsp;&nbsp;&nbsp;&nbsp; <a title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>  
                        </h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>

            </div>
            <div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;Réseaux sociaux&nbsp;&nbsp;&nbsp; <a title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table-bordered">
                            <tr>
                                <th>Nom</th>
                                <th>Url</th>
                                <th>Actions</th>
                            </tr>
                            <tr><td>Twitter</td><td>https://twitter.com/jacques_chirac</td><td>3</td></tr>
                            <tr><td>Facebook</td><td>https://fr-fr.facebook.com/jchirac</td><td></td></tr>
                            <tr><td>Google+</td><td>https://plus.google.com/102685841535368836727/posts</td><td></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;CGU &nbsp;&nbsp;&nbsp; <a title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> </h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Mentions légales&nbsp;&nbsp;&nbsp; <a title="modifier" href="<?= base_url('admin/update_slogan') ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a> </h3>
                </div>
                <div class="panel-body">
                    <table>
                        <tr><td><strong>Date </strong> : </td></tr>
                    </table>
                </div>
            </div>


        </div>
    </div>


</div>

