-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jan 2022 pada 17.14
-- Versi server: 10.3.32-MariaDB-log-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmkgcila_bmkgcilacap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `awsdata`
--

CREATE TABLE `awsdata` (
  `id` int(5) NOT NULL,
  `curahhujan` decimal(4,2) NOT NULL,
  `radiasi` decimal(6,2) NOT NULL,
  `pasut` decimal(4,2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `awsdata`
--

INSERT INTO `awsdata` (`id`, `curahhujan`, `radiasi`, `pasut`, `date`, `time`) VALUES
(490, 0.00, 0.00, 1.00, '2022-01-15', '07:52:00'),
(491, 0.00, 0.00, 1.10, '2022-01-15', '07:52:00'),
(492, 0.00, 0.00, 1.30, '2022-01-15', '07:52:00'),
(493, 0.00, 0.00, 1.10, '2022-01-15', '07:52:00'),
(494, 0.00, 862.20, 1.50, '2022-01-17', '02:00:00'),
(495, 0.00, 949.10, 1.20, '2022-01-17', '02:30:00'),
(496, 0.00, 871.20, 1.10, '2022-01-17', '03:00:00'),
(497, 0.00, 1124.60, 1.20, '2022-01-17', '03:30:00'),
(498, 0.00, 1170.50, 1.10, '2022-01-17', '04:00:00'),
(499, 0.00, 1106.10, 1.00, '2022-01-17', '04:30:00'),
(500, 0.00, 1120.50, 0.80, '2022-01-17', '05:00:00'),
(501, 0.00, 1169.10, 0.80, '2022-01-17', '05:30:00'),
(502, 0.00, 347.60, 0.80, '2022-01-17', '06:00:00'),
(503, 0.00, 550.90, 0.70, '2022-01-17', '06:30:00'),
(504, 0.00, 531.70, 0.70, '2022-01-17', '07:00:00'),
(505, 0.00, 474.00, 0.90, '2022-01-17', '07:30:00'),
(506, 0.00, 373.50, 0.90, '2022-01-17', '08:00:00'),
(507, 0.00, 349.60, 0.90, '2022-01-17', '08:30:00'),
(508, 0.00, 248.80, 0.80, '2022-01-17', '09:00:00'),
(509, 0.00, 121.40, 1.20, '2022-01-17', '09:30:00'),
(510, 0.00, 49.00, 1.20, '2022-01-17', '10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bmkgfiles`
--

CREATE TABLE `bmkgfiles` (
  `id` int(11) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `dateinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bmkgfiles`
--

INSERT INTO `bmkgfiles` (`id`, `namafile`, `dateinput`) VALUES
(11, 'hujan-lebat.pdf', '2021-12-29'),
(21, 'PRAKICU KILANG  1 JANUARI 2022.pdf', '2022-01-01'),
(22, 'PRAKICU  AREA 70 1 JANUARI 2022.pdf', '2022-01-01'),
(23, 'SAMBARAN PETIR 3.pdf', '2022-01-01'),
(24, 'SAMBARAN PETIR 2.pdf', '2022-01-01'),
(25, 'SAMBARAN PETIR 1.pdf', '2022-01-01'),
(31, 'prakiraan cuaca wilayah pelayanan.pdf', '2021-12-27'),
(32, 'prakiraan cuac pelabuhan laut.pdf', '2021-12-27'),
(33, 'prakiraan cuac pelabuhan laut.pdf', '2021-12-27'),
(34, 'Pasang Surut.pdf', '2022-01-08'),
(41, 'peringatan dini cuaca.pdf', '2022-01-03'),
(42, 'peringatan-dini-gelombang-tinggi.pdf', '2021-12-24'),
(51, 'gempa-bumi.pdf', '2021-12-24'),
(61, 'citra1642414188.gif', '2022-01-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `no` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`no`, `nama`, `alamat`, `foto`) VALUES
(1, 'joni', 'cilacap', 'Screenshot (1).png'),
(3, 'Amin', 'cilacap', 'Logo_BMKG.png'),
(4, 'dsfsfgegeg', 'frefre', 'Logo_BMKG.png'),
(5, 'gggg', 'cilacap', 'Screenshot (18).png'),
(6, 'kucing', 'adsfasdf', 'Screenshot (28).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'bmkg', '370eecb3a61a9c7d2616a84d93eaad2f', 'admin'),
(2, 'pertamina', '3a725fefb342fc86ed5834f51be6eb21', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `awsdata`
--
ALTER TABLE `awsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bmkgfiles`
--
ALTER TABLE `bmkgfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `awsdata`
--
ALTER TABLE `awsdata`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT untuk tabel `bmkgfiles`
--
ALTER TABLE `bmkgfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
