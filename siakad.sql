-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2016 at 05:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `blokir`
--

CREATE TABLE `blokir` (
  `id` int(11) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blokir`
--

INSERT INTO `blokir` (`id`, `npm`, `keterangan`, `status`) VALUES
(1, '1011080037', 'belum bayar daftar ulang semester 3', 'unblocked');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `no_dosen` varchar(25) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(25) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `no_dosen`, `nama_dosen`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`) VALUES
(2, 'dos-001', 'Okta Pilopa, A. md., S. Pd. I', 'Bandar Lampung', '1992-10-27', 'pria', 'islam', 'JL. P. Antasari Gg. Sadar No. 16 Bandar Lampung', '085768551713'),
(5, 'dos-003', 'Satya Fattah Ibrahim, S. Pd. I', 'Bandar Lampung', '2016-06-19', 'pria', 'islam', 'sukarame', '085768551713');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `keterangan`) VALUES
(5, 'MI-A', '-'),
(6, 'MI-B', '-');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `kode_mk` varchar(25) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `tanggal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `npm`, `kode_mk`, `semester`, `tanggal`) VALUES
(9, '1011080038', 'mk-001', '1', '2016/06/21'),
(10, '1011080038', 'mk-002', '1', '2016/06/21'),
(11, '1011080037', 'mk-002', '1', '2016/06/21'),
(12, '1011080037', 'mk-001', '1', '2016/06/21'),
(13, '1011080037', 'mk-001', '2', '2016/06/21');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `tahun_lulus` varchar(5) NOT NULL,
  `alamat_sekolah` varchar(255) DEFAULT NULL,
  `tahun_masuk_kuliah` varchar(10) NOT NULL,
  `id_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama_mhs`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `asal_sekolah`, `tahun_lulus`, `alamat_sekolah`, `tahun_masuk_kuliah`, `id_kelas`) VALUES
(1, '1011080037', 'okta', 'Bandar Lampung', '1992-10-27', 'pria', 'islam', '085768551713', 'JL. P. Antasari Gg. Sadar No. 16 Bandar Lampung', 'Perintis 1', '2016', 'Palapa', '2016', '5'),
(2, '1011080038', 'Rival RInaldy', 'Lhat', '1992-10-28', 'pria', 'islam', '085672626', 'Batara Nila', 'lahat', '2017', 'Lahat', '2016', '5');

-- --------------------------------------------------------

--
-- Table structure for table `mas_krs`
--

CREATE TABLE `mas_krs` (
  `id` int(11) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `angkatan` text NOT NULL,
  `semester` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_krs`
--

INSERT INTO `mas_krs` (`id`, `id_kelas`, `angkatan`, `semester`, `status`) VALUES
(2, '6', '2016', '2', 'no'),
(3, '5', '2016', '1', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(25) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_mk`, `nama_mk`, `sks`, `keterangan`) VALUES
(3, 'mk-001', 'Software Terapan', 3, ''),
(4, 'mk-002', 'pascal', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_akademik`
--

CREATE TABLE `pembimbing_akademik` (
  `id` int(11) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `kode_dosen` varchar(25) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing_akademik`
--

INSERT INTO `pembimbing_akademik` (`id`, `npm`, `kode_dosen`, `keterangan`) VALUES
(2, '1011080037', 'dos-003', NULL),
(5, '1011080038', 'dos-001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengampu_matakuliah`
--

CREATE TABLE `pengampu_matakuliah` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(25) NOT NULL,
  `kode_dosen` varchar(25) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengampu_matakuliah`
--

INSERT INTO `pengampu_matakuliah` (`id`, `kode_matkul`, `kode_dosen`, `keterangan`) VALUES
(3, 'mk-002', 'dos-003', NULL),
(4, 'mk-001', 'dos-001', NULL),
(5, 'mk-001', 'dos-003', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peruntukan_matakuliah`
--

CREATE TABLE `peruntukan_matakuliah` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(25) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peruntukan_matakuliah`
--

INSERT INTO `peruntukan_matakuliah` (`id`, `kode_mk`, `kode_kelas`, `angkatan`, `semester`) VALUES
(1, 'mk-002', '6', '2016', '1'),
(3, 'mk-001', '5', '2016', '9'),
(4, 'mk-002', '5', '2016', '2');

-- --------------------------------------------------------

--
-- Table structure for table `status_krs`
--

CREATE TABLE `status_krs` (
  `id` int(11) NOT NULL,
  `npm` varchar(25) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_krs`
--

INSERT INTO `status_krs` (`id`, `npm`, `semester`, `status`) VALUES
(1, '1011080037', 1, 'lihat'),
(2, '1011080037', 0, 'lihat'),
(3, '1011080037', 2, 'lihat'),
(4, '1011080037', 3, 'lihat'),
(5, '1011080037', 6, 'lihat'),
(6, '1011080038', 1, 'lihat'),
(7, '1011080038', 2, 'lihat'),
(8, '1011080038', 3, 'lihat'),
(9, '1011080038', 0, 'lihat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(5, 'Okta Pilopa', 'vendetta', '$2y$10$gOF5BSxTM3UxrVvmFNLPD.jppqbmfvIpnA1e.ReHHek/.7GyPobmu', 'admin'),
(8, 'Muhammad Iqbal', 'iqbal', '$2y$10$grVhObjd5xlMOIZlEcbloegtYDs8TcZvIpaTKtlPob.lTai8xlYtm', 'admin'),
(10, 'Okta Pilopa, A. md., S. Pd. I', 'dos-001', '$2y$10$qAK7rRWW9ZByn.MkAAkJ.emplzgbwrLDbd2I.CY8JcWcZqluHrJqy', 'dosen'),
(13, 'Satya Fattah Ibrahim, S. Pd. I', 'dos-003', '$2y$10$tpvvaDT.hx2tP8dC16Z2K.M2bBsLYC6cMWGsUkjRH6L3tYIuxaR7S', 'dosen'),
(14, 'okta', '1011080037', '$2y$10$3u7l7DbzM0/eZ5A9Y2FchOZnvlS8chkicDHDHZLcv4RU4IKfGGG7K', 'mahasiswa'),
(15, 'Rival RInaldy', '1011080038', '$2y$10$ez2tI.jcR7Adkzgf99nLDO1gQFqw5v68XKsZS66hjzRPxOtM8ayka', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blokir`
--
ALTER TABLE `blokir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_krs`
--
ALTER TABLE `mas_krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembimbing_akademik`
--
ALTER TABLE `pembimbing_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengampu_matakuliah`
--
ALTER TABLE `pengampu_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peruntukan_matakuliah`
--
ALTER TABLE `peruntukan_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_krs`
--
ALTER TABLE `status_krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blokir`
--
ALTER TABLE `blokir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mas_krs`
--
ALTER TABLE `mas_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembimbing_akademik`
--
ALTER TABLE `pembimbing_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengampu_matakuliah`
--
ALTER TABLE `pengampu_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peruntukan_matakuliah`
--
ALTER TABLE `peruntukan_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_krs`
--
ALTER TABLE `status_krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
