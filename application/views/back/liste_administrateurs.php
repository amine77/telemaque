

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
    
    <h4><a href="<?= base_url('admin/ajouter_admin')?>">Ajouter un administrateur</a></h4><br>
    <h1>Liste des administrateurs</h1>

    <?php if (is_array($administrateurs) && count($administrateurs) > 0) { ?>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Nom </th>
                <th>Prénom</th>
                <th>Login</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Activé</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($administrateurs as $admin) { ?>
                <tr>
                    <td><?= $admin['user_id'] ?></td>
                    <td><?= $admin['user_name'] ?></td>
                    <td><?= $admin['user_surname'] ?></td>
                    <td><?= $admin['login'] ?></td>
                    <td><?= $admin['mail'] ?></td>
                    <td><?= $admin['role_label'] ?></td>
                    <td><?= ($admin['status']== '0')? 'Désactivé': 'Activé'?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_admin/' . $admin['user_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cet administrateur ?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a> / <a title="modifier" href="<?= base_url('admin/update_admin/' . $admin['user_id']) ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
