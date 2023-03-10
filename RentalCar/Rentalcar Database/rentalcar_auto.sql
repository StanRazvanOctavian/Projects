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
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auto` (
  `ID_Auto` int NOT NULL AUTO_INCREMENT,
  `ID_Categorie` int NOT NULL,
  `Culoare` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `AnFabricatie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Model` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Marca` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `NrMasina` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CantitateBenzina` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Disponibilitate` char(2) NOT NULL DEFAULT 'Da',
  `Kilometri` int DEFAULT NULL,
  PRIMARY KEY (`ID_Auto`),
  KEY `ID_Categorie_idx` (`ID_Categorie`),
  CONSTRAINT `ID_Categorie` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
INSERT INTO `auto` VALUES (1,1,'Rosu','2012','Albea','Fiat','B05JZD','24l','DA',123000),(2,5,'Maro','2015','Dacia','Logan','B656UUF','34l','NU',132000),(3,2,'Negru','2018','A4','Audi','B123AFR','23l','NU',35000),(4,4,'Blue','2013','Astra Bertone','Opel','B09RZV','35l','DA',150000),(5,7,'Blue','2015','ForFour','Smart','B124HJH','12l','DA',NULL),(6,10,'Albastru','2021','Duster','Dacia','B48HUW','19l','NU',16000),(7,8,'Rosu','2018','ForFour','Smart','B199LKJ','24l','DA',128000),(8,12,'Alb','2015','Micra','Nissan','B154REW','15l','NU',200000),(9,3,'Negru','2017','500C','Fiat','B75NIU','18l','DA',55000),(10,11,'Silver','2008','Passat B5','Volkswagen','B786SVG','26l','DA',205000),(11,9,'Maro','2010','Amarok','Volkswagen','B102WWA','30l','DA',100000),(12,6,'Verde','2017','i10','Hyundai','B167DEF','15l','DA',41005),(13,1,'Galben','2022','Skoda','Octavia','B854AJH','28l','DA',15000),(14,2,'Verde','2016','Astra','Opel','B444AAA','44l','DA',120000),(15,1,'Verde','2007','Seria 1','BMW','B220VGA','40l','DA',210000),(16,2,'Verde','2017','Logan MCV','Dacia','B990LGO','37l','DA',50000),(17,1,'Mov','2017','Skoda','Octavia','B209SKD','20l','DA',100000),(18,2,'Alb','2019','V60','Volvo','B142VOL','15l','DA',51000),(19,5,'Negru','2019','Cascada','Opel','B228BGA','20l','DA',30000),(20,6,'Negru','2017','Mustang','Ford','B98MFG','50l','DA',80000),(21,10,'Rosu','2018','CX5','Mazda','B288JHG','24l','DA',128000),(22,11,'Silver','2008','A5','Audi','B786AND','26l','DA',205000),(23,12,'Maro','2010','Astra','Opel','B167OPL','30l','DA',100000),(24,5,'Verde','2007','Seria 5','BMW','B220BGW','40l','DA',210000),(25,4,'Verde','2017','Sprinter','Dacia','B963ABD','37l','DA',50000);
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
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
