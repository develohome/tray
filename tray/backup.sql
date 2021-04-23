-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: tray
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.13-MariaDB

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
-- Table structure for table `listavendas`
--

DROP TABLE IF EXISTS `listavendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listavendas` (
  `id` int(4) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comissao` decimal(6,2) DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `datas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listavendas`
--

LOCK TABLES `listavendas` WRITE;
/*!40000 ALTER TABLE `listavendas` DISABLE KEYS */;
INSERT INTO `listavendas` VALUES (NULL,'alex','alex@gmail.com',1.00,18.00,'0000-00-00'),(10,'alex','alex@gmail.com',170.00,2.00,'2021-04-22'),(10,'alex','alex@gmail.com',255.00,3.00,'2021-04-22'),(11,'gabi','gabi@gmail.com',255.00,3.00,'2021-04-22'),(10,'alex','alex@gmail.com',340.00,4.00,'2021-04-22'),(10,'alex','alex@gmail.com',340.00,4.00,'2021-04-22'),(10,'alex','alex@gmail.com',4.00,50.00,'2021-04-22'),(10,'alex','alex@gmail.com',4.00,50.00,'2021-04-22'),(10,'alex','alex@gmail.com',238.00,2.00,'2021-04-22'),(10,'alex','alex@gmail.com',113.14,1.00,'2021-04-22'),(10,'alex','alex@gmail.com',340.00,4000.00,'2021-04-22'),(10,'alex','alex@gmail.com',12.33,145.00,'2021-04-22'),(10,'alex','alex@gmail.com',12.20,143.55,'2021-04-22'),(10,'alex','alex@gmail.com',121.81,1433.00,'2021-04-22'),(12,'jose','jose@gmail.com',28.32,333.21,'2021-04-22'),(10,'alex','alex@gmail.com',1.00,9999.99,'2021-04-23'),(10,'alex','alex@gmail.com',103.87,1222.00,'2021-04-23'),(10,'alex','alex@gmail.com',10.49,123.44,'2021-04-23'),(12,'jose','jose@gmail.com',18.90,222.32,'2021-04-23'),(10,'alex','alex@gmail.com',85.00,1000.00,'2021-04-23');
/*!40000 ALTER TABLE `listavendas` ENABLE KEYS */;
UNLOCK TABLES;
