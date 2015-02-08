-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2015 at 09:59 AM
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
  `password` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
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
  `status` tinyint(4) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criteria_scores`
--

CREATE TABLE IF NOT EXISTS `criteria_scores` (
`id` int(20) NOT NULL,
  `criteria_template_id` int(20) NOT NULL,
  `judge_id` int(20) NOT NULL,
  `contestant_id` int(20) NOT NULL,
  `score` decimal(10,2) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criteria_template`
--

CREATE TABLE IF NOT EXISTS `criteria_template` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `percentage` decimal(10,0) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
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
  `password` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
`id` int(20) NOT NULL,
  `competition_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `venue` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `segments_as_criteria`
--

CREATE TABLE IF NOT EXISTS `segments_as_criteria` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `node_segment_id` int(20) NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `segment_judges`
--

CREATE TABLE IF NOT EXISTS `segment_judges` (
`id` int(20) NOT NULL,
  `segment_id` int(20) NOT NULL,
  `judge_id` int(20) NOT NULL,
  `_date_created` datetime NOT NULL,
  `_date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `criteria_scores`
--
ALTER TABLE `criteria_scores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria_template`
--
ALTER TABLE `criteria_template`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`id`), ADD KEY `segment_id` (`segment_id`), ADD KEY `node_segment_id` (`node_segment_id`);

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
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criteria_scores`
--
ALTER TABLE `criteria_scores`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `criteria_template`
--
ALTER TABLE `criteria_template`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segments_as_criteria`
--
ALTER TABLE `segments_as_criteria`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `segment_judges`
--
ALTER TABLE `segment_judges`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
