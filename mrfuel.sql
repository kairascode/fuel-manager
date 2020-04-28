-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2020 at 10:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrfuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

DROP TABLE IF EXISTS `fuels`;
CREATE TABLE IF NOT EXISTS `fuels` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `cdate` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `transid` int(11) NOT NULL,
  `orderno` int(255) NOT NULL,
  `litres` int(50) NOT NULL,
  `vehicleno` varchar(255) NOT NULL,
  `chequeNo` int(11) NOT NULL,
  `Rate` int(255) NOT NULL,
  `debit` int(255) NOT NULL,
  `credit` double NOT NULL,
  `Balance` int(255) NOT NULL,
  `transtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`no`),
  UNIQUE KEY `transid_2` (`transid`),
  KEY `no` (`no`,`cdate`,`orderno`,`litres`,`vehicleno`,`Rate`,`debit`,`Balance`),
  KEY `credit` (`credit`),
  KEY `chequeNo` (`chequeNo`),
  KEY `description` (`description`),
  KEY `orderno_2` (`orderno`),
  KEY `transtime` (`transtime`),
  KEY `orderno` (`orderno`),
  KEY `transid` (`transid`),
  KEY `transid_3` (`transid`),
  KEY `orderno_3` (`orderno`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`no`, `cdate`, `description`, `transid`, `orderno`, `litres`, `vehicleno`, `chequeNo`, `Rate`, `debit`, `credit`, `Balance`, `transtime`) VALUES
(1, '2017-05-02', 'CREDIT', 345358, 0, 0, '-', 345343, 0, 0, 20000, 20000, '2017-05-22 21:11:33'),
(2, '2017-05-02', 'CREDIT', 345364, 0, 0, '-', 345349, 0, 0, 20000, 40000, '2017-05-22 21:12:20'),
(3, '2017-05-04', 'CREDIT', 345357, 0, 0, '-', 345342, 0, 0, 20000, 60000, '2017-05-22 21:13:43'),
(5, '2017-05-05', 'CREDIT', 345356, 0, 0, '-', 345341, 0, 0, 20000, 80000, '2017-05-22 21:14:54'),
(6, '2017-05-12', 'CREDIT', 232250, 0, 0, '-', 232235, 0, 0, 20000, 100000, '2017-05-22 21:15:40'),
(7, '2017-05-02', 'DEBIT', 89084, 89079, 25, 'GK185B', 0, 94, 2345, 0, 97655, '2017-05-22 21:26:21'),
(8, '2017-05-03', 'DEBIT', 89085, 89080, 34, 'GK185B', 0, 100, 3400, 0, 94255, '2017-05-22 21:27:55'),
(9, '2017-05-17', 'DEBIT', 89086, 89081, 34, 'GK185B', 0, 76, 2600, 0, 91655, '2017-05-22 21:28:47'),
(10, '2017-05-10', 'DEBIT', 786959, 786954, 23, 'GK185B', 0, 139, 3200, 0, 88455, '2017-05-22 22:07:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
