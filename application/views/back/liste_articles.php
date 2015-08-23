

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
    
    <h4><a href="<?= base_url('admin/ajouter_article')?>">Nouveau article</a></h4><br>
    <h1>Liste des articles</h1>

    <?php if (is_array($articles)) { ?>
        <table class="table table-hover">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Date de création</th>
                <th>Titre </th>
                <th>Catégorie</th>
                <th>Status</th>
                <th>Nombre d'exemplaires</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <?php  
                    $new = ($article['is_new'] == 1) ? '<span class="label label-warning">Nouveau</span>' : '';
                    $status = ($article['is_verified'] == 1) ? '<span class="label label-success">Activé</span>' : '<span class="label label-danger">Desactivé</span>';
                    ?>
                    <td><?= $new?></td>
                    <td><?= $article['article_id']?></td>
                    <td><?= $article['created_at'] ?></td>
                    <td><?= $article['article_label'] ?></td>
                    <td><?= $article['category_label'] ?></td>
                    <td><?= $status ?></td>
                    <td><?= $article['nb_copies_of_article'] ?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_article/' . $article['article_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cet article?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a> / <a title="modifier" href="<?= base_url('admin/update_article/' . $article['article_id']) ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a> / <a title="voir" href="<?= base_url('admin/view_article/' . $article['article_id']) ?>">
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
