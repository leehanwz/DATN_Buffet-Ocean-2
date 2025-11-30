-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2025 at 12:38 PM
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
(1, 3, 'Bàn 1', 'MCMdhJ2lcqtj', 'http://localhost/order?table_code=MCMdhJ2lcqtj', 2, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-30 09:04:19'),
(2, 3, 'Bàn 2', 'uEWj1TG8iJIS', 'http://localhost/order?table_code=uEWj1TG8iJIS', 4, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-29 11:55:11'),
(3, 5, 'Bàn 3', 'pTX21dKoRDWY', 'http://localhost/order?table_code=pTX21dKoRDWY', 2, 'trong', '2025-11-14 04:34:56', '2025-11-29 04:00:21'),
(4, 1, 'Bàn 4', 'QR74MQ', 'http://www.wilderman.org/enim-non-dolorum-eaque-voluptates-iusto.html', 5, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-29 13:34:52'),
(5, 5, 'Bàn 5', 'ZmzhrNA3YaVh', 'http://localhost/order?table_code=ZmzhrNA3YaVh', 6, 'trong', '2025-11-14 04:34:56', '2025-11-25 16:21:13'),
(6, 3, 'Bàn 6', 'qjmWy8V9bsbD', 'http://localhost/order?table_code=qjmWy8V9bsbD', 4, 'trong', '2025-11-14 04:34:56', '2025-11-29 11:24:36'),
(7, 1, 'Bàn 7', 'QR29QY', 'https://schoen.com/fugit-vero-repellat-in-culpa-omnis-repellendus-animi-facilis.html', 5, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(8, 1, 'Bàn 8', 'QR41WQ', 'https://www.conroy.biz/porro-atque-voluptas-consequatur-qui', 9, 'trong', '2025-11-14 04:34:56', '2025-11-25 16:49:48'),
(9, 5, 'Bàn 9', 'QR25RV', 'http://www.adams.com/quia-nostrum-voluptatem-atque-a-facilis-suscipit.html', 7, 'trong', '2025-11-14 04:34:56', '2025-11-25 21:37:46'),
(10, 1, 'Bàn 10', 'QR01IT', 'http://www.collier.com/illo-sed-voluptatem-corporis-expedita-error-in-corrupti', 3, 'khong_su_dung', '2025-11-14 04:34:56', '2025-11-14 04:34:56'),
(11, 4, 'Bàn 11', 'QR06RV', 'https://www.lueilwitz.biz/eos-iure-fuga-nobis', 8, 'trong', '2025-11-14 04:34:56', '2025-11-30 06:50:21'),
(12, 1, 'Bàn 12', 'QR39XJ', 'https://harber.com/tempora-iusto-inventore-natus-eius.html', 4, 'trong', '2025-11-14 04:34:56', '2025-11-30 08:39:22'),
(13, 1, 'Bàn 13', 'QR32JA', 'http://www.moen.net/earum-perferendis-non-quis-iste-error-ipsum.html', 5, 'trong', '2025-11-14 04:34:56', '2025-11-29 13:23:44'),
(14, 4, 'Bàn 14', 'QR76OW', 'https://treutel.com/corporis-atque-ullam-voluptatem.html', 10, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-30 06:49:32'),
(15, 2, 'Bàn 15', 'QR55PH', 'http://stanton.com/eos-voluptates-aut-et-repellat-inventore-dolore', 3, 'dang_phuc_vu', '2025-11-14 04:34:56', '2025-11-29 13:16:01'),
(16, 6, '11', 'Wi9diDQchjso', 'http://localhost/order?table_code=Wi9diDQchjso', 2, 'trong', '2025-11-18 15:28:34', '2025-11-25 21:37:46');

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
(709, 125, 113, 5, 'combo', 'da_len_mon', NULL, '2025-11-30 08:36:59', '2025-11-30 08:42:27'),
(710, 125, 114, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(711, 125, 115, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(712, 125, 101, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(713, 125, 103, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(714, 125, 111, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(715, 125, 112, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(716, 125, 104, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(717, 125, 119, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(718, 125, 120, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:36:59', '2025-11-30 08:36:59'),
(719, 125, 113, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(720, 125, 114, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(721, 125, 115, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(722, 125, 101, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(723, 125, 103, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(724, 125, 111, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(725, 125, 112, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:00', '2025-11-30 08:37:00'),
(726, 125, 104, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(727, 125, 119, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(728, 125, 120, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(729, 125, 111, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(730, 125, 112, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(731, 125, 104, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(732, 125, 119, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(733, 125, 120, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(734, 125, 113, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(735, 125, 114, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(736, 125, 115, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(737, 125, 101, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(738, 125, 103, 5, 'combo', 'cho_bep', NULL, '2025-11-30 08:37:01', '2025-11-30 08:37:01'),
(739, 125, 101, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 08:38:23', '2025-11-30 08:38:23'),
(740, 125, 106, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 08:38:23', '2025-11-30 08:38:23'),
(741, 125, 104, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 08:38:23', '2025-11-30 08:38:23'),
(742, 125, 102, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 08:38:23', '2025-11-30 08:38:23'),
(743, 126, 102, 2, 'combo', 'cho_bep', NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(744, 126, 117, 2, 'combo', 'cho_bep', NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(745, 126, 121, 2, 'combo', 'cho_bep', NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(746, 126, 128, 2, 'combo', 'cho_bep', NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(747, 126, 129, 2, 'combo', 'cho_bep', NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(748, 126, 102, 5, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(749, 126, 104, 2, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(750, 126, 101, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(751, 126, 103, 2, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(752, 126, 105, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(753, 126, 107, 1, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55'),
(754, 126, 109, 2, 'goi_them', 'cho_bep', NULL, '2025-11-30 12:34:55', '2025-11-30 12:34:55');

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
(10, 'Combo Kid (Trẻ Em)', 'tre_em', 99000.00, 90, '2025-11-10 00:00:00', '2026-10-10 23:59:59', 'combo_buffet/1764491192_tải xuống (1).jpg', 'dang_ban', '2025-11-30 08:07:36', '2025-11-30 08:07:36'),
(11, 'Combo Standard (Heo & Gà)', 'nguoi_lon', 169000.00, 120, '2025-11-10 00:00:00', '2026-10-10 23:59:59', 'combo_buffet/1764491192_tải xuống (1).jpg', 'dang_ban', '2025-11-30 08:07:36', '2025-11-30 08:07:36'),
(12, 'Combo Premium (Bò Mỹ)', 'nguoi_lon', 219000.00, 120, '2025-11-10 00:00:00', '2026-10-10 23:59:59', 'combo_buffet/1764491192_tải xuống (1).jpg', 'dang_ban', '2025-11-30 08:07:36', '2025-11-30 08:07:36'),
(13, 'Combo Seafood (Hải Sản)', 'nguoi_lon', 299000.00, 150, '2025-11-10 00:00:00', '2026-10-10 23:59:59', 'combo_buffet/1764491192_tải xuống (1).jpg', 'dang_ban', '2025-11-30 08:07:36', '2025-11-30 08:07:36'),
(14, 'Combo V.I.P (Full Menu)', 'vip', 399000.00, 180, '2025-11-10 00:00:00', '2026-10-10 23:59:00', 'combo_buffet/1764491192_tải xuống (1).jpg', 'dang_ban', '2025-11-30 08:07:36', '2025-11-30 08:26:32');

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
(292, 'DB-20251129182927-F6U', 'Phạm Trung', NULL, '0111111111', 0, 0, 12, 9, '2025-11-29 18:28:00', NULL, 0.00, 'huy', NULL, 0, NULL, '2025-11-29 11:29:28', '2025-11-30 08:39:22'),
(293, 'QR20251129-4C02', 'phạm', NULL, '111111111111', 0, 0, 2, NULL, '2025-11-29 18:30:44', 146, NULL, 'khach_da_den', NULL, 0, NULL, '2025-11-29 11:30:44', '2025-11-29 11:30:44'),
(294, 'DB-20251129-02NX', 'Trung phạm', 'trungleogi@gmail.com', '011111111111', 0, 0, 15, NULL, '2025-11-30 18:44:00', 120, 20000.00, 'da_xac_nhan', NULL, 1, NULL, '2025-11-29 11:40:39', '2025-11-29 11:42:44'),
(295, 'DB-20251129-NQYX', 'Trung', 'trungleogi@gmail.com', '0111111111', 0, 0, 12, NULL, '2025-12-07 18:45:00', 120, 0.00, 'da_xac_nhan', NULL, 0, NULL, '2025-11-29 11:45:30', '2025-11-29 11:46:20'),
(296, 'DB-20251129-ENJB', 'Khách', '11111@gmail.com', '11111111', 0, 0, 11, NULL, '2025-11-29 19:20:00', 120, 0.00, 'huy', NULL, 0, NULL, '2025-11-29 11:51:11', '2025-11-30 06:53:44'),
(297, 'DB-20251129-S6X9', 'Trung', '11111@gmail.com', '1111111111111', 0, 0, 13, NULL, '2025-11-29 19:19:00', 120, 0.00, 'hoan_tat', NULL, 0, NULL, '2025-11-29 11:52:14', '2025-11-29 13:23:44'),
(298, 'DB-20251129-3ZOB', 'Trung', 'trungleogi@gmail.com', '11111111', 0, 0, 15, NULL, '2025-11-29 20:17:00', 120, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-29 12:59:19', '2025-11-29 13:16:01'),
(299, 'QR20251129-1717', 'trrr', NULL, '1111', 0, 0, 4, NULL, '2025-11-29 20:18:31', 146, NULL, 'hoan_tat', NULL, 0, NULL, '2025-11-29 13:18:31', '2025-11-29 13:26:08'),
(300, 'QR20251129-C3C4', 'pppppppp', NULL, '000000', 0, 0, 4, NULL, '2025-11-29 20:34:52', 146, NULL, 'khach_da_den', NULL, 0, NULL, '2025-11-29 13:34:52', '2025-11-30 08:37:01'),
(301, 'DB-20251130-ZIOQ', '11111111', '11111@gmail.com', '11111111', 0, 0, 12, NULL, '2025-11-30 13:46:00', 120, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-30 06:42:52', '2025-11-30 06:43:44'),
(302, 'DB-20251130134921-ENT', '1111111111', NULL, '111111', 0, 0, 14, 7, '2025-11-30 13:49:00', NULL, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-30 06:49:21', '2025-11-30 06:49:32'),
(303, 'QR20251130-BF3A', '111111111', NULL, '11111111111', 2, 0, 1, NULL, '2025-11-30 16:04:19', 90, NULL, 'khach_da_den', NULL, 0, NULL, '2025-11-30 09:04:19', '2025-11-30 09:04:19'),
(304, 'DB-20251130-DWX1', 'aaaa1111111111', 'trungleogi@gmail.com', '1111111', 2, 6, NULL, 7, '2025-12-21 16:15:00', 120, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-30 09:15:58', '2025-11-30 09:28:40'),
(305, 'DB-20251130-LFLA', 'aaaa', 'trungleogi@gmail.com', '1111111', 2, 3, NULL, NULL, '2025-12-06 16:15:00', 120, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-30 09:15:58', '2025-11-30 09:15:58');

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
(101, 6, 'Salad Rong Biển Trứng Cua', 45000.00, 'Salad tươi trộn rong biển và trứng cua', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(102, 6, 'Khoai Tây Chiên Bơ Tỏi', 35000.00, 'Khoai tây chiên giòn lắc bơ tỏi', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(103, 6, 'Ngô Chiên Giòn', 30000.00, 'Ngô ngọt tẩm bột chiên', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(104, 6, 'Súp Gà Nấm Hương', 25000.00, 'Súp gà nóng hổi khai vị', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(105, 6, 'Nộm Sứa Tai Heo', 55000.00, 'Nộm sứa giòn sần sật', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(106, 7, 'Tôm Càng Xanh', 150000.00, 'Tôm càng xanh tươi sống', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(107, 7, 'Mực Trứng Phan Thiết', 130000.00, 'Mực trứng béo ngậy', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(108, 7, 'Bạch Tuộc Ướp Sa Tế', 120000.00, 'Bạch tuộc đại dương ướp cay', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(109, 7, 'Hàu Nướng Mỡ Hành', 25000.00, 'Hàu sữa nướng thơm lừng', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 20, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(110, 7, 'Sò Điệp Nướng Phô Mai', 140000.00, 'Sò điệp bỏ lò phô mai', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 20, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(111, 8, 'Ba Chỉ Bò Mỹ Cuộn Nấm', 189000.00, 'Thịt bò ba chỉ nhập khẩu', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(112, 8, 'Dẻ Sườn Bò Sốt Tiêu', 199000.00, 'Dẻ sườn bò rút xương', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(113, 8, 'Ba Chỉ Heo Sốt Galbi', 149000.00, 'Thịt heo ướp sốt Hàn Quốc', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(114, 8, 'Nầm Heo Nướng Chao', 139000.00, 'Nầm heo giòn rụm', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(115, 8, 'Đùi Gà Sốt Teriyaki', 119000.00, 'Thịt gà lọc xương ướp ngọt', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Nướng', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(116, 11, 'Bò Viên Thượng Hạng', 60000.00, 'Bò viên gân dai giòn', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(117, 11, 'Cá Viên Nhân Phô Mai', 55000.00, 'Cá viên bọc phô mai tan chảy', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(118, 11, 'Thanh Cua Nhật', 35000.00, 'Thanh cua thả lẩu', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(119, 10, 'Combo Rau Tổng Hợp', 40000.00, 'Cải thảo, cải thìa, muống', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 10, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(120, 10, 'Mì Tôm/Mì Trứng', 10000.00, 'Mì ăn kèm lẩu', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Sống', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(121, 9, 'Cơm Rang Dương Châu', 55000.00, 'Cơm rang thập cẩm', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(122, 9, 'Mì Xào Hải Sản', 65000.00, 'Mì xào tôm mực rau củ', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Xào / Luộc', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(123, 9, 'Gà Chiên Mắm', 75000.00, 'Cánh gà chiên nước mắm', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 25, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(124, 9, 'Khoai Lang Kén', 30000.00, 'Khoai lang nghiền chiên', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 15, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(125, 9, 'Ốc Hương Hấp Sả', 95000.00, 'Ốc hương size vừa hấp', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 20, 'Chín', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(126, 13, 'Dưa Hấu Tráng Miệng', 15000.00, 'Dưa hấu đỏ ngọt', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Trái cây', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(127, 13, 'Chè Khúc Bạch', 25000.00, 'Chè hạnh nhân vải thiều', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Bánh ngọt', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(128, 13, 'Kem Vani', 10000.00, 'Kem tươi mát lạnh', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Bánh ngọt', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(129, 14, 'Pepsi Tươi (Ly)', 15000.00, 'Nước ngọt có ga', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, 'Nước có ga', '2025-11-30 08:05:39', '2025-11-30 08:05:39'),
(130, 14, 'Trà Chanh', 15000.00, 'Trà chanh truyền thống', 'uploads/monan/1764490955_chup-anh-mon-an-tai-nha-trang.jpg', 'con', 5, NULL, '2025-11-30 08:05:39', '2025-11-30 08:22:35');

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
(77, 10, 102, 5, 1750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(78, 10, 117, 5, 2750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(79, 10, 121, 5, 2750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(80, 10, 128, 5, 500.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(81, 10, 129, 5, 750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(82, 11, 113, 5, 7450.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(83, 11, 114, 5, 6950.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(84, 11, 115, 5, 5950.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(85, 11, 101, 5, 2250.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(86, 11, 103, 5, 1500.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(87, 12, 111, 5, 9450.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(88, 12, 112, 5, 9950.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(89, 12, 104, 5, 1250.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(90, 12, 119, 5, 2000.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(91, 12, 120, 5, 500.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(92, 13, 106, 5, 7500.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(93, 13, 107, 5, 6500.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(94, 13, 108, 5, 6000.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(95, 13, 109, 5, 1250.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(96, 13, 125, 5, 4750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(97, 14, 110, 5, 7000.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(98, 14, 105, 5, 2750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(99, 14, 123, 5, 3750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(100, 14, 127, 5, 1250.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51'),
(101, 14, 130, 5, 750.00, '2025-11-30 08:12:51', '2025-11-30 08:12:51');

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
(126, 303, 1, 12, 565000.00, 'dang_xu_li', '2025-11-30 09:04:19', '2025-11-30 12:34:55');

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
('EZRkaxbPJe1jQ3oE1lA5E6NxlemGiCkcFG36uRHa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkp4bUFpOTZUQ3FjWDFUTmNiMzJoQ2Y3YXJ6UnpjSnZHZ0xDVDZjWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vZGVycXIvb3JkZXIvc3RhdHVzLzMwMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764506304),
('zCcuEUeIq1zGNNWwiCb8gDJr93ylUlYKfruIEIet', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXNhTnVwNzk2bWprcEt0ZUVJVDF3WDRrOGRWOVZoS1NuS3pxa3hKcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQvZGF0YT9maWx0ZXI9bW9udGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1764495150);

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
(1, 130, 'uploads/gallery/monan/1764490955_692bfecbc8022_jpg', '2025-11-30 08:22:35', '2025-11-30 08:22:35'),
(2, 130, 'uploads/gallery/monan/1764490955_692bfecbc85b2_jpg', '2025-11-30 08:22:35', '2025-11-30 08:22:35'),
(3, 130, 'uploads/gallery/monan/1764490955_692bfecbc8a31_jpg', '2025-11-30 08:22:35', '2025-11-30 08:22:35');

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
-- AUTO_INCREMENT for table `chi_tiet_order`
--
ALTER TABLE `chi_tiet_order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=755;

--
-- AUTO_INCREMENT for table `combo_buffet`
--
ALTER TABLE `combo_buffet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `danh_muc_mon`
--
ALTER TABLE `danh_muc_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dat_ban`
--
ALTER TABLE `dat_ban`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `dat_ban_combo`
--
ALTER TABLE `dat_ban_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `mon_trong_combo`
--
ALTER TABLE `mon_trong_combo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_mon`
--
ALTER TABLE `order_mon`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
