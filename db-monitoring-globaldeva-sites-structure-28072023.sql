-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2023 at 08:42 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lobaldf7_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `projects` text NOT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0=tidak aktif 1=aktif',
  `jam_induksi` int(11) DEFAULT NULL,
  `menit_induksi` int(11) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 TABLESPACE `innodb_system`;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `projects`, `status`, `jam_induksi`, `menit_induksi`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'ABKL', 'OPA', 1, 7, 0, '6', '2020-04-15 02:43:28', '2020-05-04 15:39:44'),
(5, 'goodeva', '', 1, NULL, NULL, NULL, '2020-04-27 08:57:18', '2020-04-27 08:57:38'),
(20, 'KPCS', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:05:15', '2021-04-01 09:05:15'),
(21, 'ASMI', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:10:20', '2021-04-01 09:10:20'),
(22, 'SMMS', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:10:41', '2021-04-01 09:10:41'),
(35, 'MTBU', 'OPA', 1, 8, 0, '', '2021-09-30 14:55:18', '2021-10-13 14:44:52'),
(36, 'KIDE', 'OPA', 1, 8, NULL, '', '2021-09-30 14:56:34', '2021-11-08 17:11:28'),
(39, 'BAYA', 'OPA', 1, NULL, NULL, NULL, '2022-05-25 05:02:15', '2022-05-25 05:02:15'),
(40, 'INDE', 'DFIT', 1, NULL, NULL, NULL, '2022-05-25 08:16:38', '2022-05-25 08:16:38'),
(41, 'ABB', 'GSS', 0, NULL, NULL, NULL, '2022-05-25 08:17:42', '2022-05-25 08:17:42'),
(42, 'ASTO', 'DFIT', 1, NULL, NULL, NULL, '2022-05-25 08:19:55', '2022-05-25 08:19:55'),
(43, 'SMM', 'GSS', 1, NULL, NULL, NULL, '2022-05-25 08:20:38', '2022-05-25 08:20:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
