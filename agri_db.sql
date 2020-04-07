-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for agri_db
CREATE DATABASE IF NOT EXISTS `agri_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `agri_db`;

-- Dumping structure for table agri_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_number` int(11) NOT NULL,
  `culture_number` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.categories: ~12 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `option_number`, `culture_number`, `image`) VALUES
	(1, '2019-10-14 01:29:25', '2019-10-14 01:29:26', 'messages.greenhouses', 2, 2, 'sera.png'),
	(2, '2019-11-09 13:15:52', '2019-11-09 13:15:53', 'messages.assaf_sheep', 1, 5, 'delequmshti.png'),
	(3, '2019-11-09 13:17:02', '2019-11-09 13:17:03', 'messages.alpine_goats', 1, 5, 'dhialpine.png'),
	(4, '2019-11-09 13:17:47', '2019-11-09 13:17:47', 'messages.cows', 1, 4, 'lope.png'),
	(5, '2019-11-09 13:18:06', '2019-11-09 13:18:06', 'messages.grazing_goats', 1, 3, 'dhiregjimkullusor.png'),
	(6, '2019-11-09 13:19:35', '2019-11-09 13:19:36', 'messages.grazing_sheep', 1, 3, 'deleregjimkullusor.png'),
	(7, '2019-11-26 05:52:35', '2019-11-26 05:52:36', 'messages.corn_and_sunflowers', 1, 2, 'miser.png'),
	(8, '2019-11-26 06:09:20', '2019-11-26 06:09:21', 'messages.hazelnuts', 1, 2, 'lajthi.png'),
	(9, '2019-11-26 06:26:16', '2019-11-26 06:26:17', 'messages.apples', 1, 2, 'molle.png'),
	(10, '2019-11-26 06:41:15', '2019-11-26 06:41:15', 'messages.cherries', 1, 2, 'qershi.png'),
	(11, '2019-11-26 06:48:54', '2019-11-26 06:48:55', 'messages.grapes', 1, 2, 'rrush.png'),
	(12, '2020-04-01 20:55:23', '2020-04-01 20:55:26', 'messages.open_field', 1, 2, 'fushe.png');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table agri_db.cultures
