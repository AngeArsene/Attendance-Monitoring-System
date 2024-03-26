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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'NKEN MANDENG','Ange Arsene','nkenmandeng@gmail.com','male',699512438,'Japoma','$2y$15$GqmhrWiqcTDzP5as6ccOyO4ijgVFRGRBedSusoXJwgQTlAW8eh2IS','2024-01-12 18:44:24','2024-03-11 21:28:52'),(2,'KOO','Martha Ariel','koomartha@gmail.com','female',692742721,'PK 10','$2y$15$hUgbOzVIdBJZDaZAur3Am.kDxV89g/em4S3FCSpqBNNz7UB3cHY5.','2024-02-07 20:14:24',NULL),(4,'NYECK MANDENG','Hubert Stephane','nyeckmandeng@gmail.com','male',691292606,'Japoma','$2y$15$2q0AyLcRJNpRTmcsOfmkNeJA145203l4FYBXzZU1XBFMxq/MY9alW','2024-02-13 01:07:02','2024-02-13 01:08:37'),(5,'MANDENG','Josepha','mandengjosepha@gmail.com','female',699243845,'Bikoukound','$2y$15$KnZf5PxzAiaYylynDRuCC.rsFwhV31zGejYXy.VCAs1FUyvPi7YUi','2024-02-13 17:09:24','2024-02-13 17:10:58'),(10,'MANDENG','Petit','mandengpetit@gmail.com','male',699231682,'Bikoukound','$2y$15$xfXbp5313l7P1iGI8s3fNOlwGSVxqx5HPODtTiXa0PMYnd0Lk2xYK','2024-02-14 18:06:08','2024-02-14 18:07:55');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `NOH` tinyint unsigned NOT NULL,
  `teacher` tinyint unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `hours_remaining` tinyint unsigned NOT NULL DEFAULT '20',
  `department` tinyint unsigned DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher` (`teacher`),
  KEY `department` (`department`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `teacher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `course_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'WEB DEVELOPMENT',25,6,'2024-03-19','2024-03-30',20,1,NULL),(5,'Computerized Accounting And Management',52,2,'2024-03-19','2024-03-30',20,2,'2024-03-26 23:28:24'),(6,'Human Resources Management',55,4,'2024-03-19','2024-03-30',20,2,NULL),(7,'Office Automation',44,2,'2024-03-19','2024-03-30',20,2,NULL),(9,'GRAPHIC DESIGNER AND WEB DESIGN',58,1,'2024-03-19','2024-03-30',20,3,NULL),(10,'DIGITAL MARKETING',46,1,'2024-03-19','2024-03-30',20,3,NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `head` tinyint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `head_idx` (`head`),
  CONSTRAINT `head` FOREIGN KEY (`head`) REFERENCES `teacher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'computer science',6),(2,'management',4),(3,'digital marketing',1);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'MANDENG','Felix','mandengfelix@gmail.com','male','Japoma',699618222,'$2y$15$FvKnwYTOMwmYLDPZnLj/jO91ahFilK1FpMpYLLiJHg4Owf.pGywq.',1,'2024-01-06 11:54:27','2024-01-16 16:52:12'),(2,'KOO','Rosaline','koorosaline@gmail.com','female','PK 10',699002233,'$2y$15$44RStfOZ0/bioqsky3dVPOuSNo0OfFPFVbS0/gVFhAv/Lx3kow.vK',2,'2024-01-17 20:36:13','2024-01-17 20:42:55'),(3,'MANDENG','Josepha','mandengjosepha@gmail.com','female','Bikoukound',699243845,'$2y$15$WmCdxaBanzdkQuac1aiz1um4tpCqfdy.8wAW2xq5676SbXJ6zrNvq',5,'2024-02-14 17:53:18','2024-02-14 17:56:43'),(5,'MANDENG','Petit','mandengpetit@gmail.com','male','Bikoukound',699243844,'$2y$15$c2Cl32kWq2MNNQ0FRY5ktOAiP1.1WvRLRAbEG45MfQEB0y.swH.Qa',10,'2024-02-14 18:12:07',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'NKEN','Ange','male','2001-02-08','nkenange@gmail.com','Japoma',699512438,'$2y$15$NFDUS8x4KAfY6cKkbkPcFe6dZMMZvmA9hrg6l5vot5.rwR8aaRb/G',1,1,'2024-01-14 04:06:22','2024-02-11 17:08:59'),(3,'KOO','Ariel','female','2001-02-08','kooariel@gmail.com','PK 10',692742721,'$2y$15$93EaJG4Au3XT0rDQTKycdexkWL8OXayJjHtftPIpIZJjdiceleZ6K',2,2,'2024-01-11 17:09:15','2024-02-11 17:09:12'),(26,'JOHNSON','Mike','male','2024-03-01','johnsonmike@gmail.com','PK 17',691292606,'$2y$15$AoaytnqQO9QZ/3wMlG8KGOMnWqTxp0SL3HE7Pf5p2utPKOCi5wJuO',1,2,'2024-02-13 01:02:02',NULL),(27,'MAKA','Francine','male','2024-01-30','makafrancine@gmail.com','Nkende',672396948,'$2y$15$uDbDE.i/uuXj29e1TGEl2ucZqciiAUAFN16zXHVKrS4P.jmJHLbRm',1,5,'2024-02-13 17:14:52','2024-02-13 17:17:47');
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
  `address` varchar(255) NOT NULL,
  `department` tinyint unsigned DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$15$EB3jjDo8CjZLuPZ0tqxmY.DXPeltWjhUjqr9daYAG3Pscg4dTWQai',
  `registered_by` tinyint unsigned DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_number` (`phone_number`),
  KEY `registered_by` (`registered_by`),
  KEY `department` (`department`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`registered_by`) REFERENCES `administrator` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Mandeng','Florence Pamela','mandengflorence@gmail.com','female',693840520,'Japoma',3,'$2y$15$ZXZDe3v1WOx6/fnLVrNY3e4fz91.DzMJlsYcyEvL3a/qxRzBVm/hC',2,'2024-02-06 15:49:11',NULL),(2,'Mengue','Elisabeth','mengueelisabeth@gmail.com','female',680528310,'Japoma',2,'$2y$15$/fTYD.8ogwLl54VeK5We7e0hVODvboNaTK7174nCA06EvXH8rMvZe',2,'2024-02-06 15:57:28',NULL),(4,'MAKA','Francine','makafrancine@gmail.com','male',672396948,'Nkende',2,'$2y$15$ck.GMINvGNMU3UEsyHTafOiCgRh5Ed.X7qLZ8Q4h8WxY7WueYa5cG',2,'2024-02-14 17:46:23','2024-03-18 20:28:31'),(5,'MANDENG','Petit','mandengpetit@gmail.com','male',699243842,'Bikoukound',1,'$2y$15$udWPg3CgL5w7TzKnz396sevrBs.NDDz2GZbwJqHXR7lwuYzYZ6Nd.',10,'2024-02-14 18:13:00',NULL),(6,'Nken','Arsene','nkenmandenga4@gmail.com','male',675962178,'Nkende',1,'$2y$15$W6125SmRTRqxke2vFKw5KOMXJt27j7Lvx74eiiGnA0NM.dOaUzkpy',10,'2024-02-14 18:13:47',NULL),(10,'Onana','Afana','onanaafana@gmail.com','male',694234125,'Nyalla',1,'$2y$15$TfX1oW1.cKAmxEtCB8gjW.4XMpIWWECOy7oyxts2TXz9fmaayQHse',1,'2024-03-17 20:27:32','2024-03-17 20:30:57'),(11,'Steve','Derek','stevederek@gmail.com','female',678523112,'Edea',1,'$2y$15$eSvRefCW3/I77Bsxli4aeu27utc2GSvd96HDFuaKF3YHV8ZtQ/RTG',1,'2024-03-18 19:44:50','2024-03-18 20:27:56');
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

-- Dump completed on 2024-03-26 23:31:35
