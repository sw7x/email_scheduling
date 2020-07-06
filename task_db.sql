-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 01:44 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_send`
--

-- --------------------------------------------------------

--
-- Table structure for table `batchs`
--

CREATE TABLE `batchs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batchs`
--

INSERT INTO `batchs` (`id`, `title`, `user_id`) VALUES
(34, 'marketing', 2),
(35, 'Buisness', 2),
(36, 'IT', 1),
(37, 'CS', 1),
(38, 'Ai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_details`
--

CREATE TABLE `email_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_details`
--

INSERT INTO `email_details` (`id`, `email_id`, `name`, `number`, `email`, `batch_id`) VALUES
(1005, '1234', 'sw', '771234', 'sw1@gmail.com', 34),
(1006, '1235', 'swsd', '771235', 'sw2@gmail.com', 34),
(1007, '1234', 'rr3', '771236', 'sw3@gmail.com', 34),
(1008, '1237', 'gg', '771237', 'sw4@gmail.com', 34),
(1009, '1238', 'sadasdsss', '771238', 'sw5@gmail.com', 34),
(1010, '1239', 'jkk', '771239', 'sw6@gmail.com', 34),
(1011, '1240', 'sdsad', '771240', 'sw7@gmail.com', 34),
(1012, '1241', '4wr', '771241', 'sw8@gmail.com', 34),
(1013, '1242', 'sadasd', '771242', 'sw9@gmail.com', 34),
(1014, '1243', 'sao', '771243', 'sw10@gmail.com', 34),
(1015, '1244', 'sadasd234', '771244', 'sw11@gmail.com', 34),
(1016, '1245', 'as', '771245', 'sw12@gmail.com', 34),
(1017, '1246', 'yy', '771246', 'sw13@gmail.com', 34),
(1018, '1247', 'rr3', '771247', 'sw14@gmail.com', 34),
(1019, '1248', 'gfg', '771248', 'sw1@gmail.com', 34),
(1020, '1249', 'gfg', '771249', 'sw1@gmail.com', 34),
(1021, '1234', 'sw', '771234', 'asd1@yahoo.com', 35),
(1022, '1235', 'swsd', '771235', 'asd2@yahoo.com', 35),
(1023, '1234', 'rr3', '771236', 'asd3@yahoo.com', 35),
(1024, '1237', 'gg', '771237', 'asd4@yahoo.com', 35),
(1025, '1238', 'sadasdsss', '771238', 'asd5@yahoo.com', 35),
(1026, '1239', 'jkk', '771239', 'asd6@yahoo.com', 35),
(1027, '1240', 'sdsad', '771240', 'asd7@yahoo.com', 35),
(1028, '1241', '4wr', '771241', 'asd8@yahoo.com', 35),
(1029, '1242', 'sadasd', '771242', 'asd9@yahoo.com', 35),
(1030, '1243', 'sao', '771243', 'asd10@yahoo.com', 35),
(1031, '1244', 'sadasd234', '771244', 'asd11@yahoo.com', 35),
(1032, '1245', 'as', '771245', 'asd12@yahoo.com', 35),
(1033, '1246', 'yy', '771246', 'asd13@yahoo.com', 35),
(1034, '1247', 'rr3', '771247', 'asd14@yahoo.com', 35),
(1035, '1248', 'gfg', '771248', 'asd15@yahoo.com', 35),
(1036, '1249', 'gfg', '771249', 'asd16@yahoo.com', 35),
(1037, '1234', 'sw', '771234', 'tyg1@yahoo.com', 36),
(1038, '1235', 'swsd', '771235', 'tyg2@yahoo.com', 36),
(1039, '1234', 'rr3', '771236', 'tyg3@yahoo.com', 36),
(1040, '1237', 'gg', '771237', 'tyg4@yahoo.com', 36),
(1041, '1238', 'sadasdsss', '771238', 'tyg5@yahoo.com', 36),
(1042, '1239', 'jkk', '771239', 'tyg6@yahoo.com', 36),
(1043, '1240', 'sdsad', '771240', 'tyg7@yahoo.com', 36),
(1044, '1241', '4wr', '771241', 'tyg8@yahoo.com', 36),
(1045, '1242', 'sadasd', '771242', 'tyg9@yahoo.com', 36),
(1046, '1243', 'sao', '771243', 'tyg10@yahoo.com', 36),
(1047, '1244', 'sadasd234', '771244', 'tyg11@yahoo.com', 36),
(1048, '1245', 'as', '771245', 'tyg12@yahoo.com', 36),
(1049, '1246', 'yy', '771246', 'tyg13@yahoo.com', 36),
(1050, '1247', 'rr3', '771247', 'tyg14@yahoo.com', 36),
(1051, '1248', 'gfg', '771248', 'tyg15@yahoo.com', 36),
(1052, '1249', 'gfg', '771249', 'tyg16@yahoo.com', 36),
(1053, '1234', 'sw', '771234', 'info1@abc.com', 37),
(1054, '1235', 'swsd', '771235', 'info2@abc.com', 37),
(1055, '1234', 'rr3', '771236', 'info3@abc.com', 37),
(1056, '1237', 'gg', '771237', 'info4@abc.com', 37),
(1057, '1238', 'sadasdsss', '771238', 'info5@abc.com', 37),
(1058, '1239', 'jkk', '771239', 'info6@abc.com', 37),
(1059, '1240', 'sdsad', '771240', 'info7@abc.com', 37),
(1060, '1241', '4wr', '771241', 'info8@abc.com', 37),
(1061, '1242', 'sadasd', '771242', 'info9@abc.com', 37),
(1062, '1243', 'sao', '771243', 'info10@abc.com', 37),
(1063, '1244', 'sadasd234', '771244', 'info11@abc.com', 37),
(1064, '1245', 'as', '771245', 'info12@abc.com', 37),
(1065, '1246', 'yy', '771246', 'info13@abc.com', 37),
(1066, '1247', 'rr3', '771247', 'info14@abc.com', 37),
(1067, '1248', 'gfg', '771248', 'info15@abc.com', 37),
(1068, '1249', 'gfg', '771249', 'info16@abc.com', 37),
(1069, '1234', 'sw', '771234', 'contact1@abc.com', 38),
(1070, '1235', 'swsd', '771235', 'contact2@abc.com', 38),
(1071, '1234', 'rr3', '771236', 'contact3@abc.com', 38),
(1072, '1237', 'gg', '771237', 'contact4@abc.com', 38),
(1073, '1238', 'sadasdsss', '771238', 'contact5@abc.com', 38),
(1074, '1239', 'jkk', '771239', 'contact6@abc.com', 38),
(1075, '1240', 'sdsad', '771240', 'contact7@abc.com', 38),
(1076, '1241', '4wr', '771241', 'contact8@abc.com', 38),
(1077, '1242', 'sadasd', '771242', 'contact9@abc.com', 38),
(1078, '1243', 'sao', '771243', 'contact10@abc.com', 38),
(1079, '1244', 'sadasd234', '771244', 'contact11@abc.com', 38),
(1080, '1245', 'as', '771245', 'contact12@abc.com', 38),
(1081, '1246', 'yy', '771246', 'contact13@abc.com', 38),
(1082, '1247', 'rr3', '771247', 'contact14@abc.com', 38),
(1083, '1248', 'gfg', '771248', 'contact15@abc.com', 38),
(1084, '1249', 'gfg', '771249', 'contact16@abc.com', 38);

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
(3, '2020_07_04_204315_create_batches_table', 2),
(4, '2020_07_04_204342_create_email_details_table', 3),
(5, '2020_07_04_204343_create_email_details_table', 4),
(6, '2020_07_05_163333_create_scheduled_details_table', 5),
(7, '2020_07_05_163413_create_scheduled_attachements_table', 6),
(8, '2020_07_05_173517_create_schedule_batch_table', 7),
(9, '2020_07_05_163334_create_scheduled_details_table', 8);

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
-- Table structure for table `scheduled_attachements`
--

