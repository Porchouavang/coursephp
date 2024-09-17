-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 02:27 AM
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
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `teacher_id`, `subject_id`, `is_delete`, `timestamp`) VALUES
(7, 'ມ1/8', 29, 7, 0, '2024-06-04'),
(11, 'cs5', 0, 0, 0, '2024-06-04'),
(12, 'ມ7/2', 21, 9, 1, '2024-06-04'),
(13, 'cs2', 2, 9, 1, '2024-06-10'),
(14, 'ມ1/9', 0, 8, 0, '2024-06-10'),
(15, 'testtesttes', 21, 9, 0, '2024-06-10'),
(16, 'asdfssdfsdf', 21, 9, 0, '2024-06-10'),
(17, 'cw1', 21, 8, 0, '2024-06-10'),
(18, 'lastest', 21, 8, 0, '2024-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `s_score` int(3) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `timestamps` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `s_score`, `grade`, `is_delete`, `timestamps`) VALUES
(1, 92, '', 1, '2024-05-27'),
(2, 20, 'F', 1, '2024-05-27'),
(3, 95, 'A', 1, '2024-05-27'),
(4, 49, 'F', 0, '2024-05-27'),
(6, 50, 'D', 0, '2024-06-03'),
(7, 100, 'A', 0, '2024-06-07'),
(8, 48, 'F', 0, '2024-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `s_ID` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `timestamps` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`s_ID`, `subject_name`, `teacher_ID`, `is_delete`, `timestamps`) VALUES
(8, 'ວັນນະຄະດີ', 21, 0, '2024-06-04'),
(9, 'ພູມສາດ', 21, 0, '2024-06-04');

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
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
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
  `expenditure` int(11) DEFAULT NULL,
  `ex_reason` varchar(20) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `t_status` varchar(11) DEFAULT NULL,
  `m_status` varchar(11) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1 COMMENT '1:user;2admin;3:teacher;4:parents',
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `timestamps` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `profile`, `birthday`, `email`, `password`, `age`, `province`, `district`, `village`, `phone`, `mobile`, `f_name`, `f_phone`, `m_name`, `m_phone`, `income`, `expenditure`, `ex_reason`, `status`, `t_status`, `m_status`, `role`, `is_delete`, `timestamps`) VALUES
(1, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2024-03-18 19:08:56'),
(2, NULL, NULL, NULL, '', NULL, 'kang@gmail.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-18 19:10:24'),
(3, NULL, NULL, NULL, '', NULL, 'kangserpobtsuasvaaj@', '25f9e794323b453885f5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:32:32'),
(4, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:35:28'),
(5, NULL, NULL, NULL, '', NULL, '', 'd41d8cd98f00b204e980', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-20 18:36:27'),
(6, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2024-03-20 19:29:40'),
(7, NULL, NULL, NULL, '', NULL, 'admindfgsf@gmail.com', '1ba46e06aa73bbe8ef92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-25 18:27:47'),
(8, NULL, NULL, NULL, '', NULL, 'english.academia30@g', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-25 19:24:35'),
(9, NULL, NULL, NULL, '', NULL, 'admin@gmail.com', 'e10adc3949ba59abbe56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-03-26 17:54:27'),
(10, NULL, NULL, NULL, '', NULL, 'admin2@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-04-02 18:30:33'),
(12, NULL, NULL, NULL, '', NULL, 'asdfsdfs@gmalcofds', 'fe4c5295f954ecc939a2a6900bbaaab1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-04-04 19:10:40'),
(13, NULL, NULL, NULL, '', NULL, 'parents@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, 'tester', 'tester', 'tester', 'twes', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2024-04-04 19:21:36'),
(14, NULL, NULL, NULL, '', NULL, 'tester@gamilc.omtasd', '30e8f073f388469e0193300623691a36', NULL, NULL, NULL, NULL, NULL, NULL, 'asdfasdf', 'asdfasdf', 'sdfasdf', 'asdfasdf', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, '2024-04-08 17:07:51'),
(15, NULL, NULL, NULL, '', NULL, 'tester@gmail.com', '912ec803b2ce49e4a541068d495ab570', NULL, NULL, NULL, NULL, NULL, NULL, 'tester', 'tester', 'teset', 'twes', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2024-04-08 17:44:26'),
(16, NULL, NULL, NULL, '', NULL, 'english.academia30@g', 'd78c03d72e72b44a131d255aec3c8a11', NULL, NULL, NULL, NULL, NULL, NULL, 'asdf', 'asdf', 'asfd', 'asf', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, '2024-04-08 17:46:41'),
(17, 'test', 'test', 'ຍິງ', 'profiles/coconut.png', '2024-04-30', 'english.academia30@g', '', 2, 'ນະຄອນຫຼວງວຽງຈັນ', 'asd', 'asdf', 'asdf', 'asd', 'as', 'asdf', 'asfd', 'asdf', 2000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, NULL, 1, 1, '2024-05-01 18:16:14'),
(18, 'THEfsdfs', 'ACADEMIAsdfas', 'ຊາຍ', 'profiles/pv.png.jpg', '2001-12-05', 'english.academia30@g', '', 19, 'ອັດຕະປື', 'ໝື່ນ', 'ນ້ຳຮອນ', '02076589225', '2078839333', 'ກ່າງເສີ', '0304491740', 'ຈ້າຢ່າງ', '0304491740', 2500000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, 'ເງິນສົດ', 1, 0, '2024-05-06 17:41:38'),
(19, 'ສົມຫວັງ', 'ສົມສີ', 'ຊາຍ', 'profiles/porchouavang1.jpg', '2024-05-06', 'teacher1@gmail.com', '', 32, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '76589225', '2078839333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ແຕ່ງງານ', NULL, 3, 1, '2024-05-07 17:32:05'),
(20, 'THE', 'ACADEMIA', 'ອື່ນໆ', 'profiles/pv.png.jpg', '2024-05-02', 'english.academia30@g', '', 2, 'ຊຽງຂວາງ', 'sdf', 'as', 'asdf', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ແຕ່ງງານ', NULL, 3, 1, '2024-05-09 17:15:01'),
(21, 'ສົມສີ', 'ສົມຫວັງ', 'ຊາຍ', 'profiles/pv.png.jpg', '1996-05-08', 'teacher@gmail.com', '', 28, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '76589225', '2078839333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ແຕ່ງງານ', NULL, 3, 0, '2024-05-09 17:39:31'),
(22, 'ມະນີວອນ', 'ປະເສີດ', 'ຍິງ', 'profiles/FB_IMG_1652928782145.jpg', '2015-02-03', 'maneevone@gmail.com', '', 25, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '76589225', '2078839333', 'test', 'tester', 'ໝີເຮີ', '234565', 2900000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, NULL, 1, 1, '2024-05-09 17:46:41'),
(23, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200000, 'ຄ່ານ້ຳດື່ມ', NULL, NULL, NULL, 1, 1, '2024-05-13 17:28:29'),
(24, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20000, 'ຄ່າອdfgd', NULL, NULL, 'ເງິນໃນບັນຊີ', 1, 0, '2024-05-13 17:37:20'),
(25, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20000, 'ຄ່າບັດເຕີມເງິນໃນບັນຊ', NULL, NULL, 'ເງິນໃນບັນຊີ', 1, 0, '2024-05-14 17:27:04'),
(26, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 222222, '2222', NULL, NULL, 'ເງິນສົດ', 1, 1, '2024-05-14 17:33:46'),
(27, 'ທ້າວ ພອນຢ່າງ', 'ວ່າງເຮີ', 'ຊາຍ', 'profiles/IMG_84491.png', '2022-02-15', 'phon@gmai.com', '', 19, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '76589225', '2078839333', 'ວ່າງເຮີ', '0304491740', 'ໝີຢ່າງ', '0304491740', 2100000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, 'ເງິນໃນບັນຊີ', 1, 1, '2024-05-14 18:09:23'),
(28, 'ນັກສຶກສາໃໝ່', 'ລຸ້ນທີ່2', '', 'profiles/IMG_84491.png', '2001-12-06', 'newstudentt2@gmail.c', '', 18, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '02076543210', '20788883333', 'ທົດສອບໃໝ່', '0304321789', 'ທົດສອບໃໝ່', '0304321789', 2150000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, 'ເງິນໃນບັນຊີ', 1, 0, '2024-05-14 18:21:11'),
(29, 'ປໍ້ຈົວວ່າງ', 'ກ່າງເສີ', 'ຊາຍ', 'profiles/pproduct.png', '2024-05-25', 'porchouavang@gmail.c', '', 25, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '02058189995', '2078839333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ແຕ່ງງານ', NULL, 3, 1, '2024-05-31 17:55:29'),
(30, NULL, NULL, NULL, NULL, NULL, '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2024-05-31 18:11:22'),
(31, 'ທົດສອບ1', 'ທົດສອບ1', 'ຊາຍ', 'profiles/profile.png', '2024-06-23', 'tester@gmail.com', '', 25, 'ນະຄອນຫຼວງວຽງຈັນ', 'ໄຊທານີ', 'ດົງໂດກ', '02058189995', '207885555', 'tester', 'tester', 'tester', 'tester', 2500000, NULL, NULL, 'ຈ່າຍແລ້ວ', NULL, 'ເງິນໃນບັນຊີ', 1, 0, '2024-06-23 13:56:34'),
(32, 'tests', 'tests', 'ຊາຍ', 'profiles/profile.png', '2024-06-23', 'tester@gamilc.omt', '', 22, 'ເຊກອງ', 'ໄຊທານີ', 'ດົງໂດກ', '02058189995', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ໂສດ', NULL, 3, 0, '2024-06-23 17:28:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`s_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `s_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
