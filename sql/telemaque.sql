-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 24 Juin 2015 à 17:33
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `telemaque`
--
CREATE DATABASE IF NOT EXISTS `telemaque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `telemaque`;

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_label` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `category_id` (`category_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`article_id`, `article_label`, `created_at`, `category_id`, `image_id`) VALUES
(1, 'Renault twingo', '2015-06-19 08:39:18', 1, NULL),
(2, 'Audi TT', '2015-06-19 08:39:18', 1, NULL),
(3, 'Imprimante Photo Epson', '2015-06-19 08:40:55', 9, NULL),
(4, 'MacBook Air 13 pouces core i5', '2015-06-19 08:40:55', 9, NULL),
(5, 'Iphone 6', '2015-06-19 08:44:14', 10, NULL),
(6, 'Samsung Galaxy S6 32GO Blanc neuf débloqué', '2015-06-19 08:44:14', 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articles_specifications`
--

CREATE TABLE `articles_specifications` (
  `article_specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  PRIMARY KEY (`article_specification_id`),
  KEY `article_id` (`article_id`),
  KEY `specification_id` (`specification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_category` int(11) NOT NULL,
  `category_label` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_category`, `category_label`) VALUES
(1, 0, 'VEHICULES'),
(2, 0, 'IMMOBILIER'),
(3, 0, 'MULTIMEDIA'),
(4, 1, 'Voitures'),
(5, 1, 'Motos'),
(6, 2, 'Ventes immobilières'),
(7, 2, 'Locations'),
(8, 2, 'Bureaux & Commerces'),
(9, 3, 'Informatique'),
(10, 3, 'Téléphonie'),
(11, 3, 'Image & Son'),
(12, 3, 'Jeux'),
(13, 3, 'DVD et Blu-ray');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `command_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`command_id`),
  KEY `user_id` (`user_id`),
  KEY `adress_id` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `command_lines`
--

CREATE TABLE `command_lines` (
  `command_lines_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `command_id` int(11) NOT NULL,
  `user_article_id` int(11) NOT NULL,
  PRIMARY KEY (`command_lines_id`),
  KEY `command_id` (`command_id`),
  KEY `user_article_id` (`user_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_label` varchar(45) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `size` int(11) NOT NULL,
  `format` varchar(45) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_label` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`role_id`, `role_label`) VALUES
(1, 'ROLE_SUPER_ADMIN'),
(2, 'ROLE_ADMIN'),
(3, 'ROLE_USER');

-- --------------------------------------------------------

--
-- Structure de la table `specifications`
--

CREATE TABLE `specifications` (
  `specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `specification_label` varchar(45) NOT NULL,
  `specification_value` varchar(250) NOT NULL,
  `user_article_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`specification_id`),
  KEY `user_article_id` (`user_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(45) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tags_articles`
--

CREATE TABLE `tags_articles` (
  `tag_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_article_id`),
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`),
  KEY `tag_id_2` (`tag_id`),
  KEY `article_id_2` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_surname` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `born_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `login` (`login`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `login`, `password`, `born_at`, `created_at`, `updated_at`, `phone`, `mobile`, `mail`, `role_id`) VALUES
(3, 'Ip', 'Ajy', 'superadmin', 'superadmin', '1990-09-04', '2015-06-18 12:44:07', '2015-06-18 14:44:07', '0102030405', '0605040302', 'superadmin@yahoo.fr', 1),
(4, 'matux', 'loco', 'admin', 'admin', '1990-02-05', '2015-06-18 12:44:07', '2015-06-18 14:44:07', '0101010101', '0601010101', 'admin@yahoo.fr', 2),
(5, 'claude', 'parrot', 'user', 'user', '1988-01-20', '2015-06-18 12:45:43', '2015-06-18 14:45:43', '0102020202', '0602020202', 'user@yahoo.fr', 3),
(6, 'nom1', 'prénom1', 'username1', 'pass', '1983-07-13', '2015-06-25 15:09:56', '0000-00-00 00:00:00', '0102030405', '0605040302', 'test@email.com', 3),
(9, 'nom1', 'prénom1', 'username5', 'pass', '1983-07-13', '2015-06-26 11:44:06', '0000-00-00 00:00:00', '0102030405', '0605040302', 'test5@email.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_articles`
--

CREATE TABLE `users_articles` (
  `user_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_article_id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users_articles`
--

INSERT INTO `users_articles` (`user_article_id`, `quantity`, `description`, `status`, `price`, `created_at`, `updated_at`, `article_id`, `user_id`, `image_id`) VALUES
(3, 1, 'Vends ma Audi TT S-tronic (automatique palette volant) 2L tfsi noir très entretenue \n17 900 euros (négociable raisonnablement )\n\n- 50 000km\n-cuir alcantara beige claire\n-boite séquentiel volant S tronic\n-volant meplat audit sport\n-clin multi zone \n-vitre électrique\n-rétro électrique rétractable\n-jante rs6 19pouce\n-autoradio DVD GPS 7 pouce tactile bluetooth kit main libre "android 4.4.2" blutooth, wifi ,mp3 ,8 go, slot micro sd \n-son concert Audi 12 enceintes (10 enceintes +caisson +centrale) \n-CT Ok vierge!\n-Révision Audi Ok ( facture) plaquettes neuves !', '', 17900, '2015-06-23 14:54:29', NULL, 3, 4, NULL),
(4, 4, '\r\nJe mets en vente mon iPhone 6 noir\r\n\r\n16 g\r\n\r\nDesimlocke.\r\n\r\nIl est en excellent état.\r\n\r\nJe fournis boîte et facture.\r\n\r\n550 si vente aujourd''hui !!\r\n\r\n\r\nCause de la vente : je veux acheter le Samsung s6 edge\r\n', '', 550, '2015-06-23 14:54:29', NULL, 5, 5, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_adress_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_articles_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`);

--
-- Contraintes pour la table `articles_specifications`
--
ALTER TABLE `articles_specifications`
  ADD CONSTRAINT `fk_articles_specifications_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_articles_specifications_specification_id` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`specification_id`);

--
-- Contraintes pour la table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `fk_command_adress_id` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `fk_command_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `command_lines`
--
ALTER TABLE `command_lines`
  ADD CONSTRAINT `fk_comande_lines_user_article_id` FOREIGN KEY (`user_article_id`) REFERENCES `users_articles` (`user_article_id`),
  ADD CONSTRAINT `fk_command_lines_command_id` FOREIGN KEY (`command_id`) REFERENCES `command` (`command_id`);

--
-- Contraintes pour la table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `fk_specifications_user_article_id` FOREIGN KEY (`user_article_id`) REFERENCES `users_articles` (`user_article_id`);

--
-- Contraintes pour la table `tags_articles`
--
ALTER TABLE `tags_articles`
  ADD CONSTRAINT `fk_tags_articles_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_tags_articles_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Contraintes pour la table `users_articles`
--
ALTER TABLE `users_articles`
  ADD CONSTRAINT `fk_users_articles_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `fk_users_articles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_user_articles_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`);
