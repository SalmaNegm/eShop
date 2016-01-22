-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 04:04 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(20) NOT NULL,
  PRIMARY KEY (`cID`),
  UNIQUE KEY `cName` (`cName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='stores names of different categories' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customerInterests`
--

CREATE TABLE IF NOT EXISTS `customerInterests` (
  `uID` int(11) unsigned NOT NULL,
  `interests` varchar(20) NOT NULL,
  KEY `uID` (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='categories that customer is interested in';

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `uID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uName` varchar(30) NOT NULL,
  `DoB` date DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `job` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `cridetLimit` float NOT NULL,
  PRIMARY KEY (`uID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='stores customers data' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE IF NOT EXISTS `orderItems` (
  `oID` int(11) unsigned NOT NULL,
  `pID` int(11) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `oID` (`oID`),
  KEY `pID` (`pID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oDate` date NOT NULL,
  `uID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`oID`),
  KEY `oID` (`oID`),
  KEY `oID_2` (`oID`),
  KEY `oID_3` (`oID`),
  KEY `oID_4` (`oID`),
  KEY `uID` (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(30) NOT NULL,
  `pPrice` float NOT NULL,
  `pQuantity` int(11) NOT NULL,
  `pImg` varchar(50) NOT NULL,
  `pDesc` varchar(100) NOT NULL,
  `cID` int(11) unsigned NOT NULL,
  `scID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pID`),
  KEY `cID` (`cID`),
  KEY `scID` (`scID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='products info and categories' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `scID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `scName` varchar(20) NOT NULL,
  `cID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`scID`),
  UNIQUE KEY `scName` (`scName`),
  KEY `cID` (`cID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='subcategories names and which category it follows' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerInterests`
--
ALTER TABLE `customerInterests`
  ADD CONSTRAINT `customerInterests_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`);

--
-- Constraints for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD CONSTRAINT `orderItems_ibfk_2` FOREIGN KEY (`pID`) REFERENCES `products` (`pID`),
  ADD CONSTRAINT `orderItems_ibfk_1` FOREIGN KEY (`oID`) REFERENCES `orders` (`oID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`scID`) REFERENCES `subcategories` (`scID`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cID`) REFERENCES `categories` (`cID`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`cID`) REFERENCES `categories` (`cID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
