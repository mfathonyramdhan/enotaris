-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 02:18 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enotaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_permohonan`
--

CREATE TABLE `tb_jenis_permohonan` (
  `id_jenis_permohonan` int(11) NOT NULL,
  `nama_jenis_permohonan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_permohonan`
--

INSERT INTO `tb_jenis_permohonan` (`id_jenis_permohonan`, `nama_jenis_permohonan`) VALUES
(1, 'Akta Tanah'),
(2, 'Pendirian CV/PT'),
(3, 'Ahli Waris'),
(4, 'Sewa Menyewa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level_user`
--

CREATE TABLE `tb_level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level_user`
--

INSERT INTO `tb_level_user` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `kode_permohonan` varchar(150) NOT NULL,
  `pemohon` int(11) NOT NULL,
  `jenis_permohonan` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `deadline` date DEFAULT NULL,
  `nama_cv` varchar(255) NOT NULL,
  `bidang_usaha` varchar(255) NOT NULL,
  `lokasi` varchar(250) NOT NULL,
  `luas_tanah` varchar(100) NOT NULL,
  `status_kepemilikan` varchar(100) NOT NULL,
  `scan_ktp` varchar(200) NOT NULL,
  `scan_kk` varchar(200) NOT NULL,
  `scan_pbb` varchar(200) NOT NULL,
  `scan_npwp` varchar(255) NOT NULL,
  `sertif_asli` varchar(255) NOT NULL,
  `foto_direktur` varchar(255) NOT NULL,
  `sk_desa` varchar(255) NOT NULL,
  `akta_kematian` varchar(255) NOT NULL,
  `sp_ahli_waris` varchar(255) NOT NULL,
  `biaya` varchar(150) DEFAULT NULL,
  `tgl_pelunasan` date NOT NULL,
  `status_permohonan` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `catatan` varchar(250) DEFAULT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL,
  `berkas_hasil` varchar(250) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `tahun_permohonan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `kode_permohonan`, `pemohon`, `jenis_permohonan`, `jenis_layanan`, `deadline`, `nama_cv`, `bidang_usaha`, `lokasi`, `luas_tanah`, `status_kepemilikan`, `scan_ktp`, `scan_kk`, `scan_pbb`, `scan_npwp`, `sertif_asli`, `foto_direktur`, `sk_desa`, `akta_kematian`, `sp_ahli_waris`, `biaya`, `tgl_pelunasan`, `status_permohonan`, `keterangan`, `catatan`, `bukti_pembayaran`, `berkas_hasil`, `tgl_permohonan`, `tahun_permohonan`) VALUES
(5, 'AKTA_YDW1', 3, 1, 'ppat', '2022-05-23', '', '', 'Jember', '200', 'Milik Sendiri', 'KTP_YDW1', 'KK_YDW1', 'PBB_YDW1', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', '', '', '', '2022-01-12', '2022'),
(6, 'AKNAH_evn2', 3, 1, 'ppat', '2022-05-23', '', '', '', '200', 'Milik Sendiri', 'KTP_AKNAH_evn2.pdf', 'KK_AKNAH_evn2.pdf', 'PBB_AKNAH_evn2.pdf', '', '', '', '', '', '', '2000000', '2022-01-13', 5, '', 'Permohonan selesai, silahkan unduh berkas anda', 'BUKTI_AKNAH_evn2.jpg', 'AktaTanah_AKNAH_evn2.jpg', '2022-01-12', '2022'),
(7, 'AKNAH_Bob2', 3, 1, 'ppat', '2022-05-25', '', '', 'Lumajang', '150', 'Milik Sendiri', 'KTP_AKNAH_Bob2.pdf', 'KK_AKNAH_Bob2.pdf', 'PBB_AKNAH_Bob2.pdf', '', '', '', '', '', '', '1500000', '2022-01-14', 5, '', 'Permohonan selesai, silahkan unduh berkas anda', 'BUKTI_AKNAH_Bob2.jpg', 'AktaTanah_AKNAH_Bob2.jpg', '2022-01-12', '2022'),
(8, 'AKNAH_QyR2', 3, 1, 'ppat', '2022-05-24', '', '', 'lumajang', '100', 'Milik Orang Tua', 'KTP_AKNAH_QyR2.pdf', 'KK_AKNAH_QyR2.pdf', 'PBB_AKNAH_QyR2.pdf', '', '', '', '', '', '', '1700000', '2022-01-14', 3, '', 'Sistem sedang melakukan pengecekan bukti pembayaran.', 'BUKTI_AKNAH_QyR2_jY9.jpg', '', '2022-01-12', '2022'),
(9, 'AKNAH_tcK2', 3, 1, 'ppat', '2022-05-26', '', '', 'Bondowoso', '130', 'Milik Sendiri', 'KTP_AKNAH_tcK2_XuV.pdf', 'KK_AKNAH_tcK2_XuV.pdf', 'PBB_AKNAH_tcK2_XuV.pdf', '', '', '', '', '', '', NULL, '2022-01-15', 1, '', 'Sistem sedang melakukan pengecekan dokumen.', '', '', '2022-01-12', '2022'),
(10, 'AKNAH_sW52', 3, 1, 'ppat', '2022-05-31', '', '', 'Surabaya', '170', 'Milik Sendiri', 'KTP_AKNAH_sW52.pdf', 'KK_AKNAH_sW52.pdf', 'PBB_AKNAH_sW52.pdf', '', '', '', '', '', '', '1750000', '2022-01-20', 2, '', 'Permohonan telah disetujui, segera lakukan pembayaran.', '', '', '2022-01-19', '2022'),
(12, 'CVPT_3gX1', 3, 2, 'notaris', NULL, 'PT. Sinar Media', '', 'Patrang, Jember', '', '', 'KTP_CVPT_3gX11.pdf', 'KK_CVPT_3gX11.pdf', 'PBB_CVPT_3gX11.pdf', 'NPWP_CVPT_3gX11.pdf', '', 'FTDR_CVPT_3gX11.jpeg', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-05-25', '2022'),
(13, 'WARIS_ZWi1', 3, 3, 'notaris', NULL, '', '', '', '', '', 'KTP_WARIS_ZWi1.pdf', 'KK_WARIS_ZWi1.pdf', '', '', '', '', 'SKDESA_WARIS_ZWi1.pdf', 'AKKEM_WARIS_ZWi1.pdf', 'SPAHWA_WARIS_ZWi1.pdf', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-05-26', '2022'),
(14, 'SEWA_Vxs1', 3, 4, 'notaris', NULL, '', '', '', '', '', 'KTP_SEWA_Vxs1.pdf', 'KK_SEWA_Vxs1.pdf', 'PBB_SEWA_Vxs1.pdf', '', 'SERTIF_SEWA_Vxs1.pdf', '', '', '', '', NULL, '0000-00-00', 1, 'Mencoba Form Perjanjian Sewa', NULL, '', '', '2022-05-31', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_permohonan`
--

