-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Mars 2016 à 18:52
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `numLicence` int(12) NOT NULL,
  `Nom` varchar(50) NOT NULL COMMENT 'Nom de adhérent',
  `Prenom` varchar(50) NOT NULL COMMENT 'Prénom adhérent',
  `dateNaissance` date DEFAULT NULL COMMENT 'Date de Naissance adhérent',
  `idClub` int(11) NOT NULL COMMENT 'identifiant du club auquel adhérent est inscrit',
  `idDemandeur` int(11) NOT NULL COMMENT 'identifiant du demandeur de note de frais',
  `id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `FK_adherent_idClub_idx` (`idClub`) COMMENT 'Clé étrangère reliant un adhérent à son club',
  KEY `FK_adherent_idDemandeur_idx` (`idDemandeur`) COMMENT 'Clé étrangère reliant un adhérent à un demandeur de frais'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`numLicence`, `Nom`, `Prenom`, `dateNaissance`, `idClub`, `idDemandeur`, `id`) VALUES
(654654654, 'test', 'test', '2005-12-30', 1, 1, 1),
(2147483647, 'Bouetard', 'Kévin', '1995-05-16', 13, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `idClub` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id unique du club',
  `Nom` varchar(45) NOT NULL COMMENT 'Nom du club',
  `Adresse` varchar(250) NOT NULL COMMENT 'Adresse du club',
  `CP` int(5) NOT NULL COMMENT 'Code Postal du Club',
  `Ville` varchar(250) NOT NULL COMMENT 'Ville dans laquelle se situe le Club',
  `Sigle` varchar(45) NOT NULL COMMENT 'Acronyme du Club',
  `NomPresident` varchar(45) NOT NULL COMMENT 'Nom du president du club',
  `ligueAffiliation` varchar(45) NOT NULL COMMENT 'Ligue a laquelle le club est affilié',
  PRIMARY KEY (`idClub`) COMMENT 'Clé primaire de la table'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`idClub`, `Nom`, `Adresse`, `CP`, `Ville`, `Sigle`, `NomPresident`, `ligueAffiliation`) VALUES
(1, 'ChessTeam', '515, Avenue de Echeques', 31500, 'Toulouse', 'CT', 'ChessMan', '4'),
(2, 'fight club', '666, Hollywood', 31500, 'Toulouse', 'FC', 'Brad', '5'),
(11, 'BadPowa', '654654, La ou cest', 31200, 'Toulouse', 'BP', 'BadMan', '3'),
(12, 'HWarang', '654, Saint val', 46000, 'Cahors', 'HW', 'Raim', '1'),
(13, 'TFC', '0, Toulouse', 31000, 'Toulouse', 'TFC', 'TFCMan', '2'),
(14, 'L1', 'L1, Toulouse', 31000, 'Toulouse', 'L1', 'L1Man', '2');

-- --------------------------------------------------------

--
-- Structure de la table `demandeur`
--

DROP TABLE IF EXISTS `demandeur`;
CREATE TABLE IF NOT EXISTS `demandeur` (
  `idDemandeur` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique du demandeur',
  `Nom` varchar(50) NOT NULL COMMENT 'Nom du demandeur',
  `Prenom` varchar(50) NOT NULL COMMENT 'Prenom du demandeur',
  `Rue` varchar(250) NOT NULL COMMENT 'Rue a laquelle habite le demandeur',
  `CP` int(5) NOT NULL COMMENT 'Code postal du demandeur',
  `Ville` varchar(250) NOT NULL COMMENT 'Ville dans laquelle le demandeur habite',
  `AdresseMail` varchar(250) NOT NULL,
  `motDePasse` varchar(250) NOT NULL COMMENT 'Mot de passe qui permet au demandeur de se connecter sur le site de gestion des notes de frais',
  PRIMARY KEY (`idDemandeur`) COMMENT 'Clé primaire de la table'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `demandeur`
--

INSERT INTO `demandeur` (`idDemandeur`, `Nom`, `Prenom`, `Rue`, `CP`, `Ville`, `AdresseMail`, `motDePasse`) VALUES
(1, 'd', 'd', 'd', 31000, 'd', 'd', 'd');

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

DROP TABLE IF EXISTS `indemnite`;
CREATE TABLE IF NOT EXISTS `indemnite` (
  `Annee` int(4) NOT NULL COMMENT 'Année correpondant au tarif kilométrique en vigueur',
  `tarifKilometrique` decimal(5,2) NOT NULL COMMENT 'Tarif Kilométrique en vigueur pour une année donnée',
  PRIMARY KEY (`Annee`) COMMENT 'Clé primaire de la table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignefrais`
