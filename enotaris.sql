-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 04:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '2000000', 'Pemasukan', '2022-01-13', 'January', '2000000', 'Pemasukan dari Kode Permohonan AKNAH_evn2'),
(2, '1500000', 'Pemasukan', '2022-01-14', 'January', '3500000', 'Pemasukan dari Kode Permohonan AKNAH_Bob2'),
(3, '1750000', 'Pemasukan', '2022-06-02', 'June', '5250000', 'Pemasukan dari Kode PermohonanAKNAH_sW52');

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
  `tkrtnh_nohppihak2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_permohonan`
--

INSERT INTO `tb_permohonan` (`id_permohonan`, `kode_permohonan`, `pemohon`, `jenis_permohonan`, `jenis_layanan`, `deadline`, `nama_cv`, `bidang_usaha`, `lokasi`, `luas_tanah`, `status_kepemilikan`, `scan_ktp`, `scan_kk`, `scan_pbb`, `scan_npwp`, `sertif_asli`, `foto_direktur`, `sk_desa`, `akta_kematian`, `sp_ahli_waris`, `biaya`, `tgl_pelunasan`, `status_permohonan`, `keterangan`, `catatan`, `bukti_pembayaran`, `berkas_hasil`, `tgl_permohonan`, `tahun_permohonan`, `jbtnh_namapenjual`, `jbtnh_namapembeli`, `jbtnh_nohppenjual`, `jbtnh_nohppembeli`, `scan_snikah`, `scan_bpjs`, `sertif_tanah`, `scan_ktp2`, `scan_kk2`, `scan_snikah2`, `scan_pbb2`, `sertif_tanah2`, `scan_npwp2`, `scan_bpjs2`, `tkrtnh_namapihak1`, `tkrtnh_namapihak2`, `tkrtnh_nohppihak1`, `tkrtnh_nohppihak2`) VALUES
(5, 'AKTA_YDW1', 3, 1, 'ppat', '2022-05-23', '', '', 'Jember', '200', 'Milik Sendiri', 'KTP_YDW1', 'KK_YDW1', 'PBB_YDW1', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', '', '', '', '2022-01-12', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'AKNAH_evn2', 3, 1, 'ppat', '2022-05-23', '', '', '', '200', 'Milik Sendiri', 'KTP_AKNAH_evn2.pdf', 'KK_AKNAH_evn2.pdf', 'PBB_AKNAH_evn2.pdf', '', '', '', '', '', '', '2000000', '2022-01-13', 5, '', 'Permohonan selesai, silahkan ambil berkas anda ke kantor kami.', 'BUKTI_AKNAH_evn2.jpg', 'AktaTanah_AKNAH_evn2.jpg', '2022-01-12', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'AKNAH_Bob2', 3, 1, 'ppat', '2022-05-25', '', '', 'Lumajang', '150', 'Milik Sendiri', 'KTP_AKNAH_Bob2.pdf', 'KK_AKNAH_Bob2.pdf', 'PBB_AKNAH_Bob2.pdf', '', '', '', '', '', '', '1500000', '2022-01-14', 5, '', 'Permohonan selesai, silahkan ambil berkas anda ke kantor kami.', 'BUKTI_AKNAH_Bob2.jpg', 'AktaTanah_AKNAH_Bob2.jpg', '2022-01-12', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'AKNAH_QyR2', 3, 1, 'ppat', '2022-05-24', '', '', 'lumajang', '100', 'Milik Orang Tua', 'KTP_AKNAH_QyR2.pdf', 'KK_AKNAH_QyR2.pdf', 'PBB_AKNAH_QyR2.pdf', '', '', '', '', '', '', '1700000', '2022-01-14', 5, '', 'Permohonan selesai, silahkan ambil berkas anda ke kantor kami.', 'BUKTI_AKNAH_QyR2_jY9.jpg', 'AktaTanah_AKNAH_QyR2.pdf', '2022-01-12', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'AKNAH_tcK2', 3, 1, 'ppat', '2022-05-26', '', '', 'Bondowoso', '130', 'Milik Sendiri', 'KTP_AKNAH_tcK2_XuV.pdf', 'KK_AKNAH_tcK2_XuV.pdf', 'PBB_AKNAH_tcK2_XuV.pdf', '', '', '', '', '', '', NULL, '2022-01-15', 1, '', 'Sistem sedang melakukan pengecekan dokumen.', '', '', '2022-01-12', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'AKNAH_sW52', 3, 1, 'ppat', '2022-05-31', '', '', 'Surabaya', '170', 'Milik Sendiri', 'KTP_AKNAH_sW52.pdf', 'KK_AKNAH_sW52.pdf', 'PBB_AKNAH_sW52.pdf', '', '', '', '', '', '', '1750000', '2022-06-02', 4, '', 'Permohonan Sedang Diproses', 'BUKTI_AKNAH_sW52.png', '', '2022-01-19', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'CVPT_3gX1', 3, 2, 'notaris', NULL, 'PT. Sinar Media', '', 'Patrang, Jember', '', '', 'KTP_CVPT_3gX11.pdf', 'KK_CVPT_3gX11.pdf', 'PBB_CVPT_3gX11.pdf', 'NPWP_CVPT_3gX11.pdf', '', 'FTDR_CVPT_3gX11.jpeg', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-05-25', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'WARIS_ZWi1', 3, 3, 'notaris', NULL, '', '', '', '', '', 'KTP_WARIS_ZWi1.pdf', 'KK_WARIS_ZWi1.pdf', '', '', '', '', 'SKDESA_WARIS_ZWi1.pdf', 'AKKEM_WARIS_ZWi1.pdf', 'SPAHWA_WARIS_ZWi1.pdf', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-05-26', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'SEWA_Vxs1', 3, 4, 'notaris', NULL, '', '', '', '', '', 'KTP_SEWA_Vxs1.pdf', 'KK_SEWA_Vxs1.pdf', 'PBB_SEWA_Vxs1.pdf', '', 'SERTIF_SEWA_Vxs1.pdf', '', '', '', '', NULL, '0000-00-00', 1, 'Mencoba Form Perjanjian Sewa', NULL, '', '', '2022-05-31', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'RRUPS_CyK1', 3, 5, 'notaris', NULL, '', '', '', '', '', 'KTP_RRUPS_CyK1.pdf', 'KK_RRUPS_CyK1.pdf', '', 'NPWP_RRUPS_CyK1.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, 'asd', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'RRUPS_TRl2', 3, 5, 'notaris', NULL, '', '', '', '', '', 'KTP_RRUPS_TRl2.pdf', 'KK_RRUPS_TRl2.pdf', '', 'NPWP_RRUPS_TRl2.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, 'Pengajuan RRUPS', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'YYSN_OQw1', 3, 6, 'notaris', NULL, '', '', '', '', '', 'KTP_YYSN_OQw11.pdf', 'KK_YYSN_OQw11.pdf', '', 'NPWP_YYSN_OQw11.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, 'Pengajuan Yayasan', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 'PERLAIN_k201', 3, 7, 'notaris', NULL, '', '', '', '', '', 'KTP_PERLAIN_k201.pdf', 'KK_PERLAIN_k201.pdf', '', '', '', '', '', '', '', NULL, '0000-00-00', 1, 'Pengajuan Perjanjian Lain Lain', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'SEWA_GFA2', 3, 4, 'notaris', NULL, '', '', '', '', '', 'KTP_SEWA_GFA2.pdf', 'KK_SEWA_GFA2.pdf', 'PBB_SEWA_GFA2.pdf', '', 'SERTIF_SEWA_GFA2.pdf', '', '', '', '', NULL, '0000-00-00', 1, 'ok', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'AKNAH_mx42', 9, 1, '', NULL, '', '', 'Lumajang', '234', 'Milik Orang Tua', 'KTP_AKNAH_mx42.pdf', 'KK_AKNAH_mx42.pdf', 'PBB_AKNAH_mx42.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'AKNAH_qEe2', 9, 1, '', NULL, '', '', 'Lumajang', '235', 'Milik Orang Tua', 'KTP_AKNAH_qEe2.pdf', 'KK_AKNAH_qEe2.pdf', 'PBB_AKNAH_qEe2.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'AKNAH_gxK2', 9, 1, '', NULL, '', '', 'Lumajang', '235', 'Milik Orang Tua', 'KTP_AKNAH_gxK2.pdf', 'KK_AKNAH_gxK2.pdf', 'PBB_AKNAH_gxK2.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'AKNAH_1fo2', 9, 1, '', NULL, '', '', 'Lumajang', '123', 'Milik Orang Tua', 'KTP_AKNAH_1fo2.pdf', 'KK_AKNAH_1fo2.pdf', 'PBB_AKNAH_1fo2.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'AKNAH_qh62', 9, 1, '', NULL, '', '', 'Lumajang', '123', 'Milik Orang Tua', 'KTP_AKNAH_qh62.pdf', 'KK_AKNAH_qh62.pdf', 'PBB_AKNAH_qh62.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'AKNAH_W1T2', 9, 1, '', NULL, '', '', 'Jember', '1234', 'Milik Pemerintah', 'KTP_AKNAH_W1T2.pdf', 'KK_AKNAH_W1T2.pdf', 'PBB_AKNAH_W1T2.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-02', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'AKNAH_9l32', 3, 1, 'ppat', NULL, '', '', 'Nugini', '200', 'Milik Orang Tua', 'KTP_AKNAH_9l32.pdf', 'KK_AKNAH_9l32.pdf', 'PBB_AKNAH_9l32.pdf', '', '', '', '', '', '', NULL, '0000-00-00', 1, '', NULL, '', '', '2022-06-03', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'PERLAIN_MDW2', 3, 7, 'notaris', NULL, '', '', '', '', '', 'KTP_PERLAIN_MDW2.pdf', 'KK_PERLAIN_MDW2.pdf', '', '', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, '', 3, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_16.pdf', 'KK_16.pdf', 'PBB_6.pdf', 'NPWP_16.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, 'yayasan test', NULL, '', '', '2022-06-05', '2022', 'Fathony', 'Arman', '123123123', '123123123', 'SNKH_3.pdf', 'BPJS_6.pdf', 'SRTF_.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(64, '', 3, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_17.pdf', 'KK_17.pdf', 'PBB_7.pdf', 'NPWP_17.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', 'Fathony', 'Arman', '123', '123', 'SNKH_4.pdf', 'BPJS_7.pdf', 'SRTF_1.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'RRUPS_zQ93', 3, 5, 'notaris', NULL, '', '', '', '', '', 'KTP_RRUPS_zQ93.pdf', 'KK_RRUPS_zQ93.pdf', '', 'NPWP_RRUPS_zQ93.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '', 3, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_28.pdf', 'KK_28.pdf', 'PBB_18.pdf', 'NPWP_28.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', 'Fathony', 'Arman', '123', '123', 'SNKH_15.pdf', 'BPJS_18.pdf', 'SRTF_12.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(69, '', 3, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_29.pdf', 'KK_29.pdf', 'PBB_19.pdf', 'NPWP_29.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '12312312312', NULL, '', '', '2022-06-05', '2022', '123123123', '123123', '12312312312312', '123123123123', 'SNKH_16.pdf', 'BPJS_19.pdf', 'SRTF_13.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(70, '', 9, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_30.pdf', 'KK_30.pdf', 'PBB_20.pdf', 'NPWP_30.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', 'Fathony', 'Arman', '123', '123', 'SNKH_17.pdf', 'BPJS_20.pdf', 'SRTF_14.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(71, '', 3, 9, 'ppat', NULL, '', '', '', '', '', 'KTP_31.pdf', 'KK_31.pdf', 'PBB_21.pdf', 'NPWP_31.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', 'Fathony', '123', '123', '123', 'SNKH_18.pdf', 'BPJS_21.pdf', 'SRTF_15.pdf', '', '', '', '', '', '', '', '', '', '', ''),
(74, '', 3, 10, 'ppat', NULL, '', '', '', '', '', 'KTP_38.pdf', 'KK_38.pdf', 'PBB_28.pdf', 'NPWP_38.pdf', '', '', '', '', '', NULL, '0000-00-00', 1, '123', NULL, '', '', '2022-06-05', '2022', '', '', '', '', 'SNKH_25.pdf', 'BPJS_28.pdf', 'SRTF_21.pdf', 'KTP_39.pdf', 'KK_39.pdf', 'SNKH_26.pdf', 'PBB_29.pdf', 'SRTF_22.pdf', 'NPWP_39.pdf', 'BPJS_29.pdf', '123', '123', '123', '123'),
(78, 'KUASA_BnN1', 3, 11, 'ppat', NULL, '', '', '', '', '', 'KTP_KUASA_BnN1.pdf', 'KK_KUASA_BnN1.pdf', 'PBB_KUASA_BnN1.pdf', '', 'SERTIF_KUASA_BnN1.pdf', '', '', '', '', NULL, '0000-00-00', 1, '123123123', NULL, '', '', '2022-06-06', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, '', 3, 12, 'ppat', NULL, '', '', '', '', '', 'KTP_41.pdf', 'KK_41.pdf', 'PBB_31.pdf', '', '', '', 'SKDESA_.pdf', 'AKKEM_.pdf', '', NULL, '0000-00-00', 1, '1234124123123', NULL, '', '', '2022-06-06', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, '', 3, 12, 'ppat', NULL, '', '', '', '', '', 'KTP_42.pdf', 'KK_42.pdf', 'PBB_32.pdf', '', '', '', 'SKDESA_1.pdf', 'AKKEM_1.pdf', '', NULL, '0000-00-00', 1, '12312312312312', NULL, '', '', '2022-06-06', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, '', 3, 12, 'ppat', NULL, '', '', '', '', '', 'KTP_43.pdf', 'KK_43.pdf', 'PBB_33.pdf', '', '', '', 'SKDESA_2.pdf', 'AKKEM_2.pdf', '', NULL, '0000-00-00', 1, 'afds\\gsdaftasdfg', NULL, '', '', '2022-06-06', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'FAPHT_veA1', 3, 13, 'ppat', NULL, '', '', '', '', '', 'KTP_FAPHT_veA1.pdf', 'KK_FAPHT_veA1.pdf', '', '', 'SERTIF_FAPHT_veA1.pdf', '', '', '', '', NULL, '0000-00-00', 1, '123123123123123', NULL, '', '', '2022-06-06', '2022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 'HUBAH_fL71', 3, 8, 'ppat', NULL, '', '', '', '', '', 'KTP_HUBAH_fL71.pdf', 'KK_HUBAH_fL71.pdf', '', '', '', '', '', '', '', NULL, '0000-00-00', 1, 'test', NULL, '', '', '2022-06-06', '2022', '', '', '', '', 'SNKH_HUBAH_fL71.pdf', '', '', 'KTP_HUBAH_fL711.pdf', 'KK_HUBAH_fL711.pdf', '', '', '', '', '', '', '', '', '');

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
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `nik`, `no_hp`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl_lahir`, `foto_profil`, `level_user`, `tgl_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '3508051110950001', '', '', 'lumajang', 'Jember', '2000-02-22', 'default.jpg', 1, '2022-04-20 14:48:55'),
(3, 'user', 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '350129502934', '', '', '', '', '0000-00-00', 'u.png', 2, '2022-04-20 15:30:35'),
(8, 'coba', 'coba@gmail.com', 'a3040f90cc20fa672fe31efcae41d2db', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-04-20 17:18:39'),
(9, 'toni', 'toni@gmail.com', 'dce6345ea5b90d6ea53f0ef5c4b4c72c', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-06-02 02:09:50');

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
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  MODIFY `id_status_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
