-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2022 at 01:21 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `asal_barang` varchar(255) NOT NULL,
  `lokasi_barang` varchar(255) NOT NULL,
  `unit_barang` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `merek_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `keterangan_barang` text,
  `tanggal_pembukuan` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `kategori_barang`, `asal_barang`, `lokasi_barang`, `unit_barang`, `kondisi_barang`, `merek_barang`, `harga_barang`, `foto_barang`, `keterangan_barang`, `tanggal_pembukuan`, `created_at`, `updated_at`) VALUES
(21, 'BRG260920223', 'Laptop Lenovo', 'Elektronik', 'Hibah', 'Ruang X-1 SMA', 'SMA Harum Sentosa', 'Baik', 'Lenovo', 1000000, 'default.jpg', 'Laptop ini merupakan laptop yang dibeli dari hibah', '2022-09-13', '2022-09-16 22:33:34', '2022-10-04 01:48:47'),
(49, 'BRG3009202211', 'Kursi Lipat', 'Kendaraan', 'BOS', 'Ruang X-1 SMA', 'SMA Harum Sentosa', 'Baik', 'Chitose', 200000, 'default.jpg', '', '2022-09-25', '2022-09-30 15:29:10', '2022-10-04 02:04:34'),
(84, 'BRG041020222', 'Tablet iPad Pro', 'Elektronik', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Apple', 13599000, 'default.jpg', 'iPad Pro 5th Generation and useful for everyday use', '2022-10-04', '2022-10-04 08:30:30', '2022-10-03 23:12:41'),
(85, 'BRG041020223', 'Komputer iMac 24 inci ', 'Elektronik', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Apple', 23999000, 'default.jpg', 'Ukuran layar 24 inci, memiliki empat port, dan ditenagai dengan prosesor M1', '2022-10-04', '2022-10-04 08:32:51', '2022-10-04 08:32:51'),
(86, 'BRG041020224', 'Smart TV Changhong L32G7N', 'Elektronik', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Changhong ', 1799000, 'default.jpg', 'Ukuran layar 32 inci dengan sistem operasi android 11', '2022-10-04', '2022-10-04 08:35:53', '2022-10-04 08:35:53'),
(87, 'BRG041020225', 'Dispenser Galon Bawah Hydra PWC 776', 'Barang Bergerak', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Polytron', 2159000, 'default.jpg', 'Dispenser ini bisa membuat air menjadi panas dan juga dingin', '2022-10-04', '2022-10-04 08:37:11', '2022-10-04 01:24:30'),
(88, 'BRG041020226', 'Printer Epson L121', 'Elektronik', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Epson', 1648030, 'default.jpg', '', '2022-10-04', '2022-10-04 08:38:55', '2022-10-04 08:38:55'),
(91, 'BRG041020228', 'Meja Rapat', 'Barang Bergerak', 'Kas', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', '-', 200000, 'default.jpg', '', '2022-10-04', '2022-10-04 09:15:15', '2022-10-04 09:15:15'),
(131, 'BRG041020221', 'Kipas Angin Dinding', 'Elektronik', 'BOS', 'Ruang TU SMA', 'SMA Harum Sentosa', 'Baik', 'Maspion', 1200000, 'default.jpg', 'Kipas angin dinding dibeli di toko rahmat jaya', '2022-10-04', '2022-10-04 13:19:54', '2022-10-04 13:19:54'),
(132, 'BRG041020227', 'AC Mitsubishi Heavy Industries 1/2 PK SRK05CR-S / SRK05CRS', 'Elektronik', 'Kas', 'Ruang X-1 SMA', 'SMA Harum Sentosa', 'Baik', 'Mitsubishi Heavy Industries ', 3910000, 'default.jpg', 'Dipindahkan dari SMK ke SMA', '2022-10-04', '2022-10-04 13:22:49', '2022-10-04 02:37:54'),
(133, 'BRG041020229', 'Lemari Ruangan', 'Barang Bergerak', 'Kas', 'Ruang Lab Komputer 2 SMK', 'SMK Harum Sentosa', 'Baik', '-', 250000, 'default.jpg', '', '2022-10-04', '2022-10-04 13:56:19', '2022-10-04 02:37:29'),
(135, 'BRG0410202211', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Perlu dicat ulang', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 02:07:51'),
(136, 'BRG0410202212', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Perlu dicat ulang', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 02:08:14'),
(137, 'BRG0410202213', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15'),
(138, 'BRG0410202214', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15'),
(139, 'BRG0410202215', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15'),
(140, 'BRG0410202216', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15'),
(141, 'BRG0410202217', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15'),
(142, 'BRG0410202218', 'Kursi Kayu', 'Barang Bergerak', 'Kas', 'Ruang I TK', 'TK Harum Sentosa', 'Baik', '-', 50000, 'default.jpg', 'Tidak ada', '2022-10-03', '2022-10-04 14:06:15', '2022-10-04 14:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `nama_unit` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'Ruang X-1 SMA', 2, '2022-09-15 10:48:51', '2022-09-25 21:41:43'),
(5, 'Ruang I TK', 4, '2022-09-25 16:23:07', '2022-09-25 22:41:14'),
(7, 'Ruang II TK', 4, '2022-09-25 16:25:09', '2022-09-25 21:42:15'),
(13, 'Ruang X-1 SMK', 1, '2022-09-25 11:43:18', '2022-09-25 21:37:48'),
(14, 'Ruang XI-1 SMK', 1, '2022-09-25 12:06:37', '2022-09-25 21:41:18'),
(15, 'Ruang TU SMA', 2, '2022-10-03 20:28:33', '2022-10-03 20:28:33'),
(16, 'Ruang Lab Komputer 1  SMK', 1, '2022-10-04 01:31:45', '2022-10-04 01:31:59'),
(17, 'Ruang Lab Komputer 2 SMK', 1, '2022-10-04 01:32:15', '2022-10-04 01:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id`, `nama_merek`, `created_at`, `updated_at`) VALUES
(1, 'Acer', '2022-09-15 10:49:56', '2022-09-15 10:49:56'),
(2, 'Lenovo', '2022-09-15 10:50:02', '2022-09-15 10:50:02'),
(3, 'Snowman', '2022-09-15 10:50:08', '2022-09-15 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1664424917, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `kode_pinjam` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `nama_barang` int(11) DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `is_returned` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id`, `kode_pinjam`, `nama_peminjam`, `nama_barang`, `tanggal_pinjam`, `tanggal_kembali`, `kontak`, `keterangan`, `is_returned`, `created_at`, `updated_at`) VALUES
(2, 'PJM041020221', 'Andrian Putra Ramadan', 85, '2022-10-04', '2022-10-04', '', '', '0', '2022-10-04 13:25:38', '2022-10-04 13:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `alamat_unit` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `nama_unit`, `alamat_unit`, `created_at`, `updated_at`, `urutan`) VALUES
(1, 'SMK Harum Sentosa', 'Jalan Merdeka Barat', '2022-09-15 10:47:57', '2022-09-25 09:30:01', 2),
(2, 'SMA Harum Sentosa', 'Jalan Perbaungan', '2022-09-15 10:48:16', '2022-09-25 09:21:25', 1),
(4, 'TK Harum Sentosa', 'Jalan Perbaungan', '2022-09-18 21:36:03', '2022-09-25 09:21:35', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '2022-09-29 04:51:42', '2022-09-29 04:51:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_unit` (`nama_unit`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`nama_unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`nama_barang`) REFERENCES `barang` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
