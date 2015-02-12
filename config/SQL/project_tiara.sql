-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2015 at 05:54 AM
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
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `description`, `date`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 'Mutya ng Dabaw 2015', '78th Araw ng Davao Beauty Pageant', '2015-02-28', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE IF NOT EXISTS `contestants` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `competition_id`, `first_name`, `last_name`, `birthdate`, `occupation`, `detail`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Jane', 'Jabican', '2014-09-09', '', '', '2015-02-11 00:00:00', '2015-02-11 00:00:00');

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
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `_date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `first_name`, `last_name`, `username`, `password`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 'Alvin Mark', 'Cabelino', 'alvinmark', '', 1, '2015-02-11 18:50:55', '2015-02-11 18:50:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `competition_id`, `name`, `description`, `date`, `venue`, `status`, `_date_created`, `_date_modified`) VALUES
(1, 1, 'Screening', '', '2015-02-21 00:00:00', 'Gaisano Grand', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Top 15', '', '2015-03-07 00:00:00', 'Gaisano Mall', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `segments_as_criteria`
--

CREATE TABLE IF NOT EXISTS `segments_as_criteria` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `node_segment_id` int(20) NOT NULL,
  `percentage` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 1, 1, '2015-02-11 00:16:49', '2015-02-11 00:16:49'),
(2, 2, 1, 2, '2015-02-11 01:33:09', '2015-02-11 01:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `segment_criterias`
--

CREATE TABLE IF NOT EXISTS `segment_criterias` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `percentage` decimal(3,2) NOT NULL,
  `_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_judges`
--

INSERT INTO `segment_judges` (`id`, `segment_id`, `judge_id`, `_date_created`, `_date_modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contestant_images`
--
ALTER TABLE `contestant_images`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `segments_as_criteria`
--
ALTER TABLE `segments_as_criteria`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segment_contestants`
--
ALTER TABLE `segment_contestants`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `segment_criterias`
--
ALTER TABLE `segment_criterias`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segment_criteria_scores`
--
ALTER TABLE `segment_criteria_scores`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segment_judges`
--
ALTER TABLE `segment_judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
