<header>
    <div id="bloc_connexion">
        <div>
            <?php
            if ($this->session->userdata('login')) {
                echo 'Bonjour <strong>' . $_SESSION['login'] . '</strong>&nbsp;&nbsp;&nbsp;<a href="' . site_url('admin/logout') . '">Déconnexion</a>';
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
            
            $parents =array();
            //var_dump($categories);
            foreach ($categories as $categorie) {
                if($categorie['parent_category'] == '0'){
                    $parents[$categorie['category']]='';
                }else{
                    $parents[$categorie['parent_category']][]=$categorie['category'];
                }
                
            }
            var_dump($parents);
            ?>
    <nav>
        <ul>
            <li> <?php echo '<a href="' . base_url() . '">Accueil</a>' ?></li>
            <?php
                        foreach ($parents as $parent => $enfant) {
                            echo '<li><a href="#">'.$parent .'</a></li>';
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