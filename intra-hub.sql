-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Mai 2016 à 14:21
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `intra-hub`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_events`
--

DROP TABLE IF EXISTS `t_events`;
CREATE TABLE IF NOT EXISTS `t_events` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `url` int(11) DEFAULT NULL,
  `id_event_type` int(11) NOT NULL,
  `color` varchar(6) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `public` tinyint(4) DEFAULT NULL,
  `id_user_creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_events`
--

INSERT INTO `t_events` (`id`, `title`, `start`, `end`, `url`, `id_event_type`, `color`, `deleted`, `public`, `id_user_creator`) VALUES
(1, 'TOTO', '2016-05-04 00:00:00', '2016-05-04 06:00:00', NULL, 1, '00FF00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_events_user`
--

DROP TABLE IF EXISTS `t_events_user`;
CREATE TABLE IF NOT EXISTS `t_events_user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_event_type`
--

DROP TABLE IF EXISTS `t_event_type`;
CREATE TABLE IF NOT EXISTS `t_event_type` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `default_color` varchar(6) NOT NULL DEFAULT '',
  `deleted` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_event_type`
--

INSERT INTO `t_event_type` (`id`, `name`, `description`, `default_color`, `deleted`) VALUES
(1, 'Test1', 'Test1 description', 'FF0000', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_hub_members`
--

DROP TABLE IF EXISTS `t_hub_members`;
CREATE TABLE IF NOT EXISTS `t_hub_members` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `role` text,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_hub_members`
--

INSERT INTO `t_hub_members` (`id`, `id_user`, `role`, `deleted`) VALUES
(1, 1, 'Président', 0),
(2, 2, 'Référent Web', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_pictures`
--

DROP TABLE IF EXISTS `t_pictures`;
CREATE TABLE IF NOT EXISTS `t_pictures` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_projects`
--

DROP TABLE IF EXISTS `t_projects`;
CREATE TABLE IF NOT EXISTS `t_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `main_picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_owner` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `important` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_projects`
--

INSERT INTO `t_projects` (`id`, `name`, `main_picture`, `description`, `short_description`, `id_status`, `id_owner`, `deleted`, `creation_date`, `important`) VALUES
(1, 'An Art Odyssey', 'an_art_odyssey.png', '1.	L’EVENEMENTL’exposition Star Wars l An Art Odyssey est l’évènement de cette fin d’année 2015 dans la Cité Phocéenne. En partenariat avec LucasFilm, ACME Archives, le Poster Posse et la Ville de Marseille, le Café Pixel va proposer une cinquantaine d’illustrations totalement originales lors d’une exposition vente exceptionnelle. A cette occasion, Fitch signe, en partenariat avec l’école Epitech à Marseille, une application en réalité virtuelle totalement inédite !2.	LE PROJET Tim, Marvin et Fabien, 3 étudiants de l’école ont travaillé en étroite collaboration avec Fitch pour concevoir une application « interstellaire! » utilisant la technologie Card Board développé par GOOGLE. Passionnés par l’univers de la Saga Star Wars, ces étudiants ont été séduits par l’idée de développer sur une technologie immersive.3.	LE COTE INNOVANTLes étudiants d’Epitech sont reconnus pour leurs compétences techniques et leur capacité à s’adapter aux dernières évolutions technologiques. Pour l’exposition, Ils ont développé leur application à partir d’une technologie disponible depuis moins d’un an. Suite à la réalisation d’un prototype, les étudiants et les designers ont travaillé sur des données comportant le moins de polygones possibles afin d’optimiser les performances, rendant l’expérience aussi fluide que possible. Tenus à rendre l’application disponible pour le début de l’exposition, les étudiants ont pu développer un projet ambitieux avec un niveau d’exigence professionnel. T', 'Application Immersive - Univers Star Wars.\r\nCette application en réalité virtuelle nous transporte pour un voyage vers de lointaines galaxies. En l’utilisant, les étoiles s’alignent pour créer des personnages inter-galactiques', 2, 1, 0, '2016-03-14 18:08:40', 1),
(2, 'ELEPhant-Migration', 'elephant.png', '1. EN REPONSE A UNE PROBLEMATIQUE\r\nAujourd’hui, les coûts logiciels et de maintenance liés aux bases de données sont de plus en plus élevés pour les entreprises notamment avec les solutions que proposent Oracle ou Microsoft.\r\n\r\n2. L’OFFRE DU PROJET\r\nPour réduite ses coûts, Elephant-Migration propose aux entreprises qui disposent d’une base de données Oracle ou SQL Server de migrer vers une base PostgreSQL (qui est une solution gratuite).\r\n\r\n\r\n3. LE COTE INNOVANT\r\nNotre projet propose plus qu’une simple copie de données à nos utilisateurs . Il permet notamment de transférer les profils de configuration, les utilisateurs, les triggers, les procédures stockées ainsi que les scripts personnels tout en gardant la même arborescence présente sur la base initiale. \r\n4. ORGANISATION\r\nCe projet s’inscrit dans l’Epitech Innovative Project (EIP) qui a pour vocation de créer un produit commercialisable à la fin de deux années de développement (notamment de la 3e à la 5e année du cursus d’EPITECH).\r\nNotre groupe est composé de six étudiants de 3e année appartenant au campus d’Epitech Marseille, d’Epitech Lyon et d’Epitech Nice.  ', 'Migration de base de donnees', 2, 1, 0, '2016-03-14 18:54:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_status`
--

DROP TABLE IF EXISTS `t_status`;
CREATE TABLE IF NOT EXISTS `t_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_right` int(11) DEFAULT NULL,
  `id_picture` varchar(255) NOT NULL DEFAULT '',
  `facebook` int(11) DEFAULT NULL,
  `gplus` int(11) DEFAULT NULL,
  `twitter` int(11) DEFAULT NULL,
  `linkedin` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`id_picture`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_users`
--

INSERT INTO `t_users` (`id`, `username`, `password`, `user_right`, `id_picture`, `facebook`, `gplus`, `twitter`, `linkedin`, `deleted`) VALUES
(1, 'cristi_t', '4c1de1acdcf00f2f05056660c34d466a1f203f8d', 42, '', NULL, NULL, NULL, NULL, 0),
(2, 'cristi_b', '2811193075f30930ee3a0551ef2b4952959ef3d4', 0, '', NULL, NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
