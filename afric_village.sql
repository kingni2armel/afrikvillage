-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 sep. 2021 à 12:12
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afric_village`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresse`
--

CREATE TABLE `addresse` (
  `id_address` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `addresse`
--

INSERT INTO `addresse` (`id_address`, `country`, `city`, `street`) VALUES
(35, 'Cameroun', 'Edea', '4555'),
(36, 'Cameroun', 'Adamaoua', '445'),
(37, 'Cmr', 'kongsamba', 'rt444'),
(38, 'Cmr', 'kongsamba', 'rt444'),
(39, 'Cmr', 'kongsamba', 'rt444'),
(40, 'Cmr', 'kongsamba', 'rt444'),
(41, 'Cameroun', 'Douala', '4543'),
(42, 'cameroun', 'Douala', '3444'),
(43, 'canada', 'Mont real', '445'),
(44, 'usa', 'Douala', '445'),
(45, 'canada', 'Douala', 'nkongmondo'),
(46, 'canada', 'Douala', 'lsdkjf'),
(47, 'canada', 'canada', 'dsfd'),
(48, 'canada', 'canada', 'sdf'),
(49, 'canada', 'Douala', '445'),
(50, 'usa', 'new york', '4400'),
(51, 'usa', 'Douala', 'etoo'),
(52, 'usa', 'Douala', 'etoo'),
(53, 'canada', 'Douala', '445'),
(54, 'canada', 'San Francisco', '544'),
(55, '  canada', ' Douala', 'Jdkejk'),
(56, 'canada', 'montreal', '445'),
(57, 'usa', 'test', '554test'),
(58, 'canada', 'canada', 'rue\"(\"(\''),
(59, 'canada', 'canada', 'LKJKLJ'),
(60, 'canada', 'Douala', 'BaliDouala300'),
(61, 'canada', 'canada', 'sdfsdf'),
(62, 'canada', 'canada', 'sdfsdf'),
(63, 'canada', 'canada', 'sdfsdf'),
(64, 'canada', 'kljgjkh', 'gfjhkj'),
(65, 'canada', 'kljgjkh', 'oigjhkl'),
(66, 'canada', 'kljgjkh', 'oigjhkl'),
(67, 'canada', 'kljgjkh', 'oigjhkl'),
(68, 'canada', 'kljgjkh', 'oigjhkl'),
(69, 'canada', 'lkfdjg', 'iouoiui'),
(70, 'canada', 'lkfdjg', 'iouoiui'),
(71, 'canada', 'nourriture', 'aliment'),
(72, 'canada', 'nourriture', 'aliment');

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

CREATE TABLE `announce` (
  `id_announce` int(11) NOT NULL,
  `id_ressouce` int(11) NOT NULL,
  `id_paiement` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `title_announce` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `announce_created_at` date NOT NULL,
  `time` int(11) NOT NULL,
  `pack` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `appreciation`
--

CREATE TABLE `appreciation` (
  `id_appreciation` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,
  `type_a` varchar(255) NOT NULL,
  `name_article` varchar(255) NOT NULL,
  `description_article` text NOT NULL,
  `price` int(11) NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `id_category`, `id_shop`, `type_a`, `name_article`, `description_article`, `price`, `date_publication`) VALUES
(58, 3, 20, 'product', 'SUV', 'dernier SUV 29', 40000, '2021-05-10 01:53:36'),
(68, 7, 21, 'product', 'Outils de cuisine', 'Fait de la cuisine chez vous avec les meilleurs outils qui vous accompagnera pendant vos préparations.', 233, '2021-05-10 04:43:44'),
(70, 2, 20, 'product', 'MacBook Pro', 'macbook pro ERRRTO', 40000, '2021-05-10 06:31:31'),
(71, 2, 20, 'product', 'HP', 'Ordinateur portable', 0, '2021-05-10 06:33:24'),
(72, 2, 20, 'product', 'RazerBlade', 'Ordinateur pour gamer', 4000, '2021-05-10 06:35:26'),
(73, 2, 20, 'product', 'Lenovo', 'ThinkPad', 0, '2021-05-10 06:38:53'),
(74, 2, 20, 'product', 'SanDisk', 'Cle usb', 60, '2021-05-10 06:40:39'),
(75, 2, 20, 'product', 'Logitec', 'souris USB', 90, '2021-05-10 06:42:17'),
(76, 2, 20, 'product', 'beat by dre', 'beat by dre DETOXX', 600, '2021-05-10 06:44:22'),
(79, 5, 20, 'product', 'basket', 'air jordan', 60, '2021-05-21 01:08:20'),
(81, 9, 20, 'product', 'casque', 'casque de protection', 60, '2021-05-21 01:24:58'),
(84, 1, 20, 'product', 'Asus', 'tablet', 60, '2021-05-21 01:43:46'),
(85, 1, 20, 'product', 'google', 'tablet google', 40000, '2021-05-21 01:45:05'),
(86, 1, 20, 'product', 'windows', 'tablet', 400, '2021-05-21 01:47:32'),
(87, 1, 20, 'product', 'ipad', 'ipad air', 90, '2021-05-21 01:48:39'),
(88, 1, 20, 'product', 'Acer', 'tablet', 66, '2021-05-21 01:51:31'),
(90, 3, 20, 'product', 'Mercedes', 'voiture', 40000, '2021-05-21 02:22:45'),
(91, 3, 20, 'product', 'toyota', 'voiture', 2000, '2021-05-21 02:26:01'),
(92, 3, 20, 'product', 'toyota', 'voiture', 40000, '2021-05-21 02:31:44'),
(93, 3, 20, 'product', 'ford', 'voiture', 400, '2021-05-21 02:36:12'),
(94, 3, 20, 'product', 'gmc', 'voiture', 40000, '2021-05-21 02:39:18'),
(96, 1, 20, 'product', 'chargeur nokia', 'chargeur', 50, '2021-06-18 12:08:09'),
(97, 12, 24, 'product', 'gateau', 'gateau au chocolat.', 15, '2021-08-04 00:18:02'),
(98, 12, 24, 'product', 'gateau', 'dgfgsf', 15, '2021-08-04 00:29:18'),
(99, 12, 24, 'product', 'gateau', 'fsdfsd', 15, '2021-08-04 00:42:56'),
(110, 8, 24, 'service', 'ToastMaster', 'Nous vous aidons a vous exprimer en publique.', 0, '2021-08-04 01:27:21');

-- --------------------------------------------------------

--
-- Structure de la table `banniere`
--

CREATE TABLE `banniere` (
  `id_banner` int(11) NOT NULL,
  `id_ressource` int(11) NOT NULL,
  `type_banner` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_shop` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `name_shop` varchar(255) NOT NULL,
  `street_shop` varchar(255) NOT NULL,
  `city_shop` varchar(255) NOT NULL,
  `description_shop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_shop`, `id_seller`, `name_shop`, `street_shop`, `city_shop`, `description_shop`) VALUES
(20, 28, 'JKLMFashion', 'Douala', 'Bali', 'Fashion mode for men'),
(21, 29, 'MBPvip', '5445', 'Sidney', 'Brocantes Africaines'),
(22, 30, 'kamdemFashion', '566', 'Montreal', 'Vente de vetement'),
(23, 31, 'Romuald', '454r', 'pPp3', 'library'),
(24, 32, 'PainPate', 'lsdfkjsldkj', 'lksdjf', 'pain de la boulangerie...toujours frais');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `name_category_en` varchar(255) NOT NULL,
  `icon` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `name_category_en`, `icon`) VALUES
(1, 'Telephone et Tablettes', 'Phone and tablets', 'fa-mobile'),
(2, 'Informatique et Multimedia', 'Informatic and media', 'fa-desktop'),
(3, 'Véhicules', 'Vehicle', 'fa-car'),
(4, 'Immobilier', 'Immovable', 'fa-building'),
(5, 'Mode et vetements', 'Style and clothing', 'fa-male'),
(6, 'Loisir', 'Leisure', 'fa-gamepad'),
(7, 'Maison', 'House', 'fa-home'),
(8, 'Emploi et formation', 'Work and formation', 'fa-briefcase'),
(9, 'Entreprise et service', 'Service and enterprise', 'fa-hdd-o'),
(10, 'Beauté et Bien-être', 'Beauty and well-being', 'fa-bathtub'),
(11, 'Livre', 'Book', 'fa-book'),
(12, 'Aliment', 'Aliment', 'fa-cutlery');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `customer_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_customer`, `id_user`, `customer_created_at`) VALUES
(1, 46, '2021-05-03 10:04:58'),
(3, 48, '2021-05-07 15:23:50'),
(4, 49, '2021-05-20 11:25:05'),
(5, 51, '2021-08-02 14:16:24');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comment` int(11) NOT NULL,
  `id_appreciation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `content` text NOT NULL,
  `comment_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `flyer`
--

CREATE TABLE `flyer` (
  `id_flyer` int(11) NOT NULL,
  `id_ressource` int(11) NOT NULL,
  `type_flyer` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `image_of_article`
--

CREATE TABLE `image_of_article` (
  `id_image` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `name_image` varchar(255) NOT NULL,
  `ext_image` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image_of_article`
--

INSERT INTO `image_of_article` (`id_image`, `id_article`, `name_image`, `ext_image`) VALUES
(34, 58, '1ec6527b4644be5956c4bd09c0bd2c39.png', '.png'),
(35, 58, 'a6a26f9d147c12256547ded68dc63a00.png', '.png'),
(45, 68, '44eec2b48fee1ddfeb0910d8a183f643.jpg', '.jpg'),
(46, 68, 'cdf235ec9e705ffded7f026072c4fb0e.jpg', '.jpg'),
(47, 68, 'a81e32c7be41a2f4ed83f00db2fb98fe.jpg', '.jpg'),
(48, 68, '76d9d83cab3cd66c965a921f7cfb7005.jpg', '.jpg'),
(49, 68, '33d49d39d715d3f919428c3bf6e7e3cc.jpg', '.jpg'),
(51, 70, 'e93025a27eb45edbec63d08fbb94697f.png', '.png'),
(52, 71, 'da652bfec51877d36b59f0275b029c18.jpg', '.jpg'),
(53, 72, '0916b5be59711630efd47d86a447eb01.jpg', '.jpg'),
(54, 73, '43be1610f7db6f83f007400c05607fc2.jpg', '.jpg'),
(55, 74, '3a673c743cd476ef74b7198e7f2685bd.png', '.png'),
(56, 75, '4dda3cfd63e30c2bb4c57fbab3d9ee5e.png', '.png'),
(57, 76, '6fc88209195aaee83d8f795f9f1041ac.jpg', '.jpg'),
(60, 79, '1ccfc912f9391618dfd2d939ed30bab3.png', '.png'),
(62, 81, 'cc6aa8c45df39977c26df8eb40648161.png', '.png'),
(78, 84, 'c7557c073ff565c6f228c90b15eb4128.png', '.png'),
(79, 85, '4a91a2651c900678b6b7f88cf388b38a.png', '.png'),
(80, 86, 'c421d0bad2f6e47609031c0e6f5e0091.png', '.png'),
(81, 87, 'aa32c3d18adde236402e0a8e18d85c75.png', '.png'),
(82, 88, '518c2bb7d37391872ef7d64036ae4795.png', '.png'),
(84, 90, '824a98776c63aa728e6d4abaae8c7c59.png', '.png'),
(85, 91, 'd39c7ba3ce0a113cef365aa6a647f975.png', '.png'),
(86, 92, 'ec1da8928224d0fdfc21563d55b73190.png', '.png'),
(87, 92, '47a9846dc21ac4f3f845c7f7149b04d6.png', '.png'),
(88, 92, '0a23e4cea85fcd8b6cb71d66c856a02b.png', '.png'),
(89, 93, '336573e230f6cfc55795f37ee65dccda.png', '.png'),
(90, 94, '86f2c73e131ba335f7957e6a893e967f.png', '.png'),
(92, 96, '7e6a0f2066eff6e4b11621f1cd488373.png', '.png'),
(128, 110, '7dc4e481b542451fab682cc92b3481e9.png', '.png');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `content` text NOT NULL,
  `statut` int(1) NOT NULL,
  `date_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_sender`, `id_receiver`, `content`, `statut`, `date_message`) VALUES
(2, 50, 44, 'good article', 1, '2021-05-20 11:29:20'),
(5, 44, 52, 'sdfsdf', 1, '2021-08-04 02:56:25'),
(8, 44, 48, 'dsdsdsdsdsds', 1, '2021-08-06 02:25:25'),
(9, 52, 48, 'gdgdfgdfgfd', 1, '2021-08-06 02:27:10'),
(10, 52, 48, 'petit test', 1, '2021-08-06 02:28:45'),
(11, 52, 48, 'dsdsdsdsssssdddd', 1, '2021-08-06 02:41:41'),
(12, 48, 52, 'd\'accord', 1, '2021-08-06 04:38:39'),
(13, 48, 52, 'bien', 1, '2021-08-06 04:41:09'),
(14, 44, 48, 'je veux manger', 1, '2021-08-06 04:47:28'),
(15, 48, 44, 'et alors ?', 1, '2021-08-06 04:48:14'),
(16, 44, 48, 'c\'est important', 1, '2021-08-06 04:58:47'),
(17, 48, 44, 'ertrt', 1, '2021-08-06 04:59:48'),
(18, 48, 44, 'retretrtr', 1, '2021-08-06 04:59:55'),
(19, 48, 44, 'ertertr', 1, '2021-08-06 04:59:59'),
(20, 44, 48, 'sdfsdfsd', 1, '2021-08-06 05:01:09'),
(21, 44, 48, 'ssdsdfsd', 0, '2021-08-06 05:01:41'),
(22, 44, 48, 'sdfdsf', 0, '2021-08-06 05:02:30'),
(23, 44, 48, 'sdfdsfsdfsdfsd', 0, '2021-08-06 05:02:50'),
(24, 44, 48, 'sdfdsfsdfsdfsdfsdf', 0, '2021-08-06 05:03:10'),
(25, 44, 48, 'sdfdsfsdfsdfsdfsdfsdfsdf', 0, '2021-08-06 05:04:04'),
(26, 44, 48, 'sdfdsfsdfsdfsdfsdfsdfsdf', 0, '2021-08-06 05:05:03'),
(27, 44, 48, 'sdfdsfsdfsdfsdfsdfsdfsdf', 0, '2021-08-06 05:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `moderateur`
--

CREATE TABLE `moderateur` (
  `id_moderator` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `moderator_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_announce` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `make_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `id_ressource` int(11) NOT NULL,
  `type_r` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `see`
--

CREATE TABLE `see` (
  `id_article` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `see`
--

INSERT INTO `see` (`id_article`, `views`) VALUES
(58, 192),
(68, 30),
(70, 61),
(71, 15),
(72, 16),
(73, 54),
(74, 35),
(75, 33),
(76, 66),
(79, 1),
(81, 2),
(84, 4),
(85, 1),
(86, 2),
(87, 9),
(88, 3),
(90, 0),
(91, 1),
(92, 12),
(93, 3),
(94, 6),
(96, 2),
(97, 0),
(98, 0),
(99, 0),
(110, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `id_address`, `nom_user`, `prenom_user`, `email_user`, `phone_user`, `password`, `privilege`, `sexe`) VALUES
(44, 49, 'Kamen', 'Joachim', 'likound.kamen@gmail.com', '655447198', '$2y$10$C0EjSbzxAbJQTvhS0Qe71O02usuywkrEz2y3F5wl0.opNgB9ioJmK', 'seller', 'm'),
(45, 54, 'Mbong ', 'Pierre ', 'mbp@gmail.com', '655443434', 'o', 'seller', 'm'),
(46, 55, 'Kingni', 'Borid                   ', 'armel@gmail.com               ', '677829009                   ', 'a', 'customer', 'm'),
(47, 56, 'kamdem', 'joseph', 'kamdemjoseph@gmail.com', '55555', 'o', 'seller', 'm'),
(48, 57, 'Afric', 'Village', 'africvillage@gmail.com', '55555555', '$2y$10$C0EjSbzxAbJQTvhS0Qe71O02usuywkrEz2y3F5wl0.opNgB9ioJmK', 'administrator', 'm'),
(49, 59, 'lkjkjl', 'lkjlkj', 'lkjlkj@gmail.com', '88888888', 'eeeeeeee', 'customer', 'm'),
(50, 60, 'kamen', 'romuald', 'kamenr@gmail.com', '44444444', 'oooooooo', 'seller', 'm'),
(51, 69, 'etyert', 'rtertr', 'tese@gmail.com', '88888888', '$2y$10$fX3RGptYW/45IbVHXf3ZTO3N3JYkCWwEOqxGslideumOfTa.Ceu.O', 'customer', 'f'),
(52, 71, 'pain', 'pate', 'painpate@gmail.com', '55555555', '$2y$10$6r0rDa2E0YAA9t/OZ.2d2OTSgpQFOHcFkf1qKH8b.9s4I4CIIjszO', 'seller', 'm');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id_seller` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `seller_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id_seller`, `id_user`, `seller_created_at`) VALUES
(28, 44, '2021-04-29 20:42:04'),
(29, 45, '2021-05-01 03:51:59'),
(30, 47, '2021-05-04 00:55:17'),
(31, 50, '2021-05-20 17:29:47'),
(32, 52, '2021-08-03 16:15:50');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `id_ressource` int(11) NOT NULL,
  `type_video` varchar(255) NOT NULL,
  `name_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresse`
--
ALTER TABLE `addresse`
  ADD PRIMARY KEY (`id_address`);

--
-- Index pour la table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id_announce`),
  ADD KEY `fk_announce_ressource` (`id_ressouce`),
  ADD KEY `fk_announce_paiement` (`id_paiement`),
  ADD KEY `fk_announce_vendeur` (`id_seller`);

--
-- Index pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD PRIMARY KEY (`id_appreciation`),
  ADD KEY `fk_appreciation_seller` (`id_seller`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `fk_article_shop` (`id_shop`),
  ADD KEY `fk_article_category` (`id_category`);

--
-- Index pour la table `banniere`
--
ALTER TABLE `banniere`
  ADD PRIMARY KEY (`id_banner`),
  ADD KEY `fk_banniere_ressource` (`id_ressource`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_shop`),
  ADD KEY `fk_boutique_vendeur` (`id_seller`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fk_client_utilisateur` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_commentaire_appreciation` (`id_appreciation`),
  ADD KEY `fk_commentaire_client` (`id_client`),
  ADD KEY `fk_commentaire_article` (`id_article`);

--
-- Index pour la table `flyer`
--
ALTER TABLE `flyer`
  ADD PRIMARY KEY (`id_flyer`),
  ADD KEY `fk_flyer_ressource` (`id_ressource`);

--
-- Index pour la table `image_of_article`
--
ALTER TABLE `image_of_article`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_image_article` (`id_article`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `moderateur`
--
ALTER TABLE `moderateur`
  ADD PRIMARY KEY (`id_moderator`),
  ADD KEY `fk_moderateur_utilisateur` (`id_user`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `fk_paiement_seller` (`id_seller`),
  ADD KEY `fk_paiement_announce` (`id_announce`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`id_ressource`);

--
-- Index pour la table `see`
--
ALTER TABLE `see`
  ADD KEY `fk_see_article` (`id_article`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`),
  ADD KEY `fk_utilisateur_addresse` (`id_address`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id_seller`),
  ADD KEY `fk_vendeur_user` (`id_user`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `fk_video_ressource` (`id_ressource`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresse`
--
ALTER TABLE `addresse`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `announce`
--
ALTER TABLE `announce`
  MODIFY `id_announce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appreciation`
--
ALTER TABLE `appreciation`
  MODIFY `id_appreciation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `banniere`
--
ALTER TABLE `banniere`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `flyer`
--
ALTER TABLE `flyer`
  MODIFY `id_flyer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_of_article`
--
ALTER TABLE `image_of_article`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `moderateur`
--
ALTER TABLE `moderateur`
  MODIFY `id_moderator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `id_ressource` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `announce`
--
ALTER TABLE `announce`
  ADD CONSTRAINT `fk_announce_paiement` FOREIGN KEY (`id_paiement`) REFERENCES `paiement` (`id_paiement`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_announce_ressource` FOREIGN KEY (`id_ressouce`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_announce_vendeur` FOREIGN KEY (`id_seller`) REFERENCES `vendeur` (`id_seller`) ON DELETE CASCADE;

--
-- Contraintes pour la table `appreciation`
--
ALTER TABLE `appreciation`
  ADD CONSTRAINT `fk_appreciation_seller` FOREIGN KEY (`id_seller`) REFERENCES `vendeur` (`id_seller`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `fk_article_shop` FOREIGN KEY (`id_shop`) REFERENCES `boutique` (`id_shop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `banniere`
--
ALTER TABLE `banniere`
  ADD CONSTRAINT `fk_banniere_ressource` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE;

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `fk_boutique_vendeur` FOREIGN KEY (`id_seller`) REFERENCES `vendeur` (`id_seller`) ON DELETE CASCADE;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_utilisateur` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_appreciation` FOREIGN KEY (`id_appreciation`) REFERENCES `appreciation` (`id_appreciation`),
  ADD CONSTRAINT `fk_commentaire_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `fk_commentaire_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_customer`);

--
-- Contraintes pour la table `flyer`
--
ALTER TABLE `flyer`
  ADD CONSTRAINT `fk_flyer_ressource` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image_of_article`
--
ALTER TABLE `image_of_article`
  ADD CONSTRAINT `fk_image_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `moderateur`
--
ALTER TABLE `moderateur`
  ADD CONSTRAINT `fk_moderateur_utilisateur` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk_paiement_announce` FOREIGN KEY (`id_announce`) REFERENCES `announce` (`id_announce`),
  ADD CONSTRAINT `fk_paiement_seller` FOREIGN KEY (`id_seller`) REFERENCES `vendeur` (`id_seller`);

--
-- Contraintes pour la table `see`
--
ALTER TABLE `see`
  ADD CONSTRAINT `fk_see_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `fk_vendeur_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_ressource` FOREIGN KEY (`id_ressource`) REFERENCES `ressource` (`id_ressource`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
