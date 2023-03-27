-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 03:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_url`, `banner_image`, `created_at`, `updated_at`) VALUES
(3, 'hi', 'https://www.jotform.com/', 'upload/banner/1760626243070261.jpg', NULL, NULL),
(4, 'hi', 'https://www.jotform.com/', 'upload/banner/1760626300734185.jpg', NULL, NULL),
(5, 'hi', 'https://www.jotform.com/', 'upload/banner/1760626312321592.jpg', NULL, NULL),
(6, 'hi', 'https://www.jotform.com/', 'upload/banner/1760626404267046.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(7, 'hand', 'hand', 'upload/brand/1758516501210570.png', NULL, NULL),
(8, 'hello', 'hello', 'upload/brand/1758516668616750.png', NULL, NULL),
(9, 'test test test', 'test-test-test', 'upload/brand/1758517317910356.png', NULL, NULL),
(10, 'foot1', 'foot1', 'upload/brand/1758556021408153.png', NULL, '2023-02-22 15:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Blouse & jacket', 'blouse-&-jacket', 'upload/category/1761482121610355.jpg', NULL, '2023-03-26 22:25:09'),
(3, 'its me', 'its-me', 'upload/category/1759456934884268.jpg', NULL, NULL),
(4, 'test', 'test', 'upload/category/1760625058483929.jpg', NULL, NULL),
(6, 'mm', 'mm', 'upload/category/1760786593293890.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(3, 'EASY LEARNING', 30, '2023-04-26', 1, '2023-03-23 10:06:12', '2023-03-23 10:06:12'),
(4, 'HAPPY LEARNING', 20, '2023-03-31', 1, '2023-03-23 10:09:22', NULL),
(5, 'JACK', 23, '2023-03-30', 1, '2023-03-23 10:26:03', NULL),
(6, 'NONO', 30, '2022-04-06', 1, '2023-03-23 10:26:19', NULL),
(7, 'TEST', 11, '2021-03-30', 1, '2023-03-23 10:26:32', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_20_101038_create_brands_table', 2),
(6, '2023_03_04_162529_create_categories_table', 3),
(7, '2023_03_04_173912_create_products_table', 4),
(8, '2023_03_04_180742_create_multi_imgs_table', 4),
(9, '2023_03_16_233342_create_sliders_table', 5),
(10, '2023_03_17_001116_create_banners_table', 6),
(11, '2023_03_21_182118_create_carts_table', 7),
(12, '2023_03_22_101248_create_carts_table', 8),
(13, '2023_03_22_125521_create_carts_table', 9),
(14, '2023_03_22_134601_create_carts_table', 10),
(15, '2023_03_22_185011_create_carts_table', 11),
(16, '2023_03_22_195024_create_coupons_table', 12),
(17, '2023_03_22_224526_create_ship_divisions_table', 13),
(18, '2023_03_22_224742_create_ship_districts_table', 13),
(19, '2023_03_22_224941_create_ship_states_table', 13),
(20, '2023_03_24_152303_create_ship_states_table', 14),
(21, '2023_03_24_172608_create_checkouts_table', 15),
(22, '2023_03_24_180101_create__checkouts_table', 16),
(23, '2023_03_24_181326_create_checkouts_table', 17),
(24, '2023_03_25_172448_create_orders_table', 18),
(25, '2023_03_25_172947_create_checkouts_table', 19),
(26, '2023_03_25_190941_create_checkouts_table', 20),
(27, '2023_03_25_193601_create_checkouts_table', 21),
(28, '2023_03_25_210404_create_order_items_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(5, 5, 'upload/products/multi-img/1760416516065389.png', '2023-03-15 04:06:57', NULL),
(6, 5, 'upload/products/multi-img/1760416516070569.png', '2023-03-15 04:06:57', NULL),
(7, 5, 'upload/products/multi-img/1760416516075288.png', '2023-03-15 04:06:57', NULL),
(8, 5, 'upload/products/multi-img/1760416516078985.jfif', '2023-03-15 04:06:57', NULL),
(27, 10, 'upload/products/multi-img/1761476299811517.png', '2023-03-26 20:51:46', NULL),
(28, 10, 'upload/products/multi-img/1761476299815077.png', '2023-03-26 20:51:46', NULL),
(29, 10, 'upload/products/multi-img/1761476299818436.png', '2023-03-26 20:51:46', NULL),
(30, 10, 'upload/products/multi-img/1761476299821617.png', '2023-03-26 20:51:46', NULL),
(31, 10, 'upload/products/multi-img/1761476299824377.webp', '2023-03-26 20:51:46', NULL),
(32, 11, 'upload/products/multi-img/1761477121525277.png', '2023-03-26 21:04:49', NULL),
(33, 11, 'upload/products/multi-img/1761477121528580.png', '2023-03-26 21:04:49', NULL),
(34, 11, 'upload/products/multi-img/1761477121531188.png', '2023-03-26 21:04:49', NULL),
(35, 11, 'upload/products/multi-img/1761477121533898.png', '2023-03-26 21:04:49', NULL),
(36, 11, 'upload/products/multi-img/1761477121537504.png', '2023-03-26 21:04:49', NULL),
(37, 11, 'upload/products/multi-img/1761477121541106.png', '2023-03-26 21:04:49', NULL),
(38, 11, 'upload/products/multi-img/1761477121544242.webp', '2023-03-26 21:04:49', NULL),
(39, 12, 'upload/products/multi-img/1761478397524778.png', '2023-03-26 21:25:06', NULL),
(40, 12, 'upload/products/multi-img/1761478397527767.png', '2023-03-26 21:25:06', NULL),
(41, 12, 'upload/products/multi-img/1761478397530015.png', '2023-03-26 21:25:06', NULL),
(42, 12, 'upload/products/multi-img/1761478397533190.png', '2023-03-26 21:25:06', NULL),
(43, 12, 'upload/products/multi-img/1761478397535862.png', '2023-03-26 21:25:06', NULL),
(44, 13, 'upload/products/multi-img/1761481605119161.png', '2023-03-26 22:16:05', NULL),
(45, 13, 'upload/products/multi-img/1761481605130571.png', '2023-03-26 22:16:05', NULL),
(46, 13, 'upload/products/multi-img/1761481605134055.png', '2023-03-26 22:16:05', NULL),
(47, 13, 'upload/products/multi-img/1761481605136579.png', '2023-03-26 22:16:05', NULL),
(48, 13, 'upload/products/multi-img/1761481605139249.png', '2023-03-26 22:16:05', NULL),
(49, 13, 'upload/products/multi-img/1761481605142480.png', '2023-03-26 22:16:05', NULL),
(50, 14, 'upload/products/multi-img/1761481950548423.png', '2023-03-26 22:21:35', NULL),
(51, 14, 'upload/products/multi-img/1761481950552596.png', '2023-03-26 22:21:35', NULL),
(52, 14, 'upload/products/multi-img/1761481950555814.png', '2023-03-26 22:21:35', NULL),
(53, 14, 'upload/products/multi-img/1761481950558689.png', '2023-03-26 22:21:35', NULL),
(54, 14, 'upload/products/multi-img/1761481950561532.png', '2023-03-26 22:21:35', NULL),
(55, 14, 'upload/products/multi-img/1761481950564145.png', '2023-03-26 22:21:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `state_id`, `name`, `email`, `phone`, `adress`, `post_code`, `notes`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(9, 9, 1, 'user', 'user@gmail.com', '34535', 'dsdf', '121212', 'nnnnnnnnnnnnn', 6554.00, '1', 'EOS76609109', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, 'pending', '2023-03-25 20:25:15', NULL),
(10, 9, 3, 'user', 'user@gmail.com', '34535', 'dsdf', '1212', 'dfdf', 6554.00, '1', 'EOS97975738', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, 'pending', '2023-03-25 20:26:19', NULL),
(11, 9, 3, 'user', 'user@gmail.com', '34535', 'dsdf', '1212', 'sddsd', 6554.00, '1', 'EOS12004249', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, 'deliverd', '2023-03-25 20:29:15', '2023-03-26 08:13:59'),
(23, 9, 3, 'user', 'user@gmail.com', '34535', 'dsdf', '121212', 'hhhhh', 4533.00, '1', 'EOS69746080', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, 'deliverd', '2023-03-25 20:48:01', '2023-03-26 08:13:20'),
(24, 9, 1, 'user', 'user@gmail.com', '34535', 'dsdf', 'asa', 'hhh', 244.00, '1', 'EOS47160846', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, 'deliverd', '2023-03-25 20:50:07', '2023-03-26 08:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(4, 9, 9, 'Red', 'Midium', '4', 6554.00, '2023-03-25 20:25:15', NULL),
(5, 9, 6, 'Black', 'Large', '2', 6554.00, '2023-03-25 20:25:15', NULL),
(6, 9, 8, NULL, NULL, '6', 6554.00, '2023-03-25 20:25:15', NULL),
(7, 10, 9, 'Red', 'Midium', '4', 6554.00, '2023-03-25 20:26:19', NULL),
(8, 10, 6, 'Black', 'Large', '2', 6554.00, '2023-03-25 20:26:19', NULL),
(9, 10, 8, NULL, NULL, '6', 6554.00, '2023-03-25 20:26:19', NULL),
(10, 11, 9, 'Red', 'Midium', '4', 6554.00, '2023-03-25 20:29:15', NULL),
(11, 11, 6, 'Black', 'Large', '2', 6554.00, '2023-03-25 20:29:15', NULL),
(12, 11, 8, NULL, NULL, '6', 6554.00, '2023-03-25 20:29:15', NULL),
(46, 23, 9, 'Red', 'Midium', '3', 4533.00, '2023-03-25 20:48:01', NULL),
(47, 23, 6, NULL, NULL, '2', 4533.00, '2023-03-25 20:48:01', NULL),
(48, 24, 8, NULL, NULL, '2', 244.00, '2023-03-25 20:50:07', NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_tags` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_descp` text NOT NULL,
  `long_descp` text NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_descp`, `long_descp`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(10, 7, 1, 'SHEIN EZwear هودي بجرافيك شعار وشكل منخفض الاكتاف', 'shein-ezwear-هودي-بجرافيك-شعار-وشكل-منخفض-الاكتاف', '12003', '100', 'new product', 'Small,Midium,Large,xSamll', 'Red,Blue,Black,residential', '15.17', NULL, '*تم الحصول على هذه البيانات عبر قياس المنتج يدوياً، وقد تتباين القياسات بمقدار 1-2 سم.', '<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">تصاميم:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">كاجوال</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">أصناف التصميم:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">الشكل, شعار</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">نوع:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">كنزة صوفية</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">خط العنق:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">مع قبعة</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">طول الأكمام:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">الأكمام الطويلة</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">أنواع الأكمام:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">منخفض الاكتاف</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">الطول:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">طويل</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">نوع الشكل:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">المقاس المتضخم</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">قماش:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">متمدد طفيف</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">المواد:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">أقمشة محبوكة</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">تكوين:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">100% بوليستر</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">ارشادات العناية:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">غسيل في الغسالة أو التنظيف الجاف الاحترافي</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">شفاف:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">لا</div>\r\n</div>', 'upload/products/thambnail/1761476299806367.webp', NULL, 1, NULL, NULL, 1, '2023-03-26 20:51:46', NULL),
