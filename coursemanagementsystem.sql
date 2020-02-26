-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2020 at 11:41 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `batch_start` int(8) NOT NULL,
  `batch_end` int(8) NOT NULL
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
  `Roll_no` int(12) NOT NULL,
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
(1910701018, 'fater_name', 'mother_name', '4585245689', '4585458956', 'sample0967@gmail.com', '7854859658', '4585785485', 'sample@gmail.com', 'same as my home address');

-- --------------------------------------------------------

--
-- Table structure for table `student_userdata`
--

CREATE TABLE `student_userdata` (
  `roll_no` int(12) NOT NULL,
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
(1910701018, 'sample', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `student_parentdb`
--
ALTER TABLE `student_parentdb`
  ADD PRIMARY KEY (`Roll_no`);

--
-- Indexes for table `student_userdata`
--
ALTER TABLE `student_userdata`
  ADD PRIMARY KEY (`Course_code`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `Course_code_3` (`Course_code`),
  ADD KEY `Course_code` (`Course_code`),
  ADD KEY `Course_code_2` (`Course_code`),
  ADD KEY `Course_code_4` (`Course_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_parentdb`
--
ALTER TABLE `student_parentdb`
  ADD CONSTRAINT `student_parentdb_ibfk_1` FOREIGN KEY (`Roll_no`) REFERENCES `student_userdata` (`roll_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
