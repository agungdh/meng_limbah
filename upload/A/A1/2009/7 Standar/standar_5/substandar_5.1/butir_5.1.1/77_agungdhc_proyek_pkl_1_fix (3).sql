-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 11:44 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agungdhc_proyek_pkl_1_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `butir`
--

CREATE TABLE `butir` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `substandar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `butir`
--

INSERT INTO `butir` (`id`, `nomor`, `nama`, `substandar_id`) VALUES
(47, '1.1.1', 'A', 35),
(48, '1.1.2', 'B', 35),
(49, '1.1.3', 'C', 35),
(50, '1.2.1', 'A', 36),
(51, '1.2.2', 'B', 36),
(52, '2.1.1', 'A', 38),
(53, '2.1.2', 'B', 38),
(54, '2.2.1', 'A_1', 39),
(55, '2.2.2', 'B_1', 39),
(56, '3.1.1', 'Data Input', 40),
(57, '3.1.2', 'Data Revisi Input', 40),
(58, '3.2.1', 'Data Lampiran', 41),
(59, '3.2.2', 'Data Pendamping', 41),
(60, '4.1.1', 'Penambahan Berat Badan', 42),
(61, '4.1.2', 'Penambahan Daftar Menu', 42),
(62, '4.2.1', 'Pengkalian Matriks', 43),
(63, '4.2.2', 'Pengkalian Biasa', 43),
(64, '5.1.1', 'Pembersihan Standar', 44),
(65, '5.1.2', 'Pembersihan Super', 44),
(66, '5.2.1', 'Pencucian Sprai', 45),
(67, '6.1.1', 'Pengambilan Data Paksa', 46),
(68, '6.2.1', 'Penjabaran Data dengan Metode', 47),
(69, '7.1.1', 'Penerapan Data Paksa', 48),
(70, '7.2.1', 'Laporan Data Word', 49),
(71, '1', 'Butir 1', 50),
(72, '1', 'Butir 1', 51),
(73, '1.3.1', 'Masalah', 37);

-- --------------------------------------------------------

--
-- Table structure for table `detilpenilaian`
--

CREATE TABLE `detilpenilaian` (
  `id` int(11) NOT NULL,
  `penilaian_id` int(11) NOT NULL,
  `butir_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `nama_file_asli` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `listdokumen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `kode`, `nama`) VALUES
(8, 'A', 'Ilmu Komunikasi'),
(9, 'B', 'Teknik'),
(10, 'C', 'Teknologi Informasi'),
(12, 'D', 'Ekonomi dan Bisnis'),
(13, 'E', 'Ilmu Sosial & Ilmu Politik');

-- --------------------------------------------------------

--
-- Table structure for table `listdokumen`
--

CREATE TABLE `listdokumen` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `butir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listdokumen`
--

INSERT INTO `listdokumen` (`id`, `keterangan`, `butir_id`) VALUES
(112, 'Dokumen 1', 47),
(113, 'Dokumen 2', 47),
(114, 'Dokumen B.1', 48),
(115, 'Dokumen B.2', 48),
(116, 'Dokumen C.1', 49),
(117, 'Dokumen 1', 52),
(118, 'Dokumen 2', 53),
(119, 'B_1_1', 55),
(120, 'PS_1', 64),
(121, 'PS_2', 65),
(122, 'PSP_1', 66),
(123, 'PDP_1', 67),
(124, 'PDPM_1', 68),
(125, 'Terap_1', 69),
(126, 'Laporan_word1', 70),
(127, 'dokumen test', 58),
(128, 'Dokumen 1', 60),
(129, 'Dokumen 2', 60),
(130, 'Dokumen Menu 1', 61),
(131, 'Dokumen Menu 3', 61),
(132, 'Dokumen Menu 2', 61),
(133, 'Dokumen 1', 71),
(134, ';lkjhg', 50),
(135, 'oihg', 51),
(136, 'Dokumen 1', 72),
(137, 'Masalah_1', 73),
(138, 'Masalah_2', 73),
(139, 'AA1', 59),
(140, 'AA2', 59),
(141, 'Dokumen 1', 54),
(142, 'Dokumen 1', 56),
(143, 'Dokumen 1', 57),
(144, 'Dokumen 2', 57),
(145, 'MATRIKS_2', 62),
(146, 'MATRIKS_1', 62);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `tanggal`, `user_id`, `versi_id`) VALUES
(13, '2018-02-27', 4, 28),
(14, '2018-02-27', 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pengajuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `kode`, `nama`, `fakultas_id`) VALUES
(7, 'A1', 'HUBUNGAN MASYARAKAT', 8),
(8, 'A2', 'JURNALISTIK PENYIARAN', 8),
(9, 'A3', 'PERIKLANAN', 8),
(10, 'A4', 'KOMUNIKASI VISUAL', 8),
(11, 'B1', 'TEKNIK ELEKTRO', 9),
(12, 'B2', 'TEKNIK ARSITEKTUR', 9),
(13, 'C1', 'TEKNIK INFORMATIKA', 10),
(14, 'C2', 'SISTEM INFORMASI', 10),
(15, 'C3', 'SISTEM KOMPUTER', 10),
(16, 'D1', 'AKUNTANSI', 12),
(17, 'D2', 'MANAJEMEN', 12),
(18, 'E1', 'HUBUNGAN INTERNASIONAL', 13),
(19, 'E2', 'KRIMINOLOGI', 13);

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id`, `nomor`, `nama`, `versi_id`) VALUES
(54, '1', 'Pendahuluan, Latar Belakang, Rumusan Masalah', 28),
(55, '2', 'Pembagian,Pengurangan', 28),
(56, '3', 'Pengisian,Pengosoan', 28),
(57, '4', 'Penambahan,Pengkalian', 28),
(58, '5', 'Pembersihan,Pencucian', 28),
(59, '6', 'Pengambilan Data, Penjabaran Data', 28),
(60, '7', 'Penerapan Data, Laporan Data', 28),
(61, '1', 'Standar 1', 29),
(62, '2', 'Standar 2', 29);

