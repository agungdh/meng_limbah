-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 09:42 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limbahb3`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `golongan` int(11) NOT NULL,
  `masa_berlaku_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `golongan`, `masa_berlaku_hari`) VALUES
(1, 1, 180),
(2, 2, 365);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`) VALUES
(1, 'Cairan Mudah Terbakar'),
(2, 'Kosong, Berbahaya bagi Lingkungan'),
(3, 'Korosif'),
(4, 'Beracun'),
(5, 'Padatan Mudah Terbakar');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_limbah` int(11) NOT NULL,
  `id_pengangkut` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `no_dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `id_unit`, `id_limbah`, `id_pengangkut`, `tanggal`, `jumlah`, `no_dokumen`) VALUES
(34, 2, 7, 1, '2018-03-07', '10.00', 'dfa32'),
(35, 2, 8, 2, '2018-03-15', '20.00', 'vgh34'),
(36, 2, 12, 2, '2018-03-15', '10.00', 'cdd8123'),
(37, 2, 13, 2, '2018-03-06', '40.00', 'sdbu3143'),
(38, 2, 14, 1, '2018-03-24', '40.00', 'dsjbsa732'),
(39, 2, 15, 1, '2018-03-12', '50.00', 'sdnkj342'),
(40, 1, 13, 1, '2018-03-22', '25.00', 'sdfnkjs783'),
(41, 1, 16, 2, '2018-03-23', '20.00', 'asnb23'),
(43, 1, 7, 1, '2018-03-27', '100.00', 'bnvjh 324'),
(45, 1, 8, 2, '2018-03-28', '100.00', 'jhvk45'),
(46, 1, 12, 2, '2018-03-29', '50.00', 'bvjgcght43'),
(47, 1, 14, 2, '2018-03-30', '100.00', 'ebfnerkj324'),
(48, 1, 15, 1, '2018-03-29', '100.00', 'hnvhjv235'),
(49, 1, 17, 1, '2018-03-29', '100.00', 'ansbdq434'),
(50, 1, 18, 1, '2018-03-30', '100.00', 'nvgc24'),
(51, 1, 19, 2, '2018-03-30', '100.00', 'hftcgd46');

-- --------------------------------------------------------

--
-- Table structure for table `limbah`
--

CREATE TABLE `limbah` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `limbah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limbah`
--

INSERT INTO `limbah` (`id`, `id_jenis`, `id_golongan`, `kode`, `limbah`) VALUES
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
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_sub_limbah` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `id_unit`, `id_sub_limbah`, `id_sumber`, `tanggal`, `jumlah`) VALUES
(63, 2, 2, 2, '2019-01-01', '1243.00'),
(66, 2, 2, 2, '2018-03-05', '632.00'),
(67, 2, 3, 5, '2018-03-21', '67.00'),
(68, 2, 4, 1, '2018-03-21', '890.00'),
(69, 2, 10, 2, '2018-03-22', '231.00'),
(70, 2, 11, 4, '2018-03-16', '820.00'),
(71, 2, 12, 4, '2018-03-12', '213.00'),
(72, 2, 13, 3, '2018-03-15', '98.00'),
(73, 2, 14, 2, '2018-03-13', '65.00'),
(74, 2, 15, 1, '2018-03-22', '45.00'),
(75, 1, 11, 1, '2018-03-21', '250.00'),
(76, 1, 13, 3, '2018-03-15', '50.00'),
(77, 2, 16, 1, '2018-03-16', '60.00'),
(78, 2, 11, 2, '2018-03-21', '10.00'),
(79, 2, 1, 2, '2018-03-26', '6.00'),
(80, 1, 1, 1, '2018-03-14', '500.00'),
(81, 1, 2, 4, '2018-03-09', '400.00'),
(82, 1, 3, 5, '2018-03-13', '600.00'),
(83, 1, 4, 4, '2018-03-09', '500.00'),
(84, 1, 10, 1, '2018-02-08', '500.00'),
(85, 1, 12, 1, '2018-02-22', '400.00'),
(86, 1, 14, 5, '2018-02-16', '500.00'),
(87, 1, 16, 1, '2018-03-21', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `pengangkut`
--

CREATE TABLE `pengangkut` (
  `id` int(11) NOT NULL,
  `pengangkut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengangkut`
--

INSERT INTO `pengangkut` (`id`, `pengangkut`) VALUES
(1, 'PT Rama Manunggal Perkasa'),
(2, 'PT Rama Manunggal Perkasa 2');

-- --------------------------------------------------------

--
-- Table structure for table `sub_limbah`
--

CREATE TABLE `sub_limbah` (
  `id` int(11) NOT NULL,
  `id_limbah` int(11) NOT NULL,
  `sub_limbah` varchar(255) NOT NULL
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
(16, 14, 'Batu Baterai Bekas');

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id` int(11) NOT NULL,
  `sumber` varchar(255) NOT NULL
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
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
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
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`, `id_unit`) VALUES
(1, 'opulubelu', '74caf8996686fd050d86253e4c6aa50999c0c17119b9900fb3aa124608b6fb96941401d09027aacc14f9777fe8b2ac56892453a494ed8237fe87a6576814ff6c', 'Operator Ulubelu', 2, 1),
(2, 'opteluk', '1290632407d72a4ac2c0d41bacca60072734a20236aff887d55ed15fe788036d0389ec867b872efe535169736d52748af25a96130a4bd48e3973210434f17e7f', 'Operator Teluk Betung', 2, 2),
(3, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Administrator', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `golongan` (`golongan`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_jenis` (`id_jenis`);

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
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `limbah`
--
ALTER TABLE `limbah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `pengangkut`
--
ALTER TABLE `pengangkut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_limbah`
--
ALTER TABLE `sub_limbah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `limbah_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`),
  ADD CONSTRAINT `limbah_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
