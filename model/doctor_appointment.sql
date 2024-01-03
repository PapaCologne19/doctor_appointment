-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 09:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date_start` date NOT NULL,
  `appointment_date_end` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `appointment_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `appointment_date_start`, `appointment_date_end`, `name`, `type`, `appointment_status`, `date_created`) VALUES
(1, 1, '2023-11-17', '2023-11-17 00:00:00', 'James Philip Gomera', 'USER', 'REJECTED', '2023-11-09 08:57:41'),
(2, 1, '2023-11-21', '2023-11-21 00:00:00', 'James Philip Gomera', 'USER', 'APPROVED', '2023-11-09 09:03:23'),
(3, 4, '2023-11-18', '2023-11-18 00:00:00', 'Levi Gomera', 'USER', 'PENDING', '2023-11-09 09:03:58'),
(4, 4, '2023-11-21', '2023-11-21 00:00:00', 'Levi Gomera', 'USER', 'REJECTED', '2023-11-09 09:26:57'),
(5, 4, '2023-11-22', '2023-11-22 00:00:00', 'Levi Gomera', 'USER', 'PENDING', '2023-11-09 09:27:06'),
(6, 4, '2023-11-17', '2023-11-17 00:00:00', 'Levi Gomera', 'USER', 'PENDING', '2023-11-09 10:45:13'),
(7, 1, '2023-11-18', '2023-11-18 00:00:00', 'James Philip Gomera', 'USER', 'PENDING', '2023-11-09 15:01:15'),
(8, 1, '2023-11-22', '2023-11-22 00:00:00', 'Noel Labasan', 'USER', 'PENDING', '2023-11-09 15:48:58'),
(9, 1, '2023-11-23', '2023-11-23 00:00:00', 'James Philip Gomera', 'USER', 'PENDING', '2023-11-10 09:55:02'),
(10, 1, '2023-11-24', '2023-11-24 00:00:00', 'James Philip Gomera', 'USER', 'PENDING', '2023-11-10 10:09:28'),
(11, 1, '2023-11-25', '2023-11-25 00:00:00', 'James Philip Gomera', 'USER', 'PENDING', '2023-11-10 10:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pcn_id_number` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `division` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'USER',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pcn_id_number`, `firstname`, `middlename`, `lastname`, `email`, `contact_number`, `division`, `username`, `password`, `user_type`, `date_created`) VALUES
(1, 12345678, 'James Philip', 'Amante', 'Gomera', 'jpgomera19@gmail.com', 2147483647, 'STRAT', 'jpgomera19', '$2y$10$ohpIf7Jsswls1R.D50HoVuBhl.upjHYdXKJXnrU4GmGgc4vmHcJi6', 'USER', '2023-11-08 20:17:47'),
(3, 123456, 'jerryboy', 'amante', 'gomera', 'jerryboy123@gmail.com', 2147483647, 'HR', 'jerryboy123', '$2y$10$twitJnJTU3kEaF2g0jIc8eTBrB/o6CMaNnfogrojC1eZlkZNg3rNK', 'USER', '2023-11-08 20:32:33'),
(4, 123112, 'Levi', 'Amante', 'Gomera', 'levimabangis@gmail.com', 2147483647, 'PPI', 'levi123', '$2y$10$0K9wYCq0vVEj8v.9YvKoEOYRf.XHLKLmT0Ri6QfQ7d2Rq5cx2/vsu', 'USER', '2023-11-09 08:21:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
