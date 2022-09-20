/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/03/2011 7:36:00                           */
/*==============================================================*/

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pusat`
--
CREATE DATABASE pusat DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE pusat;


drop table if exists BARANG;

drop table if exists JATAH_BARANG_CABANG;

drop table if exists KANTOR;

drop table if exists KARYAWAN;

drop table if exists KIRIM_BARANG;

drop table if exists REKAP;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   KODE_BARANG          varchar(8) not null,
   NAMA                 varchar(100),
   HARGA                double,
   primary key (KODE_BARANG)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: JATAH_BARANG_CABANG                                   */
/*==============================================================*/
create table JATAH_BARANG_CABANG
(
   ID_JATAH             int not null,
   ID_KANTOR            int,
   KODE_BARANG          varchar(8),
   LIMIT_ATAS           int,
   LIMIT_BAWAH          int,
   primary key (ID_JATAH)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: KANTOR                                                */
/*==============================================================*/
create table KANTOR
(
   ID_KANTOR            int not null,
   NAMA_KANTOR          varchar(100),
   KETERANGAN           text,
   primary key (ID_KANTOR)
)
ENGINE=InnoDB;

/*==============================================================*/
/* Table: KARYAWAN                                              */
/*==============================================================*/
create table KARYAWAN
(
   KODE_KARYAWAN        varchar(8) not null,
   ID_KANTOR            int,
   NAMA                 varchar(100),
   ALAMAT               text,
   TEMPAT_LAHIR         varchar(100),
   TANGGAL_LAHIR        date,
   JENIS_KELAMIN        boolean,
   AGAMA                enum('Islam','Kristen','Katholik','Hindu','Budha'),
   USERNAME             varchar(20),
   PASSWORD             varchar(20),
   primary key (KODE_KARYAWAN)
)
ENGINE=InnoDB;

/*==============================================================*/
/* Table: KIRIM_BARANG                                          */
/*==============================================================*/
create table KIRIM_BARANG
(
   ID_KIRIM_BARANG      int not null,
   ID_KANTOR            int,
   KODE_BARANG          varchar(8),
   KODE_KARYAWAN        varchar(8),
   TANGGAL_KIRIM        date,
   TANGGAL_TERIMA       date,
   JUMLAH_BARANG        int,
   primary key (ID_KIRIM_BARANG)
)ENGINE=InnoDB;

/*==============================================================*/
/* Table: REKAP                                                 */
/*==============================================================*/
create table REKAP
(
   ID_REKAP             int not null,
   ID_KANTOR            int,
   ID_TRANSAKSI         int,
   KODE_BARANG          varchar(8),
   KODE_KARYAWAN        varchar(8),
   TANGGAL_TRANSAKSI    date,
   JUMLAH_BARANG        int,
   SUB_TOTAL            double,
   primary key (ID_REKAP)
)
ENGINE=InnoDB;

alter table JATAH_BARANG_CABANG add constraint FK_REFERENCE_5 foreign key (ID_KANTOR)
      references KANTOR (ID_KANTOR) on delete restrict on update restrict;

alter table JATAH_BARANG_CABANG add constraint FK_REFERENCE_6 foreign key (KODE_BARANG)
      references BARANG (KODE_BARANG) on delete restrict on update cascade;

alter table KARYAWAN add constraint FK_REFERENCE_1 foreign key (ID_KANTOR)
      references KANTOR (ID_KANTOR) on delete restrict on update restrict;

alter table KIRIM_BARANG add constraint FK_REFERENCE_10 foreign key (KODE_KARYAWAN)
      references KARYAWAN (KODE_KARYAWAN) on delete restrict on update restrict;

alter table KIRIM_BARANG add constraint FK_REFERENCE_7 foreign key (ID_KANTOR)
      references KANTOR (ID_KANTOR) on delete restrict on update restrict;

alter table KIRIM_BARANG add constraint FK_REFERENCE_9 foreign key (KODE_BARANG)
      references BARANG (KODE_BARANG) on delete restrict on update restrict;

alter table REKAP add constraint FK_REFERENCE_2 foreign key (ID_KANTOR)
      references KANTOR (ID_KANTOR) on delete restrict on update restrict;

alter table REKAP add constraint FK_REFERENCE_3 foreign key (KODE_BARANG)
      references BARANG (KODE_BARANG) on delete restrict on update restrict;

alter table REKAP add constraint FK_REFERENCE_4 foreign key (KODE_KARYAWAN)
      references KARYAWAN (KODE_KARYAWAN) on delete restrict on update restrict;

