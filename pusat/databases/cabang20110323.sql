/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/03/2011 7:42:16                           */
/*==============================================================*/
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cabang`
--
CREATE DATABASE cabang DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE cabang;

drop table if exists BARANG;

drop table if exists KARYAWAN;

drop table if exists PELANGGAN;

drop table if exists TRANSAKSI_PENJUALAN;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   KODE_BARANG          varchar(8) not null,
   NAMA                 varchar(100),
   HARGA                double,
   JUMLAH_BARANG        int,
   LIMIT_BAWAH          int,
   primary key (KODE_BARANG)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: KARYAWAN                                              */
/*==============================================================*/
create table KARYAWAN
(
   KODE_KARYAWAN        varchar(8) not null,
   NAMA                 varchar(100),
   ALAMAT               text,
   TEMPAT_LAHIR         varchar(100),
   TANGGAL_LAHIR        date,
   JENIS_KELAMIN        boolean,
   AGAMA                enum('Islam','Kristen','Katholik','Hindu','Budha'),
   USERNAME             varchar(20),
   PASSWORD             varchar(20),
   primary key (KODE_KARYAWAN)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: PELANGGAN                                             */
/*==============================================================*/
create table PELANGGAN
(
   ID_PELANGGAN         int not null,
   NAMA                 varchar(100),
   ALAMAT               text,
   JENIS_KELAMIN        boolean,
   NO_TELEPON           varchar(16),
   primary key (ID_PELANGGAN)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: TRANSAKSI_PENJUALAN                                   */
/*==============================================================*/
create table TRANSAKSI_PENJUALAN
(
   ID_TRANSAKSI         int not null,
   KODE_KARYAWAN        varchar(8),
   KODE_BARANG          varchar(8),
   ID_PELANGGAN         int,
   TANGGAL_TRANSAKSI    date,
   JUMLAH_BARANG        int,
   SUB_TOTAL            double,
   primary key (ID_TRANSAKSI)
)ENGINE=InnoDB;

alter table TRANSAKSI_PENJUALAN add constraint FK_REFERENCE_1 foreign key (KODE_KARYAWAN)
      references KARYAWAN (KODE_KARYAWAN) on delete restrict on update restrict;

alter table TRANSAKSI_PENJUALAN add constraint FK_REFERENCE_2 foreign key (KODE_BARANG)
      references BARANG (KODE_BARANG) on delete restrict on update restrict;

alter table TRANSAKSI_PENJUALAN add constraint FK_REFERENCE_3 foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN) on delete restrict on update restrict;

