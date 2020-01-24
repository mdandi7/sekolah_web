-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 01:04 AM
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
  `pendidikan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mp_cd` varchar(10) NOT NULL,
  `work_ind` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_cd`, `nama`, `nip`, `jns_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telp`, `pendidikan`, `jabatan`, `password`, `mp_cd`, `work_ind`) VALUES
('GRMPX1-1', 'Danny Bastian', '123', 'Laki-Laki', 'Batam', '1996-10-26', 'Batam', '081372135162', 'Sarjana (S1)', 'Guru Tetap', '123', 'MP-X1', '1'),
('GRMPX4-1', 'Magfiral Dandi', '321', 'Perempuan', 'Kendari', '1996-10-26', 'Batam', '081372135162', 'Sarjana (S', 'Guru Honorer', '321', 'MP-X4', '1'),
('GRMPX2-1', 'Arufandy', '111', 'Perempuan', 'Batam', '1996-10-26', 'Batam', '081372135162', 'Sarjana (S', 'Kepala Sekolah', '111', 'MP-X2', '1');

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
(4, 'X-1', 'MP-X4', 'GRMPX4-1', 'Senin', 4),
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
(60, 'X-2', '', '', 'Jumat', 6),
(61, 'XI-1', '', '', 'Senin', 1),
(62, 'XI-1', '', '', 'Senin', 2),
(63, 'XI-1', '', '', 'Senin', 3),
(64, 'XI-1', '', '', 'Senin', 4),
(65, 'XI-1', '', '', 'Senin', 5),
(66, 'XI-1', '', '', 'Senin', 6),
(67, 'XI-1', '', '', 'Selasa', 1),
(68, 'XI-1', '', '', 'Selasa', 2),
(69, 'XI-1', '', '', 'Selasa', 3),
(70, 'XI-1', '', '', 'Selasa', 4),
(71, 'XI-1', '', '', 'Selasa', 5),
(72, 'XI-1', '', '', 'Selasa', 6),
(73, 'XI-1', '', '', 'Rabu', 1),
(74, 'XI-1', '', '', 'Rabu', 2),
(75, 'XI-1', '', '', 'Rabu', 3),
(76, 'XI-1', '', '', 'Rabu', 4),
(77, 'XI-1', '', '', 'Rabu', 5),
(78, 'XI-1', '', '', 'Rabu', 6),
(79, 'XI-1', '', '', 'Kamis', 1),
(80, 'XI-1', '', '', 'Kamis', 2),
(81, 'XI-1', '', '', 'Kamis', 3),
(82, 'XI-1', '', '', 'Kamis', 4),
(83, 'XI-1', '', '', 'Kamis', 5),
(84, 'XI-1', '', '', 'Kamis', 6),
(85, 'XI-1', '', '', 'Jumat', 1),
(86, 'XI-1', '', '', 'Jumat', 2),
(87, 'XI-1', '', '', 'Jumat', 3),
(88, 'XI-1', '', '', 'Jumat', 4),
(89, 'XI-1', '', '', 'Jumat', 5),
(90, 'XI-1', '', '', 'Jumat', 6),
(91, 'XII-1', '', '', 'Senin', 1),
(92, 'XII-1', '', '', 'Senin', 2),
(93, 'XII-1', '', '', 'Senin', 3),
(94, 'XII-1', '', '', 'Senin', 4),
(95, 'XII-1', '', '', 'Senin', 5),
(96, 'XII-1', '', '', 'Senin', 6),
(97, 'XII-1', '', '', 'Selasa', 1),
(98, 'XII-1', '', '', 'Selasa', 2),
(99, 'XII-1', '', '', 'Selasa', 3),
(100, 'XII-1', '', '', 'Selasa', 4),
(101, 'XII-1', '', '', 'Selasa', 5),
(102, 'XII-1', '', '', 'Selasa', 6),
(103, 'XII-1', '', '', 'Rabu', 1),
(104, 'XII-1', '', '', 'Rabu', 2),
(105, 'XII-1', '', '', 'Rabu', 3),
(106, 'XII-1', '', '', 'Rabu', 4),
(107, 'XII-1', '', '', 'Rabu', 5),
(108, 'XII-1', '', '', 'Rabu', 6),
(109, 'XII-1', '', '', 'Kamis', 1),
(110, 'XII-1', '', '', 'Kamis', 2),
(111, 'XII-1', '', '', 'Kamis', 3),
(112, 'XII-1', '', '', 'Kamis', 4),
(113, 'XII-1', '', '', 'Kamis', 5),
(114, 'XII-1', '', '', 'Kamis', 6),
(115, 'XII-1', '', '', 'Jumat', 1),
(116, 'XII-1', '', '', 'Jumat', 2),
(117, 'XII-1', '', '', 'Jumat', 3),
(118, 'XII-1', '', '', 'Jumat', 4),
(119, 'XII-1', '', '', 'Jumat', 5),
(120, 'XII-1', '', '', 'Jumat', 6),
(121, 'X-1', '', '', 'Senin', 1),
(122, 'X-1', '', '', 'Senin', 2),
(123, 'X-1', '', '', 'Senin', 3),
(124, 'X-1', '', '', 'Senin', 4),
(125, 'X-1', '', '', 'Senin', 5),
(126, 'X-1', '', '', 'Senin', 6),
(127, 'X-1', '', '', 'Selasa', 1),
(128, 'X-1', '', '', 'Selasa', 2),
(129, 'X-1', '', '', 'Selasa', 3),
(130, 'X-1', '', '', 'Selasa', 4),
(131, 'X-1', '', '', 'Selasa', 5),
(132, 'X-1', '', '', 'Selasa', 6),
(133, 'X-1', '', '', 'Rabu', 1),
(134, 'X-1', '', '', 'Rabu', 2),
(135, 'X-1', '', '', 'Rabu', 3),
(136, 'X-1', '', '', 'Rabu', 4),
(137, 'X-1', '', '', 'Rabu', 5),
(138, 'X-1', '', '', 'Rabu', 6),
(139, 'X-1', '', '', 'Kamis', 1),
(140, 'X-1', '', '', 'Kamis', 2),
(141, 'X-1', '', '', 'Kamis', 3),
(142, 'X-1', '', '', 'Kamis', 4),
(143, 'X-1', '', '', 'Kamis', 5),
(144, 'X-1', '', '', 'Kamis', 6),
(145, 'X-1', '', '', 'Jumat', 1),
(146, 'X-1', '', '', 'Jumat', 2),
(147, 'X-1', '', '', 'Jumat', 3),
(148, 'X-1', '', '', 'Jumat', 4),
(149, 'X-1', '', '', 'Jumat', 5),
(150, 'X-1', '', '', 'Jumat', 6),
(151, 'X-2', '', '', 'Senin', 1),
(152, 'X-2', '', '', 'Senin', 2),
(153, 'X-2', '', '', 'Senin', 3),
(154, 'X-2', '', '', 'Senin', 4),
(155, 'X-2', '', '', 'Senin', 5),
(156, 'X-2', '', '', 'Senin', 6),
(157, 'X-2', '', '', 'Selasa', 1),
(158, 'X-2', '', '', 'Selasa', 2),
(159, 'X-2', '', '', 'Selasa', 3),
(160, 'X-2', '', '', 'Selasa', 4),
(161, 'X-2', '', '', 'Selasa', 5),
(162, 'X-2', '', '', 'Selasa', 6),
(163, 'X-2', '', '', 'Rabu', 1),
(164, 'X-2', '', '', 'Rabu', 2),
(165, 'X-2', '', '', 'Rabu', 3),
(166, 'X-2', '', '', 'Rabu', 4),
(167, 'X-2', '', '', 'Rabu', 5),
(168, 'X-2', '', '', 'Rabu', 6),
(169, 'X-2', '', '', 'Kamis', 1),
(170, 'X-2', '', '', 'Kamis', 2),
(171, 'X-2', '', '', 'Kamis', 3),
(172, 'X-2', '', '', 'Kamis', 4),
(173, 'X-2', '', '', 'Kamis', 5),
(174, 'X-2', '', '', 'Kamis', 6),
(175, 'X-2', '', '', 'Jumat', 1),
(176, 'X-2', '', '', 'Jumat', 2),
(177, 'X-2', '', '', 'Jumat', 3),
(178, 'X-2', '', '', 'Jumat', 4),
(179, 'X-2', '', '', 'Jumat', 5),
(180, 'X-2', '', '', 'Jumat', 6),
(181, 'XI-1', '', '', 'Senin', 1),
(182, 'XI-1', '', '', 'Senin', 2),
(183, 'XI-1', '', '', 'Senin', 3),
(184, 'XI-1', '', '', 'Senin', 4),
(185, 'XI-1', '', '', 'Senin', 5),
(186, 'XI-1', '', '', 'Senin', 6),
(187, 'XI-1', '', '', 'Selasa', 1),
(188, 'XI-1', '', '', 'Selasa', 2),
(189, 'XI-1', '', '', 'Selasa', 3),
(190, 'XI-1', '', '', 'Selasa', 4),
(191, 'XI-1', '', '', 'Selasa', 5),
(192, 'XI-1', '', '', 'Selasa', 6),
(193, 'XI-1', '', '', 'Rabu', 1),
(194, 'XI-1', '', '', 'Rabu', 2),
(195, 'XI-1', '', '', 'Rabu', 3),
(196, 'XI-1', '', '', 'Rabu', 4),
(197, 'XI-1', '', '', 'Rabu', 5),
(198, 'XI-1', '', '', 'Rabu', 6),
(199, 'XI-1', '', '', 'Kamis', 1),
(200, 'XI-1', '', '', 'Kamis', 2),
(201, 'XI-1', '', '', 'Kamis', 3),
(202, 'XI-1', '', '', 'Kamis', 4),
(203, 'XI-1', '', '', 'Kamis', 5),
(204, 'XI-1', '', '', 'Kamis', 6),
(205, 'XI-1', '', '', 'Jumat', 1),
(206, 'XI-1', '', '', 'Jumat', 2),
(207, 'XI-1', '', '', 'Jumat', 3),
(208, 'XI-1', '', '', 'Jumat', 4),
(209, 'XI-1', '', '', 'Jumat', 5),
(210, 'XI-1', '', '', 'Jumat', 6);

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
('X-2', 'X', 'GRMPX2-1'),
('XI-1', 'XI', 'GRMPX4-1');

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
('MP-XI1', 'Aljabar Linear', 'XI'),
('MP-XI2', 'Matematika II', 'XI'),
('MP-XII1', 'Matematika III', 'XII'),
('MP-X5', 'Bahasa Inggris', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `row_id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `kelas_cd` varchar(10) NOT NULL,
  `guru_cd` varchar(10) NOT NULL,
  `mp_cd` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`row_id`, `nisn`, `kelas_cd`, `guru_cd`, `mp_cd`, `nilai`) VALUES
(2, '321', 'X-1', 'GRMPX1-1', 'MP-X1', 80);

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
  `telp` varchar(20) NOT NULL,
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

INSERT INTO `siswa` (`nisn`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `telp`, `kelas_cd`, `tahun_masuk`, `tahun_keluar`, `alumni_ind`, `password`, `first_login_ind`) VALUES
('321', 'Nida', 'Perempuan', '2020-01-17', 'Bogor', '08465', 'X-1', 0000, 0000, 0, '321', 0),
('4321', 'Dika', 'Laki-Laki', '2020-01-17', 'Jakarta', '01852', 'X-1', 2020, 0000, 0, '4321', 0);

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
