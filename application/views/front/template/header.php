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
            <?php
            var_dump($categories);
            for($i=0;$i<count($categories);$i++){
                $sousCat=false;
                $count = 0;
                if($categories[$i]['parent_category']==0){
                    echo "<li>".$categories[$i]['category'];
                }
                else{
                    $sousCat = true;
                    if ($count==0)
                        echo "<ul>";
                     echo "<li>".$categories[$i]['category']."</li>";
                  
                }
                if($sousCat){
                    echo "</ul>";
                }
                echo "</li>";
            }
            ?>
            <li><a href="#">rub1</a></li>
            <li><a href="#">rub2</a></li>
            <li><a href="#">rub3</a></li>
            <li><a href="#">rub4</a></li>
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