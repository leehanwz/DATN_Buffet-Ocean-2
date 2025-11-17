-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2025 at 11:37 AM
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
(1, 3, 'Bàn 1', 'QR01GG', 'http://goodwin.net/sed-non-dolor-nostrum-ea-beatae', 2, 'da_dat', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 3, 'Bàn 2', 'QR70UN', 'http://www.cormier.com/in-soluta-eveniet-temporibus.html', 4, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 5, 'Bàn 3', 'QR35EE', 'https://www.konopelski.biz/aspernatur-veniam-corrupti-ut-illum-molestiae', 2, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 1, 'Bàn 4', 'QR74MQ', 'http://www.wilderman.org/enim-non-dolorum-eaque-voluptates-iusto.html', 5, 'da_dat', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 5, 'Bàn 5', 'QR36XU', 'http://www.conn.org/eum-reiciendis-ducimus-non-et-vel.html', 6, 'trong', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(6, 3, 'Bàn 6', 'QR18GV', 'http://www.blick.net/', 4, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(7, 1, 'Bàn 7', 'QR29QY', 'https://schoen.com/fugit-vero-repellat-in-culpa-omnis-repellendus-animi-facilis.html', 5, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 1, 'Bàn 8', 'QR41WQ', 'https://www.conroy.biz/porro-atque-voluptas-consequatur-qui', 9, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(9, 5, 'Bàn 9', 'QR25RV', 'http://www.adams.com/quia-nostrum-voluptatem-atque-a-facilis-suscipit.html', 7, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(10, 1, 'Bàn 10', 'QR01IT', 'http://www.collier.com/illo-sed-voluptatem-corporis-expedita-error-in-corrupti', 3, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 4, 'Bàn 11', 'QR06RV', 'https://www.lueilwitz.biz/eos-iure-fuga-nobis', 8, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(12, 1, 'Bàn 12', 'QR39XJ', 'https://harber.com/tempora-iusto-inventore-natus-eius.html', 4, 'da_dat', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(13, 1, 'Bàn 13', 'QR32JA', 'http://www.moen.net/earum-perferendis-non-quis-iste-error-ipsum.html', 5, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(14, 4, 'Bàn 14', 'QR76OW', 'https://treutel.com/corporis-atque-ullam-voluptatem.html', 10, 'trong', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(15, 2, 'Bàn 15', 'QR55PH', 'http://stanton.com/eos-voluptates-aut-et-repellat-inventore-dolore', 3, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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

--
-- Dumping data for table `chi_tiet_order`
--

INSERT INTO `chi_tiet_order` (`id`, `order_id`, `mon_an_id`, `so_luong`, `loai_mon`, `trang_thai`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 3, 19, 1, 'goi_them', 'dang_che_bien', NULL, '2025-11-14 19:34:58', '2025-11-14 04:34:58'),
(2, 10, 18, 1, 'goi_them', 'da_len_mon', NULL, '2025-11-10 13:34:58', '2025-11-14 04:34:58'),
(3, 16, 23, 3, 'goi_them', 'cho_bep', NULL, '2025-11-14 13:34:58', '2025-11-14 04:34:58'),
(4, 3, 18, 2, 'goi_them', 'huy_mon', 'Làm chín kỹ giúp khách', '2025-11-11 21:34:58', '2025-11-14 04:34:58'),
(5, 9, 9, 3, 'goi_them', 'cho_bep', 'Làm chín kỹ giúp khách', '2025-11-11 22:34:58', '2025-11-14 04:34:58'),
(6, 5, 10, 2, 'combo', 'dang_che_bien', 'Mang ra sau món chính', '2025-11-13 19:34:58', '2025-11-14 04:34:58'),
(7, 7, 18, 4, 'goi_them', 'cho_bep', 'Gọi thêm phần nhỏ', '2025-11-12 00:34:58', '2025-11-14 04:34:58'),
(8, 8, 17, 4, 'combo', 'dang_che_bien', 'Không hành', '2025-11-10 08:34:58', '2025-11-14 04:34:58'),
(9, 18, 6, 1, 'goi_them', 'da_len_mon', NULL, '2025-11-11 05:34:58', '2025-11-14 04:34:58'),
(10, 9, 1, 5, 'goi_them', 'cho_bep', 'Bỏ đá', '2025-11-14 21:34:58', '2025-11-14 04:34:58'),
(11, 7, 30, 4, 'goi_them', 'cho_bep', NULL, '2025-11-14 16:34:58', '2025-11-14 04:34:58'),
(12, 7, 26, 4, 'goi_them', 'da_len_mon', NULL, '2025-11-10 01:34:58', '2025-11-14 04:34:58'),
(13, 1, 7, 5, 'combo', 'dang_che_bien', 'Khách yêu cầu làm nhanh', '2025-11-10 12:34:58', '2025-11-14 04:34:58'),
(14, 16, 20, 4, 'goi_them', 'da_len_mon', 'Thêm rau ăn kèm', '2025-11-10 19:34:58', '2025-11-14 04:34:58'),
(15, 9, 7, 3, 'goi_them', 'cho_bep', NULL, '2025-11-12 18:34:58', '2025-11-14 04:34:58'),
(16, 12, 12, 4, 'goi_them', 'huy_mon', NULL, '2025-11-12 08:34:58', '2025-11-14 04:34:58'),
(17, 9, 21, 4, 'combo', 'cho_bep', NULL, '2025-11-10 07:34:58', '2025-11-14 04:34:58'),
(18, 12, 11, 2, 'combo', 'dang_che_bien', NULL, '2025-11-10 05:34:58', '2025-11-14 04:34:58'),
(19, 4, 10, 2, 'combo', 'dang_che_bien', NULL, '2025-11-09 11:34:58', '2025-11-14 04:34:58'),
(20, 20, 18, 3, 'combo', 'cho_bep', 'Mang ra sau món chính', '2025-11-13 06:34:58', '2025-11-14 04:34:58'),
(21, 3, 22, 4, 'combo', 'dang_che_bien', NULL, '2025-11-12 17:34:58', '2025-11-14 04:34:58'),
(22, 6, 18, 1, 'goi_them', 'cho_bep', 'Mang ra sau món chính', '2025-11-14 06:34:58', '2025-11-14 04:34:58'),
(23, 6, 24, 4, 'combo', 'cho_bep', NULL, '2025-11-10 16:34:58', '2025-11-14 04:34:58'),
(24, 8, 2, 5, 'goi_them', 'huy_mon', NULL, '2025-11-09 04:34:58', '2025-11-14 04:34:58'),
(25, 4, 4, 2, 'goi_them', 'huy_mon', NULL, '2025-11-10 19:34:58', '2025-11-14 04:34:58'),
(26, 4, 25, 2, 'goi_them', 'dang_che_bien', 'Làm chín kỹ giúp khách', '2025-11-15 02:34:58', '2025-11-14 04:34:58'),
(27, 10, 26, 3, 'combo', 'huy_mon', NULL, '2025-11-09 20:34:58', '2025-11-14 04:34:58'),
(28, 18, 9, 4, 'goi_them', 'da_len_mon', 'Ít cay', '2025-11-14 05:34:58', '2025-11-14 04:34:58'),
(29, 2, 30, 1, 'goi_them', 'huy_mon', 'Bỏ đá', '2025-11-14 16:34:58', '2025-11-14 04:34:58'),
(30, 4, 20, 3, 'combo', 'huy_mon', 'Không hành', '2025-11-14 21:34:58', '2025-11-14 04:34:58');

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
  `anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Đường dẫn ảnh combo buffet',
  `trang_thai` enum('dang_ban','ngung_ban') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang_ban' COMMENT 'Trạng thái kinh doanh (Đang bán / Ngừng bán)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combo_buffet`
--

INSERT INTO `combo_buffet` (`id`, `ten_combo`, `loai_combo`, `gia_co_ban`, `thoi_luong_phut`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Combo Autem', 'tre_em', 662908.00, 123, '2025-11-13 23:42:24', '2025-11-16 05:00:21', NULL, 'dang_ban', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 'Combo Voluptatem', 'nguoi_lon', 400760.00, 105, '2025-11-14 00:14:36', '2025-11-15 23:40:36', NULL, 'ngung_ban', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 'Combo Nisi', 'nguoi_lon', 376163.00, 146, '2025-11-13 20:47:06', '2025-11-16 00:13:14', NULL, 'dang_ban', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 'Combo Ut', 'vip', 520661.00, 62, '2025-11-13 19:22:02', '2025-11-14 22:25:03', NULL, 'dang_ban', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 'Combo Cupiditate', 'nguoi_lon', 768645.00, 97, '2025-11-14 04:46:18', '2025-11-15 15:15:31', NULL, 'dang_ban', '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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
(1, 'Hải sản', 'Các món thuộc nhóm Hải sản', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 'Thịt nướng', 'Các món thuộc nhóm Thịt nướng', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 'Món chay', 'Các món thuộc nhóm Món chay', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 'Tráng miệng', 'Các món thuộc nhóm Tráng miệng', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 'Đồ uống', 'Các món thuộc nhóm Đồ uống', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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

--
-- Dumping data for table `dat_ban`
--

INSERT INTO `dat_ban` (`id`, `ma_dat_ban`, `ten_khach`, `sdt_khach`, `so_khach`, `ban_id`, `combo_id`, `nhan_vien_id`, `gio_den`, `thoi_luong_phut`, `tien_coc`, `trang_thai`, `xac_thuc_ma`, `la_dat_online`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'DB20251114-001', 'Thái Định Tâm', '0901649428', 7, 13, 4, NULL, '2025-11-19 07:47:34', 160, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(2, 'DB20251114-002', 'Dư Tuấn', '0902672816', 10, 8, NULL, NULL, '2025-11-16 01:56:51', 124, 50000.00, 'cho_xac_nhan', '495588', 1, 'Aut voluptatum sequi repudiandae sed inventore magnam consequuntur.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(3, 'DB20251114-003', 'Cấn Hoàn', '0928176301', 3, 14, NULL, NULL, '2025-11-15 23:54:55', 79, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(4, 'DB20251114-004', 'Chú. Thi Tín', '0986781884', 6, 7, 4, NULL, '2025-11-21 10:56:59', 167, 100000.00, 'huy', NULL, 0, 'Laborum totam ut ipsum excepturi magnam.', '2025-11-09 04:34:56', '2025-11-14 04:34:56'),
(5, 'DB20251114-005', 'Tôn Hướng Nhiên', '0933263722', 4, 11, 1, NULL, '2025-11-21 10:52:09', 109, 200000.00, 'da_xac_nhan', '033801', 1, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(6, 'DB20251114-006', 'Bà. Lư Mai Thanh', '0919421698', 2, 9, 4, NULL, '2025-11-16 10:45:20', 63, 0.00, 'hoan_tat', '825183', 1, NULL, '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(7, 'DB20251114-007', 'Đôn Hoa', '0986612646', 2, 3, 4, NULL, '2025-11-17 12:42:34', 111, 0.00, 'huy', '314501', 1, 'Voluptatem doloremque natus illum blanditiis est.', '2025-11-09 04:34:56', '2025-11-14 04:34:56'),
(8, 'DB20251114-008', 'Anh. Phi Công Nhã', '0936805564', 7, 10, 1, NULL, '2025-11-19 13:54:40', 111, 200000.00, 'khach_da_den', '122925', 1, 'Dolores ad numquam quia expedita consequuntur nihil.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(9, 'DB20251114-009', 'Bác. Âu Nghĩa Phụng', '0960249965', 5, 4, 3, NULL, '2025-11-20 08:30:06', 79, 200000.00, 'huy', NULL, 0, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(10, 'DB20251114-010', 'Bà. Chiêm Tuệ', '0978341534', 9, 6, NULL, NULL, '2025-11-18 21:30:03', 107, 50000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(11, 'DB20251114-011', 'Tiếp Thiện Quân', '0983789759', 4, 1, 5, NULL, '2025-11-19 21:03:50', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(12, 'DB20251114-012', 'Em. Giả Khang', '0930375868', 5, 12, 4, NULL, '2025-11-19 20:40:52', 167, 0.00, 'huy', '174447', 1, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(13, 'DB20251114-013', 'Cụ. Cung Ngọc Đoàn', '0992217938', 3, 15, 5, NULL, '2025-11-21 00:45:15', 175, 50000.00, 'huy', '762861', 1, NULL, '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(14, 'DB20251114-014', 'Danh Hạnh', '0998844270', 4, 9, NULL, NULL, '2025-11-16 19:03:19', 160, 50000.00, 'cho_xac_nhan', NULL, 0, 'Facere nesciunt ipsum dolorem aut fugit laudantium.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(15, 'DB20251114-015', 'Giả Sang', '0973248172', 9, 13, 3, NULL, '2025-11-16 14:05:31', 98, 50000.00, 'khach_da_den', '852430', 1, 'Aut quas explicabo aut quia sint quis temporibus.', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(16, 'DB20251114-016', 'Đinh Mai Huyền', '0907715153', 3, 14, NULL, NULL, '2025-11-21 04:46:18', 95, 50000.00, 'hoan_tat', NULL, 0, 'Ut qui necessitatibus aut molestiae ut.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(17, 'DB20251114-017', 'Bác. Cấn Lê Ty', '0942746133', 6, 2, NULL, NULL, '2025-11-18 09:45:56', 132, 200000.00, 'huy', '908303', 1, NULL, '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(18, 'DB20251114-018', 'Bế Hằng Hương', '0986391805', 4, 6, NULL, NULL, '2025-11-16 15:29:45', 110, 0.00, 'cho_xac_nhan', '688092', 1, 'Similique labore atque delectus rerum.', '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(19, 'DB20251114-019', 'Cổ Lễ', '0977921063', 6, 8, 2, NULL, '2025-11-19 05:34:56', 60, 50000.00, 'cho_xac_nhan', NULL, 0, 'Consequuntur corrupti esse vel maiores nobis quo et error.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(20, 'DB20251114-020', 'Bác. Lỳ Điệp', '0988690411', 10, 2, NULL, NULL, '2025-11-18 01:01:46', 115, 100000.00, 'da_xac_nhan', NULL, 0, 'Ad consectetur quidem nobis magnam enim ipsum.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(21, 'DB20251114-021', 'Em. Hy Khanh', '0999175887', 6, 10, 4, NULL, '2025-11-17 21:27:10', 133, 200000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(22, 'DB20251114-022', 'Ông. Thào Quý Cẩn', '0973647625', 2, 6, NULL, NULL, '2025-11-19 11:48:41', 64, 0.00, 'cho_xac_nhan', NULL, 0, 'Reiciendis dolor et sunt debitis ducimus autem eos.', '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(23, 'DB20251114-023', 'Em. Bình Trưởng', '0908787632', 2, 3, 1, NULL, '2025-11-17 15:25:39', 180, 200000.00, 'khach_da_den', NULL, 0, 'Quia pariatur facilis fugiat in quia tempore.', '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(24, 'DB20251114-024', 'Phương Di', '0939975367', 4, 6, 5, NULL, '2025-11-19 00:51:16', 123, 200000.00, 'cho_xac_nhan', '753551', 1, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(25, 'DB20251114-025', 'Chị. Ánh Lệ', '0914866741', 3, 8, NULL, NULL, '2025-11-20 22:29:19', 134, 100000.00, 'cho_xac_nhan', '174550', 1, 'Sit aut commodi autem voluptatum.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(26, 'DB20251114-026', 'Chú. Vi Anh Lễ', '0926552608', 8, 7, NULL, NULL, '2025-11-20 12:25:33', 155, 200000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(27, 'DB20251114-027', 'Nghị Phước', '0955704854', 5, 8, 2, NULL, '2025-11-20 15:43:53', 113, 0.00, 'khach_da_den', '993755', 1, 'Et qui deserunt neque qui omnis.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(28, 'DB20251114-028', 'Cấn Cảnh', '0956506070', 5, 13, NULL, NULL, '2025-11-17 17:01:44', 84, 100000.00, 'cho_xac_nhan', '249137', 1, 'Sit modi necessitatibus in et suscipit quas.', '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(29, 'DB20251114-029', 'Chú. Hoa Dân Kính', '0966306644', 5, 4, 5, NULL, '2025-11-17 00:33:57', 60, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(30, 'DB20251114-030', 'Cô. Khổng Tuyết', '0941425736', 6, 5, NULL, NULL, '2025-11-18 03:21:59', 100, 200000.00, 'khach_da_den', '858043', 1, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(31, 'DB20251114-031', 'Cụ. Lỳ Hoàn Sương', '0919810130', 7, 1, NULL, NULL, '2025-11-19 16:28:52', 77, 0.00, 'khach_da_den', '910567', 1, NULL, '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(32, 'DB20251114-032', 'Cụ. Đậu Đan Trúc', '0984139830', 3, 15, 4, NULL, '2025-11-19 02:47:59', 168, 100000.00, 'khach_da_den', NULL, 0, NULL, '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(33, 'DB20251114-033', 'Bà. Nghị Uyên Thục', '0961249401', 6, 15, 3, NULL, '2025-11-19 12:59:59', 127, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(34, 'DB20251114-034', 'Hoa Di', '0998959114', 4, 9, NULL, NULL, '2025-11-20 02:33:21', 109, 200000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(35, 'DB20251114-035', 'Chị. Khu Băng', '0906346375', 7, 7, NULL, NULL, '2025-11-15 23:53:30', 131, 200000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(36, 'DB20251114-036', 'Cô. Chu Băng', '0943872284', 7, 8, NULL, NULL, '2025-11-16 04:55:19', 138, 200000.00, 'da_xac_nhan', '929463', 1, NULL, '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(37, 'DB20251114-037', 'Cụ. Khu Cảnh', '0909175071', 2, 3, NULL, NULL, '2025-11-19 22:09:43', 78, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(38, 'DB20251114-038', 'Ông. Hán Đức Hồng', '0962194651', 3, 7, NULL, NULL, '2025-11-16 00:04:58', 83, 100000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(39, 'DB20251114-039', 'Bác. Cấn Nhuận', '0964099599', 4, 1, NULL, NULL, '2025-11-15 23:12:39', 153, 100000.00, 'khach_da_den', NULL, 0, 'Autem temporibus repellat quia quia.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(40, 'DB20251114-040', 'Hà Trúc', '0997426764', 3, 14, NULL, NULL, '2025-11-21 00:47:01', 62, 200000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(41, 'DB20251114-041', 'Bác. Giao Hồng Duy', '0978789176', 6, 8, NULL, NULL, '2025-11-17 10:41:14', 113, 100000.00, 'cho_xac_nhan', '268358', 1, 'Maxime ad dolores qui amet.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(42, 'DB20251114-042', 'Bác. Trà Đức Đồng', '0942405729', 4, 8, NULL, NULL, '2025-11-21 05:44:57', 78, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(43, 'DB20251114-043', 'Lạc Tiên', '0912450181', 9, 6, 5, NULL, '2025-11-20 16:00:30', 152, 50000.00, 'huy', NULL, 0, 'Quia et aspernatur et architecto.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(44, 'DB20251114-044', 'Chú. Ông Hiền Nghị', '0933476124', 8, 14, 1, NULL, '2025-11-15 18:23:33', 89, 200000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(45, 'DB20251114-045', 'Bác. Bì Lan Lan', '0960279220', 4, 14, NULL, NULL, '2025-11-20 05:37:09', 107, 0.00, 'cho_xac_nhan', '261033', 1, 'Ut officiis eos in vitae dolorem.', '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(46, 'DB20251114-046', 'Cô. Mạc Việt Chiêu', '0989598059', 10, 10, 5, NULL, '2025-11-20 07:00:06', 177, 50000.00, 'cho_xac_nhan', NULL, 0, 'Deserunt vero facilis enim ut fugit illo quia.', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(47, 'DB20251114-047', 'Ông. Thịnh Huy Đan', '0986421585', 8, 1, 4, NULL, '2025-11-18 16:16:15', 62, 0.00, 'cho_xac_nhan', NULL, 0, 'Odio ducimus illum distinctio sunt dicta hic quisquam.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(48, 'DB20251114-048', 'Cô. Sơn Thơ Quân', '0985138281', 5, 1, NULL, NULL, '2025-11-18 07:03:56', 177, 0.00, 'huy', '970930', 1, 'Cumque animi temporibus rerum.', '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(49, 'DB20251114-049', 'Ông. Lục Dương Nhượng', '0989808801', 8, 14, 5, NULL, '2025-11-18 10:08:18', 170, 100000.00, 'da_xac_nhan', '136756', 1, 'Et laborum rerum et.', '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(50, 'DB20251114-050', 'Ông. Châu Toản', '0905178447', 7, 11, NULL, NULL, '2025-11-17 20:15:55', 133, 50000.00, 'hoan_tat', NULL, 0, 'Maxime dolores iusto quisquam sed perspiciatis exercitationem atque.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(51, 'DB20251114-051', 'Diệp Chính Lập', '0973767675', 9, 5, 4, NULL, '2025-11-15 16:30:48', 131, 50000.00, 'khach_da_den', '306639', 1, NULL, '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(52, 'DB20251114-052', 'Em. Vừ Sâm', '0932611190', 10, 8, NULL, NULL, '2025-11-16 23:30:19', 146, 200000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-09 04:34:56', '2025-11-14 04:34:56'),
(53, 'DB20251114-053', 'Cụ. Nhiệm Chiến Di', '0944174989', 7, 14, NULL, NULL, '2025-11-18 10:01:22', 65, 50000.00, 'hoan_tat', '652152', 1, 'Necessitatibus aut doloremque molestias in.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(54, 'DB20251114-054', 'Bảo Nhạn', '0902953028', 5, 3, NULL, NULL, '2025-11-16 20:15:15', 92, 0.00, 'hoan_tat', '393962', 1, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(55, 'DB20251114-055', 'Cô. Nông Thắm', '0915938442', 5, 14, NULL, NULL, '2025-11-17 02:46:52', 70, 200000.00, 'da_xac_nhan', '184828', 1, NULL, '2025-11-12 04:34:56', '2025-11-14 04:34:56'),
(56, 'DB20251114-056', 'Em. Cự Ty', '0962431915', 6, 6, NULL, NULL, '2025-11-17 10:07:26', 81, 0.00, 'hoan_tat', '464013', 1, 'Quidem officia esse velit vel aliquid iste.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(57, 'DB20251114-057', 'Em. Đường Chinh', '0935834074', 3, 9, 1, NULL, '2025-11-18 19:46:51', 99, 200000.00, 'da_xac_nhan', '316577', 1, 'Vitae rerum vel maxime a.', '2025-11-07 04:34:56', '2025-11-14 04:34:56'),
(58, 'DB20251114-058', 'Phi Nguyễn Lạc', '0976560596', 2, 7, 2, NULL, '2025-11-19 15:33:29', 74, 100000.00, 'khach_da_den', '075574', 1, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(59, 'DB20251114-059', 'Ca Hán Dinh', '0944100447', 8, 15, 4, NULL, '2025-11-18 01:48:38', 141, 200000.00, 'hoan_tat', NULL, 0, 'Iure repellendus tenetur maiores soluta autem impedit cupiditate.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(60, 'DB20251114-060', 'Thi Sâm', '0904692358', 3, 5, 3, NULL, '2025-11-17 14:27:52', 83, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-08 04:34:56', '2025-11-14 04:34:56'),
(61, 'DB20251114-061', 'Nghiêm Đức', '0927631107', 8, 3, 2, NULL, '2025-11-20 14:01:15', 138, 50000.00, 'huy', NULL, 0, 'Animi iure eius rerum aut.', '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(62, 'DB20251114-062', 'Anh. Tông Vĩ', '0914644238', 9, 11, NULL, NULL, '2025-11-18 05:43:50', 180, 50000.00, 'khach_da_den', NULL, 0, NULL, '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(63, 'DB20251114-063', 'Ông. Lều Nguyên Khương', '0998305055', 7, 4, NULL, NULL, '2025-11-16 19:56:50', 107, 100000.00, 'khach_da_den', NULL, 0, 'Porro in sint consectetur non magni.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(64, 'DB20251114-064', 'Bà. Bảo Sao Đan', '0911881136', 3, 1, 2, NULL, '2025-11-15 11:41:25', 92, 200000.00, 'khach_da_den', NULL, 0, 'Omnis fugit quae voluptatum.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(65, 'DB20251114-065', 'Chị. Khu Ái', '0977700707', 8, 13, NULL, NULL, '2025-11-19 12:05:08', 142, 100000.00, 'da_xac_nhan', '580136', 1, 'Eos beatae omnis aspernatur sed.', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(66, 'DB20251114-066', 'Trà Sông Ánh', '0967681556', 7, 3, 5, NULL, '2025-11-17 05:12:35', 122, 50000.00, 'huy', '706405', 1, 'Dolores quas saepe amet nihil.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(67, 'DB20251114-067', 'Hình Mi', '0999447816', 7, 7, 4, NULL, '2025-11-17 15:41:17', 97, 200000.00, 'huy', '644802', 1, 'Asperiores architecto delectus sint vel perferendis.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(68, 'DB20251114-068', 'Bác. Giang Đức Minh', '0934254637', 4, 1, NULL, NULL, '2025-11-17 16:39:18', 105, 50000.00, 'cho_xac_nhan', NULL, 0, 'Ut velit voluptas natus vel facere.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(69, 'DB20251114-069', 'Ung Hiệp Quyền', '0953085733', 7, 14, NULL, NULL, '2025-11-18 21:20:05', 166, 0.00, 'hoan_tat', '483398', 1, 'Ea occaecati aut id earum enim quia.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(70, 'DB20251114-070', 'Bà. Đậu Vi Oanh', '0959764984', 5, 7, 3, NULL, '2025-11-17 07:51:52', 158, 50000.00, 'huy', '988708', 1, NULL, '2025-11-12 04:34:56', '2025-11-14 04:34:56'),
(71, 'DB20251114-071', 'Chú. Ty Khởi Kiên', '0999282227', 6, 11, 4, NULL, '2025-11-16 13:40:05', 99, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(72, 'DB20251114-072', 'Chế Nhiên', '0941265235', 10, 10, 3, NULL, '2025-11-17 07:25:36', 155, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-05 04:34:56', '2025-11-14 04:34:56'),
(73, 'DB20251114-073', 'Chú. Ấu Xuân', '0926099948', 9, 2, 4, NULL, '2025-11-20 04:27:52', 88, 0.00, 'khach_da_den', NULL, 0, 'Voluptatem est nam consequatur.', '2025-11-04 04:34:56', '2025-11-14 04:34:56'),
(74, 'DB20251114-074', 'Cù Bạch', '0949664504', 9, 1, NULL, NULL, '2025-11-21 03:38:03', 172, 200000.00, 'hoan_tat', NULL, 0, 'In eaque sit maxime cupiditate expedita sint.', '2025-11-09 04:34:56', '2025-11-14 04:34:56'),
(75, 'DB20251114-075', 'Chú. Giang Đình', '0933662287', 2, 15, NULL, NULL, '2025-11-17 20:52:10', 165, 200000.00, 'hoan_tat', NULL, 0, 'Autem nemo eum fuga voluptates.', '2025-11-10 04:34:56', '2025-11-14 04:34:56'),
(76, 'DB20251114-076', 'Liễu Mộng Diễm', '0948154640', 2, 1, NULL, NULL, '2025-11-17 14:08:12', 125, 100000.00, 'da_xac_nhan', NULL, 0, 'Rem nihil ipsam reprehenderit autem et assumenda.', '2025-11-11 04:34:56', '2025-11-14 04:34:56'),
(77, 'DB20251114-077', 'Ấu Uyển', '0987179472', 5, 1, NULL, NULL, '2025-11-17 21:33:50', 75, 0.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(78, 'DB20251114-078', 'Chú. Thập Lam', '0941524831', 2, 4, 3, NULL, '2025-11-20 16:13:55', 151, 0.00, 'huy', '640775', 1, 'Perspiciatis non non deleniti asperiores similique vel.', '2025-11-13 04:34:56', '2025-11-14 04:34:56'),
(79, 'DB20251114-079', 'Cô. Đái Oanh Hạnh', '0926112687', 5, 9, NULL, NULL, '2025-11-18 10:20:22', 123, 100000.00, 'khach_da_den', '720725', 1, 'Recusandae quo ratione est autem sunt.', '2025-11-06 04:34:56', '2025-11-14 04:34:56'),
(80, 'DB20251114-080', 'Bác. Hình Thực', '0999788445', 6, 6, 5, NULL, '2025-11-16 23:38:14', 167, 50000.00, 'khach_da_den', '115403', 1, NULL, '2025-11-09 04:34:56', '2025-11-14 04:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_hoa_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat_ban_id` bigint UNSIGNED NOT NULL,
  `voucher_id` bigint UNSIGNED DEFAULT NULL,
  `tong_tien` decimal(12,2) DEFAULT NULL,
  `tien_giam` decimal(12,2) DEFAULT NULL,
  `phu_thu` decimal(12,2) DEFAULT NULL,
  `da_thanh_toan` decimal(12,2) DEFAULT NULL,
  `phuong_thuc_tt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `ma_hoa_don`, `dat_ban_id`, `voucher_id`, `tong_tien`, `tien_giam`, `phu_thu`, `da_thanh_toan`, `phuong_thuc_tt`, `created_at`, `updated_at`) VALUES
(1, 'HD202511145823', 1, NULL, 2125793.66, 219265.29, 0.00, 1906528.37, 'Thẻ Visa/Mastercard', '2025-11-08 04:34:56', '2025-11-08 04:41:56'),
(2, 'HD202511142891', 3, NULL, 1742855.88, 153326.35, 10000.00, 1599529.53, 'Tiền mặt', '2025-11-05 04:34:56', '2025-11-05 05:37:56'),
(3, 'HD202511149248', 6, NULL, 1876887.69, 200547.91, 0.00, 1676339.78, 'Chuyển khoản ngân hàng', '2025-11-10 04:34:56', '2025-11-10 06:19:56'),
(4, 'HD202511140045', 8, NULL, 1730236.00, 51193.74, 30000.00, 1709042.26, 'Tiền mặt', '2025-11-06 04:34:56', '2025-11-06 04:40:56'),
(5, 'HD202511146250', 11, NULL, 4038062.14, 20452.82, 10000.00, 4027609.32, 'Thẻ Visa/Mastercard', '2025-11-04 04:34:56', '2025-11-04 06:27:56'),
(6, 'HD202511143696', 15, NULL, 1162570.16, 104186.72, 30000.00, 1088383.44, 'Chuyển khoản ngân hàng', '2025-11-14 04:34:56', '2025-11-14 06:20:56'),
(7, 'HD202511142189', 16, NULL, 1840223.64, 45812.51, 10000.00, 1804411.13, 'Thẻ Visa/Mastercard', '2025-11-13 04:34:56', '2025-11-13 05:32:56'),
(8, 'HD202511140112', 21, NULL, 2167926.43, 238108.96, 0.00, 1929817.47, 'Tiền mặt', '2025-11-06 04:34:56', '2025-11-06 05:24:56'),
(9, 'HD202511148895', 23, NULL, 2001797.19, 213549.92, 0.00, 1788247.27, 'Thẻ Visa/Mastercard', '2025-11-10 04:34:56', '2025-11-10 05:42:56'),
(10, 'HD202511141930', 26, NULL, 826846.51, 71018.24, 10000.00, 765828.27, 'Thẻ Visa/Mastercard', '2025-11-08 04:34:56', '2025-11-08 05:47:56'),
(11, 'HD202511144812', 27, NULL, 4630808.57, 430317.29, 50000.00, 4250491.28, 'Thẻ Visa/Mastercard', '2025-11-06 04:34:56', '2025-11-06 05:29:56'),
(12, 'HD202511147349', 29, NULL, 3967322.36, 537117.33, 10000.00, 3440205.03, 'Chuyển khoản ngân hàng', '2025-11-11 04:34:56', '2025-11-11 06:01:56'),
(13, 'HD202511145700', 30, NULL, 4345522.46, 287571.08, 10000.00, 4067951.38, 'Thẻ Visa/Mastercard', '2025-11-08 04:34:56', '2025-11-08 05:11:56'),
(14, 'HD202511142542', 31, NULL, 1170403.99, 105293.65, 50000.00, 1115110.34, 'Chuyển khoản ngân hàng', '2025-11-06 04:34:56', '2025-11-06 04:36:56'),
(15, 'HD202511146402', 32, NULL, 4704025.57, 394911.44, 0.00, 4309114.13, 'Ví điện tử Momo', '2025-11-04 04:34:56', '2025-11-04 05:33:56'),
(16, 'HD202511146566', 33, NULL, 4451821.23, 207875.94, 0.00, 4243945.29, 'Tiền mặt', '2025-11-13 04:34:56', '2025-11-13 05:31:56'),
(17, 'HD202511145145', 37, NULL, 649932.00, 58818.11, 30000.00, 621113.89, 'Ví điện tử Momo', '2025-11-07 04:34:56', '2025-11-07 05:50:56'),
(18, 'HD202511146474', 39, NULL, 2090948.48, 70173.60, 50000.00, 2070774.88, 'Tiền mặt', '2025-11-04 04:34:56', '2025-11-04 06:16:56'),
(19, 'HD202511148685', 42, NULL, 4996312.16, 392802.17, 30000.00, 4633509.99, 'Chuyển khoản ngân hàng', '2025-11-10 04:34:56', '2025-11-10 05:29:56'),
(20, 'HD202511140309', 50, NULL, 4271757.34, 210203.61, 30000.00, 4091553.73, 'Chuyển khoản ngân hàng', '2025-11-11 04:34:56', '2025-11-11 04:48:56');

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
(1, 'Khu vực K', 'Dicta eligendi numquam optio autem velit maiores ea.', 3, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 'Khu vực L', 'Omnis eum expedita aut magni excepturi sed.', 3, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 'Khu vực V', 'Cum laboriosam sequi quia.', 2, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 'Khu vực D', 'Id natus est est quia culpa quibusdam magnam quod.', 3, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 'Khu vực I', 'Rerum officiis inventore deleniti rerum impedit consequatur ut.', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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
(11, '2025_10_18_061737_create_vouchers_table', 1),
(12, '2025_10_18_061738_create_hoa_don_table', 1),
(13, '2025_10_19_174629_create_sessions_table', 1),
(14, '2025_10_24_213503_create_cache_table', 1),
(15, '2025_11_06_045259_create_thu_vien_anh_mon_an_table', 1);

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
(1, 3, 'Gỏi cuốn tôm thịt', 204173.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_cuốn_tôm_thịt.jpg', 'an', 21, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 1, 'Chả giò rế', 219130.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_giò_rế.jpg', 'an', 14, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 3, 'Nem chua rán', 270541.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nem_chua_rán.jpg', 'con', 12, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 5, 'Gỏi bò bóp thấu', 212493.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_bò_bóp_thấu.jpg', 'an', 16, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 5, 'Súp hải sản', 45356.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/súp_hải_sản.jpg', 'con', 23, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(6, 1, 'Súp bí đỏ kem tươi', 243476.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/súp_bí_đỏ_kem_tươi.jpg', 'con', 6, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(7, 2, 'Salad cá ngừ', 133211.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/salad_cá_ngừ.jpg', 'an', 21, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 1, 'Gỏi ngó sen tôm thịt', 266510.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_ngó_sen_tôm_thịt.jpg', 'an', 15, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(9, 2, 'Chả cá chiên giòn', 147692.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_cá_chiên_giòn.jpg', 'het', 20, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(10, 3, 'Khoai tây chiên bơ tỏi', 147250.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/khoai_tây_chiên_bơ_tỏi.jpg', 'het', 24, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 5, 'Cơm chiên dương châu', 96080.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_chiên_dương_châu.jpg', 'an', 23, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(12, 5, 'Bò lúc lắc khoai tây', 178433.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_lúc_lắc_khoai_tây.jpg', 'an', 6, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(13, 1, 'Cá kho tộ', 238366.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_kho_tộ.jpg', 'het', 17, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(14, 3, 'Sườn non rim mặn ngọt', 249291.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sườn_non_rim_mặn_ngọt.jpg', 'con', 13, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(15, 1, 'Gà hấp hành', 246914.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_hấp_hành.jpg', 'an', 19, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(16, 4, 'Lẩu thái hải sản', 251909.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_thái_hải_sản.jpg', 'con', 13, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(17, 3, 'Lẩu bò sa tế', 36654.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_bò_sa_tế.jpg', 'het', 7, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(18, 5, 'Cá chẽm hấp xì dầu', 127323.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_chẽm_hấp_xì_dầu.jpg', 'con', 8, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(19, 3, 'Thịt ba chỉ quay giòn bì', 110411.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/thịt_ba_chỉ_quay_giòn_bì.jpg', 'an', 20, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(20, 5, 'Tôm sú nướng muối ớt', 217041.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/tôm_sú_nướng_muối_ớt.jpg', 'het', 5, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(21, 1, 'Vịt quay Bắc Kinh', 270368.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/vịt_quay_bắc_kinh.jpg', 'con', 5, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(22, 4, 'Gà nướng mật ong', 226645.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_nướng_mật_ong.jpg', 'an', 11, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(23, 4, 'Bún chả Hà Nội', 75698.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bún_chả_hà_nội.jpg', 'an', 20, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(24, 2, 'Phở bò tái nạm', 218125.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/phở_bò_tái_nạm.jpg', 'het', 12, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(25, 1, 'Mì xào hải sản', 95608.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/mì_xào_hải_sản.jpg', 'an', 15, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(26, 4, 'Hủ tiếu Nam Vang', 213825.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/hủ_tiếu_nam_vang.jpg', 'het', 25, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(27, 2, 'Bò kho bánh mì', 59932.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_kho_bánh_mì.jpg', 'het', 11, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(28, 1, 'Cơm tấm sườn bì chả trứng', 91943.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_tấm_sườn_bì_chả_trứng.jpg', 'con', 25, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(29, 5, 'Canh chua cá lóc', 165566.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/canh_chua_cá_lóc.jpg', 'het', 27, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(30, 2, 'Cá hồi áp chảo sốt bơ chanh', 76709.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_hồi_áp_chảo_sốt_bơ_chanh.jpg', 'an', 17, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(31, 3, 'Chè khúc bạch', 245148.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_khúc_bạch.jpg', 'het', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(32, 3, 'Chè ba màu', 234113.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_ba_màu.jpg', 'con', 7, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(33, 3, 'Rau câu dừa', 249153.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/rau_câu_dừa.jpg', 'het', 14, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(34, 5, 'Bánh flan', 72634.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_flan.jpg', 'het', 10, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(35, 2, 'Bánh chuối nướng', 226492.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_chuối_nướng.jpg', 'con', 29, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(36, 3, 'Bánh da lợn', 122388.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_da_lợn.jpg', 'con', 19, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(37, 3, 'Bánh bò hấp', 194571.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_bò_hấp.jpg', 'con', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(38, 5, 'Sương sáo sữa tươi', 119028.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sương_sáo_sữa_tươi.jpg', 'an', 9, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(39, 4, 'Kem dừa', 186996.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/kem_dừa.jpg', 'het', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(40, 4, 'Trái cây thập cẩm', 263763.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trái_cây_thập_cẩm.jpg', 'an', 12, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(41, 2, 'Trà đào cam sả', 50970.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_đào_cam_sả.jpg', 'an', 25, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(42, 5, 'Sinh tố bơ', 252346.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sinh_tố_bơ.jpg', 'an', 21, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(43, 2, 'Nước ép cam', 94884.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_cam.jpg', 'het', 25, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(44, 2, 'Nước ép dưa hấu', 162404.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_dưa_hấu.jpg', 'an', 5, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(45, 3, 'Cà phê sữa đá', 114108.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_sữa_đá.jpg', 'an', 14, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(46, 4, 'Cà phê đen nóng', 213299.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_đen_nóng.jpg', 'con', 5, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(47, 5, 'Trà sữa trân châu đường đen', 142404.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_sữa_trân_châu_đường_đen.jpg', 'het', 12, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(48, 3, 'Nước chanh tươi', 218485.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_chanh_tươi.jpg', 'con', 28, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(49, 1, 'Nước mía sầu riêng', 126417.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_mía_sầu_riêng.jpg', 'an', 7, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(50, 4, 'Soda việt quất', 258012.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/soda_việt_quất.jpg', 'het', 8, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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
(1, 4, 42, 6, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 3, 8, 9, 48452.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 1, 23, 8, 42265.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 4, 26, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 1, 6, 7, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(6, 1, 43, 2, 35550.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(7, 2, 29, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 5, 28, 6, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(9, 5, 19, 7, 26305.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(10, 5, 16, 5, 17771.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 5, 37, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(12, 4, 46, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(13, 4, 42, 3, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(14, 2, 36, 4, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(15, 4, 8, 8, 10093.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(16, 2, 7, 4, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(17, 5, 17, 1, 40928.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(18, 5, 6, 10, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(19, 1, 25, 2, 26051.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(20, 4, 3, 1, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(21, 3, 49, 1, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(22, 3, 23, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(23, 4, 33, 10, 49440.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(24, 1, 46, 3, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(25, 1, 37, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(26, 3, 32, 6, 36135.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(27, 5, 18, 10, 48555.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(28, 2, 16, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(29, 5, 24, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(30, 3, 22, 3, 10829.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(31, 4, 12, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(32, 1, 14, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(33, 4, 11, 3, 33559.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(34, 5, 30, 10, 10331.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(35, 3, 45, 3, 26409.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(36, 2, 32, 4, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(37, 5, 10, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(38, 5, 33, 10, 35304.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(39, 1, 8, 4, 35025.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(40, 1, 13, 4, 24029.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(41, 3, 5, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(42, 5, 17, 7, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(43, 5, 50, 8, 29019.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(44, 5, 47, 7, 36688.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(45, 4, 5, 9, 24275.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(46, 5, 5, 9, 43657.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(47, 5, 16, 5, 28823.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(48, 3, 9, 7, 43215.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(49, 1, 30, 8, 46277.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(50, 4, 46, 3, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: đang làm, 0: nghỉ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ho_ten`, `sdt`, `email`, `mat_khau`, `vai_tro`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn An', '0901002001', 'an.nguyen@example.com', '$2y$12$3Iwvzup5BQ8laEEjLz2uv..Ca6E6gPJxhPrg39WdN8Ggi7MSN4Qe2', 'Quản lý', 1, NULL, NULL),
(2, 'Trần Thị Bình', '0902003002', 'binh.tran@example.com', '$2y$12$ePz6ia.RDY0rSPMyTxLZiOn.AU6KZQHRg9UkYjpYDQ2kwycNQ1OKu', 'Lễ tân', 1, NULL, NULL),
(3, 'Lê Hoàng Nam', '0903004003', 'nam.le@example.com', '$2y$12$tKFGvT1whl.tVzZ.jbceCO5GUl2uRaPqBLvGUpHoHxJPWBF4L0UaC', 'Phục vụ', 1, NULL, NULL),
(4, 'Phạm Thị Lan', '0904005004', 'lan.pham@example.com', '$2y$12$7.ynTa.xQYn5si9qTgrKEuQF/AkJ15S2gVBsyiRDh1Mjf79AGIrc2', 'Thu ngân', 1, NULL, NULL),
(5, 'Em. Trương Yến', '0992537573', 'ma.hung@example.org', '$2y$12$vDn/zf5bIv4wzWKSlwoaxeib.fOvpfRaaC8olAV.NGwRZGaN31XLq', 'Thu ngân', 0, NULL, NULL),
(6, 'Chú. Đào Nhuận', '0994603309', 'che.xuyen@example.org', '$2y$12$N41ihto3BMTFjivcmTGyv.s97n8H6YnOUl/.DULaTK5fwUroVL2Ji', 'Quản lý', 1, NULL, NULL),
(7, 'Em. Đổng Hào', '0966868924', 'au.vy@example.com', '$2y$12$26kJrZ8w3BFdi9MHOe8rTOR1rlUhcpZzQqjCN.6SveojyM1/WZ4La', 'Quản lý', 1, NULL, NULL);

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
  `trang_thai` enum('dang_xu_li','hoan_thanh') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang_xu_li' COMMENT 'Trạng thái tổng của phiếu order',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_mon`
--

INSERT INTO `order_mon` (`id`, `dat_ban_id`, `ban_id`, `tong_mon`, `tong_tien`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 38, 14, NULL, 565997.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(2, 10, 15, NULL, 1039143.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(3, 12, 10, NULL, 1721712.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(4, 70, 14, NULL, 572143.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(5, 50, 6, NULL, 1348528.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(6, 3, 8, NULL, 1990007.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(7, 9, 7, NULL, 1559838.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(8, 21, 7, NULL, 1345315.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(9, 35, 2, NULL, 1245227.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(10, 43, 4, NULL, 773865.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(11, 56, 1, NULL, 1919372.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(12, 42, 11, NULL, 535368.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(13, 42, 4, NULL, 1157995.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(14, 18, 12, NULL, 675422.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(15, 78, 14, NULL, 780897.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(16, 23, 11, NULL, 1515647.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(17, 39, 14, NULL, 953157.00, 'hoan_thanh', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(18, 31, 5, NULL, 1220691.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(19, 38, 13, NULL, 1212862.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(20, 32, 4, NULL, 1471283.00, 'dang_xu_li', '2025-11-14 04:34:58', '2025-11-14 04:34:58');

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
('y7Hpe9xk9IdoKNqvr7g1OVnPJvXkOAf6ZTjYd6sn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZG9VQ2dBOWNsd3ZoeDVVZHhmejZNbjJiY1pMaU5Rb1NWSmIxYXo1RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ob2EtZG9uLzYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763120179);

-- --------------------------------------------------------

--
-- Table structure for table `thu_vien_anh_mon_an`
--

CREATE TABLE `thu_vien_anh_mon_an` (
  `id` bigint UNSIGNED NOT NULL,
  `mon_an_id` bigint UNSIGNED NOT NULL,
  `duong_dan_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_giam` enum('phan_tram','tien_mat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_tri` decimal(12,2) NOT NULL,
  `gia_tri_toi_da` decimal(12,2) DEFAULT NULL COMMENT 'Giới hạn khi giảm %',
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `so_luong` int NOT NULL DEFAULT '0',
  `so_luong_da_dung` int NOT NULL DEFAULT '0',
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `trang_thai` enum('dang_ap_dung','ngung_ap_dung') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang_ap_dung',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `ma_voucher`, `loai_giam`, `gia_tri`, `gia_tri_toi_da`, `mo_ta`, `so_luong`, `so_luong_da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'SALE20', 'phan_tram', 20.00, 100000.00, 'Giảm 20% tối đa 100.000đ', 50, 0, '2025-11-14 11:34:58', '2025-12-14 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(2, 'BUFFET50', 'tien_mat', 50000.00, NULL, 'Giảm trực tiếp 50.000đ', 100, 10, '2025-11-14 11:34:58', '2026-01-13 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(3, 'VIP10', 'phan_tram', 10.00, 50000.00, 'Giảm 10% tối đa 50.000đ cho khách VIP', 20, 5, '2025-11-12 11:34:58', '2025-11-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(4, 'TET2025', 'tien_mat', 100000.00, NULL, 'Giảm 100.000đ mừng Tết 2025', 500, 120, '2025-01-01 00:00:00', '2025-02-01 23:59:59', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(5, 'KIDFREE', 'tien_mat', 70000.00, NULL, 'Ưu đãi giảm 70.000đ cho trẻ em', 70, 7, '2025-11-14 11:34:58', '2025-12-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(6, 'FLASH30', 'phan_tram', 30.00, 50000.00, 'Flash sale: Giảm 30% tối đa 50k', 200, 30, '2025-11-14 11:34:58', '2025-11-21 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(7, 'STOPSALE', 'tien_mat', 30000.00, NULL, 'Voucher thử nghiệm (đã ngừng áp dụng)', 100, 100, '2025-11-04 11:34:58', '2025-11-13 11:34:58', 'ngung_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58');

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
  ADD UNIQUE KEY `hoa_don_ma_hoa_don_unique` (`ma_hoa_don`),
  ADD KEY `hoa_don_dat_ban_id_foreign` (`dat_ban_id`),
  ADD KEY `hoa_don_voucher_id_foreign` (`voucher_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhan_vien_email_unique` (`email`);

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
-- Indexes for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thu_vien_anh_mon_an_mon_an_id_foreign` (`mon_an_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_ma_voucher_unique` (`ma_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban_an`
--
ALTER TABLE `ban_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_mon`
--
ALTER TABLE `order_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `hoa_don_dat_ban_id_foreign` FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hoa_don_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL;

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

--
-- Constraints for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  ADD CONSTRAINT `thu_vien_anh_mon_an_mon_an_id_foreign` FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
