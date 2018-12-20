-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 11:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'HaQuangJr', 'quang97ptit@gmail.com', '$2y$10$q3UFgqoa.mt5Yx1dVEBT.ee6CZkLk7p7U4Y.kbYQh6PLJ/mxgenJm', '100', 'Uw0eVCi2ZiuqwKcpR6RFPfxLJpSP665w8S1Qxutcg6v0ZS5UA03uXMaYqjgy', '2018-11-27 17:00:00', '2018-12-12 02:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `url_banner` text COLLATE utf8_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Sách Giáo Dục', 'sach-giao-duc', '0', '2018-11-23 13:01:57', '2018-11-25 20:03:56'),
(2, 'Sách Ngoại Ngữ', 'sach-ngoai-ngu', '0', '2018-11-23 13:10:10', '2018-11-25 20:04:07'),
(3, 'Sách Lập Trình', 'sach-lap-trinh', '0', '2018-11-23 13:17:01', '2018-11-23 13:42:30'),
(4, 'Tin Tức-Ưu Đãi', 'tin-tuc-uu-dai', '0', '2018-11-25 17:36:11', '2018-11-25 20:03:56'),
(5, 'Bộ Sách Lớp 1', 'bo-sach-lop-1', '1', '2018-11-23 18:36:10', '2018-11-23 18:36:10'),
(6, 'Bộ Sách Lớp 2', 'bo-sach-lop-2', '1', '2018-11-23 18:36:21', '2018-11-23 18:36:21'),
(7, 'Bộ Sách Lớp 3', 'bo-sach-lop-3', '1', '2018-11-23 18:36:31', '2018-11-23 18:36:31'),
(8, 'Bộ Sách Lớp 4', 'bo-sach-lop-4', '1', '2018-11-23 18:38:46', '2018-11-23 18:38:46'),
(9, 'Bộ Sách Lớp 5', 'bo-sach-lop-5', '1', '2018-11-23 18:38:57', '2018-11-23 18:38:57'),
(10, 'Bộ Sách Lớp 6', 'bo-sach-lop-6', '1', '2018-11-23 18:56:05', '2018-11-23 18:56:05'),
(11, 'Bộ Sách Lớp 7', 'bo-sach-lop-7', '1', '2018-11-24 19:00:27', '2018-11-24 19:00:27'),
(12, 'Bộ Sách Lớp 8', 'bo-sach-lop-8', '1', '2018-11-24 19:00:41', '2018-11-24 19:00:41'),
(13, 'Bộ Sách Lớp 9', 'bo-sach-lop-9', '1', '2018-11-24 19:00:52', '2018-11-24 19:00:52'),
(14, 'Bộ Sách Lớp 10', 'bo-sach-lop-10', '1', '2018-11-25 17:36:11', '2018-11-25 17:36:11'),
(15, 'Bộ Sách Lớp 11', 'bo-sach-lop-11', '1', '2018-11-25 17:36:27', '2018-11-25 17:36:27'),
(16, 'Bộ Sách Lớp 12', 'bo-sach-lop-12', '1', '2018-11-25 17:36:48', '2018-11-25 17:36:48'),
(17, 'Sách Ôn Thi Đại Học', 'sach-on-thi-dai-hoc', '1', '2018-11-28 11:40:09', '2018-11-28 11:40:09'),
(18, 'Bộ Sách Tiếng Nhật', 'bo-sach-tieng-nhat', '2', '2018-11-28 11:40:31', '2018-11-28 11:40:31'),
(19, 'Sách Học Tiếng Hàn', 'sach-tieng-han', '2', NULL, NULL),
(20, 'Sách Học Tiếng Anh', 'sach-tieng-anh', '2', NULL, NULL),
(21, 'Sách Hoc Tiếng Trung', 'sach-tieng-trung', '2', NULL, NULL),
(22, 'Từ Điển Anh-Việt', 'tư-dien-anh-viet', '2', NULL, NULL),
(23, 'Từ Điển Nhật-Việt', 'tu-dien-nhat-viet', '2', NULL, NULL),
(24, 'Từ Điển Hàn-Viêt', 'tu-dien-han-vet', '2', NULL, NULL),
(25, 'Từ Điển Trung-Việt', 'tu-dien-trung-viet', '2', NULL, NULL),
(26, 'Lập Trình C/C++', 'sach-lap-trinh-c-c-plus', '3', NULL, NULL),
(27, 'Lập Trình Java', 'sach-lap-trinh-java', '3', NULL, NULL),
(28, 'Lập Trình Java-Android', 'sach-lap-trinh-java-android', '3', NULL, NULL),
(29, 'Lập Trình Java-Web/Servlet', 'sach-lap-trinh-java-web-servlet', '3', NULL, NULL),
(30, 'Lập Trình Web với PHP/Laravel', 'sach-lap-trinh-web-php', '3', NULL, NULL),
(31, 'Lập Trình Python', 'sach-lap-trinh-python', '3', NULL, NULL),
(32, 'Tin Công Nghệ', 'tin-cong-nghe', '4', '2018-11-28 11:40:09', '2018-11-28 11:40:09'),
(33, 'Tin khuyễn mại', 'tin-khuyen-mai', '4', '2018-11-28 11:40:31', '2018-11-28 11:40:31'),
(34, 'Sách GD Bậc Đại Học', 'sach-gd-bac-dai-hoc', '1', '2018-12-04 00:32:12', '2018-12-04 00:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `detail_img`
--

CREATE TABLE IF NOT EXISTS `detail_img` (
`id` int(10) unsigned NOT NULL,
  `images_url` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_13_131139_create_admin_users_table', 1),
('2016_11_24_011241_create_categor_table', 1),
('2016_11_24_011515_create_products_table', 1),
('2016_11_24_012823_create_pro_details_table', 1),
('2016_11_24_013636_create_detal_img_table', 1),
('2016_11_24_014238_create_news_table', 1),
('2016_11_24_014742_create_banners_table', 1),
('2016_12_01_161126_create_oders_table', 2),
('2016_12_02_015703_create_oders_detail_table', 3),
('2016_12_02_023327_create_oders_table', 4),
('2016_12_02_023343_create_oders_detail_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full` text COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `author`, `intro`, `full`, `images`, `tag`, `status`, `source`, `cat_id`, `created_at`, `updated_at`) VALUES
(2, 'Khoa Học Công Nghệ Bưu Chính Viễn Thông', 'khoa-hoc-cong-nghe-buu-chinh-vien-thong', 'PTIT', '<h2><font color="#000000" face="times new roman, times, serif"><span style="font-size:18px">K&igrave; thi ACM/ICPC ASIAN Hanoi 2018 v&agrave; k&igrave; thi Olimpic Tin Học 2018 diễn ra từ ng&agrave;y 27/11 đến ng&agrave;y 30/11 năm 2018 diễn ra tại Học vi', '<p>Được sự bảo trợ của Hiệp hội m&aacute;y t&iacute;nh (ACM), kỳ thi lập tr&igrave;nh quốc tế ACM/ICPC (International Collegiate Programming Contest) được tổ chức lần đầu ti&ecirc;n tại Mỹ v&agrave;o năm 1970, đến nay đ&atilde; thu h&uacute;t được h&agrave;ng chục ng&agrave;n sinh vi&ecirc;n xuất sắc nhất của c&aacute;c khoa trong lĩnh vực m&aacute;y t&iacute;nh từ hệ thống Đại học to&agrave;n cầu. Cuộc thi c&oacute; mục đ&iacute;ch nhằm ph&aacute;t triển sự s&aacute;ng tạo, l&agrave;m việc nh&oacute;m v&agrave; sự đổi mới trong c&aacute;ch x&acirc;y dựng c&aacute;c chương tr&igrave;nh phần mềm mới v&agrave; cho ph&eacute;p sinh vi&ecirc;n kiểm tra năng lực thực hiện của họ dưới một &aacute;p lực thời gian rất cao. Đ&acirc;y l&agrave; k&igrave; thi lập tr&igrave;nh l&acirc;u đời nhất, lớn nhất v&agrave; c&oacute; uy t&iacute;n nhất tr&ecirc;n thế giới.&nbsp;</p>\r\n\r\n<p><br />\r\nC&aacute;c trường đại học tr&ecirc;n to&agrave;n thế giới c&oacute; thể đăng k&yacute; trực tiếp dự thi trong khu vực của ch&acirc;u lục m&igrave;nh tr&ecirc;n mạng tại địa chỉ :&nbsp;<a href="http://cm2prod.baylor.edu/login.jsf">http://cm2prod.baylor.edu/login.jsf</a>, mỗi trường đại học đăng k&yacute; nhiều đội dự thi, mỗi đội gồm 3 sinh vi&ecirc;n v&agrave; 1 huấn luyện vi&ecirc;n. C&aacute;c đội sẽ phải giải từ 8-15 b&agrave;i, giải đ&uacute;ng qua hệ thống chấm tự động trực tuyến (test online) được 1 điểm, nộp chấm lại bị phạt thời gian th&ecirc;m 20 ph&uacute;t, nếu c&aacute;c đội c&oacute; c&ugrave;ng điểm sẽ được xếp thứ bậc căn cứ v&agrave;o thời gian nộp b&agrave;i giải được. Căn cứ v&agrave;o th&agrave;nh t&iacute;ch tại c&aacute;c điểm thi ch&acirc;u lục (mỗi ch&acirc;u lục được lựa chọn đến 20 điểm v&ograve;ng loại căn cứ theo số lượng đội trường đăng k&yacute;), c&aacute;c đội đứng đầu từng v&ograve;ng loại Ch&acirc;u lục sẽ được chọn v&agrave;o v&ograve;ng Chung kết (World Finals), mỗi năm được tổ chức tại một nước. Mỗi trường đại học chỉ c&oacute; thể c&oacute; một đội đại diện duy nhất v&agrave;o v&ograve;ng chung kết. V&ograve;ng chung kết sẽ l&agrave; trận đọ sức giữa 100 đội tuyển đến từ 100 trường đại học kh&aacute;c nhau đại diện cho c&aacute;c Ch&acirc;u lục tham gia (Ch&acirc;u &Aacute; thường được chọn 30 đội v&agrave;o Chung kết). Tại mỗi v&ograve;ng Chung kết chỉ trao giải đội V&ocirc; địch, 3 giải nhất, 4 giải Nh&igrave;, 4 giải Ba v&agrave; xếp hạng top 100 trường đội tuyển theo thứ tự điểm đạt được. C&aacute;c đội tuyển v&ocirc; địch trong 4 năm gần đ&acirc;y l&agrave;: Tổng hợp Warsaw (Ba lan) &ndash; Tokyo th&aacute;ng 4/2007, V&ocirc; địch ACM/ICPC 4/2008 v&agrave; ACM/ICPC 4/2009 tại Canada v&agrave; Thuỵ điển l&agrave; đội tuyển St. Petersburg University of IT, Mechanics and Optics (Nga), Năm 2010 tại C&aacute;p Nhĩ T&acirc;n - Trung Quốc V&ocirc; địch l&agrave; đội Đại học Giao Th&ocirc;ng Thượng Hải. Năm 2011 do sự cố Ai Cập, Chung kết ACM/ICPC to&agrave;n cầu tổ chức từ 27-31/5/2011 tại Orlando Hoa Kỳ, V&ocirc; địch l&agrave; đội đến từ Đại học Zheijang - đội v&ocirc; địch tại v&ograve;ng loại Ch&acirc;u &Aacute; - ACM/ICPC H&agrave; Nội năm 2010.&nbsp;Năm 2012 World Final tại Warsaw&nbsp; - Ba Lan,&nbsp;đội tuyển St. Petersburg University of IT, Mechanics and Optics (Nga)&nbsp;V&ocirc; địch.&nbsp;Năm 2012 do Malasia bỏ đăng cai,Chung kết ACM/ICPC to&agrave;n cầu tổ chức từ 29/6-4/7/2013 tại St.Petersburg Nga, V&ocirc; địch lại l&agrave;&nbsp;đội tuyển St. Petersburg University of IT, Mechanics and Optics (Nga).&nbsp;<br />\r\nKỳ thi lập tr&igrave;nh quốc tế ACM/ICPC năm 2013 đ&atilde; c&oacute; 29,479 sinh vi&ecirc;n tham gia từ 2232 trường đại học (91 quốc gia) thi đấu tại tr&ecirc;n 300 v&ograve;ng loại quốc gia v&agrave; Ch&acirc;u lục lựa chọn hơn 100 đội tuyển từ v&ograve;ng loại dự ACM/ICPC World Finals tổ chức th&aacute;ng 6/2014 tại Ekaterinburg Nga.</p>\r\n', '1545300244_icpc_logo.png', 'Khoa Học,Khoa Học Công Nghệ', 1, 'http://portal.ptit.edu.vn/', 32, '2018-12-20 03:04:04', '2018-12-20 03:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE IF NOT EXISTS `oders` (
`id` int(10) unsigned NOT NULL,
  `c_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `total` float NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `c_id`, `qty`, `sub_total`, `total`, `status`, `type`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50000, 50000, 1, 'cod', '                    \r\n                  abc', '2018-12-05 01:58:00', '2018-12-05 05:03:26'),
(2, 1, 5, 250000, 250000, 1, 'cod', '                    \r\n                  rregsfvwa', '2018-12-05 05:33:26', '2018-12-05 05:34:53'),
(3, 1, 3, 90000, 90000, 0, 'cod', '  sfdsv', '2018-12-05 05:45:59', '2018-12-05 05:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `oders_detail`
--

CREATE TABLE IF NOT EXISTS `oders_detail` (
`id` int(10) unsigned NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `o_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `oders_detail`
--

INSERT INTO `oders_detail` (`id`, `pro_id`, `qty`, `o_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2018-12-05 01:58:00', '2018-12-05 01:58:00'),
(2, 2, 5, 2, '2018-12-05 05:33:26', '2018-12-05 05:33:26'),
(3, 2, 1, 3, '2018-12-05 05:45:59', '2018-12-05 05:45:59'),
(4, 4, 2, 3, '2018-12-05 05:45:59', '2018-12-05 05:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `note`, `images`, `price`, `status`, `cat_id`, `created_at`, `updated_at`, `intro`) VALUES
(2, 'SGK Toán Lớp 1', 'sgk-toan-lop-1', 'Sách Giáo Khoa Lớp 1', '1545299036_toanlop1.jpg', 50000, 1, 5, '2018-12-05 01:54:24', '2018-12-20 02:46:36', 'sách phục vụ giảng dạy'),
(4, 'SGK Toán Lớp 2', 'sgk-toan-lop-2', 'Sách Giáo Khoa Lớp 2', '1545299094_toanlop2.jpg', 20000, 1, 6, '2018-12-05 05:43:54', '2018-12-20 02:47:07', 'sách phục vụ giảng dạy'),
(5, 'Ngữ Pháp Tiếng Nhật Cơ Bản', 'ngu-phap-tieng-nhat-co-ban', 'Sách Học Tiếng Nhật', '1545299358_Japan.jpg', 100000, 1, 18, '2018-12-13 09:22:07', '2018-12-20 02:49:17', 'sách phục vụ giảng dạy'),
(6, 'Lập Trình C/C++ căn bản', 'lap-trinh-cc-can-ban', 'Sách Học LT Basic ', '1545299753_C_Cplus.jpg', 500000, 1, 26, '2018-12-13 09:25:08', '2018-12-20 02:55:53', 'sách phục vụ giảng dạy'),
(7, 'Tiếng Hàn Cơ Bản', 'tieng-han-co-ban', 'Sách Học Tiếng Hàn', '1545299541_korea.jpg', 100000, 1, 19, '2018-12-13 09:48:29', '2018-12-20 02:52:21', 'sách phục vụ giảng dạy');

-- --------------------------------------------------------

--
-- Table structure for table `pro_details`
--

CREATE TABLE IF NOT EXISTS `pro_details` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pub_company` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pro_details`
--

INSERT INTO `pro_details` (`id`, `name`, `author`, `note`, `pro_id`, `created_at`, `updated_at`, `pub_company`) VALUES
(1, 'SGK Toán Lớp 1', 'Bộ Giáo Dục', 'Sách Giáo Khoa Lớp 1', 2, '2018-12-05 01:54:24', '2018-12-20 02:46:36', 'Nhà XB Giáo Dục Hà Nội'),
(3, 'SGK Toán Lớp 2', 'Bộ Giáo Dục', 'Sách Giáo Khoa Lớp 2', 4, '2018-12-05 05:43:54', '2018-12-20 02:47:07', 'Nhà XB Giáo Dục Hà Nội'),
(4, 'Ngữ Pháp Tiếng Nhật Cơ Bản', 'Bộ Giáo Dục', 'Sách Học Tiếng Nhật', 5, '2018-12-13 09:22:07', '2018-12-20 02:49:18', 'Nhà XB Thời Đại'),
(5, 'Lập Trình C/C++ căn bản', 'Đại Học Bách Khoa Hà Nội', 'Sách Học LT Basic ', 6, '2018-12-13 09:25:08', '2018-12-20 02:55:53', 'Nhà XB Đại Học Bách Khoa Hà Nội'),
(6, 'Tiếng Hàn Cơ Bản', 'Bộ Giáo Dục', 'Sách Học Tiếng Hàn', 7, '2018-12-13 09:48:29', '2018-12-20 02:52:21', 'Nhà XB Giải Trí');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HaQuang', 'quang97ptit@gmail.com', '$2y$10$TNWBODgJHJ9Gxy2VeyU65eVXVlMuDmEhb33ddehxNEJqB3DZG4HK2', '0333576797', 'Hà Nội', 1, 'S2ACZNeWP5i0C2NskfAGVGUEk31onWXohXttoiZXF2QHUrMWRO72RRzhqKyC', '2018-12-04 00:38:15', '2018-12-05 05:39:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`), ADD KEY `banners_user_id_foreign` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_img`
--
ALTER TABLE `detail_img`
 ADD PRIMARY KEY (`id`), ADD KEY `detail_img_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `news_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
 ADD PRIMARY KEY (`id`), ADD KEY `oders_c_id_foreign` (`c_id`);

--
-- Indexes for table `oders_detail`
--
ALTER TABLE `oders_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `oders_detail_pro_id_foreign` (`pro_id`), ADD KEY `oders_detail_o_id_foreign` (`o_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `pro_details`
--
ALTER TABLE `pro_details`
 ADD PRIMARY KEY (`id`), ADD KEY `pro_details_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `detail_img`
--
ALTER TABLE `detail_img`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `oders_detail`
--
ALTER TABLE `oders_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pro_details`
--
ALTER TABLE `pro_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
ADD CONSTRAINT `banners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_img`
--
ALTER TABLE `detail_img`
ADD CONSTRAINT `detail_img_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oders`
--
ALTER TABLE `oders`
ADD CONSTRAINT `oders_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `oders_detail`
--
ALTER TABLE `oders_detail`
ADD CONSTRAINT `oders_detail_o_id_foreign` FOREIGN KEY (`o_id`) REFERENCES `oders` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `oders_detail_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pro_details`
--
ALTER TABLE `pro_details`
ADD CONSTRAINT `pro_details_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
