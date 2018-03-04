-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2018 at 03:17 PM
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
(36, '1.1.1', 'aaaaa', 32),
(37, '1.1.2', 'bbbbb', 32),
(38, '1.1.3', 'ccccc', 32),
(39, '1.2.1', 'aaaaa', 33),
(40, 'ijhdoh', 'JNJLN', 31),
(41, '1.2.2', 'bbbbb', 33),
(42, '1.1.1', 'aaaaa', 31),
(43, '1.1.2', 'bbbbb', 31),
(44, '1.1.3', 'ccccc', 31),
(45, '1.2.1', 'aaaa', 34),
(46, '1.2.2', 'bbbb', 34);

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
(90, 'Dokumen 1', 36),
(91, 'Dokumen 2', 36),
(92, 'Dokumen 3', 36),
(93, 'Dokumen 1', 37),
(94, 'Dokumen 1', 38),
(95, 'Dokumen 2', 38),
(96, 'Dokumen 1', 39),
(97, 'Dokumen 1', 41),
(98, 'Dokumen 2', 41),
(99, 'Dokumen 3', 41),
(100, 'knflk', 40),
(101, 'dokumen 1', 42),
(102, 'dokumen 2', 42),
(103, 'dokumen 3', 42),
(104, 'dokumen 1', 43),
(105, 'dokumen 1', 44),
(106, 'dokumen 2', 44),
(107, 'dokumen 1', 45),
(108, 'dokumen 1', 46),
(109, 'dokumen 2', 46),
(110, 'dokumen 3', 46);

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
(52, '1', 'Pembagian, Pengurangan', 26),
(53, '1', 'Pembagian,Pengurangan', 27);

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
(31, '1.1', 'Pembagian', 52),
(32, '1.1', 'Pembagian', 53),
(33, '1.2', 'Pengurangan', 53),
(34, '1.2', 'Pengurangan', 52);

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
(26, 'Versi 1 (tikem)', 'v1', 2001),
(27, 'Versi 2 (son)', 'v2', 2002);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `substandar`
--
ALTER TABLE `substandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `versi`
--
ALTER TABLE `versi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
