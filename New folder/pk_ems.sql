-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 12:49 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pk_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_personal_info`
--

CREATE TABLE `employee_personal_info` (
  `id` varchar(15) DEFAULT NULL,
  `Name` varchar(60) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Adress` varchar(200) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Phone` varchar(16) DEFAULT NULL,
  `NID` varchar(30) DEFAULT NULL,
  `Image` blob,
  `Blood_group` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_personal_info`
--

INSERT INTO `employee_personal_info` (`id`, `Name`, `Date_of_Birth`, `Adress`, `Gender`, `Phone`, `NID`, `Image`, `Blood_group`) VALUES
('1234', 'Joynal Abedin', '0000-00-00', 'West panthapath', '', '+880-01234567', '123456', 0x726f6769655f736d616c6c2e706e67, ''),
('', 'Joynal Abedin', '0000-00-00', 'West panthapath', '', '+880-01234567', '123456', '', ''),
('567567', 'Joynal Abedin', '0000-00-00', 'West panthapath', 'Female', '+880-1688924365', '123456', '', 'O-'),
('53454', 'Joynal Abedin', '0000-00-00', 'West panthapath', 'Others', '+880-11234567', '123456', 0x726f6769655f736d616c6c2e706e67, 'AB+'),
('53456756', 'Joynal Ab', '0000-00-00', 'West panthapath', 'Male', '+880-234242342', '123456', 0x726f6769655f736d616c6c2e706e67, 'AB-'),
('97696786', 'Joyn', '1999-01-01', 'West panthapath', 'Male', '+880-123123123', '123456', 0x726f6769655f736d616c6c2e706e67, 'O-'),
('5413', 'Pranta', '1995-01-01', 'Noakhali', 'Male', '+880-16999322', '1234567', 0x705f6c6f616465722e676966, 'B+'),
('123456789', 'SK.', '1998-02-12', 'Mirpur', 'Male', '0192345678', '06868686', '', 'O+'),
('00679678567', 'shadin', '1098-12-12', 'Mirpur', 'Female', '019234567876', '534534534534', '', 'O+'),
('462346234623846', 'Partha', '1990-02-23', 'Mohakhali', 'Male', '0191827364', '4864236476234', 0x6265652e706e67, 'A-'),
('34234242446', 'Pranta ', '1995-06-11', 'West panthapath', 'Male', '+880-234242342', '426472647289', 0x494d475f30333935202832292e4a5047, 'O+'),
('123123123123', 'Joynal Abedin', '1999-01-01', 'West panthapath', 'Female', '', '534534534534', 0x313837313435332e6a7067, 'O+'),
('67879790980', 'Joynal A.', '1995-06-11', 'KL.', 'Male', '+880-11234567', '087968575', '', 'B-'),
('013024345435', 'Pranta', '1995-05-16', 'Chaumuhani,Noakhali', 'Male', '01689924385', '123456789', 0x757365722e706e67, 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `employee_professional_info`
--

CREATE TABLE `employee_professional_info` (
  `id` varchar(15) DEFAULT NULL,
  `Designation` varchar(30) DEFAULT NULL,
  `Department` varchar(30) DEFAULT NULL,
  `Joining_date` date DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL,
  `CV` blob,
  `Status` varchar(10) DEFAULT NULL,
  `Leave_date` date DEFAULT NULL,
  `Leave_reason` varchar(200) DEFAULT NULL,
  `Account_no` varchar(30) DEFAULT NULL,
  `leave_remaining` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_professional_info`
--

INSERT INTO `employee_professional_info` (`id`, `Designation`, `Department`, `Joining_date`, `Salary`, `CV`, `Status`, `Leave_date`, `Leave_reason`, `Account_no`, `leave_remaining`) VALUES
('1234', 'Mng', 'HR', NULL, 1000, NULL, 'Active', NULL, NULL, NULL, NULL),
('', '', '', NULL, 0, NULL, '1', NULL, NULL, NULL, NULL),
('567567', 'Mng', 'HR', NULL, 1000, NULL, '1', NULL, NULL, NULL, NULL),
('53454', 'Mng', 'HR', NULL, 1000, NULL, '2', NULL, NULL, NULL, NULL),
('53456756', 'Mng', 'HR', NULL, 543545, NULL, 'Active', NULL, NULL, NULL, NULL),
('97696786', 'ASS MNG', 'FG', NULL, 242342, NULL, 'Deactive', NULL, NULL, NULL, NULL),
('5413', 'CEO', 'CR', NULL, 200000, NULL, 'Active', NULL, NULL, NULL, NULL),
('123456789', 'MNG.', 'MNC', NULL, 110000, NULL, 'Active', NULL, NULL, NULL, NULL),
('00679678567', 'MNG.', 'MNC', NULL, 110000, NULL, 'Active', NULL, NULL, NULL, NULL),
('462346234623846', 'MNG.', 'MNC', NULL, 110000, NULL, 'Active', NULL, NULL, NULL, NULL),
('34234242446', 'ASS MNG', 'FG', '0000-00-00', 600000, NULL, 'Active', NULL, NULL, NULL, NULL),
('123123123123', '', '', '0000-00-00', 0, NULL, 'Deactive', NULL, NULL, NULL, NULL),
('67879790980', '', 'CR', '2008-06-11', 600000, NULL, 'Active', NULL, NULL, NULL, NULL),
('013024345435', 'UI dev', 'WebDev.', '2013-02-12', 1000000, NULL, 'Active', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `Email` varchar(60) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `Employee_id` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`Email`, `Password`, `Role`, `Employee_id`) VALUES
('prantabhuiyan@gmail.com', '3ec3baf3455d78bfa771616fd0713aaa', '1', ''),
('s1@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'Admin', '00679678567'),
('prantabhuiyan@gmail.com', '0290e7b65d931631bc954168f4b65299', 'Admin', '013024345435'),
('', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', '123123123123'),
('pkbhuiyan42@gmail.com', '8d4646eb2d7067126eb08adb0672f7bb', 'Dhaka', '1234'),
('s@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Employee', '123456789'),
('office@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '34234242446'),
('partha@me.com', '1a1dc91c907325c69271ddf0c944bc72', 'Employee', '462346234623846'),
('pkbhuiyan@gmail.com', '929a52841bbd77287a9d431099edb3db', '2', '53454'),
('i@gmail.com', '992cbd251bc69afd1e97afa5e26d7e4f', 'Employee', '53456756'),
('p@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', '5413'),
('prantabhuiyan@gmail.com', 'df01931bd3d5c9c1cf676cf8b4bc5a9f', '1', '567567'),
('', 'd41d8cd98f00b204e9800998ecf8427e', 'Employee', '67879790980'),
('pkbhuiyan@gmail.com', 'b50fc5d2ee76e5e2d2bfb3e18268caff', 'Employee', '97696786');

-- --------------------------------------------------------

--
-- Table structure for table `working_details`
--

CREATE TABLE `working_details` (
  `id` varchar(15) DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `working_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_personal_info`
--
ALTER TABLE `employee_personal_info`
  ADD KEY `id` (`id`);

--
-- Indexes for table `employee_professional_info`
--
ALTER TABLE `employee_professional_info`
  ADD KEY `id` (`id`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `working_details`
--
ALTER TABLE `working_details`
  ADD KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_personal_info`
--
ALTER TABLE `employee_personal_info`
  ADD CONSTRAINT `employee_personal_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_info` (`Employee_id`);

--
-- Constraints for table `employee_professional_info`
--
ALTER TABLE `employee_professional_info`
  ADD CONSTRAINT `employee_professional_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_info` (`Employee_id`);

--
-- Constraints for table `working_details`
--
ALTER TABLE `working_details`
  ADD CONSTRAINT `working_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_info` (`Employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
