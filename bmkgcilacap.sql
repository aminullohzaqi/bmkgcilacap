-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2021 pada 09.57
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmkgcilacap`
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
(10, '1.40', '0.00', '1.70', '2021-12-25', '15:51:00'),
(11, '1.40', '0.00', '1.80', '2021-12-25', '15:51:00'),
(12, '1.40', '0.00', '1.70', '2021-12-25', '16:42:00'),
(15, '0.00', '290.90', '1.20', '2021-12-26', '03:07:00'),
(16, '0.00', '711.10', '1.20', '2021-12-26', '03:08:00'),
(18, '0.00', '972.50', '1.30', '2021-12-26', '03:28:00'),
(22, '0.00', '1111.80', '1.30', '2021-12-26', '03:34:00'),
(23, '0.00', '1188.00', '1.40', '2021-12-26', '03:53:00'),
(24, '0.00', '972.30', '1.60', '2021-12-26', '05:10:00'),
(25, '0.00', '944.50', '1.00', '2021-12-27', '02:17:00'),
(26, '0.00', '371.50', '0.90', '2021-12-27', '02:23:00'),
(27, '0.00', '794.00', '1.00', '2021-12-27', '02:38:00');

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
(11, 'prakiraan-hujan-lebat.pdf', '2021-12-24'),
(21, 'prakiraan-kilang-pertamina.pdf', '2021-12-24'),
(22, 'prakiraan-area-70.pdf', '2021-12-24'),
(23, 'petir3.png', '2021-12-27'),
(24, 'petir2.png', '2021-12-27'),
(25, 'petir1.png', '2021-12-27'),
(31, 'prakiraan cuaca wilayah pelayanan.pdf', '2021-12-27'),
(32, 'prakiraan cuac pelabuhan laut.pdf', '2021-12-27'),
(33, 'prakiraan cuac pelabuhan laut.pdf', '2021-12-27'),
(34, 'pasut.pdf', '2021-12-24'),
(41, 'peringatan-dini-cuaca.pdf', '2021-12-24'),
(42, 'peringatan-dini-gelombang-tinggi.pdf', '2021-12-24'),
(51, 'gempa-bumi.pdf', '2021-12-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'bmkg', 'tunggulwulung', 'admin');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `bmkgfiles`
--
ALTER TABLE `bmkgfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
