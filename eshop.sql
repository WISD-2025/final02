-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `car_items`;
CREATE TABLE `car_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'飲料',	NULL,	NULL),
(2,	'零食',	NULL,	NULL),
(3,	'水果',	NULL,	NULL),
(4,	'文具',	NULL,	NULL),
(5,	'3C',	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2025_09_02_075243_add_two_factor_columns_to_users_table',	1),
(5,	'2025_12_24_014553_create_staff_table',	1),
(6,	'2025_12_24_014759_create_categories_table',	1),
(7,	'2025_12_24_014927_create_products_table',	1),
(8,	'2025_12_24_015039_create_car_items_table',	1),
(9,	'2025_12_24_015223_create_orders_table',	1),
(10,	'2025_12_24_015340_create_order_items_table',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	NULL,	NULL),
(2,	1,	NULL,	NULL),
(3,	1,	NULL,	NULL),
(4,	2,	NULL,	NULL),
(5,	2,	NULL,	NULL),
(6,	2,	NULL,	NULL),
(7,	3,	NULL,	NULL),
(8,	3,	NULL,	NULL),
(9,	3,	NULL,	NULL);

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	NULL,	NULL),
(2,	1,	2,	1,	NULL,	NULL),
(3,	1,	3,	1,	NULL,	NULL),
(4,	2,	4,	1,	NULL,	NULL),
(5,	2,	5,	1,	NULL,	NULL),
(6,	2,	6,	1,	NULL,	NULL),
(7,	3,	7,	1,	NULL,	NULL),
(8,	3,	8,	1,	NULL,	NULL),
(9,	3,	9,	1,	NULL,	NULL),
(10,	4,	10,	1,	NULL,	NULL),
(11,	4,	11,	1,	NULL,	NULL),
(12,	4,	12,	1,	NULL,	NULL),
(13,	5,	13,	1,	NULL,	NULL),
(14,	5,	14,	1,	NULL,	NULL),
(15,	5,	15,	1,	NULL,	NULL),
(16,	6,	16,	1,	NULL,	NULL),
(17,	6,	17,	1,	NULL,	NULL),
(18,	6,	18,	1,	NULL,	NULL),
(19,	7,	19,	1,	NULL,	NULL),
(20,	7,	20,	1,	NULL,	NULL),
(21,	7,	21,	1,	NULL,	NULL),
(22,	8,	22,	1,	NULL,	NULL),
(23,	8,	23,	1,	NULL,	NULL),
(24,	8,	24,	1,	NULL,	NULL),
(25,	9,	25,	1,	NULL,	NULL),
(26,	9,	1,	1,	NULL,	NULL),
(27,	9,	2,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `created_at`, `updated_at`) VALUES
(1,	'飲料A',	1,	30,	NULL,	NULL),
(2,	'飲料B',	1,	35,	NULL,	NULL),
(3,	'飲料C',	1,	40,	NULL,	NULL),
(4,	'飲料D',	1,	25,	NULL,	NULL),
(5,	'飲料E',	1,	45,	NULL,	NULL),
(6,	'零食A',	2,	50,	NULL,	NULL),
(7,	'零食B',	2,	55,	NULL,	NULL),
(8,	'零食C',	2,	60,	NULL,	NULL),
(9,	'零食D',	2,	45,	NULL,	NULL),
(10,	'零食E',	2,	65,	NULL,	NULL),
(11,	'水果A',	3,	20,	NULL,	NULL),
(12,	'水果B',	3,	25,	NULL,	NULL),
(13,	'水果C',	3,	30,	NULL,	NULL),
(14,	'水果D',	3,	35,	NULL,	NULL),
(15,	'水果E',	3,	40,	NULL,	NULL),
(16,	'文具A',	4,	15,	NULL,	NULL),
(17,	'文具B',	4,	20,	NULL,	NULL),
(18,	'文具C',	4,	25,	NULL,	NULL),
(19,	'文具D',	4,	30,	NULL,	NULL),
(20,	'文具E',	4,	35,	NULL,	NULL),
(21,	'3CA',	5,	500,	NULL,	NULL),
(22,	'3CB',	5,	600,	NULL,	NULL),
(23,	'3CC',	5,	700,	NULL,	NULL),
(24,	'3CD',	5,	800,	NULL,	NULL),
(25,	'3CE',	5,	900,	NULL,	NULL);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'User1',	'user1@test.com',	NULL,	'123456',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	'User2',	'user2@test.com',	NULL,	'123456',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	'User3',	'user3@test.com',	NULL,	'123456',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

-- 2025-12-24 03:31:23
