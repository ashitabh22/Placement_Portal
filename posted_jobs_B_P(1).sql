-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2019 at 06:52 AM
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
-- Table structure for table `posted_jobs_B_P`
--

CREATE TABLE `posted_jobs_B_P` (
  `post_id` int(11) NOT NULL,
  `branch_code` int(11) NOT NULL,
  `program_code` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_jobs_B_P`
--

INSERT INTO `posted_jobs_B_P` (`post_id`, `branch_code`, `program_code`, `company_id`) VALUES
(2, 0, 0, 7),
(3, 1, 1, 1),
(4, 1, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
