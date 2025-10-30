-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2025 at 04:29 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn_buffet_ocean`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban_an`
--

CREATE TABLE `ban_an` (
  `id` bigint UNSIGNED NOT NULL,
  `khu_vuc_id` bigint UNSIGNED NOT NULL,
  `so_ban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_qr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duong_dan_qr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_ghe` int NOT NULL,
  `trang_thai` enum('trong','dang_phuc_vu','da_dat','khong_su_dung') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'trong',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ban_an`
--

INSERT INTO `ban_an` (`id`, `khu_vuc_id`, `so_ban`, `ma_qr`, `duong_dan_qr`, `so_ghe`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bàn 1', 'QR97TB', 'https://www.gulgowski.net/rem-quia-sed-sint-aut', 2, 'trong', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(2, 4, 'Bàn 2', 'QR42IP', 'http://langworth.com/', 2, 'da_dat', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(3, 4, 'Bàn 3', 'QR53RF', 'http://www.homenick.org/aspernatur-eum-facere-officia-incidunt-ullam-quo', 5, 'khong_su_dung', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(4, 2, 'Bàn 4', 'QR47GO', 'http://bahringer.com/sint-ex-laboriosam-et-nesciunt-saepe-non-molestiae', 5, 'dang_phuc_vu', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 3, 'Bàn 5', 'QR06QD', 'http://www.schumm.info/id-dolores-molestiae-voluptas', 7, 'da_dat', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(6, 2, 'Bàn 6', 'QR43IF', 'http://padberg.com/rem-libero-ipsam-ut-aut-suscipit-aut', 3, 'dang_phuc_vu', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(7, 4, 'Bàn 7', 'QR59BP', 'http://www.franecki.com/eum-illum-placeat-temporibus-cupiditate', 9, 'khong_su_dung', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(8, 4, 'Bàn 8', 'QR84OU', 'http://www.bauch.com/', 7, 'dang_phuc_vu', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(9, 3, 'Bàn 9', 'QR62ZZ', 'http://www.langworth.info/dolores-sed-tenetur-tenetur-dicta-illum-labore', 3, 'khong_su_dung', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(10, 1, 'Bàn 10', 'QR71TS', 'http://www.wehner.com/recusandae-amet-quasi-soluta-molestiae-aut-iure', 4, 'dang_phuc_vu', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(11, 2, 'Bàn 11', 'QR57QV', 'http://dicki.info/', 5, 'trong', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(12, 1, 'Bàn 12', 'QR00GQ', 'http://dickens.com/', 7, 'trong', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(13, 2, 'Bàn 13', 'QR83JK', 'http://blanda.com/est-vel-quidem-maxime-quos-quia-voluptas-sit.html', 8, 'da_dat', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(14, 5, 'Bàn 14', 'QR73LJ', 'http://robel.com/laborum-ea-amet-ex-et-aut-autem', 5, 'da_dat', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(15, 2, 'Bàn 15', 'QR10WD', 'http://www.macejkovic.com/id-dolores-perspiciatis-labore', 10, 'da_dat', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(16, 2, '000000000', '3cnkKbWv4IOo', 'http://localhost/order?table_code=3cnkKbWv4IOo', 6, 'dang_phuc_vu', '2025-10-29 12:19:42', '2025-10-29 12:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_order`
--

CREATE TABLE `chi_tiet_order` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `mon_an_id` bigint UNSIGNED NOT NULL,
  `so_luong` int DEFAULT NULL,
  `loai_mon` enum('combo','goi_them') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Phân loại món trong order',
  `trang_thai` enum('cho_bep','dang_che_bien','da_len_mon','huy_mon') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cho_bep' COMMENT 'Trạng thái chi tiết của từng món',
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `combo_buffet`
--

CREATE TABLE `combo_buffet` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_combo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_combo` enum('nguoi_lon','tre_em','vip','khuyen_mai') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại combo theo đối tượng khách',
  `gia_co_ban` decimal(12,2) NOT NULL,
  `thoi_luong_phut` int DEFAULT NULL,
  `thoi_gian_bat_dau` datetime DEFAULT NULL,
  `thoi_gian_ket_thuc` datetime DEFAULT NULL,
  `trang_thai` enum('dang_ban','ngung_ban') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang_ban' COMMENT 'Trạng thái kinh doanh (Đang bán / Ngừng bán)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo_buffet`
--

INSERT INTO `combo_buffet` (`id`, `ten_combo`, `loai_combo`, `gia_co_ban`, `thoi_luong_phut`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Combo Cupiditate', 'tre_em', 662287.00, 150, '2025-10-29 10:42:55', '2025-10-31 01:32:26', 'ngung_ban', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(2, 'Combo Necessitatibus', 'tre_em', 657163.00, 96, '2025-10-29 15:55:09', '2025-10-31 02:28:26', 'dang_ban', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(3, 'Combo Minima', 'nguoi_lon', 481821.00, 144, '2025-10-28 22:40:27', '2025-10-31 18:53:09', 'ngung_ban', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(4, 'Combo Voluptatibus', 'khuyen_mai', 542617.00, 130, '2025-10-29 06:33:17', '2025-10-30 16:11:42', 'dang_ban', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 'Combo Iusto', 'nguoi_lon', 502694.00, 146, '2025-10-29 09:43:22', '2025-10-31 16:10:32', 'ngung_ban', '2025-10-29 11:54:38', '2025-10-29 11:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc_mon`
--

CREATE TABLE `danh_muc_mon` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `hien_thi` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc_mon`
--

INSERT INTO `danh_muc_mon` (`id`, `ten_danh_muc`, `mo_ta`, `hien_thi`, `created_at`, `updated_at`) VALUES
(1, 'Hải sản', 'Các món thuộc nhóm Hải sản', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(2, 'Thịt nướng', 'Các món thuộc nhóm Thịt nướng', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(3, 'Món chay', 'Các món thuộc nhóm Món chay', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(4, 'Tráng miệng', 'Các món thuộc nhóm Tráng miệng', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 'Đồ uống', 'Các món thuộc nhóm Đồ uống', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `dat_ban`
--

CREATE TABLE `dat_ban` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_dat_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_khach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_khach` int NOT NULL,
  `ban_id` bigint UNSIGNED NOT NULL,
  `combo_id` bigint UNSIGNED DEFAULT NULL,
  `nhan_vien_id` bigint UNSIGNED DEFAULT NULL,
  `gio_den` datetime DEFAULT NULL,
  `thoi_luong_phut` int DEFAULT NULL,
  `tien_coc` decimal(12,2) DEFAULT NULL,
  `trang_thai` enum('cho_xac_nhan','da_xac_nhan','khach_da_den','hoan_tat','huy') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cho_xac_nhan' COMMENT 'Trạng thái của việc đặt bàn',
  `xac_thuc_ma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `la_dat_online` tinyint(1) NOT NULL DEFAULT '0',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` bigint UNSIGNED NOT NULL,
  `dat_ban_id` bigint UNSIGNED NOT NULL,
  `tong_tien` decimal(12,2) DEFAULT NULL,
  `tien_giam` decimal(12,2) DEFAULT NULL,
  `phu_thu` decimal(12,2) DEFAULT NULL,
  `da_thanh_toan` decimal(12,2) DEFAULT NULL,
  `phuong_thuc_tt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khu_vuc`
--

CREATE TABLE `khu_vuc` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_khu_vuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tang` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khu_vuc`
--

INSERT INTO `khu_vuc` (`id`, `ten_khu_vuc`, `mo_ta`, `tang`, `created_at`, `updated_at`) VALUES
(1, 'Khu vực U', 'Labore repudiandae ut ipsam non minus odit saepe.', 2, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(2, 'Khu vực I11', 'Excep1111111111', 1, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(3, 'Khu vực N', 'Maiores eligendi delectus quam ab nisi molestiae.', 2, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(4, 'Khu vực G', 'Sunt placeat et ratione reprehenderit sit accusantium pariatur.', 3, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 'Khu vực T', 'Dicta non nam numquam nesciunt ullam.', 2, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(6, 'trttrtrt', 'dâdaw', 1, NULL, NULL),
(7, 'trttrtrtdawd', 'dâdaw', 1, NULL, NULL),
(8, 'trttrtrtdawddw11', 'dâdaw', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_10_18_061722_create_nhan_vien_table', 1),
(2, '2025_10_18_061724_create_khu_vuc_table', 1),
(3, '2025_10_18_061725_create_ban_an_table', 1),
(4, '2025_10_18_061727_create_danh_muc_mon_table', 1),
(5, '2025_10_18_061728_create_mon_an_table', 1),
(6, '2025_10_18_061730_create_combo_buffet_table', 1),
(7, '2025_10_18_061731_create_mon_trong_combo_table', 1),
(8, '2025_10_18_061733_create_dat_ban_table', 1),
(9, '2025_10_18_061735_create_order_mon_table', 1),
(10, '2025_10_18_061736_create_chi_tiet_order_table', 1),
(11, '2025_10_18_061738_create_hoa_don_table', 1),
(12, '2025_10_19_174629_create_sessions_table', 1),
(13, '2025_10_24_213503_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mon_an`
--

CREATE TABLE `mon_an` (
  `id` bigint UNSIGNED NOT NULL,
  `danh_muc_id` bigint UNSIGNED NOT NULL,
  `ten_mon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` decimal(12,2) NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` enum('con','het','an') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'con' COMMENT 'Trạng thái kinh doanh của món ăn',
  `thoi_gian_che_bien` int DEFAULT NULL,
  `loai_mon` enum('Khai vị','Món chính','Tráng miệng','Đồ uống') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Phân loại món theo lượt ăn (course)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mon_an`
--

INSERT INTO `mon_an` (`id`, `danh_muc_id`, `ten_mon`, `gia`, `mo_ta`, `hinh_anh`, `trang_thai`, `thoi_gian_che_bien`, `loai_mon`, `created_at`, `updated_at`) VALUES
(1, 3, 'Consequatur adipisci', 97644.00, 'Tempore ducimus voluptatum non aut iste.', 'https://via.placeholder.com/400x300.png/00ddaa?text=food+qui', 'an', 18, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(2, 5, 'Suscipit beatae', 111055.00, 'Est voluptas rerum ipsam sit.', 'https://via.placeholder.com/400x300.png/0066ee?text=food+doloremque', 'an', 6, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(3, 3, 'Dicta est', 154339.00, 'Consequatur provident molestiae nihil dolores.', 'https://via.placeholder.com/400x300.png/00bb88?text=food+qui', 'con', 28, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(4, 5, 'Sapiente eum', 162615.00, 'Vitae aut iusto ut ut aut porro mollitia.', 'https://via.placeholder.com/400x300.png/00ee88?text=food+voluptas', 'con', 24, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 1, 'Natus et', 123107.00, 'Quo excepturi esse illum laudantium.', 'https://via.placeholder.com/400x300.png/006677?text=food+voluptates', 'an', 17, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(6, 4, 'Nesciunt provident', 121052.00, 'Animi sit esse quod assumenda.', 'https://via.placeholder.com/400x300.png/005500?text=food+reiciendis', 'het', 13, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(7, 1, 'Ipsam minus', 176083.00, 'Sint minus fugit maxime sed.', 'https://via.placeholder.com/400x300.png/00ccee?text=food+ea', 'an', 28, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(8, 2, 'Molestiae possimus', 65336.00, 'Sunt porro aut pariatur doloremque sequi.', 'https://via.placeholder.com/400x300.png/00cc88?text=food+eum', 'con', 7, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(9, 5, 'Aut cum', 166018.00, 'Libero iste ut aut temporibus.', 'https://via.placeholder.com/400x300.png/0044ff?text=food+natus', 'het', 30, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(10, 4, 'Sunt nam', 53804.00, 'Odio quo vel omnis quaerat ex debitis.', 'https://via.placeholder.com/400x300.png/0000cc?text=food+dignissimos', 'het', 9, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(11, 4, 'Ut impedit', 100370.00, 'Est temporibus enim possimus doloremque qui quos adipisci.', 'https://via.placeholder.com/400x300.png/002244?text=food+dolorem', 'con', 15, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(12, 4, 'Et nemo', 167851.00, 'Quidem quidem alias repellendus a officiis.', 'https://via.placeholder.com/400x300.png/0044ff?text=food+sed', 'an', 26, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(13, 1, 'Et iste', 87536.00, 'Unde quia deleniti debitis recusandae incidunt et voluptatem.', 'https://via.placeholder.com/400x300.png/003355?text=food+perferendis', 'het', 9, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(14, 5, 'Autem tenetur', 94041.00, 'Error cupiditate et ut repellat eos et.', 'https://via.placeholder.com/400x300.png/00ee55?text=food+dolor', 'con', 9, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(15, 4, 'Impedit et', 139622.00, 'Qui impedit omnis est qui.', 'https://via.placeholder.com/400x300.png/00ee22?text=food+rerum', 'het', 26, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(16, 3, 'Explicabo est', 156791.00, 'Voluptas ipsam et aperiam provident.', 'https://via.placeholder.com/400x300.png/001155?text=food+quo', 'an', 5, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(17, 2, 'Eligendi ut', 53601.00, 'Ut asperiores ut eos ut.', 'https://via.placeholder.com/400x300.png/00bb22?text=food+non', 'con', 11, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(18, 5, 'Dolores est', 150777.00, 'Ut et animi aspernatur earum et.', 'https://via.placeholder.com/400x300.png/001166?text=food+praesentium', 'het', 19, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(19, 1, 'Dolore omnis', 173642.00, 'Aut qui aut dolorem dolore.', 'https://via.placeholder.com/400x300.png/007766?text=food+voluptatum', 'het', 13, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(20, 1, 'Est illo', 141250.00, 'Repudiandae ratione numquam delectus.', 'https://via.placeholder.com/400x300.png/000033?text=food+minus', 'an', 24, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(21, 5, 'Et et', 76054.00, 'Quasi ea non facilis corrupti repudiandae temporibus ipsam.', 'https://via.placeholder.com/400x300.png/000066?text=food+aperiam', 'an', 29, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(22, 2, 'Voluptatem voluptas', 171979.00, 'Deserunt dolorem dolorum praesentium.', 'https://via.placeholder.com/400x300.png/002299?text=food+molestiae', 'an', 28, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(23, 4, 'Iusto dolor', 91803.00, 'Et nihil velit reiciendis sunt alias similique aut.', 'https://via.placeholder.com/400x300.png/0088ee?text=food+quas', 'het', 20, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(24, 1, 'Quo est', 91660.00, 'Dolor neque sed illum ipsum exercitationem expedita voluptatibus.', 'https://via.placeholder.com/400x300.png/0000aa?text=food+quo', 'con', 15, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(25, 3, 'Sapiente est', 197818.00, 'Aut quo est ex optio minus.', 'https://via.placeholder.com/400x300.png/00cc55?text=food+aut', 'con', 11, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(26, 3, 'Repellat est', 199656.00, 'Necessitatibus dolor autem sed.', 'https://via.placeholder.com/400x300.png/0088bb?text=food+laborum', 'con', 18, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(27, 2, 'Impedit error', 181653.00, 'Sunt beatae quidem voluptates officiis alias.', 'https://via.placeholder.com/400x300.png/00bb88?text=food+molestias', 'an', 30, 'Khai vị', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(28, 5, 'Possimus porro', 133201.00, 'Voluptas illo qui quia omnis rerum eum.', 'https://via.placeholder.com/400x300.png/008888?text=food+explicabo', 'het', 8, 'Đồ uống', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(29, 5, 'Facilis tempora', 171209.00, 'Sit quibusdam ratione expedita quaerat exercitationem beatae.', 'https://via.placeholder.com/400x300.png/0033ff?text=food+explicabo', 'het', 9, 'Tráng miệng', '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(30, 4, 'Dolores eaque', 144275.00, 'Incidunt dolores dolores suscipit doloremque laborum et.', 'https://via.placeholder.com/400x300.png/00aabb?text=food+ea', 'het', 23, 'Món chính', '2025-10-29 11:54:38', '2025-10-29 11:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `mon_trong_combo`
--

CREATE TABLE `mon_trong_combo` (
  `id` bigint UNSIGNED NOT NULL,
  `combo_id` bigint UNSIGNED NOT NULL,
  `mon_an_id` bigint UNSIGNED NOT NULL,
  `gioi_han_so_luong` int DEFAULT NULL,
  `phu_phi_goi_them` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mon_trong_combo`
--

INSERT INTO `mon_trong_combo` (`id`, `combo_id`, `mon_an_id`, `gioi_han_so_luong`, `phu_phi_goi_them`, `created_at`, `updated_at`) VALUES
(4, 5, 7, 5, 27022.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(5, 4, 18, 3, 29861.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(6, 5, 1, 2, 26881.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(7, 2, 7, 2, 10521.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(8, 3, 9, 1, 15325.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(9, 5, 17, 1, 25752.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(10, 3, 20, 2, 29292.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(11, 2, 28, 3, 11727.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(12, 2, 3, 5, 10290.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(13, 5, 23, 3, 23465.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(14, 5, 2, 4, 14768.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(15, 4, 10, 3, 22566.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(16, 2, 19, 3, 22621.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(17, 2, 27, 3, 29395.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(18, 1, 29, 1, 28191.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(19, 5, 22, 5, 24578.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(20, 5, 11, 1, 13232.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(21, 3, 21, 1, 27100.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(22, 5, 20, 3, 27040.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(23, 5, 24, 4, 15298.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(24, 3, 18, 3, 16976.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38'),
(25, 3, 10, 1, 17980.00, '2025-10-29 11:54:38', '2025-10-29 11:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` bigint UNSIGNED NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_mon`
--

CREATE TABLE `order_mon` (
  `id` bigint UNSIGNED NOT NULL,
  `dat_ban_id` bigint UNSIGNED NOT NULL,
  `ban_id` bigint UNSIGNED NOT NULL,
  `tong_mon` int DEFAULT NULL,
  `tong_tien` decimal(12,2) DEFAULT NULL,
  `trang_thai` enum('cho_bep','dang_che_bien','da_len_mon','huy_mon') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cho_bep' COMMENT 'Trạng thái tổng của phiếu order',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CASfAxxxw7tJxuHz9k4budPhRvHVUzKBubtTOlUs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkVxYkdzemxXUlAwd1pYcDdyb2lBT25FUUt5Mlo5YWVMelQyNjF5diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9raHUtdnVjLWJhbi1hbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761767415);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban_an`
--
ALTER TABLE `ban_an`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ban_an_khu_vuc_id_foreign` (`khu_vuc_id`);

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
-- Indexes for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_order_order_id_foreign` (`order_id`),
  ADD KEY `chi_tiet_order_mon_an_id_foreign` (`mon_an_id`);

--
-- Indexes for table `combo_buffet`
--
ALTER TABLE `combo_buffet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc_mon`
--
ALTER TABLE `danh_muc_mon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_ban`
--
ALTER TABLE `dat_ban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dat_ban_ma_dat_ban_unique` (`ma_dat_ban`),
  ADD KEY `dat_ban_ban_id_foreign` (`ban_id`),
  ADD KEY `dat_ban_combo_id_foreign` (`combo_id`),
  ADD KEY `dat_ban_nhan_vien_id_foreign` (`nhan_vien_id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_dat_ban_id_foreign` (`dat_ban_id`);

--
-- Indexes for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mon_an_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Indexes for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mon_trong_combo_combo_id_foreign` (`combo_id`),
  ADD KEY `mon_trong_combo_mon_an_id_foreign` (`mon_an_id`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_mon`
--
ALTER TABLE `order_mon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_mon_dat_ban_id_foreign` (`dat_ban_id`),
  ADD KEY `order_mon_ban_id_foreign` (`ban_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban_an`
--
ALTER TABLE `ban_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `combo_buffet`
--
ALTER TABLE `combo_buffet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danh_muc_mon`
--
ALTER TABLE `danh_muc_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dat_ban`
--
ALTER TABLE `dat_ban`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_mon`
--
ALTER TABLE `order_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban_an`
--
ALTER TABLE `ban_an`
  ADD CONSTRAINT `ban_an_khu_vuc_id_foreign` FOREIGN KEY (`khu_vuc_id`) REFERENCES `khu_vuc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  ADD CONSTRAINT `chi_tiet_order_mon_an_id_foreign` FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_mon` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dat_ban`
--
ALTER TABLE `dat_ban`
  ADD CONSTRAINT `dat_ban_ban_id_foreign` FOREIGN KEY (`ban_id`) REFERENCES `ban_an` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dat_ban_combo_id_foreign` FOREIGN KEY (`combo_id`) REFERENCES `combo_buffet` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `dat_ban_nhan_vien_id_foreign` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhan_vien` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_dat_ban_id_foreign` FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mon_an`
--
ALTER TABLE `mon_an`
  ADD CONSTRAINT `mon_an_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc_mon` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  ADD CONSTRAINT `mon_trong_combo_combo_id_foreign` FOREIGN KEY (`combo_id`) REFERENCES `combo_buffet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mon_trong_combo_mon_an_id_foreign` FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_mon`
--
ALTER TABLE `order_mon`
  ADD CONSTRAINT `order_mon_ban_id_foreign` FOREIGN KEY (`ban_id`) REFERENCES `ban_an` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_mon_dat_ban_id_foreign` FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
