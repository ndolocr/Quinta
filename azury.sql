-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2019 at 10:01 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azury`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userId`, `updatedOn`, `createdOn`) VALUES
(1, 1, '2019-06-04 06:18:46', '2019-02-28 07:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `unitPrice` float NOT NULL,
  `transactionDate` date NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(50) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `description`, `image`, `updated_on`, `created_on`) VALUES
(1, 'Jackets', 'Azury Traders have your ideal choice of winter clothing, the leather Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563095137.jpg', '2019-07-14 09:06:00', '2019-07-14 09:05:37'),
(2, 'Travel Bags', 'Comfort and class are very vital for modern travelers. Azury Traders are your Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563095282.jpg', '2019-07-14 09:08:32', '2019-07-14 09:08:02'),
(3, 'T-Shirt', 'When the sun comes up, we all know it is summer time, and what better than to dress in a great light t-shirt to grace the season. Azury Traders, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563095409.jpg', '2019-07-14 09:10:09', '2019-07-14 09:10:09'),
(4, 'Shoes', 'No matter what the occasions, weather or class, Azury traders take every consideration to dress you to the occasions. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '1563095485.jpg', '2019-07-14 09:11:25', '2019-07-14 09:11:25'),
(5, 'Washing Soap', 'Soap manufactures have partnered with Azury traders to provide the best powder soap products at the best price possible. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '1563095565.jpg', '2019-07-14 09:13:33', '2019-07-14 09:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `checkOutId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT '1000',
  `totalCost` float NOT NULL,
  `paymentMode` varchar(25) NOT NULL,
  `code` varchar(50) NOT NULL,
  `transactionDate` date DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`checkOutId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkOutId`, `customerId`, `cartId`, `productId`, `quantity`, `unitPrice`, `totalCost`, `paymentMode`, `code`, `transactionDate`, `updated_on`, `created_on`) VALUES
(26, 1, 4, 2, 1, 1000, 3000, 'AIRTEL', 'KJGGHSS', '2019-06-29', '2019-06-29 11:23:59', '2019-06-29 11:23:59'),
(27, 1, 4, 1, 1, 1000, 1500, 'MPESA', 'KKJHGYY', '2019-06-29', '2019-06-29 11:25:51', '2019-06-29 11:25:51'),
(28, 1, 4, 1, 1, 1000, 1500, 'MPESA', 'HHTTFF', '2019-06-29', '2019-06-29 11:28:50', '2019-06-29 11:28:50'),
(29, 1, 5, 1, 1, 1000, 1500, 'MPESA', 'JKHHTGA', '2019-06-29', '2019-06-29 11:30:45', '2019-06-29 11:30:45'),
(30, 1, 4, 2, 1, 1000, 3000, 'MPESA', 'JKHHTGA', '2019-06-29', '2019-06-29 11:30:45', '2019-06-29 11:30:45'),
(31, 1, 5, 2, 1, 1000, 3000, 'AIRTEL', 'KJYYHGLO', '2019-06-29', '2019-06-29 11:32:05', '2019-06-29 11:32:05'),
(32, 1, 4, 1, 1, 1000, 1500, 'AIRTEL', 'KJYYHGLO', '2019-06-29', '2019-06-29 11:32:05', '2019-06-29 11:32:05'),
(33, 1, 5, 2, 1, 1000, 3000, 'AIRTEL', 'MMNHGFF', '2019-06-29', '2019-06-29 11:32:58', '2019-06-29 11:32:58'),
(34, 1, 4, 1, 1, 1000, 1500, 'AIRTEL', 'MMNHGFF', '2019-06-29', '2019-06-29 11:32:58', '2019-06-29 11:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `productDescription` text,
  `image` varchar(50) DEFAULT NULL,
  `buyingPrice` double DEFAULT NULL,
  `sellingPrice` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `stockAvailable` int(11) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `categoryId`, `productName`, `brand`, `size`, `color`, `productDescription`, `image`, `buyingPrice`, `sellingPrice`, `discount`, `stockAvailable`, `updated_on`, `created_on`) VALUES
(1, 5, 'Sunlight Bar Soap', 'Sunlight', '175g', 'Yelow', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '1563095661.jpg', 45, 60, 5, 4500, '2019-07-14 09:58:18', '2019-07-14 09:14:21'),
(2, 5, 'Skin White', 'Skin WHite', '90g', 'Pink', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '1563095759.jpg', 120, 200, 20, 5400, '2019-07-14 09:58:31', '2019-07-14 09:15:59'),
(3, 5, 'Fa Bathing Sopa', 'Fa', '50g', 'Bue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563095801.jpg', 80, 140, 30, 1200, '2019-07-14 09:58:42', '2019-07-14 09:16:41'),
(4, 5, 'Ushindi', 'Ushindi', '175g', 'Green', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563095934.jpeg', 40, 80, 20, 1800, '2019-07-14 09:58:56', '2019-07-14 09:18:54'),
(5, 5, 'Persil Bio', 'Persil', '2 Kg', 'White', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096001.jpg', 350, 450, 50, 5400, '2019-07-14 09:59:11', '2019-07-14 09:20:01'),
(6, 5, 'Persil Machine Wash', 'Persil', '2 Kg', 'White', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096040.jpg', 500, 800, 150, 4500, '2019-07-14 09:59:23', '2019-07-14 09:20:40'),
(7, 5, 'OMO', 'OMO', '2 Kg', 'Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096126.jpg', 230, 450, 30, 2300, '2019-07-14 09:59:35', '2019-07-14 09:22:06'),
(8, 5, 'Sunlight Powder Soap', 'Sunlight', '2 Kg', 'White', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096227.jpg', 200, 350, 50, 5300, '2019-07-14 09:59:46', '2019-07-14 09:23:47'),
(9, 4, 'Adidas Sports Shoes', 'Adidas', '8', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096329.jpg', 2300, 3500, 450, 8500, '2019-07-14 09:57:21', '2019-07-14 09:25:29'),
(10, 4, 'Pharell WIlliams', 'Adidas', '6', 'Red', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096379.jpeg', 1500, 2300, 200, 5400, '2019-07-14 09:57:33', '2019-07-14 09:26:19'),
(11, 4, 'Clark Shoes', 'Bata', '10', 'Brown', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096438.jpg', 1200, 3600, 350, 3400, '2019-07-14 09:57:43', '2019-07-14 09:27:18'),
(12, 4, 'Ladies Boots', 'Crothces', '9', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096499.jpg', 3200, 5400, 500, 3400, '2019-07-14 09:57:54', '2019-07-14 09:28:19'),
(13, 4, 'Cobra Open Shoes', 'CAT', '5', 'Brown', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096553.jpg', 1400, 2900, 200, 5000, '2019-07-14 09:58:06', '2019-07-14 09:29:13'),
(14, 3, 'Fermons', 'Les Abattoirs', 'Medium', 'Red', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096635.jpg', 800, 2500, 300, 1500, '2019-07-14 09:56:18', '2019-07-14 09:30:35'),
(15, 3, 'Salah Top', 'LFC', 'Large', 'Grey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096684.jpg', 2300, 3200, 300, 2400, '2019-07-14 09:56:32', '2019-07-14 09:31:24'),
(16, 3, 'Broken Designer Shirt', 'Cow Chop', 'Small', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096743.png', 500, 1050, 300, 1900, '2019-07-14 09:56:43', '2019-07-14 09:32:23'),
(17, 3, 'Vector Lab T-shirt', 'Mockup', 'Large', 'White', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096795.jpg', 800, 2500, 200, 2200, '2019-07-14 09:56:57', '2019-07-14 09:33:15'),
(18, 3, 'Robert Barathion', 'Geissin', 'Medium', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096849.jpg', 200, 800, 150, 3400, '2019-07-14 09:57:07', '2019-07-14 09:34:09'),
(19, 1, 'Women Slim Fit', 'Aventures', 'Medium', 'Navy Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096930.jpg', 2000, 3500, 300, 2000, '2019-07-14 09:53:52', '2019-07-14 09:35:30'),
(20, 1, 'Rose Rain Coat', 'Rose', 'Medium', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563096997.jpg', 2500, 5500, 1200, 4000, '2019-07-14 09:54:22', '2019-07-14 09:36:37'),
(21, 1, 'Adventure Rain Coat', 'Aventure', 'Medium', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097051.jpg', 3300, 4900, 100, 3000, '2019-07-14 09:54:33', '2019-07-14 09:37:31'),
(22, 1, 'Camo Army Jacket', 'HK Army ', 'Large', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097111.jpg', 2000, 4500, 1200, 5000, '2019-07-14 09:54:48', '2019-07-14 09:38:31'),
(23, 1, 'Paddle Biker', 'Bikers Gear', 'Medium', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097159.jpg', 2000, 4350, 1150, 4000, '2019-07-14 09:55:08', '2019-07-14 09:39:19'),
(24, 2, 'All Weather Travel Bag', 'Campers', 'Large', 'Grey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097234.jpg', 1500, 4800, 1200, 1800, '2019-07-14 09:55:21', '2019-07-14 09:40:34'),
(25, 2, 'School Bag', 'Back To Shool', 'Small', 'Grey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097286.jpg', 550, 1800, 150, 2500, '2019-07-14 09:55:32', '2019-07-14 09:41:26'),
(26, 2, 'Campers Bag Pack', 'Kings Collections', 'Large', 'Grey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ', '1563097481.jpg', 2300, 4590, 410, 1800, '2019-07-14 09:55:42', '2019-07-14 09:42:10'),
(27, 2, 'Walker Camping Bag', 'Walker', 'Large', 'Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097386.jpg', 3200, 6500, 1500, 2300, '2019-07-14 09:55:53', '2019-07-14 09:43:06'),
(28, 2, 'Mission 65 Rollmart', 'Endurance', 'Large', 'Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1563097436.jpg', 2300, 8500, 500, 8000, '2019-07-14 09:56:05', '2019-07-14 09:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `slideShowId` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `publish` varchar(10) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slideShowId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideShowId`, `image`, `publish`, `updated_on`, `created_on`) VALUES
(1, '1561797019.jpg', 'Yes', '2019-06-29 08:30:19', '2019-06-29 08:30:19'),
(2, '1563094929.jpg', 'Yes', '2019-07-14 09:02:09', '2019-07-14 09:02:09'),
(3, '1563094950.jpg', 'Yes', '2019-07-14 09:02:30', '2019-07-14 09:02:30'),
(4, '1563094967.jpg', 'Yes', '2019-07-14 09:02:47', '2019-07-14 09:02:47'),
(5, '1563094985.jpg', 'Yes', '2019-07-14 09:03:05', '2019-07-14 09:03:05'),
(6, '1563095002.jpg', 'Yes', '2019-07-14 09:03:22', '2019-07-14 09:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `middleName` varchar(30) DEFAULT NULL,
  `profilePic` varchar(30) DEFAULT NULL,
  `address` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_add` varchar(3) NOT NULL DEFAULT 'No',
  `admin_edit` varchar(3) NOT NULL DEFAULT 'No',
  `admin_view_all` varchar(3) NOT NULL DEFAULT 'No',
  `admin_view_single` varchar(3) NOT NULL DEFAULT 'No',
  `category_add` varchar(3) NOT NULL DEFAULT 'No',
  `category_edit` varchar(3) NOT NULL DEFAULT 'No',
  `category_view_all` varchar(3) NOT NULL DEFAULT 'No',
  `category_view_single` varchar(3) NOT NULL DEFAULT 'No',
  `product_add` varchar(3) NOT NULL DEFAULT 'No',
  `product_edit` varchar(3) NOT NULL DEFAULT 'No',
  `product_view_all` varchar(3) NOT NULL DEFAULT 'No',
  `product_view_single` varchar(3) NOT NULL DEFAULT 'No',
  `slideshow_add` varchar(3) NOT NULL DEFAULT 'No',
  `slideshow_edit` varchar(3) NOT NULL DEFAULT 'No',
  `slideshow_view_all` varchar(3) NOT NULL DEFAULT 'No',
  `slideshow_view_single` varchar(3) NOT NULL DEFAULT 'No',
  `stock_add` varchar(3) NOT NULL DEFAULT 'No',
  `customer_view_all` varchar(3) NOT NULL DEFAULT 'No',
  `customer_view_single` varchar(3) NOT NULL DEFAULT 'No',
  `admin_delete` varchar(3) NOT NULL DEFAULT 'No',
  `category_delete` varchar(3) NOT NULL DEFAULT 'No',
  `product_delete` varchar(3) NOT NULL DEFAULT 'No',
  `slideshow_delete` varchar(3) NOT NULL DEFAULT 'No',
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `middleName`, `profilePic`, `address`, `city`, `country`, `telephone`, `emailAddress`, `password`, `admin_add`, `admin_edit`, `admin_view_all`, `admin_view_single`, `category_add`, `category_edit`, `category_view_all`, `category_view_single`, `product_add`, `product_edit`, `product_view_all`, `product_view_single`, `slideshow_add`, `slideshow_edit`, `slideshow_view_all`, `slideshow_view_single`, `stock_add`, `customer_view_all`, `customer_view_single`, `admin_delete`, `category_delete`, `product_delete`, `slideshow_delete`, `updatedOn`, `createdOn`) VALUES
(1, 'Quintor', 'Ojino', 'Mary', NULL, 26635, 'Nairobi', 'Kenya', 723221166, 'quintor@gmail.com', 'myd1dtShBQyJs', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2019-07-14 08:29:44', '2019-03-10 06:58:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
