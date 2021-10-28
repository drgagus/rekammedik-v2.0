-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2021 pada 15.27
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekammedik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diags`
--

CREATE TABLE `diags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diags`
--

INSERT INTO `diags` (`id`, `kode`, `diagnosa`, `room_id`, `created_at`, `updated_at`) VALUES
(1, '685', 'Vertigo', 1, NULL, NULL),
(2, '7676', 'Gastritis', 1, NULL, NULL),
(3, '768', 'Pulpitis Asymptomatis', 2, NULL, '2020-08-18 01:44:28'),
(4, '6554', 'Gingivitis dan periodontitis', 2, NULL, '2020-08-18 01:44:05'),
(5, '768', 'hamil normal', 3, NULL, NULL),
(6, '762', 'Hamil komplikasi', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `heads`
--

CREATE TABLE `heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kartukeluarga` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepalakeluarga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_id` int(11) NOT NULL,
  `norm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heads`
--

INSERT INTO `heads` (`id`, `kartukeluarga`, `kepalakeluarga`, `alamat`, `rt`, `rw`, `village_id`, `norm`, `created_at`, `updated_at`) VALUES
(1, '7625863', 'Edi Kusnadi', 'jalan M. Nuh', '002', '003', 1, 7637, '2020-08-01 22:51:40', '2020-08-04 11:23:11'),
(2, '38078', 'M. Adlin', 'Jl. Ranai Gg. Natuna', '001', '001', 2, 32341, '2020-08-04 09:16:51', '2020-08-04 09:16:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `labrecords`
--

CREATE TABLE `labrecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicalrecord_id` bigint(20) UNSIGNED NOT NULL,
  `lab_id` bigint(20) UNSIGNED NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `labrecords`
--

INSERT INTO `labrecords` (`id`, `medicalrecord_id`, `lab_id`, `hasil`, `user_id`, `created_at`, `updated_at`) VALUES
(43, 87, 4, '150', 7, '2020-08-04 10:34:40', '2020-08-04 10:54:57'),
(44, 87, 5, '200', 7, '2020-08-04 10:34:40', '2020-08-04 10:54:57'),
(45, 87, 7, '4141', 7, '2020-08-04 10:34:49', '2020-08-04 10:54:57'),
(46, 89, 6, '9', 7, '2020-08-05 02:59:36', '2020-08-05 03:05:53'),
(47, 89, 11, 'b', 7, '2020-08-05 02:59:36', '2020-08-05 03:05:53'),
(68, 100, 2, 'positif hamil', 7, '2020-08-08 11:09:16', '2020-08-08 11:09:34'),
(69, 101, 12, 'negatif', 7, '2020-08-08 11:19:36', '2020-08-08 11:22:44'),
(70, 100, 4, 'positif hamil', 7, '2020-08-08 11:09:16', '2020-08-08 11:09:34'),
(71, 103, 4, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(72, 103, 5, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(73, 103, 8, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(74, 103, 12, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(75, 103, 13, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(76, 103, 17, NULL, 7, '2020-08-10 00:53:00', '2020-08-10 00:53:00'),
(77, 102, 4, 'positif hamil', 7, '2020-08-08 11:09:16', '2020-08-08 11:09:34'),
(78, 104, 3, '123', 7, '2020-08-11 18:37:58', '2020-08-15 08:21:41'),
(79, 104, 14, '123', 7, '2020-08-11 18:37:58', '2020-08-15 08:21:41'),
(80, 104, 15, '123', 7, '2020-08-11 18:49:21', '2020-08-15 08:21:41'),
(81, 104, 16, 'negatif', 7, '2020-08-11 18:49:21', '2020-08-15 08:21:41'),
(82, 109, 4, '123', 7, '2020-08-16 18:54:23', '2020-08-16 19:00:38'),
(83, 109, 5, '123', 7, '2020-08-16 18:54:23', '2020-08-16 19:00:38'),
(84, 94, 5, '100', 7, '2020-08-17 09:23:33', '2020-08-17 09:23:33'),
(85, 110, 3, '213', 7, '2020-08-22 01:52:17', '2020-08-22 01:54:09'),
(86, 110, 4, '123', 7, '2020-08-22 01:52:17', '2020-08-22 01:54:09'),
(87, 110, 5, '443', 7, '2020-08-22 01:52:17', '2020-08-22 01:54:09'),
(88, 112, 3, '200', 1, '2020-08-22 02:42:15', '2020-08-22 02:42:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeoflab_id` int(11) NOT NULL,
  `pemeriksaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `labs`
--

INSERT INTO `labs` (`id`, `typeoflab_id`, `pemeriksaan`, `satuan`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kolesterol', 'mg/dl', NULL, NULL, '2020-08-11 18:55:45'),
(2, 1, 'Asam Urat', 'mg/dl', NULL, NULL, '2020-08-11 18:55:15'),
(3, 1, 'Gula Darah Sewaktu', 'mg/dl', 1, NULL, NULL),
(4, 1, 'Gula Darah Puasa', 'mg/dl', 1, NULL, NULL),
(5, 1, 'Gula Darah Post Prandia', 'mg/dl', 1, NULL, '2020-08-11 18:36:19'),
(6, 2, 'Hb', 'gram/dl', 1, NULL, NULL),
(7, 2, 'Leukosit', '/mikroliter', 0, NULL, NULL),
(8, 2, 'Trombosit', '/mikroliter', 0, NULL, NULL),
(9, 2, 'Haematokrit', '%(persen)', 0, NULL, NULL),
(10, 3, 'HCG Test', NULL, 0, NULL, NULL),
(11, 3, 'Golongan Darah', NULL, 1, NULL, NULL),
(12, 2, 'Dengue IgG/IgM', NULL, 0, NULL, NULL),
(13, 3, 'Anti HIV', NULL, 0, NULL, NULL),
(14, 4, 'Gula Urine', NULL, 1, NULL, '2020-08-11 18:37:20'),
(15, 4, 'Protein Urine', NULL, 1, NULL, '2020-08-11 18:37:40'),
(16, 5, 'Malaria', NULL, 1, NULL, NULL),
(17, 6, 'Mikroskopis Sputum Sewaktu', NULL, 0, NULL, NULL),
(18, 6, 'Mikroskopis Sputum Pagi', NULL, 1, NULL, '2020-08-11 18:56:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `tanggalkunjungan` date NOT NULL,
  `umurtahun` int(11) NOT NULL,
  `umurbulan` int(11) NOT NULL,
  `umurhari` int(11) NOT NULL,
  `keluhanutama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggibadan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratbadan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingkarperut` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekanandarah` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernafasan` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detakjantung` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksaanawal` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggifundus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentukuteri` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letakjanin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gerakjanin` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detakjantungjanin` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksaanlanjutan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diag_id` int(11) DEFAULT NULL,
  `tindakan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengobatan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `medicalrecords`
--

INSERT INTO `medicalrecords` (`id`, `member_id`, `tanggalkunjungan`, `umurtahun`, `umurbulan`, `umurhari`, `keluhanutama`, `tinggibadan`, `beratbadan`, `lingkarperut`, `gcs`, `tekanandarah`, `pernafasan`, `detakjantung`, `suhu`, `pemeriksaanawal`, `tinggifundus`, `bentukuteri`, `letakjanin`, `gerakjanin`, `detakjantungjanin`, `pemeriksaanlanjutan`, `diag_id`, `tindakan`, `pengobatan`, `keterangan`, `room_id`, `user_id`, `created_at`, `updated_at`) VALUES
(87, 1, '2020-08-04', 25, 7, 3, 'sakit gigi', '123', '134', '50', '', '120/90', '12', '25', '37,5', 'gigi berlubang', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 2, 2, '2020-08-04 09:31:05', '2020-08-04 11:09:10'),
(88, 3, '2020-08-04', 29, 7, 3, 'pening kepala awak', '123', '70', '412', '', '120/80', '13', '14', '37,5', 'pening kali bah', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 2, 2, '2020-08-04 11:35:52', '2020-08-04 11:37:38'),
(89, 4, '2020-08-05', 30, 7, 4, 'mual', '170', '60', '33', '', '24312', '23', '24', '37.5', 'mual', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 3, 3, '2020-08-04 23:11:47', '2020-08-05 13:18:25'),
(90, 4, '2020-08-05', 30, 7, 4, 'mual', '170', '60', '80', '', '120/80', '13', '15', '37.5', 'mual', '123', 'Normal', 'Kepala', 'Aktif', '123', NULL, 5, NULL, NULL, NULL, 3, 3, '2020-08-05 13:29:32', '2020-08-05 13:29:32'),
(91, 4, '2020-08-05', 30, 7, 4, 'mual', '170', '60', '80', '', '120/80', '13', '15', '37.5', 'mual', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, '2020-08-05 13:36:30', '2020-08-05 13:36:30'),
(92, 3, '2020-08-06', 29, 7, 4, 'dgf', '245', '452', '45', 'sadar', '34', '452', '45', '234', 'erqqe', NULL, NULL, NULL, NULL, NULL, 'weqeqr', 2, 'as', 'amox 3x1\r\npct 3x1', 'aaaa', 10, 1, '2020-08-05 16:01:04', '2020-08-06 18:09:25'),
(93, 1, '2020-08-05', 25, 7, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 10, 2, '2020-08-05 16:17:13', '2020-08-05 16:17:13'),
(94, 2, '2020-08-06', 21, 7, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 10, 1, '2020-08-05 16:18:43', '2020-08-05 16:18:43'),
(95, 1, '2020-08-08', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, '2020-08-08 10:43:48', '2020-08-08 10:43:48'),
(96, 1, '2020-08-08', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 1, 1, '2020-08-08 10:46:40', '2020-08-08 10:46:40'),
(97, 1, '2020-08-08', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 2, 2, '2020-08-08 10:57:43', '2020-08-08 10:57:43'),
(98, 1, '2020-08-08', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, '2020-08-08 10:59:35', '2020-08-08 10:59:35'),
(99, 1, '2020-08-08', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 2, 2, '2020-08-08 11:05:14', '2020-08-08 11:05:14'),
(100, 2, '2020-08-10', 21, 7, 26, 'mual aja awak ni. kenapa ya', '123', '134', '80', NULL, '120/90', '23', '14', '234', 'mual dan seminggu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, '2020-08-08 11:08:52', '2020-08-08 11:32:04'),
(101, 1, '2020-08-10', 25, 7, 7, 'Sakit Lambung', '170', '80', '80', NULL, '120/80', '12', '15', '37.5', 'sakit', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 4, '2020-08-08 11:19:28', '2020-08-08 11:23:11'),
(102, 2, '2020-08-10', 21, 7, 26, 'mual aja awak ni. kenapa ya', '123', '134', '80', NULL, '120/90', '23', '14', '234', 'mual dan seminggu', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 3, 5, '2020-08-08 11:39:09', '2020-08-08 11:39:09'),
(103, 1, '2020-08-10', 25, 7, 9, 'sakit gigi', '170', '452', '50', NULL, '120/90', '23', '25', '37,5', 'gigi berlubang', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 2, 2, '2020-08-10 00:46:02', '2020-08-10 00:46:02'),
(104, 3, '2020-08-15', 29, 7, 11, 'pening kepala awak', '174', '60', '80', NULL, '120/90', '13', '24', '37,4', 'pusing', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, '2020-08-11 18:30:32', '2020-08-15 08:23:23'),
(109, 3, '2020-08-17', 29, 7, 16, 'pening kepala awak', '123', '60', '45', NULL, '122/45', '13', '15', '37,4', 'ggre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, '2020-08-16 18:52:52', '2020-08-16 19:02:38'),
(110, 1, '2020-08-22', 24, 8, 10, 'sakit gigi', '625', '656', '455', NULL, '5654', '766', '54', '76', 'sakit gigi', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 'amox 3x1\r\nasmet 3x1', NULL, 2, 4, '2020-08-22 01:51:08', '2020-08-22 01:55:42'),
(111, 1, '2020-08-22', 24, 8, 10, 'sakit gigi', '625', '656', '455', NULL, '5654', '766', '54', '76', 'sakit gigi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 3, '2020-08-22 01:57:20', '2020-08-22 01:57:20'),
(112, 3, '2020-08-22', 29, 7, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 10, 1, '2020-08-22 02:41:26', '2020-08-22 02:41:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicinerecords`
--

CREATE TABLE `medicinerecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicalrecord_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `medicinerecords`
--

INSERT INTO `medicinerecords` (`id`, `medicalrecord_id`, `medicine_id`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 87, 2, 1, 9, '2020-08-04 11:38:40', '2020-08-04 11:38:40'),
(18, 92, 9, 8, 9, '2020-08-07 08:33:16', '2020-08-07 10:08:02'),
(19, 92, 9, 9, 9, '2020-08-07 08:33:40', '2020-08-07 10:08:02'),
(21, 92, 7, 12, 9, '2020-08-07 08:50:52', '2020-08-07 10:08:02'),
(22, 92, 12, 5, 9, '2020-08-07 10:08:02', '2020-08-07 10:08:02'),
(23, 109, 10, 8, 9, '2020-08-16 23:30:40', '2020-08-16 23:31:06'),
(24, 94, 13, 10, 9, '2020-08-17 09:23:49', '2020-08-17 09:23:49'),
(25, 110, 14, 10, 9, '2020-08-22 02:00:25', '2020-08-22 02:00:25'),
(26, 110, 2, 10, 9, '2020-08-22 02:00:25', '2020-08-22 02:00:25'),
(28, 112, 14, 5, 1, '2020-08-22 02:43:27', '2020-08-22 02:43:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `obat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `igdobat` int(11) DEFAULT NULL,
  `igdjumlah` int(11) DEFAULT NULL,
  `pustuobat` int(11) DEFAULT NULL,
  `pustujumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `medicines`
--

INSERT INTO `medicines` (`id`, `obat`, `jumlah`, `igdobat`, `igdjumlah`, `pustuobat`, `pustujumlah`, `created_at`, `updated_at`) VALUES
(2, 'paracetamol', 34, 0, 50, 0, 0, '2020-08-04 02:45:15', '2020-08-22 02:00:25'),
(4, 'diclofenac', 40, 1, 85, 1, 0, '2020-08-04 02:52:36', '2020-08-07 10:23:49'),
(6, 'vit c', 50, 1, NULL, 1, 0, '2020-08-06 03:01:30', '2020-08-07 10:15:13'),
(7, 'rtyr', 657, NULL, -12, NULL, 0, '2020-08-06 03:44:07', '2020-08-07 10:08:02'),
(8, 'vghfh', 65, 1, NULL, NULL, 0, '2020-08-06 03:44:13', '2020-08-07 10:17:41'),
(9, 'sucralfat', 35, 1, 78, 1, 0, '2020-08-06 03:44:27', '2020-08-07 10:20:26'),
(10, 'klorampenikol', 22, 1, 8, 1, NULL, '2020-08-07 08:44:14', '2020-08-16 23:31:06'),
(12, 'antasida mantap', 12, 1, 65, NULL, NULL, '2020-08-07 10:04:48', '2020-08-07 10:21:45'),
(13, 'alpara', 10, 1, 0, 1, NULL, '2020-08-07 10:05:48', '2020-08-22 02:09:31'),
(14, 'amox', 90, 1, -5, NULL, NULL, '2020-08-22 01:59:47', '2020-08-22 02:43:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeniskelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongandarah` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perkawinan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungankeluarga` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jaminankesehatan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomorjaminankesehatan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomortelepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `head_id`, `nama`, `nik`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `agama`, `pendidikan`, `pekerjaan`, `golongandarah`, `perkawinan`, `hubungankeluarga`, `jaminankesehatan`, `nomorjaminankesehatan`, `nomortelepon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Edi Kusnadi', '7685', 'Laki-laki', NULL, '1995-12-12', NULL, NULL, NULL, NULL, 'Kawin', 'A', 'anggotakeluarga Umum', NULL, NULL, '2020-08-01 22:52:53', '2020-08-22 02:26:45'),
(2, 1, 'Nuriska, A.Md.Keb', '7685', 'Perempuan', NULL, '1998-12-12', NULL, NULL, NULL, NULL, 'Kawin', 'B', 'BPJS/JKN', NULL, NULL, '2020-08-01 22:52:53', '2020-08-11 01:57:07'),
(3, 2, 'M. Adlin', '34112', 'Laki-laki', NULL, '1991-01-01', NULL, NULL, NULL, NULL, 'Kawin', 'A', 'BPJS/JKN', NULL, NULL, '2020-08-04 09:16:51', '2020-08-04 09:17:21'),
(4, 2, 'Mega', '23432', 'Perempuan', NULL, '1990-01-01', NULL, NULL, NULL, NULL, 'Kawin', 'B', 'BPJS/JKN', NULL, NULL, '2020-08-04 11:47:47', '2020-08-04 11:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_26_074614_create_heads_table', 1),
(5, '2020_06_26_074634_create_members_table', 1),
(6, '2020_06_26_084040_create_villages_table', 1),
(7, '2020_06_26_183657_create_patients_table', 1),
(8, '2020_06_28_164340_create_medicalrecords_table', 1),
(9, '2020_06_29_095438_create_diags_table', 1),
(10, '2020_06_29_101325_create_rooms_table', 1),
(11, '2020_06_30_101723_create_odontograms_table', 1),
(12, '2020_07_02_172535_create_medicinerecords_table', 1),
(13, '2020_07_03_184417_create_momcards_table', 1),
(14, '2020_07_26_163133_create_medicines_table', 1),
(15, '2020_07_30_161244_create_labs_table', 1),
(16, '2020_07_30_161539_create_labrecords_table', 1),
(17, '2020_08_02_053207_create_typeoflabs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `momcards`
--

CREATE TABLE `momcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `tanggalkunjungan` date NOT NULL,
  `kontrasepsiterakhir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umuranak1` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratanak1` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penolongpersalinananak1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carapersalinananak1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaanbayianak1` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komplikasianak1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umuranak2` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratanak2` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penolongpersalinananak2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carapersalinananak2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaanbayianak2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komplikasianak2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umuranak3` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratanak3` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penolongpersalinananak3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carapersalinananak3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaanbayianak3` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komplikasianak3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haidterakhir` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perkiraanpartus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluhanutama` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nafsumakan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muntah` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pusing` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nyeriperut` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oedema` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyakitdiderita` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayatkeluarga` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kebiasaankehamilan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pucat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kesadaran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentuktubuh` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhubadan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuning` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lila` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggibadan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratbadan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekanandarah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detakjantung` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernafasan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muka` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulut` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gigi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paruparu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jantung` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payudara` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hati` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abdomen` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tangantungkai` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggifundus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentukfundus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bentukuterus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letakjanin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gerakjanin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detakjantungjanin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspekulo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perdarahan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksaandalam` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haemoglobin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urinealbumine` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urinereduksi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faeces` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malaria` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongandarah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `momcards`
--

INSERT INTO `momcards` (`id`, `member_id`, `tanggalkunjungan`, `kontrasepsiterakhir`, `umuranak1`, `beratanak1`, `penolongpersalinananak1`, `carapersalinananak1`, `keadaanbayianak1`, `komplikasianak1`, `umuranak2`, `beratanak2`, `penolongpersalinananak2`, `carapersalinananak2`, `keadaanbayianak2`, `komplikasianak2`, `umuranak3`, `beratanak3`, `penolongpersalinananak3`, `carapersalinananak3`, `keadaanbayianak3`, `komplikasianak3`, `haidterakhir`, `perkiraanpartus`, `keluhanutama`, `nafsumakan`, `muntah`, `pusing`, `nyeriperut`, `oedema`, `penyakitdiderita`, `riwayatkeluarga`, `kebiasaankehamilan`, `pucat`, `kesadaran`, `bentuktubuh`, `suhubadan`, `kuning`, `lila`, `tinggibadan`, `beratbadan`, `tekanandarah`, `detakjantung`, `pernafasan`, `muka`, `mulut`, `gigi`, `paruparu`, `jantung`, `payudara`, `hati`, `abdomen`, `tangantungkai`, `tinggifundus`, `bentukfundus`, `bentukuterus`, `letakjanin`, `gerakjanin`, `detakjantungjanin`, `inspekulo`, `perdarahan`, `pemeriksaandalam`, `haemoglobin`, `urinealbumine`, `urinereduksi`, `faeces`, `malaria`, `golongandarah`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-08-10', 'tidak menggunakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-11', '2020-08-11', 'mual aja awak ni. kenapa ya', 'Baik', 'Biasa, gejala hamil muda', 'Biasa, gejala hamil muda', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak', 'Baik', 'Normal', 'Normal', 'Tidak', '57', '544', '65', '546', '5465', '5564', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Pembesaran normal', 'Normal', '435', 'Sesuai kurva', 'normal', 'Kepala', 'Aktif', '54', 'Normal', 'Tidak', 'Panggul normal', NULL, NULL, NULL, NULL, NULL, 'A', '2020-08-10 10:46:06', '2020-08-13 15:27:50'),
(2, 2, '2018-08-10', 'tidak menggunakan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-11', '2020-08-11', 'mual aja awak ni. kenapa ya', 'Baik', 'Biasa, gejala hamil muda', 'Biasa, gejala hamil muda', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak', 'Baik', 'Normal', 'Normal', 'Tidak', '57', '544', '65', '546', '5465', '5564', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Pembesaran normal', 'Normal', '43', 'Sesuai kurva', 'normal', 'Kepala', 'Aktif', '54', 'Normal', 'Tidak', 'Panggul normal', NULL, NULL, NULL, NULL, NULL, 'O', '2020-08-10 10:46:06', '2020-08-13 15:28:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `odontograms`
--

CREATE TABLE `odontograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `tanggalkunjungan` date NOT NULL,
  `gigi11` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi12` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi13` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi14` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi15` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi16` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi17` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi18` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi21` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi22` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi23` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi24` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi25` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi26` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi27` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi28` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi31` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi32` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi33` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi34` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi35` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi36` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi37` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi38` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi41` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi42` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi43` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi44` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi45` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi46` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi47` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gigi48` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodontal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `karanggigi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sikatgigi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debris16` int(11) NOT NULL,
  `debris11` int(11) NOT NULL,
  `debris26` int(11) NOT NULL,
  `debris46` int(11) NOT NULL,
  `debris31` int(11) NOT NULL,
  `debris36` int(11) NOT NULL,
  `kalkulus16` int(11) NOT NULL,
  `kalkulus11` int(11) NOT NULL,
  `kalkulus26` int(11) NOT NULL,
  `kalkulus46` int(11) NOT NULL,
  `kalkulus31` int(11) NOT NULL,
  `kalkulus36` int(11) NOT NULL,
  `indeksdebris` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indekskalkulus` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ohis` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `odontograms`
--

INSERT INTO `odontograms` (`id`, `member_id`, `tanggalkunjungan`, `gigi11`, `gigi12`, `gigi13`, `gigi14`, `gigi15`, `gigi16`, `gigi17`, `gigi18`, `gigi21`, `gigi22`, `gigi23`, `gigi24`, `gigi25`, `gigi26`, `gigi27`, `gigi28`, `gigi31`, `gigi32`, `gigi33`, `gigi34`, `gigi35`, `gigi36`, `gigi37`, `gigi38`, `gigi41`, `gigi42`, `gigi43`, `gigi44`, `gigi45`, `gigi46`, `gigi47`, `gigi48`, `periodontal`, `karanggigi`, `sikatgigi`, `debris16`, `debris11`, `debris26`, `debris46`, `debris31`, `debris36`, `kalkulus16`, `kalkulus11`, `kalkulus26`, `kalkulus46`, `kalkulus31`, `kalkulus36`, `indeksdebris`, `indekskalkulus`, `ohis`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-08-04', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'Sehat', 'Tidak Ada', 'Satu Kali Sehari', 3, 1, 2, 3, 1, 3, 3, 1, 2, 1, 0, 1, '2.17', '1.33', '1.75', '2020-08-04 10:04:39', '2020-08-14 03:17:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `umur` varchar(26) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalkunjungan` date NOT NULL,
  `keluhanutama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggibadan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beratbadan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingkarperut` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekanandarah` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pernafasan` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detakjantung` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemeriksaanawal` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `selesai` int(11) DEFAULT NULL,
  `rujukinternal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patients`
--

INSERT INTO `patients` (`id`, `member_id`, `umur`, `tanggalkunjungan`, `keluhanutama`, `tinggibadan`, `beratbadan`, `lingkarperut`, `tekanandarah`, `pernafasan`, `detakjantung`, `suhu`, `pemeriksaanawal`, `room_id`, `selesai`, `rujukinternal`, `created_at`, `updated_at`) VALUES
(1, 1, '24 Tahun 8 Bulan 10 Hari', '2020-08-22', 'sakit gigi', '625', '656', '455', '5654', '766', '54', '76', 'sakit gigi', 1, 2, 'gula tinggi', '2020-08-22 01:48:47', '2020-08-22 02:00:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `created_at`, `updated_at`) VALUES
(1, 'Poli Kesehatan Umum', NULL, '2020-08-21 11:35:28'),
(2, 'Poli Kesehatan Gigi dan Mulut', NULL, '2020-08-18 02:57:59'),
(3, 'Poli Kesehatan Ibu dan Anak', NULL, '2020-08-18 02:58:12'),
(10, 'Instalasi Gawat Darurat', NULL, '2020-08-18 02:58:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `typeoflabs`
--

CREATE TABLE `typeoflabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `typeoflabs`
--

INSERT INTO `typeoflabs` (`id`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Kimia Klinik', NULL, NULL),
(2, 'Haematologi', NULL, NULL),
(3, 'Serologi', NULL, NULL),
(4, 'Urinalisa', NULL, NULL),
(5, 'Parasitologi', NULL, NULL),
(6, 'Mikrobiologi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `jabatan`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yahya', 'dr. Ameri Yahya', 'CEO', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-21 11:21:01'),
(2, 'franky', 'drg. Franky', 'admin', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-22 09:52:48'),
(3, 'azni', 'dr. Cut Azni Zahara', 'dokter', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-20 23:02:59'),
(4, 'agus', 'drg. Agus Surya', 'dokter gigi', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-20 23:03:03'),
(5, 'titi', 'Titi Rahman Amd. Keb', 'bidan', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-20 23:03:08'),
(6, 'laras', 'Diah Ratri Larasati, S.Kep', 'perawat', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-20 23:03:11'),
(7, 'fadia', 'Yusfadia, Amd.AK', 'analis kesehatan', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-22 01:53:25'),
(9, 'sarima', 'Sarima, Apt.', 'apoteker', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, NULL, '2020-08-21 04:35:04'),
(10, 'susi', 'Susilawati', 'pendaftaran', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, '2020-08-20 06:51:14', '2020-08-20 23:03:27'),
(15, 'miska', 'Miska', 'kasir', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, '2020-08-21 01:07:23', '2020-08-21 01:07:39'),
(18, 'adlin', 'Muhammad Adlin Saputra', 'admin', NULL, NULL, '$2y$10$EuGbwwYrQvpRcoAcBNbjGupvTgvHQjTKKgHHuSn2EZQlrnD1DQL9.', NULL, '2020-08-22 10:02:56', '2020-08-22 10:03:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `villages`
--

INSERT INTO `villages` (`id`, `desa`, `created_at`, `updated_at`) VALUES
(1, 'Kelarik', NULL, NULL),
(2, 'Gunung Durian', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diags`
--
ALTER TABLE `diags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `heads`
--
ALTER TABLE `heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `heads_kartukeluarga_unique` (`kartukeluarga`),
  ADD UNIQUE KEY `heads_norm_unique` (`norm`);

--
-- Indeks untuk tabel `labrecords`
--
ALTER TABLE `labrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medicinerecords`
--
ALTER TABLE `medicinerecords`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `momcards`
--
ALTER TABLE `momcards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `odontograms`
--
ALTER TABLE `odontograms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `odontograms_member_id_unique` (`member_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_member_id_unique` (`member_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `typeoflabs`
--
ALTER TABLE `typeoflabs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diags`
--
ALTER TABLE `diags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `heads`
--
ALTER TABLE `heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `labrecords`
--
ALTER TABLE `labrecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `medicinerecords`
--
ALTER TABLE `medicinerecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `momcards`
--
ALTER TABLE `momcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `odontograms`
--
ALTER TABLE `odontograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9778;

--
-- AUTO_INCREMENT untuk tabel `typeoflabs`
--
ALTER TABLE `typeoflabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