-- --------------------------------------------------------

--
-- Table structure for table `substandar`
--

CREATE TABLE `substandar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `standar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `substandar`
--

INSERT INTO `substandar` (`id`, `nomor`, `nama`, `standar_id`) VALUES
(35, '1.1', 'Pendahuluan', 54),
(36, '1.2', 'Latar Belakang', 54),
(37, '1.3', 'Rumusan Masalah', 54),
(38, '2.1', 'Pembagian', 55),
(39, '2.2', 'Pengurangan', 55),
(40, '3.1', 'Pengisian', 56),
(41, '3.2', 'Pengosoan', 56),
(42, '4.1', 'Penambahan', 57),
(43, '4.2', 'Pengkalian', 57),
(44, '5.1', 'Pembersihan', 58),
(45, '5.2', 'Pencucian', 58),
(46, '6.1', 'Pengambilan Data', 59),
(47, '6.2', 'Penjabaran Data', 59),
(48, '7.1', 'Penerapan Data', 60),
(49, '7.2', 'Laporan Data', 60),
(50, '1', 'Substandar 1', 61),
(51, '1', 'Substandar 1', 62);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `prodi_id`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, NULL),
(3, 'univ', 'c001deeb52dc9ff9e859f65772659245cff32c5607e8932f3efeba343bd829cc497f299789b15cc27c95dc3ec865447679e7bbb52138a3e97f3f4b38c7c17874', 2, NULL),
(4, 'ophumas', '8f18c505ea83c1503b199ca936692912f9e08fda787fbedfc2fc144467bb3d4243ed1df050f001225df6c93dfba15f465eda50e97a10705299f0ff71137b3520', 3, 7),
(14, 'manajemen', 'd2d966dc907af41d781d1a44142d121cd66d209e21768cd9d8dfb2b57b828c8f5e2ac88b6d9944f00e6aa02af582414dfebf4617695ab8af9989e4c3a8b21e24', 3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `versi`
--

CREATE TABLE `versi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `versi` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versi`
--

INSERT INTO `versi` (`id`, `nama`, `versi`, `tahun`) VALUES
(28, '7 Standar', '7', 2018),
(29, '9 Standar', '9', 2018);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_butir`
-- (See below for the actual view)
--
CREATE TABLE `v_butir` (
`id_butir` int(11)
,`nomor_butir` varchar(255)
,`nama_butir` varchar(255)
,`id_substandar` int(11)
,`nomor_substandar` varchar(255)
,`nama_substandar` varchar(255)
,`standar_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_listdokumen`
-- (See below for the actual view)
--
CREATE TABLE `v_listdokumen` (
`id_listdokumen` int(11)
,`keterangan_listdokumen` varchar(255)
,`id_butir` int(11)
,`nomor_butir` varchar(255)
,`nama_butir` varchar(255)
,`substandar_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengajuan`
-- (See below for the actual view)
--
CREATE TABLE `v_pengajuan` (
`id` int(11)
,`tanggal` date
,`user_id` int(11)
,`versi_id` int(11)
,`nama` varchar(255)
,`versi` varchar(255)
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengajuan_dokumen`
-- (See below for the actual view)
--
CREATE TABLE `v_pengajuan_dokumen` (
`id_standar` int(11)
,`nomor_standar` varchar(255)
,`nama_standar` varchar(255)
,`id_substandar` int(11)
,`nomor_substandar` varchar(255)
,`nama_substandar` varchar(255)
,`id_butir` int(11)
,`nomor_butir` varchar(255)
,`nama_butir` varchar(255)
,`id_listdokumen` int(11)
,`keterangan_listdokumen` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prodi`
-- (See below for the actual view)
--
CREATE TABLE `v_prodi` (
`id_prodi` int(11)
,`kode_prodi` varchar(255)
,`nama_prodi` varchar(255)
,`id_fakultas` int(11)
,`kode_fakultas` varchar(255)
,`nama_fakultas` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_standar`
-- (See below for the actual view)
--
CREATE TABLE `v_standar` (
`id_standar` int(11)
,`nomor_standar` varchar(255)
,`nama_standar` varchar(255)
,`id_versi` int(11)
,`nama_versi` varchar(255)
,`versi` varchar(255)
,`tahun_versi` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_substandar`
-- (See below for the actual view)
--
CREATE TABLE `v_substandar` (
`id_substandar` int(11)
,`nomor_substandar` varchar(255)
,`nama_substandar` varchar(255)
,`id_standar` int(11)
,`nomor_standar` varchar(255)
,`nama_standar` varchar(255)
,`versi_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id` int(11)
,`username` varchar(255)
,`password` varchar(255)
,`level` int(11)
,`prodi_id` int(11)
,`kode_prodi` varchar(255)
,`nama_prodi` varchar(255)
,`fakultas_id` int(11)
,`kode_fakultas` varchar(255)
,`nama_fakultas` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_butir`
--
DROP TABLE IF EXISTS `v_butir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_butir`  AS  select `b`.`id` AS `id_butir`,`b`.`nomor` AS `nomor_butir`,`b`.`nama` AS `nama_butir`,`s`.`id` AS `id_substandar`,`s`.`nomor` AS `nomor_substandar`,`s`.`nama` AS `nama_substandar`,`s`.`standar_id` AS `standar_id` from (`butir` `b` join `substandar` `s`) where (`b`.`substandar_id` = `s`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_listdokumen`
--
DROP TABLE IF EXISTS `v_listdokumen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_listdokumen`  AS  select `l`.`id` AS `id_listdokumen`,`l`.`keterangan` AS `keterangan_listdokumen`,`b`.`id` AS `id_butir`,`b`.`nomor` AS `nomor_butir`,`b`.`nama` AS `nama_butir`,`b`.`substandar_id` AS `substandar_id` from (`listdokumen` `l` join `butir` `b`) where (`l`.`butir_id` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengajuan`
--
DROP TABLE IF EXISTS `v_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_pengajuan`  AS  select `p`.`id` AS `id`,`p`.`tanggal` AS `tanggal`,`p`.`user_id` AS `user_id`,`p`.`versi_id` AS `versi_id`,`v`.`nama` AS `nama`,`v`.`versi` AS `versi`,`v`.`tahun` AS `tahun` from (`pengajuan` `p` join `versi` `v`) where (`p`.`versi_id` = `v`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengajuan_dokumen`
--
DROP TABLE IF EXISTS `v_pengajuan_dokumen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_pengajuan_dokumen`  AS  select `st`.`id` AS `id_standar`,`st`.`nomor` AS `nomor_standar`,`st`.`nama` AS `nama_standar`,`ss`.`id` AS `id_substandar`,`ss`.`nomor` AS `nomor_substandar`,`ss`.`nama` AS `nama_substandar`,`bt`.`id` AS `id_butir`,`bt`.`nomor` AS `nomor_butir`,`bt`.`nama` AS `nama_butir`,`ld`.`id` AS `id_listdokumen`,`ld`.`keterangan` AS `keterangan_listdokumen` from (((`standar` `st` join `substandar` `ss`) join `butir` `bt`) join `listdokumen` `ld`) where ((`ld`.`butir_id` = `bt`.`id`) and (`bt`.`substandar_id` = `ss`.`id`) and (`ss`.`standar_id` = `st`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_prodi`
--
DROP TABLE IF EXISTS `v_prodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_prodi`  AS  select `p`.`id` AS `id_prodi`,`p`.`kode` AS `kode_prodi`,`p`.`nama` AS `nama_prodi`,`f`.`id` AS `id_fakultas`,`f`.`kode` AS `kode_fakultas`,`f`.`nama` AS `nama_fakultas` from (`prodi` `p` join `fakultas` `f`) where (`p`.`fakultas_id` = `f`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_standar`
--
DROP TABLE IF EXISTS `v_standar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_standar`  AS  select `s`.`id` AS `id_standar`,`s`.`nomor` AS `nomor_standar`,`s`.`nama` AS `nama_standar`,`v`.`id` AS `id_versi`,`v`.`nama` AS `nama_versi`,`v`.`versi` AS `versi`,`v`.`tahun` AS `tahun_versi` from (`standar` `s` join `versi` `v`) where (`s`.`versi_id` = `v`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_substandar`
--
DROP TABLE IF EXISTS `v_substandar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_substandar`  AS  select `ss`.`id` AS `id_substandar`,`ss`.`nomor` AS `nomor_substandar`,`ss`.`nama` AS `nama_substandar`,`st`.`id` AS `id_standar`,`st`.`nomor` AS `nomor_standar`,`st`.`nama` AS `nama_standar`,`st`.`versi_id` AS `versi_id` from (`standar` `st` join `substandar` `ss`) where (`ss`.`standar_id` = `st`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agungdhc_tika_son`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `u`.`id` AS `id`,`u`.`username` AS `username`,`u`.`password` AS `password`,`u`.`level` AS `level`,`u`.`prodi_id` AS `prodi_id`,`p`.`kode` AS `kode_prodi`,`p`.`nama` AS `nama_prodi`,`p`.`fakultas_id` AS `fakultas_id`,`f`.`kode` AS `kode_fakultas`,`f`.`nama` AS `nama_fakultas` from ((`user` `u` join `prodi` `p`) join `fakultas` `f`) where ((`u`.`prodi_id` = `p`.`id`) and (`p`.`fakultas_id` = `f`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `butir`
--
ALTER TABLE `butir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `substandar_id` (`substandar_id`);

--
-- Indexes for table `detilpenilaian`
--
ALTER TABLE `detilpenilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_id` (`penilaian_id`),
  ADD KEY `butir_id` (`butir_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listdokumen_id` (`listdokumen_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listdokumen`
--
ALTER TABLE `listdokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `butir_id` (`butir_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versi_id` (`versi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versi_id` (`versi_id`);

--
-- Indexes for table `substandar`
--
ALTER TABLE `substandar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standar_id` (`standar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `versi`
--
ALTER TABLE `versi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `butir`
--
ALTER TABLE `butir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `detilpenilaian`
--
ALTER TABLE `detilpenilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listdokumen`
--
ALTER TABLE `listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `butir`
--
ALTER TABLE `butir`
  ADD CONSTRAINT `butir_ibfk_1` FOREIGN KEY (`substandar_id`) REFERENCES `substandar` (`id`);

--
-- Constraints for table `detilpenilaian`
--
ALTER TABLE `detilpenilaian`
  ADD CONSTRAINT `detilpenilaian_ibfk_1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`),
  ADD CONSTRAINT `detilpenilaian_ibfk_2` FOREIGN KEY (`butir_id`) REFERENCES `butir` (`id`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`listdokumen_id`) REFERENCES `listdokumen` (`id`);

--
-- Constraints for table `listdokumen`
--
ALTER TABLE `listdokumen`
  ADD CONSTRAINT `listdokumen_ibfk_1` FOREIGN KEY (`butir_id`) REFERENCES `butir` (`id`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `standar`
--
ALTER TABLE `standar`
  ADD CONSTRAINT `standar_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Constraints for table `substandar`
--
ALTER TABLE `substandar`
  ADD CONSTRAINT `substandar_ibfk_1` FOREIGN KEY (`standar_id`) REFERENCES `standar` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
