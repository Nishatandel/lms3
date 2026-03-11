-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2026 at 08:34 PM
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
-- Database: `libarary_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `published_year` int(11) DEFAULT NULL,
  `status` enum('available','borrowed') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `image`, `title`, `author`, `isbn`, `published_year`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'books/1Rr97MsxUXsaUQeeL4XAt3LxNmfEsZqKDXI7N05k.jpg', 'Laravel', 'Rasmus Lerdorf', '7367829382913', 2000, 'borrowed', '2025-03-22 11:22:53', '2025-04-25 00:19:24', 2),
(4, 'books/RZvTU6JgNE6EPcBRGFZhC1ObzAmUam7J7dj0aDSu.jpg', 'Java', 'Herbert Schildt', '7864568767123', 2002, 'borrowed', '2025-03-22 11:38:10', '2025-04-25 00:19:27', 2),
(5, 'books/j1hYwQfZsUv4RsBUUQ1wA9mfoyFT1aLaoO8JHXoc.jpg', 'The Advantures of Tom Sawyer', 'Mark Twain', '6745378290246', 1999, 'borrowed', '2025-03-22 11:38:54', '2025-04-29 02:21:15', 4),
(6, 'books/5yM5fqjwi6gmyBDk3DZ1yIjgupYyDr93gmlTLaIV.jpg', 'a ben in the river', 'V.s Naipaul', '7367829382912', 1969, 'borrowed', '2025-03-22 12:30:18', '2025-04-29 02:21:16', 5),
(10, 'books/mqlosaAeY788u4UAyDkGQjrrxOq21Hs4nBcX0Hrn.jpg', 'React', 'Rosa María Artal', '9355420692', 2011, 'available', '2025-03-22 12:41:19', '2025-04-29 02:21:18', 2),
(11, 'books/BUtbbtb3JvdfXETUZx9jkCc9pRFK14mV0Sl6mm4e.jpg', 'C++', 'Bjarne Stroustrup', '0201539926', 1985, 'available', '2025-03-22 12:44:28', '2025-04-10 03:36:45', 2),
(12, 'books/Purv9kqNM2uWBpBd6TyvDhgIoIOu8JqgtWgk3Lxz.jpg', 'Python', 'Guido van Rossum', '9332585342', 2013, 'available', '2025-03-22 12:50:17', '2025-04-10 03:36:52', 2),
(13, 'books/vpVVfRuZG7yGi17AQps0ovu7JXJWVQk0IrPhJ54U.png', 'The Guns of August', 'Barbara Wertheim Tuchman', '9012738283212', 1962, 'available', '2025-04-10 03:40:41', '2025-04-10 03:40:41', 6);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrowed_at` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `returned_at` timestamp NULL DEFAULT NULL,
  `fine` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `fine`, `created_at`, `updated_at`) VALUES