CREATE TABLE IF NOT EXISTS `cultures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cultures_category_id_foreign` (`category_id`),
  CONSTRAINT `cultures_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.cultures: ~34 rows (approximately)
DELETE FROM `cultures`;
/*!40000 ALTER TABLE `cultures` DISABLE KEYS */;
INSERT INTO `cultures` (`id`, `created_at`, `updated_at`, `name`, `category_id`) VALUES
	(1, '2019-10-14 01:29:11', '2019-10-14 01:29:23', 'cultures.tomatoe_1', 1),
	(2, '2019-10-14 01:29:12', '2019-10-14 01:29:22', 'cultures.tomatoe_2', 1),
	(3, '2019-10-14 01:29:12', '2019-10-14 01:29:22', 'cultures.cucumber_1', 1),
	(4, '2019-10-14 01:29:13', '2019-10-14 01:29:21', 'cultures.cucumber_2', 1),
	(6, '2019-10-14 01:29:13', '2019-10-14 01:29:21', 'cultures.pumpkin_1', 1),
	(7, '2019-10-14 01:29:15', '2019-10-14 01:29:19', 'cultures.eggplant_1', 1),
	(8, '2019-10-14 01:29:14', '2019-10-14 01:29:19', 'cultures.pepper_1_year', 1),
	(9, '2019-10-14 01:29:15', '2019-10-14 01:29:18', 'cultures.eggplant_1_year', 1),
	(11, '2019-10-14 01:29:16', '2019-10-14 01:29:18', 'cultures.pumpkin_1_year', 1),
	(12, '2019-10-14 01:29:17', '2019-10-14 01:29:17', 'cultures.pepper_2', 1),
	(14, '2019-11-16 02:52:19', '2019-11-16 02:52:22', 'cultures.milk', 2),
	(15, '2019-11-16 02:52:43', '2019-11-16 02:52:44', 'cultures.lamb_for_meat', 2),
	(18, '2019-11-16 02:53:21', '2019-11-16 02:53:22', 'cultures.female_lambs', 2),
	(19, '2019-11-16 02:53:41', '2019-11-16 02:53:41', 'cultures.organic_fertilizer', 2),
	(20, '2019-11-25 21:59:03', '2019-11-25 21:59:03', 'cultures.milk', 6),
	(21, '2019-11-25 21:59:27', '2019-11-25 21:59:28', 'cultures.lamb_for_meat', 6),
	(25, '2019-11-25 22:24:28', '2019-11-25 22:24:29', 'cultures.milk', 3),
	(26, '2019-11-25 22:25:01', '2019-11-25 22:25:02', 'cultures.kid_for_meat', 3),
	(28, '2019-11-25 22:25:21', '2019-11-25 22:25:22', 'cultures.female_kid', 3),
	(29, '2019-11-25 22:25:53', '2019-11-25 22:25:54', 'cultures.organic_fertilizer', 3),
	(32, '2019-11-26 03:41:40', '2019-11-26 03:41:41', 'cultures.milk', 5),
	(33, '2019-11-26 03:42:10', '2019-11-26 03:42:11', 'cultures.kid_for_meat', 5),
	(35, '2019-11-26 05:16:42', '2019-11-26 05:16:42', 'cultures.milk', 4),
	(36, '2019-11-26 05:17:07', '2019-11-26 05:17:08', 'cultures.cattle_for_meat', 4),
	(37, '2019-11-26 05:17:20', '2019-11-26 05:17:21', 'cultures.organic_fertilizer', 4),
	(39, '2019-11-26 05:53:57', '2019-11-26 05:53:58', 'cultures.sunflower', 7),
	(40, '2019-11-26 05:54:14', '2019-11-26 05:54:15', 'cultures.corn', 7),
	(41, '2019-11-26 06:10:22', '2019-11-26 06:10:22', 'cultures.hazelnut', 8),
	(42, '2019-11-26 06:27:49', '2019-11-26 06:27:50', 'cultures.apples', 9),
	(43, '2019-11-26 06:42:24', '2019-11-26 06:42:25', 'cultures.cherries', 10),
	(44, '2019-11-26 06:55:37', '2019-11-26 06:55:37', 'cultures.grapes', 11),
	(45, '2020-04-01 21:00:13', '2020-04-01 21:00:14', 'cultures.melon', 12),
	(46, '2020-04-01 21:00:32', '2020-04-01 21:00:34', 'cultures.watermelon', 12),
	(47, '2020-04-01 21:00:49', '2020-04-01 21:00:50', 'cultures.cabbage', 12);
/*!40000 ALTER TABLE `cultures` ENABLE KEYS */;

-- Dumping structure for table agri_db.labels
CREATE TABLE IF NOT EXISTS `labels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `type` int(11) NOT NULL,
  `amortization` int(11) NOT NULL DEFAULT '0',
  `extra_data` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `labels_category_id_foreign` (`category_id`),
  CONSTRAINT `labels_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.labels: ~116 rows (approximately)
DELETE FROM `labels`;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` (`id`, `created_at`, `updated_at`, `value`, `order`, `category_id`, `type`, `amortization`, `extra_data`) VALUES
	(1, '2019-10-23 22:40:48', '2019-10-23 22:40:49', 'investment_plan.new_greenhouse', 1, 1, 0, 20, 1),
	(2, '2019-10-23 22:41:53', '2019-10-23 22:41:53', 'investment_plan.plastic_change', 2, 1, 0, 5, 0),
	(4, '2019-10-23 22:42:06', '2019-10-23 22:42:07', 'investment_plan.drip_irrigation', 3, 1, 0, 10, 0),
	(6, '2019-10-23 22:49:23', '2019-10-23 22:49:24', 'investment_plan.agricultural_inputs', 4, 1, 0, 0, 0),
	(7, '2019-10-23 22:49:54', '2019-10-23 22:49:55', 'investment_plan.other', 5, 1, 0, 0, 0),
	(8, '2019-10-23 22:51:22', '2019-10-23 22:51:22', 'business_data.surface', 1, 1, 1, 0, 0),
	(10, '2019-10-23 22:51:37', '2019-10-23 22:51:38', 'business_data.technology', 2, 1, 1, 0, 0),
	(11, '2019-10-23 22:51:56', '2019-10-23 22:51:57', 'business_data.culture_1', 3, 1, 1, 0, 0),
	(12, '2019-10-23 22:52:14', '2019-10-23 22:52:15', 'business_data.culture_2', 4, 1, 1, 0, 0),
	(13, '2019-11-16 03:03:40', '2019-11-16 03:03:40', 'investment_plan.stable_construction', 1, 2, 0, 20, 0),
	(14, '2019-11-16 03:04:27', '2019-11-16 03:04:28', 'investment_plan.stable_reconstruction', 2, 2, 0, 20, 0),
	(15, '2019-11-16 03:04:55', '2019-11-16 03:04:56', 'investment_plan.buying_sheep', 3, 2, 0, 0, 1),
	(17, '2019-11-16 03:05:35', '2019-11-16 03:05:36', 'investment_plan.food_purchases', 4, 2, 0, 0, 0),
	(18, '2019-11-16 03:06:17', '2019-11-16 03:06:18', 'investment_plan.equipment_purchases', 5, 2, 0, 12, 0),
	(19, '2019-11-16 03:07:15', '2019-11-16 03:07:16', 'business_data.headcount', 1, 2, 1, 0, 0),
	(20, '2019-11-16 03:08:28', '2019-11-16 03:08:29', 'business_data.technology', 2, 2, 1, 0, 0),
	(21, '2019-11-16 03:09:00', '2019-11-16 03:09:00', 'business_data.subproduct_1', 3, 2, 1, 0, 0),
	(22, '2019-11-16 03:09:20', '2019-11-16 03:09:20', 'business_data.subproduct_2', 4, 2, 1, 0, 0),
	(23, '2019-11-16 03:09:20', '2019-11-16 03:09:20', 'business_data.subproduct_3', 5, 2, 1, 0, 0),
	(24, '2019-11-16 03:09:20', '2019-11-16 03:09:20', 'business_data.subproduct_4', 6, 2, 1, 0, 0),
	(25, '2019-11-16 03:09:20', '2019-11-16 03:09:20', 'business_data.subproduct_5', 7, 2, 1, 0, 0),
	(26, '2019-11-25 22:01:29', '2019-11-25 22:01:30', 'investment_plan.stable_construction', 1, 6, 0, 20, 0),
	(27, '2019-11-25 22:02:26', '2019-11-25 22:02:27', 'investment_plan.stable_reconstruction', 2, 6, 0, 20, 0),
	(28, '2019-11-25 22:04:59', '2019-11-25 22:04:59', 'investment_plan.buying_country_sheep', 3, 6, 0, 0, 1),
	(30, '2019-11-25 22:05:40', '2019-11-25 22:05:40', 'investment_plan.food_purchases', 4, 6, 0, 0, 0),
	(31, '2019-11-25 22:06:19', '2019-11-25 22:06:19', 'investment_plan.equipment_purchases', 5, 6, 0, 12, 0),
	(32, '2019-11-25 22:07:06', '2019-11-25 22:07:15', 'business_data.headcount', 1, 6, 1, 0, 0),
	(33, '2019-11-25 22:07:38', '2019-11-25 22:07:38', 'business_data.technology', 2, 6, 1, 0, 0),
	(34, '2019-11-25 22:07:56', '2019-11-25 22:07:56', 'business_data.subproduct_1', 3, 6, 1, 0, 0),
	(35, '2019-11-25 22:08:08', '2019-11-25 22:08:08', 'business_data.subproduct_2', 4, 6, 1, 0, 0),
	(36, '2019-11-25 22:08:18', '2019-11-25 22:08:19', 'business_data.subproduct_3', 5, 6, 1, 0, 0),
	(37, '2019-11-25 22:26:17', '2019-11-25 22:26:18', 'investment_plan.stable_construction', 1, 3, 0, 20, 0),
	(38, '2019-11-25 22:27:03', '2019-11-25 22:27:03', 'investment_plan.stable_reconstruction', 2, 3, 0, 20, 0),
	(39, '2019-11-25 22:29:05', '2019-11-25 22:29:06', 'investment_plan.buying_alpine_goats', 3, 3, 0, 0, 1),
	(40, '2019-11-25 22:29:22', '2019-11-25 22:29:23', 'investment_plan.food_purchases', 4, 3, 0, 0, 0),
	(41, '2019-11-25 22:29:48', '2019-11-25 22:29:49', 'investment_plan.equipment_purchases', 5, 3, 0, 12, 0),
	(42, '2019-11-25 22:30:25', '2019-11-25 22:30:26', 'business_data.headcount', 1, 3, 1, 0, 0),
	(43, '2019-11-25 22:30:37', '2019-11-25 22:30:37', 'business_data.technology', 2, 3, 1, 0, 0),
	(44, '2019-11-25 22:30:53', '2019-11-25 22:30:54', 'business_data.subproduct_1', 3, 3, 1, 0, 0),
	(45, '2019-11-25 22:31:21', '2019-11-25 22:31:21', 'business_data.subproduct_2', 4, 3, 1, 0, 0),
	(46, '2019-11-25 22:31:44', '2019-11-25 22:31:44', 'business_data.subproduct_3', 5, 3, 1, 0, 0),
	(47, '2019-11-25 22:31:55', '2019-11-25 22:31:55', 'business_data.subproduct_4', 6, 3, 1, 0, 0),
	(48, '2019-11-25 22:32:10', '2019-11-25 22:32:11', 'business_data.subproduct_5', 7, 3, 1, 0, 0),
	(49, '2019-11-26 03:43:19', '2019-11-26 03:43:20', 'investment_plan.stable_construction', 1, 5, 0, 20, 0),
	(50, '2019-11-26 03:43:47', '2019-11-26 03:43:48', 'investment_plan.stable_reconstruction', 2, 5, 0, 20, 0),
	(51, '2019-11-26 03:45:16', '2019-11-26 03:45:17', 'investment_plan.buying_country_goats', 3, 5, 0, 0, 1),
	(52, '2019-11-26 03:45:35', '2019-11-26 03:45:35', 'investment_plan.food_purchases', 4, 5, 0, 0, 0),
	(53, '2019-11-26 03:45:48', '2019-11-26 03:45:48', 'investment_plan.equipment_purchases', 5, 5, 0, 12, 0),
	(54, '2019-11-26 03:46:14', '2019-11-26 03:46:15', 'business_data.headcount', 1, 5, 1, 0, 0),
	(55, '2019-11-26 03:46:30', '2019-11-26 03:46:30', 'business_data.technology', 2, 5, 1, 0, 0),
	(56, '2019-11-26 03:46:36', '2019-11-26 03:46:36', 'business_data.subproduct_1', 3, 5, 1, 0, 0),
	(57, '2019-11-26 03:47:20', '2019-11-26 03:47:20', 'business_data.subproduct_2', 4, 5, 1, 0, 0),
	(58, '2019-11-26 03:47:31', '2019-11-26 03:47:32', 'business_data.subproduct_3', 5, 5, 1, 0, 0),
	(59, '2019-11-26 05:19:40', '2019-11-26 05:19:41', 'investment_plan.stable_construction', 1, 4, 0, 20, 0),
	(60, '2019-11-26 05:20:06', '2019-11-26 05:20:07', 'investment_plan.stable_reconstruction', 2, 4, 0, 20, 0),
	(61, '2019-11-26 05:20:34', '2019-11-26 05:20:34', 'investment_plan.buying_cows', 3, 4, 0, 0, 1),
	(62, '2019-11-26 05:26:15', '2019-11-26 05:26:15', 'investment_plan.food_purchases', 4, 4, 0, 0, 0),
	(63, '2019-11-26 05:26:28', '2019-11-26 05:26:28', 'investment_plan.equipment_purchases', 5, 4, 0, 12, 0),
	(64, '2019-11-26 05:26:47', '2019-11-26 05:26:48', 'business_data.headcount', 1, 4, 1, 0, 0),
	(65, '2019-11-26 05:27:05', '2019-11-26 05:27:06', 'business_data.technology', 2, 4, 1, 0, 0),
	(66, '2019-11-26 05:27:23', '2019-11-26 05:27:23', 'business_data.subproduct_1', 3, 4, 1, 0, 0),
	(67, '2019-11-26 05:28:44', '2019-11-26 05:28:45', 'business_data.subproduct_2', 4, 4, 1, 0, 0),
	(68, '2019-11-26 05:28:56', '2019-11-26 05:28:56', 'business_data.subproduct_3', 5, 4, 1, 0, 0),
	(69, '2019-11-26 05:29:05', '2019-11-26 05:29:06', 'business_data.subproduct_4', 6, 4, 1, 0, 0),
	(70, '2019-11-26 05:58:41', '2019-11-26 05:58:42', 'investment_plan.agricultural_mechanic', 1, 7, 0, 20, 0),
	(71, '2019-11-26 05:59:34', '2019-11-26 05:59:35', 'investment_plan.well_opening', 2, 7, 0, 15, 0),
	(72, '2019-11-26 06:00:28', '2019-11-26 06:00:28', 'investment_plan.visual_irrigation', 3, 7, 0, 10, 0),
	(73, '2019-11-26 06:00:45', '2019-11-26 06:00:45', 'investment_plan.agricultural_inputs', 4, 7, 0, 0, 0),
	(74, '2019-11-26 06:02:18', '2019-11-26 06:02:19', 'investment_plan.other', 5, 7, 0, 0, 0),
	(75, '2019-11-26 06:02:30', '2019-11-26 06:02:31', 'business_data.surface', 1, 7, 1, 0, 0),
	(76, '2019-11-26 06:02:47', '2019-11-26 06:02:48', 'business_data.technology', 2, 7, 1, 0, 0),
	(77, '2019-11-26 06:03:05', '2019-11-26 06:03:06', 'business_data.culture_1', 3, 7, 1, 0, 0),
	(78, '2019-11-26 06:03:20', '2019-11-26 06:03:21', 'business_data.culture_2', 4, 7, 1, 0, 0),
	(79, '2019-11-26 06:10:46', '2019-11-26 06:10:46', 'investment_plan.new_orchard', 1, 8, 0, 25, 0),
	(80, '2019-11-26 06:13:10', '2019-11-26 06:13:11', 'investment_plan.agricultural_mechanic', 2, 8, 0, 12, 0),
	(81, '2019-11-26 06:15:39', '2019-11-26 06:15:40', 'investment_plan.drip_irrigation', 3, 8, 0, 10, 0),
	(82, '2019-11-26 06:16:13', '2019-11-26 06:16:14', 'investment_plan.agricultural_inputs', 4, 8, 0, 0, 0),
	(83, '2019-11-26 06:16:39', '2019-11-26 06:16:40', 'investment_plan.other', 5, 8, 0, 0, 0),
	(84, '2019-11-26 06:16:56', '2019-11-26 06:16:56', 'business_data.surface', 1, 8, 1, 0, 0),
	(85, '2019-11-26 06:17:11', '2019-11-26 06:17:12', 'business_data.technology', 2, 8, 1, 0, 0),
	(86, '2019-11-26 06:18:21', '2019-11-26 06:18:21', 'business_data.hazelnut_cultivation', 3, 8, 1, 0, 0),
	(87, '2019-11-26 06:18:36', '2019-11-26 06:18:37', 'business_data.other', 4, 8, 1, 0, 0),
	(88, '2019-11-26 06:28:16', '2019-11-26 06:28:17', 'investment_plan.new_orchard', 1, 9, 0, 25, 0),
	(89, '2019-11-26 06:28:48', '2019-11-26 06:28:49', 'investment_plan.anti_hail', 2, 9, 0, 12, 0),
	(90, '2019-11-26 06:35:34', '2019-11-26 06:35:35', 'investment_plan.drip_irrigation', 3, 9, 0, 10, 0),
	(91, '2019-11-26 06:36:04', '2019-11-26 06:36:05', 'investment_plan.agricultural_inputs', 4, 9, 0, 0, 0),
	(92, '2019-11-26 06:36:30', '2019-11-26 06:36:31', 'investment_plan.other', 5, 9, 0, 0, 0),
	(93, '2019-11-26 06:36:42', '2019-11-26 06:36:42', 'business_data.surface', 1, 9, 1, 0, 0),
	(94, '2019-11-26 06:36:56', '2019-11-26 06:36:57', 'business_data.technology', 2, 9, 1, 0, 0),
	(95, '2019-11-26 06:38:17', '2019-11-26 06:38:18', 'business_data.apple_cultivation', 3, 9, 1, 0, 0),
	(96, '2019-11-26 06:38:28', '2019-11-26 06:38:29', 'business_data.other', 4, 9, 1, 0, 0),
	(97, '2019-11-26 06:42:54', '2019-11-26 06:42:54', 'investment_plan.new_orchard', 1, 10, 0, 25, 0),
	(100, '2019-11-26 06:43:12', '2019-11-26 06:43:13', 'investment_plan.anti_hail', 2, 10, 0, 12, 0),
	(101, '2019-11-26 06:43:43', '2019-11-26 06:43:43', 'investment_plan.drip_irrigation', 3, 10, 0, 10, 0),
	(102, '2019-11-26 06:44:09', '2019-11-26 06:44:10', 'investment_plan.agricultural_inputs', 4, 10, 0, 0, 0),
	(103, '2019-11-26 06:44:37', '2019-11-26 06:44:38', 'investment_plan.other', 5, 10, 0, 0, 0),
	(104, '2019-11-26 06:44:50', '2019-11-26 06:44:51', 'business_data.surface', 1, 10, 1, 0, 0),
	(105, '2019-11-26 06:45:00', '2019-11-26 06:45:01', 'business_data.technology', 2, 10, 1, 0, 0),
	(106, '2019-11-26 06:45:10', '2019-11-26 06:45:11', 'business_data.cherry_cultivation', 3, 10, 1, 0, 0),
	(107, '2019-11-26 06:46:05', '2019-11-26 06:46:06', 'business_data.other', 4, 10, 1, 0, 0),
	(108, '2019-11-26 06:52:21', '2019-11-26 06:52:22', 'investment_plan.new_orchard', 1, 11, 0, 25, 0),
	(109, '2019-11-26 06:52:40', '2019-11-26 06:52:41', 'investment_plan.anti_hail', 2, 11, 0, 12, 0),
	(110, '2019-11-26 06:53:10', '2019-11-26 06:53:11', 'investment_plan.drip_irrigation', 3, 11, 0, 10, 0),
	(113, '2019-11-26 06:53:27', '2019-11-26 06:53:28', 'investment_plan.other', 4, 11, 0, 0, 0),
	(114, '2019-11-26 06:53:45', '2019-11-26 06:53:46', 'business_data.surface', 1, 11, 1, 0, 0),
	(115, '2019-11-26 06:54:03', '2019-11-26 06:54:04', 'business_data.technology', 2, 11, 1, 0, 0),
	(116, '2019-11-26 06:54:24', '2019-11-26 06:54:25', 'business_data.grape_cultivation', 3, 11, 1, 0, 0),
	(117, '2019-11-26 06:54:35', '2019-11-26 06:54:36', 'business_data.other', 4, 11, 1, 0, 0),
	(118, '2020-04-01 21:04:24', '2020-04-01 21:04:24', 'investment_plan.agricultural_mechanic', 1, 12, 0, 20, 0),
	(119, '2020-04-01 21:09:48', '2020-04-01 21:09:49', 'investment_plan.mulching_plastic', 2, 12, 0, 1, 0),
	(120, '2020-04-01 21:11:00', '2020-04-01 21:11:00', 'investment_plan.drip_irrigation', 3, 12, 0, 10, 0),
	(123, '2020-04-01 21:12:52', '2020-04-01 21:12:53', 'investment_plan.agricultural_inputs', 4, 12, 0, 0, 0),
	(124, '2020-04-01 21:13:41', '2020-04-01 21:13:42', 'business_data.surface', 1, 12, 1, 0, 0),
	(125, '2020-04-01 21:14:45', '2020-04-01 21:14:46', 'business_data.technology', 2, 12, 1, 0, 0),
	(126, '2020-04-01 21:15:07', '2020-04-01 21:15:12', 'business_data.culture_1', 3, 12, 1, 0, 0),
	(127, '2020-04-01 21:15:30', '2020-04-01 21:15:31', 'business_data.culture_2', 4, 12, 1, 0, 0);
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;

