-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 04:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(55) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `library_id` varchar(255) NOT NULL,
  `author_id` int(55) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `library_id`, `author_id`, `created_date`, `updated_date`) VALUES
(2, 'java', '26', 49, '2021-09-15 09:09:26', '2021-09-16 11:09:16'),
(3, 'CSS', '25', 49, '2021-09-16 06:09:35', '2021-09-16 06:09:35'),
(4, 'data', '25', 49, '2021-09-16 06:09:56', '2021-09-16 06:09:56'),
(5, 'data3', '25', 49, '2021-09-16 06:09:20', '2021-09-16 06:09:20'),
(6, 'data5', '26', 49, '2021-09-16 07:09:40', '2021-09-16 07:09:40'),
(7, 'B.E.E.E', '28', 54, '2021-09-16 08:09:00', '2021-09-16 08:09:00'),
(8, 'HTML', '26', 55, '2021-09-16 08:09:12', '2021-09-16 08:09:12'),
(9, 'data7', '26', 49, '2021-09-16 09:09:10', '2021-09-16 09:09:10'),
(10, 'java script', '26', 54, '2021-09-16 10:09:33', '2021-09-16 10:09:33'),
(13, 'data38', '26', 54, '2021-09-16 11:09:11', '2021-09-16 11:09:11'),
(14, 'data34', '26', 49, '2021-09-16 11:09:46', '2021-09-16 11:09:56'),
(15, 'data388', '26', 60, '2021-09-16 11:09:11', '2021-09-16 11:09:11'),
(16, 'data11', '25', 54, '2021-09-16 11:09:37', '2021-09-16 11:09:37'),
(17, 'data355', '26', 55, '2021-09-16 11:09:25', '2021-09-16 11:09:25'),
(18, 'java000', '26', 55, '2021-09-16 11:09:44', '2021-09-16 11:09:55'),
(19, 'data66', '28', 55, '2021-09-16 12:09:29', '2021-09-16 12:09:29'),
(20, 'data365', '25', 54, '2021-09-16 12:09:45', '2021-09-16 12:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(255) NOT NULL,
  `Library_name` varchar(255) NOT NULL,
  `opening_time` varchar(255) NOT NULL,
  `closing_time` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `Library_name`, `opening_time`, `closing_time`, `created_date`, `updated_date`) VALUES
(25, 'NewWorld', '04:00:00', '09:00:00', '2021-09-15 09:09:30', '2021-09-15 09:09:30'),
(26, 'NMAMIT', '08:00:00', '00:31:00', '2021-09-16 06:09:55', '2021-09-16 06:09:19'),
(27, 'NMAMIT1', '08:00:00', '07:00:00', '2021-09-16 06:09:56', '2021-09-16 06:09:56'),
(28, 'Electronics', '08:00:00', '14:00:00', '2021-09-16 08:09:55', '2021-09-16 08:09:55'),
(29, 'test', '11:00:00', '12:00:00', '2021-09-16 10:09:31', '2021-09-16 10:09:31'),
(30, 'NMAMIT333', '12:00:00', '13:00:00', '2021-09-16 11:09:32', '2021-09-16 11:09:32'),
(31, 'new2', '15:00:00', '12:00:00', '2021-09-16 11:09:39', '2021-09-16 11:09:39'),
(33, 'real', '15:32', '11:00:00', '2021-09-16 02:09:41', '2021-09-16 02:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(55) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `action` varchar(55) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `type`, `action`, `updated_date`) VALUES
(127, '57', 'User', 'loged-out', '2021-09-16 01:09:31'),
(128, '57', 'User', 'loged-in', '2021-09-16 01:09:52'),
(129, '57', 'User', 'loged-out', '2021-09-16 01:09:48'),
(130, '68', 'User', 'loged-in', '2021-09-16 02:09:02'),
(131, '68', 'User', 'loged-out', '2021-09-16 02:09:55'),
(132, '68', 'User', 'loged-in', '2021-09-16 02:09:02'),
(133, '68', 'Library', 'created', '2021-09-16 02:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `access_token`, `email`, `role`, `date_of_birth`, `created_date`, `updated_date`) VALUES
(54, 'newuser', '$2y$13$tuBScRVrkTvpdb9DUIBj.e9qvHosfNIunGJ3EzmMgx7WOSl/uEUWi', '13ImBuRZJq2B8CGFzTQtw6iT9kjbhvmQ', '7f8Dtri1dMrxYAX_vHVZkQYoP-mt2XLr', 'Sminagend@gmail.com', 'author', '2014-01-03', '2021-09-16 07:09:24', '21:09:16 08:09:22'),
(57, 'nagendra', '$2y$13$RD7JpGgEazphldl2PXnIH.hpXVq/Pp0TRDUe5oA02qzIRJdmbf3nO', 'YNsmGcqCNomAnvgl2VCXGRNTxBU3yMGz', 'GqhbbBRww_fbFSoPdi7kJ6yNd-P9hA6m', 'nagendranagu805@gmail.com', 'admin', '2014-01-22', '2021-09-16 09:09:43', '21:09:16 09:09:18'),
(58, 'nagendra2', '$2y$13$ffGbJYRh1nLnarF2w52vv.ZnmxY/RdtJWdhnaiFBcserqWco.YXp2', 'USSJpQ95v6IVwPIg0_0E-ASITz3spTiY', 'GXMJrzg6nOfo5VKZrPvA0Y1kwtwpchWf', 'nagendranagu805@outlook.c', 'author', '2014-01-17', '2021-09-16 09:09:19', '21:09:16 09:09:19'),
(60, 'nagendra3', '$2y$13$0WMz.Jopj44Acs5UoeJXnu9myUwkC1hVyRilN.C5ooU3XMdADUmZK', 'fDV1N0zOR4NaU5jasmnFCEKXhWT450eI', 'rsnxOw6bYIByDedCQKT7QPKh_mlBBVCu', 'nagendranagu805@o.com', 'author', '2014-01-17', '2021-09-16 09:09:39', '21:09:16 09:09:39'),
(61, 'newuser', '$2y$13$eCIlq3fljU760CpRcFWUEeIUXXK9DjHURTcM9z3.A4EmldoVil42O', 'N-AZ6ibejtTbTUcIH1IIBkLlqpHjEsoN', 'y7X6hoEOn37gkVYrujkzBGcZDK4RgLH8', 'Sminara@gmail.com', 'author', '2014-01-16', '2021-09-16 10:09:40', '21:09:16 10:09:40'),
(68, 'adminm', '$2y$13$JkpOMmiVfhd8uqZRoE4KJu6Itu0RAFjePRB/Ezs8E2YrHvLzut3em', 'PUB771WsZOdyByH1OHCg8lh-VDwo0cW6', 'WSUFWuaYa8-sucdviD_6rk8pdSI0PB0G', 'nagu@gmail.com', 'author', '2014-01-21', '2021-09-16 02:09:49', '21:09:16 02:09:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
