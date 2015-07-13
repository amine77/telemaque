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
    <h1>Liste des articles</h1>
    
    <button>Ajouter</button>
    <button>Supprimer</button>
    
    <div class="clear"></div>
    
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
                <td class="col_liens_details"><a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Voir les détails</a></td>
            </tr>
            <tr class="pair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Raimbow Six</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Livres Roman</td>
                <td class="col_nombre">52</td>
                <td class="col_liens_details"><a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Voir les détails</a></td>
            </tr>
            <tr class="impair">
                <td class="col_checkbox"><input type="checkbox"></td>
                <td class="col_libelle">Disque dur 128Go WD</td>
                <td class="col_reference">XXXXXXXXXXXXX</td>
                <td class="col_categorie">Matériel informatique</td>
                <td class="col_nombre">9</td>
                <td class="col_liens_details"><a href="#" title="Dismissible popover" data-toggle="modal" data-target="#myModal" data-content="Click anywhere in the document to close this popover">Voir les détails</a></td>
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
                        <h4 class="modal-title" id="myModalLabel">Détail de l'article</h4>
                        <h5>Libellé de l'article</h5>
                    </div>
                    <div class="modal-body">
                        
                        <div id="bloc_image">
                            
                        </div>
                        <div id="bloc_descriptif">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in arcu in urna rutrum feugiat. Suspendisse facilisis ac elit cursus porta. Maecenas
                            porttitor enim est, id rutrum dui ornare at. Cras eleifend lorem et nisl rutrum placerat. Proin sapien tellus, pharetra id ultrices eu, tristique
                            consequat erat. Quisque leo dolor, faucibus quis ultrices a, sodales at nisi. Vivamus euismod sem lorem, id imperdiet erat ultricies non. Proin
                            eleifend enim a tortor blandit accumsan sed sit amet mauris. Nunc dignissim, nulla condimentum bibendum pretium, arcu orci iaculis dui, a luctus
                            lacus lacus eget quam. Aliquam a nulla suscipit, egestas libero a, pretium eros. Nulla at arcu rutrum, suscipit metus ut, pharetra nibh.
                        </div>
                        
                        <div class="clear">
                        </div>
                        
                        <div id="bloc_details">
                            Nam rhoncus lorem non urna accumsan venenatis. Curabitur non est elit. Donec quis euismod justo, et commodo nunc. Sed sit amet sem ut tortor lacinia
                            lobortis at sed leo. Donec purus dui, tempus eu malesuada non, tempor id eros. Vivamus vitae velit varius purus laoreet tempus in vitae lacus.
                            Aliquam quis turpis nec arcu scelerisque laoreet. Nunc in mi commodo, iaculis purus a, scelerisque mauris. Class aptent taciti sociosqu ad litora
                            torquent per conubia nostra, per inceptos himenaeos. Phasellus auctor vulputate libero, eu accumsan libero auctor eget. Nam auctor, dui et tristique
                            aliquam, metus metus feugiat dolor, et placerat erat leo quis lacus. Cras mattis lectus a viverra pharetra. Nulla sed iaculis odio. Sed eget faucibus
                            elit. Integer sit amet nisl venenatis, mollis lectus sodales, imperdiet tellus.
                            <br><br>
                            Vestibulum molestie turpis ut nibh varius, in feugiat justo rutrum. Cras tincidunt et dolor vitae pharetra. Aliquam lobortis, sem ut tincidunt mattis,
                            sapien nibh auctor nulla, in elementum metus nisl eu ipsum. Vivamus ut iaculis dui, nec ornare nisi. Donec eu velit sit amet eros sodales mattis.
                            Integer quis risus in justo egestas viverra eget et turpis. Sed a nulla metus. Aenean eget suscipit ante. Nam sagittis condimentum sem, vitae
                            convallis libero laoreet nec. Suspendisse eu convallis massa. Nullam quis maximus est. Maecenas faucibus, leo non varius laoreet, massa purus dapibus
                            erat, lacinia aliquam felis quam eget leo. Phasellus pretium felis ac nulla suscipit, a tristique lacus ultricies. Vestibulum pretium molestie risus.
                            Sed vulputate felis sit amet odio commodo, pretium egestas ipsum porta.
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-default">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>