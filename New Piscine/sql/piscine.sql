-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 14 jan. 2018 à 19:10
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CodeCategorie` int(11) NOT NULL,
  `NomCategorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE `concerner` (
  `IdConcerner` int(11) NOT NULL,
  `NumReservation` int(11) NOT NULL,
  `NumJeux` int(11) NOT NULL,
  `NumZone` int(11) NOT NULL,
  `Nombre` int(11) DEFAULT NULL,
  `Recu` tinyint(1) DEFAULT NULL,
  `Retour` tinyint(1) DEFAULT NULL,
  `don` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `NumContact` int(11) NOT NULL,
  `NomContact` varchar(255) DEFAULT NULL,
  `PrenomContact` varchar(255) DEFAULT NULL,
  `NumTelContact` varchar(255) DEFAULT NULL,
  `MailContact` varchar(255) DEFAULT NULL,
  `NumEditeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `NumEditeur` int(11) NOT NULL,
  `NomEditeur` varchar(255) DEFAULT NULL,
  `VilleEditeur` varchar(255) DEFAULT NULL,
  `RueEditeur` varchar(255) DEFAULT NULL,
  `CodePostaleEditeur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`NumEditeur`, `NomEditeur`, `VilleEditeur`, `RueEditeur`, `CodePostaleEditeur`) VALUES
(1, 'nathan', 'sucy', 'carnot', '94370');

-- --------------------------------------------------------

--
-- Structure de la table `Festival`
--

CREATE TABLE `Festival` (
  `AnneeFestival` int(11) NOT NULL,
  `DateFestival` date DEFAULT NULL,
  `NombreTables` int(11) DEFAULT NULL,
  `PrixPlaceStandard` double DEFAULT NULL,
  `Courant` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Festival`
--

INSERT INTO `Festival` (`AnneeFestival`, `DateFestival`, `NombreTables`, `PrixPlaceStandard`, `Courant`) VALUES
(2015, '2018-01-23', 25, 263, 1),
(2016, '0000-00-00', 25, 23, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `NumJeux` int(11) NOT NULL,
  `FestivalJeux` int(11) DEFAULT NULL,
  `NomJeux` varchar(255) DEFAULT NULL,
  `NombreJoueur` int(11) DEFAULT NULL,
  `DateSortie` date DEFAULT NULL,
  `DureePartie` int(11) DEFAULT NULL,
  `NumEditeur` int(11) NOT NULL,
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`NumJeux`, `FestivalJeux`, `NomJeux`, `NombreJoueur`, `DateSortie`, `DureePartie`, `NumEditeur`, `CodeCategorie`) VALUES
(1, 2015, 'de', 41, '2018-01-10', 41, 1, 4),
(2, 2015, 'ded', 45, '2018-01-11', 25, 1, 3),
(3, 2015, 'fr', 12, '2018-01-10', 23, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `localiser`
--

CREATE TABLE `localiser` (
  `IdLocaliser` int(11) NOT NULL,
  `NumReservation` int(11) NOT NULL,
  `NumZone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `NumLogement` int(11) NOT NULL,
  `NomLogement` varchar(255) DEFAULT NULL,
  `VilleLogement` varchar(255) DEFAULT NULL,
  `RueLogement` varchar(255) DEFAULT NULL,
  `CodePostaleLogement` varchar(255) DEFAULT NULL,
  `NombreChambres` int(11) DEFAULT NULL,
  `CoutLongementNuit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`NumLogement`, `NomLogement`, `VilleLogement`, `RueLogement`, `CodePostaleLogement`, `NombreChambres`, `CoutLongementNuit`) VALUES
(1, 'def', 'de', 'de', 'de', 15, 12),
(2, 's', 'cs', 'sc', 'sc', 14, 14),
(3, 'bonjour', 'sucy', 'dz', '6598', 2, 21);

-- --------------------------------------------------------

--
-- Structure de la table `loger`
--

CREATE TABLE `loger` (
  `IdLoger` int(11) NOT NULL,
  `NumLogement` int(11) NOT NULL,
  `NumReservation` int(11) NOT NULL,
  `PlacesFrais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organiser`
--

CREATE TABLE `organiser` (
  `IdOrganiser` int(11) NOT NULL,
  `NumZone` int(11) NOT NULL,
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `regrouper`
--

CREATE TABLE `regrouper` (
  `IdRegrouper` int(11) NOT NULL,
  `NumEditeur` int(11) NOT NULL,
  `NumZone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `NumReservation` int(11) NOT NULL,
  `FestivalReservation` int(11) NOT NULL,
  `NumEditeurReservation` int(11) NOT NULL,
  `DateReservation` date DEFAULT NULL,
  `Commentaire` char(255) DEFAULT NULL,
  `PrixEspace` double DEFAULT NULL,
  `Statut` bit(1) DEFAULT NULL,
  `EtatFacture` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`NumReservation`, `FestivalReservation`, `NumEditeurReservation`, `DateReservation`, `Commentaire`, `PrixEspace`, `Statut`, `EtatFacture`) VALUES
