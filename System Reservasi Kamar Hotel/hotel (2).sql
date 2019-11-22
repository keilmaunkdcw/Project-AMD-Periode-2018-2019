-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2019 pada 03.34
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kamar_id` varchar(20) NOT NULL,
  `jumlah_kamar` int(20) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `status_bayar` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `tgl_masuk`, `tgl_keluar`, `kamar_id`, `jumlah_kamar`, `total_bayar`, `status_bayar`) VALUES
(42, '25', '2019-06-13', '2019-06-15', '4', 4, 1600000, '2'),
(43, '25', '2019-06-15', '2019-06-16', '4', 2, 800000, '2'),
(44, '27', '2019-06-15', '2019-06-22', '4', 1, 1600000, '0'),
(45, '28', '2019-06-17', '2019-06-19', '4', 3, 1200000, '2'),
(46, '25', '2019-06-18', '2019-06-20', '4', 3, 1200000, '2'),
(47, '31', '2019-06-18', '2019-06-19', '4', 3, 600000, '2'),
(48, '33', '2019-06-20', '2019-06-23', '4', 3, 1800000, '2'),
(49, '41', '2019-06-22', '2019-06-28', '6', 3, 1800000, '2'),
(50, '41', '2019-06-22', '2019-06-24', '4', 3, 1200000, '0'),
(51, '42', '2019-06-24', '2019-06-25', '4', 3, 1200000, '2'),
(52, '42', '2019-06-24', '2018-06-25', '4', 3, 18000000, '0'),
(53, '43', '2019-06-24', '2019-06-24', '4', 3, 600000, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(18) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id`, `nama`, `email`, `no_hp`, `pesan`) VALUES
(2, 'ichan', 'a@a', '123', 'aab'),
(3, 'aaaaaa', 'chan@gmail.com', '082397795777', '123456'),
(4, 'muhammad ichsan', 'muhammadichsanduatiga@gmail.co', '082397795777', 'saya sangat bahagia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `nama`, `harga`) VALUES
(4, 'Deluxe room ', 200000),
(5, 'Superior Room', 150000),
(6, 'Junior room', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_bayar`
--

CREATE TABLE `konfirmasi_bayar` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `no_req` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_bayar`
--

INSERT INTO `konfirmasi_bayar` (`id`, `booking_id`, `tanggal`, `nama_pengirim`, `no_req`, `status`) VALUES
(13, '42', '2019-06-14', 'ichan dong', '12345654321', '1'),
(14, '43', '2019-06-15', 'ichsan', '23456', '1'),
(15, '45', '2019-06-17', 'ichsan', '234567890', '1'),
(16, '46', '2019-12-06', 'ichsan', '1234567890', '1'),
(17, '47', '2019-06-18', 'ichsan', '12345', '1'),
(18, '48', '2019-06-20', 'Ahdiat', '3245678', '1'),
(19, '49', '2019-06-22', 'Ishak', '123456', '1'),
(20, '51', '2019-06-25', 'ichsan', '1234456', '1'),
(21, '53', '2019-06-24', 'Ichsan', '083456986799', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `status`) VALUES
(24, 'chan', 'chan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '0'),
(25, 'ichan', 'ichan@chan', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(26, 'ichan', 'chn@a', 'f970e2767d0cfe75876ea857f92e319b', '2', '0'),
(27, 'a', 'a@a', '0cc175b9c0f1b6a831c399e269772661', '2', '0'),
(28, 'ichsan', 'muhammadichsanduatiga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '0'),
(29, 'ichan', 'chancan@can', '202cb962ac59075b964b07152d234b70', '2', '0'),
(30, 'ichsan', 'ichsan@ichsan', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(31, 'xxx', 'x@x', '202cb962ac59075b964b07152d234b70', '2', '0'),
(32, 'ichsan', 'chan@chan', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(33, 'ahdiat', 'ahdiat@ahh.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(34, 'ichsan', 'abdi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(35, 'abdi', 'abdimanis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(40, 'muhammad ichsan', 'ichsan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '0'),
(41, 'Ishak', 'ishak@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(42, 'ichsan', 'ichsan23@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0'),
(43, 'ichsan', 'ichanchan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
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
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
