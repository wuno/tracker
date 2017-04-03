-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 06:16 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(120) NOT NULL,
  `street` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `zip` varchar(120) NOT NULL,
  `lt1` tinyint(1) NOT NULL DEFAULT '0',
  `lt2` tinyint(1) NOT NULL DEFAULT '0',
  `lt3` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `startdate`, `fname`, `lname`, `email`, `phone`, `street`, `city`, `state`, `zip`, `lt1`, `lt2`, `lt3`) VALUES
(1, '2017-03-24 00:24:17', 'nicholas', 'diaz', 'nichodiaz@gmail.com', '8178968570', '3930 glade rd ste 108 #222', 'colleyville', 'TX', '76034', 0, 0, 0),
(2, '2017-03-25 07:19:36', 'vicky', 'agg', 'vk.bkbiet@gmail.com', '9464685055', 'ascsc', 'scsc', 'cscd', '255451', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginattempts`
--

INSERT INTO `loginattempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('::1', 1, '2017-03-22 20:50:57', 'nichodiaz', 1),
('::1', 5, '2017-03-23 13:28:01', 'ndiaz@wuno.com', 2),
('::1', 5, '2017-03-23 13:27:36', 'nichodiaz@gmail.com', 3),
('::1', 1, '2017-03-23 14:16:53', 'admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `verified`, `mod_timestamp`) VALUES
('115494072058d324eb33449', 'nichodiaz', '$2y$10$UEZpSn4KR0Q6GYsjnQtXjuPQcesTco263Xpk7ueUX2cXFihEc1WJW', 'nichodiaz@gmail.com', 1, '2017-03-23 01:50:13'),
('128190329158d41ec79092d', 'deep', '$2y$10$Z.ogiJ36oUm01kEYjZYT.O0PSb4pG9iXqXq51mRrQvT5bUClwXx2K', 'deep@info.com', 0, '2017-03-23 19:15:19'),
('134837512258d45ce64bad4', 'master', '$2y$10$ionr.9MmaNhDSN3P21Wy0u/ix1nFmZi8nyyIk2C.QXX15srFSJo6a', 'master@wuno.com', 0, '2017-03-23 23:40:22'),
('162057083958d465101b732', 'janet', '$2y$10$0xs4Vl.SD6S25SUq4E4zr.CTK16vE0dFhjxy000DQccFGj/ywzOHO', 'janet@wuno.com', 0, '2017-03-24 00:15:12'),
('25459044758d41f09cd5cb', 'admin', '$2y$10$meX3jIgw9ljKXo4agjLLDeGE/avcLhycZKU4QH6DBfVCkIzF7cM6q', 'admin@wuno.com', 1, '2017-03-23 19:16:42'),
('89579956258d4154b1b861', 'ndiaz', '$2y$10$fJc2WaS.0FxBsmg3Iz/aGeUM1CdJVtSIBvQEkDChdSVfXpCznKGuC', 'ndiaz@wuno.com', 0, '2017-03-23 18:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE `temps` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temps`
--

INSERT INTO `temps` (`id`, `name`, `template`) VALUES
(1, 'tmp1', 'This is tempalte one. Template one is a nice template. It enjoys long walks on the beach and playing jokes on friends. One day it played a funny joke on a friend and they friend got angry. The end. '),
(2, 'tmp2', 'http://localhost:8080/tracker/login/pdf-templates/temp1/doc.php'),
(3, 'tmp3', 'This is tempalte three. Template three is secretly not a template at all. In fact I am template three. I have the power to morph myself into a template then back to a jedi anytime I want. Believe it or not, quite offten I enjoy being a template. Being a jedi gets old.');

-- --------------------------------------------------------

--
-- Table structure for table `temp_history`
--

CREATE TABLE `temp_history` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `temp_id` int(11) NOT NULL,
  `flag_delete` int(11) NOT NULL DEFAULT '0',
  `file_path` varchar(120) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_history`
--

INSERT INTO `temp_history` (`id`, `customer_id`, `temp_id`, `flag_delete`, `file_path`, `user_id`, `created_at`) VALUES
(21, 2, 2, 0, 'vk.bkbiet@gmail.com_2.pdf', 0, '2017-04-01 06:59:00'),
(20, 1, 2, 0, 'nichodiaz@gmail.com_2.pdf', 0, '2017-04-01 06:59:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_history`
--
ALTER TABLE `temp_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temps`
--
ALTER TABLE `temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temp_history`
--
ALTER TABLE `temp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
