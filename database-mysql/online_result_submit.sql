-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 10:56 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_result_submit`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `batch_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '15341', 1, '2019-05-29 23:20:35', '2019-05-29 23:20:35'),
(2, '16341', 1, '2019-05-29 23:20:53', '2019-05-29 23:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `userid`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Millon Mhamud', '133233', '$2y$10$SgHJHk0NI70koMhVPs2XBOSFJSLldOsXqpkUd0/A59g3iM72MbECW', 1, 'ZkXiJkiRJqxBwDxXRdvQ14kRKcxtHqYUFhPgLggPAojjVtmdzSHUZnSwPdtM', '2019-05-29 23:21:20', '2019-05-29 23:21:20'),
(2, 'Abdul Hadi', '133234', '$2y$10$lMNMdncVtACF5CqSwh9zZ.7DpouVLcr2TIyWLSCx9JxnfbgUKfIxi', 1, 'cgstlj0dvZiBlbpzG35PEMWJnChC56ayFvnccRImuE5siEsP5g1m8CLJ48Gf', '2019-05-29 23:21:50', '2019-05-29 23:21:50'),
(3, 'Toufiqur Rahaman', '133235', '$2y$10$wExIxMJhLzeNYFjJTlAUI.GwCDrkxsNd4PJwjNaRhl6eDztpFkmrK', 1, 'E6hMR8hVqTq5eKFQmTJrdWmDmcrUh7Rbol9XTDEmez3ZfWKSX9rZZdln5nai', '2019-05-31 22:52:14', '2019-05-31 22:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_07_061658_create_faculty_table', 1),
(4, '2019_05_10_060818_create_batches_table', 1),
(5, '2019_05_10_061213_create_subjects_table', 1),
(6, '2019_05_11_034145_create_students_table', 1),
(7, '2019_05_11_142136_create_results_table', 1),
(8, '2019_05_12_051917_add_batch_id_to_result_table', 1),
(9, '2019_05_24_051042_add_password_to_student_table', 1),
(10, '2019_06_01_053418_add_is_active_column_to_subeject', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` int(11) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `grade_point`, `grade`, `session`, `year`, `student_id`, `subject_id`, `created_at`, `updated_at`, `batch_id`) VALUES
(1, '3.5', 'A-', 2, '2018', 1, 1, '2019-05-30 04:19:45', '2019-05-30 04:19:45', 1),
(2, '3.00', 'B', 2, '2018', 2, 1, '2019-05-30 04:19:45', '2019-05-30 04:19:45', 1),
(3, '3.5', 'A-', 2, '2018', 1, 3, '2019-05-30 04:20:16', '2019-05-30 04:20:16', 1),
(4, '3.00', 'B', 2, '2018', 2, 3, '2019-05-30 04:20:16', '2019-05-31 22:45:02', 1),
(5, '3.00', 'B', 2, '2018', 1, 2, '2019-05-30 04:47:56', '2019-05-30 04:47:56', 1),
(6, '3.00', 'B', 2, '2018', 2, 2, '2019-05-30 04:47:56', '2019-05-30 04:47:56', 1),
(11, '3.5', 'A-', 0, '2019', 1, 5, '2019-06-01 03:54:52', '2019-06-01 03:54:52', 1),
(12, '2.75', 'B-', 0, '2019', 2, 5, '2019-06-01 03:54:52', '2019-06-01 03:54:52', 1),
(13, '3', 'B', 0, '2019', 1, 4, '2019-06-01 03:56:46', '2019-06-01 03:56:46', 1),
(14, '3.5', 'A-', 0, '2019', 2, 4, '2019-06-01 03:56:46', '2019-06-01 03:56:46', 1),
(25, '3.5', 'A-', 0, '2019', 3, 6, '2019-06-08 11:50:12', '2019-06-08 11:50:12', 2),
(26, '3.25', 'B+', 0, '2019', 4, 6, '2019-06-08 11:50:12', '2019-06-08 11:50:12', 2),
(27, '3.00', 'B', 1, '2019', 1, 7, '2019-06-08 11:57:40', '2019-06-08 11:57:40', 1),
(28, '2.75', 'B-', 1, '2019', 2, 7, '2019-06-08 11:57:40', '2019-06-08 11:57:40', 1),
(29, '3.25', 'B+', 1, '2019', 1, 8, '2019-06-08 11:58:08', '2019-06-08 11:58:08', 1),
(30, '3.00', 'B', 1, '2019', 2, 8, '2019-06-08 11:58:08', '2019-06-08 11:58:08', 1),
(31, '3.25', 'B+', 1, '2019', 1, 9, '2019-06-08 11:59:21', '2019-06-08 11:59:21', 1),
(32, '3.5', 'A-', 1, '2019', 2, 9, '2019-06-08 11:59:21', '2019-06-08 11:59:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_id`, `batch_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `password`) VALUES
(1, 'sujon shekh', '153410005', 1, 1, '3vB79WKMDH6fFiesUAFD8UW2D7fiCOwXWmHZOboryTDgboPIHDPtgZ7kNOKu', '2019-05-29 23:22:40', '2019-05-29 23:22:40', '$2y$10$Nje4ZP08aRBtYQSoL138ju0AAilwiQWaI8Ft6RE6Yx1Zxc5oBrkpS'),
(2, 'Imrul hassan', '153410007', 1, 1, '8aNLuMT5ndjlDln72Iv3d7W8kSKcc71P6ClAbjuCFFFpOZ1gnCEvUla1VKJk', '2019-05-29 23:23:28', '2019-05-29 23:23:28', '$2y$10$ZOKd3cDO485D29NWjz3bP..kvLaAI.Mk358BFsezKmYzdtpY3bJMK'),
(3, 'Soroup Chokroborti', '163410021', 2, 1, NULL, '2019-05-29 23:24:31', '2019-05-30 04:15:54', '$2y$10$Zamong6jO16rHC0kP9xEc.Txzpsxm5FVQYpb0ny4isf/vuhuWYuIG'),
(4, 'Akbor Ali', '163410012', 2, 1, NULL, '2019-06-01 11:00:07', '2019-06-01 11:00:07', '$2y$10$Smr/bZBOAHGOMdLK8cb0zOQelzexQQaWN46ysC.J0sckYSsVlmIFa');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `session` int(11) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `faculty_id`, `batch_id`, `session`, `year`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Object Oriented Programming', 1, 1, 2, '2018', '2019-05-29 23:25:46', '2019-06-01 03:45:17', 0),
(2, 'Datastructure', 2, 1, 2, '2018', '2019-05-29 23:26:40', '2019-06-01 03:08:33', 0),
(3, 'Data Communication And Networking', 1, 1, 2, '2018', '2019-05-29 23:27:31', '2019-06-01 03:09:09', 0),
(4, 'Web Programming', 2, 1, 0, '2019', '2019-05-29 23:28:47', '2019-06-02 02:16:35', 0),
(5, 'Cyber Security', 2, 1, 0, '2019', '2019-05-29 23:29:39', '2019-06-02 02:18:40', 0),
(6, 'Computer Graphics', 1, 2, 0, '2019', '2019-05-29 23:31:04', '2019-06-01 00:30:15', 1),
(7, 'Statistics', 3, 1, 1, '2019', '2019-06-08 11:54:26', '2019-06-08 11:54:26', 1),
(8, 'Calculas-2', 3, 1, 1, '2019', '2019-06-08 11:55:09', '2019-06-08 11:55:09', 1),
(9, 'Electronics-2', 2, 1, 1, '2019', '2019-06-08 11:55:57', '2019-06-08 11:55:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userid`, `password`, `is_active`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sharif uddin', '153410008', '$2y$10$AEVUjTQRde/Lbhb8gFM7b.isKFwm/YkRH.rhQkTPX9bmAwS0yRobW', 1, 'admin', 'AUweQNpoEhbGmzmPsMqPkqhp9ppVKETgTQM7HXOK0lVMIx6s9iGrdgsVb8wp', '2019-05-29 23:18:30', '2019-05-29 23:18:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_userid_unique` (`userid`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_student_id_index` (`student_id`),
  ADD KEY `results_subject_id_index` (`subject_id`),
  ADD KEY `results_batch_id_index` (`batch_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD KEY `students_batch_id_index` (`batch_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_faculty_id_index` (`faculty_id`),
  ADD KEY `subjects_batch_id_index` (`batch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_userid_unique` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
