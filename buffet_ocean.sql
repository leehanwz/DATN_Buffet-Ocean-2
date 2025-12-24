CREATE TABLE `nhan_vien` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ho_ten` varchar(255),
  `sdt` varchar(255),
  `email` varchar(255),
  `mat_khau` varchar(255),
  `vai_tro` varchar(255),
  `trang_thai` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `khu_vuc` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ten_khu_vuc` varchar(255),
  `mo_ta` varchar(255),
  `tang` int,
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `ban_an` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `khu_vuc_id` int,
  `so_ban` varchar(255),
  `ma_qr` varchar(255),
  `duong_dan_qr` varchar(255),
  `so_ghe` int,
  `trang_thai` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `danh_muc_mon` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ten_danh_muc` varchar(255),
  `mo_ta` text,
  `hien_thi` bool,
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `mon_an` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `danh_muc_id` int,
  `ten_mon` varchar(255),
  `gia` decimal,
  `mo_ta` text,
  `hinh_anh` varchar(255),
  `trang_thai` varchar(255),
  `thoi_gian_che_bien` int,
  `loai_mon` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `combo_buffet` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ten_combo` varchar(255),
  `loai_combo` varchar(255),
  `gia_co_ban` decimal,
  `thoi_luong_phut` int,
  `thoi_gian_bat_dau` datetime,
  `thoi_gian_ket_thuc` datetime,
  `trang_thai` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `mon_trong_combo` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `combo_id` int,
  `mon_an_id` int,
  `gioi_han_so_luong` int,
  `phu_phi_goi_them` decimal
);

CREATE TABLE `dat_ban` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `ma_dat_ban` varchar(255),
  `ten_khach` varchar(255),
  `sdt_khach` varchar(255),
  `so_khach` int,
  `ban_id` int,
  `combo_id` int,
  `nhan_vien_id` int,
  `gio_den` datetime,
  `thoi_luong_phut` int,
  `tien_coc` decimal,
  `trang_thai` varchar(255),
  `xac_thuc_ma` varchar(255),
  `la_dat_online` bool,
  `ghi_chu` text,
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `order_mon` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `dat_ban_id` bigint,
  `ban_id` int,
  `tong_mon` int,
  `tong_tien` decimal,
  `trang_thai` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `chi_tiet_order` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `order_id` bigint,
  `mon_an_id` int,
  `so_luong` int,
  `loai_mon` varchar(255),
  `trang_thai` varchar(255),
  `ghi_chu` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

CREATE TABLE `hoa_don` (
  `id` bigint PRIMARY KEY AUTO_INCREMENT,
  `dat_ban_id` bigint,
  `tong_tien` decimal,
  `tien_giam` decimal,
  `phu_thu` decimal,
  `da_thanh_toan` decimal,
  `phuong_thuc_tt` varchar(255),
  `ngay_tao` timestamp,
  `ngay_cap_nhat` timestamp
);

ALTER TABLE `ban_an` ADD FOREIGN KEY (`khu_vuc_id`) REFERENCES `khu_vuc` (`id`);

ALTER TABLE `mon_an` ADD FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc_mon` (`id`);

ALTER TABLE `mon_trong_combo` ADD FOREIGN KEY (`combo_id`) REFERENCES `combo_buffet` (`id`);

ALTER TABLE `mon_trong_combo` ADD FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`);

ALTER TABLE `dat_ban` ADD FOREIGN KEY (`ban_id`) REFERENCES `ban_an` (`id`);

ALTER TABLE `dat_ban` ADD FOREIGN KEY (`combo_id`) REFERENCES `combo_buffet` (`id`);

ALTER TABLE `dat_ban` ADD FOREIGN KEY (`nhan_vien_id`) REFERENCES `nhan_vien` (`id`);

ALTER TABLE `order_mon` ADD FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`);

ALTER TABLE `order_mon` ADD FOREIGN KEY (`ban_id`) REFERENCES `ban_an` (`id`);

ALTER TABLE `chi_tiet_order` ADD FOREIGN KEY (`order_id`) REFERENCES `order_mon` (`id`);

ALTER TABLE `chi_tiet_order` ADD FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`);

ALTER TABLE `hoa_don` ADD FOREIGN KEY (`dat_ban_id`) REFERENCES `dat_ban` (`id`);