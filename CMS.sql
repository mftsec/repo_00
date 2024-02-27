-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2024 at 12:01 AM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `post_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `content`, `post_created_at`) VALUES
(5, 1, 'test title', 'furkan xD', '2024-02-22 09:22:16'),
(6, 1, 'FURKAN TİTLE', 'furkan commant xD', '2024-02-22 10:30:23'),
(7, 1, 'furkantitle 2', 'furkan comment 2 xDDDDDDDD', '2024-02-22 10:31:03'),
(8, 2, 'xDDDDD', 'EMİRHAN COMMENT XD', '2024-02-22 10:31:50'),
(10, 2, 'eqwe', 'qwewqe', '2024-02-22 11:19:37'),
(12, 2, 'eertr', 'qrtwertert', '2024-02-22 11:24:44'),
(13, 1, 'xd', 'asd', '2024-02-23 08:31:28'),
(15, 1, 'xD', 'GDTHSFHDFYJDG', '2024-02-23 09:11:11'),
(16, 1, 'ASDASD', 'SFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHAS', '2024-02-23 09:12:03'),
(17, 1, '', 'SFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHASSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHASSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHASSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHASSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHASSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHHHHHHHHHHHHHSFGHSFGHSFGHSFGHSFGHSFGHSFGHSFGHAS', '2024-02-23 09:22:32'),
(18, 2, 'naber', 'naber xD 2', '2024-02-23 09:37:17'),
(19, 2, '', 'werewr', '2024-02-23 09:39:57'),
(24, 2, '', 'werwer', '2024-02-23 09:45:51'),
(25, 2, '', 'werwerwre', '2024-02-23 09:46:07'),
(26, 2, 'asdfs', 'werwer', '2024-02-23 09:47:31'),
(27, 3, 'qwe', 'qweqwerew', '2024-02-23 10:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `password`, `user_created_at`) VALUES
(1, 'furkan@gmail.com', 'furkan', '$2y$10$ww6Soq7bCzUB2qDcnJ8T5.5voJH5lCaOMhMwZ1vuoa.tSmtga9kJ.', '2024-02-20 14:58:12'),
(2, 'emirhan@gmail.com', 'emirhan', '$2y$10$OYJdIqW0E2bLkzE3TTS7POo0zIfS7WIu3hebPxrI8mNzU419kDEBW', '2024-02-20 15:24:12'),
(3, 'test@test.com', 'test', '$2y$10$Gasx/b8HrwyeIdpoYsTXxejK4gOdZKl6KY.ts3HlUunEiMmfc4WOq', '2024-02-23 10:53:01'),
(7, 'arda@31.org', 'arda31', '$2y$10$OF0LVxufMFM4iii2adSH5e7tL2.DlCIZb4Gdr.U4E.Urqoreek98q', '2024-02-26 08:26:44'),
(11, 'test3@gmail.com', 'test3', '$2y$10$7zmgDSPh0LrRcUZsQpuT0enaOxxBYA6/QKJ.WgpSXk5yqqOtM5zFi', '2024-02-27 13:49:08'),
(12, 'test3@gmail.com', 'test3', '$2y$10$ULY35k3ho5OqF6mWqg9MuuadVBK3Zf1UA8lllsD7gVWx5ROG0xO3i', '2024-02-27 13:49:25'),
(13, 'test5@gmail.com', 'furkan5', '$2y$10$1Vr3N.uB.IixmLl9FDHjN.WpAmQTILZxQB7nTj.CnJ1kF2CH6PdKi', '2024-02-27 13:50:31'),
(14, 'test5@gmail.com', 'furkan5', '$2y$10$.fAYNXhZPqRh8ns051/ij.AXbUaKKVGh3IiGmEat5zFiWpkByELe2', '2024-02-27 13:50:32'),
(15, 'test5@gmail.com', 'furkan5', '$2y$10$WUKF14X6jHd5jTyasIB0B.tjehjhnxujDxbFF4noubLFrhYgTfJJq', '2024-02-27 13:50:33'),
(16, 'test5@gmail.com', 'furkan5', '$2y$10$YZLvcR2HWOd9RGEAeXM.tuQj.ZHP31up39CyzVc8h9JLCfinT9U6G', '2024-02-27 13:50:33'),
(17, 'test5@gmail.com', 'furkan5', '$2y$10$63ce9PO6BFgJfjajIvsivOzeY3VrhCjhRAV1An9H5CsLHRRj.cyZK', '2024-02-27 13:50:33'),
(18, 'test5@gmail.com', 'furkan5', '$2y$10$wLnQKWRKjJ0kN3KZXUmsq.AzOL.b7UEmFoFwC4RhtZffT/nb9a.vy', '2024-02-27 13:50:33'),
(19, 'test5@gmail.com', 'furkan5', '$2y$10$5z0ZvJb4zwkGDC/vZqjxCOUmM3XUZN4LOBWEEtOED1zooaDJiOkC2', '2024-02-27 13:51:52'),
(20, 'test6@gmail.com', 'test6', '$2y$10$kUrDDen9EIxZbqNE2qujTe1NUqhFMa9a0Z2UZr0RP2mzexd4JdM36', '2024-02-27 14:21:18'),
(21, 'test15@gmail.com', 'test15', '$2y$10$cDZvPbLSzIo/4AxHXwReKetzKZlyIKBVUURYBWpR4EKXOlC3o1Rcm', '2024-02-27 15:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
