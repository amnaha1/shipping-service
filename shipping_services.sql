-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 10:11 PM
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
-- Database: `shipping services`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mypassword` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(3, 'amnah', 'tofahamoon94@gmail.com', '$2y$10$aYTZtqCJwJANEiie//.Jy.NlKQIBJp0.H6aEE/kLJ/9pDRZ/rjL5S', '2024-09-07 07:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `froma` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `sizea` int(11) NOT NULL,
  `phone` int(15) NOT NULL,
  `datea` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusa` varchar(255) NOT NULL,
  `service_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `froma`, `destination`, `sizea`, `phone`, `datea`, `statusa`, `service_id`, `user_id`, `create_at`) VALUES
(3, 'almadinah', 'makah', 1000, 12345678, '2024-09-30 02:47:27', 'successfully', 1, 3, '2024-09-08 02:48:42'),
(4, 'sudan', 'makah', 55, 1234567, '2024-09-08 21:00:00', 'pending', 2, 0, '2024-09-09 15:13:09'),
(5, 'sudan', 'makah', 66, 1234567, '2024-09-08 21:00:00', 'pending', 2, 7, '2024-09-09 15:15:52'),
(6, 'sudan', 'makah', 99, 1234567, '2024-09-08 21:00:00', 'pending', 1, 7, '2024-09-09 15:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `type`, `size`, `price`, `description`, `status`, `create_at`) VALUES
(1, '3.jpg', 'refrigerated truck', '1000kg', '500RS', 'refrigerated truck for food', 1, '2024-08-26 18:02:20'),
(2, '1.jpg', 'container truck', '500kg', '600RS', 'container truck for shipping', 1, '2024-08-28 18:14:42'),
(3, '2.jpg', 'step deck truck', '1000kg', '600SR', 'stepdeck truck for heavy load', 1, '2024-08-26 18:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mypassword` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(7, 'amnah', 'tofahamoon94@gmail.com', '$2y$10$aYTZtqCJwJANEiie//.Jy.NlKQIBJp0.H6aEE/kLJ/9pDRZ/rjL5S', '2024-09-07 05:40:42'),
(8, 'fatima', 'to@gmail.com', '$2y$10$zVmYS/HS6vs0NZTnRC6RTOBvA57gfx8tPCl87lb9NDTCBHaICQYpW', '2024-09-09 07:25:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
