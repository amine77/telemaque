<?php
$parents = array();

foreach ($categories as $categorie) {
    if ($categorie['parent_category'] == '0') {
        $parents[$categorie['category']]['slug'] = $categorie['slug'];
    } elseif ($categorie['parent_category'] != '0') {
        $enfant = array(
            'slug' => $categorie['slug']
        );
        $parents[$categorie['parent_category']]['enfants'][$categorie['category']] = $enfant;
    }
}
?>
<footer>

    <div class="liste_liens_footer secondaire">
        <h4>Mon compte</h4>
        <ul>
            <li><a href="#" title="Mes informations">Mes informations</a></li>
            <li><a href="#" title="Mes commandes">Mes commandes</a></li>
            <li><a href="#" title="Mes ventes">Mes ventes</a></li>
            <li><a href="#" title="Mes historique">Mon historique</a></li>
        </ul>
    </div>

    <div class="liste_liens_footer principal">
        <div class="liste_liens_principal">
            <h4>Catégories</h4>
            <ul>
            <?php
            foreach ($parents as $key => $parent) {

                if (array_key_exists('enfants', $parent) && is_array($parent['enfants'])) {
                    echo '<li>';
                    $enfants = $parent['enfants'];
                    foreach ($enfants as $index => $enfant) { {
                            echo '<a href="' . base_url('view/' . $enfant['slug']) . '">' . $index . '   </a> ';
                        }
                    }
                    echo '</li>';
                } else {
                    echo '<li><a href="' . base_url('view/' . $parent['slug']) . '">' . ucfirst(mb_strtolower($key, 'UTF-8')). '</a></li>';
                }
            }
            ?>

            </ul>
        </div>


    </div>

    <div class="liste_liens_footer secondaire">
        <h4>Contactez-nous</h4>
        <ul>
            <li><a href="<?=  base_url('cgv') ?>" title="Conditions générales de ventes">CGV</a></li>
            <li><a href="<?= base_url('contact') ?>" title="Contact">Contact</a></li>
            <li><a href="<?=  base_url('legal_notice') ?>" title="Mentions légales">Mentions légales</a></li>
        </ul>
    </div>

</footer>




<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/lib/twitter/js/bootstrap.min.js"></script>
</body>
</html>