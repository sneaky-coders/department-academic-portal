-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2024 at 12:26 PM
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
-- Database: `academicv2`
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
(34, '4', 'Technical Certification', '22MCA44X', 2, '2023-12-29 17:39:14', NULL),
(35, 'III', 'ACA', '-', 0, '2023-12-30 20:25:51', NULL),
(36, 'III', 'Elective 2', '22MCA34X', 4, '2023-12-30 20:58:35', NULL),
(37, 'III', 'Elective 3', '22MCA35X', 4, '2023-12-30 20:58:46', NULL),
(38, 'III', 'Societal Project', '22MCAX', 2, '2023-12-30 21:22:20', NULL);

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
  `contact` bigint(11) DEFAULT NULL,
  `staffid` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `name`, `email`, `contact`, `staffid`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alzaahid', 'alzaahid@gmail.com', 9096245373, 'hdie38', '2023-12-27 20:17:56', NULL),
(2, 4, 'Pavan Mitragotri', 'pvm@git.edu', 8756456754, 'git45n', '2023-12-29 21:30:03', NULL),
(3, 2, 'Sachin Dessai', 'sachin@git.edu', 7495475645, 'hruhu5', '2023-12-30 15:10:51', NULL),
(4, 3, 'Abhishek Nazare', 'abhishekn@git.edu', 8748594565, '', '2023-12-30 19:26:20', NULL),
(5, 5, 'Hrishikesh Mogare', 'hsm@git.edu', NULL, '', '2023-12-30 19:26:57', NULL),
(6, 6, 'Nilesh Anvekar', 'nilesh@git.edu', NULL, '', '2023-12-30 19:27:04', NULL),
(7, 7, 'Shivani Patankar', 'sdpatankar@git.edu', NULL, '', '2023-12-30 19:27:10', NULL),
(8, 8, 'Vijaylaxmi Patil', 'vijay@git.edu', NULL, '', '2023-12-30 19:27:14', NULL),
(9, 9, 'Sheetal Bandekar', 'sb@git.edu', NULL, '', '2023-12-30 19:27:18', NULL),
(10, 10, 'Swarooprani Manoor', 'swm@git.edu', NULL, '', '2023-12-30 19:27:24', NULL),
(11, 11, 'Vinod Kokitkar', 'vrkokitkar@git.edu', NULL, '', '2023-12-30 19:27:29', NULL),
(12, 12, 'Sunita Padmannavar', 'spn@git.edu', NULL, '', '2023-12-30 19:27:33', NULL),
(13, 13, 'Swetha Goudar', 'sig@git.edu', NULL, '', '2023-12-30 19:27:37', NULL),
(14, 14, 'Pijush Barthakur', 'pbt@git.edu', NULL, '', '2023-12-30 19:27:41', NULL),
(15, 15, 'Mrutunjaya Emmi', 'mje@git.edu', NULL, '', '2023-12-30 19:27:45', NULL),
(16, 16, 'Jayashri Madalgi', 'jbm@git.edu', NULL, '', '2023-12-30 19:27:49', NULL);

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

--
-- Dumping data for table `facultyallotment`
--

