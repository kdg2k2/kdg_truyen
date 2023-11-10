-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 01:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdgtruyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `id_truyen`, `id_user`, `noidung`, `created_at`, `updated_at`) VALUES
(26, 7, 1, 'test comment :v', '2023-11-08 08:32:34', '2023-11-08 08:32:34'),
(27, 2, 1, 'cmt', '2023-11-08 08:32:56', '2023-11-08 08:32:56'),
(28, 6, 1, 'asvdav', '2023-11-08 08:33:15', '2023-11-08 08:33:15'),
(29, 6, 1, 'aebdvas', '2023-11-08 08:33:23', '2023-11-08 08:33:23'),
(45, 9, 1, 'abc', '2023-11-09 06:33:21', '2023-11-09 06:33:21'),
(46, 9, 1, '123', '2023-11-09 06:36:35', '2023-11-09 06:36:35'),
(47, 9, 1, '333', '2023-11-09 06:36:51', '2023-11-09 06:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `dislike_table`
--

CREATE TABLE `dislike_table` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_truyen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dislike_table`
--

INSERT INTO `dislike_table` (`id`, `id_user`, `id_truyen`) VALUES
(5, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `lichsu`
--

CREATE TABLE `lichsu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tap` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lichsu`
--

INSERT INTO `lichsu` (`id`, `id_tap`, `id_user`, `id_truyen`) VALUES
(2, 13, 1, 4),
(4, 29, 1, 6),
(6, 31, 2, 6),
(7, 11, 2, 3),
(10, 33, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_truyen` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`id`, `id_user`, `id_truyen`) VALUES
(11, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_08_09_133651_theloai', 1),
(4, '2023_08_09_133744_tacgia', 1),
(5, '2023_08_09_133842_truyen', 1),
(6, '2023_08_09_133948_tap', 1),
(7, '2023_08_09_134039_theodoi', 1),
(8, '2023_08_09_134119_lichsu', 1),
(9, '2023_08_09_134140_binhluan', 1),
(10, '2023_08_09_142331_truyen_tacgia', 1),
(11, '2023_08_09_142418_truyen_theloai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `url`, `des`, `status`) VALUES
(1, 'http://127.0.0.1:8001/gaygocap99/29', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentacgia` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`id`, `tentacgia`) VALUES
(1, 'Đang cập nhật'),
(2, 'Murata Yuusuke'),
(3, 'Kanzaki kurone'),
(4, 'Eiichiro Oda');

-- --------------------------------------------------------

--
-- Table structure for table `tap`
--

CREATE TABLE `tap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tap`
--

INSERT INTO `tap` (`id`, `tentap`, `id_truyen`, `path`, `created_at`, `updated_at`) VALUES
(6, 'Chap 1', 2, '[\"truyen\\/2\\/Chap 1\\/1697092631000.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631001.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631002.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631003.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631004.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631005.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631006.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631007.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631008.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631009.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631010.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631011.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631012.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631013.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631014.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631015.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631016.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631017.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631018.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631019.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631020.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631021.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631022.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631023.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631024.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631025.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631026.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631027.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631028.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631029.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631030.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631031.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631032.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631033.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631034.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631035.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631036.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631037.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631038.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631039.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631040.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631041.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631042.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631043.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631044.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631045.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631046.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631047.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631048.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631049.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631050.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631051.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631052.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631053.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631054.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631055.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631056.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631057.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631058.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631059.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631060.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631061.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631062.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631063.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631064.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631065.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631066.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631067.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631068.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631069.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631070.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631071.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631072.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631073.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631074.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631075.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631076.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631077.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631078.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631079.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631080.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631081.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631082.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631083.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631084.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631085.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631086.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631087.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631088.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631089.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631090.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631091.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631092.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631093.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631094.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631095.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631096.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631097.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631098.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631099.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631100.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631101.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631102.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631103.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631104.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631105.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631106.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631107.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631108.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631109.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631110.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631111.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631112.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631113.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631114.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631115.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631116.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631117.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631118.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631119.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631120.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631121.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631122.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631123.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631124.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631125.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631126.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631127.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631128.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631129.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631130.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631131.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631132.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631133.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631134.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631135.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631136.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631137.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631138.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631139.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631140.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631141.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631142.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631143.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631144.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631145.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631146.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631147.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631148.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631149.jpg\",\"truyen\\/2\\/Chap 1\\/1697092631150.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632151.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632152.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632153.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632154.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632155.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632156.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632157.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632158.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632159.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632160.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632161.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632162.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632163.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632164.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632165.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632166.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632167.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632168.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632169.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632170.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632171.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632172.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632173.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632174.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632175.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632176.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632177.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632178.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632179.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632180.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632181.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632182.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632183.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632184.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632185.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632186.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632187.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632188.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632189.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632190.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632191.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632192.jpg\",\"truyen\\/2\\/Chap 1\\/1697092632193.jpg\"]', '2023-10-12 06:37:12', '2023-10-12 06:37:12'),
(7, 'Chap 2', 2, '[\"truyen\\/2\\/Chap 2\\/1697092661000.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661001.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661002.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661003.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661004.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661005.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661006.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661007.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661008.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661009.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661010.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661011.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661012.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661013.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661014.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661015.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661016.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661017.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661018.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661019.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661020.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661021.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661022.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661023.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661024.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661025.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661026.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661027.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661028.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661029.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661030.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661031.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661032.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661033.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661034.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661035.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661036.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661037.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661038.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661039.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661040.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661041.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661042.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661043.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661044.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661045.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661046.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661047.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661048.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661049.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661050.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661051.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661052.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661053.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661054.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661055.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661056.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661057.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661058.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661059.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661060.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661061.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661062.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661063.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661064.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661065.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661066.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661067.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661068.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661069.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661070.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661071.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661072.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661073.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661074.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661075.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661076.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661077.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661078.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661079.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661080.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661081.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661082.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661083.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661084.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661085.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661086.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661087.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661088.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661089.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661090.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661091.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661092.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661093.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661094.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661095.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661096.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661097.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661098.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661099.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661100.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661101.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661102.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661103.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661104.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661105.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661106.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661107.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661108.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661109.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661110.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661111.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661112.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661113.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661114.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661115.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661116.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661117.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661118.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661119.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661120.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661121.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661122.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661123.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661124.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661125.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661126.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661127.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661128.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661129.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661130.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661131.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661132.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661133.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661134.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661135.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661136.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661137.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661138.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661139.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661140.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661141.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661142.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661143.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661144.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661145.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661146.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661147.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661148.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661149.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661150.jpg\",\"truyen\\/2\\/Chap 2\\/1697092661151.jpg\",\"truyen\\/2\\/Chap 2\\/1697092662152.jpg\"]', '2023-10-12 06:37:42', '2023-10-12 06:37:42'),
(8, 'Chap 3', 2, '[\"truyen\\/2\\/Chap 3\\/1697092687000.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687001.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687002.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687003.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687004.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687005.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687006.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687007.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687008.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687009.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687010.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687011.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687012.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687013.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687014.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687015.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687016.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687017.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687018.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687019.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687020.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687021.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687022.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687023.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687024.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687025.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687026.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687027.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687028.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687029.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687030.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687031.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687032.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687033.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687034.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687035.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687036.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687037.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687038.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687039.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687040.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687041.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687042.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687043.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687044.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687045.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687046.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687047.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687048.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687049.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687050.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687051.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687052.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687053.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687054.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687055.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687056.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687057.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687058.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687059.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687060.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687061.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687062.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687063.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687064.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687065.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687066.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687067.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687068.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687069.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687070.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687071.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687072.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687073.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687074.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687075.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687076.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687077.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687078.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687079.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687080.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687081.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687082.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687083.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687084.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687085.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687086.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687087.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687088.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687089.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687090.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687091.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687092.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687093.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687094.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687095.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687096.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687097.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687098.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687099.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687100.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687101.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687102.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687103.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687104.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687105.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687106.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687107.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687108.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687109.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687110.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687111.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687112.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687113.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687114.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687115.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687116.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687117.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687118.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687119.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687120.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687121.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687122.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687123.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687124.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687125.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687126.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687127.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687128.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687129.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687130.jpg\",\"truyen\\/2\\/Chap 3\\/1697092687131.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688132.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688133.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688134.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688135.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688136.jpg\",\"truyen\\/2\\/Chap 3\\/1697092688137.jpg\"]', '2023-10-12 06:38:08', '2023-10-12 06:38:08'),
(9, 'Chap 4', 2, '[\"truyen\\/2\\/Chap 4\\/1697092708000.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708001.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708002.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708003.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708004.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708005.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708006.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708007.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708008.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708009.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708010.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708011.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708012.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708013.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708014.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708015.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708016.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708017.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708018.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708019.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708020.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708021.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708022.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708023.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708024.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708025.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708026.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708027.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708028.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708029.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708030.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708031.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708032.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708033.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708034.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708035.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708036.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708037.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708038.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708039.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708040.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708041.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708042.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708043.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708044.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708045.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708046.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708047.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708048.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708049.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708050.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708051.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708052.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708053.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708054.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708055.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708056.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708057.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708058.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708059.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708060.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708061.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708062.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708063.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708064.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708065.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708066.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708067.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708068.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708069.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708070.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708071.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708072.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708073.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708074.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708075.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708076.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708077.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708078.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708079.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708080.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708081.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708082.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708083.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708084.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708085.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708086.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708087.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708088.jpg\",\"truyen\\/2\\/Chap 4\\/1697092708089.jpg\"]', '2023-10-12 06:38:28', '2023-10-12 06:38:28'),
(10, 'Chap 1.1', 3, '[\"truyen\\/3\\/Chap 1\\/1697092738000.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738001.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738002.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738003.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738004.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738005.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738006.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738007.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738008.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738009.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738010.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738011.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738012.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738013.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738014.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738015.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738016.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738017.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738018.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738019.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738020.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738021.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738022.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738023.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738024.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738025.jpg\",\"truyen\\/3\\/Chap 1\\/1697092738026.jpg\"]', '2023-10-12 06:38:58', '2023-10-12 06:39:32'),
(11, 'Chap 1.2', 3, '[\"truyen\\/3\\/Chap 1.2\\/1697092765000.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765001.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765002.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765003.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765004.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765005.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765006.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765007.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765008.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765009.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765010.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765011.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765012.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765013.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765014.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765015.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765016.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765017.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765018.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765019.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765020.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765021.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765022.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765023.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765024.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765025.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765026.jpg\",\"truyen\\/3\\/Chap 1.2\\/1697092765027.jpg\"]', '2023-10-12 06:39:25', '2023-10-12 06:39:25'),
(12, 'Chap 2', 3, '[\"truyen\\/3\\/Chap 2\\/1697092793000.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793001.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793002.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793003.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793004.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793005.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793006.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793007.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793008.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793009.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793010.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793011.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793012.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793013.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793014.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793015.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793016.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793017.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793018.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793019.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793020.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793021.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793022.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793023.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793024.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793025.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793026.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793027.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793028.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793029.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793030.jpg\",\"truyen\\/3\\/Chap 2\\/1697092793031.jpg\"]', '2023-10-12 06:39:53', '2023-10-12 06:39:53'),
(13, 'Chap 1', 4, '[\"truyen\\/4\\/Chap 1\\/1697092837000.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837001.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837002.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837003.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837004.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837005.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837006.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837007.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837008.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837009.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837010.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837011.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837012.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837013.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837014.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837015.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837016.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837017.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837018.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837019.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837020.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837021.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837022.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837023.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837024.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837025.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837026.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837027.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837028.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837029.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837030.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837031.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837032.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837033.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837034.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837035.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837036.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837037.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837038.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837039.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837040.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837041.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837042.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837043.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837044.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837045.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837046.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837047.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837048.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837049.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837050.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837051.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837052.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837053.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837054.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837055.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837056.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837057.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837058.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837059.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837060.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837061.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837062.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837063.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837064.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837065.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837066.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837067.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837068.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837069.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837070.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837071.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837072.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837073.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837074.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837075.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837076.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837077.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837078.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837079.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837080.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837081.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837082.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837083.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837084.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837085.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837086.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837087.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837088.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837089.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837090.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837091.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837092.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837093.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837094.jpg\",\"truyen\\/4\\/Chap 1\\/1697092837095.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838096.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838097.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838098.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838099.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838100.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838101.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838102.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838103.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838104.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838105.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838106.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838107.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838108.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838109.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838110.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838111.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838112.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838113.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838114.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838115.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838116.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838117.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838118.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838119.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838120.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838121.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838122.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838123.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838124.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838125.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838126.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838127.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838128.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838129.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838130.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838131.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838132.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838133.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838134.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838135.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838136.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838137.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838138.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838139.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838140.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838141.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838142.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838143.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838144.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838145.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838146.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838147.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838148.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838149.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838150.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838151.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838152.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838153.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838154.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838155.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838156.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838157.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838158.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838159.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838160.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838161.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838162.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838163.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838164.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838165.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838166.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838167.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838168.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838169.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838170.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838171.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838172.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838173.jpg\",\"truyen\\/4\\/Chap 1\\/1697092838174.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839175.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839176.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839177.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839178.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839179.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839180.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839181.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839182.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839183.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839184.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839185.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839186.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839187.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839188.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839189.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839190.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839191.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839192.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839193.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839194.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839195.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839196.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839197.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839198.jpg\",\"truyen\\/4\\/Chap 1\\/1697092839199.jpg\"]', '2023-10-12 06:40:39', '2023-10-12 06:40:39'),
(14, 'Chap 2', 4, '[\"truyen\\/4\\/Chap 2\\/1697093953000.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953001.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953002.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953003.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953004.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953005.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953006.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953007.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953008.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953009.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953010.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953011.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953012.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953013.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953014.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953015.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953016.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953017.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953018.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953019.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953020.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953021.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953022.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953023.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953024.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953025.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953026.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953027.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953028.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953029.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953030.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953031.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953032.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953033.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953034.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953035.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953036.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953037.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953038.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953039.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953040.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953041.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953042.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953043.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953044.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953045.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953046.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953047.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953048.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953049.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953050.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953051.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953052.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953053.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953054.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953055.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953056.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953057.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953058.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953059.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953060.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953061.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953062.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953063.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953064.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953065.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953066.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953067.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953068.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953069.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953070.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953071.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953072.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953073.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953074.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953075.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953076.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953077.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953078.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953079.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953080.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953081.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953082.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953083.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953084.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953085.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953086.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953087.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953088.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953089.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953090.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953091.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953092.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953093.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953094.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953095.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953096.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953097.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953098.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953099.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953100.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953101.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953102.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953103.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953104.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953105.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953106.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953107.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953108.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953109.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953110.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953111.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953112.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953113.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953114.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953115.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953116.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953117.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953118.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953119.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953120.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953121.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953122.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953123.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953124.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953125.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953126.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953127.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953128.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953129.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953130.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953131.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953132.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953133.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953134.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953135.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953136.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953137.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953138.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953139.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953140.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953141.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953142.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953143.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953144.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953145.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953146.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953147.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953148.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953149.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953150.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953151.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953152.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953153.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953154.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953155.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953156.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953157.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953158.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953159.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953160.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953161.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953162.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953163.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953164.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953165.jpg\",\"truyen\\/4\\/Chap 2\\/1697093953166.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954167.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954168.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954169.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954170.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954171.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954172.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954173.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954174.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954175.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954176.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954177.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954178.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954179.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954180.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954181.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954182.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954183.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954184.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954185.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954186.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954187.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954188.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954189.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954190.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954191.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954192.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954193.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954194.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954195.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954196.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954197.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954198.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954199.jpg\",\"truyen\\/4\\/Chap 2\\/1697093954200.jpg\"]', '2023-10-12 06:59:14', '2023-10-12 06:59:14');
INSERT INTO `tap` (`id`, `tentap`, `id_truyen`, `path`, `created_at`, `updated_at`) VALUES
(15, 'Chap 3', 4, '[\"truyen\\/4\\/Chap 3\\/1697094013000.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013001.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013002.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013003.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013004.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013005.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013006.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013007.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013008.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013009.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013010.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013011.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013012.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013013.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013014.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013015.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013016.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013017.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013018.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013019.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013020.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013021.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013022.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013023.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013024.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013025.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013026.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013027.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013028.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013029.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013030.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013031.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013032.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013033.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013034.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013035.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013036.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013037.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013038.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013039.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013040.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013041.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013042.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013043.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013044.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013045.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013046.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013047.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013048.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013049.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013050.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013051.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013052.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013053.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013054.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013055.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013056.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013057.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013058.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013059.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013060.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013061.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013062.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013063.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013064.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013065.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013066.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013067.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013068.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013069.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013070.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013071.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013072.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013073.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013074.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013075.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013076.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013077.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013078.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013079.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013080.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013081.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013082.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013083.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013084.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013085.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013086.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013087.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013088.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013089.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013090.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013091.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013092.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013093.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013094.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013095.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013096.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013097.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013098.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013099.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013100.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013101.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013102.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013103.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013104.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013105.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013106.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013107.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013108.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013109.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013110.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013111.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013112.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013113.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013114.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013115.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013116.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013117.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013118.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013119.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013120.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013121.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013122.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013123.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013124.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013125.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013126.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013127.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013128.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013129.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013130.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013131.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013132.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013133.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013134.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013135.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013136.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013137.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013138.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013139.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013140.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013141.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013142.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013143.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013144.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013145.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013146.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013147.jpg\",\"truyen\\/4\\/Chap 3\\/1697094013148.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014149.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014150.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014151.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014152.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014153.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014154.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014155.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014156.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014157.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014158.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014159.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014160.jpg\",\"truyen\\/4\\/Chap 3\\/1697094014161.jpg\"]', '2023-10-12 07:00:14', '2023-10-12 07:00:14'),
(16, 'Chap 4', 4, '[\"truyen\\/4\\/Chap 4\\/1697094039000.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039001.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039002.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039003.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039004.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039005.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039006.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039007.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039008.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039009.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039010.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039011.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039012.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039013.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039014.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039015.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039016.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039017.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039018.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039019.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039020.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039021.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039022.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039023.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039024.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039025.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039026.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039027.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039028.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039029.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039030.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039031.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039032.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039033.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039034.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039035.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039036.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039037.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039038.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039039.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039040.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039041.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039042.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039043.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039044.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039045.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039046.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039047.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039048.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039049.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039050.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039051.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039052.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039053.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039054.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039055.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039056.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039057.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039058.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039059.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039060.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039061.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039062.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039063.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039064.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039065.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039066.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039067.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039068.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039069.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039070.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039071.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039072.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039073.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039074.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039075.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039076.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039077.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039078.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039079.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039080.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039081.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039082.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039083.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039084.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039085.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039086.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039087.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039088.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039089.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039090.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039091.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039092.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039093.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039094.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039095.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039096.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039097.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039098.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039099.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039100.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039101.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039102.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039103.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039104.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039105.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039106.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039107.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039108.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039109.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039110.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039111.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039112.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039113.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039114.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039115.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039116.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039117.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039118.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039119.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039120.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039121.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039122.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039123.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039124.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039125.jpg\",\"truyen\\/4\\/Chap 4\\/1697094039126.jpg\"]', '2023-10-12 07:00:39', '2023-10-12 07:00:39'),
(17, 'Chap 1', 8, '[\"truyen\\/8\\/Chap 1\\/1697094070000.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070001.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070002.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070003.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070004.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070005.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070006.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070007.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070008.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070009.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070010.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070011.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070012.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070013.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070014.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070015.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070016.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070017.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070018.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070019.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070020.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070021.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070022.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070023.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070024.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070025.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070026.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070027.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070028.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070029.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070030.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070031.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070032.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070033.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070034.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070035.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070036.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070037.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070038.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070039.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070040.jpg\",\"truyen\\/8\\/Chap 1\\/1697094070041.jpg\"]', '2023-10-12 07:01:10', '2023-10-12 07:01:10'),
(18, 'Chap 2', 8, '[\"truyen\\/8\\/Chap 2\\/1697094091000.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091001.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091002.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091003.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091004.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091005.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091006.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091007.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091008.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091009.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091010.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091011.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091012.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091013.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091014.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091015.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091016.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091017.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091018.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091019.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091020.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091021.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091022.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091023.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091024.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091025.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091026.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091027.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091028.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091029.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091030.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091031.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091032.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091033.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091034.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091035.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091036.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091037.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091038.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091039.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091040.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091041.jpg\",\"truyen\\/8\\/Chap 2\\/1697094091042.jpg\"]', '2023-10-12 07:01:31', '2023-10-12 07:01:31'),
(19, 'Chap 3', 8, '[\"truyen\\/8\\/Chap 3\\/1697094112000.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112001.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112002.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112003.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112004.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112005.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112006.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112007.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112008.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112009.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112010.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112011.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112012.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112013.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112014.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112015.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112016.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112017.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112018.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112019.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112020.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112021.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112022.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112023.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112024.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112025.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112026.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112027.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112028.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112029.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112030.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112031.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112032.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112033.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112034.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112035.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112036.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112037.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112038.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112039.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112040.jpg\",\"truyen\\/8\\/Chap 3\\/1697094112041.jpg\"]', '2023-10-12 07:01:52', '2023-10-12 07:01:52'),
(20, 'Chap 4', 8, '[\"truyen\\/8\\/Chap 4\\/1697094145000.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145001.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145002.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145003.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145004.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145005.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145006.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145007.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145008.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145009.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145010.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145011.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145012.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145013.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145014.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145015.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145016.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145017.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145018.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145019.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145020.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145021.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145022.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145023.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145024.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145025.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145026.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145027.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145028.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145029.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145030.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145031.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145032.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145033.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145034.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145035.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145036.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145037.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145038.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145039.jpg\",\"truyen\\/8\\/Chap 4\\/1697094145040.jpg\"]', '2023-10-12 07:02:25', '2023-10-12 07:02:25'),
(21, 'Chap 5', 8, '[\"truyen\\/8\\/Chap 5\\/1697094168000.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168001.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168002.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168003.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168004.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168005.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168006.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168007.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168008.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168009.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168010.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168011.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168012.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168013.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168014.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168015.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168016.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168017.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168018.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168019.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168020.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168021.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168022.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168023.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168024.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168025.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168026.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168027.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168028.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168029.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168030.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168031.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168032.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168033.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168034.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168035.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168036.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168037.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168038.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168039.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168040.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168041.jpg\",\"truyen\\/8\\/Chap 5\\/1697094168042.jpg\"]', '2023-10-12 07:02:48', '2023-10-12 07:02:48'),
(24, 'Chap 1', 7, '[\"truyen\\/7\\/Chap 1\\/1697094251000.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251001.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251002.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251003.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251004.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251005.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251006.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251007.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251008.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251009.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251010.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251011.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251012.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251013.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251014.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251015.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251016.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251017.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251018.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251019.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251020.jpg\",\"truyen\\/7\\/Chap 1\\/1697094251021.jpg\"]', '2023-10-12 07:04:11', '2023-10-12 07:04:11'),
(25, 'Chap 2', 7, '[\"truyen\\/7\\/Chap 2\\/1697094272000.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272001.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272002.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272003.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272004.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272005.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272006.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272007.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272008.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272009.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272010.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272011.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272012.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272013.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272014.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272015.jpg\",\"truyen\\/7\\/Chap 2\\/1697094272016.jpg\"]', '2023-10-12 07:04:32', '2023-10-12 07:04:32'),
(26, 'Chap 3', 7, '[\"truyen\\/7\\/Chap 3\\/1697094398000.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398001.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398002.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398003.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398004.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398005.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398006.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398007.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398008.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398009.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398010.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398011.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398012.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398013.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398014.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398015.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398016.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398017.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398018.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398019.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398020.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398021.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398022.jpg\",\"truyen\\/7\\/Chap 3\\/1697094398023.jpg\"]', '2023-10-12 07:06:38', '2023-10-12 07:06:38'),
(27, 'Chap 4', 7, '[\"truyen\\/7\\/Chap 4\\/1697094428000.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428001.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428002.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428003.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428004.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428005.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428006.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428007.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428008.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428009.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428010.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428011.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428012.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428013.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428014.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428015.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428016.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428017.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428018.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428019.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428020.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428021.jpg\",\"truyen\\/7\\/Chap 4\\/1697094428022.jpg\"]', '2023-10-12 07:07:08', '2023-10-12 07:07:08'),
(28, 'Chap 5', 7, '[\"truyen\\/7\\/Chap 5\\/1697094452000.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452001.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452002.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452003.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452004.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452005.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452006.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452007.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452008.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452009.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452010.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452011.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452012.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452013.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452014.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452015.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452016.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452017.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452018.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452019.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452020.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452021.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452022.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452023.jpg\",\"truyen\\/7\\/Chap 5\\/1697094452024.jpg\"]', '2023-10-12 07:07:32', '2023-10-12 07:07:32'),
(29, 'Chap 1', 6, '[\"truyen\\/6\\/Chap 1\\/1697094479000.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479001.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479002.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479003.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479004.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479005.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479006.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479007.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479008.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479009.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479010.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479011.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479012.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479013.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479014.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479015.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479016.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479017.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479018.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479019.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479020.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479021.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479022.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479023.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479024.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479025.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479026.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479027.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479028.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479029.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479030.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479031.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479032.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479033.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479034.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479035.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479036.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479037.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479038.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479039.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479040.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479041.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479042.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479043.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479044.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479045.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479046.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479047.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479048.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479049.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479050.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479051.jpg\",\"truyen\\/6\\/Chap 1\\/1697094479052.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480053.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480054.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480055.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480056.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480057.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480058.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480059.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480060.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480061.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480062.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480063.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480064.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480065.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480066.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480067.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480068.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480069.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480070.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480071.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480072.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480073.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480074.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480075.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480076.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480077.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480078.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480079.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480080.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480081.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480082.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480083.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480084.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480085.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480086.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480087.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480088.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480089.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480090.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480091.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480092.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480093.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480094.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480095.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480096.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480097.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480098.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480099.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480100.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480101.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480102.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480103.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480104.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480105.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480106.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480107.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480108.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480109.jpg\",\"truyen\\/6\\/Chap 1\\/1697094480110.jpg\"]', '2023-10-12 07:08:00', '2023-10-12 07:08:00'),
(30, 'Chap 6', 7, '[\"truyen\\/7\\/Chap 6\\/1697645348000.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348001.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348002.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348003.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348004.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348005.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348006.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348007.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348008.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348009.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348010.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348011.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348012.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348013.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348014.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348015.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348016.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348017.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348018.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348019.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348020.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348021.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348022.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348023.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348024.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348025.jpg\",\"truyen\\/7\\/Chap 6\\/1697645348026.jpg\"]', '2023-10-18 16:09:08', '2023-10-18 16:09:08'),
(31, 'Chương 1.5', 6, '[\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671000.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671001.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671002.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671003.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671004.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671005.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671006.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671007.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671008.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671009.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671010.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671011.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671012.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671013.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671014.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671015.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671016.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671017.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671018.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671019.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671020.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671021.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671022.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671023.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671024.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671025.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671026.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671027.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671028.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671029.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671030.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671031.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671032.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671033.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671034.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671035.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671036.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671037.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671038.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671039.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671040.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671041.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671042.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671043.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671044.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671045.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671046.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671047.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671048.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671049.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671050.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671051.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671052.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671053.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671054.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671055.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671056.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671057.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671058.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671059.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671060.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671061.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103671062.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672063.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672064.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672065.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672066.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672067.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672068.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672069.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672070.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672071.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672072.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672073.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672074.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672075.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672076.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672077.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672078.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672079.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672080.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672081.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103672082.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673083.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673084.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673085.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673086.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673087.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673088.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673089.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673090.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673091.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673092.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673093.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673094.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673096.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673097.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673098.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673099.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673100.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673101.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103673102.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674103.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674104.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674105.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674106.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674107.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674108.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674109.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674110.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674111.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674112.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674113.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674114.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674115.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674116.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674117.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674118.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674119.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674120.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674121.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674122.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674123.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674124.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674125.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674126.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674127.jpg\",\"truyen\\/6\\/Ch\\u01b0\\u01a1ng 1.5\\/1699103674128.jpg\"]', '2023-11-04 13:14:34', '2023-11-04 13:14:34'),
(33, 'Chap 1', 9, '[\"truyen\\/9\\/Chap 1\\/1699419142000.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142001.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142002.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142003.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142004.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142005.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142006.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142007.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142008.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142009.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142010.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142011.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142012.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142013.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142014.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142015.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142016.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142017.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142018.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142019.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142020.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142021.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142022.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142023.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142024.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142025.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142026.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142027.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142028.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142029.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142030.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142031.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142032.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142033.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142034.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142035.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142036.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142037.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142038.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142039.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142040.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142041.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142042.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142043.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142044.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142045.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142046.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142047.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142048.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142049.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142050.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142051.jpg\",\"truyen\\/9\\/Chap 1\\/1699419142052.jpg\"]', '2023-11-08 04:52:22', '2023-11-08 04:52:22'),
(34, 'Chap 2', 9, '[\"truyen\\/9\\/Chap 2\\/1699419194000.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194001.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194002.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194003.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194004.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194005.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194006.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194007.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194008.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194009.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194010.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194011.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194012.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194013.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194014.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194015.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194016.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194017.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194018.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194019.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194020.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194021.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194022.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194023.jpg\",\"truyen\\/9\\/Chap 2\\/1699419194024.jpg\"]', '2023-11-08 04:53:14', '2023-11-08 04:53:14'),
(35, 'Chap 3', 9, '[\"truyen\\/9\\/Chap 3\\/1699419226000.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226001.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226002.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226003.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226004.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226005.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226006.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226007.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226008.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226009.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226010.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226011.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226012.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226013.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226014.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226015.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226016.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226017.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226018.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226019.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226020.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226021.jpg\",\"truyen\\/9\\/Chap 3\\/1699419226022.jpg\"]', '2023-11-08 04:53:46', '2023-11-08 04:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentheloai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`, `mota`) VALUES
(1, 'Action', NULL),
(3, 'Adventure', NULL),
(4, 'Anime', NULL),
(5, 'Chuyển Sinh', NULL),
(6, 'Cổ Đại', NULL),
(7, 'Comedy', NULL),
(8, 'Comic', NULL),
(9, 'Demons', NULL),
(10, 'Detective', NULL),
(11, 'Doujinshi', NULL),
(12, 'Drama', NULL),
(13, 'Đam Mỹ', NULL),
(14, 'Ecchi', NULL),
(15, 'Fantasy', NULL),
(16, 'Gender Bender', NULL),
(17, 'Harem', NULL),
(18, 'Historical', NULL),
(19, 'Horror', NULL),
(20, 'Huyền Huyễn', NULL),
(22, 'Josei', NULL),
(23, 'Mafia', NULL),
(24, 'Magic', NULL),
(25, 'Manhua', 'Truyện trung của'),
(26, 'Manhwa', 'Truyện hàn xẻng'),
(27, 'Martial Arts', NULL),
(28, 'Mature', NULL),
(29, 'Military', NULL),
(30, 'Mystery', NULL),
(31, 'Ngôn Tình', NULL),
(32, 'One shot', NULL),
(33, 'Psychological', NULL),
(34, 'Romance', NULL),
(35, 'School Life', NULL),
(36, 'Sci-fi', NULL),
(37, 'Seinen', NULL),
(38, 'Shoujo', NULL),
(39, 'Shoujo Ai', NULL),
(40, 'Shounen', NULL),
(41, 'Shounen Ai', NULL),
(42, 'Slice of life', NULL),
(44, 'Sports', NULL),
(45, 'Supernatural', NULL),
(46, 'Tragedy', NULL),
(47, 'Trọng Sinh', NULL),
(48, 'Truyện Màu', NULL),
(49, 'Webtoon', NULL),
(50, 'Xuyên Không', NULL),
(53, 'Mecha', NULL),
(54, 'Cooking', 'Nấu ăn'),
(55, 'Trùng Sinh', NULL),
(56, 'Gourmet', NULL),
(57, 'Dark Fantasy', NULL),
(58, 'Manga', 'Truyện nhật bản'),
(59, 'Isekai', 'Chuyển sinh');

-- --------------------------------------------------------

--
-- Table structure for table `theodoi`
--

CREATE TABLE `theodoi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theodoi`
--

INSERT INTO `theodoi` (`id`, `id_truyen`, `id_user`) VALUES
(11, 9, 1),
(12, 2, 1),
(13, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_tap` bigint(20) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`id`, `id_user`, `id_tap`, `noidung`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 34, 'One Piece vừa ra chương mới \"Chap 2\"', 1, '2023-11-08 04:53:14', '2023-11-08 08:14:02'),
(4, 1, 35, 'One Piece vừa ra chương mới \"Chap 3\"', 1, '2023-11-08 04:53:47', '2023-11-08 08:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `truyen`
--

CREATE TABLE `truyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentruyen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `mota` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` bigint(20) NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truyen`
--

INSERT INTO `truyen` (`id`, `tentruyen`, `tenkhac`, `status`, `mota`, `path`, `view`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'How To Fight', 'Cách Chiến Thắng Trận Đấu , Viral Hit, Học cách chiến đấu', 0, 'Yoo Hobin luôn bị bắt nạt bởi vì nó là một thằng loser chính hiệu. Tuy nhiên một sự kiện bất ngờ đã đảo lộn cuộc sống của cậu ta. Một cái video tình cờ tải lên mạng làm cậu ta trở nên nổi tiếng, quá tuyệt vời! Càng ngày càng có nhiều người theo dõi và cậu ta còn kiếm ra tiền từ cái vid tình cờ đó nữa! Tuy nhiên, vì chỉ là tình cờ nên cậu ta không thể nào kiếm ra một cái video nào khác như thế nữa. Phát cuồng vì vòng xoáy tiền tài và danh vọng có thể đem lại cho mình, cậu ta lên kế hoạch tạo ra những video thật độc đáo để kiếm thêm người theo dõi. Nhưng để làm ra chúng, thì đầu tiên cậu ta phải biết chiến đấu', 'truyen/2/1697086224_avt_how-to-fight_64ac2b187843c.jpg', 53, 'howtofight', '2023-10-12 04:50:24', '2023-11-05 07:19:07'),
(3, 'Kengan Ashura', NULL, 0, 'Từ thời Edo đã tồn tại các đầu trường, mà tại đó các thương gia thuê đấu sĩ đấu tay không với nhau, bên nào thắng sẽ có tất cả. Tokita Ouma, biệt danh là Ashura tham gia đấu trường và đánh thắng tất cả các đấu thủ của mình. Khả năng đặc biết đè bẹp mọi đối thủ của cậu ta đã được các ông chủ tập đoàn lớn để ý, trong đó có chủ tịch tập đoàn Nogi, Nogi Hideki', 'truyen/3/1697086353_avt_Kengan_Ashura_volume_1.jpg', 52, 'kenganashura', '2023-10-12 04:52:33', '2023-11-05 08:00:59'),
(4, 'Nhiệm Vụ Diệu Kỳ', NULL, 0, 'Kim So Huyn, một nam sinh trung học yếu đuối đến mức không thể mở miệng phản đối bất kì yêu cầu nào của người khác. Mội ngày đi học đều là cực hình khi Kim So Huyn đã và đang là nạn nhân của bạo lực học đường. Với việc truyện tranh phát triển, cậu mơ ước rằng bản thân sẽ có một hệ thống để biến mình thành một nhân vật bá đạo giống như các nhân vật trong truyện tranh, và hệ thống xuất hiện thật.... Liệu hệ thống nhiệm vụ này có thể biến Kim So Huyn thành một nam sinh bá đạo không? Cùng đón xem tại Vlogtruyen nhé!!\r\nMột tác phẩm đến từ tác giả của Học Cách Chiến Đấu và Hoán Đổi Diệu Kỳ!', 'truyen/4/1697086423_avt_nhiem-vu-dieu-ky_6510250575df6.jpg', 35, 'nhiemvudieuky', '2023-10-12 04:53:43', '2023-11-04 15:43:56'),
(6, 'Gậy Gỗ Cấp 99+', NULL, 0, 'Đây là phiên bản gậy gỗ Saitama - Gõ phát chết luôn!!!!!!!!!\r\n\r\nThanh niên main trong game thực tế ảo bị gái lừa giết chết rồi vô tình được cho 1 chiếc gậy gỗ tân thủ. Bug game khiến cho main cường hóa cây gậy này lên cấp 99+ tối đa. Đây là phiên bản gậy gỗ Saitama - Gõ phát chết luôn!!!!!!!!!', 'truyen/6/1697086558_avt_99-wooden-stick.jpg', 104, 'gaygocap99', '2023-10-12 04:55:58', '2023-11-05 07:31:06'),
(7, 'One-Punch Man', 'ONEPUNCH-MAN , Cú Đấm Hủy Diệt , Đấm Phát Chết Luôn, Onepunch Man', 0, 'Onepunch-Man là một Manga thể loại siêu anh hùng với đặc trưng phồng tôm đấm phát chết luôn… Lol!!! Nhân vật chính trong Onepunch-man là Saitama, một con người mà nhìn đâu cũng thấy “tầm thường”, từ khuôn mặt vô hồn, cái đầu trọc lóc, cho tới thể hình long tong. Tuy nhiên, con người nhìn thì tầm thường này lại chuyên giải quyết những vấn đề hết sức bất thường. Anh thực chất chính là một siêu anh hùng luôn tìm kiếm cho mình một đối thủ mạnh. Vấn đề là, cứ mỗi lần bắt gặp một đối thủ tiềm năng, thì đối thủ nào cũng như đối thủ nào, chỉ ăn một đấm của anh là… chết luôn. Liệu rằng Onepunch-Man Saitaman có thể tìm được cho mình một kẻ ác dữ dằn đủ sức đấu với anh? Hãy theo bước Saitama trên con đường một đấm tìm đối cực kỳ hài hước của anh!!', 'truyen/7/1697086668_avt_60eb2f6f80b89_60eb2f71d9655.jpg', 71, 'onepunchman', '2023-10-12 04:57:48', '2023-10-19 16:15:16'),
(8, 'Kage no Jitsuryokusha ni Naritakute!', '陰の実力者になりたくて！,The Eminence in Shadow,To Be a Power in the Shadows! , Tao muốn trở thành chúa tể bóng tối!!', 0, 'Truyện Kage no Jitsuryokusha ni Naritakute!: Được chuyển thể từ Light Novel cùng tên.Tôi không phải nhân vật chính, cũng chẳng phải trùm cuối... Tôi là một cậu trai ước mơ làm chúa tể bóng tối, chèo lái câu chuyện trong bóng tối, bí mật phô bày năng lực, tên là Shido. Vừa mới hớn hở vì được chuyển sinh đến thế giới khác và quyết định mình sẽ là chúa...', 'truyen/8/1697086800_avt_tao-muon-tro-thanh-chua-te-bong-toi_5dadc045700a7.jpg', 47, 'kagenojitsuryokushaninaritakute', '2023-10-12 05:00:00', '2023-11-01 05:26:39'),
(9, 'One Piece', 'Vua hải tặc', 0, 'Truyện One Piece: Monkey D. Luffy, 1 cậu bé rất thích hải tặc có ước mơ tìm được kho báu One Piece và trở thành Vua hải tặc - Pirate King. Lúc nhỏ, Luffy tình cờ ăn phải trái quỉ (Devil Fruit) Gomu Gomu, nó cho cơ thể cậu khả năng co dãn đàn hồi như cao su nhưng đổi lại cậu sẽ không bao giờ biết bơi. Sau đó Luffy lại được...', 'truyen/9/1699419094_avt_one-piece-dao-hai-tac_5d8dd3faaf1cc.jpg', 43, 'onepiece', '2023-11-08 04:51:34', '2023-11-09 06:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `truyen_tacgia`
--

CREATE TABLE `truyen_tacgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_tacgia` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truyen_tacgia`
--

INSERT INTO `truyen_tacgia` (`id`, `id_truyen`, `id_tacgia`) VALUES
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(6, 6, 1),
(8, 8, 1),
(10, 7, 2),
(11, 7, 3),
(12, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `truyen_theloai`
--

CREATE TABLE `truyen_theloai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truyen` bigint(20) UNSIGNED NOT NULL,
  `id_theloai` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truyen_theloai`
--

INSERT INTO `truyen_theloai` (`id`, `id_truyen`, `id_theloai`) VALUES
(6, 2, 1),
(7, 2, 8),
(8, 2, 26),
(9, 2, 27),
(10, 2, 42),
(11, 2, 49),
(12, 3, 1),
(13, 3, 27),
(14, 3, 40),
(15, 3, 58),
(16, 4, 1),
(17, 4, 7),
(18, 4, 12),
(19, 4, 26),
(20, 4, 35),
(21, 4, 48),
(22, 4, 49),
(26, 6, 1),
(27, 6, 7),
(28, 6, 15),
(29, 6, 24),
(30, 6, 26),
(37, 8, 1),
(38, 8, 7),
(39, 8, 15),
(40, 8, 17),
(41, 8, 59),
(47, 7, 1),
(48, 7, 3),
(49, 7, 7),
(50, 7, 40),
(51, 7, 45),
(52, 7, 58),
(53, 9, 1),
(54, 9, 3),
(55, 9, 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_created_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `path`, `token`, `token_created_at`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$eb1eBhTFM.ZdfH.1BiQSqehqGt55.qrWvTXItjY7UEAybUxVe4n0y', 'user_avatar/1699505230_header.jpg', NULL, NULL, 'admin'),
(2, 'user', 'user@gmail.com', '$2y$10$tLFJEtCDbiFUOB/MCLY8IedmM6wscsKnHtw4jkCMyf7E8T6RK5dau', NULL, NULL, NULL, 'user'),
(5, 'dang', 'kdg2k2@gmail.com', '$2y$10$HagXFLYophR1l.x6AuMFWOfhc6tKoVKTKav2pPKnLu3RvZgU5nlGW', NULL, NULL, NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_id_user_foreign` (`id_user`),
  ADD KEY `binhluan_id_truyen_foreign` (`id_truyen`);

--
-- Indexes for table `dislike_table`
--
ALTER TABLE `dislike_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lichsu_id_tap_foreign` (`id_tap`),
  ADD KEY `lichsu_id_user_foreign` (`id_user`),
  ADD KEY `lichsu_id_truyen_foreign` (`id_truyen`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tap`
--
ALTER TABLE `tap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tap_id_truyen_foreign` (`id_truyen`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theodoi`
--
ALTER TABLE `theodoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theodoi_id_truyen_foreign` (`id_truyen`),
  ADD KEY `theodoi_id_user_foreign` (`id_user`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thongbaoFRK_id_user` (`id_user`),
  ADD KEY `thongbaoFRK_id_tap` (`id_tap`);

--
-- Indexes for table `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truyen_tacgia`
--
ALTER TABLE `truyen_tacgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truyen_tacgia_id_truyen_foreign` (`id_truyen`),
  ADD KEY `truyen_tacgia_id_tacgia_foreign` (`id_tacgia`);

--
-- Indexes for table `truyen_theloai`
--
ALTER TABLE `truyen_theloai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truyen_theloai_id_truyen_foreign` (`id_truyen`),
  ADD KEY `truyen_theloai_id_theloai_foreign` (`id_theloai`);

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
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `dislike_table`
--
ALTER TABLE `dislike_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lichsu`
--
ALTER TABLE `lichsu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tap`
--
ALTER TABLE `tap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `theodoi`
--
ALTER TABLE `theodoi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `truyen`
--
ALTER TABLE `truyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `truyen_tacgia`
--
ALTER TABLE `truyen_tacgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `truyen_theloai`
--
ALTER TABLE `truyen_theloai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lichsu`
--
ALTER TABLE `lichsu`
  ADD CONSTRAINT `lichsu_id_tap_foreign` FOREIGN KEY (`id_tap`) REFERENCES `tap` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lichsu_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lichsu_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tap`
--
ALTER TABLE `tap`
  ADD CONSTRAINT `tap_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theodoi`
--
ALTER TABLE `theodoi`
  ADD CONSTRAINT `theodoi_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theodoi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbaoFRK_id_tap` FOREIGN KEY (`id_tap`) REFERENCES `tap` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thongbaoFRK_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `truyen_tacgia`
--
ALTER TABLE `truyen_tacgia`
  ADD CONSTRAINT `truyen_tacgia_id_tacgia_foreign` FOREIGN KEY (`id_tacgia`) REFERENCES `tacgia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `truyen_tacgia_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `truyen_theloai`
--
ALTER TABLE `truyen_theloai`
  ADD CONSTRAINT `truyen_theloai_id_theloai_foreign` FOREIGN KEY (`id_theloai`) REFERENCES `theloai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `truyen_theloai_id_truyen_foreign` FOREIGN KEY (`id_truyen`) REFERENCES `truyen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
