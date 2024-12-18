-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2024 at 04:41 PM
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
-- Database: `ireport`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_penumpang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` int(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_penumpang`, `nama`, `no_telp`, `email`, `username`, `password`, `user_role`) VALUES
(2, 'agus', 85456554, 'agus@gmail.com', 'agus333', 'df6df76ff73195507a56b98a4a3ad4e2', 'user'),
(5, 'testdb2', 1385613789, 'testdb2@gmail.com', 'testdb2', '$2y$10$7ad6ma7AqlO7A2279kdPc.ZdxTXUaOVzwtgUYScg6NkxFfUBLYZ0S', 'user'),
(6, 'testdb3', 81237172, 'testdb3@gmail.com', 'testdb3', '$2y$10$wci96dHZLXdKaKL0ZWBcZeNj5Fh8d4jPi5VyLsaUI.KgPC1fxHW1i', 'user'),
(7, 'agus rales', 812477132, 'agusrales@gmail.com', 'agusAsli', '$2y$10$DozkbsoXhNmNcutVjvP8du/3wu5PX8DPdIQLycXN5qo7/Wlx.NHXS', 'user'),
(8, 'test4', 87668754, 'test4@gmail.com', 'test4', '$2y$10$EZEMLG9mSu6fz2DzWclVmubLeOS7lAXOMsNNJCEBVOG6zSH.N/gkG', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
