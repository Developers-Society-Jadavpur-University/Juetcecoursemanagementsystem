-- phpMyAdmin SQL Dump
-- version 4.9.5deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 02:58 PM
-- Server version: 8.0.19-0ubuntu0.19.10.3
-- PHP Version: 7.3.11-0ubuntu0.19.10.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etce_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressDetails`
--

CREATE TABLE `addressDetails` (
  `uname` varchar(50) NOT NULL,
  `rno` char(12) NOT NULL,
  `permanentAdd` longtext NOT NULL,
  `correspondenceAdd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addressDetails`
--

INSERT INTO `addressDetails` (`uname`, `rno`, `permanentAdd`, `correspondenceAdd`) VALUES
('AYAN BISWAS', '001910701012', '957 ICHAPUR ROAD DESHBANDHUNAGAR P.O.- GARULIA', '957 ICHAPUR ROAD DESHBANDHUNAGAR P.O.- GARULIA'),
('Arijit Saha', '001910701019', 'I/51A Baghajatin  Kolkata 700092', 'I/51A Baghajatin  Kolkata 700092');

-- --------------------------------------------------------

--
-- Table structure for table `parentDetails`
--

CREATE TABLE `parentDetails` (
  `uname` varchar(50) NOT NULL,
  `rno` char(12) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `fContact` char(10) NOT NULL,
  `mContact` char(10) NOT NULL,
  `fEmail` text NOT NULL,
  `mEmail` text NOT NULL,
  `fBloodGrp` char(3) NOT NULL,
  `mBloodGrp` char(3) NOT NULL,
  `fOccu` text NOT NULL,
  `mOccu` text NOT NULL,
  `parentOfficeAdd` longtext NOT NULL,
  `parentOfficeTel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parentDetails`
--

INSERT INTO `parentDetails` (`uname`, `rno`, `fName`, `mName`, `fContact`, `mContact`, `fEmail`, `mEmail`, `fBloodGrp`, `mBloodGrp`, `fOccu`, `mOccu`, `parentOfficeAdd`, `parentOfficeTel`) VALUES
('AYAN BISWAS', '001910701012', 'SAMARESH BISWAS', 'SIKHA BISWAS', '9474828561', '9434936752', 'samareshbiswas1967@gmai.com', 'sikhabiswas011@gmail.com', 'B+', 'B+', 'service', 'service', 'SADSFSBG', '8585654525'),
('Arijit Saha', '001910701019', 'Ajit Kumar Saha', 'Rinku Saha', '7044179173', '9433342923', 'aksaha_66@gmail.com', 'rinkusaha_67@gmail.com', 'B+', 'O+', 'service', 'houseWife', 'Jessore Rd, Dum Dum, Kolkata, West Bengal 700052', '8282205752');

-- --------------------------------------------------------

--
-- Table structure for table `personalDetails`
--

CREATE TABLE `personalDetails` (
  `uname` varchar(50) NOT NULL,
  `rno` char(12) NOT NULL,
  `dob` date NOT NULL,
  `bloodGrp` char(3) NOT NULL,
  `yJoin` int NOT NULL,
  `yStudy` varchar(5) NOT NULL,
  `Stream` text NOT NULL,
  `Gender` tinytext NOT NULL,
  `Category` tinytext NOT NULL,
  `wbjeeMaths` decimal(10,2) NOT NULL,
  `wbjeePhyChem` decimal(10,2) NOT NULL,
  `stuEmail` text NOT NULL,
  `stuContact` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personalDetails`
--

INSERT INTO `personalDetails` (`uname`, `rno`, `dob`, `bloodGrp`, `yJoin`, `yStudy`, `Stream`, `Gender`, `Category`, `wbjeeMaths`, `wbjeePhyChem`, `stuEmail`, `stuContact`) VALUES
('AYAN BISWAS', '001910701012', '2001-12-04', 'O+', 2001, 'ug1', 'etce', 'Male', 'sc', '85.00', '55.00', 'ayanbiswas184@gmail.com', '8777673298'),
('Arijit Saha', '001910701019', '2001-02-09', 'B', 2019, 'ug1', 'etce', 'Male', 'general', '77.50', '78.00', 'arijitfeb01@gmail.com', '9874981292');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int NOT NULL,
  `user_rno` char(12) NOT NULL,
  `status_name` int NOT NULL,
  `ext` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `user_rno`, `status_name`, `ext`) VALUES
(2, '001910701019', 0, 'jpg'),
(4, '001910701012', 1, 'none'),
(5, '001910701012', 1, 'none'),
(6, '1910701012', 1, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `pwdReset`
--

CREATE TABLE `pwdReset` (
  `pwdResetId` int NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pwdReset`
--

INSERT INTO `pwdReset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(21, 'arijitfeb01@gmail.com', '83c7b7bf169c26de', '$2y$10$7aAaOFL2Q26NzT9W8sY9j.53tsL.VO5WIUysm5ooVByZD18Kp379y', '1586771868');

-- --------------------------------------------------------

--
-- Table structure for table `student_userdata`
--

CREATE TABLE `student_userdata` (
  `roll_no` int NOT NULL,
  `Full_name` varchar(60) NOT NULL,
  `Course_code` varchar(10) NOT NULL,
  `reg_status` varchar(1) NOT NULL DEFAULT 'N',
  `course_name` varchar(50) NOT NULL,
  `department` varchar(60) NOT NULL,
  `faculty` varchar(40) NOT NULL DEFAULT 'Faculty of Engineering and Technology'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='For initial db for the students';

--
-- Dumping data for table `student_userdata`
--

INSERT INTO `student_userdata` (`roll_no`, `Full_name`, `Course_code`, `reg_status`, `course_name`, `department`, `faculty`) VALUES
(1910701012, 'AYAN BISWAS', 'BETC1923', 'Y', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
(1910701019, 'ARIJIT SAHA', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(50) NOT NULL,
  `rno` char(12) NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL,
  `update_status1` int NOT NULL,
  `update_status2` int NOT NULL,
  `update_status3` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `rno`, `email`, `pwd`, `update_status1`, `update_status2`, `update_status3`) VALUES
('Arijit Saha', '001910701019', 'arijitfeb01@gmail.com', '$2y$10$tQMbFQpZuVWJqtr2NHqJseK.mLyAJnfWwKvzJl900TA433g6xnucG', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressDetails`
--
ALTER TABLE `addressDetails`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `parentDetails`
--
ALTER TABLE `parentDetails`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `personalDetails`
--
ALTER TABLE `personalDetails`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdReset`
--
ALTER TABLE `pwdReset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `student_userdata`
--
ALTER TABLE `student_userdata`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
