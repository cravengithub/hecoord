-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2011 at 07:12 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga`) VALUES
('A01', 'Laptop A', 500),
('A02', 'Laptop B', 450),
('A03', 'Laptop C', 550),
('A04', 'Laptop D', 650),
('A05', 'Laptop E', 600),
('b1', 'Acer 4730', 5300000),
('b2', 'toshiba 7832', 7500000),
('b3', 'Lenovo Pink v3', 12000000);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('d2888078ed1941cd0f39e8c196690e7d', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1301384982, 'a:1:{s:21:"flash:old:synchronize";s:28:"Data berhasil disinkronisasi";}'),
('8b8531b4b0085759f08ca5327993c232', '127.0.0.1', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv', 1301391832, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kirim_barang`
--

CREATE TABLE IF NOT EXISTS `detail_kirim_barang` (
  `id_detail_kirim` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kirim` varchar(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_kirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `detail_kirim_barang`
--

INSERT INTO `detail_kirim_barang` (`id_detail_kirim`, `kode_kirim`, `kode_barang`, `jumlah_barang`) VALUES
(1, 'KK01', 'A01', 10),
(4, 'KK01', 'A02', 12);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kantor` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_kantor`, `id_transaksi`, `kode_barang`, `jumlah`) VALUES
(1, 3, 1, 'A01', 2),
(2, 3, 1, 'A02', 1),
(3, 3, 2, 'A01', 1),
(4, 3, 2, 'A02', 2),
(5, 3, 3, 'b2', 3),
(6, 3, 4, 'b2', 3),
(7, 3, 5, 'b2', 3),
(8, 3, 6, 'b1', 1),
(9, 4, 1, 'Acer 473', 1),
(10, 4, 2, 'b1', 2),
(11, 4, 3, 'b2', 3),
(12, 4, 4, 'b2', 3),
(13, 4, 5, 'b2', 3),
(14, 4, 6, 'b1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jatah_barang_cabang`
--

CREATE TABLE IF NOT EXISTS `jatah_barang_cabang` (
  `id_jatah` int(11) NOT NULL AUTO_INCREMENT,
  `id_kantor` int(11) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `limit_atas` int(11) DEFAULT NULL,
  `limit_bawah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jatah`),
  KEY `FK_REFERENCE_5` (`id_kantor`),
  KEY `FK_REFERENCE_6` (`kode_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jatah_barang_cabang`
--

INSERT INTO `jatah_barang_cabang` (`id_jatah`, `id_kantor`, `kode_barang`, `limit_atas`, `limit_bawah`) VALUES
(1, 3, 'A02', 100, 5),
(2, 3, 'A01', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kantor`
--

CREATE TABLE IF NOT EXISTS `kantor` (
  `id_kantor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kantor` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `alamat_wsdl` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kantor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `nama_kantor`, `keterangan`, `alamat_wsdl`) VALUES
(3, 'Toko A', 'percobaan', 'http://localhost/content/cabang/web_services/index.php?wsdl'),
(4, 'Toko B', 'Mulai Buka', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kode_karyawan` varchar(8) NOT NULL,
  `id_kantor` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` tinyint(1) DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha') DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_karyawan`),
  KEY `FK_REFERENCE_1` (`id_kantor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `id_kantor`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `username`, `password`) VALUES
('a1', NULL, 'Kakanda', 'Jalan Magelang', 'Riau', '1982-03-25', 0, 'Islam', 'admin', 'admin'),
('a2', NULL, 'Udin', NULL, 'Riau', '1980-03-24', 1, 'Katholik', 'echo', 'echo'),
('AK01', 3, 'Pardi', 'Yogyakarta', 'Yogyakarta', '1986-08-25', 1, 'Islam', 'pardi', '4f5655f738af2f8adf72'),
('AK02', 4, 'Badu', 'Yogyakarta', 'Solo', '1986-03-01', 1, 'Islam', 'badu', '40a3de3b98856879b199');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_barang`
--

CREATE TABLE IF NOT EXISTS `kirim_barang` (
  `kode_kirim` varchar(8) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `tanggal_terima` date NOT NULL,
  PRIMARY KEY (`kode_kirim`)
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
  `id_rekap` int(11) NOT NULL AUTO_INCREMENT,
  `id_kantor` int(11) NOT NULL,
  `kode_karyawan` varchar(8) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `id_kantor`, `kode_karyawan`, `id_transaksi`, `tanggal_transaksi`) VALUES
(1, 3, 'AK01', 1, '2011-03-23'),
(2, 3, 'Ak01', 2, '2011-03-24'),
(9, 3, 'a1', 3, '2011-03-27'),
(10, 3, 'a1', 4, '2011-03-27'),
(11, 3, 'a1', 5, '2011-03-27'),
(12, 3, 'a1', 6, '2011-03-27'),
(13, 4, 'a1', 1, '2011-03-27'),
(14, 4, 'a1', 2, '2011-03-27'),
(15, 4, 'a1', 3, '2011-03-27'),
(16, 4, 'a1', 4, '2011-03-27'),
(17, 4, 'a1', 5, '2011-03-27'),
(18, 4, 'a1', 6, '2011-03-27');
