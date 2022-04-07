-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 12:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `user_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `email`, `user_name`) VALUES
(1, 'christineantoy12@gmail.com', 'Christine');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `holiday` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `holiday_info` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `color` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `date`, `holiday`, `holiday_info`, `color`) VALUES
(1, '2022-08-21', 'Public Holiday', 'Ninoy Aquino Day', 'Red'),
(2, '2022-08-29', 'Public Holiday', 'National Heroes Day', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `header` text NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`ID`, `header`, `body`, `date`) VALUES
(2, 'Test Note', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod dignissimos ipsam quidem minima, assumenda velit optio a voluptatum praesentium expedita quia, cumque sit quo ipsa aliquam temporibus deserunt ullam? Tempora!\r\n', '2022-04-03 13:04:17'),
(4, 'Hello', 'World\n> asd', '2022-04-03 18:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `ID` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `contact_number` text NOT NULL,
  `child_lrn` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `profile_image` text NOT NULL,
  `initial` tinyint(1) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`ID`, `last_name`, `first_name`, `middle_name`, `contact_number`, `child_lrn`, `password`, `active`, `reset`, `profile_image`, `initial`, `theme`) VALUES
(1, 'Dela Cruz', 'Juana', 'Manuel', '09056720119', '123456789', '12345678', 1, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reset_requests`
--

CREATE TABLE `reset_requests` (
  `ID` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_requests`
--

INSERT INTO `reset_requests` (`ID`, `role`, `role_id`, `active`, `date`) VALUES
(4, 'teacher', 1, 1, '2022-04-01 20:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `ID` int(11) NOT NULL,
  `section` text NOT NULL,
  `grade` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `LRN` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grade_level` int(2) NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `profile_image` text NOT NULL,
  `initial` tinyint(1) NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `last_name`, `first_name`, `middle_name`, `LRN`, `password`, `grade_level`, `section`, `active`, `reset`, `profile_image`, `initial`, `theme`) VALUES
(1, 'Dela Cruz', 'Juan', 'Manuel', '123456789', '12345678', 10, 'B', 1, 0, '', 1, ''),
(2, 'Balanay', 'Kyle Jeremy', 'Llamelo', '123456788', '12345678', 11, 'A', 1, 0, '', 1, ''),
(3, 'Geslani', 'Darrel', 'Bayaras', '123456787', '12345678', 12, 'C', 1, 0, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `ID` int(11) NOT NULL,
  `lrn` int(25) NOT NULL,
  `activity_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `subject_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `time` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `grade_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `subject_name`, `time`, `grade_level`) VALUES
(1, 'English', '7:00 - 8:00', 10),
(2, 'Filipino', '9:00 - 10:00', 9),
(3, 'Science', '11:00 - 12:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subject_activity`
--

CREATE TABLE `subject_activity` (
  `ID` int(11) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `activity_title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `employee_no` int(11) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `profile_image` text NOT NULL,
  `subject_id` text CHARACTER SET utf8mb4 NOT NULL,
  `initial` tinyint(1) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `last_name`, `first_name`, `middle_name`, `employee_no`, `password`, `active`, `reset`, `profile_image`, `subject_id`, `initial`, `theme`) VALUES
(1, 'Dela Cruz', 'Juan', 'Manuel', 987654321, 'qweqweqwe', 1, 0, '', '', 0, ''),
(2, 'Geslani', 'Darrel', 'Bayaras', 987654322, '12345678', 1, 0, '', '', 1, ''),
(3, 'Balanay', 'Kyle Jeremy', 'Llamelo', 987654323, '12345678', 1, 0, '', '', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reset_requests`
--
ALTER TABLE `reset_requests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subject_activity`
--
ALTER TABLE `subject_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reset_requests`
--
ALTER TABLE `reset_requests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_activity`
--
ALTER TABLE `subject_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
