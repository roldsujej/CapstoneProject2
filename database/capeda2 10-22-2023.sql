-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 10:32 AM
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
  `user_role` int(11) NOT NULL,
  `denial_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_profiles`
--

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `address`, `email`, `temporary_password`, `password`, `otp`, `otp_exp`, `status`, `activationToken`, `user_role`, `denial_reason`) VALUES
(62, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'user1@gmail.com', '', '$2y$10$FFV.N.WtTVsItLPqzwDIf.2DWfVkYVQcYbPDRTnplGURnEhdTJcES', '330407', '2023-10-02 01:28:14', 2, '', 1, ''),
(65, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'yoji@gmail.com', '', '$2y$10$0T4z72ycLWQcRNVRrAWtmOu0kC3g7ZG80EKTGM7TTD7Jn0NFjwFxa', '956016', '2023-10-02 01:58:52', 2, '', 1, ''),
(69, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'notverified@gmail.com', '', '$2y$10$tGJoowPbUWoNSKJLY8ru8ukj42AiwZMC6s3s9y9Nh4k.VRUdpGAzS', '814434', '2023-10-02 02:34:58', 2, '', 0, ''),
(70, 'member', 'member', '9384727212', 'Bacoor Cavite', 'member1@gmail.com', '', '$2y$10$NKXo0hQWMcFLf5WGQ8yGF.lqwTg0pPAxbJaMGzV/Q8QnDstA2iP7m', '618066', '2023-10-02 02:42:29', 2, '', 0, ''),
(84, 'Sample Applicant', 'Applicant Sur', '+6393871719', 'Bacoor Cavite', 'applicant12@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 4, '', 0, ''),
(86, 'Sample Applicant', 'Applicant Sur', '+6393871719', 'Bacoor Cavite', 'applicant1233@gmail.com', '', 'FfnTWNKw1@', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(87, 'Applicant', 'Number two', '+6393871719', 'Bacoor Cavite', 'applicant13@gmail.com', '', 'e^YGqkj9)h', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(88, 'ehehe', 'eheheh', '+6393871719', 'Bacoor Cavite', 'hehe@gmail.com', '', 'NK3jKzeG%I', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(90, ' gdgd', 'ddddf', '9852718719', 'Bacoor Cavite', 'website2333@gmail.com', '', '6E@OaeS6&A', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(95, 'Cherold', 'Ramos', '+6393871719', 'Bacoor Cavite', 'eric123@gmail.com', '', '+7&2!QMPoO', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(98, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'sampleemail@gmail.com', '', '$2y$10$nezp0WdKGbnoMUoBNvLFJeyBoTemaHepMmvin0/EDZiWxC5/LOpYC', '354765', '2023-10-16 17:50:33', 2, '', 0, ''),
(101, 'Sample', 'Nyamepl', '+6393871719', 'Bacoor Cavite', 'test@223gmail.com', '', 'J*ErtY7Uf$', '', '0000-00-00 00:00:00', 0, '', 0, ''),
(104, 'Eric', 'Soriano', '+6393871719', 'sample', 'eric12345@gmail.com', '', '4VO6XfSou9', '630383', '2023-10-17 11:21:46', 0, '', 0, ''),
(106, 'Cherold', 'Ramos', '+6393871719', 'Bacoor Cavite', 'yeojsoriano722221@gmail.com', '', 'lFMHD%5yEu', '782609', '2023-10-18 02:51:20', 0, '', 0, ''),
(136, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'ericyeoj.soriano@cvsu.edu.ph', '', '$2y$10$KuIyoLHiF7n9ULTLjpofDueir1.grkjWRe5owyFCHS28dDmwBJn.G', '822645', '2023-10-22 05:45:36', 2, '', 0, ''),
(137, 'Cherold', 'Ramos', '+6393871719', 'Bacoor Cavite', 'ericyeoj@gmail.com', '', 'GLX%oAXgm+', '972778', '2023-10-22 05:48:31', 0, '', 0, '');

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
(537, '2x2 picture', 'Please upload your 2x2 picture', 'required', 'IMG', '2023-10-22 06:12:17', '2023-10-22 06:12:17'),
(538, 'adda', 'adada', '', 'dad', '2023-10-22 06:37:29', '2023-10-22 06:37:29');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`announcement_id`, `announcement_title`, `announcement_description`, `date_created`, `date_updated`) VALUES
(1, 'nyehehhe', 'Today at 3pm covered court of salinas 2 all capeda drivers should come ', '2023-10-14 16:00:00', '2023-10-15 02:24:41'),
(2, 'Release of uniform nyo', 'ALl new drivers come to salinas 2 court', '2023-10-14 21:57:38', '2023-10-15 02:23:35'),
(3, 'Meeting', '131313123', '2023-10-15 03:58:21', '2023-10-15 07:38:15'),
(4, 'Meeting of driver', '131313123', '2023-10-15 07:30:36', '2023-10-15 07:38:15'),
(5, 'Meeting of driverss', 'yeahh', '2023-10-15 07:30:42', '2023-10-15 01:38:24'),
(6, 'ss', 'ssssssss', '2023-10-15 08:06:59', '2023-10-15 02:20:19'),
(7, 'samplee', 'sampleess', '2023-10-15 08:10:47', '2023-10-15 02:10:55'),
(8, 'saple', '143455', '2023-10-15 08:14:50', '2023-10-15 02:15:03'),
(9, 'Meeting', '13555 yeah', '2023-10-15 08:15:14', '2023-10-15 02:15:25'),
(10, 'ss', 's', '2023-10-15 08:18:29', '2023-10-15 08:18:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `required_documents`
--
ALTER TABLE `required_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD CONSTRAINT `fk_applicant` FOREIGN KEY (`id`) REFERENCES `account_profiles` (`id`),
  ADD CONSTRAINT `fk_document` FOREIGN KEY (`document_id`) REFERENCES `required_documents` (`document_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
