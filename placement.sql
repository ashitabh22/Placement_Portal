-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2019 at 02:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE `academic_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `board` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `discipline` varchar(50) NOT NULL,
  `marks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_details`
--

INSERT INTO `academic_details` (`slno`, `ldapid`, `exam`, `board`, `year`, `discipline`, `marks`) VALUES
(1, 31900110, '12', '12', 1970, '24121', '2121'),
(2, 31900110, 'dfg', 'dgg', 1971, 'gdfgg', 'gdgf'),
(3, 41800060, 'Degree Examination', 'Degree Examination', 1993, 'Degree Examination', 'Degree Exa'),
(4, 41800060, 'Degree Examination', 'Degree Examination', 2011, 'Degree Examination', 'Degree Exa'),
(5, 91600070, 'DIPLOMA', 'SCTEVT', 1971, 'ETC', '65%'),
(6, 31900020, 'BE', 'CSVTU', 2009, 'CSE', '75'),
(7, 61900020, 'Higher Secondary', 'CBSE', 2005, 'PCM', '65'),
(8, 61900020, 'Senior Secondary', 'CBSE', 2007, 'COMMERCE', '70'),
(9, 61900020, 'BCOM', 'RTMNU', 2010, 'COMMERCE', '58'),
(10, 41800070, 'B.Tech', 'BPUT', 2017, 'CSE', '7.10'),
(11, 41800070, 'intermediate', 'CHSE', 2013, 'PCME', '60.05%'),
(12, 41800070, 'matriculation', 'BSEB', 2011, 'All', '61.43%');

-- --------------------------------------------------------

--
-- Table structure for table `achievement_details`
--

CREATE TABLE `achievement_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `achievement` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievement_details`
--

INSERT INTO `achievement_details` (`slno`, `ldapid`, `achievement`, `year`) VALUES
(1, 31900110, 'dfgfd', '4444'),
(2, 31900110, 'dgdgd', '67676'),
(3, 41800060, 'Degree Examination', '2102'),
(4, 91600070, 'JKLWJLK', '2010'),
(5, 91600070, 'VSWSB', '2011'),
(6, 31900020, 'NCC', '2010'),
(7, 41800070, 'BEC', '2015'),
(8, 41800070, 'HPCAS', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `all_jobs`
--

CREATE TABLE `all_jobs` (
  `company_name` text NOT NULL,
  `job_title` text NOT NULL,
  `job_description` text NOT NULL,
  `cgpa_requirement` float NOT NULL,
  `program` text NOT NULL,
  `branch` text NOT NULL,
  `application_period` date NOT NULL,
  `min_package_offered` bigint(20) NOT NULL,
  `number_of_posts` int(11) NOT NULL,
  `ppt_date` date NOT NULL,
  `test_date` date NOT NULL,
  `interview_date` date NOT NULL,
  `shortlisting_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_jobs`
--

INSERT INTO `all_jobs` (`company_name`, `job_title`, `job_description`, `cgpa_requirement`, `program`, `branch`, `application_period`, `min_package_offered`, `number_of_posts`, `ppt_date`, `test_date`, `interview_date`, `shortlisting_date`) VALUES
('google', 'software developer', 'python, java required', 8, 'B.tech', 'CSE', '2019-03-26', 10000000, 3, '2019-03-12', '2019-03-13', '2019-03-29', '2019-03-14'),
('Microsoft', 'web developer', 'back end and front end ', 8, 'B.tech', 'Any branch', '2019-03-20', 1000000, 2, '2019-03-06', '2019-03-20', '2019-03-13', '2019-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `applicable_jobs`
--

CREATE TABLE `applicable_jobs` (
  `company_name` int(11) NOT NULL,
  `job_title` text NOT NULL,
  `job_description` text NOT NULL,
  `cgpa_requirement` double(10,0) NOT NULL,
  `program` text NOT NULL,
  `branch` text NOT NULL,
  `application_period` text NOT NULL,
  `minimum_package_offered` bigint(20) NOT NULL,
  `number_of_posts` decimal(10,0) NOT NULL,
  `ppt_data` date NOT NULL,
  `test_date` date NOT NULL,
  `interview_date` date NOT NULL,
  `shortlisting_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicable_jobs`
--

INSERT INTO `applicable_jobs` (`company_name`, `job_title`, `job_description`, `cgpa_requirement`, `program`, `branch`, `application_period`, `minimum_package_offered`, `number_of_posts`, `ppt_data`, `test_date`, `interview_date`, `shortlisting_date`, `status`) VALUES
(1, 'job title 1', 'job description 1', 8, 'program 1', 'branch 1', 'applicaton perid 1', 0, '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1),
(2, 'job title 2', 'job 2', 7, 'program 2', 'branch 2', 'applicaton perid 2', 1, '5', '2019-03-12', '2019-03-14', '2019-03-16', '2019-03-18', 1),
(3, 'job title 3', 'job description 3', 0, 'program 3', 'branch 3', 'applicaton perid 3', 0, '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `AppliedStudents`
--

CREATE TABLE `AppliedStudents` (
  `sr` int(11) NOT NULL,
  `ldap` varchar(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AppliedStudents`