-- Dumping structure for table agri_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.migrations: ~26 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_10_12_170652_create_technologies_table', 2),
	(4, '2019_10_13_202142_create_categories_table', 3),
	(5, '2019_10_13_204442_create_categories_labels', 4),
	(6, '2019_10_13_204857_create_categories_cultures', 5),
	(7, '2019_10_13_205753_create_categories_values', 6),
	(8, '2019_10_13_222410_create_plans_table', 7),
	(9, '2019_10_13_230825_drop_column_category_id_values', 8),
	(10, '2019_10_13_230937_add_column_culture_id_values', 8),
	(11, '2019_10_13_231745_modify_value_columns_values', 9),
	(12, '2019_10_23_204444_rename_options_on_labels', 10),
	(13, '2019_10_23_205529_create_column_option_number_on_categories', 11),
	(14, '2019_10_23_212459_create_column_label_category', 12),
	(15, '2019_11_06_235156_add_cultures_number_to_categories_table', 13),
	(16, '2019_11_08_213547_add_constants_label_table', 14),
	(18, '2019_11_16_153724_add_category_image', 15),
	(19, '2019_11_27_224454_create_roles_table', 16),
	(20, '2019_11_27_231408_add_foreign_key_of_roles_to_users', 17),
	(21, '2019_12_01_183157_add_soft_delete_to_users', 18),
	(22, '2019_12_03_225057_drop_column_category_table_plan', 19),
	(23, '2019_12_03_225831_add_column_applicant_table_plans', 20),
	(24, '2019_12_03_230310_create_plan_category_table', 21),
	(25, '2020_01_15_022740_add_business_code_to_plans_table', 22),
	(26, '2020_02_20_225001_add__multiply_by_production_to_values_table', 23),
	(29, '2020_03_03_230357_create_taxes_table', 24),
	(30, '2020_03_19_001521_add_extra_data_column_to_labels_table', 25);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table agri_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table agri_db.plans
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `applicant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inputs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plans_user_id_foreign` (`user_id`),
  CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.plans: ~5 rows (approximately)
