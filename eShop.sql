-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2016 at 12:52 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores names of different categories' AUTO_INCREMENT=121 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cID`, `cName`) VALUES
(118, 'a'),
(119, 'b'),
(120, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `customerInterests`
--

CREATE TABLE IF NOT EXISTS `customerInterests` (
  `uID` int(11) unsigned NOT NULL,
  `interests` varchar(20) NOT NULL,
  KEY `cascade_uID_custInter` (`uID`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores customers data' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uID`, `uName`, `DoB`, `password`, `job`, `email`, `address`, `cridetLimit`) VALUES
(1, 'salma', '1993-09-13', '123', 'student', 'salma@email.com', 'mansoura', 114);

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE IF NOT EXISTS `orderItems` (
  `oID` int(11) unsigned NOT NULL,
  `pID` int(11) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `cascade_pID_orderItems` (`pID`),
  KEY `cascade_oID_orderItems` (`oID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderItems`
--

INSERT INTO `orderItems` (`oID`, `pID`, `quantity`) VALUES
(6, 2, 3),
(6, 3, 1),
(6, 4, 2),
(6, 5, 3),
(7, 2, 3),
(7, 3, 1),
(7, 4, 2),
(7, 5, 3),
(8, 2, 3),
(8, 3, 1),
(8, 4, 2),
(8, 5, 3),
(9, 2, 3),
(9, 3, 1),
(9, 4, 2),
(9, 5, 3),
(10, 2, 3),
(10, 3, 1),
(10, 4, 2),
(10, 5, 3),
(11, 2, 3),
(11, 3, 1),
(11, 4, 2),
(11, 5, 3),
(12, 2, 3),
(12, 3, 1),
(12, 4, 2),
(12, 5, 3),
(13, 2, 3),
(13, 3, 1),
(13, 4, 2),
(13, 5, 3),
(14, 2, 3),
(14, 3, 1),
(14, 4, 2),
(14, 5, 3),
(15, 2, 3),
(15, 3, 1),
(15, 4, 2),
(15, 5, 3),
(16, 2, 3),
(16, 3, 1),
(16, 4, 2),
(16, 5, 3),
(17, 2, 3),
(17, 3, 1),
(17, 4, 2),
(17, 5, 3),
(18, 2, 3),
(18, 3, 1),
(18, 4, 2),
(18, 5, 3),
(19, 2, 3),
(19, 3, 1),
(19, 4, 2),
(19, 5, 3),
(20, 2, 3),
(20, 3, 1),
(20, 4, 2),
(20, 5, 3),
(21, 2, 3),
(21, 3, 1),
(21, 4, 2),
(21, 5, 3),
(22, 2, 3),
(22, 3, 1),
(22, 4, 2),
(22, 5, 3),
(23, 2, 3),
(23, 3, 1),
(23, 4, 2),
(23, 5, 3),
(24, 2, 3),
(24, 3, 1),
(24, 4, 2),
(24, 5, 3),
(25, 2, 3),
(25, 3, 1),
(25, 4, 2),
(25, 5, 3),
(26, 2, 3),
(26, 3, 1),
(26, 4, 2),
(26, 5, 3),
(27, 2, 3),
(27, 3, 1),
(27, 4, 2),
(27, 5, 3),
(28, 2, 3),
(28, 3, 1),
(28, 4, 2),
(28, 5, 3),
(29, 2, 4),
(29, 3, 3),
(29, 4, 2),
(29, 5, 4),
(30, 5, 3),
(30, 3, 2);

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
  KEY `cascade_uID_orders` (`uID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oID`, `oDate`, `uID`) VALUES
(1, '2016-01-31', 1),
(2, '2016-01-31', 1),
(3, '2016-01-31', 1),
(4, '2016-01-31', 1),
(5, '2016-01-31', 1),
(6, '2016-01-31', 1),
(7, '2016-01-31', 1),
(8, '2016-01-31', 1),
(9, '2016-01-31', 1),
(10, '2016-01-31', 1),
(11, '2016-01-31', 1),
(12, '2016-01-31', 1),
(13, '2016-01-31', 1),
(14, '2016-01-31', 1),
(15, '2016-01-31', 1),
(16, '2016-01-31', 1),
(17, '2016-01-31', 1),
(18, '2016-01-31', 1),
(19, '2016-01-31', 1),
(20, '2016-01-31', 1),
(21, '2016-01-31', 1),
(22, '2016-01-31', 1),
(23, '2016-01-31', 1),
(24, '2016-01-31', 1),
(25, '2016-01-31', 1),
(26, '2016-01-31', 1),
(27, '2016-01-31', 1),
(28, '2016-01-31', 1),
(29, '2016-01-31', 1),
(30, '2016-02-01', 1);

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
  `scID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pID`),
  UNIQUE KEY `pName` (`pName`),
  KEY `cascade_scID_prod` (`scID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='products info and categories' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pID`, `pName`, `pPrice`, `pQuantity`, `pImg`, `pDesc`, `scID`) VALUES
(2, 'p1_a1', 54, 81, '../../images/products/118/238/1454166061.jpeg', 'qwe', 238),
(3, 'p2_a1', 78, 90, '../../images/products/118/238/1454166083.jpeg', 'kjhf fdsjh', 238),
(4, 'p1_a2', 65, 88, '../../images/products/118/239/1454166117.jpeg', 'awe werrr', 238),
(5, 'p1_b1', 65, 78, '../../images/products/119/242/1454166150.jpeg', 'oiuoi reto', 242);

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
  KEY `cascade_cID` (`cID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='subcategories names and which category it follows' AUTO_INCREMENT=246 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`scID`, `scName`, `cID`) VALUES
(238, 'a1', 118),
(239, 'a2', 118),
(240, 'a3', 118),
(242, 'b1', 119),
(243, 'b2', 119),
(244, 'b3', 119),
(245, 'b4', 119);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerInterests`
--
ALTER TABLE `customerInterests`
  ADD CONSTRAINT `cascade_uID_custInter` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerInterests_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`);

--
-- Constraints for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD CONSTRAINT `cascade_oID_orderItems` FOREIGN KEY (`oID`) REFERENCES `orders` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cascade_pID_orderItems` FOREIGN KEY (`pID`) REFERENCES `products` (`pID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderItems_ibfk_1` FOREIGN KEY (`oID`) REFERENCES `orders` (`oID`),
  ADD CONSTRAINT `orderItems_ibfk_2` FOREIGN KEY (`pID`) REFERENCES `products` (`pID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cascade_uID_orders` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uID`) REFERENCES `customers` (`uID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cascade_scID_prod` FOREIGN KEY (`scID`) REFERENCES `subcategories` (`scID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`scID`) REFERENCES `subcategories` (`scID`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `cascade_cID` FOREIGN KEY (`cID`) REFERENCES `categories` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`cID`) REFERENCES `categories` (`cID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
