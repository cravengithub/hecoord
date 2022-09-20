-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2011 at 10:22 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `memo_id` int(11) NOT NULL auto_increment,
  `created_date` date default NULL,
  `actived_date` date default NULL,
  `name` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `comment` text NOT NULL,
  `status` enum('active','pasive') default NULL,
  PRIMARY KEY  (`memo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `memo`
--

