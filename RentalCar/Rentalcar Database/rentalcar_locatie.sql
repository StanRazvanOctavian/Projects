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
-- Table structure for table `locatie`
--

DROP TABLE IF EXISTS `locatie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locatie` (
  `ID_Locatie` int NOT NULL AUTO_INCREMENT,
  `Judet` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Oras` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Strada` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Numar` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID_Locatie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locatie`
--

LOCK TABLES `locatie` WRITE;
/*!40000 ALTER TABLE `locatie` DISABLE KEYS */;
INSERT INTO `locatie` VALUES (1,'Ilfov','Bucuresti','Bd. Timisoara','20'),(2,'Ilfov','Bucuresti','Soseaua Virturii','48'),(3,'Ilfov','Bucuresti','Strada Buzesti','37'),(4,'Ilfov','Bucuresti','Bulevardul Aviatorilor','43'),(5,'Ilfov','Bucuresti','Strada Stirbei Voda','64'),(6,'Ilfov','Bucuresti','Bulevardul Dacia','78'),(7,'Ilfov','Bucuresti','Strada Traian','88'),(8,'Ilfov','Bucuresti','Spaiul Independentei','26'),(9,'Ilfov','Bucuresti','Strada Savinesti','24'),(10,'Ilfov','Bucuresti','Strada Dobresti','16'),(11,'Ilfov','Bucuresti','Strada Berceni','11'),(12,'Ilfov','Bucuresti','Strada Fundeni','98'),(13,'Ilfov','Bucuresti','Strada Nordului','102'),(14,'Ilfov','Bucuresti','Strada Rachetei','43'),(15,'Ilfov','Bucuresti','Strada Oltenitei','27');
/*!40000 ALTER TABLE `locatie` ENABLE KEYS */;
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
