-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 31 jan. 2023 à 15:42
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
(2, 36, 'four', '2023-01-19', '2023-01-27'),
(3, 37, 'two', '2023-01-01', '2023-01-02'),
(4, 37, 'two', '2023-01-01', '2023-01-02'),
(5, 41, 'two', '2023-01-01', '2023-01-02');

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
(38, 'ADIHOU', 'Tobi rodrigues', 'olatobi', 'adihoutobi@gmail.com', '61951757', '$2y$10$B2Nqlkvnxxj87UxtsOZ7YuiLYeXLsUFw6o6SqX9DK.TgcVM1zGsim', 'admin'),
(42, 'Lambert', 'awokou', 'lawo', 'lawo@law.lawo', '12540325', '$2y$10$RTTb1God6eJwHW5Ew30mIO3u3PYN9H4zQKY5V4byZPXwLfu3UkPqe', 'user'),
(43, 'marceline', 'rodrigues', 'red', 'marcelline@gmail.com', '41526398', '$2y$10$7BVaMK1CkwHGZrQLG3Ttbu1ft7WoH1GiMV2/6qPVKl.3bWxVaS6OC', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

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
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
