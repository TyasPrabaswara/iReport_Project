-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2024 at 11:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `penulis`, `tanggal_publikasi`) VALUES
(1, 'Minat Warga Jogja Naik Transportasi Umum Rendah, Siro: Saya Kapok Nunggu Lama Pelayanan Payah', 'SuaraJogja.id - Siro (29) warga Wedomartani, Sleman mengaku kini lebih memilih menggunakan kendaraan pribadi untuk beraktivitas ke seputar Jogja ketimbang menggunakan transportasi umum. Ia menetapkan keputusan tersebut lantaran pernah mengalami pengalaman kurang nyaman saat menggunakan Trans Jogja.\r\n\r\n\"Sistem transportasi umum di Jogja tentu sangat kurang ya, pernah aku nyoba pakai Trans Jogja dari Bandara (Adisutjipto) ke Jalan Sudirman, itu lamanya minta ampun. Udah lamaa pelayanannya payah soalnya enggak diarahin gitu. Itu pertama dan terakhir saya naik transportasi umum di Jogja,\" keluh Siro kepada SuaraJogja.\r\n\r\nMenurutnya hal itu yang kemudian membuatnya dan kebanyakan orang memilih untuk membeli kendaraan pribadi. Sebab tak dimungkiri menjadi lebih efisien dan fleksibel dari sisi waktu.', 'Galih Priatmojo | Hiskia Andika Weadcaksana - Suarajogja', '2024-12-19'),
(2, 'Dishub DIY Berkomitmen Wujudkan Sarana Prasarana Transportasi Umum Ramah Disabilitas\r\n', 'Yogyakarta - Masih banyaknya fasilitas transportasi umum yang belum ramah disabilitas dan berbagai kendala di lapangan menjadi perhatian Dinas Perhubungan DIY. Hal tersebut disampaikan oleh Sekretaris Dinas Perhubungan DIY, Nunik Arzakiyah saat membuka Sosialisasi Urusan Perhubungan dengan tema Layanan Transportasi yang Ramah Disabilitas pada Rabu, 23 Oktober 2024 di Ruang Rapat Kendalisodo Kantor Dinas Perhubungan DIY. \r\n\r\nPertemuan untuk membahas peningkatan aksesibilitas transportasi publik, khususnya layanan Trans Jogja dan Teman Bus ini diselenggarakan oleh Dinas Perhubungan DIY dan melibatkan berbagai pihak, termasuk dari Forum Komunikasi Difabel DIY, Ombudsman, PT. AMI, serta PT. JTT', ' Contributor Dishub - Dishub DIY', '2024-12-19'),
(3, 'Sembilan Stasiun Kereta Api di Yogyakarta - Solo Sudah Terintegrasi Dengan Moda Transportasi Lain', 'TEMPO.CO, Yogykarta - Sebanyak sembilan stasiun kereta api yang berada di Daerah Operasi atau Daop 6 Yogyakarta sudah terintegrasi dengan moda transportasi lainnya, baik kereta api jarak jauh, kereta bandara, dan bus. Integrasi ini mempermudah mobilitas masyarakat pengguna jasa PT Kereta Api Indonesia (KAI) yang semakin dinamis.\r\n\r\nKrisbiyantoro, Manager Humas Daop 6 Yogyakarta, mengatakan bahwa inovasi yang dilakukan Daop 6 ini sebagai upaya mendukung pembangunan berkelanjutan, selaras dengan tema HUT ke-79 KAI yaitu Safety and Sustainability. \"Daop 6 secara konsisten menciptakan akses ke transportasi umum lainnya secara aman, efisien, tetap menjaga lingkungan, dan mendukung kesejahteraan sosial-ekonomi di berbagai daerah,” kata Krisbiyantoro, Kamis, 26 September 2024.', 'ATENG', '2024-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `Bus`
--

CREATE TABLE `Bus` (
  `id_Bus` int(11) NOT NULL,
  `noPlat` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `keberangkatan` datetime NOT NULL,
  `kedatangan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Bus`
--

INSERT INTO `Bus` (`id_Bus`, `noPlat`, `nama`, `asal`, `tujuan`, `keberangkatan`, `kedatangan`) VALUES
(1, '123 abc 456', 'akoie', 'solo', 'jogja', '2024-12-19 05:10:59', '2024-12-19 05:10:59'),
(2, '123 rhu 098', 'banud', 'hhuai', 'hwhfb', '2024-12-19 05:10:59', '2024-12-19 05:10:59');

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
-- Table structure for table `keretaApi`
--

CREATE TABLE `keretaApi` (
  `id_transportasi` int(11) NOT NULL,
  `noSeri` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `keberangkatan` datetime NOT NULL,
  `kedatangan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keretaApi`
--

INSERT INTO `keretaApi` (`id_transportasi`, `noSeri`, `nama`, `asal`, `tujuan`, `keberangkatan`, `kedatangan`) VALUES
(2, '123 abc 234', 'poqwe', 'kotoa', 'hsbfow', '2024-12-19 05:11:49', '2024-12-19 05:11:49'),
(3, 'u2047 2994', 'nams', 'hdiodhf ', 'uwifhwebfj', '2024-12-19 05:11:49', '2024-12-19 05:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `KRL`
--

CREATE TABLE `KRL` (
  `id_KRL` int(11) NOT NULL,
  `noSeri` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `asal` varchar(30) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `keberangkatan` datetime NOT NULL,
  `kedatangan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KRL`
--

INSERT INTO `KRL` (`id_KRL`, `noSeri`, `nama`, `asal`, `tujuan`, `keberangkatan`, `kedatangan`) VALUES
(1, '1234b 0987', 'hsj dhe', 'uwhnks', 'uhdbff', '2024-12-19 05:12:45', '2024-12-19 05:12:45'),
(2, '0987 tuhn 7890hj', 'hssnsh', 'jioki', 'hsjscn', '2024-12-19 05:12:45', '2024-12-19 05:12:45');

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
(8, 'test4', 87668754, 'test4@gmail.com', 'test4', '$2y$10$EZEMLG9mSu6fz2DzWclVmubLeOS7lAXOMsNNJCEBVOG6zSH.N/gkG', 'user'),
(9, 'bola', 18172475, 'bola@gmail.com', 'bola', '$2y$10$ygikqb2wXmqbkrVT9q174utE8lruPQuWje5QKYYLaxK.KDqAvZ9E6', 'user'),
(10, 'Vickers', 81236427, 'vckrs@gmail.com', 'vckrsmk11', '$2y$10$nBKmIwkKqTpqkn1d9cz0Kehdij7gYv2Bwz.wWkLMq7S2yUcKu79Pq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `Bus`
--
ALTER TABLE `Bus`
  ADD PRIMARY KEY (`id_Bus`),
  ADD UNIQUE KEY `noPlat` (`noPlat`);

--
-- Indexes for table `dishub`
--
ALTER TABLE `dishub`
  ADD PRIMARY KEY (`id_dishub`);

--
-- Indexes for table `keretaApi`
--
ALTER TABLE `keretaApi`
  ADD PRIMARY KEY (`id_transportasi`),
  ADD UNIQUE KEY `noSeri` (`noSeri`);

--
-- Indexes for table `KRL`
--
ALTER TABLE `KRL`
  ADD PRIMARY KEY (`id_KRL`),
  ADD UNIQUE KEY `noSeri` (`noSeri`);

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
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Bus`
--
ALTER TABLE `Bus`
  MODIFY `id_Bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishub`
--
ALTER TABLE `dishub`
  MODIFY `id_dishub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keretaApi`
--
ALTER TABLE `keretaApi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `KRL`
--
ALTER TABLE `KRL`
  MODIFY `id_KRL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `fk_laporan_transportasi` FOREIGN KEY (`id_transportasi`) REFERENCES `keretaapi` (`id_transportasi`),
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