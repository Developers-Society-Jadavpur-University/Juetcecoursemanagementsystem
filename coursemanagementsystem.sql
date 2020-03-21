-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2020 at 03:42 PM
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
-- Table structure for table `auth_tokens`
--



--
-- Dumping data for table `auth_tokens`
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
(1910701012, 'SAMARESH BISWAS', 'SIKHA BISWAS', '9474828561', '9330303814', 'samareshbiswas0967@gmail.com', '9434936752', '7003924293', 'sikhabiswas011@gmail.com', 'same as my home address');

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
(1910701012, 'AYAN BISWAS', 'BETC1923', 'N', 'Bachelor of Engineering', 'Electronics and Telecommunication Engineering', 'Faculty of Engineering and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `studusers_logindata`
--

CREATE TABLE `studusers_logindata` (
  `Roll_no` varchar(12) DEFAULT NULL,
  `Full_name` varchar(60) DEFAULT NULL,
  `mobile_no` varchar(12) DEFAULT NULL,
  `email_id` varchar(70) DEFAULT NULL,
  `Password_login` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studusers_logindata`
--

INSERT INTO `studusers_logindata` (`Roll_no`, `Full_name`, `mobile_no`, `email_id`, `Password_login`) VALUES
('001910701012', 'AYAN BISWAS', '8777673298', 'ayanbiswas184@gmail.com', '9990452b5fb2a693a3f100baa93fc891');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `bio` text,
  `profile_image` varchar(255) NOT NULL DEFAULT '_defaultUser.png',
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `gender`, `headline`, `bio`, `profile_image`, `verified_at`, `created_at`, `updated_at`, `deleted_at`, `last_login_at`) VALUES
(0, 'supahot', 'supa@hot.com', '$2y$10$jhIOk4NVdBile/NwhAU9We/f0aoohx.cG9CizmIALRz0aCKJa5s6a', 'Supahot', 'Soverysupahot', 'm', 'Headline of a supa hot user', 'This is the bio of a supa hot user. Now i will say needless stuff to make this longer so this looks like a bio and not anything other than a bio.', '_defaultUser.png', '2020-03-03 15:22:48', '2020-03-03 15:22:48', '2020-03-15 08:58:23', NULL, NULL),
(31, 'ayan456', 'ayanbiswas184@gmail.com', '$2y$10$BgvbHUn8pT/HOtuClYeEV..Qawrl4GxqBj1QvSig2PYWDJfICc1M6', 'AYAN', 'BISWAS', 'm', 'Hi i am good student', 'hello', '_defaultUser.png', '2020-03-03 15:23:45', '2020-03-03 15:23:45', '2020-03-15 09:00:20', NULL, '2020-03-15 09:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `studusers_logindata`
--
ALTER TABLE `studusers_logindata`
  ADD UNIQUE KEY `Roll_no` (`Roll_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
