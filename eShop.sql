-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 11:39 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores names of different categories' AUTO_INCREMENT=126 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cID`, `cName`) VALUES
(125, 'BACK TO SCHOOL'),
(124, 'BEDDING and SAFETY'),
(122, 'FEEDING'),
(123, 'TOYS and GAMES');

-- --------------------------------------------------------

--
-- Table structure for table `customerInterests`
--

CREATE TABLE IF NOT EXISTS `customerInterests` (
  `uID` int(11) unsigned NOT NULL,
  `interests` varchar(20) NOT NULL,
  KEY `cascade_uID_custInter` (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='categories that customer is interested in';

--
-- Dumping data for table `customerInterests`
--

INSERT INTO `customerInterests` (`uID`, `interests`) VALUES
(3, 'toys');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `uID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uName` varchar(30) NOT NULL,
  `DoB` date DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `job` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `cridetLimit` float NOT NULL,
  PRIMARY KEY (`uID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores customers data' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uID`, `uName`, `DoB`, `password`, `job`, `email`, `address`, `cridetLimit`) VALUES
(1, 'salma', '1993-09-13', 'f6852b2a3ac0cd7e69c801f69eddb57a', 'student', 'salma@email.com', 'mansoura', 4073),
(3, 'sara', '2016-02-01', '5bd537fc3789b5482e4936968f0fde95', 'CEO', 'sara@email.com', 'alex', 2255);

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
(37, 11, 1),
(37, 9, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
(30, '2016-02-01', 1),
(31, '2016-02-01', 1),
(32, '2016-02-01', 1),
(33, '2016-02-01', 1),
(34, '2016-02-01', 1),
(35, '2016-02-01', 1),
(36, '2016-02-01', 3),
(37, '2016-02-02', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pPrice` float NOT NULL,
  `pQuantity` int(11) NOT NULL,
  `pImg` varchar(50) NOT NULL,
  `pDesc` varchar(300) NOT NULL,
  `scID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pID`),
  UNIQUE KEY `pName` (`pName`),
  KEY `cascade_scID_prod` (`scID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='products info and categories' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pID`, `pName`, `pPrice`, `pQuantity`, `pImg`, `pDesc`, `scID`) VALUES
(8, 'p1', 600, 35, '../../images/products/122/255/1454359877.jpeg', 'wqeqe wqrwqr etret reyty werewr qweq\r\neqqr werwe etwt qwe', 255),
(9, 'p2', 90, 22, '../../images/products/123/260/1454360070.jpeg', 'wuytre wjegjbhsdf kjdhsfjdsf\r\nsdfkjhfd', 260),
(10, 'p3', 46, 21, '../../images/products/123/260/1454360182.jpeg', 'lkmf dskfjhf dfskhsdf', 260),
(11, 'p4', 500, 31, '../../images/products/124/250/1454360229.jpeg', 'kfsldfj dsfuhsfd werasfaff kuhasjh', 250);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `scID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `scName` varchar(50) NOT NULL,
  `cID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`scID`),
  UNIQUE KEY `scName` (`scName`),
  KEY `cascade_cID` (`cID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='subcategories names and which category it follows' AUTO_INCREMENT=261 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`scID`, `scName`, `cID`) VALUES
(247, 'Trolley Bags', 125),
(248, 'Backpack Bags', 125),
(249, 'Pencil Cases', 125),
(250, 'Bidding and Cribs', 124),
(251, 'Decor and Accessorie', 124),
(252, 'Safety and Monitors', 124),
(253, 'Baby and Toddler Food', 122),
(254, 'Food Storage, Bottles & Teethers', 122),
(255, 'High Chairs & Feeding Seats', 122),
(256, 'Action & Toy Figures', 123),
(257, 'Cars & RC Toys', 123),
(258, 'Baby & Infant Toys', 123),
(259, 'Dolls & Plush', 123),
(260, 'Puzzles', 123);

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
