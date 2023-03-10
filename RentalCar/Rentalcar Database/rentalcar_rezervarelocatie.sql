CREATE DATABASE  IF NOT EXISTS `rentalcar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rentalcar`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rentalcar
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rezervarelocatie`
--

DROP TABLE IF EXISTS `rezervarelocatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rezervarelocatie` (
  `NrRezervare` int NOT NULL,
  `ID_LocatiePreluare` int NOT NULL,
  `ID_LocatiePredare` int NOT NULL,
  KEY `ID_LocatiePreluare_idx` (`ID_LocatiePreluare`),
  KEY `ID_LocatiePredare_idx` (`ID_LocatiePredare`),
  KEY `Nr_Rezervare_idx` (`NrRezervare`),
  CONSTRAINT `ID_LocatiePredare` FOREIGN KEY (`ID_LocatiePredare`) REFERENCES `locatie` (`ID_Locatie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ID_LocatiePreluare` FOREIGN KEY (`ID_LocatiePreluare`) REFERENCES `locatie` (`ID_Locatie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `Nr_Rezervare` FOREIGN KEY (`NrRezervare`) REFERENCES `rezervare` (`NrRezervare`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezervarelocatie`
--

LOCK TABLES `rezervarelocatie` WRITE;
/*!40000 ALTER TABLE `rezervarelocatie` DISABLE KEYS */;
INSERT INTO `rezervarelocatie` VALUES (1,1,1),(2,1,2),(3,3,1),(4,4,3),(5,7,5),(6,2,4),(7,5,2),(8,4,3),(9,10,7),(10,6,8),(11,12,11),(12,9,7),(13,4,2),(14,2,3),(15,1,9),(16,1,12),(17,3,6),(18,4,5),(19,5,5),(20,7,7);
/*!40000 ALTER TABLE `rezervarelocatie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-16 22:34:24
