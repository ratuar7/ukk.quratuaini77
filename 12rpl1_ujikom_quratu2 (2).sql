-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2026 pada 05.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `12rpl1_ujikom_quratu2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`idkategori`, `nama_kategori`) VALUES
(1, 'fasilitas kelas'),
(2, 'fasilitas lab'),
(3, 'lingkungan sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengaduan`
--

CREATE TABLE `tbpengaduan` (
  `idpengaduan` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('menunggu','proses','selesai','') NOT NULL,
  `feedback` text NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbpengaduan`
--

INSERT INTO `tbpengaduan` (`idpengaduan`, `nis`, `id_kategori`, `lokasi`, `keterangan`, `status`, `feedback`, `tanggal_selesai`, `tanggal`) VALUES
(2, 1, 2, 'Lab RPL', 'komputer error', 'menunggu', 'Tunggu saya akan segera kesana', '0000-00-00 00:00:00', '2026-02-26'),
(3, 3977, 2, 'Lab Mesin', 'atap bocor', 'menunggu', 'sayaa akan mengeceknya tunggu sebentar', '0000-00-00 00:00:00', '2026-02-25'),
(7, 1, 1, 'kelas rpl2', 'meja rusak', 'selesai', '    sudah di perbaiki ya                                          ', '2026-02-27 10:56:51', '0000-00-00'),
(13, 1, 3, 'lapangan', 'ring basket rusak\r\n', 'selesai', '   sudah beres                                                          ', '2026-02-27 09:10:36', '2026-02-27'),
(14, 2, 1, 'kelas', 'jendela dikelas tbsm1 pecah', 'selesai', 'sudah dibetulkan', '2026-02-27 09:37:56', '2026-02-27'),
(15, 2, 2, 'Lab MP', 'AC dilab mp tidak bisa menyala', 'menunggu', '', NULL, '2026-02-27'),
(16, 1, 2, 'lapangan', 'pohon diinjek adek kelas\r\n', 'menunggu', '', NULL, '2026-02-27'),
(17, 1, 1, 'kelas', 'papan bor rusak', 'proses', 'ok', NULL, '2026-02-27'),
(18, 1, 2, 'Lab TKJ', 'kabel error', 'menunggu', '', NULL, '2026-02-27'),
(19, 1, 3, 'lapangan', 'lapangan voli pembatasnya rusak', 'menunggu', '', NULL, '2026-02-27'),
(20, 1, 2, 'bhjhnj', 'hjbhjhkjkj', 'menunggu', '', NULL, '2026-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `nis` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Siswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`nis`, `username`, `password`, `role`) VALUES
(1, 'quratu', '12345', 'Siswa'),
(2, 'admin', '123', 'Admin'),
(3977, 'rian', '7788', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `tbpengaduan`
--
ALTER TABLE `tbpengaduan`
  ADD PRIMARY KEY (`idpengaduan`),
  ADD KEY `iduser` (`nis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbpengaduan`
--
ALTER TABLE `tbpengaduan`
  MODIFY `idpengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `nis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3978;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbpengaduan`
--
ALTER TABLE `tbpengaduan`
  ADD CONSTRAINT `tbpengaduan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbuser` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpengaduan_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `tbuser` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
