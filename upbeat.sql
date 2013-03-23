-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2013 at 08:50 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upbeat`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1025 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `fname`, `lname`, `username`, `password`, `type`) VALUES
(1020, 'Gilmar', 'San Buenaventura', 'gsanbuena', 'sanbuena', 'administrator'),
(1021, 'Sheleen', 'San Antonio', 'ssanantonio', 'sanantonio', 'administrator'),
(1022, 'Joshua', 'Dino', 'jdino', 'dino', 'administrator'),
(1023, 'Pearl Angela', 'Domingo', 'padomingo', 'domingo', 'administrator'),
(1024, 'Ivan Lyndon', 'Matabang', 'ilmatabang', 'matabang', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` decimal(11,0) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100017 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `email`, `address`, `contact`, `password`, `type`) VALUES
(100009, 'Joar', 'Morada', 'jmorada', 'jmorada@gmail.com', 'Camarines Sur', '9063275779', 'morada', 'customer'),
(100010, 'Johanna', 'Malang', 'jmalang', 'jmalang@gmail.com', 'Naga', '9354265789', 'malang', 'customer'),
(100011, 'Rinno Adam', 'Mendoza', 'ramendoza', 'ramendoza@gmail.com', 'Nueva Ecija', '9061809999', 'mendoza', 'customer'),
(100012, 'Leona Me', 'Jolloso', 'lmjolloso', 'lmjolloso@gmail.com', 'Sorsogon', '9352504208', 'jolloso', 'customer'),
(100013, 'Erika', 'Kimhoko', 'ekimhoko', 'ekimhoko@gmail.com', 'Laguna', '9058465816', 'kimhoko', 'customer'),
(100015, 'Mae Esther', 'Maralit', 'memaralit', 'memaralit@gmail.com', 'Camarines Sur', '9267441525', 'maralit', 'customer'),
(100016, 'Joanne', 'Lee', 'jlee', 'jlee@gmail.com', 'Camarines Norte', '9275194486', 'lee', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `delivers`
--

CREATE TABLE IF NOT EXISTS `delivers` (
  `order_id` int(6) NOT NULL,
  `date_delivered` date NOT NULL,
  `time_delivered` time NOT NULL,
  PRIMARY KEY (`order_id`,`date_delivered`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivers`
--

INSERT INTO `delivers` (`order_id`, `date_delivered`, `time_delivered`) VALUES
(500048, '2013-03-23', '15:34:22'),
(500050, '2013-03-23', '15:37:36'),
(500051, '2013-03-23', '15:37:38'),
(500052, '2013-03-23', '15:37:39'),
(500053, '2013-03-23', '15:37:40'),
(500058, '2013-03-23', '16:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE IF NOT EXISTS `orderr` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `prod_id` int(5) NOT NULL,
  `custom_id` int(6) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `is_delivered` text NOT NULL,
  `date_ordered` date NOT NULL,
  `time_ordered` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500059 ;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `prod_id`, `custom_id`, `quantity`, `price`, `is_delivered`, `date_ordered`, `time_ordered`) VALUES
(500048, 10099, 100008, 5, 650, 'YES', '2013-03-23', '15:31:44'),
(500050, 10099, 100008, 7, 910, 'YES', '2013-03-23', '15:34:44'),
(500051, 10101, 100008, 4, 2080, 'YES', '2013-03-23', '15:34:50'),
(500052, 10106, 100009, 4, 760, 'YES', '2013-03-23', '15:35:20'),
(500053, 10100, 100009, 3, 660, 'YES', '2013-03-23', '15:35:25'),
(500055, 10108, 100016, 5, 1250, 'NO', '2013-03-23', '15:47:11'),
(500056, 10100, 100016, 8, 1760, 'NO', '2013-03-23', '15:47:19'),
(500057, 10110, 100009, 5, 10000, 'NO', '2013-03-23', '15:47:43'),
(500058, 10111, 100010, 20, 30000, 'YES', '2013-03-23', '15:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `gender_type` enum('Male','Female') NOT NULL,
  `shirt_type` enum('Jacket','T-Shirt') NOT NULL,
  `available` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10114 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `image`, `description`, `gender_type`, `shirt_type`, `available`) VALUES
(10099, 'Product 1', '2f0344ffb19264b8a27c08fdeef8a1a5.jpg', 'This is product 1.', 'Male', 'T-Shirt', 'YES'),
(10100, 'Product 2', 'a1f9871615a0727889dd7ccab4a8c2c7.jpg', 'This is product 2.', 'Male', 'Jacket', 'YES'),
(10101, 'Product 3', 'dad92d51a86829cd58dbe9c93d3d36d9.jpg', 'This is product 3.', 'Male', 'T-Shirt', 'YES'),
(10102, 'Product 4', '6640538a4148724551ca1fceb4fa09bd.jpg', 'This is product 4.', 'Male', 'T-Shirt', 'YES'),
(10103, 'Product 5', '0cc36eb273dfd647fe4147a8eb52ec74.jpg', 'This is product 5.', 'Male', 'T-Shirt', 'YES'),
(10104, 'Product 6', '319063819c4d996d7dd4af51110ab5f8.jpg', 'This is product 6.', 'Male', 'T-Shirt', 'YES'),
(10105, 'Product 7', 'ec632ddefd7d3fbe3efb5c59b80f51c5.jpg', 'This is product 7.', 'Female', 'T-Shirt', 'YES'),
(10106, 'Product 8', '521b6f5b03c4f10dc421c60aedc7d2e1.jpg', 'This is product 8.', 'Female', 'T-Shirt', 'YES'),
(10107, 'Product 9', '6cea7e9642bf5a4cb891dcb371356cdc.jpg', 'This is product 9.', 'Female', 'T-Shirt', 'YES'),
(10108, 'Product 10', 'f0620922fb24e2f7498e1c7f6a991cb0.jpg', 'This is product 10.', 'Female', 'T-Shirt', 'YES'),
(10109, 'Product 11', '3aab435dfa6c1032ba5994754a75e724.jpg', 'This is product 11.', 'Female', 'T-Shirt', 'YES'),
(10110, 'Jacket 1', '993aaf492e8fe0e66589d34e3a0ecbea.jpg', 'This is jacket 1.', 'Male', 'Jacket', 'YES'),
(10111, 'Jacket 2', 'f929899163520fabeefaac0016fbf29c.jpg', 'This is jacket 2.', 'Female', 'T-Shirt', 'YES'),
(10112, 'Jacket 3', '4eb1d7cfb264360fb6a0148268cbdea5.jpg', 'This is jacket 3.', 'Male', 'T-Shirt', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `product_key`
--

CREATE TABLE IF NOT EXISTS `product_key` (
  `prod_id` int(5) NOT NULL,
  `prod_key` varchar(50) NOT NULL,
  PRIMARY KEY (`prod_id`,`prod_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_key`
--

INSERT INTO `product_key` (`prod_id`, `prod_key`) VALUES
(10099, 'male'),
(10099, 'product1'),
(10099, 'shirt'),
(10100, 'jacket'),
(10100, 'male'),
(10100, 'product2'),
(10101, 'male'),
(10101, 'product3'),
(10101, 'shirt'),
(10102, 'male'),
(10102, 'product4'),
(10102, 'shirt'),
(10103, 'male'),
(10103, 'product5'),
(10103, 'shirt'),
(10104, 'male'),
(10104, 'product6'),
(10104, 'shirt'),
(10105, 'female'),
(10105, 'product7'),
(10105, 'shirt'),
(10106, 'female'),
(10106, 'product8'),
(10106, 'shirt'),
(10107, 'female'),
(10107, 'product9'),
(10107, 'shirt'),
(10108, 'female'),
(10108, 'product10'),
(10108, 'shirt'),
(10109, 'female'),
(10109, 'product11'),
(10109, 'shirt'),
(10110, 'jacket'),
(10110, 'jacket1'),
(10110, 'male'),
(10111, 'female'),
(10111, 'jacket'),
(10111, 'jacket1'),
(10112, 'jacket'),
(10112, 'jacket3'),
(10112, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `prod_id` int(5) NOT NULL,
  `prod_size` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`prod_id`,`prod_size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`prod_id`, `prod_size`, `price`) VALUES
(10099, 'l', 130),
(10099, 'm', 120),
(10099, 's', 110),
(10099, 'xl', 140),
(10099, 'xs', 100),
(10100, 'l', 220),
(10100, 'm', 210),
(10100, 's', 200),
(10100, 'xl', 230),
(10101, 'l', 520),
(10101, 'm', 510),
(10101, 's', 500),
(10102, 'm', 90),
(10102, 's', 80),
(10102, 'xs', 70),
(10103, 'm', 460),
(10103, 's', 440),
(10103, 'xs', 420),
(10103, 'xxs', 400),
(10104, 'l', 700),
(10105, 'l', 460),
(10105, 'm', 450),
(10105, 'xl', 470),
(10106, 'l', 200),
(10106, 'm', 190),
(10106, 's', 180),
(10106, 'xs', 170),
(10107, 'l', 400),
(10107, 'm', 300),
(10107, 's', 200),
(10107, 'xl', 500),
(10107, 'xs', 100),
(10108, 'l', 500),
(10108, 's', 250),
(10109, 'm', 150),
(10109, 'xxl', 200),
(10109, 'xxs', 100),
(10110, 'm', 2000),
(10111, 'l', 1500),
(10112, 'l', 2100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
