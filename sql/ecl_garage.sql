-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 avr. 2020 à 08:36
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecl_garage`
--
CREATE DATABASE IF NOT EXISTS `ecl_garage` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `ecl_garage`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(45) COLLATE utf8_bin NOT NULL,
  `commune` int(11) NOT NULL,
  `responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `nom`, `prenom`, `commune`, `responsable`) VALUES
(18, 'Chen', 'Liming', 16, 14),
(20, 'Dubois', 'Arthur', 24, 10);

--
-- Déclencheurs `client`
--
DELIMITER $$
CREATE TRIGGER `maj_commune_after_client_delete` AFTER DELETE ON `client` FOR EACH ROW UPDATE commune SET nbclients = nbclients - 1 WHERE idcommune = OLD.commune
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `maj_commune_after_client_insert` AFTER INSERT ON `client` FOR EACH ROW UPDATE commune SET nbclients = nbclients + 1 WHERE idcommune = NEW.commune
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `maj_commune_after_client_update` AFTER UPDATE ON `client` FOR EACH ROW BEGIN
UPDATE commune SET nbclients = nbclients - 1 WHERE idcommune = OLD.commune;
UPDATE commune SET nbclients = nbclients + 1 WHERE idcommune = NEW.commune;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `idcommune` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `nbclients` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`idcommune`, `nom`, `nbclients`) VALUES
(16, 'Lyon', 1),
(19, 'Paris', 0),
(23, 'Marseille', 0),
(24, 'Lille', 1),
(25, 'Ecully', 0);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idemploye` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(45) COLLATE utf8_bin NOT NULL,
  `nbreparations` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idemploye`, `nom`, `prenom`, `nbreparations`) VALUES
(10, 'Martin', 'Jean', 1),
(11, 'Petit', 'Julien', 2),
(14, 'Dupont', 'Pierre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

CREATE TABLE `forfait` (
  `idforfait` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`idforfait`, `description`, `prix`) VALUES
(13, 'Vidange', 120),
(14, 'Changement de freins', 280),
(15, 'Lavage', 40);

-- --------------------------------------------------------

--
-- Structure de la table `reparation`
--

CREATE TABLE `reparation` (
  `idreparation` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `technicien` int(11) NOT NULL,
  `voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reparation`
--

INSERT INTO `reparation` (`idreparation`, `description`, `prix`, `technicien`, `voiture`) VALUES
(21, 'Changement de freins', 280, 10, 14),
(24, 'Porte bloquée, à remplacer', 815, 11, 13),
(25, 'Vitre cassée, à remplacer', 150, 14, 13),
(26, 'Lavage', 40, 11, 14);

--
-- Déclencheurs `reparation`
--
DELIMITER $$
CREATE TRIGGER `maj_employe_after_reparation_delete` AFTER DELETE ON `reparation` FOR EACH ROW UPDATE employe SET nbreparations = nbreparations - 1 WHERE idemploye = OLD.technicien
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `maj_employe_after_reparation_insert` AFTER INSERT ON `reparation` FOR EACH ROW UPDATE employe SET nbreparations = nbreparations + 1 WHERE idemploye = NEW.technicien
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `maj_employe_after_reparation_update` AFTER UPDATE ON `reparation` FOR EACH ROW BEGIN
UPDATE employe SET nbreparations = nbreparations - 1 WHERE idemploye = OLD.technicien;
UPDATE employe SET nbreparations = nbreparations + 1 WHERE idemploye = NEW.technicien;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `idvoiture` int(11) NOT NULL,
  `immatriculation` varchar(20) COLLATE utf8_bin NOT NULL,
  `marque` varchar(45) COLLATE utf8_bin NOT NULL,
  `type` varchar(45) COLLATE utf8_bin NOT NULL,
  `annee` int(11) NOT NULL,
  `kilometres` int(11) NOT NULL,
  `datearrivee` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `proprietaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`idvoiture`, `immatriculation`, `marque`, `type`, `annee`, `kilometres`, `datearrivee`, `proprietaire`) VALUES
(13, 'LS-134-ZE', 'Toyota', 'Yaris', 2008, 64979, '2019-12-03 12:15:11', 20),
(14, 'VS-568-AZ', 'Citroen', 'C5', 2010, 156748, '2019-12-03 12:16:10', 18),
(15, 'FG-546-WX', 'Peugeot', '3008', 2015, 156549, '2019-12-03 12:16:39', 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`),
  ADD KEY `fk_client_commune` (`commune`),
  ADD KEY `fk_client_employe` (`responsable`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`idcommune`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idemploye`);

--
-- Index pour la table `forfait`
--
ALTER TABLE `forfait`
  ADD PRIMARY KEY (`idforfait`);

--
-- Index pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`idreparation`),
  ADD KEY `fk_reparation_employe` (`technicien`),
  ADD KEY `fk_reparation_voiture` (`voiture`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`idvoiture`),
  ADD UNIQUE KEY `unique_immatriculation` (`immatriculation`),
  ADD KEY `fk_voiture_client` (`proprietaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `idcommune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `idemploye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `forfait`
--
ALTER TABLE `forfait`
  MODIFY `idforfait` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `idreparation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `idvoiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_commune` FOREIGN KEY (`commune`) REFERENCES `commune` (`idcommune`),
  ADD CONSTRAINT `fk_client_employe` FOREIGN KEY (`responsable`) REFERENCES `employe` (`idemploye`);

--
-- Contraintes pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD CONSTRAINT `fk_reparation_employe` FOREIGN KEY (`technicien`) REFERENCES `employe` (`idemploye`),
  ADD CONSTRAINT `fk_reparation_voiture` FOREIGN KEY (`voiture`) REFERENCES `voiture` (`idvoiture`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `fk_voiture_client` FOREIGN KEY (`proprietaire`) REFERENCES `client` (`idclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
