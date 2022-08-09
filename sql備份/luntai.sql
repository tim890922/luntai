-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-08-09 22:44:38
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `luntai`
--

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `machines`
--

CREATE TABLE `machines` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '機台別',
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '機型',
  `tonnes` decimal(8,2) NOT NULL COMMENT '噸數/T',
  `ring` decimal(8,2) NOT NULL DEFAULT 0.00 COMMENT '機台定位環',
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '機台號碼',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '型式',
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '射出重量',
  `diameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '螺桿直徑',
  `tube_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '料管材質',
  `screw_width` decimal(8,2) DEFAULT NULL COMMENT '柱內寬度/間隔',
  `min_max` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '調模最大/最小值',
  `screw_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '螺桿材質',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '狀態',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `machines`
--

INSERT INTO `machines` (`id`, `manufacturer`, `tonnes`, `ring`, `number`, `type`, `weight`, `diameter`, `tube_material`, `screw_width`, `min_max`, `screw_material`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1', '樺欽', '600.00', '150.00', 'MST-0600BA025', '變頻機', '1748', '75', '雙合金', '880.00', '275-1020', '特殊', 1, NULL, NULL, NULL),
('10', 'TMC', '500.00', '200.00', '', '', '1637', '85', '一般', '850.00', '50-890', '', 1, NULL, NULL, NULL),
('11', 'TMC', '1000.00', '200.00', '', '', '4680', '120', '一般', '1100.00', '600-1200', '', 1, NULL, NULL, NULL),
('12', 'TMC', '1000.00', '200.00', '', '', '4680', '120', '雙合金B級', '1100.00', '600-1200', '特殊', 1, NULL, NULL, NULL),
('13', '樺欽', '250.00', '120.00', 'MDD-0250AS047', '雙色機', '前204\n後204', '前40\n後36', '雙合金', '530.00', '160-540', '', 1, NULL, NULL, NULL),
('14', '樺欽', '350.00', '120.00', 'MST-0350BS079', '高速機', '763', '60', '雙合金', '655.00', '180-700', '', 1, NULL, NULL, NULL),
('15', '樺欽', '350.00', '120.00', 'MST-0350A0204', '', '763', '60', '雙合金', '655.00', '180-700', '', 1, NULL, NULL, NULL),
('16', '樺欽', '350.00', '120.00', 'MS2-0350BS042', '', '763', '60', '雙合金', '655.00', '180-700', '', 1, NULL, NULL, NULL),
('17', '樺欽', '350.00', '120.00', 'MST-0350BA023', '', '625', '60', '雙合金', '655.00', '180-700', '', 1, NULL, NULL, NULL),
('18', '樺欽', '300.00', '120.00', 'MST-0300A0109', '', '555', '55', '雙合金', '610.00', '140-650', '', 1, NULL, NULL, NULL),
('19', '震雄', '50.00', '100.00', '', '', '58', '25', '一般', '310.00', '120-305', '', 1, NULL, NULL, NULL),
('2', '樺欽', '800.00', '200.00', 'MST-0800A0042', '', '2124', '80', '雙合金', '1000.00', '300-1100', '', 1, NULL, NULL, NULL),
('2-1', '樺欽', '1480.00', '200.00', 'MST-1480BS021', '變頻機', '6818', '120', '雙合金', '1350.00', '300-1400', '', 1, NULL, NULL, NULL),
('2-2', '樺欽', '1060.00', '200.00', 'MST-1060BS067', '變頻機', '4239', '100', '雙合金', '1120.00', '300-1200', '', 1, NULL, NULL, NULL),
('2-3', '富強鑫', '1250.00', '200.00', '', '', '2950', '100', '一般', '1220.00', '460-1390', '', 1, NULL, NULL, NULL),
('2-4', '樺欽', '800.00', '200.00', 'MST-0800BS081', '變頻機', '2124', '80', '雙合金', '1000.00', '300-1100', '特殊', 1, NULL, NULL, NULL),
('2-5', '樺欽', '1360.00', '200.00', 'MST-1360BS041', '變頻機', '4239', '100', '雙合金', '1220.00', '300-1400', '', 1, NULL, NULL, NULL),
('2-6', '鍑鑫', '65.00', '0.00', '', '中空成型機', '1200', '65', '一般', '0.00', '150-450', '', 1, NULL, NULL, NULL),
('2-7', '三菱', '1050.00', '120.00', '', '', '', '', '', '1200.00', '110-500', '', 1, NULL, NULL, NULL),
('2-8', '鍑鑫', '65.00', '0.00', '', '中空成型機', '1200', '65', '一般', '0.00', '150-450', '', 1, NULL, NULL, NULL),
('20', '新瀉', '50.00', '100.00', '', '', '', '', '一般', '0.00', '無螢幕', '', 1, NULL, NULL, NULL),
('21', '新瀉', '75.00', '100.00', '', '', '158', '35', '雙合金B級', '355.00', '170-380', '特殊', 1, NULL, NULL, NULL),
('22', '新瀉', '100.00', '100.00', '', '', '175', '40', '一般', '400.00', '200-410', '', 1, NULL, NULL, NULL),
('23', '新瀉', '100.00', '100.00', '', '', '175', '40', '一般', '400.00', '200-410', '', 1, NULL, NULL, NULL),
('24', '新瀉', '130.00', '100.00', '', '', '', '', '一般', '0.00', '無螢幕', '', 1, NULL, NULL, NULL),
('25', '樺欽', '400.00', '150.00', 'MST-0400BA021', '變頻機', '1083', '65', '雙合金', '700.00', '?-750', '承竣033+2', 1, NULL, NULL, NULL),
('3', '樺欽', '600.00', '150.00', 'MST-0600A0063', '', '1748', '75', '一般黑十字', '880.00', '275-1020', '', 1, NULL, NULL, NULL),
('4', 'TMC', '350.00', '100.00', '', '', '1049', '75', '雙合金B級', '720.00', '70-800', '特殊', 1, NULL, NULL, NULL),
('5', '樺欽', '1060.00', '200.00', 'MST-1060A0033', '', '4239', '100', '雙合金', '1120.00', '300-1200', '', 1, NULL, NULL, NULL),
('6', '樺欽', '600.00', '150.00', 'MST-0600BS093', '變頻機', '1748', '75', '雙合金', '880.00', '275-1020', '', 1, NULL, NULL, NULL),
('7', 'TMC', '350.00', '160.00', '', '', '1059', '70', '一般', '700.00', '70-800', '', 1, NULL, NULL, NULL),
('8', '樺欽', '600.00', '150.00', 'MST-0600BS142', '變頻機', '1748', '75', '雙合金', '880.00', '275-1020', '', 1, NULL, NULL, NULL),
('9', 'TMC', '500.00', '200.00', '', '', '1888', '80', '一般', '850.00', '50-890', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2022_08_07_154137_create_products_table', 1),
(32, '2022_08_10_013604_create_machines_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '料號',
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '客戶',
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品名稱',
  `price` decimal(8,2) DEFAULT NULL COMMENT '材料單價',
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '材質',
  `weight` decimal(8,2) DEFAULT NULL COMMENT '單重',
  `tonnes` decimal(8,2) DEFAULT NULL COMMENT '射出噸數',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `client`, `product_name`, `price`, `material`, `weight`, `tonnes`, `deleted_at`, `created_at`, `updated_at`) VALUES
('10BE2467010080', 'YMT', '(COVER,RADIATOR)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF1711000080', 'YMT', '(COVER,SIDE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF1721100080', 'YMT', '(COVER,SIDE 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF1731100080', 'YMT', '(COVER,SIDE 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF7486000080', 'YMT', '(COVER,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF8186000080', 'YMT', '(POUCH)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF8311100080', 'YMT', '(SHIELD,LEG 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BF8361000080', 'YMT', '(PLATE,FR.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BXE543000080', 'YMT', '(COVER, CRANKCASE 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BXF162110080', 'YMT', '(GUARD,MUD ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BXF172040080', 'YMT', '(COVER SIDE 2 ASSY)', '55.00', 'PP-N4', '0.28', '1000.00', NULL, NULL, NULL),
('10BXF173040080', 'YMT', '(COVER SIDE 3 ASSY)', '55.00', 'PP-N4', '0.28', '1000.00', NULL, NULL, NULL),
('10BXF414100080', 'YMT', '(COVER,FILLER ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BXF831030080', 'YMT', '(LEG SHIELD 1 ASSY)', '58.00', 'PP-N4', '0.21', '1000.00', NULL, NULL, NULL),
('10BXF832010080', 'YMT', '(SHIELD,LEG 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('10BXF832020080', 'YMT', '(SHIELD,LEG 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1MSF1569000080', 'YMT', '(GRAPHIC,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF413U000080', 'YMT', '(SHUTTER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF6241000080', 'YMT', '(GRIP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF6246007M80', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF624600P180', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF624600P480', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF6246100080', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1SHF6246207M80', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('1TSXF830100080', 'YMT', '(LEG SHIELD ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSE2611000080', 'YMT', '(FAN)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF1511000080', 'YMT', '(FENDER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF1552000080', 'YMT', '(FENDER,INNER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF1711000080', 'YMT', '(COVER,SIDE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF17210000X0', 'YMT', '(COVER,SIDE 2(MASKING))', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF17310000X0', 'YMT', '(COVER,SIDE 3 (MASKING))', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF413U000080', 'YMT', '(SHUTTER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF4280000080', 'YMT', '(SUB-TANK ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF474A01P680', 'YMT', '(ASSIST,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF474W01P680', 'YMT', '(ASSIST,GRIP 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF7413000080', 'YMT', '(COVER,FOOTREST)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF7423000080', 'YMT', '(COVER,FOOTREST 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF7481000080', 'YMT', '(BOARD,FOOTREST)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF8300000080', 'YMT', '(LEG SHIELD ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF8311000080', 'YMT', '(SHIELD,LEG 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSF8345000080', 'YMT', '(MOLE,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSH1128000080', 'YMT', '(CLAMP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSH4144010080', 'YMT', '(COVER,HEAD LIGHT)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2JSXE543010080', 'YMT', '(COVER, CRANKCASE 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2NBE5431000080', 'YMT', '(COVER,CRANKCASE 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2NBF1711100080', 'YMT', '(COVER,SIDE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2NBXF478020080', 'YMT', '(LID ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2NBXF47R050080', 'YMT', '(BOX 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSE2611000080', 'YMT', '(FAN)', '85.00', 'PP-X0', '0.16', '150.00', NULL, NULL, NULL),
('2TSF1511000080', 'YMT', '(FENDER)', '81.00', 'ABS-A1', '0.58', '1000.00', NULL, NULL, NULL),
('2TSF1519000080', 'YMT', '(MOLE,FENDER)', '81.00', 'ABS-A1', '0.62', '1250.00', NULL, NULL, NULL),
('2TSF1523000080', 'YMT', '(PLATE,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSF1685000080', 'YMT', '(BRKT.,LICENSE)', '58.00', 'PP-N4', '0.25', '300.00', NULL, NULL, NULL),
('2TSF4768000080', 'YMT', '(STOPPER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSF624600P180', 'YMT', '(END,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSF834V000080', 'YMT', '(PROTECTOR,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSF834W000080', 'YMT', '(PROTECTOR,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSH3559010080', 'YMT', '(COVER, METER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSXE562100080', 'YMT', '(PLUG,OIL LEVEL ASSY)', '55.00', 'PP-N4', '0.13', '1000.00', NULL, NULL, NULL),
('2TSXF155130080', 'YMT', '(FENDER.INNER ASSY)', '64.00', 'PP-N4', '0.65', '1250.00', NULL, NULL, NULL),
('2TSXF155140080', 'YMT', '(FENDER.INNER ASSY)', '85.00', 'ABS-A1', '0.41', '1360.00', NULL, NULL, NULL),
('2TSXF155150080', 'YMT', '(FENDER.INNER ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('2TSXF830110080', 'YMT', '(LEG SHIELD ASSY)', '68.00', 'PP-N4', '0.81', '1250.00', NULL, NULL, NULL),
('2TSXF830120080', 'YMT', '(LEG SHIELD ASSY)', '140.00', 'PA-R1', '0.43', '650.00', NULL, NULL, NULL),
('31UH3936000080', 'YMT', '(BAND,SWITCH CORD)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('31UH3936100080', 'YMT', '(BAND,SWITCH CORD)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('37CF7119100080', 'YMT', '(WASHER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('37CH3936100080', 'YMT', '(BAND,SWITCH CORD)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('4C7H2594000080', 'YMT', '(CLAMP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('4Y4XE536000080', 'YMT', '(PLUG,OIL ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('51235', '123', '1235', '1235.00', '1235', '1234.00', '1235.00', NULL, '2022-08-09 18:36:36', '2022-08-09 18:36:36'),
('52SF3472000080', 'YMT', '(PROTECTOR)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('58PH3936000080', 'YMT', '(BAND,SWITCH CORD)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5CAF1815000080', 'YMT', '(CAP,TOR-CON TANK)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5CYF5135000080', 'YMT', '(GEAR,DRIVE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5FMF8349000080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5HKF7475000080', 'YMT', '(CAP,1)', '85.00', 'ABS-A1', '0.33', '850.00', NULL, NULL, NULL),
('5JSF8257400080', 'YMT', '(HOOK,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5MLE5404000080', 'YMT', '(GUIDE,ELEMENT)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5MLF1732000080', 'YMT', '(SEAL,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF1721000080', 'YMT', '(COVER,SIDE 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF1731000080', 'YMT', '(COVER,SIDE 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF7475100080', 'YMT', '(CAP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF7482000080', 'YMT', '(MOLE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF7492000080', 'YMT', '(MOLE,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STF8311010080', 'YMT', '(SHIELD,LEG 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STXE261010080', 'YMT', '(FAN ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STXF151010080', 'YMT', '(FENDER, FRONT)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STXF174L20080', 'YMT', '(COVER,SIDE 4 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5STXF748270080', 'YMT', '(BOARD FOOTREST ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5SUF3415000080', 'YMT', '(COVER,BALL RACE 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('5YRF8315000080', 'YMT', '(EMBLEM)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('6ETR1341100080', 'YMT', '(BRKT.,1)', '110.00', 'PA-R2', '0.18', '350.00', NULL, NULL, NULL),
('6ETR1342100080', 'YMT', '(BRKT.,2)', '110.00', 'PA-R2', '0.19', '350.00', NULL, NULL, NULL),
('6EXR1326100080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('6GAR1314000080', 'YMT', '(GATE,REVERSE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('6GAR1318000080', 'YMT', '(NOZZLE)', '120.00', 'PA-R1', '0.78', '350.00', NULL, NULL, NULL),
('6GAXG688000080', 'YMT', '(FILTER ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('6GNXG688000080', 'YMT', '(FILTER ASSY)', '105.00', 'PA-F1', '0.06', '150.00', NULL, NULL, NULL),
('6GYR1314000080', 'YMT', '(GATE,REVERSE)', '53.50', 'PP-N4', '0.56', '1060.00', NULL, NULL, NULL),
('6JSR1318000080', 'YMT', '(NOZZLE)', '120.00', 'PA-R1', '0.18', '800.00', NULL, NULL, NULL),
('9.01501E+13', 'YMT', '(SCREW,CROSSRECESSED RD.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('9.04642E+13', 'YMT', '(CLAMP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('9.04645E+13', 'YMT', '(CLAMP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('9.04651E+13', 'YMT', '(CLAMP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('9.05201E+13', 'YMT', '(DAMPER,PLATE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF1519000080', 'YMT', '(MOLE,FENDER)', '63.00', 'PP-N4', '0.30', '500.00', NULL, NULL, NULL),
('B0JF1523000080', 'YMT', '(PLATE,1)', '140.00', 'PA-R1', '0.43', '650.00', NULL, NULL, NULL),
('B0JF1524000080', 'YMT', '(PLATE,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF6234000080', 'YMT', '(SCREEN)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF6240000080', 'YMT', '(GRIP ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF6240100080', 'YMT', '(GRIP ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF7482000080', 'YMT', '(MOLE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JF7492000080', 'YMT', '(MOLE,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JXF151000080', 'YMT', '(FENDER, FRONT)', '58.00', 'PP-N4', '0.14', '450.00', NULL, NULL, NULL),
('B0JXF47410P280', 'YMT', '(ASSIST,GRIP ASSY)', '99.80', 'PA-R1', '0.29', '650.00', NULL, NULL, NULL),
('B0JXF47W10P280', 'YMT', '(ASSIST,GRIP ASSY 2)', '99.80', 'PA-R1', '0.29', '650.00', NULL, NULL, NULL),
('B0JXF615000080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B0JXF830030080', 'YMT', '(LEG SHIELD ASSY)', '53.50', 'PP-N4', '0.72', '1250.00', NULL, NULL, NULL),
('B0JXF830040080', 'YMT', '(LEG SHIELD ASSY)', '53.50', 'PP-N4', '0.72', '1250.00', NULL, NULL, NULL),
('B53F6241000080', 'YMT', '(GRIP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B53F6241100080', 'YMT', '(GRIP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF1652000080', 'YMT', '(PROTECTOR)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF61AA000080', 'YMT', '(VISOR)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF6213000080', 'YMT', '(COVER,HANDLE UPPER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF6372000080', 'YMT', '(COVER,LEVER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF637A000080', 'YMT', '(COVER,LEVER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YF8311000080', 'YMT', '(SHIELD,LEG 1)', '87.00', 'ABS-A1', '0.87', '1250.00', NULL, NULL, NULL),
('B7YF8339000080', 'YMT', '(MOLE,LEG SHIELD)', '55.00', 'PP-N4', '0.86', '1250.00', NULL, NULL, NULL),
('B7YF8396100080', 'YMT', '(PLATE,1)', '90.00', 'ABS-A2', '0.03', '250.00', NULL, NULL, NULL),
('B7YF8397100080', 'YMT', '(PLATE,2)', '90.00', 'ABS-A2', '0.03', '250.00', NULL, NULL, NULL),
('B7YXF168000080', 'YMT', '(BRKT.LICENSE ASSY)', '57.00', 'PP-N4', '0.43', '600.00', NULL, NULL, NULL),
('B7YXF48100P080', 'YMT', '(HANDLE ASSY)', '105.00', 'PA-R1', '0.69', '600.00', NULL, NULL, NULL),
('B7YXF614000080', 'YMT', '(COVER, HANDLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YXF615010080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B7YXF830010080', 'YMT', '(LEG SHIELD ASSY)', '57.00', 'PP-N4', '1.07', '1360.00', NULL, NULL, NULL),
('B86F6240000080', 'YMT', '(GRIP ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RE2611000080', 'YMT', '(FAN)', '105.00', 'PA-R1', '0.13', '150.00', NULL, NULL, NULL),
('B8RF474A00GE80', 'YMT', '(ASSIST,GRIP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF474A00P080', 'YMT', '(ASSIST,GRIP)', '140.00', 'PA-R1', '0.43', '650.00', NULL, NULL, NULL),
('B8RF474W00GE80', 'YMT', '(ASSIST,GRIP 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF474W00P080', 'YMT', '(ASSIST,GRIP 2)', '140.00', 'PA-R1', '0.43', '650.00', NULL, NULL, NULL),
('B8RF4768100080', 'YMT', '(STOPPER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF6133000080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF6134000080', 'YMT', '(CAP,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF6143010080', 'YMT', '(COVER,HANDLE 1)', '85.00', 'ABS-A1', '0.40', '600.00', NULL, NULL, NULL),
('B8RF6246000080', 'YMT', '(END,GRIP)', '55.00', 'PP-N4', '0.55', '1000.00', NULL, NULL, NULL),
('B8RF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF8336000080', 'YMT', '(PLATE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RF8345000080', 'YMT', '(MOLE,1)', '85.00', 'ABS-A1', '0.26', '500.00', NULL, NULL, NULL),
('B8RF8351000080', 'YMT', '(BODY,COWLING)', '85.00', 'ABS-A1', '0.84', '1000.00', NULL, NULL, NULL),
('B8RH4385000080', 'YMT', '(CAP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RH4386000080', 'YMT', '(CAP,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXE562000080', 'YMT', '(PLUG,OIL LEVEL ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXF155000080', 'YMT', '(FENDER.INNER ASSY)', '55.00', 'PP-N4', '0.81', '1360.00', NULL, NULL, NULL),
('B8RXF615000080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXF615010080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXF615020080', 'YMT', '(COVER,HANDLE 2 ASSY)', '56.50', 'PP-N4', '0.23', '600.00', NULL, NULL, NULL),
('B8RXF623000080', 'YMT', '(SCREEN ASSY)', '85.00', 'ABS-A1', '1.03', '1250.00', NULL, NULL, NULL),
('B8RXF741100080', 'YMT', '(COVER,FOOTREST  1)', '130.00', 'PP-N4', '0.12', '1250.00', NULL, NULL, NULL),
('B8RXF741200080', 'YMT', '(COVER,FOOTREST  1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXF742100080', 'YMT', '(COVER,FOOTREST 2)', '85.00', 'ABS-A2', '0.05', '300.00', NULL, NULL, NULL),
('B8RXF742200080', 'YMT', '(COVER,FOOTREST 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('B8RXF830010080', 'YMT', '(LEG SHIELD ASSY)', '55.00', 'PP-N4', '0.86', '1250.00', NULL, NULL, NULL),
('B8RXF830020080', 'YMT', '(LEG SHIELD ASSY)', '85.00', 'ABS-A1', '1.03', '1250.00', NULL, NULL, NULL),
('B8RXF83U000080', 'YMT', '(PANEL, 1)', '57.00', 'PP-N4', '0.21', '500.00', NULL, NULL, NULL),
('B8RXF83V000080', 'YMT', '(PANEL, 2)', '87.00', 'ABS-A1', '0.37', '450.00', NULL, NULL, NULL),
('BA4F110F000080', 'YMT', '(DUCT,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF173B000080', 'YMT', '(EMBLEM 3D)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF174B000080', 'YMT', '(EMBLEM 3D)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF476M000080', 'YMT', '(CAP,CASING)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF481200P080', 'YMT', '(HANDLE)', '130.00', 'PA-R1', '1.61', '600.00', NULL, NULL, NULL),
('BBJF482H000080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF585C000080', 'YMT', '(COVER,MAS. CYL.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF6240000080', 'YMT', '(GRIP ASSY.)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF6241000080', 'YMT', '(GRIP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF6372000080', 'YMT', '(COVER,LEVER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF637A000080', 'YMT', '(COVER,LEVER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF834V000080', 'YMT', '(PROTECTOR,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJF834W000080', 'YMT', '(PROTECTOR,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF48100P080', 'YMT', '(HANDLE ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF48101P080', 'YMT', '(HANDLE ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF614000080', 'YMT', '(COVER, HANDLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF830000080', 'YMT', '(LEG SHIELD ASSY)', '55.00', 'PP-N4', '0.59', '1250.00', NULL, NULL, NULL),
('BBJXF830010080', 'YMT', '(LEG SHIELD ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF830020080', 'YMT', '(LEG SHIELD ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF834000080', 'YMT', '(MOLE 1 ASSY)', '55.00', 'PP-N4', '0.32', '350.00', NULL, NULL, NULL),
('BBJXF834010080', 'YMT', '(MOLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF834020080', 'YMT', '(MOLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF83U000080', 'YMT', '(PANEL, 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXF83V000080', 'YMT', '(PANEL, 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXH359000080', 'YMT', '(COVER,METER ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BBJXH414000080', 'YMT', '(COVER,HEAD LIGHT ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCBF1519000080', 'YMT', '(MOLE,FENDER)', '55.00', 'PP-N4', '0.35', '1250.00', NULL, NULL, NULL),
('BCBF1523000080', 'YMT', '(PLATE,1)', '85.00', 'ABS-A1', '0.56', '1000.00', NULL, NULL, NULL),
('BCBF1524000080', 'YMT', '(PLATE,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCBF413U000080', 'YMT', '(SHUTTER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCBF6143000080', 'YMT', '(COVER,HANDLE 1)', '85.00', 'ABS-A1', '0.26', '600.00', NULL, NULL, NULL),
('BCBXF481000080', 'YMT', '(HANDLE ASSY)', '69.00', 'PP-X0', '0.63', '600.00', NULL, NULL, NULL),
('BCBXF482000080', 'YMT', '(MOLE ASSY)', '146.00', 'PA-A1', '0.02', '150.00', NULL, NULL, NULL),
('BCBXF492000080', 'YMT', '(MOLE,2 ASSY)', '55.00', 'PP-N4', '0.13', '1000.00', NULL, NULL, NULL),
('BCBXF615000080', 'YMT', '(COVER,HANDLE 2 ASSY)', '130.00', 'PP-N4', '0.12', '1250.00', NULL, NULL, NULL),
('BCCF1553000080', 'YMT', '(FENDER,INNER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF173B000080', 'YMT', '(EMBLEM 3D)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF174B000080', 'YMT', '(EMBLEM 3D)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF3472000080', 'YMT', '(PROTECTOR)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF6144000080', 'YMT', '(COVER,HANDLE UNDER 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF6144100080', 'YMT', '(COVER,HANDLE UNDER 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF6146000080', 'YMT', '(COVER,HANDLE UNDER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF6146100080', 'YMT', '(COVER,HANDLE UNDER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF627E000080', 'YMT', '(CLAMP,WIRE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF7285000080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF8311000080', 'YMT', '(SHIELD,LEG 1)', '55.00', 'PP-N4', '0.22', '800.00', NULL, NULL, NULL),
('BCCF8311100080', 'YMT', '(SHIELD,LEG 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF8336000080', 'YMT', '(PLATE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF8336100080', 'YMT', '(PLATE)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF8365000080', 'YMT', '(COVER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF8365100080', 'YMT', '(COVER)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCF839R000080', 'YMT', '(PANEL,ACCESS.)', '110.00', 'PA-R2', '0.09', '1000.00', NULL, NULL, NULL),
('BCCXF155000080', 'YMT', '(FENDER.INNER ASSY)', '55.00', 'PP-N4', '0.79', '1360.00', NULL, NULL, NULL),
('BCCXF161000080', 'YMT', '(FENDER ASSY)', '55.00', 'PP-N4', '0.20', '450.00', NULL, NULL, NULL),
('BCCXF614000080', 'YMT', '(COVER, HANDLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCXF614100080', 'YMT', '(COVER, HANDLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCXF615000080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCXF615100080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BCCXF830000080', 'YMT', '(LEG SHIELD ASSY)', '55.00', 'PP-N4', '0.07', '1000.00', NULL, NULL, NULL),
('BCCXF830100080', 'YMT', '(LEG SHIELD ASSY)', '55.00', 'PP-N4', '0.55', '1000.00', NULL, NULL, NULL),
('BCVXE262000080', 'YMT', '(AIR SHROUD CYL.2 ASSY)', '55.00', 'PP-N4', '0.14', '350.00', NULL, NULL, NULL),
('BCVXE263000080', 'YMT', '(AIR SHROUD,CYLINDER 3)', '55.00', 'PP-N3', '0.01', '100.00', NULL, NULL, NULL),
('BCVXF614000080', 'YMT', '(COVER, HANDLE 1 ASSY)', '80.00', 'ABS-A1', '0.34', '500.00', NULL, NULL, NULL),
('BCVXF615000080', 'YMT', '(COVER,HANDLE 2 ASSY)', '85.00', 'ABS-A1', '0.05', '300.00', NULL, NULL, NULL),
('BCVXF615010080', 'YMT', '(COVER,HANDLE 2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF1511000080', 'YMT', '(FENDER)', '58.00', 'PP-N4', '0.33', '500.00', NULL, NULL, NULL),
('BFVF1513000080', 'YMT', '(STAY,FENDER 1)', '68.00', 'PP-N4', '0.81', '1250.00', NULL, NULL, NULL),
('BFVF1514000080', 'YMT', '(STAY,FENDER 2)', '85.00', 'ABS-A1', '0.03', '100.00', NULL, NULL, NULL),
('BFVF1523000080', 'YMT', '(PLATE,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF1524000080', 'YMT', '(PLATE,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF474A00P080', 'YMT', '(ASSIST,GRIP)', '134.00', 'PA-R1', '0.36', '650.00', NULL, NULL, NULL),
('BFVF474W00P080', 'YMT', '(ASSIST,GRIP 2)', '134.00', 'PA-R1', '0.36', '650.00', NULL, NULL, NULL),
('BFVF6133000080', 'YMT', '(CAP)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF6134000080', 'YMT', '(CAP,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF61AA000080', 'YMT', '(VISOR)', '215.00', 'PC-A1', '0.20', '600.00', NULL, NULL, NULL),
('BFVF6240010080', 'YMT', '(GRIP ASSY.)', '115.00', 'POM-X0', '0.03', '150.00', NULL, NULL, NULL),
('BFVF6241010080', 'YMT', '(GRIP,1)', '180.00', 'TPR', '0.07', '250.00', NULL, NULL, NULL),
('BFVF8351000080', 'YMT', '(BODY,COWLING)', '85.00', 'ABS-A1', '0.25', '1250.00', NULL, NULL, NULL),
('BFVF8377000080', 'YMT', '(BODY,COWLING 2)', '85.00', 'ABS-A1', '0.25', '1250.00', NULL, NULL, NULL),
('BFVF845W000080', 'YMT', '(CAP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVF845X000080', 'YMT', '(CAP,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVH4385000080', 'YMT', '(CAP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVH4386000080', 'YMT', '(CAP,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVXF155000080', 'YMT', '(FENDER.INNER ASSY)', '58.00', 'PP-N4', '0.83', '1250.00', NULL, NULL, NULL),
('BFVXF155010080', 'YMT', '(FENDER.INNER ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVXF830000080', 'YMT', '(LEG SHIELD ASSY)', '58.00', 'PP-N4', '0.61', '1250.00', NULL, NULL, NULL),
('BFVXF830010080', 'YMT', '(LEG SHIELD ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BFVXF831000080', 'YMT', '(LEG SHIELD 1 ASSY)', '58.00', 'PP-N4', '0.73', '800.00', NULL, NULL, NULL),
('BFVXF84V100080', 'YMT', '(PROTECTOR,1 ASSY)', '85.00', 'ABS-A1', '0.21', '1000.00', NULL, NULL, NULL),
('BFVXF84W100080', 'YMT', '(PROTECTOR,2 ASSY)', '85.00', 'ABS-A1', '0.21', '1000.00', NULL, NULL, NULL),
('BKBXF614000080', 'YMT', '(COVER, HANDLE 1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKCE2653000080', 'YMT', '(AIR SHROUD,CYLINDER 3)', '60.00', 'PP-T2', '0.21', '350.00', NULL, NULL, NULL),
('BKCXE262000080', 'YMT', '(AIR SHROUD CYL.2 ASSY)', '55.00', 'PP-N4', '0.14', '350.00', NULL, NULL, NULL),
('BKCXE265000080', 'YMT', '(空氣孔 2 ASSY)', '55.00', 'PP-N4', '0.08', '150.00', NULL, NULL, NULL),
('BKEF163A000080', 'YMT', '(COVER,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF163E010080', 'YMT', '(COVER,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF163F010080', 'YMT', '(COVER,3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF6240000080', 'YMT', '(GRIP ASSY.)', '55.00', 'PP-N4', '0.07', '1000.00', NULL, NULL, NULL),
('BKEF6241000080', 'YMT', '(GRIP,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF637A000080', 'YMT', '(COVER,LEVER 2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF8312000080', 'YMT', '(SHIELD,LEG 2)', '85.00', 'ABS-A1', '0.41', '600.00', NULL, NULL, NULL),
('BKEF8345000080', 'YMT', '(MOLE,1)', '85.00', 'ABS-A1', '0.05', '300.00', NULL, NULL, NULL),
('BKEF834L000080', 'YMT', '(BRKT.,METER 1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF834V000080', 'YMT', '(PROTECTOR,1)', '215.00', 'PC-A1', '0.15', '600.00', NULL, NULL, NULL),
('BKEF834W000080', 'YMT', '(PROTECTOR,2)', '215.00', 'PC-A1', '0.15', '600.00', NULL, NULL, NULL),
('BKEF839K000080', 'YMT', '(LID,1)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEF839L000080', 'YMT', '(LID,2)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEH4144010080', 'YMT', '(COVER,HEAD LIGHT)', '86.00', 'ABS-A2', '0.05', '250.00', NULL, NULL, NULL),
('BKEHC1N6000080', 'YMT', '(BAND)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEXF153000080', 'YMT', '(FENDER,INNER 2 ASSY)', '58.00', 'PP-N4', '0.52', '1250.00', NULL, NULL, NULL),
('BKEXF155000080', 'YMT', '(FENDER.INNER ASSY)', '58.00', 'PP-N4', '0.26', '500.00', NULL, NULL, NULL),
('BKEXF162000080', 'YMT', '(GUARD,MUD ASSY)', '58.00', 'PP-N4', '0.49', '1000.00', NULL, NULL, NULL),
('BKEXF168000080', 'YMT', '(BRKT.LICENSE ASSY)', '55.00', 'PP-N4', '0.01', '100.00', NULL, NULL, NULL),
('BKEXF16F000080', 'YMT', '(LID ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKEXF187000080', 'YMT', '(TANK,RECOVERY ASSY)', '85.00', 'ABS-A1', '0.03', '100.00', NULL, NULL, NULL),
('BKEXF312000080', 'YMT', '(COVER,OUTER 2 ASSY)', '58.00', 'PP-N4', '0.21', '1000.00', NULL, NULL, NULL),
('BKEXF31F000080', 'YMT', '(COVER,OUTER ASSY)', '127.00', 'PC-A1', '0.11', '350.00', NULL, NULL, NULL),
('BKEXF471100080', 'YMT', '(COVER,SEAT ASSY.)', '85.00', 'ABS-A1', '0.43', '1360.00', NULL, NULL, NULL),
('BKEXF831000080', 'YMT', '(LEG SHIELD 1 ASSY)', '58.00', 'PP-N4', '0.31', '1000.00', NULL, NULL, NULL),
('BKEXH219000080', 'YMT', '(COVER, BATTERY)', '65.00', 'PP-T2', '0.25', '300.00', NULL, NULL, NULL),
('BKRE2653000080', 'YMT', '(AIR SHROUD,CYLINDER 3)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BKRXF830000080', 'YMT', '(LEG SHIELD ASSY)', '53.50', 'PP-N4', '0.72', '1250.00', NULL, NULL, NULL),
('BLBXF84V000080', 'YMT', '(PROTECTOR,1 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL),
('BLBXF84W000080', 'YMT', '(PROTECTOR,2 ASSY)', '0.00', '', '0.00', '0.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
