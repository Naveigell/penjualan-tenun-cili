-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2022 at 06:19 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1602346_ci_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_harga`
--

CREATE TABLE `barang_harga` (
  `kode_harga` varchar(10) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(6) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_harga`
--

INSERT INTO `barang_harga` (`kode_harga`, `kode_barang`, `harga`, `stok`, `kode_cabang`) VALUES
('BR001GYR', 'BR001', 300000, 45, 'GYR'),
('BR004BDG', 'BR004', 200000, 11, 'BDG'),
('', '', 150000, 22, ''),
('BR002GYR', 'BR002', 300000, 36, 'GYR'),
('BR002DPS', 'BR002', 200000, 20, 'DPS'),
('BR003GYR', 'BR003', 235000, 54, 'GYR'),
('BR004DPS', 'BR004', 150000, 30, 'DPS'),
('BR003DPS', 'BR003', 100000, 10, 'DPS'),
('BR001DPS', 'BR001', 100000, 100, 'DPS'),
('BR004GYR', 'BR004', 300000, 33, 'GYR'),
('BR005GYR', 'BR005', 120000, 45, 'GYR'),
('BR006GYR', 'BR006', 350000, 63, 'GYR'),
('BR007GYR', 'BR007', 300000, 43, 'GYR'),
('BR008GYR', 'BR008', 120000, 33, 'GYR'),
('BR009GYR', 'BR009', 120000, 29, 'GYR'),
('BR010GYR', 'BR010', 120000, 55, 'GYR'),
('BR011GYR', 'BR011', 235000, 25, 'GYR'),
('BR012GYR', 'BR012', 300000, 66, 'GYR'),
('BR013GYR', 'BR013', 300000, 41, 'GYR'),
('BR014GYR', 'BR014', 300000, 33, 'GYR'),
('BR015GYR', 'BR015', 235000, 54, 'GYR'),
('BR016GYR', 'BR016', 235000, 31, 'GYR'),
('BR017GYR', 'BR017', 235000, 22, 'GYR'),
('BR018GYR', 'BR018', 235000, 33, 'GYR'),
('BR019GYR', 'BR019', 300000, 22, 'GYR'),
('BR020GYR', 'BR020', 300000, 55, 'GYR'),
('BR021GYR', 'BR021', 300000, 35, 'GYR'),
('BR022GYR', 'BR022', 300000, 41, 'GYR'),
('BR023GYR', 'BR023', 300000, 28, 'GYR'),
('BR024GYR', 'BR024', 300000, 36, 'GYR'),
('BR025GYR', 'BR025', 300000, 42, 'GYR'),
('BR026GYR', 'BR026', 235000, 23, 'GYR'),
('BR027GYR', 'BR027', 235000, 21, 'GYR'),
('BR028GYR', 'BR028', 235000, 20, 'GYR'),
('BR029GYR', 'BR029', 235000, 32, 'GYR'),
('BR030GYR', 'BR030', 235000, 31, 'GYR'),
('BR031GYR', 'BR031', 235000, 23, 'GYR'),
('BR032GYR', 'BR032', 235000, 16, 'GYR'),
('BR033GYR', 'BR033', 235000, 24, 'GYR'),
('BR034GYR', 'BR034', 235000, 21, 'GYR'),
('BR035GYR', 'BR035', 235000, 19, 'GYR'),
('BR036GYR', 'BR036', 235000, 17, 'GYR'),
('BR037GYR', 'BR037', 235000, 27, 'GYR'),
('BR038GYR', 'BR038', 235000, 22, 'GYR'),
('BR039GYR', 'BR039', 235000, 17, 'GYR'),
('BR040GYR', 'BR040', 235000, 16, 'GYR'),
('BR041GYR', 'BR041', 235000, 22, 'GYR'),
('BR042GYR', 'BR042', 235000, 21, 'GYR'),
('BR043GYR', 'BR043', 300000, 23, 'GYR'),
('BR044GYR', 'BR044', 235000, 21, 'GYR'),
('BR045GYR', 'BR045', 235000, 21, 'GYR'),
('BR046GYR', 'BR046', 235000, 16, 'GYR'),
('BR047GYR', 'BR047', 235000, 26, 'GYR'),
('BR048GYR', 'BR048', 235000, 31, 'GYR'),
('BR049GYR', 'BR049', 235000, 34, 'GYR'),
('BR050GYR', 'BR050', 235000, 21, 'GYR'),
('BR051GYR', 'BR051', 235000, 24, 'GYR'),
('BR052GYR', 'BR052', 235000, 21, 'GYR'),
('BR053GYR', 'BR053', 235000, 25, 'GYR'),
('BR054GYR', 'BR054', 235000, 18, 'GYR'),
('BR055GYR', 'BR055', 235000, 27, 'GYR'),
('BR056GYR', 'BR056', 235000, 26, 'GYR'),
('BR057GYR', 'BR057', 235000, 21, 'GYR'),
('BR058GYR', 'BR058', 235000, 23, 'GYR'),
('BR059GYR', 'BR059', 235000, 25, 'GYR'),
('BR060GYR', 'BR060', 235000, 21, 'GYR');

