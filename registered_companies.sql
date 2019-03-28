-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 05:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

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
-- Table structure for table `Registered Companies`
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
-- Dumping data for table `Registered Companies`
--

INSERT INTO `registered_companies` (`company_id`, `company_name`, `email`, `point_of_contact`, `mobile`, `address`, `website`, `about`, `designation`) VALUES
('10000', 'ABC', 'abc@gmail.com', 'lajkdfh', 128345432, 'sdfkjlskdfn, zlkdfglf, lkjfzls 23', 'akjfgklzjdfk.com', 'iaoertj sdjfg ckkxf ioroi zdfjgid fdigho kjn.', 'ksjdfk'),
('10001', 'DEF', 'def@gmail.com', 'lfkgnlsfkhg', 283746253, '45 lkfdfjps, sdifjgosjig, sjdzfoijgd .', 'erioidrotieurt.com', 'dlkfgjaeijrt, aoiwsrfois, asirjtpairjt.', 'oiesrtowsihgo'),
('10002', 'GHI', 'ghi@gmail.com', 'kljszdfkldf', 134235345, 'arjfoairef, hdfogidofg, oiiajroigjap.', 'akljhfolshdfolasdf.com', 'uaierfhoiahfbkbj akjsdfga jaklwlfkj.', 'ioidfjgksdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Registered Companies`
--
ALTER TABLE `registered_companies`
  ADD PRIMARY KEY (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
