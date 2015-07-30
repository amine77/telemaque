<header>
    <div id="bloc_logo">
        NomDeBoutique
    </div>

    
    <div id="bloc_session">
        <a target="_blank" href="<?php echo base_url(); ?>">Aller vers le Frontoffice</a>&nbsp;&nbsp;&nbsp;&nbsp;
        Bonjour <?= ((isset($_SESSION['login'])==true )?$_SESSION['login']:'') ?><br>
        <a href="<?php echo site_url('logout');?>">Déconnexion</a>
    </div>
</header>