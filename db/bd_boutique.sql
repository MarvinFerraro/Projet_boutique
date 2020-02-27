-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 fév. 2020 à 08:13
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` int(11) NOT NULL,
  `weight` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `for_sale` tinyint(4) DEFAULT 1,
  `Categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_Articles_Categories1_idx` (`Categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `price`, `weight`, `image`, `stock`, `for_sale`, `Categories_id`) VALUES
(1, 'CCI Grenoble', 'Voyage à la CCI Grenoble.', 100, 1, 'img/cci_grenoble.jpg', 10, 1, 1),
(2, 'Machu Picchu', 'Voyage au Machu Picchu.', 100, 1, 'img/machu_picchu.jpg', 10, 1, 1),
(3, 'Grande muraille de chine', 'Voyage à la grande muraille de chine.', 10, 0.5, 'img/muraille_de_chine.jpg', 1, 0, 1),
(4, 'Petra', 'Voyage à Petra.', 10, 0.5, 'img/petra.jpg', 1, 1, 1),
(5, 'Pyramides d\'Egypte', 'Voyage en Egypte.', 10, 0.5, 'img/pyramide.jpg', 1, 1, 1),
(6, 'Taj Mahal', 'Voyage au Taj Mahal.', 10, 0.5, 'img/taj_mahal.jpg', 1, 1, 1),
(7, 'Bangkok', 'Voyage à Bangkok.', 13, 0.5, 'img/bangkok.jpg', 0, 1, 2),
(8, 'Chaing Mai', 'Voyage à Chiang Mai.', 13, 0.5, 'img/chiang_mai.jpg', 0, 1, 2),
(9, 'Lampang', 'Voyage à Lampang.', 50, 1.2, 'img/lampang.jpg', 2, 1, 2),
(10, 'Pattaya', 'Voyage à Pattaya.', 50, 1.2, 'img/pattaya.jpg', 2, 1, 2),
(11, 'Levi', 'Voyage à Levi.', 525, 1.2, 'img/levi.jpg', 5, 0, 3),
(12, 'Luosto', 'Voyage à Luosto.', 525, 1.2, 'img/luosto.jpg', 5, 0, 3),
(13, 'Rovaniemi', 'Voyage à Rovaniemi.', 1000, 1.2, 'img/tour_rovaniemi.jpg', 5, 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles_orders`
--

DROP TABLE IF EXISTS `articles_orders`;
CREATE TABLE IF NOT EXISTS `articles_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Articles_id` int(11) NOT NULL,
  `Orders_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Articles_has_Orders_Orders1_idx` (`Orders_id`),
  KEY `fk_Articles_has_Orders_Articles1_idx` (`Articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles_orders`
--

INSERT INTO `articles_orders` (`id`, `Articles_id`, `Orders_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 2),
(7, 2, 3, 1),
(8, 10, 3, 1),
(9, 3, 4, 2),
(11, 13, 4, 1),
(12, 2, 5, 1),
(13, 12, 5, 1),
(14, 1, 6, 1),
(15, 2, 6, 1),
(16, 3, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Discovery'),
(2, 'Summer'),
(3, 'Ophely');

-- --------------------------------------------------------

--
-- Structure de la table `cloth`
--

DROP TABLE IF EXISTS `cloth`;
CREATE TABLE IF NOT EXISTS `cloth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style_cloth` varchar(255) NOT NULL DEFAULT 'Culotte',
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cloth`
--

INSERT INTO `cloth` (`id`, `style_cloth`, `article_id`) VALUES
(1, 'Maillot.', 7),
(2, 'Met ton pull y à de la neige.', 11);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `price` int(11) DEFAULT NULL,
  `total_weight` int(11) DEFAULT NULL,
  `Users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_Orders_Users1_idx` (`Users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `numero`, `date`, `price`, `total_weight`, `Users_id`) VALUES
(1, '15CO', '2020-01-13', 120, 2, 1),
(3, '17CO', '2019-12-08', 150, 2, 2),
(4, '18CO', '2020-02-07', 520, 2, 2),
(5, '19CO', '2020-02-13', 600, 2, 2),
(6, '20CO', '2020-02-14', 210, 2, 2),
(8, 'ML', '2020-02-21', 440, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `shoes`
--

DROP TABLE IF EXISTS `shoes`;
CREATE TABLE IF NOT EXISTS `shoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style_shoe` varchar(255) DEFAULT 'Chaussette',
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shoes`
--

INSERT INTO `shoes` (`id`, `style_shoe`, `article_id`) VALUES
(1, 'Chaussure décath', 3),
(2, 'Claquette Fila', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `postal_code` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `adress`, `postal_code`, `city`) VALUES
(1, 'Chuck Norris', 'chuck.norris@texasranger.com', '25 rue chez toi', 38000, 'Grenoble'),
(2, 'Charlize Theron', 'charlize.theron@elephantman.com', '25 rue chez toi', 38000, 'Grenoble'),
(18, 'Marvin FERRARO', 'issou@live.fr', '25 chez toi', 38000, 'grenoble'),
(21, 'richard', 'richard@live.fr', 'ici', 25303, 'Parlabas'),
(22, 'Baptiste', 'baptiteFaure@torpfaure.daran', 'Faur', 38000, 'Tulin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_Articles_Categories1` FOREIGN KEY (`Categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `articles_orders`
--
ALTER TABLE `articles_orders`
  ADD CONSTRAINT `fk_Articles_has_Orders_Articles1` FOREIGN KEY (`Articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articles_has_Orders_Orders1` FOREIGN KEY (`Orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cloth`
--
ALTER TABLE `cloth`
  ADD CONSTRAINT `cloth_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Orders_Users1` FOREIGN KEY (`Users_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION;

--
-- Contraintes pour la table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
