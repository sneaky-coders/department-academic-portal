-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2023 at 11:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `coursecode` varchar(50) NOT NULL,
  `credits` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `semester`, `coursename`, `coursecode`, `credits`, `created_at`, `updated_at`) VALUES
(1, '1', 'Python Programming(I)', '22MCA11', 5, '2023-12-29 17:18:44', NULL),
(2, '1', 'Database Management System (I)', '22MCA12', 5, '2023-12-29 17:19:33', NULL),
(3, '1', 'Computer Networks and Communication(I)', '22MCA13', 5, '2023-12-29 17:19:59', NULL),
(4, '1', 'Research Methodology', '22MCA14', 4, '2023-12-29 17:20:28', NULL),
(5, '1', 'Mathematical Foundations', '22MCA15', 5, '2023-12-29 17:20:59', NULL),
(6, '1', 'Basics of Programming Languages – Bridge Course (I)', '22MCA16', 0, '2023-12-29 17:21:54', NULL),
(7, '2', 'Web Design and Development (I)', '22MCA21', 5, '2023-12-29 17:22:34', NULL),
(8, '2', 'Data Structures and Algorithms (I)', '22MCA22', 5, '2023-12-29 17:23:35', NULL),
(9, '2', 'Programming using Java and J2EE (I)', '22MCA23', 5, '2023-12-29 17:24:04', NULL),
(10, '2', 'IT Infrastructure Management', '22MCA24', 4, '2023-12-29 17:24:33', NULL),
(11, '2', 'NoSQL', '22MCA251', 4, '2023-12-29 17:25:23', NULL),
(12, '2', 'Cloud Computing', '22MCA252', 4, '2023-12-29 17:25:49', NULL),
(13, '2', 'Cyber Security and Cyber Laws', '22MCA253', 4, '2023-12-29 17:26:13', NULL),
(14, '2', 'Data Analysis with R**', '22MCA254', 4, '2023-12-29 17:26:50', NULL),
(15, '2', 'Information Network Security', '22MCA255', 4, '2023-12-29 17:27:18', NULL),
(16, '2', 'Professional Communication and Ethics', '22MCA26', 1, '2023-12-29 17:27:56', '2023-12-29 17:28:10'),
(17, '2', 'Employability Skill', '22MCA27', 1, '2023-12-29 17:28:55', NULL),
(18, '3', 'C# Programming using .NET (I)', '22MCA31', 5, '2023-12-29 17:29:36', NULL),
(19, '3', 'Machine Learning(I)', '22MCA32', 5, '2023-12-29 17:30:04', NULL),
(20, '3', 'Big Data Paradigm(I)', '22MCA33', 5, '2023-12-29 17:30:30', NULL),
(21, '3', 'Block Chain Technology', '22MCA341', 4, '2023-12-29 17:31:45', NULL),
(22, '3', 'Management and Entrepreneurship for IT Industry', '22MCA342', 4, '2023-12-29 17:32:13', NULL),
(23, '3', 'Full Stack Development**', '22MCA343', 4, '2023-12-29 17:32:38', NULL),
(24, '3', 'Internet of Things**', '22MCA344', 4, '2023-12-29 17:33:04', NULL),
(25, '3', 'Advanced Database Management System', '22MCA345', 4, '2023-12-29 17:33:33', NULL),
(26, '3', 'Django Framework**', '22MCA351', 4, '2023-12-29 17:34:00', NULL),
(27, '3', 'DevOps', '22MCA352', 4, '2023-12-29 17:34:24', NULL),
(28, '3', 'Artificial Intelligence', '22MCA353', 4, '2023-12-29 17:34:48', NULL),
(29, '3', 'Software Project Management', '22MCA354', 4, '2023-12-29 17:35:11', NULL),
(30, '3', 'Ethical Hacking**', '22MCA355', 4, '2023-12-29 17:35:37', NULL),
(31, '4', 'Professional Practice', '22MCA41', 5, '2023-12-29 17:36:39', NULL),
(32, '4', 'Project Work', '22MCA42', 15, '2023-12-29 17:37:23', NULL),
(33, '4', 'Academic Writing', '22MCA43', 4, '2023-12-29 17:38:17', NULL),
(34, '4', 'Technical Certification', '22MCA44X', 2, '2023-12-29 17:39:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(100) NOT NULL,
  `TT` varchar(100) NOT NULL,
  `LP` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `TT`, `LP`, `CP`, `created_at`, `updated_at`) VALUES
