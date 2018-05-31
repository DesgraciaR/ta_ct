-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 10:15 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkn`
--
CREATE DATABASE IF NOT EXISTS `bkn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bkn`;

-- --------------------------------------------------------

--
-- Table structure for table `liburnasional`
--

DROP TABLE IF EXISTS `liburnasional`;
CREATE TABLE `liburnasional` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket_libur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liburnasional`
--

INSERT INTO `liburnasional` (`id`, `tanggal`, `ket_libur`) VALUES
(1, '2018-01-01', 'Tahun Baru 2018 Masehi'),
(2, '2018-02-16', 'Tahun Baru Imlek 2569 Kongzili'),
(3, '2018-03-17', 'Hari Raya Nyepi Tahun Baru Saka 1940'),
(4, '2018-03-30', 'Wafat Isa Al Masih'),
(5, '2018-04-14', 'Isra Mikraj Nabi Muhammas SAW'),
(6, '2018-05-01', 'Hari Buruh Internasional'),
(7, '2018-05-10', 'Kenaikan Isa Al Masih'),
(8, '2018-05-29', 'Hari Raya Waisak 2562'),
(9, '2018-06-01', 'Hari Lahir Pancasila'),
(10, '2018-06-15', 'Hari Raya Idul fitri 1439 Hijriah'),
(11, '2018-06-16', 'Hari Raya Idul Fitri 1439 Hijriah'),
(12, '2018-08-17', 'Hari Kemerdekaan Republik Indonesia'),
(13, '2018-08-22', 'Hari Raya Idul Adha 1439 Hijriah'),
(14, '2018-09-11', 'Tahun Baru Islam 1440 Hijriah'),
(15, '2018-11-20', 'Maulid Nabi Muhammad SAW'),
(16, '2018-12-24', 'Hari raya Natal'),
(17, '2018-12-25', 'hari raya Natal'),
(18, '2018-06-13', 'Cuti Bersama Lebaran '),
(19, '2018-06-14', 'cuti Bersama lebaran'),
(20, '2018-06-18', 'cuti Bersama lebaran'),
(21, '2018-06-19', 'cuti bersama Lebaran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jatah_cuti`
--

DROP TABLE IF EXISTS `tbl_jatah_cuti`;
CREATE TABLE `tbl_jatah_cuti` (
  `id_jatah` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_tahun_lalu` int(11) DEFAULT NULL,
  `jumlah_tahun_ini` int(11) NOT NULL,
  `nip_baru` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jatah_cuti`
--

INSERT INTO `tbl_jatah_cuti` (`id_jatah`, `tahun`, `jumlah_tahun_lalu`, `jumlah_tahun_ini`, `nip_baru`) VALUES
(1, 2018, NULL, 12, '195401031982011001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_cuti`
--

DROP TABLE IF EXISTS `tbl_jenis_cuti`;
CREATE TABLE `tbl_jenis_cuti` (
  `id_jenis_cuti` int(11) NOT NULL,
  `jenis_cuti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_cuti`
--

INSERT INTO `tbl_jenis_cuti` (`id_jenis_cuti`, `jenis_cuti`) VALUES
(1, 'Cuti Tahunan'),
(2, 'Cuti Besar'),
(3, 'Cuti Sakit'),
(4, 'Cuti Melahirkan'),
(5, 'Cuti Karena Alasan Penting'),
(6, 'Cuti Di Luar Tanggungan Negara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_cuti`
--

DROP TABLE IF EXISTS `tbl_permohonan_cuti`;
CREATE TABLE `tbl_permohonan_cuti` (
  `id_permohonan_cuti` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jumlah_cuti` int(11) DEFAULT NULL,
  `alamat_cuti` varchar(255) NOT NULL,
  `alasan_cuti` varchar(255) DEFAULT NULL,
  `noTelepon` varchar(18) DEFAULT NULL,
  `bukti_cuti` varchar(255) DEFAULT NULL,
  `id_jenis_cuti` int(11) NOT NULL,
  `nip_baru` varchar(18) NOT NULL,
  `id_atasan` varchar(18) NOT NULL,
  `alasan_acc_atasan` longtext,
  `alasan_acc_ppk` longtext,
  `tgl_mulai_ubah` date DEFAULT NULL,
  `tgl_selesai_ubah` date DEFAULT NULL,
  `status` enum('Diterima','Ditolak','Ditangguhkan','') DEFAULT NULL,
  `tgl_diusulkan_ppk` date DEFAULT NULL,
  `tgl_status_ppk` date DEFAULT NULL,
  `status_ppk` enum('Diterima','Ditolak','Ditangguhkan','') DEFAULT NULL,
  `status_baca` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permohonan_cuti`
--

INSERT INTO `tbl_permohonan_cuti` (`id_permohonan_cuti`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `jumlah_cuti`, `alamat_cuti`, `alasan_cuti`, `noTelepon`, `bukti_cuti`, `id_jenis_cuti`, `nip_baru`, `id_atasan`, `alasan_acc_atasan`, `alasan_acc_ppk`, `tgl_mulai_ubah`, `tgl_selesai_ubah`, `status`, `tgl_diusulkan_ppk`, `tgl_status_ppk`, `status_ppk`, `status_baca`, `created_at`, `updated_at`) VALUES
(64, '2018-01-05', '2018-02-05', '2018-08-05', 119, 'sdfghjkl', 'sdfghjk', '234567', 'foto_bukti/1527748572.png', 2, '195803101980031001', '196604221993031001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-05-30 23:36:12', '2018-05-30 23:36:12'),
(65, '2018-05-14', '2018-05-23', '2018-05-24', 23, 'sdfghjkl', 'kjhgfd', '0987654', 'foto_bukti/1527753926.png', 1, '195803101980031001', '196604221993031001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-05-31 01:05:26', '2018-05-31 01:05:26'),
(66, '2018-05-22', '2018-05-29', '2018-05-31', 2, 'fghj', 'fghj', '0987654', 'foto_bukti/1527754123.png', 1, '195803101980031001', '196604221993031001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-05-31 01:08:43', '2018-05-31 01:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `nip_baru` varchar(18) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('1','2','4') DEFAULT NULL,
  `ppk` enum('1','','','') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nip_baru`, `nama`, `password`, `level`, `ppk`, `created_at`, `updated_at`, `remember_token`) VALUES
('195401031982011001', 'EDY SUJITNO', '$2y$10$CIZCXd/zCXL6Xd1FJrt.H.xzuySf5vkW4r6MSNxTDYRdaZgB5e5eS', '1', NULL, '2018-05-11 09:41:40', '2018-05-25 02:15:40', NULL),
('195501061981101001', 'EKO SUTRISNO', '$2y$10$KWXYSXy1.q7x3QKshBzEQOvp0W8lgkqF.JYrNHY8B0l6SOhTsG.S2', '1', NULL, '2018-05-15 04:56:24', '2018-05-15 04:56:24', NULL),
('195803101980031001', 'TRI MULYO HUSODO', '$2y$10$aSPRiR/PFGaP3fOlqqlaKuPtgsE1PStdQxmUQMcslbVqejrfD2bHi', '4', NULL, '2018-05-17 21:16:22', '2018-05-17 21:16:22', NULL),
('195811271979011002', 'SUWARSO SUHARMANTO', '$2y$10$hrNCBxk8RXMfcjsAapk9ROFjWfWoWJ357gqNkA62hlwdyOidqQx9K', '2', NULL, '2018-05-11 10:18:08', '2018-05-11 10:18:08', NULL),
('196011121982011001', 'PURWANTO', '$2y$10$j4ZXVmUg3BxER8Ecr4IOTuNCE9y2iblQYZMjhbUAqO89eRBgl2.Pa', '1', NULL, '2018-05-11 09:41:05', '2018-05-11 09:41:05', NULL),
('196205171983072001', 'RAHAYU ISNANINGSIH', '$2y$10$KokV6VrCbzzkPpECJiE64.Tr9YCzeFmpUHQu671NIFgGDH.LCQN4K', '2', NULL, '2018-05-11 10:18:25', '2018-05-11 10:18:25', NULL),
('196212221985031001', 'HARYANTO', '$2y$10$DMuYeIxMVLrRw0zXYnbD8eRZkicXQcK9OOmckx755kSbfE.ngqv2q', '4', NULL, '2018-05-11 10:21:33', '2018-05-11 10:21:33', NULL),
('196303311985092001', 'DAISY LISTIDIAH', '$2y$10$3bkJAEROnyJ9aa4VQyYOj.81shmdlbfmuOhKqMq8LGijJk1nhYrf2', '4', NULL, '2018-05-11 14:06:07', '2018-05-11 14:06:07', NULL),
('196305121985032001', 'RADEN RARA DYAH PRAMESTI', '$2y$10$9ebTS8gVVfh05hUjupQlKeQ2edFcqF0Ymmx.ktGxzHmYrsBYWZ8HO', '4', NULL, '2018-05-11 10:20:34', '2018-05-11 10:20:34', NULL),
('196403071985031001', 'RADEN SUMARTOTO', '$2y$10$rjRB1049V0BiiOA0hWI6Jezj8ZtVRYy3ke5y9MQCQeZu0mZ10QY8q', '2', NULL, '2018-05-10 08:54:38', '2018-05-10 08:54:38', NULL),
('196406051987111001', 'DJUNI HERYONO', '$2y$10$gq7FvMyo0GzS5gTiDP03Ge1hA2wRG99ouERPJwffx.p11SOOWR9tK', '2', NULL, '2018-05-11 10:19:05', '2018-05-11 10:19:05', NULL),
('196410031987122001', 'NURCHASANAH', '$2y$10$WERzx9K6Ts.iwzRBN29tweDGYoUd0pz0xCkATTxQXbGU.cJPMyqG2', '1', NULL, '2018-05-11 09:36:13', '2018-05-11 09:36:13', NULL),
('196506271985031001', 'SUPRIYANTO', '$2y$10$Pi3n03wAnZujqOqe/ilF5uFPlaQ7zXcKaxjfhqiOZsI0BwKZMZIea', '4', NULL, '2018-05-11 10:21:53', '2018-05-11 10:21:53', NULL),
('196508251987112001', 'SRI MAWARNI', '$2y$10$I/YMsiAqNuTh4mdZc6v52uiG70T0U4qNnfUpenscqGy.0VDCH2mXG', '4', NULL, '2018-05-11 11:08:48', '2018-05-11 11:08:48', NULL),
('196511131987111001', 'ANDREAS ISMONO', '$2y$10$hY6v1f8vAxbvfkBFO8/HieTzupgnu31chWGV3aSHzMkv.95zvwLjG', '1', '1', '2018-05-21 00:00:36', '2018-05-21 00:00:36', NULL),
('196604221993031001', 'SLAMET WIYONO', '$2y$10$iRvdM.bjwhLJrHikONjHUOCH.h0riGr7tVm/cK3xjraRPlA4FcVeK', '1', NULL, '2018-05-11 09:48:18', '2018-05-11 09:48:18', NULL),
('196704121993031001', 'ISWAHYUDI SURYANTO', '$2y$10$ME5Ge4fCEHQm2n.sGX/V6eSjF06PPgiJlV7jztIU1Xp6spaxKVEFy', '1', NULL, '2018-05-11 10:04:51', '2018-05-11 10:04:51', NULL),
('196902051987112001', 'SRI MURTININGSIH', '$2y$10$xXwfG51t.9OYueTl9yul1e3xgeq/tYRTVQANymLQRdtV1YmB9Yko6', '1', NULL, '2018-05-10 23:16:35', '2018-05-10 23:16:35', NULL),
('196904291991031001', 'PURJIYANTA', '$2y$10$HpHLex9o.5kQmglKNWp0KeAICE5LJXxsBJt372tP1XNb3sBdeW2Yy', '1', NULL, '2018-05-13 10:31:11', '2018-05-13 10:31:11', NULL),
('197302171999021001', 'GUNAWAN', '$2y$10$3smAm82QbzkMUto4/xQSWOLAKL8TIzf55lwEmYlG.lYrefmWzVV5m', '4', NULL, '2018-05-11 10:19:34', '2018-05-11 10:19:34', NULL),
('197403231999021001', 'SUYATNO', '$2y$10$KQHDp.OX0vvkMSUmliVYf.FsMLZIRC52j1FraJaHcICurfplvb..y', '2', NULL, '2018-05-11 10:18:44', '2018-05-11 10:18:44', NULL),
('197804222006042003', 'NINIK SETYORINI', '$2y$10$IVuQ35b56fyt.OOiAuN5QOsoMG5tixr7FIsBA89zNMqWq/xju5kNG', '4', NULL, '2018-05-11 10:22:14', '2018-05-11 10:22:14', NULL),
('197806182008012030', 'TIN YUNIATI', '$2y$10$0u2OQXEGGRdokDXV7Y6dzeHJHZm4YnCp1dDhjuhmRuUrXFXrCTURy', '4', NULL, '2018-05-11 10:20:01', '2018-05-11 10:20:01', NULL),
('198106152006041005', 'TRIAS PURNOMO', '$2y$10$PHEOO9OaOT8wjfn5EP0gguYGkraVbyJedLLbVnrfA7LxN8c2uH/fi', '2', NULL, '2018-05-11 10:17:22', '2018-05-11 10:17:22', NULL),
('admin', 'Admin', '$2y$10$VKSHVbyVmxXPFSJBkRy0v.wmRgMwDFsuf7Bc0wIXsxKwvsfc.yJIu', NULL, NULL, '2018-05-25 20:58:59', '2018-05-25 20:58:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liburnasional`
--
ALTER TABLE `liburnasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jatah_cuti`
--
ALTER TABLE `tbl_jatah_cuti`
  ADD PRIMARY KEY (`id_jatah`,`nip_baru`),
  ADD KEY `nip_baru` (`nip_baru`),
  ADD KEY `nip_baru_2` (`nip_baru`),
  ADD KEY `nip_baru_3` (`nip_baru`);

--
-- Indexes for table `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  ADD PRIMARY KEY (`id_jenis_cuti`);

--
-- Indexes for table `tbl_permohonan_cuti`
--
ALTER TABLE `tbl_permohonan_cuti`
  ADD PRIMARY KEY (`id_permohonan_cuti`),
  ADD KEY `id_cuti` (`id_jenis_cuti`),
  ADD KEY `nip_baru` (`nip_baru`),
  ADD KEY `nip_baru_2` (`nip_baru`),
  ADD KEY `nip_baru_3` (`nip_baru`),
  ADD KEY `nip_baru_4` (`nip_baru`),
  ADD KEY `nip_baru_5` (`nip_baru`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nip_baru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liburnasional`
--
ALTER TABLE `liburnasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  MODIFY `id_jenis_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_permohonan_cuti`
--
ALTER TABLE `tbl_permohonan_cuti`
  MODIFY `id_permohonan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jatah_cuti`
--
ALTER TABLE `tbl_jatah_cuti`
  ADD CONSTRAINT `tbl_jatah_cuti_ibfk_1` FOREIGN KEY (`nip_baru`) REFERENCES `tbl_user` (`nip_baru`);

--
-- Constraints for table `tbl_permohonan_cuti`
--
ALTER TABLE `tbl_permohonan_cuti`
  ADD CONSTRAINT `tbl_permohonan_cuti_ibfk_1` FOREIGN KEY (`id_jenis_cuti`) REFERENCES `tbl_jenis_cuti` (`id_jenis_cuti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_permohonan_cuti_ibfk_2` FOREIGN KEY (`nip_baru`) REFERENCES `tbl_user` (`nip_baru`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
