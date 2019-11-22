-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 06:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(191) NOT NULL,
  `nama_admin` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `tgl_lahir`, `created_at`) VALUES
(1, 'adira', 'adi123', '2019-05-27', '2019-05-18 06:46:01'),
(3, 'ardi', 'ardi123', '2019-05-06', '2019-05-21 14:11:18'),
(4, 'bayu', 'bayu123', '1999-07-09', '2019-05-25 09:08:14'),
(5, 'Adi', 'adi123', '1999-12-14', '2019-05-25 09:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(191) NOT NULL,
  `nama_lowongan` varchar(191) NOT NULL,
  `deskripsi1` text NOT NULL,
  `deskripsi2` text NOT NULL,
  `deskripsi3` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `nama_lowongan`, `deskripsi1`, `deskripsi2`, `deskripsi3`, `created_at`) VALUES
(1, 'Backend Developer', '1. Minimal satu (1) tahun pengalaman sebagai Backend Developer', '2. Menguasai Bahasa Pemrograman PHP', '3. Menguasai framework Laravel, Codeigniter (lebih diutamakan)', '2019-05-18 08:24:03'),
(2, 'Frontend Developer', '1. Minimal satu (1) tahun pengalaman sebagai Front-End Developer', '2. Menguasai HTML5, CSS3, Javascript', '3. Menguasai framework Bootstrap (lebih diutamakan)', '2019-05-18 08:24:03'),
(3, 'Android Developer', '1. Minimal satu (1) tahun pengalaman sebagai Android Developer', '2. Menguasai bahasa pemrograman Java, Kotlin', '3. Terbiasa dengan JSON, API, Web Service', '2019-05-18 09:11:18'),
(4, 'iOS Developer', '1. Minimal satu (1) tahun pengalaman sebagai iOS Developer', '2. Menguasai SWIFT atau Objective C ', '3. Menguasai Object Oriented Programming (OOP)', '2019-05-18 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_rekrutment`
--

CREATE TABLE `peserta_rekrutment` (
  `id` int(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `tgllahir` date NOT NULL,
  `jkel` varchar(10) NOT NULL,
  `email` varchar(191) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `id_lowongan` int(191) NOT NULL,
  `id_username` varchar(191) NOT NULL,
  `gambar` varchar(191) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta_rekrutment`
--

INSERT INTO `peserta_rekrutment` (`id`, `nama`, `tgllahir`, `jkel`, `email`, `nik`, `nohp`, `alamat`, `agama`, `id_lowongan`, `id_username`, `gambar`, `ukuran`, `tipe`) VALUES
(1, 'Ardianto Rannu', '1999-05-07', 'Laki-Laki', 'ardi@gmail.com', '77655675675675', '08656546456456', 'Jln. Biring Romang', 'Kristen Protestan', 1, 'ardi', '3x4.jpg', 88701, 'image/jpeg'),
(2, 'Budi', '1998-08-12', 'Laki-Laki', 'buadi@gmail.com', '4534534534646', '0854564565464', 'Jakarta', 'Islam', 2, 'budi', 'xcccsc.jpg', 4154, 'image/jpeg'),
(3, 'Sinta', '1997-12-09', 'Perempuan', 'sinta@gmail.com', '3423424235534', '0853242343243', 'Makassar', 'Islam', 3, 'sinta', 'sdcsdc.jpg', 6817, 'image/jpeg'),
(4, 'Ani', '1996-12-12', 'Perempuan', 'ani@gmail.com', '34353454645654', '08545645645645', 'Jakarta', 'Islam', 4, 'Ani', 'sdad.jpg', 5550, 'image/jpeg'),
(5, 'Anton', '1993-02-09', 'Laki-Laki', 'anton@gmail.com', '435454645656445', '0865646565464', 'Bandung', 'Islam', 1, 'Anton', 'fbd.jpg', 8249, 'image/jpeg'),
(6, 'Resky', '1999-12-07', 'Perempuan', 'resky@gmail.com', '54645645664564', '0853244546546', 'Surabaya', 'Kristen Protestan', 3, 'Resky', 'cascsac.jpg', 8637, 'image/jpeg'),
(7, 'Willy', '1998-02-02', 'Perempuan', 'willy@gmail.com', '324234234234', '085433534543', 'Kendari', 'Islam', 2, 'Willy', 'index.jpg', 7687, 'image/jpeg'),
(8, 'Dani', '1999-07-10', 'Laki-Laki', 'dani@gmail', '65464564566456', '0856456546456', 'Bogor', 'Islam', 2, 'Dani', 'sdcsdv.jpg', 5152, 'image/jpeg'),
(9, 'Abdi', '1999-12-04', 'Laki-Laki', 'abdi@gmail.com', '5654546456456', '0854534534534', 'Makassar', 'Islam', 4, 'Abdi', 'dsvsv.jpg', 6077, 'image/jpeg'),
(10, 'Nunu', '1999-08-12', 'Laki-Laki', 'nunu@gmail.com', '23423424242423', '08546456456546', 'Makassar', 'Islam', 1, 'Nunu', 'dsfsdv.jpg', 3370, 'image/jpeg'),
(11, 'Yudha', '1999-05-12', 'Laki-Laki', 'yudha@gmail.com', '54645645645646', '08654645654654', 'Surabaya', 'Khatolik', 3, 'Yudha', 'sdvsdvd.jpg', 8403, 'image/jpeg'),
(12, 'Yanti', '1999-04-08', 'Perempuan', 'yanti@gmail.com', '54645645645646', '08554646564645', 'Toraja', 'Kristen Protestan', 2, 'Yanti', 'sdsdf.jpg', 7260, 'image/jpeg'),
(13, 'Bayu', '1999-08-07', 'Laki-Laki', 'bayu@gmail.com', '45465657567567', '08534324234344', 'Makassar', 'Islam', 1, 'bayu', 'sdcsdv.jpg', 5152, 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES
(12, 'ardi', 'ardi', '2019-05-23 22:16:30'),
(14, 'ardi', 'ardi123', '2019-05-24 14:43:58'),
(15, 'budi', 'budi123', '2019-05-25 02:34:05'),
(16, 'sinta', 'sinta', '2019-05-25 03:00:16'),
(17, 'Ani', 'ani123', '2019-05-25 03:04:00'),
(18, 'Anton', 'a123', '2019-05-25 03:09:29'),
(19, 'Resky', 'r123', '2019-05-25 03:12:02'),
(20, 'Willy', 'w123', '2019-05-25 03:14:35'),
(21, 'Dani', 'd123', '2019-05-25 03:21:52'),
(22, 'Abdi', 'a123', '2019-05-25 03:25:46'),
(23, 'Nunu', 'n123', '2019-05-25 03:28:00'),
(24, 'Yudha', 'y123', '2019-05-25 03:29:37'),
(25, 'Yanti', 'y123', '2019-05-25 03:32:48'),
(26, 'bayu', 'bayu', '2019-05-25 12:05:30'),
(27, 'baco', 'baco', '2019-05-25 12:13:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_rekrutment`
--
ALTER TABLE `peserta_rekrutment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peserta_rekrutment`
--
ALTER TABLE `peserta_rekrutment`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
