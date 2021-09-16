-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 sep. 2021 à 10:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `artcile`
--

DROP TABLE IF EXISTS `artcile`;
CREATE TABLE IF NOT EXISTS `artcile` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionn` varchar(200) NOT NULL,
  `prix` double NOT NULL,
  `dateajoute` date NOT NULL,
  `quantité` int(11) NOT NULL,
  `magasin` varchar(50) NOT NULL,
  `fournisseurs` varchar(50) NOT NULL,
  `codebare` bigint(20) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artcile`
--

INSERT INTO `artcile` (`id_article`, `descriptionn`, `prix`, `dateajoute`, `quantité`, `magasin`, `fournisseurs`, `codebare`) VALUES
(42, 'Vigro Plus', 500, '2021-08-09', 10, 'TAOUJDATE', 'KAWTAR', 6111128000026),
(43, 'CAFE CARRIOR', 50, '2021-08-10', 20, 'TAOUJDATE', 'MAHDI', 12345678912),
(44, 'AAAAAAAA', 50, '2021-08-10', 18, 'TAOUJDATE', 'KAWTAR', 9781234567897),
(45, 'FUSILADE', 140, '2021-08-10', 7, 'TAOUJDATE', 'KAWTAR', 6110777122141),
(47, 'fulisade', 1200, '2021-08-10', 48, 'TAOUJDATE', 'KAWTAR', 6110777122141),
(48, 'AFONGIS', 45, '2021-08-25', 8, 'TAOUJDATE', 'KAWTAR', 6118000410140),
(58, 'SMART', 2, '2021-09-11', 60, 'TAOUJDATE', 'KAWTAR', 6111260128046);

-- --------------------------------------------------------

--
-- Structure de la table `avoire`
--

