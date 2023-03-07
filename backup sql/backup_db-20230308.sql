-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for app_tabungan
CREATE DATABASE IF NOT EXISTS `app_tabungan` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `app_tabungan`;

-- Dumping structure for table app_tabungan.data_nasabah
CREATE TABLE IF NOT EXISTS `data_nasabah` (
  `id_nasabah` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `id_jenjang` int NOT NULL,
  `saldo` int NOT NULL,
  `jk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nasabah`),
  KEY `FK_data_nasabah_jenjang` (`id_jenjang`),
  CONSTRAINT `FK_data_nasabah_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.data_nasabah: ~1 rows (approximately)
DELETE FROM `data_nasabah`;
INSERT INTO `data_nasabah` (`id_nasabah`, `nama`, `no_rekening`, `id_jenjang`, `saldo`, `jk`) VALUES
	(19, 'Adelin Azizatul', 'SMT001', 1, 15000, 'P'),
	(20, 'aza', 'SMT002', 1, 20000, 'P'),
	(21, 'sasa', 'SMT003', 1, 10000, 'P'),
	(22, 'zea', 'SMT003', 2, 15000, 'P');

-- Dumping structure for table app_tabungan.jenjang
CREATE TABLE IF NOT EXISTS `jenjang` (
  `id_jenjang` int NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.jenjang: ~3 rows (approximately)
DELETE FROM `jenjang`;
INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
	(1, 'pelajar'),
	(2, 'mahasiswa'),
	(3, 'masyarakat');

-- Dumping structure for table app_tabungan.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_nasabah` int NOT NULL,
  `kode_tr` int NOT NULL,
  `nominal` int NOT NULL,
  `saldo_awal` int NOT NULL,
  `saldo_akhir` int NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `FK_transaksi_data_nasabah` (`id_nasabah`),
  CONSTRAINT `FK_transaksi_data_nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `data_nasabah` (`id_nasabah`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.transaksi: ~4 rows (approximately)
DELETE FROM `transaksi`;
INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_nasabah`, `kode_tr`, `nominal`, `saldo_awal`, `saldo_akhir`) VALUES
	(26, '2023-02-24', 19, 1, 15000, 30000, 15000),
	(29, '2023-03-07', 19, 2, 4000, 15000, 11000),
	(30, '2023-03-07', 19, 1, 4000, 11000, 15000),
	(31, '2023-03-07', 20, 1, 10000, 0, 10000),
	(32, '2023-03-31', 20, 1, 10000, 10000, 20000),
	(33, '2023-03-01', 21, 1, 10000, 0, 10000),
	(34, '2024-01-01', 22, 1, 20000, 0, 20000),
	(35, '2025-02-01', 22, 2, 5000, 20000, 15000);

-- Dumping structure for table app_tabungan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.user: ~0 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
	(1, 'Admin', 'admin');

-- Dumping structure for view app_tabungan.view_nasabah
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_nasabah` (
	`id_jenjang` INT(10) NOT NULL,
	`id_nasabah` INT(10) NOT NULL,
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_rekening` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`saldo` INT(10) NOT NULL,
	`jk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_jenjang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view app_tabungan.view_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi` (
	`id_nasabah` INT(10) NOT NULL,
	`id_transaksi` INT(10) NOT NULL,
	`tanggal` DATE NOT NULL,
	`kode_tr` INT(10) NOT NULL,
	`nominal` INT(10) NOT NULL,
	`saldo_awal` INT(10) NOT NULL,
	`saldo_akhir` INT(10) NOT NULL,
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_rekening` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_jenjang` INT(10) NOT NULL,
	`saldo` INT(10) NOT NULL,
	`jk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view app_tabungan.view_nasabah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_nasabah`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_nasabah` AS select `data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`id_nasabah` AS `id_nasabah`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk`,`jenjang`.`nama_jenjang` AS `nama_jenjang` from (`data_nasabah` join `jenjang` on((`data_nasabah`.`id_jenjang` = `jenjang`.`id_jenjang`)));

-- Dumping structure for view app_tabungan.view_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_transaksi` AS select `transaksi`.`id_nasabah` AS `id_nasabah`,`transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`kode_tr` AS `kode_tr`,`transaksi`.`nominal` AS `nominal`,`transaksi`.`saldo_awal` AS `saldo_awal`,`transaksi`.`saldo_akhir` AS `saldo_akhir`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk` from (`transaksi` join `data_nasabah` on((`transaksi`.`id_nasabah` = `data_nasabah`.`id_nasabah`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
