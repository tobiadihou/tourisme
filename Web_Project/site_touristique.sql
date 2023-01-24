-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 24 jan. 2023 à 20:59
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_touristique`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_img`, `article_content`) VALUES
(1, 'La Fête des sorcières en forêt de Masaka', 'tente.jpg', ' Issue de la grande forêt centrale primitive de Bretagne, la forêt de Masaca est une forêt de légendes où chaque année sorcières, sorciers, trolls, lutins et autres korrigansse retrouvent pour une grande fête à laquelle toute la famille est conviée.Tout au long de la journée des spectacles et des concerts se succéderont,ainsi que de nombreux ateliers autour de l’écologie et de la préservation de la nature. Le circuit ne présente pas de dangers et est accessible, ainsi que tous les jeux, à tous les enfants dès l’âge de 3 ans. À la nuit tombée, la fête s’adressera aux adultes,et la sorcellerie et les sortilèges seront à l’honneur. De nombreuses activités telles que la voyance, le spiritisme et la méditation seront proposées, encadrées par des professionnels.L’origine de cette fête remonte à l’ère pré-chrétienne quand des feux de joie étaient allumés et des danses païennes faisaient partie de la célébration du printemps. A l’époque médiévale, les sorcières étaient chassées car on les croyait associées au diable. Lors de la Nuit de Walpurgis, les sorcières s’envolaient sur leurs balais vers leurs lieux de sacrifice pour rencontrer d’autres sorcières. Des feux de joie étaient allumés   et des coups de feu tirés pour effrayer les sorcières.Aujourd’hui encore, la tradition continue pour le bonheur de tous,et cette année encore nous vous attendons en forêt de Masaca pour un moment forcément féerique.');

-- --------------------------------------------------------

--
-- Structure de la table `galleries`
--

CREATE TABLE `galleries` (
  `galleries_id` int(11) NOT NULL,
  `galleries_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallerie_figcation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleries_img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `icon`
--

CREATE TABLE `icon` (
  `icon_id` int(11) NOT NULL,
  `icon_name` int(11) NOT NULL,
  `icon_link` int(11) NOT NULL,
  `icon_icon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `navlink`
--

CREATE TABLE `navlink` (
  `navlink_id` int(11) NOT NULL,
  `navlink_pagename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_page` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navlink_role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `guest` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_arrive` date NOT NULL,
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `users_id`, `guest`, `date_arrive`, `date_retour`) VALUES
(1, 36, 'four', '2023-01-19', '2023-01-27'),
(2, 36, 'four', '2023-01-19', '2023-01-27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_lname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_contactNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userspassword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_username`, `users_email`, `users_contactNumber`, `userspassword`, `user_role`) VALUES
(33, '', '', '4111', 'atr@il.com', '029619517', '$2y$10$oIpcOjKysBvKnk7QaKctpOYQfr3pcCVLOg0SdlH7rFky5T03TIOXm', 'user'),
(34, '', '', 'tot', 'e@e.e', '74185296', '$2y$10$04gxaSu.mSdZYNNdS2HurefBqr90UwnXtsaYQjK6rg1fdfcE7SSJ.', 'user'),
(35, '', '', 'roott', 'b@b.b', '10203060', '$2y$10$nbNVlqDzBFtD0BEm/3W.Oes.iY58GQxG9sOKOTgLfi542MBMi3HdG', 'user'),
(36, '', '', 'rodrigues', 'a@a.a', '01020304', '$2y$10$UIwx6u8lqOlYGDXYrl8EgurgF1XOdntYrwj1MrCJZyk3LIk8UAMx2', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`galleries_id`);

--
-- Index pour la table `navlink`
--
ALTER TABLE `navlink`
  ADD PRIMARY KEY (`navlink_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_username` (`users_username`),
  ADD UNIQUE KEY `users_email` (`users_email`),
  ADD UNIQUE KEY `users_contactNumber` (`users_contactNumber`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `galleries_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `navlink`
--
ALTER TABLE `navlink`
  MODIFY `navlink_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
