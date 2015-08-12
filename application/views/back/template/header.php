<style>
    #notification{
        margin-top: 10px;
        padding: 10px 20px;
        font-size: 15px;
        display: inline;
    }
    #notification a span.glyphicon{
        top: 15px;
    }
    #notification a{
        padding: 3px;
        color: rgb(240, 173, 78);
    }
    #notification span.badge{
        background-color: #4E6CD4;
    }
</style>

<header>
    <div id="bloc_logo">
        <?= $site['site_name'] ?>

    </div>
    <div id="notification">
        <a href="<?= base_url('admin/liste_messages') ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><span class="badge"><?= $site['new_messages']  ?></span></a>
        <a href="<?= base_url('admin/liste_users') ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="badge"><?= $site['new_users']  ?></span></a>
        <a href="<?= base_url('admin/liste_articles') ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span class="badge"><?= $site['new_articles']  ?></span></a>
    </div>


    <div id="bloc_session">
        <a target="_blank" href="<?php echo base_url(); ?>">Aller vers le Frontoffice</a>&nbsp;&nbsp;&nbsp;&nbsp;
        Bonjour <?= ((isset($_SESSION['login']) == true ) ? $_SESSION['login'] : '') ?><br>
        <a href="<?php echo site_url('logout'); ?>">Déconnexion</a>
    </div>
</header>