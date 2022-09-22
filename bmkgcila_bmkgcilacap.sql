-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Sep 2022 pada 05.40
-- Versi server: 10.3.36-MariaDB-cll-lve
-- Versi PHP: 7.4.30

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
(12398, '0.00', '246.40', '1.10', '2022-09-22', '00:31:00'),
(12399, '0.00', '217.30', '1.10', '2022-09-22', '01:00:00'),
(12400, '0.00', '422.90', '1.10', '2022-09-22', '01:31:00'),
(12401, '0.00', '573.00', '1.00', '2022-09-22', '02:01:00'),
(12402, '0.00', '794.30', '0.90', '2022-09-22', '02:31:00'),
(12403, '0.00', '487.10', '0.80', '2022-09-22', '03:01:00'),
(12404, '0.00', '971.00', '0.80', '2022-09-22', '03:31:00'),
(12405, '0.00', '1047.00', '0.60', '2022-09-22', '04:01:00'),
(12406, '0.00', '430.90', '0.60', '2022-09-22', '04:31:00'),
(12407, '0.00', '695.30', '0.60', '2022-09-22', '05:01:00'),
(12408, '0.00', '907.00', '0.50', '2022-09-22', '05:31:00'),
(12409, '9.80', '855.00', '0.60', '2022-09-22', '06:01:00'),
(12410, '16.80', '311.80', '0.50', '2022-09-22', '06:31:00'),
(12411, '16.80', '853.00', '0.50', '2022-09-22', '07:01:00'),
(12412, '16.80', '178.00', '0.60', '2022-09-22', '07:31:00'),
(12413, '16.80', '93.00', '0.60', '2022-09-22', '08:01:00'),
(12414, '16.80', '46.50', '0.70', '2022-09-22', '08:31:00'),
(12415, '16.80', '51.40', '0.80', '2022-09-22', '09:01:00'),
(12416, '16.80', '41.40', '0.80', '2022-09-22', '09:31:00'),
(12417, '16.80', '35.00', '0.90', '2022-09-22', '10:00:00'),
(12418, '16.80', '8.60', '1.00', '2022-09-22', '10:31:00'),
(12419, '16.80', '1.70', '1.00', '2022-09-22', '11:01:00'),
(12420, '16.80', '1.40', '1.10', '2022-09-22', '11:31:00'),
(12421, '16.80', '0.00', '1.10', '2022-09-22', '12:01:00'),
(12422, '16.80', '0.00', '1.10', '2022-09-22', '12:31:00'),
(12423, '16.80', '0.00', '1.20', '2022-09-22', '13:01:00'),
(12424, '16.80', '0.00', '1.10', '2022-09-22', '13:31:00'),
(12425, '16.80', '0.00', '1.10', '2022-09-22', '14:01:00'),
(12426, '17.00', '0.00', '1.00', '2022-09-22', '14:31:00'),
(12427, '17.00', '0.00', '1.00', '2022-09-22', '15:01:00'),
(12428, '17.00', '1.70', '0.90', '2022-09-22', '15:31:00'),
(12429, '17.20', '0.00', '0.90', '2022-09-22', '16:01:00'),
(12430, '17.20', '0.00', '0.90', '2022-09-22', '16:31:00'),
(12431, '17.20', '0.00', '0.90', '2022-09-22', '17:01:00'),
(12432, '17.20', '0.00', '0.80', '2022-09-22', '17:31:00'),
(12433, '17.20', '0.00', '0.80', '2022-09-22', '18:01:00'),
(12434, '17.20', '0.00', '0.80', '2022-09-22', '18:31:00'),
(12435, '17.20', '0.00', '0.90', '2022-09-22', '19:01:00'),
(12436, '17.20', '0.00', '0.80', '2022-09-22', '19:31:00'),
(12437, '17.20', '0.00', '1.00', '2022-09-22', '20:01:00'),
(12438, '17.20', '0.00', '1.10', '2022-09-22', '20:31:00'),
(12439, '18.20', '0.90', '1.10', '2022-09-22', '21:01:00'),
(12440, '18.80', '0.00', '1.10', '2022-09-22', '21:31:00'),
(12441, '19.20', '0.00', '1.30', '2022-09-22', '22:01:00'),
(12442, '19.20', '3.40', '1.40', '2022-09-22', '22:31:00');

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
(21, '2022_09_22_PRAKICU KILANG.pdf', '2022-09-22'),
(22, '2022_09_22_PRAKICU KILANG AREA 70.pdf', '2022-09-22'),
(23, 'PETIR1.pdf', '2022-09-21'),
(24, 'PETIR 1.pdf', '2022-09-21'),
(25, 'PETIR3.pdf', '2022-09-12'),
(31, 'WP_20220922.pdf', '2022-09-22'),
(32, 'PTI1_20220922.pdf', '2022-09-22'),
(33, 'PPSC1_20220922.pdf', '2022-09-22'),
(34, 'GRAFIK PASUT 220922.pdf', '2022-09-22'),
(41, '21.jpeg', '2022-02-20'),
(42, 'Warning gelombang 21 SEPTEMBER 2022 - 23 SEPTEMBER 2022.pdf', '2022-09-21'),
(51, 'Gempa 01.pdf', '2022-09-08'),
(61, 'citra1663886353.gif', '2022-09-23'),
(62, '1.png', '2022-09-21'),
(63, '2.png', '2022-09-21');

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
(2, 'pertamina', '3a725fefb342fc86ed5834f51be6eb21', 'user'),
(5, 'forecaster', '7f2c3a0fa7a4a62d82cfbaf19f97d68e', 'admin'),
(8, 'satu', 'satu', 'user');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12443;

--
-- AUTO_INCREMENT untuk tabel `bmkgfiles`
--
ALTER TABLE `bmkgfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
