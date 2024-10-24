-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2024 at 06:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'UUID',
  `id_surat` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tujuan_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pengirim_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_disposisi` datetime DEFAULT NULL,
  `catatan_disposisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` char(2) DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `catatan_selesai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal_batal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `id_surat`, `tujuan_id`, `pengirim_id`, `tanggal_disposisi`, `catatan_disposisi`, `status`, `tanggal_selesai`, `catatan_selesai`, `tanggal_batal`) VALUES
('2f60b2ad-7134-46e4-b792-bec39c4cb150', '88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', '1c0ce849-bd64-492e-80cf-00f9e6451909', '1c0ce849-bd64-492e-80cf-00f9e6451909', '2024-10-21 15:27:03', 'Tes catatan', 'N', NULL, NULL, '2024-10-21 08:30:57'),
('f9775b64-1696-4bce-a360-011a1000596c', 'b4273cfc-8f60-482c-8cea-71c83e0f5f0f', '303d003d-690a-4676-b5b8-8d7af101fd96', '1c0ce849-bd64-492e-80cf-00f9e6451909', '2024-10-21 14:22:30', '', 'Y', '2024-10-21 14:29:27', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grupjabatan`
--

CREATE TABLE `grupjabatan` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grupjabatan`
--

INSERT INTO `grupjabatan` (`id`, `nama`, `status`) VALUES
('1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', 'Rektor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `level` varchar(10) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`id`, `nama`, `keterangan`, `level`, `status`) VALUES
('37dc1ca0-7bd6-11ef-91ed-d8bbc1b18425', 'Superadmin', 'Level akun khusus Superadmin', '1', '1'),
('54bc6ceb-7bd7-11ef-91ed-d8bbc1b18425', 'Administrator', 'Akun Admin', '2', '1'),
('baf18bb6-7ec8-11ef-a015-d8bbc1b18425', 'Pegawai', 'Untuk pegawai', '11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `historynaskahkeluar`
--

CREATE TABLE `historynaskahkeluar` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `naskah_id` char(36) DEFAULT NULL,
  `status_dibaca` char(10) DEFAULT NULL,
  `status_naskah` char(10) DEFAULT NULL,
  `pengirim_id` char(36) DEFAULT NULL,
  `asal_pengirim` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `historynaskahkeluar`
--

INSERT INTO `historynaskahkeluar` (`id`, `naskah_id`, `status_dibaca`, `status_naskah`, `pengirim_id`, `asal_pengirim`, `updatedAt`) VALUES
('88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', '88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', 'selesai', 'selesai', '1c0ce849-bd64-492e-80cf-00f9e6451909', NULL, '2024-10-21 01:33:33'),
('b4273cfc-8f60-482c-8cea-71c83e0f5f0f', 'b4273cfc-8f60-482c-8cea-71c83e0f5f0f', 'dibaca', 'terkirim', '1c0ce849-bd64-492e-80cf-00f9e6451909', NULL, '2024-10-21 00:20:54'),
('e59e6a5f-f7c8-4b7e-9539-e387deff0a0d', 'e59e6a5f-f7c8-4b7e-9539-e387deff0a0d', 'dibaca', 'selesai', '1c0ce849-bd64-492e-80cf-00f9e6451909', NULL, '2024-10-20 23:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `subsatker_id` char(36) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `subsatker_id`, `status`) VALUES
('070ca3eb-7ec9-11ef-a015-d8bbc1b18425', 'Pegawai', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425', '1'),
('13cdc5c7-7b11-11ef-91ed-d8bbc1b18425', 'Kepala Umum', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenisinduksubsatker`
--

CREATE TABLE `jenisinduksubsatker` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenisinduksubsatker`
--

INSERT INTO `jenisinduksubsatker` (`id`, `nama`, `status`) VALUES
('95fb6728-7704-11ef-aa22-d8bbc1b18425', 'Kampus 3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenisnaskah`
--

CREATE TABLE `jenisnaskah` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenisnaskah`
--

INSERT INTO `jenisnaskah` (`id`, `nama`, `status`) VALUES
('0a9a9cd2-7ed7-11ef-a015-d8bbc1b18425', 'Surat Pemberitahuan', '1'),
('14eeb796-7ed7-11ef-a015-d8bbc1b18425', 'Surat Edaran', '1'),
('3e65f2ca-7ed8-11ef-a015-d8bbc1b18425', 'Surat Tugas', '1'),
('5596777a-7ed7-11ef-a015-d8bbc1b18425', 'Surat Perintah', '1'),
('65ce9413-7ed7-11ef-a015-d8bbc1b18425', 'Surat Undangan', '1'),
('f13e9adc-7ed6-11ef-a015-d8bbc1b18425', 'Surat Keputusan (SK)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_disposisi`
--

CREATE TABLE `komentar_disposisi` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'UUID',
  `disposisi_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parent_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `komentar` text NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'UUID',
  `id_surat` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_disposisi` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `catatan` text,
  `createdAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_surat`, `id_disposisi`, `user_id`, `catatan`, `createdAt`) VALUES
('2f60b2ad-7134-46e4-b792-bec39c4cb150', '88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', '2f60b2ad-7134-46e4-b792-bec39c4cb150', '1c0ce849-bd64-492e-80cf-00f9e6451909', 'Disposisi surat', '2024-10-21 08:27:03'),
('4e92797f-02af-45e1-b8c1-5362eba24430', '88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', '2f60b2ad-7134-46e4-b792-bec39c4cb150', '1c0ce849-bd64-492e-80cf-00f9e6451909', 'Pembatalan disposisi', '2024-10-21 08:30:57'),
('c8ddc7ef-4c07-49a0-95bf-35c538424028', 'b4273cfc-8f60-482c-8cea-71c83e0f5f0f', 'f9775b64-1696-4bce-a360-011a1000596c', '303d003d-690a-4676-b5b8-8d7af101fd96', 'Penyelesaian disposisi', '2024-10-21 07:29:27'),
('f9775b64-1696-4bce-a360-011a1000596c', 'b4273cfc-8f60-482c-8cea-71c83e0f5f0f', 'f9775b64-1696-4bce-a360-011a1000596c', '1c0ce849-bd64-492e-80cf-00f9e6451909', 'Disposisi surat', '2024-10-21 07:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `registrasisuratmasuk`
--

CREATE TABLE `registrasisuratmasuk` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `jabatan_pengirim` varchar(255) DEFAULT NULL,
  `instansi_pengirim` varchar(255) DEFAULT NULL,
  `jenis_naskah_id` char(36) DEFAULT NULL,
  `sifat_naskah_id` char(36) DEFAULT NULL,
  `nomor_naskah` varchar(255) DEFAULT NULL,
  `tanggal_naskah` date DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `hal` text,
  `ringkasan` text,
  `file_naskah` varchar(255) DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `tujuan_subsatker_id` char(36) DEFAULT NULL,
  `tujuan_personal_id` char(36) DEFAULT NULL,
  `user_register` char(36) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registrasisuratmasuk`
--

INSERT INTO `registrasisuratmasuk` (`id`, `nama_pengirim`, `jabatan_pengirim`, `instansi_pengirim`, `jenis_naskah_id`, `sifat_naskah_id`, `nomor_naskah`, `tanggal_naskah`, `tanggal_diterima`, `hal`, `ringkasan`, `file_naskah`, `file_lampiran`, `tujuan_subsatker_id`, `tujuan_personal_id`, `user_register`, `createdAt`, `updatedAt`) VALUES
('88ec8fdd-0dea-4d87-88a9-ce67d764d7c6', 'udin', 'CEO', 'pt jaya jaya jaya', '65ce9413-7ed7-11ef-a015-d8bbc1b18425', 'ac40f321-7edf-11ef-a015-d8bbc1b18425', '10101001', '2024-10-20', '2024-10-21', 'Undagan', 'Undagan', '1729499133_49493c8ac2b61e570d77.pdf', '1729499133_a3caacea182e32a84612.png', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425', '303d003d-690a-4676-b5b8-8d7af101fd96', '1c0ce849-bd64-492e-80cf-00f9e6451909', '2024-10-21 15:25:33', NULL),
('b4273cfc-8f60-482c-8cea-71c83e0f5f0f', 'Yanto Resink', 'CEO', 'PT Rakyat Sejahtera', '65ce9413-7ed7-11ef-a015-d8bbc1b18425', 'ac40f321-7edf-11ef-a015-d8bbc1b18425', '6959969', '2024-10-20', '2024-10-20', 'Undangan grand opening kantor PT Rakyat Sejahtera cabang sawojajar', 'Undangan grand opening kantor PT Rakyat Sejahtera cabang sawojajar', '1729495093_b683a4181a96b042c168.pdf', '1729495093_f869cfd4d9d39991b13e.docx', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425', '1c0ce849-bd64-492e-80cf-00f9e6451909', '1c0ce849-bd64-492e-80cf-00f9e6451909', '2024-10-21 14:18:13', NULL),
('e59e6a5f-f7c8-4b7e-9539-e387deff0a0d', 'Bang Jali', 'CEO', 'PT Aman Tentram Sejahtera', '65ce9413-7ed7-11ef-a015-d8bbc1b18425', 'ac40f321-7edf-11ef-a015-d8bbc1b18425', '1020304050', '2024-10-20', '2024-10-20', 'Undangan ABCDEFGH', 'Undangan ABCDEFGH', '1729484161_f410cf8d8157f33600fa.pdf', '1729484161_6695d9e51b9d5055c7d0.png', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425', '303d003d-690a-4676-b5b8-8d7af101fd96', '1c0ce849-bd64-492e-80cf-00f9e6451909', '2024-10-21 11:16:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sifatnaskah`
--

CREATE TABLE `sifatnaskah` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sifatnaskah`
--

INSERT INTO `sifatnaskah` (`id`, `nama`, `status`) VALUES
('9986888a-7edf-11ef-a015-d8bbc1b18425', 'Sangat Rahasia', '1'),
('a681bd94-7edf-11ef-a015-d8bbc1b18425', 'Rahasia', '1'),
('ac40f321-7edf-11ef-a015-d8bbc1b18425', 'Terbatas', '1'),
('b09b5c2d-7edf-11ef-a015-d8bbc1b18425', 'Biasa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subsatker`
--

CREATE TABLE `subsatker` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `kode_subsatker` varchar(50) DEFAULT NULL,
  `nama_subsatker` varchar(255) DEFAULT NULL,
  `jenis_induk_subsatker` char(36) DEFAULT NULL,
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subsatker`
--

INSERT INTO `subsatker` (`id`, `kode_subsatker`, `nama_subsatker`, `jenis_induk_subsatker`, `status`) VALUES
('d19a6ae2-7704-11ef-aa22-d8bbc1b18425', '100001', 'PTIPD', '95fb6728-7704-11ef-aa22-d8bbc1b18425', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tipeuser`
--

CREATE TABLE `tipeuser` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama` varchar(255) DEFAULT NULL,
  `status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipeuser`
--

INSERT INTO `tipeuser` (`id`, `nama`, `status`) VALUES
('14756b26-7ba3-11ef-91ed-d8bbc1b18425', 'Administrator', '1'),
('45a5f7d9-7ec9-11ef-a015-d8bbc1b18425', 'Pegawai', '1'),
('56c2de91-7ec9-11ef-a015-d8bbc1b18425', 'Superadmin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL COMMENT 'UUID',
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `user_nip` varchar(100) DEFAULT NULL,
  `status_user` enum('Y','N') DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `jenis_kelamin`, `user_nip`, `status_user`, `createdAt`, `updatedAt`) VALUES
('1c0ce849-bd64-492e-80cf-00f9e6451909', 'raihan administrator', 'raihanazzaidan29@gmail.com', 'Laki-laki', '666666', 'Y', NULL, '2024-10-07 08:09:13'),
('303d003d-690a-4676-b5b8-8d7af101fd96', 'raihan pegawai ', 'azzaidan2911@gmail.com', 'Laki-laki', '888888', 'Y', NULL, '2024-10-07 08:08:53'),
('9dae6720-7ec7-11ef-a015-d8bbc1b18425', 'raihan superadmin', 'azzaidan0987@gmail.com', 'Laki-laki', '777777', 'Y', NULL, '2024-10-07 08:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `usr_id` char(36) NOT NULL,
  `usg_level` varchar(36) NOT NULL,
  `jabatan_id` char(36) NOT NULL,
  `jabatan_grup_id` char(36) NOT NULL,
  `usertipe_id` char(36) NOT NULL,
  `subsatker_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`usr_id`, `usg_level`, `jabatan_id`, `jabatan_grup_id`, `usertipe_id`, `subsatker_id`) VALUES
('3b0f0b2f-7c9b-11ef-91ed-d8bbc1b18425', '37dc1ca0-7bd6-11ef-91ed-d8bbc1b18425', '13cdc5c7-7b11-11ef-91ed-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '14756b26-7ba3-11ef-91ed-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('1b832281-7cb1-11ef-91ed-d8bbc1b18425', '54bc6ceb-7bd7-11ef-91ed-d8bbc1b18425', '31573c34-7b0c-11ef-91ed-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '14756b26-7ba3-11ef-91ed-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('9dae6720-7ec7-11ef-a015-d8bbc1b18425', '37dc1ca0-7bd6-11ef-91ed-d8bbc1b18425', '13cdc5c7-7b11-11ef-91ed-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '56c2de91-7ec9-11ef-a015-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('1b832281-7cb1-11ef-91ed-d8bbc1b18425', '54bc6ceb-7bd7-11ef-91ed-d8bbc1b18425', '070ca3eb-7ec9-11ef-a015-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '14756b26-7ba3-11ef-91ed-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('c15923ea-7ec6-11ef-a015-d8bbc1b18425', 'baf18bb6-7ec8-11ef-a015-d8bbc1b18425', '070ca3eb-7ec9-11ef-a015-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '45a5f7d9-7ec9-11ef-a015-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('0c92aaa1-7fe9-11ef-a015-d8bbc1b18425', '37dc1ca0-7bd6-11ef-91ed-d8bbc1b18425', '070ca3eb-7ec9-11ef-a015-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '56c2de91-7ec9-11ef-a015-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('1c0ce849-bd64-492e-80cf-00f9e6451909', '54bc6ceb-7bd7-11ef-91ed-d8bbc1b18425', '070ca3eb-7ec9-11ef-a015-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '14756b26-7ba3-11ef-91ed-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425'),
('303d003d-690a-4676-b5b8-8d7af101fd96', 'baf18bb6-7ec8-11ef-a015-d8bbc1b18425', '070ca3eb-7ec9-11ef-a015-d8bbc1b18425', '1f702cc0-7ba4-11ef-91ed-d8bbc1b18425', '45a5f7d9-7ec9-11ef-a015-d8bbc1b18425', 'd19a6ae2-7704-11ef-aa22-d8bbc1b18425');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `surat_id` (`id_surat`),
  ADD KEY `tujuan_id` (`tujuan_id`,`pengirim_id`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `pengirim_id` (`pengirim_id`);

--
-- Indexes for table `grupjabatan`
--
ALTER TABLE `grupjabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `historynaskahkeluar`
--
ALTER TABLE `historynaskahkeluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `naskah_id` (`naskah_id`),
  ADD KEY `pengirim_id` (`pengirim_id`),
  ADD KEY `asal_pengirim` (`asal_pengirim`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `subsatker_id` (`subsatker_id`);

--
-- Indexes for table `jenisinduksubsatker`
--
ALTER TABLE `jenisinduksubsatker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jenisnaskah`
--
ALTER TABLE `jenisnaskah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `komentar_disposisi`
--
ALTER TABLE `komentar_disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_id` (`disposisi_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `parent_id_2` (`parent_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_disposisi` (`id_disposisi`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registrasisuratmasuk`
--
ALTER TABLE `registrasisuratmasuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `jenis_naskah_id` (`jenis_naskah_id`),
  ADD KEY `sifat_naskah_id` (`sifat_naskah_id`),
  ADD KEY `tujuan_subsatker_id` (`tujuan_subsatker_id`),
  ADD KEY `tujuan_personal_id` (`tujuan_personal_id`),
  ADD KEY `user_register` (`user_register`);

--
-- Indexes for table `sifatnaskah`
--
ALTER TABLE `sifatnaskah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subsatker`
--
ALTER TABLE `subsatker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `jenis_induk_subsatker` (`jenis_induk_subsatker`);

--
-- Indexes for table `tipeuser`
--
ALTER TABLE `tipeuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`tujuan_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`pengirim_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `disposisi_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `registrasisuratmasuk` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `historynaskahkeluar`
--
ALTER TABLE `historynaskahkeluar`
  ADD CONSTRAINT `historynaskahkeluar_ibfk_1` FOREIGN KEY (`naskah_id`) REFERENCES `registrasisuratmasuk` (`id`),
  ADD CONSTRAINT `historynaskahkeluar_ibfk_2` FOREIGN KEY (`pengirim_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `historynaskahkeluar_ibfk_3` FOREIGN KEY (`asal_pengirim`) REFERENCES `subsatker` (`id`);

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`subsatker_id`) REFERENCES `subsatker` (`id`);

--
-- Constraints for table `komentar_disposisi`
--
ALTER TABLE `komentar_disposisi`
  ADD CONSTRAINT `komentar_disposisi_ibfk_1` FOREIGN KEY (`disposisi_id`) REFERENCES `disposisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_disposisi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_disposisi_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `komentar_disposisi` (`id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `log_ibfk_4` FOREIGN KEY (`id_disposisi`) REFERENCES `disposisi` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `log_ibfk_5` FOREIGN KEY (`id_surat`) REFERENCES `registrasisuratmasuk` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `registrasisuratmasuk`
--
ALTER TABLE `registrasisuratmasuk`
  ADD CONSTRAINT `registrasisuratmasuk_ibfk_1` FOREIGN KEY (`jenis_naskah_id`) REFERENCES `jenisnaskah` (`id`),
  ADD CONSTRAINT `registrasisuratmasuk_ibfk_2` FOREIGN KEY (`sifat_naskah_id`) REFERENCES `sifatnaskah` (`id`),
  ADD CONSTRAINT `registrasisuratmasuk_ibfk_3` FOREIGN KEY (`tujuan_subsatker_id`) REFERENCES `subsatker` (`id`),
  ADD CONSTRAINT `registrasisuratmasuk_ibfk_4` FOREIGN KEY (`tujuan_personal_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `registrasisuratmasuk_ibfk_5` FOREIGN KEY (`user_register`) REFERENCES `user` (`id`);

--
-- Constraints for table `subsatker`
--
ALTER TABLE `subsatker`
  ADD CONSTRAINT `subsatker_ibfk_1` FOREIGN KEY (`jenis_induk_subsatker`) REFERENCES `jenisinduksubsatker` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
