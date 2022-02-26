-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 25 avr. 2021 à 11:53
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
(42, 'cameroun', 'Douala', '3444');

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
  `type_a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `id_category`, `id_shop`, `type_a`) VALUES
(25, 14, 7, 'product'),
(26, 14, 7, 'product');

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
(7, 12, 'JKLMfashion', '443p', 'Nkongsamba', 'Vetements de soirés...');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'savon'),
(2, 'savon'),
(3, 'savon'),
(4, 'savon'),
(5, 'savon'),
(6, 'savon'),
(7, 'savon'),
(8, 'savon'),
(9, 'savon'),
(10, 'savon'),
(11, 'savon'),
(12, 'savon'),
(13, 'savon'),
(14, 'electronique'),
(15, 'electronique'),
(16, 'electronique'),
(17, 'electronique'),
(18, 'electronique'),
(19, 'electronique'),
(20, 'electronique'),
(21, 'electronique'),
(22, 'electronique'),
(23, 'electronique'),
(24, 'electronique'),
(25, 'electronique'),
(26, 'electronique'),
(27, 'electronique'),
(28, 'electronique'),
(29, 'electronique'),
(30, 'electronique'),
(31, 'electronique'),
(32, 'electronique'),
(33, 'electronique'),
(34, 'electronique'),
(35, 'electronique'),
(36, 'electronique'),
(37, 'electronique');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `customer_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_customer`, `id_user`, `customer_created_at`) VALUES
(3, 29, '2021-04-22');

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
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_product` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `description_product` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(1) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_product`, `id_article`, `id_category`, `name_product`, `description_product`, `price`, `stock`, `image_name`, `image_type`) VALUES
(26, 25, 14, 'techno', '24Mp, 168Go and 2Go of RAM', 70, 1, 'c4451ac22cb3bdaaba482a877c9f2742.png', '.png'),
(27, 25, 14, 'techno', '24Mp, 168Go and 2Go of RAM', 70, 1, 'c4451ac22cb3bdaaba482a877c9f2742.png', '.png');

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
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_service` varchar(255) NOT NULL,
  `description_service` text NOT NULL,
  `price` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(29, 35, 'kamen', 'joachim', 'likoundkamen@gmail.com', '544456543', 'i', 'customer', 'f'),
(30, 37, 'Mboppi', 'pierre', 'mbp@gmail.com', '544', 'o', 'seller', 'm'),
(32, 41, 'Mbong', 'Friede', 'friedeMbong@gmail.com', '44554', 'p', 'seller', ''),
(33, 42, 'Epopa', 'Cedric', 'epopacedric@gmail.com', '544875849', 'c', 'seller', '');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id_seller` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `seller_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id_seller`, `id_user`, `seller_created_at`) VALUES
(12, 30, '2021-04-23'),
(13, 32, '2021-04-23'),
(14, 33, '2021-04-23');

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
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_category` (`id_category`),
  ADD KEY `fk_product_article` (`id_article`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`id_ressource`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `fk_service_article` (`id_article`),
  ADD KEY `fk_service_category` (`id_category`);

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
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `banniere`
--
ALTER TABLE `banniere`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `id_ressource` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

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
