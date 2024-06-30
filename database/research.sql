-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 08:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `room_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'hii', '2024-03-24 21:46:38', '2024-03-24 21:46:38'),
(2, 3, 3, 'hii', '2024-03-24 22:59:08', '2024-03-24 22:59:08'),
(4, 3, 5, 'hii', '2024-03-24 23:04:45', '2024-03-24 23:04:45'),
(5, 2, 2, 'hello', '2024-03-24 23:06:18', '2024-03-24 23:06:18'),
(6, 4, 4, 'hello', '2024-03-24 23:07:26', '2024-03-24 23:07:26'),
(7, 4, 5, 'hello', '2024-03-25 01:23:12', '2024-03-25 01:23:12'),
(8, 4, 5, 'hello', '2024-03-25 01:23:13', '2024-03-25 01:23:13'),
(9, 4, 5, 'hello', '2024-03-25 01:23:14', '2024-03-25 01:23:14'),
(10, 2, 4, 'hii', '2024-03-25 01:48:18', '2024-03-25 01:48:18'),
(11, 2, 4, 'hii', '2024-03-25 01:48:19', '2024-03-25 01:48:19'),
(13, 2, 18, 'hello', '2024-06-28 05:09:03', '2024-06-28 05:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2024-03-16 21:47:37', '2024-03-16 21:47:37'),
(2, 'EEE', '2024-03-16 21:47:48', '2024-03-16 21:47:48'),
(3, 'ECE', '2024-03-16 21:47:58', '2024-03-16 21:47:58'),
(4, 'Physics', '2024-03-16 21:48:09', '2024-03-16 21:48:09');

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2023_04_12_180132_create_departments_table', 1),
(31, '2023_04_15_175419_create_areas_table', 1),
(32, '2023_05_09_064828_create_topics_table', 1),
(33, '2023_05_11_052220_create_rooms_table', 1),
(34, '2023_12_03_071608_create_room_members_table', 1),
(35, '2023_12_10_062013_create_chats_table', 1),
(36, '2024_01_28_064048_create_notifications_table', 1),
(37, '2024_03_03_063843_create_topic_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('028698e3-3fff-4116-9a65-90bb0c65df16', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 3, '{\"data\":{\"user_id\":2,\"room_id\":16,\"room_name\":\"dddd\",\"name\":\"Nazrul\"},\"role\":\"createroom\"}', NULL, '2024-04-23 00:52:11', '2024-04-23 00:52:11'),
('0ea5ae41-d388-4854-99e7-1ec89d8aa37a', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 2, '{\"data\":{\"user_id\":2,\"room_id\":16,\"room_name\":\"dddd\",\"name\":\"Nazrul\"},\"role\":\"createroom\"}', '2024-06-30 11:43:22', '2024-04-23 00:52:11', '2024-06-30 11:43:22'),
('24a6dc98-61fe-42a5-bf90-7d6ab7d38a06', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 3, '{\"data\":{\"user_id\":3,\"room_id\":3,\"room_name\":\"I.Islam\",\"name\":\"I.Islam\"},\"role\":\"createroom\"}', NULL, '2024-03-24 21:33:32', '2024-03-24 21:33:32'),
('87499240-910b-43f9-980d-a62188919c52', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 2, '{\"data\":{\"user_id\":2,\"room_id\":17,\"room_name\":\"I.Islam\",\"name\":\"Nazrul\"},\"role\":\"createroom\"}', '2024-06-30 11:39:16', '2024-04-28 23:35:24', '2024-06-30 11:39:16'),
('beca7ac2-df87-4ef0-9aa4-a7a72f0f83ad', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 4, '{\"data\":{\"user_id\":2,\"room_id\":18,\"room_name\":\"Biomedical Physiology\",\"name\":\"Nazrul\"},\"role\":\"createroom\"}', NULL, '2024-05-12 20:09:13', '2024-05-12 20:09:13'),
('fb96897d-6174-4bc0-9b52-58046ea26870', 'App\\Notifications\\CreateRoom', 'App\\Models\\User', 4, '{\"data\":{\"user_id\":3,\"room_id\":5,\"room_name\":\"I.Islam\",\"name\":\"I.Islam\"},\"role\":\"createroom\"}', NULL, '2024-03-24 22:42:40', '2024-03-24 22:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `paper_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `user_id`, `name`, `slug`, `topic_id`, `image`, `cover`, `short_description`, `description`, `paper_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Data science', 'data-science', 2, '1711336415.big-data.jpg', NULL, 'I need a research collaborator for this research topic :\r\n\r\n # Privacy and security issues that face big data...................', '<p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problems through Swarm Intelligence.</font></p><div><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\"><br></font></div>', NULL, 1, '2024-03-24 21:10:24', '2024-06-29 01:15:09'),
(3, 3, 'Data Catalog', 'data-catalog', 2, '1711337609.Screenshot_1.jpg', NULL, 'I need a Collaborator for this topic:\r\n# Market study and the data catalog reference model................', '<p>Ongoing Researches</p><p>1. Handwritten Numeral/Character Recognition using DNNs.</p><p>2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</p><p>3. Gene Regulatory Network Inference through Swarm Intelligence.</p><p>4. Solving Capacitated Vehicle Routing Problems through Swarm Intelligence.</p><p><br></p><p><br></p>', NULL, 1, '2024-03-24 21:33:29', '2024-06-29 00:28:42'),
(4, 4, 'Heart disease prediction', 'heart-disease-prediction', 1, '1711340981.mach.jpg', NULL, 'I need a Collaborator for this topic: \r\n## The heart disease prediction using a technique of classification in machine learning using the concepts of data mining..........', '<p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif;\"><span style=\"color: rgb(68, 68, 68); font-family: Georgia, \"Times New Roman\", Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition. </span></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problem through Swarm Intelligence.</font></p>', NULL, 1, '2024-03-24 22:29:41', '2024-06-29 00:32:01'),
(5, 3, 'Liquid Crystal Polymer Vortex Retarder', 'liquid-crystal-polymer-vortex-retarder', 10, '1711341757.Screenshot_2.png', NULL, 'I need a collaborator for this research topic:\r\n##  Determination of Optical Rotation Based on Liquid Crystal Polymer Vortex Retarder and Digital Image Processing......', '<p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif;\"><span style=\"color: rgb(68, 68, 68); font-family: Georgia, \"Times New Roman\", Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition. </span></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problem through Swarm Intelligence.</font></p>', NULL, 1, '2024-03-24 22:42:37', '2024-06-29 00:29:15'),
(16, 2, 'Security system', 'security-system', 5, '1713855128.1_UhMLJb2r6GMerltS4bAIpA.jpg', NULL, 'I need a research collaborator for this research topic : ## Privacy and security issues that face big data researcher collaborators.', '<p>sddd</p>', NULL, 1, '2024-04-23 00:52:08', '2024-05-12 20:15:26'),
(18, 2, 'Biomedical Physiology', 'biomedical-physiology', 6, '1715566151.biomedical-eng-banner1600.jpg', NULL, 'I need a research collaborator for this research topic :  # The Mysteries of Human Memory: A Neurophysiological Approach.....................', '<p><span style=\"color: rgb(68, 68, 68); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition.&nbsp;</span><br></p>', NULL, 1, '2024-05-12 20:09:11', '2024-05-12 20:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `room_members`
--

CREATE TABLE `room_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_members`
--

INSERT INTO `room_members` (`id`, `room_id`, `user_id`, `is_approved`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, '2024-03-16 23:03:34', '2024-03-16 23:03:34'),
(2, 2, 2, 1, NULL, '2024-03-24 21:10:25', '2024-03-24 21:10:25'),
(3, 3, 3, 1, NULL, '2024-03-24 21:33:29', '2024-03-24 21:33:29'),
(4, 2, 3, 0, NULL, '2024-03-24 21:47:13', '2024-03-24 21:47:13'),
(5, 2, 4, 1, NULL, '2024-03-24 22:14:41', '2024-03-24 23:06:13'),
(6, 4, 4, 1, NULL, '2024-03-24 22:29:41', '2024-03-24 22:29:41'),
(7, 5, 3, 1, NULL, '2024-03-24 22:42:37', '2024-03-24 22:42:37'),
(8, 5, 4, 1, NULL, '2024-03-24 22:45:42', '2024-03-24 23:04:20'),
(9, 4, 2, 1, NULL, '2024-03-24 22:50:29', '2024-03-24 23:07:36'),
(10, 1, 3, 1, NULL, '2024-03-24 22:59:33', '2024-03-24 23:01:05'),
(11, 4, 3, 1, NULL, '2024-03-24 23:03:40', '2024-03-25 01:52:02'),
(12, 5, 2, 0, NULL, '2024-03-25 00:06:34', '2024-03-25 00:06:34'),
(13, 3, 2, 0, NULL, '2024-03-25 23:20:56', '2024-03-25 23:20:56'),
(14, 16, 2, 1, NULL, '2024-04-23 00:52:08', '2024-04-23 00:52:08'),
(15, 17, 2, 1, NULL, '2024-04-28 23:35:23', '2024-04-28 23:35:23'),
(16, 17, 4, 1, NULL, '2024-04-28 23:40:06', '2024-04-28 23:41:34'),
(17, 18, 2, 1, NULL, '2024-05-12 20:09:11', '2024-05-12 20:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Machine learning', 'machine-learning', '1710649008.Screenshot_3.jpg', '2024-03-16 21:51:34', '2024-03-16 22:16:48'),
(2, 'Big Data', 'big-data', '1710647621.services-bigdata-bigdataplatform-header-2732x1536.jpg', '2024-03-16 21:53:41', '2024-03-16 21:53:41'),
(3, 'Artifical Intelligence', 'artifical-intelli', '1710647904.aa.png', '2024-03-16 21:58:24', '2024-03-16 21:58:24'),
(4, 'Information Security Protocols', 'information-security-protocols', '1710647992.0e63b756dd8dab308cf9ea3f2e8de3f55619b7a9-1456x816.jpg', '2024-03-16 21:59:52', '2024-03-16 21:59:52'),
(5, 'IoT', 'iot', '1710648114.Image-1-1080x675.jpg', '2024-03-16 22:01:54', '2024-03-16 22:01:54'),
(6, 'Bioinformatics Bio-Inspired', 'bioinformatics-bio-inspired', '1710648327.9-Bioinspired-Medical-Technologies_hero.jpg', '2024-03-16 22:05:27', '2024-03-16 22:05:27'),
(7, 'Cloud Computing', 'cloud-computing', '1710648648.cloud.png', '2024-03-16 22:10:48', '2024-03-16 22:10:48'),
(8, 'Deep Learning', '-deep-learning', '1710649404.Screenshot_4.png', '2024-03-16 22:23:24', '2024-03-16 22:23:24'),
(9, 'Natural Language Processing', 'natural-language-processing', '1710649508.1692460799817.jpeg', '2024-03-16 22:25:08', '2024-03-16 22:25:08'),
(10, 'Image Processing', 'image-processing', '1710649787.image-processing.png', '2024-03-16 22:29:47', '2024-03-16 22:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `topic_user`
--

CREATE TABLE `topic_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_user`
--

INSERT INTO `topic_user` (`user_id`, `topic_id`) VALUES
(3, 2),
(4, 3),
(4, 6),
(2, 1),
(2, 4),
(3, 1),
(3, 3),
(3, 5),
(4, 4),
(4, 5),
(2, 6),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `short_bio` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `stackoverflow` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department_id`, `email`, `phone`, `address`, `image`, `email_verified_at`, `password`, `short_bio`, `description`, `facebook`, `linkedin`, `github`, `stackoverflow`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '01911223344', NULL, NULL, NULL, '$2y$10$52JJfVJs4bzGT5pw7oOTmekB.e1R4P/EOYmVGZYk8672a.Z09EPU2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Nazrul', 1, 'nazrul@gmail.com', '+8801960210185', 'Sonadanga,GPO-9000, Khulna', '1710574291.pp.jpg', NULL, '$2y$10$fB1vvHauWX0gyPVFQG2Lp.ZQo7pUUXhQUbhsCtirVOTcXFuxDq/Ke', 'Welcome and thank you for taking the time to visit my website.In this site, you may find short description about my education, professional experience, research, etc.', '<p><span style=\"color: rgb(68, 68, 68); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition.&nbsp;</span></p><p style=\"text-align: justify; \"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"text-align: justify; \"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"text-align: justify; \"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"text-align: justify; \"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"text-align: justify; \"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problem through Swarm Intelligence.</font></p><p><span style=\"color: rgb(68, 68, 68); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: medium; text-align: justify;\"></span><br></p>', 'nazrulcse3', 'nazrulcse3', NULL, NULL, 0, NULL, '2024-03-16 01:29:56', '2024-03-16 22:41:36'),
(3, 'I.Islam', 2, 'nazrulcse3@gmail.com', '+8801910672993', 'Khulna, GPO-9000.', '1719642447.Screenshot_2.jpg', NULL, '$2y$10$s9Pt7v0rwEriVwfnKLTUdeLpUdpPaZD25NioslMVCQQlAkT6lWbzi', 'Welcome and thank you for taking the time to visit my website.In this site, you may find short description about my education, professional experience, research, etc.', '<p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif;\"><span style=\"color: rgb(68, 68, 68); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition.&nbsp;</span></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problem through Swarm Intelligence.</font></p><div><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\"><br></font></div>', 'nazrulcse3', 'nazrulcse3', NULL, NULL, 0, NULL, '2024-03-24 21:22:22', '2024-06-29 00:27:27'),
(4, 'Zayid', 3, 'nazrul3@gmail.com', '+8801610475111', 'Sonadanga, Khulna', '1719642657.dd.jpg', NULL, '$2y$10$Pj3FgwQL/IDHz5rKdzK6te0ZJB.aQWS3zvb20NR5VZq36keNo.KB6', 'Welcome and thank you for taking the time to visit my website.In this site, you may find short description about my education, professional experience, research, etc.', '<p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif;\"><span style=\"color: rgb(68, 68, 68); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: medium; text-align: justify;\">About research, I am interested in Artificial Intelligence specifically (i) Artificial Neural Networks (ANN) and Neural Networks Ensemble (NNE), (ii) Evolutionary Computation and other Bio-inspired Computing Techniques, (iii) Swarm Intelligence and Optimization (iv) Biomedical Signal Processing and, (v) Pattern Recognition.&nbsp;</span></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">Ongoing Researches</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">1. Handwritten Numeral/Character Recognition using DNNs.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">2. Highly Constrained University Course Scheduling using Bio-inspired Methods.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">3. Gene Regulatory Network Inference through Swarm Intelligence.</font></p><p style=\"font-size: 16px; font-weight: var(--font-weight-light); font-family: Montserrat, sans-serif; text-align: justify;\"><font color=\"#444444\" face=\"Georgia, Times New Roman, Times, serif\" size=\"3\">4. Solving Capacitated Vehicle Routing Problems through Swarm Intelligence.</font></p>', 'nazrulcse3', 'nazrulcse3', NULL, NULL, 0, NULL, '2024-03-24 21:50:04', '2024-06-29 00:45:29');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `tr_user_del` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
  SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'DELETE cancelled'; 
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_slug_unique` (`slug`);

--
-- Indexes for table `room_members`
--
ALTER TABLE `room_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_slug_unique` (`slug`);

--
-- Indexes for table `topic_user`
--
ALTER TABLE `topic_user`
  ADD KEY `topic_user_user_id_foreign` (`user_id`),
  ADD KEY `topic_user_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_members`
--
ALTER TABLE `room_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topic_user`
--
ALTER TABLE `topic_user`
  ADD CONSTRAINT `topic_user_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topic_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
