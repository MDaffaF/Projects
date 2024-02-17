CREATE DATABASE login;
USE DATABASE login;

DROP TABLE IF EXISTS `tb_absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_absen` (
  `id_absen` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_absen`
--

-- LOCK TABLES `tb_absen` WRITE;
/*!40000 ALTER TABLE `tb_absen` DISABLE KEYS */;
INSERT INTO `tb_absen` VALUES (24,'test','Saturday, 17-02-2024','09:58:36 am','10:26:14 am','107.5846056','-6.9375707'),(25,'testi','Saturday, 17-02-2024','11:30:36 am','11:30:40 am','107.6166656','-6.9402624');
/*!40000 ALTER TABLE `tb_absen` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `tb_cuti`
--

DROP TABLE IF EXISTS `tb_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cuti` (
  `id_cuti` int NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cuti`
--

-- LOCK TABLES `tb_cuti` WRITE;
/*!40000 ALTER TABLE `tb_cuti` DISABLE KEYS */;
INSERT INTO `tb_cuti` VALUES (5,'Test cuti',1,'agung','2024-02-01','2024-02-16'),(8,'1',0,'testi','2024-02-01','2024-02-02'),(9,'2',1,'testi','2024-02-03','2024-02-04');
/*!40000 ALTER TABLE `tb_cuti` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `tb_izin`
--

DROP TABLE IF EXISTS `tb_izin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_izin` (
  `id_izin` int NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  `approval` tinyint(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id_izin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_izin`
--

-- LOCK TABLES `tb_izin` WRITE;
/*!40000 ALTER TABLE `tb_izin` DISABLE KEYS */;
INSERT INTO `tb_izin` VALUES (7,'test 2',0,'agung','2024-02-01','2024-02-15'),(10,'test ulang',1,'testi','2024-02-01','2024-02-09'),(11,'testisti',0,'testi','2024-02-09','2024-02-14');
/*!40000 ALTER TABLE `tb_izin` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_login` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

-- LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` VALUES ('afung','$2y$10$rze7s5KjAG5fxl5ik5H7TulfYEPaNWoUDjqzNEqltPatRhB0OEkFq','user',NULL),('agung','$2y$10$VulRabazVuhc4DervMd19OzHOHpgZ9RXywBIOIb2QwUraih/bJilW','user','1936759090_8acdca306ba348b78d67db28eec0e2c7.jpg'),('test','$2y$10$PFnWVrpM1SvIlCvZOb4knel2irItgB7uYfgNIaC8uLbJTWwOUUVZe','admin',NULL),('testi','$2y$10$Ba6Xh0tgnFypGDLkHFsSSe0k.VeOcjiXhd/bU.E7U.1HI/JgXEa6q','user','1405368711_img24.jpg');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Dumping routines for database 'login'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-17 12:30:20
