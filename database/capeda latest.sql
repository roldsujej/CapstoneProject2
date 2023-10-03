-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 05:07 PM
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
-- Database: `capeda`
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
  `membership_status` int(11) NOT NULL,
  `activationToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_profiles`
--

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `address`, `email`, `temporary_password`, `password`, `otp`, `otp_exp`, `status`, `membership_status`, `activationToken`) VALUES
(1, 'Eric', 'Yeoj', '98527187193', 'Bacoor Cavite', 'ericsoriano3243@gmail.com', '50kM0CS7zf', '$2y$10$KkjYBUlbjjvUNaWlqBXdWeKcGwDR/2y6FFgi89WgV2y83wZBQAiiO', '561720', '2023-09-03 03:44:39', 0, 0, ''),
(29, 'Eric', 'Yeoj', '9852718719', 'Bacoor Cavite', 'ericsoriano721@gmail.com', '@lL$m@Nv3&', '$2y$10$Trpo5/eSty7WM0KSQJn6AeEGNeRwvq8IB4codxyfgfkI7pHb6dOAG', '489804', '2023-09-11 03:52:44', 0, 0, ''),
(32, 'Cherold', 'Ramos', '+6393872727', 'Bacoor Cavite Salinas 2', 'yeojsoriano7213@gmail.com', '2hQvCvvG2w', '12345', '', '0000-00-00 00:00:00', 0, 0, ''),
(33, 'Cherold', 'Soriano', '+6383737373', 'Bacoor Cavite', 'yeojsoriano7221@gmail.com', '', '12345', '', '0000-00-00 00:00:00', 0, 0, ''),
(34, 'Cherold', 'Soriano', '+6332434554', 'Bacoor Cavite', 'yeojsoriano7231@gmail.com', '2_0R0gH7dz', '12345', '', '0000-00-00 00:00:00', 0, 0, ''),
(38, 'Cherold', 'Ramos', '+6334685688', 'Salinas Bacoor', 'yeojsoriano72133@gmail.com', '', '', '', '0000-00-00 00:00:00', 0, 0, ''),
(39, 'Cherold', 'Soriano', '+6393871719', 'Salinas Bacoor', 'yeojsoriano721333@gmail.com', '_kZc!EtpN1', 'jv&pxHEHqW', '', '0000-00-00 00:00:00', 0, 0, ''),
(57, 'Eric Yeoj', 'Soriano', '9384727212', 'Bacoor Cavite', 'ericyeoj.soriano@cvsu.edu.ph', '', '12345', '333608', '2023-09-28 08:43:32', 1, 1, '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_profiles`
--
ALTER TABLE `account_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
