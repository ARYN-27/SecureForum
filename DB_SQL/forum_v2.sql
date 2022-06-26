-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 08:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'CSS', 'Discussion on CSS'),
(2, 'HTML', 'HTML Test'),
(7, 'Web Security', 'All about Web Security'),
(8, 'Crypto', 'All about Cryptography ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'CSS Test 1', '2022-01-14 01:34:37', 1, 1),
(2, 'HTML Test1', '2022-01-16 09:47:50', 2, 4),
(3, 'hello', '2022-01-16 09:47:57', 2, 4),
(4, 'HTML Test1', '2022-01-16 09:49:01', 3, 1),
(5, 'Hello, admin', '2022-01-16 09:49:31', 3, 4),
(7, 'Test10', '2022-06-09 21:28:02', 5, 29),
(26, 'test1', '2022-06-24 08:20:41', 22, 57),
(27, 'Reply1', '2022-06-24 17:17:02', 22, 57),
(28, 'hello,', '2022-06-26 01:05:17', 22, 58),
(29, 'hello everyone', '2022-06-26 01:05:46', 23, 58);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(1, 'CSS Test 1', '2022-01-14 01:34:37', 1, 1),
(2, 'HTML Test1', '2022-01-16 09:47:50', 1, 4),
(3, 'HTML Test1', '2022-01-16 09:49:01', 2, 1),
(5, 'Test10', '2022-06-09 21:28:02', 1, 29),
(6, 'Test11', '2022-06-09 21:28:31', 7, 47),
(22, 'Crypto', '2022-06-24 08:20:41', 7, 57),
(23, 'cryptotest', '2022-06-26 01:05:46', 8, 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL,
  `user_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`, `user_code`) VALUES
(22, 'admin5', '$2y$10$Izf0zTlppXdbiHR9XtaRTe2TfYvixABMxdZAoPb2pTTYHv/baOIcq', 'admin5@email.com', '2022-06-08 15:51:22', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(25, 'admin6', '$2y$10$/CQYNC0SfA6cNZ51kGQ4DOgcIK9ISGAM3qORLqKDPRYfAoVEtmXbu', 'admin6@email.com', '2022-06-08 16:07:05', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(29, 'admin7', '$2y$10$1EP93/U4IIqYsKUQmL2F3O8QdTBWp55cvWbf3CZw0vxLVozdC.NPy', 'admin7@email.com', '2022-06-08 17:57:36', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(30, 'admin8', '$2y$10$UTeyDM2nVAGgm0Y35ui8EuTdtVmS1C2QVlEmgnbifvoqo0veakf8e', 'admin8@email.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(42, 'admin9', '$2y$10$P4puIuNf2exPJ2gjZkm5UexmWkheMNPl0RTA5n6/W4mBfhUNHcrRC', 'admin9@email.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(45, 'admin10', '$2y$10$w3dTWTQqyGI.2CfEWbeNaO6vKe3FbZ8H5INMsG6FiA4/Mzsz/SWqK', 'admin10@email.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(47, 'user1', '$2y$10$lqwDfUyHJCe2q3DWCH1m/OfQx1woprzPjYvBvEYboyb2ayBZTQLvK', 'user1@email.com', '0000-00-00 00:00:00', 0, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(51, 'admin11', '$2y$10$2SV2YWLXpQsTwNyeJmf.yOPH6ifXQhyRgQRZfvz/6nTwnSpc3xmCC', 'admin11@test.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(52, 'admin12', '$2y$10$EeaiwNZQy9WMvYgaQ2HZ2.rlE91X9avWjzKOFk91keXJkjLfpKeMS', 'admin12@email.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(53, 'user2', '$2y$10$/5I1UqxJImrTtmm1EWnDpOBf.x5PMIBxFZ0q/jovngtUp0DflJRwy', 'user2@email.com', '0000-00-00 00:00:00', 0, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(56, 'user3', '$2y$10$kafWpwIehcEBFl2ciST/.ugFbMLYtQIhJ7KPZz22.JbeLX5H3LZmS', 'user3@email.com', '0000-00-00 00:00:00', 0, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(57, 'admin1', '$2y$10$4wO4mm/Dlw7uIetGLbvnO.SkPw.elirPVTpUP0K74vS7rN5l3BOMS', 'admin1@email.com', '0000-00-00 00:00:00', 1, 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad'),
(58, 'crypto', '$2y$10$JfZXUZ7UhRfEYRawMGmO2O3eVbwllcB3A.6C4zQa6pP800jr2qiOe', 'crypto@email.com', '0000-00-00 00:00:00', 0, '58a69b8bb1f5e666c354a4b8753ae06c8e6a59e6c22fafe1d9282b8a95010b32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`),
  ADD UNIQUE KEY `cat_id` (`cat_id`,`cat_name`),
  ADD UNIQUE KEY `cat_id_2` (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`),
  ADD UNIQUE KEY `user_pass` (`user_pass`),
  ADD KEY `user_code` (`user_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
