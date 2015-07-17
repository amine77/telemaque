
<div id="bloc_contenu">
    <h1>Liste des catégories</h1>
    
    <button>Ajouter</button>
    <button>Supprimer</button>
    
    <div class="clear"></div>
    
    <table class="tableau_liste" id="tableau_categories">
        <thead>
            <tr>
                <td class="col_checkbox"></td>
                <td class="col_categorie">Categorie</td>
                <td class="col_liens"></td>
            </tr>
        </thead>
        <tbody>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_categorie">Categorie</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_categorie">Categorie</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_categorie">Categorie</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_categorie">Categorie</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>


</div>-->

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
    
    <h4><a href="<?= base_url('admin/ajouter_category')?>">Nouvelle catégorie</a></h4><br>
    <h1>Liste des categories</h1>

    <?php if (is_array($categories)) { ?>
        <table class="table table-hover">
            <tr>
                <th>Parent category</th>
                <th>Category </th>
                <th>Actions</th>
            </tr>
            <?php foreach ($categories as $categorie) { ?>
                <tr>
                    <td><?= ($categorie['parent_category']== '0')? '-': $categorie['parent_category']?></td>
                    <td><?= $categorie['category'] ?></td>
                    <td><a  title="supprimer" href="<?= base_url('admin/delete_category/' . $categorie['category_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cette catégorie?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a> / <a title="modifier" href="<?= base_url('admin/update_category/' . $categorie['category_id']) ?>">
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
