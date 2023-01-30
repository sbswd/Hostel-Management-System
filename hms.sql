-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 24, 2022 at 06:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookhostel`
--

DROP TABLE IF EXISTS `bookhostel`;
CREATE TABLE IF NOT EXISTS `bookhostel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emergencyno` varchar(255) DEFAULT NULL,
  `guardianname` varchar(255) DEFAULT NULL,
  `guardianrelation` varchar(255) DEFAULT NULL,
  `guardiancontact` varchar(255) NOT NULL,
  `caddress` text DEFAULT NULL,
  `ccity` varchar(255) DEFAULT NULL,
  `cstate` varchar(255) DEFAULT NULL,
  `cpin` varchar(255) DEFAULT NULL,
  `paddress` text DEFAULT NULL,
  `pcity` varchar(255) DEFAULT NULL,
  `pstate` varchar(255) DEFAULT NULL,
  `ppin` varchar(255) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `roomid` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `proofno` varchar(255) DEFAULT NULL,
  `proofile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookhostel`
--

INSERT INTO `bookhostel` (`id`, `emergencyno`, `guardianname`, `guardianrelation`, `guardiancontact`, `caddress`, `ccity`, `cstate`, `cpin`, `paddress`, `pcity`, `pstate`, `ppin`, `studentid`, `status`, `startdate`, `enddate`, `duration`, `roomid`, `fee`, `foodstatus`, `proofno`, `proofile`) VALUES
(25, '1234567890', 'achan', 'dad', '9876543210', ' vvafbvjhbdf', 'cdvbfvb ', 'Kasaragod', '123456', 'cvbrevr', 'wvrehe', 'Kasaragod', '123456', 1002, 2, '2022-07-31', '2023-05-31', 10, 512, 5000, 0, '554515151545154515', '62e4eb655c8fa0.81062700.jpg'),
(26, '7736020580', 'Ashik', 'Father', '8138831812', ' Srambiyekkal(H)\r\np.o pallipuram', 'Ernakulam ', 'Ernakulam', '683515', ' Srambiyekkal(H)\r\np.o pallipuram', 'Ernakulam', 'Ernakulam', '683515', 1003, 2, '2022-08-30', '2023-03-02', 6, 512, 5000, 0, '773602561248', '62e75bc0bfbd34.83300266.jpeg'),
(27, '7736020580', 'saj', 'Father', '8138831812', ' Green villa\r\nkochi', 'Ernakulam ', 'Ernakulam', '683515', ' Green villa\r\nkochi', 'Ernakulam', 'Ernakulam', '683515', 1005, 1, '2022-10-12', '2023-08-12', 10, 102, 5000, 0, '773602561248', '632ea36c5a66d9.71902118.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homeimages`
--

DROP TABLE IF EXISTS `homeimages`;
CREATE TABLE IF NOT EXISTS `homeimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeimages`
--

