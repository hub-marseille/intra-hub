-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 04:28 AM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intra-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_projects`
--

CREATE TABLE IF NOT EXISTS `t_projects` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `main_picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_owner` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `important` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_projects`
--

INSERT INTO `t_projects` (`id`, `name`, `main_picture`, `description`, `short_description`, `id_status`, `id_owner`, `deleted`, `creation_date`, `important`) VALUES
(1, 'An Art Odyssey', 'an_art_odyssey.png', '1.	L’EVENEMENTL’exposition Star Wars l An Art Odyssey est l’évènement de cette fin d’année 2015 dans la Cité Phocéenne. En partenariat avec LucasFilm, ACME Archives, le Poster Posse et la Ville de Marseille, le Café Pixel va proposer une cinquantaine d’illustrations totalement originales lors d’une exposition vente exceptionnelle. A cette occasion, Fitch signe, en partenariat avec l’école Epitech à Marseille, une application en réalité virtuelle totalement inédite !2.	LE PROJET Tim, Marvin et Fabien, 3 étudiants de l’école ont travaillé en étroite collaboration avec Fitch pour concevoir une application « interstellaire! » utilisant la technologie Card Board développé par GOOGLE. Passionnés par l’univers de la Saga Star Wars, ces étudiants ont été séduits par l’idée de développer sur une technologie immersive.3.	LE COTE INNOVANTLes étudiants d’Epitech sont reconnus pour leurs compétences techniques et leur capacité à s’adapter aux dernières évolutions technologiques. Pour l’exposition, Ils ont développé leur application à partir d’une technologie disponible depuis moins d’un an. Suite à la réalisation d’un prototype, les étudiants et les designers ont travaillé sur des données comportant le moins de polygones possibles afin d’optimiser les performances, rendant l’expérience aussi fluide que possible. Tenus à rendre l’application disponible pour le début de l’exposition, les étudiants ont pu développer un projet ambitieux avec un niveau d’exigence professionnel. T', 'Application Immersive - Univers Star Wars.\r\nCette application en réalité virtuelle nous transporte pour un voyage vers de lointaines galaxies. En l’utilisant, les étoiles s’alignent pour créer des personnages inter-galactiques', 2, 0, 0, '2016-03-14 18:08:40', NULL),
(2, 'ELEPhant-Migration', 'elephant.png', '1. EN REPONSE A UNE PROBLEMATIQUE\r\nAujourd’hui, les coûts logiciels et de maintenance liés aux bases de données sont de plus en plus élevés pour les entreprises notamment avec les solutions que proposent Oracle ou Microsoft.\r\n\r\n2. L’OFFRE DU PROJET\r\nPour réduite ses coûts, Elephant-Migration propose aux entreprises qui disposent d’une base de données Oracle ou SQL Server de migrer vers une base PostgreSQL (qui est une solution gratuite).\r\n\r\n\r\n3. LE COTE INNOVANT\r\nNotre projet propose plus qu’une simple copie de données à nos utilisateurs . Il permet notamment de transférer les profils de configuration, les utilisateurs, les triggers, les procédures stockées ainsi que les scripts personnels tout en gardant la même arborescence présente sur la base initiale. \r\n4. ORGANISATION\r\nCe projet s’inscrit dans l’Epitech Innovative Project (EIP) qui a pour vocation de créer un produit commercialisable à la fin de deux années de développement (notamment de la 3e à la 5e année du cursus d’EPITECH).\r\nNotre groupe est composé de six étudiants de 3e année appartenant au campus d’Epitech Marseille, d’Epitech Lyon et d’Epitech Nice.  ', 'Migration de base de donnees', 2, 0, 0, '2016-03-14 18:54:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE IF NOT EXISTS `t_status` (
`id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_right` int(11) DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_projects`
--
ALTER TABLE `t_projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_status`
--
ALTER TABLE `t_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`picture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_projects`
--
ALTER TABLE `t_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_status`
--
ALTER TABLE `t_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
