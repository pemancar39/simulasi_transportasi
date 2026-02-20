-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2026 at 09:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kartu`
--

INSERT INTO `tb_kartu` (`id_kartu`, `nama_kartu`, `jenis_kartu`, `saldo`, `khusus`, `bank`) VALUES
(1, 'My Flazz', 'Flazz BCA', 257100, 0, 'BBCA'),
(2, 'My e-Money', 'e-Money Mandiri', 16700, 0, 'BMRI'),
(3, 'My Jaklingko', 'Jaklingko Bank DKI', 26500, 1, 'BDKI'),
(6, 'KMT', 'Kartu Multi Trip KCI', 376000, 0, 'KCI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_line`
--

CREATE TABLE `tb_line` (
  `id_line` int(11) NOT NULL,
  `nama_line` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_line`
--

INSERT INTO `tb_line` (`id_line`, `nama_line`) VALUES
(1, 'Bogor Line'),
(2, 'Cikarang Line'),
(3, 'Tanjung Priok Line'),
(4, 'Nambo Line'),
(5, 'Cikarang Line A'),
(6, 'Cikarang Line B'),
(7, 'Rangkasbitung Line'),
(8, 'Tangerang Line');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merchant`
--

CREATE TABLE `tb_merchant` (
  `id_merchant` int(11) NOT NULL,
  `nama_merchant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('6992b2f851533', 1, 'Out', 57000, 0, 52100, 1, '2026-02-16 13:02:32'),
('6996c3b04bdf8', 1, 'Out', 52100, 3000, 49100, 1, '2026-02-19 15:02:56'),
('6996c3cf9fbe7', 1, 'Out', 49100, 3000, 46100, 1, '2026-02-19 15:03:27'),
('6996c4894527a', 1, 'Out', 46100, 3000, 43100, 1, '2026-02-19 15:06:33'),
('6997b19a89c2d', 1, 'Out', 43100, 3000, 40100, 1, '2026-02-20 07:58:02'),
('6997b2748260b', 1, 'Out', 40100, 4000, 36100, 1, '2026-02-20 08:01:40'),
('6997b37f67191', 1, 'Out', 36100, 3000, 33100, 1, '2026-02-20 08:06:07'),
('6997b3b57b0b8', 1, 'Out', 33100, 3000, 30100, 1, '2026-02-20 08:07:01'),
('6997b4396db59', 1, 'Out', 30100, 4000, 26100, 1, '2026-02-20 08:09:13'),
('6997b4a7855bc', 1, 'Out', 26100, 3000, 23100, 1, '2026-02-20 08:11:03'),
('6997b4daa0cc3', 1, 'Out', 23100, 4000, 19100, 1, '2026-02-20 08:11:54'),
('6997b5766fe06', 1, 'Out', 19100, 4000, 15100, 1, '2026-02-20 08:14:30'),
('6997b58535e3f', 1, 'Out', 15100, 6000, 9100, 1, '2026-02-20 08:14:45'),
('6997b5920c2cf', 3, 'In', 9100, 100000, 109100, 1, '2026-02-20 08:14:58'),
('6997b5b33f0d6', 1, 'Out', 109100, 6000, 103100, 1, '2026-02-20 08:15:31'),
('6997d606d4506', 1, 'Out', 103100, 4000, 99100, 1, '2026-02-20 10:33:26'),
('6997d6f5ac314', 1, 'Out', 99100, 6000, 93100, 1, '2026-02-20 10:37:25'),
('6997d778de9e1', 1, 'Out', 93100, 4000, 89100, 1, '2026-02-20 10:39:36'),
('6997dc7cbba2e', 3, 'In', 89100, 200000, 289100, 1, '2026-02-20 11:01:00'),
('6997e7bd7e876', 1, 'Out', 289100, 3000, 286100, 1, '2026-02-20 11:49:01'),
('6997f4b577ce6', 1, 'Out', 286100, 6000, 280100, 1, '2026-02-20 12:44:21'),
('6997fcbd56dbc', 1, 'Out', 280100, 6000, 274100, 1, '2026-02-20 13:18:37'),
('6997fcdf6ec3d', 1, 'Out', 274100, 10000, 264100, 1, '2026-02-20 13:19:11'),
('6997fd29087cc', 1, 'Out', 264100, 7000, 257100, 1, '2026-02-20 13:20:25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayat_kartu_dki`
--

INSERT INTO `tb_riwayat_kartu_dki` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6992b15adf7b2', 6, 'In', 5000, 25000, 30000, 3, '2026-02-16 12:55:38'),
('6992b39046f16', 1, 'Out', 30000, 3500, 26500, 3, '2026-02-16 13:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kartu_kmt`
--

CREATE TABLE `tb_riwayat_kartu_kmt` (
  `id_trx` varchar(16) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `jenis_trx` enum('In','Out') NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `nominal_trx` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayat_kartu_kmt`
--

INSERT INTO `tb_riwayat_kartu_kmt` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6997d7a3421cf', 1, 'Out', 50000, 4000, 46000, 6, '2026-02-20 10:40:19'),
('6997d7d5408ac', 1, 'Out', 46000, 4000, 42000, 6, '2026-02-20 10:41:09'),
('6997dae992c86', 1, 'Out', 42000, 6000, 36000, 6, '2026-02-20 10:54:17'),
('6997db75e5ec1', 1, 'Out', 36000, 6000, 30000, 6, '2026-02-20 10:56:37'),
('6997dba3840d4', 1, 'Out', 30000, 7000, 23000, 6, '2026-02-20 10:57:23'),
('6997dc05c20c1', 1, 'Out', 23000, 5000, 18000, 6, '2026-02-20 10:59:01'),
('6997dc3abd465', 1, 'Out', 18000, 3000, 15000, 6, '2026-02-20 10:59:54'),
('6997dca9222a6', 7, 'In', 215000, 200000, 415000, 6, '2026-02-20 11:01:45'),
('6997dd353063a', 1, 'Out', 415000, 6000, 409000, 6, '2026-02-20 11:04:05'),
('6997dfcc7bb6f', 1, 'Out', 409000, 3000, 406000, 6, '2026-02-20 11:15:08'),
('6997dff6c0684', 1, 'Out', 406000, 5000, 401000, 6, '2026-02-20 11:15:50'),
('6997e0126ab54', 1, 'Out', 401000, 3000, 398000, 6, '2026-02-20 11:16:18'),
('6997e056efa4b', 1, 'Out', 398000, 3000, 395000, 6, '2026-02-20 11:17:26'),
('6997e07a88fda', 1, 'Out', 395000, 4000, 391000, 6, '2026-02-20 11:18:02'),
('6997e0b4a002a', 1, 'Out', 391000, 6000, 385000, 6, '2026-02-20 11:19:00'),
('6997e13a74234', 1, 'Out', 385000, 3000, 382000, 6, '2026-02-20 11:21:14'),
('6997f4cfa3228', 1, 'Out', 382000, 6000, 376000, 6, '2026-02-20 12:44:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayat_kartu_mri`
--

INSERT INTO `tb_riwayat_kartu_mri` (`id_trx`, `id_merchant`, `jenis_trx`, `saldo_awal`, `nominal_trx`, `saldo_akhir`, `id_kartu`, `waktu_trx`) VALUES
('6991d5bf13a74', 1, 'Out', 10000, 0, 5100, 2, '2026-02-15 21:18:39'),
('6992b0a702e76', 4, 'In', 5100, 20000, 25100, 2, '2026-02-16 12:52:39'),
('6992b3136e54d', 1, 'Out', 25100, 3500, 21600, 2, '2026-02-16 13:02:59'),
('6997b1d91d40d', 1, 'Out', 21600, 0, 16700, 2, '2026-02-20 07:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_trx_krl`
--

CREATE TABLE `tb_riwayat_trx_krl` (
  `id_trx` varchar(16) NOT NULL,
  `jenis_trx` enum('Proses','Selesai') NOT NULL,
  `id_kartu` int(11) NOT NULL,
  `waktu_trx_awal` datetime NOT NULL,
  `waktu_trx_akhir` datetime DEFAULT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) DEFAULT NULL,
  `stasiun_awal` int(11) NOT NULL,
  `stasiun_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayat_trx_krl`
--

INSERT INTO `tb_riwayat_trx_krl` (`id_trx`, `jenis_trx`, `id_kartu`, `waktu_trx_awal`, `waktu_trx_akhir`, `saldo_awal`, `saldo_akhir`, `stasiun_awal`, `stasiun_akhir`) VALUES
('KRL-6997b26cd1e2', 'Selesai', 1, '2026-02-20 08:01:32', '2026-02-20 08:01:40', 40100, 36100, 1, NULL),
('KRL-6997b378c0f0', 'Selesai', 1, '2026-02-20 08:06:00', '2026-02-20 08:06:07', 36100, 33100, 3, 7),
('KRL-6997b3a9b874', 'Selesai', 1, '2026-02-20 08:06:49', '2026-02-20 08:07:01', 33100, 30100, 0, 0),
('KRL-6997b4327a97', 'Selesai', 1, '2026-02-20 08:09:06', '2026-02-20 08:09:13', 30100, 26100, 1, 17),
('KRL-6997b4a1b590', 'Selesai', 1, '2026-02-20 08:10:57', '2026-02-20 08:11:03', 26100, 23100, 1, 29),
('KRL-6997b4d4bf14', 'Selesai', 1, '2026-02-20 08:11:48', '2026-02-20 08:11:54', 23100, 19100, 1, 17),
('KRL-6997b57024ce', 'Selesai', 1, '2026-02-20 08:14:24', '2026-02-20 08:14:30', 19100, 15100, 29, 1),
('KRL-6997b57f99f8', 'Selesai', 1, '2026-02-20 08:14:39', '2026-02-20 08:14:45', 15100, 9100, 18, 1),
('KRL-6997b5ab980e', 'Selesai', 1, '2026-02-20 08:15:23', '2026-02-20 08:15:31', 109100, 103100, 1, 24),
('KRL-6997d5fbd428', 'Selesai', 1, '2026-02-20 10:33:15', '2026-02-20 10:33:26', 103100, 99100, 1, 29),
('KRL-6997d6ed9505', 'Selesai', 1, '2026-02-20 10:37:17', '2026-02-20 10:37:25', 99100, 93100, 1, 46),
('KRL-6997d7695aae', 'Selesai', 1, '2026-02-20 10:39:21', '2026-02-20 10:39:36', 93100, 89100, 54, 41),
('KRL-6997d79a7958', 'Selesai', 6, '2026-02-20 10:40:10', '2026-02-20 10:40:19', 50000, 46000, 1, 41),
('KRL-6997d7ce5763', 'Selesai', 6, '2026-02-20 10:41:02', '2026-02-20 10:41:09', 46000, 42000, 41, 1),
('KRL-6997dae031f2', 'Selesai', 6, '2026-02-20 10:54:08', '2026-02-20 10:54:17', 42000, 36000, 1, 46),
('KRL-6997db6b3d38', 'Selesai', 6, '2026-02-20 10:56:27', '2026-02-20 10:56:37', 36000, 30000, 54, 46),
('KRL-6997db9a8194', 'Selesai', 6, '2026-02-20 10:57:14', '2026-02-20 10:57:23', 30000, 23000, 17, 46),
('KRL-6997dbfd555e', 'Selesai', 6, '2026-02-20 10:58:53', '2026-02-20 10:59:01', 23000, 18000, 17, 29),
('KRL-6997dc3199f8', 'Selesai', 6, '2026-02-20 10:59:45', '2026-02-20 10:59:54', 18000, 15000, 1, 35),
('KRL-6997dd29cd65', 'Selesai', 6, '2026-02-20 11:03:53', '2026-02-20 11:04:05', 415000, 409000, 1, 46),
('KRL-6997dfc41bba', 'Selesai', 6, '2026-02-20 11:15:00', '2026-02-20 11:15:08', 409000, 406000, 1, 35),
('KRL-6997dfeed75a', 'Selesai', 6, '2026-02-20 11:15:42', '2026-02-20 11:15:50', 406000, 401000, 1, 17),
('KRL-6997e0013643', 'Selesai', 6, '2026-02-20 11:16:01', '2026-02-20 11:16:18', 401000, 398000, 1, 35),
('KRL-6997e04cc5b2', 'Selesai', 6, '2026-02-20 11:17:16', '2026-02-20 11:17:26', 398000, 395000, 1, 48),
('KRL-6997e06ead60', 'Selesai', 6, '2026-02-20 11:17:50', '2026-02-20 11:18:02', 395000, 391000, 17, 48),
('KRL-6997e0adef54', 'Selesai', 6, '2026-02-20 11:18:53', '2026-02-20 11:19:00', 391000, 385000, 1, 24),
('KRL-6997e12939fb', 'Selesai', 6, '2026-02-20 11:20:57', '2026-02-20 11:21:14', 385000, 382000, 1, 35),
('KRL-6997e7aa444a', 'Selesai', 1, '2026-02-20 11:48:42', '2026-02-20 11:49:01', 289100, 286100, 1, 48),
('KRL-6997f4ab625f', 'Selesai', 1, '2026-02-20 12:44:11', '2026-02-20 12:44:21', 286100, 280100, 1, 46),
('KRL-6997f4c62d07', 'Selesai', 6, '2026-02-20 12:44:38', '2026-02-20 12:44:47', 382000, 376000, 1, 46),
('KRL-6997fcb730e9', 'Selesai', 1, '2026-02-20 13:18:31', '2026-02-20 13:18:37', 280100, 274100, 24, 1),
('KRL-6997fcd4c552', 'Selesai', 1, '2026-02-20 13:19:00', '2026-02-20 13:19:11', 274100, 264100, 1, 35),
('KRL-6997fd1f7e8f', 'Selesai', 1, '2026-02-20 13:20:15', '2026-02-20 13:20:25', 264100, 257100, 1, 46);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayat_trx_tp`
--

INSERT INTO `tb_riwayat_trx_tp` (`id_trx`, `id_kartu`, `waktu_trx`, `saldo_awal`, `saldo_akhir`) VALUES
('TP-6991d4992c7f3', 1, '2026-02-15 21:13:45', 62200, 57300),
('TP-6991d5bf133ec', 2, '2026-02-15 21:18:39', 10000, 5100),
('TP-6991d68364508', 1, '2026-02-15 21:21:55', 53800, 48900),
('TP-6992437c8ebd5', 1, '2026-02-16 05:06:52', 45400, 40500),
('TP-6992b2f84f79a', 1, '2026-02-16 13:02:32', 57000, 52100),
('TP-6997b1d91c4d0', 2, '2026-02-20 07:59:05', 21600, 16700);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stasiun`
--

CREATE TABLE `tb_stasiun` (
  `id_stasiun` int(11) NOT NULL,
  `nama_stasiun` varchar(50) NOT NULL,
  `id_line` int(11) NOT NULL,
  `km_posisi` int(11) NOT NULL,
  `is_transit` int(11) NOT NULL,
  `kode_stasiun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_stasiun`
--

INSERT INTO `tb_stasiun` (`id_stasiun`, `nama_stasiun`, `id_line`, `km_posisi`, `is_transit`, `kode_stasiun`) VALUES
(1, 'Bogor', 1, 0, 0, 'BOO'),
(2, 'Cilebut', 1, 7518, 0, 'CLT'),
(3, 'Bojong Gede', 1, 11849, 0, 'BJD'),
(4, 'Citayam', 1, 17046, 1, 'CTA'),
(5, 'Depok', 1, 22130, 0, 'DP'),
(6, 'Depok Baru', 1, 23871, 0, 'DPB'),
(7, 'Pondok Cina', 1, 26441, 0, 'POC'),
(8, 'Universitas Indonesia', 1, 27550, 0, 'UI'),
(9, 'Universitas Pancasila', 1, 29814, 0, 'UP'),
(10, 'Lenteng Agung', 1, 30843, 0, 'LNA'),
(11, 'Tanjung Barat', 1, 33303, 0, 'TNT'),
(12, 'Pasar Minggu', 1, 36334, 0, 'PSM'),
(13, 'Pasar Minggu Baru', 1, 38029, 0, 'PSMB'),
(14, 'Duren Kalibata', 1, 39538, 0, 'DRN'),
(15, 'Cawang', 1, 41013, 0, 'CW'),
(16, 'Tebet', 1, 42314, 0, 'TEB'),
(17, 'Manggarai', 1, 44924, 1, 'MRI'),
(18, 'Cikini', 1, 46530, 0, 'CKI'),
(19, 'Gondangdia', 1, 48229, 0, 'GDD'),
(20, 'Juanda', 1, 50427, 0, 'JUA'),
(21, 'Sawah Besar', 1, 51134, 0, 'SW'),
(22, 'Mangga Besar', 1, 52305, 0, 'MGB'),
(23, 'Jayakarta', 1, 53325, 0, 'JAY'),
(24, 'Jakarta Kota', 1, 54812, 1, 'JAKK'),
(25, 'Citayam', 4, 0, 1, 'CTA'),
(26, 'Pondok Rajeg', 4, 3805, 0, 'PDRG'),
(27, 'Cibinong', 4, 6740, 0, 'CBN'),
(28, 'Gunung Putri', 4, 11040, 0, 'GPI'),
(29, 'Nambo', 4, 13267, 0, 'NMO'),
(30, 'Jakarta Kota', 3, 0, 1, 'JAKK'),
(31, 'Ancol', 3, 3549, 0, 'AC'),
(32, 'Tanjung Priok', 3, 8115, 0, 'TPK'),
(33, 'Manggarai', 5, 0, 1, 'MRI'),
(34, 'Matraman', 5, 1275, 0, 'MTR'),
(35, 'Jatinegara', 5, 2652, 1, 'JNG'),
(36, 'Klender', 5, 6047, 0, 'KLD'),
(37, 'Buaran', 5, 9147, 0, 'BUA'),
(38, 'Klender Baru', 5, 10452, 0, 'KLDB'),
(39, 'Cakung', 5, 11837, 0, 'CUK'),
(40, 'Kranji', 5, 14934, 0, 'KRI'),
(41, 'Bekasi', 5, 17305, 0, 'BKS'),
(42, 'Bekasi Timur', 5, 19822, 0, 'BKST'),
(43, 'Tambun', 5, 24261, 0, 'TB'),
(44, 'Cibitung', 5, 27702, 0, 'CIT'),
(45, 'Telaga Murni', 5, 30502, 0, 'TLM'),
(46, 'Cikarang', 5, 34302, 0, 'CKR'),
(47, 'Manggarai', 6, 0, 1, 'MRI'),
(48, 'Sudirman', 6, 3186, 0, 'SUD'),
(49, 'BNI City', 6, 3526, 0, 'SUDB'),
(50, 'Karet', 6, 3997, 0, 'KET'),
(51, 'Tanah Abang', 6, 6026, 1, 'THB'),
(52, 'Duri', 6, 9663, 1, 'DU'),
(53, 'Angke', 6, 10888, 0, 'AK'),
(54, 'Kampung Bandan', 6, 14990, 1, 'KPB'),
(55, 'Rajawali', 6, 16434, 0, 'RJW'),
(56, 'Kemayoran', 6, 18335, 0, 'KMO'),
(57, 'Pasar Senen', 6, 19771, 0, 'PSE'),
(58, 'Gang Sentiong', 6, 21338, 0, 'GST'),
(59, 'Kramat', 6, 22311, 0, 'KMT'),
(60, 'Pondok Jati', 6, 24140, 0, 'POK'),
(61, 'Jatinegara', 6, 25376, 1, 'JNG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transit`
--

CREATE TABLE `tb_transit` (
  `id_transit` int(11) NOT NULL,
  `line_asal` int(11) NOT NULL,
  `line_tujuan` int(11) NOT NULL,
  `id_stasiun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transit`
--

INSERT INTO `tb_transit` (`id_transit`, `line_asal`, `line_tujuan`, `id_stasiun`) VALUES
(1, 1, 5, 17),
(2, 1, 6, 17),
(3, 1, 3, 24),
(4, 5, 1, 33),
(5, 6, 1, 47),
(6, 3, 1, 30),
(7, 1, 4, 4),
(8, 4, 1, 25),
(9, 5, 6, 33),
(10, 6, 5, 47);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `id_kartu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `status`, `id_kartu`) VALUES
(1, 'Teddy', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_krl`
--

CREATE TABLE `tb_user_krl` (
  `id_user` int(11) NOT NULL,
  `id_stasiun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_krl`
--

INSERT INTO `tb_user_krl` (`id_user`, `id_stasiun`) VALUES
(1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kartu`
--
ALTER TABLE `tb_kartu`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `tb_line`
--
ALTER TABLE `tb_line`
  ADD PRIMARY KEY (`id_line`);

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
-- Indexes for table `tb_riwayat_kartu_kmt`
--
ALTER TABLE `tb_riwayat_kartu_kmt`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_mri_FK` (`id_kartu`) USING BTREE,
  ADD KEY `tb_riwayat_kartu_mri_FK_1` (`id_merchant`) USING BTREE;

--
-- Indexes for table `tb_riwayat_kartu_mri`
--
ALTER TABLE `tb_riwayat_kartu_mri`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_kartu_mri_FK` (`id_kartu`),
  ADD KEY `tb_riwayat_kartu_mri_FK_1` (`id_merchant`);

--
-- Indexes for table `tb_riwayat_trx_krl`
--
ALTER TABLE `tb_riwayat_trx_krl`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `tb_riwayat_trx_tj_FK` (`id_kartu`) USING BTREE;

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
-- Indexes for table `tb_stasiun`
--
ALTER TABLE `tb_stasiun`
  ADD PRIMARY KEY (`id_stasiun`),
  ADD KEY `tb_stasiun_tb_line_FK` (`id_line`);

--
-- Indexes for table `tb_transit`
--
ALTER TABLE `tb_transit`
  ADD PRIMARY KEY (`id_transit`),
  ADD KEY `tb_transit_tb_stasiun_FK` (`id_stasiun`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `tb_user_FK` (`id_kartu`);

--
-- Indexes for table `tb_user_krl`
--
ALTER TABLE `tb_user_krl`
  ADD KEY `tb_user_krl_tb_user_FK` (`id_user`),
  ADD KEY `tb_user_krl_tb_stasiun_FK` (`id_stasiun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kartu`
--
ALTER TABLE `tb_kartu`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_line`
--
ALTER TABLE `tb_line`
  MODIFY `id_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_merchant`
--
ALTER TABLE `tb_merchant`
  MODIFY `id_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_stasiun`
--
ALTER TABLE `tb_stasiun`
  MODIFY `id_stasiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_transit`
--
ALTER TABLE `tb_transit`
  MODIFY `id_transit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `tb_riwayat_kartu_kmt`
--
ALTER TABLE `tb_riwayat_kartu_kmt`
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK_1_copy` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`),
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK_copy` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);

--
-- Constraints for table `tb_riwayat_kartu_mri`
--
ALTER TABLE `tb_riwayat_kartu_mri`
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`),
  ADD CONSTRAINT `tb_riwayat_kartu_mri_FK_1` FOREIGN KEY (`id_merchant`) REFERENCES `tb_merchant` (`id_merchant`);

--
-- Constraints for table `tb_riwayat_trx_krl`
--
ALTER TABLE `tb_riwayat_trx_krl`
  ADD CONSTRAINT `tb_riwayat_trx_tj_FK_copy` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);

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
-- Constraints for table `tb_stasiun`
--
ALTER TABLE `tb_stasiun`
  ADD CONSTRAINT `tb_stasiun_tb_line_FK` FOREIGN KEY (`id_line`) REFERENCES `tb_line` (`id_line`);

--
-- Constraints for table `tb_transit`
--
ALTER TABLE `tb_transit`
  ADD CONSTRAINT `tb_transit_tb_stasiun_FK` FOREIGN KEY (`id_stasiun`) REFERENCES `tb_stasiun` (`id_stasiun`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_FK` FOREIGN KEY (`id_kartu`) REFERENCES `tb_kartu` (`id_kartu`);

--
-- Constraints for table `tb_user_krl`
--
ALTER TABLE `tb_user_krl`
  ADD CONSTRAINT `tb_user_krl_tb_stasiun_FK` FOREIGN KEY (`id_stasiun`) REFERENCES `tb_stasiun` (`id_stasiun`),
  ADD CONSTRAINT `tb_user_krl_tb_user_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
