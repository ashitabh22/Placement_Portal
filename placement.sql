-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2019 at 05:34 PM
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
(12, 41800070, 'matriculation', 'BSEB', 2011, 'All', '61.43%'),
(13, 11640680, 'B.teck', 'IIT Bhilai', 2017, 'cse', '7.5');

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
-- Table structure for table `applicable_jobs`
--

CREATE TABLE `applicable_jobs` (
  `ldapid` int(8) DEFAULT NULL,
  `has_applied` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archived_companies`
--

CREATE TABLE `archived_companies` (
  `company_id` varchar(10) NOT NULL,
  `company_name` text NOT NULL,
  `email` text NOT NULL,
  `point_of_contact` text NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` text NOT NULL,
  `website` text NOT NULL,
  `about` text NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archived_companies`
--

INSERT INTO `archived_companies` (`company_id`, `company_name`, `email`, `point_of_contact`, `mobile`, `address`, `website`, `about`, `designation`) VALUES
('1', 'ABC', 'alpha@gmail.com', 'director', 1255155987, 'fweuivgwdjbvcwiocnwdochwdon ', 'www.fffffff.com', 'wfwriovucbkjwdcngdwcbn', 'frdwcxdswd'),
('2', 'GHI', 'ghi@gmail.com', 'kljszdfkldf', 134235345, 'arjfoairef, hdfogidofg, oiiajroigjap.', 'akljhfolshdfolasdf.com', 'uaierfhoiahfbkbj akjsdfga jaklwlfkj.', 'ioidfjgksdg'),
('3', 'FGH', 'fgh@gmail.com', '643512', 456132, 'olikugyjSATD', 'www.fgh.com', 'oiugyghlk', 'ihugyftdhc'),
('4', 'IJK', 'iukyjthd', '94562312', 95622, 'posiukdysf', 'www.ijk.com', 'iukgaySj', 'oilugsadysv');

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
(11640680, 'Pradeep Kumar', 11640680, '2019-03-19', 'B.Tech', 'Electrical Engineering and Computer Science', 7, 'pradeepk@iitbhilai.ac.in', '7004109457', '', '', '', 2, '2019-04-01 06:19:20'),
(31900020, 'Jagendra', 31900020, '1990-08-05', 'B.Tech', 'Electrical Engineering and Computer Science', 7, 'jagendra@iitbhilai.ac.in', '8527289853', 'IIT BHilai Raipur', 'IIT BHilai', ' Google', 2, '2019-03-12 11:08:21'),
(31900110, 'Shakib', 31900110, '1989-12-28', 'B.Tech', 'Electrical Engineering and Computer Science', 2, 'shakiba@iitbhilai.ac.in', '9074673961', 'IIT Bhilai', 'IIT Bhilai', 'IIT Bhilai', 2, '2019-03-12 11:12:18'),
(41800060, 'Harish Sahu', 41800060, '2019-03-10', 'M.Tech', 'Electrical Engineering and Computer Science', 5, 'sfsh@hfdsh.sdf', '9907934009', 'Raipur', 'Raipur', '', 2, '2019-03-12 11:12:02'),
(41800070, 'Vikash Sharma', 41800070, '1995-11-10', 'M.Tech', 'Electrical Engineering and Computer Science', 6, 'vikash@iitbhilai.ac.in', '0904021814', 'Sejbahar, Old Dharamtari Road', 'Sejbahar, Old Dharamtari Road', 'IIT Bhilai', 1, '2019-04-02 06:52:33'),
(61900020, 'k Aditya', 61900020, '1988-08-06', 'M.Tech', 'Electrical Engineering and Computer Science', 6, 'vikash@iitbhilai.ac.in', '0904021814', 'Sejbahar, Old Dharamtari Road', 'Sejbahar, Old Dharamtari Road', 'IIT Bhilai', 2, '2019-03-12 11:09:10'),
(91600070, 'suman kumar mahanta', 91600070, '2019-03-19', 'B.Tech', 'Electrical Engineering and Computer Science', 1, 'suman@iitbhilai.ac.in', '7008406241', 'Sejbahar', 'Sejbahar', 'IIT Bhilai', 2, '2019-03-12 10:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `placement_status`
--

CREATE TABLE `placement_status` (
  `ldapid` int(8) DEFAULT NULL,
  `upload` text,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `ppt_list`
--

CREATE TABLE `ppt_list` (
  `ldapid` varchar(30) NOT NULL,
  `c4_2019-03-30` int(11) NOT NULL,
  `DEF_2019-03-18` varchar(40) DEFAULT NULL,
  `DEF_2019-03-19` varchar(40) DEFAULT NULL,
  `DEF_2019-03-31` varchar(40) DEFAULT NULL,
  `DEF_2019-03-15` varchar(40) DEFAULT NULL,
  `IJK_2019-04-01` varchar(40) DEFAULT NULL,
  `KLM_2019-04-16` varchar(40) DEFAULT NULL,
  `IJK_2019-04-23` varchar(40) DEFAULT NULL,
  `IJK_2019-04-19` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppt_list`
--

INSERT INTO `ppt_list` (`ldapid`, `c4_2019-03-30`, `DEF_2019-03-18`, `DEF_2019-03-19`, `DEF_2019-03-31`, `DEF_2019-03-15`, `IJK_2019-04-01`, `KLM_2019-04-16`, `IJK_2019-04-23`, `IJK_2019-04-19`) VALUES
('31900020', 0, '0', '1', '1', '1', '0', NULL, NULL, NULL),
('31900110', 0, '0', '0', '1', '1', '1', NULL, NULL, NULL),
('41800060', 1, '1', '1', '1', '1', '0', NULL, NULL, NULL),
('41800070', 1, '0', '0', '1', '1', '0', NULL, NULL, NULL),
('61900020', 1, '1', '1', '1', '1', '0', NULL, NULL, NULL),
('91600070', 0, '1', '0', '0', '1', '0', NULL, NULL, NULL);

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
  `company_id` int(30) NOT NULL,
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
(1, 'CRB TECH SOLUTIONS', 'crbtech@yahoo.com', 'phone/email', 21431245, 'Bhopal, Madhya Pradesh', 'www.crbtechsolutions.com', 'akjsfggkjsabdf', 'HR'),
(2, 'AMBC', 'ambc@gmail.com', 'email/phone', 123451425, 'XYZ Street, New Delhi', 'ambc.com', 'segfserger', 'HR'),
(3, 'SS World InfoTech', 'ssworld@hotmail.com', 'phone/ email', 12343452, 'New Delhi', 'www.ssworld.com', 'lalalala', 'HR'),
(4, 'Micro Academy India', 'macademy@gmail.com', 'phone', 2341223, 'Here', 'www.macademy.com', 'ertwer', 'HR3'),
(5, 'Reliance', 'rel@ert.com', 'Pradeep', 56565656, 'adgafa sahsga%%$$$', 'www.reliance.com', 'We are good', 'HR '),
(6, 'comp1', 'email1', 'p1', 1341234, 'address 1', 'www.somem. com', 'about 6', 'HR 6'),
(7, '3I Infotech', 'infotech3@outlook.com', 'phone/email', 1234324, 'Nagpur, Maharashtra', 'infotech.com', 'We are just great', 'HR7'),
(8, 'Split Vision Technologies', 'splitvision@rediffmail.com', 'phone/landline/fax', 12341, 'Jaipur, Rajasthan', 'www.splitvision.co.in', 'hfasdofasjfb', 'HR8'),
(9, 'Digitech Solutions', 'digitech@hotmail.com', 'email', 123434, 'xyz street, Mumbai', 'www.digitech.com', 'erferf', 'HR9'),
(10, 'Aspire technology', 'aspire@hotmail.com', 'phone/email', 134134213, 'Jodhpur, Rajasthan', 'digitech.com', 'sergfedgfr', 'HR10');

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
(0, '2019-04-02 15:25:25'),
(11640680, '2019-03-19 09:35:40'),
(11740160, '2019-04-01 17:34:57'),
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
(3, 'Out of Placement', 'default'),
(4, 'Applied', 'default'),
(5, 'Shortlisted', 'default'),
(6, 'Not Shortlisted', 'default'),
(7, 'Test cleared', 'default'),
(8, 'Test failed', 'default'),
(9, 'Selected for Interview', 'default'),
(10, 'Job cleared', 'default'),
(11, 'Rejected from Job', 'default');

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
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `archived_companies`
--
ALTER TABLE `archived_companies`
  ADD PRIMARY KEY (`company_id`);

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
-- Indexes for table `placement_status`
--
ALTER TABLE `placement_status`
  ADD KEY `ldapid` (`ldapid`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `positions_of_responsibility_details`
--
ALTER TABLE `positions_of_responsibility_details`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `ldapid` (`ldapid`);

--
-- Indexes for table `ppt_list`
--
ALTER TABLE `ppt_list`
  ADD PRIMARY KEY (`ldapid`);

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
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
