-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2009 at 01:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(25) NOT NULL,
  `name` varchar(64) NOT NULL,
  `course_code` varchar(16) NOT NULL,
  `unit` int(16) NOT NULL,
  `level_id` int(11) NOT NULL,
  `department_id` int(16) NOT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_code`, `unit`, `level_id`, `department_id`, `created_id`) VALUES
(10, 'WordPress', 'Framwork201', 4, 2, 1, '2020-08-19 12:49:19'),
(11, 'Yii Framework', 'Framwork202', 4, 2, 1, '2020-08-19 12:50:04'),
(12, 'Networking', 'CSC301', 3, 3, 2, '2020-08-19 12:50:37'),
(13, 'Machine Learning', 'Phy401', 4, 4, 3, '2020-08-19 12:51:07'),
(14, 'OOP', 'OOP101', 2, 1, 1, '2020-08-19 12:51:32'),
(15, 'Artificial Intelligence', 'AI305', 4, 3, 2, '2020-08-19 20:37:33'),
(16, 'Yii PHP Framework', 'Php201', 3, 2, 1, '2020-08-19 20:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(25) NOT NULL,
  `name` varchar(64) NOT NULL,
  `faculty_id` int(16) NOT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `faculty_id`, `created_id`) VALUES
(1, 'Computer Science', 2, '2020-08-17 19:24:04'),
(2, 'Computer Engineering', 2, '2020-08-17 19:24:20'),
(3, 'Physics', 1, '2020-08-17 19:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(25) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`) VALUES
(1, 'Sciences', '2020-08-17 19:09:51'),
(2, 'Technology', '2020-08-17 19:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`) VALUES
(1, '100L', '2020-08-19 11:03:42'),
(2, '200L', '2020-08-19 11:03:51'),
(3, '300L', '2020-08-19 11:03:58'),
(4, '400L', '2020-08-19 12:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(25) NOT NULL,
  `student_id` int(25) NOT NULL,
  `level_id` int(25) NOT NULL,
  `courses` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `student_id`, `level_id`, `courses`, `status`, `created_at`) VALUES
(1, 4, 1, '14', 2, '2020-08-23 20:32:40'),
(2, 7, 2, '10', 1, '2020-08-23 20:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `faculty_id` int(25) NOT NULL,
  `department_id` int(16) NOT NULL,
  `level_id` int(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `faculty_id`, `department_id`, `level_id`, `created_at`) VALUES
(1, 4, 1, 1, 1, '2020-08-19 12:15:08'),
(2, 4, 1, 3, 4, '2020-08-19 13:21:48'),
(6, 7, 2, 1, 2, '2020-08-19 20:41:52'),
(7, 7, 2, 1, 2, '2020-08-19 20:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `status`) VALUES
(4, 'Wale', 'demo', 'demo', 0),
(6, 'Admin', 'admin', 'admin', 0),
(7, 'Tosin', 'tdemo', 'tdemo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
