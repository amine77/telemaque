<script type="text/javascript">
    /* center modal */
    function centerModals(){
      $('.modal').each(function(i){
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
    <h1>Liste des articles</h1>
    <table class="tableau_liste" id="tableau_articles">
        <thead>
            <tr>
                <td class="col_checkbox"></td>
                <td class="col_libelle">Libellé</td>
                <td class="col_reference">Référence</td>
                <td class="col_categorie">Catégorie</td>
                <td class="col_nombre">Nbre</td>
                <td class="col_liens_details"></td>
            </tr>
        </thead>
        <tbody>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Anomaly - Warzone Earth</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Jeux, jouets...</td>
                <td class="col_nombre">21</td>
                <td class="col_liens_details"><a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Voir les détails</a></td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Les trois royaumes - l'intégrale collector</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Bande dessinée</td>
                <td class="col_nombre">4</td>
                <td class="col_liens_details">Voir les détails</td>
            </tr>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Raimbow Six</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Livres Roman</td>
                <td class="col_nombre">52</td>
                <td  class="col_liens_details">Voir les détails</td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Disque dur 128Go WD</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Matériel informatique</td>
                <td class="col_nombre">9</td>
                <td class="col_liens_details">Voir les détails</td>
            </tr>
        </tbody>
    </table>
    
    <div id="bloc_detail_article">
       <!-- Modal -->
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                   </div>
                   <div class="modal-body">
                       ...
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div>
    </div>
    
</div>