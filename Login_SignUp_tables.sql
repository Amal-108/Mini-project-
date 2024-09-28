-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Sep 28, 2024 at 06:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
('UCE', 'BACE'),
('UBB', 'BBA'),
('UBC', 'BCA'),
('UBM', 'Bcom'),
('USW', 'BSW'),
('UEC', 'Economics'),
('UMA', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `StudentID` int(11) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Batch` varchar(20) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`StudentID`, `Department`, `Year`, `Batch`, `Section`) VALUES
(1, 'BCA', 3, '2022-26', 'A'),
(3, 'BCA', 3, '2022-26', 'A'),
(5, 'Bcom', 4, '2025-29', 'C'),
(6, 'BBA', 1, '2023-27', 'B'),
(8, 'Bcom', 1, '2022-26', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `supervisordetails`
--

CREATE TABLE `supervisordetails` (
  `SupervisorID` int(11) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisordetails`
--

INSERT INTO `supervisordetails` (`SupervisorID`, `Department`) VALUES
(2, 'Bcom'),
(7, 'UBC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `UserType` enum('supervisor','student') DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Firstname`, `Lastname`, `Email`, `Phone`, `Username`, `PasswordHash`, `UserType`, `Gender`) VALUES
(1, 'Amal', 'Biju', 'amalbijusebastian@gmail.com', '8075070580', '22UBC108', '$2y$10$FafY2UuTgZuuzWZw0IOJSuWF9nyAc/RpkSKFkUhd6KPjNz2lgK7D.', 'student', 'Male'),
(2, 'Arun', 'Kumar', 'arun2421@gmail.com', '9075070680', 'Arun', '$2y$10$U1jSDp.R//RfsMfTr6w4H.yFRyiOpuWB.wGVWhXmRp8ip0LxkaBDW', 'supervisor', 'Male'),
(3, 'Ajay', 'Kiran', 'ajaykiran@gmail.com', '7765654453', '22UBC103', '$2y$10$DrMy/xwOa/5tjVrGnSwoZu8Ohe3/Hh227vDS6jQPug6qzi8mPjeV6', 'student', 'Male'),
(5, 'Arun', 'hgtf', 'arnoldbenny@gmail.com', '7765654453', '22UBM108', '$2y$10$OmPOjqINudCVJLcpcsRSUOkvVu4yMY9byaZOm6e996BIuNmziYdbK', 'student', 'Male'),
(6, 'Sebin', 'Thomas', 'sebinthomas@gmail.com', '9887675466', '22UBB120', '$2y$10$joMcuhao2HcePmJ6R7ikkeO15IyjB9R8KEwvi80VNogcCLkHvEOJK', 'student', 'Male'),
(7, 'tyuktyukr', 'Biju', 'amalhrhew@gmail.com', '8075070580', 'dyyjetyje', '$2y$10$YTt79nxjsF//VL0QOr.pDOsreRAnbS0N4MCGUeJLmf.5VHQ4ciPwG', 'supervisor', 'Male'),
(8, 'Amal', 'Baby', 'fvafvkiran@gmail.com', '6576656789', '22UBB116', '$2y$10$zi634.iPw7DsUigvpPanDeYQFs2wodeuuaF5pSJHyjVdUS1Q2wzl2', 'student', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `supervisordetails`
--
ALTER TABLE `supervisordetails`
  ADD KEY `SupervisorID` (`SupervisorID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `supervisordetails`
--
ALTER TABLE `supervisordetails`
  ADD CONSTRAINT `supervisordetails_ibfk_1` FOREIGN KEY (`SupervisorID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
