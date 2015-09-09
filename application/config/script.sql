Use telemaque3 ; 
<fin> 
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `country` varchar(40) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
<fin>

INSERT INTO `address` (`address_id`, `zip_code`, `address`, `city`, `country`, `user_id`) VALUES
(1, '94120', '10 boulevard de vincennnes', 'Fontenay-sous-bois', 'France', NULL),
(2, '94120', '22, rue Anatole France', 'Fonteny-sous-bois', 'France', 5),
(3, '75005', '15, rue des écoles', 'Paris', 'France', 5),
(4, '75006', '10, rue mabillon', 'Paris', 'France', 16),
(5, '75020', '15 rue claude-tillet', 'Paris', 'France', 4);

<fin>

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_label` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '1',
  `in_carousel` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `is_verified` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `category_id` (`category_id`),
  KEY `image_id` (`image_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

<fin>

INSERT INTO `articles` (`article_id`, `article_label`, `created_at`, `description`, `category_id`, `image_id`, `user_id`, `is_new`, `in_carousel`, `views`, `is_verified`) VALUES
(1, 'Renault twingo', '2015-06-19 08:39:18', 'Sortie en 2002, la Renault Mégane II a été élue voiture de l''année 2003. Elle a été commercialisée d''abord en 3 et 5 portes, puis est arrivée en fin de cette même année, le coupé cabriolet pour remplacer la Renault Mégane I cabriolet, le break et la version tricorps. En 2004 est apparu la version sportive RS (pour Renault Sport) avec le « moteur F » de type F4RT. La Mégane II a été restylée en 2006, à ce moment, de nouveau moteurs sont apparus, notamment, en Diesel, ou le 1,9 dCi est passée de 120 à 130 ch et est apparu un 2,0 dCi d''une puissance de 150 ch. En 2007, est apparu une nouvelle version sportive, moins puissante que la RS, mais avec un aspect radicalement sportif : La Mégane GT. La Renault Mégane II a été remplacée en octobre 2008 par la Renault Mégane III.', 4, 1, 3, 0, 1, 13, 1),
(2, 'Audi R8', '2015-06-19 06:25:27', '', 4, 4, 3, 1, 1, 2, 1),
(3, 'Imprimante Photo Epson Xp-600', '2015-06-19 08:40:55', 'L''imprimante multifonction Epson Expression Premium XP-600 offre une solution compacte, rapide et simple d''emploi. Adaptée pour les impressions, numérisations et copies du quotidien, elle est équipée notamment du WiFi et de fonctions d''impressions sans fil bien pratiques !', 9, 8, 3, 0, 1, 1, 1),
(4, 'MacBook Air 13 pouces core i5', '2015-06-19 08:40:55', '', 9, 7, 3, 0, 1, 1, 1),
(5, 'Iphone 5c', '2015-06-19 09:44:14', '', 10, 3, 3, 1, 1, 5, 1),
(6, 'Samsung Galaxy S6 32GO Blanc neuf débloqué', '2015-06-19 08:44:14', '', 10, NULL, 3, 1, 0, 1, 1),
(7, 'PC de bureau ASUS', '2015-08-01 10:26:08', 'Un ordinateur aux performances stables, offrant un divertissement de qualité : affichage haute définition, ports HDMI et USB 3.0 et grande capacité de stockage.', 9, 5, 3, 1, 1, 4, 1);

<fin>

