-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 août 2018 à 09:20
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `platform_ande`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `contact_emergency` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `child` varchar(255) DEFAULT NULL,
  `service_taked_at` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `maritalstatus_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `function_id` int(11) DEFAULT NULL,
  `profession_id` int(11) DEFAULT NULL,
  `diploma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  KEY `status_id` (`status_id`),
  KEY `sex_id` (`sex_id`),
  KEY `maritalstatus_id` (`maritalstatus_id`),
  KEY `grade_id` (`grade_id`),
  KEY `category_id` (`category_id`),
  KEY `function_id` (`function_id`),
  KEY `profession_id` (`profession_id`),
  KEY `diploma_id` (`diploma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `registration`, `name`, `first_name`, `slug`, `place_of_birth`, `birth_date`, `father_name`, `mother_name`, `contact_emergency`, `phone1`, `phone2`, `e_mail`, `child`, `service_taked_at`, `created_at`, `updated_at`, `service_id`, `status_id`, `sex_id`, `maritalstatus_id`, `grade_id`, `category_id`, `function_id`, `profession_id`, `diploma_id`) VALUES
(1, '02014 23 W', 'ACHI', 'Ablan Nalba Pauline ', 'ACHI-Ablan-Nalba-Pauline', 'Bouaké', '1978-05-17', 'Achi Yapo', 'Ta Lou Nakoné', 'Mere Nakoné 08 72 25 53/Mme Achi EUPHRAISIE 05 07 84 80 ', '07 31 02 69', '45 68 55 38', 'paulineachi@yahoo.fr', '0', '2014-01-02', '2018-08-22 12:25:57', '2018-06-20 20:34:53', 4, 1, 2, 1, 15, 12, 5, 8, 1),
(2, '443 205 C', 'ADOU', ' Gnane Sylvie juliana', 'ADOU-Gnane-Sylvie-juliana', 'LOCODJRO', '1989-11-05', 'ADOU GEORGES', 'LASME MARRE MONIQUE', 'Mr ADOU 40 70 21 39', '02 91 61 90', '09 99 44 42', 'julianaadou@yahoo.fr', '1', '2017-05-26', '2018-08-22 12:28:12', '2018-06-20 20:11:33', 11, 2, 2, 1, 3, 1, 5, 2, 23),
(3, '02014 37 K', 'AKRE', 'Affibe Antoinette', 'AKRE-Affibe-Antoinette', 'Bonoua', '1969-04-06', 'NOGBOU Akré Bernard', 'AHOULOU Epse  NOGBOU Marie Thérèse', 'Akré Marthe 06 12 64 12', '01 54 91 18', '09 95 47 67', 'antoinetteakre@yahoo.fr ', '2', '2014-12-02', '2018-08-22 12:42:52', '2018-06-20 20:23:20', 19, 1, 2, 2, 15, 12, 5, 45, 26),
(4, '291 811 K', 'AMALAMAN', ' Sylvain', 'AMALAMAN-Sylvain', 'Treichville-Abidjan', '1969-02-19', 'Amalaman Soboré', 'Kouayamé Agbona', '', '07895777', '41740001', 'a_sylvain2001@yahoo.fr', '4', '2002-12-02', '2018-08-22 12:24:32', NULL, 12, 2, 1, 2, 1, 1, 3, 43, 23),
(5, '02014 27 A', 'ANDOBLE', 'Yao Christian ', 'ANDOBLE-Yao-Christian', 'Bouaké', '1981-09-08', 'ANDOBLE-Yao Kouamé Antonin', 'KOUASSI Ouaka Christine', 'ANDOBLE Yao Valerie 57 55 78 63 /Andoble Yao Michael 08 97 76 14 ', '47 66 57 65', '1 41 22 22 ', 'scay067@yahoo.fr', '1', '2014-01-02', '2018-08-22 12:24:16', NULL, 3, 1, 1, 1, 15, 12, 5, 36, 3),
(6, '443 206 D', 'ANE', 'Kablan Paul-Emile', 'ANE-Kablan-Paul-Emile', 'PORT BOUET', '1987-12-04', 'ANE Oi Ané', 'BOSSON Ama', 'GNAKOURI ALIXISE     57 78 29 37', '47616681', '40719309', 'emilekablan1987@gmail.com', '1', '2017-04-13', '2018-08-22 12:29:37', NULL, 4, 2, 1, 1, 3, 1, 5, 6, 23),
(8, '02002 11 K', 'ASTE', 'M\'bo Armelle Rosine', 'ASTE-M\'bo-Armelle-Rosine', '', '1975-08-16', '', '', '', '77 06 49 66', '', 'armelbel@yahoo,fr', '0', '2002-01-01', '2018-08-22 12:42:55', NULL, 15, 1, 2, 2, 15, 12, 5, 27, 24),
(9, '01998 02 B', 'BAHONTO', ' née  Nanou Aka Madeleine', 'BAHONTO-née--Nanou-Aka-Madeleine', 'Abidjan', '1966-08-04', 'Nanou Aka ', 'Kassi Blagoh', 'Mr BAHONTO Eugene 07 70 77 45', '07 79 00 25 ', '', 'madbahonto@gmail.com', '4', '2003-01-02', '2018-08-24 12:52:10', NULL, 5, 1, 2, 2, 15, 12, 5, 14, 5),
(10, '02014 20 T', 'ATTINGRE', ' Davy Arnaud Niangoran', 'ATTINGRE-Davy-Arnaud-Niangoran', 'Treichville', '1981-07-03', 'ATTINGRE Alain Paul Emmanuel', 'NADAUD Roh Monique ', 'NADAUD Moniqe 07 21 01 10 /20 30 55 15 ', '09 57 16 95 ', '06 00 08 84', 'bamboo_adou@yahoo.fr ', '2', '2014-01-02', '2018-08-24 13:27:21', NULL, 4, 1, 1, 1, 15, 12, 5, 51, 4),
(11, '02014 41 O', 'BROUH', ' kouassi Serges Pacôme', 'BROUH-kouassi-Serges-Pacôme', 'Diangobo (S/P Yakass2-Attobrou)', '1972-02-01', 'BROU Yapo ', 'ADONPO Akaba', 'Prof Brouh Yapo  07 77 36 49 ', '09 71 96 11 ', '03 27 72 62 ', 'pcbrouh@yahoo.fr', '2', '2014-01-02', '2018-08-24 12:50:06', NULL, 10, 1, 1, 2, 15, 12, 5, 9, 6),
(12, '156 322 Y', 'CISSE', ' Mamadou', 'CISSE-Mamadou', 'Adzopé', '1955-07-23', 'CISSE Abou', 'DIOMANDE Charlotte', 'Mme Cissé 07 77 63 26 ', '07 87 23 28 ', '', 'drcissem@yahoo.fr', '1', '2000-10-09', '2018-08-22 12:59:11', NULL, 19, 2, 1, 2, 2, 1, 2, 10, 23),
(13, '02014 43 Q', 'coulibaly', ' Sanga Zoumana', 'coulibaly-Sanga-Zoumana', 'Paoufla (S/P Zuénoula)', '1982-12-06', 'Coulibaly Yaya', 'Salimata Koné', 'Ouattara Karim 01 01 09 05/ 07 42 82 35', '57 02 36 91 ', '', 'sanguesangue@yahoo.com', '1', '2014-01-02', '2018-08-22 13:02:41', NULL, 9, 1, 1, 1, 15, 12, 5, 49, 7),
(14, '02014 28 B', 'DEGNY', ' Egnamby Anne-Marie', 'DEGNY-Egnamby-Anne-Marie', 'Deux Plateaux', '1981-01-10', 'N\'Drin Degny Amessan', 'Gnanago Koti Alphonsine', 'Degny Alfred 08 22 41 40 ', '07 00 80  90 / 44 76 55 10 ', '', 'anne_degny@yahoo.fr', '1', '2014-01-02', '2018-08-22 13:08:00', NULL, 14, 1, 2, 1, 15, 12, 5, 12, 8),
(15, '01998 04 D', 'DIBI', ' née Edjeme N\'guessan Solange ', 'DIBI-née-Edjeme-N\'guessan-Solange', 'Bécédi (commune de Sikensi)', '1963-12-25', 'Edjémé N\'Guessan Denis', 'N\'Guessan Amani Jacqueline', '49 46 277 30 ', '07  68 54 68', '03 75 04 99 ', 'edjeme@mail.com', '3', '2003-01-06', '2018-08-22 13:08:53', NULL, 4, 1, 2, 2, 15, 12, 3, 36, 5),
(16, '02017 04 D', 'DJEBRY', ' Ahoba Ehouman Jean Baptiste Assomption', 'DJEBRY-Ahoba-Ehouman-Jean-Baptiste-Assomption', 'TREICHVILLE', '1988-03-26', 'DJEBRY KOTCHA BERNARD', 'ADELAIDE VAISSAY', 'DJEBRY Emmanuella 49 85 19 16', '09636953', '', 'djebryjeanbaptiste@gmail.com', '0', '2018-07-09', '2018-08-27 02:49:26', NULL, 1, 1, 1, 1, 15, 12, 5, 50, 25),
(17, '', 'DOSSO', ' Lamanta', 'DOSSO-Lamanta', 'Bouafle', '1990-03-10', 'DOSSO Karamoko', 'AFFOUSSATA', 'Zoumana DOSSO 09 00 24 25/42 77 89 90', '08 45 43 37', '', 'lamtydos@yahoo.fr', '0', '2017-04-13', '2018-08-22 13:17:33', NULL, 4, 2, 2, 1, 4, 2, 5, 14, 23),
(18, '365 512 Y', 'DOUA', 'née Gbéhé Maximine Gisèle', 'DOUA-née-Gbéhé-Maximine-Gisèle', 'Toulepleu', '1970-05-28', 'Gbéhé Gadé Miché', 'Zéadé Thérèse', 'Zeade theresse 07 33 20 820/ 07 67 19 73 ', '07 80 98 93', '04 05 89 22 ', 'doua_gisele@yahoo.fr', '3', '2010-12-15', '2018-08-24 12:51:43', NULL, 11, 2, 2, 2, 3, 1, 2, 13, 23),
(19, '02017 46 T', 'DOUAYOUA', ' née Boti Trazie Lou Bozie Rachelle', 'DOUAYOUA-née-Boti-Trazie-Lou-Bozie-Rachelle', 'Abobo (s/p Bingerville)', '1976-05-30', 'Boti Bi Trazié', 'Boti Lou Bema', 'Mr Douayoua 78 17 30 80 ', '49 38 16 91 / 01 03 28 95 ', '', 'rbdouayoua@gmal.com', '3', '2002-03-01', '2018-08-27 02:49:14', NULL, 3, 1, 2, 2, 15, 12, 3, 28, 9),
(20, '02004 25 Y', 'EBROTTIE', ' N\'ganza Jean Marcel ', 'EBROTTIE-N\'ganza-Jean-Marcel', 'Arrah ', '1977-05-10', 'EBROTTIE Yomanfo ', 'MEA Niankon', 'Ehouman blandine  44 06 22 44 ', '08 75   69 23 ', '', 'ebrotierjeanmarcel@yahoo.fr', '3', '2014-01-02', '2018-08-22 13:27:35', NULL, 11, 1, 1, 1, 15, 12, 5, 29, 10),
(21, '283 154 Y', 'ELEGAN', ' Lazard Kouassi', 'ELEGAN-Lazard-Kouassi', 'Abongoua (S/P Arrah)', '1973-12-17', 'Elegan Kouassi', 'Assalé N\'Gbra', 'Fofana Hamed  01 91 85 55  Anne Marie  06 59 78 49', '40 19 12 36  ', '', 'lazardelegan@gmail.com', '3', '2014-02-10', '2018-08-22 13:48:48', NULL, 12, 2, 1, 1, 3, 1, 5, 52, 23),
(22, '0200 008 H', 'ESSANI ', 'Alou Lucien ', 'ESSANI-Alou-Lucien', 'Adiaké', '1966-05-31', 'Nogbou Kouakou Essani', 'Amouyé Attoua', '', '01 33 61 33 ', '', '', '3', '2002-01-01', '2018-08-22 13:54:57', NULL, 9, 1, 1, 1, 15, 12, 5, 36, 11),
(23, '02013 18 R', 'ETTIEN ', 'Adjoua Albertine epse Dassé', 'ETTIEN-Adjoua-Albertine-epse-Dassé', 'Adjamé (220 lgts)', '1982-03-15', 'ETTIEN Anoumou Jean-Claude', 'MIAN Bouadoua', 'Mr DASSE 05 62 16 97/07 12 65 92 / 58 31 99 78 ', '57 65 33 37  ', '', 'adebatina@hotmail.fr', '3', '2013-07-01', '2018-08-22 13:54:10', NULL, 4, 1, 2, 2, 15, 12, 5, 51, 5),
(24, '', 'GBA ', 'Monné Patricia', 'GBA-Monné-Patricia', 'Bouaflé', '1986-02-15', 'Feu GBA Denis', 'GUE Nanon Agnès', 'Mme GBA Estelle 09 25 97 80', '07 24 20 69 ', '', 'gba_patricia@yahoo.fr', '1', '2014-01-02', '2018-08-22 13:40:46', NULL, 18, 1, 2, 1, 15, 12, 5, 4, 5),
(25, '231 687 S', 'GBE', ' Nondai Didié', 'GBE-Nondai-Didié', '', '1986-03-01', '', '', 'Mme GBE Agathe 05 09 30 44 ', '47 08 78 19 ', '', 'gbdidier@yahoo.fr', '3', '2014-10-03', '2018-08-24 12:53:05', NULL, 16, 2, 1, 2, 1, 1, 1, 53, 23),
(26, '0201 432 F', 'GNAHOUA', ' Banon Elodie epse ADOU', 'GNAHOUA-Banon-Elodie-epse-ADOU', 'Abobo', '1986-09-16', 'Feu GNAHOUA Emmanuel', 'GNAHOUA née Okrou Germaine', 'Mr Adou 59 86 57 37', '47 01 71 67 ', '', 'elogne@yahoo.fr', '0', '2014-01-02', '2018-08-22 14:02:33', NULL, 13, 1, 2, 2, 15, 12, 5, 30, 12),
(27, '360 744 Y', 'GUEU', ' Banti Philomene', 'GUEU-Banti-Philomene', 'Abobo ', '1979-09-06', 'Gueu Douen Félix', 'Boh Makenleu', 'Gueu Félix 07 45 77 79', '08 95 33 69 ', '', 'gphilomene@yahoo.fr', '2', '2014-12-15', '2018-08-22 14:11:10', NULL, 7, 2, 2, 1, 8, 2, 3, 16, 23),
(28, '317 035 M', 'IREGBE', 'Manan Florent', 'IREGBE-Manan-Florent', 'Oumé', '1974-05-06', 'Irégbé Zéba', 'Tiama Yaoli Lucie', 'Kouamé Diaboa Omer 07 88 90 12', '47 97 27 12 ', '', 'florent_manan@yahoo.fr', '2', '2006-03-09', '2018-08-22 14:14:21', NULL, 13, 2, 1, 1, 4, 2, 5, 17, 23),
(29, '373 015 Z', 'KANDE', ' Mamadou', 'KANDE-Mamadou', 'Abobo', '1986-03-28', 'Amadou Kandé', 'Natognin Kandé', '', '48 86 50 28', '', 'Mkande051@gmail,com', '0', '2014-01-02', '2018-08-22 14:21:20', NULL, 12, 2, 1, 2, 4, 2, 5, 19, 23),
(30, '02014 30 D', 'KODJO', 'Amma Patricia epse Gonsan', 'KODJO-Amma-Patricia-epse-Gonsan', 'Abobo ', '1981-07-27', 'Kodjo Camille', 'N\'Zo Loukou Virginie', 'Gonsan Fréderic 06 61 23 88', '59 68 67 44 / 05 30 10 14 ', '', 'patkodjo@yahoo.fr', '1', '2014-01-02', '2018-08-24 12:54:12', NULL, 18, 1, 2, 2, 15, 12, 5, 26, 13),
(31, '02002 12 L', 'KOFFI', ' Kouadio Marie Prudence Ahou', 'KOFFI-Kouadio-Marie-Prudence-Ahou', 'Bouaflé', '1975-03-06', 'Koffi Kouadio Jean ', 'Ahoué N\'guessan Madeleine ', 'Mr Wadja 77 00 94 53    Mlle koffi marie galane 07 88 97 39', '58 29 81 93 / 05 57 77 26 ', '', 'amariprud@yahoo.fr', '1', '2002-01-01', '2018-08-22 15:37:35', NULL, 12, 1, 2, 1, 15, 12, 5, 27, 24),
(32, '423 128 J', 'Koffi ', 'Kouame Mathurin', 'Koffi-Kouame-Mathurin', 'N\'Gorankro (S/P Sinfra)', '1983-11-13', 'N\'Gatta Koffi', 'Dje Affoué', 'Koffi Edmond 09 76 01 78', '08 87 09 37 ', '', 'mathurskoffi@yahoo.fr', '0', '2016-02-12', '2018-08-22 15:15:24', NULL, 3, 2, 1, 1, 2, 1, 5, 13, 23),
(33, '356 223 D', 'KOFFI', 'Kouassi Guy Roger', 'KOFFI-Kouassi-Guy-Roger', 'Cocody', '1977-03-14', 'KOFFI Bilé Bernard', 'N\'Da Bilé Ya Eugeunie', 'Tano Affoué Patricia 49 18 75 45', '07 69 77 40 ', '04 29 79 70 ', 'kkroger@yahoo.fr', '3', '2010-07-01', '2018-08-22 15:20:21', NULL, 13, 2, 1, 1, 2, 1, 5, 3, 23),
(34, '02014 22 V', 'KOHOU', ' Blesson Joelle epse KOUAKOU Minan', 'KOHOU-Blesson-Joelle-epse-KOUAKOU-Minan', 'Dedjan S/P Bloléquin', '1984-09-03', 'Kohou René', 'Djiblo Béatrice ', 'Mr Kouakou Minan 07 06 15 64', '58 87 20 06 ', '', 'joelleblesson@yahoo.fr', '1', '2014-01-02', '2018-08-22 15:32:12', NULL, 12, 1, 2, 2, 15, 12, 5, 31, 15),
(35, '443 123 R', 'KONAN', 'N\'guessan ', 'KONAN-N\'guessan', 'ATTEKRO (S/P DIDIEVI)', '1984-01-02', 'KONAN KONAN', 'KONAN AKISSI', 'Mme AUKA 07 02 26 56', '09 07 37 05', '04 06 00 93', 'Nkonan972@gmail.com', '1', '2017-04-13', '2018-08-22 15:24:14', NULL, 16, 2, 1, 1, 3, 1, 4, 2, 23),
(36, '02007 15 O', 'KONATE', ' Aistan epse Siéwé', 'KONATE-Aistan-epse-Siéwé', 'Abidjan-Koumassi', '1978-09-22', 'Adama Konaté', 'Diarra Fanda', 'Adama Konaté 09 21 29 58 ', '05 83 99 88 ', '', 'aistan_2006@yahoo.fr', '0', '2007-01-01', '2018-08-23 10:00:09', NULL, 13, 1, 2, 2, 15, 12, 3, 12, 14),
(37, '366 234 A', 'KONKOUGNE', 'Adjoua Suzanne', 'KONKOUGNE-Adjoua-Suzanne', 'ADJAME', '1976-08-31', 'PND', 'KONKOUGNE AFFOUE', 'MME ALLAH AFFOUE 01 41 17 57', '07 81 94 95', '40 06 18 42', 'adjouakani34@yahoo.fr', '1', '2017-05-02', '2018-08-22 15:40:47', NULL, 6, 2, 2, 1, 3, 1, 5, 2, 23),
(38, '0201 424 X', 'KOUAKOU', 'Kouakou Blaise', 'KOUAKOU-Kouakou-Blaise', 'Assokro 2 (S/P Ouellé)', '1977-09-07', 'Yao Kouakou', 'Yao N\'Goran', 'Mr Ya Brou 07 70 94 60 ', '08 25 55 17 ', '', 'blaisekouakou@gmail.com', '0', '2014-01-01', '2018-08-22 15:43:13', NULL, 14, 1, 1, 1, 15, 12, 5, 31, 15),
(39, '434 866 R', 'KOUAKOU', 'Kouakou Eric', 'KOUAKOU-Kouakou-Eric', 'DASSIOKO (S/P FRESCO)', '1985-12-16', 'KOFFI KOUAKOU EDOUARD ', 'N\'GOUAN ADJOUA YVONNE', 'KOFFI KOUAKOU EDOUARD 07590506', '07900134', '01278160', 'ericintello@ymail.com', '1', '2017-04-26', '2018-08-22 15:44:43', NULL, 9, 2, 1, 1, 4, 2, 5, 26, 23),
(40, '270 100 V', 'KOUAKOU', 'née Ayé Affoué Augustine', 'KOUAKOU-née-Ayé-Affoué-Augustine', 'Banguié (S/P Rubino) ', '1970-12-24', 'Ayé Germain', 'N\'Gbésso Epi', 'Kouakou Yao Brou  02 57 18 63 ', '08  15 38 84 ', '', 'aye_augu@yahoo.fr', '3', '2004-01-08', '2018-08-24 13:29:52', NULL, 12, 2, 2, 2, 4, 2, 5, 19, 23),
(41, '0201 426 Z', 'KOUAME', ' Kouakou Bonaventure', 'KOUAME-Kouakou-Bonaventure', 'Marcory ', '1982-06-10', 'Kouamé Kouamé Kouassi', 'Konan Ahou Mélanie', 'Mme Koffi 09 27 54 32 ', '07 28 93 49 ', '', 'kkbonaventure@yahoo.fr', '0', '2014-01-02', '2018-08-22 15:46:28', NULL, 2, 1, 1, 1, 15, 12, 5, 32, 16),
(42, '02015 44 R', 'KOUAME', 'Prosper', 'KOUAME-Prosper', 'Issia', '1977-12-16', 'YAO Kouamé Pascal', 'N\'Gbra Akissi', 'Mme Kouamé 06 13 84 70   /   Kouamé Jean-parfait 05 52 39 35', '57 51 52 23 ', '', 'kouamenaser@yahoo.fr', '4', '2015-01-02', '2018-08-24 12:16:10', NULL, 6, 1, 1, 2, 15, 12, 3, 29, 10),
(43, '269 689 S', 'KOUASSI', ' Brou N\'gbin', 'KOUASSI-Brou-N\'gbin', 'Kanango (S/P Tiébissou)', '1968-12-01', 'ALLOKO Kouassi', 'KOFFI Aya', 'Mme N\'gbin 06 15 24 76 ', '05 64 63 93 ', '01 25 55 68 ', 'kouassi_ngbin@yahoo.fr', '2', '2004-01-08', '2018-08-22 15:35:56', NULL, 12, 2, 1, 2, 3, 1, 2, 20, 23),
(44, '0200 909 I', 'KOUASSI', 'N\'krumah', 'KOUASSI-N\'krumah', 'Treichville', '1967-08-29', 'Kouassi Appoutou', 'N\'Cho Abby ', 'Mme Kouassi 44 02 14 01', '06 31045 67', '02 07 29 79  ', 'jeanbatkouassi@yahoo.fr', '0', '2000-01-01', '2018-08-22 15:49:17', NULL, 9, 1, 1, 2, 15, 12, 5, 11, 11),
(45, '421 047 J', 'KOUMAN', ' Ouattara Fatimata', 'KOUMAN-Ouattara-Fatimata', 'Abengourou', '1983-03-27', 'KOUAME Kouman dit Badaoudou', 'ADJA Anani', 'Mme Aissa 47 15 05 50', '00 00 00 00', '', 'matarafaty@yahoo.fr', '2', '2015-12-28', '2018-08-22 15:51:45', NULL, 16, 2, 2, 1, 5, 2, 5, 21, 23),
(46, '270 044 K', 'M\'BRA', 'Koffi Koua Dominique', 'M\'BRA-Koffi-Koua-Dominique', 'M\'Batto', '1973-12-23', 'M\'BRA Koffi Maurice', 'BINDE Tanoh Marie-claire', 'Kpangni Valerie 07 28 00 47', '08 83 45 80 ', '', 'mbradominik@gmail.com', '3', '2013-04-02', '2018-08-22 15:55:01', NULL, 15, 2, 1, 1, 3, 1, 3, 22, 23),
(47, '437 481 B', 'ME', ' Brice Axel Kyrill', 'ME-Brice-Axel-Kyrill', 'COCODY', '1989-10-20', 'ME YAO BERNARD', 'AKABO MAKOU MARIE PAULE GISELE', '', '77225799', '58062686', 'm.brice225@gmail.com', '2', '2017-04-13', '2018-08-22 15:54:12', NULL, 10, 2, 1, 2, 4, 2, 5, 4, 23),
(48, '02014 29 C', 'N\'DAMAN', 'Ahiza Josette', 'N\'DAMAN-Ahiza-Josette', 'Grand-bassam', '1987-11-10', 'N\'DAMAN Aka Firmin', 'KOUAHO Enokouba Delphine', 'Natchia Ahui Paul-juste 07 54 36 59', '09 09 55 79', ' 45 59 90 16', 'josetteahizaza@yahoo.fr', '0', '2014-01-02', '2018-08-22 15:58:31', NULL, 18, 1, 2, 1, 15, 12, 5, 32, 17),
(49, '291 110 Y', 'OTCHONI', ' Germaine Gnahore', 'OTCHONI-Germaine-Gnahore', 'Divo', '1968-03-20', 'Otchoni Jean', 'Ahoussou Amenan ', 'Otchoni Sabine  04 91 73 02 / 17 56 84 70 / 49 61  64 61 /05 63 25 98 ', '05 87 62 17', '48 81 28 11 ', 'germyotchoni@yahoo.com', '1', '2003-01-02', '2018-08-22 15:58:38', NULL, 18, 2, 2, 1, 4, 2, 5, 25, 23),
(50, '387 914 G', 'OUATTARA', 'Hafsa', 'OUATTARA-Hafsa', 'Treichville', '1985-01-16', 'Ouattara Ladji ', 'Soro Ahoua ', 'Mme Ouattara Ahoua  07 44 97 25 / 02 39 24 83 ', '07 29 82 55 ', '', 'h.ouattara@environnement.gouv.ci      ', '0', '2015-06-08', '2018-08-22 15:59:57', NULL, 1, 2, 2, 1, 4, 2, 3, 50, 23),
(51, '047 82 0080', 'OZIGRE', ' Koudou', 'OZIGRE-Koudou', 'GAGNOA', '1980-12-21', 'KOUDOU OZIGRE', 'KPRO BABLY', 'ZIBRI TOUSAINT 01 74 45 71', '01 04 68 76', '', 'koudouozigre@gmail.com', '4', '2012-01-10', '2018-08-22 16:06:23', NULL, 16, 2, 1, 2, 15, 12, 5, 36, 23),
(52, '421 052 P', 'PAKORA', ' Yagui Lisa Carole ', 'PAKORA-Yagui-Lisa-Carole', 'Treichville', '1980-12-09', 'PAKORA Ibo Joseph', 'ABLE Niana', 'MR MIAN BI 07 01 21 04', '08 42 86 84 ', '', 'lcypakora@yahoo.fr', '1', '2015-12-28', '2018-08-22 16:08:42', NULL, 17, 2, 2, 2, 5, 2, 5, 21, 23),
(53, '02014 33 G', 'SANOKO', 'Anzoumana ', 'SANOKO-Anzoumana', 'Bouaké', '1985-02-28', 'Bema SANOKO', 'Konaté Saumata', 'Badra Ali SANOKO  77 02 29 76 ', '08 99 45 55', '03 83 95 59 ', 'bazou85@yahoo.fr', '0', '2014-01-02', '2018-08-24 12:30:11', NULL, 12, 1, 1, 1, 15, 12, 5, 33, 18),
(54, '02014 38 L', 'SILUE', ' Dononton Alassane', 'SILUE-Dononton-Alassane', 'Sinématiali', '1991-01-13', 'Nangalougo Silué', 'Soro Banafana', 'Silue Lehevro  07 20 54 30 ', ' 08 21 46 45 ', '', 'silue2000@yahoo.f', '0', '2014-01-02', '2018-08-23 10:02:17', NULL, 13, 1, 1, 1, 15, 12, 5, 34, 19),
(55, '02014 31 E', 'SOHOUA', 'Akissi Marie Antoinette epse Bohui', 'SOHOUA-Akissi-Marie-Antoinette-epse-Bohui', 'Agboville ', '1981-12-15', 'SOHOUA Boni', 'N\'GBAKE Akissi', '', '46 64 51 04', '', 'antoinettebohui@yahoo.fr', '2', '2014-01-02', '2018-08-22 15:31:04', NULL, 12, 1, 2, 2, 15, 12, 5, 30, 12),
(56, '437 483 D', 'SORHO', 'Mêhan Louis-Gérard', 'SORHO-Mêhan-Louis-Gérard', 'BOUAKE', '1980-08-26', 'SORHO N\'golo Christian', 'COULIBALY Pegnonna Agnès', 'Mme SORHO 41 89 41 92', '41313597', '', 'lgsorho@gmail.com', '1', '2017-04-13', '2018-08-22 14:09:11', NULL, 5, 2, 1, 2, 4, 2, 5, 4, 23),
(57, '447 794 W', 'SORO', 'Foungotrigué', 'SORO-Foungotrigué', 'Korhogo ', '1982-06-01', 'SORO Yaya', 'COULIBALY Mama ', 'SIRIKI Coulibaly  07 94 07 04 ', '59 48 40 59 ', '', 'foungsoro@yahoo.fr', '2', '2015-01-02', '2018-08-24 12:28:45', NULL, 10, 2, 1, 2, 15, 12, 3, 30, 20),
(58, ' 443 228 A', 'SY', ' nee Toure Fatoumata', 'SY-nee-Toure-Fatoumata', 'ADJAME', '1988-05-08', 'TOURE IBRAHIMA', 'TOURE  MAKAGBE', 'SY HAMADOU SAMBA 09 25 06 34', '57 80 71 46', '', 'fatou.toure.sy@gmail', '3', '2017-04-26', '2018-08-24 12:26:14', NULL, 18, 2, 2, 2, 4, 2, 5, 4, 23),
(59, '206 525 X', 'TIBE', ' Bi Goba Gualbert', 'TIBE-Bi-Goba-Gualbert', 'Gobazra (Bonon)', '1959-07-12', 'LOPOUA Bi Tibé Alphonse', 'TIBE Lou Zah', 'Tibé Raymond 06 07 19 93 /Tibé Arsene 48 68 36 26', '09 92 85 09 ', '', 'tibebigoba@gmail.com', '4', '2016-05-11', '2018-08-22 14:58:17', NULL, 2, 2, 1, 2, 3, 1, 3, 23, 23),
(60, '02014 42 P', 'TOTOKRA', 'Koffi Richard ', 'TOTOKRA-Koffi-Richard', 'Bouaké', '1973-03-03', 'TOTOKRA Boni Sosthène', 'YAO Ahou Rosalie', 'TOTOKRA 05 71 91 32 / 01 16 20 29 ', '41 41 21 21', '46 47 90 87 ', '', '1', '2014-01-02', '2018-08-24 12:23:26', NULL, 9, 1, 1, 1, 15, 12, 5, 11, 11),
(61, '02014 21 U', 'WAHI', 'née ALLA Joelle', 'WAHI-née-ALLA-Joelle', 'Bottro ', '1977-07-05', 'Alla Yao', 'COULIBALY Nicole', 'Mr Wahi  07 82 92 79 ', '07 49 74 65 ', '', 'joellealla@yahoo.fr', '3', '2014-01-02', '2018-08-24 13:35:13', NULL, 12, 1, 2, 2, 15, 12, 5, 12, 14),
(62, '02007 16 P', 'YAO', 'N\'dri Denis', 'YAO-N\'dri-Denis', 'Ouffoué Diékro (Yamoussoukro)', '1974-05-25', 'Koffi Yao', 'Koffi Aya', 'Mme Yao  22 00 40 13 ', '07 45 17 17 ', '', 'yaondenis@gmail.com', '2', '2007-01-01', '2018-08-24 13:17:24', NULL, 12, 1, 1, 2, 15, 12, 5, 33, 18),
(63, '02013 19 S', 'YAPI', ' Séka Sylvain', 'YAPI-Séka-Sylvain', 'FIASSE (S/P YAKASSE-ATTOBROU)', '1964-03-23', 'KOKOA YAPI', 'KOKOA Apo', 'Yapi Atsé Augustin 57 65 31 77 ', '06 10 98 00', '47 22 11 21', '', '4', '2013-07-01', '2018-08-22 13:50:20', NULL, 9, 1, 1, 1, 15, 12, 5, 11, 11),
(64, '275 892 U', 'YEO', 'Daniel Nangbelé', 'YEO-Daniel-Nangbelé', 'BOUNDIALI', '1978-06-29', 'YEO  NANGBELE', 'TASSINI BAMBA', 'Mme yéo 07 67 97 71', '07 50 78 82 ', '', 'yedana@yahoo.fr', '0', '2014-01-02', '2018-08-22 13:16:49', NULL, 18, 2, 1, 2, 1, 1, 2, 24, 23),
(65, '02014 36 J', 'ZAGBA', ' Jeannette Edith Ruth', 'ZAGBA-Jeannette-Edith-Ruth', 'COCODY', '1978-06-29', 'ZAGBA N\'Drin ', 'BEUGRE Wahon Delphine', 'Mme Beugré Delphine ', '02 75 54 64 ', '', 'ruthzagba@yahoo.fr', '0', '2014-01-02', '2018-08-22 13:11:19', NULL, 3, 1, 2, 1, 15, 12, 5, 35, 21),
(66, '434 858 Z', 'Damoh', 'Ahounou Raoul', 'Damoh-Ahounou-Raoul', 'Grand Bassam', '1986-07-07', 'Abouoh Louis Damoh', 'Ettien Gnima Niamké', '', '08857385', '03881275', 'raouldamoh@gmail.com', '0', '2017-08-04', '2018-08-22 13:02:00', NULL, 9, 2, 1, 1, 4, 2, 5, 19, 23),
(67, '388105 H', 'SIE-LY', 'Anna Marianne', 'SIE-LY-Anna-Marianne', 'ABIDJAN', '1979-01-25', 'SIE-LY MICHEL', 'KANGAH NIYA', 'Mr ZOABLI  JJ 77 97 39 23/55 75 87 41', '08843664', '', 'annasiely@gmail.com', '0', '2017-10-04', '2018-08-22 15:41:24', NULL, 1, 1, 2, 2, 2, 1, 5, 40, 23),
(68, '453 244 C', 'ACHI', 'Nimba Guy Arnaud', 'ACHI-Nimba-Guy-Arnaud', 'Yopougon', '1986-11-18', 'ACHI JACOB', 'NASSY MARCELINE', 'ACHI JACOB 58 65 33 14', '09 28 63 72', '', 'achiarnaud@gmail.com', '0', '2017-10-20', '2018-08-24 13:22:37', '2018-06-20 20:15:30', 4, 2, 1, 1, 4, 2, 5, 14, 23),
(69, '0201705L', 'LEBO', 'Lebo Armel Wilfried', 'LEBO-Lebo-Armel-Wilfried', 'Abobo', '1985-05-10', 'KOUASSI LEBO BREGUI', 'BOLY BAHONON ', 'KOUASSI LEBO BREGUI 09645512', '53013619', '', 'merlow07@yahoo.fr', '0', '2017-08-18', '2018-08-22 15:55:58', NULL, 7, 1, 1, 1, 15, 12, 5, 8, 4),
(70, '454 824 K', 'ALLIMAN', 'Adjabi Christian', 'ALLIMAN-Adjabi-Christian', 'YOPOUGON', '1986-11-12', 'ALLIMAN ADJABI JAMES', 'ASSI OBOUAFO MARCELINE', '', '58087399', '', 'christianadjabi@gmail.com', '0', '2018-03-07', '2018-08-22 12:53:36', '2018-06-20 20:26:06', 11, 2, 1, 1, 10, 13, 5, 38, 23),
(71, '383170 G', 'AZI', 'Georges Rosard', 'AZI-Georges-Rosard', 'BOUAFLE', '1985-08-15', 'AZI Amani Francois', 'KONAN Aya Lecricia', 'N\'GOH SYLVIE 07 47 51 70', '08 86 84 30', '', 'georgesazi@yahoo.fr', '0', '2017-08-08', '2018-08-22 12:39:20', NULL, 10, 2, 1, 1, 11, 13, 5, 36, 23),
(72, '297 323 X', 'BAMBA', 'Maméry', 'BAMBA-Maméry', 'TOUBA', '1977-03-10', 'Mamadou BAMBA', 'N\'gah BAMBA', 'OUATTARA Djenebou 77 39 65 52', '07286195', '04 869 534', 'b.mamery@yahoo.fr', '2', '2017-07-05', '2018-08-24 12:27:29', NULL, 13, 2, 1, 1, 3, 1, 4, 36, 23),
(73, '443 209 Q', 'BOUA', 'Djahi Melissa Stephanie epse  DOGBO', 'BOUA-Djahi-Melissa-Stephanie-epse--DOGBO', 'Divo', '1987-06-26', 'BOUA Léon', 'AVY Anick', 'DOGBO Guy-Richard 47 30 79 73', '07009824', '01 38 01 94 ', 'mely1987@yahoo.fr', '3', '2017-07-25', '2018-08-22 13:15:18', NULL, 9, 2, 2, 2, 9, 13, 5, 36, 23),
(74, '320 680 L', 'DIBI', 'Didier Fulgence', 'DIBI-Didier-Fulgence', 'YOPOUGON', '1980-06-23', '', '', '', '57755076', '', 'didierfulgenced@gmail.com', '0', '2017-07-25', '2018-08-22 13:12:35', NULL, 13, 2, 1, 1, 4, 2, 5, 17, 23),
(75, '454 834 M', 'FOFANA', 'KOPELE Guy Abraham David', 'FOFANA-KOPELE-Guy-Abraham-David', 'DIDIEVI', '1989-09-29', 'FOFANA LENEKPOHO', 'KONAN AFFOUE', 'FOFANA LENEKPOHO/ 05 71 57 59 / 08 23 2002', '59746416', '', 'fofanakopele@yahoo.fr', '0', '2018-02-08', '2018-08-22 13:33:42', NULL, 13, 2, 1, 1, 3, 1, 5, 13, 23),
(76, '365 678 W', 'GNEGNENE', 'Armel Simplice', 'GNEGNENE-Armel-Simplice', 'FERKESSEDOUGOU', '1973-08-16', 'BOHOULET GNEGNENE', 'GNADRO AGNES', '', '47122750', '', 'sgnegnene@gmail.com', '0', '2017-11-12', '2018-08-22 14:58:22', NULL, 8, 2, 1, 2, 3, 1, 5, 55, 23),
(77, '305 387 G', 'KABRAN', 'Réné', 'KABRAN-Réné', 'Agnibilekro', '1975-03-18', 'KOUADIO KABRAN', 'BROU AKISSI', 'TRA LEATICIA 07 94 45 04/ 01 60 20 38', '47553740', '', 'renekabran@yahoo.fr', '4', '2017-07-27', '2018-08-22 15:25:42', NULL, 12, 2, 1, 1, 2, 1, 4, 18, 23),
(78, '395 585 R', 'YAO', 'Noel Kobéna', 'YAO-Noel-Kobéna', 'ADJAME', '1971-12-23', 'FEU KOBENA GILBERT', 'N\'GUESSAN AFFOUA', 'MME KOBENAN 01 58 01 48', '08 20 27 69', '', 'yaonoelkob@gmail.com', '2', '2017-07-11', '2018-08-24 13:16:16', NULL, 12, 2, 1, 1, 4, 2, 5, 59, 23),
(79, '361 865 E', 'KOFFI', 'née Gueu Ouasseka Franchise', 'KOFFI-née-Gueu-Ouasseka-Franchise', 'Gnin Gleu', '1985-12-05', 'GUEU PIERRE', 'TOBO VERONIQUE', '', '47767776', '', 'ehisegueu@yahoo.fr', '0', '2017-06-23', '2018-08-22 15:28:45', NULL, 16, 2, 2, 2, 8, 2, 5, 21, 23),
(80, '284 883 M', 'KOFFI', 'Kouame Jean-Baptiste', 'KOFFI-Kouame-Jean-Baptiste', 'M\'bahia-Yaokro', '1964-01-01', 'TANO Koffi', 'KOFFI Akissi', '', '05752551', '77 88 74 96', 'koffijeanbeken@gmail.com', '3', '2017-08-29', '2018-08-22 15:28:44', NULL, 10, 2, 1, 2, 14, 14, 5, 11, 23),
(81, '454 841 U', 'KESSE', 'Manzan Inès', 'KESSE-Manzan-Inès', 'ARRAH', '1985-04-19', 'KESSE Kacou', 'ASSIELOU Sakia', 'KESSE Ya Marie: 01 05 99 42', '57 98 87 32', '02 12 49 16', 'loiskesse@yahoo.fr', '0', '2018-02-08', '2018-08-24 13:18:04', NULL, 15, 2, 2, 1, 4, 2, 5, 37, 23),
(82, '356 712 F', 'YAO', 'Koffi  Eugène', 'YAO-Koffi--Eugène', 'BAMORO BOUAKE', '2018-06-06', 'KANGA YAO', 'YAO ADJOUA', 'Dr YAO AMANY FAUSTIN   57 46 10 45/ 05 52 69 03', '47107273', '', 'ykoff79@gmail.com', '0', '2018-02-02', '2018-08-22 16:02:30', NULL, 12, 2, 1, 1, 2, 1, 5, 54, 23),
(83, '456 695 U', 'KOUASSI', 'Kouadio Hervé', 'KOUASSI-Kouadio-Hervé', 'TAPEGUHE DALOA', '1979-12-30', 'KOFFI KOUASSI', 'Feu N\'GUESSAN CHANTAL', '', '07045702', '', 'k2herve@gmail.com', '0', '2018-01-31', '2018-08-23 10:06:06', NULL, 1, 2, 1, 1, 4, 2, 5, 36, 23),
(84, '298 044 C', 'YAPI', 'Téby Bertin', 'YAPI-Téby-Bertin', 'ANYAMA', '1954-03-03', 'YAPI RAYMOND', 'CHIAKE CELINE', 'Yapi Atsé Augustin 57 65 31 77 ', '07395198', '', 'yapiteby@gmail.com', '4', '2017-08-28', '2018-08-22 13:20:48', NULL, 9, 2, 1, 1, 14, 14, 5, 11, 23),
(85, '454 854 Z', 'SORO', 'Tanfoltien', 'SORO-Tanfoltien', 'FERKESSEDOUGOU', '1989-09-29', 'SORO Dohouele', 'YEO Korotome', 'KONE MANHMA 05 28 39 53/78 93 23 13 ', '05819970', '', 'sorotenfoltien@yahoo.fr', '0', '2018-02-02', '2018-08-24 12:21:10', NULL, 13, 2, 1, 1, 2, 1, 5, 3, 23),
(86, '366207Q', 'youho', 'zinongbo jerome', 'youho-zinongbo-jerome', 'TAPEGHUE BUYO', '1981-01-05', '', '', '', '08451406', '', 'youho3@yahoo.fr', '0', '2017-09-03', '2018-06-25 12:25:43', NULL, 12, 2, 1, 1, 3, 1, 5, 2, 23),
(87, '385 129 V', 'ZAHIRI', 'Annick', 'ZAHIRI-Annick', 'SAIOUA', '1976-08-04', 'ZAHIRI Lognon', 'BDIE Biagne Yvonne', '', '47759556', '', 'annickzahiri3@gmail.com', '2', '2017-06-20', '2018-08-22 12:50:01', NULL, 4, 2, 2, 1, 8, 2, 5, 21, 23),
(88, '322 609 P', 'TANOH', 'Luc', 'TANOH-Luc', 'TIASSALE', '1978-06-06', 'ACKAH TANONTCHI', 'N\'GORAN DIAHA', 'KONAN MARIE-LISE 40 34 00 25', '07407632', '', 'artistelucas@yahoo.fr', '0', '2017-07-06', '2018-08-22 15:17:42', NULL, 9, 2, 1, 1, 1, 1, 5, 56, 23),
(90, '343 416 S', 'MEA', 'née Konan Ahou Solange', 'MEA-née-Konan-Ahou-Solange', 'TREICHVILLE', '1968-05-09', '', 'Konan Akissi Odette', '', '07234651', '', 'measolo32@yahoo.fr', '2', '2017-07-25', '2018-08-22 16:06:43', NULL, 13, 2, 2, 2, 4, 2, 4, 17, 23),
(91, '440 456 G', 'KOUAME', 'N\'guessan Paul', 'KOUAME-N\'guessan-Paul', 'OUME', '1976-05-31', '', '', '', '57577238', '', 'nsanpol@gmail.com', '2', '2017-07-21', '2018-08-22 15:50:33', NULL, 14, 2, 1, 1, 4, 2, 5, 19, 23),
(92, '287 567 S', 'ASSI', 'Adou Nicomède', 'ASSI-Adou-Nicomède', 'Yakassé Attobrou', '1972-02-01', 'ASSI Akissi Alfred', 'BOYO Assi Bah', 'Ebrottié Martine 03891800 ', '08 36 95 98', '03 18 43 53', 'assiadou4@gmail.com', '6', '2009-04-01', '2018-08-24 09:38:08', NULL, 9, 2, 1, 2, 1, 1, 3, 41, 23),
(93, '', 'SAPIM ', 'Ettien Akouassi Mickaelle ', 'SAPIM-Ettien-Akouassi-Mickaelle', 'Abidjan- Yopougon', '1990-04-25', 'SAPIM Brou Celestin ', 'ADAGRA Adjoa Agathe', 'ADAGRA Adjoa Agathe 49 56 49 23', '49 84 42 10', '', 'sapimmikaelle90@gmail.com', '0', '2018-07-09', '2018-08-24 12:43:07', NULL, 19, 1, 2, 1, 15, 12, 5, 26, 13),
(94, '', 'TRA ', 'Bi Diagoné Grégoire', 'TRA-Bi-Diagoné-Grégoire', 'Vavoua', '1975-11-20', 'DIAGONE Bi Tra', 'Yoli Lou Gon', 'KOUADIO Edwige 58 58 47 52', '77 25 28 34', '73 24 95 60', '', '3', '2018-07-09', '2018-08-24 12:48:45', NULL, 10, 1, 2, 1, 15, 12, 5, 58, 29),
(95, '', 'N\'GOUANDI', 'Kouadio Benjamin ', 'N\'GOUANDI-Kouadio-Benjamin', 'KONGODIA S/P AGNIBILEKROU', '1995-02-17', 'N\'GOUANDI Gnangoran Marcelin', 'TANO Yah Marie ', 'GNANGORAN N\'Gouan Théophile 57 13 17 97 ', '77 54 01 57', '85 42 09 88', 'ngouandikouadiobenjamin@gmail.com', '0', '2018-07-09', '2018-08-24 12:41:03', NULL, 6, 1, 2, 1, 15, 12, 5, 29, 30);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'Cadre expérimente'),
(4, 'Cadre supérieur'),
(5, 'Cadre Moyen confirmé'),
(6, 'Cadre Moyen débutant'),
(7, 'Cadre débutant'),
(8, 'Agent d exécution spécialisé expérimenté'),
(9, 'Agent d exécution Spécialisé'),
(10, 'Agent d Exécution confirmé'),
(11, 'Agent d Exécution débutant'),
(12, 'N/A'),
(13, 'C'),
(14, 'D');

-- --------------------------------------------------------

--
-- Structure de la table `diploma`
--

DROP TABLE IF EXISTS `diploma`;
CREATE TABLE IF NOT EXISTS `diploma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diploma`
--

INSERT INTO `diploma` (`id`, `name`) VALUES
(1, 'Maîtrise de Sciences de Gestion'),
(2, 'DUT finances'),
(3, 'Ingénieur Marketing'),
(4, 'Maîtrise Science économiques'),
(5, 'BTS finance-comptabilité'),
(6, 'BT Mécanique'),
(7, 'BEPC'),
(8, 'Licence en Géographie'),
(9, 'Ingénieur Agronome'),
(10, 'Maîtrise de droit'),
(11, 'Permis de conduire '),
(12, 'BTS Environnement et cadre de vie'),
(13, 'BTS Communication d\'entreprise'),
(14, 'Maîtrise en Géographie'),
(15, 'Maîtrise de Sociologie de l\'environnement'),
(16, 'Maîtrise Appliquée, option Lettre Moderne'),
(17, 'Licence en Lettres Modernes'),
(18, 'BTS Mine, Géologie, Pétrole'),
(19, 'BTS Sécurité-Incendie et Prévention'),
(20, 'BTS Gestion de l\'environnement'),
(21, 'BTS Génie Thermique '),
(22, 'BTS Informatique Développeur d\'application'),
(23, 'N/A'),
(24, 'N/F'),
(25, 'Licence Professionnelle Réseaux Génie Logiciel'),
(26, 'DUT  ASSURANCE'),
(27, 'Technicien Supérieur en Informatique (Maintenance)'),
(28, 'Inspecteur Principal (Communication)'),
(29, 'CEPE'),
(30, 'LICENCE DE DROIT');

-- --------------------------------------------------------

--
-- Structure de la table `function`
--

DROP TABLE IF EXISTS `function`;
CREATE TABLE IF NOT EXISTS `function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `function`
--

INSERT INTO `function` (`id`, `name`) VALUES
(1, 'Directeur Générale'),
(2, 'Sous-Directeur'),
(3, 'Chef de Service'),
(4, 'Chargé d\'Etudes'),
(5, 'Agent');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, 'A5'),
(2, 'A4'),
(3, 'A3'),
(4, 'B3'),
(5, 'B2'),
(6, 'A7'),
(7, 'A6'),
(8, 'B1'),
(9, 'C3'),
(10, 'C2'),
(11, 'C1'),
(12, 'D3'),
(13, 'D2'),
(14, 'D1'),
(15, 'N/A');

