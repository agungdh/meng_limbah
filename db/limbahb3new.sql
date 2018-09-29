-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2018 at 11:52 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limbahb3new`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `host` varchar(64) NOT NULL,
  `encryption` varchar(64) NOT NULL,
  `port` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`username`, `password`, `host`, `encryption`, `port`) VALUES
('tesoperator123@gmail.com', '123tesoperator', 'smtp.gmail.com', 'tls', '587');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(2) NOT NULL,
  `kategori` int(2) NOT NULL,
  `masa_berlaku_hari` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `masa_berlaku_hari`) VALUES
(1, 1, 180),
(2, 2, 365);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(5) NOT NULL,
  `id_unit` int(3) NOT NULL,
  `id_limbah` int(3) NOT NULL,
  `id_pengangkut` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `no_dokumen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `id_unit`, `id_limbah`, `id_pengangkut`, `tanggal`, `jumlah`, `no_dokumen`) VALUES
(21, 2, 12, 1, '2017-12-30', '11200.00', 'RI-0010948'),
(22, 2, 12, 1, '2017-12-30', '12800.00', 'RI-0011124'),
(23, 2, 12, 1, '2017-12-08', '11200.00', 'RI-0011125'),
(24, 2, 12, 1, '2017-12-08', '12800.00', 'RI-0011126'),
(25, 2, 12, 1, '2017-12-18', '12800.00', 'RI-0011162'),
(26, 2, 12, 1, '2017-12-18', '11600.00', 'RI-0011163'),
(27, 1, 17, 1, '2017-11-27', '57.00', 'RI-0010943'),
(28, 1, 8, 1, '2017-11-27', '2045.00', 'RI-0010946'),
(29, 1, 19, 1, '2017-11-27', '15.00', 'RI-0010942'),
(30, 1, 18, 1, '2017-11-27', '2.00', 'RI-0010945'),
(31, 1, 15, 1, '2017-11-27', '25.00', 'RI-0010941'),
(32, 1, 7, 1, '2017-11-27', '2400.00', 'RI-0010944');

-- --------------------------------------------------------

--
-- Table structure for table `limbah`
--

CREATE TABLE `limbah` (
  `id` int(3) NOT NULL,
  `id_sifat` int(2) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `limbah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limbah`
--

INSERT INTO `limbah` (`id`, `id_sifat`, `id_kategori`, `kode`, `limbah`) VALUES
(7, 1, 2, 'B105-d', 'Oli Bekas'),
(8, 2, 2, 'B104-d', 'Kemasan Terkontaminasi B3'),
(12, 1, 1, 'A332-1', 'Sludge Minyak'),
(13, 3, 1, 'A102-d', 'Aki Bekas'),
(14, 3, 2, 'B326-1', 'Batu Baterai Bekas'),
(15, 4, 2, 'B107-d', 'Lampu TL Bekas'),
(16, 4, 2, 'B353-1', 'Toner Printer Bekas'),
(17, 4, 2, 'B110-d', 'Majun dan Sarung Tangan Terkontaminasi B3'),
(18, 5, 2, 'B109-d', 'Filter Bekas'),
(19, 4, 2, 'B321-4', 'Kemasan Bekas Tinta');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(5) NOT NULL,
  `id_unit` int(3) NOT NULL,
  `id_sub_limbah` int(4) NOT NULL,
  `id_sumber` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `id_unit`, `id_sub_limbah`, `id_sumber`, `tanggal`, `jumlah`) VALUES
