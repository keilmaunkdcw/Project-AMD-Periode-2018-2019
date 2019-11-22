-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2019 pada 07.53
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'fifa', 'fifa', '1234'),
(2, 'fauzan', 'fauzan', '1234'),
(3, 'ichsan`', 'ichsannnn', 'ichsan'),
(4, 'hdvhvshvds', 'jsjssjgj', 'jgskjgas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` int(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto_lokasi` varchar(100) NOT NULL,
  `maps` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `lokasi`, `deskripsi`, `foto_lokasi`, `maps`) VALUES
(1, 'Pantai Losari', 'Makassar,Sulawesi Selatan,Indonesia', '         Tempat wisata di sulawesi selatan yang pertama tentunya adalah pantai losari. Pantai losari ini berada di kota makassar, yang menjadi ibukota dari sulawesi selatan, maka tak heran jika pantai losari ini menjadi icon dari kota Angin mammiri (julukan untuk kota makassar) ini.\r\n\r\n         Pantai losari menawarkan pemandangan yang sangat indah, disini terdapat tiga anjungan yang bisa anda gunakan untuk memanjakan mata, dimana, setiap anjungan menawarkan panorama alam yang berbeda-beda. ', 'plosari.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7513767238006!2d119.40546796430039!3d-5.143675403443973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d52ea30d089%3A0x6101a2ac09b61090!2sPantai+Losari!5e0!3m2!1sid!2sid!4v1557943696710!5m2!1sid!2sid'),
(2, 'Pantai Tanjung Bira', 'Bulukumba,Sulawesi Selatan,Indonesia', '         Pantai Tanjung Bira sudah tersohor namanya sampai ujung dunia, dengan degradasi paduan biru, putih dan hijau yang sangat mangagumkan, degradasi ini akan nampak jelas jika anda melihat keindahan pantai tanjung bira dari udara. Dijamin keren abis! Pantai ini terletak sekitar 210 kilometer dari kota Makassar, bisa ditempuh dengan perjalanana darat sekitar 4-5 jam. Tepatnya berada di kabupaten Bulukumba, sekitar 40 km dari pusat kota. Dengan buaian batu karang yang indah dan pasir putih yan', 'pbira.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15882.79006340519!2d120.43891526952167!3d-5.611613429947693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbbf3fa9e2f1c37%3A0x6217cb35c3073b6a!2sPantai+Tj.+Bira!5e0!3m2!1sid!2sid!4v1557945504639!5m2!1sid!2sid'),
(3, 'Pantai Marina', 'Bantaeng,Sulawesi Selatan,Indonesia', '       Kesohoran pantai Marina memang berangkat dari prestasi Bupatinya yang mendunia, dengan pembangunan yang begitu megah, walau terbilang baru, pantai ini langsung naik ratting dan terkenal sepenjuru jagad ini. Secara administratif pantai ini termasuk dalam wilayah Dusun Korong Batu, Desa Baruga, Kecamatan Paâ€™jukukang, Kabupaten Bantaeng yang menjadi pintu masuk untuk menjelajah ke pantai-pantai di kabupaten Bulukumba.', 'pmarina.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.8777310644036!2d120.09841981401188!3d-5.585084795950829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db954f78dae4cbb%3A0xca5543aa726933bb!2sPantai+Marina+Bantaeng!5e0!3m2!1sid!2sid!4v1557947273321!5m2!1sid!2sid'),
(10, 'Pantai Baloyya', 'Selayar,Sulawesi Selatan,Indonesia', '        Pantai Baloiya ini berada di Desa Patikarya, Kecamatan Bontosikuyu. Jaraknya kira-kira hanya 10 kilometer dari Kota Benteng, Kabupaten Selayar\r\n\r\n        Kabupaten ini merupakan kabupaten paling ujung disulawesi selatan, memiliki sekitar 130 pulau, bisa dibayangkan dengan pulau sebanyak itu di selayar ini memiliki pantai yang indahnya ngga ketulungan, termasuk pantai Baloiya ini yang sangat eksotis abis.\r\n\r\n       Bukan hanya pantai dan pulau, di selayar juga terdapat Taman Nasional Taka', 'baloyya.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4423477249043!2d120.44392941401571!3d-6.205234295507896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dba36af96a288cb%3A0x3b4b6e8fa04ea994!2sPantai+Baloyya!5e0!3m2!1sid!2sid!4v1557947817325!5m2!1sid!2sid'),
(11, ' Pantai Timur', 'Selayar,Sulawesi Selatan,Indonesia', '       Pantai Timur ini masih terletak di Kabupaten Selayar, pantai yang satu ini selain menyajikan pesisir yang indah, juga menawarkan keindahan bawah laut yang menakjubkan. Pantai yang diselimuti batu karang yang besar dan indah juga tak mau kalah dengan jernihnya air laut yang menggoda.\r\n\r\n        Berada ditempat ini, seperti menyelam bersama kenikmatan. Ini hanya bagian kecil dari keindahan Taman Nasional Takabonerate. Dijamin tidak akan menyesal kalau ke tempat ini.', 'ptimur.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3550523124086!2d120.52415951401572!3d-6.216821295499638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dba36271564539b%3A0xb15905a60ca52ef3!2sPantai+Timur+Ngapaloka!5e0!3m2!1sid!2sid!4v1557948390650!5m2!1sid!2sid'),
(12, 'Pantai Lemo', 'Bulukumba,Sulawesi Selatan,Indonesia', '     Pantai Lemo-lemo, berbeda dengan Pantai Pasir Putih Tanjung Bira, keberadaan pantai ini mungkin masih asing di telinga para wisatawan. Letaknya sekira 300 meter dari Pantai Pasir Putih Tanjung Bira,  melewati bukit-bukit kecil dan jalan berkelok.\r\n\r\n      Berbeda dengan Pantai Pasir Putih Tanjung Bira yang hampir tak ada pepohonan, Pantai Lemo-lemo menyuguhkan suasana yang sejuk. Hutan dengan tumbuhan heterogen yang berada di sekitar pantai, membuat suasana di pantai ini terasa sejuk meski ', 'lemo.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.881320094361!2d120.39040111401192!3d-5.584555195951202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbbf6e1779770b5%3A0x49475e8826795abf!2sPantai+Lemo-Lemo!5e0!3m2!1sid!2sid!4v1557948877625!5m2!1sid!2sid'),
(13, 'Taman Nasional Bantimurung', 'Maros,Sulawesi Selatan,Indonesia', '        Taman ini terletak di Kabupaten Maros, sekitar 45 Kilometer dari pusat kota Makassar, selain panorama alam yang indah, taman ini terkenal juga sebagai kerajaan kupu-kupu, kok bisa? Karena ditaman nasional Bantimurung inilah rumah dari sekitar 250 spesies kupu-kupu, maka tak heran jika mascot dari taman ini adalah kupu-kupu.\r\n        Secara keseluruhan luas taman nasional Bantimurung ini mencapai 43.750 Ha, bisa dibayangin dengan luas tanah sebesar itu taman Bantimurng manawarkan keindaha', 'taman.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.537036725753!2d119.67938501400873!3d-5.016256096358731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbef65f74a34acd%3A0x390fcb2bf0609bd6!2sTaman+Nasional+Bantimurung+Bulusaraung!5e0!3m2!1sid!2sid!4v1557950424091!5m2!1sid!2sid'),
(14, 'Keâ€™te kesu', 'Toraja Utara, Sulawesi Selatan,Indonesia', '      Keâ€™te kesu sendiri memiliki pengertian pusat kegiatan, dimana di dalamnya terdapat perkampungan, tempat kerajinan ukiran, dan kuburan. Objek yang sangat mempesona dari desa ini berupa Tongkonan, lumbung padi, dan bangunan megalith disekitarnya.\r\n\r\n      Dibelakang perkampungan ini, sekitar jarak 100 meter terdapat situs pekuburan dengan kuburan bergantung dan tau-tau dalam bangunan batu yang diberi pagar. Biasanya tau-tau ini mencirikan penampilan pemiliknya sehari-hari. Terletak sekitar', 'ktkesu.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.362770145577!2d119.90769841400018!3d-2.996607397817616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93e9a14a223ea9%3A0x59c4c10ee4917c29!2sKe&#39;te&#39;+Kesu&#39;!5e0!3m2!1sid!2sid!4v1557950771010!5m2!1sid!2sid'),
(15, 'Museum Balla Lompoa', 'Gowa,Sulawesi Selatan,Indonesia', '      Museum ini berada di jalan Hasanuddin No.48 Sungguminasa, Somba Opu, Kabupaten Gowa, yang berbatasan langsung dengan Kota makassar. Museum Balla Lompoa merupakan rekonstruksi dari istana kerajaan Gowa yang didirikan oleh pemerintahan Raja Gowa ke-31 tepatnya pada tahun 1936 masehi, dan direstorasi pada tahun 1978-1980 masehi.\r\n\r\n      Museum ini dibangun diatas tanah seluas satu hektar yang dibatasi oleh tembok yang menjulang tinggi. Bangunan ini terdiri dari dua bagian, ruang utama seluas', 'museum.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.354710462028!2d119.4505919140097!3d-5.206825896221901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee225941b2653%3A0x5b47e356d6ab10de!2sMuseum+Balla+Lompoa!5e0!3m2!1sid!2sid!4v1557951005303!5m2!1sid!2sid'),
(16, 'pinisi.jpg', 'C:xampp	mpphpF8A.tmp', '      Kita tahu sejarah telah membuktikan bahwa Perahu Phinisi Nusantara telah berhasil berlayar ke Vancouver Kanada, amerika Serikat pada tahun 1986 masehi. Pusat kerajinan Perahu Phinisi ini terletak di pesisir pantai kelurahan Tana Beru, Kecamatan Bontobahari, sekitar 24 Km dari kota Bulukumba. Oleh karena itu, Bulukumba dijuluki sebagai Butta Panritta Lopi, yang artinya bumi atau tanah para ahli pembuat Perahu Phinisi.\r\n\r\n      Yang paling mengagumkan adalah masyarakat Tana Beru ini, mereka ', 'pinisi.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.326711849163!2d120.35035301401153!3d-5.518439595998545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbc09d85cf672f7%3A0x3646048aca859e60!2sPembuatan+kapal+pinisi!5e0!3m2!1sid!2sid!4v1557951423627!5m2!1sid!2sid'),
(17, 'Benteng Somba Opu', 'Gowa,Sulawesi Selatan,Indonesia', '      Benteng Samba Opu adalah objek wisata sejarah yang sayang untuk anda lewatkan jika berkunjung ke sulawesi selatan. Benteng ini dibangun pada tahun 1525 oleh Sultan Gowa ke IX Dg matanre Tumapparisi kallonna pada abad XIV (1550-1650).\r\n      Dulu benteng ini merupakan pusat perdagangan dan pelabuhan rempah-rempah yang ramai dikunjungi pedagang dari Asia dan Eropa. Pada tahun 1669, benteng ini dikuasai oleh VOC kemudian dihancurkan hingga terendam oleh ombak pasang. Tahun 1980-an, benteng in', 'somba.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.4642138788536!2d119.40013661400963!3d-5.189469196234373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee2741fb157a5%3A0x72ecff64bd8005da!2sBenteng+Somba+Opu!5e0!3m2!1sid!2sid!4v1557951821612!5m2!1sid!2sid'),
(22, 'Monumen Cinta Sejati Habibie Ainun', 'Lapangan Andi Makkasau, Jl. Karaeng Burane, Mallus', 'Monumen Cinta Sejati Habibie Ainun merupakan monumen yang terletak di Parepare, Sulawesi Selatan. Monumen Cinta Sejati ini, dibuat untuk mengenang cinta Presiden ketiga Republik Indonesia Bacharuddin Jusuf Habibie kepada istrinya Hasri Ainun Besari, dan untuk menginspirasi warga Parepare.', 'habibie.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.0380270419187!2d119.61978741429145!3d-4.012599045806061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bb232bf5cf11%3A0x3a80ffefd0a13f1f!2sMonumen+Cinta+Sejati+Habibie+-+Ainun!5e0!3m2!1sid!2sid!4v1558090045573!5m2!1sid!2sid'),
(23, 'Tonranggeng Riverside', 'Lumpue, Bacukiki Bar, Kota Pare-Pare, Sulawesi Sel', 'Tonrangeng river side ini mulai menjadi sangat dikenali oleh khalayak ramai. Tonrangeng River side yang kini sudah selesai dibangun dan menjadi new icon di wilayah Sulawesi Selatan, tepatnya di Parepare menelan anggaran sekitar Rp23 miliar, bersumber dari anggaran Insfrastruktur Publik Daerah (IPD) bantuan pemerintah pusat yang dialokasikan ke Parepare melalui Dinas Pekerjaan Umum di tahun 2016. Tonrangeng River side merupakan jembatan layang yang digunakan sebagai akses utama yang menghubungkan', 'trs.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.8672252848605!2d119.62371181400397!3d-4.047499597056691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d95bca293d650b9%3A0x56d1ad029507070f!2sTonrangeng+Riverside!5e0!3m2!1sid!2sid!4v1558090752149!5m2!1sid!2sid'),
(24, 'Londa', ' Desa Sandan Uai, Kecamatan Sanggalangi Kabupaten ', '      Londa merupakan salah satu objek wisata dari sekian banyak objek wisata yang ada di toraja, baik toraja utara maupun di tana toraja. Londa sendiri adalah objek wisata tempat makam goa yang berada di sebuah bukit, di dalamnya juga berisi peti mati, tulang dan tengkorak jenazah yang sudah berumur ratusan tahun.\r\n\r\n      Ketika sampai dilokasi objek wisata, kita akan diperhadapkan dengan barisan patung kayu yang dikenal dengan nama Tau-Tau. Tau-tau merupakan patung dari jenazah yang dimakamka', 'londa.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15937.080584240477!2d119.87180081465294!3d-3.0219443147875262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93ebe1e93bb753%3A0x155aba7bc59dedd2!2sBuntu+Londa!5e0!3m2!1sid!2sid!4v1558091928661!5m2!1sid!2sid'),
(25, 'Buntu Burake', 'Makale,Tanah Toraja,Sulawesi Selatan,Indonesia', '       Buntu Burake yang terletak di Kabupaten Tana Toraja,destinasi yang terletak sekitar 4 kilometer dari pusat kota Makale itu tengah menjadi destinasi favorit turis lokal hingga mancanegara. Pasalnya, di puncak gunung tersebut terdapat patung Yesus Kristus tertinggi.\r\n       Patung itu memiliki tinggi 40 meter dan menghadapi Kota Makale. Ikon wisata Tana Toraja bahkan mengalahkan tinggi patung Kristus Penebus di Brasil kalau dihitung dari permukaan laut.', 'bb.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.004422922555!2d119.85803326465665!3d-3.094363963946922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93edeedeecc559%3A0x9109dd47653917f!2sBuntu+Burake%2C+Makale%2C+Kabupaten+Tana+Toraja%2C+Sulawesi+Selatan!5e0!3m2!1sid!2sid!4v1558092452510!5m2!1sid!2sid'),
(26, 'Benteng Fort Rotterdam', 'Jl. Ujung Pandang, Bulo Gading, Kec. Ujung Pandang', 'Benteng Fort Rotterdam sendiri merupakan salah satu benteng yang dianggap termegah dan menawan di Sulawesi Selatan. Menurut sebuah catatan dari sumber yang saya temukan â€œ Seorang wartatwan New York Times , Barbara Crossette pernah menggambarkan benteng ini sebagai the best preserved dutch fort in asiaâ€œ. Tetapi, apakah benar begitu adanya? Apa lagi ketika saya mengunjungi benteng dan sedikit berkeliling, kondisi benteng cukup â€œmorat â€“ maritâ€ atau berantakan.', 'Benteng Fort Rotterdam.jpg', 'https://www.google.com/maps/embed?pb'),
(27, 'Lempe Lolai', 'Desa Lempe,Toraja Utara,Sulawesi Selatan,Indonesia', 'Objek wisata ini berada sekitar 20 kilometer dari Ibukota Kabupaten Toraja Utara, Rantepao. Julukan negeri di atas awan disematkan karena lokasinya berada di ketinggian 1.300 mdpl. Hingga kini, Kampung Lolai tak pernah sepi pengunjung, baik dari dalam maupun luar negeri. Tak jarang pemandangannya mengundang decak kagum wisatawan.', 'lolai.webp', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5461205539877!2d119.85657141400011!3d-2.945810697854483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93c195ee6d9f4d%3A0xe359ccad64c32fd4!2sTongkonan+Lempe-Lolai-Toraja+Utara!5e0!3m2!1sid!2sid!4v1558093584087!5m2!1sid!2sid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