DELETE FROM `plans`;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` (`id`, `created_at`, `updated_at`, `user_id`, `applicant`, `business_code`, `inputs`, `results`) VALUES
	(106, '2020-03-26 00:33:26', '2020-03-26 01:04:55', 21, 'DELJA 1', 'DELJA 1', '[{"applicantName":"DELJA 1","businessCode":"DELJA 1","farmCategory":{"id":2,"created_at":"2019-11-09 13:15:52","updated_at":"2019-11-09 13:15:53","name":"messages.assaf_sheep","option_number":1,"culture_number":5,"image":"delequmshti.png","labels":[{"id":13,"created_at":"2019-11-16 03:03:40","updated_at":"2019-11-16 03:03:40","value":"investment_plan.stable_construction","order":1,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":19,"created_at":"2019-11-16 03:07:15","updated_at":"2019-11-16 03:07:16","value":"business_data.headcount","order":1,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":20,"created_at":"2019-11-16 03:08:28","updated_at":"2019-11-16 03:08:29","value":"business_data.technology","order":2,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":14,"created_at":"2019-11-16 03:04:27","updated_at":"2019-11-16 03:04:28","value":"investment_plan.stable_reconstruction","order":2,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":15,"created_at":"2019-11-16 03:04:55","updated_at":"2019-11-16 03:04:56","value":"investment_plan.buying_sheep","order":3,"category_id":2,"type":0,"amortization":0,"extra_data":1},{"id":21,"created_at":"2019-11-16 03:09:00","updated_at":"2019-11-16 03:09:00","value":"business_data.subproduct_1","order":3,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":17,"created_at":"2019-11-16 03:05:35","updated_at":"2019-11-16 03:05:36","value":"investment_plan.food_purchases","order":4,"category_id":2,"type":0,"amortization":0,"extra_data":0},{"id":22,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_2","order":4,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":18,"created_at":"2019-11-16 03:06:17","updated_at":"2019-11-16 03:06:18","value":"investment_plan.equipment_purchases","order":5,"category_id":2,"type":0,"amortization":12,"extra_data":0},{"id":23,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_3","order":5,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":24,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_4","order":6,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":25,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_5","order":7,"category_id":2,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[1000000,500000,0,0,0,1500000]],"investmentLabels":["investment_plan.stable_construction","investment_plan.stable_reconstruction","investment_plan.buying_sheep","investment_plan.food_purchases","investment_plan.equipment_purchases","messages.total"],"investmentLabelsExtra":[0,0,1,0,0],"totalValuePlans":[[1000000,500000,100000,0,100000,1700000]],"businessData":[[100,3,14,15,18,19,0]],"businessLabels":["business_data.headcount","business_data.technology","business_data.subproduct_1","business_data.subproduct_2","business_data.subproduct_3","business_data.subproduct_4","business_data.subproduct_5"],"loanData":[["1500000","12","5","12","07\\/03\\/2020"],["0",0,0,0,0]],"extraInvestments":[[0]]}]', '{"cultures":[["cultures.milk","messages.assaf_sheep",100,"500.0000000",50000,"100.0000000",50000,5000000,4965000],["cultures.lamb_for_meat","messages.assaf_sheep",100,"0.6500000",65,"6500.0000000",4225,274625,0],["cultures.female_lambs","messages.assaf_sheep",100,"0.6500000",65,"20000.0000000",13000,845000,0],["cultures.organic_fertilizer","messages.assaf_sheep",100,"0.1800000",18,"3000.0000000",540,54000,0]],"totalIncome":6776500,"totalExpense":4965000,"totalAmortization":83333.33333333333,"yearlyInterest":100400.2,"incomeBeforeTax":1627766.4666666668,"incomeTax":122082.485,"totalNetIncome":1505683.9816666667,"moneyFlux":1689417.515,"firstYearCredit":400400.0583282317,"dscr":4.219323848387365}'),
	(107, '2020-03-26 01:15:27', '2020-03-26 01:17:32', 21, 'DELJA 2', 'DELJA 2', '[{"applicantName":"DELJA 2","businessCode":"DELJA 2","farmCategory":{"id":2,"created_at":"2019-11-09 13:15:52","updated_at":"2019-11-09 13:15:53","name":"messages.assaf_sheep","option_number":1,"culture_number":5,"image":"delequmshti.png","labels":[{"id":13,"created_at":"2019-11-16 03:03:40","updated_at":"2019-11-16 03:03:40","value":"investment_plan.stable_construction","order":1,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":19,"created_at":"2019-11-16 03:07:15","updated_at":"2019-11-16 03:07:16","value":"business_data.headcount","order":1,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":20,"created_at":"2019-11-16 03:08:28","updated_at":"2019-11-16 03:08:29","value":"business_data.technology","order":2,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":14,"created_at":"2019-11-16 03:04:27","updated_at":"2019-11-16 03:04:28","value":"investment_plan.stable_reconstruction","order":2,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":15,"created_at":"2019-11-16 03:04:55","updated_at":"2019-11-16 03:04:56","value":"investment_plan.buying_sheep","order":3,"category_id":2,"type":0,"amortization":0,"extra_data":1},{"id":21,"created_at":"2019-11-16 03:09:00","updated_at":"2019-11-16 03:09:00","value":"business_data.subproduct_1","order":3,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":17,"created_at":"2019-11-16 03:05:35","updated_at":"2019-11-16 03:05:36","value":"investment_plan.food_purchases","order":4,"category_id":2,"type":0,"amortization":0,"extra_data":0},{"id":22,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_2","order":4,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":18,"created_at":"2019-11-16 03:06:17","updated_at":"2019-11-16 03:06:18","value":"investment_plan.equipment_purchases","order":5,"category_id":2,"type":0,"amortization":12,"extra_data":0},{"id":23,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_3","order":5,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":24,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_4","order":6,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":25,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_5","order":7,"category_id":2,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[1000000,500000,0,0,0,1500000]],"investmentLabels":["investment_plan.stable_construction","investment_plan.stable_reconstruction","investment_plan.buying_sheep","investment_plan.food_purchases","investment_plan.equipment_purchases","messages.total"],"investmentLabelsExtra":[0,0,1,0,0],"totalValuePlans":[[1000000,500000,100000,0,100000,1700000]],"businessData":[[100,3,14,15,18,19,0]],"businessLabels":["business_data.headcount","business_data.technology","business_data.subproduct_1","business_data.subproduct_2","business_data.subproduct_3","business_data.subproduct_4","business_data.subproduct_5"],"loanData":[["1500000","12","5","12","12\\/03\\/2020"],["0",0,0,0,0]],"extraInvestments":[[0]]}]', '{"cultures":[["cultures.milk","messages.assaf_sheep",100,"500.0000000",50000,"100.0000000",50000,5000000,4965000],["cultures.lamb_for_meat","messages.assaf_sheep",100,"0.6500000",65,"6500.0000000",4225,274625,0],["cultures.female_lambs","messages.assaf_sheep",100,"0.6500000",65,"20000.0000000",13000,845000,0],["cultures.organic_fertilizer","messages.assaf_sheep",100,"0.1800000",18,"3000.0000000",540,54000,0]],"totalIncome":6776500,"totalExpense":4965000,"totalAmortization":83333.33333333333,"yearlyInterest":100400.2,"incomeBeforeTax":1627766.4666666668,"incomeTax":122082.485,"totalNetIncome":1505683.9816666667,"moneyFlux":1689417.515,"firstYearCredit":400400.0583282317,"dscr":4.219323848387365}'),
	(108, '2020-03-26 01:17:38', '2020-03-26 01:20:53', 21, 'DELJA 3', 'DELJA 3', '[{"applicantName":"DELJA 3","businessCode":"DELJA 3","farmCategory":{"id":2,"created_at":"2019-11-09 13:15:52","updated_at":"2019-11-09 13:15:53","name":"messages.assaf_sheep","option_number":1,"culture_number":5,"image":"delequmshti.png","labels":[{"id":13,"created_at":"2019-11-16 03:03:40","updated_at":"2019-11-16 03:03:40","value":"investment_plan.stable_construction","order":1,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":19,"created_at":"2019-11-16 03:07:15","updated_at":"2019-11-16 03:07:16","value":"business_data.headcount","order":1,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":20,"created_at":"2019-11-16 03:08:28","updated_at":"2019-11-16 03:08:29","value":"business_data.technology","order":2,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":14,"created_at":"2019-11-16 03:04:27","updated_at":"2019-11-16 03:04:28","value":"investment_plan.stable_reconstruction","order":2,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":15,"created_at":"2019-11-16 03:04:55","updated_at":"2019-11-16 03:04:56","value":"investment_plan.buying_sheep","order":3,"category_id":2,"type":0,"amortization":0,"extra_data":1},{"id":21,"created_at":"2019-11-16 03:09:00","updated_at":"2019-11-16 03:09:00","value":"business_data.subproduct_1","order":3,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":17,"created_at":"2019-11-16 03:05:35","updated_at":"2019-11-16 03:05:36","value":"investment_plan.food_purchases","order":4,"category_id":2,"type":0,"amortization":0,"extra_data":0},{"id":22,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_2","order":4,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":18,"created_at":"2019-11-16 03:06:17","updated_at":"2019-11-16 03:06:18","value":"investment_plan.equipment_purchases","order":5,"category_id":2,"type":0,"amortization":12,"extra_data":0},{"id":23,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_3","order":5,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":24,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_4","order":6,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":25,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_5","order":7,"category_id":2,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[1000000,500000,0,0,0,1500000]],"investmentLabels":["investment_plan.stable_construction","investment_plan.stable_reconstruction","investment_plan.buying_sheep","investment_plan.food_purchases","investment_plan.equipment_purchases","messages.total"],"investmentLabelsExtra":[0,0,1,0,0],"totalValuePlans":[[1000000,500000,100000,0,100000,1700000]],"businessData":[[100,3,14,15,18,19,0]],"businessLabels":["business_data.headcount","business_data.technology","business_data.subproduct_1","business_data.subproduct_2","business_data.subproduct_3","business_data.subproduct_4","business_data.subproduct_5"],"loanData":[["750000.00","12","5","12","12\\/03\\/2020"],["750000.00","12","5","12","11\\/03\\/2020"]],"extraInvestments":[[0]]}]', '{"cultures":[["cultures.milk","messages.assaf_sheep",100,"500.0000000",50000,"100.0000000",50000,5000000,4965000],["cultures.lamb_for_meat","messages.assaf_sheep",100,"0.6500000",65,"6500.0000000",4225,274625,0],["cultures.female_lambs","messages.assaf_sheep",100,"0.6500000",65,"20000.0000000",13000,845000,0],["cultures.organic_fertilizer","messages.assaf_sheep",100,"0.1800000",18,"3000.0000000",540,54000,0]],"totalIncome":6776500,"totalExpense":4965000,"totalAmortization":83333.33333333333,"yearlyInterest":100400,"incomeBeforeTax":1627766.6666666667,"incomeTax":122082.5,"totalNetIncome":1505684.1666666667,"moneyFlux":1689417.5,"firstYearCredit":400400.0583282317,"dscr":4.219323810924833}'),
	(109, '2020-03-26 01:21:01', '2020-03-26 01:22:06', 21, 'DELJA 4', 'DELJA 4', '[{"applicantName":"DELJA 4","businessCode":"DELJA 4","farmCategory":{"id":2,"created_at":"2019-11-09 13:15:52","updated_at":"2019-11-09 13:15:53","name":"messages.assaf_sheep","option_number":1,"culture_number":5,"image":"delequmshti.png","labels":[{"id":13,"created_at":"2019-11-16 03:03:40","updated_at":"2019-11-16 03:03:40","value":"investment_plan.stable_construction","order":1,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":19,"created_at":"2019-11-16 03:07:15","updated_at":"2019-11-16 03:07:16","value":"business_data.headcount","order":1,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":20,"created_at":"2019-11-16 03:08:28","updated_at":"2019-11-16 03:08:29","value":"business_data.technology","order":2,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":14,"created_at":"2019-11-16 03:04:27","updated_at":"2019-11-16 03:04:28","value":"investment_plan.stable_reconstruction","order":2,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":15,"created_at":"2019-11-16 03:04:55","updated_at":"2019-11-16 03:04:56","value":"investment_plan.buying_sheep","order":3,"category_id":2,"type":0,"amortization":0,"extra_data":1},{"id":21,"created_at":"2019-11-16 03:09:00","updated_at":"2019-11-16 03:09:00","value":"business_data.subproduct_1","order":3,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":17,"created_at":"2019-11-16 03:05:35","updated_at":"2019-11-16 03:05:36","value":"investment_plan.food_purchases","order":4,"category_id":2,"type":0,"amortization":0,"extra_data":0},{"id":22,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_2","order":4,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":18,"created_at":"2019-11-16 03:06:17","updated_at":"2019-11-16 03:06:18","value":"investment_plan.equipment_purchases","order":5,"category_id":2,"type":0,"amortization":12,"extra_data":0},{"id":23,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_3","order":5,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":24,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_4","order":6,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":25,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_5","order":7,"category_id":2,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[1000000,500000,0,0,0,1500000]],"investmentLabels":["investment_plan.stable_construction","investment_plan.stable_reconstruction","investment_plan.buying_sheep","investment_plan.food_purchases","investment_plan.equipment_purchases","messages.total"],"investmentLabelsExtra":[0,0,1,0,0],"totalValuePlans":[[1000000,500000,100000,0,100000,1700000]],"businessData":[[50,3,14,15,18,19,0]],"businessLabels":["business_data.headcount","business_data.technology","business_data.subproduct_1","business_data.subproduct_2","business_data.subproduct_3","business_data.subproduct_4","business_data.subproduct_5"],"loanData":[["1500000","12","5","12","05\\/03\\/2020"],["0",0,0,0,0]],"extraInvestments":[[50]]}]', '{"cultures":[["cultures.milk","messages.assaf_sheep",100,"500.0000000",50000,"100.0000000",50000,5000000,4965000],["cultures.lamb_for_meat","messages.assaf_sheep",100,"0.6500000",65,"6500.0000000",4225,274625,0],["cultures.female_lambs","messages.assaf_sheep",100,"0.6500000",65,"20000.0000000",13000,845000,0],["cultures.organic_fertilizer","messages.assaf_sheep",100,"0.1800000",18,"3000.0000000",540,54000,0]],"totalIncome":6776500,"totalExpense":4965000,"totalAmortization":83333.33333333333,"yearlyInterest":100400.2,"incomeBeforeTax":1627766.4666666668,"incomeTax":122082.485,"totalNetIncome":1505683.9816666667,"moneyFlux":1689417.515,"firstYearCredit":400400.0583282317,"dscr":4.219323848387365}'),
	(110, '2020-03-26 20:58:42', '2020-03-26 21:07:34', 21, 'Final test', 'Final test', '[{"applicantName":"Final test","businessCode":"Final test","farmCategory":{"id":2,"created_at":"2019-11-09 13:15:52","updated_at":"2019-11-09 13:15:53","name":"messages.assaf_sheep","option_number":1,"culture_number":5,"image":"delequmshti.png","labels":[{"id":13,"created_at":"2019-11-16 03:03:40","updated_at":"2019-11-16 03:03:40","value":"investment_plan.stable_construction","order":1,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":19,"created_at":"2019-11-16 03:07:15","updated_at":"2019-11-16 03:07:16","value":"business_data.headcount","order":1,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":20,"created_at":"2019-11-16 03:08:28","updated_at":"2019-11-16 03:08:29","value":"business_data.technology","order":2,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":14,"created_at":"2019-11-16 03:04:27","updated_at":"2019-11-16 03:04:28","value":"investment_plan.stable_reconstruction","order":2,"category_id":2,"type":0,"amortization":20,"extra_data":0},{"id":15,"created_at":"2019-11-16 03:04:55","updated_at":"2019-11-16 03:04:56","value":"investment_plan.buying_sheep","order":3,"category_id":2,"type":0,"amortization":0,"extra_data":1},{"id":21,"created_at":"2019-11-16 03:09:00","updated_at":"2019-11-16 03:09:00","value":"business_data.subproduct_1","order":3,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":17,"created_at":"2019-11-16 03:05:35","updated_at":"2019-11-16 03:05:36","value":"investment_plan.food_purchases","order":4,"category_id":2,"type":0,"amortization":0,"extra_data":0},{"id":22,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_2","order":4,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":18,"created_at":"2019-11-16 03:06:17","updated_at":"2019-11-16 03:06:18","value":"investment_plan.equipment_purchases","order":5,"category_id":2,"type":0,"amortization":12,"extra_data":0},{"id":23,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_3","order":5,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":24,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_4","order":6,"category_id":2,"type":1,"amortization":0,"extra_data":0},{"id":25,"created_at":"2019-11-16 03:09:20","updated_at":"2019-11-16 03:09:20","value":"business_data.subproduct_5","order":7,"category_id":2,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[1000000,500000,0,0,0,1500000]],"investmentLabels":["investment_plan.stable_construction","investment_plan.stable_reconstruction","investment_plan.buying_sheep","investment_plan.food_purchases","investment_plan.equipment_purchases","messages.total"],"investmentLabelsExtra":[0,0,1,0,0],"totalValuePlans":[[1000000,500000,100000,0,100000,1700000]],"businessData":[[100,2,14,15,18,19,0]],"businessLabels":["business_data.headcount","business_data.technology","business_data.subproduct_1","business_data.subproduct_2","business_data.subproduct_3","business_data.subproduct_4","business_data.subproduct_5"],"loanData":[["3000000.00","12","5","12","11\\/03\\/2020"],["100000.00","12","5","12","12\\/03\\/2020"]],"extraInvestments":[[30]]},{"applicantName":"Final test","businessCode":"Final test","farmCategory":{"id":1,"created_at":"2019-10-14 01:29:25","updated_at":"2019-10-14 01:29:26","name":"messages.greenhouses","option_number":2,"culture_number":2,"image":"sera.png","labels":[{"id":1,"created_at":"2019-10-23 22:40:48","updated_at":"2019-10-23 22:40:49","value":"investment_plan.new_greenhouse","order":1,"category_id":1,"type":0,"amortization":20,"extra_data":1},{"id":8,"created_at":"2019-10-23 22:51:22","updated_at":"2019-10-23 22:51:22","value":"business_data.surface","order":1,"category_id":1,"type":1,"amortization":0,"extra_data":0},{"id":2,"created_at":"2019-10-23 22:41:53","updated_at":"2019-10-23 22:41:53","value":"investment_plan.plastic_change","order":2,"category_id":1,"type":0,"amortization":5,"extra_data":0},{"id":10,"created_at":"2019-10-23 22:51:37","updated_at":"2019-10-23 22:51:38","value":"business_data.technology","order":2,"category_id":1,"type":1,"amortization":0,"extra_data":0},{"id":4,"created_at":"2019-10-23 22:42:06","updated_at":"2019-10-23 22:42:07","value":"investment_plan.drip_irrigation","order":3,"category_id":1,"type":0,"amortization":10,"extra_data":0},{"id":11,"created_at":"2019-10-23 22:51:56","updated_at":"2019-10-23 22:51:57","value":"business_data.culture_1","order":3,"category_id":1,"type":1,"amortization":0,"extra_data":0},{"id":6,"created_at":"2019-10-23 22:49:23","updated_at":"2019-10-23 22:49:24","value":"investment_plan.agricultural_inputs","order":4,"category_id":1,"type":0,"amortization":0,"extra_data":0},{"id":12,"created_at":"2019-10-23 22:52:14","updated_at":"2019-10-23 22:52:15","value":"business_data.culture_2","order":4,"category_id":1,"type":1,"amortization":0,"extra_data":0},{"id":7,"created_at":"2019-10-23 22:49:54","updated_at":"2019-10-23 22:49:55","value":"investment_plan.other","order":5,"category_id":1,"type":0,"amortization":0,"extra_data":0}]},"investmentPlans":[[500000,200000,0,0,0,700000],[500000,100000,300000,0,0,900000]],"investmentLabels":["investment_plan.new_greenhouse","investment_plan.plastic_change","investment_plan.drip_irrigation","investment_plan.agricultural_inputs","investment_plan.other","messages.total"],"investmentLabelsExtra":[1,0,0,0,0],"totalValuePlans":[[1000000,400000,0,0,0,1400000],[1000000,200000,400000,0,0,1600000]],"businessData":[[8,3,1,2],[7,2,8,2]],"businessLabels":["business_data.surface","business_data.technology","business_data.culture_1","business_data.culture_2"],"loanData":[["3000000.00","12","5","12","11\\/03\\/2020"],["100000.00","12","5","12","12\\/03\\/2020"]],"extraInvestments":[[3],[7]]}]', '{"cultures":[["cultures.milk","messages.assaf_sheep",130,"400.0000000",52000,"100.0000000",40000,5200000,5184400],["cultures.lamb_for_meat","messages.assaf_sheep",130,"0.6000000",78,"6000.0000000",3600,280800,0],["cultures.female_lambs","messages.assaf_sheep",130,"0.6000000",78,"20000.0000000",12000,936000,0],["cultures.organic_fertilizer","messages.assaf_sheep",130,"0.1400000",18.200000000000003,"3000.0000000",420.00000000000006,54600.00000000001,0],["cultures.tomatoe_1","messages.greenhouses",11,"10000.0000000",110000,"43.0000000",430000,4730000,2838000],["cultures.tomatoe_2","messages.greenhouses",11,"8000.0000000",88000,"46.0000000",368000,4048000,2129600],["cultures.pepper_1_year","messages.greenhouses",14,"9000.0000000",126000,"68.0000000",612000,8568000,5292000],["cultures.tomatoe_2","messages.greenhouses",14,"8000.0000000",112000,"46.0000000",368000,5152000,2632000]],"totalIncome":29780600,"totalExpense":18076000,"totalAmortization":343333.3333333333,"yearlyInterest":207493.4,"incomeBeforeTax":11153773.266666666,"incomeTax":1673065.9899999998,"totalNetIncome":9480707.276666665,"moneyFlux":10031534.01,"firstYearCredit":827493.4538783454,"dscr":12.122795610023996}'),
	(111, '2020-04-01 22:02:53', '2020-04-01 22:05:30', 21, 'Ferme e hapur', 'Ferme e hapur', '[{"applicantName":"Ferme e hapur","businessCode":"Ferme e hapur","farmCategory":{"id":12,"created_at":"2020-04-01 20:55:23","updated_at":"2020-04-01 20:55:26","name":"messages.open_field","option_number":1,"culture_number":2,"image":"fushe.png","labels":[{"id":118,"created_at":"2020-04-01 21:04:24","updated_at":"2020-04-01 21:04:24","value":"investment_plan.agricultural_mechanic","order":1,"category_id":12,"type":0,"amortization":20,"extra_data":0},{"id":124,"created_at":"2020-04-01 21:13:41","updated_at":"2020-04-01 21:13:42","value":"business_data.surface","order":1,"category_id":12,"type":1,"amortization":0,"extra_data":0},{"id":119,"created_at":"2020-04-01 21:09:48","updated_at":"2020-04-01 21:09:49","value":"investment_plan.mulching_plastic","order":2,"category_id":12,"type":0,"amortization":1,"extra_data":0},{"id":125,"created_at":"2020-04-01 21:14:45","updated_at":"2020-04-01 21:14:46","value":"business_data.technology","order":2,"category_id":12,"type":1,"amortization":0,"extra_data":0},{"id":120,"created_at":"2020-04-01 21:11:00","updated_at":"2020-04-01 21:11:00","value":"investment_plan.drip_irrigation","order":3,"category_id":12,"type":0,"amortization":10,"extra_data":0},{"id":126,"created_at":"2020-04-01 21:15:07","updated_at":"2020-04-01 21:15:12","value":"business_data.culture_1","order":3,"category_id":12,"type":1,"amortization":0,"extra_data":0},{"id":123,"created_at":"2020-04-01 21:12:52","updated_at":"2020-04-01 21:12:53","value":"investment_plan.agricultural_inputs","order":4,"category_id":12,"type":0,"amortization":0,"extra_data":0},{"id":127,"created_at":"2020-04-01 21:15:30","updated_at":"2020-04-01 21:15:31","value":"business_data.culture_2","order":4,"category_id":12,"type":1,"amortization":0,"extra_data":0}]},"investmentPlans":[[2000000,500000,100000,200000,2800000]],"investmentLabels":["investment_plan.agricultural_mechanic","investment_plan.mulching_plastic","investment_plan.drip_irrigation","investment_plan.agricultural_inputs","messages.total"],"investmentLabelsExtra":[0,0,0,0],"totalValuePlans":[[2000000,500000,100000,200000,2800000]],"businessData":[[20,1,45,47]],"businessLabels":["business_data.surface","business_data.technology","business_data.culture_1","business_data.culture_2"],"loanData":[["2800000","12","5","12","02\\/04\\/2020"],["0",0,0,0,0]],"extraInvestments":[[0]]}]', '{"cultures":[["cultures.melon","messages.open_field",20,"2500.0000000",50000,"37.0000000",92500,1850000,1350000],["cultures.cabbage","messages.open_field",20,"5500.0000000",110000,"15.0000000",82500,1650000,1100000]],"totalIncome":3500000,"totalExpense":2450000,"totalAmortization":610000,"yearlyInterest":187413.6,"incomeBeforeTax":252586.4,"incomeTax":0,"totalNetIncome":252586.4,"moneyFlux":1050000,"firstYearCredit":747413.4422126993,"dscr":1.4048449501945008}');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;

-- Dumping structure for table agri_db.plan_category
CREATE TABLE IF NOT EXISTS `plan_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_category_plan_id_foreign` (`plan_id`),
  KEY `plan_category_category_id_foreign` (`category_id`),
  CONSTRAINT `plan_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `plan_category_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.plan_category: ~6 rows (approximately)
DELETE FROM `plan_category`;
/*!40000 ALTER TABLE `plan_category` DISABLE KEYS */;
INSERT INTO `plan_category` (`id`, `plan_id`, `category_id`) VALUES
	(77, 106, 2),
	(78, 107, 2),
	(79, 108, 2),
	(80, 109, 2),
	(81, 110, 2),
	(82, 110, 1),
	(83, 111, 12);
/*!40000 ALTER TABLE `plan_category` ENABLE KEYS */;

-- Dumping structure for table agri_db.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `name`) VALUES
	(1, '2019-11-28 00:19:05', '2019-11-28 00:19:06', 'messages.admin_user'),
	(2, '2019-11-28 00:19:43', '2019-11-28 00:19:43', 'messages.basic_user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table agri_db.taxes
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_threshold` decimal(16,2) NOT NULL,
  `top_threshold` decimal(16,2) DEFAULT NULL,
  `percentage` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.taxes: ~4 rows (approximately)
