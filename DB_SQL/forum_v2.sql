-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 02:40 PM
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
(7, 'Web Security', 'All about Web Security');

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
(5, 'Hello, admin', '2022-01-16 09:49:31', 3, 4);

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
(3, 'HTML Test1', '2022-01-16 09:49:01', 2, 1);

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
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'test@test.com', '2022-01-09 22:12:52', 1),
(2, 'test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f', 'test2@test2.com', '2022-01-14 01:23:11', 0),
(3, 'test1', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test1@gmail.com', '2022-01-14 20:32:03', 0),
(4, 'test3', '3ebfa301dc59196f18593c45e519287a23297589', 'test3@gmail.com', '2022-01-16 09:44:35', 0),
(7, 'test4', 'a4e624d686e03ed2767c0abd85c14426b0b1157d2ce81d27bb4fe4f6f01d688a', 'test4@gmail.com', '2022-01-18 16:38:14', 0),
(8, 'admin2', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', 'admin2@gmail.com', '2022-01-18 16:39:51', 1),
(16, 'test6', 'ed0cb90bdfa4f93981a7d03cff99213a86aa96a6cbcf89ec5e8889871f088727', 'test6@gmail.com', '2022-01-18 23:15:46', 0),
(17, 'admin3', '4fc2b5673a201ad9b1fc03dcb346e1baad44351daa0503d5534b4dfdcc4332e0', 'admin3@gmail.com', '2022-01-18 23:36:38', 1),
(22, 'admin5', '$2y$10$Izf0zTlppXdbiHR9XtaRTe2TfYvixABMxdZAoPb2pTTYHv/baOIcq', 'admin5@email.com', '2022-06-08 15:51:22', 1),
(25, 'admin6', '$2y$10$/CQYNC0SfA6cNZ51kGQ4DOgcIK9ISGAM3qORLqKDPRYfAoVEtmXbu', 'admin6@email.com', '2022-06-08 16:07:05', 1),
(29, 'admin7', '$2y$10$1EP93/U4IIqYsKUQmL2F3O8QdTBWp55cvWbf3CZw0vxLVozdC.NPy', 'admin7@email.com', '2022-06-08 17:57:36', 1),
(30, 'admin8', '$2y$10$UTeyDM2nVAGgm0Y35ui8EuTdtVmS1C2QVlEmgnbifvoqo0veakf8e', 'admin8@email.com', '0000-00-00 00:00:00', 1),
(42, 'admin9', '$2y$10$P4puIuNf2exPJ2gjZkm5UexmWkheMNPl0RTA5n6/W4mBfhUNHcrRC', 'admin9@email.com', '0000-00-00 00:00:00', 1),
(45, 'admin10', '$2y$10$w3dTWTQqyGI.2CfEWbeNaO6vKe3FbZ8H5INMsG6FiA4/Mzsz/SWqK', 'admin10@email.com', '0000-00-00 00:00:00', 1),
(47, 'user1', '$2y$10$lqwDfUyHJCe2q3DWCH1m/OfQx1woprzPjYvBvEYboyb2ayBZTQLvK', 'user1@email.com', '0000-00-00 00:00:00', 0);

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
  ADD UNIQUE KEY `user_pass` (`user_pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
