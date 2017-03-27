-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2017 at 10:50 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `student_track`
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
  `zip` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `startdate`, `fname`, `lname`, `email`, `phone`, `street`, `city`, `state`, `zip`) VALUES
(1, '2017-03-26 22:12:04', 'nicholas', 'diaz', 'nichodiaz@gmail.com', '8178968570', '3930 glade rd ste 108 #222', 'colleyville', 'TX', '76034'),
(2, '2017-03-26 22:12:26', 'Bob', 'Saget', 'bob@gmail.com', '7867409293', '11700 NW 36TH AVE', 'MIAMI', 'Florida', '33167');

-- --------------------------------------------------------

--
-- Table structure for table `loginAttempts`
--

CREATE TABLE `loginAttempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginAttempts`
--

INSERT INTO `loginAttempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
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
('168067309358d8334b2da08', 'god', '$2y$10$46swOL9WYQGWyV2EQmewG.wbpeFuJUdfcMuzgcIbyzfIUowDYedKu', 'info@god.com', 0, '2017-03-26 21:31:55'),
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
(2, 'tmp2', 'This is tempalte two. Template two loves movies and hanging out with girls '),
(3, 'tmp3', 'This is tempalte three. Template three is secretly not a template at all. In fact I am template three. I have the power to morph myself into a template then back to a jedi anytime I want. Believe it or not, quite offten I enjoy being a template. Being a jedi gets old.');

-- --------------------------------------------------------

--
-- Table structure for table `temp_history`
--

CREATE TABLE `temp_history` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `temp_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_history`
--

INSERT INTO `temp_history` (`id`, `customer_id`, `temp_id`, `created_at`) VALUES
(1, 0, 2, '2017-03-26 18:39:16'),
(2, 1, 1, '2017-03-26 22:18:18'),
(3, 2, 1, '2017-03-26 22:18:18');

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
-- Indexes for table `loginAttempts`
--
ALTER TABLE `loginAttempts`
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
-- AUTO_INCREMENT for table `loginAttempts`
--
ALTER TABLE `loginAttempts`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;