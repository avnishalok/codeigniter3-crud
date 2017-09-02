-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2017 at 08:24 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheque_db`
--
CREATE DATABASE IF NOT EXISTS `cheque_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cheque_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheque_info`
--

CREATE TABLE `tbl_cheque_info` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cheque_info`
--

INSERT INTO `tbl_cheque_info` (`id`, `checkNo`, `routingNo`, `accountNo`, `confirmAccountNo`, `custEmail`, `custName`, `custStreetAddress`, `custPhone`, `custCity`, `custState`, `custZipCode`, `amount`, `memo1`, `memo2`, `cmp`, `bankName`, `bankAddress`, `bankCity`, `bankState`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, '789422', '78978', '745854', '412566', 'avn@gmail.com', 'avnish', 'address', '7410', 'city', 'state', '11236', '455.99', 'my memo', '', 'Infotech LLC', 'Wells Fargo', 'D-30, Street Park', 'Manhattan', 'MH', 0, '2017-05-28 13:51:07', NULL),
(2, '741525', '896518', '741291', '852631', 'avn@corp.com', 'jonita gandhi', 'address2', '78456', 'city2', 'state2', '4123', '71', 'memo3', '', 'Geek LLC', 'Federal Bank', 'L-19, Golden avenue', 'Florida', 'FE', 0, '2017-05-30 14:47:48', '2017-06-06 20:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) NOT NULL,
  `userId` varchar(100) NOT NULL COMMENT 'login id',
  `userName` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL COMMENT 'hashed password (admin)',
  `roleId` int(11) NOT NULL COMMENT 'role id of each user',
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `userId`, `userName`, `password`, `roleId`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'User10', 'Administrator', '$2y$10$VFE0cBkc/m34eV5LeFSIpOrBg9uAXbEL4bT7Io7rQn60VLzTTnr0G', 101, 0, '2017-05-24 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
