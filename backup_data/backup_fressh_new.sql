-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: app_tabungan
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_nasabah`
--

DROP TABLE IF EXISTS `data_nasabah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_nasabah` (
  `id_nasabah` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `id_jenjang` int NOT NULL,
  `saldo` int NOT NULL,
  `jk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nasabah`),
  KEY `FK_data_nasabah_jenjang` (`id_jenjang`),
  KEY `id_nasabah` (`id_nasabah`),
  CONSTRAINT `FK_data_nasabah_jenjang` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_nasabah`
--

LOCK TABLES `data_nasabah` WRITE;
/*!40000 ALTER TABLE `data_nasabah` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_nasabah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenjang`
--

DROP TABLE IF EXISTS `jenjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenjang` (
  `id_jenjang` int NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenjang`
--

LOCK TABLES `jenjang` WRITE;
/*!40000 ALTER TABLE `jenjang` DISABLE KEYS */;
INSERT INTO `jenjang` VALUES (1,'Pelajar'),(2,'Mahasiswa'),(3,'Masyarakat');
/*!40000 ALTER TABLE `jenjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_nasabah` int NOT NULL,
  `kode_tr` int NOT NULL,
  `nominal` int NOT NULL,
  `saldo_awal` int NOT NULL,
  `saldo_akhir` int NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `FK_transaksi_data_nasabah` (`id_nasabah`),
  CONSTRAINT `FK_transaksi_data_nasabah` FOREIGN KEY (`id_nasabah`) REFERENCES `data_nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','mbssh23_'),(2,'Owner','BankMini20_');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_nasabah`
--

DROP TABLE IF EXISTS `view_nasabah`;
/*!50001 DROP VIEW IF EXISTS `view_nasabah`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_nasabah` AS SELECT 
 1 AS `id_jenjang`,
 1 AS `id_nasabah`,
 1 AS `nama`,
 1 AS `no_rekening`,
 1 AS `saldo`,
 1 AS `jk`,
 1 AS `nama_jenjang`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_transaksi`
--

DROP TABLE IF EXISTS `view_transaksi`;
/*!50001 DROP VIEW IF EXISTS `view_transaksi`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_transaksi` AS SELECT 
 1 AS `id_nasabah`,
 1 AS `id_transaksi`,
 1 AS `tanggal`,
 1 AS `kode_tr`,
 1 AS `nominal`,
 1 AS `saldo_awal`,
 1 AS `saldo_akhir`,
 1 AS `nama`,
 1 AS `no_rekening`,
 1 AS `id_jenjang`,
 1 AS `saldo`,
 1 AS `jk`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_nasabah`
--

/*!50001 DROP VIEW IF EXISTS `view_nasabah`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_nasabah` AS select `data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`id_nasabah` AS `id_nasabah`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk`,`jenjang`.`nama_jenjang` AS `nama_jenjang` from (`data_nasabah` join `jenjang` on((`data_nasabah`.`id_jenjang` = `jenjang`.`id_jenjang`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_transaksi`
--

/*!50001 DROP VIEW IF EXISTS `view_transaksi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_transaksi` AS select `transaksi`.`id_nasabah` AS `id_nasabah`,`transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`kode_tr` AS `kode_tr`,`transaksi`.`nominal` AS `nominal`,`transaksi`.`saldo_awal` AS `saldo_awal`,`transaksi`.`saldo_akhir` AS `saldo_akhir`,`data_nasabah`.`nama` AS `nama`,`data_nasabah`.`no_rekening` AS `no_rekening`,`data_nasabah`.`id_jenjang` AS `id_jenjang`,`data_nasabah`.`saldo` AS `saldo`,`data_nasabah`.`jk` AS `jk` from (`transaksi` join `data_nasabah` on((`transaksi`.`id_nasabah` = `data_nasabah`.`id_nasabah`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-10 23:54:08
