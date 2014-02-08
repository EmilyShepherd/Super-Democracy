-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2014 at 08:55 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `person_id`, `position_id`, `election_id`, `manifesto`, `pitch`) VALUES
(1, 3, 2, 1, 'I am great m8', 'Nope m8'),
(2, 1, 2, 1, 'Stuff', 'Stuff'),
(3, 1, 3, 1, 'Stuff', 'Stuff'),
(4, 4, 2, 1, 'Other Stuff', 'Yes'),
(5, 2, 2, 1, 'RON', 'Re Open Nominations'),
(6, 1, 4, 1, 'Woohoo!', 'Nope'),
(7, 2, 1, 1, 'Reopen Nominations', 'Re Open Nominations'),
(8, 2, 3, 1, '', 'Re Open Nominations');

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
(1, 'Test Election', '2014-02-08 07:55:48', '0000-00-00 00:00:00', '2014-02-07 21:11:57', '2014-02-28 00:00:00');

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
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fptp`
--

CREATE TABLE IF NOT EXISTS `fptp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fptp`
--

INSERT INTO `fptp` (`id`, `candidate_id`, `time`) VALUES
(1, 7, '2014-02-08 06:37:46'),
(2, 2, '2014-02-08 06:37:46'),
(3, 4, '2014-02-08 06:37:46'),
(4, 3, '2014-02-08 06:37:46'),
(5, 6, '2014-02-08 06:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'General Students'),
(2, 'Not Pres');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `shirt_size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `shirt_size`) VALUES
(1, 'RON', 0),
(2, 'Emily', 0),
(3, 'Milosz', 0),
(4, 'Chris', 0),
(5, 'DMW', 0),
(6, 'Gilanuia', 0),
(7, 'Beckie', 0),
(8, 'Claire', 0),
(9, 'David Martin', 0),
(10, 'Evan', 0),
(11, 'Oli Coles', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `description`, `voting`) VALUES
(1, 'President', 'Do you have what it takes to be Union President? This demanding position allows you to really impact the shape and direction of the Students'' Union. As President you are the leader of the Sabbatical Officers and your role is to bring out the best in your team, so that together you are able to make maximum impact on improving the lives of students. You also provide the important link between the officers and staff of the Union.', 0),
(2, 'VP Education', 'Passionate about good education? The Vice President Education represents students and campaigns on matters relating directly to students'' education like teaching quality, library provision and feedback. They are responsible for implementing many of the Union''s education policies and work closely with Academic Presidents, Faculty Officers and Course Reps to improve students'' education experience.', 0),
(3, 'VP Welfare', 'The VP Welfare works with the University and SUSU to ensure action on issues which may jeopardise students'' wellbeing, such as housing, mental health and financial issues. You will campaign to protect and enhance student rights and positively promote changes to lifestyle that can improve student well-being. You will also lead on campaigns that promote equality for all our members.', 0),
(4, 'VP Engagement', 'The VP Engagement supports student groups to interact with and positively impact the external community. You will take a lead on increasing participation within the student community, both in terms of width and depth of participation. You will also have oversight of SUSU''s website, social media and all SUSU communications.', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position-vote`
--

INSERT INTO `position-vote` (`id`, `position_id`, `group_id`, `exclude`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 1, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
