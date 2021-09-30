-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 30 sep. 2021 à 03:33
-- Version du serveur :  10.5.12-MariaDB-0ubuntu0.21.04.1
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `AIC`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendrier`
--

CREATE TABLE `calendrier` (
  `id` int(11) NOT NULL,
  `culture_id` int(11) DEFAULT NULL,
  `mois` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `culture`
--

CREATE TABLE `culture` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `culture`
--

INSERT INTO `culture` (`id`, `nom`) VALUES
(1, 'citron'),
(2, 'vanille'),
(3, 'apiculture'),
(4, 'corossole'),
(5, 'ananas'),
(6, 'litchis'),
(7, 'riz'),
(8, 'citron'),
(9, 'vanille'),
(10, 'apiculture'),
(11, 'corossole'),
(12, 'ananas'),
(13, 'litchis'),
(14, 'riz');

-- --------------------------------------------------------

--
-- Structure de la table `culture_region`
--

CREATE TABLE `culture_region` (
  `culture_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210929053949', '2021-09-29 07:39:55', 179),
('DoctrineMigrations\\Version20210929065828', '2021-09-29 08:58:43', 69),
('DoctrineMigrations\\Version20210929123438', '2021-09-29 14:34:56', 76);

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE `donnee` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mois_id` int(11) DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `donnee`
--

INSERT INTO `donnee` (`id`, `type`, `mois_id`, `annee_id`) VALUES
(1, 'brute', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `floraison`
--

CREATE TABLE `floraison` (
  `id` int(11) NOT NULL,
  `culture_id` int(11) NOT NULL,
  `mois` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `mois` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `month`
--

INSERT INTO `month` (`id`, `mois`) VALUES
(1, 'Janvier'),
(2, 'fevrier'),
(3, 'mars'),
(4, 'mai'),
(5, 'avril'),
(6, 'juin'),
(7, 'juillet'),
(8, 'aout'),
(9, 'septembre'),
(10, 'octobre'),
(11, 'novembre'),
(12, 'decembre');

-- --------------------------------------------------------

--
-- Structure de la table `piece_jointe`
--

CREATE TABLE `piece_jointe` (
  `id` int(11) NOT NULL,
  `donnee_id` int(11) DEFAULT NULL,
  `culture_id` int(11) DEFAULT NULL,
  `solution_id` int(11) DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `piece_jointe`
--

INSERT INTO `piece_jointe` (`id`, `donnee_id`, `culture_id`, `solution_id`, `lien`, `contenu`, `type`) VALUES
(1, NULL, 1, NULL, 'uploads/images/citron-coupe-3000x2000.jpg', NULL, 'image'),
(2, NULL, 2, NULL, 'uploads/images/vanille.jpeg', NULL, 'image'),
(3, NULL, 3, NULL, 'uploads/images/apiculture.jpg', NULL, 'image'),
(4, NULL, 4, NULL, 'uploads/images/corossole.jpg', NULL, ''),
(5, NULL, 5, NULL, 'uploads/images/ananas.jpg', NULL, 'image'),
(6, NULL, 6, NULL, 'uploads/images/letchis.jpg', NULL, 'image'),
(7, NULL, 7, NULL, 'riz.jpg', NULL, 'image'),
(8, NULL, 1, NULL, 'uploads/images/citron-coupe-3000x2000.jpg', NULL, 'image'),
(9, NULL, 2, NULL, 'uploads/images/vanille.jpeg', NULL, 'image'),
(10, NULL, 3, NULL, 'uploads/images/apiculture.jpg', NULL, 'image'),
(11, NULL, 4, NULL, 'uploads/images/corossole.jpg', NULL, ''),
(12, NULL, 5, NULL, 'uploads/images/ananas.jpg', NULL, 'image'),
(13, NULL, 6, NULL, 'uploads/images/letchis.jpg', NULL, 'image'),
(14, NULL, 7, NULL, 'riz.jpg', NULL, 'image');

-- --------------------------------------------------------

--
-- Structure de la table `plantation`
--

CREATE TABLE `plantation` (
  `id` int(11) NOT NULL,
  `culture_id` int(11) NOT NULL,
  `mois` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `precipitation`
--

CREATE TABLE `precipitation` (
  `id` int(11) NOT NULL,
  `donnee_id` int(11) DEFAULT NULL,
  `taux` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `contenu` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recolte`
--

CREATE TABLE `recolte` (
  `id` int(11) NOT NULL,
  `culture_id` int(11) NOT NULL,
  `mois` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `donnee_id` int(11) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `donnee_id`, `population`, `nom`) VALUES
(1, NULL, 25000000, 'Madagascar');

-- --------------------------------------------------------

--
-- Structure de la table `sol`
--

CREATE TABLE `sol` (
  `id` int(11) NOT NULL,
  `donnee_id` int(11) DEFAULT NULL,
  `constituants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `argile` double DEFAULT NULL,
  `limon` double DEFAULT NULL,
  `sable` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `publication_id` int(11) DEFAULT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `temperature`
--

CREATE TABLE `temperature` (
  `id` int(11) NOT NULL,
  `donnee_id` int(11) DEFAULT NULL,
  `valeur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `region_id`, `email`, `roles`, `password`, `nom`, `prenom`, `telephone`) VALUES
