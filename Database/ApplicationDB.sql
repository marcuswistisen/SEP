-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2014 at 03:01 PM
-- Server version: 5.5.39-MariaDB
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ApplicationDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Application`
--

CREATE TABLE IF NOT EXISTS `Application` (
`application_id` int(10) NOT NULL,
  `uts_id` int(10) NOT NULL,
  `university_id` int(10) NOT NULL,
  `justification_id` int(10) NOT NULL,
  `cost_id` int(10) NOT NULL,
  `conferance_id` int(10) NOT NULL,
  `travel_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Conferance`
--

CREATE TABLE IF NOT EXISTS `Conferance` (
`conferance_id` int(10) NOT NULL,
  `conference_url` varchar(50) NOT NULL,
  `conference_name` varchar(50) NOT NULL,
  `conference_start` date NOT NULL,
  `conference_end` date NOT NULL,
  `conference_country` varchar(50) NOT NULL,
  `conferance_quality` int(5) NOT NULL,
  `special_invitation` tinyint(1) NOT NULL,
  `pep_arrangement` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Cost`
--

CREATE TABLE IF NOT EXISTS `Cost` (
`cost_id` int(10) NOT NULL,
  `air_fares` double NOT NULL,
  `meal_cost` double NOT NULL,
  `accomondation_cost` double NOT NULL,
  `conferance_cost` double NOT NULL,
  `local_fares_cost` double NOT NULL,
  `car_milage_cost` double NOT NULL,
  `other_cost` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Justification`
--

CREATE TABLE IF NOT EXISTS `Justification` (
`justification_id` int(11) NOT NULL,
  `paper_title` varchar(50) NOT NULL,
  `evidence` text NOT NULL,
  `journal_accepted` tinyint(1) NOT NULL,
  `peer_review_happend` tinyint(1) NOT NULL,
  `journal_declared` tinyint(1) NOT NULL,
  `peer_review_url` varchar(50) NOT NULL,
  `copy_paper_url` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Travel`
--

CREATE TABLE IF NOT EXISTS `Travel` (
`travel_id` int(10) NOT NULL,
  `travel_start` date NOT NULL,
  `travel_end` date NOT NULL,
  `travel_loc` enum('Domestic','International','','') NOT NULL,
  `travel_justification` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `University`
--

CREATE TABLE IF NOT EXISTS `University` (
`university_id` int(10) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `research_student` tinyint(1) NOT NULL,
  `research_grant` tinyint(1) NOT NULL,
  `research_stregth` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Application`
--
ALTER TABLE `Application`
 ADD PRIMARY KEY (`application_id`), ADD UNIQUE KEY `uts_id_2` (`uts_id`), ADD UNIQUE KEY `university_id` (`university_id`), ADD KEY `uts_id` (`uts_id`,`university_id`,`justification_id`), ADD KEY `cost_id` (`cost_id`,`conferance_id`,`travel_id`), ADD KEY `justification_id` (`justification_id`), ADD KEY `cost_id_2` (`cost_id`), ADD KEY `conferance_id` (`conferance_id`), ADD KEY `travel_id` (`travel_id`);

--
-- Indexes for table `Conferance`
--
ALTER TABLE `Conferance`
 ADD PRIMARY KEY (`conferance_id`);

--
-- Indexes for table `Cost`
--
ALTER TABLE `Cost`
 ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `Justification`
--
ALTER TABLE `Justification`
 ADD PRIMARY KEY (`justification_id`);

--
-- Indexes for table `Travel`
--
ALTER TABLE `Travel`
 ADD PRIMARY KEY (`travel_id`);

--
-- Indexes for table `University`
--
ALTER TABLE `University`
 ADD PRIMARY KEY (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Application`
--
ALTER TABLE `Application`
MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Conferance`
--
ALTER TABLE `Conferance`
MODIFY `conferance_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Cost`
--
ALTER TABLE `Cost`
MODIFY `cost_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Justification`
--
ALTER TABLE `Justification`
MODIFY `justification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Travel`
--
ALTER TABLE `Travel`
MODIFY `travel_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `University`
--
ALTER TABLE `University`
MODIFY `university_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Application`
--
ALTER TABLE `Application`
ADD CONSTRAINT `Application_ibfk_1` FOREIGN KEY (`uts_id`) REFERENCES `LoginDB`.`User` (`uts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Application_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `University` (`university_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Application_ibfk_3` FOREIGN KEY (`justification_id`) REFERENCES `Justification` (`justification_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Application_ibfk_4` FOREIGN KEY (`cost_id`) REFERENCES `Cost` (`cost_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Application_ibfk_5` FOREIGN KEY (`conferance_id`) REFERENCES `Conferance` (`conferance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `Application_ibfk_6` FOREIGN KEY (`travel_id`) REFERENCES `Travel` (`travel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