(1, 2015, 0, '0000-00-00', '', 0, b'0', b'0'),
(2, 2015, 0, '0000-00-00', '', 0, b'1', b'0'),
(3, 2015, 0, '0000-00-00', '', 0, b'1', b'0'),
(4, 2015, 0, '0000-00-00', '', 0, b'1', b'0'),
(5, 2015, 1, '2018-01-18', '14', 14, b'1', b'0'),
(6, 2016, 1, '2018-01-18', 'fdfd', 25, b'1', b'1'),
(7, 2015, 1, '2018-01-11', 'xqxq', 25, b'1', b'1'),
(8, 2015, 1, '2018-01-18', 'sf', 25, b'1', b'1'),
(9, 2015, 1, '2018-01-18', 'assasa', 25, b'1', b'1'),
(10, 2015, 1, '2018-01-10', 'dzzdzd', 25, b'1', b'1'),
(11, 2015, 1, '2018-01-25', 'gukg', 52, b'1', b'1'),
(12, 2015, 1, '2018-01-25', 'wsh', 23, b'1', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `RefSuivi` int(11) NOT NULL,
  `FestivalSuivi` int(11) NOT NULL,
  `PremierContact` int(11) DEFAULT NULL,
  `Relance` bit(1) DEFAULT NULL,
  `Reponse` bit(1) DEFAULT NULL,
  `NumEditeur` int(11) NOT NULL,
  `AnneeSuivi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `NumZone` int(11) NOT NULL,
  `NomZone` varchar(255) DEFAULT NULL,
  `AnneeZone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CodeCategorie`),
  ADD UNIQUE KEY `CodeCategorie` (`CodeCategorie`);

--
-- Index pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`IdConcerner`),
  ADD UNIQUE KEY `IdConcerner` (`IdConcerner`),
  ADD UNIQUE KEY `NumReservation` (`NumReservation`),
  ADD UNIQUE KEY `NumJeux` (`NumJeux`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`NumContact`),
  ADD UNIQUE KEY `NumContact` (`NumContact`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`NumEditeur`),
  ADD UNIQUE KEY `NumEditeur` (`NumEditeur`);

--
-- Index pour la table `Festival`
--
ALTER TABLE `Festival`
  ADD PRIMARY KEY (`AnneeFestival`),
  ADD UNIQUE KEY `AnneeFestival` (`AnneeFestival`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`NumJeux`),
  ADD UNIQUE KEY `NumJeux` (`NumJeux`);

--
-- Index pour la table `localiser`
--
ALTER TABLE `localiser`
  ADD PRIMARY KEY (`IdLocaliser`),
  ADD UNIQUE KEY `IdLocaliser` (`IdLocaliser`),
  ADD UNIQUE KEY `NumReservation` (`NumReservation`),
  ADD UNIQUE KEY `NumZone` (`NumZone`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`NumLogement`),
  ADD UNIQUE KEY `NumLogement` (`NumLogement`);

--
-- Index pour la table `loger`
--
ALTER TABLE `loger`
  ADD PRIMARY KEY (`IdLoger`),
  ADD UNIQUE KEY `IdLoger` (`IdLoger`);

--
-- Index pour la table `organiser`
--
ALTER TABLE `organiser`
  ADD PRIMARY KEY (`IdOrganiser`),
  ADD UNIQUE KEY `IdOrganiser` (`IdOrganiser`),
  ADD UNIQUE KEY `NumZone` (`NumZone`),
  ADD UNIQUE KEY `CodeCategorie` (`CodeCategorie`);

--
-- Index pour la table `regrouper`
--
ALTER TABLE `regrouper`
  ADD PRIMARY KEY (`IdRegrouper`),
  ADD UNIQUE KEY `IdRegrouper` (`IdRegrouper`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`NumReservation`),
  ADD UNIQUE KEY `NumReservation` (`NumReservation`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`RefSuivi`),
  ADD UNIQUE KEY `RefSuivi` (`RefSuivi`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`NumZone`),
  ADD UNIQUE KEY `NumZone` (`NumZone`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `concerner`
--
ALTER TABLE `concerner`
  MODIFY `IdConcerner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `NumContact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `NumEditeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `NumJeux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `localiser`
--
ALTER TABLE `localiser`
  MODIFY `IdLocaliser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `NumLogement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `loger`
--
ALTER TABLE `loger`
  MODIFY `IdLoger` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `organiser`
--
ALTER TABLE `organiser`
  MODIFY `IdOrganiser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `regrouper`
--
ALTER TABLE `regrouper`
  MODIFY `IdRegrouper` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `NumReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `RefSuivi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `NumZone` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
