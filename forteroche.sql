-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2020 at 08:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forteroche`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(11) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `id_post` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `content`, `id_post`, `comment_date`) VALUES
(4, 'unpseudo', 'un autre test d\'édition', 1, '2020-03-17 12:01:37'),
(2, 'test', 'et un test sur le premier commentaire niveau édition', 1, '2020-03-17 11:46:53'),
(3, '123', 'et un commentaire', 1, '2020-03-17 11:47:12'),
(5, 'untest', 'un edit comme un autre', 1, '2020-03-17 18:08:32'),
(6, 'ajout123', 'test de commentaire après avoir changé le code 2', 1, '2020-03-18 14:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `creation_date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `creation_date`, `title`) VALUES
(1, 'Forteroche', 'Dans une vidéo publiée vendredi sur Facebook par les autorités locales, Tyson Steele, 30 ans, fait de grands signes en direction de l’hélicoptère. Dans la neige est écrit un immense SOS.\r\n\r\n\"Sa cabane a brûlé à la mi-décembre tuant son chien et le laissant isolé dans des températures en dessous de zéro et avec aucun moyen de communication pendant 23 jours\", écrit la police de l’Alaska.\r\n\r\nLe jeune homme a été retrouvé sain et sauf jeudi dans cette zone où il vivait depuis septembre, loin de tout lieu d’habitation. Il a raconté son incroyable lutte pour survivre aux \"States Troopers\" de l’Alaska, qui l’ont publiée sur leur site internet.\r\n\r\n\"Il était une heure ou deux du matin et j’étais éveillé dans cette cabine froide\", dit-il.\r\n\r\nQuand il sort de sa chaumière, le toit est en feu, il dit avoir eu juste le temps de récupérer quelques affaires. Son chien, en revanche, ne le suit pas.\r\n\r\n\"Mon chien commence à hurler. À l’intérieur. Et je pensais qu’il n’était pas à l’intérieur\", raconte-t-il, \"je deviens hystérique […] je n’ai pas de mots pour cette douleur. » \" \"Son nom était Phil. Meilleur chien du monde\" .\r\n\r\nAprès l’incendie, il fait l’inventaire de ce qu’il lui reste à manger.', '2020-03-11 13:58:36', 'En Alaska, l’aventure «essentielle»');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pwd`) VALUES
(1, 'admin', 'password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
