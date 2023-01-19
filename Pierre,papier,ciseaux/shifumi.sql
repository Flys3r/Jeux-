
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 19 jan. 2023 à 08:58
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shifumi`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `adresseIP` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `nbr_victoire` int(11) NOT NULL DEFAULT 0,
  `egalite` int(11) DEFAULT 0,
  `nbr_partie` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `adresseIP`, `date`, `nbr_victoire`, `egalite`, `nbr_partie`) VALUES
(1, 'Augustin', 'ezrshezrg', '2023-01-16 09:26:35', 10, 5, 20),
(2, 'qsdq', 'qsd', '2023-01-16 12:42:07', 5, 5, 12),
(5, 'valenti', 'xdcfvgbhnj', '2023-01-16 12:43:49', 6, 8, 15),
(15, 'naleed ', 'peter mwalqu', '2023-01-16 13:43:44', 5, 3, 9),
(13, 'piter', 'etgse', '2023-01-16 13:36:59', 6, 10, 20),
(20, 'gdgedgws', 'dghehyey', '2023-01-16 13:45:56', 10, 6, 15),
(55, 'messi', 'messi', '2023-01-18 18:11:52', 9, 2, 13),
(57, 'haoil', 'jdhfb jcd', '2023-01-19 09:21:00', 3, 9, 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
