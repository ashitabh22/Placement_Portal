-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 07:16 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`company_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
