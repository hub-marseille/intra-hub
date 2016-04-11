# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# H�te: localhost (MySQL 5.5.42)
# Base de donn�es: intra-hub
# Temps de g�n�ration: 2016-04-11 08:51:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table t_hub_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_hub_members`;

CREATE TABLE `t_hub_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `role` text,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_hub_members` WRITE;
/*!40000 ALTER TABLE `t_hub_members` DISABLE KEYS */;

INSERT INTO `t_hub_members` (`id`, `id_user`, `role`, `deleted`)
VALUES
	(1,1,'Président',0);

/*!40000 ALTER TABLE `t_hub_members` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table t_pictures
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_pictures`;

CREATE TABLE `t_pictures` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table t_projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_projects`;

CREATE TABLE `t_projects` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_projects` WRITE;
/*!40000 ALTER TABLE `t_projects` DISABLE KEYS */;

INSERT INTO `t_projects` (`id`, `name`, `main_picture`, `description`, `short_description`, `id_status`, `id_owner`, `deleted`, `creation_date`, `important`)
VALUES
	(1,'An Art Odyssey','an_art_odyssey.png','1.	L’EVENEMENTL’exposition Star Wars l An Art Odyssey est l’évènement de cette fin d’année 2015 dans la Cité Phocéenne. En partenariat avec LucasFilm, ACME Archives, le Poster Posse et la Ville de Marseille, le Café Pixel va proposer une cinquantaine d’illustrations totalement originales lors d’une exposition vente exceptionnelle. A cette occasion, Fitch signe, en partenariat avec l’école Epitech à Marseille, une application en réalité virtuelle totalement inédite !2.	LE PROJET Tim, Marvin et Fabien, 3 étudiants de l’école ont travaillé en étroite collaboration avec Fitch pour concevoir une application « interstellaire! » utilisant la technologie Card Board développé par GOOGLE. Passionnés par l’univers de la Saga Star Wars, ces étudiants ont été séduits par l’idée de développer sur une technologie immersive.3.	LE COTE INNOVANTLes étudiants d’Epitech sont reconnus pour leurs compétences techniques et leur capacité à s’adapter aux dernières évolutions technologiques. Pour l’exposition, Ils ont développé leur application à partir d’une technologie disponible depuis moins d’un an. Suite à la réalisation d’un prototype, les étudiants et les designers ont travaillé sur des données comportant le moins de polygones possibles afin d’optimiser les performances, rendant l’expérience aussi fluide que possible. Tenus à rendre l’application disponible pour le début de l’exposition, les étudiants ont pu développer un projet ambitieux avec un niveau d’exigence professionnel. T','Application Immersive - Univers Star Wars.\r\nCette application en réalité virtuelle nous transporte pour un voyage vers de lointaines galaxies. En l’utilisant, les étoiles s’alignent pour créer des personnages inter-galactiques',2,1,0,'2016-03-14 19:08:40',1),
	(2,'ELEPhant-Migration','elephant.png','1. EN REPONSE A UNE PROBLEMATIQUE\r\nAujourd’hui, les coûts logiciels et de maintenance liés aux bases de données sont de plus en plus élevés pour les entreprises notamment avec les solutions que proposent Oracle ou Microsoft.\r\n\r\n2. L’OFFRE DU PROJET\r\nPour réduite ses coûts, Elephant-Migration propose aux entreprises qui disposent d’une base de données Oracle ou SQL Server de migrer vers une base PostgreSQL (qui est une solution gratuite).\r\n\r\n\r\n3. LE COTE INNOVANT\r\nNotre projet propose plus qu’une simple copie de données à nos utilisateurs . Il permet notamment de transférer les profils de configuration, les utilisateurs, les triggers, les procédures stockées ainsi que les scripts personnels tout en gardant la même arborescence présente sur la base initiale. \r\n4. ORGANISATION\r\nCe projet s’inscrit dans l’Epitech Innovative Project (EIP) qui a pour vocation de créer un produit commercialisable à la fin de deux années de développement (notamment de la 3e à la 5e année du cursus d’EPITECH).\r\nNotre groupe est composé de six étudiants de 3e année appartenant au campus d’Epitech Marseille, d’Epitech Lyon et d’Epitech Nice.  ','Migration de base de donnees',2,1,0,'2016-03-14 19:54:54',1);

/*!40000 ALTER TABLE `t_projects` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table t_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_status`;

CREATE TABLE `t_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table t_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_users`;

CREATE TABLE `t_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_users` WRITE;
/*!40000 ALTER TABLE `t_users` DISABLE KEYS */;

INSERT INTO `t_users` (`id`, `username`, `password`, `user_right`, `id_picture`, `facebook`, `gplus`, `twitter`, `linkedin`, `deleted`)
VALUES
	(1,'cristi_t','4c1de1acdcf00f2f05056660c34d466a1f203f8d',0,'',NULL,NULL,NULL,NULL,0);

/*!40000 ALTER TABLE `t_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
