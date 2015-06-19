<header>
    <div id="bloc_logo">
        NomDeBoutique
    </div>

    <div id="bloc_session">
        Bonjour <?php ((isset($_SESSION['login'])==true )?$_SESSION['login']:'') ?><br>
        <a href="<?php echo site_url('admin/logout');?>">Déconnexion</a>
    </div>
</header>