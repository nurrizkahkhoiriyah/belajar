-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2025 at 09:10 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_biaya`
--

CREATE TABLE `data_biaya` (
  `id` int NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_biaya`
--

INSERT INTO `data_biaya` (`id`, `nama_biaya`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Pembangunan', '-m', '2025-01-17 02:44:56', '2025-01-25 09:02:25', 0),
(11, 'Buku', '-', '2025-01-17 03:11:38', '2025-01-18 15:13:47', 0),
(12, 'Baju', '-', '2025-01-17 05:38:07', '2025-01-18 15:20:28', 1737213759),
(18, 'SPP', '-', '2025-01-18 15:24:32', '2025-01-18 15:24:47', 0),
(19, 'ddddd', 'ddd', '2025-01-21 05:54:03', '2025-01-21 05:54:03', 1737438847);

-- --------------------------------------------------------

--
-- Table structure for table `data_harga_biaya`
--

CREATE TABLE `data_harga_biaya` (
  `id` int NOT NULL,
  `id_biaya` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_harga_biaya`
--

INSERT INTO `data_harga_biaya` (`id`, `id_biaya`, `id_tahun_pelajaran`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 8, 'Rp 200.000', '2025-01-15 06:36:31', '2025-01-15 06:36:31', 1737187632),
(2, 1, 9, 'Rp 350.000', '2025-01-15 07:36:22', '2025-01-16 07:48:43', 1737187640),
(5, 4, 8, 'Rp 200.000', '2025-01-15 14:13:29', '2025-01-15 14:13:29', 1737187643),
(10, 5, 9, 'Rp 200.000', '2025-01-17 00:19:36', '2025-01-17 00:19:36', 0),
(16, 11, 9, 'Rp 300.000', '2025-01-18 03:04:15', '2025-01-18 16:25:04', 0),
(21, 5, 9, '100.000', '2025-01-18 04:52:16', '2025-01-21 04:22:23', 1737433396),
(24, 12, 1, '--', '2025-01-18 06:56:22', '0000-00-00 00:00:00', 1737187659),
(25, 12, 1, 'aaaaa', '2025-01-18 06:56:35', '0000-00-00 00:00:00', 1737187649),
(26, 12, 1, 'aa', '2025-01-18 07:15:37', '0000-00-00 00:00:00', 1737187652),
(27, 12, 1, 'aammmm', '2025-01-18 07:42:08', '2025-01-18 07:42:08', 1737187656),
(29, 5, 8, 'Rp 200.00000', '2025-01-18 07:50:39', '2025-01-18 07:50:39', 1737200745),
(30, 12, 1, 'aam,m', '2025-01-18 07:55:22', '2025-01-18 07:55:22', 1737187600),
(31, 5, 8, 'Rp 200.000', '2025-01-18 08:07:53', '2025-01-18 08:07:53', 1737211188),
(32, 5, 8, 'Rp 200.0000', '2025-01-18 08:41:45', '2025-01-18 08:41:45', 1737200740),
(33, 5, 9, 'Rp 200.0000', '2025-01-18 08:47:49', '2025-01-18 08:47:49', 1737200735),
(34, 5, 9, 'Rp 200.000', '2025-01-18 08:51:09', '2025-01-18 08:51:09', 1737211184),
(35, 5, 9, 'R', '2025-01-18 08:56:24', '2025-01-18 08:56:24', 1737200727),
(36, 5, 8, 'R', '2025-01-18 08:57:14', '2025-01-18 08:57:14', 1737200723),
(37, 5, 1, 'R', '2025-01-18 09:02:57', '2025-01-18 09:02:57', 1737200720),
(38, 5, 8, '444', '2025-01-18 09:15:25', '2025-01-18 09:15:25', 1737200716),
(39, 11, 9, 'Rp 300.0000', '2025-01-18 11:43:53', '2025-01-18 11:43:53', 1737211206),
(40, 11, 9, 'Rp 300.0000', '2025-01-18 11:43:56', '2025-01-18 11:43:56', 1737200703),
(41, 11, 8, 'Rp 300.0000', '2025-01-18 11:45:56', '2025-01-18 11:45:56', 1737211179),
(42, 11, 8, 'Rp 300.0000', '2025-01-18 11:49:11', '2025-01-18 11:49:11', 1737211176),
(43, 12, 9, 'Rp 400.00', '2025-01-18 11:53:19', '2025-01-18 11:53:19', 1737211191),
(44, 11, 9, 'Rp 300.00000', '2025-01-18 11:55:33', '2025-01-18 11:55:33', 1737211172),
(45, 12, 9, 'Rp 400.00000', '2025-01-18 12:06:22', '2025-01-18 12:06:22', 1737211163),
(46, 11, 8, 'mmm', '2025-01-18 12:32:29', '2025-01-18 12:32:29', 1737211166),
(47, 11, 8, 'm', '2025-01-18 12:36:37', '2025-01-18 12:36:37', 1737211169),
(48, 11, 8, 'mccc', '2025-01-18 12:45:43', '2025-01-18 12:45:43', 1737211160),
(49, 11, 8, 'mccc', '2025-01-18 12:45:43', '2025-01-18 12:45:43', 1737211156),
(50, 11, 8, 'Rp 300.000', '2025-01-18 12:53:34', '2025-01-18 12:53:34', 1737211153),
(51, 11, 8, 'Rp 300.000', '2025-01-18 12:53:34', '2025-01-18 12:53:34', 1737211150),
(52, 11, 8, 'Rp 200.000', '2025-01-18 13:21:10', '2025-01-18 13:21:10', 1737211145),
(53, 5, 8, 'Rp 400.000', '2025-01-18 15:17:18', '2025-01-21 04:26:56', 0),
(54, 18, 1, 'Rp 300.000', '2025-01-20 02:38:36', '2025-01-21 04:26:45', 0),
(55, 18, 1, 'Rp 300.000', '2025-01-21 04:23:05', '2025-01-21 04:26:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id`, `id_tahun_pelajaran`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 'TKJ', '2025-01-14 14:34:06', '2025-01-14 14:34:06', 0),
(5, 8, 'DKV', '2025-01-24 07:31:51', '2025-01-24 07:32:55', 0),
(6, 8, 'TKJ', '2025-01-15 15:52:59', '2025-01-15 15:52:59', 0),
(7, 1, 'DKV', '2025-01-18 04:34:06', '2025-01-18 04:34:06', 0),
(11, 9, 'RPL', '2025-01-18 02:54:36', '2025-01-18 02:54:36', 0),
(12, 8, 'RPL', '2025-01-18 04:34:57', '2025-01-18 04:34:57', 0),
(13, 9, 'TKJ', '2025-01-18 05:40:35', '2025-01-18 05:40:35', 1737178855),
(14, 1, 'RPL', '2025-01-18 14:55:33', '2025-01-18 14:55:33', 0),
(15, 9, 'DKV', '2025-01-18 14:56:08', '2025-01-18 14:56:08', 0),
(16, 9, 'TKJ', '2025-01-18 15:03:22', '2025-01-18 15:03:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `id_tahun_pelajaran`, `id_jurusan`, `nama_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 8, 6, '10 TKJ', '2025-01-18 06:59:02', '2025-01-18 06:59:02', 0),
(11, 8, 5, '10 DKV', '2025-01-21 06:35:54', '2025-01-21 06:35:54', 0),
(12, 8, 12, '10 RPL', '2025-01-18 15:11:27', '2025-01-18 15:11:27', 0),
(14, 1, 14, '10 RPL', '2025-01-18 15:12:25', '2025-01-18 15:12:25', 1737213155),
(15, 1, 14, '10 RPL', '2025-01-21 06:36:57', '2025-01-21 06:36:57', 0),
(16, 1, 7, '10 DKV', '2025-01-18 16:40:24', '2025-01-18 16:40:24', 0),
(17, 1, 4, '10 TKJ', '2025-01-18 16:41:13', '2025-01-18 16:41:13', 0),
(18, 9, 11, '10 RPL', '2025-01-20 02:39:38', '2025-01-20 02:39:38', 1737427890),
(19, 9, 11, '10 RPL', '2025-01-21 06:37:48', '2025-01-21 06:37:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_seragam`
--

CREATE TABLE `data_seragam` (
  `id` int NOT NULL,
  `nama_seragam` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_seragam`
--

INSERT INTO `data_seragam` (`id`, `nama_seragam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Olahraga', '2025-01-15 11:51:53', '2025-01-18 15:30:24', 0),
(4, 'Putih Abu-abu', '0000-00-00 00:00:00', '2025-01-16 07:49:37', 0),
(5, 'Olahragaaa', '0000-00-00 00:00:00', '2025-01-18 11:33:47', 1737214179),
(8, 'Pramuka', '2025-01-20 03:13:24', '2025-01-20 03:13:24', 1737350456),
(9, 'pdh', '2025-01-20 08:40:04', '2025-01-20 08:40:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_stok`
--

CREATE TABLE `data_stok` (
  `id` int NOT NULL,
  `id_seragam` int NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `stok` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_stok`
--

INSERT INTO `data_stok` (`id`, `id_seragam`, `id_tahun_pelajaran`, `ukuran`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'S', 20, '2025-01-16 05:14:32', '2025-01-16 07:50:16', 0),
(2, 4, 1, 'M', 30, '0000-00-00 00:00:00', '2025-01-16 07:56:30', 0),
(4, 5, 1, 'L', 50, '0000-00-00 00:00:00', '2025-01-18 04:43:08', 1737216228),
(5, 5, 9, 'M', 40, '0000-00-00 00:00:00', '2025-01-18 04:44:23', 1737216224),
(7, 5, 9, 'S', 40, '0000-00-00 00:00:00', '2025-01-18 11:32:45', 1737216220),
(8, 1, 1, 'M', 50, '2025-01-18 16:04:37', '2025-01-18 16:04:37', 0),
(9, 8, 1, 'S', 30, '2025-01-18 16:05:12', '2025-01-20 03:15:50', 1737432134);

-- --------------------------------------------------------

--
-- Table structure for table `data_tahun_pelajaran`
--

CREATE TABLE `data_tahun_pelajaran` (
  `id` int NOT NULL,
  `nama_tahun_pelajaran` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status_tahun_pelajaran` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_tahun_pelajaran`
--

INSERT INTO `data_tahun_pelajaran` (`id`, `nama_tahun_pelajaran`, `tanggal_mulai`, `tanggal_akhir`, `status_tahun_pelajaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2025/2026', '2025-01-09', '2025-01-31', '1', '2025-01-14 13:02:08', '2025-01-24 04:54:02', 0),
(8, '2024/2025', '2025-02-05', '2025-09-24', '0', '2025-01-14 13:15:22', '2025-01-24 08:35:44', 0),
(9, '2026/2027', '2026-01-08', '2025-08-09', '1', '2025-01-18 04:30:33', '2025-01-24 08:35:17', 0),
(14, '2023/2024', '2025-01-02', '2025-01-20', '1', '2025-01-18 06:26:58', '2025-01-18 06:26:58', 1737181679);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_awal`
--

CREATE TABLE `pendaftaran_awal` (
  `id` int NOT NULL,
  `no_pendaftaran` varchar(50) NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `id_kelas` int NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telepon_ibu` varchar(50) NOT NULL,
  `no_telepon_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `no_telepon_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `sumber_informasi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran_awal`
--

INSERT INTO `pendaftaran_awal` (`id`, `no_pendaftaran`, `id_tahun_pelajaran`, `id_jurusan`, `id_kelas`, `nama_siswa`, `nik`, `agama`, `nisn`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `no_telepon_ibu`, `no_telepon_ayah`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `no_telepon_wali`, `pekerjaan_wali`, `alamat_wali`, `sumber_informasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, '2526-TKJ-0001', 1, 4, 17, 'NUR RIZKAH KHOIRIYAH POHAN', '1271127112711271', 'Islam', '0320320320', 'Perempuan', 'Medan', '2003-08-05', 'Jl. Karya Gg. Wakaf', '082388347895', 'nur@gmail.com', 'MAN', 'Ayah', 'Ibu', '098765432190', '081209877665', 'Ayah', 'Ibu', 'Wali', '089786756453', 'Wali', 'Jl. Karya', 'Kerabat', '2025-01-23 13:36:04', '2025-01-23 14:08:55', 0),
(18, '2526-DKV-0001', 1, 7, 16, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-23 13:58:30', '2025-01-23 13:58:30', 1737640876),
(19, '2425-DKV-0014', 8, 5, 11, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025-01-23 13:58:55', '2025-01-23 13:58:55', 1737640873);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_awal_data_ortu`
--

CREATE TABLE `pendaftaran_awal_data_ortu` (
  `id` int NOT NULL,
  `id_siswa` int NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `no_telepon_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telepon_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `no_telepon_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sumber_informasi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran_awal_data_ortu`
--

INSERT INTO `pendaftaran_awal_data_ortu` (`id`, `id_siswa`, `nama_ayah`, `no_telepon_ayah`, `pekerjaan_ayah`, `nama_ibu`, `no_telepon_ibu`, `pekerjaan_ibu`, `nama_wali`, `no_telepon_wali`, `pekerjaan_wali`, `alamat_wali`, `sumber_informasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ayah', '0898', 'ayah', 'ibu', '0897', 'ibu', 'a', '0876', 'a', 'jl.blabla', 'semua', '2025-01-22 04:42:33', '2025-01-22 04:42:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_awal_data_siswa`
--

CREATE TABLE `pendaftaran_awal_data_siswa` (
  `id` int NOT NULL,
  `no_pendaftaran` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik` varchar(50) NOT NULL,
  `agama` int NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `jenis_kelamin` int NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran_awal_data_siswa`
--

INSERT INTO `pendaftaran_awal_data_siswa` (`id`, `no_pendaftaran`, `nama_siswa`, `nik`, `agama`, `nisn`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`, `asal_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'rizkah', '12718749', 1, '0321234757', 2, 'medan', '2023-05-08', 'Jl. Karya', '08234893', 'rizkah@gmail.com', 'man', '2025-01-22 04:44:19', '2025-01-22 04:44:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_awal_kelas`
--

CREATE TABLE `pendaftaran_awal_kelas` (
  `id` int NOT NULL,
  `no_pendaftaran` varchar(50) NOT NULL,
  `id_tahun_pelajaran` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `id_kelas` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftaran_awal_kelas`
--

INSERT INTO `pendaftaran_awal_kelas` (`id`, `no_pendaftaran`, `id_tahun_pelajaran`, `id_jurusan`, `id_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 8, 6, 4, '2025-01-21 09:49:58', '2025-01-21 09:49:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rizkah', '123', '2025-01-16 12:57:25', '2025-01-16 12:57:25', 0),
(2, 'nur', '111', '2025-01-18 16:20:29', '2025-01-18 16:20:29', 1737217299),
(36, 'nurrizkah', '12345', '2025-01-18 16:30:53', '2025-01-21 05:32:49', 1737437745),
(48, 'rrr', '333', '2025-01-21 05:58:31', '2025-01-21 05:58:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_biaya`
--
ALTER TABLE `data_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_harga_biaya`
--
ALTER TABLE `data_harga_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_seragam`
--
ALTER TABLE `data_seragam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tahun_pelajaran`
--
ALTER TABLE `data_tahun_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_awal`
--
ALTER TABLE `pendaftaran_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_awal_data_ortu`
--
ALTER TABLE `pendaftaran_awal_data_ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_awal_data_siswa`
--
ALTER TABLE `pendaftaran_awal_data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran_awal_kelas`
--
ALTER TABLE `pendaftaran_awal_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_biaya`
--
ALTER TABLE `data_biaya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_harga_biaya`
--
ALTER TABLE `data_harga_biaya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_seragam`
--
ALTER TABLE `data_seragam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_tahun_pelajaran`
--
ALTER TABLE `data_tahun_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pendaftaran_awal`
--
ALTER TABLE `pendaftaran_awal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendaftaran_awal_data_ortu`
--
ALTER TABLE `pendaftaran_awal_data_ortu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran_awal_data_siswa`
--
ALTER TABLE `pendaftaran_awal_data_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran_awal_kelas`
--
ALTER TABLE `pendaftaran_awal_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
