-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2014 at 06:43 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `democracy`
--

-- --------------------------------------------------------

--
-- Table structure for table `av`
--

CREATE TABLE IF NOT EXISTS `av` (
  `vote_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `pref` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `manifesto` text NOT NULL,
  `pitch` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `nomination_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nomination_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `name`, `nomination_start`, `nomination_end`, `vote_start`, `vote_end`) VALUES
(1, 'SUSU Elections', '2014-02-01 00:00:00', '2014-02-19 12:00:00', '2014-02-03 12:00:00', '2014-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `election-position`
--

CREATE TABLE IF NOT EXISTS `election-position` (
  `election_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election-position`
--

INSERT INTO `election-position` (`election_id`, `position_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `fptp`
--

CREATE TABLE IF NOT EXISTS `fptp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'All Students');

-- --------------------------------------------------------

--
-- Table structure for table `group-person`
--

CREATE TABLE IF NOT EXISTS `group-person` (
  `group_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group-person`
--

INSERT INTO `group-person` (`group_id`, `person_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hasvoted`
--

CREATE TABLE IF NOT EXISTS `hasvoted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `shirt_size` int(11) NOT NULL,
  `image` text NOT NULL,
  `issname` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `shirt_size`, `image`, `issname`) VALUES
(1, 'RON', 0, '', '0'),
(2, 'Emily', 0, '', 'ams2g11');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `voting` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `description`, `voting`) VALUES
(1, 'President', '', 0),
(2, 'VP Education', '', 0),
(4, 'VP Welfare', '', 0),
(5, 'VP Engagement', '', 0),
(6, 'VP Sport', '', 0),
(7, 'VP DCI', '', 0),
(8, 'VP Student Communities', '', 0),
(9, 'PA Officer', '', 0),
(10, 'Nightline Officer', '', 0),
(11, 'LGBT Officer', '', 0),
(12, 'SUSUtv Station Manager', '', 0),
(13, 'Surge Station Manager', '', 0),
(14, 'NOC Site Officer', '', 0),
(15, 'WSA Site Officer', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position-eligable`
--

CREATE TABLE IF NOT EXISTS `position-eligable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `exclude` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `position-eligable`
--

INSERT INTO `position-eligable` (`id`, `position_id`, `group_id`, `exclude`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 4, 1, 0),
(4, 5, 1, 0),
(5, 6, 1, 0),
(6, 7, 1, 0),
(7, 8, 1, 0),
(8, 9, 1, 0),
(9, 10, 1, 0),
(10, 11, 1, 0),
(11, 12, 1, 0),
(12, 13, 1, 0),
(13, 14, 1, 0),
(14, 15, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position-vote`
--

CREATE TABLE IF NOT EXISTS `position-vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `exclude` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `position-vote`
--

INSERT INTO `position-vote` (`id`, `position_id`, `group_id`, `exclude`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 4, 1, 0),
(4, 5, 1, 0),
(5, 6, 1, 0),
(6, 7, 1, 0),
(7, 8, 1, 0),
(8, 9, 1, 0),
(9, 10, 1, 0),
(10, 11, 1, 0),
(11, 12, 1, 0),
(12, 13, 1, 0),
(13, 14, 1, 0),
(14, 15, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voteids`
--

CREATE TABLE IF NOT EXISTS `voteids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
