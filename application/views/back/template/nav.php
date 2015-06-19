<nav>
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="first">
                <?php
                    echo '<a href="' . base_url() . 'admin/home">';
                ?>
                    Tableau de bord
                </a>
            </li>
            <li>
                <a href="#" data-toggle="dropdown">
                    Catalogue
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="first"><a href="#">Articles</a></li>
                    <li><a href="#">Exemplaires</a></li>
                    <li><a href="#">Catégories</a></li>
                    <li><a href="#">Mots-clés</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="dropdown">
                    Usagers
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="first"><a href="#">Clients</a></li>
                    <li><a href="#">Adresses</a></li>
                    <li><a href="#">Paniers</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="dropdown">
                    Administration
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="first"><a href="#">Administrateurs</a></li>
                    <li><a href="#">Rôles</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </li>
            <li><a href="#">Modules</a></li>
            <li><a href="#">Structure</a></li>
        </ul>
    </div>
</nav>