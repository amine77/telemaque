

<script>
	
$(function() {
	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		
		return false;
	});
});

</script>

<div id="bloc_contenu">
    
    <h1>Liste des utilisateurs</h1>

    <?php if (is_array($users)) { ?>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Activé</th>
                <th>Date d'inscription</th>
                <th>Dernière visite</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['user_id']?></td>
                    <td><?= $user['user_name'] ?></td>
                    <td><?= $user['user_surname'] ?></td>
                    <td><?= $user['mail'] ?></td>
                    <td>Activé</td>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['updated_at'] ?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_user/' . $user['user_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cet utilisateur?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a> / <a title="modifier" href="<?= base_url('admin/update_user/' . $user['user_id']) ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> / <a title="voir" href="<?= base_url('admin/view_user/' . $user['user_id']) ?>">
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
