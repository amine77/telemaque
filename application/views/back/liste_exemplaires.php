

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
    
    <h4><a href="<?= base_url('admin/ajouter_exemplaire')?>">Nouveau exemplaire</a></h4><br>
    <h1>Liste des exemplaires</h1>

    <?php if (is_array($exemplaires)) { ?>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Date de création</th>
                <th>Titre </th>
                <th>Article</th>
                <th>Status</th>
                <th>Prix</th>
                <th>Vendeur</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($exemplaires as $exemplaire) { ?>
                <tr>
                    <?php  
                    $status = ($exemplaire['is_verified'] == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>';
                    ?>
                    <td><?= $exemplaire['user_article_id']?></td>
                    <td><?= $exemplaire['created_at'] ?></td>
                    <td><?= $exemplaire['title'] ?></td>
                    <td><?= $exemplaire['article_label'] ?></td>
                    <td><?= $status ?></td>
                    <td><?= $exemplaire['price']. ' €' ?></td>
                    <td><?= $exemplaire['user_name'].' '.$exemplaire['user_surname'] ?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_exemplaire/' . $exemplaire['user_article_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cet exemplaire?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a> / <a title="modifier" href="<?= base_url('admin/update_exemplaire/' . $exemplaire['user_article_id']) ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> / <a title="voir" href="<?= base_url('admin/view_exemplaire/' . $exemplaire['user_article_id']) ?>">
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
