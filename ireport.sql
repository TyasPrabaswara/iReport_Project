-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 04:32 PM
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
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal_publikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishub`
--

CREATE TABLE `dishub` (
  `id_dishub` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_lokasi`
--

CREATE TABLE `laporan_lokasi` (
  `id_laporan` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `jenis_keluhan` varchar(255) NOT NULL,
  `deskripsi_keluhan` text NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `media_laporan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_transportasi`
--

CREATE TABLE `laporan_transportasi` (
  `id_laporan` int(11) NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `jenis_keluhan` varchar(255) NOT NULL,
  `deskripsi_keluhan` text NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `id_transportasi` int(11) NOT NULL,
  `media_laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_laporan_lokasi`
--

CREATE TABLE `riwayat_laporan_lokasi` (
  `id_riwayat` int(11) NOT NULL,
  `id_laporan_lokasi` int(11) NOT NULL,
  `tanggal_perubahan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_laporan_transportasi`
--

CREATE TABLE `riwayat_laporan_transportasi` (
  `id_riwayat` int(11) NOT NULL,
  `id_laporan_transportasi` int(11) NOT NULL,
  `tanggal_perubahan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `jenis_transportasi` varchar(255) NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `rute` varchar(255) NOT NULL,
  `waktu_operasional` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_penumpang`, `nama`, `no_telp`, `email`, `username`, `password`) VALUES
(2, 'agus', 85456554, 'agus@gmail.com', 'agus333', 'df6df76ff73195507a56b98a4a3ad4e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `dishub`
--
ALTER TABLE `dishub`
  ADD PRIMARY KEY (`id_dishub`);

--
-- Indexes for table `laporan_lokasi`
--
ALTER TABLE `laporan_lokasi`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_laporan_lokasi` (`id_lokasi`),
  ADD KEY `fk_laporan_tranport_user` (`id_penumpang`);

--
-- Indexes for table `laporan_transportasi`
--
ALTER TABLE `laporan_transportasi`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_laporan_user` (`id_penumpang`),
  ADD KEY `fk_laporan_transportasi` (`id_transportasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `riwayat_laporan_lokasi`
--
ALTER TABLE `riwayat_laporan_lokasi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `fk_riwayat_lokasi` (`id_laporan_lokasi`);

--
-- Indexes for table `riwayat_laporan_transportasi`
--
ALTER TABLE `riwayat_laporan_transportasi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `fk_riwayat_transportasi` (`id_laporan_transportasi`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dishub`
--
ALTER TABLE `dishub`
  MODIFY `id_dishub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_lokasi`
--
ALTER TABLE `laporan_lokasi`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_transportasi`
--
ALTER TABLE `laporan_transportasi`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_laporan_lokasi`
--
ALTER TABLE `riwayat_laporan_lokasi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_laporan_transportasi`
--
ALTER TABLE `riwayat_laporan_transportasi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan_lokasi`
--
ALTER TABLE `laporan_lokasi`
  ADD CONSTRAINT `fk_laporan_lokasi` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `fk_laporan_tranport_user` FOREIGN KEY (`id_penumpang`) REFERENCES `user` (`id_penumpang`);

--
-- Constraints for table `laporan_transportasi`
--
ALTER TABLE `laporan_transportasi`
  ADD CONSTRAINT `fk_laporan_transportasi` FOREIGN KEY (`id_transportasi`) REFERENCES `transportasi` (`id_transportasi`),
  ADD CONSTRAINT `fk_laporan_user` FOREIGN KEY (`id_penumpang`) REFERENCES `user` (`id_penumpang`);

--
-- Constraints for table `riwayat_laporan_lokasi`
--
ALTER TABLE `riwayat_laporan_lokasi`
  ADD CONSTRAINT `fk_riwayat_lokasi` FOREIGN KEY (`id_laporan_lokasi`) REFERENCES `laporan_lokasi` (`id_laporan`);

--
-- Constraints for table `riwayat_laporan_transportasi`
--
ALTER TABLE `riwayat_laporan_transportasi`
  ADD CONSTRAINT `fk_riwayat_transportasi` FOREIGN KEY (`id_laporan_transportasi`) REFERENCES `laporan_transportasi` (`id_laporan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
