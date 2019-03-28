-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 12:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
