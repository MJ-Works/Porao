-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2014 at 09:31 AM
-- Server version: 5.0.77
-- PHP Version: 5.3.3

create database Book_Rental;
use Book_Rental;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bolt`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL default 'user',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;
INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Admin', 'Webmaster', 'Internet', 'Electricity', 101010, 'admin@admin.com', 'admin', 'admin');


CREATE TABLE IF NOT EXISTS `donatebooks` (
  `id` int(11) auto_increment ,
  `userid` int,
  `title` varchar(255) ,
  `author` varchar(255) ,
  `edition` varchar(255)  ,
  `bookcondition` varchar(255)  ,
  `price` int  ,
  `qty`  int,
  `category` varchar(255)  ,
  `image` varchar(255) ,
  `description` text ,
  `pickupplace` text,
    PRIMARY KEY  (`id`),
    FOREIGN KEY (userid) REFERENCES users(id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `sharebooks` (
  `id` int(11) auto_increment ,
  `userid` int,
  `title` varchar(255) ,
  `author` varchar(255) ,
  `edition` varchar(255)  ,
  `bookcondition` varchar(255)  ,
  `price` int  ,
  `qty`  int,
  `category` varchar(255)  ,
  `image` varchar(255) ,
  `description` text ,
  `pickupplace` text,
    PRIMARY KEY  (`id`),
    FOREIGN KEY (userid) REFERENCES users(id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `shareoffers` (
  `id` int(11) auto_increment ,
  `bookid` int,
  `userid` int,
  `description` text ,
    PRIMARY KEY  (`id`),
    FOREIGN KEY (bookid) REFERENCES sharebooks(id),
    FOREIGN KEY (userid) REFERENCES users(id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;


CREATE TABLE IF NOT EXISTS `donateoffers` (
  `id` int(11) auto_increment ,
  `bookid` int,
   `userid` int,
  `description` text ,
    PRIMARY KEY  (`id`),
    FOREIGN KEY (bookid) REFERENCES donatebooks(id),
    FOREIGN KEY (userid) REFERENCES users(id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `products`
--
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

