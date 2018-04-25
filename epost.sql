-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2018 at 08:41 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epost`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE IF NOT EXISTS `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'system', 'users,roles,permissionts', NULL, NULL),
(2, 'type', 'types', NULL, NULL),
(3, 'post', 'posts', NULL, NULL),
(4, 'message', 'messages', NULL, NULL),
(5, 'advertisment', 'advertisments', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_permission_role`
--

DROP TABLE IF EXISTS `admin_permission_role`;
CREATE TABLE IF NOT EXISTS `admin_permission_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permission_role`
--

INSERT INTO `admin_permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(15, 1, 1, NULL, NULL),
(14, 2, 3, NULL, NULL),
(13, 2, 2, NULL, NULL),
(12, 3, 5, NULL, NULL),
(11, 3, 4, NULL, NULL),
(16, 1, 2, NULL, NULL),
(17, 1, 3, NULL, NULL),
(18, 1, 4, NULL, NULL),
(19, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '系统管理员', '对用户角色权限管理', NULL, NULL),
(2, '内容专员', '对栏目和文章管理', NULL, NULL),
(3, '客服人员', '对消息和广告管理', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_user`
--

DROP TABLE IF EXISTS `admin_role_user`;
CREATE TABLE IF NOT EXISTS `admin_role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_user`
--

INSERT INTO `admin_role_user` (`id`, `role_id`, `user_id`) VALUES
(18, 3, 1),
(17, 2, 1),
(16, 1, 1),
(8, 3, 2),
(21, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'tom', '$2y$10$oWJAZghAMe0MhlVx5LbX7uSkWNfgKctp2LeMhsI8Z/mrIyaKn2mXi', '2018-04-07 02:58:03', '2018-04-07 02:58:03'),
(2, 'rose', '$2y$10$e0zPQr/RJmQdE7mf6EDQ7uujhLgkPMMkU949ujMLhlY65ZRqMf5vy', '2018-04-07 03:25:41', '2018-04-07 03:25:41'),
(3, 'peter', '$2y$10$M5.jvq49aBdENYOVZRDdF.vtICPU1PV.wddZy9vdhbGNJcSnt2igK', '2018-04-07 03:25:59', '2018-04-07 03:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(15, 11, 2, NULL, NULL),
(16, 11, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2018_03_28_122548_create_posts_table', 1),
(14, '2018_03_28_223436_create_favorites_table', 1),
(15, '2018_04_02_013022_create_types_table', 1),
(16, '2018_04_07_093746_create_admin_users_table', 2),
(17, '2017_04_09_100358_create_permission_and_roles', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '1',
  `show` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type_id`, `user_id`, `title`, `pic`, `body`, `state`, `show`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Labore sint sapiente voluptates animi veritatis ut.', NULL, 'Accusantium veritatis quis inventore. Libero nihil magni voluptatem nesciunt. Quas sapiente quasi culpa illo aut mollitia quia.', 1, 1, '2018-04-02 02:56:33', '2018-04-06 07:33:38'),
(2, 5, 10, 'Aut saepe ut architecto facere consequatur.', NULL, 'Dolorem quibusdam omnis temporibus cumque. Ad similique rerum sit voluptas vel aut. Est ab sed eius qui. Veritatis natus ea blanditiis aliquam ullam amet quisquam.', 1, 2, '2018-04-02 02:56:33', '2018-04-07 06:32:04'),
(3, 4, 4, 'Earum voluptates ratione qui.', NULL, 'Et odio consectetur earum alias minus. Cum sit accusamus et et. In eum et fugit explicabo sint. Vitae quae eligendi ut eos quae.', 1, 1, '2018-04-02 02:56:33', '2018-04-06 07:33:43'),
(4, 4, 4, 'Et labore voluptatem voluptate rerum in.', NULL, 'Exercitationem et rerum laudantium soluta ut culpa voluptas. Vitae tenetur a consequuntur quia laborum suscipit. Officiis ab sit perspiciatis ut iste. Accusantium qui repellendus consequatur.', 1, 1, '2018-04-02 02:56:33', '2018-04-06 07:26:04'),
(5, 3, 1, 'Repudiandae sed ut reprehenderit voluptatibus est est velit.', NULL, 'Fugit aut sed asperiores laborum eligendi sed incidunt. Id aut corrupti ipsam voluptas. Non laborum quibusdam vel officia. Error deserunt asperiores omnis molestiae consequatur.', 1, 1, '2018-04-02 02:56:33', '2018-04-06 07:26:06'),
(6, 4, 10, 'Minima quo voluptas architecto dolorem ratione reprehenderit aliquam nihil.', NULL, 'Sed quia labore magni velit velit iste. Molestiae sit iusto id et est. Minima fuga natus nam corporis voluptatum.', 1, 1, '2018-04-02 02:56:33', '2018-04-07 01:25:09'),
(7, 5, 3, 'Omnis quisquam excepturi rerum.', NULL, 'Ut sunt exercitationem excepturi quis molestias. Qui dicta sed est quod qui accusamus maxime. Accusantium impedit voluptas sapiente veniam et accusantium ullam.', 1, 1, '2018-04-02 02:56:33', '2018-04-07 01:25:11'),
(8, 5, 9, 'Nulla ut quia aut reprehenderit rerum voluptas.', NULL, 'Est voluptas amet sint asperiores voluptatem. Fuga quo rerum eum eum molestias. Dolorem explicabo tempore at. Non similique iusto at quisquam.', 1, 1, '2018-04-02 02:56:33', '2018-04-07 01:25:13'),
(9, 1, 10, 'Quis corrupti possimus et.', NULL, 'Id quis qui minima commodi sed eum. Deserunt autem accusamus qui. Voluptatum ea voluptatem sint autem ut eaque.', 1, 1, '2018-04-02 02:56:33', '2018-04-07 01:25:14'),
(10, 1, 5, 'Incidunt numquam quidem suscipit aut.', NULL, 'Dolorem modi nihil ipsa. Provident consequatur est consequatur perspiciatis dolor optio nihil est. Ipsam nisi enim enim exercitationem nostrum. Sint quos asperiores iusto.', 1, 1, '2018-04-02 02:56:33', '2018-04-07 01:25:16'),
(11, 1, 11, 'aaaaaa', NULL, 'aaaaaaaaaaaaaaa', 1, 1, '2018-04-06 02:18:28', '2018-04-07 01:25:36'),
(12, 1, 11, 'ddddddddddddd', NULL, 'dddddddddddddddddddd', 0, 1, '2018-04-06 06:48:02', '2018-04-07 01:25:37'),
(13, 2, 11, 'this is title', '1523236979.jpg', 'this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content this is content', 1, 0, '2018-04-09 01:22:59', '2018-04-09 01:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, '健康'),
(2, '社会'),
(3, '生活'),
(4, '小说'),
(5, '人文');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marvin Lemke', 'jarred.ryan@example.org', '$2y$10$YICkLua67bqsT7NZntR0j.cvFQLatzGQvfChU3l/sHWviLjtjeQRy', 'MbB2yTXbXP', '2018-04-02 02:55:30', '2018-04-02 02:55:30'),
(2, 'Maddison O\'Keefe', 'toy.lavina@example.org', '$2y$10$YICkLua67bqsT7NZntR0j.cvFQLatzGQvfChU3l/sHWviLjtjeQRy', 'nOcabbYcWn', '2018-04-02 02:55:30', '2018-04-02 02:55:30'),
(3, 'Miss Shanny Sipes Sr.', 'considine.lamont@example.org', '$2y$10$YICkLua67bqsT7NZntR0j.cvFQLatzGQvfChU3l/sHWviLjtjeQRy', '7IZCYkzlrE', '2018-04-02 02:55:30', '2018-04-02 02:55:30'),
(4, 'Delaney Davis', 'franz70@example.org', '$2y$10$YICkLua67bqsT7NZntR0j.cvFQLatzGQvfChU3l/sHWviLjtjeQRy', 'lTiGMZblZj', '2018-04-02 02:55:30', '2018-04-02 02:55:30'),
(5, 'Mina Dickinson', 'dare.aubrey@example.com', '$2y$10$YICkLua67bqsT7NZntR0j.cvFQLatzGQvfChU3l/sHWviLjtjeQRy', 'V9wfaO5rDS', '2018-04-02 02:55:30', '2018-04-02 02:55:30'),
(6, 'Vicente Nitzsche', 'udare@example.net', '$2y$10$jgpcogwzxAhLqD8gquFV3OLQBwXgDcCnNeLevwaQeZCA5B0s3Ieyu', 'SWylNPjH3e', '2018-04-02 02:56:33', '2018-04-02 02:56:33'),
(7, 'Mr. Cleve Armstrong', 'williamson.ian@example.com', '$2y$10$jgpcogwzxAhLqD8gquFV3OLQBwXgDcCnNeLevwaQeZCA5B0s3Ieyu', 'Pdqvjtmv6x', '2018-04-02 02:56:33', '2018-04-02 02:56:33'),
(8, 'Dr. Jayde Mosciski', 'cameron.cartwright@example.org', '$2y$10$jgpcogwzxAhLqD8gquFV3OLQBwXgDcCnNeLevwaQeZCA5B0s3Ieyu', 'MnW3h40T6V', '2018-04-02 02:56:33', '2018-04-02 02:56:33'),
(9, 'Caesar Lubowitz', 'ben.little@example.org', '$2y$10$jgpcogwzxAhLqD8gquFV3OLQBwXgDcCnNeLevwaQeZCA5B0s3Ieyu', '1MEsotkIYB', '2018-04-02 02:56:33', '2018-04-02 02:56:33'),
(10, 'Mr. Korey Ryan', 'chester74@example.net', '$2y$10$jgpcogwzxAhLqD8gquFV3OLQBwXgDcCnNeLevwaQeZCA5B0s3Ieyu', 'koFO1wRJgA', '2018-04-02 02:56:33', '2018-04-02 02:56:33'),
(11, 'tom', 'tom@126.com', '$2y$10$JWCROuWaM7EObozwXrNrYe9Tdw3PlYar6VWaq4Edajn4hdyVyDzKe', 'BDV1PmWWZZCDEOBKfegVQJ5nB4DZvXn9Cn2KgvxSoBDTtD64bBQ5mqCx2bKm', '2018-04-02 06:01:24', '2018-04-02 06:01:24'),
(12, 'peter', 'peter@126.com', '$2y$10$TFDzdD26nBDce8sSts0hW.f5b7js6mBEUGj0vsYR4grbwhJrjVFxC', 'WGgkx5NAg4vMyfAUhYBgflcwagVSJ4ps1fk39sCUy6D9kbMi9bUeByWQ242Y', '2018-04-03 01:29:44', '2018-04-03 01:29:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