DROP TABLE IF EXISTS `avoire`;
CREATE TABLE IF NOT EXISTS `avoire` (
  `id_avoire` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nomcomplet` varchar(50) NOT NULL,
  `article` varchar(50) NOT NULL,
  `quantité` int(11) NOT NULL,
  PRIMARY KEY (`id_avoire`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avoire`
--

INSERT INTO `avoire` (`id_avoire`, `date`, `nomcomplet`, `article`, `quantité`) VALUES
(3, '2021-09-06', 'EL MANSOURI JALAL', 'OLMEX EN 5L', 10),
(4, '2021-09-06', 'JAWAD', 'OLMEX EN 5L', 10);

-- --------------------------------------------------------

--
-- Structure de la table `bulmest`
--

DROP TABLE IF EXISTS `bulmest`;
CREATE TABLE IF NOT EXISTS `bulmest` (
  `id_bulmest` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `article` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `quantité` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_bulmest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `charge`
--

DROP TABLE IF EXISTS `charge`;
CREATE TABLE IF NOT EXISTS `charge` (
  `id_charge` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nature` varchar(50) NOT NULL,
  `montant` double NOT NULL,
  PRIMARY KEY (`id_charge`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `charge`
--

INSERT INTO `charge` (`id_charge`, `date`, `nature`, `montant`) VALUES
(1, '2021-08-05', 'mahdi', 250),
(2, '2021-08-05', 'electricité', 152);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nomcomplet_p` varchar(50) NOT NULL,
  `numerogsm_p` bigint(20) NOT NULL,
  `cin_p` varchar(50) NOT NULL,
  `nomcomplet_g` varchar(50) NOT NULL,
  `numerogsm_g` bigint(20) NOT NULL,
  `cin_g` varchar(50) NOT NULL,
  `supérficies` double NOT NULL,
  `cultures` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nomcomplet_p`, `numerogsm_p`, `cin_p`, `nomcomplet_g`, `numerogsm_g`, `cin_g`, `supérficies`, `cultures`, `adresse`, `id_client`) VALUES
('AMINE AYMAN', 619773550, 'DJ36389', 'AMINE AYMAN', 619773550, 'DJ36389', 12000, 'PECHE', 'NR 88 HAY SAADA AIN TAOUJDATE', 1),
('EL MANSOURI JALAL', 625347896, 'kj32458', 'SAID CHIBA', 714362879, 'fh361478', 36000, 'MANGUE', 'No 27 EL PLANTEURS HAY BASSATINE AIN TAOUJDATE', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type_payement` varchar(20) NOT NULL,
  `bl` varchar(50) NOT NULL,
  `nomcomplet` varchar(50) NOT NULL,
  `article` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `quantité` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date`, `type_payement`, `bl`, `nomcomplet`, `article`, `prix`, `quantité`, `total`) VALUES
(2, '2021-08-03', 'crédit', 'AT00265', 'JAWAD KABACH', 'SOLIPUTAS EN 250ML', 260, 2, 520),
(6, '2021-08-04', 'crédit', 'AT00261', 'JAWAD', 'HARVEST EN 1KG', 600, 60, 1800),
(7, '2021-08-09', 'crédit', 'AT0001', 'EL MANSOURI JALAL', 'DOVE MEN', 35, 2, 70),
(8, '2021-08-09', 'cash', 'AT0002', 'EL MANSOURI JALAL', 'le petit marseillais', 50, 4, 200),
(11, '2021-08-10', 'cash', 'AT00260', 'aymane amine', 'Vigro Plus', 500, 1, 500),
(13, '2021-08-10', 'crédit', 'AT00261', 'mahdi amrani', 'VigroPlus', 50, 4, 200),
(25, '2021-08-27', 'cash', 'AT00259', 'MARWANE AMINE', 'SIDI ALI', 6, 18, 108),
(29, '2021-09-06', 'cash', 'AT00258', 'EL MANSOURI JALAL', 'OLMEX EN 5L', 50, 2, 100),
(30, '2021-09-06', 'cash', 'AT00259', 'EL MANSOURI JALAL', 'OLMEX EN 5L', 50, 20, 1000),
(32, '2021-09-06', 'cash', 'AT00258', 'mahdi amrani', 'OLMEX EN 5L', 50, 11, 550),
(33, '2021-09-11', 'cash', 'AT00259', 'EL MANSOURI JALAL', 'OLMEX EN 5L', 50, 2, 100),
(34, '2021-09-11', 'cash', 'AT00259', 'MARWANE AMINE', 'OLMEX EN 5L', 50, 3, 150);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prénom` varchar(100) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gérant`
--

DROP TABLE IF EXISTS `gérant`;
CREATE TABLE IF NOT EXISTS `gérant` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prénom` varchar(100) NOT NULL,
  `numero_gsm` bigint(20) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id_magasin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionn` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `dateajoute` date NOT NULL,
  `quantité` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `descriptionn`, `prix`, `dateajoute`, `quantité`) VALUES
(1, 'OLMEX EN 1L', 151, '2020-12-03', 12),
(2, 'SMART', 2, '2021-09-11', 60);

-- --------------------------------------------------------

--
-- Structure de la table `proprietere`
--

DROP TABLE IF EXISTS `proprietere`;
CREATE TABLE IF NOT EXISTS `proprietere` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prénom` varchar(50) NOT NULL,
  `numero_gsm` bigint(20) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prénom` varchar(100) NOT NULL,
  `numero_gsm` bigint(20) NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`fullname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`fullname`, `username`, `password`) VALUES
('aaaaaaa', 'admin', '$2y$12$Jc4S4OR3r60nkcUlHB71Uui51DrRN8xLp9/HrIZhLBRAveKgxwZli'),
('AYMANE AMINE', 'admin', '$2y$12$1/TCkvRHBvDKXcZusMaf.u61GFNHfRVcGdGVa2ZzpFp/hVO4L3jOy'),
('AYMANE AMINE3', 'admin1', '$2y$12$l5c.poQJ1zv1UmuVVV9rHufPBKDFVw.W3qivTYBEh.q4aC4ZV7hPC'),
('AYMANE AMINE33', '737a', '$2y$12$MSa9rLq.Ak6CssF9uXh4Luh.5hFvdW8jz4CP6EFb9skpFHv.i/eky'),
('kawtar fes', 'kawtar', '$2y$12$v2YUF//4b.tpgvf8vaRReOalTlbVHM.iJGjk93EYOLPwn45bF8cCm'),
('MARWANE AMINE', 'RAGNAR', '$2y$12$ediTXjwuTE207WXz0YhcS.NuX0TNqlMen6hUfEPXckyIyoRuSYx8C');

-- --------------------------------------------------------

--
-- Structure de la table `ventemagasin`
--

DROP TABLE IF EXISTS `ventemagasin`;
CREATE TABLE IF NOT EXISTS `ventemagasin` (
  `id_ventemagasin` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `article` varchar(50) NOT NULL,
  `quantité` int(11) NOT NULL,
  `magasin` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ventemagasin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ventemagasin`
--

INSERT INTO `ventemagasin` (`id_ventemagasin`, `date`, `article`, `quantité`, `magasin`) VALUES
(1, '2021-08-06', 'HARVEST EN 1KG', 9, 'IMOUZZAR'),
(3, '2021-08-06', 'VigroPlus', 9, 'IMOUZZAR'),
(6, '2021-09-09', 'TEMPO', 14, 'TAOUJDATE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
