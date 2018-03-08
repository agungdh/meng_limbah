-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2018 at 05:42 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limbah_ade_menel`
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
  `id_user` int(11) NOT NULL,
  `id_limbah` int(11) NOT NULL,
  `id_pengangkut` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `no_dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `id_user`, `id_limbah`, `id_pengangkut`, `tanggal`, `jumlah`, `no_dokumen`) VALUES
(11, 1, 7, 1, '2018-03-06', '1.50', 'wraw'),
(12, 1, 7, 1, '2018-03-08', '1.00', '23'),
(13, 1, 7, 1, '2018-04-07', '1.00', '1247'),
(15, 1, 7, 1, '2018-03-06', '6.00', '3');

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
(8, 2, 2, 'B104-d', 'Kemasan Terkontaminasi B3');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sub_limbah` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `id_user`, `id_sub_limbah`, `id_sumber`, `tanggal`, `jumlah`) VALUES
(30, 1, 1, 1, '2018-03-06', '2.50'),
(31, 1, 1, 1, '2018-03-07', '3.00'),
(32, 1, 1, 1, '2018-04-30', '7.00');

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
(3, 8, 'Jerrycan'),
(4, 8, 'Karung');

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
(2, 'PLTD TELUK BETUNG');

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
  ADD KEY `id_user` (`id_user`);

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
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `limbah`
--
ALTER TABLE `limbah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengangkut`
--
ALTER TABLE `pengangkut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_limbah`
--
ALTER TABLE `sub_limbah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `keluar_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `masuk_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

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
