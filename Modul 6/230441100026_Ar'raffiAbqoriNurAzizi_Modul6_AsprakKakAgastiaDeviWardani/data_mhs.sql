-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 15.04
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
-- Database: `data_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbmhs`
--

CREATE TABLE `dbmhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `asal_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbmhs`
--

INSERT INTO `dbmhs` (`id`, `nama`, `nim`, `umur`, `jenis_kelamin`, `prodi`, `jurusan`, `asal_kota`) VALUES
(11, 'kugaf', 'iygaf', 0, 'laki-laki', 'ouabf', 'oubaf', 'ibf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confirm_pass` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `confirm_pass`, `email`) VALUES
(1, 'admin', '123', '', ''),
(6, 'rapi', '123', '', 'rapi@g.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dbmhs`
--
ALTER TABLE `dbmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbmhs`
--
ALTER TABLE `dbmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
