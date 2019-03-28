-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 12:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
