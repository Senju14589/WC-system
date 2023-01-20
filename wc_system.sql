-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 05:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wc_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `code`, `phone`, `position`, `created_at`, `updated_at`) VALUES
(1, 'พุฒิพงศ์ สักแสน', '001', '064-3469907', 'Developer', NULL, '2023-01-13 00:12:24'),
(2, 'ไกรทอง พยองเดช', '002', '099-1485092', 'การตลาด', NULL, '2023-01-13 00:12:46'),
(3, 'ทธูทวย คงควรทอง', '003', '098-8241642', 'ตัดต่อ', NULL, '2023-01-13 00:13:04'),
(4, 'คูโซ ดันม๊ะ', '004', '066-1234567', 'นักเล่นบาคุกันธาตุไฟ', NULL, '2023-01-13 00:13:19');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_27_033547_create_sessions_table', 1),
(7, '2022_12_29_084411_create_employees_table', 1),
(8, '2023_01_06_023137_create_timechecks_table', 2);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XUgrHz7UFhJied01vhmbNrd4XkgZE4sk7xEmvdGj', 1, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1 Edg/109.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoienN2bTZTVlpJYWM5b2lTWnc1TW9NRzlZUEt5S3kxWDdOVFNMRU9lcSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvd2ZoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRhQXNhb1hzMVFWRnYwazBrZXRqSllPbHp5dk1TdjBGZGlUSmlPaTBnRE50UkNzYmxOTVZGaSI7fQ==', 1673950331);

-- --------------------------------------------------------

--
-- Table structure for table `timechecks`
--

CREATE TABLE `timechecks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timechecks`
--

INSERT INTO `timechecks` (`id`, `employee_id`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '16.455796, 102.819785', 'ปกติ', '2023-01-16 10:10:18', '2023-01-16 10:10:18'),
(2, 2, '16.455796, 102.819785', 'ปกติ', '2023-01-16 10:10:22', '2023-01-16 10:10:22'),
(3, 3, '16.455796, 102.819785', 'ปกติ', '2023-01-16 10:10:27', '2023-01-16 10:10:27'),
(4, 4, '16.455796, 102.819785', 'ปกติ', '2023-01-16 10:10:31', '2023-01-16 10:10:31'),
(5, 1, '16.45579, 102.819785', 'WFH', '2023-01-16 10:10:41', '2023-01-16 10:10:41'),
(6, 2, '16.455816, 102.819786', 'WFH', '2023-01-16 10:10:46', '2023-01-16 10:10:46'),
(7, 3, '16.455816, 102.819786', 'WFH', '2023-01-16 10:10:50', '2023-01-16 10:10:50'),
(8, 4, '16.455816, 102.819786', 'WFH', '2023-01-16 10:10:55', '2023-01-16 10:10:55'),
(9, 1, '16.455824, 102.819771', 'ปกติ', '2023-01-17 01:57:02', '2023-01-17 01:57:02'),
(10, 1, '16.4695, 102.8276', 'WFH', '2023-01-17 07:38:48', '2023-01-17 07:38:48'),
(11, 1, '16.4695, 102.8276', 'WFH', '2023-01-17 07:44:42', '2023-01-17 07:44:42'),
(12, 1, '16.4695, 102.8276', 'WFH', '2023-01-17 07:45:44', '2023-01-17 07:45:44'),
(13, 2, '16.455806, 102.819787', 'WFH', '2023-01-17 07:54:26', '2023-01-17 07:54:26'),
(14, 3, '16.4695, 102.8276', 'WFH', '2023-01-17 07:57:40', '2023-01-17 07:57:40'),
(15, 4, '16.455806, 102.819789', 'WFH', '2023-01-17 07:59:54', '2023-01-17 07:59:54'),
(16, 10, '16.455805, 102.819786', 'WFH', '2023-01-17 08:02:04', '2023-01-17 08:02:04'),
(17, 1, '16.455805, 102.819786', 'WFH', '2023-01-17 08:02:40', '2023-01-17 08:02:40'),
(18, 2, '16.455813, 102.819786', 'WFH', '2023-01-17 08:03:16', '2023-01-17 08:03:16'),
(19, 2, '16.4695, 102.8276', 'WFH', '2023-01-17 08:05:37', '2023-01-17 08:05:37'),
(20, 3, '16.455798, 102.819787', 'WFH', '2023-01-17 08:07:44', '2023-01-17 08:07:44'),
(21, 1, '16.455798, 102.819787', 'ปกติ', '2023-01-17 08:08:14', '2023-01-17 08:08:14'),
(22, 2, '16.455896, 102.819778', 'ปกติ', '2023-01-17 08:09:32', '2023-01-17 08:09:32'),
(23, 1, '16.455802, 102.819784', 'ปกติ', '2023-01-17 08:20:52', '2023-01-17 08:20:52'),
(24, 1, '16.455802, 102.819784', 'ปกติ', '2023-01-17 08:21:24', '2023-01-17 08:21:24'),
(25, 1, '16.455802, 102.819784', 'ปกติ', '2023-01-17 08:25:05', '2023-01-17 08:25:05'),
(26, 4, '16.4695, 102.8276', 'WFH', '2023-01-17 08:35:05', '2023-01-17 08:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'PUTTIPONG', 'Puttipong1458998@gmail.com', NULL, '$2y$10$aAsaoXs1QVFv0k0ketjJYOlzyvMSv0FdiTJiOi0gDNtRCsblNMVFi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-29 07:59:03', '2022-12-29 07:59:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `timechecks`
--
ALTER TABLE `timechecks`
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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timechecks`
--
ALTER TABLE `timechecks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
