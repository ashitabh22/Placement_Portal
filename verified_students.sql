-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 04:55 PM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
