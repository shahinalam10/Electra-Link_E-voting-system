-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 04:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electra_link_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `party` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `party`, `photo`, `votes`, `created_at`, `updated_at`) VALUES
(7, 'Dr. Shafiqur Rahman', 'Bangladesh Jamaat-e-Islami', 'candidates/uyP8Z39TBZWpSR38nPT3KrPVD9mJctToLf6HCmnN.jpg', 2, '2025-03-14 15:19:04', '2025-03-16 09:14:06'),
(8, 'Md. Nahid Islam', 'National Citizen party (NCP)', 'candidates/i1ZBpm2HIFzbRK0z2vWA7KF2jtM7JEQdA7spLgqN.jpg', 3, '2025-03-14 15:20:16', '2025-03-15 03:41:35'),
(9, 'Tarique Rahman', 'Bangladesh Nationalist Party (BNP)', 'candidates/GL4hhdal7HJZycllfS2OdKZP1k3kVvif602w5P4v.jpg', 1, '2025-03-14 15:21:04', '2025-03-15 03:26:36'),
(10, 'Syed Mohammad Rezaul Karim', 'Islami Andolon Bangladesh', 'candidates/lkZjc0WCKWa8XfBAjW6hHFlfMHfH3Y9xDU4gZzBY.jpg', 1, '2025-03-14 15:28:18', '2025-03-16 09:16:03'),
(11, 'Nurul Haque Nur', 'Gono Odhikar Parishad (GOP)', 'candidates/r7IuI3a7Rf3Yvur1vqY9mmPZh3XEjtiZ5iWnxR2P.jpg', 0, '2025-03-14 15:37:17', '2025-03-14 15:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(30, '2014_10_12_000000_create_users_table', 1),
(31, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(32, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(34, '2025_03_09_090839_add_role_to_users_table', 1),
(35, '2025_03_13_063642_create_candidates_table', 1),
(36, '2025_03_13_063829_create_votes_table', 1),
(37, '2025_03_13_183842_add_voter_id_to_users_table', 1),
(38, '2025_03_14_051727_create_voter_ids_table', 1),
(39, '2025_03_14_053259_add_voter_id_to_votes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('dupl.shahin@gmail.com', '$2y$10$ejsMRbwE5IVSwZBnhpRiEeyH6n9dtErp0nIKb9ZqZaqONT8NMU2Vm', '2025-03-14 15:06:35');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voter_id` varchar(17) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `voter_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(4, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$E87Jhhh.JoetG4j1klMTh.oLc89NjU/yubwdrLFdjaXJC3IXlLR.W', NULL, '2025-03-14 14:49:06', '2025-03-14 14:49:06', 'admin'),
(5, NULL, 'Shahin Alam', 'shahin@gmail.com', NULL, '$2y$10$lAHFVBBOFYdEWwwMasMZb.kuTEltLoS3vhZ/aVN71xOk8OIfIXb6C', NULL, '2025-03-14 14:53:32', '2025-03-14 14:53:32', 'user'),
(6, NULL, 'Shahin Alam', 'dupl.shahin@gmail.com', NULL, '$2y$10$9c4B5HnhE.1d4bkWoxbcOeQB7GSbFAFVR6yMi0TpCgvxT9YWOhU4q', NULL, '2025-03-14 15:01:32', '2025-03-14 15:01:32', 'user'),
(7, NULL, 'shakil alam', 'shakil@gmail.com', NULL, '$2y$10$7tubcIh14ESHceHf4gTK8uQQJqP.2E8c46pUun/MUhKus5OwStFvW', NULL, '2025-03-15 03:02:37', '2025-03-15 03:02:37', 'user'),
(8, NULL, 'Sabina', 'sabina@gmail.com', NULL, '$2y$10$0sRRZXi1T4EuZFi76zvlPu/xW.38NUyz269D0NWviHprj4bmtOjhS', NULL, '2025-03-15 03:21:06', '2025-03-15 03:21:06', 'user'),
(9, NULL, 'Tanjibur Rahman', 'tanjib@gmail.com', NULL, '$2y$10$RgFGjwfuX7rbJ428XgcTZe1R8KiBU.K4yA4c5LCFKo07tyFNYRX7O', NULL, '2025-03-15 03:26:19', '2025-03-15 03:26:19', 'user'),
(11, NULL, 'Nasima Begum', 'nasim@gmail.com', NULL, '$2y$10$jWN0R1tfLyu1DrDU/j0rYejndUEogq.FwX5hHkaz3x4JPDK459FN2', NULL, '2025-03-16 09:13:29', '2025-03-16 09:13:29', 'user'),
(12, NULL, 'Shahjahan Madbar', 'shahjahan@gmail.com', NULL, '$2y$10$3wSC7hFmuvPPP0/ofO6M8Oe8Xo/LUkCbBtXIbh3HHNiowMa4d.Yq2', NULL, '2025-03-16 09:15:43', '2025-03-16 09:15:43', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `voter_ids`
--

CREATE TABLE `voter_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voter_ids`
--

INSERT INTO `voter_ids` (`id`, `voter_id`, `created_at`, `updated_at`) VALUES
(77, '12345', '2025-03-14 15:15:29', '2025-03-14 15:15:29'),
(78, '67890', '2025-03-14 15:15:37', '2025-03-14 15:15:37'),
(79, '135790', '2025-03-14 15:16:03', '2025-03-14 15:16:03'),
(80, '098765', '2025-03-14 15:16:03', '2025-03-14 15:16:03'),
(81, '765432', '2025-03-14 15:16:03', '2025-03-14 15:16:03'),
(82, '456789', '2025-03-14 15:16:03', '2025-03-14 15:16:03'),
(83, '1321312321', '2025-03-14 15:16:10', '2025-03-14 15:16:10'),
(84, '123123123', '2025-03-14 15:16:15', '2025-03-14 15:16:15'),
(85, '453423', '2025-03-14 15:16:20', '2025-03-14 15:16:20'),
(86, '4234234', '2025-03-14 15:16:20', '2025-03-14 15:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voter_id`, `candidate_id`, `created_at`, `updated_at`) VALUES
(4, '12345', 8, '2025-03-14 15:48:06', '2025-03-14 15:48:06'),
(5, '67890', 8, '2025-03-15 03:03:08', '2025-03-15 03:03:08'),
(6, '135790', 7, '2025-03-15 03:21:20', '2025-03-15 03:21:20'),
(7, '098765', 9, '2025-03-15 03:26:36', '2025-03-15 03:26:36'),
(8, '765432', 8, '2025-03-15 03:41:35', '2025-03-15 03:41:35'),
(9, '456789', 7, '2025-03-16 09:14:06', '2025-03-16 09:14:06'),
(10, '1321312321', 10, '2025-03-16 09:16:03', '2025-03-16 09:16:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_voter_id_unique` (`voter_id`);

--
-- Indexes for table `voter_ids`
--
ALTER TABLE `voter_ids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_ids_voter_id_unique` (`voter_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `votes_voter_id_unique` (`voter_id`),
  ADD KEY `votes_candidate_id_foreign` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voter_ids`
--
ALTER TABLE `voter_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
