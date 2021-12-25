-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2021 pada 11.37
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
(23, 'informasi-petir.pdf', '2021-12-24'),
(31, 'prakiraan-cuaca-wilayah-pelayanan.pdf', '2021-12-24'),
(32, 'prakiraan-cuaca-pelabuhan-laut.pdf', '2021-12-24'),
(33, 'prakiraan-cuaca-pelabuhan.pdf', '2021-12-24'),
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
