<header>
    <div id="bloc_connexion">
        <div>
            <?php
            if ($this->session->userdata('login')) {
                echo 'Bonjour <strong>' . $_SESSION['login'] . '</strong>&nbsp;&nbsp;&nbsp;<a href="' . site_url('logout') . '">Déconnexion</a>';
            } else {
                echo ' <a href="' . site_url('admin') . '">Connexion</a>&nbsp;&nbsp;-&nbsp;&nbsp;<a href="' . site_url('inscription') . '">Inscription</a>';
            }
            ?>
        </div>
    </div>

    <div id="bloc_head_centre">
        <div id="bloc_logo">

        </div>
    </div>
    <?php
    $parents = array();

    foreach ($categories as $categorie) {
        
    }
    foreach ($categories as $categorie) {
        if ($categorie['parent_category'] == '0') {
            $parents[$categorie['category']]['slug'] = $categorie['slug'];
        }
    }
    foreach ($categories as $categorie) {
        if ($categorie['parent_category'] != '0') {
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
            <?php

            foreach ($parents as $key => $parent) {

                if (array_key_exists('enfants', $parent) && is_array($parent['enfants'])) {
                    echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$key.' <span class="caret"></span></a>
              <ul class="dropdown-menu">';
                    $enfants = $parent['enfants'] ;
                    foreach ($enfants as $index =>$enfant) { {
                           echo '<li><a href="'.base_url('view/'.$enfant['slug']).'">' .$index. '</a></li>';
                        }
                    }
                    echo '                
                        </ul>
                      </li>';
                }else{
                    echo '<li><a href="' . base_url('view/'.$parent['slug'] ). '">' . $key . '</a></li>';
                    
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
<?php echo '<a href="' . base_url() . 'panier">Panier</a>(<span>' . $nb_article . '</span>)'; ?>
            </div>
        </div>
        <div class="clear"></div>
    </nav>


</header>