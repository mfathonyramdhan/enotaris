-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2022 pada 05.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `tb_jenis_permohonan`
--

CREATE TABLE `tb_jenis_permohonan` (
  `id_jenis_permohonan` int(11) NOT NULL,
  `nama_jenis_permohonan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_permohonan`
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
-- Struktur dari tabel `tb_keuangan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_user`
--

CREATE TABLE `tb_level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level_user`
--

INSERT INTO `tb_level_user` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permohonan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_permohonan`
--

CREATE TABLE `tb_status_permohonan` (
  `id_status_permohonan` int(11) NOT NULL,
  `nama_status_permohonan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_permohonan`
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
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `nik`, `no_hp`, `jenis_kelamin`, `alamat`, `tempat_lahir`, `tgl_lahir`, `foto_profil`, `level_user`, `tgl_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '3508051110950001', '', '', 'lumajang', 'Jember', '2000-02-22', 'default.jpg', 1, '2022-04-20 14:48:55'),
(3, 'user', 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '350129502934', '', '', '', '', '0000-00-00', 'u.png', 2, '2022-04-20 15:30:35'),
(8, 'toni', 'toni@gmail.com', 'dce6345ea5b90d6ea53f0ef5c4b4c72c', '351204521657444', '081123123123', 'Laki-Laki', 'Probolinggo', 'Probolinggo', '1999-01-01', 'default.jpg', 2, '2022-06-11 02:19:31'),
(9, 'ferdi', 'ferdi@gmail.com', '1f2ef40e3ad6fa16b08b615217876b8a', '3512040550004', '0895337337339', 'Laki-Laki', 'Jl. Patrang Jember', 'Jember', NULL, 'oke.jpg', 2, '2022-06-11 01:40:33'),
(10, 'Selfi', 'selfi@gmail.com', '1fb16fd0b83c4603b2872ac9106b84e3', '3512082012200005', '083831831081', 'Perempuan', 'Jl. Kalimantan Jember', 'Jember', '2000-01-01', '20200319085405-1-potret-pas-foto-seleb-nikah-001-andriana-faliha.jpg', 1, '2022-06-11 01:02:30'),
(11, 'johndoe', 'johndoe@gmail.com', '4297f44b13955235245b2497399d7a93', '325325325325325', '0895399477388', 'Laki-Laki', 'Jl. Semeru', 'Jember', NULL, 'Warna-Background-Foto-Buku-Nikah1.jpg', 2, '2022-06-11 01:05:23'),
(12, 'mfr', 'mfr@gmail.com', 'b3eec1dde12f2af66c4991c8deff62f5', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 2, '2022-06-19 05:03:08'),
(13, 'anton', 'anton@gmail.com', '42b46b98d4cf19ec3b8eb076284a63fd', '3512072070004', '085241564785', 'Laki-Laki', 'Jl. Rangu', 'Jember', '2000-12-31', 'default.jpg', 2, '2022-06-21 17:11:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  ADD PRIMARY KEY (`id_jenis_permohonan`);

--
-- Indeks untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`),
  ADD KEY `fk_pemohon` (`pemohon`),
  ADD KEY `fk_status_permohonan` (`status_permohonan`),
  ADD KEY `fk_jenis_permohonan` (`jenis_permohonan`);

--
-- Indeks untuk tabel `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  ADD PRIMARY KEY (`id_status_permohonan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_level_user` (`level_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_permohonan`
--
ALTER TABLE `tb_jenis_permohonan`
  MODIFY `id_jenis_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `tb_status_permohonan`
--
ALTER TABLE `tb_status_permohonan`
  MODIFY `id_status_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD CONSTRAINT `fk_jenis_permohonan` FOREIGN KEY (`jenis_permohonan`) REFERENCES `tb_jenis_permohonan` (`id_jenis_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemohon` FOREIGN KEY (`pemohon`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_permohonan` FOREIGN KEY (`status_permohonan`) REFERENCES `tb_status_permohonan` (`id_status_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_level_user` FOREIGN KEY (`level_user`) REFERENCES `tb_level_user` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
