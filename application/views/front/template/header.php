<div class="center">
  
    <div>
        <img src ="http://www.google.fr/url?source=imglanding&ct=img&q=http://mon-logo-discount.com/logotek/577-822-proditem/logo-encart-entreprise.jpg&sa=X&ei=xOyDVaCKMojXyQPFsL8w&ved=0CAkQ8wc4FA&usg=AFQjCNEnLf2LDDM1XeZIA2p-wIH7Nf_ntQ" alt="logo entreprise" width="100" height="100"/>
        
        <div style="float: right">
            
            <?php if($this->session->userdata('login')){
     echo 'Bonjour <strong>'.$_SESSION['login'].'</strong>&nbsp;&nbsp;&nbsp;<a href="'.site_url('admin/logout').'">Déconnexion</a>';
            }else{
                echo ' <a href="'.site_url('admin').'">Connexion</a>&nbsp;&nbsp;&nbsp;<a href="'.site_url('inscription').'">Inscription</a>';
            }
            ?>
           
        </div>
    </div>
    <ul id="menu">
        <li> <?php echo '<a href="'.  base_url().'">Accueil</a>' ?></li>
        <li><a href="#">rub1</a></li>
        <li><a href="#">rub2</a></li>
        <li><a href="#">rub3</a></li>
        <li><a href="#">rub4</a></li>
    </ul>


    <div id="panier">
        <?php echo '<a href="'.  base_url().'panier">Panier</a>(<span>'. $nb_article.'</span>)'; ?>
       
    </div>   
    <?php echo "<h1>$title</h1>"; ?>
</div>