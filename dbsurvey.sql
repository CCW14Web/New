-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 01:08 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsurvey`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `priority` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `priority`) VALUES
(1, 'jose', '7110eda4d09e062aa5e4a390b0a572', 2),
(2, 'satheesh', '8cb2237d0679ca88db6464eac60da9', 2),
(3, '', '7e41c6480852a4a914e48c7a3a4084', 2);

-- --------------------------------------------------------

--
-- Table structure for table `questionoptions`
--

CREATE TABLE IF NOT EXISTS `questionoptions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `questionID` int(11) NOT NULL,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `questionoptions`
--

INSERT INTO `questionoptions` (`ID`, `questionID`, `text`) VALUES
(1, 1, '1000'),
(2, 1, '2000'),
(3, 1, '3000'),
(4, 1, '4000'),
(5, 2, '50'),
(6, 2, '150'),
(7, 2, '250'),
(8, 2, '350'),
(9, 3, 'A1'),
(10, 3, 'B1'),
(11, 3, 'C1'),
(12, 3, 'D1'),
(13, 4, 'sadas'),
(14, 4, 'asd'),
(15, 4, 'sad'),
(16, 4, 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `surveyid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `surveyid`, `title`, `type`) VALUES
(1, 1, 'Annual income', 'C'),
(2, 1, 'Annual expense', 'C'),
(3, 2, 'QQQ111', 'C'),
(4, 2, 'sadsa', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `questiontypes`
--

CREATE TABLE IF NOT EXISTS `questiontypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ownerID` int(11) NOT NULL,
  `ownername` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `responselimit` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isActive` char(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`ID`, `ownerID`, `ownername`, `description`, `startdate`, `enddate`, `responselimit`, `category`, `title`, `isActive`) VALUES
(1, 1, '', 'details of computer', '2014-04-27', '2014-04-28', 12, 'IT', 'computer', 'Y'),
(2, 1, '', 'asdsa', '2014-04-22', '2014-04-29', 123, 'asdsadsa', 'asdsa', 'Y'),
(3, 1, '', 'dasdsa', '2014-04-16', '2014-05-01', 12321, 'asdasd', 'dasdsa', 'Y'),
(4, 1, '', 'gjhff', '2014-04-16', '2014-05-01', 24324, 'rfdgfdc', 'cherry', 'Y'),
(5, 1, '', 'adasdad', '2014-04-29', '2014-05-01', 232, 'dasdsad', 'dasdas', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `userresponses`
--

CREATE TABLE IF NOT EXISTS `userresponses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `surveryID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userresponses`
--

INSERT INTO `userresponses` (`ID`, `surveryID`, `questionID`, `answer`) VALUES
(3, 2, 3, ' 2 '),
(4, 1, 1, ' 2 '),
(5, 2, 4, ' 2 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `flatno` varchar(10) NOT NULL,
  `streetno` varchar(25) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `priority` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `birthdate`, `gender`, `username`, `password`, `email`, `phonenumber`, `flatno`, `streetno`, `city`, `province`, `country`, `zip`, `priority`) VALUES
(7, 'Cherry', 'Jose', '2014-04-08', 'M', 'jose', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cherryjose1@gmail.com', '1232131232', 'panackal h', 'meilkad p.o', 'Ernakulam', 'kerala', 'India', '683589', 2),
(8, 'Satheesh', 'Francis', '2014-04-10', 'M', 'satheesh', '8cb2237d0679ca88db6464eac60da96345513964', 'cherryjose1@gmail.com', '6477829965', 'panackal h', 'meilkad p.o', 'Ernakulam', 'kerala', 'India', '683589', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
