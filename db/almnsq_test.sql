-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 04:16 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almnsq_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الرياض', '2018-11-13 10:31:39', '2018-11-13 10:31:39'),
(2, 'جده', '2018-11-13 10:31:52', '2018-11-13 10:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strengths` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `mosque_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imams`
--

CREATE TABLE `imams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `mosque_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'جامع', '2018-11-13 10:34:55', '2018-11-13 10:34:55'),
(2, 'مسجد', '2018-11-13 10:35:05', '2018-11-13 10:35:05'),
(3, 'ملتقي', '2018-11-13 10:35:15', '2018-11-13 10:35:15');

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
(1, '2014_10_11_134215_create_user_groups_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_10_29_113350_create_news_types_table', 1),
(5, '2018_10_29_133111_create_news_table', 1),
(6, '2018_10_31_094020_create_sermons_table', 1),
(7, '2018_10_31_120929_create_sermon_types_table', 1),
(8, '2018_11_01_132501_create_ratings_table', 1),
(9, '2018_11_01_141126_create_cities_table', 1),
(10, '2018_11_01_141341_create_neighborhoods_table', 1),
(11, '2018_11_01_141805_create_mosques_table', 1),
(12, '2018_11_01_142032_create_imams_table', 1),
(13, '2018_11_01_152018_create_locations_table', 1),
(14, '2018_11_01_160150_create_notifications_table', 1),
(15, '2018_11_01_171953_create_complaints_table', 1),
(16, '2018_11_05_101718_add_map_to_mosque', 1),
(17, '2018_11_05_123011_add_mosque_to_sermons', 1),
(18, '2018_11_07_142315_create_suggestion_types_table', 1),
(19, '2018_11_07_142355_create_suggestions_table', 1),
(20, '2018_11_08_075345_create_weeks_table', 1),
(21, '2018_11_08_122339_create_activities_table', 1),
(22, '2018_11_10_022917_add_slider_to_news', 1),
(23, '2018_11_10_130605_create_periods_table', 1),
(24, '2018_11_10_130810_create_activity_statuses_table', 1),
(25, '2018_11_10_135646_add_a_status_to_activites', 1),
(26, '2018_11_10_165405_add_week_to_activity', 1),
(27, '2018_11_12_082409_add_location_to_mosque', 1),
(28, '2018_11_12_163500_add_note_to_activity', 1),
(29, '2018_11_14_155411_create_activity_types_table', 2),
(30, '2018_11_14_162434_add_activity_type_to_activity', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mosques`
--

CREATE TABLE `mosques` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighborhood_id` int(10) UNSIGNED DEFAULT NULL,
  `imam_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mosques`
--

INSERT INTO `mosques` (`id`, `name`, `neighborhood_id`, `imam_id`, `created_at`, `updated_at`, `lat`, `lng`, `location_id`) VALUES
(2, 'الأمير فهد', 1, 1, '2018-11-13 10:48:53', '2018-11-14 07:47:44', NULL, NULL, 2),
(3, 'جامع البواردي', 3, 3, '2018-11-14 08:56:28', '2018-11-14 09:07:31', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

CREATE TABLE `neighborhoods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'الإزدهار', 1, '2018-11-13 10:32:28', '2018-11-13 10:32:28'),
(2, 'الصفا', 2, '2018-11-13 10:33:04', '2018-11-13 10:33:04'),
(3, 'العزيزه', 2, '2018-11-13 10:33:30', '2018-11-13 10:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isSlider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `photo`, `type_id`, `created_at`, `updated_at`, `isSlider`) VALUES
(1, 'مقاله تجريبه', 'مقاله تجريبه للتجربيه فقط', '1542195687.jpg', 4, '2018-11-14 09:41:27', '2018-11-14 09:41:27', NULL),
(2, 'للإختبار', 'للإختبار', '1542284858.jpg', 3, '2018-11-15 10:27:38', '2018-11-15 10:27:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_types`
--

CREATE TABLE `news_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_types`
--

INSERT INTO `news_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'محاضره', '2018-11-13 08:13:17', '2018-11-13 08:13:17'),
(2, 'دعوه عامة', '2018-11-13 08:13:17', '2018-11-13 08:13:17'),
(3, 'إعلان', '2018-11-14 09:38:21', '2018-11-14 09:38:21'),
(4, 'مقال', '2018-11-14 09:38:21', '2018-11-14 09:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('22cc9783-4ffe-4c6c-9482-721a5e3c3fe3', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 1, '{\"id\":1,\"name\":null,\"request_name\":\"\\u0645\\u062d\\u0645\\u062f\",\"day\":\"2018-10-11\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":null,\"created_at\":\"2018-11-14 12:42:39\",\"updated_at\":\"2018-11-14 12:42:39\",\"period_id\":null,\"status_id\":2,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-14 10:42:39', '2018-11-14 10:42:39'),
('2b4a24ae-1114-40b3-9ff9-3e134318bf39', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 2, '{\"id\":15,\"name\":null,\"request_name\":\"\\u0645\\u0635\\u0637\\u0641\\u064a \\u0623\\u0628\\u0648\\u0628\\u0643\\u0631\",\"day\":\"2018-11-15\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":1,\"created_at\":\"2018-11-15 12:29:48\",\"updated_at\":\"2018-11-15 12:29:48\",\"period_id\":null,\"status_id\":2,\"type_id\":null,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"week\":{\"id\":1,\"start_date\":\"2018-11-10\",\"end_date\":\"2018-11-16\",\"number_of_activities\":12,\"created_at\":\"2018-11-13 12:17:10\",\"updated_at\":\"2018-11-15 10:16:24\"}}', NULL, '2018-11-15 10:29:48', '2018-11-15 10:29:48'),
('809f793d-84e0-4d24-af7b-3214093050a5', 'App\\Notifications\\SuggestionNotification', 'App\\Model\\User', 2, '{\"data\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"body\":\"\\u062a\\u0639\\u062f\\u064a\\u0644 \\u0634\\u0643\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639\",\"type_id\":2,\"created_at\":\"2018-11-14 11:42:17\",\"updated_at\":\"2018-11-14 11:42:17\",\"type\":{\"id\":2,\"name\":\"\\u0625\\u0642\\u062a\\u0631\\u0627\\u062d\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"}},\"type\":{\"id\":2,\"name\":\"\\u0625\\u0642\\u062a\\u0631\\u0627\\u062d\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"}}', '2018-11-14 09:52:54', '2018-11-14 09:42:18', '2018-11-14 09:52:54'),
('858536f0-92ae-4fcf-89da-a837d392eb41', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 1, '{\"id\":13,\"name\":null,\"request_name\":\"\\u0645\\u062d\\u0645\\u062f\",\"day\":\"2018-11-10\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":1,\"created_at\":\"2018-11-15 08:41:10\",\"updated_at\":\"2018-11-15 08:41:10\",\"period_id\":null,\"status_id\":2,\"type_id\":null,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"week\":{\"id\":1,\"start_date\":\"2018-11-10\",\"end_date\":\"2018-11-16\",\"number_of_activities\":15,\"created_at\":\"2018-11-13 12:17:10\",\"updated_at\":\"2018-11-13 12:17:10\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-15 06:41:10', '2018-11-15 06:41:10'),
('a73ccd64-c8de-499c-9004-11e6f35dfe57', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 1, '{\"id\":15,\"name\":null,\"request_name\":\"\\u0645\\u0635\\u0637\\u0641\\u064a \\u0623\\u0628\\u0648\\u0628\\u0643\\u0631\",\"day\":\"2018-11-15\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":1,\"created_at\":\"2018-11-15 12:29:48\",\"updated_at\":\"2018-11-15 12:29:48\",\"period_id\":null,\"status_id\":2,\"type_id\":null,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"week\":{\"id\":1,\"start_date\":\"2018-11-10\",\"end_date\":\"2018-11-16\",\"number_of_activities\":12,\"created_at\":\"2018-11-13 12:17:10\",\"updated_at\":\"2018-11-15 10:16:24\"}}', NULL, '2018-11-15 10:29:48', '2018-11-15 10:29:48'),
('b3d2c863-75a9-4c1d-812b-3a4b3ee168b4', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 2, '{\"id\":2,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u0623\\u062d\\u0645\\u062f\",\"request_name\":null,\"day\":\"2018-11-14\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":null,\"created_at\":\"2018-11-14 12:42:54\",\"updated_at\":\"2018-11-14 12:42:54\",\"period_id\":null,\"status_id\":2,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-14 10:42:54', '2018-11-14 10:42:54'),
('c1309a81-0e57-45e3-9915-a0baceab7282', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 2, '{\"id\":13,\"name\":null,\"request_name\":\"\\u0645\\u062d\\u0645\\u062f\",\"day\":\"2018-11-10\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":1,\"created_at\":\"2018-11-15 08:41:10\",\"updated_at\":\"2018-11-15 08:41:10\",\"period_id\":null,\"status_id\":2,\"type_id\":null,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"week\":{\"id\":1,\"start_date\":\"2018-11-10\",\"end_date\":\"2018-11-16\",\"number_of_activities\":15,\"created_at\":\"2018-11-13 12:17:10\",\"updated_at\":\"2018-11-13 12:17:10\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-15 06:41:10', '2018-11-15 06:41:10'),
('c85b1438-8007-4880-af30-d71fbbdaace7', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 1, '{\"id\":2,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u0623\\u062d\\u0645\\u062f\",\"request_name\":null,\"day\":\"2018-11-14\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":null,\"created_at\":\"2018-11-14 12:42:54\",\"updated_at\":\"2018-11-14 12:42:54\",\"period_id\":null,\"status_id\":2,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-14 10:42:54', '2018-11-14 10:42:54'),
('dadc44af-4896-4388-8fef-cc6d1fc28cb1', 'App\\Notifications\\RequestActivity', 'App\\Model\\User', 2, '{\"id\":1,\"name\":null,\"request_name\":\"\\u0645\\u062d\\u0645\\u062f\",\"day\":\"2018-10-11\",\"mosque_id\":2,\"imam_id\":1,\"week_id\":null,\"created_at\":\"2018-11-14 12:42:39\",\"updated_at\":\"2018-11-14 12:42:39\",\"period_id\":null,\"status_id\":2,\"status\":{\"id\":2,\"name\":\"toImam\",\"created_at\":\"2018-11-13 10:13:18\",\"updated_at\":\"2018-11-13 10:13:18\"},\"imam\":{\"id\":1,\"name\":\"\\u0645\\u062d\\u0645\\u062f \\u062e\\u0627\\u0644\\u062f\",\"email\":\"a@mail.com\",\"group_id\":1,\"status\":1,\"created_at\":\"2018-11-13 11:19:14\",\"updated_at\":\"2018-11-13 11:19:14\"}}', NULL, '2018-11-14 10:42:39', '2018-11-14 10:42:39');

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
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `ratingable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratingable_id` bigint(20) UNSIGNED NOT NULL,
  `author_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sermons`
--

CREATE TABLE `sermons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mosque_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sermons`
--

INSERT INTO `sermons` (`id`, `title`, `file`, `created_at`, `updated_at`, `mosque_id`) VALUES
(1, 'للإختبار', NULL, '2018-11-15 11:01:47', '2018-11-15 11:01:47', 2),
(2, 'واحدة أخري', NULL, '2018-11-15 11:14:29', '2018-11-15 11:14:29', 3),
(3, 'fdsfsdfs', '1542287918.jpg', '2018-11-15 11:18:38', '2018-11-15 11:18:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sermon_types`
--

CREATE TABLE `sermon_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `group_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد خالد', 'a@mail.com', '$2y$10$j1jJ1QVsSlOiOMAGD6saBOzvnql2Epk/yBXucCuAJvsq23ltq.LXa', 1, 1, 'pcmOtFjpf5yWBQqPIrGADoIBHw8g3A3h8i858IghhvEFn1vRI8jvS3q2vpMy', '2018-11-13 09:19:14', '2018-11-13 09:19:14'),
(2, 'محمد', 'test@mail.com', '$2y$10$j1jJ1QVsSlOiOMAGD6saBOzvnql2Epk/yBXucCuAJvsq23ltq.LXa', 4, 1, '2ZkJxf1T0ywsOSwjb7cp8vvO87VLAt3AaAOLPZu6T2dJ7vCg7GvNpSwIJmOm', NULL, NULL),
(3, 'إبراهيم الغنام', 'test1@mail.com', '$2y$10$NOutc.2kNv1/AmOhja67BOC1qWa9U9WDpiv0mL4/O9LL4Aafd/ib6', 1, 1, 'W9GV2AUKSfl7DKvdwXHV39Eh2iSCN8OkyMZRrGCoGwbYbMzZ0PmHRYYgPuGZ', '2018-11-14 09:07:31', '2018-11-14 09:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'داعيه', '2018-11-13 08:13:17', '2018-11-13 08:13:17'),
(2, 'متعاون', '2018-11-13 08:13:17', '2018-11-13 08:13:17'),
(3, 'منسق مناشط', '2018-11-13 08:13:17', '2018-11-13 08:13:17'),
(4, 'مدير', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_location_id_foreign` (`location_id`),
  ADD KEY `complaints_mosque_id_foreign` (`mosque_id`);

--
-- Indexes for table `imams`
--
ALTER TABLE `imams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imams_user_id_foreign` (`user_id`),
  ADD KEY `imams_mosque_id_foreign` (`mosque_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mosques`
--
ALTER TABLE `mosques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mosques_neighborhood_id_foreign` (`neighborhood_id`),
  ADD KEY `mosques_imam_id_foreign` (`imam_id`),
  ADD KEY `mosques_location_id_foreign` (`location_id`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `neighborhoods_city_id_foreign` (`city_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_type_id_foreign` (`type_id`);

--
-- Indexes for table `news_types`
--
ALTER TABLE `news_types`
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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_ratingable_type_ratingable_id_index` (`ratingable_type`,`ratingable_id`),
  ADD KEY `ratings_author_type_author_id_index` (`author_type`,`author_id`);

--
-- Indexes for table `sermons`
--
ALTER TABLE `sermons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sermons_mosque_id_foreign` (`mosque_id`);

--
-- Indexes for table `sermon_types`
--
ALTER TABLE `sermon_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_group_id_foreign` (`group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imams`
--
ALTER TABLE `imams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mosques`
--
ALTER TABLE `mosques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_types`
--
ALTER TABLE `news_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sermons`
--
ALTER TABLE `sermons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sermon_types`
--
ALTER TABLE `sermon_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `complaints_mosque_id_foreign` FOREIGN KEY (`mosque_id`) REFERENCES `mosques` (`id`);

--
-- Constraints for table `imams`
--
ALTER TABLE `imams`
  ADD CONSTRAINT `imams_mosque_id_foreign` FOREIGN KEY (`mosque_id`) REFERENCES `mosques` (`id`),
  ADD CONSTRAINT `imams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mosques`
--
ALTER TABLE `mosques`
  ADD CONSTRAINT `mosques_imam_id_foreign` FOREIGN KEY (`imam_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mosques_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `mosques_neighborhood_id_foreign` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`);

--
-- Constraints for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD CONSTRAINT `neighborhoods_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `news_types` (`id`);

--
-- Constraints for table `sermons`
--
ALTER TABLE `sermons`
  ADD CONSTRAINT `sermons_mosque_id_foreign` FOREIGN KEY (`mosque_id`) REFERENCES `mosques` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `user_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
