-- phpMyAdmin SQL Dump
-- version 4.9.5deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2020 at 05:16 AM
-- Server version: 8.0.19-0ubuntu0.19.10.3
-- PHP Version: 7.3.11-0ubuntu0.19.10.4

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
('Arijit Saha', '001910701019', 'I/51A Baghajatin  Kolkata 700092', 'I/51A Baghajatin  Kolkata 700092');

-- --------------------------------------------------------

--
-- Table structure for table `batch_info`
--

CREATE TABLE `batch_info` (
  `course_code` char(15) NOT NULL,
  `course_name` char(30) NOT NULL,
  `department` char(50) NOT NULL,
  `faculty` char(50) NOT NULL,
  `start_year` year NOT NULL,
  `end_year` year NOT NULL,
  `status_course` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `batch_info`
--

INSERT INTO `batch_info` (`course_code`, `course_name`, `department`, `faculty`, `start_year`, `end_year`, `status_course`) VALUES
('BETC1822', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2018, 2022, 1),
('BETC1923', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2019, 2023, 1),
('BETC2024', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2020, 2024, 1),
('BETC2125', 'Bahcelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2021, 2025, 1),
('METC1921', 'Master of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2019, 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_uploads`
--

CREATE TABLE `notice_uploads` (
  `file_id` varchar(10) NOT NULL,
  `extension` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notice_uploads`
--

INSERT INTO `notice_uploads` (`file_id`, `extension`) VALUES
('1', 'pdf'),
('2', 'pdf'),
('1', 'pdf');

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
  `wbjeeroll` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `wbjeeMaths` decimal(10,2) NOT NULL,
  `wbjeePhyChem` decimal(10,2) NOT NULL,
  `stuEmail` text NOT NULL,
  `stuContact` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personalDetails`
--

INSERT INTO `personalDetails` (`uname`, `rno`, `dob`, `bloodGrp`, `yJoin`, `yStudy`, `Stream`, `Gender`, `Category`, `wbjeeroll`, `wbjeeMaths`, `wbjeePhyChem`, `stuEmail`, `stuContact`) VALUES
('AYAN BISWAS', '001910701012', '2001-12-04', 'O+', 2019, 'ug1', 'etce', 'Male', 'general', NULL, '40.00', '50.00', 'ayanbiswas184@gmail.com', '8777673298'),
('Arijit Saha', '001910701019', '2001-02-09', 'B', 2019, 'ug1', 'etce', 'Male', 'general', 'WB12145654345', '77.50', '78.00', 'arijitfeb01@gmail.com', '9874981292');

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
(4, '001910701012', 0, 'png'),
(5, '001910701012', 0, 'png'),
(6, '001910701012', 0, 'png'),
(7, '001910701012', 0, 'png'),
(8, '001910701012', 0, 'png'),
(9, '001910701012', 0, 'png'),
(10, '001910701012', 0, 'png'),
(11, '001910701012', 0, 'png'),
(12, '001910701012', 0, 'png'),
(13, '001910701012', 0, 'png'),
(14, '001910701012', 0, 'png'),
(15, '001910701012', 0, 'png'),
(16, '001910701012', 0, 'png'),
(17, '001910701012', 0, 'png'),
(18, '001910701012', 0, 'png'),
(19, '001910701012', 0, 'png'),
(20, '001910701012', 0, 'png'),
(21, '001910701012', 0, 'png'),
(22, '001910701016', 1, 'none'),
(23, '001910701016', 1, 'none'),
(24, '001910701016', 1, 'none');

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
(21, 'arijitfeb01@gmail.com', '83c7b7bf169c26de', '$2y$10$7aAaOFL2Q26NzT9W8sY9j.53tsL.VO5WIUysm5ooVByZD18Kp379y', '1586771868'),
(23, 'ayanbiswas184@gmail.com', 'b58e955b551815f1', '$2y$10$J90ZDhi6dRQ5hqN71pEuc.prTI7o1vkWq4.6BRyHlL.P4CUmEvsVW', '1587915974');

-- --------------------------------------------------------

--
-- Table structure for table `student_userdata`
--

CREATE TABLE `student_userdata` (
  `roll_no` char(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Full_name` varchar(60) NOT NULL,
  `phoneno` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Course_code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `reg_status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'N',
  `course_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `department` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `faculty` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Faculty of Engineering and Technology'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='For initial db for the students';

--
-- Dumping data for table `student_userdata`
--

INSERT INTO `student_userdata` (`roll_no`, `Full_name`, `phoneno`, `email`, `Course_code`, `reg_status`, `course_name`, `department`, `faculty`) VALUES
('001810701012', 'TEST CANDIDATE', '789654123', 'test@gmail.com', 'BETC1822', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910701012', 'AYAN BISWAS', '8777673298', 'ayanbiswas184@gmail.com', 'BETC1923', 'Y', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910701013', 'SNEHASHIS BISWAS', '4525452564', 'snehashis@gmail.com', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910701014', 'SAGNIK BANERJEE', '8777673564', 'sagnik@gmail.com', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910701016', 'ARINDAM MAJEE', '8521623546', 'arindam@gmail.com', 'BETC1923', 'Y', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910701019', 'ARIJIT SAHA ', '9485215642', 'arijit@gmail.com', 'BETC1923', 'Y', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('001910702012', 'AYAN TEST', '9474828561', 'ayantest@gmail.com', 'METC1921', 'N', 'Master of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('002010701011', 'AYAN BISWAS', '8777673297', 'ayan20@gmail.com', '', 'N', '', '', ''),
('002010701012', 'SAMPARK BISWAS', '5212521254', 'sampark@gmail.com', 'BETC2024', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology'),
('002010701016', 'TEST CANDIDATE', '123456789', 'testcandidate@gmail.com', 'BETC2024', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `stu_notice`
--

CREATE TABLE `stu_notice` (
  `notice_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_time_create` datetime NOT NULL,
  `date_time_expiry` datetime NOT NULL,
  `notice` varchar(500) NOT NULL,
  `file_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `notice_visible` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `notice_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stu_notice`
--

INSERT INTO `stu_notice` (`notice_id`, `date_time_create`, `date_time_expiry`, `notice`, `file_id`, `notice_visible`, `notice_status`) VALUES
('etc/1', '2020-04-16 04:17:49', '2020-04-21 00:00:00', 'This is to Notify all the students of Etce UG 1 to complete the registration in the course managament portal', '', 'BETC1923', 'archived'),
('etc/10', '2020-04-17 19:35:12', '2020-04-18 00:00:00', 'This is the new syllabus', '1', 'BETC1923', 'archived'),
('etc/2', '2020-04-17 04:51:22', '2020-04-18 00:00:00', 'This is a test notice ', '', 'ALL', 'archived'),
('etc/3', '2020-04-17 05:01:59', '2020-04-18 00:00:00', 'This is second test notice without file and it is archived', '', 'BETC1923', 'archived'),
('etc/4', '2020-04-16 19:07:29', '2020-04-16 19:09:00', 'New Notice', '', 'ALL', 'archived'),
('etc/5', '2020-04-17 14:28:53', '2020-04-17 00:00:00', 'This is a notice', '', 'Array', 'archived'),
('etc/6', '2020-04-17 15:30:57', '2020-04-17 00:00:00', 'This is a notice for UG 1/2 students', '', 'BETC1822,BETC1923', 'archived'),
('etc/7', '2020-04-17 19:13:04', '2020-04-18 00:00:00', 'This is to notify that class will commence from 13/06/19', '', 'STUDENT_ALL,FACULTY_ALL', 'archived'),
('etc/8', '2020-04-17 19:15:22', '2020-04-18 00:00:00', 'Test will commence from 10:00 AM', '', 'BETC1923', 'archived'),
('etc/9', '2020-04-17 19:34:04', '2020-04-18 00:00:00', 'This is notice regarding syllabus change', '', 'BETC1923', 'archived');

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `sub_code` varchar(20) NOT NULL,
  `sub_name` char(60) NOT NULL,
  `year` int NOT NULL,
  `sem` int NOT NULL,
  `paper_type` varchar(20) NOT NULL,
  `sub_type` varchar(20) NOT NULL,
  `dept` char(60) NOT NULL,
  `faculty` char(60) NOT NULL,
  `status_sub` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`sub_code`, `sub_name`, `year`, `sem`, `paper_type`, `sub_type`, `dept`, `faculty`, `status_sub`) VALUES
('ET/T/211', 'ELECTROMAGNETIC THEORY', 2, 1, 'Theoritical', 'Compulsory', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 1),
('ET/T/212', 'NETWORK SYNTHESIS', 2, 1, 'Theoritical', 'Compulsory', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 1),
('ET/T/214', 'DIGITAL LOGIC CIRCUITS', 2, 1, 'Theoritical', 'Compulsory', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 1);

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
('AYAN BISWAS', '001910701012', 'ayanbiswas184@gmail.com', '$2y$10$M1OsU7Qqd/OmGN5iH.Ni5.gw2OXdLUGbQ1LhIK2qMlLRq6Ir5K7fq', 1, 0, 0),
('ARINDAM MAJEE', '001910701016', 'arindam@gmail.com', '$2y$10$CUozVbOJv41VPcD74srqK.WlJVeulP5MwXMVWirWw2a9jYHqJVBLW', 0, 0, 0),
('Arijit Saha', '001910701019', 'arijitfeb01@gmail.com', '$2y$10$Yo9OnitJgHHmssE04OD4l.C3AabK8NUIku7jzwehzUsvCONdqwSky', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_staff`
--

CREATE TABLE `users_staff` (
  `id` int NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `staff_role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_staff`
--

INSERT INTO `users_staff` (`id`, `uname`, `email`, `staff_role`, `pwd`) VALUES
(1, 'Arijit Saha', 'arijitfeb01@gmail.com', 'admin', '$2y$10$wkdyI6AVykKnKyQqsTvv3eJ5.GCDUlosgRTu4szrZe5VBMdo4HhcG'),
(2, 'AYAN BISWAS', 'ayanbiswas184@gmail.com', 'faculty', '$2y$10$wkdyI6AVykKnKyQqsTvv3eJ5.GCDUlosgRTu4szrZe5VBMdo4HhcG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressDetails`
--
ALTER TABLE `addressDetails`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `batch_info`
--
ALTER TABLE `batch_info`
  ADD PRIMARY KEY (`course_code`);

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
-- Indexes for table `stu_notice`
--
ALTER TABLE `stu_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`sub_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `users_staff`
--
ALTER TABLE `users_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
