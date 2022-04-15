-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:30 AM
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
  `user_name` text NOT NULL,
  `theme` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `email`, `user_name`, `theme`, `profile_image`) VALUES
(1, 'christineantoy12@gmail.com', 'Christine Antoy', '128, 168, 63', '../images/user/admin/admin-1.png');

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
(1, '2023-08-21', 'Public Holiday', 'Ninoy Aquino Day', '#ff0000'),
(2, '2022-08-29', 'Public Holiday', 'National Heroes Day', '#22b483'),
(7, '2022-04-06', 'asdasdads', 'asdasdasd', '#985252'),
(8, '2022-04-14', 'Public Holiday', 'Maundy Thursday', '#fb3737'),
(9, '2022-04-15', 'Public Holiday', ' Good Friday', '#fb3737'),
(10, '2022-05-01', 'Public Holiday', ' Labour Day', '#fb9637'),
(11, '2022-06-13', 'Public Holiday', 'Philippines Independence Day', '#6237fb');

-- --------------------------------------------------------

--
-- Table structure for table `handle`
--

CREATE TABLE `handle` (
  `ID` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `subject_ID` int(11) NOT NULL,
  `section_ID` int(11) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `handle`
--

INSERT INTO `handle` (`ID`, `teacher_ID`, `subject_ID`, `section_ID`, `grade_level`, `active`) VALUES
(1, 1, 10, 3, 7, 1),
(2, 1, 11, 2, 7, 1),
(3, 2, 3, 8, 8, 1),
(6, 3, 2, 11, 9, 1),
(8, 4, 10, 2, 7, 1);

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
(1, 'Dela Cruz', 'Juana', 'Manuel', '09056720119', '123456789012', '123456789012', 1, 1, '', 0, ''),
(2, 'Damaso', 'Verdolagas', 'Padre', '09123456789', '123456786012', '123456786012', 1, 0, '', 1, '128, 168, 63');

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
(4, 'teacher', 1, 1, '2022-04-01 20:09:19'),
(5, 'student', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `ID` int(11) NOT NULL,
  `section_name` text NOT NULL,
  `grade_level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`ID`, `section_name`, `grade_level`, `active`) VALUES
(2, 'Section A', 7, 1),
(3, 'Section B', 7, 1),
(4, 'Section C', 7, 1),
(5, 'Section D', 7, 1),
(8, 'Section A', 8, 1),
(9, 'Section B', 8, 1),
(10, 'Section C', 8, 1),
(11, 'Section A', 9, 1),
(12, 'Section A', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `LRN` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `grade_level` int(2) NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `profile_image` text CHARACTER SET utf8mb4 NOT NULL,
  `initial` tinyint(1) NOT NULL,
  `theme` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `last_name`, `first_name`, `middle_name`, `LRN`, `password`, `grade_level`, `section`, `active`, `reset`, `profile_image`, `initial`, `theme`) VALUES
(1, 'Dela Cruz', 'Juan', 'Manuel', '123456789012', '123456789012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(2, 'Balanay', 'Kyle Jeremy', 'Llamelo', '123456788012', '12345678', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(3, 'Geslani', 'Darrel', 'Bayaras', '123456787012', '12345678', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(6, 'Clara', 'Maria', 'Damaso', '123456786012', '123456786012', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(7, 'Ibarra', 'Crisostomo', 'Rizal', '123456785012', '123456785012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(9, 'Omar', 'Ascension', 'Olivia', '123456784012', '123456784012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(10, 'Julio', 'Walter', 'Norberto', '123456783012', '123456789', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(11, 'Jazmin', 'Ruth', 'Karin', '123456782012', '12345678', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(12, 'Clementina', 'Prudencia', 'Gil', '123456781012', '12345678', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(13, 'Tiago', 'Capitan', 'Climente', '123456780012', '123456780012', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(14, 'Lumuntad', 'Clarissa', 'Bonak', '123456779012', '123456779012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(15, 'Derayo', 'Ninya', 'Mama', '123456778012', '123456778012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(16, 'Medios', 'Lola', 'Re', '123456777012', '123456777012', 7, 'Section A', 1, 0, '', 1, '128, 168, 63'),
(17, 'Co', 'Kate', 'Inn', '123456776012', '123456776012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(18, 'Toil', 'Efi', 'Cassen', '123456775012', '123456775012', 7, 'Section A', 1, 0, '', 0, '128, 168, 63'),
(19, 'Bustamante', 'Genevieve', 'Lim', '123456761012', '123456789', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(20, 'Pasa', 'Jaylen Tyson ', 'Naga', '123456762012', '12345678', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(21, 'Murcia', 'Lukas', 'Daculug', '123456763012', '12345678', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(22, 'Villarino', 'Phillip', 'Macaspac', '123456764012', '123456786012', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(23, 'Pronebo', 'Teo', 'Jacinto', '123456765012', '123456785012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(24, 'Legaspi', 'Kenneth', 'Paderan', '123456766012', '123456784012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(25, 'Clemente', 'Vladimir', 'Hipolito', '123456767012', '123456789', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(26, 'Gonzales', 'Ronald', 'Traviño', '123456755012', '12345678', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(27, 'Delos Reyes', 'Manelisa', '', '123456768012', '12345678', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(28, 'Mariano', 'Jubert', 'Delfin', '123456769012', '123456769012', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(29, 'Rodriguez', 'Harold', '', '123456770012', '123456770012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(30, 'Enguerra', 'Maria Ivy', 'Reyes', '123456771012', '123456771012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(31, 'Barcelona', 'John Ryan', '', '123456772012', '123456772012', 7, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(32, 'Dimla', 'Jenny Anne', '', '123456773012', '123456773012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(33, 'Ventayen', 'Darren', '', '123456774012', '123456774012', 7, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(34, 'Mendoza', 'Nicole', 'Marie', '123456760012', '123456770012', 8, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(35, 'Gonzales', 'Ryzelle', 'Suidiacal', '123456759012', '123456771012', 8, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(36, 'Tadeo', 'Allen', '', '123456758012', '123456772012', 8, 'Section B', 1, 0, '', 1, '128, 168, 63'),
(37, 'Batac', 'Bernadeth', '', '123456757012', '123456773012', 8, 'Section B', 1, 0, '', 0, '128, 168, 63'),
(38, 'Salvador', 'Niccolle', '', '123456756012', '123456774012', 8, 'Section B', 1, 0, '', 0, '128, 168, 63');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `ID` int(11) NOT NULL,
  `LRN` varchar(12) CHARACTER SET utf8 NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`ID`, `LRN`, `activity_id`, `status`, `date`) VALUES
(31, '123456789012', 11, 1, '2022-04-14 13:01:26'),
(32, '123456788012', 11, 0, '2022-04-14 12:27:02'),
(33, '123456787012', 11, 0, '2022-04-14 12:27:02'),
(34, '123456786012', 11, 0, '2022-04-14 12:27:02'),
(35, '123456785012', 11, 0, '2022-04-14 12:27:02'),
(36, '123456784012', 11, 0, '2022-04-14 12:27:02'),
(37, '123456783012', 11, 0, '2022-04-14 12:27:02'),
(38, '123456782012', 11, 0, '2022-04-14 12:27:02'),
(39, '123456781012', 11, 0, '2022-04-14 12:27:02'),
(40, '123456780012', 11, 0, '2022-04-14 12:27:02'),
(41, '123456779012', 11, 0, '2022-04-14 12:27:02'),
(42, '123456778012', 11, 0, '2022-04-14 12:27:02'),
(43, '123456777012', 11, 0, '2022-04-14 12:27:02'),
(44, '123456776012', 11, 0, '2022-04-14 12:27:02'),
(45, '123456775012', 11, 0, '2022-04-14 12:27:02'),
(46, '123456761012', 12, 1, '2022-04-14 17:45:31'),
(47, '123456762012', 12, 1, '2022-04-14 17:40:58'),
(48, '123456763012', 12, 1, '2022-04-14 17:45:18'),
(49, '123456764012', 12, 1, '2022-04-14 17:45:18'),
(50, '123456765012', 12, 1, '2022-04-14 17:45:32'),
(51, '123456766012', 12, 0, '2022-04-14 17:48:33'),
(52, '123456767012', 12, 0, '2022-04-14 16:31:00'),
(53, '123456755012', 12, 0, '2022-04-14 16:31:00'),
(54, '123456768012', 12, 0, '2022-04-14 16:31:00'),
(55, '123456769012', 12, 0, '2022-04-14 16:31:00'),
(56, '123456770012', 12, 1, '2022-04-14 17:46:14'),
(57, '123456771012', 12, 1, '2022-04-14 17:46:15'),
(58, '123456772012', 12, 1, '2022-04-14 17:46:16'),
(59, '123456773012', 12, 1, '2022-04-14 17:46:16'),
(60, '123456774012', 12, 0, '2022-04-14 16:31:00'),
(61, '123456761012', 13, 1, '2022-04-14 16:31:54'),
(62, '123456762012', 13, 1, '2022-04-14 16:31:55'),
(63, '123456763012', 13, 0, '2022-04-14 16:31:36'),
(64, '123456764012', 13, 1, '2022-04-14 16:31:55'),
(65, '123456765012', 13, 0, '2022-04-14 16:31:36'),
(66, '123456766012', 13, 1, '2022-04-14 16:31:57'),
(67, '123456767012', 13, 1, '2022-04-14 16:31:57'),
(68, '123456755012', 13, 0, '2022-04-14 16:31:36'),
(69, '123456768012', 13, 0, '2022-04-14 16:31:36'),
(70, '123456769012', 13, 0, '2022-04-14 16:31:36'),
(71, '123456770012', 13, 0, '2022-04-14 16:31:36'),
(72, '123456771012', 13, 0, '2022-04-14 16:31:36'),
(73, '123456772012', 13, 0, '2022-04-14 16:31:36'),
(74, '123456773012', 13, 0, '2022-04-14 16:31:36'),
(75, '123456774012', 13, 0, '2022-04-14 16:31:36'),
(76, '123456789012', 14, 0, '2022-04-14 16:34:23'),
(77, '123456788012', 14, 0, '2022-04-14 16:34:23'),
(78, '123456787012', 14, 0, '2022-04-14 16:34:23'),
(79, '123456786012', 14, 0, '2022-04-14 16:34:23'),
(80, '123456785012', 14, 0, '2022-04-14 16:34:23'),
(81, '123456784012', 14, 0, '2022-04-14 16:34:23'),
(82, '123456783012', 14, 0, '2022-04-14 16:34:23'),
(83, '123456782012', 14, 0, '2022-04-14 16:34:23'),
(84, '123456781012', 14, 0, '2022-04-14 16:34:23'),
(85, '123456780012', 14, 0, '2022-04-14 16:34:23'),
(86, '123456779012', 14, 0, '2022-04-14 16:34:23'),
(87, '123456778012', 14, 0, '2022-04-14 16:34:23'),
(88, '123456777012', 14, 0, '2022-04-14 16:34:23'),
(89, '123456776012', 14, 0, '2022-04-14 16:34:23'),
(90, '123456775012', 14, 0, '2022-04-14 16:34:23'),
(91, '123456789012', 15, 0, '2022-04-15 11:02:18'),
(92, '123456788012', 15, 1, '2022-04-15 12:28:43'),
(93, '123456787012', 15, 0, '2022-04-15 11:02:18'),
(94, '123456786012', 15, 0, '2022-04-15 11:02:18'),
(95, '123456785012', 15, 0, '2022-04-15 11:02:18'),
(96, '123456784012', 15, 0, '2022-04-15 11:02:18'),
(97, '123456783012', 15, 0, '2022-04-15 11:02:18'),
(98, '123456782012', 15, 0, '2022-04-15 11:02:18'),
(99, '123456781012', 15, 1, '2022-04-15 12:29:10'),
(100, '123456780012', 15, 1, '2022-04-15 12:29:09'),
(101, '123456779012', 15, 1, '2022-04-15 12:29:09'),
(102, '123456778012', 15, 0, '2022-04-15 11:02:18'),
(103, '123456777012', 15, 1, '2022-04-15 12:29:10'),
(104, '123456776012', 15, 0, '2022-04-15 11:02:18'),
(105, '123456775012', 15, 0, '2022-04-15 11:02:18'),
(106, '123456789012', 16, 0, '2022-04-15 11:03:36'),
(107, '123456788012', 16, 0, '2022-04-15 11:03:36'),
(108, '123456787012', 16, 1, '2022-04-15 12:28:46'),
(109, '123456786012', 16, 0, '2022-04-15 11:03:36'),
(110, '123456785012', 16, 0, '2022-04-15 11:03:36'),
(111, '123456784012', 16, 0, '2022-04-15 11:03:36'),
(112, '123456783012', 16, 0, '2022-04-15 11:03:36'),
(113, '123456782012', 16, 0, '2022-04-15 11:03:36'),
(114, '123456781012', 16, 1, '2022-04-15 12:29:14'),
(115, '123456780012', 16, 1, '2022-04-15 12:29:13'),
(116, '123456779012', 16, 0, '2022-04-15 11:03:36'),
(117, '123456778012', 16, 1, '2022-04-15 12:29:13'),
(118, '123456777012', 16, 1, '2022-04-15 12:29:13'),
(119, '123456776012', 16, 0, '2022-04-15 11:03:36'),
(120, '123456775012', 16, 0, '2022-04-15 11:03:36'),
(121, '123456789012', 17, 1, '2022-04-15 11:06:10'),
(122, '123456788012', 17, 0, '2022-04-15 11:06:03'),
(123, '123456787012', 17, 0, '2022-04-15 11:06:03'),
(124, '123456786012', 17, 1, '2022-04-15 12:28:49'),
(125, '123456785012', 17, 0, '2022-04-15 11:06:03'),
(126, '123456784012', 17, 0, '2022-04-15 11:06:03'),
(127, '123456783012', 17, 0, '2022-04-15 11:06:03'),
(128, '123456782012', 17, 1, '2022-04-15 12:29:17'),
(129, '123456781012', 17, 1, '2022-04-15 12:29:17'),
(130, '123456780012', 17, 0, '2022-04-15 11:06:03'),
(131, '123456779012', 17, 0, '2022-04-15 11:06:03'),
(132, '123456778012', 17, 0, '2022-04-15 11:06:03'),
(133, '123456777012', 17, 0, '2022-04-15 11:06:03'),
(134, '123456776012', 17, 0, '2022-04-15 11:06:03'),
(135, '123456775012', 17, 1, '2022-04-15 12:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(11) NOT NULL,
  `subject_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `grade_level` int(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `subject_name`, `grade_level`, `active`) VALUES
(1, 'English', 10, 1),
(2, 'Filipino', 9, 1),
(3, 'Science', 8, 1),
(10, 'Math', 7, 1),
(11, 'English', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_activity`
--

CREATE TABLE `subject_activity` (
  `ID` int(11) NOT NULL,
  `handle_ID` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `subject_ID` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `activity_title` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_activity`
--

INSERT INTO `subject_activity` (`ID`, `handle_ID`, `section_name`, `grade_level`, `subject_ID`, `subject_name`, `activity_title`, `category`, `status`, `active`) VALUES
(11, 2, 'Section A', 7, 11, 'English', 'Figures of speech', 'Assignment', '', 1),
(12, 1, 'Section B', 7, 10, 'Math', 'Polynomials and Binomials', 'Quiz', '', 1),
(13, 1, 'Section B', 7, 10, 'Math', 'Find the value of x', 'Assignment', '', 1),
(14, 2, 'Section A', 7, 11, 'English', 'Reporting', 'Other', '', 1),
(15, 8, 'Section A', 7, 10, 'Math', 'Find the area of the circle', 'Assignment', '', 1),
(16, 8, 'Section A', 7, 10, 'Math', 'Statistics and Probability', 'Quiz', '', 1),
(17, 8, 'Section A', 7, 10, 'Math', 'Rates & proportional relationships', 'Other', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `employee_no` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reset` tinyint(1) NOT NULL,
  `profile_image` text CHARACTER SET utf8mb4 NOT NULL,
  `initial` tinyint(1) NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `last_name`, `first_name`, `middle_name`, `employee_no`, `email`, `password`, `active`, `reset`, `profile_image`, `initial`, `theme`) VALUES
(1, 'Dela Cruz', 'Juan', 'Manuel', '987654321', '', '123456789', 1, 0, '../images/user/teacher/teacher-1.png', 0, '128, 168, 63'),
(2, 'Geslani', 'Darrel', 'Bayaras', '987654322', '', '12345678', 1, 0, '', 1, ''),
(3, 'Balanay', 'Kyle Jeremy', 'Llamelo', '987654323', '', '12345678', 1, 0, '', 0, ''),
(4, 'Palacay', 'Reychelle', 'Rivera', '987654324', 'r@g.com', '987654324', 1, 0, '', 0, '227, 93, 106');

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
-- Indexes for table `handle`
--
ALTER TABLE `handle`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `handle`
--
ALTER TABLE `handle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reset_requests`
--
ALTER TABLE `reset_requests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject_activity`
--
ALTER TABLE `subject_activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
