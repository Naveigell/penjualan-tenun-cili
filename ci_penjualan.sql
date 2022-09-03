-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 05:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_penjualan`
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
('BR002GYR', 'BR002', 125000, 22, 'GYR'),
('BR004BDG', 'BR004', 200000, 11, 'BDG'),
('', '', 150000, 22, ''),
('BR003GYR', 'BR003', 200000, 10, 'GYR'),
('BR002DPS', 'BR002', 200000, 20, 'DPS'),
('BR004GYR', 'BR004', 210000, 10, 'GYR'),
('BR004DPS', 'BR004', 150000, 30, 'DPS'),
('BR003DPS', 'BR003', 100000, 10, 'DPS'),
('BR001DPS', 'BR001', 100000, 100, 'DPS'),
('BR005GYR', 'BR005', 200000, 20, 'GYR');

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
('BR002', 'Selendang Endek', 'Selendang'),
('BR003', 'Kain Hitam', 'kain'),
('BR004', 'Selendang Putih', 'selendang'),
('BR001', 'Selendang Merah 100cm', 'kain'),
('BR005', 'Selendang Merah', 'selendang');

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
('CSR003', 'Mamat Sudi', 'Jl. Angsri', '08512381312', 'GYR'),
('CSR002', 'Didit Sudirta', 'Jl. Supratman', '08182311213', 'GYR'),
('CSR001', 'Adina Sari', 'Jl. Nangka Selatan', '0871231677123', 'GYR'),
('CSR004', 'Lita Sari', 'Jl. Anugerah', '0871231231', 'GYR');

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
('USR003', 'Sapril Husain', '0891231312', 'sapril', 'saprilhusain01@gmail.com', 'sapril', 'karyawan', 'GYR', 0);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalbayar`  AS  select `historibayar`.`no_faktur` AS `no_faktur`,sum(`historibayar`.`bayar`) AS `totalbayar` from `historibayar` group by `historibayar`.`no_faktur` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totalpenjualan`
--
DROP TABLE IF EXISTS `view_totalpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalpenjualan`  AS  select `penjualan_detail`.`no_faktur` AS `no_faktur`,sum(`penjualan_detail`.`harga` * `penjualan_detail`.`qty`) AS `totalpenjualan` from `penjualan_detail` group by `penjualan_detail`.`no_faktur` ;

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
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
