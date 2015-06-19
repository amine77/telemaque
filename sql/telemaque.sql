-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 19 Juin 2015 à 08:49
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `telemaque`
--
CREATE DATABASE IF NOT EXISTS `telemaque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `telemaque`;

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
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

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_label` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(1, 'Renault twingo', '2015-06-19 10:39:18', 1, NULL),
(2, 'Audi TT', '2015-06-19 10:39:18', 1, NULL),
(3, 'Imprimante Photo Epson', '2015-06-19 10:40:55', 9, NULL),
(4, 'MacBook Air 13 pouces core i5', '2015-06-19 10:40:55', 9, NULL),
(5, 'Iphone 6', '2015-06-19 10:44:14', 10, NULL),
(6, 'Samsung Galaxy S6 32GO Blanc neuf débloqué', '2015-06-19 10:44:14', 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `articles_specifications`
--

CREATE TABLE IF NOT EXISTS `articles_specifications` (
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

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_category` int(11) NOT NULL,
  `category_label` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(11, 3, 'Image & Son');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
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

CREATE TABLE IF NOT EXISTS `command_lines` (
  `command_lines_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `command_id` int(11) NOT NULL,
  PRIMARY KEY (`command_lines_id`),
  KEY `command_id` (`command_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
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

CREATE TABLE IF NOT EXISTS `role` (
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

CREATE TABLE IF NOT EXISTS `specifications` (
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

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(45) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tags_articles`
--

CREATE TABLE IF NOT EXISTS `tags_articles` (
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
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `born_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `born_at`, `created_at`, `updated_at`, `phone`, `mobile`, `mail`, `role_id`) VALUES
(3, 'superadmin', 'superadmin', '1990-09-04', '2015-06-18 12:44:07', '2015-06-18 14:44:07', '0102030405', '0605040302', 'superadmin@yahoo.fr', 1),
(4, 'admin', 'admin', '1990-02-05', '2015-06-18 12:44:07', '2015-06-18 14:44:07', '0101010101', '0601010101', 'superadmin@yahoo.fr', 2),
(5, 'user', 'user', '1988-01-20', '2015-06-18 12:45:43', '2015-06-18 14:45:43', '0102020202', '0602020202', 'user@yahoo.fr', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_articles`
--

CREATE TABLE IF NOT EXISTS `users_articles` (
  `user_article_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_article_id`),
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_articles_specifications_specification_id` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`specification_id`),
  ADD CONSTRAINT `fk_articles_specifications_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

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
  ADD CONSTRAINT `fk_tags_articles_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `fk_tags_articles_article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
