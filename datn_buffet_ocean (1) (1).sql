-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2025 at 04:53 PM
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
(1, 3, 'Bàn 1', 'MCMdhJ2lcqtj', 'http://localhost/order?table_code=MCMdhJ2lcqtj', 2, 'trong', '2025-11-14 04:34:56', '2025-11-19 09:49:41'),
(2, 3, 'Bàn 2', 'uEWj1TG8iJIS', 'http://localhost/order?table_code=uEWj1TG8iJIS', 4, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-17 07:52:33'),
(3, 5, 'Bàn 3', 'pTX21dKoRDWY', 'http://localhost/order?table_code=pTX21dKoRDWY', 2, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-17 11:10:28'),
(4, 1, 'Bàn 4', 'QR74MQ', 'http://www.wilderman.org/enim-non-dolorum-eaque-voluptates-iusto.html', 5, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(5, 5, 'Bàn 5', 'ZmzhrNA3YaVh', 'http://localhost/order?table_code=ZmzhrNA3YaVh', 6, 'trong', '2025-11-14 04:34:56', '2025-11-19 09:49:41'),
(6, 3, 'Bàn 6', 'qjmWy8V9bsbD', 'http://localhost/order?table_code=qjmWy8V9bsbD', 4, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(7, 1, 'Bàn 7', 'QR29QY', 'https://schoen.com/fugit-vero-repellat-in-culpa-omnis-repellendus-animi-facilis.html', 5, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 1, 'Bàn 8', 'QR41WQ', 'https://www.conroy.biz/porro-atque-voluptas-consequatur-qui', 9, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(9, 5, 'Bàn 9', 'QR25RV', 'http://www.adams.com/quia-nostrum-voluptatem-atque-a-facilis-suscipit.html', 7, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(10, 1, 'Bàn 10', 'QR01IT', 'http://www.collier.com/illo-sed-voluptatem-corporis-expedita-error-in-corrupti', 3, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 4, 'Bàn 11', 'QR06RV', 'https://www.lueilwitz.biz/eos-iure-fuga-nobis', 8, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(12, 1, 'Bàn 12', 'QR39XJ', 'https://harber.com/tempora-iusto-inventore-natus-eius.html', 4, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-19 07:29:43'),
(13, 1, 'Bàn 13', 'QR32JA', 'http://www.moen.net/earum-perferendis-non-quis-iste-error-ipsum.html', 5, 'trong', '2025-11-14 04:34:56', '2025-11-18 15:30:37'),
(14, 4, 'Bàn 14', 'QR76OW', 'https://treutel.com/corporis-atque-ullam-voluptatem.html', 10, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(15, 2, 'Bàn 15', 'QR55PH', 'http://stanton.com/eos-voluptates-aut-et-repellat-inventore-dolore', 3, 'trong', '2025-11-14 04:34:56', '2025-11-19 08:00:53'),
(16, 6, '11', 'Wi9diDQchjso', 'http://localhost/order?table_code=Wi9diDQchjso', 2, 'trong', '2025-11-18 15:28:34', '2025-11-19 08:08:31');

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
(3, 'Combo Nisi', 'nguoi_lon', 376163.00, 146, '2025-11-13 20:47:00', '2025-11-16 00:13:00', 'combo_buffet/1763389578_windows-11-minimal-windows-logo-5k-8k-7680x4320-7381.png', 'dang_ban', '2025-11-14 04:34:56', '2025-11-17 07:26:18'),
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
  `email_khach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `dat_ban` (`id`, `ma_dat_ban`, `ten_khach`, `email_khach`, `sdt_khach`, `so_khach`, `ban_id`, `combo_id`, `nhan_vien_id`, `gio_den`, `thoi_luong_phut`, `tien_coc`, `trang_thai`, `xac_thuc_ma`, `la_dat_online`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(184, 'DB20251119-075', 'Anh. Hán Ân Liêm', 'dai.duy@example.org', '0934707559', 6, 4, 1, 7, '2025-11-21 20:33:00', 120, 200000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-15 09:40:32', '2025-11-19 09:42:00'),
(185, 'DB20251119-076', 'Đan Thái Hảo', 'che.hoa@example.com', '0977194307', 8, 12, 1, 2, '2025-11-26 01:42:00', 120, 200000.00, 'khach_da_den', NULL, 0, NULL, '2025-11-19 09:40:32', '2025-11-19 09:41:38'),
(186, 'DB20251119-077', 'Cấn Lâm', 'tran.ca@example.org', '0927700347', 6, 7, NULL, 7, '2025-11-26 04:49:02', 173, 100000.00, 'cho_xac_nhan', '867357', 1, 'Officiis tempora id suscipit et exercitationem.', '2025-11-12 09:40:32', '2025-11-19 09:40:32'),
(187, 'DB20251119-078', 'Ông. Ma Phụng Dinh', 'du46@example.com', '0998670976', 4, 16, NULL, NULL, '2025-11-22 15:45:07', 95, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-10 09:40:32', '2025-11-19 09:40:32'),
(188, 'DB20251119-079', 'Bà. Phan Phụng Thục', 'tai99@example.net', '0951300222', 7, 8, NULL, NULL, '2025-11-25 22:11:51', 160, 0.00, 'cho_xac_nhan', NULL, 0, 'Earum iste alias est repellat.', '2025-11-15 09:40:32', '2025-11-19 09:40:32'),
(189, 'DB20251119-080', 'Em. Chử Nhật Nhu', 'thoai84@example.com', '0915379099', 3, 8, NULL, NULL, '2025-11-21 02:04:29', 145, 200000.00, 'hoan_tat', '638376', 1, 'Soluta temporibus velit hic itaque consectetur.', '2025-11-10 09:40:32', '2025-11-19 09:40:32'),
(190, 'DB-20251119-I39S', 'aaaa', 'aa11a@gmail.com', 'aaaa', 1, 1, 1, NULL, '2025-11-13 23:50:00', 120, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-19 09:50:37', '2025-11-19 09:53:18');

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
(16, '2025_11_19_163558_add_email_khach_to_dat_ban_table', 2);

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
(1, 3, 'Gỏi cuốn tôm thịt', 204173.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_cuốn_tôm_thịt.jpg', 'con', 21, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(2, 1, 'Chả giò rế', 219130.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_giò_rế.jpg', 'con', 14, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(3, 3, 'Nem chua rán', 270541.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nem_chua_rán.jpg', 'con', 12, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(4, 5, 'Gỏi bò bóp thấu', 212493.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_bò_bóp_thấu.jpg', 'con', 16, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(5, 5, 'Súp hải sản', 45356.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/súp_hải_sản.jpg', 'con', 23, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(6, 1, 'Súp bí đỏ kem tươi', 243476.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'uploads/monan/1763384956_Redmi-A13-Blk1.jpg', 'con', 6, 'Khai vị', '2025-11-14 04:34:56', '2025-11-17 06:09:16'),
(7, 2, 'Salad cá ngừ', 133211.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/salad_cá_ngừ.jpg', 'con', 21, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 1, 'Gỏi ngó sen tôm thịt', 266510.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_ngó_sen_tôm_thịt.jpg', 'con', 15, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 05:18:45'),
(9, 2, 'Chả cá chiên giòn', 147692.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_cá_chiên_giòn.jpg', 'con', 20, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(10, 3, 'Khoai tây chiên bơ tỏi', 147250.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/khoai_tây_chiên_bơ_tỏi.jpg', 'con', 24, 'Khai vị', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 5, 'Cơm chiên dương châu', 96080.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_chiên_dương_châu.jpg', 'con', 23, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(12, 5, 'Bò lúc lắc khoai tây', 178433.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_lúc_lắc_khoai_tây.jpg', 'con', 6, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(13, 1, 'Cá kho tộ', 238366.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_kho_tộ.jpg', 'con', 17, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(14, 3, 'Sườn non rim mặn ngọt', 249291.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sườn_non_rim_mặn_ngọt.jpg', 'con', 13, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(15, 1, 'Gà hấp hành', 246914.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_hấp_hành.jpg', 'con', 19, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(16, 4, 'Lẩu thái hải sản', 251909.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_thái_hải_sản.jpg', 'con', 13, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(17, 3, 'Lẩu bò sa tế', 36654.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_bò_sa_tế.jpg', 'con', 7, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(18, 5, 'Cá chẽm hấp xì dầu', 127323.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_chẽm_hấp_xì_dầu.jpg', 'con', 8, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(19, 3, 'Thịt ba chỉ quay giòn bì', 110411.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/thịt_ba_chỉ_quay_giòn_bì.jpg', 'con', 20, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(20, 5, 'Tôm sú nướng muối ớt', 217041.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/tôm_sú_nướng_muối_ớt.jpg', 'con', 5, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(21, 1, 'Vịt quay Bắc Kinh', 270368.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/vịt_quay_bắc_kinh.jpg', 'con', 5, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(22, 4, 'Gà nướng mật ong', 226645.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_nướng_mật_ong.jpg', 'con', 11, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(23, 4, 'Bún chả Hà Nội', 75698.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bún_chả_hà_nội.jpg', 'con', 20, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(24, 2, 'Phở bò tái nạm', 218125.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/phở_bò_tái_nạm.jpg', 'con', 12, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(25, 1, 'Mì xào hải sản', 95608.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/mì_xào_hải_sản.jpg', 'con', 15, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(26, 4, 'Hủ tiếu Nam Vang', 213825.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/hủ_tiếu_nam_vang.jpg', 'con', 25, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(27, 2, 'Bò kho bánh mì', 59932.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_kho_bánh_mì.jpg', 'con', 11, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(28, 1, 'Cơm tấm sườn bì chả trứng', 91943.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_tấm_sườn_bì_chả_trứng.jpg', 'con', 25, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(29, 5, 'Canh chua cá lóc', 165566.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/canh_chua_cá_lóc.jpg', 'con', 27, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(30, 2, 'Cá hồi áp chảo sốt bơ chanh', 76709.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_hồi_áp_chảo_sốt_bơ_chanh.jpg', 'con', 17, 'Món chính', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(31, 3, 'Chè khúc bạch', 245148.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_khúc_bạch.jpg', 'con', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(32, 3, 'Chè ba màu', 234113.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_ba_màu.jpg', 'con', 7, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(33, 3, 'Rau câu dừa', 249153.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/rau_câu_dừa.jpg', 'con', 14, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(34, 5, 'Bánh flan', 72634.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_flan.jpg', 'con', 10, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(35, 2, 'Bánh chuối nướng', 226492.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_chuối_nướng.jpg', 'con', 29, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(36, 3, 'Bánh da lợn', 122388.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_da_lợn.jpg', 'con', 19, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(37, 3, 'Bánh bò hấp', 194571.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_bò_hấp.jpg', 'con', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(38, 5, 'Sương sáo sữa tươi', 119028.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sương_sáo_sữa_tươi.jpg', 'con', 9, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(39, 4, 'Kem dừa', 186996.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/kem_dừa.jpg', 'con', 16, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(40, 4, 'Trái cây thập cẩm', 263763.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trái_cây_thập_cẩm.jpg', 'con', 12, 'Tráng miệng', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(41, 2, 'Trà đào cam sả', 50970.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_đào_cam_sả.jpg', 'con', 25, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(42, 5, 'Sinh tố bơ', 252346.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sinh_tố_bơ.jpg', 'con', 21, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(43, 2, 'Nước ép cam', 94884.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_cam.jpg', 'con', 25, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(44, 2, 'Nước ép dưa hấu', 162404.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_dưa_hấu.jpg', 'con', 5, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(45, 3, 'Cà phê sữa đá', 114108.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_sữa_đá.jpg', 'con', 14, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(46, 4, 'Cà phê đen nóng', 213299.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_đen_nóng.jpg', 'con', 5, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(47, 5, 'Trà sữa trân châu đường đen', 142404.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_sữa_trân_châu_đường_đen.jpg', 'con', 12, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(48, 3, 'Nước chanh tươi', 218485.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_chanh_tươi.jpg', 'con', 28, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(49, 1, 'Nước mía sầu riêng', 126417.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_mía_sầu_riêng.jpg', 'con', 7, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(50, 4, 'Soda việt quất', 258012.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/soda_việt_quất.jpg', 'con', 8, 'Đồ uống', '2025-11-14 04:34:56', '2025-11-14 04:34:56');

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
(27, 5, 18, 10, 48555.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(28, 2, 16, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(29, 5, 24, 8, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(30, 3, 22, 1, 10829.00, '2025-11-14 04:34:56', '2025-11-14 06:09:13'),
(31, 4, 12, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(32, 1, 14, 2, NULL, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(33, 4, 11, 3, 33559.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(34, 5, 30, 10, 10331.00, '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
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
(47, 5, 16, 1, 28823.00, '2025-11-14 04:34:56', '2025-11-14 06:08:30'),
(48, 3, 9, 1, 1001.00, '2025-11-14 04:34:56', '2025-11-14 06:08:20'),
(49, 1, 30, 1, 46277.00, '2025-11-14 04:34:56', '2025-11-14 06:08:10'),
(51, 3, 1, 1, 10000.00, '2025-11-14 06:03:21', '2025-11-14 06:07:54');

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
('1xFrVQUL0KWXVm5Zz3Skyh4px739ZdrlqpEkAeOr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUdaQU5JdUh5QXZIM2NFRVoyeGRxWm9HNnY2aEZtNHNFOGtoQThrMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXQtYmFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1763571199);

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
(1, 'SALE20', 'phan_tram', 20.00, 100000.00, 'Giảm 20% tối đa 100.000đ', 50, 1, '2025-11-14 11:34:58', '2025-12-14 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 05:06:37'),
(2, 'BUFFET50', 'tien_mat', 50000.00, NULL, 'Giảm trực tiếp 50.000đ', 100, 10, '2025-11-14 11:34:58', '2026-01-13 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 05:26:07'),
(3, 'VIP10', 'phan_tram', 10.00, 50000.00, 'Giảm 10% tối đa 50.000đ cho khách VIP', 20, 5, '2025-11-12 11:34:58', '2025-11-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(4, 'TET2025', 'tien_mat', 100000.00, NULL, 'Giảm 100.000đ mừng Tết 2025', 500, 120, '2025-01-01 00:00:00', '2025-02-01 23:59:59', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(5, 'KIDFREE', 'tien_mat', 70000.00, NULL, 'Ưu đãi giảm 70.000đ cho trẻ em', 70, 7, '2025-11-14 11:34:58', '2025-12-29 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(6, 'FLASH30', 'phan_tram', 30.00, 50000.00, 'Flash sale: Giảm 30% tối đa 50k', 200, 30, '2025-11-14 11:34:58', '2025-11-21 11:34:58', 'dang_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(7, 'STOPSALE', 'tien_mat', 30000.00, NULL, 'Voucher thử nghiệm (đã ngừng áp dụng)', 100, 100, '2025-11-04 11:34:58', '2025-11-13 11:34:58', 'ngung_ap_dung', '2025-11-14 04:34:58', '2025-11-14 04:34:58'),
(8, '111', 'phan_tram', 100.00, NULL, 'freee', 1, 1, '2025-11-14 00:00:00', '2025-11-16 00:00:00', 'dang_ap_dung', '2025-11-14 05:31:29', '2025-11-14 05:31:51');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_mon`
--
ALTER TABLE `order_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
