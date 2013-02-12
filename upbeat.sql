-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2013 at 03:43 PM
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
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `email`, `address`, `contact`, `password`, `type`) VALUES
(3, '4ttv4', 'tv4t4vv', '544tv', 'vtvt4v4t', ' ee', 12233, 'vt4vtt4v4', 'customer'),
(5, 'Pearl', '', 'ecrc', 'rvvtr', 'tbrtbt', 599, ' vtvt', 'customer'),
(1234444, 'Angelo', 'Dela Cruz', 'angelo<3', 'fcff', 'sdddd', 1223, 'crcrtftgtg', 'customer'),
(43634736, '34f34g34gv34gv3', 'rgv3wv3w4gvw34', 'g3wergvewrgvwerfv', 'fbf', 'gnbrgb fg', 23524367, 'btbstrbsrtnrdrt', 'customer'),
(2147483647, 'geg5hth', 'thbthrtnbtr', 'nbrtnytnyr', 'rtbrtbrtb', 'serbsetvbrt', 13, 'tbrtbtrb', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `prod_id` int(5) NOT NULL,
  `custom_id` int(5) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_delivered` date NOT NULL,
  KEY `prod_id` (`prod_id`,`custom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(5) NOT NULL,
  `code` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `desciption` text NOT NULL,
  `gender_type` enum('Male','Female') NOT NULL,
  `shirt_type` enum('Jacket','T-Shirt') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `image`, `price`, `desciption`, `gender_type`, `shirt_type`) VALUES
(1, 'xy12', 'aaaa', 100, 'hahahah', 'Male', 'T-Shirt'),
(2, 'xy12 de', 'aaaa', 200, 'hahahah haha', 'Female', 'Jacket'),
(3, 'yo xy12', 'aaaa', 300, 'haha hehe', 'Male', 'Jacket'),
(4, 'xyvrvcr12', 'aaaa', 100, 'hehe hahahah', 'Female', 'Jacket'),
(5, 'xyervfc12', 'aaaa', 300, 'haha hehe', 'Male', 'T-Shirt'),
(6, 'xywefdcc2', 'aaaa', 100, 'hehe', 'Female', 'T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE IF NOT EXISTS `product_color` (
  `prod_id` int(5) NOT NULL,
  `prod_color` varchar(20) NOT NULL,
  PRIMARY KEY (`prod_id`,`prod_color`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`prod_id`, `prod_color`) VALUES
(1, 'black'),
(1, 'green'),
(1, 'red'),
(1, 'yellow'),
(2, 'blue'),
(2, 'white'),
(2, 'yellow'),
(3, 'black'),
(3, 'white'),
(4, 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `prod_id` int(5) NOT NULL,
  `prod_size` varchar(10) NOT NULL,
  PRIMARY KEY (`prod_id`,`prod_size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
