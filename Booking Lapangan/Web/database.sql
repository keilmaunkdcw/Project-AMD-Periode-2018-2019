-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2019 at 10:38 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9626789_d_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(255) NOT NULL,
  `kodeunik` varchar(38) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `NIK` varchar(27) NOT NULL,
  `notelp` varchar(38) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_sewa` varchar(87) NOT NULL,
  `jammulai` varchar(84) NOT NULL,
  `jamselesai` varchar(45) NOT NULL,
  `lapangan` varchar(11) NOT NULL,
  `status` enum('Lunas','Belum Bayar') NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`idbooking`, `kodeunik`, `nama`, `NIK`, `notelp`, `alamat`, `tgl_sewa`, `jammulai`, `jamselesai`, `lapangan`, `status`, `total`) VALUES
(71, 'sadsda', 'aan', '100288282', '09228', 'aaasu', '20-01-2009', '12:30', '13:30', 'D', 'Lunas', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `lapangan` (`lapangan`),
  ADD KEY `lapangan_2` (`lapangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
