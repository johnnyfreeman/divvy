-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2014 at 11:41 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `divvy`
--

-- --------------------------------------------------------

--
-- Table structure for table `envelopes`
--

CREATE TABLE IF NOT EXISTS `envelopes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `currentAmount` decimal(10,2) NOT NULL,
  `targetAmount` decimal(10,2) NOT NULL,
  `targetDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `envelopes`
--

INSERT INTO `envelopes` (`id`, `description`, `currentAmount`, `targetAmount`, `targetDate`) VALUES
(1, 'Rent', '0.00', '1100.00', '2014-08-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_transactions`
--

CREATE TABLE IF NOT EXISTS `scheduled_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `scheduled_transactions`
--

INSERT INTO `scheduled_transactions` (`id`, `description`, `amount`, `dateTime`) VALUES
(1, 'Paycheck', '2000.00', '2014-07-31 00:00:00'),
(2, 'Paycheck', '2000.00', '2014-08-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `dateTime` datetime NOT NULL,
  `envelopeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`),
  KEY `envelopeId` (`envelopeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`envelopeId`) REFERENCES `envelopes` (`id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
