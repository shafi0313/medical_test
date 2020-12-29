-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2020 at 07:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_medical_test`
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kub_pvrs`
--

CREATE TABLE `kub_pvrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_test_id` bigint(20) UNSIGNED NOT NULL,
  `ref_by_id` bigint(20) UNSIGNED NOT NULL,
  `seen_by_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `kidney` int(11) NOT NULL,
  `kidney_left` int(11) NOT NULL,
  `rk` int(11) NOT NULL,
  `lk` int(11) NOT NULL,
  `pvr` int(11) NOT NULL,
  `interpretation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2020_05_21_100000_create_teams_table', 1),
(23, '2020_05_21_200000_create_team_user_table', 1),
(24, '2020_10_29_142609_create_sessions_table', 1),
(30, '2020_10_30_030416_create_patients_table', 2),
(31, '2020_10_30_032619_create_test_cats_table', 2),
(43, '2020_10_30_083135_create_patient_tests_table', 3),
(44, '2020_10_30_151923_create_kub_pvrs_table', 3),
(45, '2020_11_01_081006_create_pregnancy_profiles_table', 4),
(46, '2020_11_08_062019_create_whole_abdomen_females_table', 5),
(47, '2020_11_09_021928_create_whole_abdomen_males_table', 6);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `add_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdical_history` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `email`, `phone`, `address`, `add_by`, `mdical_history`, `created_at`, `updated_at`) VALUES
(9, 'Test ee', 50, 'Male', NULL, 332, NULL, NULL, NULL, '2020-10-30 10:18:44', '2020-11-08 00:01:13'),
(18, 'sdf', 24, 'Male', NULL, 3323, NULL, NULL, NULL, '2020-10-31 23:44:51', '2020-10-31 23:44:51'),
(19, 'Md. Najmul Hasan', 50, 'Male', NULL, 33234, NULL, NULL, NULL, '2020-11-08 00:37:00', '2020-11-08 00:37:00'),
(20, 'Mortuja Husain', 24, 'Male', NULL, 332451, 'Jessore', NULL, NULL, '2020-11-08 20:33:47', '2020-11-08 20:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_by_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `r_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`id`, `ref_by_id`, `patient_id`, `test_cat_id`, `status`, `r_status`, `created_at`, `updated_at`) VALUES
(3, 1, 18, 1, 1, 0, '2020-10-31 23:44:51', '2020-11-01 07:15:29'),
(4, 1, 18, 2, 0, 1, '2020-10-31 23:44:51', '2020-11-01 04:21:27'),
(18, 1, 20, 1, 1, 0, '2020-11-08 22:57:28', '2020-11-08 22:57:28'),
(19, 1, 20, 2, 0, 0, '2020-11-08 22:57:28', '2020-11-08 22:57:28'),
(20, 1, 20, 3, -1, 0, '2020-11-08 22:57:28', '2020-11-08 22:57:28'),
(21, 1, 20, 4, -2, 1, '2020-11-08 22:57:28', '2020-11-08 23:02:01');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_profiles`
--

CREATE TABLE `pregnancy_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_test_id` bigint(20) UNSIGNED NOT NULL,
  `ref_by_id` bigint(20) UNSIGNED NOT NULL,
  `seen_by_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `bpd` double(8,2) NOT NULL,
  `bpd_week` int(11) NOT NULL,
  `bpd_day` int(11) NOT NULL,
  `hc` double(8,2) NOT NULL,
  `hc_week` int(11) NOT NULL,
  `hc_day` int(11) NOT NULL,
  `ac` double(8,2) NOT NULL,
  `ac_week` int(11) NOT NULL,
  `ac_day` int(11) NOT NULL,
  `fl` double(8,2) NOT NULL,
  `fl_week` int(11) NOT NULL,
  `fl_day` int(11) NOT NULL,
  `pregnency_week` int(11) NOT NULL,
  `pregnency_day` int(11) NOT NULL,
  `lmp_week` int(11) NOT NULL,
  `lmp_day` int(11) NOT NULL,
  `edd` double(8,2) NOT NULL,
  `afi` double(8,2) NOT NULL,
  `heart` double(8,2) NOT NULL,
  `efw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impression` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pregnancy_profiles`
--

INSERT INTO `pregnancy_profiles` (`id`, `patient_test_id`, `ref_by_id`, `seen_by_id`, `patient_id`, `test_cat_id`, `bpd`, `bpd_week`, `bpd_day`, `hc`, `hc_week`, `hc_day`, `ac`, `ac_week`, `ac_day`, `fl`, `fl_week`, `fl_day`, `pregnency_week`, `pregnency_day`, `lmp_week`, `lmp_day`, `edd`, `afi`, `heart`, `efw`, `ri`, `impression`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 1, 18, 2, 1.00, 1, 1, 1.00, 1, 1, 1.00, 1, 1, 1.00, 1, 1, 1, 1, 1, 1, 1.00, 1.00, 1.00, '1', '1', '1', '2020-11-01 04:21:27', '2020-11-01 04:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XmVeZiE3Ny8WwCWRVqZJJNqDnq0EiBBMEUGvd6hd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYnBhY25MWUZBYnhScnpmNVc4anNtRzNrZHNOMTZVVTRxZVNrWjJsdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYXRpZW50LXRlc3Qvc2hvdy10ZXN0LzIwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJC5JWFV4cjg0QnNxc2paWktDeXpPZ082bEJLRk50dGVVNFNnUUUvSC5uWkR6T1JHRW43S0NPIjtzOjU6ImFsZXJ0IjthOjA6e319', 1604899264);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 2, 'Test\'s Team', 1, '2020-10-29 20:09:53', '2020-10-29 20:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_cats`
--

CREATE TABLE `test_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_cats`
--

INSERT INTO `test_cats` (`id`, `name`, `amount`, `info`, `created_at`, `updated_at`) VALUES
(1, 'KUB & PVR', '200.00', NULL, '2020-10-30 03:27:01', '2020-10-30 03:27:01'),
(2, 'Pregnancy Profile', '200.00', NULL, '2020-10-30 03:27:14', '2020-10-30 03:27:14'),
(3, 'Whole Abdomen Female', '0.00', NULL, '2020-11-08 00:06:15', '2020-11-08 00:06:15'),
(4, 'Whole Abdomen Male', '0.00', NULL, '2020-11-08 00:36:25', '2020-11-08 00:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0=User,1=Back User',
  `is_` int(11) DEFAULT NULL COMMENT '1=Admin,2=Counter,3=Doctor',
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `doctor_specialist_id` int(11) DEFAULT NULL,
  `fees` decimal(8,2) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_`, `age`, `gender`, `phone`, `address`, `doctor_specialist_id`, `fees`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, 1, 24, 'Male', 1725848515, 'Dhala', NULL, NULL, NULL, '$2y$10$.IXUxr84BsqsjZZKCyzOgO6lBKFNtteU4SgQE/H.nZDzORGEn7KCO', NULL, NULL, NULL, NULL, NULL, '2020-10-29 20:09:53', '2020-10-29 20:09:53'),
(2, 'Test', 'test@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Wc1OCg/nwLNBEXue9wCTn.O3QBnIVbUxsm1iDWVVKOVRggN3E0JWK', NULL, NULL, NULL, 1, NULL, '2020-10-29 20:09:53', '2020-10-29 20:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `whole_abdomen_females`
--

CREATE TABLE `whole_abdomen_females` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_test_id` bigint(20) UNSIGNED NOT NULL,
  `ref_by_id` bigint(20) UNSIGNED NOT NULL,
  `seen_by_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `kidney` double(8,2) NOT NULL,
  `kidney_left` double(8,2) NOT NULL,
  `rk` double(8,2) NOT NULL,
  `lk` double(8,2) NOT NULL,
  `interpretation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whole_abdomen_males`
--

CREATE TABLE `whole_abdomen_males` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_test_id` bigint(20) UNSIGNED NOT NULL,
  `ref_by_id` bigint(20) UNSIGNED NOT NULL,
  `seen_by_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `kidney` double(8,2) NOT NULL,
  `kidney_left` double(8,2) NOT NULL,
  `rk` double(8,2) NOT NULL,
  `lk` double(8,2) NOT NULL,
  `interpretation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whole_abdomen_males`
--

INSERT INTO `whole_abdomen_males` (`id`, `patient_test_id`, `ref_by_id`, `seen_by_id`, `patient_id`, `test_cat_id`, `kidney`, `kidney_left`, `rk`, `lk`, `interpretation`, `created_at`, `updated_at`) VALUES
(2, 21, 1, 1, 20, 4, 1.00, 1.00, 1.00, 1.00, 'Normal findings at USG.', '2020-11-08 23:02:01', '2020-11-08 23:02:01');

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
-- Indexes for table `kub_pvrs`
--
ALTER TABLE `kub_pvrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kub_pvrs_patient_test_id_foreign` (`patient_test_id`),
  ADD KEY `kub_pvrs_ref_by_id_foreign` (`ref_by_id`),
  ADD KEY `kub_pvrs_seen_by_id_foreign` (`seen_by_id`),
  ADD KEY `kub_pvrs_patient_id_foreign` (`patient_id`),
  ADD KEY `kub_pvrs_test_cat_id_foreign` (`test_cat_id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_phone_unique` (`phone`);

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_tests_ref_by_id_foreign` (`ref_by_id`),
  ADD KEY `patient_tests_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_tests_test_cat_id_foreign` (`test_cat_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pregnancy_profiles`
--
ALTER TABLE `pregnancy_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregnancy_profiles_patient_test_id_foreign` (`patient_test_id`),
  ADD KEY `pregnancy_profiles_ref_by_id_foreign` (`ref_by_id`),
  ADD KEY `pregnancy_profiles_seen_by_id_foreign` (`seen_by_id`),
  ADD KEY `pregnancy_profiles_patient_id_foreign` (`patient_id`),
  ADD KEY `pregnancy_profiles_test_cat_id_foreign` (`test_cat_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `test_cats`
--
ALTER TABLE `test_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whole_abdomen_females`
--
ALTER TABLE `whole_abdomen_females`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whole_abdomen_females_patient_test_id_foreign` (`patient_test_id`),
  ADD KEY `whole_abdomen_females_ref_by_id_foreign` (`ref_by_id`),
  ADD KEY `whole_abdomen_females_seen_by_id_foreign` (`seen_by_id`),
  ADD KEY `whole_abdomen_females_patient_id_foreign` (`patient_id`),
  ADD KEY `whole_abdomen_females_test_cat_id_foreign` (`test_cat_id`);

--
-- Indexes for table `whole_abdomen_males`
--
ALTER TABLE `whole_abdomen_males`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whole_abdomen_males_patient_test_id_foreign` (`patient_test_id`),
  ADD KEY `whole_abdomen_males_ref_by_id_foreign` (`ref_by_id`),
  ADD KEY `whole_abdomen_males_seen_by_id_foreign` (`seen_by_id`),
  ADD KEY `whole_abdomen_males_patient_id_foreign` (`patient_id`),
  ADD KEY `whole_abdomen_males_test_cat_id_foreign` (`test_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kub_pvrs`
--
ALTER TABLE `kub_pvrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnancy_profiles`
--
ALTER TABLE `pregnancy_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_cats`
--
ALTER TABLE `test_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `whole_abdomen_females`
--
ALTER TABLE `whole_abdomen_females`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whole_abdomen_males`
--
ALTER TABLE `whole_abdomen_males`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kub_pvrs`
--
ALTER TABLE `kub_pvrs`
  ADD CONSTRAINT `kub_pvrs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kub_pvrs_patient_test_id_foreign` FOREIGN KEY (`patient_test_id`) REFERENCES `patient_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kub_pvrs_ref_by_id_foreign` FOREIGN KEY (`ref_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kub_pvrs_seen_by_id_foreign` FOREIGN KEY (`seen_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kub_pvrs_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD CONSTRAINT `patient_tests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_tests_ref_by_id_foreign` FOREIGN KEY (`ref_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_tests_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pregnancy_profiles`
--
ALTER TABLE `pregnancy_profiles`
  ADD CONSTRAINT `pregnancy_profiles_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregnancy_profiles_patient_test_id_foreign` FOREIGN KEY (`patient_test_id`) REFERENCES `patient_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregnancy_profiles_ref_by_id_foreign` FOREIGN KEY (`ref_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregnancy_profiles_seen_by_id_foreign` FOREIGN KEY (`seen_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregnancy_profiles_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `whole_abdomen_females`
--
ALTER TABLE `whole_abdomen_females`
  ADD CONSTRAINT `whole_abdomen_females_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_females_patient_test_id_foreign` FOREIGN KEY (`patient_test_id`) REFERENCES `patient_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_females_ref_by_id_foreign` FOREIGN KEY (`ref_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_females_seen_by_id_foreign` FOREIGN KEY (`seen_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_females_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `whole_abdomen_males`
--
ALTER TABLE `whole_abdomen_males`
  ADD CONSTRAINT `whole_abdomen_males_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_males_patient_test_id_foreign` FOREIGN KEY (`patient_test_id`) REFERENCES `patient_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_males_ref_by_id_foreign` FOREIGN KEY (`ref_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_males_seen_by_id_foreign` FOREIGN KEY (`seen_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whole_abdomen_males_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
