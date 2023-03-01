-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 02:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_calonpegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2023_02_28_212526_create_pendidikan_terakhir_table', 1),
(21, '2023_02_28_212951_create_pelatihan_table', 1),
(22, '2023_02_28_213605_create_riwayat_pekerjaan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kursus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` enum('ADA','TIDAK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_sertifikat` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `id_user`, `kursus`, `sertifikat`, `tahun_sertifikat`, `created_at`, `updated_at`) VALUES
(2, '3', 'Programmer java', 'TIDAK', '2023', '2023-03-01 09:58:34', '2023-03-01 13:18:57'),
(4, '5', 'Kursus Memasak', 'ADA', '2023', '2023-03-01 13:48:39', '2023-03-01 13:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_terakhir`
--

CREATE TABLE `pendidikan_terakhir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pendidikan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan_terakhir`
--

INSERT INTO `pendidikan_terakhir` (`id`, `id_user`, `jenjang`, `institusi`, `jurusan`, `tahun_pendidikan`, `ipk`, `created_at`, `updated_at`) VALUES
(2, '3', 'SMA/SMK/MA', 'universitas indonesiai', 'Teknologi Informasii', '2018', '2.91', '2023-03-01 09:02:11', '2023-03-01 13:09:20'),
(4, '5', 'S1', 'Universitas Gaya Mada', 'Seni', '2021', '3.51', '2023-03-01 13:48:16', '2023-03-01 13:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_terakhir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan_terakhir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_perusahaan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `id_user`, `perusahaan`, `posisi_terakhir`, `pendapatan_terakhir`, `tahun_perusahaan`, `created_at`, `updated_at`) VALUES
(1, '3', 'PT kyz', 'staff', '300000023', '2020', '2023-03-01 11:08:39', '2023-03-01 13:22:32'),
(2, '3', 'pt abc', 'programmer', '1500000', '2016', '2023-03-01 11:22:46', '2023-03-01 11:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Agama` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gol_darah` enum('A','AB','B','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ktp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_tinggal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orang_deket` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onsite` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `posisi`, `ktp`, `nama`, `email`, `type`, `tempat_lahir`, `tanggal_lahir`, `jk`, `Agama`, `gol_darah`, `status`, `alamat_ktp`, `alamat_tinggal`, `no_telp`, `orang_deket`, `skill`, `onsite`, `salary`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'admin', 'admin@admin.com', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$sZiG.Je9KRoNE09QkHZOkOd1IX8yp3jqdou/9edRxSTob.Ky8/25i', '2023-02-28 15:14:26', 'OCccjNGicZmMVsDEZSZGgleFqSjf68tTjaPrv7VQqwxbTRehlrEcqKqIfaaW', '2023-02-28 15:14:26', '2023-02-28 15:14:26'),
(3, 'Akuntansinyal', '1671050707970003', 'Ari Dwiantoro', 'aridwiantoro09@gmail.com', 'user', 'Palembang', '1997-07-07', 'P', 'Islam', 'O', 'Menikah', 'suka bangun2', 'Suka bangun 2', '08117807970', 'Ayah (081218113193)', 'Php', 'Y', '4000000', '$2y$10$7EX.VorbYIMzBHZ5Ub2QpOalDCzDJoZDM/XEeLR3bAAycw3WUjife', NULL, NULL, '2023-03-01 03:56:22', '2023-03-01 12:56:00'),
(5, 'Desaigner', '12423238', 'Rizki Ratih', 'rizkiratih22@gmail.com', 'user', 'Palembang', '1999-01-22', 'P', 'Islam', 'AB', 'Lajang', 'jl. babat supat', 'jl. jambi', '08122739382', 'naston (0812328392)', 'Memancing', 'Y', '5000000', '$2y$10$tyxTvDc7sakvSxPEbTZ8Q.NMFNyCgKH.PsN53316XCInJ3Nmhx.ue', NULL, NULL, '2023-03-01 13:45:48', '2023-03-01 13:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
