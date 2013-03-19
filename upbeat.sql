-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2013 at 11:39 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1018 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `fname`, `lname`, `username`, `password`, `type`) VALUES
(1003, 'macgilmar', 'san', 'macsan', 'buenas', 'administrator'),
(1004, 'Shen', 'San Antonio', 'shelaine', 'bitch', 'administrator'),
(1005, 'ako', 'klklk', 'ako', 'ako', 'administrator'),
(1010, 'pearl', 'pearl', 'pearl', 'pearl', 'administrator'),
(1012, 'dfghjk', 'fghjk', 'pearl', 'p', 'administrator'),
(1013, 'aaa', 'aaaa', 'aaaa', 'aaaa', 'administrator'),
(1014, 'aaaa', 'aaaa', 'aaaaa', 'aa', 'administrator'),
(1015, 'aaaaaa', 'aaaaaaaaaa', 'aaaaaaaaa', 'aaaa', 'administrator'),
(1016, 'Joshua', 'Dino', 'josh', 'j', 'administrator'),
(1017, 'Pearl', 'Domingo', 'pearlita', 'jejeje', 'administrator');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100010 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `email`, `address`, `contact`, `password`, `type`) VALUES
(3, 'mac', 'mac', 'mac', 'mac@gmail.com', 'mac', '9053392810', 'mac', 'customer'),
(4, 'rgerger', 'gergre', 'rgerg', 'a@a.a', 'vrvrv', '2147483647', '', 'customer'),
(3456, 'shen', 'shen', 'shen', 'shen@gmail.com', 'LB', '9053392810', 's', 'customer'),
(100000, 'lyndon', 'lyndon', 'lyndon', 'a@a.a', 'lyndon', '1234567891', 'gwapo', 'customer'),
(100001, 'what', 'ever', 'whatever', 'ivan@yah.c', 'hcvboi', '2147483647', 'haha', 'customer'),
(100002, 'tvtb', 'tbtbt', 'hth', 'cecr@a.a', 'btb5b', '2147483647', 'hehe', 'customer'),
(100006, 'a', 'a', 'a', 'a@gmail.com', 'a', '9053392899', 'a', 'customer');

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
(500001, '2012-03-05', '00:55:12'),
(500003, '2013-03-05', '00:55:11'),
(500008, '2012-03-05', '00:55:11'),
(500009, '2013-03-05', '00:55:10'),
(500012, '2013-03-19', '17:13:18'),
(500013, '2013-03-06', '10:20:42'),
(500014, '2013-03-20', '07:18:22'),
(500015, '2013-03-20', '07:18:24'),
(500017, '2013-03-05', '19:43:48'),
(500019, '2013-03-19', '01:57:15'),
(500020, '2013-03-20', '07:18:20'),
(500023, '2013-03-19', '01:42:52'),
(500024, '2013-03-19', '17:59:28'),
(500025, '2013-03-19', '01:42:49'),
(500026, '2013-03-19', '01:42:51'),
(500028, '2013-03-19', '01:42:49'),
(500029, '2013-03-19', '01:42:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500045 ;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `prod_id`, `custom_id`, `quantity`, `price`, `is_delivered`, `date_ordered`, `time_ordered`) VALUES
(500012, 10014, 1002, 4, 12, 'YES', '2013-03-05', '19:35:21'),
(500013, 10014, 1002, 4, 12, 'YES', '2013-03-05', '19:38:46'),
(500014, 10006, 100000, 5, 25, 'YES', '2013-03-05', '19:40:40'),
(500015, 10008, 100000, 6, 0, 'YES', '2013-03-05', '19:40:44'),
(500016, 10000, 100000, 3, 0, 'NO', '2013-03-05', '19:40:50'),
(500017, 10010, 100000, 4, 400, 'YES', '2013-03-05', '19:43:14'),
(500019, 10006, 100000, 23, 138, 'YES', '2013-03-06', '10:16:47'),
(500020, 10000, 100000, 4, 0, 'YES', '2013-03-06', '10:18:19'),
(500022, 10006, 100000, 4, 24, 'NO', '2013-03-06', '10:32:42'),
(500023, 10006, 2, 5, 25, 'YES', '2013-03-19', '00:33:14'),
(500024, 10008, 2, 6, 0, 'YES', '2013-03-19', '00:33:19'),
(500025, 10014, 2, 4, 12, 'YES', '2013-03-19', '00:33:23'),
(500026, 10092, 2, 4, 1412, 'YES', '2013-03-19', '00:37:09'),
(500027, 10092, 2, 1, 353, 'NO', '2013-03-19', '00:51:55'),
(500028, 10091, 2, 3, 10270605, 'YES', '2013-03-19', '00:52:23'),
(500029, 10094, 2, 5, 662175, 'YES', '2013-03-19', '00:58:24'),
(500030, 10006, 3456, 10, 0, 'NO', '2013-03-19', '18:14:22'),
(500031, 10014, 3456, 13, 0, 'NO', '2013-03-19', '18:14:31'),
(500032, 10009, 3456, 12, 0, 'NO', '2013-03-19', '18:16:08'),
(500033, 10006, 3456, 7, 0, 'NO', '2013-03-19', '18:16:15'),
(500034, 10011, 3456, 4, 0, 'NO', '2013-03-19', '18:16:33'),
(500035, 10090, 1002, 1, 0, 'NO', '2013-03-19', '21:25:40'),
(500036, 10006, 3, 10, 0, 'NO', '2013-03-20', '00:39:58'),
(500037, 10010, 3, 15, 0, 'NO', '2013-03-20', '00:44:29'),
(500038, 10090, 3, 16, 0, 'NO', '2013-03-20', '03:29:23'),
(500040, 10041, 3, 14, 0, 'NO', '2013-03-20', '03:32:44'),
(500041, 10005, 100009, 1, 0, 'NO', '2013-03-20', '07:11:38'),
(500042, 10005, 100009, 1, 0, 'NO', '2013-03-20', '07:11:42'),
(500044, 10075, 100009, 1, 0, 'NO', '2013-03-20', '07:11:49');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10096 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `image`, `description`, `gender_type`, `shirt_type`, `available`) VALUES
(10000, 'a', '0f6c0cd47578b6821eea49e01b558ff0.jpg', 'a', 'Female', 'Jacket', ''),
(10005, 'f', '900a9b126b0e2a97b2bd221301931738.jpg', 'a', 'Male', 'T-Shirt', ''),
(10009, 'haha', 'haha', 'haha', 'Male', 'Jacket', ''),
(10010, 'lala', 'lala', 'lala', 'Male', 'T-Shirt', ''),
(10011, 'lala', 'lala', 'lala', 'Male', 'T-Shirt', ''),
(10012, 'lala', 'lala', 'lala', 'Male', 'T-Shirt', ''),
(10013, 'lala', 'lala', 'lala', 'Male', 'T-Shirt', ''),
(10014, 'fefe', 'fefe', 'fefe', 'Female', 'T-Shirt', ''),
(10015, 'fefe', 'fefe', 'fefe', 'Female', 'T-Shirt', ''),
(10016, 'fefe', 'fefe', 'fefe', 'Female', 'T-Shirt', ''),
(10019, 'fefe', 'fefe', 'fefe', 'Female', 'T-Shirt', ''),
(10021, 'erv4rvr3', '', '', 'Female', 'T-Shirt', ''),
(10037, 'g34g3g', 'gtge', 'grgrf', 'Male', 'T-Shirt', ''),
(10038, 'ergerg', 'regr', 'tgerg', 'Male', 'T-Shirt', ''),
(10039, 'rg5tg', 'thtb', 'vreve', 'Female', 'T-Shirt', ''),
(10040, 'rg5tg', 'thtb', 'vreve', 'Female', 'T-Shirt', ''),
(10041, 'rg5tg', 'thtb', 'vreve', 'Female', 'T-Shirt', ''),
(10042, 'h5th', 'hth', 'thrtg', 'Male', 'T-Shirt', ''),
(10043, 'aghasah', 'dsdhgshd', 'shghsdghsadhasdhas', 'Male', 'T-Shirt', ''),
(10044, 'eff', 'f4f', 'fsdfsdfsdf', 'Female', 'T-Shirt', ''),
(10045, 'c4f', 'f5tv', 'vtvt', 'Male', 'T-Shirt', ''),
(10046, 'gt', 'rcrc', 'fdfsdfsdfsd', 'Female', 'T-Shirt', ''),
(10047, 'dfsdfsdfs', 'fsdfsdf', 'dfsdfsdfsd', 'Female', 'T-Shirt', ''),
(10048, 'dfdfsdfs', 'sdfsdfdasdc', 'cxbfdtyhfdbc', 'Female', 'T-Shirt', ''),
(10049, 'dfe77457', 'tesdfsdfsds', 'jkhjkfdc', 'Male', 'T-Shirt', ''),
(10050, 'sd34354', 'dgdfhfgj', '967ufgdfgdf', 'Male', 'T-Shirt', ''),
(10051, 'fdgdfgdf', '8763sdbvc', 'asxdfnm cghtyutg', 'Male', 'T-Shirt', ''),
(10052, 'hfghf gi78', 'dfgdfgdf jyuj', '786543dsvcbv', 'Female', 'T-Shirt', ''),
(10053, 'kjhgfd', 'ergtyj78', 'dsfghjk', 'Male', 'Jacket', ''),
(10054, '', '', '', '', 'T-Shirt', ''),
(10055, '', '', '', '', 'T-Shirt', ''),
(10056, '', '', '', '', 'T-Shirt', ''),
(10057, '', '', '', '', 'T-Shirt', ''),
(10058, '', '', '', '', 'T-Shirt', ''),
(10059, '', '', '', '', 'T-Shirt', ''),
(10060, '', '', '', '', 'T-Shirt', ''),
(10061, '', '', '', 'Male', 'T-Shirt', ''),
(10062, '', '', '', 'Male', 'T-Shirt', ''),
(10063, '', '', '', 'Female', 'T-Shirt', ''),
(10064, 'vtv', 'tvt', 'btbtb', 'Male', 'T-Shirt', ''),
(10065, 'rvt', 'vtv', 'tvt', 'Female', 'T-Shirt', ''),
(10066, '', '', '', 'Male', 'T-Shirt', ''),
(10067, '', '', '', 'Male', 'T-Shirt', ''),
(10068, '', '', '', 'Male', 'T-Shirt', ''),
(10069, '', '', '', 'Male', 'T-Shirt', ''),
(10070, 'weugui', 'uigbibj', 'bjbbiu', 'Male', '', ''),
(10071, 'd33', 'd3d', '3d3d', 'Male', 'T-Shirt', ''),
(10072, '3d3', '3d3', 'd3d3d', 'Male', 'T-Shirt', ''),
(10073, '3d3', '3d3', 'd3d3d', 'Male', 'T-Shirt', ''),
(10074, '3d3', '3d3', 'd3d3d', 'Male', 'T-Shirt', ''),
(10075, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10076, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10077, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10078, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10079, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10080, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10081, 'd3d4d', '4d4', 'd3d3dd44', 'Male', 'T-Shirt', ''),
(10082, 'th4thth', 'ff4', 'f44f', 'Male', 'T-Shirt', ''),
(10083, 'th4thth', 'ff4', 'f44f', 'Male', 'T-Shirt', ''),
(10084, 'th4thth', 'b9ae580e599f6d7065d6abdbcae6c245.png', 'f44f', 'Male', 'T-Shirt', ''),
(10085, 'th4thth', '0281c14a5715e4b48a8e4517590cd5ee.png', 'f44f', 'Male', 'T-Shirt', ''),
(10086, 'jyegwcwevr', 'ee871255181eb070a8e146b77f666c02.png', 'btrrtnbn', 'Male', 'T-Shirt', ''),
(10087, '4f4g', 'default.png', '5g45gg', 'Male', 'T-Shirt', ''),
(10088, '4f4g', 'default.png', '5g45gg', 'Male', 'T-Shirt', ''),
(10089, 'ecec', '078cbc0714afb19471640e2f1f46968d.png', 'c44r', 'Male', 'T-Shirt', ''),
(10090, 'ecec', '50d5c9455916bc202d6e580ed730543d.png', 'c44r', 'Male', 'T-Shirt', ''),
(10091, 'd34f4f4', '4bba982193adbc677b71e528b9f3824c.png', 'f444', 'Male', 'T-Shirt', ''),
(10092, 'alex', 'bfd48bebc2e6476034619c1ec9b797cf.png', 'yada', 'Female', 'T-Shirt', 'YES'),
(10093, 'egh5h', 'd81d35be6847fa36f18c77a582f64f6e.png', '53h5h5h5h', 'Male', 'T-Shirt', 'YES'),
(10094, 'moshi', 'c3a08d843658c3b6e173734444e06bea.png', 'moshi', 'Male', 'T-Shirt', 'YES'),
(10095, 'damit', 'd5017ae89a412abd21cc25139c3a9f21.jpg', 'maganda', 'Male', 'T-Shirt', 'YES');

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
(0, 'a'),
(0, 'b'),
(0, 'btrtbtb'),
(0, 'bttr'),
(0, 'c'),
(0, 'crcr'),
(0, 'd'),
(0, 'f4f4'),
(10000, 'd'),
(10005, 'cef3r'),
(10008, 'a'),
(10008, 'b'),
(10009, 'haha'),
(10010, 'a'),
(10010, 'b'),
(10010, 'c'),
(10010, 'd'),
(10011, 'a'),
(10011, 'b'),
(10011, 'c'),
(10011, 'd'),
(10012, 'a'),
(10012, 'b'),
(10012, 'c'),
(10012, 'd'),
(10013, 'a'),
(10013, 'b'),
(10013, 'c'),
(10013, 'd'),
(10014, 's'),
(10014, 'w'),
(10015, 's'),
(10015, 'w'),
(10016, 's'),
(10016, 'w'),
(10017, 's'),
(10017, 'w'),
(10018, 's'),
(10018, 'w'),
(10019, 's'),
(10019, 'w'),
(10020, 's'),
(10020, 'w'),
(10037, 'gt'),
(10038, 'ff'),
(10038, 'gbtgb'),
(10039, 'btb'),
(10039, 'gbgb'),
(10040, 'btb'),
(10040, 'gbgb'),
(10041, 'btb'),
(10041, 'gbgb'),
(10042, 'gtdv'),
(10042, 'rg'),
(10042, 'tgt'),
(10064, 'cecf'),
(10064, 'fv'),
(10065, 'xex'),
(10066, '66'),
(10067, 'vvvr'),
(10068, '-'),
(10070, 'gt'),
(10071, 'd3'),
(10072, 'd3d'),
(10073, 'd3d'),
(10074, 'd3d'),
(10075, 'drdrdr'),
(10076, 'drdrdr'),
(10077, 'drdrdr'),
(10078, 'drdrdr'),
(10079, 'drdrdr'),
(10080, 'drdrdr'),
(10081, 'drdrdr'),
(10082, 'f4f4'),
(10083, 'f4f4'),
(10091, '4f444'),
(10092, 'fgr'),
(10092, 'fgrgr'),
(10093, 'h5hw3'),
(10094, 'vrv'),
(10095, 'maganda'),
(10095, 'yellow');

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
(0, '4f4f', 244),
(0, 'btrttrb', 6567),
(0, 'crfc', 3435),
(0, 'g545g', 565),
(0, 'L', 0),
(0, 'S', 0),
(0, 'XS', 0),
(1, 'xl', 0),
(1, 'XS', 0),
(10000, 'S', 0),
(10001, 'l', 0),
(10001, 'xl', 0),
(10008, 'M', 0),
(10008, 'XS', 0),
(10008, 'XXL', 0),
(10009, 'large', 0),
(10009, 'medium', 0),
(10010, 's', 100),
(10014, 'x', 3),
(10014, 'y', 4),
(10014, 'z', 5),
(10018, 'x', 3),
(10018, 'y', 4),
(10018, 'z', 5),
(10020, 'x', 3),
(10020, 'y', 4),
(10020, 'z', 5),
(10037, 'grt', 545),
(10039, 'vrvr', 35),
(10040, 'vrvr', 35),
(10041, 'vrvr', 35),
(10042, 'iktj', 5),
(10042, 'thgr', 9787),
(10065, 'c', 2),
(10065, 'cr', 3),
(10065, 'r', 1),
(10065, 'rd', 4),
(10070, 'ec', 2454),
(10071, '3d3', 4),
(10072, 'd3d3', 43),
(10073, 'd3d3', 43),
(10074, 'd3d3', 43),
(10075, 'dr', 42),
(10076, 'dr', 42),
(10077, 'dr', 42),
(10078, 'dr', 42),
(10079, 'dr', 42),
(10080, 'dr', 42),
(10081, 'dr', 42),
(10082, '4f4f', 244),
(10083, '4f4f', 244),
(10091, '4f4f', 3423535),
(10092, 'saas', 353),
(10093, '5h5h', 54),
(10094, 'cecr', 132435),
(10095, 'a', 123),
(10095, 'b', 87),
(10095, 'x', 567),
(10095, 'y', 345),
(10095, 'z', 234);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
