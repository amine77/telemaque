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
    
    <nav>
         <ul>
            <li> <?php echo '<a href="' . base_url() . '">Accueil</a>' ?></li>
            <li><a href="#">rub1</a></li>
            <li><a href="#">rub2</a></li>
            <li><a href="#">rub3</a></li>
            <li><a href="#">rub4</a></li>
        </ul>
        
        <div id="autres">
            <div id="form_search">
                <?php echo form_open('search'); ?>
            <input type="text" name="recherche" id="search"/>
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

<div class="center">

    <!--
    <div>
        <img src ="http://www.google.fr/url?source=imglanding&ct=img&q=http://mon-logo-discount.com/logotek/577-822-proditem/logo-encart-entreprise.jpg&sa=X&ei=xOyDVaCKMojXyQPFsL8w&ved=0CAkQ8wc4FA&usg=AFQjCNEnLf2LDDM1XeZIA2p-wIH7Nf_ntQ" alt="logo entreprise" width="100" height="100"/>
    </div>
    -->

    <div class="clear"></div>
</div>