-- --------------------------------------------------------

--
-- Structure de la table `maritalstatus`
--

DROP TABLE IF EXISTS `maritalstatus`;
CREATE TABLE IF NOT EXISTS `maritalstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `maritalstatus`
--

INSERT INTO `maritalstatus` (`id`, `name`) VALUES
(1, 'Célibataire'),
(2, 'Marié(e)');

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `duration_mission` varchar(255) DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `budget_allocation` varchar(255) DEFAULT NULL,
  `start_mission` date NOT NULL,
  `end_mission` date DEFAULT NULL,
  `type_mission_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `upper_hierarchy_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_mission_id` (`type_mission_id`),
  KEY `service_id` (`service_id`),
  KEY `upper_hierarchy_id` (`upper_hierarchy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id`, `name`, `location`, `slug`, `created_at`, `duration_mission`, `transport`, `budget_allocation`, `start_mission`, `end_mission`, `type_mission_id`, `service_id`, `upper_hierarchy_id`) VALUES
(301, 'mission TDR a divo', 'divo', 'mission-TDR-a-divo', '2018-07-24 11:15:11', '1', 'Véhicule ANDE', 'ANDE', '2018-07-24', '2018-07-24', 4, 15, 12),
(303, 'Démarrage de l\'évaluation environnementale et sociale stratégique de la zone agro industrielle de Séguéla', 'Séguéla', 'Démarrage-de-l\'évaluation-en', '2018-08-23 10:53:18', '3', 'Véhicule Promoteur', 'Promoteur', '2018-08-26', '2018-08-28', 10, 15, 64),
(304, 'Mission préparatoire de l’enquête publique de l\'extension et de rénovation de l’hôtel du Golf.', 'ABIDJAN-COCODY', 'Mission-préparatoire-de-l’e', '2018-08-24 11:25:48', '1', 'Véhicule ANDE', 'ANDE', '2018-08-24', '2018-08-24', 4, 12, 12),
(305, 'Mission préparatoire de l’enquête publique de l\'extension et de rénovation de l’hôtel du Golf.', 'ABIDJAN-COCODY', 'Mission-préparatoire-de-l’e', '2018-08-24 11:27:53', '1', 'Véhicule ANDE', 'ANDE', '2018-08-24', '2018-08-24', 4, 12, 25);

