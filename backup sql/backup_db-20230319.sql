-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for app_tabungan
CREATE DATABASE IF NOT EXISTS `app_tabungan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `app_tabungan`;

-- Dumping structure for table app_tabungan.data_nasabah
CREATE TABLE IF NOT EXISTS `data_nasabah` (
  `id_nasabah` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `jk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nasabah`),
  KEY `FK_data_nasabah_jenjang` (`id_jenjang`),
  CONSTRAINT `FK_data_nasabah_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.data_nasabah: ~3 rows (approximately)
DELETE FROM `data_nasabah`;
/*!40000 ALTER TABLE `data_nasabah` DISABLE KEYS */;
INSERT INTO `data_nasabah` (`id_nasabah`, `nama`, `no_rekening`, `id_jenjang`, `saldo`, `jk`) VALUES
	(23, 'Azka', 'SMT001', 2, 50000, 'L'),
	(24, 'Laila', 'SMT002', 1, 19999, 'P');
/*!40000 ALTER TABLE `data_nasabah` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.jenjang
CREATE TABLE IF NOT EXISTS `jenjang` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.jenjang: ~3 rows (approximately)
DELETE FROM `jenjang`;
/*!40000 ALTER TABLE `jenjang` DISABLE KEYS */;
INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
	(1, 'Pelajar'),
	(2, 'Mahasiswa'),
	(3, 'Masyarakat');
/*!40000 ALTER TABLE `jenjang` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `kode_tr` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `FK_transaksi_data_nasabah` (`id_nasabah`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.transaksi: ~6 rows (approximately)
DELETE FROM `transaksi`;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_nasabah`, `kode_tr`, `nominal`, `saldo_awal`, `saldo_akhir`) VALUES
	(26, '2023-02-24', 19, 1, 15000, 30000, 15000),
	(29, '2023-03-07', 19, 2, 4000, 15000, 11000),
	(30, '2023-03-07', 19, 1, 4000, 11000, 15000),
	(31, '2023-03-07', 20, 1, 10000, 0, 10000),
	(32, '2023-03-31', 20, 1, 10000, 10000, 20000),
	(33, '2023-03-01', 21, 1, 10000, 0, 10000),
	(36, '2023-03-18', 19, 1, 30000, 15000, 45000),
	(38, '2023-03-18', 20, 1, 20000, 20000, 40000),
	(39, '2023-03-18', 20, 2, 20000, 40000, 20000),
	(40, '2023-03-18', 20, 2, 10000, 20000, 10000),
	(41, '2023-03-18', 23, 1, 5000, 0, 5000),
	(42, '2023-03-18', 23, 1, 5000, 5000, 10000),
	(43, '2023-07-02', 24, 1, 20000, 0, 20000),
	(44, '2023-05-18', 23, 1, 40000, 10000, 50000),
	(45, '2023-08-18', 24, 2, 1, 20000, 19999);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
	(1, 'Admin', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for view app_tabungan.view_nasabah
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_nasabah` (
	`id_jenjang` INT(11) NOT NULL,
	`id_nasabah` INT(11) NOT NULL,
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_rekening` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`saldo` INT(11) NOT NULL,
	`jk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_jenjang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view app_tabungan.view_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi` (
	`id_nasabah` INT(11) NOT NULL,
	`id_transaksi` INT(11) NOT NULL,
	`tanggal` DATE NOT NULL,
	`kode_tr` INT(11) NOT NULL,
	`nominal` INT(11) NOT NULL,
	`saldo_awal` INT(11) NOT NULL,
	`saldo_akhir` INT(11) NOT NULL,
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_rekening` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_jenjang` INT(11) NOT NULL,
	`saldo` INT(11) NOT NULL,
	`jk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view app_tabungan.view_nasabah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_nasabah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nasabah` AS select `data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`id_nasabah` AS `id_nasabah`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk`,`jenjang`.`nama_jenjang` AS `nama_jenjang` from (`data_nasabah` join `jenjang` on((`data_nasabah`.`id_jenjang` = `jenjang`.`id_jenjang`))) ;

-- Dumping structure for view app_tabungan.view_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi` AS select `transaksi`.`id_nasabah` AS `id_nasabah`,`transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`kode_tr` AS `kode_tr`,`transaksi`.`nominal` AS `nominal`,`transaksi`.`saldo_awal` AS `saldo_awal`,`transaksi`.`saldo_akhir` AS `saldo_akhir`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk` from (`transaksi` join `data_nasabah` on((`transaksi`.`id_nasabah` = `data_nasabah`.`id_nasabah`))) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
