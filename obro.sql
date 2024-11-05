-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2024 at 08:36 PM
-- Server version: 5.7.40
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obro`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) NOT NULL,
  `prenom` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `nomClient` varchar(25) NOT NULL,
  `prenomClient` varchar(30) NOT NULL,
  `mailClient` varchar(35) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `detailsCommande` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomproduit` varchar(50) NOT NULL,
  `catégorieproduit` varchar(10) NOT NULL,
  `prixproduit` varchar(10) NOT NULL,
  `imageproduit` varchar(50) NOT NULL,
  PRIMARY KEY (`idproduit`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idproduit`, `nomproduit`, `catégorieproduit`, `prixproduit`, `imageproduit`) VALUES
(1, 'OBROS2', 'HOMME', '250', 'img/imageChaussure2.jpg'),
(2, 'OBROS1', 'HOMME', '250', 'img/imageChaussure1.jpeg'),
(3, 'OBROS3', 'HOMME', '250', 'img/imageChaussure3.jpg'),
(4, 'OBROF4', 'ENFANT', '300', 'img/imageChaussure4.jpg'),
(5, 'OBROS5', 'HOMME', '400', 'img/imageChaussure5.jpg'),
(6, 'OBROS7', 'HOMME', '300', 'img/imageChaussure7.jpg'),
(7, 'OBROES11', 'FEMME', '200', 'img/imageChaussure11.jpg'),
(8, 'OBROF6', 'ENFANT', '400', 'img/imageChaussure6.jpg'),
(9, 'OBROES12', 'FEMME', '400', 'img/imageChaussure12.jpg'),
(10, 'OBROES21', 'FEMME', '250', 'img/imageChaussure21.jpg'),
(11, 'OBROS8', 'HOMME', '200', 'img/imageChaussure8.jpg'),
(12, 'OBROES9', 'FEMME', '800', 'img/imageChaussure9.jpg'),
(13, 'OBROF18', 'ENFANT', '150', 'img/imageChaussure18.jpg'),
(14, 'OBROES13', 'FEMME', '400', 'img/imageChaussure13.jpg'),
(15, 'OBROES14', 'FEMME', '200', 'img/imageChaussure14.jpg'),
(16, 'OBROES15', 'FEMME', '400', 'img/imageChaussure15.jpg'),
(17, 'OBROF16', 'ENFANT', '250', 'img/imageChaussure16.jpg'),
(18, 'OBROS17', 'Homme', '380', 'img/imageChaussure17.jpg'),
(19, 'OBROF19', 'ENFANT', '200', 'img/imageChaussure19.jpg'),
(20, 'OBROES20', 'FEMME', '150', 'img/imageChaussure20.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