-- --------------------------------------------------------

--
-- Table structure for table `barang_master`
--

CREATE TABLE `barang_master` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_master`
--

INSERT INTO `barang_master` (`kode_barang`, `nama_barang`, `satuan`) VALUES
('BR003', 'Kain Endek Sari Geles I ', 'Kain Meteran'),
('BR002', 'Kain Endek Bebali Horizontal I', 'Kain Meteran'),
('BR001', 'Kain Endek Bebali Horizontal II', 'Kain Meteran'),
('BR004', 'Kain Endek Putih I', 'Kain Meteran'),
('BR005', 'Kain Endek Coklat Susu', 'Kain Meteran'),
('BR006', 'Kain Endek Premium', 'Kain Meteran'),
('BR007', 'Kain Endek I', 'Kain Meteran'),
('BR008', 'Kain Endek Polos Red Purple', 'Kain Meteran'),
('BR009', 'Kain Endek Polos Green Lavender', 'Kain Meteran'),
('BR010', 'Kain Endek Polos Lavender', 'Kain Meteran'),
('BR011', 'Kain Endek III', 'Kain Meteran'),
('BR012', 'Kain Endek Underline Blue Grotto Gradasi', 'Kain Meteran'),
('BR013', 'Kain Endek Underline Blue', 'Kain Meteran'),
('BR014', 'Kain Endek II', 'Kain Meteran'),
('BR015', 'Kain Endek IV', 'Kain Meteran'),
('BR016', 'Kain Endek V', 'Kain Meteran'),
('BR017', 'Kain Endek VI', 'Kain Meteran'),
('BR018', 'Kain Endek VII', 'Kain Meteran'),
('BR019', 'Kain Endek Bebali Horizontal III', 'Kain Meteran'),
('BR020', 'Kain Endek Bebali Horizontal IV', 'Kain Meteran'),
('BR021', 'Kain Endek Bebali Horizontal V', 'Kain Meteran'),
('BR022', 'Kain Endek Bebali Horizontal VI', 'Kain Meteran'),
('BR023', 'Kain Endek Bebali VII', 'Kain Meteran'),
('BR024', 'Kain Endek Bebali Horizontal VIII', 'Kain Meteran'),
('BR025', 'Kain Endek Stripe Horizontal', 'Kain Meteran'),
('BR026', 'Kain Endek Bun Bun an - Blue Lavender', 'Kain Meteran'),
('BR027', 'Kain Endek Bun Bun an - Orange Blueberry', 'Kain Meteran'),
('BR028', 'Kain Endek Bun Bun an - Yellow Lime', 'Kain Meteran'),
('BR029', 'Kain Endek Bun Bun an - Blood Orange', 'Kain Meteran'),
('BR030', 'Kain Endek Bun Bun an - Tangerine', 'Kain Meteran'),
('BR031', 'Kain Endek Bun Bun an - Orange', 'Kain Meteran'),
('BR032', 'Kain Endek Bun Bun an - Peach Orange', 'Kain Meteran'),
('BR033', 'Kain Endek Hot Pink', 'Kain Meteran'),
('BR034', 'Kain Endek Purple I', 'Kain Meteran'),
('BR035', 'Kain Endek Yellow', 'Kain Meteran'),
('BR036', 'Kain Endek Purple II', 'Kain Meteran'),
('BR037', 'Kain Endek Blue I', 'Kain Meteran'),
('BR038', 'Kain Endek Purple III', 'Kain Meteran'),
('BR039', 'Kain Endek Blue Black', 'Kain Meteran'),
('BR040', 'Kain Endek Blue VI', 'Kain Meteran'),
('BR041', 'Kain Endek Pelangi', 'Kain Meteran'),
('BR042', 'Kain Endek Blue II', 'Kain Meteran'),
('BR043', 'Kain endek Gradasi I', 'Kain Meteran'),
('BR044', 'Kain Endek Gradasi II', 'Kain Meteran'),
('BR045', 'Kain Endek Gradasi III', 'Kain Meteran'),
('BR046', 'Kain Endek Biru', 'Kain Meteran'),
('BR047', 'Kain Endek Plum', 'Kain Meteran'),
('BR048', 'Kain Endek Rossy Pink', 'Kain Meteran'),
('BR049', 'Kain Endek Biru Tua', 'Kain Meteran'),
('BR050', 'Kain Endek Biru Orange', 'Kain Meteran'),
('BR051', 'Kain Endek Biru Ungu', 'Kain Meteran'),
('BR052', 'Kain Endek White', 'Kain Meteran'),
('BR053', 'Kain Endek Dark Grey I', 'Kain Meteran'),
('BR054', 'Kain Endek Blood Orange I', 'Kain Meteran'),
('BR055', 'Kain Endek Blood Orange II', 'Kain Meteran'),
('BR056', 'Kain Endek Bola Bola Sari Coklat Tua', 'Kain Meteran'),
('BR057', 'Kain Endek Bola Bola Sari Red Basil', 'Kain Meteran'),
('BR058', 'Kain Endek Bola Bola Sari Blue Lavender', 'Kain Meteran'),
('BR059', 'Kain Endek Bola Bola Sari Rossy Pink', 'Kain Meteran'),
('BR060', 'Kain Endek Bola Bola Sari Green', 'Kain Meteran');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `namabulan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `namabulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode_cabang` char(3) NOT NULL,
  `nama_cabang` varchar(50) DEFAULT NULL,
  `alamat_cabang` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode_cabang`, `nama_cabang`, `alamat_cabang`, `telepon`) VALUES
('GYR', 'Gianyar', 'Jl. Ciung Wanara', '021 2385 2631');

-- --------------------------------------------------------

--
-- Table structure for table `historibayar`
--

CREATE TABLE `historibayar` (
  `nobukti` varchar(255) NOT NULL,
  `no_faktur` varchar(13) NOT NULL,
  `tglbayar` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(13) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_cabang` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `kode_cabang`) VALUES
