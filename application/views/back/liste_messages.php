

<script>

    $(function () {
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
        
        $('a[title="voir"]').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
//            console.log('href = '+href);
            $.ajax({
                method: "GET",
                dataType: "html",
                url: href
            })
                    .done(function (response) {


                            if (!$('#messageContentModal').length) {
                                $('body').append('<div id="messageContentModal" class="modal" role="dialog" aria-labelledby="messageContentLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="messageContentLabel">Message</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-success" data-dismiss="modal" aria-hidden="true">OK</button></div></div></div></div>');
                            }
                            $('#messageContentModal').find('.modal-body').html(response);
                            $('#messageContentModal').modal({show: true});                        
                    });

            return false;
        });
    });

</script>

<div id="bloc_contenu">

    <h1>Liste des messages</h1>

    <?php if (is_array($messages)) { ?>
        <table class="table table-hover">
            <tr>
                <th></th>
                <th>Envoyé par</th>
                <th>Date d'envoi</th>
                <th>Sujet</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($messages as $message) { ?>
                <tr>
                    <?php
                    $new = ($message['is_new'] == 1) ? '<span class="label label-warning">Nouveau</span>' : '';
                    $sender = ($message['sender'] == '') ? $message['mail_sender'] : $message['mail'];
                    ?>
                    <td><?= $new ?></td>
                    <td><?= $sender ?></td>
                    <td><?= $message['date'] ?></td>
                    <td><?= $message['title'] ?></td>
                    <td><?= substr($message['content'], 0, 30) . '...' ?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_a_message/' . $message['message_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer ce message?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a> / <a title="voir" href="<?= base_url('admin/view_message/' . $message['message_id']) ?>">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>

            <?php }
            ?>
        </table>      
        <?php
    }
    ?>


</div>
<br><br>
