-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 09:28 AM
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
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_exp` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_profiles`
--

INSERT INTO `account_profiles` (`id`, `firstName`, `lastName`, `cpNumber`, `address`, `email`, `password`, `otp`, `otp_exp`, `status`) VALUES
(1, 'Eric Yeoj', 'Soriano', '9852718719', 'Bacoor Cavite', '0', '$2y$10$KkjYBUlbjjvUNaWlqBXdWeKcGwDR/2y6FFgi89WgV2y83wZBQAiiO', '561720', '2023-09-03 03:44:39', 0),
(7, 'Eric Yeoj', 'Soriano', '09387171963', 'Salinas 2 bacoor cavite', 'ericsoriano721@gmail.com', '$2y$10$eTQyB9A24IzxOLiWVhtKEeqQjhAkLIWm3xN35lsUdIwhoIDeZQleK', '158462', '2023-09-06 09:04:32', 0),
(15, 'Eric Yeoj', 'Soriano', '9852718719', 'Bacoor Cavite', 'ericyeoj.soriano@cvsu.edu.ph', '$2y$10$lNi535xvwArC77yoztCVMuj9iAif5R/z8m6FMFLKyef0GmnF1qCFm', '266936', '2023-09-06 09:31:17', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