('CSR003GYR', 'Gede Arimbawa', 'Jl Merdeka', '6287918123854', 'GYR'),
('CSR001GYR', 'Pak Eka', 'Jl Pudak', '6281981838424', 'GYR'),
('CSR002GYR', 'Subrabta', 'Jl Kedondong', '6285872763567', 'GYR'),
('CSR004GYR', 'Yeni', 'Jl Imam Bonjol', '6289213732876', 'GYR'),
('CSR005GYR', 'Sartono', 'Jl W.R Supratman', '6282986999165', 'GYR'),
('CSR006GYR', 'Bu Komang', 'Jl Ngurah Rai', '6287812735123', 'GYR'),
('CSR007GYR', 'Dewik', 'Jl Kedonganan', '6289761314112', 'GYR'),
('CSR008GYR', 'Pande Surya', 'Jl Astina Selatan', '6281233455776', 'GYR'),
('CSR009GYR', 'Onet', 'Tegaltamu', '6281661881345', 'GYR'),
('CSR010GYR', 'Bu Ganda', 'Jl Ciung Wanara', '6287613721812', 'GYR'),
('CSR011GYR', 'Bu Ratna', 'Jl Airlangga', '6287981823471', 'GYR'),
('CSR012GYR', 'Bu Yuniarti', 'Jl Yudistira', '6281982556127', 'GYR'),
('CSR013GYR', 'Semeton Pande Beng', 'Beng, Gianyar', '6281712317713', 'GYR'),
('CSR014GYR', 'Wayan Sudarsana', 'Jl Angsri', '6289081882371', 'GYR'),
('CSR015GYR', 'Pak Rudy', 'Jl Astina Selatan', '6287131388118', 'GYR'),
('CSR016GYR', 'Bu Gita', 'Jl Candi Baru', '6287123771891', 'GYR'),
('CSR017GYR', 'Herman', 'Jl Gunung Agung', '628571871377131', 'GYR'),
('CSR018GYR', 'Pak Koleh', 'Jl Gunung Batur', '62871313132217', 'GYR'),
('CSR019GYR', 'Bu Tiles', 'Jl Batukaru', '62871313741912', 'GYR'),
('CSR020GYR', 'Pak Putu', 'Jl Sudirman', '6289878137131', 'GYR'),
('CSR021GYR', 'Bu Yuni', 'Jl Ratna', '6282138711872', 'GYR'),
('CSR022GYR', 'Miss Vanessa', 'Jl Basuki', '62881731731317', 'GYR'),
('CSR023GYR', 'Made Dawan', 'Jl Dawan', '6287191283811', 'GYR'),
('CSR024GYR', 'Made Winarta', 'Jl Astina Selatan', '628713823138', 'GYR');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(13) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kode_pelanggan` varchar(13) NOT NULL,
  `jenistransaksi` varchar(6) NOT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `id_user` char(6) NOT NULL,
  `is_approved` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `no_faktur` varchar(13) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail_temp`
