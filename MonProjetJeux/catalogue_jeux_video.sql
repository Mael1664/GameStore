-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 mai 2026 à 11:33
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
-- Base de données : `catalogue_jeux_video`
--

-- --------------------------------------------------------

--
-- Structure de la table `associer_jeu_genre`
--

CREATE TABLE `associer_jeu_genre` (
  `idJeu` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `associer_jeu_genre`
--

INSERT INTO `associer_jeu_genre` (`idJeu`, `idGenre`) VALUES
(1, 1),
(1, 2),
(2, 5),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `associer_jeu_plateforme`
--

CREATE TABLE `associer_jeu_plateforme` (
  `idJeu` int(11) NOT NULL,
  `idPlateforme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `associer_jeu_plateforme`
--

INSERT INTO `associer_jeu_plateforme` (`idJeu`, `idPlateforme`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `cle_activation`
--

CREATE TABLE `cle_activation` (
  `idCle` int(11) NOT NULL,
  `codeCle` varchar(255) NOT NULL,
  `statut` varchar(50) DEFAULT 'disponible',
  `idLigneProduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cle_activation`
--

INSERT INTO `cle_activation` (`idCle`, `codeCle`, `statut`, `idLigneProduit`) VALUES
(1, 'ERPC-1234-ABCD-5678', 'disponible', 1),
(2, 'ERPC-9999-AAAA-1111', 'disponible', 1),
(3, 'ERPS-7777-BBBB-2222', 'vendu', 2),
(4, 'FCPC-8888-CCCC-3333', 'disponible', 3),
(5, 'GTAV-5555-DDDD-4444', 'disponible', 6);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL DEFAULT current_timestamp(),
  `statut` varchar(50) DEFAULT 'en_attente',
  `total` decimal(10,2) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `statut`, `total`, `idUtilisateur`) VALUES
(1, '2023-11-15 10:30:00', 'payée', 59.99, 2),
(2, '2023-12-01 18:45:00', 'payée', 44.98, 3);

-- --------------------------------------------------------

--
-- Structure de la table `developpeur`
--

CREATE TABLE `developpeur` (
  `idDeveloppeur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `developpeur`
--

INSERT INTO `developpeur` (`idDeveloppeur`, `nom`, `pays`) VALUES
(1, 'Ubisoft Montreal', 'Canada'),
(2, 'EA Sports', 'Canada'),
(3, 'Nintendo EPD', 'Japon'),
(4, 'Naughty Dog', 'USA'),
(5, 'FromSoftware', 'Japon'),
(6, 'CD Projekt Red', 'Pologne'),
(7, 'Rockstar North', 'Ecosse');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `idEditeur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`idEditeur`, `nom`, `pays`) VALUES
(1, 'Ubisoft', 'France'),
(2, 'Electronic Arts', 'USA'),
(3, 'Nintendo', 'Japon'),
(4, 'Sony Interactive', 'Japon'),
(5, 'Bandai Namco', 'Japon'),
(6, 'CD Projekt', 'Pologne'),
(7, 'Rockstar Games', 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `libelle`) VALUES
(1, 'Action'),
(3, 'Aventure'),
(4, 'FPS'),
(14, 'Horreur'),
(2, 'RPG'),
(7, 'Simulation'),
(5, 'Sport'),
(6, 'Stratégie');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `idJeu` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `urlImage` varchar(255) DEFAULT NULL,
  `idEditeur` int(11) DEFAULT NULL,
  `idDeveloppeur` int(11) DEFAULT NULL,
  `idPegi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`idJeu`, `titre`, `description`, `dateSortie`, `urlImage`, `idEditeur`, `idDeveloppeur`, `idPegi`) VALUES
(1, 'Elden Ring', 'Un Action-RPG dans un monde ouvert sombre fantasy conçu par Hidetaka Miyazaki et George R.R. Martin.', '2022-02-25', 'elden_ring.jpg', 5, 5, 4),
(2, 'FIFA 24 (FC 24)', 'Le jeu de simulation de football le plus réaliste avec plus de 19 000 joueurs sous licence.', '2023-09-29', 'fc24.jpg', 2, 2, 1),
(3, 'Cyberpunk 2077', 'Un jeu d\'action-aventure en monde ouvert qui se déroule à Night City, une mégalopole obsédée par le pouvoir.', '2020-12-10', 'cyberpunk.jpg', 6, 6, 5),
(4, 'The Legend of Zelda: Tears of the Kingdom', 'Une aventure épique à travers les terres et les cieux d\'Hyrule.', '2023-05-12', 'zelda_totk.jpg', 3, 3, 3),
(5, 'Grand Theft Auto V', 'Un jeune arnaqueur, un braqueur de banque à la retraite et un psychopathe effrayant se retrouvent piégés.', '2013-09-17', 'gta5.jpg', 7, 7, 5),
(6, 'Assassin\'s Creed Mirage', 'Découvrez l\'histoire de Basim, un voleur à la tire habile cherchant des réponses dans les rues animées du Bagdad du IXe siècle.', '2023-10-05', 'ac_mirage.jpg', 1, 1, 5),
(7, 'The Last of Us Part I', 'Dans une civilisation ravagée, Joel, un protagoniste désabusé, est engagé pour faire sortir Ellie, 14 ans, d\'une zone de quarantaine.', '2022-09-02', 'tlou.jpg', 4, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `idLigneCommande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixUnitaire` decimal(10,2) NOT NULL,
  `idCommande` int(11) DEFAULT NULL,
  `idLigneProduit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`idLigneCommande`, `quantite`, `prixUnitaire`, `idCommande`, `idLigneProduit`) VALUES
(1, 1, 59.99, 1, 2),
(2, 1, 29.99, 2, 5),
(3, 1, 14.99, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_produit`
--

CREATE TABLE `ligne_produit` (
  `idLigneProduit` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `idJeu` int(11) DEFAULT NULL,
  `idPlateforme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_produit`
--

INSERT INTO `ligne_produit` (`idLigneProduit`, `prix`, `stock`, `idJeu`, `idPlateforme`) VALUES
(1, 39.99, 50, 1, 1),
(2, 59.99, 20, 1, 2),
(3, 45.00, 100, 2, 1),
(4, 69.99, 30, 2, 2),
(5, 29.99, 15, 3, 1),
(6, 14.99, 200, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pegi`
--

CREATE TABLE `pegi` (
  `idPegi` int(11) NOT NULL,
  `ageMinimum` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pegi`
--

INSERT INTO `pegi` (`idPegi`, `ageMinimum`, `description`) VALUES
(1, 3, 'Convient à toutes les classes d\'âge.'),
(2, 7, 'Peut contenir des scènes ou sons effrayants.'),
(3, 12, 'Peut contenir de la violence ou des grossièretés légères.'),
(4, 16, 'Peut contenir de la violence réaliste ou de la nudité.'),
(5, 18, 'Contenu violent, grossier ou sexuel explicite.');

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

CREATE TABLE `plateforme` (
  `idPlateforme` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`idPlateforme`, `nom`) VALUES
(4, 'Nintendo Switch'),
(1, 'PC (Steam)'),
(2, 'PlayStation 5'),
(3, 'Xbox Series X');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePasse`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin@ecole.fr', 'admin123', 'admin'),
(2, 'Dupont', 'Thomas', 'thomas@gmail.com', 'user123', 'client'),
(3, 'Martin', 'Sophie', 'sophie@hotmail.fr', 'user123', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `associer_jeu_genre`
--
ALTER TABLE `associer_jeu_genre`
  ADD PRIMARY KEY (`idJeu`,`idGenre`),
  ADD KEY `idGenre` (`idGenre`);

--
-- Index pour la table `associer_jeu_plateforme`
--
ALTER TABLE `associer_jeu_plateforme`
  ADD PRIMARY KEY (`idJeu`,`idPlateforme`),
  ADD KEY `idPlateforme` (`idPlateforme`);

--
-- Index pour la table `cle_activation`
--
ALTER TABLE `cle_activation`
  ADD PRIMARY KEY (`idCle`),
  ADD UNIQUE KEY `codeCle` (`codeCle`),
  ADD KEY `idLigneProduit` (`idLigneProduit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `developpeur`
--
ALTER TABLE `developpeur`
  ADD PRIMARY KEY (`idDeveloppeur`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`idEditeur`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`),
  ADD KEY `fk_jeu_editeur` (`idEditeur`),
  ADD KEY `fk_jeu_developpeur` (`idDeveloppeur`),
  ADD KEY `fk_jeu_pegi` (`idPegi`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`idLigneCommande`),
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idLigneProduit` (`idLigneProduit`);

--
-- Index pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  ADD PRIMARY KEY (`idLigneProduit`),
  ADD KEY `idJeu` (`idJeu`),
  ADD KEY `idPlateforme` (`idPlateforme`);

--
-- Index pour la table `pegi`
--
ALTER TABLE `pegi`
  ADD PRIMARY KEY (`idPegi`);

--
-- Index pour la table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`idPlateforme`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cle_activation`
--
ALTER TABLE `cle_activation`
  MODIFY `idCle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `developpeur`
--
ALTER TABLE `developpeur`
  MODIFY `idDeveloppeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `idEditeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `idLigneCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  MODIFY `idLigneProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `pegi`
--
ALTER TABLE `pegi`
  MODIFY `idPegi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `idPlateforme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `associer_jeu_genre`
--
ALTER TABLE `associer_jeu_genre`
  ADD CONSTRAINT `associer_jeu_genre_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `associer_jeu_genre_ibfk_2` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`) ON DELETE CASCADE;

--
-- Contraintes pour la table `associer_jeu_plateforme`
--
ALTER TABLE `associer_jeu_plateforme`
  ADD CONSTRAINT `associer_jeu_plateforme_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `associer_jeu_plateforme_ibfk_2` FOREIGN KEY (`idPlateforme`) REFERENCES `plateforme` (`idPlateforme`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cle_activation`
--
ALTER TABLE `cle_activation`
  ADD CONSTRAINT `cle_activation_ibfk_1` FOREIGN KEY (`idLigneProduit`) REFERENCES `ligne_produit` (`idLigneProduit`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `fk_jeu_developpeur` FOREIGN KEY (`idDeveloppeur`) REFERENCES `developpeur` (`idDeveloppeur`),
  ADD CONSTRAINT `fk_jeu_editeur` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`),
  ADD CONSTRAINT `fk_jeu_pegi` FOREIGN KEY (`idPegi`) REFERENCES `pegi` (`idPegi`);

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`idLigneProduit`) REFERENCES `ligne_produit` (`idLigneProduit`);

--
-- Contraintes pour la table `ligne_produit`
--
ALTER TABLE `ligne_produit`
  ADD CONSTRAINT `ligne_produit_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`),
  ADD CONSTRAINT `ligne_produit_ibfk_2` FOREIGN KEY (`idPlateforme`) REFERENCES `plateforme` (`idPlateforme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