(25, 2, 17, 1, '2017-03-31', '29.00'),
(26, 2, 17, 1, '2017-12-01', '1.00'),
(27, 2, 12, 1, '2017-06-20', '5.00'),
(28, 2, 10, 5, '2017-10-23', '72400.00'),
(29, 2, 17, 1, '2018-02-25', '2.00'),
(30, 2, 17, 1, '2018-02-28', '3.00'),
(31, 2, 11, 1, '2018-02-25', '172.50'),
(32, 4, 17, 1, '2017-03-31', '37.00'),
(33, 4, 17, 1, '2017-06-16', '2.00'),
(34, 4, 17, 1, '2017-08-18', '30.00'),
(35, 4, 17, 1, '2017-10-19', '20.00'),
(36, 4, 17, 1, '2017-11-23', '20.00'),
(37, 4, 17, 1, '2017-12-22', '20.00'),
(38, 4, 14, 1, '2017-06-20', '8.00'),
(39, 4, 14, 1, '2017-08-18', '2.00'),
(40, 4, 14, 1, '2017-11-23', '10.00'),
(41, 4, 15, 1, '2017-12-22', '20.00'),
(42, 4, 2, 4, '2017-12-22', '2.00'),
(43, 4, 17, 1, '2018-01-26', '90.00'),
(44, 4, 17, 1, '2018-02-23', '110.00'),
(45, 4, 17, 1, '2018-03-23', '111.00'),
(46, 4, 14, 1, '2018-02-23', '20.00'),
(47, 4, 15, 1, '2018-03-23', '30.00'),
(48, 4, 16, 4, '2018-03-23', '8.00'),
(53, 4, 1, 1, '2018-04-20', '1000.00'),
(54, 1, 17, 1, '2017-03-24', '25.00'),
(55, 1, 17, 1, '2017-04-28', '5.00'),
(56, 1, 17, 1, '2017-06-02', '1.00'),
(57, 1, 17, 1, '2017-10-19', '19.00'),
(58, 1, 17, 1, '2017-11-23', '7.00'),
(59, 1, 2, 2, '2017-03-24', '15.60'),
(60, 1, 2, 2, '2017-04-28', '5.40'),
(61, 1, 2, 2, '2017-07-28', '14.00'),
(62, 1, 2, 2, '2017-08-18', '31.00'),
(63, 1, 2, 2, '2017-09-29', '15.00'),
(64, 1, 3, 2, '2017-03-24', '9.70'),
(65, 1, 3, 2, '2017-04-28', '7.30'),
(66, 1, 3, 2, '2017-07-28', '5.70'),
(67, 1, 3, 2, '2017-08-18', '14.10'),
(68, 1, 3, 2, '2017-09-29', '10.20'),
(69, 1, 4, 2, '2017-03-24', '20.00'),
(70, 1, 4, 2, '2017-04-28', '10.00'),
(71, 1, 4, 2, '2017-11-23', '1887.00'),
(72, 1, 18, 3, '2017-03-24', '5.00'),
(73, 1, 18, 3, '2017-04-28', '3.00'),
(74, 1, 18, 3, '2017-09-29', '1.00'),
(75, 1, 18, 3, '2017-10-19', '3.00'),
(76, 1, 18, 3, '2017-11-23', '3.00'),
(77, 1, 15, 1, '2017-03-24', '2.00'),
(78, 1, 12, 4, '2017-04-28', '25.00'),
(79, 1, 1, 1, '2017-10-19', '1000.00'),
(80, 1, 1, 1, '2017-11-23', '1400.00');

-- --------------------------------------------------------

--
-- Table structure for table `pengangkut`
--

CREATE TABLE `pengangkut` (
  `id` int(2) NOT NULL,
  `pengangkut` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengangkut`
--

INSERT INTO `pengangkut` (`id`, `pengangkut`) VALUES
(1, 'PT Rama Manunggal Perkasa'),
(2, 'PT Rama Manunggal Perkasa 2');

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE `sifat` (
  `id` int(2) NOT NULL,
  `sifat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`id`, `sifat`) VALUES
(1, 'Cairan Mudah Terbakar'),
(2, 'Kosong, Berbahaya bagi Lingkungan'),
(3, 'Korosif'),
(4, 'Beracun'),
(5, 'Padatan Mudah Terbakar');

-- --------------------------------------------------------

--
-- Table structure for table `sub_limbah`
--

CREATE TABLE `sub_limbah` (
  `id` int(4) NOT NULL,
  `id_limbah` int(3) NOT NULL,
  `sub_limbah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_limbah`
--

INSERT INTO `sub_limbah` (`id`, `id_limbah`, `sub_limbah`) VALUES
(1, 7, 'Oli bekas'),
(2, 8, 'Drum plastik'),
(3, 8, 'Jerigen'),
(4, 8, 'Karung'),
(10, 12, 'Sludge Minyak'),
(11, 13, 'Aki Bekas'),
(12, 15, 'Lampu TL Bekas'),
(13, 16, 'Toner Printer Bekas'),
(14, 18, 'Filter Oli dan Solar'),
(15, 18, 'Filter Udara'),
(16, 14, 'Batu Baterai Bekas'),
(17, 17, 'Majun dan Sarung Tangan Terkontaminasi B3'),
(18, 19, 'Kemasan Bekas Tinta');

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id` int(2) NOT NULL,
  `sumber` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id`, `sumber`) VALUES
(1, 'Pemeliharaan'),
(2, 'Operasi'),
(3, 'Adminitrasi'),
(4, 'Pemeliharaan Gedung'),
(5, 'Pemeliharaan Tangki');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(3) NOT NULL,
  `unit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit`) VALUES
(1, 'PLTP ULUBELU'),
(2, 'PLTD TELUK BETUNG'),
(3, 'PLTD/G TARAHAN'),
(4, 'PLTD TEGINENENG'),
(5, 'PLTA BATU TEGI'),
(6, 'PLTA BESAI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `level` int(2) NOT NULL,
  `id_unit` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `level`, `id_unit`) VALUES
