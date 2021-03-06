-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308

-- Généré le :  mer. 03 juin 2020 à 16:46
-- Version du serveur :  8.0.18

-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appg9b`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_Administrateur` int(10) NOT NULL AUTO_INCREMENT,
  `mail_administrateur` varchar(255) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Administrateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_Administrateur`, `mail_administrateur`, `Mot_de_passe`) VALUES
(1, 'admin1@isep.fr', 'admin'),
(2, 'admin2@isep.fr', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `N°_FAQ` int(11) NOT NULL AUTO_INCREMENT,
  `Questions` varchar(100) NOT NULL,
  `Réponses` varchar(300) NOT NULL,
  PRIMARY KEY (`N°_FAQ`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `N°_Question` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(200) NOT NULL,
  `Theme` int(4) DEFAULT NULL,
  `Contenu` text NOT NULL,
  `Date` date NOT NULL,
  `Question_&_Reponse` text,
  `Nom_Utilisateur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`N°_Question`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`N°_Question`, `Titre`, `Theme`, `Contenu`, `Date`, `Question_&_Reponse`, `Nom_Utilisateur`) VALUES
(8, 'Titre 1', NULL, 'Contenu 1', '2020-05-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `ID_Gestionnaire` int(10) NOT NULL AUTO_INCREMENT,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Nom_auto_ecole` varchar(200) NOT NULL,
  `adresse_auto_ecole` varchar(255) NOT NULL,
  `mail_auto_ecole` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Gestionnaire`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`ID_Gestionnaire`, `Mot_de_passe`, `Nom_auto_ecole`, `adresse_auto_ecole`, `mail_auto_ecole`) VALUES
(4, '$2y$10$oUm.01iR1nw/3Lks8BakGOJpDiO6G858pfho.NYEzbWCENgWP9POO', 'Auto-école de Cergy', '151 avenue de Cergy', 'cergy@auto-ecole.fr'),
(3, '$2y$10$MSfW41AeAsKLYCpzB/KrueiCayjm0Lmgv68af/A0OX72qfysPhfW6', 'Auto-école d\'Issy', '1 rue d\'Issy', 'issy@auto-ecole.fr');

-- --------------------------------------------------------

--
-- Structure de la table `reponsesforum`
--

DROP TABLE IF EXISTS `reponsesforum`;
CREATE TABLE IF NOT EXISTS `reponsesforum` (
  `ID_reponse` int(255) NOT NULL AUTO_INCREMENT,
  `ID_post` int(255) NOT NULL,
  `contenu` text NOT NULL,
  `utilisateur` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponsesforum`
--

INSERT INTO `reponsesforum` (`ID_reponse`, `ID_post`, `contenu`, `utilisateur`, `date`) VALUES
(20, 8, 'test', 'Thomas Durgetto', '2020-05-28 14:41:54');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `N°_du_test` int(11) NOT NULL AUTO_INCREMENT,
  `mail_utilisateur` varchar(150) NOT NULL,
  `mail_gestionnaire` varchar(150) NOT NULL,
  `Date` date NOT NULL,
  `Score_total` int(11) DEFAULT NULL,
  `Res_freq_card_avant_test` int(11) DEFAULT NULL,
  `Res_freq_card_apres_test` int(11) DEFAULT NULL,
  `Res_temp_avant_test` int(11) DEFAULT NULL,
  `Res_temp_apres_test` int(11) DEFAULT NULL,
  `Res_rythme_visuel` int(11) DEFAULT NULL,
  `Res_stimulus_visuel` int(11) DEFAULT NULL,
  `Res_rythme_sonore` int(11) DEFAULT NULL,
  `Res_stimulus_sonore` int(11) DEFAULT NULL,
  `Res_reprod_sonore` int(11) DEFAULT NULL,
  PRIMARY KEY (`N°_du_test`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`N°_du_test`, `mail_utilisateur`, `mail_gestionnaire`, `Date`, `Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`, `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore`) VALUES
(8, 'leopold@isep.fr', 'cergy@auto-ecole.fr', '2020-05-11', 620, 75, 80, 32, 35, 43, 20, 25, 14, 23),
(9, 'leopold@isep.fr', 'issy@auto-ecole.fr', '2020-05-29', 520, 70, 65, 30, 31, 20, 25, 15, 36, 24),
(7, 'thomas@isep.fr', 'issy@auto-ecole.fr', '2020-05-10', 589, 70, 80, 30, 35, 82, 100, 200, 500, 50),
(10, 'leopold@isep.fr', 'issy@auto-ecole.fr', '2020-05-30', 720, 65, 60, 30, 33, 33, 44, 11, 25, 15);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `Mot_de_passe` varchar(255) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `N°_de_telephone` varchar(10) NOT NULL,
  `Adresse` varchar(150) NOT NULL,
  `Adresse_email` varchar(100) NOT NULL,
  `date_rdv` datetime NOT NULL,
  `lieu_rdv` varchar(250) NOT NULL,
  PRIMARY KEY (`IDUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, `Date_de_naissance`, `N°_de_telephone`, `Adresse`, `Adresse_email`, `date_rdv`, `lieu_rdv`) VALUES
(1, '$2y$10$JGuk4a/ViQ9j/053Kz4tD.OzNtsAPU8YYvbnWhNWiifq2lICDb77q', 'CLEMENT', 'Léopold', '1999-09-03', '0698584109', '21 avenue de Paris', 'leopold@isep.fr', '2020-05-27 15:00:00', 'Auto-ecole Cergy - 100 rue de Cergy'),
(4, '$2y$10$Hn5YYit0p6971h390EJHK./xocX8LCynCCpwXDqe6ek3zcRd3gXvy', 'Durgetto', 'Thomas', '2020-05-05', '0600000000', '12 rue d\'Issy', 'thomas@isep.fr', '0000-00-00 00:00:00', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
