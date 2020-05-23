-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 01:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoa_mam_non`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_viets`
--

CREATE TABLE `bai_viets` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tieu_de` text NOT NULL,
  `tom_tat` text NOT NULL,
  `hinh_anh_mo_ta` text NOT NULL,
  `noi_dung` text NOT NULL,
  `id_loai_bai_viet` bigint(20) NOT NULL,
  `is_noi_bat` tinyint(4) NOT NULL DEFAULT 0,
  `is_moi` tinyint(4) NOT NULL DEFAULT 0,
  `is_thong_bao` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) NOT NULL,
  `link_url` text NOT NULL,
  `image_url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinh_web`
--

CREATE TABLE `cau_hinh_web` (
  `id` bigint(20) NOT NULL,
  `logo` text NOT NULL,
  `ten_web` text NOT NULL,
  `email` text NOT NULL,
  `so_dien_thoai` text NOT NULL,
  `mo_ta` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gioi_thieu`
--

CREATE TABLE `gioi_thieu` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `noi_dung` text NOT NULL,
  `id_loai_gioi_thieu` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lich_cong_tac`
--

CREATE TABLE `lich_cong_tac` (
  `id` bigint(20) NOT NULL,
  `tuan` text NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `so_dien_thoai` text NOT NULL,
  `email` text NOT NULL,
  `tieu_de_lien_he` text NOT NULL,
  `noi_dung_lien_he` text NOT NULL,
  `lop` varchar(220) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai_bai_viets`
--

CREATE TABLE `loai_bai_viets` (
  `id` bigint(20) NOT NULL,
  `id_danh_muc_bai_viet` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai_gioi_thieu`
--

CREATE TABLE `loai_gioi_thieu` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai_media`
--

CREATE TABLE `loai_media` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai_van_bans`
--

CREATE TABLE `loai_van_bans` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) NOT NULL,
  `id_loai_media` bigint(20) NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'user', '2020-05-23 10:58:28', NULL),
(2, 'admin', '2020-05-23 10:58:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `link` text NOT NULL,
  `url_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id` bigint(20) NOT NULL,
  `name` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `ten_dang_nhap` text NOT NULL,
  `ho_va_ten` text NOT NULL,
  `password` text NOT NULL,
  `chuc_vu` text DEFAULT NULL,
  `email` text NOT NULL,
  `so_dien_thoai` text DEFAULT NULL,
  `id_role` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `mo_ta` int(11) DEFAULT NULL,
  `thong_tin_to` varchar(220) DEFAULT NULL,
  `hoc_phan_giang_day` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten_dang_nhap`, `ho_va_ten`, `password`, `chuc_vu`, `email`, `so_dien_thoai`, `id_role`, `created_at`, `updated_at`, `mo_ta`, `thong_tin_to`, `hoc_phan_giang_day`) VALUES
(1, 'admin', 'admin', '$2y$12$SmaPqX/jFd/sfGtYiYbfQ.0BlTTHwYoHE0OgbDjE8cSVK1q9w4qUK', NULL, 'admin@gmail.com', NULL, 2, '2020-05-23 10:59:24', '2020-05-23 11:00:11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `van_ban_bieu_maus`
--

CREATE TABLE `van_ban_bieu_maus` (
  `id` bigint(20) NOT NULL,
  `ten` text NOT NULL,
  `id_loai_van_ban` bigint(20) NOT NULL,
  `file` text NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `anh_mo_ta` text NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viets`
--
ALTER TABLE `bai_viets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_loai_bai_viet` (`id_loai_bai_viet`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cau_hinh_web`
--
ALTER TABLE `cau_hinh_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lich_cong_tac`
--
ALTER TABLE `lich_cong_tac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_bai_viets`
--
ALTER TABLE `loai_bai_viets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc_bai_viet` (`id_danh_muc_bai_viet`);

--
-- Indexes for table `loai_gioi_thieu`
--
ALTER TABLE `loai_gioi_thieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_media`
--
ALTER TABLE `loai_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_van_bans`
--
ALTER TABLE `loai_van_bans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_media` (`id_loai_media`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `van_ban_bieu_maus`
--
ALTER TABLE `van_ban_bieu_maus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai_van_ban` (`id_loai_van_ban`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viets`
--
ALTER TABLE `bai_viets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cau_hinh_web`
--
ALTER TABLE `cau_hinh_web`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lich_cong_tac`
--
ALTER TABLE `lich_cong_tac`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_bai_viets`
--
ALTER TABLE `loai_bai_viets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_gioi_thieu`
--
ALTER TABLE `loai_gioi_thieu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_media`
--
ALTER TABLE `loai_media`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_van_bans`
--
ALTER TABLE `loai_van_bans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `van_ban_bieu_maus`
--
ALTER TABLE `van_ban_bieu_maus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bai_viets`
--
ALTER TABLE `bai_viets`
  ADD CONSTRAINT `bai_viets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bai_viets_ibfk_2` FOREIGN KEY (`id_loai_bai_viet`) REFERENCES `loai_bai_viets` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_loai_media`) REFERENCES `loai_media` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Constraints for table `van_ban_bieu_maus`
--
ALTER TABLE `van_ban_bieu_maus`
  ADD CONSTRAINT `van_ban_bieu_maus_ibfk_1` FOREIGN KEY (`id_loai_van_ban`) REFERENCES `loai_van_bans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
