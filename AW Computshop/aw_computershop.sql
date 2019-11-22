-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 11:36 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aw_computershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(13) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'abdi', 'abdi', 'abdi gunawan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'abdygunawan023@gmail.com', 'Ndatauka', 'Abdi Gunawan', '082293204972', 'Jalan Perintis Kemerdekaan 7 '),
(4, 'kurniawan@gmail.com', '12345', 'Moh Kurniawan', '081421134567', 'ANTANG KOTA'),
(6, 'abdi@gunawan', '12345678', 'Abdi', '082293204972', 'London , Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `status_pembelian` enum('Tidak Disetujui','Disetujui') NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `status_pembelian`, `total_pembelian`) VALUES
(14359, 1, '2019-06-23', 'Disetujui', 127000000),
(14360, 1, '2019-06-23', 'Tidak Disetujui', 37500000),
(14361, 1, '2019-06-25', 'Disetujui', 23600000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 3),
(3, 0, 26, 4),
(4, 0, 27, 1),
(5, 0, 26, 4),
(6, 0, 27, 1),
(7, 9, 26, 4),
(8, 9, 27, 1),
(9, 10, 26, 4),
(10, 10, 27, 1),
(11, 11, 26, 4),
(12, 11, 27, 1),
(13, 12, 26, 4),
(14, 12, 27, 1),
(15, 13, 26, 4),
(16, 13, 27, 1),
(17, 14, 26, 4),
(18, 14, 27, 2),
(19, 15, 26, 1),
(20, 16, 26, 1),
(21, 17, 27, 1),
(22, 18, 26, 1),
(23, 18, 27, 1),
(24, 19, 26, 1),
(25, 19, 27, 17),
(26, 20, 27, 1),
(27, 21, 27, 1),
(28, 22, 27, 1),
(29, 23, 26, 1),
(30, 24, 26, 1),
(31, 25, 27, 1),
(32, 26, 29, 1),
(33, 27, 30, 1),
(34, 27, 29, 7),
(35, 28, 29, 1),
(36, 28, 30, 1),
(37, 29, 29, 1),
(38, 30, 29, 1),
(39, 31, 30, 1),
(40, 31, 29, 17),
(41, 32, 29, 1),
(42, 32, 30, 8),
(43, 33, 31, 3),
(44, 33, 32, 1),
(45, 34, 30, 1),
(46, 34, 32, 1),
(47, 34, 33, 1),
(48, 35, 30, 2),
(49, 35, 33, 1),
(50, 36, 30, 1),
(51, 37, 30, 1),
(52, 38, 30, 1),
(53, 38, 33, 1),
(54, 39, 30, 1),
(55, 40, 30, 1),
(56, 40, 32, 1),
(57, 40, 34, 1),
(58, 41, 32, 1),
(59, 42, 30, 1),
(60, 42, 32, 2),
(61, 42, 34, 1),
(62, 43, 30, 1),
(63, 44, 32, 1),
(64, 45, 33, 1),
(65, 45, 34, 1),
(66, 46, 30, 1),
(67, 47, 30, 2),
(68, 48, 33, 1),
(69, 48, 34, 1),
(70, 49, 30, 2),
(71, 49, 32, 1),
(72, 50, 32, 3),
(73, 50, 34, 8),
(74, 51, 32, 1),
(75, 52, 32, 1),
(76, 52, 34, 2),
(77, 53, 34, 1),
(78, 53, 36, 1),
(79, 54, 36, 1),
(80, 54, 37, 1),
(81, 55, 32, 3),
(82, 55, 34, 1),
(83, 56, 32, 1),
(84, 57, 40, 10),
(85, 14357, 36, 1),
(86, 14357, 40, 1),
(87, 14358, 32, 1),
(88, 14359, 34, 2),
(89, 14359, 40, 1),
(90, 14360, 32, 5),
(91, 14361, 32, 1),
(92, 14361, 34, 1),
(93, 14361, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(32, 'ACER SWIFT 3', 7500000, 4000, 'Acer-Swift-3-SF314-55-SF314-55G-wp-Silver-photogallery-02.png', '        INTEL CORE I7 GEN 9\r\nRAM 8GB\r\nSSD 500 gr\r\n                              '),
(34, 'ASUS GL11X', 11000000, 3000, 'download (3).jpg', 'Intel Core I7 GEN 8\r\nRAM 8GB DDR4\r\nSSD 128GB\r\nHDD 1TB'),
(36, 'HP 14 BW002AX', 5200000, 2000, 'HP-14-BW002AX-YaTekno-768x499.jpg', 'Microprocessor	AMD Dual-Core A9-9420 APU (3 GHz base frequency, up to 3.6 GHz burst frequency, 1 MB cache)\r\nMemory, standard	4 GB DDR4-2400 SDRAM (1 x 4 GB)\r\nVideo graphics	AMD Radeonâ„¢ 520 Graphics (2 GB DDR3 dedicated)\r\nHard drive	1 TB 5400 rpm SATA\r\nOptical drive	DVD-Writer\r\nDisplay	14\" diagonal HD SVA BrightView WLED-backlit (1366 x 768)\r\nKeyboard	Full-size island-style keyboard\r\nPointing device	Touchpad with multi-touch gesture support\r\nWireless connectivity	802.11b/g/n (1x1) Wi-FiÂ® and BluetoothÂ® 4.2 combo\r\nNetwork interface	Integrated 10/100/1000 GbE LAN'),
(37, 'Asus A455LA', 5100000, 2500, 'Asus-A455LA-YaTekno-768x615.jpg', 'Asus kembali meluncurkan laptop harga 5 jutaan yang dibekali dengan spesifikasi tinggi, laptop tersebut adalah Asus A455LA.\r\n\r\nDibanderol seharga 5,4 jutaan, laptop berlayar 14 inci ini dipersenjatai oleh prosesor Intel Core i3-5005U yang mempunyai clock-speed 2.0 GHz. Jenis prosesor yang diadopsinya sudah tergolong lumayan untuk sebuah laptop seharga 5 jutaan.\r\n\r\nMasih diseputar hardware-nya, Asus juga menyematkan VGA Intel HD Graphics 4400 sebagai kartu grafisnya, serta RAM berukuran 4GB tipe DDR3 sebagai pendukung kinerja prosesornya. Untuk penyimpanan datanya, Asus A455LA menyediakan Harddisk selonggar 500GB.'),
(38, 'HP IP 500-15ISK-80NT00-HCID', 9597000, 3200, 'HP-14-BW002AX-YaTekno-768x499.jpg', '\r\nSpesifikasi dan Harga HP IP 500-15ISK-80NT00-HCID\r\nProsesor	 Intel Core i7-6500U\r\nKecepatan	 2.5 â€“ 3.1 GHz\r\nVGA	 R7 M360 2 GB\r\nHDD	 1 TB\r\nSSD	 â€“\r\nRAM	 4 GB\r\nUkuran Layar	 14 inch Full HD\r\nAksesoris	 DVD/BT/CAM\r\nSistem Operasi	 Windows 10'),
(39, 'ASUS P2420LJ-WO0116E', 9600000, 3000, 'ASUS-P2420LJ-WO0116E-e1489939378799.jpg', '\r\nSpesifikasi dan Harga ASUS P2420LJ-WO0116E.D\r\nProsesor	 Intel Core i7-5500U\r\nKecepatan	 2.4 â€“ 3.0 GHz\r\nVGA	 NVIDIA GeForce GT920M 2 GB\r\nHDD	 1 TB\r\nSSD	 â€“\r\nRAM	 4 GB\r\nUkuran Layar	 14.1 inch\r\nAksesoris	 DVD/BT/CAM/Fingerprint\r\nSistem Operasi	 Windows 10 Pro'),
(40, 'ACER PREDATOR 21x', 105000000, 8500, 'Wqsbxp6CjEAzX5CBp5GgM5-480-80.jpg', '\r\nTipe	Tipe Laptop 	Notebook , Laptop gaming\r\nSpesifikasi Dasar	CPU 	Core i7\r\nModel Prosesor	i7-7820HK\r\nKecepatan Prosesor	2.90 GHz\r\nCPU Cache	8MB\r\nKecepatan Turboboost	3.90 GHz\r\nModel GPU	Nvidia GeForce GTX 1080 (SLI)\r\nMemori & Penyimpanan	RAM 	64GB\r\nTipe Memori	DDR4 SDRAM\r\nSlot Memori	4 slots\r\nTipe Penyimpanan	HDD , SSD\r\nHDD 	1TB\r\nSSD/eMMC	1TB\r\nDrive Optikal	no\r\nLayar	Ukuran Layar 	21 inches\r\nResolusi	2560 x 1080 pixel\r\nTipe Panel	21:9 aspect ratio, 1800R Curved Screen,\r\nNetwork	Ethernet	Gigabit Ethernet\r\nWiFi	IEEE 802.11ac\r\nKonektifitas	Konektifitas	HDMI , USB3.0 , Bluetooth , Card Reader , Camera , Speakers , Microphone , 10 key , USB Type-C , USB3.1\r\nSoftware	OS 	Windows 10\r\nOS Ver	Windows 10 Home 64-bit\r\nBaterai	Baterai	Lithium Ion 6000 mAh\r\n8-cell\r\nUkuran	Dimensi	Height	3.3\"\r\nHeight (Front)	2.71\"\r\nHeight (Rear)	3.28\"\r\nWidth	22.4\"\r\nDepth	12.4\"\r\nBerat	approx. 8.5 kg\r\n'),
(41, 'SPESIFIKASI ALIENWARE 17 R4', 21000000, 6000, 'alienware-17-r4-300x169.png', 'SPESIFIKASI ALIENWARE 17 R4\r\n\r\nDimensi	16,7 x 13,1 x 1,18 inci\r\nBerat	4 Kilogram\r\nLayar	17,3 inch anti-glare panel Full HD (1920 x 1080), IPS, Tobii IR eye-tracking\r\nSistem Operasi	Windows 10\r\nProsesor	Intel Core i7-7700 HQ, Core i7-7820\r\nRAM	8 GB DDR4\r\nKartu Grafis (VGA)	NVIDIA GeForce GTX 1050, GTX 1060, GTX 1070, GTX 1080, AMD Radeon RX 470\r\nBaterai	68 Watt-hours\r\nPenyimpanan	SSD 180 GB up to 1 TB\r\nKonektivitas	Killer Networks e2500 Gigabit Ethernet, Wireless 802.11ac, Bluetooth 4.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14362;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