DELETE FROM `taxes`;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
INSERT INTO `taxes` (`id`, `created_at`, `updated_at`, `name`, `bottom_threshold`, `top_threshold`, `percentage`) VALUES
	(5, '2020-03-04 01:19:22', '2020-03-10 23:00:28', 'Tatimi i larte', 14000000.00, NULL, 15.0000),
	(6, '2020-03-07 20:54:20', '2020-03-07 20:54:20', 'Tatimi i ulet', 0.00, 5000000.00, 0.0000),
	(7, '2020-03-07 20:55:12', '2020-03-07 20:55:12', 'Tatimi i mesem', 5000000.00, 14000000.00, 7.5000);
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;

-- Dumping structure for table agri_db.technologies
CREATE TABLE IF NOT EXISTS `technologies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.technologies: ~3 rows (approximately)
DELETE FROM `technologies`;
/*!40000 ALTER TABLE `technologies` DISABLE KEYS */;
INSERT INTO `technologies` (`id`, `created_at`, `updated_at`, `name`) VALUES
	(1, '2019-10-14 01:29:02', '2019-10-14 01:29:05', 'messages.low'),
	(2, '2019-10-14 01:29:03', '2019-10-14 01:29:05', 'messages.medium'),
	(3, '2019-10-14 01:29:04', '2019-10-14 01:29:04', 'messages.high');
/*!40000 ALTER TABLE `technologies` ENABLE KEYS */;

-- Dumping structure for table agri_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.users: ~7 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `deleted_at`) VALUES
	(20, 'Geri', 'geri.avrazi1@gmail.com', NULL, '$2y$10$OBORuE25lOiQTp.qzHy3bu2QjA5OKS14KyqK9s6bRMXTBUBSDVkZu', NULL, '2019-11-29 00:41:09', '2020-01-30 03:14:19', 2, '2020-01-30 03:14:19'),
	(21, 'Geri Avrazi', 'geri.avrazi@gmail.com', NULL, '$2y$10$gJDR.Zis9T4ZHYhMMxT20u6Y8/r7Bn5JSoWEXSlwvSqUtZd6K1V.a', NULL, '2019-11-30 15:15:31', '2020-02-09 20:28:38', 1, NULL),
	(27, 'basic user', 'basicuser@gmail.cdjjr', NULL, '$2y$10$arpdGCD8JuoJJVVJhnYnGufZ7t5/qs4tXlh8j7gk.7D/QLawMXKTu', NULL, '2019-12-16 01:34:20', '2020-01-30 03:13:53', 2, '2020-01-30 03:13:53'),
	(28, 'Geri', 'saracialbi93@gmail.come34', NULL, '$2y$10$WnaG0KAKJG8LwLIVihaSF.MtNOBguCwtIqQJ/HZGhIttGEeee428W', NULL, '2020-01-28 23:50:50', '2020-01-30 03:14:01', 2, '2020-01-30 03:14:01'),
	(29, 'Test', 'test@test.hhh', NULL, '$2y$10$h5DH653J6wcReN5dK4e8MeOnKmBeeg/gQikMbGYhv0f5H0YQDHM3K', NULL, '2020-01-30 03:14:57', '2020-01-30 03:14:57', 2, NULL),
	(30, 'Gerison', 'gerison.avrazi@hhge.red', NULL, '$2y$10$u0bDti2vvLkc.67QulPr5eGLt80ylPaag/duZl8N7KC7odPc5GdWS', NULL, '2020-02-09 20:49:25', '2020-03-26 21:41:23', 2, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table agri_db.values
CREATE TABLE IF NOT EXISTS `values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `technology_id` bigint(20) unsigned NOT NULL,
  `culture_id` bigint(20) unsigned NOT NULL,
  `efficiency` decimal(20,7) NOT NULL,
  `price` decimal(20,7) NOT NULL,
  `cost` decimal(20,7) NOT NULL,
  `multiply_by_production` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `values_technology_id_foreign` (`technology_id`),
  KEY `values_culture_id_foreign` (`culture_id`),
  CONSTRAINT `values_culture_id_foreign` FOREIGN KEY (`culture_id`) REFERENCES `cultures` (`id`) ON DELETE CASCADE,
  CONSTRAINT `values_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table agri_db.values: ~102 rows (approximately)
DELETE FROM `values`;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
INSERT INTO `values` (`id`, `created_at`, `updated_at`, `technology_id`, `culture_id`, `efficiency`, `price`, `cost`, `multiply_by_production`) VALUES
	(3, '2019-10-14 01:28:57', '2019-10-14 01:28:57', 1, 1, 8500.0000000, 40.0000000, 25.0000000, 0),
	(4, '2019-10-14 01:28:56', '2019-10-14 01:28:58', 1, 2, 6500.0000000, 45.0000000, 25.0000000, 0),
	(5, '2019-10-14 01:28:56', '2019-10-14 01:28:59', 1, 3, 8500.0000000, 42.0000000, 23.0000000, 0),
	(6, '2019-10-14 01:28:56', '2019-10-14 01:28:54', 1, 4, 6000.0000000, 40.0000000, 23.0000000, 0),
	(7, '2019-10-14 01:28:54', '2019-10-14 01:28:55', 1, 6, 5500.0000000, 45.0000000, 33.6363636, 0),
	(8, '2019-10-14 01:28:52', '2019-10-14 01:28:53', 1, 7, 8000.0000000, 45.0000000, 26.8750000, 0),
	(10, '2019-10-14 01:28:31', '2019-10-14 01:28:31', 1, 8, 8000.0000000, 60.0000000, 45.0000000, 0),
	(11, '2019-10-14 01:30:10', '2019-10-14 01:30:11', 1, 9, 8000.0000000, 55.0000000, 42.0000000, 0),
	(12, '2019-10-14 01:30:18', '2019-10-14 01:30:19', 1, 11, 6000.0000000, 45.0000000, 35.0000000, 0),
	(13, '2019-10-14 01:30:48', '2019-10-14 01:30:49', 1, 12, 4000.0000000, 55.0000000, 33.0000000, 0),
	(14, '2019-10-14 01:33:10', '2019-10-14 01:33:10', 2, 1, 10000.0000000, 43.0000000, 23.5000000, 0),
	(15, '2019-10-14 01:33:13', '2019-10-14 01:33:14', 2, 2, 8000.0000000, 46.0000000, 23.5000000, 0),
	(16, '2019-10-14 01:34:53', '2019-10-14 01:34:52', 2, 3, 10000.0000000, 44.0000000, 21.5000000, 0),
	(18, '2019-10-14 01:34:50', '2019-10-14 01:34:50', 2, 4, 7500.0000000, 43.0000000, 21.5000000, 0),
	(19, '2019-10-14 01:35:01', '2019-10-14 01:35:02', 2, 6, 6500.0000000, 50.0000000, 31.5384615, 0),
	(20, '2019-10-14 01:35:43', '2019-10-14 01:35:44', 2, 7, 9000.0000000, 50.0000000, 25.0000000, 0),
	(21, '2019-10-14 01:36:13', '2019-10-14 01:36:15', 2, 8, 9000.0000000, 68.0000000, 42.0000000, 0),
	(22, '2019-10-14 01:36:43', '2019-10-14 01:36:43', 2, 9, 9000.0000000, 65.0000000, 39.0000000, 0),
	(23, '2019-10-14 01:37:37', '2019-10-14 01:37:38', 2, 11, 7000.0000000, 51.0000000, 32.0000000, 0),
	(24, '2019-10-14 01:37:41', '2019-10-14 01:37:41', 2, 12, 6000.0000000, 60.0000000, 32.3333333, 0),
	(25, '2019-10-14 01:38:26', '2019-10-14 01:38:27', 3, 1, 10000.0000000, 43.0000000, 25.8000000, 0),
	(26, '2019-10-14 01:38:59', '2019-10-14 01:38:58', 3, 2, 8000.0000000, 46.0000000, 24.2000000, 0),
	(27, '2019-10-14 01:39:18', '2019-10-14 01:39:19', 3, 3, 9000.0000000, 44.0000000, 28.1000000, 0),
	(28, '2019-10-14 01:39:44', '2019-10-14 01:39:45', 3, 4, 8000.0000000, 43.0000000, 24.3000000, 0),
	(30, '2019-10-14 01:40:17', '2019-10-14 01:40:18', 3, 6, 8000.0000000, 50.0000000, 27.7500000, 0),
	(35, '2019-10-14 01:40:54', '2019-10-14 01:40:55', 3, 7, 10000.0000000, 50.0000000, 24.1000000, 0),
	(36, '2019-10-14 01:41:27', '2019-10-14 01:41:28', 3, 8, 10000.0000000, 68.0000000, 38.7000000, 0),
	(37, '2019-10-14 01:41:59', '2019-10-14 01:42:00', 3, 9, 10000.0000000, 65.0000000, 34.5000000, 0),
	(38, '2019-10-14 01:42:31', '2019-10-14 01:42:32', 3, 11, 7500.0000000, 51.0000000, 28.7000000, 0),
	(39, '2019-10-14 01:43:01', '2019-10-14 01:43:02', 3, 12, 7000.0000000, 60.0000000, 30.2857143, 0),
	(40, '2019-11-16 02:54:48', '2020-03-26 21:24:17', 1, 14, 300.0000000, 100.0000000, 100.0000000, 0),
	(41, '2019-11-16 02:55:25', '2020-03-26 21:24:18', 1, 15, 0.5000000, 6000.0000000, 0.0000000, 1),
	(42, '2019-11-16 02:56:00', '2020-03-26 21:24:18', 1, 18, 0.5000000, 15000.0000000, 0.0000000, 1),
	(43, '2019-11-16 02:56:58', '2020-03-26 21:24:18', 1, 19, 0.1000000, 3000.0000000, 0.0000000, 0),
	(44, '2019-11-16 02:58:15', '2020-03-26 21:24:17', 2, 14, 400.0000000, 100.0000000, 99.7000000, 0),
	(45, '2019-11-16 02:58:43', '2020-03-26 21:24:18', 2, 15, 0.6000000, 6000.0000000, 0.0000000, 1),
	(46, '2019-11-16 02:59:50', '2020-03-26 21:24:18', 2, 18, 0.6000000, 20000.0000000, 0.0000000, 1),
	(47, '2019-11-16 02:59:56', '2020-03-26 21:24:18', 2, 19, 0.1400000, 3000.0000000, 0.0000000, 0),
	(48, '2019-11-16 03:00:44', '2020-03-26 21:24:18', 3, 14, 500.0000000, 100.0000000, 99.3000000, 0),
	(49, '2019-11-16 03:01:28', '2020-03-26 21:24:18', 3, 15, 0.6500000, 6500.0000000, 0.0000000, 1),
	(50, '2019-11-16 03:01:55', '2020-03-26 21:24:18', 3, 18, 0.6500000, 20000.0000000, 0.0000000, 1),
	(51, '2019-11-16 03:02:31', '2020-03-26 21:24:18', 3, 19, 0.1800000, 3000.0000000, 0.0000000, 0),
	(52, '2019-11-25 22:09:54', '2020-03-08 21:08:14', 1, 20, 60.0000000, 100.0000000, 106.0000000, 0),
	(53, '2019-11-25 22:10:54', '2020-03-08 21:08:14', 1, 21, 0.8000000, 7000.0000000, 0.0000000, 1),
	(55, '2019-11-25 22:13:49', '2020-03-08 21:08:14', 2, 20, 70.0000000, 100.0000000, 106.0000000, 0),
	(56, '2019-11-25 22:14:26', '2020-03-08 21:08:14', 2, 21, 0.9000000, 7000.0000000, 0.0000000, 1),
	(58, '2019-11-25 22:15:28', '2020-03-08 21:08:14', 3, 20, 80.0000000, 100.0000000, 105.0000000, 0),
	(59, '2019-11-25 22:15:48', '2020-03-08 21:08:14', 3, 21, 1.0000000, 7000.0000000, 0.0000000, 1),
	(64, '2019-11-25 22:32:50', '2019-11-25 22:32:51', 1, 25, 400.0000000, 65.0000000, 70.0000000, 0),
	(65, '2019-11-25 22:33:25', '2019-11-25 22:33:25', 1, 26, 0.5000000, 6000.0000000, 0.0000000, 1),
	(66, '2019-11-25 22:33:56', '2019-11-25 22:33:57', 1, 28, 0.5000000, 13000.0000000, 0.0000000, 1),
	(67, '2019-11-25 22:34:26', '2019-11-25 22:34:27', 1, 29, 0.1000000, 3000.0000000, 0.0000000, 0),
	(69, '2019-11-25 22:35:10', '2019-11-25 22:35:11', 2, 25, 600.0000000, 70.0000000, 70.0000000, 0),
	(70, '2019-11-25 22:35:31', '2019-11-25 22:35:31', 2, 26, 0.6000000, 6500.0000000, 0.0000000, 1),
	(71, '2019-11-25 22:35:54', '2019-11-25 22:35:55', 2, 28, 0.6000000, 15000.0000000, 0.0000000, 1),
	(72, '2019-11-25 22:36:30', '2019-11-25 22:36:31', 2, 29, 0.1400000, 3000.0000000, 0.0000000, 0),
	(74, '2019-11-25 22:37:24', '2019-11-25 22:37:25', 3, 25, 700.0000000, 70.0000000, 68.2000000, 0),
	(75, '2019-11-25 22:37:59', '2019-11-25 22:37:59', 3, 26, 0.6000000, 6500.0000000, 0.0000000, 1),
	(76, '2019-11-25 22:38:38', '2019-11-25 22:38:39', 3, 28, 0.6500000, 15000.0000000, 0.0000000, 1),
	(77, '2019-11-25 22:39:08', '2019-11-25 22:39:09', 3, 29, 0.1800000, 3000.0000000, 0.0000000, 0),
	(80, '2019-11-26 03:48:28', '2019-11-26 03:48:29', 1, 32, 100.0000000, 70.0000000, 74.0000000, 0),
	(81, '2019-11-26 03:48:52', '2019-11-26 03:48:53', 1, 33, 0.8000000, 6000.0000000, 0.0000000, 1),
	(83, '2019-11-26 03:49:47', '2019-11-26 03:49:48', 2, 32, 110.0000000, 70.0000000, 72.0000000, 0),
	(84, '2019-11-26 03:50:15', '2019-11-26 03:50:16', 2, 33, 0.9000000, 6000.0000000, 0.0000000, 1),
	(86, '2019-11-26 03:51:00', '2019-11-26 03:51:01', 3, 32, 120.0000000, 70.0000000, 70.0000000, 0),
	(87, '2019-11-26 03:51:53', '2019-11-26 03:51:53', 3, 33, 1.0000000, 6000.0000000, 0.0000000, 1),
	(89, '2019-11-26 05:30:07', '2019-11-26 05:30:08', 1, 35, 5500.0000000, 50.0000000, 49.0000000, 0),
	(90, '2019-11-26 05:30:43', '2019-11-26 05:30:44', 1, 36, 1.0000000, 35000.0000000, 0.0000000, 1),
	(91, '2019-11-26 05:31:15', '2019-11-26 05:31:16', 1, 37, 9.0000000, 1500.0000000, 0.0000000, 0),
	(93, '2019-11-26 05:31:50', '2019-11-26 05:31:51', 2, 35, 6500.0000000, 55.0000000, 47.0000000, 0),
	(94, '2019-11-26 05:32:22', '2019-11-26 05:32:23', 2, 36, 1.0000000, 35000.0000000, 0.0000000, 1),
	(95, '2019-11-26 05:32:53', '2019-11-26 05:32:54', 2, 37, 11.0000000, 1500.0000000, 0.0000000, 0),
	(97, '2019-11-26 05:33:44', '2019-11-26 05:33:44', 3, 35, 7500.0000000, 55.0000000, 49.0000000, 0),
	(98, '2019-11-26 05:35:43', '2019-11-26 05:35:44', 3, 36, 1.0000000, 35000.0000000, 0.0000000, 1),
	(99, '2019-11-26 05:36:24', '2019-11-26 05:36:24', 3, 37, 13.0000000, 1500.0000000, 0.0000000, 0),
	(101, '2019-11-26 06:04:02', '2019-11-26 06:04:03', 1, 39, 2000.0000000, 90.0000000, 68.0000000, 0),
	(102, '2019-11-26 06:04:36', '2019-11-26 06:04:37', 1, 40, 7500.0000000, 28.0000000, 24.0000000, 0),
	(103, '2019-11-26 06:04:59', '2019-11-26 06:05:00', 2, 39, 2500.0000000, 100.0000000, 65.0000000, 0),
	(104, '2019-11-26 06:05:19', '2019-11-26 06:05:19', 2, 40, 8500.0000000, 30.0000000, 24.0000000, 0),
	(105, '2019-11-26 06:05:39', '2019-11-26 06:05:40', 3, 39, 3000.0000000, 120.0000000, 60.0000000, 0),
	(106, '2019-11-26 06:06:01', '2019-11-26 06:06:02', 3, 40, 10000.0000000, 32.0000000, 22.0000000, 0),
	(107, '2019-11-26 06:18:57', '2019-11-26 06:18:58', 1, 41, 180.0000000, 280.0000000, 170.0000000, 0),
	(108, '2019-11-26 06:19:27', '2019-11-26 06:19:28', 2, 41, 200.0000000, 400.0000000, 250.0000000, 0),
	(110, '2019-11-26 06:19:51', '2019-11-26 06:19:48', 3, 41, 220.0000000, 445.5000000, 237.1000000, 0),
	(111, '2019-11-26 06:38:47', '2020-02-09 22:57:29', 1, 42, 3500.0000000, 40.0000000, 27.0000000, 0),
	(112, '2019-11-26 06:39:06', '2020-02-09 22:57:29', 2, 42, 4000.0000000, 42.0000000, 25.0000000, 0),
	(114, '2019-11-26 06:39:24', '2020-02-09 22:57:29', 3, 42, 5000.0000000, 43.0000000, 23.6000000, 0),
	(115, '2019-11-26 06:46:21', '2019-11-26 06:46:22', 1, 43, 1800.0000000, 67.0000000, 42.0000000, 0),
	(116, '2019-11-26 06:46:45', '2019-11-26 06:46:45', 2, 43, 2000.0000000, 70.0000000, 40.0000000, 0),
	(117, '2019-11-26 06:47:15', '2019-11-26 06:47:16', 3, 43, 2500.0000000, 74.0000000, 38.0000000, 0),
	(118, '2019-11-26 06:55:59', '2019-11-26 06:56:00', 1, 44, 1800.0000000, 58.0000000, 40.0000000, 0),
	(121, '2019-11-26 06:56:20', '2019-11-26 06:56:24', 2, 44, 2000.0000000, 62.0000000, 38.0000000, 0),
	(122, '2019-11-26 06:57:16', '2019-11-26 06:57:17', 3, 44, 2200.0000000, 66.5000000, 36.3000000, 0),
	(123, '2020-04-01 21:19:51', '2020-04-01 21:19:55', 1, 45, 2500.0000000, 37.0000000, 27.0000000, 0),
	(124, '2020-04-01 21:21:10', '2020-04-01 21:21:11', 2, 45, 2800.0000000, 38.0000000, 28.0000000, 0),
	(125, '2020-04-01 21:21:59', '2020-04-01 21:22:00', 3, 45, 3000.0000000, 40.8000000, 30.5000000, 0),
	(126, '2020-04-01 21:22:56', '2020-04-01 21:22:57', 1, 46, 6000.0000000, 17.0000000, 11.5000000, 0),
	(127, '2020-04-01 21:23:41', '2020-04-01 21:23:42', 2, 46, 6500.0000000, 18.0000000, 12.0000000, 0),
	(128, '2020-04-01 21:24:24', '2020-04-01 21:24:25', 3, 46, 7000.0000000, 19.3000000, 13.1000000, 0),
	(129, '2020-04-01 21:26:47', '2020-04-01 21:26:48', 1, 47, 5500.0000000, 15.0000000, 10.0000000, 0),
	(130, '2020-04-01 21:27:11', '2020-04-01 21:27:12', 2, 47, 6000.0000000, 15.5000000, 10.5000000, 0),
	(131, '2020-04-01 21:27:44', '2020-04-01 21:27:45', 3, 47, 6500.0000000, 16.2000000, 11.3000000, 0);
/*!40000 ALTER TABLE `values` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