CREATE TABLE IF NOT EXISTS `articles_specifications` (
  `article_specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL,
  PRIMARY KEY (`article_specification_id`),
  KEY `article_id` (`article_id`),
  KEY `specification_id` (`specification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

<fin>

INSERT INTO `articles_specifications` (`article_specification_id`, `article_id`, `specification_id`, `visible`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);


<fin>


CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_category` int(11) NOT NULL,
  `category_label` varchar(45) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

<fin>

INSERT INTO `categories` (`category_id`, `parent_category`, `category_label`, `slug`) VALUES
(1, 0, 'Vehicules', 'vehicules'),
(2, 0, 'Immobilier', 'immobilier'),
(3, 0, 'Multimedia', 'multimedia'),
(4, 1, 'Voitures', 'voitures'),
(5, 1, 'Motos', 'motos'),
(6, 2, 'Ventes immobilières', 'ventes-immoblieres'),
(7, 2, 'Locations', 'locations'),
(8, 2, 'Bureaux & Commerces', 'bureaux-commerces'),
(9, 3, 'Informatique', 'informatique'),
(10, 3, 'Téléphonie', 'telephones'),
(11, 3, 'Image & Son', 'image-et-son'),
(12, 3, 'Jeux', 'jeux'),
(13, 3, 'DVD et Blu-ray', 'dvd-et-blu-ray'),
(16, 0, 'Vacances', 'vacances');

<fin>

CREATE TABLE IF NOT EXISTS `command` (
  `command_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`command_id`),
  KEY `user_id` (`user_id`),
  KEY `adress_id` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

<fin>

INSERT INTO `command` (`command_id`, `user_id`, `address_id`, `created_at`) VALUES
(1, 4, 5, '2015-08-23 19:43:54'),
(2, 4, 5, '2015-08-23 20:26:14');

<fin>

