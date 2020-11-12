-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 09:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjlp`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(100) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `Pegawai` varchar(255) NOT NULL,
  `tglManual` varchar(255) NOT NULL,
  `kriteria1` varchar(255) NOT NULL,
  `kriteria2` varchar(255) NOT NULL,
  `kriteria3` varchar(255) NOT NULL,
  `kriteria4` varchar(255) NOT NULL,
  `totalNilai` varchar(255) NOT NULL,
  `nilaiRata2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `NIP`, `Pegawai`, `tglManual`, `kriteria1`, `kriteria2`, `kriteria3`, `kriteria4`, `totalNilai`, `nilaiRata2`) VALUES
('1', '1610511028', 'Agung Gumelar Santoso', '2019-12-11', '90', '90', '70', '90', '340', '85');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `NIP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Pegawai` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Akses` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `Keterangan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jam` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(1) NOT NULL,
  `komentar` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jamManual` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jamManual2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tglManual` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Submit` varchar(255) CHARACTER SET latin1 NOT NULL,
  `catatan` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `NIP`, `Pegawai`, `Akses`, `tgl_permintaan`, `Keterangan`, `gambar`, `jam`, `status`, `komentar`, `jamManual`, `jamManual2`, `tglManual`, `Submit`, `catatan`) VALUES
('1', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes5', '', '14:20', 0, '', '14:20', '14:20', '2019-12-11', 'berhasil', 'Tes5'),
('2', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes1', 'pv2.jpg', '14:18', 0, '', '14:18', '14:18', '2019-12-11', 'berhasil', 'Tes1'),
('3', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes6', '', '14:21', 0, '', '14:20', '14:20', '2019-12-11', 'berhasil', 'Tes6'),
('4', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes4', '', '14:20', 0, '', '14:20', '14:20', '2019-12-11', 'berhasil', 'Tes4'),
('5', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes2', 'pv2.jpg', '14:19', 0, ' ', '14:19', '14:19', '2019-12-11', 'berhasil', 'Tes2'),
('6', '1610511028', 'Agung Gumelar Santoso', 'Sub Bagian Tata Usaha', '2019-12-11', 'Tes3', '', '14:20', 1, '', '14:20', '14:20', '2019-12-11', 'berhasil', 'Tes3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `level` enum('Admin Sub Bagian Tata Usaha','Sub Bagian Tata Usaha','Admin Seksi Pelayanan dan Informasi','Seksi Pelayanan dan Informasi','Admin Seksi Prasarana dan Sarana','Seksi Prasarana dan Sarana','Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan','Seksi Konservarsi Peragaan Penelitian dan Pengembangan') CHARACTER SET latin1 NOT NULL,
  `AtasanSatu` varchar(255) CHARACTER SET latin1 NOT NULL,
  `AtasanDua` varchar(255) CHARACTER SET latin1 NOT NULL,
  `NipPegawai` varchar(255) CHARACTER SET latin1 NOT NULL,
  `NamaPegawai` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `Agama` enum('Islam','Kristen','Budha','Hindu','Konghucu') CHARACTER SET latin1 NOT NULL,
  `NoHp` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Alamat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `NipAtasanSatu` varchar(255) CHARACTER SET latin1 NOT NULL,
  `NipAtasanDua` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `penempatan` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `AtasanSatu`, `AtasanDua`, `NipPegawai`, `NamaPegawai`, `jenisKelamin`, `tempat_lahir`, `tanggal_lahir`, `Agama`, `NoHp`, `Alamat`, `Email`, `NipAtasanSatu`, `NipAtasanDua`, `foto`, `penempatan`) VALUES
('1', '1610511027', '202cb962ac59075b964b07152d234b70', 'Admin Sub Bagian Tata Usaha', 'Budi', '', '1610511027', 'Andika Rizky Pangestu', 'Laki-laki', 'Bekasi', '1998-12-05', 'Islam', '085438844883', 'Bekasi', 'andika@gmail.com', '2010511027', '', 'car_755x4302.jpg', ''),
('453964188', '1610511028', '202cb962ac59075b964b07152d234b70', 'Sub Bagian Tata Usaha', 'Ramadhani', '', '1610511028', 'Agung Gumelar Santoso', 'Laki-laki', 'Jakarta', '1988-11-10', 'Islam', '085423448733', 'Jakarta', 'agung@gmail.com', '2010511028', '', 'fotooo.png', 'Pendidikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
