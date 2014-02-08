-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2014 at 07:20 PM
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

--
-- Dumping data for table `av`
--

INSERT INTO `av` (`vote_id`, `candidate_id`, `pref`, `time`) VALUES
(1, 2, 0, '2014-02-08 18:08:25'),
(1, 1, 1, '2014-02-08 18:08:25'),
(1, 3, 2, '2014-02-08 18:08:25'),
(2, 1, 0, '2014-02-08 18:15:45'),
(2, 3, 1, '2014-02-08 18:15:45'),
(2, 2, 2, '2014-02-08 18:15:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `person_id`, `position_id`, `election_id`, `manifesto`, `pitch`) VALUES
(1, 5, 1, 1, 'Hi everyone! My name is David Gilani and I’m a third year Philosophy and Maths student who would love to be your Vice President Communications.\r\n\r\nOver the last 3 years, I’ve had so many amazing opportunities at Southampton and I want to make sure that you can take advantage of the opportunities open to you too!\r\n\r\nDavid Gilani\r\nThe Aim\r\nI want to offer something incredible to all students: the knowledge and confidence to achieve real change.\r\n\r\nSo that everyone can know how to get involved and have all the support they need to do it.', 'Hi everyone! My name is David Gilani and I’m a third year Philosophy and Maths student who would love to be your Vice President Communications.'),
(2, 6, 1, 1, 'Hi, my name is David Mendoza-Wolfson, and I''m a third year History student.\r\n\r\nI have loved my three years at Southampton but I really do believe that the University could have given a lot more, in return for what we pay.\r\n\r\nAs VP Education I will represent you and work with the University to ensure that you get  the services, the resources and the quality of education that you, as students, deserve.\r\n\r\n\r\nMy aims:\r\n\r\nImprove your representation so that you get the changes that you want\r\nBetter the library by opening it for 24 hours a day and maximising the workspace available\r\nMaking your Educational Experience better by getting the teaching quality you deserve and much more\r\nGetting you more for your money by securing digitised course books, free print credits and a lot more on top of that!\r\nMy Experience:\r\n\r\n- Student Advisor at FAIR\r\n  FAIR is a proposal for an alternative way of funding Higher Education. Although a conservative, I completely     oppose the present fee system and believe that Higher Education shouldn''t be funded by debt.\r\n\r\n- Chairman of SUCA\r\n\r\n  I''ve been the Chairman of Southampton University Conservative Association since the end of my first year at Southampton. We have become the most active of all the political societies since I took charge and take pride in not only our Charity projects, but also in the fact that our events appeal to people of all and any political persuasion.\r\n\r\n - Opinions editor for the Wessex Scene\r\n\r\nSince March I have been an Opinions editor for the Wessex Scene. I enjoy writing articles but really love having an opportunity to edit them, and I believe that opinion articles are a great way to help understand other people''s views and thoughts.', 'Hi, my name is David Mendoza-Wolfson, and I''m a third year History student.'),
(3, 4, 1, 1, '<p><span style="color: #333333; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;">The University is already working on digitising books but I believe that it should prioritise core books used in courses and modules. I believe that the University should be cutting hidden course costs and this is a key way it can do so.</span><br style="color: #333333; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;" /><br style="color: #333333; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;" /><span style="color: #333333; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;">If you want more value for money from your education&nbsp;</span><a style="color: #3b5998; cursor: pointer; text-decoration: none; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;" href="https://www.facebook.com/MrWolfson?ref=stream" data-hovercard="/ajax/hovercard/page.php?id=390815791013616&amp;extragetparams=%7B%22directed_target_id%22%3A0%7D">Vote David Mendoza-Wolfson for VP Education</a><span style="color: #333333; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;">.&nbsp;</span><a style="color: #3b5998; cursor: pointer; text-decoration: none; font-family: ''lucida grande'', tahoma, verdana, arial, sans-serif; font-size: 13px; line-height: 18px;" href="http://www.facebook.com/l.php?u=http%3A%2F%2Fwww.susu.org%2Fvote&amp;h=RAQG0gVcH&amp;enc=AZO9O2-zEBOV4Ql7fsQ84syRoJrsOOYUrfay74rpKNT3H_jNbbpjuUnLpKpkoXzvNWzszIXwbKtvnZCUI06gSKxOgya8K4xnCeffN82hZxQ7XbvbOX3qaRB8VxJAwGFTQDy5azkfXkFE0cQV7dnTHCwf&amp;s=1" target="_blank" rel="nofollow nofollow">www.susu.org/vote</a></p>', '<p>I want 2 b Faculty Officer. This pitc is well written.</p>'),
(4, 7, 2, 1, 'Hello! I’m Marcus. I’m a second-year English student, and I’d love to be one of your Student Trustees!\r\n\r\nI’m currently a Union Councillor and Publicity Officer for the English Society; outside my degree and SUSU I kayak, and I’m a Campus Ambassador for PricewaterhouseCoopers (PwC) – so I believe I can bring a degree of professionalism, teamwork, and a good student perspective to the role of Student Trustee.\r\n\r\n\r\nTo me, the role of Trustee Board and its Student Trustees is to safeguard our Union’s potential for great things. Trustees’ work doesn’t generate something as tangible as a campaign or an award-winning activity; it ensures that our finances are healthy and sustainable, our staff are happy and motivated, and our strategies are sound and well informed. Trustees’ work creates the conditions that allow students – our Union – to produce fantastic achievements, and I believe I’ll excel at helping to accomplish this with three main competencies:\r\n\r\nCommunication: Listening to students, consulting with students.\r\nWhat?\r\nI’m passionate about ensuring our Union listens to and acts upon student feedback, particularly from those without an elected position in SUSU.\r\nWhat have you done?\r\nAs a Union Councillor, I’ve proposed amendments to Policy that mandated our Sabbaticals to consult with students on big changes to our Union, and questioned Sabbs and Student Leaders on their attendance records.\r\nWhat will you do?\r\nAs one of your Student Trustees I will work to ensure Trustee Board is as open as possible, and that I bring your feedback and input to all areas of Trustee Board’s work.', 'Hello! I’m Marcus. I’m a second-year English student, and I’d love to be one of your Student Trustees! I’m currently a Union Councillor and Publicity Officer for the English Society; outside my degree and SUSU I kayak, and I’m a Campus Ambassador for PricewaterhouseCoopers (PwC).'),
(5, 8, 2, 1, 'Dedication & Enthusiasm: Engaging, questioning, challenging.\r\nWhat?\r\nA critique often levelled at Trustee Board is that its Student Trustees are too passive. I will bring my energy and commitment to all the Board’s work and ensure it is thoroughly student-centered.\r\nWhat have you done?\r\nI’ve gone beyond my ordinary duties as a Union Councillor on many occasions to ensure students are well represented: whether that be as a leading member of the NoToNUS campaign team, or my involvement throughout the Standing Committee Review.\r\nWhat will you do?\r\nAs one of your Student Trustees I will fully engage with all the issues before Trustee Board, and not be afraid to ask questions on or to challenge anything which I, or you the students I represent, disagree with.\r\n\r\nOrganisation & Institutional Awareness: Knowing what, where, and how.\r\nWhat?\r\nBeing a trustee is a serious legal responsibility. Being elected, and trusted, by hundreds of students is even more serious – the very least I can do is know what I’m doing, when, and how it affects our Union more widely!\r\nWhat have you done?\r\nI’ve maintained a 100% attendance record as a Union Councillor, and voluntarily fine-tuned substantial amendments to our Union’s Constitution.\r\nWhat will you do?\r\nAs one of your Student Trustees I will be organised, think laterally about those areas of our Union which Trustee Board might unintentionally impact, and work to ensure good governance is applied.\r\n\r\nSo if you want a Student Trustee who will listen, seek out student feedback, engage and challenge, and be organised and think laterally, please:', 'If you want a Student Trustee who will listen, seek out student feedback, engage and challenge, and be organised and think laterally, please vote for me.'),
(6, 1, 1, 1, 'Re Open Nominations', 'Re Open Nominations'),
(7, 1, 2, 1, 'Re Open Nominations', 'Re Open Nominations');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fptp`
--

INSERT INTO `fptp` (`id`, `candidate_id`, `time`) VALUES
(1, 4, '2014-02-08 18:08:25'),
(2, 5, '2014-02-08 18:15:45');

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
(1, 2),
(1, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `shirt_size`, `image`, `issname`) VALUES
(1, 'RON', 0, '', '0'),
(2, 'Emily', 0, '', ''),
(4, 'Emily', 1, 'thumbs/candidate_be96aa2b53b745ac4591425cbade7769.jpg', 'ams2g11'),
(5, 'David Gilinau', 0, 'thumbs/gilani.png', ''),
(6, 'Mr Wolfson', 0, 'thumbs/david-mendoza-wolfson.png', ''),
(7, 'Joe Hart', 0, '', ''),
(8, 'Marcus Burton', 0, '', '');

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
(1, 'President', 'Do you have what it takes to be Union President? This demanding position allows you to really impact the shape and direction of the Students'' Union. As President you are the leader of the Sabbatical Officers and your role is to bring out the best in your team, so that together you are able to make maximum impact on improving the lives of students. You also provide the important link between the officers and staff of the Union.', 0),
(2, 'VP Education', 'Passionate about good education? The Vice President Education represents students and campaigns on matters relating directly to students'' education like teaching quality, library provision and feedback. They are responsible for implementing many of the Union''s education policies and work closely with Academic Presidents, Faculty Officers and Course Reps to improve students'' education experience.', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `voteids`
--

INSERT INTO `voteids` (`id`) VALUES
(1),
(2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