CREATE TABLE `scheduled_attachements` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheduled_attachements`
--

INSERT INTO `scheduled_attachements` (`id`, `path`, `schedule_details_id`) VALUES
(20, '/storage/schedule_email_files/user_2_1593991778/1.pdf', 6),
(21, '/storage/schedule_email_files/user_2_1593991778/11.jpg', 6),
(22, '/storage/schedule_email_files/user_2_1593991778/data.xlsx', 6),
(23, '/storage/schedule_email_files/user_2_1593991912/11.jpg', 7),
(24, '/storage/schedule_email_files/user_2_1593991912/data.xlsx', 7),
(25, '/storage/schedule_email_files/user_1_1593992143/2.pdf', 8),
(26, '/storage/schedule_email_files/user_1_1593992143/12.jpg', 8),
(27, '/storage/schedule_email_files/user_1_1593992143/14.jpg', 8),
(28, '/storage/schedule_email_files/user_1_1593992257/2.pdf', 9),
(29, '/storage/schedule_email_files/user_1_1593992257/7.jpg', 9),
(30, '/storage/schedule_email_files/user_1_1593992401/21.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_details`
--

CREATE TABLE `scheduled_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailBody` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_date` date NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheduled_details`
--

INSERT INTO `scheduled_details` (`id`, `email`, `subject`, `emailBody`, `send_date`, `status`) VALUES
(6, 'manager@abc.com', 'meeting', '<h1>hi</h1><p>hi manager</p>', '2020-07-14', '0'),
(7, 'hr@gmail.com', 'HR', '<p><strong>hi</strong></p>', '2020-07-29', '0'),
(8, 'one@abc.com', 'one', '<pre class=\"ql-syntax\" spellcheck=\"false\">one\n</pre>', '2020-07-29', '0'),
(9, 'two@info.com', 'info', '<blockquote>info</blockquote>', '2020-07-06', '0'),
(10, 'three@contact.com', 'contact', '<p><em><u>contact number</u></em></p>', '2020-07-30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_batch`
--

CREATE TABLE `schedule_batch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_detail_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_batch`
--

INSERT INTO `schedule_batch` (`id`, `schedule_detail_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(5, 6, 34, '2020-07-05 17:59:38', '2020-07-05 17:59:38'),
(6, 7, 34, '2020-07-05 18:01:52', '2020-07-05 18:01:52'),
(7, 7, 35, '2020-07-05 18:01:52', '2020-07-05 18:01:52'),
(8, 8, 36, '2020-07-05 18:05:43', '2020-07-05 18:05:43'),
(9, 8, 37, '2020-07-05 18:05:43', '2020-07-05 18:05:43'),
(10, 8, 38, '2020-07-05 18:05:43', '2020-07-05 18:05:43'),
(11, 9, 37, '2020-07-05 18:07:37', '2020-07-05 18:07:37'),
(12, 9, 38, '2020-07-05 18:07:37', '2020-07-05 18:07:37'),
(13, 10, 38, '2020-07-05 18:10:01', '2020-07-05 18:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'susantha', 'susanthawarnapura@gmail.com', NULL, '$2y$10$6p7bFmDxNj..gbj7WpeZgunRrj942NQogdfLcV0pOFKr9OUNA7/Qu', '0LRuKRAqh7CKjsE6wUrWNVq3Q6q3XReqqBcJ0hEI2j1vfKvvuiKocqpNizpT', '2020-07-04 11:52:38', '2020-07-04 11:52:38'),
(2, 'user123', 'user123@gmail.com', NULL, '$2y$10$pEbj6HbF.oGNZzcqY7ihA.BR.AFjoAZHlFCCJZPXmfJYffIojVvam', 'Fy2PdgsUjzP7TXnFTBs6HQecATtgXw3kIX250EoKxb3EINGpQ9oJWqDRzEbC', '2020-07-04 11:54:19', '2020-07-04 11:54:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batchs`
--
ALTER TABLE `batchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_details`
--
ALTER TABLE `email_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scheduled_attachements`
--
ALTER TABLE `scheduled_attachements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduled_details`
--
ALTER TABLE `scheduled_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_batch`
--
ALTER TABLE `schedule_batch`
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
-- AUTO_INCREMENT for table `batchs`
--
ALTER TABLE `batchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `email_details`
--
ALTER TABLE `email_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1085;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scheduled_attachements`
--
ALTER TABLE `scheduled_attachements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `scheduled_details`
--
ALTER TABLE `scheduled_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule_batch`
--
ALTER TABLE `schedule_batch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