-- --------------------------------------------------------

--
-- Structure de la table `participate_in_mission`
--

DROP TABLE IF EXISTS `participate_in_mission`;
CREATE TABLE IF NOT EXISTS `participate_in_mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mission_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `executed_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mission_id` (`mission_id`),
  KEY `agent_id` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participate_in_mission`
--

INSERT INTO `participate_in_mission` (`id`, `mission_id`, `agent_id`, `executed_on`) VALUES
(1, NULL, NULL, '2018-06-21'),
(2, NULL, 6, '2018-07-01'),
(3, 301, 13, '2018-07-24'),
(4, NULL, 4, '2018-08-25'),
(5, NULL, 61, '2018-08-25'),
(6, NULL, 29, '2018-08-25'),
(7, 303, 46, '2018-08-26'),
(8, 303, 81, '2018-08-26'),
(10, 305, 29, '2018-08-24');

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180130093646, 'CreateAgentsTable', '2018-06-20 18:48:54', '2018-06-20 18:48:54', 0),
(20180203074646, 'AddServicesTable', '2018-06-20 18:48:54', '2018-06-20 18:48:55', 0),
(20180204185133, 'AddStatutTable', '2018-06-20 18:48:55', '2018-06-20 18:48:55', 0),
(20180205095050, 'AddSexTable', '2018-06-20 18:48:55', '2018-06-20 18:48:56', 0),
(20180205100027, 'AddMaritalstatusTable', '2018-06-20 18:48:56', '2018-06-20 18:48:56', 0),
(20180205100636, 'AddGradeTable', '2018-06-20 18:48:56', '2018-06-20 18:48:57', 0),
(20180205100913, 'AddCategoryTable', '2018-06-20 18:48:57', '2018-06-20 18:48:57', 0),
(20180205101410, 'AddFunctionTable', '2018-06-20 18:48:57', '2018-06-20 18:48:58', 0),
(20180205102834, 'AddProfessionTable', '2018-06-20 18:48:58', '2018-06-20 18:48:58', 0),
(20180205103117, 'AddDiplomaTable', '2018-06-20 18:48:58', '2018-06-20 18:48:59', 0),
(20180205105440, 'AddForeignkeyToAgentTable', '2018-06-20 18:48:59', '2018-06-20 18:49:22', 0),
(20180228141800, 'CreatMissionTable', '2018-06-20 18:49:22', '2018-06-20 18:49:23', 0),
(20180515134722, 'TypeMissionTable', '2018-06-20 18:49:23', '2018-06-20 18:49:23', 0),
(20180519065841, 'AddForeignkeyTypemissionToMissionTable', '2018-06-20 18:49:23', '2018-06-20 18:49:25', 0),
(20180519070429, 'AddForeignkeyServiceToMissionTable', '2018-06-20 18:49:25', '2018-06-20 18:49:28', 0),
(20180605214708, 'ParticipatesInMission', '2018-06-20 18:49:28', '2018-06-20 18:49:28', 0),
(20180606003141, 'AddForeignkeyToParticipateInMissionTable', '2018-06-20 18:49:28', '2018-06-20 18:49:32', 0),
(20180717130225, 'AddForeignkeyAgentToMissionTable', '2018-07-17 15:19:31', '2018-07-17 15:19:34', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`id`, `name`) VALUES
(1, 'Technicienne Supérieure en Informatique'),
(2, 'Attaché administratif'),
(3, 'Ingénieur génie sanitaire et environnement'),
(4, 'Assistant comptable'),
(5, 'Ingénieur marketing'),
(6, 'Attaché des Finances'),
(7, 'Professeur de Lycée Professionnel'),
(8, 'Economiste'),
(9, 'Technicien en Mécanique '),
(10, 'Attaché de recherche'),
(11, 'Chauffeur '),
(12, 'Géographe '),
(13, 'Ingénieur des Techniques des Eaux et Forêts'),
(14, 'Technicien supérieur en comptabilité et finance '),
(15, 'Maître assistant de conférence et chercheur'),
(16, 'Secrétaire Assistant(e) comptable'),
(17, 'Technicien supérieur de la santé'),
(18, 'Ingénieur Eaux et Forêts'),
(19, 'Secrétaire Administratif'),
(20, 'Ingénieur des Techniques des Travaux Publics'),
(21, 'Secrétaire Assistant(e) de Direction'),
(22, 'Ingénieur des techniques sanitaires'),
(23, 'Conseiller pédagogique'),
(24, 'Administrateur principal des services financiers'),
(25, 'Secrétaire de direction'),
(26, 'Technicien Supérieur de la Communication '),
(27, 'N/A'),
(28, 'Ingénieur Agronome'),
(29, 'Juriste'),
(30, 'Technicien Supérieur en Environnement'),
(31, 'Sociologue'),
(32, 'Lettre Moderne'),
(33, 'Technicien Supérieur en Mine, Géologie et Pétrole'),
(34, 'Technicien Supérieur en Sécurité-Prévention'),
(35, 'Technicien Supérieur en Génie Thermique '),
(36, 'Adjoint administratif'),
(37, 'Assistant de Production Animal et Vegetal Option eaux et Foret'),
(38, 'Moniteur de Production Animal et Vegetal Option eaux et Foret'),
(39, 'Licence Professionnelle Réseaux Génie Logiciel'),
(40, 'ingénieure en Informatique'),
(41, 'Inspecteur Principal (Communication)'),
(42, 'Technicien Superieur de l\'informatique (maintenance )'),
(43, 'Ingénieur Génie Sanitaire'),
(44, 'Agent Assurance'),
(45, 'AGENT ASSURANCE'),
(46, 'MPVA option  Eaux et Forêts'),
(47, 'Ingenieur des Techniques Sanitaires option Microbiologie'),
(48, 'Ingenieur des Techniques Sanitaires option Microbiologie'),
(49, 'Coursier'),
(50, 'Technicien Supérieur de l’Informatique (Développeur d\'Application)'),
(51, 'COMPTABLE'),
(52, 'Professeur de Collège'),
(53, 'Enseignant Chercheur'),
(54, 'Professeur de Lycée'),
(55, 'Attaché des Finances'),
(56, 'Conservateur Principal de Musée'),
(57, 'Militaire'),
(58, 'Agent de bureau'),
(59, 'Technicien Supérieur en Hydraulique');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sigle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `sigle`) VALUES
(1, 'Informatique', 'INF'),
(2, 'Communication ', 'COM'),
(3, 'Mécanisme pour le Développement Propre', 'MDP'),
(4, 'Agence Comptable', 'AC'),
(5, 'Contrôle Budgétaire', 'CB'),
(6, 'Juridique', 'JRD'),
(7, 'Budget et Facturation', 'BF'),
(8, 'RICI', 'RICI'),
(9, 'Ressources Humaines et Formations', 'RHF'),
(10, 'Patrimoine et Passation des Marchés', 'PPM'),
(11, 'S/D AERI', 'AERI'),
(12, 'Etude d\'Impact Environnemental et Social', 'EIES'),
(13, 'Audit Environnemental', 'AE'),
(14, 'Suivi Environnemental et Social', 'SES'),
(15, 'Evaluation Environnementale Stratégique', 'EES'),
(16, 'Direction Générale', 'DG'),
(17, 'Agents de la Direction Générale', ''),
(18, 'N/A', ''),
(19, 'S/D PSEP', 'PSEP');

