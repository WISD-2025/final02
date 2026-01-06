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

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-10440ad6b670f7a1a7055ef36a42241e',	'i:1;',	1767734078),
('laravel-cache-10440ad6b670f7a1a7055ef36a42241e:timer',	'i:1767734078;',	1767734078);

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE `cart_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` bigint(20) unsigned NOT NULL,
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
(7,	'2025_12_24_015039_create_car_items_table',	1),
(8,	'2025_12_24_015223_create_orders_table',	1),
(9,	'2025_12_24_015340_create_order_items_table',	1),
(10,	'2026_01_05_080813_create_products_table',	1),
(11,	'2026_01_05_103914_add_price_to_products_table',	2),
(13,	'2026_01_05_104607_add_introduce_to_products_table',	3),
(14,	'2026_01_06_135446_add_payment_method_to_orders_table',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` int(11) unsigned NOT NULL,
  `payment_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `total`, `payment_method`, `created_at`, `updated_at`) VALUES
(1,	1,	450,	'cash',	'2026-01-06 05:08:16',	'2026-01-06 05:08:16'),
(2,	1,	450,	'cash',	'2026-01-06 05:08:39',	'2026-01-06 05:08:39'),
(3,	1,	450,	'cash',	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(4,	1,	0,	'cash',	'2026-01-06 05:13:04',	'2026-01-06 05:13:04'),
(5,	1,	200,	'cash',	'2026-01-06 05:50:15',	'2026-01-06 05:50:15'),
(6,	1,	100,	'cash',	'2026-01-06 06:10:09',	'2026-01-06 06:10:09'),
(7,	1,	100,	'cash',	'2026-01-06 06:10:23',	'2026-01-06 06:10:23'),
(8,	1,	50,	'cash',	'2026-01-06 06:13:48',	'2026-01-06 06:13:48'),
(9,	1,	50,	'cash',	'2026-01-06 06:16:06',	'2026-01-06 06:16:06'),
(10,	1,	50,	'cash',	'2026-01-06 06:17:39',	'2026-01-06 06:17:39'),
(11,	1,	50,	'cash',	'2026-01-06 06:21:10',	'2026-01-06 06:21:10'),
(12,	1,	50,	'cash',	'2026-01-06 06:28:46',	'2026-01-06 06:28:46'),
(13,	1,	50,	'cash',	'2026-01-06 06:31:25',	'2026-01-06 06:31:25'),
(14,	1,	50,	'cash',	'2026-01-06 06:40:39',	'2026-01-06 06:40:39'),
(15,	1,	50,	'cash',	'2026-01-06 06:41:07',	'2026-01-06 06:41:07'),
(16,	1,	50,	'cash',	'2026-01-06 06:42:16',	'2026-01-06 06:42:16'),
(17,	1,	50,	'cash',	'2026-01-06 06:44:32',	'2026-01-06 06:44:32'),
(18,	1,	50,	'cash',	'2026-01-06 07:54:38',	'2026-01-06 07:54:38'),
(19,	1,	50,	'cash',	'2026-01-06 07:55:12',	'2026-01-06 07:55:12'),
(20,	1,	500,	'cash',	'2026-01-06 12:36:47',	'2026-01-06 12:36:47'),
(21,	1,	50,	'cash',	'2026-01-06 12:37:11',	'2026-01-06 12:37:11'),
(22,	1,	50,	'cash',	'2026-01-06 12:37:27',	'2026-01-06 12:37:27'),
(23,	1,	1050,	'cash',	'2026-01-06 12:55:14',	'2026-01-06 12:55:14'),
(24,	1,	50,	'cash',	'2026-01-06 12:57:16',	'2026-01-06 12:57:16'),
(25,	1,	450,	'cash',	'2026-01-06 12:58:08',	'2026-01-06 12:58:08');

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2,	3,	1,	2,	50,	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(3,	3,	4,	2,	50,	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(4,	3,	1,	1,	50,	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(5,	3,	2,	3,	50,	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(6,	3,	2,	1,	50,	'2026-01-06 05:10:36',	'2026-01-06 05:10:36'),
(7,	5,	1,	2,	50,	'2026-01-06 05:50:15',	'2026-01-06 05:50:15'),
(8,	5,	12,	1,	100,	'2026-01-06 05:50:15',	'2026-01-06 05:50:15'),
(9,	6,	12,	1,	100,	'2026-01-06 06:10:09',	'2026-01-06 06:10:09'),
(10,	8,	4,	1,	50,	'2026-01-06 06:13:48',	'2026-01-06 06:13:48'),
(11,	10,	4,	1,	50,	'2026-01-06 06:17:39',	'2026-01-06 06:17:39'),
(12,	14,	4,	1,	50,	'2026-01-06 06:40:39',	'2026-01-06 06:40:39'),
(13,	15,	5,	1,	50,	'2026-01-06 06:41:07',	'2026-01-06 06:41:07'),
(14,	16,	1,	1,	50,	'2026-01-06 06:42:16',	'2026-01-06 06:42:16'),
(15,	17,	1,	1,	50,	'2026-01-06 06:44:32',	'2026-01-06 06:44:32'),
(16,	18,	4,	1,	50,	'2026-01-06 07:54:38',	'2026-01-06 07:54:38'),
(17,	19,	6,	1,	50,	'2026-01-06 07:55:12',	'2026-01-06 07:55:12'),
(18,	20,	4,	10,	50,	'2026-01-06 12:36:47',	'2026-01-06 12:36:47'),
(19,	21,	3,	1,	50,	'2026-01-06 12:37:11',	'2026-01-06 12:37:11'),
(20,	22,	5,	1,	50,	'2026-01-06 12:37:27',	'2026-01-06 12:37:27'),
(21,	23,	1,	1,	50,	'2026-01-06 12:55:14',	'2026-01-06 12:55:14'),
(22,	23,	7,	10,	100,	'2026-01-06 12:55:14',	'2026-01-06 12:55:14'),
(23,	24,	3,	1,	50,	'2026-01-06 12:57:16',	'2026-01-06 12:57:16'),
(24,	25,	3,	9,	50,	'2026-01-06 12:58:08',	'2026-01-06 12:58:08');

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
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('甜','鹹') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `price`, `introduce`, `description`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1,	'巧克力可頌🍫',	50,	'嚴選可可製作內餡，濃郁香氣層層堆疊，入口微苦不甜膩，適合巧克力愛好者。',	'濃郁巧克力內餡，香甜不膩',	'images/products/chocolate.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(2,	'草莓可頌🍓',	50,	'新鮮草莓風味內餡，酸甜比例恰到好處，口感清爽，帶來春日般的輕盈享受。',	'新鮮草莓風味，酸甜可口',	'images/products/strawberry.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(3,	'抹茶可頌🍵',	50,	'使用日式抹茶粉製成，茶香濃而不澀，尾韻回甘，適合喜愛抹茶風味的饕客。',	'日式抹茶香氣，回甘順口',	'images/products/matcha.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(4,	'芋頭可頌🍠',	50,	'綿密芋頭內餡，口感細緻滑順香氣溫潤，是經典台式甜點代表。',	'綿密芋頭餡，台式經典',	'images/products/taro.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(5,	'紅豆可頌🫘',	50,	'傳統紅豆內餡，甜度適中不膩口，每一口都充滿熟悉的懷舊滋味。',	'傳統紅豆餡，甜而不膩',	'images/products/redbean.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(6,	'綠豆可頌🌱',	50,	'清爽綠豆沙內餡，細膩順口，適合喜歡清淡甜點的消費者。',	'清爽綠豆餡，口感細緻',	'images/products/greanbean.jpg',	'甜',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(7,	'豬肉可頌🐷',	100,	'嚴選豬肉製成鹹香內餡，風味紮實，鹹中帶香，滿足感十足。',	'香煎豬肉，鹹香滿足',	'images/products/pork.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(8,	'雞肉可頌🍗',	100,	'嫩煎雞肉搭配清爽調味，口感不油膩，適合日常輕食。',	'嫩煎雞肉，清爽不油',	'images/products/chicken.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(9,	'牛肉可頌🥩',	100,	'厚切牛肉內餡，肉汁豐富，香氣濃厚，是肉食系首選。',	'厚切牛肉，濃郁多汁',	'images/products/beef.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(10,	'鮪魚可頌🐟',	100,	'經典鮪魚沙拉內餡，清爽不膩適合早餐或下午輕食享用。',	'經典鮪魚沙拉',	'images/products/tuna.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(11,	'薯餅可頌🥔',	100,	'外酥內軟的薯餅搭配可頌層次，口感豐富，人氣必點品項。',	'酥脆薯餅，人氣首選',	'images/products/hashbrown.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27'),
(12,	'起司蛋可頌🧀',	100,	'濃郁起司搭配滑嫩蛋餡，鹹香順口，早餐時段最佳選擇。',	'起司搭配嫩蛋，香濃滑順',	'images/products/cheese-egg.jpg',	'鹹',	'2026-01-05 00:15:27',	'2026-01-05 00:15:27');

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

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('T3myv2qamtvxEjgr4johxhcu4oMgk4bLKWtYD6m0',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUg4RmprVjZCOW5SSkkyRmRaTkZEb1pzU01YaE04R3RpUTlzNEZOSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0X2l0ZW1zIjtzOjU6InJvdXRlIjtzOjE2OiJjYXJ0X2l0ZW1zLmluZGV4Ijt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',	1767734033);

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
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1,	'結語',	'test@test.com',	NULL,	'$2y$12$PkGbUiGx5SbJmmX3gGRUee.wP56CA6y9Q8o40KABe5j804B5ujaW2',	NULL,	NULL,	NULL,	'S1re74f71R1hWkgDJ3sYeXAoRnOogSxs39SAWKihJikId4yS0ddGHJzoahc0',	'2026-01-05 02:10:14',	'2026-01-06 13:00:17',	0),
(2,	'管理員',	'admin@test.com',	NULL,	'$2y$12$PkGbUiGx5SbJmmX3gGRUee.wP56CA6y9Q8o40KABe5j804B5ujaW2',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1);

-- 2026-01-06 21:41:49