INSERT INTO `homeimages` (`id`, `images`) VALUES
(1, '62d477e13e6344.59359214.jpeg'),
(2, '1002.jpeg'),
(3, '1003.jpeg'),
(4, '1004.jpg'),
(5, '1005.jpeg'),
(6, '1006.jpeg'),
(7, '1007.jpeg'),
(8, '1008.jpeg'),
(9, '1009.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `checksum` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `studid` int(11) DEFAULT NULL,
  `nxtPayDate` date DEFAULT NULL,
  `payedfor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `orderid`, `amount`, `txnid`, `checksum`, `date`, `studid`, `nxtPayDate`, `payedfor`) VALUES
(24, 'CID1002ORD76581626M3', 15000, '20220730111212800110168655303943846', 'qR/zQM0Ga0zXAXlpJGBOm+gj05EWulQrFbElY5k/qG5Op1Zy+7R5oECXhfU0V+Eo/j47WVe4Z7xTYBuCuHA5iGO29qrTZQ/Nh345sz9IAbk=', '2022-07-30', 1002, '2022-10-30', 3),
(23, 'CID1002ORD90943201M5', 35000, '20220730111212800110168028005324369', '+Vla1Y/pzqbL41yOrRHq78en08duWrclhGkAtWnrJA+G4oCLsojfud/OU3Kth84mCnlkStsjTBxsJpETWjmH4XRF/WN26MFSespJpR/Hd1o=', '2022-07-30', 1002, '2022-12-30', 5),
(22, 'CID1001ORD93683904M5', 25000, '20220730111212800110168752603912608', 'N/o4lJv9/IDWsuYlMjOsU0aI3vQBpXJmQwDyKbDh+IgkRbhvTITqSO991BM0ylow8gJRSkFRqZ/jmTOqw7Nh30FLtQ9V1eABE+u0xfx6tLE=', '2022-07-30', 1001, '2022-12-30', 5),
(25, 'CID1003ORD87219365M1', 5000, '20220801111212800110168806003942950', '0j4UNFiAqf2PDu2ekI/Z2KWSEp5ezGe6+FJ3g4GsuI5CyxT0hgisCvMxturFCIXCC645HfniNE0ZV1dyXqqkwwtwSpfyWoWg3Ydee+Vpt5g=', '2022-08-01', 1003, '2022-08-01', 1),
(26, 'CID1003ORD12204076M1', 5000, '20220801111212800110168919203949255', 'sMoL87IOF41ZV0u2su0c+vPm33WJxDhdUufHZXTYLCXdS3Qu74Zwvek+ivaeyuwZGsOKs9Sh28BPiWW0vzSP/aL61ACsIJ56lU8Sem7PwGw=', '2022-08-01', 1003, '2022-09-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seater` int(11) NOT NULL,
  `roomno` varchar(255) DEFAULT NULL,
  `feePerStudent` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `postingdate` date DEFAULT NULL,
  `roomimg` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `roomno`, `feePerStudent`, `status`, `postingdate`, `roomimg`) VALUES
(22, 2, '512', '5000', 0, '2022-07-30', '62e4d9057c9104.22059263.png'),
(23, 2, '102', '5000', 1, '2022-09-24', '632ea2371f3422.38798098.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regnum` int(11) NOT NULL DEFAULT 1000,
  `fname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phno` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pwd` longtext DEFAULT NULL,
  `utype` int(11) DEFAULT 1,
  PRIMARY KEY (`id`,`regnum`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regnum`, `fname`, `mname`, `lname`, `gender`, `phno`, `email`, `pwd`, `utype`) VALUES
(4, 1000, NULL, NULL, NULL, NULL, NULL, 'admin', '$2y$10$uq7XeThmk8RGb.M24kZxZexWwl1qXTnwvacc3.5jFSxvxBCPqM9yW', 2),
(24, 1002, 'Rinoj', 'A', 'J', 'male', '4234324423', 'example@gmail.com', '$2y$10$6S0uGsoqZElEkygglcS6M.ZKm5t5AW7i8bSgKPOipVpIgF2MHtGQG', 1),
(25, 1003, 'Thamanna', 'Ashik', 'SS', 'female', '7736020580', 'thammuz28417@gmail.com', '$2y$10$FvbHSuIPbbKT4WNKzTev8e0oVo79nc9T8nHtGfv24CPwq1u62oxEy', 1),
(26, 1004, 'Thamanna', 'Ashik', 'SS', 'female', '7736020580', 'thamanna12@gmail.com', '$2y$10$PnEAKCxR/.AhD7cl3uqMLe701AKPDKQL92nQpyQQTg/R3IIDLIsAO', 1),
(27, 1005, 'Amal', '', 'SS', 'male', '8952464852', 'amal22@gmail.com', '$2y$10$IDPZRaeOKMQchM/kjxYknur6nPH5086KCjqcTPSZKIjeA6pZAjxie', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