CREATE TABLE `tb_status_permohonan` (
  `id_status_permohonan` int(11) NOT NULL,
  `nama_status_permohonan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status_permohonan`
--

INSERT INTO `tb_status_permohonan` (`id_status_permohonan`, `nama_status_permohonan`) VALUES
(1, 'Diajukan'),
(2, 'Disetujui'),
(3, 'Telah Dibayar'),
(4, 'Diproses'),
(5, 'Selesai'),
(6, 'Permohonan Ditolak'),
(7, 'Pembayaran Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto_profil` varchar(250) DEFAULT NULL,
  `level_user` int(11) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `nik`, `no_hp`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl_lahir`, `foto_profil`, `level_user`, `tgl_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '3508051110950001', '', '', 'lumajang', 'Jember', '2000-02-22', 'default.jpg', 1, '2022-04-20 14:48:55'),
(3, 'user', 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '350129502934', '', '', '', '', '0000-00-00', 'u.png', 2, '2022-04-20 15:30:35'),
(8, 'coba', 'coba@gmail.com', 'a3040f90cc20fa672fe31efcae41d2db', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-04-20 17:18:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  ADD PRIMARY KEY (`id_jenis_permohonan`);

--
-- Indexes for table `tb_level_user`
--
ALTER TABLE `tb_level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `fk_pemohon` (`pemohon`),
  ADD KEY `fk_status_permohonan` (`status_permohonan`),
  ADD KEY `fk_jenis_permohonan` (`jenis_permohonan`);

--
-- Indexes for table `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  ADD PRIMARY KEY (`id_status_permohonan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_level_user` (`level_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  MODIFY `id_jenis_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  MODIFY `id_status_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD CONSTRAINT `fk_jenis_permohonan` FOREIGN KEY (`jenis_permohonan`) REFERENCES `tb_jenis_permohonan` (`id_jenis_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemohon` FOREIGN KEY (`pemohon`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_permohonan` FOREIGN KEY (`status_permohonan`) REFERENCES `tb_status_permohonan` (`id_status_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_level_user` FOREIGN KEY (`level_user`) REFERENCES `tb_level_user` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
