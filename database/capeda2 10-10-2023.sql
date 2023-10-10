-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 07:47 AM
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
-- Database: `capeda2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_profiles`
--

CREATE TABLE `account_profiles` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `cpNumber` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `temporary_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_exp` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `activationToken` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_profiles`
--

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `address`, `email`, `temporary_password`, `password`, `otp`, `otp_exp`, `status`, `activationToken`, `user_role`) VALUES
(62, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'user1@gmail.com', '', '$2y$10$FFV.N.WtTVsItLPqzwDIf.2DWfVkYVQcYbPDRTnplGURnEhdTJcES', '330407', '2023-10-02 01:28:14', 1, '', 1),
(65, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'yoji@gmail.com', '', '$2y$10$0T4z72ycLWQcRNVRrAWtmOu0kC3g7ZG80EKTGM7TTD7Jn0NFjwFxa', '956016', '2023-10-02 01:58:52', 1, '', 1),
(69, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'notverified@gmail.com', '', '$2y$10$tGJoowPbUWoNSKJLY8ru8ukj42AiwZMC6s3s9y9Nh4k.VRUdpGAzS', '814434', '2023-10-02 02:34:58', 1, '', 0),
(70, 'member', 'member', '9384727212', 'Bacoor Cavite', 'member1@gmail.com', '', '$2y$10$NKXo0hQWMcFLf5WGQ8yGF.lqwTg0pPAxbJaMGzV/Q8QnDstA2iP7m', '618066', '2023-10-02 02:42:29', 1, '', 0),
(75, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'ericyeoj.soriano@cvsu.edu.ph', '', '$2y$10$TrnxLJ4AP6OARPNt/gAFUO//g3alOCKTLEsIw3Evp7ehDZ1tuhXf6', '983597', '2023-10-02 03:20:43', 1, '', 0),
(76, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'yeojsoriano721@gmail.com', '', '$2y$10$CIowoWEgzD1iqbMC.QN.TeL63CW.LfIUvhiKuIuStJsEd1xd.IJP.', '458581', '2023-10-03 14:24:09', 1, '', 0),
(82, 'Applicant Name', 'Surname', '+6393871719', 'Bacoor Cavite', 'applicant123@gmail.com', '', '+s1WxUdb7x', '', '0000-00-00 00:00:00', 0, '', 0),
(84, 'Sample Applicant', 'Applicant Sur', '+6393871719', 'Bacoor Cavite', 'applicant12@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 0, '', 0),
(86, 'Sample Applicant', 'Applicant Sur', '+6393871719', 'Bacoor Cavite', 'applicant1233@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 0, '', 0),
(87, 'Applicant', 'Number two', '+6393871719', 'Bacoor Cavite', 'applicant13@gmail.com', '', 'e^YGqkj9)h', '', '0000-00-00 00:00:00', 0, '', 0),
(88, 'ehehe', 'eheheh', '+6393871719', 'Bacoor Cavite', 'hehe@gmail.com', '', 'NK3jKzeG%I', '', '0000-00-00 00:00:00', 0, '', 0),
(90, ' gdgd', 'ddddf', '9852718719', 'Bacoor Cavite', 'website2333@gmail.com', '', '6E@OaeS6&A', '', '0000-00-00 00:00:00', 0, '', 0),
(93, 'aadad', 'addada', '+6393871719', 'Bacoor Cavite', 'adada@gmail.com', '', 'VRqMw(nchd', '', '0000-00-00 00:00:00', 0, '', 0),
(95, 'Cherold', 'Ramos', '+6393871719', 'Bacoor Cavite', 'eric123@gmail.com', '', '+7&2!QMPoO', '', '0000-00-00 00:00:00', 0, '', 0),
(96, 'Sample 23', 'Sample ', '+6393871719', 'Bacoor Cavite', 'ericyeoj@gmail.com', '', 'zj&fVLj38)', '', '0000-00-00 00:00:00', 0, '', 0),
(97, 'test', 'test', '+6393871719', 'test', 'test@gmail.com', '', 'WPsLX^z5n4', '', '0000-00-00 00:00:00', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `required_documents`
--

CREATE TABLE `required_documents` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_description` varchar(255) NOT NULL,
  `is_required` enum('required','optional','','') NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `required_documents`
--

INSERT INTO `required_documents` (`document_id`, `document_name`, `document_description`, `is_required`, `document_type`, `created_at`, `updated_at`) VALUES
(517, 'Samplesss', 'Test', 'required', 'JPEGEE', '2023-10-10 00:54:41', '2023-10-10 00:54:41'),
(518, 'Sample', 'YES', 'required', 'PNG', '2023-10-10 00:54:45', '2023-10-10 00:54:45'),
(519, 'Sample', 'PDF', 'required', 'JPG', '2023-10-10 00:55:04', '2023-10-10 00:55:04'),
(520, 'Sample', 'testing', 'required', 'eeee', '2023-10-10 00:55:11', '2023-10-10 00:55:11'),
(521, 'Sample doc', 'PDF only', 'required', 'PDF', '2023-10-10 01:00:13', '2023-10-10 01:00:13'),
(522, 'Sample', 'PDF', 'required', '', '2023-10-10 01:02:32', '2023-10-10 01:02:32'),
(523, 'Sample', 'PDF', 'required', '', '2023-10-10 01:09:31', '2023-10-10 01:09:31'),
(524, 'Sample', 'PDF', 'required', '', '2023-10-10 01:22:38', '2023-10-10 01:22:38'),
(525, 'Sample', 'PDF', 'required', '', '2023-10-10 02:20:44', '2023-10-10 02:20:44'),
(526, 'Sample', 'PDF', 'required', '', '2023-10-10 02:22:19', '2023-10-10 02:22:19'),
(527, 'Sample', 'PDF', 'required', '', '2023-10-10 02:36:21', '2023-10-10 02:36:21'),
(528, 'Sample', 'PDF', 'required', '', '2023-10-10 02:46:41', '2023-10-10 02:46:41'),
(529, 'Sample', 'PDF', 'required', 'pdf', '2023-10-10 02:48:10', '2023-10-10 02:48:10'),
(530, 'Sample 55', 'this is testing', 'required', 'JPEG', '2023-10-10 03:07:32', '2023-10-10 03:07:32'),
(531, 'limit testing', 'limit testing', 'required', 'PNG', '2023-10-10 03:12:41', '2023-10-10 03:12:41'),
(532, '2x2 picture', 'sample', 'required', 'PDF', '2023-10-10 05:47:20', '2023-10-10 05:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `membership_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fname`, `lname`, `email`, `password`, `account_status`, `membership_status`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '12345', '1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_profiles`
--
ALTER TABLE `account_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `required_documents`
--
ALTER TABLE `required_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_profiles`
--
ALTER TABLE `account_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `required_documents`
--
ALTER TABLE `required_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