CREATE TABLE IF NOT EXISTS `command_lines` (
  `command_lines_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `command_id` int(11) NOT NULL,
  `user_article_id` int(11) NOT NULL,
  PRIMARY KEY (`command_lines_id`),
  KEY `command_id` (`command_id`),
  KEY `user_article_id` (`user_article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

<fin>

INSERT INTO `command_lines` (`command_lines_id`, `quantity`, `price`, `command_id`, `user_article_id`) VALUES
(1, 1, 1000, 1, 5),
(2, 3, 1500, 1, 6),
(3, 2, 1100, 2, 4);


<fin>

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_new` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`comment_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

<fin>

INSERT INTO `comments` (`comment_id`, `article_id`, `pseudo`, `comment_text`, `is_published`, `created_at`, `is_new`) VALUES
(1, 1, 'rosa21', 'c''est ma voiture préférée !j''aime trooooooop !c''est ma voiture préférée !j''aime trooooooop !c''est ma voiture préférée !j''aime trooooooop !c''est ma voiture préférée !j''aime trooooooop !c''est ma voiture préférée !j''aime trooooooop !c''est ma voiture préférée !j''aime trooooooop !', 0, '2015-08-14 15:16:04', 1),
(2, 1, 'damien_du_59', 'Moi qui a toujours acheté les caisses allemandes, je la trouve pluôt pas mal.', 1, '2015-08-14 15:16:04', 1),
(3, 1, 'Christophe', 'Non, ce n''est pas à mon goût', 1, '2015-08-14 15:19:07', 1),
(5, 1, 'pseudo1', 'ceci est un commentaire de pseudo1', 1, '2015-08-16 00:21:14', 1);

<fin>

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_label` varchar(45) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `size` int(11) NOT NULL,
  `format` varchar(45) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

<fin>


INSERT INTO `images` (`image_id`, `image_label`, `image_path`, `size`, `format`, `height`, `width`) VALUES
(1, 'Renault', './assets/img/upload/871055a8b3f9dcd0a.jpg', 620888, 'jpg', 768, 1024),
(2, 'logo', './assets/img/logo.png', 0, 'png', 119, 300),
(3, 'iPhone 5c', './assets/img/upload/iphone_5_c.jpg', 0, 'jpg', 0, 0),
(4, 'Audi R8', './assets/img/upload/audi_r_8.jpg', 0, 'jpg', 0, 0),
(5, 'PC de bureau asus', './assets/img/upload/pc_bureau_asus.jpg', 0, 'jpg', 0, 0),
(6, 'Mercedes cls', './assets/img/upload/mercedes_csl', 0, 'jpg', 0, 0),
(7, 'Macbook air', './assets/img/upload/macbook_air.jpg', 0, 'jpg', 0, 0),
(8, 'Imprimante Epson', './assets/img/upload/imprimante_epson.jpg', 0, 'jpg', 0, 0);

<fin>

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '1',
  `mail_sender` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender` (`sender`),
  KEY `reveiver` (`receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

<fin>

INSERT INTO `messages` (`message_id`, `title`, `content`, `date`, `sender`, `receiver`, `is_new`, `mail_sender`) VALUES
(1, 'Problème lors de la procédure d''achat', 'Bonjour,\r\n\r\nJ''ai eu un problème lors d''achat d''une blouse blanche dont le prix est 50 euros.\r\nEn effet, au moment de payement le prix affiché était de 70 euros', '2015-07-21 11:50:35', 5, 4, 0, NULL),
(8, 'Un sujet quelconque', 'Voici un test en développement', '2015-07-31 14:50:18', 5, 6, 1, NULL),
(9, 'test de telemaque', 'Voici un message de test.\r\n\r\nvoici quelques caractères spéciaux : é ;  à ; $ ; ç', '2015-07-31 15:08:53', 5, 6, 0, NULL),
(10, 'Un sujet de programmation', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique', '2015-07-31 15:13:37', NULL, 6, 1, 'internaute_lamba@gmail.com'),
(11, 'test de telemaque', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique', '2015-07-31 15:16:08', 5, 6, 0, NULL),
(12, 'test de telemaque', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique', '2015-07-31 15:21:35', 5, 6, 0, NULL),
(13, 'Un sujet de programmation', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique', '2015-07-31 15:23:24', 5, 6, 0, NULL),
(14, 'Un sujet de programmation', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique', '2015-07-31 15:42:53', NULL, 6, 0, 'anonymous@gmail.com');

<fin>

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_label` varchar(255) NOT NULL,
  `module_status` tinyint(4) NOT NULL DEFAULT '0',
  `module_description` varchar(255) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

<fin>

INSERT INTO `modules` (`module_id`, `module_label`, `module_status`, `module_description`) VALUES
(1, 'slide_show', 1, 'Ce module vous permet de mettre en avant certaines informations comme des nouveaux articles, des nouvelles offres...'),
(2, 'commentaires produits', 0, 'Ce module permettra à vos utilisateurs de donner des avis sur les articles mises en vente.');

<fin>

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_label` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

<fin>

INSERT INTO `role` (`role_id`, `role_label`) VALUES
(1, 'ROLE_SUPER_ADMIN'),
(2, 'ROLE_ADMIN'),
(3, 'ROLE_USER');

<fin>

CREATE TABLE IF NOT EXISTS `site_identity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` int(11) NOT NULL,
  `cgv` text NOT NULL,
  `legal_notice` text NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logo` (`logo`),
  KEY `logo_2` (`logo`),
  KEY `address_id` (`address_id`),
  KEY `address_id_2` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

<fin>

INSERT INTO `site_identity` (`id`, `site_name`, `slogan`, `logo`, `cgv`, `legal_notice`, `twitter`, `facebook`, `google_plus`, `address_id`, `phone`) VALUES
(1, 'MaBelleBoutique', 'Un joli slogan', 2, '<h3><span style="color: #ff0000;"><em>aaabbbs</em></span></h3>', '<p style="text-align: center;"><strong><span style="color: #008000;">zefzefz</span></strong><span style="color: #ff00ff;">e</span></p>', 'https://twitter.com/messi10stats', 'https://www.facebook.com/LeoMessi', 'https://plus.google.com/108000335759818964396/posts', 1, '0102030406');

<fin>

CREATE TABLE IF NOT EXISTS `specifications` (
  `specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `specification_label` varchar(45) NOT NULL,
  `specification_value` varchar(250) DEFAULT NULL,
  `user_article_id` int(11) DEFAULT NULL,
  `required` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`specification_id`),
  KEY `user_article_id` (`user_article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

<fin>

INSERT INTO `specifications` (`specification_id`, `specification_label`, `specification_value`, `user_article_id`, `required`) VALUES
(1, 'couleur', 'rouge', 5, 0),
(2, 'age', '2 ans', 5, 0);


<fin>

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(45) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

<fin>

INSERT INTO `tags` (`tag_id`, `tag_label`) VALUES
(1, 'tag1'),
(2, 'tag2');

<fin>

CREATE TABLE IF NOT EXISTS `tags_articles` (
  `tag_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_article_id`),
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`),
  KEY `tag_id_2` (`tag_id`),
  KEY `article_id_2` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

<fin>

INSERT INTO `tags_articles` (`tag_article_id`, `article_id`, `tag_id`) VALUES
(1, 2, 1),
(3, 1, 1),
(4, 4, 1),
(5, 3, 2);

<fin>

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_surname` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `born_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `last_connection_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

<fin>

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `login`, `password`, `born_at`, `created_at`, `updated_at`, `phone`, `mobile`, `mail`, `ip_address`, `last_connection_date`, `status`, `title`, `description`, `role_id`, `is_new`) VALUES
(3, 'Ip', 'Ajy', 'superadmin', '889a3a791b3875cfae413574b53da4bb8a90d53e', '1990-09-04', '2015-06-18 12:44:07', '2015-08-21 08:50:58', '0102030405', '0605040302', 'superadmin@yahoo.fr', '::1', '2015-08-21', 1, NULL, NULL, 1, 0),
(4, 'matux', 'loco', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1990-02-05', '2015-06-18 12:44:07', '2015-09-08 07:16:30', '0101010101', '0601010101', 'superadmin@yahoo.fr', '::1', '2015-09-08', 1, NULL, NULL, 2, 0),
(5, 'claude', 'parrot', 'user', '12dea96fec20593566ab75692c9949596833adc9', '1988-01-20', '2015-06-18 12:45:43', '2015-08-14 15:24:17', '0102020202', '0602020202', 'user@yahoo.fr', '::1', '2015-08-14', 1, NULL, NULL, 3, 0),
(6, 'messi', 'lionel', 'messi', 'b58e6693e0ba007ce2f9e152c4cf19dd5cdbbad6', '2000-07-15', '2015-07-22 09:53:20', '2015-08-12 13:43:31', '', '', 'charrad.amine@yahoo.fr', '', '0000-00-00', 1, 'Webmaster', 'Pour tout problème technique qui se déroule sur ce site', 2, 0),
(7, 'zidane', 'zinedine', 'zizou', 'b684dd15ef7bd117b0aa364edc2cefce095a8ad3', '1970-07-14', '2015-07-22 09:53:20', '2015-08-13 09:58:14', '', '', 'yoniattlane555@gmail.com', '::1', '2015-08-11', 1, 'Service consommateur', 'pour toute question à propos d''un produit, d''une commande...', 2, 0),
(14, 'MonNom', 'MonPrénom', 'user2', '7384f8b17d67b6e8498b363d8df08a5dd021a2d3', '1990-02-11', '2015-08-03 09:31:33', '2015-08-13 09:59:18', '0102030405', '0605040302', 'user2@yahoo.fr', '', '0000-00-00', 0, NULL, NULL, 3, 0),
(16, 'SimpleNom', 'SimplePrénom', 'un_simple_user', '449b41795731e6d132b93ec2d63b31cd4f608477', '2000-08-12', '2015-08-12 15:19:28', '2015-08-20 10:33:56', '0102030405', '0605040302', 'simple_mail@yahoo.fr', '::1', '2015-08-12', 0, NULL, NULL, 3, 0);

<fin>

CREATE TABLE IF NOT EXISTS `users_articles` (
  `user_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'waiting',
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_article_id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

<fin>

INSERT INTO `users_articles` (`user_article_id`, `quantity`, `title`, `description`, `status`, `price`, `created_at`, `updated_at`, `state`, `article_id`, `user_id`, `image_id`, `is_verified`) VALUES
(3, 1, 'Audi RT intérieur cuir beige', 'Vends ma AudiRT (automatique palette volant) 2L tfsi noir très entretenue \r\n17 900 euros (négociable raisonnablement )\r\n\r\n- 50 000km\r\n-cuir alcantara beige claire\r\n-boite séquentiel volant S tronic\r\n-volant meplat audit sport\r\n-clin multi zone \r\n-vitre électrique\r\n-rétro électrique rétractable\r\n-jante rs6 19pouce\r\n-autoradio DVD GPS 7 pouce tactile bluetooth kit main libre "android 4.4.2" blutooth, wifi ,mp3 ,8 go, slot micro sd \r\n-son concert Audi 12 enceintes (10 enceintes +caisson +centrale) \r\n-CT Ok vierge!\r\n-Révision Audi Ok ( facture) plaquettes neuves !', 'in progress', 70900, '2015-06-23 14:54:29', NULL, NULL, 2, 4, NULL, 1),
(4, 2, 'iPhone 5c noir', 'Je mets en vente mon iPhone 5c noir\r\n\r\n16 g\r\n\r\nDesimlocke.\r\n\r\nIl est en excellent état.\r\n\r\nJe fournis boîte et facture.\r\n\r\n550 si vente aujourd''hui !!\r\n\r\n\r\nCause de la vente : je veux acheter le Samsung s6 edge\r\n', 'in progress', 550, '2015-06-23 14:50:29', NULL, NULL, 5, 4, NULL, 1),
(5, 1, 'renault twingo 1.2L pack clim du 10/06/97CTok du 22/06/2015', ' \r\nles freins ARR + les roulements ont été changés au mois de mars  2015(facture de 255 euro)\r\nle kit distri + P A E + ventilation + résistance changée a  168000 kms le 04/06/2015(facture de 345 euro)\r\nle verni se décolle un peu sur le toit\r\naucune négociation le jour de la vente\r\nvoiture à prendre dans l''état après son passage au CT qui\r\n a été fait le 22/06/2015 avec  2 défauts sans contre visite\r\n1er défaut:un soufflet de crémaillère\r\n2 ème défaut:absence de plaque constructeur', 'in progress', 1000, '2015-07-17 14:17:38', NULL, 1, 1, 3, NULL, 1),
(6, 8, 'iPhone 5c Blanc', 'A saisir des iPhones 5C blancs desmilockés en bon état', 'in progress', 500, '2015-08-21 10:47:47', NULL, NULL, 5, 3, NULL, 1);

<fin>

ALTER TABLE `address`
  ADD CONSTRAINT `fk_adress_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

<fin>

ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_articles_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`),
  ADD CONSTRAINT `fk_articles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

<fin>

ALTER TABLE `articles_specifications`
  ADD CONSTRAINT `fk_articles_specifications_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_articles_specifications_specification_id` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`specification_id`);

<fin>
ALTER TABLE `command`
  ADD CONSTRAINT `fk_command_adress_id` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `fk_command_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

<fin>
ALTER TABLE `command_lines`
  ADD CONSTRAINT `fk_comande_lines_user_article_id` FOREIGN KEY (`user_article_id`) REFERENCES `users_articles` (`user_article_id`),
  ADD CONSTRAINT `fk_command_lines_command_id` FOREIGN KEY (`command_id`) REFERENCES `command` (`command_id`);

<fin>
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_article_id` FOREIGN KEY (`comment_id`) REFERENCES `articles` (`article_id`);

<fin>
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_message_receiver` FOREIGN KEY (`receiver`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_message_sender` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`);

<fin>
ALTER TABLE `site_identity`
  ADD CONSTRAINT `fk_site_configurations_image_id` FOREIGN KEY (`logo`) REFERENCES `images` (`image_id`);

<fin>
ALTER TABLE `specifications`
  ADD CONSTRAINT `fk_specifications_user_article_id` FOREIGN KEY (`user_article_id`) REFERENCES `users_articles` (`user_article_id`);


<fin>
ALTER TABLE `tags_articles`
  ADD CONSTRAINT `fk_tags_articles_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_tags_articles_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

<fin>
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

<fin>
ALTER TABLE `users_articles`
  ADD CONSTRAINT `fk_users_articles_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_users_articles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_user_articles_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`);

