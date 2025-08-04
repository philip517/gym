-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 11:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `checkin_time` datetime DEFAULT current_timestamp(),
  `checkout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkins`
--

INSERT INTO `checkins` (`id`, `user_id`, `checkin_time`, `checkout_time`) VALUES
(1, 4, '2025-07-25 23:17:07', '2025-07-25 23:17:09'),
(2, 4, '2025-07-25 23:17:11', '2025-07-25 23:17:18'),
(3, 4, '2025-07-25 23:17:19', '2025-07-25 23:24:22'),
(4, 4, '2025-07-25 23:24:23', '2025-07-25 23:25:26'),
(5, 4, '2025-07-25 23:25:28', '2025-07-25 23:25:45'),
(6, 4, '2025-07-25 23:25:47', '2025-07-25 23:39:20'),
(7, 4, '2025-07-25 23:25:55', '2025-07-25 23:25:59'),
(8, 4, '2025-07-25 23:26:44', '2025-07-25 23:26:45'),
(9, 4, '2025-07-25 23:39:21', '2025-07-25 23:39:28'),
(10, 4, '2025-07-25 23:39:30', '2025-07-25 23:39:38'),
(11, 4, '2025-07-25 23:39:39', '2025-07-25 23:40:19'),
(12, 4, '2025-07-25 23:40:23', '2025-07-25 23:40:25'),
(13, 4, '2025-07-25 23:47:16', '2025-07-25 23:47:18'),
(14, 4, '2025-07-25 23:47:20', '2025-07-25 23:47:26'),
(15, 4, '2025-07-25 23:47:41', '2025-07-25 23:47:46'),
(16, 4, '2025-07-25 23:48:04', '2025-07-25 23:48:19'),
(17, 4, '2025-07-25 23:48:23', '2025-07-25 23:48:30'),
(18, 4, '2025-07-26 19:16:05', '2025-07-26 19:16:18'),
(19, 4, '2025-07-26 19:16:08', '2025-07-26 19:16:18'),
(20, 4, '2025-07-26 19:16:10', '2025-07-26 19:16:17'),
(21, 4, '2025-07-26 19:16:14', '2025-07-26 19:16:16'),
(22, 4, '2025-07-26 19:16:41', '2025-07-26 19:16:47'),
(23, 4, '2025-07-26 19:30:37', '2025-07-26 19:30:41'),
(24, 4, '2025-07-26 19:30:47', '2025-07-26 19:30:53'),
(25, 4, '2025-07-26 19:30:55', '2025-07-26 19:31:02'),
(26, 4, '2025-07-26 19:31:04', '2025-07-26 19:31:06'),
(27, 4, '2025-07-26 19:31:17', '2025-07-26 19:31:23'),
(28, 4, '2025-07-26 19:31:41', '2025-07-26 19:31:48'),
(29, 4, '2025-07-26 19:32:04', '2025-07-26 19:32:05'),
(30, 4, '2025-07-26 19:32:12', '2025-07-26 19:32:33'),
(31, 4, '2025-07-26 19:32:35', '2025-07-26 19:32:37'),
(32, 4, '2025-07-26 19:32:42', '2025-07-26 19:33:02'),
(33, 4, '2025-07-26 19:33:09', '2025-07-26 19:33:25'),
(34, 4, '2025-07-26 19:34:30', '2025-07-26 19:34:48'),
(35, 4, '2025-07-26 19:34:53', '2025-07-26 19:35:28'),
(36, 4, '2025-07-26 19:35:09', '2025-07-26 19:35:19'),
(37, 4, '2025-07-26 19:35:33', '2025-07-26 20:16:34'),
(38, 4, '2025-07-26 20:10:53', '2025-07-26 20:10:54'),
(39, 4, '2025-07-26 20:10:56', '2025-07-26 20:10:57'),
(40, 4, '2025-07-26 20:12:09', '2025-07-26 20:12:20'),
(41, 4, '2025-07-26 20:15:14', '2025-07-26 20:15:23'),
(42, 4, '2025-07-26 20:16:04', '2025-07-26 20:16:36'),
(43, 4, '2025-07-26 20:17:40', '2025-07-26 20:17:46'),
(44, 4, '2025-07-26 20:17:43', '2025-07-26 20:17:46'),
(45, 4, '2025-07-26 20:33:36', '2025-07-26 20:33:47'),
(46, 4, '2025-07-29 21:57:04', '2025-07-29 22:18:51'),
(47, 4, '2025-07-29 22:31:34', '2025-07-29 22:31:42'),
(48, 4, '2025-07-29 22:32:00', '2025-07-29 22:32:42'),
(49, 4, '2025-07-30 20:34:17', '2025-07-30 20:34:18'),
(50, 4, '2025-07-30 20:34:21', '2025-07-30 20:34:22'),
(51, 4, '2025-07-30 20:34:46', '2025-07-30 20:34:48'),
(52, 4, '2025-08-02 22:30:40', '2025-08-02 22:30:44'),
(53, 4, '2025-08-02 22:30:49', '2025-08-02 22:31:07'),
(54, 4, '2025-08-02 22:31:11', '2025-08-02 22:31:15'),
(55, 4, '2025-08-02 22:31:33', '2025-08-02 22:31:36'),
(56, 4, '2025-08-02 22:31:39', '2025-08-02 22:31:43'),
(57, 4, '2025-08-02 22:31:48', '2025-08-02 22:31:58'),
(58, 4, '2025-08-02 22:32:05', '2025-08-02 22:48:16'),
(59, 4, '2025-08-02 22:50:07', '2025-08-02 22:50:23'),
(60, 4, '2025-08-02 22:50:29', '2025-08-02 22:50:40'),
(61, 4, '2025-08-02 22:50:52', '2025-08-02 22:51:04'),
(62, 4, '2025-08-02 22:51:05', '2025-08-02 22:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$xgfXIZM6fJ.gtou9PgxVLOm2j0uEE0GEpXRfE6d3DavH8t65b2g4m'),
(2, 'users1', '1234'),
(3, 'philip', '$2y$10$1iKShTDMCaK/WcCKUrS.Wud2KBfv4lY9hM01rWNDBGmqjiS7BUQbq'),
(4, 'phil', '$2y$10$v5T9K7668U4jEtsQIaEVBO7FxRi7LDPTTA/0ALLIGCGIEFrNMLZQe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `checkins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
