-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2015 at 10:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `text`) VALUES
(1, 'asdf'),
(31, 'q'),
(32, 'qw'),
(33, 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `noteid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`noteid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`noteid`, `userid`, `title`, `content`, `date_added`) VALUES
(1, 1, 'Jesse', 'This is a note.', '2015-05-05 19:12:00'),
(2, 1, 'test', 'test', '0000-00-00 00:00:00'),
(3, 1, 'test2', 'test2', '2015-05-06 15:24:42'),
(4, 1, 'd', 'swjkll\r\n', '2015-05-06 15:58:57'),
(5, 1, 'k', 'kl\r\n', '2015-05-06 21:06:17'),
(14, 28, 'malo', 'vise', '2015-05-06 23:40:45'),
(15, 1, 'SD', 'Z7', '2015-05-12 11:18:20'),
(16, 1, 'S', 'A', '2015-05-12 11:19:19'),
(17, 1, 'A', 'A', '2015-05-12 11:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `personid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) unsigned NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`personid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personid`, `name`, `age`, `gender`) VALUES
(1, 'jesse', 24, 'm'),
(2, 'joe', 22, 'm'),
(3, 'jenny', 434, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('default','admin','owner') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'jesse', 'a1361cb85be840d6a2d762c68e4910e2', 'owner'),
(2, 'joe', 'a1361cb85be840d6a2d762c68e4910e2', 'default'),
(3, 'jesse', '3327a2154aa1900fa110ae3d20d27d05', 'admin'),
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', 'default'),
(5, 'test22', '4d42bf9c18cb04139f918ff0ae68f8a0', 'default');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
