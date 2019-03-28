-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 04:55 PM
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
('abc233', 'werty', 'dgjb\r\ndafb', 9.60, 'B.Tech', 'CSE', '2019-03-30', '400000', 21, '2019-03-29', '2019-03-25', '2019-03-26', '2019-03-30', 2019),
('abgj233', 'wergfjhty', 'dgjdb\r\ndqwafb', 8.00, 'B.Tech', 'CSE/EE', '2019-04-30', '450000', 9, '2019-03-29', '2019-03-25', '2019-03-26', '2019-03-30', 2019),
('DEF658', 'DEF', 'JKHSD\r\n', 7.50, 'B.Tech', 'EE/CSE', '2019-03-16', '600000', 15, '2019-03-27', '2019-03-19', '2019-03-22', '2019-03-29', 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
