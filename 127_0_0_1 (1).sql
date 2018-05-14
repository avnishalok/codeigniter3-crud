-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2017 at 11:32 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheque_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_info`
--

CREATE TABLE IF NOT EXISTS `tbl_cheque_info` (
  `id` bigint(20) NOT NULL,
  `checkNo` varchar(50) NOT NULL,
  `routingNo` varchar(50) NOT NULL,
  `accountNo` varchar(50) NOT NULL,
  `confirmAccountNo` varchar(50) NOT NULL,
  `custEmail` varchar(50) DEFAULT NULL,
  `custName` varchar(100) NOT NULL,
  `custStreetAddress` varchar(200) NOT NULL,
  `custPhone` varchar(200) DEFAULT NULL,
  `custCity` varchar(100) DEFAULT NULL,
  `custState` varchar(100) DEFAULT NULL,
  `custZipCode` varchar(100) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `memo1` varchar(500) DEFAULT NULL,
  `memo2` varchar(500) DEFAULT NULL,
  `cmp` varchar(100) DEFAULT NULL,
  `bankName` varchar(80) NOT NULL,
  `bankAddress` varchar(200) NOT NULL,
  `bankCity` varchar(80) NOT NULL,
  `bankState` varchar(80) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cheque_info`
--

INSERT INTO `tbl_cheque_info` (`id`, `checkNo`, `routingNo`, `accountNo`, `confirmAccountNo`, `custEmail`, `custName`, `custStreetAddress`, `custPhone`, `custCity`, `custState`, `custZipCode`, `amount`, `memo1`, `memo2`, `cmp`, `bankName`, `bankAddress`, `bankCity`, `bankState`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, '789456', '78956', '745895', '412569', 'avn@gmail.com', 'avnish', 'address', '7410', 'city', 'state', '11236', '455.99', 'my memo', '', 'Geek Infotech LLC', 'Wells Fargo', 'M-30, Street Park', 'Manhattan', 'MH', 0, '2017-05-28 13:51:07', NULL),
(2, '74152', '896523', '741236', '85263', 'avn@corp.com', 'jonita gandhi', 'address2', '78456', 'city2', 'state2', '4123', '71', 'memo3', '', 'Geeks Help', 'Federal Bank', 'A-19, Golden avenue', 'Florida', 'FE', 0, '2017-05-30 14:47:48', '2017-06-06 20:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) NOT NULL,
  `userId` varchar(100) NOT NULL COMMENT 'login id',
  `userName` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL COMMENT 'hashed password',
  `roleId` int(11) NOT NULL COMMENT 'role id of each user',
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userId`, `userName`, `password`, `roleId`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'User10', 'Administrator', '$2y$10$DFbEDK5qLrRytWU2gaZ3FOzwexXJP8YMfct84ubQKbqTJJPQpeFGm', 101, 0, '2017-05-24 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cheque_info`
--
ALTER TABLE `tbl_cheque_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cheque_info`
--
ALTER TABLE `tbl_cheque_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
