-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 04:33 PM
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
-- Database: `demo_test_four`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'First Quaterly Exam', 'This Exam will Held in March Last Week', '2026-01-06 05:15:53', '2026-01-06 05:15:53'),
(2, 'Second Quater Exam', 'This Exam will Held in June Last Week', '2026-01-07 07:50:26', '2026-01-07 07:50:26'),
(3, 'Third Quater Exam', 'This exam will held in September', '2026-01-07 09:57:18', '2026-01-07 09:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_attempt_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text DEFAULT NULL,
  `selected_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`selected_options`)),
  `marks_obtained` decimal(5,2) NOT NULL DEFAULT 0.00,
  `is_correct` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`id`, `exam_attempt_id`, `question_id`, `answer`, `selected_options`, `marks_obtained`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '\"[\\\"2\\\"]\"', 0.00, NULL, '2026-01-07 05:53:09', '2026-01-07 05:53:09'),
(2, 1, 2, NULL, '\"[\\\"8\\\"]\"', 0.00, NULL, '2026-01-07 05:53:16', '2026-01-07 05:53:16'),
(3, 1, 3, NULL, '\"[\\\"10\\\"]\"', 0.00, NULL, '2026-01-07 05:53:24', '2026-01-07 06:02:12'),
(4, 1, 4, NULL, '\"[\\\"13\\\"]\"', 0.00, NULL, '2026-01-07 05:57:59', '2026-01-07 06:02:17'),
(5, 1, 5, 'ddddddddddddd', NULL, 0.00, NULL, '2026-01-07 06:02:23', '2026-01-07 06:02:23'),
(6, 3, 6, NULL, '\"[\\\"15\\\"]\"', 0.00, NULL, '2026-01-07 09:32:10', '2026-01-07 09:39:34'),
(7, 3, 7, NULL, '\"[\\\"21\\\"]\"', 0.00, NULL, '2026-01-07 09:32:12', '2026-01-07 09:39:39'),
(8, 3, 8, NULL, '\"[\\\"25\\\"]\"', 0.00, NULL, '2026-01-07 09:32:15', '2026-01-07 09:39:44'),
(9, 3, 9, NULL, '\"[\\\"30\\\"]\"', 0.00, NULL, '2026-01-07 09:38:37', '2026-01-07 09:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempts`
--

CREATE TABLE `exam_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ended_at` timestamp NULL DEFAULT NULL,
  `total_marks` decimal(6,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_attempts`
--

INSERT INTO `exam_attempts` (`id`, `exam_id`, `user_id`, `started_at`, `ended_at`, `total_marks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-01-07 11:39:37', '2026-01-07 06:09:37', NULL, 'ongoing', '2026-01-07 05:22:05', '2026-01-07 06:09:37'),
(2, 1, 2, '2026-01-07 09:30:39', NULL, NULL, 'ongoing', '2026-01-07 09:30:39', '2026-01-07 09:30:39'),
(3, 2, 2, '2026-01-07 15:09:49', '2026-01-07 09:39:49', NULL, 'ongoing', '2026-01-07 09:31:01', '2026-01-07 09:39:49');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_06_100226_create_exams_table', 1),
(5, '2026_01_06_145100_create_sections_table', 2),
(7, '2026_01_06_160820_create_questions_table', 3),
(8, '2026_01_07_025112_create_options_table', 3),
(9, '2026_01_07_102205_create_exam_attempts_table', 4),
(10, '2026_01_07_104049_create_exam_answers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP Framework', 1, '2026-01-06 21:44:57', '2026-01-06 21:44:57'),
(2, 1, 'JavaScript Library', 0, '2026-01-06 21:44:57', '2026-01-06 21:44:57'),
(3, 1, 'Database', 0, '2026-01-06 21:44:57', '2026-01-06 21:44:57'),
(4, 1, 'Web Server', 0, '2026-01-06 21:44:57', '2026-01-06 21:44:57'),
(5, 2, 'fine', 1, '2026-01-06 21:59:14', '2026-01-06 21:59:14'),
(6, 2, 'not well', 0, '2026-01-06 21:59:14', '2026-01-06 21:59:14'),
(7, 2, 'good', 0, '2026-01-06 21:59:14', '2026-01-06 21:59:14'),
(8, 2, 'not fine', 0, '2026-01-06 21:59:14', '2026-01-06 21:59:14'),
(9, 4, 'fine', 0, '2026-01-06 23:00:08', '2026-01-06 23:00:08'),
(10, 4, 'not well', 0, '2026-01-06 23:00:09', '2026-01-06 23:00:09'),
(11, 4, 'not so good', 1, '2026-01-06 23:00:09', '2026-01-06 23:00:09'),
(12, 4, 'Web Server', 0, '2026-01-06 23:00:09', '2026-01-06 23:00:09'),
(13, 5, 'fine', 1, '2026-01-06 23:01:08', '2026-01-06 23:01:08'),
(14, 5, NULL, 0, '2026-01-06 23:01:08', '2026-01-06 23:01:08'),
(15, 6, 'RAM', 0, '2026-01-07 07:58:18', '2026-01-07 07:58:18'),
(16, 6, 'Hard Disk', 0, '2026-01-07 07:58:18', '2026-01-07 07:58:18'),
(17, 6, 'CPU', 1, '2026-01-07 07:58:18', '2026-01-07 07:58:18'),
(18, 6, 'Motherboard', 0, '2026-01-07 07:58:18', '2026-01-07 07:58:18'),
(19, 7, 'RAM', 0, '2026-01-07 07:59:45', '2026-01-07 07:59:45'),
(20, 7, 'Cache', 0, '2026-01-07 07:59:45', '2026-01-07 07:59:45'),
(21, 7, 'ROM', 0, '2026-01-07 07:59:45', '2026-01-07 07:59:45'),
(22, 7, 'Hard Disk', 1, '2026-01-07 07:59:45', '2026-01-07 07:59:45'),
(23, 8, 'CPU', 0, '2026-01-07 08:01:04', '2026-01-07 08:01:04'),
(24, 8, 'SMPS', 0, '2026-01-07 08:01:04', '2026-01-07 08:01:04'),
(25, 8, 'Motherboard', 1, '2026-01-07 08:01:04', '2026-01-07 08:01:04'),
(26, 8, 'RAM', 0, '2026-01-07 08:01:04', '2026-01-07 08:01:04'),
(27, 9, 'ROM', 0, '2026-01-07 08:03:08', '2026-01-07 08:03:08'),
(28, 9, 'Hard Disk', 0, '2026-01-07 08:03:09', '2026-01-07 08:03:09'),
(29, 9, 'RAM', 1, '2026-01-07 08:03:09', '2026-01-07 08:03:09'),
(30, 9, 'DVD', 0, '2026-01-07 08:03:09', '2026-01-07 08:03:09'),
(31, 10, 'Virtual and erect', 0, '2026-01-07 10:00:22', '2026-01-07 10:00:22'),
(32, 10, 'Real and inverted', 1, '2026-01-07 10:00:22', '2026-01-07 10:00:22'),
(33, 11, 'Negative', 0, '2026-01-07 10:01:54', '2026-01-07 10:01:54'),
(34, 11, 'Zero', 0, '2026-01-07 10:01:54', '2026-01-07 10:01:54'),
(35, 11, 'Positive', 1, '2026-01-07 10:01:54', '2026-01-07 10:01:54'),
(36, 11, 'Infinite', 0, '2026-01-07 10:01:55', '2026-01-07 10:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `type` enum('1','2','3') NOT NULL COMMENT '1=>MCQ,2=>Objective,3=>descriptive',
  `is_multiple` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `section_id`, `question`, `marks`, `type`, `is_multiple`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Laravel?', 4.00, '1', 0, '2026-01-06 21:44:57', '2026-01-06 21:44:57'),
(2, 1, 'hello how are you', 4.00, '1', 0, '2026-01-06 21:59:14', '2026-01-06 21:59:14'),
(3, 1, 'ssssssssssssss', 8.00, '3', 0, '2026-01-06 22:53:50', '2026-01-06 22:53:50'),
(4, 1, 'hello i am indian', 4.00, '1', 0, '2026-01-06 23:00:08', '2026-01-06 23:00:08'),
(5, 1, 'eeeeeeeeeeeeeeeeeeeeee', 4.00, '1', 0, '2026-01-06 23:01:08', '2026-01-06 23:01:08'),
(6, 3, 'Which component is known as the brain of the computer?', 2.00, '1', 0, '2026-01-07 07:58:18', '2026-01-07 07:58:18'),
(7, 3, 'Which device is used to store data permanently?', 2.00, '1', 0, '2026-01-07 07:59:45', '2026-01-07 07:59:45'),
(8, 3, 'Which hardware component connects all other components?', 4.00, '1', 0, '2026-01-07 08:01:04', '2026-01-07 08:01:04'),
(9, 3, 'Which memory is volatile?', 3.00, '1', 0, '2026-01-07 08:03:08', '2026-01-07 08:03:08'),
(10, 4, 'The image formed by a concave mirror for an object placed beyond the centre of curvature is:', 2.00, '2', 0, '2026-01-07 10:00:22', '2026-01-07 10:00:22'),
(11, 4, 'The focal length of a convex lens is:', 4.00, '1', 0, '2026-01-07 10:01:54', '2026-01-07 10:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` int(10) UNSIGNED DEFAULT NULL COMMENT 'Duration in minutes',
  `negative_marks` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Negative marks per wrong answer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `exam_id`, `title`, `duration`, `negative_marks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laravel Basic', 40, 0.25, '2026-01-06 10:03:12', '2026-01-06 10:03:12'),
(2, 1, 'Laravel Medium', 40, 0.00, '2026-01-06 10:17:16', '2026-01-06 10:17:16'),
(3, 2, 'Hardware Maintance', 30, 0.25, '2026-01-07 07:55:58', '2026-01-07 07:55:58'),
(4, 3, 'Physics', 30, 0.25, '2026-01-07 09:58:15', '2026-01-07 09:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cPBAWPDc4YbOuaWcpC0PwjJT238Kq2PA01qWFSLI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2Rpa3dVZm1nU2tqRTBWVW1RWEZkY0t5dDhPdUd0U3RNbE9CQUFuSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9xdWVzdGlvbnMvY3JlYXRlLzQiO3M6NToicm91dGUiO3M6MTY6InF1ZXN0aW9ucy5jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1767799928);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_answers_exam_attempt_id_question_id_unique` (`exam_attempt_id`,`question_id`),
  ADD KEY `exam_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_section_id_foreign` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD CONSTRAINT `exam_answers_exam_attempt_id_foreign` FOREIGN KEY (`exam_attempt_id`) REFERENCES `exam_attempts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
