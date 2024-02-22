-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 fév. 2024 à 01:25
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `avengers_cyril`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`) VALUES
(79, 'Valgier', 'Jean'),
(80, 'Lefevre', 'Pierre'),
(81, 'Durand', 'Paul'),
(82, 'Dupont', 'Jacques'),
(83, 'Leroy', 'Marie'),
(84, 'Moreau', 'Anne'),
(85, 'Lambert', 'Sophie'),
(86, 'Rousseau', 'Luc'),
(87, 'Fournier', 'Lucie'),
(88, 'Petit', 'François'),
(89, 'Garcia', 'Françoise'),
(90, 'Bonnet', 'Marcel'),
(91, 'Chevalier', 'Marcelle'),
(92, 'Lemaire', 'Gérard'),
(93, 'Perrin', 'Gérardine'),
(94, 'Guerin', 'Gérardus'),
(95, 'Robin', 'Gérardina'),
(96, 'Clement', 'Gérardino'),
(97, 'Morin', 'Gérardine'),
(98, 'Nicolas', 'Gérardus'),
(99, 'Henry', 'Gérardina'),
(100, 'Roussel', 'Francois'),
(101, 'Mathieu', 'Cyril'),
(102, 'Gautier', 'Cyrille'),
(103, 'Masson', 'Cyrilus'),
(104, 'Marchand', 'Cyrilina'),
(105, 'Duval', 'Cyrilino'),
(106, 'Denis', 'Cyriline');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240214060730', NULL, NULL),
('DoctrineMigrations\\Version20240218215827', NULL, NULL),
('DoctrineMigrations\\Version20240218220420', '2024-02-20 09:24:37', 107),
('DoctrineMigrations\\Version20240218223842', '2024-02-20 09:24:37', 207),
('DoctrineMigrations\\Version20240220101948', '2024-02-20 10:20:39', 111),
('DoctrineMigrations\\Version20240220124309', '2024-02-20 12:43:21', 120),
('DoctrineMigrations\\Version20240220134327', '2024-02-20 13:43:40', 42);

-- --------------------------------------------------------

--
-- Structure de la table `faune`
--

DROP TABLE IF EXISTS `faune`;
CREATE TABLE IF NOT EXISTS `faune` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faune`
--

INSERT INTO `faune` (`id`, `nom`, `description`, `image`) VALUES
(19, 'Lion', 'Le Lion est un animal très majestueux', 'assets/images/Lion.png'),
(20, 'Léopard', 'Le Léopard est un animal très tacheté', 'assets/images/Léopard.png'),
(21, 'Panthère', 'La Panthère est un animal très noire', 'assets/images/Panthère.png'),
(22, 'Jaguar', 'Le Jaguar est un animal très tacheté', 'assets/images/Jaguar.png'),
(23, 'Guépard', 'Le Guépard est un animal très rapide', 'assets/images/Guépard.png'),
(24, 'Lynx', 'Le Lynx est un animal très discret', 'assets/images/Lynx.png'),
(25, 'Puma', 'Le Puma est un animal très solitaire', 'assets/images/Puma.png'),
(26, 'Ocelot', 'L\'Ocelot est un animal très discret', 'assets/images/Ocelot.png');

-- --------------------------------------------------------

--
-- Structure de la table `flore`
--

DROP TABLE IF EXISTS `flore`;
CREATE TABLE IF NOT EXISTS `flore` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `flore`
--

