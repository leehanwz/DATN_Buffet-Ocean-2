-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2025 at 05:27 PM
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
(1, 3, 'Bàn 1', 'MCMdhJ2lcqtj', 'http://localhost/order?table_code=MCMdhJ2lcqtj', 2, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 10:21:55'),
(2, 3, 'Bàn 2', 'uEWj1TG8iJIS', 'http://localhost/order?table_code=uEWj1TG8iJIS', 4, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 07:57:43'),
(3, 5, 'Bàn 3', 'pTX21dKoRDWY', 'http://localhost/order?table_code=pTX21dKoRDWY', 2, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 09:42:02'),
(4, 1, 'Bàn 4', 'QR74MQ', 'http://www.wilderman.org/enim-non-dolorum-eaque-voluptates-iusto.html', 5, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 10:33:03'),
(5, 5, 'Bàn 5', 'ZmzhrNA3YaVh', 'http://localhost/order?table_code=ZmzhrNA3YaVh', 6, 'trong', '2025-11-14 04:34:56', '2025-11-25 16:21:13'),
(6, 3, 'Bàn 6', 'qjmWy8V9bsbD', 'http://localhost/order?table_code=qjmWy8V9bsbD', 4, 'trong', '2025-11-14 04:34:56', '2025-12-01 07:43:58'),
(7, 1, 'Bàn 7', 'Cdzg7jvGXRpR', 'http://localhost/order?table_code=Cdzg7jvGXRpR', 5, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 06:43:10'),
(8, 1, 'Bàn 8', 'QR41WQ', 'https://www.conroy.biz/porro-atque-voluptas-consequatur-qui', 9, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 10:20:36'),
(9, 5, 'Bàn 9', 'QR25RV', 'http://www.adams.com/quia-nostrum-voluptatem-atque-a-facilis-suscipit.html', 7, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 10:14:45'),
(10, 1, 'Bàn 10', 'QR01IT', 'http://www.collier.com/illo-sed-voluptatem-corporis-expedita-error-in-corrupti', 3, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 11:27:48'),
(11, 4, 'Bàn 11', 'QR06RV', 'https://www.lueilwitz.biz/eos-iure-fuga-nobis', 8, 'da_dat', '2025-11-14 04:34:56', '2025-12-01 11:02:16'),
(12, 1, 'Bàn 12', 'QR39XJ', 'https://harber.com/tempora-iusto-inventore-natus-eius.html', 4, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 11:20:34'),
(13, 1, 'Bàn 13', 'QR32JA', 'http://www.moen.net/earum-perferendis-non-quis-iste-error-ipsum.html', 5, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-12-01 11:24:43'),
(14, 4, 'Bàn 14', 'QR76OW', 'https://treutel.com/corporis-atque-ullam-voluptatem.html', 10, 'trong', '2025-11-14 04:34:56', '2025-12-01 07:43:58'),
(15, 2, 'Bàn 15', 'QR55PH', 'http://stanton.com/eos-voluptates-aut-et-repellat-inventore-dolore', 3, 'trong', '2025-11-14 04:34:56', '2025-12-01 07:43:58'),
(16, 6, '11', 'Wi9diDQchjso', 'http://localhost/order?table_code=Wi9diDQchjso', 2, 'trong', '2025-11-18 15:28:34', '2025-12-01 07:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-goi_nhan_vien_2', 'b:1;', 1764581041);

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
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `id` bigint UNSIGNED NOT NULL,
  `hoa_don_id` bigint UNSIGNED NOT NULL,
  `ten_khach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt_khach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_khach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_khach` int DEFAULT '1',
  `ban_so` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khu_vuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_ghe` int DEFAULT NULL,
  `ma_dat_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gio_vao` datetime DEFAULT NULL,
  `gio_ra` datetime DEFAULT NULL,
  `thoi_gian_phuc_vu_phut` int DEFAULT '0',
  `thoi_gian_quy_dinh_phut` int DEFAULT NULL,
  `thoi_gian_vuot_phut` int DEFAULT '0',
  `so_lan_10_phut` int DEFAULT '0',
  `phu_thu_thoi_gian` decimal(12,2) DEFAULT '0.00',
  `ten_combo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_combo_per_person` decimal(12,2) DEFAULT '0.00',
  `tong_tien_combo` decimal(12,2) DEFAULT '0.00',
  `danh_sach_mon` json DEFAULT NULL,
  `tong_tien_combo_mon` decimal(12,2) DEFAULT '0.00',
  `tien_giam_voucher` decimal(12,2) DEFAULT '0.00',
  `tien_coc` decimal(12,2) DEFAULT '0.00',
  `phu_thu_tu_dong` decimal(12,2) DEFAULT '0.00',
  `phu_thu_thu_cong` decimal(12,2) DEFAULT '0.00',
  `tong_phu_thu` decimal(12,2) DEFAULT '0.00',
  `phai_thanh_toan` decimal(12,2) DEFAULT '0.00',
  `tien_khach_dua` decimal(12,2) DEFAULT NULL,
  `tien_tra_lai` decimal(12,2) DEFAULT NULL,
  `phuong_thuc_tt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_voucher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1099, 152, 216, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1100, 152, 178, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1101, 152, 152, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1102, 152, 135, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1103, 152, 188, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1104, 152, 161, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1105, 152, 201, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1106, 152, 136, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1107, 152, 155, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1108, 152, 176, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1109, 152, 163, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1110, 152, 212, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1111, 152, 186, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1112, 152, 205, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(1113, 152, 179, 1, 'combo', 'cho_bep', NULL, '2025-12-01 17:27:01', '2025-12-01 17:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `combo_buffet`
--

CREATE TABLE `combo_buffet` (
  `id` bigint UNSIGNED NOT NULL,
  `ten_combo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `loai_combo` enum('99k','199k','299k','399k','499k') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại combo theo đối tượng khách',
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

INSERT INTO `combo_buffet` (`id`, `ten_combo`, `mo_ta`, `loai_combo`, `gia_co_ban`, `thoi_luong_phut`, `thoi_gian_bat_dau`, `thoi_gian_ket_thuc`, `anh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(15, 'Combo Buffet 99k - Gói 1', 'Combo 99k đặc biệt, thời lượng phục vụ 90 phút.', '99k', 99000.00, 90, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(16, 'Combo Buffet 99k - Gói 2', 'Combo 99k đặc biệt, thời lượng phục vụ 90 phút.', '99k', 99000.00, 90, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(17, 'Combo Buffet 99k - Gói 3', 'Combo 99k đặc biệt, thời lượng phục vụ 90 phút.', '99k', 99000.00, 90, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(18, 'Combo Buffet 99k - Gói 4', 'Combo 99k đặc biệt, thời lượng phục vụ 90 phút.', '99k', 99000.00, 90, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(19, 'Combo Buffet 199k - Gói 1', 'Combo 199k đặc biệt, thời lượng phục vụ 120 phút.', '199k', 199000.00, 120, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(20, 'Combo Buffet 199k - Gói 2', 'Combo 199k đặc biệt, thời lượng phục vụ 120 phút.', '199k', 199000.00, 120, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(21, 'Combo Buffet 199k - Gói 3', 'Combo 199k đặc biệt, thời lượng phục vụ 120 phút.', '199k', 199000.00, 120, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(22, 'Combo Buffet 199k - Gói 4', 'Combo 199k đặc biệt, thời lượng phục vụ 120 phút.', '199k', 199000.00, 120, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(23, 'Combo Buffet 299k - Gói 1', 'Combo 299k đặc biệt, thời lượng phục vụ 150 phút.', '299k', 299000.00, 150, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(24, 'Combo Buffet 299k - Gói 2', 'Combo 299k đặc biệt, thời lượng phục vụ 150 phút.', '299k', 299000.00, 150, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(25, 'Combo Buffet 299k - Gói 3', 'Combo 299k đặc biệt, thời lượng phục vụ 150 phút.', '299k', 299000.00, 150, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(26, 'Combo Buffet 299k - Gói 4', 'Combo 299k đặc biệt, thời lượng phục vụ 150 phút.', '299k', 299000.00, 150, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(27, 'Combo Buffet 399k - Gói 1', 'Combo 399k đặc biệt, thời lượng phục vụ 180 phút.', '399k', 399000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(28, 'Combo Buffet 399k - Gói 2', 'Combo 399k đặc biệt, thời lượng phục vụ 180 phút.', '399k', 399000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(29, 'Combo Buffet 399k - Gói 3', 'Combo 399k đặc biệt, thời lượng phục vụ 180 phút.', '399k', 399000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(30, 'Combo Buffet 399k - Gói 4', 'Combo 399k đặc biệt, thời lượng phục vụ 180 phút.', '399k', 399000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(31, 'Combo Buffet 499k - Gói 1', 'Combo 499k đặc biệt, thời lượng phục vụ 180 phút.', '499k', 499000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(32, 'Combo Buffet 499k - Gói 2', 'Combo 499k đặc biệt, thời lượng phục vụ 180 phút.', '499k', 499000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(33, 'Combo Buffet 499k - Gói 3', 'Combo 499k đặc biệt, thời lượng phục vụ 180 phút.', '499k', 499000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:59', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(34, 'Combo Buffet 499k - Gói 4', 'Combo 499k đặc biệt, thời lượng phục vụ 180 phút.', '499k', 499000.00, 180, '2025-12-01 00:00:00', '2026-12-01 23:59:00', 'combo_buffet/1764609688_chup-anh-mon-an-tai-nha-trang.jpg', 'dang_ban', '2025-12-01 10:00:00', '2025-12-01 17:21:28');

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
(6, 'Khai Vị (Appetizers)', 'Các món ăn nhẹ kích thích vị giác đầu bữa như salad, súp, gỏi và đồ chiên.', 1, '2025-11-30 07:51:12', '2025-11-30 07:51:12'),
(7, 'Hải Sản Tươi Sống (Fresh Seafood)', 'Các loại hải sản tươi như tôm, mực, bạch tuộc, hàu, ghẹ dùng để nướng hoặc thả lẩu.', 1, '2025-11-30 07:51:28', '2025-11-30 07:51:28'),
(8, 'Thịt  (Meats)', 'Tổng hợp các loại ba chỉ, dẻ sườn, nầm và thịt ướp sốt chuyên dụng cho nướng và lẩu.', 1, '2025-11-30 07:52:31', '2025-11-30 07:52:31'),
(9, 'Món Nóng / Quầy Line (Hot Dishes)', 'Các món đã được chế biến chín sẵn, nóng hổi, có thể dùng ngay như cơm chiên, mì xào, ốc hấp.', 1, '2025-11-30 07:53:07', '2025-11-30 07:53:07'),
(10, 'Rau & Nấm (Vegetables & Mushrooms)', 'Các loại rau xanh, nấm tươi và củ quả dùng để ăn kèm hoặc nhúng lẩu.', 1, '2025-11-30 07:53:37', '2025-11-30 07:53:37'),
(11, 'Viên Thả Lẩu (Hotpot Balls)', 'Các loại viên chế biến sẵn như cá viên, bò viên, tôm viên, thanh cua và xúc xích.', 1, '2025-11-30 07:54:02', '2025-11-30 07:54:02'),
(12, 'Sashimi & Sushi', 'Các món ăn tươi sống theo phong cách Nhật Bản (nếu nhà hàng có phục vụ).', 1, '2025-11-30 07:54:29', '2025-11-30 07:54:29'),
(13, 'Tráng Miệng (Desserts)', 'Các món ngọt kết thúc bữa ăn bao gồm trái cây theo mùa, chè, kem và bánh ngọt.', 1, '2025-11-30 07:54:46', '2025-11-30 07:54:46'),
(14, 'Đồ Uống (Beverages)', 'Danh sách các loại nước giải khát, bia, rượu và nước ép trái cây.', 1, '2025-11-30 07:55:15', '2025-11-30 07:55:15'),
(15, 'Sốt Chấm & Gia Vị (Sauces)', 'Các loại sốt chấm đặc biệt của nhà hàng và gia vị ăn kèm.', 1, '2025-11-30 07:55:35', '2025-11-30 07:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `dat_ban`
--

CREATE TABLE `dat_ban` (
  `id` bigint UNSIGNED NOT NULL,
  `ma_dat_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_khach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt_khach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_lon` int NOT NULL,
  `tre_em` int NOT NULL,
  `ban_id` bigint UNSIGNED DEFAULT NULL,
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

INSERT INTO `dat_ban` (`id`, `ma_dat_ban`, `ten_khach`, `email_khach`, `sdt_khach`, `nguoi_lon`, `tre_em`, `ban_id`, `nhan_vien_id`, `gio_den`, `thoi_luong_phut`, `tien_coc`, `trang_thai`, `xac_thuc_ma`, `la_dat_online`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(292, 'DB-20251129182927-F6U', 'Phạm Trung', NULL, '0111111111', 0, 0, 12, 9, '2025-11-29 18:28:00', NULL, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:29:28', '2025-11-30 08:39:22'),
(293, 'QR20251129-4C02', 'phạm', NULL, '111111111111', 6, 0, 2, NULL, '2025-11-29 18:30:44', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:30:44', '2025-11-30 13:19:40'),
(294, 'DB-20251129-02NX', 'Trung phạm', 'trungleogi@gmail.com', '011111111111', 0, 0, 15, NULL, '2025-11-30 18:44:00', 120, 20000.00, 'hoan_tat', NULL, 1, NULL, '2025-11-29 11:40:39', '2025-11-30 13:21:12'),
(295, 'DB-20251129-NQYX', 'Trung', 'trungleogi@gmail.com', '0111111111', 0, 0, 12, NULL, '2025-12-07 18:45:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:45:30', '2025-11-29 11:46:20'),
(296, 'DB-20251129-ENJB', 'Khách', '11111@gmail.com', '11111111', 0, 0, 11, NULL, '2025-11-29 19:20:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:51:11', '2025-11-30 06:53:44'),
(297, 'DB-20251129-S6X9', 'Trung', '11111@gmail.com', '1111111111111', 0, 0, 13, NULL, '2025-11-29 19:19:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:52:14', '2025-11-29 13:23:44'),
(298, 'DB-20251129-3ZOB', 'Trung', 'trungleogi@gmail.com', '11111111', 4, 0, 15, NULL, '2025-11-29 20:17:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 12:59:19', '2025-12-01 05:20:05'),
(299, 'QR20251129-1717', 'trrr', NULL, '1111', 0, 0, 4, NULL, '2025-11-29 20:18:31', 146, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-29 13:18:31', '2025-11-29 13:26:08'),
(300, 'QR20251129-C3C4', 'pppppppp', NULL, '000000', 1, 0, 4, NULL, '2025-11-29 20:34:52', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-29 13:34:52', '2025-12-01 02:53:40'),
(301, 'DB-20251130-ZIOQ', '11111111', '11111@gmail.com', '11111111', 2, 0, 12, NULL, '2025-11-30 13:46:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-30 06:42:52', '2025-12-01 04:39:33'),
(302, 'DB-20251130134921-ENT', '1111111111', NULL, '111111', 0, 0, 14, 7, '2025-11-30 13:49:00', NULL, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-30 06:49:21', '2025-11-30 06:49:32'),
(303, 'QR20251130-BF3A', '111111111', NULL, '11111111111', 2, 0, 1, NULL, '2025-11-30 16:04:19', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-30 09:04:19', '2025-11-30 14:39:59'),
(304, 'DB-20251130-DWX1', 'aaaa1111111111', 'trungleogi@gmail.com', '1111111', 2, 6, NULL, 7, '2025-12-21 16:15:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-30 09:15:58', '2025-11-30 09:28:40'),
(305, 'DB-20251130-LFLA', 'aaaa', 'trungleogi@gmail.com', '1111111', 2, 3, NULL, NULL, '2025-12-06 16:15:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-30 09:15:58', '2025-11-30 09:15:58'),
(306, 'QR20251130-507C', 'aaaaaaaa', NULL, '111111111', 4, 0, 10, NULL, '2025-11-30 20:13:20', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-30 13:13:20', '2025-11-30 13:13:20'),
(307, 'DB-20251130-MMSI', 'Phạm111', '2leogi@gmail.com', '1222222', 5, 2, NULL, 7, '2025-12-05 21:06:00', 120, 0.00, 'hoan_tat', NULL, 0, '111111', '2025-11-30 14:06:43', '2025-11-30 14:16:02'),
(308, 'QR20251201-EA63', '111111', NULL, '11111111', 3, 0, 3, NULL, '2025-12-01 08:24:59', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 01:24:59', '2025-12-01 01:25:25'),
(309, 'QR20251201-FC5C', 'Phạm Trung', NULL, '0111111', 6, 0, 3, NULL, '2025-12-01 08:52:11', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 01:52:11', '2025-12-01 02:22:23'),
(310, 'QR20251201-A06F', 'Trung', NULL, '111111', 1, 0, 3, NULL, '2025-12-01 09:22:52', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 02:22:52', '2025-12-01 02:22:52'),
(311, 'QR20251201-F1FA', 'Phạm Trung', NULL, '11111', 2, 0, 11, NULL, '2025-12-01 10:29:28', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 03:29:28', '2025-12-01 03:29:28'),
(312, 'QR20251201-E242', '11111111', NULL, '1111111111', 3, 0, 16, NULL, '2025-12-01 11:36:38', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 04:36:38', '2025-12-01 04:36:38'),
(313, 'QR20251201-26FF', '1111111', NULL, '11111', 4, 0, 8, NULL, '2025-12-01 11:56:50', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 04:56:50', '2025-12-01 04:56:50'),
(314, 'QR20251201-3351', '1111111', NULL, '111111', 6, 0, 7, NULL, '2025-12-01 13:09:05', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 06:09:05', '2025-12-01 06:42:42'),
(315, 'QR20251201-4CCB', '11111111', NULL, '11111111', 1, 0, 6, NULL, '2025-12-01 13:27:50', 90, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 06:27:50', '2025-12-01 06:27:50'),
(316, 'QR20251201-E9D4', 'qqqqqq', NULL, '1111111', 3, 0, 13, NULL, '2025-12-01 13:34:21', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 06:34:21', '2025-12-01 06:34:21'),
(317, 'QR20251201-B4B3', '1111111', NULL, '11111', 1, 0, 7, NULL, '2025-12-01 13:43:10', 90, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 06:43:10', '2025-12-01 06:43:10'),
(318, 'QR20251201-3BB6', '111', NULL, '1111', 1, 0, 7, NULL, '2025-12-01 14:31:55', 150, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 07:31:55', '2025-12-01 07:31:55'),
(319, 'DB-20251201-FE8Z', 'aaaaaaaaaaaaaaa', 'trungleogi@gmail.com', '11111111', 3, 1, NULL, NULL, '2025-12-01 14:52:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-12-01 07:51:44', '2025-12-01 08:25:43'),
(320, 'DB-20251201-Q4OU', '11111111111', 'trungleogi@gmail.com', '11111111', 2, 1, 2, 7, '2025-12-01 14:57:43', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-12-01 07:52:49', '2025-12-01 08:01:01'),
(321, 'QR20251201-6456', '1111111', NULL, '11111111', 2, 0, 3, NULL, '2025-12-01 16:42:02', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 09:42:02', '2025-12-01 09:42:02'),
(322, 'QR20251201-9D65', '111111111111', NULL, '11111', 1, 0, 9, NULL, '2025-12-01 17:14:45', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 10:14:45', '2025-12-01 10:14:45'),
(323, 'QR20251201-0DD3', 'Trung phạm', NULL, '111222333', 4, 2, 8, NULL, '2025-12-01 17:20:36', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 10:20:36', '2025-12-01 10:20:36'),
(324, 'QR20251201-8CC3', '111', NULL, '1111', 2, 0, 1, NULL, '2025-12-01 17:21:55', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 10:21:55', '2025-12-01 10:21:55'),
(325, 'QR20251201-687F', '1111111', NULL, '111', 6, 3, 4, NULL, '2025-12-01 17:33:03', 180, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 10:33:03', '2025-12-01 10:33:03'),
(326, 'QR20251201-976D', 'Trung', NULL, '1111', 3, 1, 4, NULL, '2025-12-01 17:34:33', 120, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 10:34:33', '2025-12-01 10:34:33'),
(327, 'DB-20251201180216-ZACW', 'aaaaaaaaaaaaaaa', NULL, '111111111', 3, 2, 11, 9, '2025-12-01 18:01:00', 130, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-12-01 11:02:16', '2025-12-01 14:32:54'),
(328, 'DB-20251201180344-SUYZ', '222', NULL, '22222222', 2, 1, 12, 7, '2025-12-01 18:03:00', 130, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-12-01 11:03:44', '2025-12-01 11:20:34'),
(329, 'QR20251201-FAAD', '111111111', NULL, '111111111', 2, 1, 13, NULL, '2025-12-01 18:24:43', 130, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 11:24:43', '2025-12-01 11:24:43'),
(330, 'DB-20251201182522-81UO', 'dâd', NULL, '1111111', 2, 1, 10, 9, '2025-12-01 17:25:00', 130, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-12-01 11:25:22', '2025-12-01 11:28:55'),
(331, 'QR20251201-9815', 'aaaaaaaaaaaaaaa', NULL, '11111111', 2, 1, 1, NULL, '2025-12-01 19:46:29', 130, NULL, 'hoan_tat', NULL, 0, NULL, '2025-12-01 12:46:29', '2025-12-01 12:46:29'),
(332, 'QR20251201-12D3', 'Trung', NULL, '1111', 3, 1, 1, NULL, '2025-12-01 21:59:52', 90, NULL, 'khach_da_den', NULL, 0, NULL, '2025-12-01 14:59:52', '2025-12-01 17:27:01'),
(333, 'QR20251201-AF1F', 'Trug', NULL, '1111', 2, 1, 2, NULL, '2025-12-01 22:33:02', 130, NULL, 'khach_da_den', NULL, 0, NULL, '2025-12-01 15:33:02', '2025-12-01 15:33:02'),
(334, 'DB-20251201-PSBP', 'Trung', 'trungleogi@gmail.com', '0999999999', 3, 1, NULL, 7, '2025-12-01 22:45:00', 120, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-12-01 15:35:39', '2025-12-01 15:35:55'),
(335, 'DB-20251201-UVTK', 'Trung', 'trungleogi@gmail.com', '1111111111', 1, 0, NULL, NULL, '2025-12-01 22:41:00', 120, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-12-01 15:36:34', '2025-12-01 15:36:34'),
(336, 'QR20251201-7359', 'Phạm', NULL, '11111111', 2, 1, 9, NULL, '2025-12-01 22:59:37', 130, NULL, 'khach_da_den', NULL, 0, NULL, '2025-12-01 15:59:37', '2025-12-01 15:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `dat_ban_combo`
--

CREATE TABLE `dat_ban_combo` (
  `id` bigint UNSIGNED NOT NULL,
  `dat_ban_id` bigint UNSIGNED NOT NULL,
  `combo_id` bigint UNSIGNED NOT NULL,
  `so_luong` int NOT NULL DEFAULT '1' COMMENT 'Số suất khách đặt cho combo này',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dat_ban_combo`
--

INSERT INTO `dat_ban_combo` (`id`, `dat_ban_id`, `combo_id`, `so_luong`, `created_at`, `updated_at`) VALUES
(64, 332, 15, 1, '2025-12-01 17:27:01', '2025-12-01 17:27:01'),
(65, 332, 16, 1, '2025-12-01 17:27:01', '2025-12-01 17:27:01');

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
(121, 'HD20251129202344-297', 297, NULL, 0.00, 0.00, 0.00, 0.00, 'tien_mat', '2025-11-29 13:23:44', '2025-11-29 13:23:44'),
(122, 'HD20251129202608-299', 299, NULL, 1990176.00, 0.00, 21830.00, 2012006.00, 'tien_mat', '2025-11-29 13:26:08', '2025-11-29 13:26:08');

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
(5, 'Khu vực I', 'Rerum officiis inventore deleniti rerum impedit consequatur ut.', 1, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(6, '1', '11', 1, '2025-11-18 15:28:20', '2025-11-18 15:28:20');

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
(15, '2025_11_06_045259_create_thu_vien_anh_mon_an_table', 1),
(16, '2025_11_19_163558_add_email_khach_to_dat_ban_table', 2),
(17, '2025_11_30_142911_update_loai_mon_enum_in_mon_an_table', 3);

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
  `loai_mon` enum('Sống','Chín','Nướng','Xào / Luộc','Bánh ngọt','Trái cây','Nước có ga','Nước không ga','Trà / Cà phê') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Loại món theo danh mục, tình trạng chế biến hoặc tráng miệng / đồ uống',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mon_an`
--

INSERT INTO `mon_an` (`id`, `danh_muc_id`, `ten_mon`, `gia`, `mo_ta`, `hinh_anh`, `trang_thai`, `thoi_gian_che_bien`, `loai_mon`, `created_at`, `updated_at`) VALUES
(131, 6, 'Gỏi Ngó Sen Tôm Thịt', 60172.00, 'Mô tả chi tiết cho Gỏi Ngó Sen Tôm Thịt.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 13, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(132, 6, 'Salad Rong Biển', 49829.00, 'Mô tả chi tiết cho Salad Rong Biển.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(133, 6, 'Phồng Tôm Chiên', 58178.00, 'Mô tả chi tiết cho Phồng Tôm Chiên.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 16, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(134, 6, 'Nem Chua Rán', 42080.00, 'Mô tả chi tiết cho Nem Chua Rán.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(135, 6, 'Bánh Mì Bơ Tỏi', 61759.00, 'Mô tả chi tiết cho Bánh Mì Bơ Tỏi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 16, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(136, 6, 'Súp Hải Sản', 53835.00, 'Mô tả chi tiết cho Súp Hải Sản.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 9, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(137, 6, 'Gỏi Bò Bóp Thấu', 49405.00, 'Mô tả chi tiết cho Gỏi Bò Bóp Thấu.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(138, 6, 'Chả Giò Hà Nội', 53489.00, 'Mô tả chi tiết cho Chả Giò Hà Nội.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(139, 6, 'Khoai Tây Chiên', 66245.00, 'Mô tả chi tiết cho Khoai Tây Chiên.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 17, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(140, 6, 'Bánh Khọt', 64860.00, 'Mô tả chi tiết cho Bánh Khọt.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 16, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(141, 7, 'Tôm Sú Tươi', 110609.00, 'Mô tả chi tiết cho Tôm Sú Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(142, 7, 'Mực Ống Tươi', 120272.00, 'Mô tả chi tiết cho Mực Ống Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(143, 7, 'Bạch Tuộc Baby', 109720.00, 'Mô tả chi tiết cho Bạch Tuộc Baby.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(144, 7, 'Hàu Sữa Cao Cấp', 133618.00, 'Mô tả chi tiết cho Hàu Sữa Cao Cấp.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(145, 7, 'Sò Điệp Nhật', 125176.00, 'Mô tả chi tiết cho Sò Điệp Nhật.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(146, 7, 'Ốc Hương Tươi', 105820.00, 'Mô tả chi tiết cho Ốc Hương Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(147, 7, 'Cá Hồi Phi Lê', 130836.00, 'Mô tả chi tiết cho Cá Hồi Phi Lê.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(148, 7, 'Cua Lột', 84460.00, 'Mô tả chi tiết cho Cua Lột.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(149, 7, 'Ghẹ Xanh Tươi', 105151.00, 'Mô tả chi tiết cho Ghẹ Xanh Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(150, 7, 'Vẹm Xanh Canada', 83033.00, 'Mô tả chi tiết cho Vẹm Xanh Canada.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(151, 8, 'Ba Chỉ Bò Mỹ', 90349.00, 'Mô tả chi tiết cho Ba Chỉ Bò Mỹ.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(152, 8, 'Dẻ Sườn Bò BBQ', 92087.00, 'Mô tả chi tiết cho Dẻ Sườn Bò BBQ.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(153, 8, 'Nầm Heo Nướng', 109919.00, 'Mô tả chi tiết cho Nầm Heo Nướng.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(154, 8, 'Lõi Vai Bò Sốt Cay', 88775.00, 'Mô tả chi tiết cho Lõi Vai Bò Sốt Cay.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(155, 8, 'Thịt Gà Ướp Tiêu', 60155.00, 'Mô tả chi tiết cho Thịt Gà Ướp Tiêu.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(156, 8, 'Bắp Bò Cuộn Rau', 86429.00, 'Mô tả chi tiết cho Bắp Bò Cuộn Rau.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(157, 8, 'Thịt Heo Iberico', 82878.00, 'Mô tả chi tiết cho Thịt Heo Iberico.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(158, 8, 'Tim Heo Nướng', 107414.00, 'Mô tả chi tiết cho Tim Heo Nướng.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(159, 8, 'Gan Ngỗng Áp Chảo', 74358.00, 'Mô tả chi tiết cho Gan Ngỗng Áp Chảo.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(160, 8, 'Xúc Xích Đức', 118228.00, 'Mô tả chi tiết cho Xúc Xích Đức.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nướng', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(161, 9, 'Cơm Chiên Hải Sản', 84422.00, 'Mô tả chi tiết cho Cơm Chiên Hải Sản.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 15, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(162, 9, 'Mì Xào Giòn', 52750.00, 'Mô tả chi tiết cho Mì Xào Giòn.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 18, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(163, 9, 'Ốc Hấp Sả', 60205.00, 'Mô tả chi tiết cho Ốc Hấp Sả.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(164, 9, 'Cháo Trắng Thịt Bằm', 52240.00, 'Mô tả chi tiết cho Cháo Trắng Thịt Bằm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(165, 9, 'Bánh Bao Kim Sa', 89104.00, 'Mô tả chi tiết cho Bánh Bao Kim Sa.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 15, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(166, 9, 'Bánh Phồng Tôm Thượng Hạng', 63126.00, 'Mô tả chi tiết cho Bánh Phồng Tôm Thượng Hạng.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(167, 9, 'Bún Chả Nước Lèo', 75618.00, 'Mô tả chi tiết cho Bún Chả Nước Lèo.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(168, 9, 'Há Cảo Tôm Thịt', 62648.00, 'Mô tả chi tiết cho Há Cảo Tôm Thịt.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 19, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(169, 9, 'Phở Cuộn', 50552.00, 'Mô tả chi tiết cho Phở Cuộn.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(170, 9, 'Bò Lúc Lắc', 57317.00, 'Mô tả chi tiết cho Bò Lúc Lắc.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(171, 10, 'Rau Muống Tươi', 45550.00, 'Mô tả chi tiết cho Rau Muống Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(172, 10, 'Cải Thảo', 36248.00, 'Mô tả chi tiết cho Cải Thảo.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(173, 10, 'Nấm Kim Châm', 33529.00, 'Mô tả chi tiết cho Nấm Kim Châm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(174, 10, 'Nấm Bào Ngư', 44015.00, 'Mô tả chi tiết cho Nấm Bào Ngư.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(175, 10, 'Rau Cần Nước', 48671.00, 'Mô tả chi tiết cho Rau Cần Nước.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(176, 10, 'Lá Tía Tô', 36382.00, 'Mô tả chi tiết cho Lá Tía Tô.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(177, 10, 'Bắp Ngô Ngọt', 39972.00, 'Mô tả chi tiết cho Bắp Ngô Ngọt.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(178, 10, 'Khoai Lang Tím', 32791.00, 'Mô tả chi tiết cho Khoai Lang Tím.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(179, 10, 'Bí Đao', 42598.00, 'Mô tả chi tiết cho Bí Đao.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(180, 10, 'Đậu Phụ Non', 39304.00, 'Mô tả chi tiết cho Đậu Phụ Non.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Xào / Luộc', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(181, 11, 'Cá Viên', 53846.00, 'Mô tả chi tiết cho Cá Viên.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 10, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(182, 11, 'Bò Viên', 63604.00, 'Mô tả chi tiết cho Bò Viên.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 19, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(183, 11, 'Tôm Viên', 59353.00, 'Mô tả chi tiết cho Tôm Viên.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 18, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(184, 11, 'Thanh Cua', 46761.00, 'Mô tả chi tiết cho Thanh Cua.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 19, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(185, 11, 'Trứng Nhím Biển', 49830.00, 'Mô tả chi tiết cho Trứng Nhím Biển.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(186, 11, 'Viên Phô Mai', 57434.00, 'Mô tả chi tiết cho Viên Phô Mai.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(187, 11, 'Đậu Hũ Phô Mai', 50519.00, 'Mô tả chi tiết cho Đậu Hũ Phô Mai.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 6, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(188, 11, 'Há Cảo Nhân Tôm', 58908.00, 'Mô tả chi tiết cho Há Cảo Nhân Tôm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(189, 11, 'Xúc Xích Cocktail', 58117.00, 'Mô tả chi tiết cho Xúc Xích Cocktail.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(190, 11, 'Bánh Gạo Phô Mai', 62744.00, 'Mô tả chi tiết cho Bánh Gạo Phô Mai.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(191, 12, 'Sashimi Cá Hồi', 109633.00, 'Mô tả chi tiết cho Sashimi Cá Hồi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(192, 12, 'Sushi Cá Ngừ', 133614.00, 'Mô tả chi tiết cho Sushi Cá Ngừ.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(193, 12, 'Sashimi Cá Trích Ép Trứng', 120286.00, 'Mô tả chi tiết cho Sashimi Cá Trích Ép Trứng.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(194, 12, 'Maki Cuộn Tôm', 78688.00, 'Mô tả chi tiết cho Maki Cuộn Tôm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(195, 12, 'Nigiri Lươn', 78013.00, 'Mô tả chi tiết cho Nigiri Lươn.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(196, 12, 'Tempura Tôm', 118029.00, 'Mô tả chi tiết cho Tempura Tôm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(197, 12, 'Sushi Bơ Cuộn', 132644.00, 'Mô tả chi tiết cho Sushi Bơ Cuộn.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(198, 12, 'Gunkang Trứng Cá Chuồn', 109156.00, 'Mô tả chi tiết cho Gunkang Trứng Cá Chuồn.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(199, 12, 'Sushi Thanh Cua', 105809.00, 'Mô tả chi tiết cho Sushi Thanh Cua.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(200, 12, 'California Roll', 125178.00, 'Mô tả chi tiết cho California Roll.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Sống', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(201, 13, 'Kem Vani', 32560.00, 'Mô tả chi tiết cho Kem Vani.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 15, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(202, 13, 'Chè Đậu Xanh', 33816.00, 'Mô tả chi tiết cho Chè Đậu Xanh.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 18, 'Trái cây', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(203, 13, 'Bánh Flan Caramel', 36712.00, 'Mô tả chi tiết cho Bánh Flan Caramel.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(204, 13, 'Trái Cây Theo Mùa (Dưa Hấu)', 33182.00, 'Mô tả chi tiết cho Trái Cây Theo Mùa (Dưa Hấu).', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Trái cây', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(205, 13, 'Bánh Kem Phô Mai', 33301.00, 'Mô tả chi tiết cho Bánh Kem Phô Mai.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 15, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(206, 13, 'Sữa Chua Nếp Cẩm', 31976.00, 'Mô tả chi tiết cho Sữa Chua Nếp Cẩm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 12, 'Trái cây', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(207, 13, 'Panna Cotta Chanh Leo', 32793.00, 'Mô tả chi tiết cho Panna Cotta Chanh Leo.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(208, 13, 'Bánh Mousse Socola', 43644.00, 'Mô tả chi tiết cho Bánh Mousse Socola.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 19, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(209, 13, 'Bánh Su Kem', 43058.00, 'Mô tả chi tiết cho Bánh Su Kem.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Trái cây', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(210, 13, 'Thạch Rau Câu Dừa', 41208.00, 'Mô tả chi tiết cho Thạch Rau Câu Dừa.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Bánh ngọt', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(211, 14, 'Nước Suối Lavie', 31313.00, 'Mô tả chi tiết cho Nước Suối Lavie.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước không ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(212, 14, 'Coca Cola', 18029.00, 'Mô tả chi tiết cho Coca Cola.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước có ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(213, 14, 'Bia Hà Nội', 24874.00, 'Mô tả chi tiết cho Bia Hà Nội.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước có ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(214, 14, 'Trà Chanh', 28859.00, 'Mô tả chi tiết cho Trà Chanh.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Trà / Cà phê', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(215, 14, 'Nước Ép Cam Tươi', 38210.00, 'Mô tả chi tiết cho Nước Ép Cam Tươi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước không ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(216, 14, 'Trà Đào Cam Sả', 34850.00, 'Mô tả chi tiết cho Trà Đào Cam Sả.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Trà / Cà phê', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(217, 14, 'Pepsi', 15852.00, 'Mô tả chi tiết cho Pepsi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước có ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(218, 14, 'Sprite', 35031.00, 'Mô tả chi tiết cho Sprite.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước có ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(219, 14, 'Cà Phê Đá', 20002.00, 'Mô tả chi tiết cho Cà Phê Đá.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Trà / Cà phê', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(220, 14, 'Nước Khoáng Có Ga', 18029.00, 'Mô tả chi tiết cho Nước Khoáng Có Ga.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 0, 'Nước có ga', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(221, 15, 'Sốt Chấm Hải Sản', 14552.00, 'Mô tả chi tiết cho Sốt Chấm Hải Sản.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 7, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(222, 15, 'Tương Ớt Tỏi', 16892.00, 'Mô tả chi tiết cho Tương Ớt Tỏi.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 10, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(223, 15, 'Sốt BBQ Hàn Quốc', 18040.00, 'Mô tả chi tiết cho Sốt BBQ Hàn Quốc.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 14, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(224, 15, 'Nước Chấm Mắm Gừng', 13470.00, 'Mô tả chi tiết cho Nước Chấm Mắm Gừng.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 11, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(225, 15, 'Muối Tiêu Chanh', 14801.00, 'Mô tả chi tiết cho Muối Tiêu Chanh.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 13, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(226, 15, 'Sốt Mayonnaise', 10041.00, 'Mô tả chi tiết cho Sốt Mayonnaise.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 19, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(227, 15, 'Nước Tương Nhật', 12419.00, 'Mô tả chi tiết cho Nước Tương Nhật.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 17, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(228, 15, 'Sốt Thái Chua Cay', 16686.00, 'Mô tả chi tiết cho Sốt Thái Chua Cay.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 17, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(229, 15, 'Dầu Hào', 15645.00, 'Mô tả chi tiết cho Dầu Hào.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 15, 'Chín', '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(230, 15, 'Sa Tế Tôm', 11776.00, 'Mô tả chi tiết cho Sa Tế Tôm.', 'uploads/monan/1764609516_tải xuống (1).jpg', 'con', 18, NULL, '2025-12-01 10:00:00', '2025-12-01 17:18:36');

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
(102, 15, 216, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(103, 15, 178, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(104, 15, 152, 5, 20000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(105, 15, 135, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(106, 15, 188, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(107, 15, 161, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(108, 15, 201, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(109, 16, 136, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(110, 16, 155, 10, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(111, 16, 176, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(112, 16, 163, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(113, 16, 212, 1, 5000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(114, 16, 186, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(115, 16, 205, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(116, 16, 179, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(117, 17, 216, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(118, 17, 157, 5, 20000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(119, 17, 177, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(120, 17, 133, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(121, 17, 182, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(122, 17, 167, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(123, 17, 206, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(124, 18, 159, 5, 30000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(125, 18, 189, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(126, 18, 211, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(127, 18, 169, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(128, 18, 175, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(129, 18, 207, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(130, 18, 131, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(131, 19, 167, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(132, 19, 208, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(133, 19, 136, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(134, 19, 174, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(135, 19, 216, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(136, 19, 183, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(137, 19, 152, 10, 20000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(138, 19, 179, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(139, 20, 157, 10, 30000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(140, 20, 131, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(141, 20, 178, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(142, 20, 140, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(143, 20, 161, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(144, 20, 190, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(145, 20, 175, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(146, 20, 219, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(147, 20, 205, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(148, 21, 155, 3, 30000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(149, 21, 217, 1, 5000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(150, 21, 135, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(151, 21, 180, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(152, 21, 203, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(153, 21, 189, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(154, 21, 172, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(155, 21, 166, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(156, 22, 162, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(157, 22, 154, 3, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(158, 22, 179, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(159, 22, 215, 1, 5000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(160, 22, 184, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(161, 22, 139, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(162, 22, 206, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(163, 22, 140, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(164, 23, 152, 5, 20000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(165, 23, 141, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(166, 23, 171, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(167, 23, 135, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(168, 23, 216, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(169, 23, 186, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(170, 23, 201, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(171, 23, 195, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(172, 23, 168, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(173, 24, 151, 3, 20000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(174, 24, 185, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(175, 24, 219, 1, 5000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(176, 24, 175, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(177, 24, 133, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(178, 24, 149, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(179, 24, 207, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(180, 24, 182, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(181, 25, 158, 3, 30000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(182, 25, 199, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(183, 25, 214, 1, 10000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(184, 25, 142, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(185, 25, 164, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(186, 25, 173, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(187, 25, 137, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(188, 25, 183, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(189, 26, 156, 5, 30000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(190, 26, 136, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(191, 26, 187, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(192, 26, 213, 1, 5000.00, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(193, 26, 144, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(194, 26, 176, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(195, 26, 209, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(196, 26, 166, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(197, 27, 153, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(198, 27, 192, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(199, 27, 145, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(200, 27, 217, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(201, 27, 179, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(202, 27, 209, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(203, 27, 185, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(204, 27, 168, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(205, 27, 139, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(206, 28, 154, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(207, 28, 194, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(208, 28, 215, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(209, 28, 142, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(210, 28, 188, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(211, 28, 166, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(212, 28, 173, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(213, 28, 202, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(214, 29, 158, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(215, 29, 144, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(216, 29, 200, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(217, 29, 175, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(218, 29, 182, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(219, 29, 216, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(220, 29, 134, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(221, 29, 208, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(222, 29, 163, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(223, 30, 151, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(224, 30, 147, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(225, 30, 197, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(226, 30, 212, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(227, 30, 135, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(228, 30, 184, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(229, 30, 201, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(230, 30, 178, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(231, 31, 152, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(232, 31, 141, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(233, 31, 200, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(234, 31, 216, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(235, 31, 183, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(236, 31, 163, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(237, 31, 171, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(238, 31, 205, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(239, 31, 224, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(240, 31, 132, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(241, 31, 193, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(242, 32, 155, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(243, 32, 149, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(244, 32, 195, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(245, 32, 215, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(246, 32, 189, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(247, 32, 161, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(248, 32, 174, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(249, 32, 208, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(250, 32, 221, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(251, 32, 135, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(252, 32, 197, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(253, 33, 156, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(254, 33, 142, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(255, 33, 199, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(256, 33, 213, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(257, 33, 182, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(258, 33, 168, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(259, 33, 176, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(260, 33, 203, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(261, 33, 223, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(262, 33, 133, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(263, 34, 157, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(264, 34, 145, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(265, 34, 192, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(266, 34, 214, 1, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(267, 34, 188, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(268, 34, 166, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(269, 34, 179, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(270, 34, 206, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(271, 34, 226, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00'),
(272, 34, 139, NULL, NULL, '2025-12-01 10:00:00', '2025-12-01 10:00:00');

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
(2, 'Trần Thị Bình', '0902003002', 'binh.tran@example.com', '$2y$12$ePz6ia.RDY0rSPMyTxLZiOn.AU6KZQHRg9UkYjpYDQ2kwycNQ1OKu', 'bep', 1, NULL, '2025-11-19 06:29:55'),
(7, 'Em. Đổng Hào', '0966868924', 'au.vy@example.com', '$2y$12$26kJrZ8w3BFdi9MHOe8rTOR1rlUhcpZzQqjCN.6SveojyM1/WZ4La', 'phuc_vu', 1, NULL, '2025-11-19 06:44:27'),
(8, 'Phạm Lê Đức Trung', '11111111', '1111@gmail.com', '$2y$12$Omv5GABtl5cyBGpg6zqiQ.FT6RKQlrmk/mCpN5VDxrcq6i1WPSceu', 'bep', 1, '2025-11-19 06:32:20', '2025-11-19 06:32:20'),
(9, 'Phạm Lê Đức Trung1', '1111111111', '111111@gmail.com', '$2y$12$6w.RDUgxZNpwL8d7OKpsderT2uNNY1IAPyeB.F2L25Je4.ShlwrHC', 'le_tan', 1, '2025-11-19 06:35:24', '2025-11-19 06:35:24');

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
(123, 293, 2, 6, 752326.00, 'dang_xu_li', '2025-11-29 11:30:44', '2025-11-29 13:21:32'),
(124, 299, 4, 11, 1990176.00, 'hoan_thanh', '2025-11-29 13:18:31', '2025-11-29 13:26:08'),
(125, 300, 4, 34, 255000.00, 'dang_xu_li', '2025-11-29 13:34:52', '2025-11-30 08:42:27'),
(126, 303, 1, 12, 565000.00, 'dang_xu_li', '2025-11-30 09:04:19', '2025-11-30 12:34:55'),
(127, 306, 10, 0, 0.00, 'dang_xu_li', '2025-11-30 13:13:20', '2025-11-30 13:13:20'),
(128, 308, 3, 0, 0.00, 'dang_xu_li', '2025-12-01 01:24:59', '2025-12-01 01:24:59'),
(129, 309, 3, 0, 0.00, 'dang_xu_li', '2025-12-01 01:52:11', '2025-12-01 01:52:11'),
(130, 310, 3, 0, 0.00, 'dang_xu_li', '2025-12-01 02:22:52', '2025-12-01 02:22:52'),
(131, 311, 11, 0, 0.00, 'dang_xu_li', '2025-12-01 03:29:28', '2025-12-01 03:29:28'),
(132, 312, 16, 0, 0.00, 'dang_xu_li', '2025-12-01 04:36:38', '2025-12-01 04:36:38'),
(133, 301, 12, 0, 0.00, 'dang_xu_li', '2025-12-01 04:39:33', '2025-12-01 04:39:33'),
(134, 313, 8, 6, 165000.00, 'dang_xu_li', '2025-12-01 04:56:50', '2025-12-01 05:32:01'),
(135, 298, 15, 11, 761000.00, 'dang_xu_li', '2025-12-01 05:20:05', '2025-12-01 05:20:34'),
(136, 314, 7, 36, 1229000.00, 'dang_xu_li', '2025-12-01 06:09:05', '2025-12-01 06:40:33'),
(137, 315, 6, 5, 99000.00, 'dang_xu_li', '2025-12-01 06:27:50', '2025-12-01 06:27:50'),
(138, 316, 13, 11, 1052000.00, 'dang_xu_li', '2025-12-01 06:34:21', '2025-12-01 06:34:54'),
(139, 317, 7, 8, 529000.00, 'dang_xu_li', '2025-12-01 06:43:10', '2025-12-01 06:46:48'),
(140, 318, 7, 34, 644000.00, 'dang_xu_li', '2025-12-01 07:31:55', '2025-12-01 07:41:33'),
(141, 320, 2, 11, 388000.00, 'dang_xu_li', '2025-12-01 08:01:01', '2025-12-01 09:19:07'),
(142, 321, 3, 10, 568000.00, 'dang_xu_li', '2025-12-01 09:42:02', '2025-12-01 09:42:02'),
(143, 322, 9, 5, 399000.00, 'dang_xu_li', '2025-12-01 10:14:45', '2025-12-01 10:14:45'),
(144, 323, 8, 15, 956000.00, 'dang_xu_li', '2025-12-01 10:20:36', '2025-12-01 10:20:36'),
(145, 324, 1, 6, 373000.00, 'dang_xu_li', '2025-12-01 10:21:55', '2025-12-01 10:22:07'),
(146, 325, 4, 15, 816000.00, 'dang_xu_li', '2025-12-01 10:33:03', '2025-12-01 10:33:03'),
(147, 326, 4, 17, 532000.00, 'dang_xu_li', '2025-12-01 10:34:33', '2025-12-01 10:36:35'),
(148, 328, 12, 2, 30000.00, 'dang_xu_li', '2025-12-01 11:21:04', '2025-12-01 11:21:04'),
(149, 329, 13, 5, 99000.00, 'dang_xu_li', '2025-12-01 11:24:43', '2025-12-01 11:24:43'),
(150, 330, 10, 12, 284000.00, 'dang_xu_li', '2025-12-01 11:28:55', '2025-12-01 11:35:27'),
(151, 331, 1, 33, 2207000.00, 'dang_xu_li', '2025-12-01 12:46:29', '2025-12-01 12:47:28'),
(152, 332, 1, 30, 198000.00, 'dang_xu_li', '2025-12-01 14:59:52', '2025-12-01 17:27:01'),
(153, 333, 2, 10, 498000.00, 'dang_xu_li', '2025-12-01 15:33:02', '2025-12-01 15:33:02'),
(154, 336, 9, 14, 458000.00, 'dang_xu_li', '2025-12-01 15:59:37', '2025-12-01 16:07:59');

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
('zS8rnWwqTs6DWozTJdpCZKw4nxu2kxumr2TsyQri', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkh4S3VMUUFraGJaNDBoYkRndUdFSUZPMnNqMkJqZ3h5d1ZPRmtqayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vZGVycXIvb3JkZXIvc3RhdHVzLzMzMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToic2R0X2toYWNoIjtzOjk6IjExMTExMTExMSI7fQ==', 1764610049);

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

--
-- Dumping data for table `thu_vien_anh_mon_an`
--

INSERT INTO `thu_vien_anh_mon_an` (`id`, `mon_an_id`, `duong_dan_anh`, `created_at`, `updated_at`) VALUES
(77, 230, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:18:36', '2025-12-01 17:18:36'),
(78, 230, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:18:36', '2025-12-01 17:18:36'),
(79, 230, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:18:36', '2025-12-01 17:18:36'),
(80, 131, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(81, 131, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(82, 131, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(83, 132, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(84, 132, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(85, 132, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(86, 133, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(87, 133, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(88, 133, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(89, 134, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(90, 134, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(91, 134, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(92, 135, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(93, 135, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(94, 135, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(95, 136, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(96, 136, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(97, 136, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(98, 137, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(99, 137, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(100, 137, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(101, 138, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(102, 138, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(103, 138, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(104, 139, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(105, 139, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(106, 139, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(107, 140, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(108, 140, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(109, 140, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(110, 141, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(111, 141, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(112, 141, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(113, 142, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(114, 142, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(115, 142, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(116, 143, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(117, 143, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(118, 143, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(119, 144, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(120, 144, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(121, 144, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(122, 145, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(123, 145, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(124, 145, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(125, 146, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(126, 146, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(127, 146, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(128, 147, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(129, 147, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(130, 147, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(131, 148, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(132, 148, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(133, 148, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(134, 149, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(135, 149, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(136, 149, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(137, 150, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(138, 150, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(139, 150, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(140, 151, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(141, 151, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(142, 151, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(143, 152, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(144, 152, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(145, 152, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(146, 153, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(147, 153, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(148, 153, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(149, 154, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(150, 154, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(151, 154, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(152, 155, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(153, 155, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(154, 155, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(155, 156, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(156, 156, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(157, 156, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(158, 157, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(159, 157, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(160, 157, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(161, 158, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(162, 158, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(163, 158, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(164, 159, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(165, 159, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(166, 159, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(167, 160, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(168, 160, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(169, 160, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(170, 161, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(171, 161, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(172, 161, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(173, 162, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(174, 162, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(175, 162, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(176, 163, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(177, 163, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(178, 163, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(179, 164, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(180, 164, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(181, 164, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(182, 165, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(183, 165, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(184, 165, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(185, 166, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(186, 166, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(187, 166, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(188, 167, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(189, 167, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(190, 167, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(191, 168, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(192, 168, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(193, 168, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(194, 169, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(195, 169, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(196, 169, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(197, 170, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(198, 170, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(199, 170, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(200, 171, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(201, 171, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(202, 171, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(203, 172, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(204, 172, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(205, 172, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(206, 173, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(207, 173, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(208, 173, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(209, 174, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(210, 174, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(211, 174, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(212, 175, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(213, 175, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(214, 175, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(215, 176, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(216, 176, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(217, 176, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(218, 177, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(219, 177, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(220, 177, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(221, 178, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(222, 178, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(223, 178, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(224, 179, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(225, 179, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(226, 179, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(227, 180, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(228, 180, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(229, 180, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(230, 181, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(231, 181, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(232, 181, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(233, 182, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(234, 182, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(235, 182, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(236, 183, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(237, 183, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(238, 183, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(239, 184, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(240, 184, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(241, 184, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(242, 185, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(243, 185, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(244, 185, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(245, 186, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(246, 186, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(247, 186, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(248, 187, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(249, 187, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(250, 187, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(251, 188, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(252, 188, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(253, 188, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(254, 189, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(255, 189, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(256, 189, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(257, 190, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(258, 190, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(259, 190, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(260, 191, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(261, 191, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(262, 191, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(263, 192, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(264, 192, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(265, 192, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(266, 193, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(267, 193, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(268, 193, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(269, 194, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(270, 194, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(271, 194, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(272, 195, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(273, 195, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(274, 195, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(275, 196, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(276, 196, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(277, 196, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(278, 197, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(279, 197, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(280, 197, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(281, 198, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(282, 198, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(283, 198, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(284, 199, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(285, 199, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(286, 199, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(287, 200, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(288, 200, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(289, 200, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(290, 201, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(291, 201, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(292, 201, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(293, 202, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(294, 202, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(295, 202, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(296, 203, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(297, 203, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(298, 203, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(299, 204, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(300, 204, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(301, 204, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(302, 205, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(303, 205, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(304, 205, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(305, 206, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(306, 206, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(307, 206, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(308, 207, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(309, 207, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(310, 207, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(311, 208, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(312, 208, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(313, 208, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(314, 209, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(315, 209, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(316, 209, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(317, 210, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(318, 210, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(319, 210, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(320, 211, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(321, 211, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(322, 211, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(323, 212, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(324, 212, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(325, 212, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(326, 213, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(327, 213, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(328, 213, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(329, 214, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(330, 214, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(331, 214, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(332, 215, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(333, 215, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(334, 215, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(335, 216, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(336, 216, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(337, 216, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(338, 217, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(339, 217, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(340, 217, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(341, 218, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(342, 218, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(343, 218, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(344, 219, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(345, 219, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(346, 219, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(347, 220, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(348, 220, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(349, 220, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(350, 221, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(351, 221, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(352, 221, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(353, 222, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(354, 222, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(355, 222, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(356, 223, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(357, 223, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(358, 223, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(359, 224, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(360, 224, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(361, 224, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(362, 225, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(363, 225, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(364, 225, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(365, 226, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(366, 226, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(367, 226, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(368, 227, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(369, 227, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(370, 227, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(371, 228, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(372, 228, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(373, 228, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(374, 229, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(375, 229, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(376, 229, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(377, 230, 'uploads/gallery/monan/1764609516_692dcdeca239e_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(378, 230, 'uploads/gallery/monan/1764609516_692dcdeca2939_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44'),
(379, 230, 'uploads/gallery/monan/1764609516_692dcdeca2ef5_jpg', '2025-12-01 17:26:44', '2025-12-01 17:26:44');

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
(1, 'SALE20', 'phan_tram', 20.00, 100000.00, 'Giảm 20% tối đa 100.000đ', 50, 2, '2025-11-14 11:34:58', '2025-12-14 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-28 20:19:58'),
(2, 'BUFFET50', 'tien_mat', 50000.00, NULL, 'Giảm trực tiếp 50.000đ', 100, 10, '2025-11-14 11:34:58', '2026-01-13 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 05:26:07'),
(3, 'VIP10', 'phan_tram', 10.00, 50000.00, 'Giảm 10% tối đa 50.000đ cho khách VIP', 20, 5, '2025-11-12 11:34:58', '2025-11-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(4, 'TET2025', 'tien_mat', 100000.00, NULL, 'Giảm 100.000đ mừng Tết 2025', 500, 120, '2025-01-01 00:00:00', '2025-02-01 23:59:59', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(5, 'KIDFREE', 'tien_mat', 70000.00, NULL, 'Ưu đãi giảm 70.000đ cho trẻ em', 70, 7, '2025-11-14 11:34:58', '2025-12-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(6, 'FLASH30', 'phan_tram', 30.00, 50000.00, 'Flash sale: Giảm 30% tối đa 50k', 200, 30, '2025-11-14 11:34:58', '2025-11-21 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(7, 'STOPSALE', 'tien_mat', 30000.00, NULL, 'Voucher thử nghiệm (đã ngừng áp dụng)', 100, 100, '2025-11-04 11:34:58', '2025-11-13 11:34:58', 'ngung_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(8, '111', 'phan_tram', 100.00, NULL, 'freee', 1, 1, '2025-11-14 00:00:00', '2025-11-16 00:00:00', 'dang_ap_dung', '2025-11-14 05:31:29', '2025-11-14 05:31:51'),
(9, 'aaaa', 'phan_tram', 50.00, 10000.00, 'voucher nhân dịp giáng dih', 1, 0, '2025-12-01 00:00:00', '2025-12-04 00:00:00', 'dang_ap_dung', '2025-12-01 04:02:15', '2025-12-01 04:02:15');

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
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hd_chi_tiet` (`hoa_don_id`);

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
  ADD KEY `dat_ban_nhan_vien_id_foreign` (`nhan_vien_id`);

--
-- Indexes for table `dat_ban_combo`
--
ALTER TABLE `dat_ban_combo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dbc_dat_ban` (`dat_ban_id`),
  ADD KEY `fk_dbc_combo` (`combo_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1114;

--
-- AUTO_INCREMENT for table `combo_buffet`
--
ALTER TABLE `combo_buffet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `danh_muc_mon`
--
ALTER TABLE `danh_muc_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dat_ban`
--
ALTER TABLE `dat_ban`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `dat_ban_combo`
--
ALTER TABLE `dat_ban_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_mon`
--
ALTER TABLE `order_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban_an`
--
ALTER TABLE `ban_an`
  ADD CONSTRAINT `ban_an_khu_vuc_id_foreign` FOREIGN KEY (`khu_vuc_id`) REFERENCES `khu_vuc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `fk_hd_chi_tiet` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoa_don` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `dat_ban_nhan_vien_id_foreign` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhan_vien` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `dat_ban_combo`
--
ALTER TABLE `dat_ban_combo`
  ADD CONSTRAINT `fk_dbc_combo` FOREIGN KEY (`combo_id`) REFERENCES `combo_buffet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dbc_dat_ban` FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`) ON DELETE CASCADE;

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