INSERT INTO `facultyallotment` (`id`, `faculty_id`, `course_id`, `semster`, `created_at`, `updated_at`) VALUES
(1, 2, 27, '3', '2023-12-30 14:59:00', NULL),
(2, 3, 24, '3', '2023-12-30 15:11:16', NULL),
(3, 3, 5, '1', '2023-12-30 15:11:38', NULL),
(4, 3, 8, '2', '2023-12-30 15:11:52', NULL),
(6, 2, 3, '1', '2023-12-30 16:13:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `email`, `usn`, `contact`, `created_at`, `updated_at`) VALUES
(1, 17, 'Afra Pathan', 'afrapathan2506@gmail.com', '2GI22MC004', 5749545645, '2024-01-01 10:59:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester` varchar(30) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `scheme` varchar(30) NOT NULL DEFAULT '2022',
  `division` varchar(10) NOT NULL,
  `labsession` varchar(10) NOT NULL DEFAULT 'No',
  `faculty_id1` int(11) DEFAULT NULL,
  `faculty_id2` int(100) DEFAULT NULL,
  `faculty_id3` int(100) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `timeslot` varchar(100) DEFAULT NULL,
  `day` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `course_id`, `semester`, `subject_id`, `scheme`, `division`, `labsession`, `faculty_id1`, `faculty_id2`, `faculty_id3`, `room`, `timeslot`, `day`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 3, '2022', 'B', '0', 2, NULL, NULL, 'DS-1', '10:55-11:50', 'Monday', '2024-01-01 10:18:41', NULL),
(2, 2, '2', 9, '2022', 'B', '0', 2, NULL, NULL, 'DS-1', '10:55-11:50', 'Monday', '2024-01-01 10:20:14', NULL),
(3, 1, '1', 3, '2022', 'B', '0', 2, NULL, NULL, 'DS-1', '10:55-11:50', 'Monday', '2024-01-01 10:26:01', NULL),
(4, 1, '', 3, '2022', 'B', '0', 2, NULL, NULL, 'DS-2', '10:55-11:50', 'Monday', '2024-01-01 10:30:14', NULL),
(5, 1, '1', 3, '2022', 'A', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Monday', '2024-01-01 10:38:48', NULL),
(6, 1, '1', 3, '2022', 'A', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Tuesday', '2024-01-01 10:42:43', NULL),
(7, 3, '3', 27, '2022', 'B', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Tuesday', '2024-01-01 10:43:19', NULL),
(8, 4, '4', 8, '2022', 'A', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Tuesday', '2024-01-01 10:45:25', NULL),
(9, 4, '', 8, '2022', 'A', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Tuesday', '2024-01-01 10:45:37', NULL),
(10, 4, '', 8, '2022', 'A', '0', 2, NULL, NULL, 'DS-1', '10:00-10:55', 'Tuesday', '2024-01-01 10:45:44', NULL),
(11, 3, '3', 4, '2022', 'B', '0', 2, NULL, NULL, 'DS-2', '10:00-10:55', 'Tuesday', '2024-01-01 10:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `level` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `contact`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Alzaahid Nadaf', 'zaahid97!', 'alzaahid@gmail.com', '', 1, '2022-05-08 10:35:36', '2024-01-01 11:11:41'),
(2, 'Abhishek Nazare', 'abhi@123', 'abhishekn@git.edu', '', 1, '2023-07-07 09:07:36', '2024-01-01 11:11:41'),
(3, 'Arjun', 'git@123', 'arjunpermi7@gmail.com', '', 3, '2023-07-08 00:26:25', '2024-01-01 11:11:41'),
(4, 'Naveen angadi', 'git@123', 'naveenangadi274@gmail.com', '', 3, '2023-07-08 00:28:13', '2024-01-01 11:11:41'),
(5, 'Musheb karikatti', 'git@123', 'mushebkarikatti@gmail.com', '', 3, '2023-07-08 00:28:48', '2024-01-01 11:11:41'),
(7, 'Nikhil', 'git@123', 'nikhilh242@gmail.com', '', 3, '2023-07-08 03:28:15', '2024-01-01 11:11:41'),
(8, 'Vaishnavi Mithare', 'git@123', 'vaishnavimithare15@gmail.com', '', 3, '2023-07-08 03:31:20', '2024-01-01 11:11:41'),
(9, 'BIBIJAINAB K PATHAN', 'git@123', 'jkpathan1701@gmail.com', '', 3, '2023-07-08 03:31:56', '2024-01-01 11:11:41'),
(10, 'Satish S Patil', 'git@123', 'sp948705@gmail.com', '', 3, '2023-07-08 03:32:27', '2024-01-01 11:11:41'),
(11, 'Anusha V C', 'git@123', 'vasuanuvc27@gmail.com', '', 3, '2023-07-08 03:33:36', '2024-01-01 11:11:41'),
(12, 'Shradha', 'git@123', 'shradhak2001@gmail.com', '', 3, '2023-07-08 03:34:08', '2024-01-01 11:11:41'),
(13, 'Pravesh Naik', 'git@123', 'praveshnaik0360@gmail.com', '', 3, '2023-07-08 03:34:40', '2024-01-01 11:11:41'),
(14, 'Rajat Bandekar', 'git@123', 'bandekarraj40@gmail.com', '', 3, '2023-07-08 03:35:05', '2024-01-01 11:11:41'),
(15, 'Nidhi', 'git@123', 'ternikarnidhi@gmail.com', '', 3, '2023-07-08 03:35:49', '2024-01-01 11:11:41'),
(16, 'Netravati gangappa g', 'git@123', 'nnetravatigokavi@gmail.com', '', 3, '2023-07-08 03:36:11', '2024-01-01 11:11:41'),
(17, 'Dakshata Patil', 'git@123', 'dakshatapatil4289@gmail.com', '', 3, '2023-07-08 03:36:32', '2024-01-01 11:11:41'),
(18, 'Dnyaneshwari D Kolek', 'git@123', 'dnyaneshwarikolekar2001@gmail.com', '', 3, '2023-07-08 03:37:02', '2024-01-01 11:11:41'),
(19, 'Soniya Badawadagi', 'git@123', 'sonibadawadagi12@gmail.com', '', 3, '2023-07-08 03:37:32', '2024-01-01 11:11:41'),
(20, 'Nandashree', 'git@123', 'nandashreenk2001@gmail.com', '', 3, '2023-07-08 03:37:57', '2024-01-01 11:11:41'),
(21, 'Sylvester', 'git@123', 'sylvestermca2000@gmail.com', '', 3, '2023-07-08 03:39:10', '2024-01-01 11:11:41'),
(22, 'Nivedita Jadar', 'git@123', 'jadarkaveri15@gmail.com', '', 3, '2023-07-08 03:44:39', '2024-01-01 11:11:41'),
(23, 'Shivagouda Malagouda', 'git@123', 'shivagoudapatil15@gmail.com', '', 3, '2023-07-08 03:45:04', '2024-01-01 11:11:41'),
(24, 'Aishwarya', 'git@123', 'tanavidesai99@gmail.com', '', 3, '2023-07-08 03:45:27', '2024-01-01 11:11:41'),
(25, 'Shubham patil', 'git@123', 'shubhamtukarampatil@gmail.com', '', 3, '2023-07-08 03:45:49', '2024-01-01 11:11:41'),
(26, 'Pratibha H Lingadal', 'git@123', 'lingadalpratibha@gmail.com', '', 3, '2023-07-08 03:46:12', '2024-01-01 11:11:41'),
(27, 'Varsha jat', 'git@123', 'varshajat02309@gmail.com', '', 3, '2023-07-08 03:46:36', '2024-01-01 11:11:41'),
(28, 'Abhishek khot', 'git@123', 'abhishekkhot9921@gmail.com', '', 3, '2023-07-08 03:46:58', '2024-01-01 11:11:41'),
(29, 'Prathamesh Prakash B', 'git@123', 'prathameshpbenake@gmail.com', '', 3, '2023-07-08 03:47:24', '2024-01-01 11:11:41'),
(30, 'Rakeeb Ontigar', 'git@123', 'ontigarraqib03@gmail.com', '', 3, '2023-07-08 03:47:47', '2024-01-01 11:11:41'),
(31, 'Sharan Hiremani', 'git@123', 'sharanrhiremani@gmail.com', '', 3, '2023-07-08 03:48:06', '2024-01-01 11:11:41'),
(32, 'Rupesh Chavan', 'git@123', 'rupeshchavan048@gmail.com', '', 3, '2023-07-08 03:48:24', '2024-01-01 11:11:41'),
(33, 'Vishal Ghadi', 'git@123', 'vishalghadi28112001@gmail.com', '', 3, '2023-07-08 03:48:44', '2024-01-01 11:11:41'),
(34, 'Nadaf Najama Hajisah', 'git@123', 'najamanadaf83@gmail.com', '', 3, '2023-07-08 03:49:49', '2024-01-01 11:11:41'),
(35, 'Suzen Nadaf', 'git@123', 'suzain1947@gmail.com', '', 3, '2023-07-08 03:51:55', '2024-01-01 11:11:41'),
(36, 'Kalmeshwar', 'git@123', 'kalmeshwarbirje@gmail.com', '', 3, '2023-07-08 03:52:14', '2024-01-01 11:11:41'),
(37, 'Pooja', 'git@123', 'poojavajramatti28@gmail.com', '', 3, '2023-07-08 03:52:51', '2024-01-01 11:11:41'),
(38, 'Laxmi Mullatti', 'git@123', 'mullattilaxmi@gmail.com', '', 3, '2023-07-08 03:53:12', '2024-01-01 11:11:41'),
(39, 'Sneha Gangal', 'git@123', 'snehagangal98@gmail.com', '', 3, '2023-07-08 03:53:30', '2024-01-01 11:11:41'),
(40, 'Shweta Lokur', 'git@123', 'shwetalokur2@gmail.com', '', 3, '2023-07-08 03:53:48', '2024-01-01 11:11:41'),
(41, 'Anupama Manoj Kawale', 'git@123', 'anupamakawale1281998@gmail.com', '', 3, '2023-07-08 03:54:44', '2024-01-01 11:11:41'),
(42, 'Banashankari Kamat', 'git@123', 'banashankarikamat2001@gmail.com', '', 3, '2023-07-08 03:55:08', '2024-01-01 11:11:41'),
(43, 'Nikita Patil', 'git@123', 'nikitapatil95815@gmail.com', '', 3, '2023-07-08 03:55:51', '2024-01-01 11:11:41'),
(44, 'Aishwarya P Mahendrakar', 'git@123', 'aishwaryamahendrakar4@gmail.com', '', 3, '2023-07-08 03:56:17', '2024-01-01 11:11:41'),
(45, 'Gouri', 'git@123', '09gouri.desai@gmail.com', '', 3, '2023-07-08 03:56:37', '2024-01-01 11:11:41'),
(46, 'Tastain Sannakki', 'git@123', 'sannakkitastain@gmail.com', '', 3, '2023-07-08 03:56:58', '2024-01-01 11:11:41'),
(47, 'Akshata Bhadti', 'git@123', 'akshatabhadti2645@gmail.com', '', 3, '2023-07-08 03:57:15', '2024-01-01 11:11:41'),
(48, 'Shivani Nair', 'git@123', 'shivani.nair1201@gmail.com', '', 3, '2023-07-08 03:57:42', '2024-01-01 11:11:41'),
(49, 'Omkar Kesarkar', 'git@123', 'omkarkesarkar65@gmail.com', '', 3, '2023-07-08 03:58:00', '2024-01-01 11:11:41'),
(50, 'Palash Kalghatgi', 'git@123', 'kalghatgipalash@gmail.com', '', 3, '2023-07-08 03:58:32', '2024-01-01 11:11:41'),
(51, 'Afra Pathan', 'git@123', 'afrapathan2506@gmail.com', '', 3, '2023-07-08 03:58:52', '2024-01-01 11:11:41'),
(52, 'Neha Vijay Yadav', 'git@123', 'nehayadavkerur@gmail.com', '', 3, '2023-07-08 03:59:14', '2024-01-01 11:11:41'),
(53, 'Keerti S Alebasappan', 'git@123', 'keertisakeerti@gmail.com', '', 3, '2023-07-08 03:59:32', '2024-01-01 11:11:41'),
(54, 'Sammed Shetti', 'git@123', 'sammedshetti1008@gmail.com', '', 3, '2023-07-08 03:59:50', '2024-01-01 11:11:41'),
(55, 'Rachana Mohite', 'git@123', 'mohiterach1998@gmail.com', '', 3, '2023-07-08 04:00:35', '2024-01-01 11:11:41'),
(56, 'ARUNAKUMARA M MATAPA', 'git@123', 'arunmathapati9@gmail.com', '', 3, '2023-07-08 04:01:15', '2024-01-01 11:11:41'),
(57, 'Savitri Sonnad', 'git@123', 'savitrisonnad123@gmail.com', '', 3, '2023-07-08 04:01:36', '2024-01-01 11:11:41'),
(58, 'Mansi Bhatkande', 'git@123', 'mansibhatkande893@gmail.com', '', 3, '2023-07-08 04:01:55', '2024-01-01 11:11:41'),
(59, 'Chetan P Shirahatti', 'git@123', 'chetanpshi9@gmail.com', '', 3, '2023-07-08 04:02:14', '2024-01-01 11:11:41'),
(60, 'Omkar Potadar', 'git@123', 'omkarpotadar5302@gmail.com', '', 3, '2023-07-08 04:02:43', '2024-01-01 11:11:41'),
(61, 'Manikanta. Reddy.H', 'git@123', 'manireddyh333@gmail.com', '', 3, '2023-07-08 04:03:01', '2024-01-01 11:11:41'),
(62, 'Chetan', 'git@123', 'chetangoblin@gmail.com', '', 3, '2023-07-08 04:03:35', '2024-01-01 11:11:41'),
(63, 'Sunita Hosamani', 'git@123', 'sunitarhosamanikrt@gmail.com', '', 3, '2023-07-08 04:04:09', '2024-01-01 11:11:41'),
(64, 'Neha Malode', 'git@123', 'nehamalode1234@gmail.com', '', 3, '2023-07-08 04:04:33', '2024-01-01 11:11:41'),
(65, 'Sandesh U Mungari', 'git@123', 'sandeshum07@gmail.com', '', 3, '2023-07-08 04:04:52', '2024-01-01 11:11:41'),
(66, 'Affan Mujawar', 'git@123', 'mujawaraffanofficial@gmail.com', '', 3, '2023-07-08 04:05:11', '2024-01-01 11:11:41'),
(67, 'Sushmitha R Hiremath', 'git@123', 'sushmithah992@gmail.com', '', 3, '2023-07-08 04:05:30', '2024-01-01 11:11:41'),
(68, 'Komal Chavan', 'git@123', 'komalpc878@gmail.com', '', 3, '2023-07-08 04:05:51', '2024-01-01 11:11:41'),
(69, 'Ranjita Gombi', 'git@123', 'ranjitagombi01rbk@gmail.com', '', 3, '2023-07-08 04:06:32', '2024-01-01 11:11:41'),
(70, 'Shivani Shyam Pawar', 'git@123', 'shivanipawar9121999@gmail.com', '', 3, '2023-07-08 04:06:54', '2024-01-01 11:11:41'),
(71, 'Rohit R Gudasi', 'git@123', 'rohitgudasi18@gmail.com', '', 3, '2023-07-08 04:07:23', '2024-01-01 11:11:41'),
(72, 'Sumant Dharmatti', 'git@123', 'sumantdharmatti@gmail.com', '', 3, '2023-07-08 04:07:40', '2024-01-01 11:11:41'),
(73, 'Vinay Mali', 'git@123', 'malivinu2000@gmail.com', '', 3, '2023-07-08 04:07:59', '2024-01-01 11:11:41'),
(74, 'Pallavi Veerayya Hiremath', 'git@123', 'pallu.h18@gmail.com', '', 3, '2023-07-08 04:08:51', '2024-01-01 11:11:41'),
(75, 'Rajat Bahadduri', 'git@123', 'rajatbahadduri@gmail.com', '', 3, '2023-07-08 04:09:07', '2024-01-01 11:11:41'),
(76, 'Manjusha Pawar', 'git@123', 'pawarmanjusha818@gmail.com', '', 3, '2023-07-08 04:09:28', '2024-01-01 11:11:41'),
(77, 'Manasi Udaysingh Hon', 'git@123', 'hongekarmanasi539@gmail.com', '', 3, '2023-07-08 04:10:07', '2024-01-01 11:11:41'),
(78, 'Sayali', 'git@123', 'sayalislondhe@gmail.com', '', 3, '2023-07-08 04:10:25', '2024-01-01 11:11:41'),
(79, 'SHRINATH WADDAR', 'git@123', 'shrinathwaddar1224@gmail.com', '', 3, '2023-07-08 04:10:41', '2024-01-01 11:11:41'),
(80, 'Govardhan Sakhe', 'git@123', 'sakhegovardhan103@gmail.com', '', 3, '2023-07-08 06:24:59', '2024-01-01 11:11:41'),
(81, 'Saiprakash', 'git@123', 'saiprakashpednekar31@gmail.com', '', 3, '2023-07-08 06:25:31', '2024-01-01 11:11:41'),
(82, 'Pratik desai', 'git@123', 'desaipratik1008@gmail.com', '', 3, '2023-07-08 06:31:06', '2024-01-01 11:11:41'),
(83, 'Sahana M Kubsad', 'git@123', 'sahanamkubsad0401@gmail.com', '', 3, '2023-07-08 06:31:34', '2024-01-01 11:11:41'),
(84, 'Jyoti ajjappanavar', 'git@123', 'jyotiajjappanavar321@gmail.com', '', 3, '2023-07-08 06:51:34', '2024-01-01 11:11:41'),
(85, 'Abhishek F Chalawadi', 'git@123', 'abhishekchalawadi465@gmail.com', '', 3, '2023-07-08 06:52:07', '2024-01-01 11:11:41'),
(86, 'Jyoti Shivaji Salgud', 'git@123', 'salgudijyoti@gmail.com', '', 3, '2023-07-08 06:52:48', '2024-01-01 11:11:41'),
(87, 'Swati hattiholi', 'git@123', 'hattiholiswati@gmail.com', '', 3, '2023-07-08 06:53:59', '2024-01-01 11:11:41'),
(88, 'Sanket Kulkarni', 'TeStPPCHsk@1/', 'sanketkulkarnisk812@gmail.com', '', 3, '2023-07-08 06:54:18', '2024-01-01 11:11:41'),
(89, 'Samhita R Adhyapak', 'git@123', 'samhitaadhyapak@gmail.com', '', 3, '2023-07-08 06:54:39', '2024-01-01 11:11:41'),
(90, 'Abhijeet A Ghodageri', 'git@123', 'abhijeetghodageri5@gmail.com', '', 3, '2023-07-08 06:55:04', '2024-01-01 11:11:41'),
(91, 'Ishwari Kothiwale', 'git@123', 'kothiwaleishwari@gmail.com', '', 3, '2023-07-08 06:55:21', '2024-01-01 11:11:41'),
(92, 'Akshata Anil Kokate', 'git@123', 'akshatakokate4386@gmail.com', '', 3, '2023-07-08 06:55:41', '2024-01-01 11:11:41'),
(93, 'Megha Prakash Bhekan', 'git@123', 'mpbhekane37@gmail.com', '', 3, '2023-07-08 06:56:01', '2024-01-01 11:11:41'),
(94, 'Shivakumar Jalihal', 'git@123', 'shivjalihal@gmail.com', '', 3, '2023-07-10 20:40:47', '2024-01-01 11:11:41'),
(95, 'Akash Hugar', 'git@123', 'akashhugar17@gmail.com', '', 3, '2023-07-10 20:42:49', '2024-01-01 11:11:41'),
(96, 'Tejal kesarkar', 'git@123', 'tejalkesarkar18@gmail.com', '', 3, '2023-07-10 20:43:24', '2024-01-01 11:11:41'),
(97, 'Snehal Shahu Patil', 'git@123', '23snehalpatil@gmail.com', '', 3, '2023-07-10 20:44:03', '2024-01-01 11:11:41'),
(98, 'Rutuja Jotiba Karate', 'git@123', 'rutujajk4@gmail.com', '', 3, '2023-07-10 20:44:39', '2024-01-01 11:11:41'),
(99, 'Nishant', 'git@123', 'nstotar3@gmail.com', '', 3, '2023-07-14 05:57:59', '2024-01-01 11:11:41'),
(100, 'Rutika Patil', 'git@123', 'rutikapatil270@gmail.com', '', 3, '2023-07-14 06:02:15', '2024-01-01 11:11:41'),
(101, 'Pramod Todakar', 'git@123', 'pramodtodakar81@gmail.com', '', 3, '2023-07-14 06:33:06', '2024-01-01 11:11:41'),
(102, 'Prashant Jatrate', 'git@123', 'prashantjatrate143@gmail.com', '', 3, '2023-07-14 06:33:46', '2024-01-01 11:11:41'),
(103, 'Somesh Hanji', 'git@123', 'someshhanji26@gmail.com', '', 3, '2023-07-14 06:38:20', '2024-01-01 11:11:41'),
(104, 'Najmusahar kalkoti', 'git@123', 'najmusaharkalkoti@gmail.com', '', 1, '2023-07-14 06:48:35', '2024-01-01 11:11:41'),
(105, 'Jidnyasa Vishnu Pati', 'git@123', 'patiljidnyasa7@gmail.com', '', 3, '2023-07-14 06:56:11', '2024-01-01 11:11:41'),
(106, 'Kartik ITI', 'git@123', 'kartik.git108@gmail.com', '', 3, '2023-07-14 07:00:15', '2024-01-01 11:11:41'),
(107, 'Vishal Yadav', 'git@123', 'vishuvy99@gmail.com', '', 3, '2023-07-14 07:01:27', '2024-01-01 11:11:41'),
(108, 'Ajay kumar', 'git@123', 'ajayrchavan789@gmail.com', '', 3, '2023-07-14 07:02:42', '2024-01-01 11:11:41'),
(109, 'SAMEER', 'git@123', 'sameernadaf5761@gmail.com', '', 3, '2023-07-14 07:08:46', '2024-01-01 11:11:41'),
(110, 'Asheesh kulakarni', 'git@123', 'ashishkulkarni3502@gmail.com', '', 3, '2023-07-14 07:12:23', '2024-01-01 11:11:41'),
(111, 'Vinayak Marikatti', 'git@123', 'vinayakmarikatti@gmail.com', '', 3, '2023-07-14 07:13:40', '2024-01-01 11:11:41'),
(112, 'STudent', 'git@123', 'student@git.edu', '', 3, '2023-07-16 00:33:16', '2024-01-01 11:11:41'),
(113, 'Tester', 'tester@123', 'tester@git.edu', '', 4, '2023-07-18 05:13:13', '2024-01-01 11:11:41'),
(114, 'Bhoomika Nagathan', 'git@123', 'bhoomikacn11@gmail.com', '', 3, '2023-07-18 12:13:01', '2024-01-01 11:11:41'),
(115, 'Shruti', 'git@123', 'stpatil166@gmail.com', '', 3, '2023-07-18 12:13:49', '2024-01-01 11:11:41'),
(116, 'Anusha Kalburgi', 'git@123', 'anusha11kalburgi@gmail.com', '', 3, '2023-07-26 13:07:22', '2024-01-01 11:11:41'),
(117, 'Pranali Bhaganache', 'git@123', 'pranalibhaganache@gmail.com', '', 3, '2023-07-26 13:19:06', '2024-01-01 11:11:41'),
(118, 'Veena Bajantri', 'git@123', 'veenabajantri123@gmail.com', '', 3, '2023-07-26 13:22:13', '2024-01-01 11:11:41'),
(119, 'Shreya Ramagouda Naik', 'git@123', 'shreyanaik0802@gmail.com', '', 3, '2023-07-26 13:24:19', '2024-01-01 11:11:41'),
(120, 'Ritesh Shinge', 'git@123', 'riteshshinge106@gmail.com', '', 3, '2023-07-29 15:22:37', '2024-01-01 11:11:41'),
(121, 'Poorva Balikai', 'git@123', 'poorvi3337@gmail.com', '', 3, '2023-07-29 16:00:21', '2024-01-01 11:11:41'),
(122, 'Sadhana gokavi', 'git@123', 'Sadhanagokavi@gmail.com', '', 3, '2023-07-29 16:13:44', '2024-01-01 11:11:41'),
(123, 'Hrishikesh Mogare', 'hrishi@123', 'hrishikeshsm@git.edu', '', 2, '2023-07-29 17:12:51', '2024-01-01 11:11:41'),
(124, 'Supriya Mungare ', 'git@123', 'mungaresupriya@gmail.com', '', 3, '2023-07-30 11:01:57', '2024-01-01 11:11:41'),
(128, 'Pavan Mitragotri', 'pavan@123', 'pvmitragotri@git.edu', '', 2, '2023-07-30 12:09:00', '2024-01-01 11:11:41'),
(129, 'Nivedita A Gaonkar', 'git@123', 'Secretsnowy37@gmail.com', '', 3, '2023-07-30 13:34:48', '2024-01-01 11:11:41'),
(223, 'Nilesh Anvekar', 'nilesh@123', 'nnanvekar@git.edu', '', 2, '2023-08-01 13:44:11', '2024-01-01 11:11:41'),
(224, 'Shivani Patankar', 'shivani@123', 'sdpatankar@git.edu', '', 2, '2023-08-01 14:45:27', '2024-01-01 11:11:41'),
(225, 'Vijaylaxmi Patil', 'vijaylaxmi@123', 'vcpatil@git.edu', '', 2, '2023-08-01 14:46:36', '2024-01-01 11:11:41'),
(226, 'Sheetal Bandekar', 'sheetal@123', 'ssbandekar@git.edu', '', 2, '2023-08-01 14:47:19', '2024-01-01 11:11:41'),
(227, 'Swarooprani Manoor', 'swarooprani@123', 'shmanoor@git.edu', '', 2, '2023-08-01 14:49:48', '2024-01-01 11:11:41'),
(228, 'Vinod Kokitkar', 'vinod@123', 'vrkokitkar@git.edu', '', 2, '2023-08-01 14:50:42', '2024-01-01 11:11:41'),
(229, 'Sunita Padmannavar', 'sunita@123', 'sspadmannavar@git.edu', '', 2, '2023-08-01 14:51:39', '2024-01-01 11:11:41'),
(230, 'Swetha Goudar', 'swetha@123', 'sigoudar@git.edu', '', 2, '2023-08-01 14:54:41', '2024-01-01 11:11:41'),
(231, 'Pijush Barthakur', 'pijush@123', 'pbarthakur@git.edu', '', 2, '2023-08-01 14:55:57', '2024-01-01 11:11:41'),
(232, 'Mrutunjaya Emmi', 'emmi@123', 'msemmi@git.edu', '', 2, '2023-08-01 14:56:40', '2024-01-01 11:11:41'),
(233, 'Jayashri Madalgi', 'jayashri@123', 'jayashri@git.edu', '', 2, '2023-08-01 14:57:27', '2024-01-01 11:11:41'),
(234, 'Sachin Dessai', 'sachin@123', 'smdesai@git.edu', '', 2, '2023-08-02 04:26:37', '2024-01-01 11:11:41');

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `grf` (`faculty_id1`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `faculty_id2` (`faculty_id2`),
  ADD KEY `faculty_id3` (`faculty_id3`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

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
  ADD CONSTRAINT `grf` FOREIGN KEY (`faculty_id1`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`faculty_id2`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `timetable_ibfk_4` FOREIGN KEY (`faculty_id3`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
