-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 03:57 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct_mark`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `roll` varchar(6) NOT NULL,
  `a_mark` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`roll`, `a_mark`) VALUES
('140101', 10),
('150101', 8),
('150102', 9),
('150201', 8),
('160101', 6);

-- --------------------------------------------------------

--
-- Table structure for table `class_test`
--

CREATE TABLE `class_test` (
  `ID` int(11) NOT NULL,
  `roll` varchar(6) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_test`
--

INSERT INTO `class_test` (`ID`, `roll`, `number`, `mark`, `type`) VALUES
(1, '150101', 1, 8, 0),
(2, '150102', 1, 9, 0),
(3, '140101', 1, 9, 0),
(4, '150201', 1, 7, 0),
(5, '160101', 1, 6, 0),
(6, '150101', 1, 5, 1),
(7, '150102', 1, 5, 1),
(8, '150101', 1, 3, 2),
(9, '150102', 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` varchar(6) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `session` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`, `department`, `session`) VALUES
('140101', 'Md. Jahangir Hossain', 'CSE', '2013-14'),
('150101', 'Md. Mehedy Hasan', 'CSE', '2014-15'),
('150102', 'Md. Masum Billah', 'CSE', '2014-15'),
('150201', 'Md. Mayeen Ahmed', 'ETE', '2014-15'),
('160101', 'Md. Abir Khan', 'CSE', '2015-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `class_test`
--
ALTER TABLE `class_test`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `roll` (`roll`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_test`
--
ALTER TABLE `class_test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`roll`) REFERENCES `student` (`roll`);

--
-- Constraints for table `class_test`
--
ALTER TABLE `class_test`
  ADD CONSTRAINT `class_test_ibfk_1` FOREIGN KEY (`roll`) REFERENCES `student` (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
