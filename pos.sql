-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2023 pada 20.30
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_akses`
--

CREATE TABLE `mst_akses` (
  `akid` int(11) NOT NULL,
  `label` varchar(60) NOT NULL,
  `level` varchar(60) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_akses`
--

INSERT INTO `mst_akses` (`akid`, `label`, `level`, `is_active`, `create_time`, `user_create`) VALUES
(1, 'SU', 'Super Admin', 1, '2023-08-13 00:38:01', 'System');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_rak`
--

CREATE TABLE `mst_rak` (
  `rakid` int(11) NOT NULL,
  `ruid` int(11) NOT NULL,
  `rak` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(80) NOT NULL,
  `modify_time` datetime DEFAULT NULL,
  `user_modify` varchar(80) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_ruang`
--

CREATE TABLE `mst_ruang` (
  `mruid` int(11) NOT NULL,
  `ruang` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(80) NOT NULL,
  `modify_time` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `user_modify` varchar(80) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `usid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `is_level` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(80) NOT NULL,
  `modify_time` datetime DEFAULT NULL,
  `user_modify` varchar(80) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Aktif,2=Non Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`usid`, `username`, `password`, `nama`, `is_level`, `create_time`, `user_create`, `modify_time`, `user_modify`, `is_active`) VALUES
(1, 'su', 'ccb297da7f74c5eeca8d48f8eced1fcbac152226', 'Super Admin', 1, '2023-08-13 00:45:37', 'System', NULL, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_akses`
--
ALTER TABLE `mst_akses`
  ADD PRIMARY KEY (`akid`);

--
-- Indeks untuk tabel `mst_rak`
--
ALTER TABLE `mst_rak`
  ADD PRIMARY KEY (`rakid`);

--
-- Indeks untuk tabel `mst_ruang`
--
ALTER TABLE `mst_ruang`
  ADD PRIMARY KEY (`mruid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_akses`
--
ALTER TABLE `mst_akses`
  MODIFY `akid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mst_rak`
--
ALTER TABLE `mst_rak`
  MODIFY `rakid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_ruang`
--
ALTER TABLE `mst_ruang`
  MODIFY `mruid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `usid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
