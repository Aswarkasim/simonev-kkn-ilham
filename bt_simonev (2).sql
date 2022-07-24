-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 01:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bt_simonev`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(6) UNSIGNED NOT NULL,
  `nama_produk` varchar(30) DEFAULT NULL,
  `tipe_produk` varchar(30) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  `stok` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `tipe_produk`, `harga`, `stok`) VALUES
(23, 'anco', 'cair', 12000, 12),
(24, 'Papan pengalas Pamungkas', 'padat', 12000, 2),
(25, 'Papan pengalas Pamungkas', 'padat', 12000, 2),
(26, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL),
(35, 'Papan pengalas', 'padat', 12000, 2),
(36, 'Papan pengalas Pamungkas', 'padat', 12000, 2),
(37, 'Mouse', 'Eletronik', 1200, 12),
(38, 'Mouse', 'Eletronik', 1200, 12),
(39, 'Minyak', 'Cair', 1200, 14),
(40, 'Bawang', 'Sayur', 1200, 9),
(41, 'Sanda', 'Padar', 90000, 65),
(42, 'Kayu', 'padat', 2000, 12),
(43, 'ayam', 'hewan1', 200, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrasi`
--

CREATE TABLE `tbl_administrasi` (
  `id_administrasi` varchar(20) NOT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `nama_administrasi` varchar(200) NOT NULL,
  `dokumen` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_administrasi`
--

INSERT INTO `tbl_administrasi` (`id_administrasi`, `id_angkatan`, `nama_administrasi`, `dokumen`, `date_created`, `date_updated`) VALUES
('7OmntVhi', 'MEdIUxqs', 'Stempel', './assets/uploads/dokumen/bintang_tamu-1.pdf', '2021-10-02 07:28:47', '2021-10-07 13:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angkatan`
--

CREATE TABLE `tbl_angkatan` (
  `id_angkatan` varchar(20) NOT NULL,
  `nama_angkatan` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angkatan`
--

INSERT INTO `tbl_angkatan` (`id_angkatan`, `nama_angkatan`, `is_active`, `date_created`, `date_updated`) VALUES
('lfzFQrLw', 'Angkatan XXII', 0, '2021-09-28 06:32:48', '2021-10-02 13:01:32'),
('MEdIUxqs', 'Angkatan  A XXIV', 1, '2021-09-28 06:42:34', '2021-10-02 13:01:45'),
('MKNHtA81', 'Angkatan XXI', 0, '2021-09-28 06:42:17', '2021-10-02 13:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` varchar(20) NOT NULL,
  `judul_berita` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `isi` text NOT NULL,
  `slug` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `gambar`, `id_kategori`, `isi`, `slug`, `is_active`, `date_created`) VALUES
('7AEyn8rD', 'Air kemarau menjadi', './assets/uploads/images/thumb-sprites_(2).jpg', 23423, '<p>Puji syukur kehadirat Allah SWT &nbsp;atas limpahan karunia dan rahmat-Nya sehingga penulis dapat menyelesaikan hasil penelitian&nbsp;ini dengan judul &ldquo;Pengaruh Media Desain Grafis Berbasis Adobe Photoshop Terhadap Kreatifitas Belajar Siswa Pada Mata Pelajaran Desain Grafis di SMK Kartika Wirabuana XX-1&rdquo;.<strong>&nbsp;</strong>Tidak lupa pula shalawat serta salam kepada Rasulullah Muhammad SAW yang telah membawa manusia dari zaman kebodohan menuju zaman yang penuh dengan pengetahuan seperti sekarang. Selama proses penulisan hasil penelitian ini, penulis mengalami beberapa hambatan dan kesulitan namun berkat kerja keras dan adanya bimbingan serta motivasi dari berbagai pihak menjadikan penulis bersemangat untuk menyelesaikan penulisan hasil penelitian ini.&nbsp;Dengan penuh rasa hormat penulis menyampaikan penghargaan sebesar-besarnya kepada kedua</p>\r\n', 'cqgGHvzw-Air-kemarau-menjadi', 0, '0000-00-00 00:00:00'),
('9L31bJAF', 'Maju terus', './assets/uploads/images/artikel.jpg', 23423, '<p>Puji syukur kehadirat Allah SWT &nbsp;atas limpahan karunia dan rahmat-Nya sehingga penulis dapat menyelesaikan hasil penelitian&nbsp;ini dengan judul &ldquo;Pengaruh Media Desain Grafis Berbasis Adobe Photoshop Terhadap Kreatifitas Belajar Siswa Pada Mata Pelajaran Desain Grafis di SMK Kartika Wirabuana XX-1&rdquo;.<strong>&nbsp;</strong>Tidak lupa pula shalawat serta salam kepada Rasulullah Muhammad SAW yang telah membawa manusia dari zaman kebodohan menuju zaman yang penuh dengan pengetahuan seperti sekarang. Selama proses penulisan hasil penelitian ini, penulis mengalami beberapa hambatan dan kesulitan namun berkat kerja keras dan adanya bimbingan serta motivasi dari berbagai pihak menjadikan penulis bersemangat untuk menyelesaikan penulisan hasil penelitian ini.&nbsp;Dengan penuh rasa hormat penulis menyampaikan penghargaan sebesar-besarnya kepada kedua</p>\r\n', 'S32NgzvJ', 1, '2020-11-16 07:20:37'),
('dEwZarS5', 'Bersinergi melawan bangsa sendiri', './assets/uploads/images/1.jpg', 23423, '<p>lorem</p>\r\n', 'Menikah-di-era-pandemi', 0, '0000-00-00 00:00:00'),
('HIO1dcPx', 'Air kemarau menjadi', './assets/uploads/images/contact-list.png', 0, '<p>lorem ipsum</p>\r\n', 'QltRoncw-Air-kemarau-menjadi', 0, '2021-10-04 07:44:43'),
('q5l7dLW9', 'Kewiraushaan mandiri anak muda berkembang pesat', './assets/uploads/images/pexels-photo-210661.jpeg', 23423, '<p>lorem ipsumm</p>\r\n', 'IDb9OpQi-Kewiraushaan-mandiri-anak-muda-berkembang-pesat', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumentasi`
--

CREATE TABLE `tbl_dokumentasi` (
  `id_dokumentasi` varchar(5) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` varchar(15) DEFAULT NULL,
  `id_lokasi` varchar(15) DEFAULT NULL,
  `id_angkatan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumentasi`
--

INSERT INTO `tbl_dokumentasi` (`id_dokumentasi`, `gambar`, `deskripsi`, `date_created`, `id_user`, `id_lokasi`, `id_angkatan`) VALUES
('57380', './assets/uploads/images/dasar_html.jpg', 'dfasda sdas', '2021-11-27 08:48:13', '1629041001', '7veF8JYf', 'MEdIUxqs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kkn`
--

CREATE TABLE `tbl_kkn` (
  `id_kkn` varchar(20) NOT NULL,
  `nama_kkn` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kkn`
--

INSERT INTO `tbl_kkn` (`id_kkn`, `nama_kkn`, `deskripsi`, `date_created`, `date_updated`) VALUES
('VcqPkOxD', 'KKN Tematik', '', '2021-09-28 06:26:21', '2021-09-28 06:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(20) NOT NULL,
  `stok_min` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_aplikasi`, `nama_pimpinan`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `kontak_person`, `stok_min`) VALUES
(1, 'SIMONEV', 'Riski Amalia', 'Sulawesi Selatan', 'Makassar', 'Manggala', 'jl. Dg. Hayo', '085298730727', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `nama_laporan` varchar(200) NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `type` enum('Mahasiswa','DPL','','') NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_user`, `id_angkatan`, `id_lokasi`, `nama_laporan`, `dokumen`, `deskripsi`, `type`, `date_created`) VALUES
('0', '10', NULL, NULL, 'Laporan KKN', './assets/uploads/dokumen/bintang_tamu-1_(1).pdf', '', 'Mahasiswa', '2021-10-02 13:29:56'),
('2', '1629041001', '0', NULL, '', './assets/uploads/laporan/LEMBAR_PENGESAHAN_REVISI_HASIL_Aswar-ditandatangani2.pdf', '<p>00</p>', 'Mahasiswa', '2020-08-23 23:21:30'),
('iNHTBM7J', '11', 'MEdIUxqs', NULL, 'Laporan KKN', './assets/uploads/laporan/NH1777954.pdf', '', 'DPL', '2021-12-04 12:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id_logbook` int(11) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_dari` time NOT NULL,
  `waktu_sampai` time NOT NULL,
  `aktivitas` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id_logbook`, `id_user`, `tanggal`, `waktu_dari`, `waktu_sampai`, `aktivitas`, `gambar`, `date_created`) VALUES
(12, '9', '2020-12-24', '06:12:00', '06:23:00', '<p>lorem ipsu,x</p>', './assets/uploads/logbook/20160907_092559.jpg', '2020-12-22 06:08:08'),
(13, '', '2021-09-30', '12:11:00', '23:33:00', '<p>lorem</p>', '', '2021-09-30 13:06:15'),
(14, '1629041001', '2021-10-01', '23:22:00', '22:03:00', '<p>loewm</p>', NULL, '2021-09-30 13:06:44'),
(15, '1629041001', '2021-10-14', '08:20:00', '10:22:00', '<p>dfsdf</p>', NULL, '2021-10-14 07:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` varchar(20) NOT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `id_dpl` varchar(20) NOT NULL,
  `nama_lokasi` text NOT NULL,
  `deskripsi` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `id_angkatan`, `id_dpl`, `nama_lokasi`, `deskripsi`, `date_created`, `date_updated`) VALUES
('7veF8JYf', 'MEdIUxqs', '11', 'SMKN 1 Polewali', '0000-00-00', '2021-09-28 07:01:38', '2021-10-14 09:32:20'),
('gNjkeUrO', 'MEdIUxqs', '11', 'SMKN 2 Polewali', '0000-00-00', '2021-09-28 07:01:33', '2021-10-14 09:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_lokasi_awal` varchar(20) NOT NULL,
  `nama_lokasi_awal` text DEFAULT NULL,
  `id_lokasi_tujuan` varchar(200) NOT NULL,
  `alasan` text NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `id_user`, `id_lokasi_awal`, `nama_lokasi_awal`, `id_lokasi_tujuan`, `alasan`, `status`, `is_read`, `date_created`, `date_updated`) VALUES
('AGxJ1rgT', '1629041001', '7veF8JYf', 'SMKN 1 Polewali', 'gNjkeUrO', '<p>etrtyey</p>', 'Diterima', 0, '2021-10-07 09:44:29', '2021-10-07 09:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `id_dpl` varchar(20) DEFAULT NULL,
  `id_mhs` varchar(20) DEFAULT NULL,
  `dinilai` enum('Mahasiswa','DPL','Lokasi') NOT NULL,
  `nilai` int(6) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_penilaian`, `id_user`, `id_lokasi`, `id_angkatan`, `id_dpl`, `id_mhs`, `dinilai`, `nilai`, `deskripsi`, `date_created`, `date_updated`) VALUES
('F5IPKkUJ', '1629041001', '7veF8JYf', 'MEdIUxqs', NULL, NULL, 'Lokasi', 89, 'dsfdsf', '2021-10-14 08:01:19', '2021-10-14 08:06:12'),
('ss', '10', '7veF8JYf', 'MEdIUxqs', '1', NULL, 'Lokasi', 22, '', '2021-10-04 08:18:41', '2021-10-04 08:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` varchar(20) NOT NULL,
  `nama_prodi` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `date_created`, `date_updated`) VALUES
('WOJinMfV', 'Pendidikan Teknik Elektro', '2021-10-04 08:54:15', '2021-10-04 08:54:15'),
('Y9EeqZPi', 'Pendidikan Teknik Informatika dan Komputer', '2021-10-04 08:54:12', '2021-10-04 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proker`
--

CREATE TABLE `tbl_proker` (
  `id_proker` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `id_dpl` varchar(20) DEFAULT NULL,
  `id_angkatan` varchar(20) NOT NULL,
  `nama_proker` text NOT NULL,
  `tujuan` text NOT NULL,
  `sasaran` text NOT NULL,
  `biaya` float NOT NULL,
  `sumber_biaya` varchar(200) NOT NULL,
  `pj` varchar(200) NOT NULL,
  `standar_keberhasilan` text NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `kerja_sama` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proker`
--

INSERT INTO `tbl_proker` (`id_proker`, `id_user`, `id_lokasi`, `id_dpl`, `id_angkatan`, `nama_proker`, `tujuan`, `sasaran`, `biaya`, `sumber_biaya`, `pj`, `standar_keberhasilan`, `waktu_pelaksanaan`, `kerja_sama`, `date_created`, `date_updated`) VALUES
('3dasfd', '', '', '', '', 'Kerja Bakti A', '<p>Kembali ke konohaa</p>', '<p>Kembali ke konohaa</p>', 200001, 'Desaa', 'Petugas Posyandu', '<p>Kembali ke konohaa</p>', '0000-00-00', 'Desas', '2021-09-28 15:31:12', '2021-09-30 12:39:23'),
('SPtNH4Bc', NULL, '7veF8JYf', NULL, '', 'Kerja Bakti', '<p>fdfs</p>', '<p>fdsf</p>', 2000000, 'Desaa', 'Petugas Posyandu', '<p>fsdfdsf</p>', '0000-00-00', 'Desas', '2021-10-07 13:55:25', '2021-10-07 13:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saran`
--

CREATE TABLE `tbl_saran` (
  `id_saran` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `id_dpl` int(20) NOT NULL,
  `isi_saran` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saran`
--

INSERT INTO `tbl_saran` (`id_saran`, `id_user`, `id_angkatan`, `id_lokasi`, `id_dpl`, `isi_saran`, `is_read`, `date_created`) VALUES
('dIfOp5rX', NULL, NULL, NULL, 0, '<p>sadsd</p>', 1, '2020-10-08 08:25:14'),
('ExnHYFT0', NULL, NULL, NULL, 0, 'sasdsad', 0, '2020-10-08 08:24:39'),
('kCWYq6av', NULL, NULL, NULL, 0, 'sasdad', 0, '2020-10-08 08:23:13'),
('v2yiMXa7', '9', 'MEdIUxqs', '7veF8JYf', 1, '<p>oke kah?</p>', 0, '2021-10-02 13:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `id_dpl` varchar(20) DEFAULT NULL,
  `id_angkatan` varchar(20) DEFAULT NULL,
  `id_prodi` varchar(20) DEFAULT NULL,
  `namalengkap` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Mahasiswa','DPL','LP2M','Profesi') NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_lokasi`, `id_dpl`, `id_angkatan`, `id_prodi`, `namalengkap`, `email`, `image`, `password`, `role`, `is_active`, `date_created`) VALUES
(1, NULL, NULL, NULL, '', 'Aswar Kasim', 'aswarkasim@gmail.com', 'default.jpg', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'DPL', 1, 1560694881),
(9, '7veF8JYf', '1', 'MEdIUxqs', '', 'Admin', 'admin@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 0, 0),
(10, 'gNjkeUrO', '11', 'MEdIUxqs', '', 'Mahasiswa', 'mahasiswa@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Mahasiswa', 1, 0),
(11, NULL, NULL, NULL, '', 'dpl', 'dpl@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'DPL', 1, 0),
(12, NULL, NULL, NULL, '', 'LP2M', 'lp2m@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'LP2M', 1, 0),
(13, NULL, NULL, NULL, '', 'Profesi', 'profesi@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Profesi', 1, 0),
(1629041001, 'gNjkeUrO', '11', 'MEdIUxqs', 'Y9EeqZPi', 'Aswar Kasim', '', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Mahasiswa', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_administrasi`
--
ALTER TABLE `tbl_administrasi`
  ADD PRIMARY KEY (`id_administrasi`);

--
-- Indexes for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_dokumentasi`
--
ALTER TABLE `tbl_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `tbl_kkn`
--
ALTER TABLE `tbl_kkn`
  ADD PRIMARY KEY (`id_kkn`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_proker`
--
ALTER TABLE `tbl_proker`
  ADD PRIMARY KEY (`id_proker`);

--
-- Indexes for table `tbl_saran`
--
ALTER TABLE `tbl_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1629041002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
