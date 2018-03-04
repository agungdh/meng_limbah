-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2018 at 02:16 PM
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
(1, '1.1.1', 'aaaaaa', 1),
(2, '1.1.2', 'bbbbbb', 1),
(4, '1.2.1', 'kurang satu', 2),
(6, 'bnm', 'nm', 6),
(7, '1', 'butir1', 15),
(8, '2', 'butir2', 15),
(9, '3', 'butir3', 15),
(10, '1', 'butir1', 16),
(11, '2', 'butir2', 16),
(12, '3', 'butir3', 16),
(13, '1', 'butir1', 17),
(14, '2', 'butir2', 17),
(15, '3', 'butir3', 17),
(16, '1', 'butir1', 18),
(17, '2', 'butir2', 18),
(18, '3', 'butir3', 18),
(19, '1', 'butir1', 20),
(20, '2', 'butir2', 20),
(21, '1', 'butir1', 24),
(22, '2', 'butir2', 24),
(23, '3', 'butir3', 24),
(24, '1', 'butir1', 26),
(25, '2', 'butir2', 26),
(26, '3', 'butir3', 26),
(27, '1', 'butir1', 27),
(28, '2', 'butir2', 27),
(29, '3', 'butir3', 27),
(30, '1', 'butir1', 28),
(31, '2', 'butir2', 28),
(32, '1', 'butir1', 29),
(33, '2', 'butir2', 29),
(34, '3', 'butir3', 29);

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
(1, 'dokumen 1', 1),
(2, 'dokumen 2', 1),
(3, 'dokumen 3', 1),
(6, 'tikem banget', 2),
(9, 'doc1', 7),
(10, 'doc2', 7),
(11, 'doc3', 7),
(12, 'doc1', 8),
(13, 'doc2', 8),
(14, 'doc3', 8),
(15, 'doc1', 9),
(16, 'doc2', 9),
(17, 'doc3', 9),
(18, 'doc1', 10),
(19, 'doc2', 10),
(20, 'doc3', 10),
(21, 'doc1', 11),
(22, 'doc2', 11),
(23, 'doc3', 11),
(24, 'doc1', 12),
(25, 'doc2', 12),
(26, 'doc3', 12),
(27, 'doc1', 13),
(28, 'doc2', 13),
(29, 'doc3', 13),
(30, 'doc1', 14),
(31, 'doc2', 14),
(32, 'doc3', 14),
(33, 'doc1', 15),
(34, 'doc2', 15),
(35, 'doc3', 15),
(36, 'doc1', 16),
(37, 'doc2', 16),
(38, 'doc3', 16),
(39, 'doc1', 17),
(40, 'doc2', 17),
(41, 'doc3', 17),
(42, 'doc1', 18),
(43, 'doc2', 18),
(44, 'doc3', 18),
(45, 'doc1', 19),
(46, 'doc2', 19),
(47, 'doc1', 20),
(48, 'doc2', 20),
(49, 'doc1', 21),
(50, 'doc2', 21),
(51, 'doc3', 21),
(52, 'doc1', 22),
(53, 'doc2', 22),
(54, 'doc3', 22),
(55, 'doc1', 23),
(56, 'doc2', 23),
(57, 'doc3', 23),
(58, 'doc1', 24),
(59, 'doc2', 24),
(60, 'doc3', 24),
(61, 'doc1', 25),
(62, 'doc2', 25),
(63, 'doc3', 25),
(64, 'doc1', 26),
(65, 'doc2', 26),
(66, 'doc3', 26),
(67, 'doc1', 27),
(68, 'doc2', 27),
(69, 'doc3', 27),
(70, 'doc1', 28),
(71, 'doc2', 28),
(72, 'doc3', 28),
(73, 'doc1', 29),
(74, 'doc2', 29),
(75, 'doc3', 29),
(76, 'doc1', 30),
(77, 'doc2', 30),
(78, 'doc3', 30),
(79, 'doc1', 31),
(80, 'doc2', 31),
(81, 'doc3', 31),
(82, 'doc1', 32),
(83, 'doc2', 32),
(84, 'doc3', 32),
(85, 'doc1', 33),
(86, 'doc2', 33),
(87, 'doc3', 33),
(88, 'doc1', 34);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `versi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1', 'pembagian, pengurangan', 4),
(2, '2', 'pengurangan', 4),
(9, 'nomo 1', 'nama 1', 5),
(10, 'nomor 2', 'nama 2', 5),
(11, 'nomor 1', 'nama 1', 8),
(12, 'nomor 1', 'nama 1', 14),
(13, 'nomor 1', 'nama 1', 17),
(14, 'nomor 2', 'nama 2', 17),
(15, 'nomor 1', 'nama 1', 9),
(16, 'nomor 2', 'nama 2', 9),
(17, '1', 'standarmutu1', 13),
(19, 'nomor 1', 'nama 1', 19),
(22, '5', 'standarmutu5', 13),
(24, '7', 'standarmutu7', 13),
(26, '1', 'standar1', 23),
(27, '2', 'standar2', 23),
(28, '3', 'standar3', 23),
(29, '4', 'standar4', 23),
(30, '5', 'standar5', 23),
(31, '01', 'retro1', 25),
(32, '02', 'retro2', 25),
(33, '03', 'retro3', 25),
(34, '04', 'retro4', 25),
(35, '05', 'retro5', 25),
(36, '06', 'retro6', 25),
(37, '07', 'retro7', 25),
(38, '08', 'retro8', 25),
(39, '09', 'retro9', 25),
(40, '10', 'retro10', 25),
(41, '101', 'obral1', 12),
(42, '102', 'obral2', 12),
(43, '103', 'obral3', 12),
(44, '104', 'obral4', 12),
(45, '105', 'obral5', 12),
(46, '20', 'operasi1', 15),
(47, '21', 'operasi2', 15),
(48, '30', 'hipo1', 11),
(49, '31', 'hipo2', 11);

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
(1, '1.1', 'Pembagian', 1),
(2, '1.2', 'Pengurangan', 1),
(4, '2.1', 'pengurangan sub', 2),
(6, 'kl', 'kl', 17),
(15, '1', 'substandar1', 26),
(16, '2', 'substandar2', 26),
(17, '3', 'substandar3', 26),
(18, '1', 'substandar1', 27),
(19, '2', 'substandar2', 27),
(20, '3', 'substandar3', 27),
(21, '1', 'substandar1', 28),
(22, '2', 'substandar2', 28),
(23, '3', 'substandar3', 28),
(24, '1', 'substandar1', 29),
(25, '2', 'substandar2', 29),
(26, '3', 'substandar3', 29),
(27, '1', 'substandar1', 30),
(28, '2', 'substandar2', 30),
(29, '3', 'substandar3', 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'satu', 'v1', 2001),
(5, 'dua', 'v2', 2002),
(8, 'tiga', 'v1', 2002),
(9, 'empat', 'v1', 2001),
(11, 'enam', 'v3', 2003),
(12, 'tujuh', 'v1', 2001),
(13, 'delapan', 'v2', 2002),
(14, 'sembilan', 'v3', 2002),
(15, 'sepuluh', 'v2', 2001),
(17, 'duabelas', 'v1', 2002),
(19, 'empatbelas', 'v3', 2001),
(23, 'delapanbelas', 'v2', 2003),
(25, 'duapuluh', 'v1', 2001);

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
  ADD KEY `versi_id` (`versi_id`);

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
  ADD UNIQUE KEY `kode` (`kode`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- AUTO_INCREMENT for table `listdokumen`
--
ALTER TABLE `listdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`versi_id`) REFERENCES `versi` (`id`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id`);

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
