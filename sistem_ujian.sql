-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 04.59
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_ujian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_belajar`
--

CREATE TABLE `alur_belajar` (
  `id_alur` int(20) NOT NULL,
  `nama_alur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id_detail_nilai` int(20) NOT NULL,
  `id_nilai` int(20) NOT NULL,
  `id_soal` int(20) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskusi_kelas`
--

CREATE TABLE `diskusi_kelas` (
  `id_diskusi` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kelas`
--

CREATE TABLE `kategori_kelas` (
  `id_kategori_kelas` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(20) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `id_level` int(20) NOT NULL,
  `id_tipe` int(20) NOT NULL,
  `id_alur` int(20) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `harga_kelas` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(20) NOT NULL,
  `id_section` int(20) NOT NULL,
  `nama_lesson` varchar(50) NOT NULL,
  `video_penjelasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_kelas`
--

CREATE TABLE `level_kelas` (
  `id_level_kelas` int(20) NOT NULL,
  `nama_level` enum('Beginner','Intermediate') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `jumlah_salah` int(50) NOT NULL,
  `jumlah_benar` int(50) NOT NULL,
  `jumlah_nilai` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_goal`
--

CREATE TABLE `personal_goal` (
  `id_personal_goal` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_pekerjaan` int(20) NOT NULL,
  `id_personal_goal` int(20) NOT NULL,
  `avatar` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(40) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `negara` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `section`
--

CREATE TABLE `section` (
  `id_section` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `jenis` enum('pretest','posttest') DEFAULT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `opsi1` varchar(20) NOT NULL,
  `opsi2` varchar(20) NOT NULL,
  `opsi3` varchar(20) NOT NULL,
  `opsi4` varchar(20) NOT NULL,
  `kunci` int(20) NOT NULL,
  `urut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kelas`
--

CREATE TABLE `tipe_kelas` (
  `id_tipe_kelas` int(20) NOT NULL,
  `nama_tipe` enum('starter','freemium','premium') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools`
--

CREATE TABLE `tools` (
  `id_tools` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools kelas`
--

CREATE TABLE `tools kelas` (
  `id_tools kelas` int(20) NOT NULL,
  `id_tools` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` char(50) NOT NULL,
  `rentang_waktu` time(6) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(30) NOT NULL,
  `role` enum('admin pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alur_belajar`
--
ALTER TABLE `alur_belajar`
  ADD PRIMARY KEY (`id_alur`);

--
-- Indeks untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD PRIMARY KEY (`id_detail_nilai`),
  ADD UNIQUE KEY `id_nilai` (`id_nilai`),
  ADD UNIQUE KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `diskusi_kelas`
--
ALTER TABLE `diskusi_kelas`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  ADD PRIMARY KEY (`id_kategori_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `id_Kategori` (`id_kategori`),
  ADD UNIQUE KEY `id_Level` (`id_level`),
  ADD UNIQUE KEY `id_Tipe` (`id_tipe`),
  ADD UNIQUE KEY `id_Alur` (`id_alur`);

--
-- Indeks untuk tabel `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`),
  ADD UNIQUE KEY `id_section` (`id_section`);

--
-- Indeks untuk tabel `level_kelas`
--
ALTER TABLE `level_kelas`
  ADD PRIMARY KEY (`id_level_kelas`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `personal_goal`
--
ALTER TABLE `personal_goal`
  ADD PRIMARY KEY (`id_personal_goal`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD UNIQUE KEY `id_profil` (`id_profil`,`id_user`),
  ADD UNIQUE KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD UNIQUE KEY `id_personal_goal` (`id_personal_goal`);

--
-- Indeks untuk tabel `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tipe_kelas`
--
ALTER TABLE `tipe_kelas`
  ADD PRIMARY KEY (`id_tipe_kelas`);

--
-- Indeks untuk tabel `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id_tools`);

--
-- Indeks untuk tabel `tools kelas`
--
ALTER TABLE `tools kelas`
  ADD PRIMARY KEY (`id_tools kelas`),
  ADD UNIQUE KEY `id_tools` (`id_tools`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alur_belajar`
--
ALTER TABLE `alur_belajar`
  MODIFY `id_alur` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  MODIFY `id_detail_nilai` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskusi_kelas`
--
ALTER TABLE `diskusi_kelas`
  MODIFY `id_diskusi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  MODIFY `id_kategori_kelas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level_kelas`
--
ALTER TABLE `level_kelas`
  MODIFY `id_level_kelas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_goal`
--
ALTER TABLE `personal_goal`
  MODIFY `id_personal_goal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_kelas`
--
ALTER TABLE `tipe_kelas`
  MODIFY `id_tipe_kelas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tools`
--
ALTER TABLE `tools`
  MODIFY `id_tools` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tools kelas`
--
ALTER TABLE `tools kelas`
  MODIFY `id_tools kelas` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