INSERT INTO `flore` (`id`, `nom`, `description`, `image`) VALUES
(19, 'Rose', 'La Rose est une fleur très parfumée', 'assets/images/Rose.png'),
(20, 'Tulipe', 'La Tulipe est une fleur très colorée', 'assets/images/Tulipe.png'),
(21, 'Lys', 'Le Lys est une fleur très élégante', 'assets/images/Lys.png'),
(22, 'Orchidée', 'L\'Orchidée est une fleur très exotique', 'assets/images/Orchidée.png'),
(23, 'Dahlia', 'Le Dahlia est une fleur très géométrique', 'assets/images/Dahlia.png'),
(24, 'Pensée', 'La Pensée est une fleur très poétique', 'assets/images/Pensée.png'),
(25, 'Muguet', 'Le Muguet est une fleur très printanière', 'assets/images/Muguet.png'),
(26, 'Lavande', 'La Lavande est une fleur très odorante', 'assets/images/Lavande.png');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auteur_id` int DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_publication` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC634F9960BB6FE6` (`auteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `auteur_id`, `titre`, `date_publication`) VALUES
(79, 79, 'Le palais des secrets', '2003-07-05 00:00:00'),
(80, 80, 'Le palais des secrets', '2003-03-08 00:00:00'),
(81, 81, 'Le labyrinthe des esprits', '2014-07-10 00:00:00'),
(82, 82, 'Le palais de midi', '2009-12-06 00:00:00'),
(83, 83, 'Le palais des promesses', '1999-11-12 00:00:00'),
(84, 84, 'Le palais des rêves', '1985-03-13 00:00:00'),
(85, 85, 'L\'ombre du vent', '2008-11-28 00:00:00'),
(86, 86, 'Un parfum d\'herbe coupée', '2002-05-29 00:00:00'),
(87, 87, 'Le palais des secrets', '1992-02-08 00:00:00'),
(88, 88, 'Le palais des murmures', '1982-11-18 00:00:00'),
(89, 89, 'Le livre des choses perdues', '2011-06-09 00:00:00'),
(90, 90, 'Le palais des murmures', '1994-03-24 00:00:00'),
(91, 91, 'Le prince de la brume', '1978-02-19 00:00:00'),
(92, 92, 'Le voleur d\'ombres', '2004-10-12 00:00:00'),
(93, 93, 'Le voleur d\'ombres', '1998-06-18 00:00:00'),
(94, 94, 'Le palais des murmures', '1994-07-07 00:00:00'),
(95, 95, 'Le palais des mensonges', '2018-03-01 00:00:00'),
(96, 96, 'La Cité des âmes perdues', '1987-07-16 00:00:00'),
(97, 97, 'Le palais des ténèbres', '2006-12-16 00:00:00'),
(98, 98, 'Le palais des minuit', '1973-01-18 00:00:00'),
(99, 99, 'Marina', '2002-09-24 00:00:00'),
(100, 100, 'Le livre des choses perdues', '2000-10-14 00:00:00'),
(101, 101, 'Le palais des regrets', '1994-11-02 00:00:00'),
(102, 102, 'Un parfum d\'herbe coupée', '2001-07-22 00:00:00'),
(103, 103, 'Un parfum d\'herbe coupée', '2013-07-19 00:00:00'),
(104, 104, 'Le palais de minuit', '1988-07-22 00:00:00'),
(105, 105, 'Le palais des minuit', '2019-05-09 00:00:00'),
(106, 106, 'L\'ombre du vent', '2002-12-08 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `marque_page`
--

DROP TABLE IF EXISTS `marque_page`;
CREATE TABLE IF NOT EXISTS `marque_page` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque_page`
--

INSERT INTO `marque_page` (`id`, `url`, `date_creation`, `commentaire`) VALUES
(89, 'www.google1.com', '2022-06-02 00:00:00', 'Chapitre IV'),
(90, 'www.facebook1.com', '2023-06-07 00:00:00', 'Epilogue'),
(91, 'www.twitter1.com', '2013-07-22 00:00:00', 'Page 42'),
(92, 'www.linkedin1.com', '2010-01-26 00:00:00', 'Page 666'),
(93, 'www.github1.com', '2021-12-01 00:00:00', 'Page 1'),
(94, 'www.stackoverflow1.com', '2021-09-27 00:00:00', 'Page 2'),
(95, 'www.youtube1.com', '2018-05-05 00:00:00', 'Page 3'),
(96, 'www.wikipedia1.org', '2019-11-24 00:00:00', 'Chapiitre 1'),
(97, 'www.amazon1.com', '2016-02-25 00:00:00', 'Chapitre 2'),
(98, 'www.ebay1.com', '2023-12-12 00:00:00', 'Chapitre 3'),
(99, 'www.leboncoin1.fr', '2021-05-16 00:00:00', 'Chapitre 4'),
(100, 'www.liberation1.fr', '2020-04-04 00:00:00', 'Chapitre 5'),
(101, 'www.lemonde1.fr', '2011-07-15 00:00:00', 'Chapitre 6'),
(102, 'www.laposte1.fr', '2018-10-19 00:00:00', 'Resume'),
(103, 'www.labanquepostale1.fr', '2020-10-28 00:00:00', 'Introduction'),
(104, 'www.lcl1.fr', '2010-05-11 00:00:00', 'Conclusion'),
(105, 'www.creditmutuel1.fr', '2012-08-14 00:00:00', 'Bibliographie'),
(106, 'www.banquepopulaire1.fr', '2014-02-22 00:00:00', 'Annexe'),
(107, 'www.caisse-epargne1.fr', '2019-11-25 00:00:00', 'Index'),
(108, 'www.societegenerale1.fr', '2023-12-21 00:00:00', 'Glossaire'),
(109, 'www.boursorama1.com', '2010-11-21 00:00:00', 'Table des matières'),
(110, 'www.ing1.fr', '2018-02-24 00:00:00', 'Table des illustrations'),
(111, 'www.hellobank1.fr', '2014-02-12 00:00:00', 'Table des figures'),
(112, 'www.orange1.fr', '2016-12-29 00:00:00', 'Table des tableaux'),
(113, 'www.sfr1.fr', '2010-05-21 00:00:00', 'Table des schémas'),
(114, 'www.bouyguestelecom1.fr', '2011-11-11 00:00:00', 'Table des graphiques'),
(115, 'www.free1.fr', '2016-04-19 00:00:00', 'Table des photos'),
(116, 'www.ubuntu1.com', '2021-09-30 00:00:00', 'Table des annexes');

-- --------------------------------------------------------

--
-- Structure de la table `marque_page_mots_cles`
--

DROP TABLE IF EXISTS `marque_page_mots_cles`;
CREATE TABLE IF NOT EXISTS `marque_page_mots_cles` (
  `marque_page_id` int NOT NULL,
  `mots_cles_id` int NOT NULL,
  PRIMARY KEY (`marque_page_id`,`mots_cles_id`),
  KEY `IDX_DD7D38C7D59CC0F1` (`marque_page_id`),
  KEY `IDX_DD7D38C7C0BE80DB` (`mots_cles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque_page_mots_cles`
--

INSERT INTO `marque_page_mots_cles` (`marque_page_id`, `mots_cles_id`) VALUES
(89, 84),
(89, 86),
(90, 86),
(90, 87),
(90, 93),
(90, 95),
(90, 101),
(91, 84),
(91, 88),
(91, 90),
(91, 97),
(91, 98),
(92, 85),
(92, 93),
(93, 88),
(93, 93),
(93, 104),
(94, 97),
(94, 99),
(94, 103),
(95, 84),
(95, 90),
(95, 104),
(96, 81),
(96, 82),
(96, 91),
(97, 88),
(97, 90),
(97, 101),
(98, 81),
(98, 87),
(98, 93),
(98, 96),
(98, 98),
(99, 83),
(99, 88),
(99, 91),
(99, 94),
(99, 104),
(100, 81),
(100, 82),
(100, 93),
(100, 95),
(100, 102),
(101, 83),
(101, 98),
(102, 92),
(102, 94),
(102, 97),
(102, 99),
(103, 81),
(103, 87),
(103, 96),
(103, 105),
(104, 81),
(104, 88),
(104, 90),
(104, 98),
(104, 100),
(105, 83),
(105, 87),
(105, 89),
(105, 101),
(106, 91),
(106, 92),
(106, 104),
(107, 91),
(107, 101),
(108, 84),
(108, 86),
(108, 87),
(108, 102),
(109, 84),
(109, 95),
(109, 100),
(109, 103),
(109, 105),
(110, 85),
(110, 97),
(110, 101),
(110, 105),
(111, 98),
(111, 102),
(111, 103),
(112, 82),
(112, 87),
(112, 88),
(112, 95),
(112, 97),
(113, 84),
(113, 86),
(113, 89),
(113, 95),
(114, 85),
(114, 90),
(115, 87),
(115, 96),
(116, 87),
(116, 92),
(116, 97);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mots_cles`
--

DROP TABLE IF EXISTS `mots_cles`;
CREATE TABLE IF NOT EXISTS `mots_cles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mot_cle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mots_cles`
--

INSERT INTO `mots_cles` (`id`, `mot_cle`) VALUES
(81, 'suspense'),
(82, 'aventure'),
(83, 'amour'),
(84, 'fantastique'),
(85, 'science-fiction'),
(86, 'policier'),
(87, 'thriller'),
(88, 'horreur'),
(89, 'humour'),
(90, 'poésie'),
(91, 'biographie'),
(92, 'histoire'),
(93, 'conte'),
(94, 'essai'),
(95, 'documentaire'),
(96, 'témoignage'),
(97, 'autobiographie'),
(98, 'journal'),
(99, 'carnet de voyage'),
(100, 'cuisine'),
(101, 'bricolage'),
(102, 'jardinage'),
(103, 'développement personnel'),
(104, 'bien-être'),
(105, 'santé');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `FK_AC634F9960BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);

--
-- Contraintes pour la table `marque_page_mots_cles`
--
ALTER TABLE `marque_page_mots_cles`
  ADD CONSTRAINT `FK_DD7D38C7C0BE80DB` FOREIGN KEY (`mots_cles_id`) REFERENCES `mots_cles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DD7D38C7D59CC0F1` FOREIGN KEY (`marque_page_id`) REFERENCES `marque_page` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
