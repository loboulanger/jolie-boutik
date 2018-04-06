-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 05 avr. 2018 à 18:46
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutik`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `title`) VALUES
(1, 'chaussure'),
(2, 'pantalon'),
(3, 'tee-shirt'),
(4, 'robe'),
(5, 'manteau');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `id_infos` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `text` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`id_infos`, `name`, `address`, `text`, `picture`) VALUES
(1, 'Jolie Boutik', '66 rue  abbé de l\'épée 33000 Bordeaux', 'Jolie petite boutique située dans le centre de Bordeaux, près de la place Gambetta. On vous proposer des vêtements de créateurs qui raviront les plus exigeantes. Vous trouverez pantalons, robes,....', '');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id_pictures` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slider` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id_pictures`, `id_products`, `name`, `slider`) VALUES
(1, 1, 'boutique_images/chaussure01.jpg', 0),
(2, 2, 'boutique_images/chaussure02.jpg', 0),
(3, 3, 'boutique_images/chaussure03.jpg', 1),
(4, 4, 'boutique_images/chaussure04.jpg', 0),
(5, 9, 'boutique_images/panta01.jpg', 0),
(6, 10, 'boutique_images/panta02.jpg', 0),
(7, 11, 'boutique_images/panta03.jpg', 0),
(8, 12, 'boutique_images/panta04.jpg', 0),
(9, 17, 'boutique_images/tshirt01.jpg', 0),
(10, 18, 'boutique_images/tshirt02.jpg', 0),
(11, 19, 'boutique_images/tshirt03.jpg', 1),
(12, 20, 'boutique_images/tshirt04.jpg', 0),
(13, 13, 'boutique_images/robe01.jpg', 0),
(14, 14, 'boutique_images/robe02.jpg', 0),
(15, 15, 'boutique_images/robe03.jpg', 0),
(16, 16, 'boutique_images/robe04.jpg', 1),
(17, 5, 'boutique_images/manteau01.jpg', 1),
(18, 6, 'boutique_images/manteau02.jpg', 0),
(19, 7, 'boutique_images/manteau03.jpg', 0),
(20, 8, 'boutique_images/manteau04.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `id_category` int(11) NOT NULL,
  `dispo` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` date NOT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_products`, `name`, `price`, `id_category`, `dispo`, `date_create`, `id_picture`) VALUES
(1, 'City loafer', 45.99, 1, 1, '2018-04-05', 1),
(2, 'Running gag', 154.99, 1, 1, '2018-04-05', 2),
(3, 'Hooker\'s high', 99.45, 1, 1, '2018-04-05', 3),
(4, 'Dame', 122.59, 1, 1, '2018-04-05', 4),
(5, 'Grand carreau', 125.89, 5, 1, '2018-04-05', 17),
(6, 'Grey emminenz', 159.89, 5, 1, '2018-04-05', 18),
(7, 'Cool style', 139, 5, 1, '2018-04-05', 19),
(8, 'Double pleasure', 129.99, 5, 1, '2018-04-05', 20),
(9, 'Destroy', 159.99, 2, 1, '2018-04-05', 5),
(10, 'Spacieux', 89.99, 2, 1, '2018-04-05', 6),
(11, 'Every day', 119.89, 2, 1, '2018-04-05', 7),
(12, 'Trop serré', 69.89, 2, 1, '2018-04-05', 8),
(13, 'Jour de plage', 99, 4, 1, '2018-04-05', 13),
(14, 'Working girl', 105.99, 4, 1, '2018-04-05', 14),
(15, 'Soir d\'été', 149.89, 4, 1, '2018-04-05', 15),
(16, 'Grand jeu', 229.99, 4, 1, '2018-04-05', 16),
(17, 'Cougar', 29.99, 3, 1, '2018-04-05', 9),
(18, 'Working out', 19.99, 3, 1, '2018-04-05', 10),
(19, 'Cat', 39.99, 3, 1, '2018-04-05', 11),
(20, 'Birds', 15.99, 3, 1, '2018-04-05', 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `pseudo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT 'sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `name`, `firstname`, `pseudo`, `password`, `role`) VALUES
(1, 'Doe', 'John', 'jdoe', '', 'admin'),
(2, 'Roe', 'Jane', 'jroe', '', 'sale');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id_infos`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id_pictures`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `infos`
--
ALTER TABLE `infos`
  MODIFY `id_infos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id_pictures` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
