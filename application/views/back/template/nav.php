<nav>
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="first">
                <a href="<?= base_url('admin/home') ?>">
                    Tableau de bord
                </a>
            </li>
            <li>
                <a href="#" data-toggle="dropdown">
                    Catalogue
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="first">
                        <a href="<?= base_url('admin/liste_articles') ?>">
                            Articles
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/liste_exemplaires') ?>">
                            Exemplaires
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/liste_categories') ?>">
                            Catégories
                        </a>
                    </li>
                    <li><a href="<?php echo base_url('/admin/liste_tags') ?>">Mots-clés</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('admin/liste_users') ?>">
                    Usagers
                </a>

            </li>
            <li>
                <a href="<?= base_url('admin/liste_messages') ?>">
                    Messages
                </a>

            </li>
            <li>
                <a href="#" data-toggle="dropdown">
                    Administration
                </a>
                <ul class="dropdown-menu" aria-labelledby="administration">
                    <?php if ($this->session->userdata('role') == 'ROLE_SUPER_ADMIN') { ?>
                        <li class="first">
                            <a href="<?= base_url('admin/liste_administrateurs') ?>">
                                Administrateurs
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/liste_roles') ?>">
                                Roles
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?= base_url('admin/liste_contacts') ?>">
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/cms') ?>">
                            CMS
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('admin/liste_modules') ?>">Modules</a>
            </li>
            <li><a href="#">Structure</a></li>
        </ul>
    </div>
</nav>