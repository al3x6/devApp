-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 19 jan. 2023 à 21:29
-- Version du serveur :  10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SIMFAST`
--

-- --------------------------------------------------------

--
-- Structure de la table `crypto`
--

CREATE TABLE `crypto` (
  `login` varchar(255) DEFAULT NULL,
  `cle` varchar(255) DEFAULT NULL,
  `texte` varchar(255) DEFAULT NULL,
  `texte_chiffre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `crypto`
--

INSERT INTO `crypto` (`login`, `cle`, `texte`, `texte_chiffre`) VALUES
('alexis', 'key', 'plaintext', '7b0055844afb1e323c'),
('alexis', 'key', 'moi', '66035d'),
('etude', 'alexis', 'alexou', '9d34490ad922'),
('alexis', 'sessionalexis', 'alexou', 'e81520bb09d2');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_historique` int(5) NOT NULL,
  `login` varchar(30) NOT NULL,
  `nom_module` varchar(30) NOT NULL,
  `historique_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `login`, `nom_module`, `historique_date`) VALUES
(2, 'etude', 'amortissement', '2022-11-10 09:29:18'),
(3, 'user', 'conversion', '2022-11-10 09:29:18'),
(4, 'user', 'amortissement', '2022-11-10 09:29:18'),
(5, 'log', 'probabilite', '2022-11-10 09:29:18');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `nom_module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`nom_module`) VALUES
('amortissement'),
('conversion'),
('probabilite');

-- --------------------------------------------------------

--
-- Structure de la table `module_crypto`
--

CREATE TABLE `module_crypto` (
  `id_utilisateur` varchar(255) NOT NULL,
  `cle` varchar(255) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `texte_chiffre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stats_module`
--

CREATE TABLE `stats_module` (
  `id_stats_module` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `login` varchar(30) NOT NULL,
  `nom_module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stats_visite`
--

CREATE TABLE `stats_visite` (
  `id_visite` int(11) NOT NULL,
  `adresse_ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stats_visite`
--

INSERT INTO `stats_visite` (`id_visite`, `adresse_ip`, `date`) VALUES
(1, '', '2022-11-09 10:04:54'),
(2, '', '2022-11-09 10:05:27'),
(3, '192.168.0.56', '2023-01-10 12:22:10'),
(4, '192.168.0.56', '2023-01-10 12:25:53'),
(5, '192.168.0.56', '2023-01-10 12:25:57'),
(6, '192.168.0.56', '2023-01-10 12:38:37'),
(7, '192.168.0.56', '2023-01-10 12:45:03'),
(8, '192.168.0.56', '2023-01-10 12:59:45'),
(9, '192.168.0.56', '2023-01-10 13:02:14'),
(10, '192.168.0.56', '2023-01-10 13:06:59'),
(11, '192.168.0.59', '2023-01-10 15:46:21'),
(12, '192.168.0.56', '2023-01-10 15:47:22'),
(13, '192.168.0.73', '2023-01-12 09:51:52'),
(14, '192.168.0.117', '2023-01-12 11:02:58'),
(15, '192.168.0.101', '2023-01-12 11:10:45'),
(16, '192.168.0.101', '2023-01-12 11:10:58'),
(17, '192.168.0.101', '2023-01-12 11:42:14'),
(18, '192.168.3.230', '2023-01-12 18:22:32'),
(19, '192.168.3.230', '2023-01-12 18:23:41'),
(20, '192.168.3.230', '2023-01-12 18:33:35'),
(21, '192.168.3.230', '2023-01-12 18:33:48'),
(22, '192.168.3.230', '2023-01-12 18:33:54'),
(23, '192.168.3.230', '2023-01-12 18:34:20'),
(24, '192.168.3.230', '2023-01-12 18:34:49'),
(25, '192.168.3.230', '2023-01-12 18:35:18'),
(26, '192.168.3.230', '2023-01-12 18:35:49'),
(27, '192.168.3.230', '2023-01-12 18:42:17'),
(28, '192.168.0.59', '2023-01-13 10:00:39'),
(29, '192.168.0.59', '2023-01-13 10:03:13'),
(30, '192.168.0.209', '2023-01-13 15:43:01'),
(31, '192.168.0.151', '2023-01-17 14:47:34'),
(32, '192.168.0.73', '2023-01-18 12:54:05'),
(33, '192.168.0.73', '2023-01-18 12:55:07'),
(34, '192.168.0.73', '2023-01-18 12:55:07'),
(35, '192.168.0.73', '2023-01-18 12:55:07'),
(36, '192.168.0.73', '2023-01-18 12:55:08'),
(37, '192.168.0.73', '2023-01-18 13:00:16'),
(38, '192.168.0.73', '2023-01-18 13:00:18'),
(39, '192.168.0.73', '2023-01-18 13:00:18'),
(40, '192.168.0.73', '2023-01-18 13:00:36'),
(41, '192.168.0.73', '2023-01-18 13:00:37'),
(42, '192.168.0.73', '2023-01-18 13:08:45'),
(43, '192.168.0.73', '2023-01-18 13:08:46'),
(44, '192.168.0.73', '2023-01-18 13:08:46'),
(45, '192.168.0.73', '2023-01-18 13:08:46'),
(46, '192.168.0.73', '2023-01-18 13:08:51'),
(47, '192.168.0.73', '2023-01-18 13:14:12'),
(48, '192.168.0.73', '2023-01-18 13:14:25'),
(49, '192.168.0.73', '2023-01-18 13:14:31'),
(50, '192.168.0.73', '2023-01-18 13:14:39'),
(51, '192.168.0.73', '2023-01-18 13:14:39'),
(52, '192.168.0.73', '2023-01-18 13:14:40'),
(53, '192.168.0.73', '2023-01-18 13:14:40'),
(54, '192.168.0.73', '2023-01-18 13:14:40'),
(55, '192.168.0.73', '2023-01-18 13:14:40'),
(56, '192.168.0.73', '2023-01-18 13:14:40'),
(57, '192.168.0.73', '2023-01-18 13:14:41'),
(58, '192.168.0.73', '2023-01-18 13:14:41'),
(59, '192.168.0.73', '2023-01-18 13:14:42'),
(60, '192.168.0.73', '2023-01-18 13:15:40'),
(61, '192.168.0.73', '2023-01-18 13:15:41'),
(62, '192.168.0.73', '2023-01-18 13:15:42'),
(63, '192.168.0.73', '2023-01-18 13:15:42'),
(64, '192.168.0.73', '2023-01-18 13:15:42'),
(65, '192.168.0.73', '2023-01-18 13:15:42'),
(66, '192.168.0.73', '2023-01-18 13:15:44'),
(67, '192.168.0.73', '2023-01-18 13:15:46'),
(68, '192.168.0.73', '2023-01-18 13:29:00'),
(69, '192.168.0.73', '2023-01-18 13:29:02'),
(70, '192.168.0.73', '2023-01-18 13:29:02'),
(71, '192.168.0.73', '2023-01-18 13:29:03'),
(72, '192.168.0.73', '2023-01-18 13:29:03'),
(73, '192.168.0.73', '2023-01-18 13:29:03'),
(74, '192.168.0.73', '2023-01-18 13:29:03'),
(75, '192.168.0.73', '2023-01-18 13:29:03'),
(76, '192.168.0.73', '2023-01-18 13:29:03'),
(77, '192.168.0.73', '2023-01-18 13:29:04'),
(78, '192.168.0.73', '2023-01-18 13:29:04'),
(79, '192.168.0.73', '2023-01-18 13:29:20'),
(80, '192.168.0.73', '2023-01-18 13:33:20'),
(81, '192.168.0.73', '2023-01-18 13:34:28'),
(82, '192.168.0.73', '2023-01-18 13:35:05'),
(83, '192.168.0.73', '2023-01-18 13:36:22'),
(84, '192.168.0.73', '2023-01-18 13:38:50'),
(85, '192.168.0.73', '2023-01-18 13:38:59'),
(86, '192.168.0.73', '2023-01-18 13:46:49'),
(87, '192.168.0.73', '2023-01-18 13:47:22'),
(88, '192.168.0.73', '2023-01-18 14:34:00'),
(89, '192.168.0.73', '2023-01-18 14:41:29'),
(90, '192.168.0.76', '2023-01-18 15:23:11'),
(91, '192.168.0.73', '2023-01-18 15:27:15'),
(92, '192.168.0.73', '2023-01-18 15:27:29'),
(93, '192.168.0.73', '2023-01-18 15:27:51'),
(94, '192.168.0.73', '2023-01-18 15:30:08'),
(95, '192.168.0.73', '2023-01-18 15:47:09'),
(96, '192.168.0.76', '2023-01-18 15:47:26'),
(97, '192.168.0.76', '2023-01-18 15:48:13'),
(98, '192.168.0.73', '2023-01-18 15:48:59'),
(99, '192.168.0.73', '2023-01-18 15:49:31'),
(100, '192.168.0.73', '2023-01-18 15:49:33'),
(101, '192.168.0.73', '2023-01-18 15:49:55'),
(102, '192.168.0.73', '2023-01-18 15:50:10'),
(103, '192.168.0.74', '2023-01-18 15:51:20'),
(104, '192.168.0.74', '2023-01-18 15:52:00'),
(105, '192.168.0.76', '2023-01-18 15:53:06'),
(106, '192.168.0.73', '2023-01-18 16:02:19'),
(107, '192.168.0.73', '2023-01-18 16:02:19'),
(108, '192.168.0.89', '2023-01-18 16:02:24'),
(109, '192.168.0.89', '2023-01-18 16:02:45'),
(110, '192.168.0.73', '2023-01-18 16:03:13'),
(111, '192.168.0.73', '2023-01-18 16:03:14'),
(112, '192.168.0.73', '2023-01-18 16:03:14'),
(113, '192.168.0.76', '2023-01-18 16:03:28'),
(114, '192.168.0.76', '2023-01-18 16:06:33'),
(115, '192.168.0.76', '2023-01-18 16:08:39'),
(116, '192.168.0.73', '2023-01-18 16:08:45'),
(117, '192.168.0.73', '2023-01-18 16:08:47'),
(118, '192.168.0.76', '2023-01-18 16:09:05'),
(119, '192.168.0.73', '2023-01-18 16:09:09'),
(120, '192.168.0.73', '2023-01-18 16:09:10'),
(121, '192.168.0.73', '2023-01-18 16:09:13'),
(122, '192.168.0.73', '2023-01-18 16:09:17'),
(123, '192.168.0.73', '2023-01-18 16:09:18'),
(124, '192.168.0.73', '2023-01-18 16:09:23'),
(125, '192.168.0.73', '2023-01-18 16:10:29'),
(126, '192.168.0.73', '2023-01-18 16:10:43'),
(127, '192.168.0.74', '2023-01-18 16:12:23'),
(128, '192.168.0.74', '2023-01-18 16:12:30'),
(129, '192.168.0.74', '2023-01-18 16:12:35'),
(130, '192.168.0.76', '2023-01-18 16:16:30'),
(131, '192.168.0.76', '2023-01-18 16:16:32'),
(132, '192.168.0.73', '2023-01-18 16:18:17'),
(133, '192.168.0.76', '2023-01-18 16:20:12'),
(134, '192.168.0.73', '2023-01-18 16:20:50'),
(135, '192.168.0.73', '2023-01-18 16:23:14'),
(136, '192.168.0.73', '2023-01-18 16:24:27'),
(137, '192.168.0.76', '2023-01-18 16:25:14'),
(138, '192.168.0.73', '2023-01-18 16:32:38'),
(139, '192.168.0.74', '2023-01-18 16:32:53'),
(140, '192.168.0.74', '2023-01-18 16:34:55'),
(141, '192.168.0.76', '2023-01-18 16:42:37'),
(142, '192.168.0.76', '2023-01-18 16:53:04'),
(143, '192.168.0.74', '2023-01-18 16:53:05'),
(144, '192.168.0.73', '2023-01-18 16:59:59'),
(145, '192.168.0.73', '2023-01-18 17:00:01'),
(146, '192.168.0.74', '2023-01-18 17:04:01'),
(147, '192.168.0.76', '2023-01-18 17:06:00'),
(148, '192.168.0.76', '2023-01-18 17:06:04'),
(149, '192.168.0.76', '2023-01-18 17:06:05'),
(150, '192.168.0.76', '2023-01-18 17:06:24'),
(151, '192.168.0.76', '2023-01-18 17:07:09'),
(152, '192.168.0.73', '2023-01-18 17:07:16'),
(153, '192.168.3.230', '2023-01-19 15:56:44'),
(154, '192.168.3.230', '2023-01-19 15:58:38'),
(155, '192.168.3.230', '2023-01-19 16:04:04'),
(156, '192.168.3.230', '2023-01-19 16:04:50'),
(157, '192.168.3.230', '2023-01-19 16:05:08'),
(158, '192.168.3.230', '2023-01-19 16:10:09'),
(159, '192.168.3.230', '2023-01-19 16:10:10'),
(160, '192.168.3.230', '2023-01-19 16:12:27'),
(161, '192.168.3.230', '2023-01-19 16:12:59'),
(162, '192.168.3.230', '2023-01-19 16:13:15'),
(163, '192.168.3.230', '2023-01-19 16:16:53'),
(164, '192.168.3.230', '2023-01-19 16:19:39'),
(165, '192.168.3.230', '2023-01-19 18:33:05'),
(166, '192.168.3.230', '2023-01-19 20:31:42'),
(167, '192.168.3.230', '2023-01-19 20:32:17'),
(168, '192.168.3.230', '2023-01-19 21:04:43'),
(169, '192.168.3.230', '2023-01-19 21:05:12'),
(170, '192.168.3.230', '2023-01-19 21:08:34'),
(171, '192.168.3.230', '2023-01-19 21:26:10'),
(172, '192.168.3.230', '2023-01-19 21:26:16'),
(173, '192.168.3.230', '2023-01-19 21:26:17');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `dernier_module` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `email`, `mdp`, `dernier_module`) VALUES
('a', 'a@gmail.com', '$2y$12$9GfA7o0DLLN16MR9NurORedFYCg5qNlUvtVV3XZpfkLz0NiIXELEm', 'Cryptage'),
('admin', 'admin@gmail.com', '$2y$12$JI1sgnXyRZTvWaUmlPp2C.6zHOthMpJTdI.LCcFx4WaohlNp1lKSq', NULL),
('alexis', 'alexis@gmail.com', '$2y$12$v4CDha19ecJ81XQyEtSHo.23rRl21b4uy9X7ovpNjyuq0B6HFvI0C', 'Cryptage'),
('etude', 'etude@gmail.com', '$2y$12$qdAkmk/GmlBCm5uah4Co9.7gELqzxokS4XiuFmu0sq5u2sRZuzG/u', 'Cryptage'),
('prof', 'fabrice.hoguin@uvsq.fr', '$2y$12$G7M3BdHeEVem1Jl8rhyh2OGTnA48nMH9qHo1h0WhsaEm/6Ak5mY6i', 'Probabilite'),
('qsd', 'qsdqsd@gmail.com', '$2y$12$uLzNJVs15gbI1E.9U6/OleFZRAP3/.0oUSTPH265kKxgGyVQGJcVG', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `nom_module` (`nom_module`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`nom_module`);

--
-- Index pour la table `module_crypto`
--
ALTER TABLE `module_crypto`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `stats_module`
--
ALTER TABLE `stats_module`
  ADD PRIMARY KEY (`id_stats_module`),
  ADD KEY `login` (`login`),
  ADD KEY `nom_module` (`nom_module`);

--
-- Index pour la table `stats_visite`
--
ALTER TABLE `stats_visite`
  ADD PRIMARY KEY (`id_visite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id_historique` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `stats_module`
--
ALTER TABLE `stats_module`
  MODIFY `id_stats_module` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stats_visite`
--
ALTER TABLE `stats_visite`
  MODIFY `id_visite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_2` FOREIGN KEY (`nom_module`) REFERENCES `module` (`nom_module`);

--
-- Contraintes pour la table `stats_module`
--
ALTER TABLE `stats_module`
  ADD CONSTRAINT `stats_module_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
  ADD CONSTRAINT `stats_module_ibfk_2` FOREIGN KEY (`nom_module`) REFERENCES `module` (`nom_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
