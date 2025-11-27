-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 04:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `nama`, `nip`, `tgl_lahir`, `no_hp`, `created_at`, `updated_at`) VALUES
(7, 20, 'Aisyah', '00118', '2000-07-22', '089967568447', '2025-08-04 12:19:19', '2025-08-04 12:19:19'),
(8, 21, 'Syifa', '00218', '1998-09-24', '082753279479', '2025-08-04 12:20:45', '2025-08-04 12:20:45'),
(9, 22, 'Intan', '00318', '2000-08-18', '089689182964', '2025-08-04 12:21:39', '2025-08-04 12:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_06_151708_create_utl_roles_table', 1),
(3, '2024_10_09_010124_create_users_table', 1),
(4, '2024_10_09_010200_create_santris_table', 1),
(5, '2024_11_13_003615_create_admins_table', 1),
(6, '2024_11_13_003637_create_saldos_table', 1),
(7, '2025_07_08_125000_create_transaksis_table', 2),
(8, '2025_07_08_125455_create_transaksis_table', 3),
(9, '2025_07_09_063011_create_transaksis_table', 4),
(10, '2025_07_09_112503_create_topups_table', 5),
(11, '2025_07_16_075439_add_total_saldo_to_transaksis_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saldos`
--

CREATE TABLE `saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saldos`
--

INSERT INTO `saldos` (`id`, `santri_id`, `balance`, `created_at`, `updated_at`) VALUES
(6, 6, 400000.00, '2025-08-04 11:34:19', '2025-10-08 21:37:57'),
(7, 7, 350000.00, '2025-08-04 11:39:52', '2025-08-04 12:24:22'),
(8, 8, 200000.00, '2025-08-04 11:43:02', '2025-09-29 02:08:34'),
(9, 9, 0.00, '2025-08-04 11:51:02', '2025-08-04 11:51:02'),
(10, 10, 0.00, '2025-08-04 11:55:31', '2025-08-04 11:55:31'),
(11, 11, 700000.00, '2025-08-04 11:59:45', '2025-09-19 04:11:38'),
(12, 12, 200000.00, '2025-08-04 20:44:14', '2025-10-08 21:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `santris`
--

CREATE TABLE `santris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_ortu` varchar(255) NOT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `santris`
--

INSERT INTO `santris` (`id`, `user_id`, `nama`, `nis`, `tgl_lahir`, `alamat`, `no_hp_ortu`, `nama_wali`, `created_at`, `updated_at`) VALUES
(6, 14, 'Amanda Kireina Ramadhani', '20001', '2005-08-15', 'bojong', '089655958327', 'Raihan Riski', '2025-08-04 11:34:19', '2025-10-05 01:30:54'),
(7, 15, 'Anindya Rizka Amalia', '20002', '2005-02-21', 'Sidomukti', '085703061974', 'Achmad Khoirul Ibad', '2025-08-04 11:39:52', '2025-08-04 11:39:52'),
(8, 16, 'Balkis', '20003', '2004-12-05', 'Tegalsari', '087788365676', 'Ishaq', '2025-08-04 11:43:02', '2025-08-04 11:43:02'),
(9, 17, 'Ishma Karimah', '20004', '2006-01-03', 'Wonopringgo', '089656443851', 'Abdullah', '2025-08-04 11:51:02', '2025-08-04 11:51:02'),
(10, 18, 'Manayra Safira', '20005', '2005-07-22', 'Weleri', '089174649882', 'Munawwar', '2025-08-04 11:55:31', '2025-08-04 11:55:31'),
(11, 19, 'Muhimmatul Aliyah', '20006', '2005-08-18', 'Kajen', '087428199475', 'Riyan', '2025-08-04 11:59:45', '2025-08-04 11:59:45'),
(12, 23, 'syifa', '25001', '2025-08-05', 'jalan jlamprang no. 15', '08962836972', 'ahmad', '2025-08-04 20:44:14', '2025-08-04 20:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `topups`
--

CREATE TABLE `topups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_transfer` bigint(20) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `status` enum('pending','disetujui','ditolak') NOT NULL DEFAULT 'pending',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topups`
--

INSERT INTO `topups` (`id`, `santri_id`, `jumlah_transfer`, `tanggal_transfer`, `bukti_transfer`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(6, 8, 200000, '2025-08-04', 'bukti-transfer/cGfmVYA4MfWcHAv6wZFHCvMQEEQXGA3C3ItWlrRc.jpg', 'disetujui', NULL, '2025-08-04 18:44:36', '2025-09-29 02:08:34'),
(7, 6, 200000, '2025-08-05', 'bukti-transfer/qShG0jaJh7sh7L3DAJivhtCxNwvt8Igk5nllHaSD.jpg', 'disetujui', NULL, '2025-08-04 20:27:01', '2025-08-04 20:55:02'),
(8, 6, 300000, '2025-08-05', 'bukti-transfer/ES4gP8jjuIR4nAxNH7dP8lE9lfNU7CvBGmdiHSqR.jpg', 'ditolak', 'tidak sesuai nominal', '2025-08-04 20:30:22', '2025-10-03 15:54:20'),
(9, 6, 200000, '2025-10-03', 'bukti-transfer/9zJEguSDiV12hYezGOj2BDsT5O2V1nTFUNLnQsDM.png', 'pending', NULL, '2025-10-03 15:31:23', '2025-10-03 15:31:23'),
(10, 6, 100000, '2025-10-05', 'bukti-transfer/t6epPoNla59EAbWL3ALNZOjxi4UQZGHaRtnG6wY2.jpg', 'pending', NULL, '2025-10-05 03:29:46', '2025-10-05 03:29:46'),
(11, 6, 50000, '2025-10-03', 'bukti-transfer/6T4zBb93jP9EpGrCkwlkZ2Wu7LAV33AceP04Cdqm.pdf', 'pending', NULL, '2025-10-05 03:43:51', '2025-10-05 03:43:51'),
(12, 6, 200000, '2025-10-03', 'bukti-transfer/kvVj1rxrsSjCFQs1VlceUHhIgatPL8k6OGCTZyfs.pdf', 'pending', NULL, '2025-10-06 18:56:06', '2025-10-06 18:56:06'),
(13, 6, 123, '2025-10-08', 'bukti-transfer/yObvw43HOwQm7b0d2zdbWxRwitZ6yc4edaQgs9RP.jpg', 'pending', NULL, '2025-10-08 20:45:24', '2025-10-08 20:45:24'),
(14, 6, 100000, '2025-10-09', 'bukti-transfer/OCwpU5B9J08Htqn8ec8nO2N6A6OoeYmkmmITStl7.pdf', 'pending', NULL, '2025-10-08 21:32:37', '2025-10-08 21:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe` enum('setor','tarik') NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `total_saldo` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `santri_id`, `admin_id`, `tipe`, `nominal`, `total_saldo`, `keterangan`, `created_at`, `updated_at`) VALUES
(32, 6, NULL, 'setor', 200000.00, NULL, 'transfer dari orang tua', '2025-08-04 12:23:20', '2025-08-04 12:23:20'),
(33, 7, NULL, 'setor', 350000.00, NULL, 'Hadiah juara 1 lomba hafalan alquran juz 28-30', '2025-08-04 12:24:22', '2025-08-04 12:24:22'),
(34, 6, NULL, 'tarik', 75000.00, NULL, 'Kebutuhan bulanan', '2025-08-04 12:25:01', '2025-08-04 12:25:01'),
(35, 11, NULL, 'setor', 800000.00, NULL, 'transfer dari orang tua', '2025-08-04 12:26:00', '2025-08-04 12:26:00'),
(36, 6, NULL, 'setor', 200000.00, NULL, 'Top-up disetujui', '2025-08-04 20:55:02', '2025-08-04 20:55:02'),
(37, 6, NULL, 'tarik', 25000.00, NULL, 'jajan', '2025-08-04 20:56:13', '2025-08-04 20:56:13'),
(38, 6, NULL, 'setor', 150000.00, NULL, 'menang lomba pidato', '2025-08-04 20:58:24', '2025-08-04 20:58:24'),
(39, 12, NULL, 'setor', 100000.00, NULL, '-', '2025-09-15 20:46:12', '2025-09-15 20:46:12'),
(40, 11, NULL, 'tarik', 50000.00, NULL, 'jajan', '2025-09-19 02:03:58', '2025-09-19 02:03:58'),
(41, 11, NULL, 'tarik', 50000.00, NULL, 'jajan', '2025-09-19 04:11:38', '2025-09-19 04:11:38'),
(42, 12, NULL, 'setor', 50000.00, NULL, 'kiriman ortu', '2025-09-19 07:06:01', '2025-09-19 07:06:01'),
(44, 12, 9, 'tarik', 50000.00, NULL, 'jajan', '2025-09-29 01:18:09', '2025-09-29 01:18:09'),
(46, 8, 9, 'setor', 200000.00, NULL, 'Top-up disetujui', '2025-09-29 02:08:34', '2025-09-29 02:08:34'),
(47, 12, 9, 'setor', 50000.00, NULL, '-', '2025-10-06 18:54:07', '2025-10-06 18:54:07'),
(48, 12, 9, 'setor', 50000.00, NULL, '-', '2025-10-06 18:59:19', '2025-10-06 18:59:19'),
(49, 12, 9, 'tarik', 100000.00, NULL, '-', '2025-10-07 09:33:21', '2025-10-07 09:33:21'),
(50, 12, 9, 'setor', 100000.00, NULL, '-', '2025-10-07 10:00:15', '2025-10-07 10:00:15'),
(51, 12, 9, 'tarik', 100000.00, NULL, '-', '2025-10-07 23:46:33', '2025-10-07 23:46:33'),
(52, 12, 9, 'setor', 50000.00, NULL, '-', '2025-10-07 23:46:54', '2025-10-07 23:46:54'),
(53, 12, 9, 'setor', 20000.00, NULL, '-', '2025-10-07 23:47:30', '2025-10-07 23:47:30'),
(54, 12, 9, 'setor', 30000.00, NULL, '-', '2025-10-07 23:48:06', '2025-10-07 23:48:06'),
(55, 12, 9, 'tarik', 50000.00, NULL, 'jajan', '2025-10-08 21:35:29', '2025-10-08 21:35:29'),
(56, 6, 9, 'tarik', 50000.00, NULL, 'jajan', '2025-10-08 21:37:57', '2025-10-08 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin Pondok', 'admin', NULL, '$2y$10$V5d2OlxRNfX2SMezavF3P.eYrEJEnVzwDgtmYsMErIUqFruPfIhu6', NULL, '2025-07-07 06:04:15', '2025-07-07 06:04:15'),
(14, 2, 'Amanda Kireina Ramadhani', '20001', NULL, '$2y$10$bIjt6v5nXMYV32DzWAl3UuJxAmi7MzVm4imwJWb.SJ9/KHr0uOv8S', NULL, '2025-08-04 11:34:19', '2025-08-04 11:34:19'),
(15, 2, 'Anindya Rizka Amalia', '20002', NULL, '$2y$10$JNuya2yRVM1r8BHg7Cafm.8hM5U.2Hg.SyYLASMI384AnI0/XlGra', NULL, '2025-08-04 11:39:52', '2025-08-04 11:39:52'),
(16, 2, 'Balkis', '20003', NULL, '$2y$10$2Z4F5KZ2ez4GYDR4KgO/POXx4OdeD1msu9bmMj9sF8hx9vbruE50.', NULL, '2025-08-04 11:43:02', '2025-08-04 11:43:02'),
(17, 2, 'Ishma Karimah', '20004', NULL, '$2y$10$2JXXBzmw4i/GBifq0fqUouZhnKJSLHbIc0z0Xtgau0t/tqJ6vLqEm', NULL, '2025-08-04 11:51:02', '2025-08-04 11:51:02'),
(18, 2, 'Manayra Safira', '20005', NULL, '$2y$10$g0F5/LKScYDJ3Tx3Tgowq.DfEWnY1vAwVljYUbUXaQlBByXMLieyG', NULL, '2025-08-04 11:55:31', '2025-08-04 11:55:31'),
(19, 2, 'Muhimmatul Aliyah', '20006', NULL, '$2y$10$tI85.6pNst1Bh1R9D5oe1uDzxRDij0gfp0aAVG8MAe9mw6xdtu.wa', NULL, '2025-08-04 11:59:45', '2025-08-04 11:59:45'),
(20, 1, 'Aisyah', '00118', NULL, '$2y$10$VL7PyzYv07/3vFStpM6X4OT.X4utYhENmS9aye2lRdE.t4qk584iW', NULL, '2025-08-04 12:19:19', '2025-08-04 12:19:19'),
(21, 1, 'Syifa', '00218', NULL, '$2y$10$..2Rd3echrzQQPYdoAp/JOwa9Tl00QGYUCgcP6oGzqNDHrWQhmhou', NULL, '2025-08-04 12:20:45', '2025-08-04 12:20:45'),
(22, 1, 'Intan', '00318', NULL, '$2y$10$gQmIlsW.UJU7eyLuFfGYf.kI1rP6oc0GRyiDTe5.JXC6Y41Jno8bW', NULL, '2025-08-04 12:21:39', '2025-08-04 12:21:39'),
(23, 2, 'syifa', '25001', NULL, '$2y$10$.1LO6RvFfncpiHYNcnYxQe0fq9mtJaIvGP2LHeXtHNAEQfRiwN/vu', NULL, '2025-08-04 20:44:14', '2025-08-04 20:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `utl_roles`
--

CREATE TABLE `utl_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utl_roles`
--

INSERT INTO `utl_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-07-07 06:04:15', '2025-07-07 06:04:15'),
(2, 'santri', '2025-07-07 06:04:15', '2025-07-07 06:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saldos_santri_id_foreign` (`santri_id`);

--
-- Indexes for table `santris`
--
ALTER TABLE `santris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `santris_nis_unique` (`nis`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topups`
--
ALTER TABLE `topups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topups_santri_id_foreign` (`santri_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_santri_id_foreign` (`santri_id`),
  ADD KEY `transaksis_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `utl_roles`
--
ALTER TABLE `utl_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `santris`
--
ALTER TABLE `santris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topups`
--
ALTER TABLE `topups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `utl_roles`
--
ALTER TABLE `utl_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `saldos`
--
ALTER TABLE `saldos`
  ADD CONSTRAINT `saldos_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `santris`
--
ALTER TABLE `santris`
  ADD CONSTRAINT `santris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `topups`
--
ALTER TABLE `topups`
  ADD CONSTRAINT `topups_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_santri_id_foreign` FOREIGN KEY (`santri_id`) REFERENCES `santris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `utl_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
