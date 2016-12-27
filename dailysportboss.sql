-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 11:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailysportboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(11) NOT NULL,
  `leagues_id` int(11) NOT NULL,
  `entry_fee` int(11) NOT NULL,
  `contest_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `entry_max` int(11) NOT NULL,
  `entry_limit_register` int(22) NOT NULL,
  `guarantee_type_id` int(11) NOT NULL DEFAULT '1',
  `multi_type_id` int(11) NOT NULL DEFAULT '1',
  `contests_prizes_id` int(11) NOT NULL DEFAULT '1',
  `sponsors_id` int(11) NOT NULL DEFAULT '1',
  `contest_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `leagues_id`, `entry_fee`, `contest_name`, `start_date`, `start_time`, `entry_max`, `entry_limit_register`, `guarantee_type_id`, `multi_type_id`, `contests_prizes_id`, `sponsors_id`, `contest_status`) VALUES
(1, 1, 0, 'Saturday EPL Galore', '2016-12-27', '00:00:00', 5, 5, 1, 1, 1, 1, 0),
(2, 1, 0, 'Sunday EPL Craze', '2016-12-27', '00:00:00', 1, 1, 1, 1, 1, 1, 0),
(3, 1, 0, 'Weekend EPL Smash', '2016-12-27', '01:00:00', 5, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contests_has_sports_events`
--

CREATE TABLE `contests_has_sports_events` (
  `id` int(11) NOT NULL,
  `contests_id` int(11) NOT NULL,
  `sports_events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contests_has_sports_events`
--

INSERT INTO `contests_has_sports_events` (`id`, `contests_id`, `sports_events_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 3, 10),
(11, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `contests_prize`
--

CREATE TABLE `contests_prize` (
  `id` int(22) NOT NULL,
  `prize` int(22) NOT NULL,
  `upto` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contests_prize`
--

INSERT INTO `contests_prize` (`id`, `prize`, `upto`, `currency`, `status`) VALUES
(1, 10000000, '*', 'Rp.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contests_rosters`
--

CREATE TABLE `contests_rosters` (
  `id` int(11) NOT NULL,
  `contests_users_entry_id` int(11) NOT NULL,
  `roster_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `player1` int(11) DEFAULT NULL,
  `player2` int(11) DEFAULT NULL,
  `player3` int(11) DEFAULT NULL,
  `player4` int(11) DEFAULT NULL,
  `player5` int(11) DEFAULT NULL,
  `player6` int(11) DEFAULT NULL,
  `player7` int(11) DEFAULT NULL,
  `player8` int(11) DEFAULT NULL,
  `player9` int(11) DEFAULT NULL,
  `player10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contests_users_entries`
--

CREATE TABLE `contests_users_entries` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_entry_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `league_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `league_shorthand` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `league_country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `sports_id`, `league_name`, `league_shorthand`, `league_country`, `logo`) VALUES
(1, 1, 'Barclays Premier League', 'BPL', 'United Kingdom', 'leagues/logo/1/bpl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nickname` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `sports_id`, `first_name`, `last_name`, `nickname`, `dob`, `nationality`) VALUES
(1, 1, 'Mathieu', 'Debuchy', '', '1985-07-28', 'FRA'),
(2, 1, 'Kieran', 'Gibbs', '', '1989-09-26', 'ENG'),
(3, 1, 'Alexis', 'Sánchez', '', '1988-12-19', 'CHI'),
(4, 1, 'Aaron', 'Ramsey', '', '1990-12-26', 'WAL'),
(5, 1, 'Jack', 'Wilshere', '', '1992-01-01', 'ENG'),
(6, 1, 'Simon', 'Francis', '', '1985-02-16', 'ENG'),
(7, 1, 'Steve', 'Cook', '', '1991-04-19', 'ENG'),
(8, 1, 'Dan', 'Gosling', '', '1990-02-02', 'ENG'),
(9, 1, 'Andrew', 'Surman', '', '1986-08-20', 'ENG'),
(10, 1, 'Benik', 'Afobe', '', '1993-02-12', 'ENG'),
(11, 1, 'Matthew', 'Lowton', '', '1989-06-09', 'ENG'),
(12, 1, 'Danny', 'Lafferty', '', '1989-04-01', 'NIR'),
(13, 1, 'Andre', 'Gray', '', '1991-06-26', 'ENG'),
(14, 1, 'Dean', 'Marney', '', '1984-01-31', 'ENG'),
(15, 1, 'Michael', 'Kightly', '', '1986-01-24', 'ENG'),
(16, 1, 'Branislav', 'Ivanovic', '', '1984-02-22', 'SRB'),
(17, 1, 'Cesc', 'Fàbregas', '', '1987-05-04', 'ESP'),
(18, 1, 'Kurt', 'Zouma', '', '1994-10-27', 'FRA'),
(19, 1, '', 'Oscar', 'Oscar', '1991-09-09', 'BRA'),
(20, 1, '', 'Pedro', 'Pedro', '1987-07-28', 'ESP'),
(21, 1, 'Joel', 'Ward', '', '1989-10-29', 'ENG'),
(22, 1, 'James', 'Tomkins', '', '1989-03-29', 'ENG'),
(23, 1, 'Yohan', 'Cabaye', '', '1986-01-14', 'FRA'),
(24, 1, 'Fraizer', 'Campbell', '', '1987-09-13', 'ENG'),
(25, 1, 'Andros', 'Townsend', '', '1991-07-16', 'ENG'),
(26, 1, 'Leighton', 'Baines', '', '1984-12-11', 'ENG'),
(27, 1, 'Darron', 'Gibson', '', '1987-10-25', 'IRL'),
(28, 1, 'Ashley', 'Williams', '', '1984-08-23', 'WAL'),
(29, 1, 'Gerard', 'Deulofeu', '', '1994-03-13', 'ESP'),
(30, 1, 'Ross', 'Barkley', '', '1993-12-05', 'ENG'),
(31, 1, 'Moses', 'Odubajo', '', '1993-07-28', 'ENG'),
(32, 1, 'Andrew', 'Robertson', '', '1994-03-11', 'SCO'),
(33, 1, 'David', 'Meyler', '', '1989-05-29', 'IRL'),
(34, 1, 'Tom', 'Huddlestone', '', '1986-12-28', 'ENG'),
(35, 1, 'Abel', 'Hernández', '', '1990-08-08', 'URU'),
(36, 1, 'Luis', 'Hernández', '', '1989-04-14', 'ESP'),
(37, 1, 'Ben', 'Chilwell', '', '1996-12-21', 'ENG'),
(38, 1, 'Daniel', 'Drinkwater', '', '1990-03-05', 'ENG'),
(39, 1, 'Ahmed', 'Musa', '', '1992-10-14', 'NGA'),
(40, 1, 'Matthew', 'James', '', '1991-07-22', 'ENG'),
(41, 1, 'Nathaniel', 'Clyne', '', '1991-04-05', 'ENG'),
(42, 1, 'Mamadou', 'Sakho', '', '1990-02-13', 'FRA'),
(43, 1, 'Georginio', 'Wijnaldum', '', '1990-11-11', 'NED'),
(44, 1, 'James', 'Milner', '', '1986-01-04', 'ENG'),
(45, 1, 'Daniel', 'Sturridge', '', '1989-09-01', 'ENG'),
(46, 1, 'Bacary', 'Sagna', '', '1983-02-14', 'FRA'),
(47, 1, 'Vincent', 'Kompany', '', '1986-04-10', 'BEL'),
(48, 1, '', 'Fernando', 'Fernando', '1987-07-25', 'BRA'),
(49, 1, 'Raheem', 'Sterling', '', '1994-12-08', 'ENG'),
(50, 1, '', 'Nolito', 'Nolito', '1986-10-15', 'ESP'),
(51, 1, 'Eric', 'Bailly', '', '1994-04-12', 'CIV'),
(52, 1, 'Phil', 'Jones', '', '1992-02-21', 'ENG'),
(53, 1, 'Paul', 'Pogba', '', '1993-03-15', 'FRA'),
(54, 1, 'Memphis', 'Depay', '', '1994-02-13', 'NED'),
(55, 1, 'Zlatan', 'Ibrahimovic', '', '1981-10-03', 'SWE'),
(56, 1, 'George', 'Friend', '', '1987-10-19', 'ENG'),
(57, 1, 'Daniel', 'Ayala', '', '1990-11-07', 'ESP'),
(58, 1, 'Grant', 'Leadbitter', '', '1986-06-07', 'ENG'),
(59, 1, 'Adam', 'Clayton', '', '1989-01-14', 'ENG'),
(60, 1, 'Jordan', 'Rhodes', '', '1990-02-05', 'SCO'),
(61, 1, 'Cédric', 'Soares', '', '1991-08-31', 'POR'),
(62, 1, 'Maya', 'Yoshida', '', '1988-08-24', 'JPN'),
(63, 1, 'Jordy', 'Clasie', '', '1991-06-27', 'NED'),
(64, 1, 'Shane', 'Long', '', '1987-01-22', 'IRL'),
(65, 1, 'Steven', 'Davis', '', '1985-01-01', 'NIR'),
(66, 1, 'Phillip', 'Bardsley', '', '1985-06-28', 'SCO'),
(67, 1, 'Erik', 'Pieters', '', '1988-08-07', 'NED'),
(68, 1, 'Joe', 'Allen', '', '1990-03-14', 'WAL'),
(69, 1, 'Glenn', 'Whelan', '', '1984-01-13', 'IRL'),
(70, 1, 'Marko', 'Arnautovic', '', '1989-04-19', 'AUT'),
(71, 1, 'Billy', 'Jones', '', '1987-03-24', 'ENG'),
(72, 1, 'Patrick', 'van Aanholt', '', '1990-08-29', 'NED'),
(73, 1, 'Lee', 'Cattermole', '', '1988-03-21', 'ENG'),
(74, 1, 'Sebastian', 'Larsson', '', '1985-06-06', 'SWE'),
(75, 1, 'Fabio', 'Borini', '', '1991-03-29', 'ITA'),
(76, 1, 'Jordi', 'Amat', '', '1992-03-21', 'ESP'),
(77, 1, 'Neil', 'Taylor', '', '1989-02-07', 'WAL'),
(78, 1, 'Ki', 'Sung-Yueng', '', '1989-01-24', 'KOR'),
(79, 1, 'Leon', 'Britton', '', '1982-09-16', 'ENG'),
(80, 1, 'Fernando', 'Llorente', '', '1985-02-26', 'ESP'),
(81, 1, 'Kyle', 'Walker', '', '1990-05-28', 'ENG'),
(82, 1, 'Danny', 'Rose', '', '1990-07-02', 'ENG'),
(83, 1, 'Son', 'Heung-Min', '', '1992-07-08', 'KOR'),
(84, 1, 'Ryan', 'Mason', '', '1991-06-13', 'ENG'),
(85, 1, 'Erik', 'Lamela', '', '1992-03-25', 'ARG'),
(86, 1, 'Allan-Roméo', 'Nyom', '', '1988-05-10', 'CMR'),
(87, 1, 'Miguel', 'Britos', '', '1985-07-17', 'URU'),
(88, 1, 'Nordin', 'Amrabat', '', '1987-03-31', 'MAR'),
(89, 1, 'Troy', 'Deeney', '', '1988-06-29', 'ENG'),
(90, 1, 'Valon', 'Behrami', '', '1985-04-19', 'SUI'),
(91, 1, 'Jonas', 'Olsson', '', '1983-03-10', 'SWE'),
(92, 1, 'Claudio', 'Yacob', '', '1987-07-18', 'ARG'),
(93, 1, 'Jonny', 'Evans', '', '1988-01-02', 'NIR'),
(94, 1, 'James', 'Morrison', '', '1986-05-25', 'SCO'),
(95, 1, 'Salomón', 'Rondón', '', '1989-09-16', 'VEN'),
(96, 1, 'Winston', 'Reid', '', '1988-07-03', 'NZL'),
(97, 1, 'Aaron', 'Cresswell', '', '1989-12-15', 'ENG'),
(98, 1, 'Håvard', 'Nordtveit', '', '1990-06-21', 'NOR'),
(99, 1, 'Sofiane', 'Feghouli', '', '1989-12-26', 'ALG'),
(100, 1, 'Andy', 'Carroll', '', '1989-01-06', 'ENG');

-- --------------------------------------------------------

--
-- Table structure for table `players_phases`
--

CREATE TABLE `players_phases` (
  `id` int(11) NOT NULL,
  `players_id` int(11) NOT NULL,
  `leagues_id` int(11) NOT NULL,
  `teams_phases_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `height` decimal(11,2) NOT NULL DEFAULT '0.00',
  `weight` decimal(11,2) NOT NULL DEFAULT '0.00',
  `position` varchar(25) CHARACTER SET latin1 NOT NULL,
  `number` int(3) NOT NULL,
  `depth_chart` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phase_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `players_phases`
--

INSERT INTO `players_phases` (`id`, `players_id`, `leagues_id`, `teams_phases_id`, `start_date`, `end_date`, `height`, `weight`, `position`, `number`, `depth_chart`, `phase_status`) VALUES
(1, 1, 1, 1, '2016-08-13', '2017-05-31', '1.77', '74.00', 'Defender', 2, 'Reserve', 0),
(2, 2, 1, 1, '2016-08-13', '2017-05-31', '1.80', '70.00', 'Defender', 3, 'Bench', 0),
(3, 3, 1, 1, '2016-08-13', '2017-05-31', '1.68', '62.00', 'Forward', 7, 'Starter', 0),
(4, 4, 1, 1, '2016-08-13', '2017-05-31', '1.78', '76.00', 'Midfielder', 8, 'Reserve', 0),
(5, 5, 1, 1, '2016-08-13', '2017-05-31', '1.70', '65.00', 'Midfielder', 10, 'Bench', 0),
(6, 6, 1, 2, '2016-08-13', '2017-05-31', '1.83', '79.00', 'Defender', 2, 'Starter', 0),
(7, 7, 1, 2, '2016-08-13', '2017-05-31', '1.85', '82.00', 'Defender', 3, 'Starter', 0),
(8, 8, 1, 2, '2016-08-13', '2017-05-31', '1.78', '71.00', 'Midfielder', 4, 'Bench', 0),
(9, 9, 1, 2, '2016-08-13', '2017-05-31', '1.78', '72.00', 'Midfielder', 6, 'Starter', 0),
(10, 10, 1, 2, '2016-08-13', '2017-05-31', '1.79', '70.00', 'Forward', 9, 'Bench', 0),
(11, 11, 1, 3, '2016-08-13', '2017-05-31', '1.80', '78.00', 'Defender', 2, 'Starter', 0),
(12, 12, 1, 3, '2016-08-13', '2017-05-31', '1.82', '80.00', 'Defender', 3, 'Reserve', 0),
(13, 13, 1, 3, '2016-08-13', '2017-05-31', '1.78', '79.00', 'Forward', 7, 'Starter', 0),
(14, 14, 1, 3, '2016-08-13', '2017-05-31', '1.83', '72.00', 'Midfielder', 8, 'Starter', 0),
(15, 15, 1, 3, '2016-08-13', '2017-05-31', '1.75', '64.00', 'Midfielder', 11, 'Bench', 0),
(16, 16, 1, 4, '2016-08-13', '2017-05-31', '1.88', '86.00', 'Defender', 2, 'Starter', 0),
(17, 17, 1, 4, '2016-08-13', '2017-05-31', '1.77', '69.00', 'Midfielder', 4, 'Bench', 0),
(18, 18, 1, 4, '2016-08-13', '2017-05-31', '1.87', '85.00', 'Defender', 5, 'Reserve', 0),
(19, 19, 1, 4, '2016-08-13', '2017-05-31', '1.79', '66.00', 'Midfielder', 8, 'Starter', 0),
(20, 20, 1, 4, '2016-08-13', '2017-05-31', '1.69', '64.00', 'Forward', 11, 'Starter', 0),
(21, 21, 1, 5, '2016-08-13', '2017-05-31', '1.88', '76.00', 'Defender', 2, 'Starter', 0),
(22, 22, 1, 5, '2016-08-13', '2017-05-31', '1.90', '74.00', 'Defender', 5, 'Bench', 0),
(23, 23, 1, 5, '2016-08-13', '2017-05-31', '1.75', '72.00', 'Midfielder', 7, 'Bench', 0),
(24, 24, 1, 5, '2016-08-13', '2017-05-31', '1.80', '78.00', 'Forward', 9, 'Reserve', 0),
(25, 25, 1, 5, '2016-08-13', '2017-05-31', '1.83', '76.00', 'Midfielder', 10, 'Starter', 0),
(26, 26, 1, 6, '2016-08-13', '2017-05-31', '1.70', '75.00', 'Defender', 3, 'Starter', 0),
(27, 27, 1, 6, '2016-08-13', '2017-05-31', '1.80', '83.00', 'Midfielder', 4, 'Reserve', 0),
(28, 28, 1, 6, '2016-08-13', '2017-05-31', '1.83', '75.00', 'Defender', 5, 'Bench', 0),
(29, 29, 1, 6, '2016-08-13', '2017-05-31', '1.79', '60.00', 'Forward', 7, 'Starter', 0),
(30, 30, 1, 6, '2016-08-13', '2017-05-31', '1.89', '76.00', 'Midfielder', 8, 'Starter', 0),
(31, 31, 1, 7, '2016-08-13', '2017-05-31', '1.77', '72.00', 'Defender', 2, 'Reserve', 0),
(32, 32, 1, 7, '2016-08-13', '2017-05-31', '1.78', '63.00', 'Defender', 3, 'Starter', 0),
(33, 33, 1, 7, '2016-08-13', '2017-05-31', '1.90', '74.00', 'Midfielder', 7, 'Starter', 0),
(34, 34, 1, 7, '2016-08-13', '2017-05-31', '1.88', '80.00', 'Midfielder', 8, 'Starter', 0),
(35, 35, 1, 7, '2016-08-13', '2017-05-31', '1.85', '73.00', 'Forward', 9, 'Starter', 0),
(36, 36, 1, 8, '2016-08-13', '2017-05-31', '1.82', '74.00', 'Defender', 2, 'Bench', 0),
(37, 37, 1, 8, '2016-08-13', '2017-05-31', '1.78', '76.00', 'Defender', 3, 'Reserve', 0),
(38, 38, 1, 8, '2016-08-13', '2017-05-31', '1.78', '70.00', 'Midfielder', 4, 'Starter', 0),
(39, 39, 1, 8, '2016-08-13', '2017-05-31', '1.70', '62.00', 'Forward', 7, 'Bench', 0),
(40, 40, 1, 8, '2016-08-13', '2017-05-31', '1.78', '74.00', 'Midfielder', 8, 'Reserve', 0),
(41, 41, 1, 9, '2016-08-13', '2017-05-31', '1.75', '67.00', 'Defender', 2, 'Starter', 0),
(42, 42, 1, 9, '2016-08-13', '2017-05-31', '1.87', '83.00', 'Defender', 3, 'Reserve', 0),
(43, 43, 1, 9, '2016-08-13', '2017-05-31', '1.72', '69.00', 'Midfielder', 5, 'Starter', 0),
(44, 44, 1, 9, '2016-08-13', '2017-05-31', '1.70', '67.00', 'Midfielder', 7, 'Starter', 0),
(45, 45, 1, 9, '2016-08-13', '2017-05-31', '1.88', '76.00', 'Forward', 15, 'Starter', 0),
(46, 46, 1, 10, '2016-08-13', '2017-05-31', '1.76', '72.00', 'Defender', 3, 'Reserve', 0),
(47, 47, 1, 10, '2016-08-13', '2017-05-31', '1.91', '91.00', 'Defender', 4, 'Reserve', 0),
(48, 48, 1, 10, '2016-08-13', '2017-05-31', '1.83', '74.00', 'Midfielder', 6, 'Bench', 0),
(49, 49, 1, 10, '2016-08-13', '2017-05-31', '1.70', '69.00', 'Midfielder', 7, 'Starter', 0),
(50, 50, 1, 10, '2016-08-13', '2017-05-31', '1.72', '65.00', 'Forward', 9, 'Bench', 0),
(51, 51, 1, 11, '2016-08-13', '2017-05-31', '1.88', '77.00', 'Defender', 3, 'Starter', 0),
(52, 52, 1, 11, '2016-08-13', '2017-05-31', '1.80', '71.00', 'Defender', 4, 'Reserve', 0),
(53, 53, 1, 11, '2016-08-13', '2017-05-31', '1.91', '84.00', 'Midfielder', 6, 'Starter', 0),
(54, 54, 1, 11, '2016-08-13', '2017-05-31', '1.70', '65.00', 'Midfielder', 7, 'Reserve', 0),
(55, 55, 1, 11, '2016-08-13', '2017-05-31', '1.92', '84.00', 'Forward', 9, 'Starter', 0),
(56, 56, 1, 12, '2016-08-13', '2017-05-31', '1.88', '83.00', 'Defender', 3, 'Starter', 0),
(57, 57, 1, 12, '2016-08-13', '2017-05-31', '1.91', '84.00', 'Defender', 4, 'Bench', 0),
(58, 58, 1, 12, '2016-08-13', '2017-05-31', '1.75', '65.00', 'Midfielder', 7, 'Reserve', 0),
(59, 59, 1, 12, '2016-08-13', '2017-05-31', '1.75', '75.00', 'Midfielder', 8, 'Starter', 0),
(60, 60, 1, 12, '2016-08-13', '2017-05-31', '1.85', '71.00', 'Forward', 9, 'Reserve', 0),
(61, 61, 1, 13, '2016-08-13', '2017-05-31', '1.72', '67.00', 'Defender', 2, 'Starter', 0),
(62, 62, 1, 13, '2016-08-13', '2017-05-31', '1.86', '78.00', 'Defender', 3, 'Bench', 0),
(63, 63, 1, 13, '2016-08-13', '2017-05-31', '1.69', '68.00', 'Midfielder', 4, 'Bench', 0),
(64, 64, 1, 13, '2016-08-13', '2017-05-31', '1.78', '71.00', 'Forward', 7, 'Starter', 0),
(65, 65, 1, 13, '2016-08-13', '2017-05-31', '1.79', '72.00', 'Midfielder', 8, 'Starter', 0),
(66, 66, 1, 14, '2016-08-13', '2017-05-31', '1.79', '74.00', 'Defender', 2, 'Starter', 0),
(67, 67, 1, 14, '2016-08-13', '2017-05-31', '1.86', '82.00', 'Defender', 3, 'Starter', 0),
(68, 68, 1, 14, '2016-08-13', '2017-05-31', '1.68', '62.00', 'Midfielder', 4, 'Starter', 0),
(69, 69, 1, 14, '2016-08-13', '2017-05-31', '1.80', '79.00', 'Midfielder', 6, 'Starter', 0),
(70, 70, 1, 14, '2016-08-13', '2017-05-31', '1.92', '83.00', 'Forward', 10, 'Starter', 0),
(71, 71, 1, 15, '2016-08-13', '2017-05-31', '1.81', '77.00', 'Defender', 2, 'Reserve', 0),
(72, 72, 1, 15, '2016-08-13', '2017-05-31', '1.75', '67.00', 'Defender', 3, 'Starter', 0),
(73, 73, 1, 15, '2016-08-13', '2017-05-31', '1.78', '76.00', 'Midfielder', 6, 'Reserve', 0),
(74, 74, 1, 15, '2016-08-13', '2017-05-31', '1.78', '70.00', 'Midfielder', 7, 'Reserve', 0),
(75, 75, 1, 15, '2016-08-13', '2017-05-31', '1.80', '74.00', 'Forward', 9, 'Reserve', 0),
(76, 76, 1, 16, '2016-08-13', '2017-05-31', '1.84', '80.00', 'Defender', 2, 'Starter', 0),
(77, 77, 1, 16, '2016-08-13', '2017-05-31', '1.75', '64.00', 'Defender', 3, 'Reserve', 0),
(78, 78, 1, 16, '2016-08-13', '2017-05-31', '1.87', '79.00', 'Midfielder', 4, 'Bench', 0),
(79, 79, 1, 16, '2016-08-13', '2017-05-31', '1.68', '64.00', 'Midfielder', 7, 'Reserve', 0),
(80, 80, 1, 16, '2016-08-13', '2017-05-31', '1.95', '90.00', 'Forward', 9, 'Starter', 0),
(81, 81, 1, 17, '2016-08-13', '2017-05-31', '1.78', '73.00', 'Defender', 2, 'Starter', 0),
(82, 82, 1, 17, '2016-08-13', '2017-05-31', '1.73', '75.00', 'Defender', 3, 'Starter', 0),
(83, 83, 1, 17, '2016-08-13', '2017-05-31', '1.83', '76.00', 'Forward', 7, 'Reserve', 0),
(84, 84, 1, 17, '2016-08-13', '2017-05-31', '1.75', '71.00', 'Midfielder', 8, 'Bench', 0),
(85, 85, 1, 17, '2016-08-13', '2017-05-31', '1.83', '73.00', 'Midfielder', 11, 'Starter', 0),
(86, 86, 1, 18, '2016-08-13', '2017-05-31', '1.88', '80.00', 'Defender', 2, 'Bench', 0),
(87, 87, 1, 18, '2016-08-13', '2017-05-31', '1.88', '82.00', 'Defender', 3, 'Starter', 0),
(88, 88, 1, 18, '2016-08-13', '2017-05-31', '1.79', '79.00', 'Midfielder', 7, 'Starter', 0),
(89, 89, 1, 18, '2016-08-13', '2017-05-31', '1.80', '76.00', 'Forward', 9, 'Starter', 0),
(90, 90, 1, 18, '2016-08-13', '2017-05-31', '1.85', '78.00', 'Midfielder', 11, 'Starter', 0),
(91, 91, 1, 19, '2016-08-13', '2017-05-31', '1.95', '85.00', 'Defender', 3, 'Starter', 0),
(92, 92, 1, 19, '2016-08-13', '2017-05-31', '1.81', '73.00', 'Midfielder', 5, 'Starter', 0),
(93, 93, 1, 19, '2016-08-13', '2017-05-31', '1.88', '77.00', 'Defender', 6, 'Starter', 0),
(94, 94, 1, 19, '2016-08-13', '2017-05-31', '1.78', '64.00', 'Midfielder', 7, 'Bench', 0),
(95, 95, 1, 19, '2016-08-13', '2017-05-31', '1.90', '86.00', 'Forward', 9, 'Starter', 0),
(96, 96, 1, 20, '2016-08-13', '2017-05-31', '1.90', '87.00', 'Defender', 2, 'Starter', 0),
(97, 97, 1, 20, '2016-08-13', '2017-05-31', '1.70', '66.00', 'Defender', 3, 'Reserve', 0),
(98, 98, 1, 20, '2016-08-13', '2017-05-31', '1.86', '72.00', 'Midfielder', 4, 'Starter', 0),
(99, 99, 1, 20, '2016-08-13', '2017-05-31', '1.78', '71.00', 'Midfielder', 7, 'Reserve', 0),
(100, 100, 1, 20, '2016-08-13', '2017-05-31', '1.91', '65.00', 'Forward', 9, 'Reserve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `points_formula`
--

CREATE TABLE `points_formula` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `goals` decimal(11,2) NOT NULL,
  `assists` decimal(11,2) NOT NULL,
  `key_passes` decimal(11,2) NOT NULL,
  `tackles` decimal(11,2) NOT NULL,
  `interceptions` decimal(11,2) NOT NULL,
  `clearances` decimal(11,2) NOT NULL,
  `passes` decimal(11,2) NOT NULL,
  `crosses` decimal(11,2) NOT NULL,
  `accurate_crosses` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `points_formula`
--

INSERT INTO `points_formula` (`id`, `sports_id`, `goals`, `assists`, `key_passes`, `tackles`, `interceptions`, `clearances`, `passes`, `crosses`, `accurate_crosses`) VALUES
(1, 1, '5.00', '4.00', '1.00', '0.40', '0.40', '0.50', '0.02', '0.40', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `soccer_stats`
--

CREATE TABLE `soccer_stats` (
  `id` int(11) NOT NULL,
  `players_phases_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `salary` decimal(11,2) NOT NULL,
  `goals` int(11) DEFAULT '0',
  `assists` int(11) DEFAULT '0',
  `key_passes` int(11) DEFAULT '0',
  `tackles` int(11) DEFAULT '0',
  `interceptions` int(11) DEFAULT '0',
  `clearances` int(11) DEFAULT '0',
  `passes` int(11) DEFAULT '0',
  `crosses` int(11) DEFAULT '0',
  `accurate_crosses` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soccer_stats`
--

INSERT INTO `soccer_stats` (`id`, `players_phases_id`, `date`, `salary`, `goals`, `assists`, `key_passes`, `tackles`, `interceptions`, `clearances`, `passes`, `crosses`, `accurate_crosses`) VALUES
(1, 1, '2016-12-27', '6260.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, '2016-12-27', '5177.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, '2016-12-27', '9963.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, '2016-12-27', '13965.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, '2016-12-27', '14714.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, '2016-12-27', '11552.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, '2016-12-27', '9499.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 8, '2016-12-27', '8645.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 9, '2016-12-27', '12644.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 10, '2016-12-27', '14369.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, '2016-12-27', '14445.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12, '2016-12-27', '8731.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13, '2016-12-27', '15980.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 14, '2016-12-27', '4897.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 15, '2016-12-27', '14713.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 16, '2016-12-27', '7647.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 17, '2016-12-27', '15074.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 18, '2016-12-27', '10824.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 19, '2016-12-27', '11755.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 20, '2016-12-27', '12526.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 21, '2016-12-27', '7288.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 22, '2016-12-27', '15952.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 23, '2016-12-27', '13381.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 24, '2016-12-27', '8350.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 25, '2016-12-27', '14047.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 26, '2016-12-27', '12177.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 27, '2016-12-27', '13801.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 28, '2016-12-27', '13469.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 29, '2016-12-27', '6182.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 30, '2016-12-27', '11965.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 31, '2016-12-28', '10561.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 32, '2016-12-28', '6449.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 33, '2016-12-28', '6438.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 34, '2016-12-28', '14261.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 35, '2016-12-28', '9282.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 36, '2016-12-28', '5131.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 37, '2016-12-28', '11816.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 38, '2016-12-28', '8243.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 39, '2016-12-28', '9481.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 40, '2016-12-28', '9636.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 41, '2016-12-27', '9109.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 42, '2016-12-27', '9925.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 43, '2016-12-27', '15773.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 44, '2016-12-27', '9973.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 45, '2016-12-27', '11387.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 46, '2016-12-27', '4863.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 47, '2016-12-27', '9299.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 48, '2016-12-27', '13625.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 49, '2016-12-27', '6181.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 50, '2016-12-27', '15788.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 51, '2016-12-27', '13803.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 52, '2016-12-27', '14304.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 53, '2016-12-27', '6004.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 54, '2016-12-27', '11271.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 55, '2016-12-27', '5859.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 56, '2016-12-27', '5719.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 57, '2016-12-27', '10273.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 58, '2016-12-27', '13078.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 59, '2016-12-27', '13361.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 60, '2016-12-27', '13562.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 61, '2016-12-27', '10787.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 62, '2016-12-27', '9688.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 63, '2016-12-27', '6575.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 64, '2016-12-27', '5686.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 65, '2016-12-27', '5861.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 66, '2016-12-27', '15635.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 67, '2016-12-27', '8394.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 68, '2016-12-27', '11812.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 69, '2016-12-27', '7366.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 70, '2016-12-27', '12486.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 71, '2016-12-27', '15235.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 72, '2016-12-27', '13718.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 73, '2016-12-27', '9888.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 74, '2016-12-27', '7163.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 75, '2016-12-27', '8960.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 76, '2016-12-27', '13524.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 77, '2016-12-27', '12214.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 78, '2016-12-27', '12431.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 79, '2016-12-27', '13824.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 80, '2016-12-27', '9149.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 81, '2016-12-28', '7250.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 82, '2016-12-28', '7507.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 83, '2016-12-28', '12004.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 84, '2016-12-28', '9651.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 85, '2016-12-28', '6107.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 86, '2016-12-28', '7764.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 87, '2016-12-28', '11879.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 88, '2016-12-28', '6458.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 89, '2016-12-28', '10207.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 90, '2016-12-28', '4690.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 91, '2016-12-27', '7967.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 92, '2016-12-27', '13071.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 93, '2016-12-27', '5673.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 94, '2016-12-27', '8534.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 95, '2016-12-27', '8340.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 96, '2016-12-27', '6339.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 97, '2016-12-27', '8373.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 98, '2016-12-27', '13531.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 99, '2016-12-27', '8471.00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 100, '2016-12-27', '12025.00', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `soccer_stats_calcs`
--

CREATE TABLE `soccer_stats_calcs` (
  `id` int(11) NOT NULL,
  `players_phases_id` int(11) NOT NULL,
  `avg_fp` decimal(11,2) NOT NULL,
  `form` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soccer_stats_calcs`
--

INSERT INTO `soccer_stats_calcs` (`id`, `players_phases_id`, `avg_fp`, `form`) VALUES
(1, 1, '2.00', '6.00'),
(2, 2, '3.00', '9.00'),
(3, 3, '13.00', '10.00'),
(4, 4, '14.00', '10.00'),
(5, 5, '5.00', '0.00'),
(6, 6, '6.00', '5.00'),
(7, 7, '8.00', '2.00'),
(8, 8, '5.00', '8.00'),
(9, 9, '13.00', '1.00'),
(10, 10, '11.00', '11.00'),
(11, 11, '10.00', '0.00'),
(12, 12, '13.00', '0.00'),
(13, 13, '4.00', '7.00'),
(14, 14, '13.00', '4.00'),
(15, 15, '10.00', '5.00'),
(16, 16, '7.00', '11.00'),
(17, 17, '2.00', '1.00'),
(18, 18, '8.00', '1.00'),
(19, 19, '15.00', '5.00'),
(20, 20, '0.00', '12.00'),
(21, 21, '4.00', '6.00'),
(22, 22, '15.00', '3.00'),
(23, 23, '5.00', '9.00'),
(24, 24, '13.00', '9.00'),
(25, 25, '14.00', '14.00'),
(26, 26, '9.00', '14.00'),
(27, 27, '4.00', '8.00'),
(28, 28, '15.00', '13.00'),
(29, 29, '13.00', '2.00'),
(30, 30, '0.00', '14.00'),
(31, 31, '12.00', '12.00'),
(32, 32, '15.00', '11.00'),
(33, 33, '6.00', '15.00'),
(34, 34, '11.00', '10.00'),
(35, 35, '14.00', '3.00'),
(36, 36, '3.00', '0.00'),
(37, 37, '6.00', '5.00'),
(38, 38, '1.00', '13.00'),
(39, 39, '5.00', '15.00'),
(40, 40, '12.00', '15.00'),
(41, 41, '0.00', '7.00'),
(42, 42, '5.00', '10.00'),
(43, 43, '14.00', '3.00'),
(44, 44, '15.00', '8.00'),
(45, 45, '13.00', '0.00'),
(46, 46, '10.00', '1.00'),
(47, 47, '3.00', '11.00'),
(48, 48, '9.00', '9.00'),
(49, 49, '7.00', '14.00'),
(50, 50, '14.00', '7.00'),
(51, 51, '1.00', '6.00'),
(52, 52, '11.00', '3.00'),
(53, 53, '1.00', '10.00'),
(54, 54, '13.00', '8.00'),
(55, 55, '5.00', '0.00'),
(56, 56, '3.00', '15.00'),
(57, 57, '1.00', '4.00'),
(58, 58, '12.00', '5.00'),
(59, 59, '1.00', '6.00'),
(60, 60, '8.00', '14.00'),
(61, 61, '4.00', '8.00'),
(62, 62, '7.00', '14.00'),
(63, 63, '5.00', '9.00'),
(64, 64, '5.00', '7.00'),
(65, 65, '15.00', '8.00'),
(66, 66, '12.00', '3.00'),
(67, 67, '7.00', '8.00'),
(68, 68, '13.00', '12.00'),
(69, 69, '7.00', '4.00'),
(70, 70, '4.00', '6.00'),
(71, 71, '0.00', '5.00'),
(72, 72, '12.00', '15.00'),
(73, 73, '0.00', '4.00'),
(74, 74, '1.00', '4.00'),
(75, 75, '12.00', '15.00'),
(76, 76, '2.00', '1.00'),
(77, 77, '14.00', '0.00'),
(78, 78, '10.00', '5.00'),
(79, 79, '13.00', '7.00'),
(80, 80, '10.00', '14.00'),
(81, 81, '10.00', '12.00'),
(82, 82, '10.00', '7.00'),
(83, 83, '11.00', '6.00'),
(84, 84, '9.00', '12.00'),
(85, 85, '15.00', '8.00'),
(86, 86, '7.00', '2.00'),
(87, 87, '0.00', '7.00'),
(88, 88, '10.00', '3.00'),
(89, 89, '6.00', '11.00'),
(90, 90, '5.00', '7.00'),
(91, 91, '12.00', '15.00'),
(92, 92, '7.00', '9.00'),
(93, 93, '7.00', '4.00'),
(94, 94, '12.00', '5.00'),
(95, 95, '0.00', '9.00'),
(96, 96, '14.00', '1.00'),
(97, 97, '2.00', '12.00'),
(98, 98, '3.00', '10.00'),
(99, 99, '2.00', '6.00'),
(100, 100, '4.00', '9.00');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(22) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `logo` varchar(512) NOT NULL,
  `banner` varchar(512) NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `sponsor`, `logo`, `banner`, `status`) VALUES
(1, 'Djarum', 'sponsors/logo/1/djarum-logo-wallpaper.jpg', 'sponsors/banner/1/banner.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`) VALUES
(1, 'Soccer'),
(2, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `sports_events`
--

CREATE TABLE `sports_events` (
  `id` int(11) NOT NULL,
  `leagues_id` int(11) NOT NULL,
  `home_team_phase_id` int(11) NOT NULL,
  `away_team_phase_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `event_status` tinyint(4) NOT NULL DEFAULT '0',
  `weather_id` int(11) DEFAULT NULL,
  `soccer_live_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sports_events`
--

INSERT INTO `sports_events` (`id`, `leagues_id`, `home_team_phase_id`, `away_team_phase_id`, `start_date`, `start_time`, `event_status`, `weather_id`, `soccer_live_id`) VALUES
(1, 1, 1, 2, '2016-12-27', '19:00:00', 0, 1, 1),
(2, 1, 3, 4, '2016-12-27', '19:00:00', 0, 1, 1),
(3, 1, 5, 6, '2016-12-27', '19:15:00', 0, 1, 1),
(4, 1, 7, 8, '2016-12-28', '19:15:00', 0, 1, 1),
(5, 1, 9, 10, '2016-12-27', '19:30:00', 0, 1, 1),
(6, 1, 11, 12, '2016-12-27', '19:30:00', 0, 1, 1),
(7, 1, 13, 14, '2016-12-27', '19:30:00', 0, 1, 1),
(8, 1, 15, 16, '2016-12-28', '19:30:00', 0, 1, 1),
(9, 1, 17, 18, '2016-12-27', '19:45:00', 0, 1, 1),
(10, 1, 19, 20, '2016-12-27', '20:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(22) NOT NULL,
  `email` varchar(512) NOT NULL,
  `country` varchar(100) NOT NULL,
  `submitdate` datetime(6) NOT NULL,
  `statusid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `country`, `submitdate`, `statusid`) VALUES
(5, 'adith92@yahoo.com', 'Indonesia', '2016-10-05 20:48:19.000000', 1),
(6, 'aditdwiputranto@gmail.com', 'Austria', '2016-10-17 14:51:00.000000', 1),
(7, 'aditdwipsadasutranto@gasdmail.com', 'Ashmore and Cartier Island', '2016-10-17 15:02:36.000000', 1),
(8, 'sadsasa2353sd@dsfds.com', 'Australia', '2016-10-17 15:04:03.000000', 1),
(9, 'adit@gmail.com', 'Ashmore and Cartier Island', '2016-10-17 15:13:43.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `team_nickname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `team_shorthand` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_nickname`, `team_shorthand`) VALUES
(1, 'Arsenal', 'Gunners', 'ARS'),
(2, 'Bournemouth', 'Cherries', 'BOU'),
(3, 'Burnley', 'Clarets', 'BUR'),
(4, 'Chelsea', 'Blues', 'CHE'),
(5, 'Crystal Palace', 'Eagles', 'CRY'),
(6, 'Everton', 'Toffees', 'EVE'),
(7, 'Hull City', 'Tigers', 'HUL'),
(8, 'Leicester City', 'Foxes', 'LEI'),
(9, 'Liverpool', 'Reds', 'LIV'),
(10, 'Manchester City', 'City', 'MCI'),
(11, 'Manchester United', 'Red Devils', 'MUN'),
(12, 'Middlesbrough', 'Boro', 'MID'),
(13, 'Southampton', 'Saints', 'SOU'),
(14, 'Stoke', 'Potters', 'STK'),
(15, 'Sunderland', 'Black Cats', 'SUN'),
(16, 'Swansea', 'Swans', 'SWA'),
(17, 'Tottenham Hotspur', 'Spurs', 'TOT'),
(18, 'Watford', 'Hornets', 'WAT'),
(19, 'West Bromwich Albion', 'Hawthorns', 'WBA'),
(20, 'West Ham United', 'Hammers', 'WHU');

-- --------------------------------------------------------

--
-- Table structure for table `teams_phases`
--

CREATE TABLE `teams_phases` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `leagues_id` int(11) NOT NULL,
  `teams_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `stadium_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stadium_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stadium_country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phase_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams_phases`
--

INSERT INTO `teams_phases` (`id`, `sports_id`, `leagues_id`, `teams_id`, `start_date`, `end_date`, `stadium_name`, `stadium_city`, `stadium_country`, `phase_status`) VALUES
(1, 1, 1, 1, '2016-08-13', '2017-05-31', 'Emirates Stadium', 'London', 'United Kingdom', 0),
(2, 1, 1, 2, '2016-08-13', '2017-05-31', 'Dean Court', 'Bournemouth', 'United Kingdom', 0),
(3, 1, 1, 3, '2016-08-13', '2017-05-31', 'Turf Moor', 'Burnley', 'United Kingdom', 0),
(4, 1, 1, 4, '2016-08-13', '2017-05-31', 'Stamford Bridge', 'London', 'United Kingdom', 0),
(5, 1, 1, 5, '2016-08-13', '2017-05-31', 'Selhurst Park', 'London', 'United Kingdom', 0),
(6, 1, 1, 6, '2016-08-13', '2017-05-31', 'Goodison Park', 'Liverpool', 'United Kingdom', 0),
(7, 1, 1, 7, '2016-08-13', '2017-05-31', 'KCOM Stadium', 'Hull', 'United Kingdom', 0),
(8, 1, 1, 8, '2016-08-13', '2017-05-31', 'King Power Stadium', 'Leicester', 'United Kingdom', 0),
(9, 1, 1, 9, '2016-08-13', '2017-05-31', 'Anfield', 'Liverpool', 'United Kingdom', 0),
(10, 1, 1, 10, '2016-08-13', '2017-05-31', 'Etihad Stadium', 'Manchester', 'United Kingdom', 0),
(11, 1, 1, 11, '2016-08-13', '2017-05-31', 'Old Trafford', 'Trafford', 'United Kingdom', 0),
(12, 1, 1, 12, '2016-08-13', '2017-05-31', 'Riverside Stadium', 'Middlesbrough', 'United Kingdom', 0),
(13, 1, 1, 13, '2016-08-13', '2017-05-31', 'St. Mary''s Stadium', 'Southampton', 'United Kingdom', 0),
(14, 1, 1, 14, '2016-08-13', '2017-05-31', 'Britannia Stadium', 'Stoke-on-Trent', 'United Kingdom', 0),
(15, 1, 1, 15, '2016-08-13', '2017-05-31', 'Stadium of Light', 'Sunderland', 'United Kingdom', 0),
(16, 1, 1, 16, '2016-08-13', '2017-05-31', 'Liberty Stadium', 'Swansea', 'United Kingdom', 0),
(17, 1, 1, 17, '2016-08-13', '2017-05-31', 'White Hart Lane', 'London', 'United Kingdom', 0),
(18, 1, 1, 18, '2016-08-13', '2017-05-31', 'Vicarage Road', 'Watford', 'United Kingdom', 0),
(19, 1, 1, 19, '2016-08-13', '2017-05-31', 'The Hawthorns', 'West Bromwich', 'United Kingdom', 0),
(20, 1, 1, 20, '2016-08-13', '2017-05-31', 'Queen Elizabeth Olympic Park', 'London', 'United Kingdom', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_home_site`
--

CREATE TABLE `team_home_site` (
  `stadium_name` varchar(50) NOT NULL,
  `stadium_city` varchar(50) NOT NULL,
  `stadium_country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_home_site`
--

INSERT INTO `team_home_site` (`stadium_name`, `stadium_city`, `stadium_country`) VALUES
('Emirates Stadium', 'London', 'United Kingdom'),
('Villa Park', 'Birmingham', 'United Kingdom'),
('Dean Court', 'Bournemouth', 'United Kingdom'),
('Stamford Bridge', 'London', 'United Kingdom'),
('Selhurst Park', 'London', 'United Kingdom'),
('Goodison Park', 'Liverpool', 'United Kingdom'),
('King Power Stadium', 'Leicester', 'United Kingdom'),
('Anfield', 'Liverpool', 'United Kingdom'),
('Etihad Stadium', 'Manchester', 'United Kingdom'),
('Old Trafford', 'Trafford', 'United Kingdom'),
('St. James'' Park', 'Newcastle upon Tyne', 'United Kingdom'),
('Carrow Road', 'Norwich', 'United Kingdom'),
('St Mary''s Stadium', 'Southampton', 'United Kingdom'),
('Britannia Stadium', 'Stoke-on-Trent', 'United Kingdom'),
('Stadium of Light', 'Sunderland', 'United Kingdom'),
('Liberty Stadium', 'Swansea', 'United Kingdom'),
('White Hart Lane', 'London', 'United Kingdom'),
('Vicarage Road', 'Watford', 'United Kingdom'),
('The Hawthorns', 'West Bromwich', 'United Kingdom'),
('Upton Park', 'London', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `phonenumber` varchar(150) NOT NULL,
  `address` varchar(512) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `subscribe` int(22) NOT NULL,
  `dob` date NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `first_name`, `last_name`, `gender`, `phonenumber`, `address`, `zipcode`, `birthday`, `subscribe`, `dob`, `register_date`, `activation`) VALUES
(1, 'pnugraha89@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'admin', 'Ryan', 'Nugraha', 0, '', '', '', '0000-00-00', 0, '0000-00-00', '2016-04-15 07:44:58', 1),
(2, 'pnugraha891@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'pnuggz', 'Ryan', 'Nug', 0, '08745455', 'Jl. Testing No 99', '', '2016-09-01', 1, '0000-00-00', '2016-04-15 07:44:58', 1),
(3, 'pnugraha89@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'mjscar', 'Ryan', 'Nugraha', 0, '', '', '', '0000-00-00', 0, '0000-00-00', '2016-04-15 07:44:58', 1),
(4, 'test@test.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'tester1', 'Test', 'Test', 0, '', '', '', '0000-00-00', 0, '2016-07-01', '2016-07-22 02:21:23', 1),
(5, 'test@test.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'tester2', 'Test', 'Test', 0, '', '', '', '0000-00-00', 0, '2016-07-01', '2016-07-22 02:21:23', 1),
(6, 'test@test.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'tester3', 'Test', 'Test', 0, '', '', '', '0000-00-00', 0, '2016-07-01', '2016-07-22 02:21:23', 1),
(7, 'test@test.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'matt_ritchie', 'Matthew', 'Ritchie', 0, '', '', '', '0000-00-00', 0, '2016-07-01', '2016-07-22 02:21:23', 1),
(8, 'test@test.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'dicky_suria', 'Dicky', 'Suriakusumah', 0, '', '', '', '0000-00-00', 0, '2016-07-01', '2016-07-22 02:21:23', 1),
(9, 'testertes@tester.com', 'e2f9f842fd8e1ae90dc428d39cab7167', 'cleopatra', 'tester', 'tester', 0, '', '', '', '0000-00-00', 0, '0000-00-00', '2016-09-23 16:32:40', 1),
(10, 'asasas@gmail.com', '942656fd05b5b2da42ef45433ac64f1d', 'rttess', 'asdasdsa', 'asdsadsa', 0, '3535353', 'sadsadsa', '', '1970-01-01', 0, '0000-00-00', '2016-10-24 18:37:45', 1),
(11, 'teasasdo@gmail.com', 'b93939873fd4923043b9dec975811f66', 'asdadsadasdsa3242', 'asdasdsa', 'asdsadsa', 0, '3535353', 'sadsadsa', '', '2016-10-10', 0, '0000-00-00', '2016-10-26 23:52:42', 1),
(17, 'sss@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'clumsy', 'Aditya', 'Dwi Putranto', 0, '6346464', 'tesss', '', '1991-06-13', 0, '0000-00-00', '2016-11-07 20:21:23', 1),
(18, 'aditdwipssutranto@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'clumsyy', 'Aditya', 'Dwi Putranto', 0, '6346464', 'tessssss', '12410', '1991-06-13', 0, '0000-00-00', '2016-11-08 11:50:36', 0),
(19, 'aditdwiputput@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'clumsyyy', 'Aditya', 'Dwi Putranto', 0, '6346464', 'tessssss', '12410', '1991-06-13', 0, '0000-00-00', '2016-11-08 11:50:56', 0),
(20, 'aditdwiputrantos@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 'clumsyyyt', 'Aditya', 'Dwi Putranto', 0, '6346464', 'tessssss', '12410', '1991-06-13', 0, '0000-00-00', '2016-11-08 11:51:23', 0),
(21, 'aditdwiputranto@gmail.com', '7f2ababa423061c509f4923dd04b6cf1', 'testingserver', 'Aditya', 'Dwi Putranto', 0, '087878787', 'tes123', '12410', '1991-06-13', 1, '0000-00-00', '2016-11-09 21:13:03', 1),
(22, 'boo@test.com', '3b3915a32f903b718f6819480f60b5da', 'ptest', 'Ryan', 'Nug', 0, '081232141235', '123 AAA Street', '13256', '2016-01-01', 0, '0000-00-00', '2016-12-17 07:36:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verificationads`
--

CREATE TABLE `verificationads` (
  `id` int(22) NOT NULL,
  `userid` int(22) NOT NULL,
  `contestid` int(22) NOT NULL,
  `recaptcha` varchar(512) NOT NULL,
  `userinput` varchar(512) NOT NULL,
  `verificationdate` datetime NOT NULL,
  `statusid` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verificationads`
--

INSERT INTO `verificationads` (`id`, `userid`, `contestid`, `recaptcha`, `userinput`, `verificationdate`, `statusid`) VALUES
(4, 21, 1, '1', 'ztdcL', '2016-11-14 03:02:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(22) NOT NULL,
  `video` varchar(512) NOT NULL,
  `sponsorsid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`, `sponsorsid`, `statusid`) VALUES
(1, 'video/1/djarum-super.webm', 1, 1),
(2, 'video/1/djarum-super.webm', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_tests`
--

CREATE TABLE `video_tests` (
  `id` int(11) NOT NULL,
  `word` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_tests`
--

INSERT INTO `video_tests` (`id`, `word`) VALUES
(1, 'music'),
(2, 'apple');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contests_has_sports_events`
--
ALTER TABLE `contests_has_sports_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contests_prize`
--
ALTER TABLE `contests_prize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contests_rosters`
--
ALTER TABLE `contests_rosters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contests_users_entries`
--
ALTER TABLE `contests_users_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sports_id` (`sports_id`) USING BTREE;

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players_phases`
--
ALTER TABLE `players_phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points_formula`
--
ALTER TABLE `points_formula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soccer_stats`
--
ALTER TABLE `soccer_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soccer_stats_calcs`
--
ALTER TABLE `soccer_stats_calcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_events`
--
ALTER TABLE `sports_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams_phases`
--
ALTER TABLE `teams_phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_type_id` (`sports_id`),
  ADD KEY `sport_league_id` (`leagues_id`),
  ADD KEY `team_id` (`teams_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verificationads`
--
ALTER TABLE `verificationads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tests`
--
ALTER TABLE `video_tests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contests_has_sports_events`
--
ALTER TABLE `contests_has_sports_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contests_prize`
--
ALTER TABLE `contests_prize`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contests_rosters`
--
ALTER TABLE `contests_rosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contests_users_entries`
--
ALTER TABLE `contests_users_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `players_phases`
--
ALTER TABLE `players_phases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `points_formula`
--
ALTER TABLE `points_formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `soccer_stats`
--
ALTER TABLE `soccer_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `soccer_stats_calcs`
--
ALTER TABLE `soccer_stats_calcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sports_events`
--
ALTER TABLE `sports_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `teams_phases`
--
ALTER TABLE `teams_phases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `verificationads`
--
ALTER TABLE `verificationads`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video_tests`
--
ALTER TABLE `video_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
