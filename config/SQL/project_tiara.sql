-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2015 at 10:02 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `competition_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `occupation`, `telephone`, `mobile`, `email`, `religion`, `citizenship`, `_date_created`, `_date_modified`) VALUES
(1, 0, 'Alvin Mark', 'Umacob', 'Cabelino', '0000-00-00', 'IT Instructor', '', '', '', '', 'Filipino', '2015-02-16 12:42:04', '2015-02-16 12:42:04'),
(2, 0, 'Michael', '', 'Palacio', '0000-00-00', '', '', '', '', '', '', '2015-02-17 00:38:51', '2015-02-17 00:38:51'),
(3, 0, '', '', '', '0000-00-00', '', '', '', '', '', '', '2015-02-18 00:17:33', '2015-02-18 00:17:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `competition_id`, `first_name`, `last_name`, `username`, `password`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Gertrude R', 'Cordero', 'gertruder', 'b6cd4c0729a71f2afdb0b211659ebf30f480ad70', 1, '2015-02-16 12:22:03', '2015-02-16 12:22:03'),
(2, 1, 'Alvin Mark', 'Cabeliño', 'thevindetta', '85e8e4cfd16031015721ec7ab8b5b64b4681cdfc', 1, '2015-02-17 01:51:20', '2015-02-17 01:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `venue` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `competition_id`, `name`, `description`, `date`, `venue`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Selection of Top 15', 'Selection of Top 15', '2015-02-28 00:00:00', 'Gaisano Grand', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Talent Competition', 'Talent Competition', '2015-03-06 00:00:00', 'Gaisano Mall', 1, '2015-02-12 00:06:35', '2015-02-12 00:06:35'),
(3, 1, 'Top 5', 'Top 5', '2015-03-11 00:00:00', 'SM Lanang', 1, '2015-02-12 00:09:06', '2015-02-12 00:09:06'),
(4, 1, 'Selection of Winners', 'Selection of Winners', '2015-03-11 00:00:00', 'SM Lanang', 1, '2015-02-12 00:10:32', '2015-02-12 00:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `segments_as_criteria`
--

CREATE TABLE IF NOT EXISTS `segments_as_criteria` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `node_segment_id` int(20) NOT NULL,
  `percentage` decimal(3,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segments_as_criteria`
--

INSERT INTO `segments_as_criteria` (`id`, `segment_id`, `node_segment_id`, `percentage`) VALUES
(1, 4, 3, '50'),
(2, 3, 2, '15');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_contestants`
--

INSERT INTO `segment_contestants` (`id`, `segment_id`, `contestant_id`, `number`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, 0, '2015-02-16 12:42:04', '2015-02-16 12:42:04'),
(2, 1, 2, 0, '2015-02-17 00:38:51', '2015-02-17 00:38:51'),
(3, 1, 3, 0, '2015-02-18 00:17:33', '2015-02-18 00:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `segment_criterias`
--

CREATE TABLE IF NOT EXISTS `segment_criterias` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `percentage` decimal(3,0) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_criterias`
--

INSERT INTO `segment_criterias` (`id`, `segment_id`, `name`, `description`, `percentage`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'INT', 'Intelligence', '25', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(2, 1, 'PER', 'Personality', '25', '2015-02-12 00:11:52', '2015-02-12 00:11:52'),
(3, 1, 'CC', 'Casual Competition', '20', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(4, 1, 'LGC', 'Long Gown Competition', '20', '2015-02-12 00:12:28', '2015-02-12 00:12:28'),
(5, 1, 'DEP', 'Deportment', '10', '2015-02-12 00:13:36', '2015-02-12 00:13:36'),
(6, 2, 'TAL', 'Special skills, abilities and uniqueness of talent', '30', '2015-02-12 00:13:36', '2015-02-12 00:13:36'),
(7, 2, 'PAE', 'Performance and execution', '30', '2015-02-12 00:14:03', '2015-02-12 00:14:03'),
(8, 2, 'SMS', 'Showmanship', '15', '2015-02-12 00:14:03', '2015-02-12 00:14:03'),
(9, 2, 'IMP', 'Over-all impact', '15', '2015-02-12 00:14:29', '2015-02-12 00:14:29'),
(10, 2, 'DEP', 'Deportment', '10', '2015-02-12 00:14:29', '2015-02-12 00:14:29'),
(11, 3, 'INT', 'Intelligence', '25', '2015-02-12 00:15:08', '2015-02-12 00:15:08'),
(12, 3, 'PER', 'Personality', '30', '2015-02-12 00:15:08', '2015-02-12 00:15:08'),
(13, 3, 'CC', 'Casual Competition', '15', '2015-02-12 00:15:37', '2015-02-12 00:15:37'),
(14, 3, 'LGC', 'Long Gown Competition', '15', '2015-02-12 00:15:37', '2015-02-12 00:15:37'),
(16, 4, 'QA', 'Question and answer', '50', '2015-02-12 00:16:34', '2015-02-12 00:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `segment_criteria_scores`
--

CREATE TABLE IF NOT EXISTS `segment_criteria_scores` (
`id` int(20) NOT NULL,
  `segment_criteria_id` int(20) NOT NULL,
  `segment_judge_id` int(20) NOT NULL,
  `segment_contestant_id` int(20) NOT NULL,
  `score` decimal(3,2) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_judges`
--

INSERT INTO `segment_judges` (`id`, `segment_id`, `judge_id`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '2015-02-11 23:14:37', '2015-02-11 23:14:37'),
(3, 3, 1, '2015-02-12 00:41:29', '2015-02-12 00:41:29'),
(4, 4, 1, '2015-02-12 00:41:29', '2015-02-12 00:41:29'),
(5, 1, 2, '2015-02-17 01:51:20', '2015-02-17 01:51:20');

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
-- Indexes for table `segment_criterias`
--
ALTER TABLE `segment_criterias`
 ADD PRIMARY KEY (`id`), ADD KEY `segment_id` (`segment_id`);

--
-- Indexes for table `segment_criteria_scores`
--
ALTER TABLE `segment_criteria_scores`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contestant_images`
--
ALTER TABLE `contestant_images`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `segment_criterias`
--
ALTER TABLE `segment_criterias`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `segment_criteria_scores`
--
ALTER TABLE `segment_criteria_scores`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segment_judges`
--
ALTER TABLE `segment_judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