(11, 7, 1, 'Huwaidi R. Som Maine Limbreak, Mobin Oragi', 'huwaidi-r.-som-maine-limbreak,-mobin-oragi', '12004', '100', 'new product,top product', 'Small,Midium,Large', 'Red,Blue,Black', '16.77', '3.77', '*This data was obtained by measuring the product manually, and measurements may vary 1-2 cm.', '<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Designs: casual</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Design varieties: drawing</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Details: Rabat</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Type: Sufi sweater</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">The neckline: with a hat</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Long sleeves: long sleeves</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Types of sleeves: low shoulders</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Length: regular</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Figure type: enlarged size</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Fabric: high expansion</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Materials: fabric</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Training: 100% polyester</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Care instructions: washing in the washing machine or professional dry cleaning</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">Transparent: No</div>\r\n</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Cairo, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 25px; display: table-cell; vertical-align: bottom; width: 210px;\">&nbsp;</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">&nbsp;</div>\r\n</div>', 'upload/products/thambnail/1761477121517901.webp', NULL, 1, NULL, NULL, 1, '2023-03-26 21:04:49', NULL),
(12, 7, 1, 'Men Letter & Building Print Sweatshirt', 'men-letter-&-building-print-sweatshirt', '12005', '100', 'new product,top product', 'S,M,L,XL,XXL', 'Red,Blue,Black', '8.50', NULL, '*This data was obtained from manually measuring the product, it may be off by 1-2 CM.', '<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Style:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Casual</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Pattern Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Letter, Graphic</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Pullovers</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Neckline:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Round Neck</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Long Sleeve</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular Sleeve</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fit Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular Fit</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fabric:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Slight Stretch</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Material:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Fabric</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Composition:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">95% Polyester, 5% Elastane</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Care Instructions:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Machine wash or professional dry clean</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sheer:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">No</div>\r\n</div>', 'upload/products/thambnail/1761478397516136.png', NULL, 1, NULL, NULL, 1, '2023-03-26 21:25:06', NULL),
(13, 7, 1, 'SHEIN Men Palm Tree & Letter Graphic Colorblock Striped Trim Drop Shoulder Varsity Jacket', 'shein-men-palm-tree-&-letter-graphic-colorblock-striped-trim-drop-shoulder-varsity-jacket', '12006', '111', 'new product,top product', 'S,M,L,XL,XXL', 'Red', '40.00', '35.00', '*This data was obtained from manually measuring the product, it may be off by 1-2 CM.', '<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Color:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Multicolor</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Style:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Casual</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Pattern Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Colorblock, Letter</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Details:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Pocket, Button Front</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Varsity</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Neckline:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Baseball Collar</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Long Sleeve</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Drop Shoulder</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Placket:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Single Breasted</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fit Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular Fit</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fabric:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Non-Stretch</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Material:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Woven Fabric</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Composition:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">100% Polyester</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Care Instructions:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Machine wash or professional dry clean</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sheer:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">No</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Lining:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">100% Polyester</div>\r\n</div>', 'upload/products/thambnail/1761481605111968.png', NULL, 1, NULL, NULL, 1, '2023-03-26 22:16:05', NULL);
INSERT INTO `products` (`id`, `brand_id`, `category_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_descp`, `long_descp`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(14, 7, 1, 'Extended Sizes Men Letter Patched Striped Trim Colorblock Drop Shoulder Varsity Jacket', 'extended-sizes-men-letter-patched-striped-trim-colorblock-drop-shoulder-varsity-jacket', '12007', '50', 'new product,top product', '2XL,3XL,4XL,5XL,6XL', 'Black', '37.00', NULL, '*This data was obtained from manually measuring the product, it may be off by 1-2 CM.', '<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Color:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Black</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Style:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Casual</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Pattern Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Colorblock, Letter</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Details:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Patched, Pocket, Button Front</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Varsity</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Neckline:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Baseball Collar</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Long Sleeve</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sleeve Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular Sleeve</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Length:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Placket:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Single Breasted</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fit Type:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Regular Fit</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Fabric:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Slight Stretch</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Material:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Fabric</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Composition:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">100% Polyester</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Care Instructions:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">Machine wash or professional dry clean</div>\r\n</div>\r\n<div class=\"product-intro__description-table-item\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; display: table-row; line-height: 20px; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: 12px; background-color: #ffffff;\" tabindex=\"0\" role=\"text\">\r\n<div class=\"key\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 25px 0px 0px; display: table-cell; vertical-align: bottom; width: 210px;\">Sheer:</div>\r\n<div class=\"val\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; display: table-cell; vertical-align: bottom;\">No</div>\r\n</div>', 'upload/products/thambnail/1761481950543125.png', NULL, 1, NULL, NULL, 1, '2023-03-26 22:21:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'jack', NULL, '2023-03-24 12:24:42'),
(3, 'nooo', NULL, NULL),
(4, 'nooo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `short_title`, `slider_image`, `created_at`, `updated_at`) VALUES
(6, 'test', 'hack', 'upload/slider/1761464536556743.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','vendor','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jack', 'admin', 'admin@gmail.com', NULL, '$2y$10$kQ20z2qnNsKD093.MB5uWelpDcrqq6O1O0QsBowaKEeUXWakV8H7a', '202302181541Untit.png', '0798939333', 'Amman,Jordan', 'admin', 'active', NULL, NULL, '2023-02-19 07:39:19'),
(2, 'vendor', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$XUtaQD.7CR9w4s2.1IZTvevfvUWuXihJh7Aigt7eajaeB3.2St1ie', NULL, NULL, NULL, 'vendor', 'active', NULL, NULL, NULL),
(4, 'bassam', NULL, 'bassam@gmail.com', '2023-02-17 10:08:50', '$2y$10$hH04cSgpzTgpgG.xbu731eh72lu75aU5U9bB3.Ebc7TWM87EV4ibK', NULL, NULL, NULL, 'user', 'active', NULL, '2023-02-17 10:08:28', '2023-02-17 10:08:50'),
(5, 'christy', NULL, 'christy@gmail.com', NULL, '$2y$10$gsBdwWcYDswS2AgCJDN6feT42nuaKLeFaPFSL1/vxxzasML4Y5F4y', '202302181636wepik-photo-mode-2022104-122457.png', NULL, NULL, 'admin', 'active', NULL, '2023-02-17 10:14:59', '2023-02-18 13:36:45'),
(6, 'hack', NULL, 'bassa111m@gmail.com', NULL, '$2y$10$ILX0mVHozsEhnULSRd.HM.NeE2B43ANLEMr7UO6XIFySYXEaLuh8O', NULL, NULL, NULL, 'user', 'active', NULL, '2023-02-19 16:21:54', '2023-02-19 16:21:54'),
(7, 'hello', NULL, 'hello@gmail.com', NULL, '$2y$10$oZdeTIF61Bpr41K70sFc4OZmhvGDi2twNPkEzgdGpHAsI62efkvAW', NULL, NULL, NULL, 'user', 'active', NULL, '2023-02-19 16:22:27', '2023-02-19 16:22:27'),
(8, 'asas', NULL, 'fa@gmail.com', NULL, '$2y$10$ZyTIGHirdMdYhPgJg5R88.ufDxZ60PTCY1L1/f45wSQrEQzvA0Lh2', NULL, NULL, NULL, 'user', 'active', NULL, '2023-02-19 16:24:14', '2023-02-19 16:24:14'),
(9, 'user', 'jack', 'user@gmail.com', NULL, '$2y$10$qmY9M0cCrwlsKCktygKOWezzmdkmtp0.4rLxYZzdzQYKTXyLdVnD2', '2023032515315d580574-8bff-4e67-aa50-e2c2420a22e2.jpg', '34535', 'dsdf', 'user', 'active', NULL, '2023-03-22 10:38:09', '2023-03-25 12:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
