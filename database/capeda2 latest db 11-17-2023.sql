-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 03:14 PM
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
  `block` varchar(70) DEFAULT NULL,
  `lot` varchar(70) DEFAULT NULL,
  `street` varchar(70) DEFAULT NULL,
  `barangay` varchar(70) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `province` varchar(70) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
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

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `birthday`, `age`, `address`, `block`, `lot`, `street`, `barangay`, `city`, `province`, `gender`, `email`, `temporary_password`, `password`, `otp`, `otp_exp`, `status`, `activationToken`, `user_role`, `denial_reason`) VALUES
(62, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'user1@gmail.com', '', '$2y$10$FFV.N.WtTVsItLPqzwDIf.2DWfVkYVQcYbPDRTnplGURnEhdTJcES', '330407', '2023-10-02 01:28:14', 2, '', 1, ''),
(65, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'yoji@gmail.com', '', '$2y$10$0T4z72ycLWQcRNVRrAWtmOu0kC3g7ZG80EKTGM7TTD7Jn0NFjwFxa', '956016', '2023-10-02 01:58:52', 2, '', 1, ''),
(69, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'notverified@gmail.com', '', '$2y$10$tGJoowPbUWoNSKJLY8ru8ukj42AiwZMC6s3s9y9Nh4k.VRUdpGAzS', '814434', '2023-10-02 02:34:58', 2, '', 0, ''),
(70, 'member', 'member', '9384727212', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'member1@gmail.com', '', '$2y$10$NKXo0hQWMcFLf5WGQ8yGF.lqwTg0pPAxbJaMGzV/Q8QnDstA2iP7m', '618066', '2023-10-02 02:42:29', 2, '', 0, ''),
(84, 'Sample Applicant', 'Applicant Sur', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'applicant12@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 4, '', 0, ''),
(86, 'Sample Applicant', 'Applicant Sur', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'applicant1233@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(87, 'Applicant', 'Number two', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'applicant13@gmail.com', '', 'e^YGqkj9)h', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(88, 'ehehe', 'eheheh', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'hehe@gmail.com', '', 'NK3jKzeG%I', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(90, ' gdgd', 'ddddf', '9852718719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'website2333@gmail.com', '', '6E@OaeS6&A', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(98, 'Eric Yeoj', 'Soriano', '9384727212', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'sampleemail@gmail.com', '', '$2y$10$nezp0WdKGbnoMUoBNvLFJeyBoTemaHepMmvin0/EDZiWxC5/LOpYC', '354765', '2023-10-16 17:50:33', 2, '', 0, ''),
(104, 'Eric', 'Soriano', '+6393871719', NULL, 0, 'sample', NULL, NULL, NULL, NULL, NULL, NULL, '', 'eric12345@gmail.com', '', '4VO6XfSou9', '630383', '2023-10-17 11:21:46', 0, '', 0, ''),
(106, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'yeojsoriano722221@gmail.com', '', 'lFMHD%5yEu', '782609', '2023-10-18 02:51:20', 0, '', 0, ''),
(137, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'ericyeoj@gmail.com', '', 'GLX%oAXgm+', '972778', '2023-10-22 05:48:31', 0, '', 0, ''),
(138, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'website2@gmail.com', '', 'l$Lj%XfcTY', '352115', '2023-10-22 15:13:07', 0, '', 0, ''),
(146, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'website1@gmail.com', '', 'dfQOs*FAUM', '741383', '2023-10-23 08:09:42', 0, '', 0, ''),
(147, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'sample344@gmail.com', '', '4Vz$uTcr7(', '682626', '2023-10-23 08:10:07', 0, '', 0, ''),
(193, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'sample321@gmail.com', '', '$2y$10$VnV2HYOtd0ZtRXWngSOybesrY5.edDmSYAPe/SlVqN7dRfR9r2Woi', '130002', '2023-11-02 03:25:05', 0, '', 0, ''),
(194, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'nkndknkf@gmail.com', '', '$2y$10$el4U5PO9LDyU6kGuOhMRNu9qR6aPRItZuLG8aJeiWFn2mR1jz7P1u', '736571', '2023-11-02 03:30:25', 0, '', 0, ''),
(195, 'Cherold', 'Ramos', '9387171963', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'adsaikdask@gmail.com', '', '$2y$10$I7qzmGCqLGtiMhX7BjneYuY6AEu6U1rsvqsYjXmFZBIl589KKwZ1a', '769657', '2023-11-02 03:36:13', 0, '', 0, ''),
(196, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'dadad@gmail.com', '', '$2y$10$2PXxxRV1JJt8qcLnSUN5MebkLtCrE61Ywv0jjY6HdO2WQyLYMiK6q', '284903', '2023-11-02 03:38:01', 0, '', 0, ''),
(197, 'Cherold', 'Ramos', '+6393048238', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'yeojsoriano72122@gmail.com', '', '$2y$10$6qChI4jHbKhbuZ5Hjy1f5OkRWJhtQ09Uk5T2mN/fdaJVXDEv2ePga', '630287', '2023-11-02 04:29:52', 0, '', 0, ''),
(198, 'Cherold', 'Ramos', '+6393871719', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'eirnd@gmail.com', '', '$2y$10$eda0mgEciobRJWyS..OBb.40FgFt0Iswo7pfM6yjkTqTCvXN9A5iC', '464508', '2023-11-02 05:07:47', 0, '', 0, ''),
(201, 'Cherold', 'Ramos', '+6393871719', '2001-12-01', 21, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'dadaddd@gmail.com', '', '$2y$10$1CgiGci2J0jaXS5Ptwm9q.Dh9uHNWLF.WNN.9.T2Kop9u0Udawiqa', '793848', '2023-11-02 06:50:36', 0, '', 0, ''),
(202, 'Adada', 'Adadad', '+6398527187', '2005-12-20', 21, 'dadadadad', NULL, NULL, NULL, NULL, NULL, NULL, '', 'dadadadadadadad@gmail.com', '', '$2y$10$1WhblpHytJqKfEdg6ISGfeaZ1s.iDgah7CYPPUhr93x.b..LZQak6', '625529', '2023-11-02 06:51:07', 0, '', 0, ''),
(210, 'Eric Yeoj', 'Soriano', '+6393847272', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'yeojsoriano721@gmail.com', '', '$2y$10$iUi6z/jFe.SOWFmgih.9Lu8OpgtYXXdGnpHdRArs7C3yfwkDTh4Mu', '974021', '2023-11-16 07:54:44', 4, '', 0, 'Sample'),
(211, 'Eric Yeoj', 'Soriano', '+6393847272', NULL, 0, 'Bacoor Cavite', NULL, NULL, NULL, NULL, NULL, NULL, '', 'ericyeoj.soriano@cvsu.edu.ph', '', '$2y$10$.Jr3.TcNM2wHO/Lm01FiAORxKxmjqDf1iBikZMfbgZV6.IW70bDF6', '273450', '2023-11-16 09:12:21', 2, '', 0, ''),
(212, 'Testing', 'Ramos', '+6363983838', NULL, 0, '', '7', '11', 'Mars', 'Salinas 2', 'Bacoor', 'Cavite', 'on', 'testinggg@gmail.com', '', '$2y$10$VvohqSy7Uz0a/nmV2Zh7jOZnxbM3LRaxZ.bcXwNYRP9KFTGkWfqHy', '886070', '2023-11-17 12:00:36', 0, '', 0, ''),
(213, 'Testing', 'Soriano', '+6363983838', '2001-12-01', 0, '', '7', '11', 'Mars', 'Salinas 2', 'Bacoor', 'Cavite', 'on', 'admin@gmail.com', '', '$2y$10$4.NB8cYwoK8TvVf3iIxz8uEU1fZS4iM.LrgM/oM3Cvt9unwYmN.ie', '252890', '2023-11-17 12:14:26', 0, '', 0, '');

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
(551, 'Sample ', 'ss', 'required', 'PDF', '2023-11-04 07:59:53', '2023-11-04 07:59:53'),
(552, 'Sample2', 'Ples sample', 'required', 'PDF', '2023-11-13 13:46:40', '2023-11-13 13:46:40'),
(553, 'sapmle', 'adada', 'required', 'PDF', '2023-11-15 15:38:05', '2023-11-15 15:38:05'),
(554, 'Test', 'for testing', '', 'PDF', '2023-11-16 10:45:55', '2023-11-16 10:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `admin_cpNumber` varchar(11) NOT NULL,
  `admin_birthday` date DEFAULT NULL,
  `admin_age` int(11) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `membership_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `fname`, `lname`, `admin_cpNumber`, `admin_birthday`, `admin_age`, `admin_address`, `email`, `password`, `account_status`, `membership_status`) VALUES
(1, 'admin', 'admin', '', NULL, 0, '', 'admin@gmail.com', '12345', '1', 'admin'),
(2, 'Cherold', 'Ramos', '+6393871719', '2001-12-09', 0, 'Salinas Bacoor', 'yeojsoriano721@gmail.com', '$2y$10$DlE9BbhoTbgUrldC8TxOC.thMBcs957NJtP8i0p/pEcH6Ct1j8cuq', '', ''),
(3, 'Cherold', 'Ramos', '+6393871719', '2001-12-01', 0, 'Bacoor Cavite', 'website1@gmail.com', '$2y$10$W05Bdx63oLFNZ9wuhLdgxexzG.ZqRPBM79CaA3aW4VVBRMKdD9D5K', '', ''),
(4, 'Admin', 'Admin', '+6393892783', '2001-12-01', 0, 'Bacoor Cavite', 'admin@gmail.com', '$2y$10$/ZOOfwZroqTZmvitsmWzse.DeNHnxij4BSmKNzYwQI5f1uQBhhnbq', '', '');

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
(25, 208, 548, '655084a7eb7aa4.58416813.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655084a7eb7aa4.58416813.pdf', '2023-11-12 07:54:15'),
(26, 208, 536, '655215049af640.83754194.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655215049af640.83754194.pdf', '2023-11-13 12:22:28'),
(27, NULL, 536, '65521d6e40e5e7.87130779.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/65521d6e40e5e7.87130779.pdf', '2023-11-13 12:58:22'),
(28, 208, 551, '65521fb8eeea58.16697356.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/65521fb8eeea58.16697356.pdf', '2023-11-13 13:08:08'),
(29, 208, 551, '655220d07545f1.70157915.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655220d07545f1.70157915.pdf', '2023-11-13 13:12:48'),
(30, 208, 551, '655220ec9b21e5.73849188.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655220ec9b21e5.73849188.pdf', '2023-11-13 13:13:16'),
(31, 208, 551, '655221a94efde3.23681566.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655221a94efde3.23681566.pdf', '2023-11-13 13:16:25'),
(32, 208, 552, '655228ce3e7af_kaonting-sarsa-sa-araw-ng-huwebes.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\Applicant/uploads/applicant_uploads/655228ce3e7af_kaonting-sarsa-sa-araw-ng-huwebes.pdf', '2023-11-13 13:46:54'),
(33, 62, 536, '6554e50ce66d9_Soriano-Lucion-Vargas_BSIT-4C_Task1_ITEC110.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/uploads/applicant_uploads/6554e50ce66d9_Soriano-Lucion-Vargas_BSIT-4C_Task1_ITEC110.pdf', '2023-11-15 15:34:36'),
(34, 62, 548, '6554e51358b0a_SORIANO_ERIC YEOJ_HORLANDA 2022-2023 SECOND.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/uploads/applicant_uploads/6554e51358b0a_SORIANO_ERIC YEOJ_HORLANDA 2022-2023 SECOND.pdf', '2023-11-15 15:34:43'),
(35, 62, 551, '6554e51d720ff_SORIANO_ERIC YEOJ_HORLANDA 2022-2023 SECOND.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/uploads/applicant_uploads/6554e51d720ff_SORIANO_ERIC YEOJ_HORLANDA 2022-2023 SECOND.pdf', '2023-11-15 15:34:53'),
(36, 62, 553, '6554e5e5d4309_Case-Study-Format-ITEC-95-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6554e5e5d4309_Case-Study-Format-ITEC-95-1.pdf', '2023-11-15 15:38:13'),
(37, 62, 552, '6555b54592d45_kaonting-sarsa-sa-araw-ng-huwebes.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555b54592d45_kaonting-sarsa-sa-araw-ng-huwebes.pdf', '2023-11-16 06:23:01'),
(38, 62, 549, '6555b57a7aa50_Case-Study-Format-ITEC-95-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555b57a7aa50_Case-Study-Format-ITEC-95-1.pdf', '2023-11-16 06:23:54'),
(39, NULL, 536, '6555dbd2771c5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2771c5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(40, NULL, 548, '6555dbd279cd8_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd279cd8_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(41, NULL, 549, '6555dbd27a662_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27a662_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(42, NULL, 550, '6555dbd27b051_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27b051_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(43, NULL, 551, '6555dbd27bcca_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27bcca_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(44, NULL, 552, '6555dbd27c514_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27c514_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(45, NULL, 553, '6555dbd27cd16_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27cd16_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(46, NULL, 536, '6555dbd27d714_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27d714_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(47, NULL, 548, '6555dbd27df2f_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27df2f_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(48, NULL, 549, '6555dbd27ea32_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27ea32_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(49, NULL, 550, '6555dbd27f453_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27f453_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(50, NULL, 551, '6555dbd27fed4_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd27fed4_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(51, NULL, 552, '6555dbd280943_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd280943_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(52, NULL, 553, '6555dbd281226_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd281226_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(53, NULL, 536, '6555dbd281cc5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd281cc5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(54, NULL, 548, '6555dbd28256e_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28256e_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(55, NULL, 549, '6555dbd282f5a_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd282f5a_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(56, NULL, 550, '6555dbd2838ce_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2838ce_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(57, NULL, 551, '6555dbd284242_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd284242_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(58, NULL, 552, '6555dbd284cb0_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd284cb0_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(59, NULL, 553, '6555dbd2855bb_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2855bb_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(60, NULL, 536, '6555dbd2860f7_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2860f7_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(61, NULL, 548, '6555dbd286abd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd286abd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(62, NULL, 549, '6555dbd2873cd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2873cd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(63, NULL, 550, '6555dbd287cfc_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd287cfc_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(64, NULL, 551, '6555dbd28850c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28850c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(65, NULL, 552, '6555dbd288de5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd288de5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(66, NULL, 553, '6555dbd2895b4_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2895b4_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(67, NULL, 536, '6555dbd289e51_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd289e51_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(68, NULL, 548, '6555dbd28a6b6_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28a6b6_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(69, NULL, 549, '6555dbd28ae24_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28ae24_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(70, NULL, 550, '6555dbd28b5bc_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28b5bc_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(71, NULL, 551, '6555dbd28be00_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28be00_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(72, NULL, 552, '6555dbd28c5e5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28c5e5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(73, NULL, 553, '6555dbd28cd36_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28cd36_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(74, NULL, 536, '6555dbd28d606_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28d606_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(75, NULL, 548, '6555dbd28de00_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28de00_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(76, NULL, 549, '6555dbd28e55c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28e55c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(77, NULL, 550, '6555dbd28eccd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28eccd_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(78, NULL, 551, '6555dbd28f46c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28f46c_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(79, NULL, 552, '6555dbd28fbc5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd28fbc5_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(80, NULL, 553, '6555dbd2902ca_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2902ca_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(81, NULL, 536, '6555dbd290a53_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd290a53_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(82, NULL, 548, '6555dbd291101_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd291101_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(83, NULL, 549, '6555dbd291878_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd291878_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(84, NULL, 550, '6555dbd2920ba_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2920ba_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(85, NULL, 551, '6555dbd2928c1_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd2928c1_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(86, NULL, 552, '6555dbd293062_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd293062_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(87, NULL, 553, '6555dbd293819_INTRODUCTION-TO-HCI-REVIEWER.pdf', '/6555dbd293819_INTRODUCTION-TO-HCI-REVIEWER.pdf', '2023-11-16 09:07:30'),
(88, NULL, 536, '6555dc3e4e5ee_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e4e5ee_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(89, NULL, 548, '6555dc3e4f03a_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e4f03a_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(90, NULL, 549, '6555dc3e4f64b_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e4f64b_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(91, NULL, 550, '6555dc3e4fb5f_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e4fb5f_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(92, NULL, 551, '6555dc3e500ac_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e500ac_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(93, NULL, 552, '6555dc3e50693_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e50693_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(94, NULL, 553, '6555dc3e50bc2_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e50bc2_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(95, NULL, 536, '6555dc3e51318_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e51318_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(96, NULL, 548, '6555dc3e51807_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e51807_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(97, NULL, 549, '6555dc3e51da8_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e51da8_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(98, NULL, 550, '6555dc3e52410_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e52410_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(99, NULL, 551, '6555dc3e52f6d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e52f6d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(100, NULL, 552, '6555dc3e534c6_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e534c6_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(101, NULL, 553, '6555dc3e5395c_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5395c_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(102, NULL, 536, '6555dc3e53f1d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e53f1d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(103, NULL, 548, '6555dc3e54395_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e54395_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(104, NULL, 549, '6555dc3e54836_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e54836_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(105, NULL, 550, '6555dc3e5536b_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5536b_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(106, NULL, 551, '6555dc3e55840_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e55840_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(107, NULL, 552, '6555dc3e55cc0_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e55cc0_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(108, NULL, 553, '6555dc3e56215_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e56215_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(109, NULL, 536, '6555dc3e5694d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5694d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(110, NULL, 548, '6555dc3e56e34_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e56e34_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(111, NULL, 549, '6555dc3e57302_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e57302_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(112, NULL, 550, '6555dc3e577a6_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e577a6_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(113, NULL, 551, '6555dc3e57c30_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e57c30_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(114, NULL, 552, '6555dc3e580b0_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e580b0_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(115, NULL, 553, '6555dc3e58565_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e58565_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(116, NULL, 536, '6555dc3e58b75_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e58b75_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(117, NULL, 548, '6555dc3e59053_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e59053_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(118, NULL, 549, '6555dc3e594e1_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e594e1_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(119, NULL, 550, '6555dc3e598a1_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e598a1_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(120, NULL, 551, '6555dc3e59d08_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e59d08_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(121, NULL, 552, '6555dc3e5a199_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5a199_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(122, NULL, 553, '6555dc3e5a635_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5a635_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(123, NULL, 536, '6555dc3e5acef_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5acef_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(124, NULL, 548, '6555dc3e5b165_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5b165_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(125, NULL, 549, '6555dc3e5b4fe_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5b4fe_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(126, NULL, 550, '6555dc3e5b894_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5b894_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(127, NULL, 551, '6555dc3e5bc4d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5bc4d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(128, NULL, 552, '6555dc3e5c057_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5c057_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(129, NULL, 553, '6555dc3e5c3e4_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5c3e4_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(130, NULL, 536, '6555dc3e5c902_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5c902_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(131, NULL, 548, '6555dc3e5ccae_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5ccae_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(132, NULL, 549, '6555dc3e5d042_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5d042_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(133, NULL, 550, '6555dc3e5d3fd_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5d3fd_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(134, NULL, 551, '6555dc3e5d934_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5d934_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(135, NULL, 552, '6555dc3e5de6e_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5de6e_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(136, NULL, 553, '6555dc3e5e38d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dc3e5e38d_SPIST_HM1B_KMSoriano_Assignment-in-THC100.pdf', '2023-11-16 09:09:18'),
(137, 211, 536, '6555dd193ea28_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd193ea28_Z-table.pdf', '2023-11-16 09:12:57'),
(138, 211, 548, '6555dd193f0fc_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd193f0fc_Z-table.pdf', '2023-11-16 09:12:57'),
(139, 211, 549, '6555dd193f72b_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd193f72b_Z-table.pdf', '2023-11-16 09:12:57'),
(140, 211, 550, '6555dd193fc8e_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd193fc8e_Z-table.pdf', '2023-11-16 09:12:57'),
(141, 211, 551, '6555dd19401d5_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd19401d5_Z-table.pdf', '2023-11-16 09:12:57'),
(142, 211, 552, '6555dd1940786_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd1940786_Z-table.pdf', '2023-11-16 09:12:57'),
(143, 211, 553, '6555dd1940cb5_Z-table.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555dd1940cb5_Z-table.pdf', '2023-11-16 09:12:57'),
(144, NULL, 536, '6555f44bca91e_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bca91e_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(145, NULL, 548, '6555f44bcb354_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcb354_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(146, NULL, 549, '6555f44bcb9b1_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcb9b1_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(147, NULL, 550, '6555f44bcbfe6_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcbfe6_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(148, NULL, 551, '6555f44bcc5f8_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcc5f8_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(149, NULL, 552, '6555f44bccb07_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bccb07_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(150, NULL, 553, '6555f44bcd035_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcd035_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(151, NULL, 554, '6555f44bcd5bd_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcd5bd_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(152, NULL, 536, '6555f44bcdd2b_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcdd2b_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(153, NULL, 548, '6555f44bce297_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bce297_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(154, NULL, 549, '6555f44bceebb_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bceebb_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(155, NULL, 550, '6555f44bcf3fa_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcf3fa_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(156, NULL, 551, '6555f44bcfa60_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcfa60_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(157, NULL, 552, '6555f44bcff2d_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bcff2d_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(158, NULL, 553, '6555f44bd040d_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd040d_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(159, NULL, 554, '6555f44bd08c6_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd08c6_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(160, NULL, 536, '6555f44bd1168_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd1168_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(161, NULL, 548, '6555f44bd16d4_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd16d4_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(162, NULL, 549, '6555f44bd1c9e_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd1c9e_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(163, NULL, 550, '6555f44bd22a7_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd22a7_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(164, NULL, 551, '6555f44bd2851_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd2851_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(165, NULL, 552, '6555f44bd2d73_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd2d73_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(166, NULL, 553, '6555f44bd31e8_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd31e8_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(167, NULL, 554, '6555f44bd361a_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd361a_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(168, NULL, 536, '6555f44bd3c86_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd3c86_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(169, NULL, 548, '6555f44bd40f9_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd40f9_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(170, NULL, 549, '6555f44bd45ad_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd45ad_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(171, NULL, 550, '6555f44bd4ac1_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd4ac1_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(172, NULL, 551, '6555f44bd509d_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd509d_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(173, NULL, 552, '6555f44bd554a_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd554a_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(174, NULL, 553, '6555f44bd5989_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd5989_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(175, NULL, 554, '6555f44bd5de3_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd5de3_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(176, NULL, 536, '6555f44bd64d2_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd64d2_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(177, NULL, 548, '6555f44bd6927_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd6927_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(178, NULL, 549, '6555f44bd6cfd_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd6cfd_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(179, NULL, 550, '6555f44bd710c_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd710c_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(180, NULL, 551, '6555f44bd752c_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd752c_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(181, NULL, 552, '6555f44bd7970_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd7970_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(182, NULL, 553, '6555f44bd7de9_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd7de9_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(183, NULL, 554, '6555f44bd8238_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd8238_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(184, NULL, 536, '6555f44bd88cd_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd88cd_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(185, NULL, 548, '6555f44bd8d0a_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd8d0a_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(186, NULL, 549, '6555f44bd91e1_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd91e1_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(187, NULL, 550, '6555f44bd9695_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd9695_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(188, NULL, 551, '6555f44bd9af8_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd9af8_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(189, NULL, 552, '6555f44bd9f8e_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bd9f8e_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(190, NULL, 553, '6555f44bda3f7_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bda3f7_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(191, NULL, 554, '6555f44bda85d_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bda85d_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(192, NULL, 536, '6555f44bdb016_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdb016_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(193, NULL, 548, '6555f44bdb54c_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdb54c_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(194, NULL, 549, '6555f44bdb9b2_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdb9b2_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(195, NULL, 550, '6555f44bdbd86_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdbd86_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(196, NULL, 551, '6555f44bdc200_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdc200_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(197, NULL, 552, '6555f44bdc740_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdc740_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(198, NULL, 553, '6555f44bdcb63_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdcb63_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(199, NULL, 554, '6555f44bdcf30_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdcf30_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(200, NULL, 536, '6555f44bdd4d7_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdd4d7_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(201, NULL, 548, '6555f44bdd918_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdd918_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(202, NULL, 549, '6555f44bdde0e_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdde0e_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(203, NULL, 550, '6555f44bde1f9_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bde1f9_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(204, NULL, 551, '6555f44bde5bc_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bde5bc_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(205, NULL, 552, '6555f44bde9e3_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bde9e3_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(206, NULL, 553, '6555f44bdee3f_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdee3f_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55'),
(207, NULL, 554, '6555f44bdf310_INSY-Ochado-System-Documentation-1.pdf', 'D:\\xampp\\htdocs\\CapstoneProject2\\ADMIN\\modals\\APPLICANT/../Applicant/uploads/6555f44bdf310_INSY-Ochado-System-Documentation-1.pdf', '2023-11-16 10:51:55');

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
  ADD PRIMARY KEY (`admin_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `required_documents`
--
ALTER TABLE `required_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

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
