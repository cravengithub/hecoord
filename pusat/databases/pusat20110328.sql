-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2011 at 11:51 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pusat`
--
CREATE DATABASE `pusat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pusat`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(100) default NULL,
  `harga` double default NULL,
  PRIMARY KEY  (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga`) VALUES
('A01', 'Laptop A', 500),
('A02', 'Laptop B', 450),
('A03', 'Laptop C', 550),
('A04', 'Laptop D', 650),
('A05', 'Laptop E', 600);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2e4e7e77377059a64a049676be0eb244', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246268, ''),
('f9cf51dfeaf22256c7b66bd761194280', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246269, ''),
('e10b6eba49cabb0035cf349c9edf531d', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246113, ''),
('de632f8ee59c32f8443b1cfd132564d7', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246113, ''),
('b0457d1da5115e5719585586764c5420', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246113, ''),
('5c9f5119342531ad0f1fa444a1301d31', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246112, ''),
('bf3d09cee326e7d78c16eadbfc70fe83', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246112, ''),
('70d0026aac6b8810cb13ce7c0a6824c4', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246111, ''),
('807dcb17253f8199c0fbeefc9449c3ca', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246033, ''),
('4e396f436875fbb8ecebabb8a02a5331', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246054, ''),
('77fa5af774e9ce2eed051a0cde8ae1b3', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246055, ''),
('be3ba729a76385e38e37be36082cd831', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246032, ''),
('1ba912f4a3023236f9bafcb41a252dd8', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245391, ''),
('2c88538d4005274d269aa2c1dee4b8fe', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245987, ''),
('94d6e5ce11f27d14e9c2921a5517ce88', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245987, ''),
('2c364d34df0aab4e195ecb33bb381fd1', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245391, ''),
('247429cd21da8981d2cb3d193612c81e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245390, ''),
('09d406d4e74f03eb824a2d4be2ba16e9', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301243091, ''),
('5a00a1a051f50c726eff695d0bbfa06d', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301245104, ''),
('c9353dd959e5b91aacdc4c989ed57278', '0.0.0.0', 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2.6', 1301249054, ''),
('8a08ad8dcc704b58c9e4bcc4c4327d67', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301249060, ''),
('063e379751cb8c43227488c23443c2d0', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246269, ''),
('d8eba8e9089a76970946f2ccfd29f38e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246270, ''),
('36fbe8d1a113eaa7f5858d6c4477e3f3', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246270, ''),
('0713a603c5d13f6819b2673b1ebd67e7', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246390, ''),
('0369f9edc84b8d9d32eaefee8c61be2a', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246403, ''),
('142c1310397d8ee19e5a31cb17d62dae', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246404, ''),
('82962b60ea3fc1737740d6f2a74c4cbb', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246404, ''),
('e716a8151b7f21d77c494911d71ba5b4', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246404, ''),
('bb17de19a596666e4c6fbeee514f953a', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246419, ''),
('37eed0498f8e5b6110fd9e0c3a80d1f8', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246565, ''),
('2f842437069f78164de61057c8eac32d', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246565, ''),
('819b69bcab17082299a9aa67f8a155bb', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246566, ''),
('f240cf5743f95d2db2bf3a1235cc940e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246566, ''),
('e1312ef252853663c3f1ed17182d9c44', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246567, ''),
('d6d9d55c977fad0628c0b4bc30f5112b', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246567, ''),
('599672cfb07dd4191c7e47f13ccb619e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246630, ''),
('37b22e52467ec005df85cc9ba749e5ce', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246630, ''),
('5be86801ce64f846ccc5c00875d24381', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246631, ''),
('9267ca5ac57d5a09197c9341e09d2d2c', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246631, ''),
('d9cb562db72ee8d0a1a3caa05ee5f654', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('f50dfe9e043ddbe7aab3df1de5fb7d07', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('849fce3ba61546fecfeaa669295faf3f', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('cda93bff2e6fe5561bab978c241f7028', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('14b38a297d18e05122d5b5a612e103ba', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('e5a85ac4875c12ddaa447fae7f64008e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301246652, ''),
('883c7e961e6307404dd57ffaa4e5c391', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247211, ''),
('81d84615ac10b18fc01793d552fbe69a', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247252, ''),
('f9833defec01c425d0e2743c0c2f89dd', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247252, ''),
('29b610d1e5a0b6464af9a8c41fd117eb', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247418, ''),
('3876713d47ca501720db7be938c00943', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247959, ''),
('2f17ec0719b3ac2bad1e8c9dccc5dace', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247960, ''),
('82d11cc9c4248e209681903378cb94bd', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301247961, ''),
('2ffad32b07c53a18ec447ccef04a6b5e', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301249061, ''),
('378d763a4bf53ff8024bba2236765f24', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301249062, ''),
('e4de5f4ef90981a58767908a5fbfb057', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301249062, ''),
('ca8c1042d08f0169b486162e059013e7', '0.0.0.0', 'NuSOAP/0.9.5 (1.123)', 1301249194, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kirim_barang`
--

CREATE TABLE IF NOT EXISTS `detail_kirim_barang` (
  `id_detail_kirim` int(11) NOT NULL auto_increment,
  `kode_kirim` varchar(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail_kirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `detail_kirim_barang`
--

INSERT INTO `detail_kirim_barang` (`id_detail_kirim`, `kode_kirim`, `kode_barang`, `jumlah_barang`) VALUES
(1, 'KK01', 'A01', 10),
(4, 'KK01', 'A02', 12),
(5, 'KK01', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL auto_increment,
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `kode_barang`, `jumlah`) VALUES
(1, 1, 'A01', 2),
(2, 1, 'A02', 1),
(3, 2, 'A01', 1),
(4, 2, 'A02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jatah_barang_cabang`
--

CREATE TABLE IF NOT EXISTS `jatah_barang_cabang` (
  `id_jatah` int(11) NOT NULL auto_increment,
  `id_kantor` int(11) default NULL,
  `kode_barang` varchar(8) default NULL,
  `limit_atas` int(11) default NULL,
  `limit_bawah` int(11) default NULL,
  PRIMARY KEY  (`id_jatah`),
  KEY `FK_REFERENCE_5` (`id_kantor`),
  KEY `FK_REFERENCE_6` (`kode_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jatah_barang_cabang`
--

INSERT INTO `jatah_barang_cabang` (`id_jatah`, `id_kantor`, `kode_barang`, `limit_atas`, `limit_bawah`) VALUES
(1, 4, 'A02', 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kantor`
--

CREATE TABLE IF NOT EXISTS `kantor` (
  `id_kantor` int(11) NOT NULL auto_increment,
  `nama_kantor` varchar(100) default NULL,
  `keterangan` text,
  PRIMARY KEY  (`id_kantor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `nama_kantor`, `keterangan`) VALUES
(3, 'Toko A', 'percobaan'),
(4, 'Toko B', 'Mulai Buka');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kode_karyawan` varchar(8) NOT NULL,
  `id_kantor` int(11) default NULL,
  `nama` varchar(100) default NULL,
  `alamat` text,
  `tempat_lahir` varchar(100) default NULL,
  `tanggal_lahir` date default NULL,
  `jenis_kelamin` tinyint(1) default NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha') default NULL,
  `username` varchar(20) default NULL,
  `password` varchar(20) default NULL,
  PRIMARY KEY  (`kode_karyawan`),
  KEY `FK_REFERENCE_1` (`id_kantor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `id_kantor`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `username`, `password`) VALUES
('AK01', 3, 'Pardi', 'Yogyakarta', 'Yogyakarta', '1986-08-25', 0, 'Islam', 'pardi', '4f5655f738af2f8adf72'),
('AK02', 4, 'Badu', 'Yogyakarta', 'Solo', '1986-03-01', 0, 'Islam', 'badu', '40a3de3b98856879b199');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_barang`
--

CREATE TABLE IF NOT EXISTS `kirim_barang` (
  `kode_kirim` varchar(8) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `tanggal_kirim` date default NULL,
  `tanggal_terima` date NOT NULL,
  PRIMARY KEY  (`kode_kirim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim_barang`
--

INSERT INTO `kirim_barang` (`kode_kirim`, `id_kantor`, `tanggal_kirim`, `tanggal_terima`) VALUES
('KK01', 3, '2011-03-25', '2011-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE IF NOT EXISTS `rekap` (
  `id_rekap` int(11) NOT NULL auto_increment,
  `id_kantor` int(11) NOT NULL,
  `kode_karyawan` varchar(8) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  PRIMARY KEY  (`id_rekap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `id_kantor`, `kode_karyawan`, `id_transaksi`, `tanggal_transaksi`) VALUES
(1, 3, 'AK01', 1, '2011-03-23'),
(2, 4, 'Ak02', 2, '2011-03-24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jatah_barang_cabang`
--
ALTER TABLE `jatah_barang_cabang`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_KANTOR`) REFERENCES `kantor` (`ID_KANTOR`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`KODE_BARANG`) REFERENCES `barang` (`KODE_BARANG`) ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_KANTOR`) REFERENCES `kantor` (`ID_KANTOR`);
