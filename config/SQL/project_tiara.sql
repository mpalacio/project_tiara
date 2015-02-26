-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2015 at 08:56 AM
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
  `occupation` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `citizenship` varchar(25) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `competition_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `occupation`, `telephone`, `mobile`, `email`, `religion`, `citizenship`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Jessa May', 'Mendoza', 'Bonguyan', '1990-05-23', 'Student', '285-1957', '09167164168', '', '', 'Filipino', '2015-02-25 22:36:53', '2015-02-25 22:36:53'),
(2, 1, 'Pamela Grace', 'M', 'Janson', '1993-12-01', 'Science Laboratory Officer in Charge', '241-88-08', '094972172248', '', '', 'Filipino', '2015-02-25 22:42:32', '2015-02-25 22:42:32'),
(3, 1, 'Ma. Elainizelle Clarice', 'Montojo', 'Tiu', '1992-12-29', 'Tax Auditor', '082-291-3781', '09228248602', 'claricetiu29@yahoo.com', '', 'Filipino', '2015-02-25 22:45:13', '2015-02-25 22:45:13'),
(4, 1, 'Shenna', 'Genova', 'Mendoza', '1995-02-13', 'Photographer', '', '09078823309', 'shenna_genova@yahoo.com', '', 'Filipino', '2015-02-25 22:48:32', '2015-02-25 22:48:32'),
(5, 1, 'Charmaine Bless', 'Arcena', 'Shotwell', '1994-11-21', 'Students', '', '09179731517', 'charmaineshotwell21@gmail.com', '', 'Filipino', '2015-02-25 22:51:38', '2015-02-25 22:51:38'),
(6, 1, 'Elme', 'M.', 'Mansilagan', '1997-03-27', 'Student', '', '09468446480', 'elmemansilagan@yahoo.com', '', 'Filipino', '2015-02-25 22:55:13', '2015-02-25 22:55:13'),
(7, 1, 'Eva June Marie', 'Fiel', 'Sison', '1990-06-16', '', '', '09198623022', 'junemariesison@yahoo.com', '', 'Filipino', '2015-02-25 22:57:50', '2015-02-25 22:57:50'),
(8, 1, 'Lucille', 'Ibay', 'Gokotano', '1993-09-21', 'Customer Service Specialist', '082-221-3661', '09334565407', 'lucille21tiff@yahoo.com', '', 'Filipino', '2015-02-25 23:00:24', '2015-02-25 23:00:24'),
(9, 1, 'Chastine Jen', 'Talagtag', 'Montaño', '1995-09-30', 'Student', '', '09358402005', 'chastinejenmontao@yahoo.com', '', 'Filipino', '2015-02-25 23:02:15', '2015-02-25 23:02:15'),
(10, 1, 'Mary Nicole', '', 'Bacaltos', '1995-05-26', 'Student', '297-4870', '09237386250', 'bacaltosnicole@gmail.com', '', 'Filipino', '2015-02-25 23:03:58', '2015-02-25 23:03:58'),
(11, 1, 'Jeraldin', 'Abadinas', 'Pedroza', '1995-08-26', 'Student', '', '09426670697', 'jeraldinpedroza@gmail.com', '', 'Filipino', '2015-02-25 23:05:14', '2015-02-25 23:05:14'),
(12, 1, 'Daremie', 'Silla', 'Espinosa', '1995-07-22', 'Student', '', '09484062129', 'e.daremie@yahoo.com', '', 'Filipino', '2015-02-25 23:06:32', '2015-02-25 23:06:32'),
(13, 1, 'Regine', 'Lareta', 'Anillo', '1996-04-08', 'Student', '305-94-38', '09099288598', 'regine_anillo@yahoo.com.ph', '', 'Filipino', '2015-02-25 23:07:43', '2015-02-25 23:07:43'),
(14, 1, 'Nisreen', 'Salleh', 'Mohammad Khursid', '1994-02-25', 'Student', '', '09997259056', 'avrilrocks_25@yahoo.com', '', 'Filipino', '2015-02-25 23:09:49', '2015-02-25 23:09:49'),
(15, 1, 'Wiljeanne', 'Camallere', 'Rodriguez', '1996-04-30', 'Student', '', '09307111689', 'wiljeannerodrihuez@gmail.com', '', 'Filipino', '2015-02-25 23:11:21', '2015-02-25 23:11:21'),
(16, 1, 'Pamela', '', 'Framil', '1995-03-03', 'Student', '', '09472944050', 'framilpam@gmail.com', '', 'Filipino', '2015-02-25 23:12:28', '2015-02-25 23:12:28'),
(17, 1, 'Kris Abegail', 'Candolita', 'Guanzon', '1993-11-13', 'Assistant Manager- Field Sales Dep''t', '082-305-79-74', '09334033726', 'begaiguanzon@gmail.com', '', 'Filipino', '2015-02-25 23:14:06', '2015-02-25 23:14:06'),
(18, 1, 'Marie Ernestine', '', 'Torro', '1993-08-09', 'Marketing Specialist', '226-3100/8014', '09177215181', 'torromeb@gmail.com', '', 'Filipino', '2015-02-25 23:16:01', '2015-02-25 23:16:01'),
(19, 1, 'Floreimer', 'G', 'Soriano', '1992-11-25', 'Public School Teacher', '', '09985469823', 'floriemeesh@yahoo.com', '', 'Filipino', '2015-02-25 23:18:19', '2015-02-25 23:18:19'),
(20, 1, 'Christine Joy', 'Andaya', 'Alvarez', '1993-06-10', 'Volunteer Nurse', '', '09427058580', 'christinealvarez0610@yahoo.com.ph', '', 'Filipino', '2015-02-25 23:20:45', '2015-02-25 23:20:45'),
(21, 1, 'Thea Margarette', 'R', 'Elipio', '1993-12-27', 'Account Associate, VXI', '291-15-60', '09307460071', 'theamargaretteroldanelipeio@gmail.com', '', 'Filipino', '2015-02-25 23:23:23', '2015-02-25 23:23:23'),
(22, 1, 'Jerzyl', 'Cabasag', 'Añana', '1994-01-16', 'Teacher', '', '09399345224', 'jerzyl.anana@gmail.com', '', 'Filipino', '2015-02-25 23:29:53', '2015-02-25 23:29:53'),
(23, 1, 'Trishia Joyce', 'Costagera', 'Sosmeña', '1994-08-07', 'Student', '', '09335925334', 'trishia_91@yahoo.com', '', 'Filipino', '2015-02-25 23:33:31', '2015-02-25 23:33:31'),
(24, 1, 'Lara Jane', 'Adanza', 'Saquin', '1995-11-21', 'Student', '', '09095404195', 'larajaneadanzasaquin@yahoo.com', '', 'Filipino', '2015-02-25 23:35:52', '2015-02-25 23:35:52'),
(25, 1, 'Marja Elana', 'Tan', 'Guino-o', '1994-08-02', 'Student', '298-0549', '09236360446', 'marjaguinoo@gmail.com', '', 'Filipino', '2015-02-25 23:37:32', '2015-02-25 23:37:32'),
(26, 1, 'Ñina Grace', 'Ycong', 'Sartagoda', '1996-01-08', 'Student', '', '09336831805', 'Ninzsartagoda08@yahoo.com.ph', '', 'Filipino', '2015-02-25 23:39:08', '2015-02-25 23:39:08'),
(27, 1, 'Louise Ann', '', 'Canalija', '1993-03-14', 'Sales and Marketing Executive', '', '0918692672', 'louisec.oneblue@gmail.com', '', 'Filipino', '2015-02-25 23:40:59', '2015-02-25 23:40:59'),
(28, 1, 'Jenefe', 'Ngoho', 'Simbajon', '1988-09-17', 'Accounting Staff', '', '09278523909', 'jenefesimbajon@gmail.com', '', 'Filipino', '2015-02-25 23:42:36', '2015-02-25 23:42:36'),
(29, 1, 'Darlene Paula', 'C', 'Dichoso', '1996-11-22', 'Student', '', '09321176664', 'arlene_paw@yahoo.com', '', 'Filipino', '2015-02-25 23:44:08', '2015-02-25 23:44:08'),
(30, 1, 'Minette', 'Aguio', 'Macaraeg', '1995-02-13', 'Student', '', '09276187856', '', '', 'Filipino', '2015-02-25 23:45:13', '2015-02-25 23:45:13');

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
(1, 1, 'INT', 'Intelligence', '25.00', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(2, 1, 'PER', 'Personality', '25.00', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(3, 1, 'CC', 'Casual Competition', '20.00', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(4, 1, 'LGC', 'Long Gown Competition', '20.00', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(5, 1, 'DEP', 'Deportment', '10.00', '2015-02-12 00:13:36', '2015-02-12 00:13:36'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'Selection of Top 15', 'Selection of Top 15', 'selection-of-top-15', '2015-02-28 00:00:00', 'Gaisano Grand', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(1, 1, 1, 0, '2015-02-25 22:36:53', '2015-02-25 22:36:53'),
(2, 1, 2, 0, '2015-02-25 22:42:32', '2015-02-25 22:42:32'),
(3, 1, 3, 0, '2015-02-25 22:45:13', '2015-02-25 22:45:13'),
(4, 1, 4, 0, '2015-02-25 22:48:32', '2015-02-25 22:48:32'),
(5, 1, 5, 0, '2015-02-25 22:51:38', '2015-02-25 22:51:38'),
(6, 1, 6, 0, '2015-02-25 22:55:13', '2015-02-25 22:55:13'),
(7, 1, 7, 0, '2015-02-25 22:57:50', '2015-02-25 22:57:50'),
(8, 1, 8, 0, '2015-02-25 23:00:24', '2015-02-25 23:00:24'),
(9, 1, 9, 0, '2015-02-25 23:02:15', '2015-02-25 23:02:15'),
(10, 1, 10, 0, '2015-02-25 23:03:58', '2015-02-25 23:03:58'),
(11, 1, 11, 0, '2015-02-25 23:05:14', '2015-02-25 23:05:14'),
(12, 1, 12, 0, '2015-02-25 23:06:32', '2015-02-25 23:06:32'),
(13, 1, 13, 0, '2015-02-25 23:07:43', '2015-02-25 23:07:43'),
(14, 1, 14, 0, '2015-02-25 23:09:49', '2015-02-25 23:09:49'),
(15, 1, 15, 0, '2015-02-25 23:11:21', '2015-02-25 23:11:21'),
(16, 1, 16, 0, '2015-02-25 23:12:28', '2015-02-25 23:12:28'),
(17, 1, 17, 0, '2015-02-25 23:14:06', '2015-02-25 23:14:06'),
(18, 1, 18, 0, '2015-02-25 23:16:01', '2015-02-25 23:16:01'),
(19, 1, 19, 0, '2015-02-25 23:18:19', '2015-02-25 23:18:19'),
(20, 1, 20, 0, '2015-02-25 23:20:45', '2015-02-25 23:20:45'),
(21, 1, 21, 0, '2015-02-25 23:23:23', '2015-02-25 23:23:23'),
(22, 1, 22, 0, '2015-02-25 23:29:53', '2015-02-25 23:29:53'),
(23, 1, 23, 0, '2015-02-25 23:33:31', '2015-02-25 23:33:31'),
(24, 1, 24, 0, '2015-02-25 23:35:52', '2015-02-25 23:35:52'),
(25, 1, 25, 0, '2015-02-25 23:37:32', '2015-02-25 23:37:32'),
(26, 1, 26, 0, '2015-02-25 23:39:08', '2015-02-25 23:39:08'),
(27, 1, 27, 0, '2015-02-25 23:40:59', '2015-02-25 23:40:59'),
(28, 1, 28, 0, '2015-02-25 23:42:36', '2015-02-25 23:42:36'),
(29, 1, 29, 0, '2015-02-25 23:44:08', '2015-02-25 23:44:08'),
(30, 1, 30, 0, '2015-02-25 23:45:13', '2015-02-25 23:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `segment_judges`
--

CREATE TABLE IF NOT EXISTS `segment_judges` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `judge_id` int(20) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_judges`
--

INSERT INTO `segment_judges` (`id`, `segment_id`, `judge_id`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, '2015-02-24 22:13:09', '2015-02-24 22:13:09'),
(2, 1, 2, '2015-02-24 22:13:31', '2015-02-24 22:13:31'),
(3, 1, 3, '2015-02-25 19:27:16', '2015-02-25 19:27:16'),
(4, 1, 4, '2015-02-25 19:28:00', '2015-02-25 19:28:00'),
(5, 1, 5, '2015-02-25 19:44:49', '2015-02-25 19:44:49'),
(6, 1, 6, '2015-02-25 21:14:02', '2015-02-25 21:14:02');

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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
