-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2011 at 12:57 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cabang`
--
CREATE DATABASE `cabang` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cabang`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `KODE_BARANG` varchar(8) NOT NULL,
  `NAMA` varchar(100) default NULL,
  `HARGA` double default NULL,
  `JUMLAH_BARANG` int(11) default NULL,
  `LIMIT_BAWAH` int(11) default NULL,
  PRIMARY KEY  (`KODE_BARANG`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`KODE_BARANG`, `NAMA`, `HARGA`, `JUMLAH_BARANG`, `LIMIT_BAWAH`) VALUES
('b1', 'Acer 4730', 5300000, 11, 5),
('b2', 'toshiba 7832', 7500000, 15, 5),
('b3', 'Lenovo Pink v3', 12000000, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL auto_increment,
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  PRIMARY KEY  (`id_detail_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `kode_barang`, `jumlah_barang`) VALUES
(1, 1, 'Acer 473', 1),
(2, 1, 'toshiba ', 2),
(3, 2, 'b1', 2),
(4, 3, 'b2', 3),
(5, 4, 'b2', 3),
(6, 5, 'b2', 3),
(7, 6, 'b1', 1),
(8, 6, 'b2', 2),
(9, 6, 'b3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `KODE_KARYAWAN` varchar(8) NOT NULL,
  `NAMA` varchar(100) default NULL,
  `ALAMAT` text,
  `TEMPAT_LAHIR` varchar(100) default NULL,
  `TANGGAL_LAHIR` date default NULL,
  `JENIS_KELAMIN` tinyint(1) default NULL,
  `AGAMA` enum('Islam','Kristen','Katholik','Hindu','Budha') default NULL,
  `USERNAME` varchar(20) default NULL,
  `PASSWORD` varchar(20) default NULL,
  PRIMARY KEY  (`KODE_KARYAWAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`KODE_KARYAWAN`, `NAMA`, `ALAMAT`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `AGAMA`, `USERNAME`, `PASSWORD`) VALUES
('a1', 'Kakanda', 'Jalan Magelang', 'Riau', '1982-03-25', 0, 'Islam', 'admin', 'admin'),
('a2', 'Udin', NULL, 'Riau', '1980-03-24', 1, 'Katholik', 'echo', 'echo');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL auto_increment,
  `NAMA` varchar(100) default NULL,
  `ALAMAT` text,
  `JENIS_KELAMIN` tinyint(1) default NULL,
  `NO_TELEPON` varchar(16) default NULL,
  PRIMARY KEY  (`ID_PELANGGAN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA`, `ALAMAT`, `JENIS_KELAMIN`, `NO_TELEPON`) VALUES
(1, 'Andi Noya', 'magelang', 1, '5464564'),
(2, 'Wanda', 'Jakarta', 0, '45353435');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE IF NOT EXISTS `transaksi_penjualan` (
  `ID_TRANSAKSI` int(11) NOT NULL auto_increment,
  `KODE_KARYAWAN` varchar(8) default NULL,
  `ID_PELANGGAN` int(11) default NULL,
  `TANGGAL_TRANSAKSI` date default NULL,
  PRIMARY KEY  (`ID_TRANSAKSI`),
  KEY `FK_REFERENCE_1` (`KODE_KARYAWAN`),
  KEY `FK_REFERENCE_3` (`ID_PELANGGAN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`ID_TRANSAKSI`, `KODE_KARYAWAN`, `ID_PELANGGAN`, `TANGGAL_TRANSAKSI`) VALUES
(1, 'a1', 0, '2011-03-27'),
(2, 'a1', 0, '2011-03-27'),
(3, 'a1', 0, '2011-03-27'),
(4, 'a1', 0, '2011-03-27'),
(5, 'a1', 0, '2011-03-27'),
(6, 'a1', 1236, '2011-03-27');
