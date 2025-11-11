-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2025 at 10:03 AM
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
(1, 4, 'Bàn 1', 'QR10RE', 'http://www.kiehn.biz/', 7, 'dang_phuc_vu', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 3, 'Bàn 2', 'QR72FV', 'https://gerhold.com/tempora-officiis-harum-a-et-sed-corrupti.html', 2, 'trong', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(3, 3, 'Bàn 3', 'QR54NL', 'http://www.mills.info/et-corrupti-aspernatur-nostrum', 2, 'trong', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 1, 'Bàn 4', 'QR52LA', 'http://zemlak.biz/id-et-amet-dicta-voluptate-sed-ut', 5, 'dang_phuc_vu', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 3, 'Bàn 5', 'QR22DQ', 'http://www.weber.net/culpa-nostrum-modi-unde-repellendus', 5, 'dang_phuc_vu', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(6, 5, 'Bàn 6', 'QR36MM', 'http://collier.com/sunt-laborum-magnam-dolores-animi-inventore-tempora-aut-dolores', 10, 'trong', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(7, 3, 'Bàn 7', 'QR63KA', 'http://hoppe.info/cum-suscipit-totam-autem-nulla-sunt-aut-voluptas-velit', 10, 'trong', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(8, 1, 'Bàn 8', 'QR17RR', 'http://bradtke.biz/at-beatae-quas-atque-laboriosam-voluptatem-corrupti-veritatis-aut.html', 10, 'khong_su_dung', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(9, 3, 'Bàn 9', 'QR57UI', 'http://thiel.com/', 2, 'da_dat', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(10, 4, 'Bàn 10', 'QR02JR', 'http://www.hickle.com/', 3, 'dang_phuc_vu', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(11, 1, 'Bàn 11', 'QR54XQ', 'http://gibson.com/', 9, 'dang_phuc_vu', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(12, 5, 'Bàn 12', 'QR17OO', 'http://www.jacobson.biz/aut-doloribus-consequatur-qui-dolores-inventore-in.html', 7, 'da_dat', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(13, 4, 'Bàn 13', 'QR92VO', 'https://terry.com/ad-necessitatibus-tenetur-at-aut-reprehenderit-distinctio-dolorem-laborum.html', 8, 'da_dat', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(14, 5, 'Bàn 14', 'QR07HT', 'http://senger.com/sint-eos-quia-sunt', 7, 'khong_su_dung', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(15, 1, 'Bàn 15', 'QR57VK', 'https://casper.com/facere-excepturi-nesciunt-et-eos.html', 10, 'da_dat', '2025-11-06 07:27:24', '2025-11-06 07:27:24');

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
(3, 1, 25, NULL, 'combo', 'da_len_mon', NULL, NULL, '2025-11-11 01:08:18'),
(4, 1, 17, NULL, 'combo', 'da_len_mon', NULL, NULL, '2025-11-11 01:08:37'),
(5, 1, 6, NULL, 'combo', 'da_len_mon', NULL, NULL, '2025-11-11 01:08:50'),
(6, 1, 46, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(7, 1, 50, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(8, 1, 33, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(9, 1, 37, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(10, 1, 11, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(11, 1, 46, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(12, 1, 16, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(13, 1, 22, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(14, 1, 23, 1, 'combo', 'cho_bep', NULL, NULL, NULL),
(15, 1, 5, 1, 'goi_them', 'cho_bep', NULL, '2025-11-11 01:12:44', '2025-11-11 01:12:44'),
(17, 1, 22, 1, 'goi_them', 'cho_bep', NULL, '2025-11-11 02:40:21', '2025-11-11 02:40:21');

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
(1, 'Combo Quia', 'tre_em', 403919.00, 145, '2025-11-06 13:03:18', '2025-11-08 04:44:16', NULL, 'dang_ban', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 'Combo Nemo', 'nguoi_lon', 385172.00, 148, '2025-11-06 09:14:00', '2025-11-08 12:18:00', NULL, 'dang_ban', '2025-11-06 07:27:24', '2025-11-11 01:11:46'),
(3, 'Combo Qui', 'tre_em', 558079.00, 106, '2025-11-06 10:22:17', '2025-11-08 09:44:05', NULL, 'dang_ban', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 'Combo Fugiat', 'tre_em', 693987.00, 101, '2025-11-06 07:46:21', '2025-11-06 15:14:35', NULL, 'ngung_ban', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 'Combo Commodi', 'nguoi_lon', 366517.00, 147, '2025-11-05 17:15:54', '2025-11-08 05:04:58', NULL, 'ngung_ban', '2025-11-06 07:27:24', '2025-11-06 07:27:24');

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
(1, 'Hải sản', 'Các món thuộc nhóm Hải sản', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 'Thịt nướng', 'Các món thuộc nhóm Thịt nướng', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(3, 'Món chay', 'Các món thuộc nhóm Món chay', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 'Tráng miệng', 'Các món thuộc nhóm Tráng miệng', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 'Đồ uống', 'Các món thuộc nhóm Đồ uống', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24');

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
(1, 'DB20251106-001', 'Bác. Từ Chiêu Oanh', '0988029784', 4, 12, 4, NULL, '2025-11-08 09:30:46', 116, 50000.00, 'huy', NULL, 0, 'Cupiditate dolor consequatur molestias a cumque perspiciatis repellendus.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(2, 'DB20251106-002', 'Em. Nhậm Cát Hoa', '0914816858', 7, 11, 5, NULL, '2025-11-09 14:19:33', 167, 50000.00, 'khach_da_den', NULL, 0, 'Consectetur ut nihil qui qui sint pariatur harum.', '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(3, 'DB20251106-003', 'Viên Đông Nhân', '0954194594', 7, 4, NULL, NULL, '2025-11-10 01:25:21', 141, 200000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 'DB20251106-004', 'Viên Vũ', '0958490400', 9, 12, 2, NULL, '2025-11-11 03:34:16', 83, 0.00, 'huy', NULL, 0, NULL, '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(5, 'DB20251106-005', 'La Mỹ', '0907534323', 5, 8, 2, NULL, '2025-11-09 22:11:49', 74, 50000.00, 'da_xac_nhan', NULL, 0, 'Itaque harum dignissimos et nobis cum debitis est.', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(6, 'DB20251106-006', 'Bửu Đăng Kha', '0917444950', 3, 14, NULL, NULL, '2025-11-08 11:32:38', 80, 200000.00, 'da_xac_nhan', '138548', 1, 'Quia vitae minus natus tempore tenetur quae.', '2025-10-30 07:27:24', '2025-11-06 07:27:24'),
(7, 'DB20251106-007', 'Khưu Việt Trang', '0976779250', 10, 15, 5, NULL, '2025-11-12 09:17:00', 138, 100000.00, 'huy', '980525', 1, NULL, '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(8, 'DB20251106-008', 'Cô. Trương Băng', '0969347001', 10, 4, 3, NULL, '2025-11-10 22:40:23', 70, 0.00, 'huy', '140558', 1, 'Iste dignissimos dolor laboriosam doloremque minima.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(9, 'DB20251106-009', 'Nguyễn Quảng Kiếm', '0977449258', 9, 3, NULL, NULL, '2025-11-08 15:06:06', 71, 50000.00, 'cho_xac_nhan', '620948', 1, 'Ut vero quidem recusandae accusantium eligendi veniam.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(10, 'DB20251106-010', 'Đặng Sơn Thiện', '0916389942', 9, 4, NULL, NULL, '2025-11-07 15:27:09', 123, 50000.00, 'da_xac_nhan', '105145', 1, 'Eos repellat optio dolores quae autem.', '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(11, 'DB20251106-011', 'Bác. Khúc Sáng', '0955803954', 4, 1, 2, NULL, '2025-11-08 09:30:25', 88, 0.00, 'da_xac_nhan', '985765', 1, 'Voluptate omnis alias molestiae aperiam dolores corporis sint.', '2025-11-02 07:27:24', '2025-11-06 07:27:24'),
(12, 'DB20251106-012', 'Ông. Ca Khang Lộ', '0972168395', 2, 10, 3, NULL, '2025-11-12 04:11:10', 166, 100000.00, 'khach_da_den', '589005', 1, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(13, 'DB20251106-013', 'Bà. Danh Hoàn', '0906488739', 9, 15, 4, NULL, '2025-11-12 01:46:45', 177, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(14, 'DB20251106-014', 'Võ Nguyên', '0987184169', 8, 13, 4, NULL, '2025-11-13 05:29:27', 106, 50000.00, 'da_xac_nhan', '741329', 1, NULL, '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(15, 'DB20251106-015', 'Phan Huyền An', '0993806049', 5, 3, 1, NULL, '2025-11-11 21:56:02', 114, 50000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(16, 'DB20251106-016', 'Phạm Kiệt', '0993494704', 10, 13, NULL, NULL, '2025-11-13 11:23:58', 60, 50000.00, 'cho_xac_nhan', NULL, 0, 'Sit quisquam et magni laudantium.', '2025-10-30 07:27:24', '2025-11-06 07:27:24'),
(17, 'DB20251106-017', 'Em. Nhậm Hoàng Đức', '0983997325', 7, 8, 5, NULL, '2025-11-12 14:39:50', 74, 200000.00, 'huy', NULL, 0, 'Repellat ipsa in culpa qui repellendus et qui.', '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(18, 'DB20251106-018', 'Chị. Ninh Quế Phượng', '0952878333', 8, 14, 1, NULL, '2025-11-13 12:06:50', 61, 50000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(19, 'DB20251106-019', 'Em. Trác Huynh', '0975591094', 7, 11, NULL, NULL, '2025-11-11 22:20:10', 119, 50000.00, 'huy', '351382', 1, 'Animi natus consectetur maiores mollitia minus sed pariatur molestias.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(20, 'DB20251106-020', 'Đới Yên Cát', '0948552018', 3, 9, NULL, NULL, '2025-11-12 05:58:36', 131, 100000.00, 'hoan_tat', NULL, 0, 'Tempora debitis quis molestiae sit.', '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(21, 'DB20251106-021', 'Chị. Mã Sương Mỹ', '0978416062', 7, 3, NULL, NULL, '2025-11-10 15:24:37', 98, 200000.00, 'cho_xac_nhan', NULL, 0, 'Quae in qui aliquam voluptas libero deserunt.', '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(22, 'DB20251106-022', 'Cụ. Khổng Ái', '0941832081', 2, 10, NULL, NULL, '2025-11-11 23:33:45', 117, 200000.00, 'huy', NULL, 0, NULL, '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(23, 'DB20251106-023', 'Ông. Chung Hữu Phương', '0979166792', 9, 9, NULL, NULL, '2025-11-09 01:13:37', 135, 0.00, 'hoan_tat', '536584', 1, 'Nobis officia nisi esse fugiat quasi qui sint quae.', '2025-10-30 07:27:24', '2025-11-06 07:27:24'),
(24, 'DB20251106-024', 'Bì Chấn Hành', '0976243114', 10, 7, 3, NULL, '2025-11-12 12:58:44', 66, 50000.00, 'khach_da_den', NULL, 0, 'Et ea dolor consequuntur autem.', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(25, 'DB20251106-025', 'Hoa Huấn', '0905065559', 6, 4, 3, NULL, '2025-11-09 02:00:38', 144, 200000.00, 'huy', '723809', 1, 'Quae occaecati dolor et nihil.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(26, 'DB20251106-026', 'Cô. Lê Khúc Quỳnh', '0995580391', 10, 11, NULL, NULL, '2025-11-08 09:35:39', 131, 100000.00, 'hoan_tat', '118390', 1, 'Ut accusantium quia aut sint laborum accusamus voluptatem.', '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(27, 'DB20251106-027', 'Cụ. Mẫn Khê', '0963299331', 5, 14, NULL, NULL, '2025-11-12 11:26:25', 93, 200000.00, 'huy', '347804', 1, NULL, '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(28, 'DB20251106-028', 'Chị. Hán Nga', '0958003926', 4, 10, 3, NULL, '2025-11-10 19:37:05', 100, 100000.00, 'da_xac_nhan', NULL, 0, 'Qui similique animi accusamus.', '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(29, 'DB20251106-029', 'Chiêm Giang Ngọc', '0904172635', 3, 1, 1, NULL, '2025-11-12 07:16:32', 153, 200000.00, 'cho_xac_nhan', '310474', 1, NULL, '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(30, 'DB20251106-030', 'Hy Hiền Cần', '0988497206', 10, 13, NULL, NULL, '2025-11-08 14:27:09', 137, 0.00, 'khach_da_den', '569826', 1, 'Ullam ut alias ad.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(31, 'DB20251106-031', 'Bác. Mạc Miên', '0949818133', 3, 2, NULL, NULL, '2025-11-10 10:14:54', 97, 0.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(32, 'DB20251106-032', 'Ong Khiếu', '0915024936', 5, 7, NULL, NULL, '2025-11-08 14:39:30', 110, 200000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(33, 'DB20251106-033', 'Từ Khánh', '0953470773', 3, 12, NULL, NULL, '2025-11-08 19:08:48', 104, 100000.00, 'huy', '618796', 1, 'Consectetur doloribus esse ea dignissimos earum illo dolore.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(34, 'DB20251106-034', 'Bà. Trà Ánh Quân', '0910840086', 5, 9, 5, NULL, '2025-11-09 00:47:37', 109, 100000.00, 'hoan_tat', '588098', 1, NULL, '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(35, 'DB20251106-035', 'Chú. Lã Hoàng Trọng', '0998192730', 7, 11, 2, NULL, '2025-11-10 20:42:32', 133, 0.00, 'hoan_tat', NULL, 0, 'Non nulla nemo laboriosam et vel et earum voluptas.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(36, 'DB20251106-036', 'Chu Mai', '0949308280', 10, 15, NULL, NULL, '2025-11-11 13:47:35', 77, 0.00, 'cho_xac_nhan', '943886', 1, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(37, 'DB20251106-037', 'Chế Diễm', '0956733117', 6, 15, NULL, NULL, '2025-11-12 18:21:43', 92, 100000.00, 'hoan_tat', NULL, 0, 'Nihil qui ipsum voluptatem qui quas qui.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(38, 'DB20251106-038', 'Em. Ninh Hán Trình', '0915325451', 8, 10, NULL, NULL, '2025-11-11 03:50:56', 137, 50000.00, 'hoan_tat', '028498', 1, 'Itaque commodi voluptas labore quo unde occaecati non.', '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(39, 'DB20251106-039', 'Cụ. Cù Ca', '0902169893', 2, 5, NULL, NULL, '2025-11-13 01:19:14', 84, 100000.00, 'hoan_tat', '220935', 1, NULL, '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(40, 'DB20251106-040', 'Đào Ngọc', '0977013390', 5, 8, 3, NULL, '2025-11-10 17:46:29', 103, 0.00, 'hoan_tat', '584047', 1, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(41, 'DB20251106-041', 'Lã Chí Lộ', '0939618888', 5, 6, NULL, NULL, '2025-11-12 04:49:32', 154, 100000.00, 'cho_xac_nhan', '551339', 1, NULL, '2025-11-02 07:27:24', '2025-11-06 07:27:24'),
(42, 'DB20251106-042', 'Lã Thể', '0941816342', 6, 15, 3, NULL, '2025-11-09 07:59:03', 166, 0.00, 'hoan_tat', '307704', 1, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(43, 'DB20251106-043', 'Thái Dũng', '0971929360', 6, 11, NULL, NULL, '2025-11-12 18:51:34', 94, 100000.00, 'hoan_tat', '923279', 1, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(44, 'DB20251106-044', 'Tạ Chánh Thuận', '0997434916', 5, 13, 2, NULL, '2025-11-11 01:20:09', 106, 0.00, 'khach_da_den', NULL, 0, NULL, '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(45, 'DB20251106-045', 'Lã Bảo Đoàn', '0972538955', 10, 1, NULL, NULL, '2025-11-07 23:18:43', 169, 0.00, 'hoan_tat', NULL, 0, 'Explicabo officia eos rem.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(46, 'DB20251106-046', 'Cung Tuyền', '0916930482', 2, 9, NULL, NULL, '2025-11-11 22:11:22', 130, 50000.00, 'hoan_tat', NULL, 0, 'Sint qui qui voluptas voluptatem omnis.', '2025-11-02 07:27:24', '2025-11-06 07:27:24'),
(47, 'DB20251106-047', 'Em. Lý Liên Quế', '0920868745', 2, 12, NULL, NULL, '2025-11-12 10:10:21', 124, 100000.00, 'cho_xac_nhan', '699641', 1, NULL, '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(48, 'DB20251106-048', 'Ông. Sơn Cần', '0981569452', 3, 15, 3, NULL, '2025-11-09 03:26:52', 78, 0.00, 'huy', NULL, 0, 'Quisquam reiciendis voluptates ut perferendis et dolorem.', '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(49, 'DB20251106-049', 'Bác. Lỡ Trúc', '0996279636', 2, 3, NULL, NULL, '2025-11-11 02:15:28', 174, 100000.00, 'cho_xac_nhan', '551608', 1, NULL, '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(50, 'DB20251106-050', 'Em. Đậu Tuyết', '0915200277', 8, 15, 4, NULL, '2025-11-08 15:53:44', 144, 50000.00, 'khach_da_den', NULL, 0, 'In voluptates inventore porro impedit laboriosam.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(51, 'DB20251106-051', 'Anh. An Kiếm', '0997684759', 4, 11, 1, NULL, '2025-11-13 06:20:58', 174, 50000.00, 'huy', NULL, 0, 'Soluta eveniet necessitatibus non eum modi.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(52, 'DB20251106-052', 'Chú. Ca Nghĩa', '0986563197', 9, 14, 1, NULL, '2025-11-12 07:04:11', 69, 0.00, 'khach_da_den', NULL, 0, 'Rerum voluptas debitis deserunt sunt et.', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(53, 'DB20251106-053', 'Bà. Hàn Hảo', '0982337190', 8, 9, 1, NULL, '2025-11-09 12:55:13', 132, 100000.00, 'hoan_tat', NULL, 0, NULL, '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(54, 'DB20251106-054', 'Chú. Hồ Dinh', '0906549243', 2, 15, 1, NULL, '2025-11-11 04:01:51', 65, 200000.00, 'cho_xac_nhan', NULL, 0, 'Incidunt dolorum alias et quia non.', '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(55, 'DB20251106-055', 'Cụ. Mạc Khuyên', '0906085727', 2, 11, NULL, NULL, '2025-11-11 15:25:04', 80, 200000.00, 'khach_da_den', NULL, 0, 'Molestias soluta velit distinctio earum asperiores blanditiis quis rem.', '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(56, 'DB20251106-056', 'Cụ. Lã Nhan Ái', '0956161190', 10, 5, 4, NULL, '2025-11-08 04:31:36', 111, 50000.00, 'cho_xac_nhan', '687825', 1, 'Enim temporibus culpa aut omnis ut.', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(57, 'DB20251106-057', 'Tạ Nhi', '0950884655', 5, 13, NULL, NULL, '2025-11-09 21:07:20', 76, 200000.00, 'da_xac_nhan', '306926', 1, NULL, '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(58, 'DB20251106-058', 'Châu Nhật Tú', '0973153402', 8, 10, 1, NULL, '2025-11-08 14:22:32', 68, 100000.00, 'khach_da_den', NULL, 0, 'Nihil laborum corrupti laborum sit officia sunt.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(59, 'DB20251106-059', 'Nhữ Triều An', '0970243646', 10, 1, NULL, NULL, '2025-11-08 07:08:54', 141, 50000.00, 'hoan_tat', NULL, 0, NULL, '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(60, 'DB20251106-060', 'Chú. Nguyễn Trực', '0968071251', 9, 1, NULL, NULL, '2025-11-13 12:39:24', 166, 200000.00, 'cho_xac_nhan', '560199', 1, 'Fugiat totam odio repellendus provident.', '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(61, 'DB20251106-061', 'Võ Quỳnh Hân', '0996734151', 6, 10, 2, NULL, '2025-11-08 09:43:29', 109, 200000.00, 'hoan_tat', NULL, 0, 'Ex aut ad error maxime aut a aspernatur.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(62, 'DB20251106-062', 'Cụ. Ca Thúy Tuyến', '0955532543', 5, 3, NULL, NULL, '2025-11-12 01:47:39', 137, 200000.00, 'huy', '828320', 1, 'Aut temporibus autem perferendis.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(63, 'DB20251106-063', 'Ông. Tăng Giác', '0935059976', 9, 15, 2, NULL, '2025-11-10 10:28:45', 139, 50000.00, 'khach_da_den', '452520', 1, 'Quis corrupti amet praesentium assumenda similique deserunt non.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(64, 'DB20251106-064', 'Anh. Trác Song Giác', '0997609463', 9, 8, 1, NULL, '2025-11-08 17:01:38', 95, 50000.00, 'cho_xac_nhan', NULL, 0, 'Velit voluptatem adipisci et temporibus sunt blanditiis.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(65, 'DB20251106-065', 'Bàng Chi', '0918158242', 8, 14, 4, NULL, '2025-11-13 08:49:32', 97, 50000.00, 'cho_xac_nhan', '166723', 1, 'Quia nesciunt placeat reprehenderit dolor nam magnam nulla.', '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(66, 'DB20251106-066', 'Khuất An', '0977993063', 3, 12, 4, NULL, '2025-11-12 04:12:18', 174, 0.00, 'khach_da_den', '137419', 1, 'Voluptas a cumque nostrum nam nulla maxime tempora.', '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(67, 'DB20251106-067', 'Kim Lệ', '0992114709', 3, 13, 3, NULL, '2025-11-09 07:56:05', 157, 50000.00, 'huy', '369695', 1, NULL, '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(68, 'DB20251106-068', 'Kim Tùng', '0901462304', 2, 4, 3, NULL, '2025-11-11 04:03:30', 136, 0.00, 'da_xac_nhan', NULL, 0, 'Voluptatem dolorum cum blanditiis iste cumque.', '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(69, 'DB20251106-069', 'Bì Trâm Thùy', '0950384605', 8, 2, NULL, NULL, '2025-11-07 19:01:43', 173, 200000.00, 'huy', NULL, 0, 'Est doloribus rem ea praesentium veritatis ipsum exercitationem.', '2025-10-28 07:27:24', '2025-11-06 07:27:24'),
(70, 'DB20251106-070', 'Kha Nhật Tuấn', '0977313856', 5, 4, 5, NULL, '2025-11-11 14:28:37', 71, 200000.00, 'cho_xac_nhan', '255604', 1, 'Praesentium non error vel rerum voluptates.', '2025-11-01 07:27:24', '2025-11-06 07:27:24'),
(71, 'DB20251106-071', 'Tiêu Việt', '0900572864', 6, 8, 2, NULL, '2025-11-09 16:20:20', 168, 50000.00, 'da_xac_nhan', '096392', 1, 'Sunt cupiditate quod et modi.', '2025-10-29 07:27:24', '2025-11-06 07:27:24'),
(72, 'DB20251106-072', 'Đỗ Cẩn', '0981082834', 5, 12, NULL, NULL, '2025-11-10 16:20:56', 142, 100000.00, 'cho_xac_nhan', NULL, 0, NULL, '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(73, 'DB20251106-073', 'Em. Bì Nữ', '0993349137', 6, 11, 4, NULL, '2025-11-10 09:32:09', 65, 200000.00, 'da_xac_nhan', NULL, 0, NULL, '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(74, 'DB20251106-074', 'Võ Hạc Hợp', '0932292480', 7, 11, 3, NULL, '2025-11-12 07:32:12', 121, 100000.00, 'huy', '945657', 1, NULL, '2025-10-31 07:27:24', '2025-11-06 07:27:24'),
(75, 'DB20251106-075', 'Lã Tuyết', '0993046636', 3, 1, NULL, NULL, '2025-11-11 14:29:54', 143, 100000.00, 'da_xac_nhan', '134361', 1, NULL, '2025-11-04 07:27:24', '2025-11-06 07:27:24'),
(76, 'DB20251106-076', 'Bác. Chiêm Hiệp Triều', '0999087191', 8, 15, NULL, NULL, '2025-11-13 00:07:53', 121, 100000.00, 'cho_xac_nhan', NULL, 0, 'Eligendi et possimus eius ea culpa.', '2025-11-03 07:27:24', '2025-11-06 07:27:24'),
(77, 'DB20251106-077', 'Đái An', '0951258253', 8, 3, 2, NULL, '2025-11-10 20:01:03', 160, 0.00, 'khach_da_den', NULL, 0, 'Deserunt repudiandae animi eos.', '2025-10-27 07:27:24', '2025-11-06 07:27:24'),
(78, 'DB20251106-078', 'Chị. Cấn Huyền', '0942059370', 9, 7, 2, NULL, '2025-11-11 03:26:14', 75, 100000.00, 'cho_xac_nhan', '682657', 1, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(79, 'DB20251106-079', 'Em. Hồng Cam Trầm', '0947651752', 2, 11, 3, NULL, '2025-11-09 00:36:04', 169, 100000.00, 'da_xac_nhan', NULL, 0, 'Aspernatur ab aut aspernatur cum rerum.', '2025-11-05 07:27:24', '2025-11-06 07:27:24'),
(80, 'DB20251106-080', 'Chị. Triệu Cát Trà', '0933774247', 5, 6, 2, NULL, '2025-11-13 01:57:32', 72, 50000.00, 'cho_xac_nhan', NULL, 0, 'Quo in animi aut repellendus inventore voluptas eos.', '2025-11-01 07:27:24', '2025-11-06 07:27:24');

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

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `dat_ban_id`, `tong_tien`, `tien_giam`, `phu_thu`, `da_thanh_toan`, `phuong_thuc_tt`, `created_at`, `updated_at`) VALUES
(1, 2, 4425511.23, 580747.86, 30000.00, 3874763.37, 'Chuyển khoản ngân hàng', '2025-10-31 07:27:24', '2025-10-31 08:50:24'),
(2, 12, 4633443.63, 216021.98, 50000.00, 4467421.65, 'Tiền mặt', '2025-11-03 07:27:24', '2025-11-03 07:59:24'),
(3, 13, 1273865.96, 71254.75, 30000.00, 1232611.21, 'Ví điện tử Momo', '2025-11-06 07:27:24', '2025-11-06 08:54:24'),
(4, 20, 4804439.76, 510867.41, 30000.00, 4323572.35, 'Chuyển khoản ngân hàng', '2025-10-27 07:27:24', '2025-10-27 09:26:24'),
(5, 23, 3753457.18, 463190.09, 50000.00, 3340267.09, 'Chuyển khoản ngân hàng', '2025-10-30 07:27:24', '2025-10-30 08:25:24'),
(6, 24, 1023955.68, 117409.18, 30000.00, 936546.50, 'Ví điện tử Momo', '2025-11-06 07:27:24', '2025-11-06 07:40:24'),
(7, 26, 4477095.17, 6938.14, 10000.00, 4480157.03, 'Ví điện tử Momo', '2025-11-05 07:27:24', '2025-11-05 08:54:24'),
(8, 30, 3185302.83, 382472.96, 50000.00, 2852829.87, 'Chuyển khoản ngân hàng', '2025-11-03 07:27:24', '2025-11-03 07:45:24'),
(9, 32, 4907217.17, 140330.73, 30000.00, 4796886.44, 'Thẻ Visa/Mastercard', '2025-11-01 07:27:24', '2025-11-01 08:58:24'),
(10, 34, 4780832.15, 152179.92, 30000.00, 4658652.23, 'Tiền mặt', '2025-10-28 07:27:24', '2025-10-28 08:00:24'),
(11, 35, 4400625.58, 294312.27, 0.00, 4106313.31, 'Chuyển khoản ngân hàng', '2025-11-01 07:27:24', '2025-11-01 09:05:24'),
(12, 37, 4410448.12, 3733.00, 10000.00, 4416715.12, 'Chuyển khoản ngân hàng', '2025-11-03 07:27:24', '2025-11-03 08:26:24'),
(13, 38, 2182413.14, 41761.63, 30000.00, 2170651.51, 'Ví điện tử Momo', '2025-11-05 07:27:24', '2025-11-05 08:23:24'),
(14, 39, 2093803.82, 209069.64, 50000.00, 1934734.18, 'Ví điện tử Momo', '2025-11-04 07:27:24', '2025-11-04 08:34:24'),
(15, 40, 3449845.88, 431321.43, 0.00, 3018524.45, 'Tiền mặt', '2025-11-03 07:27:24', '2025-11-03 07:36:24'),
(16, 42, 896086.36, 54551.50, 10000.00, 851534.86, 'Chuyển khoản ngân hàng', '2025-11-03 07:27:24', '2025-11-03 08:35:24'),
(17, 43, 1423875.00, 3906.09, 50000.00, 1469968.91, 'Thẻ Visa/Mastercard', '2025-11-03 07:27:24', '2025-11-03 07:36:24'),
(18, 44, 3170254.47, 440350.50, 50000.00, 2779903.97, 'Thẻ Visa/Mastercard', '2025-11-05 07:27:24', '2025-11-05 07:32:24'),
(19, 45, 1081420.72, 2945.85, 10000.00, 1088474.87, 'Thẻ Visa/Mastercard', '2025-11-01 07:27:24', '2025-11-01 09:18:24'),
(20, 46, 680731.69, 18834.91, 50000.00, 711896.78, 'Tiền mặt', '2025-11-02 07:27:24', '2025-11-02 09:16:24');

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
(1, 'Khu vực P', 'Sint nobis sed non aut assumenda id corporis.', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 'Khu vực W', 'Aspernatur sit ullam quia fugit quidem natus.', 1, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(3, 'Khu vực P', 'Vitae animi illo repellendus est voluptates eius et.', 3, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 'Khu vực K', 'Veniam delectus aspernatur dolor sequi sapiente sit minima.', 2, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 'Khu vực Y', 'Ut placeat incidunt suscipit illum at.', 2, '2025-11-06 07:27:24', '2025-11-06 07:27:24');

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
(13, '2025_10_24_213503_create_cache_table', 1),
(14, '2025_11_06_045259_create_thu_vien_anh_mon_an_table', 1);

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
(1, 4, 'Gỏi cuốn tôm thịt', 252959.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_cuốn_tôm_thịt.jpg', 'con', 12, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 2, 'Chả giò rế', 94598.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_giò_rế.jpg', 'con', 21, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(3, 1, 'Nem chua rán', 233200.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nem_chua_rán.jpg', 'het', 21, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 2, 'Gỏi bò bóp thấu', 266971.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_bò_bóp_thấu.jpg', 'an', 5, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 1, 'Súp hải sản', 160030.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/súp_hải_sản.jpg', 'con', 13, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(6, 3, 'Súp bí đỏ kem tươi', 186965.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/súp_bí_đỏ_kem_tươi.jpg', 'an', 22, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(7, 5, 'Salad cá ngừ', 214369.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/salad_cá_ngừ.jpg', 'con', 5, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(8, 1, 'Gỏi ngó sen tôm thịt', 236173.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gỏi_ngó_sen_tôm_thịt.jpg', 'an', 27, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(9, 3, 'Chả cá chiên giòn', 181356.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chả_cá_chiên_giòn.jpg', 'con', 10, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(10, 1, 'Khoai tây chiên bơ tỏi', 59670.00, 'Món khai vị hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/khoai_tây_chiên_bơ_tỏi.jpg', 'het', 20, 'Khai vị', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(11, 4, 'Cơm chiên dương châu', 31914.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_chiên_dương_châu.jpg', 'an', 17, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(12, 5, 'Bò lúc lắc khoai tây', 240322.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_lúc_lắc_khoai_tây.jpg', 'het', 23, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(13, 1, 'Cá kho tộ', 236079.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_kho_tộ.jpg', 'con', 15, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(14, 4, 'Sườn non rim mặn ngọt', 240658.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sườn_non_rim_mặn_ngọt.jpg', 'con', 22, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(15, 3, 'Gà hấp hành', 170008.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_hấp_hành.jpg', 'an', 20, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(16, 4, 'Lẩu thái hải sản', 290348.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_thái_hải_sản.jpg', 'an', 5, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(17, 3, 'Lẩu bò sa tế', 255239.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/lẩu_bò_sa_tế.jpg', 'an', 9, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(18, 1, 'Cá chẽm hấp xì dầu', 47525.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_chẽm_hấp_xì_dầu.jpg', 'het', 20, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(19, 3, 'Thịt ba chỉ quay giòn bì', 267049.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/thịt_ba_chỉ_quay_giòn_bì.jpg', 'con', 17, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(20, 2, 'Tôm sú nướng muối ớt', 173669.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/tôm_sú_nướng_muối_ớt.jpg', 'con', 8, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(21, 4, 'Vịt quay Bắc Kinh', 280231.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/vịt_quay_bắc_kinh.jpg', 'con', 25, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(22, 2, 'Gà nướng mật ong', 72775.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/gà_nướng_mật_ong.jpg', 'con', 22, 'Món chính', '2025-11-06 07:27:24', '2025-11-11 01:14:01'),
(23, 3, 'Bún chả Hà Nội', 191790.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bún_chả_hà_nội.jpg', 'con', 24, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(24, 1, 'Phở bò tái nạm', 238648.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/phở_bò_tái_nạm.jpg', 'het', 25, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(25, 3, 'Mì xào hải sản', 218428.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/mì_xào_hải_sản.jpg', 'an', 7, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(26, 5, 'Hủ tiếu Nam Vang', 148670.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/hủ_tiếu_nam_vang.jpg', 'an', 19, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(27, 2, 'Bò kho bánh mì', 254896.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bò_kho_bánh_mì.jpg', 'an', 25, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(28, 3, 'Cơm tấm sườn bì chả trứng', 175098.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cơm_tấm_sườn_bì_chả_trứng.jpg', 'het', 7, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(29, 2, 'Canh chua cá lóc', 254273.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/canh_chua_cá_lóc.jpg', 'an', 29, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(30, 4, 'Cá hồi áp chảo sốt bơ chanh', 148903.00, 'Món món chính hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cá_hồi_áp_chảo_sốt_bơ_chanh.jpg', 'het', 19, 'Món chính', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(31, 3, 'Chè khúc bạch', 46616.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_khúc_bạch.jpg', 'het', 23, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(32, 4, 'Chè ba màu', 193719.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/chè_ba_màu.jpg', 'con', 18, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(33, 2, 'Rau câu dừa', 260668.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/rau_câu_dừa.jpg', 'an', 29, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(34, 3, 'Bánh flan', 238214.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_flan.jpg', 'an', 9, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(35, 5, 'Bánh chuối nướng', 164837.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_chuối_nướng.jpg', 'an', 12, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(36, 4, 'Bánh da lợn', 61979.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_da_lợn.jpg', 'con', 26, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(37, 2, 'Bánh bò hấp', 33282.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/bánh_bò_hấp.jpg', 'con', 7, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(38, 4, 'Sương sáo sữa tươi', 256843.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sương_sáo_sữa_tươi.jpg', 'an', 18, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(39, 4, 'Kem dừa', 150956.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/kem_dừa.jpg', 'het', 6, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(40, 5, 'Trái cây thập cẩm', 154468.00, 'Món tráng miệng hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trái_cây_thập_cẩm.jpg', 'con', 30, 'Tráng miệng', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(41, 4, 'Trà đào cam sả', 130383.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_đào_cam_sả.jpg', 'con', 5, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(42, 3, 'Sinh tố bơ', 242500.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/sinh_tố_bơ.jpg', 'het', 6, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(43, 5, 'Nước ép cam', 210962.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_cam.jpg', 'het', 30, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(44, 2, 'Nước ép dưa hấu', 250114.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_ép_dưa_hấu.jpg', 'an', 26, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(45, 1, 'Cà phê sữa đá', 183090.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_sữa_đá.jpg', 'het', 22, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(46, 3, 'Cà phê đen nóng', 109685.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/cà_phê_đen_nóng.jpg', 'an', 8, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(47, 3, 'Trà sữa trân châu đường đen', 218635.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/trà_sữa_trân_châu_đường_đen.jpg', 'het', 29, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(48, 5, 'Nước chanh tươi', 235612.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_chanh_tươi.jpg', 'an', 19, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(49, 2, 'Nước mía sầu riêng', 94777.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/nước_mía_sầu_riêng.jpg', 'con', 18, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(50, 1, 'Soda việt quất', 202593.00, 'Món Đồ uống hấp dẫn, được chế biến từ nguyên liệu tươi ngon.', 'mon_an/soda_việt_quất.jpg', 'an', 10, 'Đồ uống', '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(51, 2, '1111', 111.00, '1111', 'uploads/monan/1762513012_A25.ble.jpg', 'con', 111, 'Món chính', '2025-11-07 03:56:52', '2025-11-07 03:56:52');

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
(1, 4, 4, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(2, 3, 21, 1, 25500.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(3, 2, 25, 3, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(4, 3, 27, 1, 14304.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(5, 1, 26, 5, 37825.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(6, 1, 42, 2, 35794.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(7, 2, 17, 10, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(8, 3, 5, 4, 18374.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(9, 2, 6, 4, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(10, 4, 13, 2, 21113.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(11, 4, 13, 3, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(12, 4, 36, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(13, 5, 19, 3, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(14, 3, 34, 10, 19095.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(15, 3, 8, 10, 14054.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(16, 5, 29, 4, 39753.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(17, 5, 23, 1, 43806.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(18, 4, 45, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(19, 2, 46, 3, 35109.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(20, 2, 50, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(21, 5, 24, 4, 49307.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(22, 3, 20, 9, 34817.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(23, 5, 20, 5, 42039.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(24, 2, 33, 4, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(25, 5, 42, 3, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(26, 2, 37, 5, 10621.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(27, 4, 10, 1, 41142.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(28, 1, 23, 1, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(29, 1, 44, 10, 10061.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(30, 3, 12, 6, 15207.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(31, 4, 17, 8, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(32, 4, 46, 8, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(33, 4, 42, 9, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(34, 1, 35, 4, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(35, 4, 15, 7, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(36, 2, 11, 9, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(37, 3, 6, 8, 22512.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(38, 5, 30, 6, 28114.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(39, 1, 44, 6, 22017.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(40, 3, 49, 3, 42019.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(41, 4, 5, 8, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(42, 5, 18, 2, 10777.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(43, 2, 46, 6, 39569.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(44, 2, 16, 2, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(45, 4, 35, 7, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(46, 5, 22, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(47, 3, 49, 5, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(48, 2, 22, 4, 24664.00, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(49, 5, 44, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24'),
(50, 2, 23, 6, NULL, '2025-11-06 07:27:24', '2025-11-06 07:27:24');

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
(1, 'Nguyễn Văn An', '0901002001', 'an.nguyen@example.com', '$2y$12$wpCUwFNPj69JcZTWJMo1.uOh4p2OxNddEp9SxKYXKx15nK93evOa2', 'Quản lý', 1, NULL, NULL),
(2, 'Trần Thị Bình', '0902003002', 'binh.tran@example.com', '$2y$12$MgllIXF9qPZ2tf/yfP6k6O07r1DpTDtezCn..I8lsh896f9BIYOe2', 'Lễ tân', 1, NULL, NULL),
(3, 'Lê Hoàng Nam', '0903004003', 'nam.le@example.com', '$2y$12$vmWH7Sl6S5RReeX8uftfvOCrFko/HR2mNsUssomg1H3wsGcYZza9y', 'Phục vụ', 1, NULL, NULL),
(4, 'Phạm Thị Lan', '0904005004', 'lan.pham@example.com', '$2y$12$lDRSCj4HWNC1sv/VhdAm4emqqUeLUC3jz36V/NTEPk2EuBAri1S5q', 'Thu ngân', 1, NULL, NULL),
(5, 'Anh. Cung Khánh', '0985353727', 'schu@example.net', '$2y$12$WgWfzzhC6CRQViHf0x37Me2AuDeBszZ50df7FaL6dojke3PwI0tRe', 'Phục vụ', 0, NULL, NULL),
(6, 'Điền Yến', '0918711735', 'xong@example.net', '$2y$12$oBF/Ml3WzWQKUytrRFqhUOBNHk7XU390YzZQfAb/aUTwAoJKDK3GW', 'Lễ tân', 1, NULL, NULL),
(7, 'Nhậm Mậu Mỹ', '0901732542', 'lda@example.net', '$2y$12$lfEnzxYo5XLB5djcD39YYedyXyw0VNBylgL7Hik0LBWjIY0R/yl0C', 'Phục vụ', 1, NULL, NULL);

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
(1, 80, 6, 14, 2158665.00, 'dang_xu_li', '2025-11-11 01:01:26', '2025-11-11 02:40:21');

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
('TJQajkL0YxjehO9cFvpoY2ZXGeLoaGbDzzK9ouvw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0l3c2ZQZklFV1cxMFdhQTBKUXVoSUNTTEpmbGVGUWFGazQ3cEZaRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9uaGFuLXZpZW4/a2V5d29yZD0mdHJhbmdfdGhhaT0mdmFpX3Rybz0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1762855197);

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
(1, 50, 'uploads/gallery/monan/1762512979_690dd053e3e02_jpg', '2025-11-07 03:56:19', '2025-11-07 03:56:19'),
(2, 50, 'uploads/gallery/monan/1762512979_690dd053e46d0_jpg', '2025-11-07 03:56:19', '2025-11-07 03:56:19'),
(3, 50, 'uploads/gallery/monan/1762512979_690dd053e4b31_jpg', '2025-11-07 03:56:19', '2025-11-07 03:56:19'),
(4, 50, 'uploads/gallery/monan/1762512979_690dd053e4f6e_jpg', '2025-11-07 03:56:19', '2025-11-07 03:56:19'),
(5, 50, 'uploads/gallery/monan/1762512979_690dd053e53a6_png', '2025-11-07 03:56:19', '2025-11-07 03:56:19'),
(6, 51, 'uploads/gallery/monan/1762513012_690dd074119cb_jpg', '2025-11-07 03:56:52', '2025-11-07 03:56:52'),
(7, 51, 'uploads/gallery/monan/1762513012_690dd074120ea_jpg', '2025-11-07 03:56:52', '2025-11-07 03:56:52'),
(8, 51, 'uploads/gallery/monan/1762513012_690dd0741272a_jpg', '2025-11-07 03:56:52', '2025-11-07 03:56:52'),
(9, 51, 'uploads/gallery/monan/1762513012_690dd07412d6a_jpg', '2025-11-07 03:56:52', '2025-11-07 03:56:52'),
(10, 51, 'uploads/gallery/monan/1762513041_690dd091b05df_png', '2025-11-07 03:57:21', '2025-11-07 03:57:21');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

--
-- Constraints for table `thu_vien_anh_mon_an`
--
ALTER TABLE `thu_vien_anh_mon_an`
  ADD CONSTRAINT `thu_vien_anh_mon_an_mon_an_id_foreign` FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
