-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 01:27 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_cd` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mp_cd` varchar(10) NOT NULL,
  `work_ind` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_cd`, `nama`, `nip`, `jns_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telp`, `pendidikan`, `jabatan`, `password`, `mp_cd`, `work_ind`) VALUES
('GRMPX1-1', 'Danny Bastian', '123', 'Laki-Laki', 'Batam', '1996-10-26', 'Batam', '081372135162', 'Sarjana (S', 'Guru Tetap', '123', 'MP-X1', '1'),
('GRMPX4-1', 'Magfiral Dandi', '321', 'Perempuan', 'Kendari', '2021-12-22', 'Kendari', '321', 'Magister (', 'Guru Honorer', '321', 'MP-X4', '1'),
('GRMPX2-1', 'Aryfandy', '111', 'Perempuan', 'Bandung', '2020-01-22', 'Bandung', '111', 'Doctor (S3', 'Kepala Sekolah', '111', 'MP-X2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `row_id` int(11) NOT NULL,
  `kelas_cd` varchar(10) NOT NULL,
  `mp_cd` varchar(10) NOT NULL,
  `guru_cd` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`row_id`, `kelas_cd`, `mp_cd`, `guru_cd`, `hari`, `jam`) VALUES
(1, 'X-1', 'MP-X1', 'GRMPX1-1', 'Senin', 1),
(2, 'X-1', 'MP-X2', 'GRMPX2-1', 'Senin', 2),
(3, 'X-1', 'MP-X4', 'GRMPX4-1', 'Senin', 3),
(4, 'X-1', 'MP-X1', 'GRMPX1-1', 'Senin', 4),
(5, 'X-1', 'MP-X2', 'GRMPX2-1', 'Senin', 5),
(6, 'X-1', 'MP-X4', 'GRMPX4-1', 'Senin', 6),
(7, 'X-1', '', '', 'Selasa', 1),
(8, 'X-1', '', '', 'Selasa', 2),
(9, 'X-1', '', '', 'Selasa', 3),
(10, 'X-1', '', '', 'Selasa', 4),
(11, 'X-1', '', '', 'Selasa', 5),
(12, 'X-1', '', '', 'Selasa', 6),
(13, 'X-1', '', '', 'Rabu', 1),
(14, 'X-1', '', '', 'Rabu', 2),
(15, 'X-1', '', '', 'Rabu', 3),
(16, 'X-1', '', '', 'Rabu', 4),
(17, 'X-1', '', '', 'Rabu', 5),
(18, 'X-1', '', '', 'Rabu', 6),
(19, 'X-1', '', '', 'Kamis', 1),
(20, 'X-1', '', '', 'Kamis', 2),
(21, 'X-1', '', '', 'Kamis', 3),
(22, 'X-1', '', '', 'Kamis', 4),
(23, 'X-1', '', '', 'Kamis', 5),
(24, 'X-1', '', '', 'Kamis', 6),
(25, 'X-1', '', '', 'Jumat', 1),
(26, 'X-1', '', '', 'Jumat', 2),
(27, 'X-1', '', '', 'Jumat', 3),
(28, 'X-1', '', '', 'Jumat', 4),
(29, 'X-1', '', '', 'Jumat', 5),
(30, 'X-1', '', '', 'Jumat', 6),
(31, 'X-2', '', '', 'Senin', 1),
(32, 'X-2', '', '', 'Senin', 2),
(33, 'X-2', '', '', 'Senin', 3),
(34, 'X-2', '', '', 'Senin', 4),
(35, 'X-2', '', '', 'Senin', 5),
(36, 'X-2', '', '', 'Senin', 6),
(37, 'X-2', '', '', 'Selasa', 1),
(38, 'X-2', '', '', 'Selasa', 2),
(39, 'X-2', '', '', 'Selasa', 3),
(40, 'X-2', '', '', 'Selasa', 4),
(41, 'X-2', '', '', 'Selasa', 5),
(42, 'X-2', '', '', 'Selasa', 6),
(43, 'X-2', '', '', 'Rabu', 1),
(44, 'X-2', '', '', 'Rabu', 2),
(45, 'X-2', '', '', 'Rabu', 3),
(46, 'X-2', '', '', 'Rabu', 4),
(47, 'X-2', '', '', 'Rabu', 5),
(48, 'X-2', '', '', 'Rabu', 6),
(49, 'X-2', '', '', 'Kamis', 1),
(50, 'X-2', '', '', 'Kamis', 2),
(51, 'X-2', '', '', 'Kamis', 3),
(52, 'X-2', '', '', 'Kamis', 4),
(53, 'X-2', '', '', 'Kamis', 5),
(54, 'X-2', '', '', 'Kamis', 6),
(55, 'X-2', '', '', 'Jumat', 1),
(56, 'X-2', '', '', 'Jumat', 2),
(57, 'X-2', '', '', 'Jumat', 3),
(58, 'X-2', '', '', 'Jumat', 4),
(59, 'X-2', '', '', 'Jumat', 5),
(60, 'X-2', '', '', 'Jumat', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_cd` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `guru_cd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_cd`, `kelas`, `guru_cd`) VALUES
('X-1', 'X', 'GRMPX1-1'),
('X-2', 'X', 'GRMPX2-1');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `mp_cd` varchar(10) NOT NULL,
  `nama_mp` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`mp_cd`, `nama_mp`, `kelas`) VALUES
('MP-X1', 'Agama', 'X'),
('MP-X2', 'Biologi', 'X'),
('MP-X3', 'Matematika', 'X'),
('MP-X4', 'Bhs. Indonesia', 'X'),
('MP-X5', 'Bhs. Inggris', 'X'),
('MP-XI1', 'Aljabar Linear', 'XI'),
('MP-XI2', 'Matematika II', 'XI'),
('MP-XII1', 'Matematika III', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `row_id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `guru_cd` varchar(10) NOT NULL,
  `mp_cd` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `lulus_ind` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas_cd` varchar(10) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_keluar` year(4) NOT NULL,
  `alumni_ind` int(1) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_login_ind` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `kelas_cd`, `tahun_masuk`, `tahun_keluar`, `alumni_ind`, `password`, `first_login_ind`) VALUES
('321', 'Manroe', '', '0000-00-00', '', 'X-1', 0000, 0000, 1, 'sPass', 0),
('4321', 'Manroee', '', '0000-00-00', '', 'X-1', 2020, 0000, 0, '4321', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(11) NOT NULL,
  `user_ind` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `email`, `user_ind`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin@gmail', 1),
(2, 'siswa1', 'siswa1', 'siswa1', 'siswa1@gmai', 2),
(3, 'Guru', 'guru', 'guru', 'guru@gmail.', 3),
(4, 'Kepala Sekolah', 'kepsek', 'kepsek', 'kepsek@gmai', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
