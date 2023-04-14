-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 13 avr. 2023 à 19:29
-- Version du serveur :  8.0.18
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
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `couleurkb`
--

DROP TABLE IF EXISTS `couleurkb`;
CREATE TABLE IF NOT EXISTS `couleurkb` (
  `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT,
  `couleurkb` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `couleurkb`
--

INSERT INTO `couleurkb` (`ID_COULEUR`, `couleurkb`) VALUES
(1, 'Blanc'),
(2, 'Noir'),
(3, 'Rouge'),
(4, 'Bleu');

-- --------------------------------------------------------

--
-- Structure de la table `couleurled`
--

DROP TABLE IF EXISTS `couleurled`;
CREATE TABLE IF NOT EXISTS `couleurled` (
  `ID_COULED` int(11) NOT NULL AUTO_INCREMENT,
  `couleurled` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULED`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `couleurled`
--

INSERT INTO `couleurled` (`ID_COULED`, `couleurled`) VALUES
(1, 'Rouge'),
(2, 'Vert'),
(3, 'Bleu'),
(4, 'Marron'),
(5, 'NON');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID_PANIER` int(11) NOT NULL AUTO_INCREMENT,
  `Quantite` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_KB` int(11) NOT NULL,
  PRIMARY KEY (`ID_PANIER`),
  KEY `PANIER_USER_FK` (`ID_USER`),
  KEY `PANIER_Produit0_FK` (`ID_KB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ID_KB` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(15,2) NOT NULL,
  `description` text NOT NULL,
  `paveNum` tinyint(1) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `cable` tinyint(1) NOT NULL,
  `RGB` tinyint(1) NOT NULL,
  `ID_COULEUR` int(11) NOT NULL,
  `ID_COULED` int(11) NOT NULL,
  `ID_SWITCH` int(11) NOT NULL,
  PRIMARY KEY (`ID_KB`),
  KEY `Produit_CouleurKB_FK` (`ID_COULEUR`),
  KEY `Produit_CouleurLED0_FK` (`ID_COULED`),
  KEY `Produit_Switch1_FK` (`ID_SWITCH`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_KB`, `nom`, `prix`, `description`, `paveNum`, `taille`, `cable`, `RGB`, `ID_COULEUR`, `ID_COULED`, `ID_SWITCH`) VALUES
(1, 'CLEAR 2048 PURPLE', '115.99', 'Touche silencieuse, souris / clavier sans fil très bien.\r\nPratique au quotidien pour le travail', 1, '14 x 50 cm', 0, 0, 2, 5, 1),
(2, 'NEWMEN GM610', '40.00', 'WOW elle est blanche. Merci beaucoup maitre !', 1, '16 / 54 cm', 1, 0, 2, 3, 1),
(3, 'GK64XS', '100.00', 'Caramba encore raté', 1, '20 x 60 cm', 0, 1, 2, 3, 1),
(4, 'AKKO 3068B', '35.00', 'Oui Oui Oui vous saurez tous sur le flamby', 1, '13.50cm', 1, 3, 2, 5, 1),
(5, 'AKKO 3098D PRUNE', '31.00', 'Alakazam Abrava Decabra', 0, '16x52cm', 1, 0, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `switch`
--

DROP TABLE IF EXISTS `switch`;
CREATE TABLE IF NOT EXISTS `switch` (
  `ID_SWITCH` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(50) NOT NULL,
  `Fabriquant` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_SWITCH`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `switch`
--

INSERT INTO `switch` (`ID_SWITCH`, `modele`, `Fabriquant`, `couleur`) VALUES
(1, 'Razer A10', 'Razer', 'Marron');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `dateden` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `nom`, `prenom`, `mdp`, `adresse`, `dateden`, `mail`) VALUES
(1, 'Damien', 'Damien', 'Damien.1', 'DamienVille', '2006-06-06', 'Damien@Damien.dam');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `PANIER_Produit0_FK` FOREIGN KEY (`ID_KB`) REFERENCES `produit` (`ID_KB`),
  ADD CONSTRAINT `PANIER_USER_FK` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_CouleurKB_FK` FOREIGN KEY (`ID_COULEUR`) REFERENCES `couleurkb` (`ID_COULEUR`),
  ADD CONSTRAINT `Produit_CouleurLED0_FK` FOREIGN KEY (`ID_COULED`) REFERENCES `couleurled` (`ID_COULED`),
  ADD CONSTRAINT `Produit_Switch1_FK` FOREIGN KEY (`ID_SWITCH`) REFERENCES `switch` (`ID_SWITCH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
