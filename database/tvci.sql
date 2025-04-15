-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2025 at 06:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `parentId` bigint DEFAULT NULL,
  `title` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaTitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_parent` (`parentId`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parentId`, `title`, `metaTitle`, `slug`, `content`, `updated_at`, `created_at`) VALUES
(23, 24, 'Chứng nhận HTQL và Chứng nhận SP theo PT5', 'Chứng nhận HTQL và Chứng nhận SP theo PT5', 'chung-nhan-htql-va-chung-nhan-sp-theo-pt5', 'Chứng nhận HTQL và Chứng nhận SP theo PT5', '2025-04-14 18:59:17', '2025-04-14 18:58:56'),
(24, NULL, 'Dịch vụ chứng nhận', 'Dịch vụ chứng nhận', 'dich-vu-chung-nhan', 'Dịch vụ chứng nhận', '2025-04-14 18:59:10', '2025-04-14 18:59:10'),
(25, 24, 'Chứng nhận QCVN 20:2019/BKHCN', 'Chứng nhận QCVN 20:2019/BKHCN', 'chung-nhan-qcvn-20-2019-bkhcn', 'Chứng nhận QCVN 20:2019/BKHCN', '2025-04-14 19:00:32', '2025-04-14 19:00:32'),
(26, 24, 'Chứng nhận QCVN 4:2009/BKHCN', 'Chứng nhận QCVN 4:2009/BKHCN', 'chung-nhan-qcvn-4-2009-bkhcn', 'Chứng nhận QCVN 4:2009/BKHCN', '2025-04-14 19:00:42', '2025-04-14 19:00:42'),
(27, 24, 'Chứng nhận QCVN 9:2012/BKHCN', 'Chứng nhận QCVN 9:2012/BKHCN', 'chung-nhan-qcvn-9-2012-bkhcn', 'Chứng nhận QCVN 9:2012/BKHCN', '2025-04-14 19:00:51', '2025-04-14 19:00:51'),
(28, NULL, 'Dịch vụ thử nghiệm', 'Dịch vụ thử nghiệm', 'dich-vu-thu-nghiem', 'Dịch vụ thử nghiệm', '2025-04-14 19:01:02', '2025-04-14 19:01:02'),
(29, NULL, 'Dự án', 'Dự án', 'du-an', 'Dự án', '2025-04-14 19:01:13', '2025-04-14 19:01:13'),
(30, NULL, 'Giám định', 'Giám định', 'giam-dinh', 'Giám định', '2025-04-14 19:01:22', '2025-04-14 19:01:22'),
(31, 30, 'Giám định Than', 'Giám định Than', 'giam-dinh-than', 'Giám định Than', '2025-04-14 19:01:33', '2025-04-14 19:01:33'),
(32, 30, 'Giám định máy', 'Giám định máy', 'giam-dinh-may', 'Giám định máy', '2025-04-14 19:01:51', '2025-04-14 19:01:51'),
(33, 30, 'Giám định vật liệu kim loại (Thép, nhôm, đồng...)', 'Giám định vật liệu kim loại (Thép, nhôm, đồng...)', 'giam-dinh-vat-lieu-kim-loai-thep-nhom-dong', 'Giám định vật liệu kim loại (Thép, nhôm, đồng...)', '2025-04-14 19:02:00', '2025-04-14 19:02:00'),
(34, NULL, 'Giới thiệu trung tâm', 'Giới thiệu trung tâm', 'gioi-thieu-trung-tam', 'Giới thiệu trung tâm', '2025-04-14 19:02:10', '2025-04-14 19:02:10'),
(35, NULL, 'Kiểm định', 'Kiểm định', 'kiem-dinh', 'Kiểm định', '2025-04-14 19:02:19', '2025-04-14 19:02:19'),
(36, 35, 'Kiểm định kỹ thuật an toàn thiết thị', 'Kiểm định kỹ thuật an toàn thiết thị', 'kiem-dinh-ky-thuat-an-toan-thiet-thi', 'Kiểm định kỹ thuật an toàn thiết thị', '2025-04-14 19:02:42', '2025-04-14 19:02:42'),
(37, 35, 'Kiểm định, thí nghiệm an toàn thiết  bị điện', 'Kiểm định, thí nghiệm an toàn thiết  bị điện', 'kiem-dinh-thi-nghiem-an-toan-thiet-bi-dien', 'Kiểm định, thí nghiệm an toàn thiết  bị điện', '2025-04-14 19:02:51', '2025-04-14 19:02:51'),
(38, NULL, 'Lĩnh vực hoạt động', 'Lĩnh vực hoạt động', 'linh-vuc-hoat-dong', 'Lĩnh vực hoạt động', '2025-04-14 19:03:01', '2025-04-14 19:03:01'),
(39, NULL, 'Thí nghiệm vật liệu, NDT và xử lý nhiệt', 'Thí nghiệm vật liệu, NDT và xử lý nhiệt', 'thi-nghiem-vat-lieu-ndt-va-xu-ly-nhiet', 'Thí nghiệm vật liệu, NDT và xử lý nhiệt', '2025-04-14 19:03:11', '2025-04-14 19:03:11'),
(40, 39, 'NDT và Xử lý nhiệt', 'NDT và Xử lý nhiệt', 'ndt-va-xu-ly-nhiet', 'NDT và Xử lý nhiệt', '2025-04-14 19:03:25', '2025-04-14 19:03:19'),
(41, 39, 'Phòng Thí nghiệm vật liệu và kiểm tra không phá hủy (Hitechlom)', 'Phòng Thí nghiệm vật liệu và kiểm tra không phá hủy (Hitechlom)', 'phong-thi-nghiem-vat-lieu-va-kiem-tra-khong-pha-huy-hitechlom', 'Phòng Thí nghiệm vật liệu và kiểm tra không phá hủy (Hitechlom)', '2025-04-14 19:03:34', '2025-04-14 19:03:34'),
(42, NULL, 'Quan trắc môi trường', 'Quan trắc môi trường', 'quan-trac-moi-truong', 'Quan trắc môi trường', '2025-04-14 19:03:42', '2025-04-14 19:03:42'),
(43, 42, 'Quan trắc môi trường không khí, khí thải, nước, đất, bùn,trầm tích, chất thải rắn...', 'Quan trắc môi trường không khí, khí thải, nước, đất, bùn,trầm tích, chất thải rắn...', 'quan-trac-moi-truong-khong-khi-khi-thai-nuoc-dat-bun-tram-tich-chat-thai-ran', 'Quan trắc môi trường không khí, khí thải, nước, đất, bùn,trầm tích, chất thải rắn...', '2025-04-14 19:04:17', '2025-04-14 19:04:17'),
(44, 42, 'Quan trắc môi trường lao động', 'Quan trắc môi trường lao động', 'quan-trac-moi-truong-lao-dong', 'Quan trắc môi trường lao động', '2025-04-14 19:04:30', '2025-04-14 19:04:30'),
(45, NULL, 'Sản phẩm - dịch vụ', 'Sản phẩm - dịch vụ', 'san-pham-dich-vu', 'Sản phẩm - dịch vụ', '2025-04-14 19:04:41', '2025-04-14 19:04:41'),
(46, NULL, 'Thí nghiệm Vật Liệu', 'Thí nghiệm Vật Liệu', 'thi-nghiem-vat-lieu', 'Thí nghiệm Vật Liệu', '2025-04-14 19:04:51', '2025-04-14 19:04:51'),
(47, 28, 'Thử nghiệm QCVN 20:2019/BKHCN', 'Thử nghiệm QCVN 20:2019/BKHCN', 'thu-nghiem-qcvn-20-2019-bkhcn', 'Thử nghiệm QCVN 20:2019/BKHCN', '2025-04-14 19:05:05', '2025-04-14 19:05:05'),
(48, 28, 'Thử nghiệm QCVN 4:2009/BKHCN', 'Thử nghiệm QCVN 4:2009/BKHCN', 'thu-nghiem-qcvn-4-2009-bkhcn', 'Thử nghiệm QCVN 4:2009/BKHCN', '2025-04-14 19:05:14', '2025-04-14 19:05:14'),
(49, 28, 'Thử nghiệm QCVN 9:2012/BKHCN', 'Thử nghiệm QCVN 9:2012/BKHCN', 'thu-nghiem-qcvn-9-2012-bkhcn', 'Thử nghiệm QCVN 9:2012/BKHCN', '2025-04-14 19:05:24', '2025-04-14 19:05:24'),
(50, 28, 'Thử nghiệm hiệu suất năng lượng', 'Thử nghiệm hiệu suất năng lượng', 'thu-nghiem-hieu-suat-nang-luong', 'Thử nghiệm hiệu suất năng lượng', '2025-04-14 19:05:34', '2025-04-14 19:05:34'),
(51, NULL, 'Tin TCVI', 'Tin TCVI', 'tin-tcvi', 'Tin TCVI', '2025-04-14 19:05:44', '2025-04-14 19:05:44'),
(52, NULL, 'Tin trong nước', 'Tin trong nước', 'tin-trong-nuoc', 'Tin trong nước', '2025-04-14 19:05:52', '2025-04-14 19:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `company`, `favicon`, `logo`, `updated_at`, `created_at`) VALUES
(3, 'TVCI', 'de93a83827db0b0266383bc0342fc547.png', '803fe70517a0509f569f1148f8da4832.jpg', '2025-04-12 01:08:46', '2025-04-12 06:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(2000) NOT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `parent_id` bigint DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `path`, `icon`, `parent_id`, `updated_at`, `created_at`) VALUES
(10, 'Thử nghiệm', '/danh-muc/dich-vu-thu-nghiem', NULL, 6, '2025-04-14 19:28:50', '2025-04-14 02:27:27'),
(8, 'Đối tác', '/doi-tac', NULL, NULL, '2025-04-14 02:25:24', '2025-04-14 02:25:24'),
(6, 'Dịch vụ', '#', NULL, NULL, '2025-04-14 19:29:23', '2025-04-14 02:22:32'),
(7, 'Tin tức - Sự kiện', '/bai-viet', NULL, NULL, '2025-04-14 02:24:56', '2025-04-14 02:24:56'),
(5, 'Trang chủ', '/', NULL, NULL, '2025-04-14 02:21:34', '2025-04-14 02:21:34'),
(11, 'Chứng nhận', '/danh-muc/dich-vu-chung-nhan', NULL, 6, '2025-04-14 19:28:56', '2025-04-14 02:28:14'),
(12, 'Giám định', '/danh-muc/giam-dinh', NULL, 6, '2025-04-14 19:29:09', '2025-04-14 02:28:29'),
(13, 'Kiểm định', '/danh-muc/kiem-dinh', NULL, 6, '2025-04-14 19:29:35', '2025-04-14 02:28:51'),
(14, 'Quan trắc môi trường', '/danh-muc/quan-trac-moi-truong', NULL, 6, '2025-04-14 19:29:47', '2025-04-14 02:29:02'),
(15, 'Thí nghiệm', '/danh-muc/thi-nghiem-vat-lieu-ndt-va-xu-ly-nhiet', NULL, 6, '2025-04-14 19:39:31', '2025-04-14 02:29:14'),
(16, 'Hiệu suất năng lượng', '/danh-muc/thu-nghiem-hieu-suat-nang-luong', NULL, 10, '2025-04-14 19:32:30', '2025-04-14 19:32:30'),
(17, 'QCVN 4:2009/BKHCN', '/danh-muc/thu-nghiem-qcvn-4-2009-bkhcn', NULL, 10, '2025-04-14 19:33:03', '2025-04-14 19:33:03'),
(18, 'QCVN 9:2012/BKHCN', '/danh-muc/thu-nghiem-qcvn-9-2012-bkhcn', NULL, 10, '2025-04-14 19:33:23', '2025-04-14 19:33:23'),
(19, 'QCVN 20:2019/BKHCN', '/danh-muc/thu-nghiem-qcvn-20-2019-bkhcn', NULL, 10, '2025-04-14 19:33:42', '2025-04-14 19:33:42'),
(20, 'QCVN 4:2009/BKHCN', '/danh-muc/chung-nhan-qcvn-4-2009-bkhcn', NULL, 11, '2025-04-14 19:33:56', '2025-04-14 19:33:56'),
(21, 'QCVN 9:2012/BKHCN', '/danh-muc/chung-nhan-qcvn-9-2012-bkhcn', NULL, 11, '2025-04-14 19:34:34', '2025-04-14 19:34:34'),
(22, 'QCVN 20:2019/BKHCN', '/danh-muc/chung-nhan-qcvn-20-2019-bkhcn', NULL, 11, '2025-04-14 19:34:55', '2025-04-14 19:34:55'),
(23, 'Chứng nhận HTQL và Chứng nhận SP', '/danh-muc/chung-nhan-htql-va-chung-nhan-sp-theo-pt5', NULL, 11, '2025-04-14 19:35:20', '2025-04-14 19:35:20'),
(24, 'Giám định vật liệu kim loại( Thép, nhôm, đồng...)', '/danh-muc/giam-dinh-vat-lieu-kim-loai-thep-nhom-dong', NULL, 12, '2025-04-14 19:36:06', '2025-04-14 19:36:06'),
(25, 'Giám định máy', '/danh-muc/giam-dinh-may', NULL, 12, '2025-04-14 19:36:21', '2025-04-14 19:36:21'),
(26, 'Giám định Than', '/danh-muc/giam-dinh-than', NULL, 12, '2025-04-14 19:36:44', '2025-04-14 19:36:44'),
(27, 'Kiểm định kỹ thuật an toàn  thiết bị', '/danh-muc/kiem-dinh-ky-thuat-an-toan-thiet-thi', NULL, 13, '2025-04-14 19:37:22', '2025-04-14 19:37:22'),
(28, 'Kiểm định, thí nghiệm an toàn  thiết bị điện', '/danh-muc/kiem-dinh-thi-nghiem-an-toan-thiet-bi-dien', NULL, 13, '2025-04-14 19:37:44', '2025-04-14 19:37:44'),
(29, 'Quan trắc môi trường không  khí, khí thải, nước, đất, bùn, trầm tích,chất thải rắn...', '/danh-muc/quan-trac-moi-truong-khong-khi-khi-thai-nuoc-dat-bun-tram-tich-chat-thai-ran', NULL, 14, '2025-04-14 19:38:06', '2025-04-14 19:38:06'),
(30, 'Quan trắc môi trường lao động', '/danh-muc/quan-trac-moi-truong-lao-dong', NULL, 14, '2025-04-14 19:38:25', '2025-04-14 19:38:25'),
(31, 'Thí nghiệm Vật Liệu', '/danh-muc/thi-nghiem-vat-lieu', NULL, 15, '2025-04-14 19:38:52', '2025-04-14 19:38:52'),
(32, 'NDT và Xử lý nhiệt', '/danh-muc/ndt-va-xu-ly-nhiet', NULL, 15, '2025-04-14 19:39:21', '2025-04-14 19:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `authorId` bigint NOT NULL,
  `parentId` bigint DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` blob,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publishedAt` datetime DEFAULT NULL,
  `content` longblob,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_slug` (`slug`),
  KEY `idx_post_user` (`authorId`),
  KEY `idx_post_parent` (`parentId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

DROP TABLE IF EXISTS `post_category`;
CREATE TABLE IF NOT EXISTS `post_category` (
  `postId` bigint NOT NULL,
  `categoryId` bigint NOT NULL,
  PRIMARY KEY (`postId`,`categoryId`),
  KEY `idx_pc_category` (`categoryId`),
  KEY `idx_pc_post` (`postId`) INVISIBLE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

DROP TABLE IF EXISTS `post_comment`;
CREATE TABLE IF NOT EXISTS `post_comment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postId` bigint NOT NULL,
  `parentId` bigint DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `publishedAt` datetime DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_comment_post` (`postId`) INVISIBLE,
  KEY `idx_comment_parent` (`parentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_meta`
--

DROP TABLE IF EXISTS `post_meta`;
CREATE TABLE IF NOT EXISTS `post_meta` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `postId` bigint NOT NULL,
  `key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_post_meta` (`postId`,`key`) INVISIBLE,
  KEY `idx_meta_post` (`postId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `postId` bigint NOT NULL,
  `tagId` bigint NOT NULL,
  PRIMARY KEY (`postId`,`tagId`),
  KEY `idx_pt_tag` (`tagId`),
  KEY `idx_pt_post` (`postId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LcGSujIet482iffIs2RzKvTdY41kMsBN0zNvkEHk', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN0RlVUNjTDB4dEtPWHZxT2czSk55SjhUbjJuY1d0RlU2QzVhcm5IdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWktdmlldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1744689593);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `title` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaTitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$12$qpJyZlTtEifBAJcCzu7xteaKIfbxULEchK3IVD.bZCEnLsh0b9rRq', NULL, NULL, '2025-04-10 18:12:34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`parentId`) REFERENCES `category` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_parent` FOREIGN KEY (`parentId`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `fk_pc_category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_pc_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `fk_comment_parent` FOREIGN KEY (`parentId`) REFERENCES `post_comment` (`id`),
  ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_meta`
--
ALTER TABLE `post_meta`
  ADD CONSTRAINT `fk_meta_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `fk_pt_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `fk_pt_tag` FOREIGN KEY (`tagId`) REFERENCES `tag` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