(1, 1, 'bcam.nina@gmail.com', '[]', 'password', 'RAJERISON', 'Fabien Julio', '0345256857'),
(2, 1, 'fabien.rajerison@esti.mg', '[]', 'password', 'RAJERISON', 'Fabien Julio', '0345256857'),
(3, 1, 'bupifo@mailinator.com', '[]', 'password', 'Et saepe consectetur', 'Quam occaecat in sed', '619-4654');

-- --------------------------------------------------------

--
-- Structure de la table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `calendrier`
--
ALTER TABLE `calendrier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B2753CB9B108249D` (`culture_id`);

--
-- Index pour la table `culture`
--
ALTER TABLE `culture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `culture_region`
--
ALTER TABLE `culture_region`
  ADD PRIMARY KEY (`culture_id`,`region_id`),
  ADD KEY `IDX_D87CDE81B108249D` (`culture_id`),
  ADD KEY `IDX_D87CDE8198260155` (`region_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8527605CFA0749B8` (`mois_id`),
  ADD KEY `IDX_8527605C543EC5F0` (`annee_id`);

--
-- Index pour la table `floraison`
--
ALTER TABLE `floraison`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8984C2F8B108249D` (`culture_id`);

--
-- Index pour la table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AB5111D4C310CCAD` (`donnee_id`),
  ADD KEY `IDX_AB5111D4B108249D` (`culture_id`),
  ADD KEY `IDX_AB5111D41C0BE183` (`solution_id`);

--
-- Index pour la table `plantation`
--
ALTER TABLE `plantation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B789E5BAB108249D` (`culture_id`);

--
-- Index pour la table `precipitation`
--
ALTER TABLE `precipitation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBC9E244C310CCAD` (`donnee_id`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recolte`
--
ALTER TABLE `recolte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3433713CB108249D` (`culture_id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F62F176C310CCAD` (`donnee_id`);

--
-- Index pour la table `sol`
--
ALTER TABLE `sol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F975500C310CCAD` (`donnee_id`);

--
-- Index pour la table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9F3329DB38B217A7` (`publication_id`);

--
-- Index pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BE4E2A6CC310CCAD` (`donnee_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D64998260155` (`region_id`);

--
-- Index pour la table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `calendrier`
--
ALTER TABLE `calendrier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `culture`
--
ALTER TABLE `culture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `donnee`
--
ALTER TABLE `donnee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `floraison`
--
ALTER TABLE `floraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `plantation`
--
ALTER TABLE `plantation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `precipitation`
--
ALTER TABLE `precipitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recolte`
--
ALTER TABLE `recolte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sol`
--
ALTER TABLE `sol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `calendrier`
--
ALTER TABLE `calendrier`
  ADD CONSTRAINT `FK_B2753CB9B108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`);

--
-- Contraintes pour la table `culture_region`
--
ALTER TABLE `culture_region`
  ADD CONSTRAINT `FK_D87CDE8198260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D87CDE81B108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `FK_8527605C543EC5F0` FOREIGN KEY (`annee_id`) REFERENCES `year` (`id`),
  ADD CONSTRAINT `FK_8527605CFA0749B8` FOREIGN KEY (`mois_id`) REFERENCES `month` (`id`);

--
-- Contraintes pour la table `floraison`
--
ALTER TABLE `floraison`
  ADD CONSTRAINT `FK_8984C2F8B108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`);

--
-- Contraintes pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `FK_AB5111D41C0BE183` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`id`),
  ADD CONSTRAINT `FK_AB5111D4B108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`),
  ADD CONSTRAINT `FK_AB5111D4C310CCAD` FOREIGN KEY (`donnee_id`) REFERENCES `donnee` (`id`);

--
-- Contraintes pour la table `plantation`
--
ALTER TABLE `plantation`
  ADD CONSTRAINT `FK_B789E5BAB108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`);

--
-- Contraintes pour la table `precipitation`
--
ALTER TABLE `precipitation`
  ADD CONSTRAINT `FK_FBC9E244C310CCAD` FOREIGN KEY (`donnee_id`) REFERENCES `donnee` (`id`);

--
-- Contraintes pour la table `recolte`
--
ALTER TABLE `recolte`
  ADD CONSTRAINT `FK_3433713CB108249D` FOREIGN KEY (`culture_id`) REFERENCES `culture` (`id`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `FK_F62F176C310CCAD` FOREIGN KEY (`donnee_id`) REFERENCES `donnee` (`id`);

--
-- Contraintes pour la table `sol`
--
ALTER TABLE `sol`
  ADD CONSTRAINT `FK_F975500C310CCAD` FOREIGN KEY (`donnee_id`) REFERENCES `donnee` (`id`);

--
-- Contraintes pour la table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `FK_9F3329DB38B217A7` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`id`);

--
-- Contraintes pour la table `temperature`
--
ALTER TABLE `temperature`
  ADD CONSTRAINT `FK_BE4E2A6CC310CCAD` FOREIGN KEY (`donnee_id`) REFERENCES `donnee` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64998260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
