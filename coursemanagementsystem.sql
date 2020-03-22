-- phpMyAdmin SQL Dump
-- version 4.9.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2020 at 04:58 PM
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
-- Database: `coursemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `batch_start` int NOT NULL,
  `batch_end` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_code`, `course_name`, `dept_name`, `faculty_name`, `batch_start`, `batch_end`) VALUES
('BETC1923', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology', 2019, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `student_parentdb`
--

CREATE TABLE `student_parentdb` (
  `Roll_no` int NOT NULL,
  `Father_name` varchar(50) NOT NULL,
  `Mother_name` varchar(50) NOT NULL,
  `Father_primary_mobno` varchar(10) NOT NULL,
  `Father_secondary_mobno` varchar(10) NOT NULL,
  `Father_email` varchar(50) NOT NULL,
  `Mother_primary_mobno` varchar(10) NOT NULL,
  `Mother_secondary_mobno` varchar(10) NOT NULL,
  `Mother_email` varchar(50) NOT NULL,
  `parents_primaryaddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_parentdb`
--

INSERT INTO `student_parentdb` (`Roll_no`, `Father_name`, `Mother_name`, `Father_primary_mobno`, `Father_secondary_mobno`, `Father_email`, `Mother_primary_mobno`, `Mother_secondary_mobno`, `Mother_email`, `parents_primaryaddress`) VALUES
(1910701012, 'SAMARESH BISWAS', 'SIKHA BISWAS', '9474828561', '9330303814', 'samareshbiswas0967@gmail.com', '9434936752', '7003924293', 'sikhabiswas011@gmail.com', 'same as my home address');

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
(1910701013, 'SNEHASHIS BISWAS', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `studusers_logindata`
--

CREATE TABLE `studusers_logindata` (
  `Roll_no` varchar(12) NOT NULL,
  `Full_name` varchar(60) DEFAULT NULL,
  `mobile_no` varchar(12) DEFAULT NULL,
  `email_id` varchar(70) DEFAULT NULL,
  `Password_login` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studusers_logindata`
--

INSERT INTO `studusers_logindata` (`Roll_no`, `Full_name`, `mobile_no`, `email_id`, `Password_login`) VALUES
('001910701012', 'AYAN BISWAS', '8777673298', 'ayanbiswas184@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `UID_user` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ROLE_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FULL_NAME_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`UID_user`, `ROLE_user`, `FULL_NAME_user`) VALUES
('001910701012', 'STUDENT', 'AYAN BISWAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_userdata`
--
ALTER TABLE `student_userdata`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `studusers_logindata`
--
ALTER TABLE `studusers_logindata`
  ADD PRIMARY KEY (`Roll_no`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`UID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