-- --------------------------------------------------------

--
-- Structure de la table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'Homme'),
(2, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

DROP TABLE IF EXISTS `statuts`;
CREATE TABLE IF NOT EXISTS `statuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `name`) VALUES
(1, 'Contractuel'),
(2, 'Fonctionnaire');

-- --------------------------------------------------------

--
-- Structure de la table `type_mission`
--

DROP TABLE IF EXISTS `type_mission`;
CREATE TABLE IF NOT EXISTS `type_mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_mission`
--

INSERT INTO `type_mission` (`id`, `name`) VALUES
(1, 'Visites de Site'),
(2, 'Réunions publiques'),
(3, 'Préparation d\'enquêtes publiques'),
(4, 'Enquêtes publiques'),
(5, 'Vérification de conformité rêglementaire'),
(6, 'Constat de cas de pollution'),
(7, 'Suivi CGES'),
(8, 'Suivi PGES'),
(9, 'Mise en oeuvre du plan d\'actions'),
(10, 'Atelier'),
(11, 'Séminaire'),
(12, 'Atelier'),
(13, 'Séminaire');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_3` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_4` FOREIGN KEY (`maritalstatus_id`) REFERENCES `maritalstatus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_5` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_6` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_7` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_8` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_ibfk_9` FOREIGN KEY (`diploma_id`) REFERENCES `diploma` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`type_mission_id`) REFERENCES `type_mission` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mission_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mission_ibfk_3` FOREIGN KEY (`upper_hierarchy_id`) REFERENCES `agents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `participate_in_mission`
--
ALTER TABLE `participate_in_mission`
  ADD CONSTRAINT `participate_in_mission_ibfk_1` FOREIGN KEY (`mission_id`) REFERENCES `mission` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `participate_in_mission_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
