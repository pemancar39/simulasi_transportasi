-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2026 at 09:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simutrans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kartu`
--

CREATE TABLE `tb_kartu` (
  `id_kartu` int(11) NOT NULL,
  `nama_kartu` varchar(20) NOT NULL,
  `jenis_kartu` enum('Flazz BCA','e-Money Mandiri','Jaklingko Bank DKI','Brizzi BRI','Kartu Multi Trip KCI') NOT NULL,
  `saldo` int(11) NOT NULL,
  `khusus` tinyint(1) NOT NULL DEFAULT 0,
  `bank` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kartu`
--

INSERT INTO `tb_kartu` (`id_kartu`, `nama_kartu`, `jenis_kartu`, `saldo`, `khusus`, `bank`) VALUES
(1, 'My Flazz', 'Flazz BCA', 52100, 0, 'BBCA'),
(2, 'My e-Money', 'e-Money Mandiri', 21600, 0, 'BMRI'),
(3, 'My Jaklingko', 'Jaklingko Bank DKI', 26500, 1, 'BDKI'),
(6, 'KMT', 'Kartu Multi Trip KCI', 50000, 0, 'KCI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merchant`
--

CREATE TABLE `tb_merchant` (
  `id_merchant` int(11) NOT NULL,
  `nama_merchant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_merchant`
--

INSERT INTO `tb_merchant` (`id_merchant`, `nama_merchant`) VALUES
(1, 'TRANSJAKARTA'),
(2, 'TRANSPAKUAN'),
(3, 'BANK BCA'),
(4, 'BANK MANDIRI'),
(5, 'BANK BRI'),
(6, 'BANK DKI'),
(7, 'KCI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kartu_bca`
--

CREATE TABLE `tb_riwayat_kartu_bca` (
  `id_trx` varchar(16) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `jenis_trx` enum('In','Out') NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `nominal_trx` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_kartu_bca`
--

INSERT INTO `tb_riwayat_kartu_bca` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6991d1d6bdf8c', 1, 'Out', 80400, 3500, 76900, 1, '2026-02-15 21:01:58'),
('6991d5fc6fbdb', 1, 'Out', 57300, 3500, 53800, 1, '2026-02-15 21:19:40'),
('6991d683656d2', 1, 'Out', 53800, 0, 48900, 1, '2026-02-15 21:21:55'),
('69924236a08a4', 1, 'Out', 48900, 3500, 45400, 1, '2026-02-16 05:01:26'),
('6992437c8ff4b', 1, 'Out', 45400, 0, 40500, 1, '2026-02-16 05:06:52'),
('6992446524668', 1, 'Out', 40500, 3500, 37000, 1, '2026-02-16 05:10:45'),
('6992b00a19f05', 3, 'In', 0, 20000, 0, 1, '2026-02-16 12:50:02'),
('6992b2f851533', 1, 'Out', 57000, 0, 52100, 1, '2026-02-16 13:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kartu_bri`
--

CREATE TABLE `tb_riwayat_kartu_bri` (
  `id_trx` varchar(16) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `jenis_trx` enum('In','Out') NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `nominal_trx` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kartu_dki`
--

CREATE TABLE `tb_riwayat_kartu_dki` (
  `id_trx` varchar(16) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `jenis_trx` enum('In','Out') NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `nominal_trx` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_kartu_dki`
--

INSERT INTO `tb_riwayat_kartu_dki` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6992b15adf7b2', 6, 'In', 5000, 25000, 30000, 3, '2026-02-16 12:55:38'),
('6992b39046f16', 1, 'Out', 30000, 3500, 26500, 3, '2026-02-16 13:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kartu_mri`
--

CREATE TABLE `tb_riwayat_kartu_mri` (
  `id_trx` varchar(16) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `jenis_trx` enum('In','Out') NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `nominal_trx` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_kartu_mri`
--

INSERT INTO `tb_riwayat_kartu_mri` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6991d5bf13a74', 1, 'Out', 10000, 0, 5100, 2, '2026-02-15 21:18:39'),
('6992b0a702e76', 4, 'In', 5100, 20000, 25100, 2, '2026-02-16 12:52:39'),
('6992b3136e54d', 1, 'Out', 25100, 3500, 21600, 2, '2026-02-16 13:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_trx_tj`
--

CREATE TABLE `tb_riwayat_trx_tj` (
  `id_trx` varchar(16) NOT NULL,
  `jenis_trx` enum('Proses','Selesai') NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx_awal` datetime NOT NULL,
  `waktu_trx_akhir` datetime DEFAULT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_trx_tj`
--

INSERT INTO `tb_riwayat_trx_tj` (`id_trx`, `jenis_trx`, `id_kartu`, `waktu_trx_awal`, `waktu_trx_akhir`, `saldo_awal`, `saldo_akhir`) VALUES
('TJ-6991ce4e0e32d', 'Selesai', 1, '2026-02-15 20:46:54', NULL, 100000, NULL),
('TJ-6991cec1e2a0c', 'Selesai', 1, '2026-02-15 20:48:49', NULL, 85300, NULL),
('TJ-6991d1caa3aac', 'Selesai', 1, '2026-02-15 21:01:46', '2026-02-15 21:01:58', 80400, 76900),
('TJ-6991d5f74a113', 'Selesai', 1, '2026-02-15 21:19:35', '2026-02-15 21:19:40', 57300, 53800),
('TJ-699242310ae7b', 'Selesai', 1, '2026-02-16 05:01:21', '2026-02-16 05:01:26', 48900, 45400),
('TJ-699244557650f', 'Selesai', 1, '2026-02-16 05:10:29', '2026-02-16 05:10:45', 40500, 37000),
('TJ-6992b307ade6b', 'Selesai', 2, '2026-02-16 13:02:47', '2026-02-16 13:02:59', 25100, 21600),
('TJ-6992b38b82674', 'Selesai', 3, '2026-02-16 13:04:59', '2026-02-16 13:05:04', 30000, 26500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_trx_tp`
--

CREATE TABLE `tb_riwayat_trx_tp` (
  `id_trx` varchar(16) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_trx_tp`
--

INSERT INTO `tb_riwayat_trx_tp` (`id_trx`, `id_kartu`, `waktu_trx`, `saldo_awal`, `saldo_akhir`) VALUES
('TP-6991d4992c7f3', 1, '2026-02-15 21:13:45', 62200, 57300),
('TP-6991d5bf133ec', 2, '2026-02-15 21:18:39', 10000, 5100),
('TP-6991d68364508', 1, '2026-02-15 21:21:55', 53800, 48900),
('TP-6992437c8ebd5', 1, '2026-02-16 05:06:52', 45400, 40500),
('TP-6992b2f84f79a', 1, '2026-02-16 13:02:32', 57000, 52100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `id_kartu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `status`, `id_kartu`) VALUES
(1, 'Teddy', '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kartu`
--
ALTER TABLE `tb_kartu`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `tb_merchant`
--
ALTER TABLE `tb_merchant`
  ADD PRIMARY KEY (`id_merchant`);

--
-- Indexes for table `tb_riwayat_kartu_bca`
--
ALTER TABLE `tb_riwayat_kartu_bca`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_bca_FK` (`id_kartu`),
  ADD KEY `tb_riwayat_kartu_bca_FK_1` (`id_merchant`);

--
-- Indexes for table `tb_riwayat_kartu_bri`
--
ALTER TABLE `tb_riwayat_kartu_bri`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_bri_FK` (`id_kartu`),
  ADD KEY `tb_riwayat_kartu_bri_FK_1` (`id_merchant`);

--
-- Indexes for table `tb_riwayat_kartu_dki`
--
ALTER TABLE `tb_riwayat_kartu_dki`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_dki_FK` (`id_kartu`),
  ADD KEY `tb_riwayat_kartu_dki_FK_1` (`id_merchant`);

--
-- Indexes for table `tb_riwayat_kartu_mri`
--
ALTER TABLE `tb_riwayat_kartu_mri`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_mri_FK` (`id_kartu`),
  ADD KEY `tb_riwayat_kartu_mri_FK_1` (`id_merchant`);

--
-- Indexes for table `tb_riwayat_trx_tj`
--
ALTER TABLE `tb_riwayat_trx_tj`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_trx_tj_FK` (`id_kartu`);

--
-- Indexes for table `tb_riwayat_trx_tp`
--
ALTER TABLE `tb_riwayat_trx_tp`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_trx_tp_FK` (`id_kartu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `tb_user_FK` (`id_kartu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kartu`
--
ALTER TABLE `tb_kartu`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_merchant`
--
ALTER TABLE `tb_merchant`
  MODIFY `id_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_riwayat_kartu_bca`
--
ALTER TABLE `tb_riwayat_kartu_bca`
  ADD CONSTRAINT `tb_riwayat_kartu_bca_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`),
  ADD CONSTRAINT `tb_riwayat_kartu_bca_FK_1` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`);

--
-- Constraints for table `tb_riwayat_kartu_bri`
--
ALTER TABLE `tb_riwayat_kartu_bri`
  ADD CONSTRAINT `tb_riwayat_kartu_bri_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`),
  ADD CONSTRAINT `tb_riwayat_kartu_bri_FK_1` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`);

--
-- Constraints for table `tb_riwayat_kartu_dki`
--
ALTER TABLE `tb_riwayat_kartu_dki`
  ADD CONSTRAINT `tb_riwayat_kartu_dki_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`),
  ADD CONSTRAINT `tb_riwayat_kartu_dki_FK_1` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`);

--
-- Constraints for table `tb_riwayat_kartu_mri`
--
ALTER TABLE `tb_riwayat_kartu_mri`
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`),
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK_1` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`);

--
-- Constraints for table `tb_riwayat_trx_tj`
--
ALTER TABLE `tb_riwayat_trx_tj`
  ADD CONSTRAINT `tb_riwayat_trx_tj_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);

--
-- Constraints for table `tb_riwayat_trx_tp`
--
ALTER TABLE `tb_riwayat_trx_tp`
  ADD CONSTRAINT `tb_riwayat_trx_tp_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
