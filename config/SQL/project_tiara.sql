-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2015 at 10:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_tiara`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
`id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE IF NOT EXISTS `competitions` (
`id` int(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `description`, `slug`, `date`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 'Mutya ng Dabaw 2015', '78th Araw ng Davao Beauty Pageant', 'mutya-ng-dabaw-2015', '2015-02-28', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE IF NOT EXISTS `contestants` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `BHW` varchar(8) NOT NULL COMMENT 'Bust-Waist-Hip',
  `height` varchar(5) NOT NULL,
  `weight` decimal(5,2) NOT NULL COMMENT 'Kilograms',
  `image` varchar(100) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `citizenship` varchar(25) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `competition_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `BHW`, `height`, `weight`, `image`, `occupation`, `email`, `citizenship`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Jessa May', 'Mendoza', 'Bonguyan', '1990-05-23', '33-25-33', '5''4"', '48.00', 'uploads/jessa-may-bonguyan.jpg', 'Student', '', 'Filipino', '2015-02-25 22:36:53', '2015-02-25 22:36:53'),
(2, 1, 'Pamela Grace', 'M', 'Janson', '1993-12-01', '33-26-37', '5''7"', '57.00', 'uploads/pamela-grace-janson.jpg', 'Science Laboratory Officer in Charge', '', 'Filipino', '2015-02-25 22:42:32', '2015-02-25 22:42:32'),
(3, 1, 'Ma. Elainizelle Clarice', 'Montojo', 'Tiu', '1992-12-29', '32-24-35', '5''4"', '51.00', 'uploads/ma-elainizelle-clarice-tiu.jpg', 'Tax Auditor', 'claricetiu29@yahoo.com', 'Filipino', '2015-02-25 22:45:13', '2015-02-25 22:45:13'),
(4, 1, 'Shenna', 'Genova', 'Mendoza', '1995-02-13', '32-24-33', '5''9"', '51.00', 'uploads/shenna-mendoza.jpg', 'Photographer', 'shenna_genova@yahoo.com', 'Filipino', '2015-02-25 22:48:32', '2015-02-25 22:48:32'),
(5, 1, 'Charmaine Bless', 'Arcena', 'Shotwell', '1994-11-21', '32-25-33', '5''3"', '45.00', 'uploads/charmaine-bless-shotwell.jpg', 'Students', 'charmaineshotwell21@gmail.com', 'Filipino', '2015-02-25 22:51:38', '2015-02-25 22:51:38'),
(6, 1, 'Elme', 'M.', 'Mansilagan', '1997-03-27', '35-27-35', '5''6"', '55.00', 'uploads/elme-mansilagan.jpg', 'Student', 'elmemansilagan@yahoo.com', 'Filipino', '2015-02-25 22:55:13', '2015-02-25 22:55:13'),
(7, 1, 'Eva June Marie', 'Fiel', 'Sison', '1990-06-16', '34-25-35', '5''7"', '51.00', 'uploads/eva-june-marie-sison.jpg', '', 'junemariesison@yahoo.com', 'Filipino', '2015-02-25 22:57:50', '2015-02-25 22:57:50'),
(8, 1, 'Lucille', 'Ibay', 'Gokotano', '1993-09-21', '34-23-33', '5''6"', '46.00', 'uploads/lucille-gokotano.jpg', 'Customer Service Specialist', 'lucille21tiff@yahoo.com', 'Filipino', '2015-02-25 23:00:24', '2015-02-25 23:00:24'),
(9, 1, 'Chastine Jen', 'Talagtag', 'Montaño', '1995-09-30', '32-27-34', '5''8"', '55.00', 'uploads/chastine-jen-montaño.jpg', 'Student', 'chastinejenmontao@yahoo.com', 'Filipino', '2015-02-25 23:02:15', '2015-02-25 23:02:15'),
(10, 1, 'Mary Nicole', '', 'Bacaltos', '1995-05-26', '36-29-36', '5''5"', '58.00', 'uploads/mary-nicole-bacaltos.jpg', 'Student', 'bacaltosnicole@gmail.com', 'Filipino', '2015-02-25 23:03:58', '2015-02-25 23:03:58'),
(11, 1, 'Jeraldin', 'Abadinas', 'Pedroza', '1995-08-26', '33-26-35', '5''3"', '47.00', 'uploads/jeraldin-pedroza.jpg', 'Student', 'jeraldinpedroza@gmail.com', 'Filipino', '2015-02-25 23:05:14', '2015-02-25 23:05:14'),
(12, 1, 'Daremie', 'Silla', 'Espinosa', '1995-07-22', '32-27-35', '5''3"', '47.00', 'uploads/daremie-espinosa.jpg', 'Student', 'e.daremie@yahoo.com', 'Filipino', '2015-02-25 23:06:32', '2015-02-25 23:06:32'),
(13, 1, 'Regine', 'Lareta', 'Anillo', '1996-04-08', '32-23-33', '5''5"', '50.00', 'uploads/regine-anillo.jpg', 'Student', 'regine_anillo@yahoo.com.ph', 'Filipino', '2015-02-25 23:07:43', '2015-02-25 23:07:43'),
(14, 1, 'Nisreen', 'Salleh', 'Mohammad Khursid', '1994-02-25', '34-25-34', '5''7"', '54.00', 'uploads/nisreen-mohammad-khursid.jpg', 'Student', 'avrilrocks_25@yahoo.com', 'Filipino', '2015-02-25 23:09:49', '2015-02-25 23:09:49'),
(15, 1, 'Wiljeanne', 'Camallere', 'Rodriguez', '1996-04-30', '32-24-33', '5''4"', '44.00', 'uploads/wiljeanne-rodriguez.jpg', 'Student', 'wiljeannerodrihuez@gmail.com', 'Filipino', '2015-02-25 23:11:21', '2015-02-25 23:11:21'),
(16, 1, 'Pamela', '', 'Framil', '1995-03-03', '33-24-34', '5''6"', '48.00', 'uploads/pamela-framil.jpg', 'Student', 'framilpam@gmail.com', 'Filipino', '2015-02-25 23:12:28', '2015-02-25 23:12:28'),
(17, 1, 'Kris Abegail', 'Candolita', 'Guanzon', '1993-11-13', '34-27-36', '5''7"', '56.00', 'uploads/kris-abegail-guanzon.jpg', 'Assistant Manager- Field Sales Dep''t', 'begaiguanzon@gmail.com', 'Filipino', '2015-02-25 23:14:06', '2015-02-25 23:14:06'),
(18, 1, 'Marie Ernestine', '', 'Torro', '1993-08-09', '32-25-34', '5''5"', '55.00', 'uploads/marie-ernestine-torro.jpg', 'Marketing Specialist', 'torromeb@gmail.com', 'Filipino', '2015-02-25 23:16:01', '2015-02-25 23:16:01'),
(19, 1, 'Floreimer', 'G', 'Soriano', '1992-11-25', '32-25-33', '5''6"', '50.00', 'uploads/floreimer-soriano.jpg', 'Public School Teacher', 'floriemeesh@yahoo.com', 'Filipino', '2015-02-25 23:18:19', '2015-02-25 23:18:19'),
(20, 1, 'Christine Joy', 'Andaya', 'Alvarez', '1993-06-10', '35-25-36', '5''6"', '51.00', 'uploads/christine-joy-alvarez.jpg', 'Volunteer Nurse', 'christinealvarez0610@yahoo.com.ph', 'Filipino', '2015-02-25 23:20:45', '2015-02-25 23:20:45'),
(21, 1, 'Thea Margarette', 'R', 'Elipio', '1993-12-27', '33-24-34', '5''4"', '45.00', 'uploads/thea-margarette-elipio.jpg', 'Account Associate, VXI', 'theamargaretteroldanelipeio@gmail.com', 'Filipino', '2015-02-25 23:23:23', '2015-02-25 23:23:23'),
(22, 1, 'Jerzyl', 'Cabasag', 'Añana', '1994-01-16', '32-27-33', '5''4"', '49.00', 'uploads/jerzyl-anaña.jpg', 'Teacher', 'jerzyl.anana@gmail.com', 'Filipino', '2015-02-25 23:29:53', '2015-02-25 23:29:53'),
(23, 1, 'Trishia Joyce', 'Costagera', 'Sosmeña', '1994-08-07', '34-27-34', '5''7"', '52.00', 'uploads/trishia-joyce-sosmeña.jpg', 'Student', 'trishia_91@yahoo.com', 'Filipino', '2015-02-25 23:33:31', '2015-02-25 23:33:31'),
(24, 1, 'Lara Jane', 'Adanza', 'Saquin', '1995-11-21', '33-24-33', '5''4"', '48.00', 'uploads/lara-jane-saquin.jpg', 'Student', 'larajaneadanzasaquin@yahoo.com', 'Filipino', '2015-02-25 23:35:52', '2015-02-25 23:35:52'),
(25, 1, 'Marja Elana', 'Tan', 'Guino-o', '1994-08-02', '33-25-34', '5''4"', '52.00', 'uploads/marja-elana-guino-o.jpg', 'Student', 'marjaguinoo@gmail.com', 'Filipino', '2015-02-25 23:37:32', '2015-02-25 23:37:32'),
(26, 1, 'Ñina Grace', 'Ycong', 'Sartagoda', '1996-01-08', '32-24-33', '5''4"', '45.00', 'uploads/ñina-grace-sartagoda.jpg', 'Student', 'Ninzsartagoda08@yahoo.com.ph', 'Filipino', '2015-02-25 23:39:08', '2015-02-25 23:39:08'),
(27, 1, 'Louise Ann', '', 'Canalija', '1993-03-14', '33-24-33', '5''4"', '48.00', 'uploads/louise-ann canalija.jpg', 'Sales and Marketing Executive', 'louisec.oneblue@gmail.com', 'Filipino', '2015-02-25 23:40:59', '2015-02-25 23:40:59'),
(28, 1, 'Jenefe', 'Ngoho', 'Simbajon', '1988-09-17', '34-27-35', '5''5"', '49.00', 'uploads/jenefe-simbajon.jpg', 'Accounting Staff', 'jenefesimbajon@gmail.com', 'Filipino', '2015-02-25 23:42:36', '2015-02-25 23:42:36'),
(29, 1, 'Darlene Paula', 'C', 'Dichoso', '1996-11-22', '33-25-35', '5''8"', '50.00', 'uploads/darlene-paula dichoso.jpg', 'Student', 'arlene_paw@yahoo.com', 'Filipino', '2015-02-25 23:44:08', '2015-02-25 23:44:08'),
(30, 1, 'Minette', 'Aguio', 'Macaraeg', '1995-02-13', '32-26-34', '5''4"', '50.00', 'uploads/minette-macaraeg.jpg', 'Student', '', 'Filipino', '2015-02-25 23:45:13', '2015-02-25 23:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `contestant_images`
--

CREATE TABLE IF NOT EXISTS `contestant_images` (
`id` int(20) NOT NULL,
  `contestant_id` int(20) NOT NULL,
  `url` text NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE IF NOT EXISTS `criterias` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `segment_id`, `name`, `description`, `percentage`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Intelligence', 'Intelligence', '25.00', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(2, 1, 'Personality', 'Personality', '25.00', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(3, 1, 'Casual', 'Casual Competition', '20.00', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(4, 1, 'Long Gown', 'Long Gown Competition', '20.00', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(5, 1, 'Deportment', 'Deportment', '10.00', '2015-02-12 00:13:36', '2015-02-12 00:13:36'),
(6, 2, 'TAL', 'Special skills, abilities and uniqueness of talent', '30.00', '2015-02-12 00:13:36', '2015-02-12 00:13:36'),
(7, 2, 'PAE', 'Performance and execution', '30.00', '2015-02-12 00:14:03', '2015-02-12 00:14:03'),
(8, 2, 'SMS', 'Showmanship', '15.00', '2015-02-12 00:14:03', '2015-02-12 00:14:03'),
(9, 2, 'IMP', 'Over-all impact', '15.00', '2015-02-12 00:14:29', '2015-02-12 00:14:29'),
(10, 2, 'DEP', 'Deportment', '10.00', '2015-02-12 00:14:29', '2015-02-12 00:14:29'),
(11, 3, 'INT', 'Intelligence', '25.00', '2015-02-12 00:15:08', '2015-02-12 00:15:08'),
(12, 3, 'PER', 'Personality', '30.00', '2015-02-12 00:15:08', '2015-02-12 00:15:08'),
(13, 3, 'CC', 'Casual Competition', '15.00', '2015-02-12 00:15:37', '2015-02-12 00:15:37'),
(14, 3, 'LGC', 'Long Gown Competition', '15.00', '2015-02-12 00:15:37', '2015-02-12 00:15:37'),
(16, 4, 'QA', 'Question and answer', '50.00', '2015-02-12 00:16:34', '2015-02-12 00:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_scores`
--

CREATE TABLE IF NOT EXISTS `criteria_scores` (
`id` int(20) NOT NULL,
  `criteria_id` int(20) NOT NULL,
  `segment_judge_id` int(20) NOT NULL,
  `segment_contestant_id` int(20) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria_scores`
--

INSERT INTO `criteria_scores` (`id`, `criteria_id`, `segment_judge_id`, `segment_contestant_id`, `score`, `_date_created`, `_date_modified`) VALUES
(1, 1, 2, 1, '25.00', '2015-02-28 12:44:14', '2015-02-28 12:44:14'),
(2, 2, 2, 1, '25.00', '2015-02-28 12:47:28', '2015-02-28 12:47:28'),
(3, 3, 2, 1, '20.00', '2015-02-28 12:47:30', '2015-02-28 12:47:30'),
(4, 4, 2, 1, '20.00', '2015-02-28 12:47:32', '2015-02-28 12:47:32'),
(5, 5, 2, 1, '10.00', '2015-02-28 12:47:35', '2015-02-28 12:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE IF NOT EXISTS `judges` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `_date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `competition_id`, `first_name`, `last_name`, `username`, `password`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Alvin Mark', 'Cabeliño', 'alvinmark', '8ac03791f0a7505b128f346d28a18c29c58eaa88', 1, '2015-02-24 22:13:09', '2015-02-24 22:13:09'),
(2, 1, 'Gertrude R', 'Cordero', 'gertruder', 'b6cd4c0729a71f2afdb0b211659ebf30f480ad70', 1, '2015-02-24 22:13:31', '2015-02-24 22:13:31'),
(3, 1, 'Michael', 'Palacio', 'michaelp', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2015-02-25 19:27:16', '2015-02-25 19:27:16'),
(4, 1, 'Louie', 'Sanchez', 'louies', 'b7a21d7957e23e2d6808820e9e0b58a80d155230', 1, '2015-02-25 19:28:00', '2015-02-25 19:28:00'),
(5, 1, 'Ann Juvie', 'Papas', 'annjuviep', '256ab378c5242a23a5b8e01237b1b228d2980a7d', 1, '2015-02-25 19:44:49', '2015-02-25 19:44:49'),
(6, 1, 'Sample', 'Me', 'samplem', 'f5a12372c6d0368109cee0498feb83a0855d367e', 1, '2015-02-25 21:14:02', '2015-02-25 21:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `venue` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `competition_id`, `name`, `description`, `slug`, `date`, `venue`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Selection of Top 15', 'Selection of Top 15', 'selection-of-top-15', '2015-02-28 00:00:00', 'Felcris Centrale', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Talent Competition', 'Talent Competition', 'talent-competition', '2015-03-06 00:00:00', 'Gaisano Mall', 1, '2015-02-12 00:06:35', '2015-02-12 00:06:35'),
(3, 1, 'Top 5', 'Top 5', 'top-5', '2015-03-11 00:00:00', 'SM Lanang', 1, '2015-02-12 00:09:06', '2015-02-12 00:09:06'),
(4, 1, 'Selection of Winners', 'Selection of Winners', 'selection-of-winners', '2015-03-11 00:00:00', 'SM Lanang', 1, '2015-02-12 00:10:32', '2015-02-12 00:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `segments_as_criteria`
--

CREATE TABLE IF NOT EXISTS `segments_as_criteria` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `node_segment_id` int(20) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segments_as_criteria`
--

INSERT INTO `segments_as_criteria` (`id`, `segment_id`, `node_segment_id`, `percentage`) VALUES
(1, 4, 3, '50.00'),
(2, 3, 2, '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `segment_contestants`
--

CREATE TABLE IF NOT EXISTS `segment_contestants` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `contestant_id` int(20) NOT NULL,
  `number` int(3) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_contestants`
--

INSERT INTO `segment_contestants` (`id`, `segment_id`, `contestant_id`, `number`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, 1, '2015-02-25 22:36:53', '2015-02-25 22:36:53'),
(2, 1, 2, 2, '2015-02-25 22:42:32', '2015-02-25 22:42:32'),
(3, 1, 3, 3, '2015-02-25 22:45:13', '2015-02-25 22:45:13'),
(4, 1, 4, 4, '2015-02-25 22:48:32', '2015-02-25 22:48:32'),
(5, 1, 5, 5, '2015-02-25 22:51:38', '2015-02-25 22:51:38'),
(6, 1, 6, 6, '2015-02-25 22:55:13', '2015-02-25 22:55:13'),
(7, 1, 7, 7, '2015-02-25 22:57:50', '2015-02-25 22:57:50'),
(8, 1, 8, 8, '2015-02-25 23:00:24', '2015-02-25 23:00:24'),
(9, 1, 9, 9, '2015-02-25 23:02:15', '2015-02-25 23:02:15'),
(10, 1, 10, 10, '2015-02-25 23:03:58', '2015-02-25 23:03:58'),
(11, 1, 11, 11, '2015-02-25 23:05:14', '2015-02-25 23:05:14'),
(12, 1, 12, 12, '2015-02-25 23:06:32', '2015-02-25 23:06:32'),
(13, 1, 13, 13, '2015-02-25 23:07:43', '2015-02-25 23:07:43'),
(14, 1, 14, 14, '2015-02-25 23:09:49', '2015-02-25 23:09:49'),
(15, 1, 15, 15, '2015-02-25 23:11:21', '2015-02-25 23:11:21'),
(16, 1, 16, 16, '2015-02-25 23:12:28', '2015-02-25 23:12:28'),
(17, 1, 17, 17, '2015-02-25 23:14:06', '2015-02-25 23:14:06'),
(18, 1, 18, 18, '2015-02-25 23:16:01', '2015-02-25 23:16:01'),
(19, 1, 19, 19, '2015-02-25 23:18:19', '2015-02-25 23:18:19'),
(20, 1, 20, 20, '2015-02-25 23:20:45', '2015-02-25 23:20:45'),
(21, 1, 21, 21, '2015-02-25 23:23:23', '2015-02-25 23:23:23'),
(22, 1, 22, 22, '2015-02-25 23:29:53', '2015-02-25 23:29:53'),
(23, 1, 23, 23, '2015-02-25 23:33:31', '2015-02-25 23:33:31'),
(24, 1, 24, 24, '2015-02-25 23:35:52', '2015-02-25 23:35:52'),
(25, 1, 25, 25, '2015-02-25 23:37:32', '2015-02-25 23:37:32'),
(26, 1, 26, 26, '2015-02-25 23:39:08', '2015-02-25 23:39:08'),
(27, 1, 27, 27, '2015-02-25 23:40:59', '2015-02-25 23:40:59'),
(28, 1, 28, 28, '2015-02-25 23:42:36', '2015-02-25 23:42:36'),
(29, 1, 29, 29, '2015-02-25 23:44:08', '2015-02-25 23:44:08'),
(30, 1, 30, 30, '2015-02-25 23:45:13', '2015-02-25 23:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `segment_judges`
--

CREATE TABLE IF NOT EXISTS `segment_judges` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `judge_id` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_judges`
--

INSERT INTO `segment_judges` (`id`, `segment_id`, `judge_id`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, 1, '2015-02-24 22:13:09', '2015-02-24 22:13:09'),
(2, 1, 2, 1, '2015-02-24 22:13:31', '2015-02-24 22:13:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
 ADD PRIMARY KEY (`id`), ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `contestant_images`
--
ALTER TABLE `contestant_images`
 ADD PRIMARY KEY (`id`), ADD KEY `contestant_id` (`contestant_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
 ADD PRIMARY KEY (`id`), ADD KEY `segment_id` (`segment_id`);

--
-- Indexes for table `criteria_scores`
--
ALTER TABLE `criteria_scores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`), ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
 ADD PRIMARY KEY (`id`), ADD KEY `competition_id` (`competition_id`);

--
-- Indexes for table `segments_as_criteria`
--
ALTER TABLE `segments_as_criteria`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segment_contestants`
--
ALTER TABLE `segment_contestants`
 ADD PRIMARY KEY (`id`), ADD KEY `segment_id` (`segment_id`,`contestant_id`);

--
-- Indexes for table `segment_judges`
--
ALTER TABLE `segment_judges`
 ADD PRIMARY KEY (`id`), ADD KEY `segment_id` (`segment_id`), ADD KEY `judge_id` (`judge_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `contestant_images`
--
ALTER TABLE `contestant_images`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `criteria_scores`
--
ALTER TABLE `criteria_scores`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `segments_as_criteria`
--
ALTER TABLE `segments_as_criteria`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `segment_contestants`
--
ALTER TABLE `segment_contestants`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `segment_judges`
--
ALTER TABLE `segment_judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
