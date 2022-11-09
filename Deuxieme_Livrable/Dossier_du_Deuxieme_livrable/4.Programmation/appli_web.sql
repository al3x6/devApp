-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 nov. 2022 à 10:55
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appli_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_historique` int(5) NOT NULL,
  `login` varchar(30) NOT NULL,
  `nom_module` varchar(30) NOT NULL,
  `historique_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `login`, `nom_module`, `historique_date`) VALUES
(1, 'user', 'proba', '2022-11-09 10:19:07');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `nom_module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`nom_module`) VALUES
('proba');

-- --------------------------------------------------------

--
-- Structure de la table `stats_module`
--

CREATE TABLE `stats_module` (
  `id_stats_module` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `login` varchar(30) NOT NULL,
  `nom_module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `stats_visite`
--

CREATE TABLE `stats_visite` (
  `id_visite` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stats_visite`
--

INSERT INTO `stats_visite` (`id_visite`, `date`) VALUES
(1, '2022-11-09 10:04:54'),
(2, '2022-11-09 10:05:27');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `email`, `mdp`) VALUES
('user', 'user@user.fr', 'mdp');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id_historique`),
  ADD KEY `login` (`login`),
  ADD KEY `nom_module` (`nom_module`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`nom_module`);

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
  MODIFY `id_historique` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `stats_module`
--
ALTER TABLE `stats_module`
  MODIFY `id_stats_module` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stats_visite`
--
ALTER TABLE `stats_visite`
  MODIFY `id_visite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`login`) REFERENCES `utilisateur` (`login`),
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
