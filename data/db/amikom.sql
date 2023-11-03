-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2023 pada 07.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(12) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenkel_dosen` varchar(10) NOT NULL,
  `alamat_dosen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `jenkel_dosen`, `alamat_dosen`) VALUES
('0527039002', 'Firman Asharudin, S.Kom, M.Kom', 'Pria', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminyoga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kota_kelahiran` varchar(30) NOT NULL,
  `tanggal_kelahiran` date NOT NULL,
  `alamat` text NOT NULL,
  `program_studi` varchar(20) NOT NULL,
  `tahun_masuk` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `kota_kelahiran`, `tanggal_kelahiran`, `alamat`, `program_studi`, `tahun_masuk`) VALUES
('22.01.4846', 'Mohamad Afid Yoga Pratama Putra', 'Pria', 'Mojokerto', '2002-10-03', 'Mojokerto', 'D3 Teknik Informatik', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matkul` varchar(12) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matkul`, `nama_matkul`, `nama_dosen`, `sks`) VALUES
('DT170', 'PERANCANGAN WEB 2', 'Firman Asharudin, S.Kom, M.Kom', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `kode_matkul` varchar(12) NOT NULL,
  `semester` int(2) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nim`, `kode_matkul`, `semester`, `nilai`) VALUES
(5, '22.01.4846', 'DT170', 3, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `materi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertemuan`
--

INSERT INTO `pertemuan` (`id`, `kode_matkul`, `pertemuan_ke`, `materi`, `deskripsi`) VALUES
(2, 'DT170', 1, 'Belajar PHP 1', 'Deskripsi Materi Pertemuan 1'),
(3, 'DT170', 2, 'Belajar PHP 2', 'Deskripsi Materi Pertemuan 2'),
(4, 'DT170', 3, 'Belajar PHP 3', 'Deskripsi Materi Pertemuan 3'),
(5, 'DT170', 4, 'Belajar PHP 4', 'Deskripsi Materi Pertemuan 4'),
(6, 'DT170', 5, 'Belajar PHP 5', 'Deskripsi Materi Pertemuan 5'),
(7, 'DT170', 6, 'Belajar PHP 6', 'Deskripsi Materi Pertemuan 6'),
(8, 'DT170', 7, 'Belajar PHP 7', 'Deskripsi Materi Pertemuan 7'),
(9, 'DT170', 8, 'Belajar PHP 8', 'Deskripsi Materi Pertemuan 8'),
(10, 'DT170', 9, 'Belajar PHP 9', 'Deskripsi Materi Pertemuan 9'),
(11, 'DT170', 10, 'Belajar PHP 10', 'Deskripsi Materi Pertemuan 10'),
(12, 'DT170', 11, 'Belajar PHP 11', 'Deskripsi Materi Pertemuan 11'),
(13, 'DT170', 12, 'Belajar PHP 12', 'Deskripsi Materi Pertemuan 12'),
(14, 'DT170', 13, 'Belajar PHP 13', 'Deskripsi Materi Pertemuan 13'),
(15, 'DT170', 14, 'Belajar PHP 14', 'Deskripsi Materi Pertemuan 14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