--

INSERT INTO `AppliedStudents` (`sr`, `ldap`, `status`) VALUES
(1, 'a1', '7'),
(2, 'a2', '7');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `company_name` varchar(20) NOT NULL,
  `job_title` text NOT NULL,
  `job_description` text NOT NULL,
  `cgpa_requirement` float NOT NULL,
  `program` text NOT NULL,
  `branch` text NOT NULL,
  `application_period` date NOT NULL,
  `minimum_package_offered` text NOT NULL,
  `number_of_posts` int(11) NOT NULL,
  `ppt_date` date NOT NULL,
  `test_date` date NOT NULL,
  `interview_date` date NOT NULL,
  `shortlisting_date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`company_name`, `job_title`, `job_description`, `cgpa_requirement`, `program`, `branch`, `application_period`, `minimum_package_offered`, `number_of_posts`, `ppt_date`, `test_date`, `interview_date`, `shortlisting_date`, `status`) VALUES
('facebook', 'Android Developer', 'this job is only for android  developer', 8, 'B.tech M.tech', 'CSE', '2019-04-02', '15LPA', 15, '2019-04-04', '2019-04-05', '2019-04-06', '2019-04-07', 'placed'),
('google', 'web developer', 'minimum cgpa requirement for this job is 7.5', 7.5, 'B.tech', 'CSE', '2019-03-30', '10LPA', 5, '2019-04-01', '2019-04-02', '2019-04-05', '2019-04-06', 'Shortlisted');

-- --------------------------------------------------------

--
-- Table structure for table `extra_curricular_activities_details`
--

CREATE TABLE `extra_curricular_activities_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_curricular_activities_details`
--

INSERT INTO `extra_curricular_activities_details` (`slno`, `ldapid`, `activity`) VALUES
(1, 31900110, '45545666'),
(2, 41800060, 'Degree Examination'),
(3, 91600070, 'DFGEGEGH'),
(4, 91600070, 'DFGEGEGH12'),
(5, 31900020, 'Badminton'),
(6, 41800070, 'Photoshop'),
(7, 41800070, 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `internship_details`
--

CREATE TABLE `internship_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `company` varchar(100) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship_details`
--

INSERT INTO `internship_details` (`slno`, `ldapid`, `company`, `duration`) VALUES
(1, 31900110, 'dggdfdfg', '646'),
(2, 31900110, 'dgddfg', '5446'),
(3, 41800060, 'Degree Examination', '3year'),
(4, 91600070, 'ABC', '2012'),
(5, 91600070, 'FSWGEDBBHEDHRE', '2013'),
(6, 31900020, 'CISCO', '1yrs'),
(7, 31900020, 'Redhat', '5yrs'),
(8, 61900020, 'SURDHENU FOODS  PVT LTD', '3 YRS'),
(9, 41800070, 'IISER', '1ysr'),
(10, 41800070, 'IIT', '1yrs');

-- --------------------------------------------------------

--
-- Table structure for table `is_admin`
--

CREATE TABLE `is_admin` (
  `ldapid` int(8) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_admin`
--

INSERT INTO `is_admin` (`ldapid`, `name`) VALUES
(31900120, 'Rudra Tiwari');

