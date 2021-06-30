-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 juin 2021 à 14:09
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ski`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `type`) VALUES
(1, 'M1'),
(2, 'M2'),
(3, 'M3'),
(4, 'Sénior'),
(5, 'Snow'),
(6, 'Nouvelle Glisse');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `id_participant` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `number_sign` varchar(100) NOT NULL,
  PRIMARY KEY (`id_participant`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id_participant`, `firstname`, `lastname`, `dob`, `email`, `picture`, `id_category`, `number_sign`) VALUES
(160, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44bcfe25f7'),
(159, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d44bcfe23c0'),
(158, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44ba64034e'),
(157, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d44ba640143'),
(156, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44b51a55cc'),
(155, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d44b51a52b4'),
(154, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44ab7bd795'),
(153, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d44ab7bd554'),
(152, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44855343cd'),
(151, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d448553420a'),
(150, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44821614f8'),
(149, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4482161382'),
(148, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d4475fc02bc'),
(147, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4475fc00ad'),
(146, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d44736f2fe5'),
(145, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d44736f2df2'),
(144, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d446c3bf430'),
(143, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d446c3bf23e'),
(142, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d446b4debd4'),
(141, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d446b4de9d9'),
(140, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d446842189c'),
(139, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4468421663'),
(138, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d4467c3cd21'),
(137, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4467c3cb35'),
(136, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d4460d81f3c'),
(135, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4460d81d58'),
(134, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d445f387703'),
(133, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d445f387394'),
(132, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d445da3e251'),
(131, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d445da3e081'),
(130, 'zsedrft', 'gnethje', '2021-06-12', 'zizgr@gmail.com', 'retro-mustang-wallpaper.jpg', 3, 'zg60d4453f88553'),
(129, 'sofia', 'dupont', '2012-03-02', 's.d@gmail.com', 'formulaire.png', 2, 'sd60d4453f883da');

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `id_tournament` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_tournament`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tournament`
--

INSERT INTO `tournament` (`id_tournament`, `city`, `date`) VALUES
(1, 'zetrgyhtjyu', '2021-06-23'),
(2, 'zetrgyhtjyu', '2021-06-23'),
(3, 'zetrgyhtjyu', '2021-06-23'),
(4, 'zetrgyhtjyu', '2021-06-23'),
(5, 'zetrgyhtjyu', '2021-06-23'),
(6, 'zetrgyhtjyu', '2021-06-23'),
(7, 'zetrgyhtjyu', '2021-06-23'),
(8, 'zetrgyhtjyu', '2021-06-23'),
(9, 'zetrgyhtjyu', '2021-06-23'),
(10, 'zetrgyhtjyu', '2021-06-23'),
(11, 'zetrgyhtjyu', '2021-06-23'),
(12, 'zetrgyhtjyu', '2021-06-23'),
(13, 'zetrgyhtjyu', '2021-06-23'),
(14, 'zetrgyhtjyu', '2021-06-23'),
(15, 'zetrgyhtjyu', '2021-06-23'),
(16, 'zetrgyhtjyu', '2021-06-23'),
(17, 'zetrgyhtjyu', '2021-06-23'),
(18, 'zetrgyhtjyu', '2021-06-23'),
(19, 'zetrgyhtjyu', '2021-06-23'),
(20, 'zetrgyhtjyu', '2021-06-23'),
(21, 'la plagne', '2021-06-24'),
(22, 'la plagne', '2021-06-24'),
(23, 'la plagne', '2021-06-24'),
(24, 'la plagne', '2021-06-24'),
(25, 'la plagne', '2021-06-24'),
(26, 'la plagne', '2021-06-24'),
(27, 'la plagne', '2021-06-24'),
(28, 'zetrgyhtjyu', '2021-06-23'),
(29, 'la plagne', '2021-06-24'),
(30, 'la plagne', '2021-06-24'),
(31, 'la plagne', '2021-06-24'),
(32, 'la plagne', '2021-06-24'),
(33, 'la plagne', '2021-06-24'),
(34, 'la plagne', '2021-06-24'),
(35, 'la plagne', '2021-06-24'),
(36, 'la plagne', '2021-06-24'),
(37, 'la plagne', '2021-06-24'),
(38, 'la plagne', '2021-06-24'),
(39, 'la plagne', '2021-06-24'),
(40, 'la plagne', '2021-06-24'),
(41, 'la plagne', '2021-06-24'),
(42, 'la plagne', '2021-06-24'),
(43, 'la plagne', '2021-06-24'),
(44, 'la plagne', '2021-06-24'),
(45, 'la plagne', '2021-06-24'),
(46, 'la plagne', '2021-06-24'),
(47, 'la plagne', '2021-06-24'),
(48, 'la plagne', '2021-06-24'),
(49, 'la plagne', '2021-06-24'),
(50, 'la plagne', '2021-06-24'),
(51, 'la plagne', '2021-06-24'),
(52, 'la plagne', '2021-06-24'),
(53, 'la plagne', '2021-06-24'),
(54, 'la plagne', '2021-06-24'),
(55, 'la plagne', '2021-06-24'),
(56, 'la plagne', '2021-06-24'),
(57, 'la plagne', '2021-06-24'),
(58, 'la plagne', '2021-06-24'),
(59, 'la plagne', '2021-06-24'),
(60, 'la plagne', '2021-06-24'),
(61, 'la plagne', '2021-06-24'),
(62, 'la plagne', '2021-06-24'),
(63, 'la plagne', '2021-06-24'),
(64, 'la plagne', '2021-06-24'),
(65, 'la plagne', '2021-06-24'),
(66, 'la plagne', '2021-06-24'),
(67, 'la plagne', '2021-06-24'),
(68, 'la plagne', '2021-06-24'),
(69, 'la plagne', '2021-06-24'),
(70, 'la plagne', '2021-06-24'),
(71, 'la plagne', '2021-06-24'),
(72, 'la plagne', '2021-06-24'),
(73, 'la plagne', '2021-06-24'),
(74, 'la plagne', '2021-06-24'),
(75, 'la plagne', '2021-06-24'),
(76, 'la plagne', '2021-06-24'),
(77, 'la plagne', '2021-06-24'),
(78, 'la plagne', '2021-06-24'),
(79, 'la plagne', '2021-06-24'),
(80, 'la plagne', '2021-06-24'),
(81, 'la plagne', '2021-06-24'),
(82, 'la plagne', '2021-06-24');

-- --------------------------------------------------------

--
-- Structure de la table `trial`
--

DROP TABLE IF EXISTS `trial`;
CREATE TABLE IF NOT EXISTS `trial` (
  `id_trial` int(11) NOT NULL AUTO_INCREMENT,
  `number_sign` varchar(150) NOT NULL,
  `first_time` varchar(50) NOT NULL,
  `second_time` varchar(50) NOT NULL,
  `average` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trial`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trial`
--

INSERT INTO `trial` (`id_trial`, `number_sign`, `first_time`, `second_time`, `average`) VALUES
(1, 'zg60d44bcfe25f7', '0.63900462962963', '1.0452546296296', NULL),
(2, 'sd60d44bcfe23c0', '0.6806712962963', '1.0869212962963', NULL),
(3, 'zg60d44ba64034e', '0.72233796296296', '1.128587962963', NULL),
(4, 'sd60d44ba640143', '0.76400462962963', '1.1702546296296', NULL),
(5, 'zg60d44b51a55cc', '0.8056712962963', '1.2119212962963', NULL),
(6, 'sd60d44b51a52b4', '0.84733796296296', '1.253587962963', NULL),
(7, 'zg60d44ab7bd795', '0.88900462962963', '1.2952546296296', NULL),
(8, 'sd60d44ab7bd554', '0.9306712962963', '1.3369212962963', NULL),
(9, 'zg60d44855343cd', '0.97233796296296', '1.378587962963', NULL),
(10, 'sd60d448553420a', '1.0140046296296', '1.4202546296296', NULL),
(11, 'zg60d44821614f8', '1.0556712962963', '1.4619212962963', NULL),
(12, 'sd60d4482161382', '1.097337962963', '1.503587962963', NULL),
(13, 'zg60d4475fc02bc', '1.1390046296296', '1.5452546296296', NULL),
(14, 'sd60d4475fc00ad', '1.1806712962963', '1.5869212962963', NULL),
(15, 'zg60d44736f2fe5', '1.222337962963', '1.628587962963', NULL),
(16, 'sd60d44736f2df2', '1.2640046296296', '1.6702546296296', NULL),
(17, 'zg60d446c3bf430', '1.3056712962963', '1.7119212962963', NULL),
(18, 'sd60d446c3bf23e', '1.347337962963', '1.753587962963', NULL),
(19, 'zg60d446b4debd4', '1.3890046296296', '1.7952546296296', NULL),
(20, 'sd60d446b4de9d9', '1.4306712962963', '1.8369212962963', NULL),
(21, 'zg60d446842189c', '1.472337962963', '1.878587962963', NULL),
(22, 'sd60d4468421663', '1.5140046296296', '1.9202546296296', NULL),
(23, 'zg60d4467c3cd21', '1.5556712962963', '1.9619212962963', NULL),
(24, 'sd60d4467c3cb35', '1.597337962963', '2.003587962963', NULL),
(25, 'zg60d4460d81f3c', '1.6390046296296', '2.0452546296296', NULL),
(26, 'sd60d4460d81d58', '1.6806712962963', '2.0869212962963', NULL),
(27, 'zg60d445f387703', '1.722337962963', '2.128587962963', NULL),
(28, 'sd60d445f387394', '1.7640046296296', '2.1702546296296', NULL),
(29, 'zg60d445da3e251', '1.8056712962963', '2.2119212962963', NULL),
(30, 'sd60d445da3e081', '1.847337962963', '2.253587962963', NULL),
(31, 'zg60d4453f88553', '1.8890046296296', '2.2952546296296', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
