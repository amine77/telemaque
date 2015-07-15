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
    <h1>Liste des exemplaires</h1>
    
    <button>Ajouter</button>
    <button>Supprimer</button>
    
    <div class="clear"></div>
    
    <table class="tableau_liste" id="tableau_exemplaires">
        <thead>
            <tr>
                <td class="col_checkbox"></td>
                <td class="col_libelle">Libellé</td>
                <td class="col_vendeur">Vendeur</td>
                <td class="col_etat">Etat</td>
                <td class="col_prix">Prix</td>
                <td class="col_statut">Statut</td>
                <td class="col_liens"></td>
            </tr>
        </thead>
        <tbody>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Anomaly - Warzone Earth</td>
                <td class="col_vendeur">Momox</td>
                <td class="col_etat">Neuf</td>
                <td class="col_prix">15€</td>
                <td class="col_statut">A vendre</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Les trois royaumes - l'intégrale collector</td>
                <td class="col_vendeur">ThreeDayWalls</td>
                <td class="col_etat">Très bon</td>
                <td class="col_prix">14€</td>
                <td class="col_statut">Vendu</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Raimbow Six</td>
                <td class="col_vendeur">VirtuaGeek</td>
                <td class="col_etat">Quasi-neuf</td>
                <td class="col_prix">25€</td>
                <td class="col_statut">A vendre</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Disque dur 128Go WD</td>
                <td class="col_vendeur">Diozabi</td>
                <td class="col_etat">Bon</td>
                <td class="col_prix">80€</td>
                <td class="col_statut">A vendre</td>
                <td class="col_liens">
                    <a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Fiche</a>
                    - <a href="#">Modifier</a>
                    - <a href="#">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>


</div>