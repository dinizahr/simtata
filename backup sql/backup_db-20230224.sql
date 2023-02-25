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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.data_nasabah: ~4 rows (approximately)
/*!40000 ALTER TABLE `data_nasabah` DISABLE KEYS */;
INSERT INTO `data_nasabah` (`id_nasabah`, `nama`, `no_rekening`, `id_jenjang`, `saldo`, `jk`) VALUES
	(19, 'Adelin Azizatul', 'SMT001', 1, 10000, 'P');
/*!40000 ALTER TABLE `data_nasabah` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.jenjang
CREATE TABLE IF NOT EXISTS `jenjang` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.jenjang: ~3 rows (approximately)
/*!40000 ALTER TABLE `jenjang` DISABLE KEYS */;
INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
	(1, 'pelajar'),
	(2, 'mahasiswa'),
	(3, 'masyarakat');
/*!40000 ALTER TABLE `jenjang` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `kode_tr` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `FK_transaksi_data_nasabah` (`id_nasabah`),
  CONSTRAINT `FK_transaksi_data_nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `data_nasabah` (`id_nasabah`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.transaksi: ~2 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_nasabah`, `kode_tr`, `nominal`) VALUES
	(26, '2023-02-24', 19, 1, 15000),
	(27, '2023-02-24', 19, 1, 2000),
	(28, '2023-02-24', 19, 1, 17000);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table app_tabungan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table app_tabungan.user: ~1 rows (approximately)
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
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`no_rekening` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_jenjang` INT(11) NOT NULL,
	`saldo` INT(11) NOT NULL,
	`jk` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view app_tabungan.view_nasabah
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_nasabah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nasabah` AS SELECT * from data_nasabah join jenjang using (id_jenjang) ;

-- Dumping structure for view app_tabungan.view_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi` AS SELECT * from transaksi join data_nasabah using (id_nasabah) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
