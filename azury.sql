-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2019 at 05:42 AM
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
(0, 1, '2019-02-28 07:00:52', '2019-02-28 07:00:52'),
(1, 2, '2019-03-10 06:58:35', '2019-03-10 06:58:35');

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
(1, 'Shoes', ' Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!  Great sports shoes for daily work out and weekend hangouts!   ', NULL, '2019-03-23 12:42:26', '2019-03-14 13:25:42'),
(2, 'Clothes', 'All types of dresses available to everyone, from young princesses to beautiful queens and queen mothers.   ', NULL, '2019-03-23 14:09:47', '2019-03-14 14:07:28');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `userId`, `updatedOn`, `createdOn`) VALUES
(1, 3, '2019-03-10 08:13:22', '2019-03-10 08:13:22');

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
(1, 1, 'Unisex Phantom Addidas, worn by any gender. ', 'Addidas', '45', 'Black', 'Very good comfortable shoe for indoor training.            ', '1553341751.jpg', 2000, 4500, 400, 3, '2019-03-26 12:48:10', '2019-03-12 04:45:20'),
(2, 1, 'Red Snapper', 'Addidas', 'Medium', 'Red', 'High quality comfortable shoes for indoor and outdoor use. ', '1553341826.jpeg', 3000, 6000, 4500, NULL, '2019-03-23 14:44:56', '2019-03-12 04:49:11'),
(3, 1, 'Croissan Italy leather shoe', 'Bata', '8', 'Brown', 'The latest introduction in the Rome official shoes series. ', '1553347973.jpg', NULL, NULL, 0, NULL, '2019-03-23 13:32:53', '2019-03-23 13:30:37'),
(4, 1, 'Thailand Open Shoes', 'Thaishoe', '7', 'Brown', 'Brilliant and comfy open shoes.', '1553348322.jpg', NULL, NULL, 0, NULL, '2019-03-23 13:38:42', '2019-03-23 13:38:42'),
(5, 1, 'Black winter boots', 'NYC', '12', 'Black', 'Classy boots that keep the cold off your feet.', '1553348519.jpg', NULL, NULL, 0, NULL, '2019-03-23 13:41:59', '2019-03-23 13:41:59'),
(6, 2, 'Red Casual T Shirt', '', 'Medium', 'Red', 'Beautiful fitting.', '1553350429.jpg', NULL, NULL, 0, NULL, '2019-03-23 14:13:49', '2019-03-23 14:13:49'),
(7, 2, 'Liverpool graphics T Shirt', 'Luis', 'Small', 'White', 'Beautiful T Shirt for all the Liverpool lovers worldwide.', '1553350653.jpg', NULL, NULL, 0, NULL, '2019-03-23 14:17:33', '2019-03-23 14:17:33');

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
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`slideShowId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideShowId`, `image`, `publish`, `updated_on`, `created_on`) VALUES
(1, '1556821667.jpg', 'Yes', '2019-03-26 14:18:22', '0000-00-00 00:00:00'),
(2, '1556821715.jpg', 'Yes', '2019-03-26 14:20:06', '0000-00-00 00:00:00'),
(3, '1556822052.jpg', 'Yes', '2019-03-26 14:20:23', '0000-00-00 00:00:00'),
(4, '1556822070.jpg', 'Yes', '2019-03-26 14:20:42', '0000-00-00 00:00:00'),
(5, '1556822087.jpg', 'Yes', '2019-03-26 14:20:54', '0000-00-00 00:00:00'),
(6, '1556822223.jpg', 'Yes', '2019-03-26 14:21:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subCategoryId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subCategoryName` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `middleName`, `profilePic`, `address`, `city`, `country`, `telephone`, `emailAddress`, `password`, `updatedOn`, `createdOn`) VALUES
(1, 'Charles', 'Raphael', 'Ndolo', '', 88888, 'Nairobi', 'Kenya', 712345678, 'crndolo@gmail.com', 'myd1dtShBQyJs', '2019-03-10 06:37:47', '2019-02-28 07:00:52'),
(2, 'Quinta', 'Ojino', '', NULL, 26635, 'Nairobi', 'Kenya', 723221166, 'quinta@gmail.com', 'myd1dtShBQyJs', '2019-03-24 19:47:02', '2019-03-10 06:58:35'),
(3, 'Alice', 'Muthoki', 'Raphael', NULL, 786684, 'Mombasa', 'Kenya', 712345678, 'alice@gmail.com', 'myd1dtShBQyJs', '2019-03-10 08:13:05', '2019-03-10 08:13:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
