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
-- Table structure for table `rezervare`
--

DROP TABLE IF EXISTS `rezervare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rezervare` (
  `NrRezervare` int NOT NULL,
  `ID_Auto` int NOT NULL,
  `ID_Client` int NOT NULL AUTO_INCREMENT,
  `Disponibilitate` char(2) NOT NULL,
  `Categorie` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ID_Factura` int NOT NULL,
  PRIMARY KEY (`NrRezervare`),
  KEY `ID_Client_idx` (`ID_Client`),
  KEY `ID_Auto` (`ID_Auto`),
  KEY `ID_Factura` (`ID_Factura`),
  CONSTRAINT `rezervare_ibfk_1` FOREIGN KEY (`ID_Auto`) REFERENCES `auto` (`ID_Auto`),
  CONSTRAINT `rezervare_ibfk_2` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  CONSTRAINT `rezervare_ibfk_3` FOREIGN KEY (`ID_Factura`) REFERENCES `factura` (`ID_Factura`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezervare`
--

LOCK TABLES `rezervare` WRITE;
/*!40000 ALTER TABLE `rezervare` DISABLE KEYS */;
INSERT INTO `rezervare` VALUES (1,1,1,'Da','Berlina',1),(2,6,3,'Da','Cabriolet',2),(3,3,4,'Da','Coupe',3),(4,4,2,'Da','Coupe',4),(5,12,4,'Da','Breck',5),(6,8,2,'Da','Roadster',6),(7,9,3,'Da','Pick-UP',7),(8,1,7,'Nu','Berlina',8),(9,1,8,'Da','Berlina',9),(10,1,17,'Da','Berlina',10),(11,7,13,'Da','Roadster',11),(12,18,15,'Da','Breck',12),(13,20,14,'Da','Cabriolet',13),(14,19,20,'Da','Cabriolet',14),(15,15,15,'Da','Berlina',15),(16,13,13,'Da','Berlina',16),(17,13,16,'Da','Berlina',17),(18,19,12,'Da','Cabriolet',18),(19,18,10,'Da','Breck',19),(20,17,9,'Da','Cabriolet',20);
/*!40000 ALTER TABLE `rezervare` ENABLE KEYS */;
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
