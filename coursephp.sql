-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 02:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile` varchar(50) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `village` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `f_phone` varchar(11) DEFAULT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `m_phone` varchar(11) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT '1:user;2admin;3:teacher;4:parents',
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `timestamps` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `profile`, `birthday`, `email`, `password`, `age`, `province`, `district`, `village`, `phone`, `mobile`, `f_name`, `f_phone`, `m_name`, `m_phone`, `income`, `status`, `role`, `is_delete`, `timestamps`) VALUES
(1, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-03-18 19:08:56'),
(2, NULL, NULL, NULL, '', NULL, 'kang@gmail.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-18 19:10:24'),
(3, NULL, NULL, NULL, '', NULL, 'kangserpobtsuasvaaj@', '25f9e794323b453885f5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:32:32'),
(4, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:35:28'),
(5, NULL, NULL, NULL, '', NULL, '', 'd41d8cd98f00b204e980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:36:27'),
(6, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2024-03-20 19:29:40'),
(7, NULL, NULL, NULL, '', NULL, 'admindfgsf@gmail.com', '1ba46e06aa73bbe8ef92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-25 18:27:47'),
(8, NULL, NULL, NULL, '', NULL, 'english.academia30@g', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-25 19:24:35'),
(9, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-26 17:54:27'),
(10, NULL, NULL, NULL, '', NULL, 'admin2@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2024-04-02 18:30:33'),
(12, NULL, NULL, NULL, '', NULL, 'asdfsdfs@gmalcofds', 'fe4c5295f954ecc939a2a6900bbaaab1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2024-04-04 19:10:40'),
(13, NULL, NULL, NULL, '', NULL, 'parents@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, 'tester', 'tester', 'tester', 'twes', NULL, NULL, 4, 1, '2024-04-04 19:21:36'),
(14, NULL, NULL, NULL, '', NULL, 'tester@gamilc.omtasd', '30e8f073f388469e0193300623691a36', NULL, NULL, NULL, NULL, NULL, NULL, 'asdfasdf', 'asdfasdf', 'sdfasdf', 'asdfasdf', NULL, NULL, 4, 0, '2024-04-08 17:07:51'),
(15, NULL, NULL, NULL, '', NULL, 'tester@gmail.com', '912ec803b2ce49e4a541068d495ab570', NULL, NULL, NULL, NULL, NULL, NULL, 'tester', 'tester', 'teset', 'twes', NULL, NULL, 4, 1, '2024-04-08 17:44:26'),
(16, NULL, NULL, NULL, '', NULL, 'english.academia30@g', 'd78c03d72e72b44a131d255aec3c8a11', NULL, NULL, NULL, NULL, NULL, NULL, 'asdf', 'asdf', 'asfd', 'asf', NULL, NULL, 4, 0, '2024-04-08 17:46:41'),
(17, 'test', 'test', 'ຍິງ', 'profiles/coconut.png', '2024-04-30', 'english.academia30@g', '', 2, 'ນະຄອນຫຼວງວຽງຈັນ', 'asd', 'asdf', 'asdf', 'asd', 'as', 'asdf', 'asfd', 'asdf', 2000, 'ຈ່າຍແລ້ວ', 1, 0, '2024-05-01 18:16:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