(6, 3, 1, '2025-03-25 09:57:45', '2025-04-08 09:57:45', '2025-04-29 01:20:46', -166.34, '2025-03-25 09:57:45', '2025-04-29 01:20:46'),
(7, 3, 4, '2025-03-25 09:57:52', '2025-04-08 09:57:52', '2025-04-29 02:12:57', -166.34, '2025-03-25 09:57:52', '2025-04-29 02:12:57'),
(8, 3, 6, '2025-03-25 09:58:00', '2025-04-08 09:58:00', '2025-04-10 04:05:08', NULL, '2025-03-25 09:58:00', '2025-04-10 04:05:08'),
(9, 3, 10, '2025-03-25 09:58:06', '2025-04-08 09:58:06', '2025-04-29 01:20:24', -166.33, '2025-03-25 09:58:06', '2025-04-29 01:20:24'),
(10, 4, 10, '2025-03-25 09:59:53', '2025-04-08 09:59:53', '2025-05-01 12:03:52', -166.32, '2025-03-25 09:59:53', '2025-05-01 12:03:52'),
(11, 4, 5, '2025-03-25 09:59:56', '2025-04-08 09:59:56', '2025-03-25 10:23:18', NULL, '2025-03-25 09:59:56', '2025-03-25 10:23:18'),
(12, 4, 12, '2025-03-25 10:00:06', '2025-04-08 10:00:06', '2025-05-01 12:04:20', -166.32, '2025-03-25 10:00:06', '2025-05-01 12:04:20'),
(13, 5, 11, '2025-03-25 10:02:44', '2025-04-08 10:02:44', '2025-05-01 12:06:01', -166.37, '2025-03-25 10:02:44', '2025-05-01 12:06:01'),
(14, 5, 4, '2025-03-25 10:02:47', '2025-04-08 10:02:47', '2025-05-01 12:06:04', -166.36, '2025-03-25 10:02:47', '2025-05-01 12:06:04'),
(15, 5, 6, '2025-03-25 10:02:49', '2025-04-08 10:02:49', '2025-05-01 12:06:06', -166.52, '2025-03-25 10:02:49', '2025-05-01 12:06:06'),
(16, 3, 11, '2025-04-29 01:21:18', '2025-05-13 01:21:18', '2025-04-29 01:27:16', NULL, '2025-04-29 01:21:18', '2025-04-29 01:27:16'),
(17, 3, 5, '2025-04-29 01:57:59', '2025-05-13 01:57:59', '2025-04-29 02:12:57', NULL, '2025-04-29 01:57:59', '2025-04-29 02:12:57'),
(18, 3, 1, '2025-04-29 02:18:21', '2025-05-13 02:18:21', NULL, NULL, '2025-04-29 02:18:21', '2025-04-29 02:18:21'),
(19, 3, 4, '2025-04-29 02:18:24', '2025-05-13 02:18:24', NULL, NULL, '2025-04-29 02:18:24', '2025-04-29 02:18:24'),
(20, 3, 5, '2025-04-29 02:18:27', '2025-05-13 02:18:27', NULL, -32.14, '2025-04-29 02:18:27', '2025-05-16 07:27:01'),
(21, 3, 6, '2025-04-29 02:18:40', '2025-05-13 02:18:40', NULL, -32.14, '2025-04-29 02:18:40', '2025-05-16 07:26:42'),
(22, 4, 11, '2025-05-01 12:05:11', '2025-05-15 12:05:11', '2025-05-01 12:06:46', NULL, '2025-05-01 12:05:11', '2025-05-01 12:06:46'),
(23, 4, 12, '2025-05-01 12:05:14', '2025-05-15 12:05:14', '2025-05-01 12:06:49', NULL, '2025-05-01 12:05:14', '2025-05-01 12:06:49');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Historical Fiction111', 'Memoirs', 'category_images/a3KG01gZGsSsaDZJVdY2uvknRwKOyR8PgvkA4hf4.jpg', '2025-03-22 13:12:43', '2025-12-17 04:05:36'),
(4, 'Fantasy', 'imaginary worlds and creatures', 'category_images/ibnVdA2RQ5ZjYJb2JxtY3uGBSs2XwTpJmkWMmjdc.jpg', '2025-03-25 10:10:24', '2025-03-25 10:10:24'),
(5, 'Poetry', 'poetry is called a poem', 'category_images/masXt3QtXNms7HsSiYcnQrRKXyUy8uqDeptLrA77.jpg', '2025-03-25 10:13:27', '2025-03-25 10:13:27'),
(6, 'History', 'creative', 'category_images/mlbhXIyf0EKqzUeZlELbiLFHr81YCBx8tdiCPbi1.jpg', '2025-03-25 10:16:44', '2025-03-25 10:16:44'),
(7, 'Art and Fear', 'An artist\'s survival guide, written by and for working artists.', 'category_images/f4C6s3rqZJDMnzBIrrw3IzMiywwD53jnovjPvAAQ.jpg', '2025-03-25 10:21:11', '2025-03-25 10:21:11');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2025_02_13_055536_create_categories_table', 3),
(6, '2025_02_13_061752_create_categories_table', 4),
(7, '2025_02_13_063457_create_categories_table', 5),
(9, '2025_02_14_063926_create_book_issues_table', 7),
(10, '2025_02_14_070424_create_borrowed_books_table', 8),
(11, '2025_02_17_045340_create_borrowed_books_table', 9),
(13, '2025_02_17_073126_create_members_table', 11),
(15, '2025_02_19_065138_create_members_table', 13),
(16, '2025_02_19_070158_create_members_table', 14),
(43, '2025_02_19_093833_add_member_since_to_users_table', 16),
(47, '2025_02_25_054105_create_transactions_table', 18),
(49, '2025_02_25_070424_create_transactions_table', 20),
(50, '2025_02_25_074007_create_transactions_table', 21),
(51, '2025_02_25_081601_create_transactions_table', 22),
(56, '0001_01_01_000000_create_users_table', 23),
(57, '0001_01_01_000001_create_cache_table', 23),
(58, '0001_01_01_000002_create_jobs_table', 23),
(59, '2025_02_11_095608_create_books_table', 23),
(60, '2025_02_13_072417_create_categories_table', 23),
(61, '2025_02_17_051803_create_borrowed_books_table', 23),
(62, '2025_02_19_052849_add_status_to_books_table', 23),
(63, '2025_02_19_091418_create_members_table', 23),
(64, '2025_02_19_094617_add_phone_to_users_table', 23),
(65, '2025_02_25_064246_add_borrowed_date_to_transactions_table', 23),
(66, '2025_02_25_082249_create_settings_table', 23),
(67, '2025_03_03_065658_create_transactions_table', 23),
(68, '2025_03_03_071306_add_fine_to_borrowed_books_table', 23),
(69, '2025_03_22_153559_add_image_to_books_table', 23),
(70, '2025_03_22_165847_modify_isbn_column', 24),
(71, '2025_03_22_183005_add_image_to_categories_table', 25),
(72, '2025_03_22_185700_add_member_since_to_users_table', 26),
(73, ' 2025_04_10_082954_add_category_id_to_books_table ', 0);

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
('241XVjmGxTYb7Ndw91maIZ4UbPbKSfZvhZQqU7fo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTZEVngxdkRSRTdtRkRTbm9yWU1PRFJjN3pqZ1h1a0tWajFuNE1PeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1746123192),
('7EiOlgZEwci6WNEZmdotReJyMKOcQUJJFkEln0AG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDJGMEFJakhUbXNSTjlPQVFDYmlGRU1DUHpyRGVudHBLS1lnamtpdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1747400426),
('grkb3g5uriToeneHDO0oalzbqa0Cst1F0sZLAbPo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1N4b25rVklubVVYNEt3TVZ5OWZoT2pkN0Q2UFRZSWRpVm1keFFydiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXRlZ29yaWVzL2VkaXQvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765964244),
('oimhsloUYHosR2h4INkvvt9esgvwTpylFUnq7O3b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiR2JBZU5Bd1BvaDFsMmZkNHRuSzRrOVV4a2tJYldBUkYxN1BJY1dBOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746118541),
('Tacz1hvP2Ksl5pcPn3OXHyXpofBUEmani7iKqxEt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOEJTVkV2azF1NjdXQXVMZ3BaU3JtblNjOGFVTWdwa2JNM2ZQMUxPTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747400103),
('VqGnB9uH7XCTAhaAV33DEoPuqKeveG2IJxuogluw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDluUHV6cTR6dVM0bHJGWVNkTEpYZDE4ZzhRTmVyemJVSm00dEJVRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765958296),
('wMv5qQ9z8rOQPGeDDnaQnLBsov1ObdobAjeXcPXY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjB6ZEp3RndRT0lWeXNjNDZrT2JVeWJVTm54MWZBRmU4SDZWdWFWSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765958254);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `library_name` varchar(255) NOT NULL,
  `library_email` varchar(255) NOT NULL,
  `opening_hours` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `member_since` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `member_since`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'nisha_tandel', 'nisha2003@gmail.com', '7600428453', NULL, NULL, '$2y$12$muHvNRliivdzFM2687YqY.HVWCmLMXSyXxs7Sx8mTGFEfvcdLaXOa', NULL, '2025-03-25 09:44:57', '2025-03-25 09:44:57'),
(4, 'Mituu', 'mituu2009@gmail.com', '7567785337', NULL, NULL, '$2y$12$y7PMVaODosaAFNvGDa.Y5uE7dIelgS/FiRu5BvUkKmwes62KAIaFa', NULL, '2025-03-25 09:59:10', '2025-03-25 09:59:10'),
(5, 'Krupaxi_tandel', 'kuku2000@gmail.com', '8765354637', NULL, NULL, '$2y$12$RDBKKMX.4gX4CFmXcCiy3ePo9MpY0nBOc316IxeCtG9/dlpOVFrvy', NULL, '2025-03-25 10:02:20', '2025-03-25 10:02:20'),
(6, 'Zeni_tandel', 'zeni2012@gmail.com', '7600428478', NULL, NULL, '$2y$12$RnDtJ8d5Pzlyn.WryVm2aeNJsXUAZM53j.cSCcgF01pGSa4LCfCOC', NULL, '2025-03-25 10:31:28', '2025-03-25 10:31:28'),
(7, 'Jeet', 'jeet2011@gmail.com', '9990428453', NULL, NULL, '$2y$12$905AoUgw.SZ.xvNiLztJL.BcaEeDOZzSH1vO59bpq8KHR9YI2bxfe', NULL, '2025-03-25 10:31:58', '2025-03-25 10:31:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowed_books_user_id_foreign` (`user_id`),
  ADD KEY `borrowed_books_book_id_foreign` (`book_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