(1, 'opulubelu', '74caf8996686fd050d86253e4c6aa50999c0c17119b9900fb3aa124608b6fb96941401d09027aacc14f9777fe8b2ac56892453a494ed8237fe87a6576814ff6c', 'Operator Ulubelu', NULL, 2, 1),
(2, 'opteluk', '1290632407d72a4ac2c0d41bacca60072734a20236aff887d55ed15fe788036d0389ec867b872efe535169736d52748af25a96130a4bd48e3973210434f17e7f', 'Operator Teluk Betung', 'agunggantengdh@gmail.com', 2, 2),
(3, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Administrator', 'adeirmarilyani@gmail.com', 1, NULL),
(4, 'optegineneng', 'c81607d69372189085c4799b043151909c5682848cbb88bb34b00c6c5898c86a3885f193e61ed063ecb68d3e845f2cf40792c3e6c1866f51a539d1888d89945b', 'Operator Tegineneng', 'agungsaptomargonodh@gmail.com', 2, 4),
(5, 'opbatutegi', '02808da7c26d23aa8ca91d1d9adce97724971a740815399120f5a9a90ff73dd22125a1e7933f4232f6430cee3eeb32911676a2798f974fabeea77eea7c4cf00d', 'Operator Batutegi', NULL, 2, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_masuk_id_limbah`
-- (See below for the actual view)
--
CREATE TABLE `v_masuk_id_limbah` (
`id` int(5)
,`id_unit` int(3)
,`id_sub_limbah` int(4)
,`id_sumber` int(2)
,`tanggal` date
,`jumlah` decimal(10,2)
,`id_limbah` int(3)
,`sub_limbah` varchar(128)
,`id_sifat` int(2)
,`id_kategori` int(2)
,`kode` varchar(128)
,`limbah` varchar(128)
);

-- --------------------------------------------------------

--
-- Structure for view `v_masuk_id_limbah`
--
DROP TABLE IF EXISTS `v_masuk_id_limbah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_masuk_id_limbah`  AS  select `m`.`id` AS `id`,`m`.`id_unit` AS `id_unit`,`m`.`id_sub_limbah` AS `id_sub_limbah`,`m`.`id_sumber` AS `id_sumber`,`m`.`tanggal` AS `tanggal`,`m`.`jumlah` AS `jumlah`,`sl`.`id_limbah` AS `id_limbah`,`sl`.`sub_limbah` AS `sub_limbah`,`l`.`id_sifat` AS `id_sifat`,`l`.`id_kategori` AS `id_kategori`,`l`.`kode` AS `kode`,`l`.`limbah` AS `limbah` from ((`masuk` `m` join `limbah` `l`) join `sub_limbah` `sl`) where ((`m`.`id_sub_limbah` = `sl`.`id`) and (`sl`.`id_limbah` = `l`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `golongan` (`kategori`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_dokumen` (`no_dokumen`),
  ADD KEY `id_limbah` (`id_limbah`),
  ADD KEY `id_pengangkut` (`id_pengangkut`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `limbah`
--
ALTER TABLE `limbah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_golongan` (`id_kategori`),
  ADD KEY `id_jenis` (`id_sifat`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_sub_limbah` (`id_sub_limbah`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `pengangkut`
--
ALTER TABLE `pengangkut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_limbah`
--
ALTER TABLE `sub_limbah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_limbah` (`id_limbah`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_unit` (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `limbah`
--
ALTER TABLE `limbah`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pengangkut`
--
ALTER TABLE `pengangkut`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_limbah`
--
ALTER TABLE `sub_limbah`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`id_limbah`) REFERENCES `limbah` (`id`),
  ADD CONSTRAINT `keluar_ibfk_2` FOREIGN KEY (`id_pengangkut`) REFERENCES `pengangkut` (`id`),
  ADD CONSTRAINT `keluar_ibfk_3` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id`);

--
-- Constraints for table `limbah`
--
ALTER TABLE `limbah`
  ADD CONSTRAINT `limbah_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `limbah_ibfk_2` FOREIGN KEY (`id_sifat`) REFERENCES `sifat` (`id`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id`),
  ADD CONSTRAINT `masuk_ibfk_3` FOREIGN KEY (`id_sub_limbah`) REFERENCES `sub_limbah` (`id`),
  ADD CONSTRAINT `masuk_ibfk_4` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id`);

--
-- Constraints for table `sub_limbah`
--
ALTER TABLE `sub_limbah`
  ADD CONSTRAINT `sub_limbah_ibfk_1` FOREIGN KEY (`id_limbah`) REFERENCES `limbah` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
