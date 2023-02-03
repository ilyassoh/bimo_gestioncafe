-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 déc. 2022 à 05:39
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cafe`
--

-- --------------------------------------------------------

--
-- Structure de la table `cafe`
--

CREATE TABLE `cafe` (
  `Logo` varchar(255) DEFAULT NULL,
  `Brand` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Telephone_Cafe` varchar(255) DEFAULT NULL,
  `Nb_Tickets` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cafe`
--

INSERT INTO `cafe` (`Logo`, `Brand`, `Adresse`, `Ville`, `Telephone_Cafe`, `Nb_Tickets`) VALUES
('logo.png', 'BIMO', 'DI_2 Centre Jabir', 'Marrakech', '06.12.34.56.78', 0);

-- --------------------------------------------------------

--
-- Structure de la table `caissiers`
--

CREATE TABLE `caissiers` (
  `id_Caissier` int(255) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `tele_Cais` varchar(255) DEFAULT NULL,
  `Nb_Commandes` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caissiers`
--

INSERT INTO `caissiers` (`id_Caissier`, `Username`, `Password`, `tele_Cais`, `Nb_Commandes`) VALUES
(1, 'Badr', '1100', '0705276071', 0),
(2, 'Ilyass', '0102', '0620985408', 0),
(3, 'Omaima', '8787', '0624649167', 0),
(4, 'Mouad', '2525', '0651157254', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_Categorie` int(255) NOT NULL,
  `Label` varchar(255) DEFAULT NULL,
  `Nb_Produits` int(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_Categorie`, `Label`, `Nb_Produits`, `photo`) VALUES
(1, 'Cafes chouds', 7, 'cat1.png'),
(2, 'Boissons', 4, 'cat2.png'),
(3, 'Nourriture', 5, 'cat3.png');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_Commande` int(255) NOT NULL,
  `date_Commande` varchar(255) DEFAULT NULL,
  `Nb_Produits` int(255) DEFAULT NULL,
  `Nom_Caissier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(255) NOT NULL,
  `Num_Commande` int(255) NOT NULL,
  `Label_Produit` varchar(255) DEFAULT NULL,
  `quantite` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_Prod` int(255) NOT NULL,
  `Label` varchar(255) DEFAULT NULL,
  `Prix` double DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Nb_Commande` int(255) DEFAULT NULL,
  `id_categorie` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_Prod`, `Label`, `Prix`, `Photo`, `Nb_Commande`, `id_categorie`) VALUES
(1, 'Cappuc italy', 18, 'c1_p1.jpg', 0, 1),
(2, 'Cappuc india', 25, 'c1_p2.jpg', 0, 0),
(3, 'Espresso', 15, 'c1_p3.jpg', 0, 1),
(4, 'Hot Chocalate', 20, 'c1_p4.jpg', 0, 1),
(5, 'Ice Cafe', 30, 'c1_p5.jpg', 0, 1),
(6, 'Latte 1', 12, 'c1_p6.jpg', 0, 1),
(7, 'Latte 2', 13, 'c1_p7.jpg', 0, 1),
(8, 'Beer', 24, 'c2_p1.jpg', 0, 2),
(9, 'Cocktail', 35, 'c2_p2.jpg', 0, 2),
(10, 'Lemonade', 14, 'c2_p3.jpg', 0, 2),
(11, 'Orange Juics', 16, 'c2_p4.jpg', 0, 2),
(12, 'Beef', 39, 'c3_p1.jpg', 0, 3),
(13, 'Ksoksso', 60, 'c3_p2.jpg', 0, 3),
(14, 'Pizza', 30, 'c3_p3.jpg', 0, 3),
(15, 'Tajine', 70, 'c3_p4.jpg', 0, 3),
(16, 'Takos', 34, 'c3_p5.jpg', 0, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caissiers`
--
ALTER TABLE `caissiers`
  ADD PRIMARY KEY (`id_Caissier`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_Categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_Commande`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_Prod`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
