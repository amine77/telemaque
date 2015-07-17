<script type="text/javascript">
    /* center modal */
    function centerModals() {
        $('.modal').each(function (i) {
            var $clone = $(this).clone().css('display', 'block').appendTo('body');
            var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
            top = top > 0 ? top : 0;
            $clone.remove();
            $(this).find('.modal-content').css("margin-top", top);
        });
    }
    $('.modal').on('show.bs.modal', centerModals);
    $(window).on('resize', centerModals);
</script>

<div id="bloc_contenu">
    <h1>Liste des vendeurs</h1>
    
    <button>Ajouter</button>
    <button>Supprimer</button>
    
    <div class="clear"></div>
    
    <table class="tableau_liste" id="tableau_vendeurs">
        <thead>
            <tr>
                <td class="col_checkbox"></td>
                <td class="col_pseudo">Pseudo</td>
                <td class="col_zip">Zip Code</td>
                <td class="col_ville">Ville</td>
                <td class="col_ventes">Ventes</td>
                <td class="col_note">Note</td>
                <td class="col_liens"></td>
            </tr>
        </thead>
        <tbody>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_pseudo">Pseudo</td>
                <td class="col_zip">Zip Code</td>
                <td class="col_ville">Ville</td>
                <td class="col_ventes">Ventes</td>
                <td class="col_note">Note</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_pseudo">Pseudo</td>
                <td class="col_zip">Zip Code</td>
                <td class="col_ville">Ville</td>
                <td class="col_ventes">Ventes</td>
                <td class="col_note">Note</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_pseudo">Pseudo</td>
                <td class="col_zip">Zip Code</td>
                <td class="col_ville">Ville</td>
                <td class="col_ventes">Ventes</td>
                <td class="col_note">Note</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_pseudo">Pseudo</td>
                <td class="col_zip">Zip Code</td>
                <td class="col_ville">Ville</td>
                <td class="col_ventes">Ventes</td>
                <td class="col_note">Note</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>


</div>