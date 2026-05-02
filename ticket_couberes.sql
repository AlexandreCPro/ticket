-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 mai 2026 à 00:02
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE `agences` (
  `id` int(11) NOT NULL,
  `nom_agence` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom_agence`, `code_postal`) VALUES
(1, 'AutoMoto Brive', 19100),
(2, 'AutoMoto Limoges', 87000);

-- --------------------------------------------------------

--
-- Structure de la table `assignation`
--

CREATE TABLE `assignation` (
  `iduser` int(11) DEFAULT NULL,
  `idtickets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `assignation`
--

INSERT INTO `assignation` (`iduser`, `idtickets`) VALUES
(6, 15),
(7, 17);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `description`) VALUES
(1, 'Matériel informatique', 'Problème avec un ordinateur, écran, imprimante...'),
(2, 'Logiciel / Application', 'Bug ou demande d\'installation d\'un logiciel métier.'),
(3, 'Réseau / Connexion', 'Problème Internet, réseau local, Wi-Fi ou VPN.'),
(4, 'Téléphonie', 'Téléphone fixe, mobile ou messagerie vocale.'),
(5, 'Accès / Droits', 'Création de compte, mot de passe ou droits d\'accès.'),
(6, 'Autre', 'Toute autre demande ne correspondant pas aux catégories.');

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` int(11) NOT NULL,
  `nomprofil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id`, `nomprofil`) VALUES
(1, 'administrateur'),
(2, 'technicien'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `nom_statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom_statut`) VALUES
(1, 'Nouveau'),
(2, 'En cours'),
(3, 'Clos'),
(4, 'Cloturé');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idstatut` int(11) DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `objet`, `contenu`, `iduser`, `idstatut`, `idcategorie`) VALUES
(15, 'test brive', 'ahah beh', 3, 2, 6),
(16, 'test Limoges', 'ahah', 4, 2, 3),
(17, 'test 2', 'hahahahahaha', 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profil_id` int(11) DEFAULT NULL,
  `agence_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `pwd`, `profil_id`, `agence_id`) VALUES
(1, 'COUBERES', '$2b$12$oExzQld4Iiihma26fzggKOf2gSD7vkoex9siEaYZrpX1w6lg199I2', 1, NULL),
(2, 'KOUJI', '$2y$10$w6a.EPzbTgoCoaA06x1eOOMqDsZZMiu03OklrVYYVzQMoLqK57bT2', 2, 1),
(3, 'LEVY', '$2y$10$Qiie4ubcxUv8K.8ZolUWfeAW0epk1E7xaU8Gf2HkU7i44k8ncslKK', 3, 1),
(4, 'LOEB', '$2y$10$pN37ijnrF0Dhse/kpMmYnuH1xdjBkgt.ZKci33v8BKXBJJJW4LkWq', 3, 2),
(5, 'DUPONT', '$2y$10$zrCa6Cj3x2j1gezMi/4.Q.jlktxN334fMxrGqHuQ6H5Rk.ucGXym2', 2, 2),
(6, 'CLAUDE', '$2y$10$K2iOflFUJBt6sPbmoQW/aOT7klq0eJtkWbJvm/E05f55tYZUuwbD6', 2, 1),
(7, 'ZEN', '$2y$10$.xyyk5KVHO6thSmKv7QdS.hvBOb8EQkcKpC38F.jLDbhozerk5RL.', 2, 2),
(8, 'GRANDJEAN', '$2y$10$iusq5asbGNECcGv6LgkIle1/svBxm5JjZ71.rvrq18okyuSX9hAJm', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `assignation`
--
ALTER TABLE `assignation`
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idtickets` (`idtickets`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idstatut` (`idstatut`),
  ADD KEY `idcategorie` (`idcategorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profil_id` (`profil_id`),
  ADD KEY `users_ibfk_2` (`agence_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agences`
--
ALTER TABLE `agences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assignation`
--
ALTER TABLE `assignation`
  ADD CONSTRAINT `assignation_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assignation_ibfk_2` FOREIGN KEY (`idtickets`) REFERENCES `tickets` (`id`);

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`idstatut`) REFERENCES `statut` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
