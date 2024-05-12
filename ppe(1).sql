-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 11, 2024 at 12:15 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppe`
--

-- --------------------------------------------------------

--
-- Table structure for table `couleurkb`
--

DROP TABLE IF EXISTS `couleurkb`;
CREATE TABLE IF NOT EXISTS `couleurkb` (
  `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT,
  `couleurkb` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `couleurkb`
--

INSERT INTO `couleurkb` (`ID_COULEUR`, `couleurkb`) VALUES
(1, 'Blanc'),
(2, 'Noir'),
(3, 'Rouge'),
(4, 'Bleu');

-- --------------------------------------------------------

--
-- Table structure for table `couleurled`
--

DROP TABLE IF EXISTS `couleurled`;
CREATE TABLE IF NOT EXISTS `couleurled` (
  `ID_COULED` int(11) NOT NULL AUTO_INCREMENT,
  `couleurled` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULED`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `couleurled`
--

INSERT INTO `couleurled` (`ID_COULED`, `couleurled`) VALUES
(1, 'Rouge'),
(2, 'Vert'),
(3, 'Bleu'),
(4, 'Marron'),
(5, 'NON');

-- --------------------------------------------------------

--
-- Table structure for table `dossier_sav`
--

DROP TABLE IF EXISTS `dossier_sav`;
CREATE TABLE IF NOT EXISTS `dossier_sav` (
  `ID_SAV` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text,
  `date` date NOT NULL,
  `ID_KB` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_SAV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`ID_PANIER`, `Quantite`, `ID_USER`, `ID_KB`) VALUES
(29, 4, 2, 19),
(30, 1, 2, 22),
(36, 1, 3, 4),
(37, 4, 3, 5),
(38, 1, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `ID_KB` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(15,2) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '10',
  `description` text NOT NULL,
  `paveNum` tinyint(1) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `cable` tinyint(1) NOT NULL,
  `RGB` tinyint(1) NOT NULL,
  `ID_COULEUR` int(11) NOT NULL,
  `ID_COULED` int(11) NOT NULL,
  `ID_SWITCH` int(11) NOT NULL,
  `promo` decimal(4,0) DEFAULT NULL,
  PRIMARY KEY (`ID_KB`),
  KEY `Produit_CouleurKB_FK` (`ID_COULEUR`),
  KEY `Produit_CouleurLED0_FK` (`ID_COULED`),
  KEY `Produit_Switch1_FK` (`ID_SWITCH`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`ID_KB`, `nom`, `prix`, `quantite`, `description`, `paveNum`, `taille`, `cable`, `RGB`, `ID_COULEUR`, `ID_COULED`, `ID_SWITCH`, `promo`) VALUES
(1, 'EDENWOOD CWL01', '20.00', 10, 'Ce clavier est étanche, ce qui le protège des éclaboussures et autres accidents du quotidien qui peuvent nuire à votre matériel informatique', 1, '14 x 50 cm', 2, 0, 2, 5, 2, NULL),
(2, 'ESSENTIELB EB_SK-10-F', '40.00', 10, 'L\'installation est un jeu d\'enfant. Il suffit de le brancher sur un port USB de l\'ordinateur de bureau ou portable pour pouvoir l\'utiliser immédiatement\r\n', 1, '16 / 54 cm', 1, 0, 2, 3, 1, NULL),
(3, 'Logitech MX Keys Advanced ', '100.00', 10, 'Son profil ultra-plat offre une position plus naturelle, et ses touches durables font de ce clavier un outil non seulement élégant mais aussi durable', 1, '20 x 60 cm', 2, 1, 2, 3, 1, NULL),
(4, 'Logitech K280e', '35.00', 10, 'Vous bénéficiez d\'une expérience de frappe confortable et silencieuse grâce aux touches plates presque insonores', 1, '13.50cm', 1, 3, 1, 5, 1, NULL),
(5, 'Dierya DK61se', '31.00', 10, 'Pour plus de Liberté de Mouvement, Essayez l’Ensemble sans Fil: Une connexion sans fil fiable, des raccourcis multimédia et une autonomie exceptionnelle', 2, '16x52cm', 1, 0, 2, 2, 1, NULL),
(11, 'TKL Vitality', '67.00', 10, 'Le clavier mécanique TKL officiel Team Vitality à été développé de A à Z pour que vous ayez un confort de jeu maximum avec notamment les red switches qui vont te permettre d\'avoir une frappe agréable et silencieuse', 2, '17 x 50 cm', 1, 1, 4, 4, 2, '25'),
(12, 'GROSSE TOUCHE PC ZOOM TEXT', '179.00', 10, 'Le clavier agrandi ZoomText, facbriqué par Ai Squared, est un clavier à gros caractères.\r\n\r\nOutre les 105 touches d\'un clavier standard, le clavier agrandi ZoomText possède 18 touches spécifiques, dédiées à l\'activation des principales fonctionnalités de ZoomText ', 1, '40 x 110 cm', 2, 0, 2, 5, 1, NULL),
(13, 'TKL 87 USB The G-Lab', '26.00', 10, 'Le clavier Gamer TKL est le tout nouveau clavier gaming haute performance The G-Lab !\r\n\r\nCe clavier ultra compact format TKL prend un minimum de place pour un maximum d’efficacité. Ce clavier vous garantit une frappe rapide, précise et confortable.', 2, '25x 60 cm', 1, 1, 3, 1, 2, '75'),
(14, 'The G-LAB Keyz Neon - Filaire ', '19.90', 10, 'Egayez votre clavier avec le rétroéclairage, programmez des raccourcis, profitez de l’anti-ghosting, le clavier The G-Lab KEYZ#NEON est un vrai clavier gamer compatible Windows.\r\n\r\n\r\nLes raccourcis clavier pour les jeux\r\n\r\nVous allez pouvoir entrer dans la peau d’un gamer sans vider votre compte en banque avec ce clavier The G-Lab KEYZ#NEON. Il offre tout ce que vous propose un clavier dédié au jeu, les touches mécaniques en moins, mais avec quand même une très bonne sensibilité et une excellente réactivité. Touches de fonction, touches multimédia, clavier alphanumérique, tout est présent pour qu’aucun raccourci ne vienne à vous manquer et vous faire perdre de votre dextérité.', 1, '18x75', 2, 3, 2, 3, 1, NULL),
(15, 'Onlan - PG-7', '35.00', 10, 'Grâce à sa fonction Plug & Play, il est très facile à installer. Branchez-le simplement à un port USB libre de votre ordinateur et commencer directement à l\'utiliser. Vous n\'avez même pas besoin de le brancher à l\'alimentation car le clavier est directement alimenté par USB via votre ordinateur.\r\n\r\n    Clavier USB standard avec pavé numérique de la marque Onlan', 1, '80 x 20 cm', 1, 3, 4, 1, 2, NULL),
(16, 'Mars Gaming MK80 ', '39.95', 10, 'Le clavier mécanique Mars Gaming MK80 embarque des switches bleus qui procurent un toucher ferme et une précision inimitable, parfait pour les utilisateurs qui tapent souvent sur un ordinateur.\r\n\r\nCe n\'est pas tout, le Mars Gaming MK80 est doté d\'un rétroéclairage RGB personnalisable. Et avec une durabilité accrue grâce à des matériaux de choix, vous êtes certain qu\'il vous accompagne dans toutes vos aventures.', 2, '10 x 127 cm', 1, 2, 2, 3, 2, '25'),
(17, 'XTRFY K5 Compact', '144.00', 10, 'La clavier mécanique Xtrfy K5 Compact AZERTY est disponible en deux éditions ! Ce clavier gaming est le clavier le plus performant de la marque suédoise qui continue d\'apporter des innovations de haut niveau à ses équipements esport. Grâce à son format compact de 65%, le clavier K5 Compact vous permet de jouer dans n\'importe quelle position. Le Xtrfy K5 est le premier clavier hot-swappable de la marque ; ce qui signifie que tous ses éléments sont interchangeables sans soudure. Un clavier parfait pour les amateurs de customisation ou les joueurs qui recherchent le meilleur clavier esport possible.', 2, '95 x 13 cm', 2, 2, 1, 2, 1, NULL),
(18, 'Clavier XYOOS', '365.99', 10, 'Les premiers claviers sont apparus presque en même temps que les tout premiers ordinateurs (qui occupaient alors des pièces entières). Dans les années 70, le texte occupe la majeure partie des données traitées, les claviers sont alors équipés de touches pour taper des lettres et celles-ci sont disposées différemment selon les pays.', 2, '20x40 cm', 1, 0, 2, 5, 1, NULL),
(19, 'Snpurdiri Clavier Gaming ', '37.50', 10, ' Clavier de gaming à format 60% - Ce clavier de jeu à 60% est très petit et facile à transporter. La conception compacte avec le layout 61 touches permet d\'économiser plus d\'espace sur votre bureau.\r\nMode de connexion filaire - La connexion filaire donne à ce petit clavier 60% une transmission fiable et une réponse rapide des touches. Il est compatible avec Windows 10, Win 8, Win 7, Win Vista, Windows XP et Mac OS, etc. ', 2, '90x300cm', 1, 1, 2, 5, 1, '25'),
(20, 'clavier gamer Megaport FR', '29.00', 10, 'Un produit génial\r\n\r\nTrès bon clavier et souris, la prise en main est confortable, c\'est beaux, très bon prix pour un pack de ce type.\r\n\r\nCependant, je ne sais si c\'est possible de personnaliser les boutons de la souris.\r\n\r\nSuper bien pout le gaminig \r\nJ adore ce clavier souris ,il est tres confortable et joli je n arrive juste pas a savoir c est quelle couleur pour les dpi\r\n\r\nLeDragonSlayers Vraiment pas cher pour un clavier et souris gameurs .\r\n\r\ncelui-ci Clavier très ergonomique,très design,souris confortable et élégante,le seul prolème est que le clavier ne change pas de couleur et que la souris fait un peu tchip sinon RAS ', 1, '50x60 cm', 1, 1, 1, 4, 2, NULL),
(21, 'Visualiseur de clavier Mac', '3.50', 10, 'Si la commande ne s’affiche pas, choisissez le menu Pomme  > Réglages Système, puis cliquez sur Clavier  dans la barre latérale. (Vous devrez peut-être faire défiler la page vers le bas.) Accédez à « Entrée de texte » à droite, cliquez sur Modifier, sélectionnez « Toutes les méthodes de saisie » dans le coin supérieur gauche, puis « Afficher le menu de saisie dans la barre des menus ».', 1, '5x15 cm', 2, 1, 2, 5, 1, NULL),
(22, 'clavier + souris sans fil ergonomique ', '89.00', 10, 'La conception verticale de la souris offre un meilleur soutien à votre avant-bras, réduisant ainsi les douleurs au poignet qui peuvent survenir lors d\'une torsion. Ce modèle ergonomique vertical vous aide à obtenir une prise en main plus naturelle, un meilleur soutien et une position naturelle du poignet. Avec son design épuré, la souris ergonomique est parfaite pour les longues heures d\'utilisation.\r\n\r\nCe clavier et cette souris fonctionnent dans n\'importe quel angle avec une portée de 10 m. Le bouton On/Off permet d\'économiser la batterie des deux appareils. L\'indicateur de batterie faible sur le clavier vous permet de savoir quand il est temps de changer les piles. Le repose-poignets intégré est conçu pour maintenir vos mains dans leur position naturelle de repos, il soulage les douleurs articulaires et améliore la qualité de vie.La conception de ce clavier avec ses zones de touches divisées et sa forme légèrement inclinée encourage la position naturelle des des mains, des poignets et de l\'avant-bras dans un confort maximal pour une utilisation prolongée.', 1, '3.141516x 80 cm', 1, 0, 2, 5, 1, NULL),
(23, 'Mini Clavier Gamer USB', '44.99', 10, 'Points forts Shot Mini Clavier Gamer USB pour PC ASUSPRO PAD LED PUBG Lumineux QWERTY (NOIR)\r\nMini Clavier Gamer USB pour PC PAD LED PUBG Lumineux QWERTY (NOIR) Avec Indication touche PUBG C\'est un clavier QWERTY ', 2, '20 x 20 cm', 1, 1, 2, 1, 2, '25'),
(24, 'Clavier Gamer MK80 RGB ', '38.81', 10, 'Description - Clavier - Mars Gaming - Clavier Gamer mécanique (Brown Switch) MK80 RGB (Blanc)\r\nPoints forts Mars Gaming Clavier Gamer mécanique (Brown Switch) MK80 RGB (Blanc)\r\nClavier Gamer mécanique (Brown Switch) Mars Gaming MK80 RGB (Blanc) ', 2, 'clavier', 2, 3, 1, 3, 1, NULL),
(27, 'Pack Gaming 3 en 1 Pro-MK5', '37.90', 10, 'Design RGB Le clavier PRO MK5 offre un style unique notamment grâce à son design moderne et son rétro-éclairage LED RGB Rainbow et son mode Breathing. Solide avec son châssis métal, il reste d’une discrétion absolue grâce à ses touches semi-mécaniques ultra-slim silencieuses. Et pour un meilleur Gameplay, il bénéficie de la technologie anti-ghosting 7 touches : idéal pour rivaliser avec vos adversaires ! ', 1, '25x60 cm', 1, 3, 2, 1, 1, NULL),
(28, 'Christian Clavier', '2500.00', 10, 'Christian Clavier est un acteur, scénariste et producteur français, né le 6 mai 1952 à Paris.\r\n\r\nRévélé au café-théâtre au sein de la troupe du Splendid — avec Gérard Jugnot, Thierry Lhermitte, Michel Blanc, Marie-Anne Chazel et Josiane Balasko — dans les années 1970, il acquiert à leurs côtés une notoriété nationale dans des films restés célèbres, tels que Les Bronzés (1978), Les Bronzés font du ski (1979), Le père Noël est une ordure (1982) ou Papy fait de la résistance (1983). ', 1, '1.68 m', 1, 2, 1, 5, 2, '25'),
(29, 'Clavier Unique Anglais', '39.90', 10, 'Description\r\nNous proposons un clavier d’ordinateur portable de la marque d’origine HP correspondant à divers modèles de la marque. Pour cela, vérifiez que votre pc correspond bien à l’un des modèles indiquées ci-dessous.', 1, '36 x 80 cm', 2, 0, 2, 5, 1, NULL),
(30, 'Clavier Sans Fil Metal pour PC COMPAQÂ ', '49.99', 10, 'Description - Clavier - Shot - Clavier Sans Fil Metal pour PC COMPAQÂ  USB QWERTY Piles (OR)\r\nPoints forts Shot Clavier Sans Fil Metal pour PC COMPAQÂ  USB QWERTY Piles (OR)\r\nClavier Sans Fil Metal pour PC USB QWERTY Piles C\'est un clavier QWERTY ', 1, '23x60 cm', 1, 3, 4, 3, 2, NULL),
(31, 'EdenBRO', '89.29', 80, 'GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG', 2, '25 x 50 cm', 2, 3, 4, 3, 2, '25');

-- --------------------------------------------------------

--
-- Table structure for table `switch`
--

DROP TABLE IF EXISTS `switch`;
CREATE TABLE IF NOT EXISTS `switch` (
  `ID_SWITCH` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(50) NOT NULL,
  `Fabriquant` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_SWITCH`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `switch`
--

INSERT INTO `switch` (`ID_SWITCH`, `modele`, `Fabriquant`, `couleur`) VALUES
(1, 'Razer A10', 'Razer', 'Marron'),
(2, 'Razoir B5', 'Pomme', 'Kaki');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `ID_TEST` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TEST`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `nom`, `prenom`, `mdp`, `adresse`, `dateden`, `mail`, `status`) VALUES
(1, 'Damien', 'Damien', 'Damien.1', 'DamienVille', '2006-06-06', 'Damien@Damien.dam', 1),
(2, 'z', 'z', 'z', 'z@z', '2004-06-06', 'z@z', 2),
(3, 'a', 'a', 'a', '26 a a', '0000-00-00', 'a@a', 1),
(4, 'b', 'b', 'b', 'b 14 b', '0000-00-00', 'b@b', 1),
(5, 'c', 'c', 'c', 'c 78 c', '0000-00-00', 'c@c', 1),
(6, 'd', 'd', 'd', 'd 78 d', '0000-00-00', 'd@d', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `PANIER_Produit0_FK` FOREIGN KEY (`ID_KB`) REFERENCES `produit` (`ID_KB`),
  ADD CONSTRAINT `PANIER_USER_FK` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_CouleurKB_FK` FOREIGN KEY (`ID_COULEUR`) REFERENCES `couleurkb` (`ID_COULEUR`),
  ADD CONSTRAINT `Produit_CouleurLED0_FK` FOREIGN KEY (`ID_COULED`) REFERENCES `couleurled` (`ID_COULED`),
  ADD CONSTRAINT `Produit_Switch1_FK` FOREIGN KEY (`ID_SWITCH`) REFERENCES `switch` (`ID_SWITCH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
