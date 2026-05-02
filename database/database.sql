-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ticket
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agences`
--

DROP TABLE IF EXISTS `agences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_agence` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agences`
--

LOCK TABLES `agences` WRITE;
/*!40000 ALTER TABLE `agences` DISABLE KEYS */;
INSERT INTO `agences` VALUES (1,'AutoMoto Brive',19100),(2,'AutoMoto Limoges',87000);
/*!40000 ALTER TABLE `agences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignation`
--

DROP TABLE IF EXISTS `assignation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignation` (
  `iduser` int(11) DEFAULT NULL,
  `idtickets` int(11) DEFAULT NULL,
  KEY `iduser` (`iduser`),
  KEY `idtickets` (`idtickets`),
  CONSTRAINT `assignation_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  CONSTRAINT `assignation_ibfk_2` FOREIGN KEY (`idtickets`) REFERENCES `tickets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignation`
--

LOCK TABLES `assignation` WRITE;
/*!40000 ALTER TABLE `assignation` DISABLE KEYS */;
INSERT INTO `assignation` VALUES (6,15),(7,17);
/*!40000 ALTER TABLE `assignation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Matériel informatique','Problème avec un ordinateur, écran, imprimante...'),(2,'Logiciel / Application','Bug ou demande d\'installation d\'un logiciel métier.'),(3,'Réseau / Connexion','Problème Internet, réseau local, Wi-Fi ou VPN.'),(4,'Téléphonie','Téléphone fixe, mobile ou messagerie vocale.'),(5,'Accès / Droits','Création de compte, mot de passe ou droits d\'accès.'),(6,'Autre','Toute autre demande ne correspondant pas aux catégories.');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profils`
--

DROP TABLE IF EXISTS `profils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomprofil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profils`
--

LOCK TABLES `profils` WRITE;
/*!40000 ALTER TABLE `profils` DISABLE KEYS */;
INSERT INTO `profils` VALUES (1,'administrateur'),(2,'technicien'),(3,'utilisateur');
/*!40000 ALTER TABLE `profils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (1,'Nouveau'),(2,'En cours'),(3,'Clos'),(4,'Cloturé');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idstatut` int(11) DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`),
  KEY `idstatut` (`idstatut`),
  KEY `idcategorie` (`idcategorie`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`idstatut`) REFERENCES `statut` (`id`),
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`idcategorie`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (15,'test brive','ahah beh',3,2,6),(16,'test Limoges','ahah',4,2,3),(17,'test 2','hahahahahaha',4,2,2);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profil_id` int(11) DEFAULT NULL,
  `agence_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_id` (`profil_id`),
  KEY `users_ibfk_2` (`agence_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'COUBERES','$2b$12$oExzQld4Iiihma26fzggKOf2gSD7vkoex9siEaYZrpX1w6lg199I2',1,NULL),(2,'KOUJI','$2y$10$w6a.EPzbTgoCoaA06x1eOOMqDsZZMiu03OklrVYYVzQMoLqK57bT2',2,1),(3,'LEVY','$2y$10$Qiie4ubcxUv8K.8ZolUWfeAW0epk1E7xaU8Gf2HkU7i44k8ncslKK',3,1),(4,'LOEB','$2y$10$pN37ijnrF0Dhse/kpMmYnuH1xdjBkgt.ZKci33v8BKXBJJJW4LkWq',3,2),(5,'DUPONT','$2y$10$zrCa6Cj3x2j1gezMi/4.Q.jlktxN334fMxrGqHuQ6H5Rk.ucGXym2',2,2),(6,'CLAUDE','$2y$10$K2iOflFUJBt6sPbmoQW/aOT7klq0eJtkWbJvm/E05f55tYZUuwbD6',2,1),(7,'ZEN','$2y$10$.xyyk5KVHO6thSmKv7QdS.hvBOb8EQkcKpC38F.jLDbhozerk5RL.',2,2),(8,'GRANDJEAN','$2y$10$iusq5asbGNECcGv6LgkIle1/svBxm5JjZ71.rvrq18okyuSX9hAJm',1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-03  1:53:01
