-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 02:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE `academic_details` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `board` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `discipline` varchar(50) NOT NULL,
  `marks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_details`
--

INSERT INTO `academic_details` (`slno`, `ldapid`, `exam`, `board`, `year`, `discipline`, `marks`) VALUES
(1, '41800070', 'q', 'q', '1976', 'q', 'q'),
(2, '41800070', 'w', 'w', '1972', 'w', 'w'),
(3, '41800070', 'e', 'e', '1973', 'e', 'e'),
(4, '41800070', 'r', 'r', '', 'r', 'r'),
(5, '41800070', 'a', 'a', '', 'a', 'a'),
(6, '41800070', 's', 's', '', 's', 's');

-- --------------------------------------------------------

--
-- Table structure for table `achievement_details`
--

CREATE TABLE `achievement_details` (
  `slno` int(10) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `achievement` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievement_details`
--

INSERT INTO `achievement_details` (`slno`, `ldapid`, `achievement`, `year`) VALUES
(0, '41800070', 'q', '1'),
(1, '41800070', 'w', '2'),
(2, '41800070', 'e', '3');

-- --------------------------------------------------------

--
-- Table structure for table `extra_curricular_activities_details`
--

CREATE TABLE `extra_curricular_activities_details` (
  `slno` int(10) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_curricular_activities_details`
--

INSERT INTO `extra_curricular_activities_details` (`slno`, `ldapid`, `activity`) VALUES
(0, '41800070', 'q'),
(1, '41800070', 'w'),
(2, '41800070', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `internship_details`
--

CREATE TABLE `internship_details` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `company` varchar(100) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship_details`
--

INSERT INTO `internship_details` (`slno`, `ldapid`, `company`, `duration`) VALUES
(0, '41800070', 'q', '1'),
(1, '41800070', 'w', '2'),
(2, '41800070', 'e', '3');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `ldapid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll_number` varchar(8) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `present_addr` text NOT NULL,
  `permanent_addr` text NOT NULL,
  `dream_company` varchar(80) NOT NULL,
  `status` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`ldapid`, `name`, `roll_number`, `dob`, `degree`, `branch`, `semester`, `email`, `phone`, `present_addr`, `permanent_addr`, `dream_company`, `status`, `time_stamp`) VALUES
('41800070', 'Vikash Sharma', '41800070', '10/11/1995', 'Ph.D.', 'Liberal Arts', 5, 'vikash@iitbhilai.ac.in', '0904021814', 'Sejbahar, Old Dharamtari Road', 'Sejbahar, Old Dharamtari Road', 'IIT Bhilai', 0, '2019-03-01 12:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `positions_of_responsibility_details`
--

CREATE TABLE `positions_of_responsibility_details` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `position_held` varchar(100) NOT NULL,
  `period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions_of_responsibility_details`
--

INSERT INTO `positions_of_responsibility_details` (`slno`, `ldapid`, `position_held`, `period`) VALUES
(0, '41800070', 'q', '1'),
(1, '41800070', 'w', '2'),
(2, '41800070', 'e', '3');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`slno`, `ldapid`, `title`, `duration`) VALUES
(0, '41800070', 'q', '1'),
(1, '41800070', 'w', '2'),
(2, '41800070', 'e', '3');

-- --------------------------------------------------------

--
-- Table structure for table `resume_usr`
--

CREATE TABLE `resume_usr` (
  `slno` int(10) UNSIGNED NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `login_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume_usr`
--

INSERT INTO `resume_usr` (`slno`, `ldapid`, `login_timestamp`) VALUES
(1, '41800070', '2019-02-28 11:13:41'),
(2, '11640740', '2019-02-28 12:19:30'),
(3, '11640240', '2019-03-01 13:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `technical_skills_details`
--

CREATE TABLE `technical_skills_details` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `skill_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_skills_details`
--

INSERT INTO `technical_skills_details` (`slno`, `ldapid`, `skill_name`) VALUES
(0, '41800070', 'q'),
(1, '41800070', 'w'),
(2, '41800070', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `slno` int(11) NOT NULL,
  `ldapid` varchar(10) NOT NULL,
  `company` varchar(200) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`slno`, `ldapid`, `company`, `duration`) VALUES
(0, '41800070', 'q', '1'),
(1, '41800070', 'w', '2'),
(2, '41800070', 'e', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resume_usr`
--
ALTER TABLE `resume_usr`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `ldapid` (`ldapid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resume_usr`
--
ALTER TABLE `resume_usr`
  MODIFY `slno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
