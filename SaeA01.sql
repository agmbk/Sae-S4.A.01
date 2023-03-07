-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 24 août 2022 à 16:17
-- Version du serveur : 10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saes4`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes`
(
    `libelle`               varchar(64)  NOT NULL,
    `entraineur`            varchar(128) NOT NULL,
    `creneaux`              varchar(128) NOT NULL,
    `url_photo`             varchar(512) NOT NULL,
    `url_result_calendrier` varchar(512) NOT NULL,
    `commentaire`           text         NOT NULL
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`libelle`, `entraineur`, `creneaux`, `url_photo`, `url_result_calendrier`, `commentaire`)
VALUES ('Loisirs', 'Ada Lovelace, Charles Babbage', 'Mercredi 20h-22h (ancien)', 'Loisirs.jpg', '',
        'Les matches ont lieu en semaine et sont suivis d\'une troisième mi-temps conviviale.'),
       ('Moins de 13', 'Alfred Aho, John Hopcroft, Jeffrey Ullman ',
        'Lundi 17h-18h30 (nouveau), mercredi 16h30-18h (nouveau)', 'Moins13.jpg',
        'https://www.ffhandball.fr/fr/competition/17692#poule-100556',
        'DIVISION AURA M13 FEMININ, 2ème phase, poule 7, div 2'),
       ('Moins de 9', 'Leslie Lamport, Donald Knuth', '', 'Moins9.jpg', '', ''),
       ('Moins de 15', 'Brian Kernighan, Dennis Richie', 'Mercredi 18h30-20h (ancien), vendredi 17h-18h15 (alternance)',
        'Moins15.jpg', 'https://www.ffhandball.fr/fr/competition/17691#poule-100531',
        '1ERE DIVISION AURA M15 FEMININ, 2ème phase, poule 7, div 1'),
       ('Moins de 17', 'Ken Thomson', '', 'Moins17.jpg', 'https://www.ffhandball.fr/fr/competition/17709#poule-89919',
        'Phase de Brassage - Entente avec ETOILE/BEAUVALLON'),
       ('Moins de 18', 'Bram Moolenaar, Bill Joy', 'Mercredi 18h-20h00 (nouveau), Vendredi 18h15-19h30 (alternance)',
        'Moins18.jpg', 'https://www.ffhandball.fr/fr/competition/17690#poule-100521',
        'DIVISION AURA M18 ANS FEMININ, 2ème phase, poule 9, div 1'),
       ('Seniors régionales (SF2)', 'Patrick Henry Winston, Terry Winograd',
        'Mercredi 20h-22h (nouveau), vendredi 19h30-21h00 (alternance)', 'SF2.jpg',
        'https://www.ffhandball.fr/fr/competition/17685#poule-94907', 'PREMIERE DIVISION AURA P16 FEMININE, poule 8'),
       ('Seniors prénationales (SF1)', 'Patrick Henry Winston, Terry Winograd',
        'Mercredi 20h-22h (nouveau), Vendredi 20h30-22h00 (alternance)', 'SF1.jpg',
        'https://www.ffhandball.fr/fr/competition/17616#poule-90361', 'Équipe fanion, joue en prénational, poule 2'),
       ('Moins de 11', 'Alain Colmerauer', 'Mardi 17h-18h30 (ancien)', 'Moins11.jpg',
        'https://www.ffhandball.fr/fr/competition/18492#poule-96268', '1ère phase, découverte');

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

