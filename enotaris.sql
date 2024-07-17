-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 04:35 AM
-- Server version: 10.1.38-MariaDB
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
(4, 'Sewa Menyewa'),
(5, 'Perubahan RRUPS'),
(6, 'Pendirian Yayasan'),
(7, 'Perjanjian Lain-Lain'),
(8, 'Permohonan Pengurusan Hibah'),
(9, 'Jual Beli Tanah'),
(10, 'Tukar Menukar Tanah'),
(11, 'Pemberian Kuasa atas Pembebanan Hak Tanggungan'),
(12, 'Pembagian atas Hak Bersama Terhadap Tanah'),
(13, 'Pembuatan APHT (Akta Pemberian Hak Tanggungan)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `jumlah` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `saldo_terakhir` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keuangan`
--

INSERT INTO `tb_keuangan` (`id_keuangan`, `jumlah`, `status`, `tanggal`, `bulan`, `saldo_terakhir`, `keterangan`) VALUES
(24, '1000000', 'Pemasukan', '2022-06-22', 'June', '1000000', 'Pemasukan dari Kode PermohonanSEWA_e7V1');

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
  `tahun_permohonan` varchar(50) NOT NULL,
  `jbtnh_namapenjual` varchar(100) NOT NULL,
  `jbtnh_namapembeli` varchar(100) NOT NULL,
  `jbtnh_nohppenjual` varchar(15) NOT NULL,
  `jbtnh_nohppembeli` varchar(15) NOT NULL,
  `scan_snikah` varchar(100) NOT NULL,
  `scan_bpjs` varchar(100) NOT NULL,
  `sertif_tanah` varchar(100) NOT NULL,
  `scan_ktp2` varchar(100) NOT NULL,
  `scan_kk2` varchar(100) NOT NULL,
  `scan_snikah2` varchar(100) NOT NULL,
  `scan_pbb2` varchar(100) NOT NULL,
  `sertif_tanah2` varchar(100) NOT NULL,
  `scan_npwp2` varchar(100) NOT NULL,
  `scan_bpjs2` varchar(100) NOT NULL,
  `tkrtnh_namapihak1` varchar(100) NOT NULL,
  `tkrtnh_namapihak2` varchar(100) NOT NULL,
  `tkrtnh_nohppihak1` varchar(100) NOT NULL,
  `tkrtnh_nohppihak2` varchar(100) NOT NULL,
  `nobulanan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `kode_permohonan`, `pemohon`, `jenis_permohonan`, `jenis_layanan`, `deadline`, `nama_cv`, `bidang_usaha`, `lokasi`, `luas_tanah`, `status_kepemilikan`, `scan_ktp`, `scan_kk`, `scan_pbb`, `scan_npwp`, `sertif_asli`, `foto_direktur`, `sk_desa`, `akta_kematian`, `sp_ahli_waris`, `biaya`, `tgl_pelunasan`, `status_permohonan`, `keterangan`, `catatan`, `bukti_pembayaran`, `berkas_hasil`, `tgl_permohonan`, `tahun_permohonan`, `jbtnh_namapenjual`, `jbtnh_namapembeli`, `jbtnh_nohppenjual`, `jbtnh_nohppembeli`, `scan_snikah`, `scan_bpjs`, `sertif_tanah`, `scan_ktp2`, `scan_kk2`, `scan_snikah2`, `scan_pbb2`, `sertif_tanah2`, `scan_npwp2`, `scan_bpjs2`, `tkrtnh_namapihak1`, `tkrtnh_namapihak2`, `tkrtnh_nohppihak1`, `tkrtnh_nohppihak2`, `nobulanan`) VALUES
(136, 'SEWA_e7V1', 14, 4, 'notaris', '2022-06-30', '', '', '', '', '', 'KTP_SEWA_e7V1.pdf', 'KK_SEWA_e7V1.pdf', 'PBB_SEWA_e7V1.pdf', '', 'SERTIF_SEWA_e7V1.pdf', '', '', '', '', '1000000', '2022-06-22', 5, 'segera', 'Permohonan selesai, silahkan ambil berkas anda ke kantor kami. ', 'BUKTI_SEWA_e7V1.pdf', 'HASIL_SEWA_e7V1.pdf', '2022-06-22', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertemuan`
--

CREATE TABLE `tb_pertemuan` (
  `tgl` date DEFAULT NULL,
  `jam_mulai` int(10) DEFAULT NULL,
  `jam_akhir` int(10) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pertemuan`
--

INSERT INTO `tb_pertemuan` (`tgl`, `jam_mulai`, `jam_akhir`, `keterangan`, `catatan`, `status`, `id`, `user_id`) VALUES
('2024-07-17', 9, 11, 'Pertemuan z', 'Oke bisa', 4, 8, 3),
('2024-07-21', 15, 17, 'Pertemuan janji sewa', 'oke boleh', 4, 9, 8);

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
(1, 'admin', 'admin@gmail.com', '74ee55083a714aa3791f8d594fea00c9', '3508051110950001', '', '', 'lumajang', 'Jember', '2000-02-22', 'default.jpg', 1, '2024-07-10 03:04:19'),
(3, 'user', 'user@gmail.com', '74ee55083a714aa3791f8d594fea00c9', '350129502934', '', '', '', '', '0000-00-00', 'u.png', 2, '2024-07-10 03:04:16'),
(8, 'toni', 'toni@gmail.com', '74ee55083a714aa3791f8d594fea00c9', '351204521657444', '081123123123', 'Laki-Laki', 'Probolinggo', 'Probolinggo', '1999-01-01', 'default.jpg', 2, '2024-07-16 08:47:18'),
(9, 'ferdi', 'ferdi@gmail.com', '1f2ef40e3ad6fa16b08b615217876b8a', '3512040550004', '0895337337339', 'Laki-Laki', 'Jl. Patrang Jember', 'Jember', NULL, 'oke.jpg', 2, '2022-06-11 01:40:33'),
(10, 'Selfi', 'selfi@gmail.com', '1fb16fd0b83c4603b2872ac9106b84e3', '3512082012200005', '083831831081', 'Perempuan', 'Jl. Kalimantan Jember', 'Jember', '2000-01-01', '20200319085405-1-potret-pas-foto-seleb-nikah-001-andriana-faliha.jpg', 1, '2022-06-11 01:02:30'),
(11, 'johndoe', 'johndoe@gmail.com', '4297f44b13955235245b2497399d7a93', '325325325325325', '0895399477388', 'Laki-Laki', 'Jl. Semeru', 'Jember', NULL, 'Warna-Background-Foto-Buku-Nikah1.jpg', 2, '2022-06-11 01:05:23'),
(12, 'mfr', 'mfr@gmail.com', 'b3eec1dde12f2af66c4991c8deff62f5', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-06-19 05:03:08'),
(13, 'anton', 'anton@gmail.com', '42b46b98d4cf19ec3b8eb076284a63fd', '3512072070004', '085241564785', 'Laki-Laki', 'Jl. Rangu', 'Jember', '2000-12-31', 'default.jpg', 2, '2022-06-21 17:11:16'),
(14, 'testersistem', 'testersistem@gmail.com', 'ddd2a702d3419f47aa29fc13cff7a8d7', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-06-22 03:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  ADD PRIMARY KEY (`id_jenis_permohonan`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

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
-- Indexes for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id_jenis_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  MODIFY `id_status_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `tb_pertemuan`
--
ALTER TABLE `tb_pertemuan`
  ADD CONSTRAINT `tb_pertemuan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_level_user` FOREIGN KEY (`level_user`) REFERENCES `tb_level_user` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
