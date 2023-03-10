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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `ID_Client` int NOT NULL AUTO_INCREMENT,
  `Nume` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Prenume` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Telefon` char(10) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Strada` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Oras` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Numar` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Judet` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_Client`),
  UNIQUE KEY `CNP` (`CNP`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Stan','Razvan','0755876005','9099090909090','Vlaicu','Curtea De Arges','100','Arges','admin','12345'),(2,'Popescu','Ion','0765677878','1234567891234','Splai','Bucuresti','25','Ilfov','whip11','anaaremere'),(3,'Tanase','Maria','0755876012','3333333333312','Victoriei','Bucuresti','13','Ilfov','admin','parola'),(4,'Ionescu','Elena','0734567891','1234566789123','Savinesti','Bucuresti','68','Ilfov','maria','77887788'),(5,'Maria','Popescu','076876987','1234567890123','Victoriei','Bucuresti','213','Ilfov','maria','123451'),(6,'parisa','ioana','0755876012','3333333333333','Victoriei','Bucuresti','12','Ilfov','parisq','parol'),(7,'Gheorghe','Ion','0755876298','0987642321123','Bulevardul Dacia','Bucuresti','131','Ilfov','aaa','a123'),(8,'Marian','Gheorghe','0787313945','1234556784561','Popesti','Bucuresti','152','Ilfov','marian','marian23'),(9,'Filip','Ioana','0776523412','1234512345123','Berceni','Bucuresti','23','Ilfov','Ionela','Ionela12312'),(10,'Marius','Irinel','0754218569','2548754125654','1 Decembrie','Bucuresti','123','Ilfov','inrinel','inielmarius'),(11,'Mihai','Vasile','0754634251','1995452641254','Dobresti','Bucuresti','27','Ilfov','mihai','parol'),(12,'Stan ','Raluca','0751428547','1342658951247','Nordului','Bucuresti','75','Ilfov','raluca','ral123'),(13,'Ionescu','Ion','0754287965','1236549546154','Fundeni','Bucuresti ','12','Ilfov','Ionel','ionelus'),(14,'Vladoiu','Marius','0784512548','1231315462564','Olteniei','Bucuresti','98','Ilfov','Marius','Marius098'),(15,'Popescu ','Andrei','0741245875','3215648004520','Bulevardul Aviatorilor','Bucuresti','56','Ilfov','andrei','poescu121'),(16,'Maria','Ion','0758451245','3649578842546','Bulevardul Timisoara','Bucuresti','95','Ilfov','mariaion','ionasa'),(17,'Ion','George','0798345431','9876543214123','Bulevardul Dacia','Bucuresti','13','Ilfov','ion','george'),(18,'Ionescu','Elena','0745842169','3458215455694','Berceni','Bucuresti','90','Ilfov','ionescuele','elena121'),(19,'Stan ','Ion','0745874581','1745785451544','Negru Voda','Curtea de Arges','15','Arges','ionstan','easada'),(20,'Razvan','Octavian','0754123141','0925421658972','Negru Voda','Curtea de Arges','132','Arges','whip11','ioasdan'),(21,'','','','','','','','','','');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
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
