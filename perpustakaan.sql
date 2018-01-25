-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jan 2018 pada 11.35
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'offline',
  `last_seen` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `status`, `last_seen`) VALUES
(00001, 'fannyhasbi', 'd7e498440580e82e4d08e6d8c4576b22', 'Fanny Hasbi', 'online', '2017-01-26 00:38:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_pinjam` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `username`, `password`, `nama`, `jumlah_pinjam`, `status`) VALUES
(00001, 'fannyhasbi', 'd7e498440580e82e4d08e6d8c4576b22', 'Fanny Hasbi', 6, 1),
(00002, 'novalhaidar', 'c834b74c1c97028fdb7f6291b759ab3e ', 'Noval Amani Haidar', 1, 1),
(00003, 'dimastri', 'aca0cc73403a51a5eb2be29b38c76760 ', 'Dimas Tri Wicaksono', 3, 1),
(00004, 'ariffaiz', '719a280daab0ed332e7b87ddf2827c47 ', 'Arif Faiz Wicaksono', 5, 1),
(00005, 'adammaulidani', 'f8a8912b2588c26416af8455aeded342', 'Adam Maulidani', 0, 0),
(00006, 'coba', '827ccb0eea8a706c4c34a16891f84e7b', 'Hanya Coba', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` smallint(6) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `deskripsi`, `jumlah`, `slug`) VALUES
(00001, 'Laskar Pelangi', 'Andrea Hirata', 'Deskripsi buku Laskar Pelangi', 46, 'laskar-pelangi'),
(00002, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Deskripsi buku Bumi Manusia', 20, 'bumi-manusia'),
(00003, '5 CM', 'Donny Dhirgantoro', 'Deskripsi buku 5 cm', 47, '5-cm'),
(00004, 'Negeri 5 Menara', 'Ahmad Fuadi', 'Deskripsi buku Negeri 5 Menara', 23, 'negeri-5-menara'),
(00005, 'Ayat-Ayat Cinta', 'Habiburrahman El-Shirazy', 'Ini deskripsi buku ayat-ayat cinta', 33, 'ayat-ayat-cinta'),
(00006, 'Perahu Kertas', 'Dee Lestari', 'Penjelasan buku berjudul Perahu Kertas', 17, 'perahu-kertas'),
(00007, 'Robohnya Surau Kami', 'A. A. Navis', 'Penjelasan buku RSK', 7, 'robohnya-surau-kami'),
(00011, 'Salah Asuhan', 'Abdoel Moeis', 'Penjelasan buku Salah Asuhan', 6, 'salah-asuhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL DEFAULT '0000-00-00',
  `peminjam` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `buku` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `peminjam`, `buku`, `status`) VALUES
(00001, '2017-01-23', '2017-01-24', 00001, 00001, 'kembali'),
(00002, '2017-01-24', '2017-01-25', 00001, 00004, 'kembali'),
(00003, '2017-01-24', '2017-01-24', 00004, 00005, 'kembali'),
(00004, '2017-01-24', '2017-01-25', 00003, 00002, 'kembali'),
(00005, '2017-01-24', '2017-01-24', 00004, 00003, 'kembali'),
(00006, '2017-01-24', '2017-01-25', 00004, 00001, 'kembali'),
(00007, '2017-01-24', '2017-01-24', 00004, 00004, 'kembali'),
(00008, '2017-01-24', '0000-00-00', 00002, 00001, 'belum'),
(00009, '2017-01-25', '0000-00-00', 00004, 00006, 'belum'),
(00010, '2017-01-25', '0000-00-00', 00003, 00007, 'belum'),
(00011, '2017-01-26', '2017-02-22', 00001, 00006, 'kembali'),
(00012, '2017-01-26', '2017-02-22', 00001, 00007, 'kembali'),
(00013, '2017-01-26', '0000-00-00', 00003, 00011, 'belum'),
(00015, '2017-02-22', '2017-06-10', 00001, 00011, 'kembali'),
(00018, '2017-06-10', '2017-06-10', 00001, 00005, 'kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `peminjam` (`peminjam`,`buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