(2, 'TT.pdf', 'LP.pdf', 'CP.pdf', '2023-12-27 19:49:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electiveenrollment`
--

CREATE TABLE `electiveenrollment` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `elective1` varchar(100) NOT NULL,
  `elective2` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electiveenrollment`
--

INSERT INTO `electiveenrollment` (`id`, `user_id`, `elective1`, `elective2`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blockchain Technology', 'Artificial Intelligence', '2023-12-27 19:08:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `staffid` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `name`, `email`, `contact`, `staffid`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alzaahid', 'alzaahid@gmail.com', 9096245373, 'hdie38', '2023-12-27 20:17:56', NULL),
(2, 4, 'Pavan Mitragotri', 'pvm@git.edu', 8756456754, 'git45n', '2023-12-29 21:30:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facultyallotment`
--

CREATE TABLE `facultyallotment` (
  `id` int(100) NOT NULL,
  `faculty_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `semster` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'I', '2023-12-29 21:49:26', NULL),
(2, 'II', '2023-12-29 21:49:31', NULL),
(3, 'III', '2023-12-29 21:49:36', NULL),
(4, 'IV', '2023-12-29 21:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usn` varchar(50) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `subject_id` int(100) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `timeslot` int(11) DEFAULT NULL,
  `day_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `contact`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Alzaahid Nadaf', 'alzaahid@gmail.com', 'zaahid97', 9096245373, 1, '2023-12-27 18:53:14', NULL),
(2, 'Sachin Dessai', 'sachin@git.edu', 'sachin@123', 7495475645, 2, '2023-12-29 17:52:36', NULL),
(3, 'Abhishek Nazare', 'abhishekn@git.edu', 'abhishek', 8748594565, 2, '2023-12-29 17:55:31', NULL),
(4, 'Pavan Mitragotri', 'pvm@git.edu', 'pavan', NULL, 1, '2023-12-29 17:56:44', NULL),
(5, 'Hrishikesh Mogare', 'hsm@git.edu', 'hrishi', NULL, 2, '2023-12-29 17:59:24', NULL),
(6, 'Nilesh Anvekar', 'nilesh@git.edu', 'nilesh', NULL, 2, '2023-12-29 18:00:04', NULL),
(7, 'Shivani Patankar', 'sdpatankar@git.edu', 'shivani', NULL, 2, '2023-12-29 18:00:22', NULL),
(8, 'Vijaylaxmi Patil', 'vijay@git.edu', 'vijaylaxmi', NULL, 2, '2023-12-29 18:00:48', NULL),
(9, 'Sheetal Bandekar', 'sb@git.edu', 'sheetal', NULL, 2, '2023-12-29 18:01:18', NULL),
(10, 'Swarooprani Manoor', 'swm@git.edu', 'swaroopa', NULL, 2, '2023-12-29 18:01:45', NULL),
(11, 'Vinod Kokitkar', 'vrkokitkar@git.edu', 'vinod', NULL, 2, '2023-12-29 18:02:11', NULL),
(12, 'Sunita Padmannavar', 'spn@git.edu', 'sunita', NULL, 2, '2023-12-29 18:02:36', NULL),
(13, 'Swetha Goudar', 'sig@git.edu', 'shewta', NULL, 2, '2023-12-29 18:02:57', NULL),
(14, 'Pijush Barthakur', 'pbt@git.edu', 'pijush', NULL, 2, '2023-12-29 18:03:22', NULL),
(15, 'Mrutunjaya Emmi', 'mje@git.edu', 'emmi', NULL, 2, '2023-12-29 18:03:47', NULL),
(16, 'Jayashri Madalgi', 'jbm@git.edu', 'jayashri', NULL, 2, '2023-12-29 18:04:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `bj` (`user_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rgrg` (`user_id`);

--
-- Indexes for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dr` (`course_id`),
  ADD KEY `rt` (`faculty_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rgr` (`user_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`),
  ADD KEY `grf` (`faculty_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  ADD CONSTRAINT `bj` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `rgrg` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  ADD CONSTRAINT `dr` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `rt` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `rgr` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `grf` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`),
  ADD CONSTRAINT `timetable_ibfk_5` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
