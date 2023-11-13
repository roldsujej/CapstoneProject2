-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 01:46 AM
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
  `birthday` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `temporary_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_exp` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `activationToken` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `denial_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_profiles`
--

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `birthday`, `age`, `address`, `email`, `temporary_password`, `password`, `otp`, `otp_exp`, `status`, `activationToken`, `user_role`, `denial_reason`) VALUES
(62, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', 'user1@gmail.com', '', '$2y$10$FFV.N.WtTVsItLPqzwDIf.2DWfVkYVQcYbPDRTnplGURnEhdTJcES', '330407', '2023-10-02 01:28:14', 2, '', 1, ''),
(65, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', 'yoji@gmail.com', '', '$2y$10$0T4z72ycLWQcRNVRrAWtmOu0kC3g7ZG80EKTGM7TTD7Jn0NFjwFxa', '956016', '2023-10-02 01:58:52', 2, '', 1, ''),
(69, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', 'notverified@gmail.com', '', '$2y$10$tGJoowPbUWoNSKJLY8ru8ukj42AiwZMC6s3s9y9Nh4k.VRUdpGAzS', '814434', '2023-10-02 02:34:58', 2, '', 0, ''),
(70, 'member', 'member', '9384727212', NULL, 0, 'Bacoor Cavite', 'member1@gmail.com', '', '$2y$10$NKXo0hQWMcFLf5WGQ8yGF.lqwTg0pPAxbJaMGzV/Q8QnDstA2iP7m', '618066', '2023-10-02 02:42:29', 2, '', 0, ''),
(84, 'Sample Applicant', 'Applicant Sur', '+6393871719', NULL, 0, 'Bacoor Cavite', 'applicant12@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 4, '', 0, ''),
(86, 'Sample Applicant', 'Applicant Sur', '+6393871719', NULL, 0, 'Bacoor Cavite', 'applicant1233@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(87, 'Applicant', 'Number two', '+6393871719', NULL, 0, 'Bacoor Cavite', 'applicant13@gmail.com', '', 'e^YGqkj9)h', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(88, 'ehehe', 'eheheh', '+6393871719', NULL, 0, 'Bacoor Cavite', 'hehe@gmail.com', '', 'NK3jKzeG%I', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(90, ' gdgd', 'ddddf', '9852718719', NULL, 0, 'Bacoor Cavite', 'website2333@gmail.com', '', '6E@OaeS6&A', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(98, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', 'sampleemail@gmail.com', '', '$2y$10$nezp0WdKGbnoMUoBNvLFJeyBoTemaHepMmvin0/EDZiWxC5/LOpYC', '354765', '2023-10-16 17:50:33', 2, '', 0, ''),
(104, 'Eric', 'Soriano', '+6393871719', NULL, 0, 'sample', 'eric12345@gmail.com', '', '4VO6XfSou9', '630383', '2023-10-17 11:21:46', 0, '', 0, ''),
(106, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'yeojsoriano722221@gmail.com', '', 'lFMHD%5yEu', '782609', '2023-10-18 02:51:20', 0, '', 0, ''),
(137, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'ericyeoj@gmail.com', '', 'GLX%oAXgm+', '972778', '2023-10-22 05:48:31', 0, '', 0, ''),
(138, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'website2@gmail.com', '', 'l$Lj%XfcTY', '352115', '2023-10-22 15:13:07', 0, '', 0, ''),
(146, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'website1@gmail.com', '', 'dfQOs*FAUM', '741383', '2023-10-23 08:09:42', 0, '', 0, ''),
(147, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'sample344@gmail.com', '', '4Vz$uTcr7(', '682626', '2023-10-23 08:10:07', 0, '', 0, ''),
(153, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', 'yeojsoriano721@gmail.com', '', '$2y$10$AyvBnn8ZkGlAgLSbi3YPz.VxIOCv734cNC0k2ou9gri5ZyoPizf/C', '302379', '2023-10-23 08:30:47', 2, '', 0, ''),
(193, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', 'sample321@gmail.com', '', '$2y$10$VnV2HYOtd0ZtRXWngSOybesrY5.edDmSYAPe/SlVqN7dRfR9r2Woi', '130002', '2023-11-02 03:25:05', 0, '', 0, ''),
(194, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', 'nkndknkf@gmail.com', '', '$2y$10$el4U5PO9LDyU6kGuOhMRNu9qR6aPRItZuLG8aJeiWFn2mR1jz7P1u', '736571', '2023-11-02 03:30:25', 0, '', 0, ''),
(195, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', 'adsaikdask@gmail.com', '', '$2y$10$I7qzmGCqLGtiMhX7BjneYuY6AEu6U1rsvqsYjXmFZBIl589KKwZ1a', '769657', '2023-11-02 03:36:13', 0, '', 0, ''),
(196, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'dadad@gmail.com', '', '$2y$10$2PXxxRV1JJt8qcLnSUN5MebkLtCrE61Ywv0jjY6HdO2WQyLYMiK6q', '284903', '2023-11-02 03:38:01', 0, '', 0, ''),
(197, 'Cherold', 'Ramos', '+6393048238', NULL, 0, 'Bacoor Cavite', 'yeojsoriano72122@gmail.com', '', '$2y$10$6qChI4jHbKhbuZ5Hjy1f5OkRWJhtQ09Uk5T2mN/fdaJVXDEv2ePga', '630287', '2023-11-02 04:29:52', 0, '', 0, ''),
(198, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', 'eirnd@gmail.com', '', '$2y$10$eda0mgEciobRJWyS..OBb.40FgFt0Iswo7pfM6yjkTqTCvXN9A5iC', '464508', '2023-11-02 05:07:47', 0, '', 0, ''),
(201, 'Cherold', 'Ramos', '+6393871719', '2001-12-01', 21, 'Bacoor Cavite', 'dadaddd@gmail.com', '', '$2y$10$1CgiGci2J0jaXS5Ptwm9q.Dh9uHNWLF.WNN.9.T2Kop9u0Udawiqa', '793848', '2023-11-02 06:50:36', 0, '', 0, ''),
(202, 'adada', 'adadad', '+6398527187', '2001-12-02', 21, 'dadadadad', 'dadadadadadadad@gmail.com', '', '$2y$10$1WhblpHytJqKfEdg6ISGfeaZ1s.iDgah7CYPPUhr93x.b..LZQak6', '625529', '2023-11-02 06:51:07', 0, '', 0, ''),
(208, 'Eric', 'Ramos', '+6393871719', '2001-12-01', 21, 'Bacoor Cavite', 'ericyeoj.soriano@cvsu.edu.ph', '', '$2y$10$YOvmi2JDo8bw0i2bO6rWmeTlIUb4x7LRvR0vf0YnWU8t7/9iwU08.', '520067', '2023-11-04 13:59:47', 2, '', 0, '');

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
(536, 'Barangay Clearance', 'Please upload a picture or a scanned document of your barangay clearance', 'required', 'PDF or IMG', '2023-10-22 06:10:42', '2023-10-22 06:10:42'),
(548, 'NBI Clearance', 'Please upload a picture or scanned document of your NBI Clearance', 'required', 'img, pdf', '2023-11-04 07:35:48', '2023-11-04 07:35:48'),
(549, '2x2 picture', 'Please upload a 2x2 picture of you, Scanned only', 'required', 'jpeg', '2023-11-04 07:36:26', '2023-11-04 07:36:26'),
(550, 'Valid Government ID', 'Philhealth, National ID, or any government Identification cards, Photocopies are not allowed', 'required', 'jpeg', '2023-11-04 07:39:36', '2023-11-04 07:39:36'),
(551, 'Sample ', 'ss', 'required', 'PDF', '2023-11-04 07:59:53', '2023-11-04 07:59:53');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_description` varchar(255) NOT NULL,
  `announcement_venue` varchar(100) NOT NULL,
  `announcement_date` date DEFAULT NULL,
  `announcement_time` time NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`announcement_id`, `announcement_title`, `announcement_description`, `announcement_venue`, `announcement_date`, `announcement_time`, `date_created`, `date_updated`) VALUES
(10, 'ss', 's', '', NULL, '00:00:00', '2023-10-15 08:18:29', '2023-10-15 08:18:29'),
(12, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-11-02', '15:00:00', '2023-11-02 04:42:18', '2023-11-02 04:42:18'),
(13, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-12-01', '00:00:00', '2023-11-02 04:54:10', '2023-11-02 04:54:10'),
(14, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-12-01', '15:00:00', '2023-11-02 04:58:07', '2023-11-02 04:58:07'),
(15, 'Meeting', 'adada', '', NULL, '00:00:00', '2023-11-02 04:59:47', '2023-11-02 04:59:47'),
(16, 'Sample title', 'sample desc', 'sample venue', '2023-11-02', '15:03:00', '2023-11-02 05:03:28', '2023-11-02 05:03:28'),
(18, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-12-01', '00:00:00', '2023-11-02 13:05:20', '2023-11-02 13:05:20'),
(19, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-12-01', '21:08:00', '2023-11-02 13:05:32', '2023-11-02 13:05:32'),
(20, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2001-12-01', '21:05:00', '2023-11-02 13:05:49', '2023-11-02 13:05:49'),
(21, 'Meeting', 'All of Capeda drivers, we will have meeting at 3:00pm in Salinas 2 Covered court today', 'salinas 2 court', '2023-12-01', '00:00:00', '2023-11-02 13:06:06', '2023-11-02 13:06:06'),
(22, 'adad', 'adad', 'adada', '2023-12-01', '21:09:00', '2023-11-02 13:06:19', '2023-11-02 13:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `membership_year` year(4) NOT NULL,
  `member_birthday` varchar(11) NOT NULL,
  `member_age` int(11) NOT NULL,
  `member_mobileNum` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `membership_status` varchar(100) NOT NULL,
  `pedicab_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_documents`
--

CREATE TABLE `uploaded_documents` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_documents`
--

INSERT INTO `uploaded_documents` (`id`, `applicant_id`, `document_id`, `file_name`, `file_path`, `upload_date`) VALUES
(9, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads65365676d873e_Web-based membership application system for CAPEDA .pdf', '2023-10-23 11:18:14'),
(10, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6536567bd6a1a_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:18:19'),
(11, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads65365683c2dc5_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:18:27'),
(12, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6536579665390_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:23:02'),
(13, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads653657af61694_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:23:27'),
(14, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads653657d732fc3_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:24:07'),
(15, 168, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6536582265942_SORIANO_ERIC YEOJ_HORLANDA.pdf', '2023-10-23 11:25:22'),
(16, 208, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads65463f52055c6_SORIANO_ERIC YEOJ_HORLANDA 2023-2024 FIRST.pdf', '2023-11-04 12:55:46'),
(17, 208, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6546401968f2a_Soriano-Lucion-Vargas_BSIT-4C_Task1_ITEC110.pdf', '2023-11-04 12:59:05'),
(18, 208, 536, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads654640a96a775_FAITH JOERIE TARPAULIN .pdf', '2023-11-04 13:01:29'),
(19, 208, 548, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6546411a0c2c4_Lesson-7-Likerts-Scale.pdf', '2023-11-04 13:03:22'),
(20, 208, 548, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads654725e8c841c_Lesson-4-Introduction-to-Probability.pdf', '2023-11-05 05:19:36'),
(21, 208, 550, '', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads6547263192c83_ITEC-95-_-Assignment4.pdf', '2023-11-05 05:20:49'),
(22, 208, 551, '655078ddac1932.22787647.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655078ddac1932.22787647.pdf', '2023-11-12 07:03:57'),
(23, 208, 536, '65507d76574ac1.33627207.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/65507d76574ac1.33627207.pdf', '2023-11-12 07:23:34'),
(24, 208, 536, '65508474c1bf45.83313039.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/65508474c1bf45.83313039.pdf', '2023-11-12 07:53:24'),
(25, 208, 548, '655084a7eb7aa4.58416813.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655084a7eb7aa4.58416813.pdf', '2023-11-12 07:54:15');

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
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_document` (`document_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_profiles`
--
ALTER TABLE `account_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `required_documents`
--
ALTER TABLE `required_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD CONSTRAINT `fk_document` FOREIGN KEY (`document_id`) REFERENCES `required_documents` (`document_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