--

DROP TABLE IF EXISTS `lignefrais`;
CREATE TABLE IF NOT EXISTS `lignefrais` (
  `idLigne` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique de la ligne de frais',
  `date` date NOT NULL COMMENT 'Date à laquelle la ligne de frais a été ajoutée',
  `trajet` varchar(250) NOT NULL COMMENT 'Description du trajet parcourus, par exemple Toulouse - Montauban',
  `km` int(4) NOT NULL COMMENT 'Kilométrage parcourus lor du déplacement',
  `coutPeage` decimal(5,2) DEFAULT NULL COMMENT 'Coût éventuel dun péage lors dun déplacement',
  `coutRepas` decimal(5,2) DEFAULT NULL COMMENT 'Coût éventuel dun repas',
  `coutHebergement` decimal(5,2) DEFAULT NULL COMMENT 'Coût éventuel dun hebergement',
  `idDemandeur` int(11) NOT NULL COMMENT 'Identifiant du demandeur ayant émis la ligne de frais',
  `idMotif` int(11) NOT NULL COMMENT 'Identifiant du motif de la note de frais',
  `Annee` int(4) NOT NULL COMMENT 'Année en cours lors de lémission de la note de frais',
  `numBordereau` int(11) NOT NULL,
  PRIMARY KEY (`idLigne`) COMMENT 'Clé primaire de la table',
  UNIQUE KEY `idDemandeur_UNIQUE` (`idDemandeur`) COMMENT 'Idenx unique sur la clé primaire',
  KEY `FK_ligneFrais_idDemandeur_idx` (`idDemandeur`) COMMENT 'Clé étrangère reliant la table ligne de frais à celle demandeur',
  KEY `FK_ligneFrais_idMotif_idx` (`idMotif`) COMMENT 'Clé étrangère reliant la table ligne de frais aux motifs',
  KEY `FK_ligneFrais_Annee_idx` (`Annee`) COMMENT 'Clé étrangère reliant la table ligne de frais aux indemnitées'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `id_ligue` bigint(11) NOT NULL,
  `lib_ligue` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ligue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `lib_ligue`) VALUES
(1, 'Ligue de TaeKwonDo'),
(2, 'Ligue de Foot'),
(3, 'Ligue de Badbington'),
(4, 'Ligue d''Echec'),
(5, 'Ligue de Boxe');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `idMotif` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant Unique du motif',
  `libelle` varchar(250) NOT NULL COMMENT 'Libellé donnant une description du motif',
  PRIMARY KEY (`idMotif`) COMMENT 'Clé primaire de la table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `FK_adherent_idDemandeur` FOREIGN KEY (`idDemandeur`) REFERENCES `demandeur` (`idDemandeur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignefrais`
--
ALTER TABLE `lignefrais`
  ADD CONSTRAINT `FK_ligneFrais_Annee` FOREIGN KEY (`Annee`) REFERENCES `indemnite` (`Annee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ligneFrais_idDemandeur` FOREIGN KEY (`idDemandeur`) REFERENCES `demandeur` (`idDemandeur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ligneFrais_idMotif` FOREIGN KEY (`idMotif`) REFERENCES `motif` (`idMotif`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
