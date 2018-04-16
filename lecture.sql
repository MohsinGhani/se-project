-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 03:48 PM
-- Server version: 5.7.20
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lecture`
--

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lec_title` varchar(30) NOT NULL,
  `prog_type` varchar(50) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `lec_type` varchar(50) NOT NULL,
  `file_path` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `lec_title`, `prog_type`, `course_name`, `lec_type`, `file_path`) VALUES
(1, 'New', 'Applied & Pure Sciences', '', 'Video', ''),
(2, '', '', '', '', ''),
(3, '', 'Engineering', 'SE', 'Video', ''),
(4, 'My New Lecture', 'Applied & Pure Sciences', 'Name', 'Image', ''),
(5, 'My New Lecture One', 'Applied & Pure Sciences', 'New Course', 'MS Word', ''),
(6, 'New', 'Applied & Pure Sciences', 'Nameweqwe', 'Video', '');