CREATE TABLE `matches`
(
    `id_match`           bigint(20) UNSIGNED NOT NULL,
    `equipe_locale`      varchar(64)         NOT NULL,
    `domicile_exterieur` tinyint(1)          NOT NULL,
    `equipe_adverse`     varchar(64)         NOT NULL,
    `hote`               varchar(64) DEFAULT NULL,
    `date_heure`         datetime    DEFAULT NULL,
    `num_semaine`        int(11)             NOT NULL,
    `num_journee`        int(11)             NOT NULL,
    `gymnase`            varchar(64) DEFAULT NULL
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `matches`
--

INSERT INTO `matches` (`id_match`, `equipe_locale`, `domicile_exterieur`, `equipe_adverse`, `hote`, `date_heure`,
                       `num_semaine`, `num_journee`, `gymnase`)
VALUES (1, 'Seniors prénationales (SF1)', 1, 'ATHLETIC HANDBALL ST VALLIER', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-09-25 14:00:00', 38, 1, 'CENTRE OMNISPORTS'),
       (2, 'Moins de 15', 1, 'BOURG DE PÉAGE DRÔME HAND BALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-02 11:00:00', 39, 1, 'CENTRE OMNISPORTS'),
       (3, 'Seniors régionales (SF2)', 1, 'ISARDROME 2', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-10-02 16:00:00',
        39, 1, 'CENTRE OMNISPORTS'),
       (4, 'Seniors prénationales (SF1)', 0, 'HANDBALL ST MAURICE L\'EXIL', 'HANDBALL ST MAURICE L\'EXIL',
        '2022-10-01 21:00:00', 39, 2, 'SALLE OMNISPORTS'),
       (5, 'Moins de 18', 0, 'HBC SAINT DONAT', 'HBC ST DONAT', '2022-10-01 17:00:00', 39, 1, 'GYMNASE MUNICIPAL'),
       (6, 'Moins de 15', 0, 'ATHLÉTIC HANDBALL SAINT VALLIER', 'ATHLETIC HANDBALL ST VALLIER', '2022-10-08 16:30:00',
        40, 2, 'MICHEL BETTON'),
       (7, 'Moins de 13', 1, 'ENTENTE ARDECHE MERIDIONALE HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-09 14:00:00', 40, 2, 'CENTRE OMNISPORTS'),
       (8, 'Moins de 18', 0, 'HANDBALL CLUB SAINT MARCELLOIS', 'HANDBALL CLUB SAINT MARCELLOIS', '2023-01-21 13:30:00',
        3, 2, 'HALLE DES SPORTS'),
       (9, 'Seniors régionales (SF2)', 0, 'HB BOURG LES VALENCE', 'HB BOURG LES VALENCE', '2022-10-08 20:00:00', 40, 2,
        'HALLE DU VALENTIN'),
       (10, 'Seniors prénationales (SF1)', 0, 'ENTENTE CALUIRE RILLIEUX LYON METROPOLE', 'AS LYON CALUIRE',
        '2022-10-16 16:00:00', 41, 4, 'GYMNASE CHARLES SENARD'),
       (11, 'Moins de 13', 0, 'ENTENTE BOURG DE PEAGE ST MARCEL', 'BOURG DE PEAGE DROME HANDBALL',
        '2022-10-15 13:15:00', 41, 3, 'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (12, 'Moins de 15', 0, 'HBC SAINT DONAT', 'BOURG DE PEAGE DROME HANDBALL', '2022-10-16 13:00:00', 41, 3,
        'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (13, 'Moins de 18', 1, 'BOURG DE PÉAGE DRÔME HAND BALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-15 18:00:00', 41, 3, 'CENTRE OMNISPORTS'),
       (14, 'Seniors régionales (SF2)', 1, 'BOURG DE PÉAGE DRÔME HAND BALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-15 20:00:00', 41, 3, 'CENTRE OMNISPORTS'),
       (15, 'Seniors régionales (SF2)', 0, 'HBC ANNONEEN', 'HBC ANNONEEN', '2022-10-23 14:00:00', 42, 4,
        'GYMNASE DU ZODIAQUE'),
       (16, 'Moins de 13', 0, 'HB07 LE TEIL', 'HB 07 LE TEIL', '2022-11-05 14:00:00', 44, 1,
        'GYMNASE PIERRE DE COUBERTIN (LA VIOLETTE)'),
       (17, 'Seniors prénationales (SF1)', 1, 'ENTENTE CO ST FONS – RC MERMOZ', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-11-12 19:00:00', 45, 5, 'CENTRE OMNISPORTS'),
       (38, 'Moins de 17', 1, 'UNION 30', 'HB ETOILE/BEAUVALLON', '2022-11-12 18:30:00', 45, 7,
        'GYMNASE MUNICIPAL ETOILE'),
       (19, 'Moins de 15', 0, 'HBC SAINT DONAT', 'HBC ST DONAT', '2022-11-12 15:00:00', 45, 4, 'GYMNASE MUNICIPAL'),
       (20, 'Moins de 13', 1, 'HB ETOILE/BEAUVALLON', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-11-20 10:30:00', 46,
        5, 'CENTRE OMNISPORTS'),
       (21, 'Moins de 15', 1, 'ATHLÉTIC HANDBALL SAINT VALLIER', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-11-20 12:00:00', 46, 5, 'CENTRE OMNISPORTS'),
       (22, 'Seniors régionales (SF2)', 1, 'ENTENTE ARDECHE MERIDIONALE HANDBALL',
        'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-11-20 14:00:00', 46, 6, 'CENTRE OMNISPORTS'),
       (23, 'Seniors prénationales (SF1)', 1, 'DECINES HANDBALL CLUB', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-11-20 16:00:00', 46, 6, 'CENTRE OMNISPORTS'),
       (24, 'Moins de 18', 0, 'ENTENTE ARDECHE MERIDIONALE HANDBALL', 'ENTENTE ARDÈCHE MÉRIDIONALE HANDBALL',
        '2022-12-10 17:00:00', 49, 7, 'GYMNASE ROQUA'),
       (25, 'Moins de 13', 1, 'ENTENTE PAYS DE BIEVRE HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-12-10 17:00:00', 49, 7, 'CENTRE OMNISPORTS'),
       (26, 'Seniors régionales (SF2)', 1, 'Exempt 1', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-12-10 19:00:00', 49,
        8, 'CENTRE OMNISPORTS'),
       (27, 'Seniors prénationales (SF1)', 1, 'ENTENTE ST DONAT-BOURG DE PEAGE', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-12-10 21:00:00', 49, 8, 'CENTRE OMNISPORTS'),
       (28, 'Seniors régionales (SF2)', 0, 'MONTELIMAR CHB', 'MONTELIMAR CLUB HANDBALL', '2022-12-17 18:00:00', 50, 9,
        'GYMNASE EUROPA'),
       (29, 'Seniors prénationales (SF1)', 1, 'ECHALAS HBC', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-29 19:00:00', 43, 1, 'CENTRE OMNISPORTS'),
       (30, 'Moins de 18', 0, 'HB07 LE TEIL', 'HB 07 LE TEIL', '2022-11-13 11:30:00', 45, 4,
        'GYMNASE PIERRE DE COUBERTIN (LA VIOLETTE)'),
       (31, 'Moins de 11', 0, 'HB 07 LE TEIL', 'HB 07 LE TEIL', '2022-11-19 14:15:00', 46, 2,
        'GYMNASE PIERRE DE COUBERTIN (LA VIOLETTE)'),
       (32, 'Moins de 15', 0, 'BOURG DE PÉAGE DRÔME HAND BALL', 'BOURG DE PEAGE DROME HANDBALL', '2022-12-03 14:00:00',
        48, 6, 'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (33, 'Moins de 11', 0, 'ENT. TRICASTIN HB', 'ATOM SPORT ENT. TRICASTIN HB', '2022-12-10 12:00:00', 49, 4,
        'HALLE DES SPORTS'),
       (34, 'Seniors régionales (SF2)', 1, 'HBC CHABEUIL 2', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-11-13 14:00:00', 45, 5, 'CENTRE OMNISPORTS'),
       (35, 'Moins de 13', 0, 'HB PAYS DE ST MARCELLIN', 'HB PAYS DE ST MARCELLIN', '2022-11-12 12:30:00', 45, 4,
        'GYMNASE LA SAULAIE'),
       (36, 'Seniors régionales (SF2)', 0, 'HB TAIN VION TOURNON', 'HB TAIN VION TOURNON', '2022-12-03 21:00:00', 48, 7,
        'HALLE DES SPORTS L. SAUSSET'),
       (37, 'Moins de 13', 0, 'LIVRON HANDBALL', 'LIVRON HANDBALL', '2022-12-03 14:30:00', 48, 6, 'GYMNASE CLAUDE BON'),
       (39, 'Moins de 17', 1, 'HBC ECHIROLLES EYBENS', 'HB ETOILE/BEAUVALLON', '2022-11-19 18:30:00', 46, 8,
        'GYMNASE MUNICIPAL ETOILE'),
       (40, 'Moins de 17', 1, 'DROME HB FEMININ', 'HB ETOILE/BEAUVALLON', '2022-12-10 18:30:00', 49, 10,
        'GYMNASE MUNICIPAL ETOILE'),
       (41, 'Seniors régionales (SF2)', 1, 'P16F DIV - ENTENTE ISARDROME 2', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-10-02 16:00:00', 39, 1, 'CENTRE OMNISPORTS'),
       (42, 'Seniors prénationales (SF1)', 0, 'P16F - ENTENTE CALUIRE RILLIEUX LYON METROPOLE', 'AS LYON CALUIRE',
        '2022-10-16 16:00:00', 41, 4, 'GYMNASE CHARLES SENARD'),
       (43, 'Moins de 13', 0, 'M13F DIV - ENTENTE BOURG DE PEAGE-ST-MARCEL', 'BOURG DE PEAGE DROME HANDBALL',
        '2022-10-15 13:15:00', 41, 3, 'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (44, 'Seniors régionales (SF2)', 1, 'P16F DIV  - ENTENTE BOURG DE PEAGE-ST DONAT',
        'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-10-15 20:00:00', 41, 3, 'CENTRE OMNISPORTS'),
       (45, 'Seniors prénationales (SF1)', 1, 'P16F - ENTENTE CO ST FONS - RC MERMOZ',
        'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-11-12 19:00:00', 45, 5, 'CENTRE OMNISPORTS'),
       (46, 'Seniors prénationales (SF1)', 0, 'HB PAYS DE ST MARCELLIN', 'HB PAYS DE ST MARCELLIN',
        '2022-12-03 20:30:00', 48, 7, 'GYMNASE LA SAULAIE'),
       (47, 'Moins de 13', 1, 'M13F DIV - PAYS DE BIEVRE HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2022-12-10 17:00:00', 49, 7, 'CENTRE OMNISPORTS'),
       (48, 'Seniors prénationales (SF1)', 1, 'P16F  PN - ENTENTE ST DONAT - BOURG DE PEAGE HB',
        'GUILHERAND-GRANGES ARDECHE HANBBALL', '2022-12-10 21:00:00', 49, 8, 'CENTRE OMNISPORTS'),
       (49, 'Seniors régionales (SF2)', 0, 'P16F DIV - ENTENTE MONTELIMAR-DIEULEFIT', 'MONTELIMAR CLUB HANDBALL',
        '2022-12-17 18:00:00', 50, 9, 'GYMNASE EUROPA'),
       (50, 'Seniors prénationales (SF1)', 0, 'HANDBALL CLUB CHABEUIL', 'HANDBALL CLUB CHABEUIL', '2022-12-17 19:00:00',
        50, 9, 'gymnase municipal'),
       (51, 'Seniors régionales (SF2)', 0, 'HB07 LE TEIL', 'HB 07 LE TEIL', '2023-01-07 19:00:00', 1, 10,
        'GYMNASE PIERRE DE COUBERTIN (LA VIOLETTE)'),
       (52, 'Moins de 17', 0, 'AVENIR 84F', 'AVENIR 84F', '2022-12-03 16:00:00', 48, 9,
        'Gymnase André Gimard, Avignon'),
       (53, 'Seniors prénationales (SF1)', 0, 'P16F  PN - ENTENTE LORIOL - LE POUZIN', 'HBC LORIOL',
        '2023-01-07 19:00:00', 1, 10, 'GYMNASE JEAN CLEMENT'),
       (54, 'Moins de 15', 1, 'ATHLÉTIC HANDBALL SAINT VALLIER', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-01-14 14:00:00', 2, 1, 'CENTRE OMNISPORTS'),
       (55, 'Moins de 18', 0, 'HANDBALL CLUB LAMASTROIS', 'HANDBALL CLUB LAMASTROIS', '2023-01-14 18:00:00', 2, 1,
        'GYMNASE INTERCOMMUNAL'),
       (56, 'Moins de 13', 0, 'M13F DIV - ISARDROME', 'HANDBALL CLUB SABLONS-SERRIERES', '2023-02-25 17:00:00', 8, 1,
        'SALLE OMNISPORTS'),
       (57, 'Seniors régionales (SF2)', 0, 'LIVRON HANDBALL', 'LIVRON HANDBALL', '2023-01-14 19:00:00', 2, 11,
        'GYMNASE CLAUDE BON'),
       (58, 'Seniors prénationales (SF1)', 0, 'P16F - ENTENTE LYON EST HANDBALL', 'ST PRIEST HANDBALL',
        '2023-01-15 16:00:00', 2, 11, 'HALLE DES SPORTS'),
       (59, 'Seniors prénationales (SF1)', 0, 'ATHLETIC HANDBALL ST VALLIER', 'ATHLETIC HANDBALL ST VALLIER',
        '2023-01-21 19:30:00', 3, 12, 'MICHEL BETTON'),
       (60, 'Seniors régionales (SF2)', 0, 'P16F DIV - ENTENTE ISARDROME 2',
        'FORMATION ALBONNAISE ET RAMBERTOISE HANDBALL', '2023-02-25 21:00:00', 8, 12, 'SALLE OMNISPORTS'),
       (61, 'Moins de 15', 0, 'HANDBALL CLUB SAINT MARCELLOIS', 'HANDBALL CLUB SAINT MARCELLOIS', '2023-01-21 15:30:00',
        3, 2, 'HALLE DES SPORTS'),
       (62, 'Moins de 18', 1, 'ENTENTE ARDECHE MERIDIONALE HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-01-29 12:00:00', 4, 3, 'CENTRE OMNISPORTS'),
       (63, 'Seniors prénationales (SF1)', 1, 'HANDBALL ST MAURICE L\'EXIL', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-01-29 14:00:00', 4, 13, 'CENTRE OMNISPORTS'),
       (64, 'Seniors régionales (SF2)', 1, 'HB BOURG LES VALENCE', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-01-29 16:00:00', 4, 13, 'CENTRE OMNISPORTS'),
       (65, 'Moins de 13', 0, 'HANDBALL CLUB CHABEUIL', 'HANDBALL CLUB CHABEUIL', '2023-01-28 14:30:00', 4, 3,
        'gymnase municipal'),
       (66, 'Seniors régionales (SF2)', 0, 'P16F DIV  - ENTENTE BOURG DE PEAGE-ST DONAT',
        'BOURG DE PEAGE DROME HANDBALL', '2023-02-03 21:00:00', 5, 14, 'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (67, 'Seniors régionales (SF2)', 0, 'ENTENTE ARDECHE MERIDIONALE HANDBALL',
        'ENTENTE ARDÈCHE MÉRIDIONALE HANDBALL', '2023-03-18 20:00:00', 11, 17, 'GYMNASE ROQUA'),
       (68, 'Moins de 15', 0, 'HB ETOILE/BEAUVALLON', 'HB ETOILE/BEAUVALLON', '2023-02-04 18:30:00', 5, 3,
        'GYMNASE MUNICIPAL'),
       (69, 'Moins de 15', 1, 'LIVRON HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-03-04 16:00:00', 9, 4,
        'CENTRE OMNISPORTS'),
       (70, 'Seniors régionales (SF2)', 1, 'HBC ANNONEEN', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-03-04 20:00:00',
        9, 15, 'CENTRE OMNISPORTS'),
       (71, 'Moins de 18', 0, 'LE POUZIN HB 07', 'LE POUZIN HB 07', '2023-03-04 17:00:00', 9, 4, 'JACKSON RICHARDSON'),
       (72, 'Moins de 15', 0, 'MONTELIMAR CLUB HANDBALL', 'MONTELIMAR CLUB HANDBALL', '2023-03-11 15:30:00', 10, 5,
        'ESPACE EDUCATIF ET SPORTIF'),
       (73, 'Moins de 18', 0, 'ENTENTE ARDECHE MERIDIONALE HANDBALL', 'ENTENTE ARDÈCHE MÉRIDIONALE HANDBALL',
        '2023-04-09 14:00:00', 14, 8, 'GYMNASE ROQUA'),
       (79, 'Seniors prénationales (SF1)', 0, 'DECINES HANDBALL CLUB', 'DECINES HANDBALL CLUB', '2023-03-18 18:00:00',
        11, 17, 'GYMNASE CHARLIE CHAPLIN'),
       (74, 'Moins de 13', 0, 'LYON HANDBALL', 'LYON HANDBALL', '2023-02-05 12:00:00', 5, 2, 'GYMNASE CLEMENCEAU'),
       (75, 'Moins de 13', 1, 'HBC LORIOL', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-03-04 14:30:00', 9, 4,
        'CENTRE OMNISPORTS'),
       (76, 'Moins de 18', 1, 'HANDBALL CLUB LAMASTROIS', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-03-18 14:00:00',
        11, 6, 'CENTRE OMNISPORTS'),
       (77, 'Moins de 15', 1, 'HANDBALL CLUB SAINT MARCELLOIS', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-04-02 10:00:00', 13, 7, 'CENTRE OMNISPORTS'),
       (78, 'Moins de 18', 0, 'M18F - ENTENTE DU COEUR ARDECHOIS', 'HANDBALL CLUB LAMASTROIS', '2023-01-14 18:00:00', 2,
        1, 'GYMNASE INTERCOMMUNAL'),
       (80, 'Moins de 18', 1, 'M18F - ENTENTE DU COEUR ARDECHOIS', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-03-18 14:00:00', 11, 6, 'CENTRE OMNISPORTS'),
       (81, 'Moins de 13', 0, 'M13F DIV - ISARDROME', 'HANDBALL CLUB SABLONS-SERRIERES', '2023-03-18 17:45:00', 11, 6,
        'GYMNASE JOSEPH PLAT'),
       (82, 'Moins de 13', 1, 'LYON HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-04-02 14:00:00', 13, 7,
        'CENTRE OMNISPORTS'),
       (83, 'Moins de 18', 1, 'HANDBALL CLUB SAINT MARCELLOIS', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-04-02 11:30:00', 13, 7, 'CENTRE OMNISPORTS'),
       (84, 'Moins de 13', 1, 'HANDBALL CLUB CHABEUIL', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-04-09 11:30:00',
        14, 8, 'CENTRE OMNISPORTS'),
       (85, 'Moins de 15', 1, 'HB ETOILE/BEAUVALLON', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-04-09 14:00:00', 14,
        8, 'CENTRE OMNISPORTS'),
       (86, 'Moins de 18', 1, 'LE POUZIN HB 07', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-04-29 16:00:00', 17, 9,
        'CENTRE OMNISPORTS'),
       (87, 'Moins de 13', 1, 'M13F DIV - ENTENTE MERMOZ-ST FONS', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-05-14 10:00:00', 19, 10, 'CENTRE OMNISPORTS'),
       (88, 'Moins de 15', 1, 'MONTELIMAR CLUB HANDBALL', 'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-05-14 12:00:00',
        19, 10, 'CENTRE OMNISPORTS'),
       (89, 'Seniors prénationales (SF1)', 1, 'P16F - ENTENTE CALUIRE RILLIEUX LYON METROPOLE',
        'GUILHERAND-GRANGES ARDECHE HANBBALL', '2023-03-04 18:00:00', 9, 15, 'CENTRE OMNISPORTS'),
       (90, 'Seniors prénationales (SF1)', 0, 'P16F - ENTENTE CO ST FONS - RC MERMOZ', 'ST FONS CO',
        '2023-03-11 18:30:00', 10, 16, 'PALAIS DES SPORTS'),
       (91, 'Seniors régionales (SF2)', 0, 'HBC CHABEUIL 2', 'HANDBALL CLUB CHABEUIL', '2023-03-11 19:00:00', 10, 16,
        'gymnase municipal'),
       (92, 'Moins de 13', 0, 'M13F DIV - ENTENTE MERMOZ-ST FONS', 'MERMOZ RACING CLUB', '2023-03-11 16:30:00', 10, 5,
        'PALAIS DES SPORTS'),
       (93, 'Moins de 15', 0, 'ATHLÉTIC HANDBALL SAINT VALLIER', 'ATHLETIC HANDBALL ST VALLIER', '2023-03-18 17:30:00',
        11, 6, 'MICHEL BETTON'),
       (94, 'Seniors prénationales (SF1)', 1, 'HB PAYS DE ST MARCELLIN', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-04-01 19:00:00', 13, 18, 'CENTRE OMNISPORTS'),
       (95, 'Seniors régionales (SF2)', 1, 'HB TAIN VION TOURNON', 'GUILHERAND-GRANGES ARDECHE HANBBALL',
        '2023-04-02 16:00:00', 13, 18, 'CENTRE OMNISPORTS'),
       (96, 'Seniors prénationales (SF1)', 0, 'P16F  PN - ENTENTE ST DONAT - BOURG DE PEAGE HB', 'HBC ST DONAT',
        '2023-04-07 21:00:00', 14, 19, 'COMPLEXE SPORTIF VERCORS / SALLE COMPETITION'),
       (97, 'Moins de 13', 0, 'HBC LORIOL', 'HBC LORIOL', '2023-04-29 13:30:00', 17, 9, 'GYMNASE DES ECOLES'),
       (100, 'Loisirs', 1, 'Vernoux', NULL, '2022-09-28 20:30:00', 39, 1, 'Centre Omnisports (ancien)');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
    ADD PRIMARY KEY (`libelle`);

--
-- Index pour la table `matches`
--
ALTER TABLE `matches`
    ADD PRIMARY KEY (`id_match`),
    ADD UNIQUE KEY `equipe_locale` (`equipe_locale`, `equipe_adverse`, `num_semaine`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matches`
--
ALTER TABLE `matches`
    MODIFY `id_match` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
