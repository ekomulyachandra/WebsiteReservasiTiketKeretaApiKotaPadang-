-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 04:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keretaapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `namakelas` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `namakelas`, `harga`) VALUES
(1, 'Bisnis', 5000),
(2, 'Ekonomi', 10000),
(3, 'VVIP', 100000),
(4, 'VIP', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggalberangkat` date NOT NULL,
  `tanggaltiba` date NOT NULL,
  `jamberangkat` varchar(20) NOT NULL,
  `jamtiba` varchar(20) NOT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`id`, `nama`, `tanggalberangkat`, `tanggaltiba`, `jamberangkat`, `jamtiba`, `dari`, `ke`, `id_kelas`, `stok`) VALUES
(5, 'kereta indonesia', '2019-11-03', '2019-11-03', '07.00 am', '09.00 am', 1, 3, 1, 51),
(6, 'kereta indonesia', '2019-11-03', '2019-11-03', '10.00 am', '12.00 am', 1, 3, 4, 97),
(7, 'Kereta Indonesia', '2019-11-03', '2019-11-03', '02.00 pm', '04.00 pm', 1, 3, 2, 100),
(8, 'Kereta Maju Cantik', '2019-11-01', '2019-11-01', '01 00 pm', '03 00 pm', 1, 3, 1, 100),
(9, 'Kereta Putra Tunggal', '2019-11-01', '2019-11-01', '05 00 pm', '06 00 pm', 1, 3, 1, 100),
(10, 'Kereta Indonesia', '2020-01-05', '2020-01-05', '09.00 am', '11.00 am', 1, 3, 1, 98),
(11, 'Kereta Indonesia ', '2020-01-05', '2020-01-05', '01.00 pm', '03.00 pm', 1, 3, 1, 97),
(12, 'Kereta Maju Jaya', '2020-01-05', '2020-01-05', '08.00 am', '09.30 am', 1, 4, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `namakota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `namakota`) VALUES
(1, 'Padang'),
(3, 'Bukittinggi'),
(4, 'Kayu Tanam');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nohp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `email`, `password`, `alamat`, `kota`, `tgl_lahir`, `nohp`) VALUES
(3, 'Muhammad Fahrrurozi', 'rozi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Solok Selatan', 'solok', '2019-10-02', '081234354646'),
(4, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kuranji', 'Solok', '2019-10-19', '081234354646'),
(5, 'Salsabila', 'salsabila@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Siteba', 'India', '2019-10-03', '08757575577'),
(6, 'Eko Mulya Chandra', 'eko@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Kuranji', 'Padang', '1999-08-16', '087894527128');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `faktur` varchar(30) NOT NULL,
  `id_kereta` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalbayar` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`faktur`, `id_kereta`, `id_pelanggan`, `nama_pelanggan`, `email`, `tgl_berangkat`, `jumlah`, `totalbayar`, `status`) VALUES
('191225-001', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Sudah Dibayar'),
('191225-002', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Sudah Dibayar'),
('191225-003', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 3, 15000, 'Sudah Dibayar'),
('191225-004', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 3, 15000, 'Sudah Dibayar'),
('191225-005', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Sudah Dibayar'),
('191225-006', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Sudah Dibayar'),
('191225-007', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Belum Dibayar'),
('191225-008', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 3, 15000, 'Belum Dibayar'),
('191225-009', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Belum Dibayar'),
('191225-010', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 4, 20000, 'Belum Dibayar'),
('191226-001', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 2, 10000, 'Belum Dibayar'),
('191226-002', 5, 4, 'admin', 'admin@gmail.com', '0000-00-00', 1, 5000, 'Sudah Dibayar'),
('191227-001', 6, 4, 'admin', 'admin@gmail.com', '0000-00-00', 2, 70000, 'Sudah Dibayar'),
('191227-002', 6, 4, 'admin', 'admin@gmail.com', '0000-00-00', 1, 35000, 'Sudah Dibayar'),
('200103-001', 11, 4, 'admin', 'admin@gmail.com', '2020-01-05', 2, 10000, 'Belum Dibayar'),
('200103-002', 11, 4, 'admin', 'admin@gmail.com', '2020-01-05', 1, 5000, 'Belum Dibayar'),
('200103-003', 5, 4, 'admin', 'admin@gmail.com', '2019-11-03', 1, 5000, 'Belum Dibayar'),
('200103-004', 10, 4, 'admin', 'admin@gmail.com', '2020-01-05', 2, 10000, 'Sudah Dibayar');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `penjualan_tiket` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN 
	UPDATE kereta SET stok=stok-new.jumlah
    WHERE id = NEW.id_kereta;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jekel` varchar(12) NOT NULL,
  `notelp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `jekel`, `notelp`, `alamat`, `jabatan`) VALUES
(1, 'robert', 'laki-laki', '087575757577', 'kuranji', 'Masinis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `photo`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'camat.jpg'),
('ekomulyachandra', '827ccb0eea8a706c4c34a16891f84e7b', 'Petugas', 'logolurah.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `dari` (`dari`),
  ADD KEY `ke` (`ke`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`faktur`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kereta` (`id_kereta`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kereta`
--
ALTER TABLE `kereta`
  ADD CONSTRAINT `kereta_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `kereta_ibfk_2` FOREIGN KEY (`dari`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `kereta_ibfk_3` FOREIGN KEY (`ke`) REFERENCES `kota` (`id`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_kereta`) REFERENCES `kereta` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