-- --------------------------------------------------------

--
-- Table structure for table `new_status`
--

CREATE TABLE `new_status` (
  `status_code` int(11) NOT NULL,
  `status_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_status`
--

INSERT INTO `new_status` (`status_code`, `status_name`) VALUES
(0, 'Applied'),
(1, 'Shortlisted'),
(2, 'Not Shortlisted'),
(3, 'Test Cleared'),
(4, 'Test Failed'),
(5, 'Selected For interview'),
(6, 'Job Cleared'),
(7, 'Rejected from Job');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `ldapid` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll_number` int(8) NOT NULL,
  `dob` date NOT NULL,
  `degree` varchar(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `present_addr` text NOT NULL,
  `permanent_addr` text NOT NULL,
  `dream_company` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`ldapid`, `name`, `roll_number`, `dob`, `degree`, `branch`, `semester`, `email`, `phone`, `present_addr`, `permanent_addr`, `dream_company`, `status`, `time_stamp`) VALUES
(31900020, 'Jagendra', 31900020, '1990-08-05', 'B.Tech', 'Electrical Engineering and Computer Science', 7, 'jagendra@iitbhilai.ac.in', '8527289853', 'IIT BHilai Raipur', 'IIT BHilai', ' Google', 2, '2019-03-12 11:08:21'),
(31900110, 'Shakib', 31900110, '1989-12-28', 'B.Tech', 'Electrical Engineering and Computer Science', 2, 'shakiba@iitbhilai.ac.in', '9074673961', 'IIT Bhilai', 'IIT Bhilai', 'IIT Bhilai', 2, '2019-03-12 11:12:18'),
(41800060, 'Harish Sahu', 41800060, '2019-03-10', 'M.Tech', 'Electrical Engineering and Computer Science', 5, 'sfsh@hfdsh.sdf', '9907934009', 'Raipur', 'Raipur', '', 2, '2019-03-12 11:12:02'),
(41800070, 'Vikash Sharma', 41800070, '1995-11-10', 'M.Tech', 'Electrical Engineering and Computer Science', 6, 'vikash@iitbhilai.ac.in', '0904021814', 'Sejbahar, Old Dharamtari Road', 'Sejbahar, Old Dharamtari Road', 'IIT Bhilai', 2, '2019-03-19 08:39:55'),
(61900020, 'k Aditya', 61900020, '1988-08-06', 'M.Tech', 'Electrical Engineering and Computer Science', 6, 'vikash@iitbhilai.ac.in', '0904021814', 'Sejbahar, Old Dharamtari Road', 'Sejbahar, Old Dharamtari Road', 'IIT Bhilai', 2, '2019-03-12 11:09:10'),
(91600070, 'suman kumar mahanta', 91600070, '2019-03-19', 'B.Tech', 'Electrical Engineering and Computer Science', 1, 'suman@iitbhilai.ac.in', '7008406241', 'Sejbahar', 'Sejbahar', 'IIT Bhilai', 2, '2019-03-12 10:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `positions_of_responsibility_details`
--

CREATE TABLE `positions_of_responsibility_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `position_held` varchar(100) NOT NULL,
  `period` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions_of_responsibility_details`
--

INSERT INTO `positions_of_responsibility_details` (`slno`, `ldapid`, `position_held`, `period`) VALUES
(1, 31900110, '546565', '56455'),
(2, 41800060, 'Degree Examination', 'Degree Examination'),
(3, 91600070, 'ENGINEER', '2014'),
(4, 91600070, 'SFWGEGWETW', '2015'),
(5, 31900020, 'Network Engineer', '6yrs'),
(6, 61900020, 'ACCOUNTS HO', '3 YRS'),
(7, 41800070, 'Web Dev', '1 year'),
(8, 41800070, 'Web Programmer', '1 Year');

-- --------------------------------------------------------

--
-- Table structure for table `posted_jobs`
--

CREATE TABLE `posted_jobs` (
  `company_id` varchar(50) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `cgpa_requirements` double(4,2) NOT NULL,
  `program` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `application_period` date NOT NULL,
  `minimum_package_offered` varchar(20) NOT NULL,
  `number_of_posts` int(11) NOT NULL,
  `interview_date` date NOT NULL,
  `ppt_date` date NOT NULL,
  `test_date` date NOT NULL,
  `shortlisting_date` date NOT NULL,
  `academic_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_jobs`
--

INSERT INTO `posted_jobs` (`company_id`, `job_title`, `job_description`, `cgpa_requirements`, `program`, `branch`, `application_period`, `minimum_package_offered`, `number_of_posts`, `interview_date`, `ppt_date`, `test_date`, `shortlisting_date`, `academic_year`) VALUES
('abgj233', 'wergfjhty', 'dgjdb\r\ndqwafb', 8.00, 'B.Tech', 'CSE/EE', '2019-04-30', '450000', 9, '2019-03-29', '2019-03-25', '2019-03-26', '2019-03-30', 2019),
('DEF658', 'DEF', 'JKHSD\r\n', 7.50, 'B.Tech', 'EE/CSE', '2019-03-16', '600000', 15, '2019-03-27', '2019-03-19', '2019-03-22', '2019-03-29', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `title` varchar(500) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`slno`, `ldapid`, `title`, `duration`) VALUES
(1, 31900110, '45654', '464565'),
(2, 31900110, '4566556', '645454'),
(3, 41800060, 'Degree Examination', '5fs'),
(4, 91600070, 'REGTETER', '2018'),
(5, 91600070, 'REGWEGTEW', '2019'),
(6, 31900020, 'Infra Deployment', '5'),
(7, 41800070, 'HPCAS', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `registered_companies`
--

CREATE TABLE `registered_companies` (
  `company_id` varchar(10) NOT NULL,
  `company_name` text NOT NULL,
  `email` text NOT NULL,
  `point_of_contact` text NOT NULL,
  `mobile` int(12) NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `about` text NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_companies`
--

INSERT INTO `registered_companies` (`company_id`, `company_name`, `email`, `point_of_contact`, `mobile`, `address`, `website`, `about`, `designation`) VALUES
('10001', 'DEF', 'def@gmail.com', 'lfkgnlsfkhg', 283746253, '45 lkfdfjps, sdifjgosjig, sjdzfoijgd .', 'erioidrotieurt.com', 'dlkfgjaeijrt, aoiwsrfois, asirjtpairjt.', 'oiesrtowsihgo'),
('10002', 'GHI', 'ghi@gmail.com', 'kljszdfkldf', 134235345, 'arjfoairef, hdfogidofg, oiiajroigjap.', 'akljhfolshdfolasdf.com', 'uaierfhoiahfbkbj akjsdfga jaklwlfkj.', 'ioidfjgksdg');

-- --------------------------------------------------------

--
-- Table structure for table `resume_usr`
--

CREATE TABLE `resume_usr` (
  `ldapid` int(8) NOT NULL,
  `login_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume_usr`
--

INSERT INTO `resume_usr` (`ldapid`, `login_timestamp`) VALUES
(11640680, '2019-03-19 09:35:40'),
(11740320, '2019-03-07 09:29:37'),
(11740860, '2019-03-07 09:29:48'),
(31900020, '2019-03-11 07:59:03'),
(31900110, '2019-03-12 10:48:57'),
(41800060, '2019-03-11 06:46:09'),
(41800070, '2019-03-08 05:34:12'),
(61900020, '2019-03-12 11:03:19'),
(71800160, '2019-03-12 12:31:21'),
(91600070, '2019-03-12 10:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `code` int(1) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `color_label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`code`, `status_name`, `color_label`) VALUES
(0, 'Resume Being Built', 'default'),
(1, 'Unverified Resume', 'warning'),
(2, 'Verified Resume', 'success'),
(3, 'Out of Placement', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `technical_skills_details`
--

CREATE TABLE `technical_skills_details` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `skill_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_skills_details`
--

INSERT INTO `technical_skills_details` (`slno`, `ldapid`, `skill_name`) VALUES
(1, 31900110, 'gdgfdgf'),
(2, 31900110, 'dggfdfggdgf'),
(3, 41800060, 'Degree Examination2'),
(4, 91600070, 'FDGEGERHEGHWEG'),
(5, 91600070, 'NETWORK ENGINEER'),
(6, 31900020, 'CCNA'),
(7, 41800070, 'C'),
(8, 41800070, 'C++'),
(9, 41800070, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `unverified_students`
--

CREATE TABLE `unverified_students` (
  `name` text NOT NULL,
  `semester` varchar(10) NOT NULL,
  `student_id` int(8) NOT NULL,
  `discipline` text NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `contact_1` bigint(10) NOT NULL,
  `contact_2` bigint(10) NOT NULL,
  `program` varchar(40) NOT NULL,
  `cgpa` float NOT NULL,
  `xii_school` varchar(40) NOT NULL,
  `xii_percentage` varchar(7) NOT NULL,
  `x_school` varchar(40) NOT NULL,
  `x_percentage` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unverified_students`
--

INSERT INTO `unverified_students` (`name`, `semester`, `student_id`, `discipline`, `email_id`, `age`, `contact_1`, `contact_2`, `program`, `cgpa`, `xii_school`, `xii_percentage`, `x_school`, `x_percentage`) VALUES
('John Farnandis', '2018-19 W', 11640390, 'Computer Science and Engineering', 'johnf@iitbhilai.ac.in', 21, 5599771166, 5558884963, 'Bachelor of Technology', 7.2, 'St. Mary School', '85.2', 'St. Mary School', '9.8'),
('Lily Susan', '2018-19 W', 11640370, 'Computer Science and Engineering', 'lilys@iitbhilai.ac.in', 22, 2159876654, 4499632596, 'Bachelor of Technology', 8, 'St. Joseph School, Agra', '96.2', 'St. Mary School', '8.2'),
('Alice', '2018-19 W', 11640870, 'Electrical Engineering', 'alice@iitbhilai.ac.in', 22, 8776958476, 6659877456, 'Bachelor of Technology', 7.6, 'Army School, Delhi', '72.4', 'St. Mary School', '9.3');

-- --------------------------------------------------------

--
-- Table structure for table `verified_students`
--

CREATE TABLE `verified_students` (
  `name` text COLLATE utf16_bin NOT NULL,
  `semester` varchar(20) COLLATE utf16_bin NOT NULL,
  `student_id` int(8) NOT NULL,
  `discipline` text COLLATE utf16_bin NOT NULL,
  `email_id` varchar(20) COLLATE utf16_bin NOT NULL,
  `age` int(2) NOT NULL,
  `contact_1` bigint(10) NOT NULL,
  `contact_2` bigint(10) NOT NULL,
  `program` varchar(40) COLLATE utf16_bin NOT NULL,
  `cgpa` float NOT NULL,
  `xii_school` varchar(40) COLLATE utf16_bin NOT NULL,
  `xii_percentage` float NOT NULL,
  `x_school` varchar(40) COLLATE utf16_bin NOT NULL,
  `x_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `verified_students`
--

INSERT INTO `verified_students` (`name`, `semester`, `student_id`, `discipline`, `email_id`, `age`, `contact_1`, `contact_2`, `program`, `cgpa`, `xii_school`, `xii_percentage`, `x_school`, `x_percentage`) VALUES
('John Fernandis', '2018-19 W', 11640390, 'Computer Science and Engineering', 'johnf@iitbhilai.ac.i', 20, 1115975135, 2111111111, 'Bachelor of Technology', 7.2, 'St. Mary School', 85.2, 'St.Mary School', 9.8),
('John Fernandis', '2018-19 W', 11640390, 'Computer Science and Engineering', 'johnf@iitbhilai.ac.i', 20, 1115975135, 2111111111, 'Bachelor of Technology', 7.2, 'St. Mary School', 85.2, 'St.Mary School', 9.8),
('Lily Susan', '2018-19 W', 11640370, 'Computer Science and Engineering', 'lilys@iitbhilai.ac.i', 22, 4987526364, 4447599843, 'Bachelor of Technology', 8, 'St. Joseph School, Agra', 96.2, 'St. Joseph School, Agra', 8.2),
('Alice', '2018-19 W', 11640870, 'Electrical Engineering', 'alice@iitbhilai.ac.i', 21, 4477998877, 1144559988, 'Bachelor of Technology', 7.6, 'Army School, Delhi', 72.4, 'Army School. Delhi', 9.3),
('Bob', '2018-19 W', 11640710, 'Mechanical Engineering', 'bob@iitbhilai.ac.in', 21, 4422668754, 1497536842, 'Bachelor of Technology', 7.8, 'SGNSSS, Shimla', 82.4, 'SGNSSS, Shimla', 9.6),
('Alexa', '2018-19 W', 11640980, 'Mechanical Engineering', 'alexa@iitbhilai.ac.i', 19, 1199776611, 1236587496, 'Bachelor of Technology', 9.8, 'Sainik School, Patna', 99.2, 'Sainik School, Patna', 10),
('Cortona', '2018-19 W', 11640170, 'Mechanical Engineering', 'cortona@iitbhilai.ac', 23, 9568743696, 5996358742, 'Bachelor of Technology', 6.2, 'DAV School, Jaipur', 76, 'DAV School, Jaipur', 8);

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `slno` int(10) NOT NULL,
  `ldapid` int(8) NOT NULL,
  `company` varchar(200) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`slno`, `ldapid`, `company`, `duration`) VALUES
(1, 31900110, '654565', '456456'),
(2, 31900110, 'dfgdgdf', '65645'),
(3, 41800060, 'Degree Examination', '5gv'),
(4, 91600070, 'ERGERGTEGTETG', '2016'),
(5, 91600070, 'IITBHILAI', '2017'),
(6, 31900020, 'CISCO', '1'),
(7, 31900020, 'redhat', '5'),
(8, 41800070, 'IIT Bhilai', '3 montha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_details`
--
ALTER TABLE `academic_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `achievement_details`
--
ALTER TABLE `achievement_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `applicable_jobs`
--
ALTER TABLE `applicable_jobs`
  ADD PRIMARY KEY (`company_name`);

--
-- Indexes for table `AppliedStudents`
--
ALTER TABLE `AppliedStudents`
  ADD PRIMARY KEY (`ldap`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`company_name`);

--
-- Indexes for table `extra_curricular_activities_details`
--
ALTER TABLE `extra_curricular_activities_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `is_admin`
--
ALTER TABLE `is_admin`
  ADD PRIMARY KEY (`ldapid`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`ldapid`);

--
-- Indexes for table `positions_of_responsibility_details`
--
ALTER TABLE `positions_of_responsibility_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `registered_companies`
--
ALTER TABLE `registered_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `resume_usr`
--
ALTER TABLE `resume_usr`
  ADD PRIMARY KEY (`ldapid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `status_name` (`status_name`);

--
-- Indexes for table `technical_skills_details`
--
ALTER TABLE `technical_skills_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_details`
--
ALTER TABLE `academic_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `achievement_details`
--
ALTER TABLE `achievement_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `extra_curricular_activities_details`
--
ALTER TABLE `extra_curricular_activities_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `internship_details`
--
ALTER TABLE `internship_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `positions_of_responsibility_details`
--
ALTER TABLE `positions_of_responsibility_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `technical_skills_details`
--
ALTER TABLE `technical_skills_details`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_details`
--
ALTER TABLE `academic_details`
  ADD CONSTRAINT `academic_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `achievement_details`
--
ALTER TABLE `achievement_details`
  ADD CONSTRAINT `achievement_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`),
  ADD CONSTRAINT `achievement_details_ibfk_2` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `extra_curricular_activities_details`
--
ALTER TABLE `extra_curricular_activities_details`
  ADD CONSTRAINT `extra_curricular_activities_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD CONSTRAINT `internship_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `personal_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`),
  ADD CONSTRAINT `personal_details_ibfk_2` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `positions_of_responsibility_details`
--
ALTER TABLE `positions_of_responsibility_details`
  ADD CONSTRAINT `positions_of_responsibility_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `technical_skills_details`
--
ALTER TABLE `technical_skills_details`
  ADD CONSTRAINT `technical_skills_details_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_ibfk_1` FOREIGN KEY (`ldapid`) REFERENCES `resume_usr` (`ldapid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
