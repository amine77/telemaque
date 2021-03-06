<header>

    <div id="bloc_connexion">
        <div id="vendre"><a href="<?= site_url('nouvelle-vente') ?>">Vendre</a></div>
        <?php if ($this->session->userdata('login')) : ?>
            <div id="profil">
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon compte<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('account') ?>">Mon profil</a></li>
                            <li><a href="<?= site_url('account/mesachats') ?>">Mes achats</a></li>
                            <li><a href="<?= site_url('account/mesventes') ?>">Mes ventes</a></li>                
                        </ul>
                    </li>

                </ul>
            </div>
        <?php endif; ?>
    
        <div>
            <?php
            if ($site['phone'] != '') {
                echo'<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<strong>Appelez-nous au :</strong>' . $site['phone'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }



            if ($this->session->userdata('login')) {
                $administration = ($this->session->userdata('role') == 'ROLE_ADMIN' || $this->session->userdata('role') == 'ROLE_SUPER_ADMIN') ? '<a href="' . base_url('admin') . ' ">Espace Administration</a>' : '';
                echo 'Bonjour <strong>' . $_SESSION['login'] . '</strong>&nbsp;&nbsp;' . $administration . '&nbsp;<a href="' . site_url('logout') . '">Déconnexion</a>';
            } else {
                echo ' <a href="' . site_url('connexion') . '">Connexion&nbsp;/&nbsp;Inscription</a>';
            }
            ?>
        </div>
    </div>

    <div id="bloc_head_centre">
        <div class="row">
            <div class="col-xs-3 col-md-1">

            </div>
            <div class="col-xs-3 col-md-1" id="bloc_logo" style="background-size: 300px 120px;background-image: url(<?= base_url() . $site['image_path'] ?>) ">

            </div>
            <div class="col-xs-3 col-md-3">
                <span style="font-weight: bold;font-size: 2em;display: block;padding-top: 50px;color:white"><?= $site['slogan'] ?></span>
            </div>
        </div>


    </div>
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
    <nav>
        <ul>
            <li> <?php echo '<a href="' . base_url() . '">Accueil</a>' ?></li>
            <li> <?php echo '<a href="' . base_url('contact') . '">Contact</a>' ?></li>
            <?php
            foreach ($parents as $key => $parent) {

                if (array_key_exists('enfants', $parent) && is_array($parent['enfants'])) {
                    echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $key . ' <span class="caret"></span></a>
              <ul class="dropdown-menu">';
                    $enfants = $parent['enfants'];
                    foreach ($enfants as $index => $enfant) { {
                            echo '<li><a href="' . base_url('view/' . $enfant['slug']) . '">' . $index . '</a></li>';
                        }
                    }
                    echo '                
                        </ul>
                      </li>';
                } else {
                    echo '<li><a href="' . base_url('view/' . $parent['slug']) . '">' . $key . '</a></li>';
                }
            }
            ?>
        </ul>

        <div id="autres">
            <div id="form_search">
                <?php echo form_open('search'); ?>
                <input type="search" name="recherche" id="search"/>
                <input type="submit" value="Valider">
                <?php echo form_close(); ?>
            </div>
            <div id="panier">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                <?php echo '<a href="' . base_url() . 'panier" >&nbsp;Panier</a>(<span id="panier-nbarticle">' . $nb_article . '</span>)'; ?>
            </div>
        </div>
        <div class="clear"></div>
    </nav>


</header>