--

CREATE TABLE `penjualan_detail_temp` (
  `kode_barang` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_user_pivot`
--

CREATE TABLE `penjualan_user_pivot` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `has_seen` int(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_user_pivot`
--

INSERT INTO `penjualan_user_pivot` (`id`, `user_id`, `no_faktur`, `has_seen`) VALUES
(1, 'USR004', 'GYR09220001', 1),
(2, 'USR004', 'GYR09220002', 1),
(3, 'USR005', 'GYR09220002', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` char(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `kode_cabang` char(3) NOT NULL,
  `is_active` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `no_hp`, `username`, `email`, `password`, `level`, `kode_cabang`, `is_active`) VALUES
('USR001', 'Pande Made Yodamartha', '087123123123', 'yodamartha', 'yodamartha11@gmail.com', 'yodamartha', 'owner', 'GYR', 1),
('USR002', 'I Nyoman Bayu Wiryawan', '089123123123', 'bayu', 'nbwrya@gmail.com', 'bayu', 'administrator', 'GYR', 1),
('USR004', 'Wayan Jatera', '0817721731341', 'jatera', 'wayanjatera02@gmail.com', 'jatera', 'karyawan', 'GYR', 1),
('USR003', 'Putu Ningsih', '089123131344', 'ningsih', 'putuningsih01@gmail.com', 'ningsih', 'karyawan', 'GYR', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalbayar`
-- (See below for the actual view)
--
CREATE TABLE `view_totalbayar` (
`no_faktur` varchar(13)
,`totalbayar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalpenjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_totalpenjualan` (
`no_faktur` varchar(13)
,`totalpenjualan` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_totalbayar`
--
DROP TABLE IF EXISTS `view_totalbayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalbayar`  AS SELECT `historibayar`.`no_faktur` AS `no_faktur`, sum(`historibayar`.`bayar`) AS `totalbayar` FROM `historibayar` GROUP BY `historibayar`.`no_faktur` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totalpenjualan`
--
DROP TABLE IF EXISTS `view_totalpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalpenjualan`  AS SELECT `penjualan_detail`.`no_faktur` AS `no_faktur`, sum(`penjualan_detail`.`harga` * `penjualan_detail`.`qty`) AS `totalpenjualan` FROM `penjualan_detail` GROUP BY `penjualan_detail`.`no_faktur` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_harga`
--
ALTER TABLE `barang_harga`
  ADD PRIMARY KEY (`kode_harga`);

--
-- Indexes for table `barang_master`
--
ALTER TABLE `barang_master`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode_cabang`),
  ADD KEY `kode_cab_idx` (`kode_cabang`);

--
-- Indexes for table `historibayar`
--
ALTER TABLE `historibayar`
  ADD PRIMARY KEY (`nobukti`),
  ADD KEY `hb_nofaktur` (`no_faktur`),
  ADD KEY `hb_tglbayar_jenis` (`tglbayar`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`) USING BTREE,
  ADD KEY `pel_nama` (`nama_pelanggan`),
  ADD KEY `pel_kodecab` (`kode_cabang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `tgltransaksi` (`tgltransaksi`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD KEY `detailpenj_nofaktur` (`no_faktur`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `penjualan_detail_temp`
--
ALTER TABLE `penjualan_detail_temp`
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `penjualan_user_pivot`
--
ALTER TABLE `penjualan_user_pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_user_pivot_user_id` (`user_id`),
  ADD KEY `penjualan_user_pivot_penjualan_id` (`no_faktur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan_user_pivot`
--
ALTER TABLE `penjualan_user_pivot`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
