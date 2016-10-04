-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 28, 2016 at 10:49 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrar_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses_students`
--

CREATE TABLE `courses_students` (
  `id` bigint(20) unsigned NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_students`
--

INSERT INTO `courses_students` (`id`, `course_id`, `student_id`) VALUES
(1, 11, 16),
(2, 12, 17),
(3, 12, 18),
(4, 18, 24),
(5, 19, 25),
(6, 19, 26),
(7, 20, 32),
(8, 26, 33),
(9, 27, 34),
(10, 27, 35),
(11, 28, 41),
(12, 29, 42),
(13, 30, 42),
(14, 36, 43),
(15, 37, 44),
(16, 37, 45),
(17, 38, 51),
(18, 39, 52),
(19, 40, 52),
(20, 46, 53),
(21, 47, 54),
(22, 47, 55),
(23, 48, 61),
(24, 49, 62),
(25, 50, 62),
(26, 56, 63),
(27, 57, 64),
(28, 57, 65),
(29, 59, 71),
(30, 60, 72),
(31, 61, 72),
(32, 67, 73),
(33, 68, 74),
(34, 68, 75),
(35, 72, 81),
(36, 73, 82),
(37, 74, 82),
(38, 80, 83),
(39, 81, 84),
(40, 81, 85),
(41, 85, 91),
(42, 86, 92),
(43, 87, 92),
(44, 93, 96),
(45, 94, 97),
(46, 94, 98),
(47, 98, 104),
(48, 99, 105),
(49, 100, 105),
(51, 107, 110),
(52, 108, 111),
(53, 108, 112),
(54, 110, 118),
(55, 111, 119),
(56, 112, 119),
(58, 119, 122),
(59, 120, 123),
(60, 120, 124),
(61, 122, 125),
(62, 123, 131),
(63, 124, 132),
(64, 125, 132),
(66, 132, 135),
(67, 133, 136),
(68, 133, 137),
(70, 136, 144),
(71, 137, 145),
(72, 138, 145),
(74, 145, 148),
(75, 146, 149),
(76, 146, 150),
(78, 149, 157),
(79, 150, 158),
(80, 151, 158),
(82, 158, 163),
(83, 159, 164),
(84, 159, 165),
(86, 164, 172),
(87, 165, 173),
(88, 166, 173),
(90, 173, 178),
(91, 174, 179),
(92, 174, 180),
(94, 179, 187),
(95, 180, 188),
(96, 181, 188);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `courses_students`
--
ALTER TABLE `courses_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `courses_students`
--
ALTER TABLE `courses_students`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=193;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
