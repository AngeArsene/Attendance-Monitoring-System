CREATE DATABASE  IF NOT EXISTS `ams` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ams`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ams
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_number` int unsigned NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$15$EB3jjDo8CjZLuPZ0tqxmY.DXPeltWjhUjqr9daYAG3Pscg4dTWQai',
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'NKEN MANDENG','Ange Arsene','nkenmandeng@gmail.com','male',699512438,'Japoma','$2y$15$T.Sf1iEvT2rOuPIxo6GDIOa/3qZrq17dLtHsOuVPxUZ9bU0yKIpDG','2024-01-12 18:44:24','2024-01-26 17:16:54'),(2,'KOO','Martha Ariel','koomartha@gmail.com','female',692742721,'PK 10','$2y$15$hUgbOzVIdBJZDaZAur3Am.kDxV89g/em4S3FCSpqBNNz7UB3cHY5.','2024-02-07 20:14:24',NULL),(4,'NYECK MANDENG','Hubert Stephane','nyeckmandeng@gmail.com','male',691292606,'Japoma','$2y$15$2q0AyLcRJNpRTmcsOfmkNeJA145203l4FYBXzZU1XBFMxq/MY9alW','2024-02-13 01:07:02','2024-02-13 01:08:37');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parent` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int unsigned NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$15$EB3jjDo8CjZLuPZ0tqxmY.DXPeltWjhUjqr9daYAG3Pscg4dTWQai',
  `registered_by` tinyint unsigned DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  KEY `registered_by` (`registered_by`),
  CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`registered_by`) REFERENCES `administrator` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'MANDENG','Felix','mandengfelix@gmail.com','male','Japoma',699618222,'$2y$15$FvKnwYTOMwmYLDPZnLj/jO91ahFilK1FpMpYLLiJHg4Owf.pGywq.',1,'2024-01-06 11:54:27','2024-01-16 16:52:12'),(2,'KOO','Rosaline','koorosaline@gmail.com','female','PK 10',699002233,'$2y$15$44RStfOZ0/bioqsky3dVPOuSNo0OfFPFVbS0/gVFhAv/Lx3kow.vK',2,'2024-01-17 20:36:13','2024-01-17 20:42:55');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int unsigned NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$15$EB3jjDo8CjZLuPZ0tqxmY.DXPeltWjhUjqr9daYAG3Pscg4dTWQai',
  `parent` tinyint unsigned DEFAULT NULL,
  `registered_by` tinyint unsigned DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  KEY `registered_by` (`registered_by`),
  KEY `parent` (`parent`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`registered_by`) REFERENCES `administrator` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `parent` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'NKEN','Ange','male','2001-02-08','nkenange@gmail.com','Japoma',699512438,'$2y$15$NFDUS8x4KAfY6cKkbkPcFe6dZMMZvmA9hrg6l5vot5.rwR8aaRb/G',1,1,'2024-01-14 04:06:22','2024-02-11 17:08:59'),(3,'KOO','Ariel','female','2001-02-08','kooariel@gmail.com','PK 10',692742721,'$2y$15$93EaJG4Au3XT0rDQTKycdexkWL8OXayJjHtftPIpIZJjdiceleZ6K',2,2,'2024-01-11 17:09:15','2024-02-11 17:09:12'),(26,'JOHNSON','Mike','male','2024-03-01','johnsonmike@gmail.com','PK 17',691292606,'$2y$15$AoaytnqQO9QZ/3wMlG8KGOMnWqTxp0SL3HE7Pf5p2utPKOCi5wJuO',1,2,'2024-02-13 01:02:02',NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `email` varchar(150) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_number` int unsigned NOT NULL,
  `registered_by` tinyint unsigned DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$15$EB3jjDo8CjZLuPZ0tqxmY.DXPeltWjhUjqr9daYAG3Pscg4dTWQai',
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  KEY `registered_by` (`registered_by`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`registered_by`) REFERENCES `administrator` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Mandeng','Florence Pamela','mandengflorence@gmail.com','female',693840520,2,'Japoma','$2y$15$ZXZDe3v1WOx6/fnLVrNY3e4fz91.DzMJlsYcyEvL3a/qxRzBVm/hC','2024-02-06 15:49:11',NULL),(2,'Mengue','Elisabeth','mengueelisabeth@gmail.com','female',680528310,2,'Japoma','$2y$15$/fTYD.8ogwLl54VeK5We7e0hVODvboNaTK7174nCA06EvXH8rMvZe','2024-02-06 15:57:28',NULL);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ams'
--

--
-- Dumping routines for database 'ams'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-13 16:59:47
