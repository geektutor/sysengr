-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 01:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysengr`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `matric` bigint(20) NOT NULL,
  `adviser_no` bigint(20) NOT NULL,
  `superviser_no` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`ID`, `title`, `matric`, `adviser_no`, `superviser_no`, `comment`, `status`, `date_added`) VALUES
(1, 'How to kill a rat', 190408024, 123456789, 987654321, '', 0, '2020-06-10 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `complaint` longtext NOT NULL,
  `reciever` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `email`, `complaint`, `reciever`) VALUES
(1, 'zubairidrisaweda@gmail.com', 'I love you', '1'),
(2, 'zubairidrisaweda@gmail.com', 'I love you', 'Course Advisor'),
(3, 'mumu@mumu.com', 'lol', 'Supervisor'),
(4, 'mumu@mumu.com', 'vdkjb;', 'HOD'),
(5, 'mumu@mumu.com', 'I am testing ', 'HOD'),
(6, 'mumu@mumu.com', 'I love you', 'HOD'),
(7, 'test@test.com', 'This is the student test', 'Course Advisor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `user_number` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_number`, `name`, `email`, `password`, `type`) VALUES
(1, 123456789, 'Zubair Idris Aweda', 'zubairidrisaweda@gmail.com', 'ethene20', 1),
(2, 190408024, 'PHP Artisan', 'mumu@mumu.com', '123456789', 0),
(3, 123456780, 'El Hajj Zubair', 'test@test.com', '12345678', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
