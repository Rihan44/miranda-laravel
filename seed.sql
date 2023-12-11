CREATE DATABASE  IF NOT EXISTS `miranda_laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `miranda_laravel`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: miranda_laravel
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities`
--

LOCK TABLES `amenities` WRITE;
/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;
INSERT INTO `amenities` VALUES (1,'1/3 Bed Space'),(2,'24-Hour Guard'),(3,'Free Wifi'),(4,'Air Conditioner'),(5,'Television'),(6,'Towels'),(7,'Mini Bar'),(8,'Coffee Set'),(9,'Bathtub'),(10,'Jacuzzi'),(11,'Nice Views');
/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amenity_to_room`
--

DROP TABLE IF EXISTS `amenity_to_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenity_to_room` (
  `room_id` int DEFAULT NULL,
  `amenity_id` int DEFAULT NULL,
  KEY `room_id` (`room_id`),
  KEY `amenity_id` (`amenity_id`),
  CONSTRAINT `amenity_to_room_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  CONSTRAINT `amenity_to_room_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenity_to_room`
--

LOCK TABLES `amenity_to_room` WRITE;
/*!40000 ALTER TABLE `amenity_to_room` DISABLE KEYS */;
INSERT INTO `amenity_to_room` VALUES (1,11),(1,7),(1,10),(1,7),(1,1),(2,2),(2,11),(2,5),(2,2),(2,11),(3,6),(3,8),(3,1),(3,4),(3,4),(4,5),(4,7),(4,10),(4,6),(4,5),(5,2),(5,1),(5,2),(5,4),(5,9),(6,7),(6,7),(6,3),(6,3),(6,1),(7,11),(7,5),(7,8),(7,2),(7,9),(8,7),(8,3),(8,2),(8,10),(8,10),(9,9),(9,9),(9,4),(9,2),(9,9),(10,10),(10,2),(10,5),(10,2),(10,6),(5,2),(2,5),(9,2),(3,1),(9,7),(7,8),(9,7),(6,8),(6,4),(8,2);
/*!40000 ALTER TABLE `amenity_to_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `guest` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `special_request` text,
  `price` double DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,'Dr. Morris Graham','501-866-681','2024-06-11 22:00:00','2023-11-26','2024-09-22','tunc sollicito cornu autus clibanus artificiose volaticus temeritas vester degenero censura tantillus aufero',529,NULL,1),(2,'Joseph Schaefer','501-886-458','2023-10-23 22:00:00','2023-11-27','2024-01-26','summa conqueror vinculum exercitationem adsuesco voluntarius talus urbanus ulciscor illo vulticulus asporto volup atque admoneo deorsum sustineo',594,NULL,2),(3,'Lula Yundt','501-150-214','2024-05-27 22:00:00','2023-11-27','2023-12-25','facilis cupiditas auctus spero carbo molestias desparatus deserunt terreo',1623,NULL,3),(4,'Shannon Vandervort','501-532-985','2023-04-14 22:00:00','2023-11-26','2024-08-16','carbo abstergo adopto triumphus viriliter comburo appono',2346,NULL,4),(5,'Miguel Raynor','501-874-130','2024-01-21 23:00:00','2023-11-26','2024-07-13','libero iure sol testimonium cupressus creta accusamus territo basium comes barba cupiditas amita necessitatibus adiuvo xiphias video',1722,NULL,5),(6,'Inez Pagac','501-072-111','2024-10-03 22:00:00','2023-11-27','2023-12-31','cubicularis utroque appositus angustus decet audeo caelestis crebro coniecto totus molestias',1216,NULL,6),(7,'Jacob Gottlieb','501-422-266','2024-11-07 23:00:00','2023-11-27','2024-02-27','consequuntur minus tabesco tenax adversus admoveo uter recusandae derelinquo tot adinventitias suus',577,NULL,7),(8,'Hazel Lockman','501-758-626','2023-01-28 23:00:00','2023-11-27','2024-11-06','soluta temperantia ipsam tabgo subseco',2704,NULL,8),(9,'Bobbie Lubowitz-Zieme','501-618-776','2023-05-24 22:00:00','2023-11-26','2024-08-10','suscipio denego repudiandae ancilla audacia eius tui',2700,NULL,9),(10,'Cory Beier','501-152-617','2023-06-19 22:00:00','2023-11-26','2024-05-24','temptatio harum creator corrupti theatrum sub alveus dolore torqueo aedificium cena abeo auctor theca culpa surgo curvo vesica sollers dolores',883,NULL,10),(11,'Angel','610730918','2023-11-26 23:00:00','2023-11-27','2023-11-30','Ey que tal',705,'wdwd@gmail.com',3),(12,'Angel','610730918','2023-11-26 23:00:00','2023-11-27','2023-11-30','Ey que tal',705,'wdwd@gmail.com',3),(13,'Samuel','609875123','2023-11-26 23:00:00','2023-11-30','2023-12-07','samuel booked',705,'samuel@gmail.com',3),(14,'Samuel','609875123','2023-11-26 23:00:00','2023-11-30','2023-12-07','samuel booked',705,'samuel@gmail.com',3),(15,'Samuel','609875123','2023-11-26 23:00:00','2023-11-30','2023-12-07','samuel booked',705,'samuel@gmail.com',3),(16,'Samuel','609875123','2023-11-26 23:00:00','2023-11-30','2023-12-07','samuel booked',705,'samuel@gmail.com',3),(18,'booking 1','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-30',NULL,1890,'dwdw@gmail.com',4),(20,'dwdwwd','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-29',NULL,1222,'wdwd@gmail.com',5),(21,'dwdwwd','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-29',NULL,1222,'wdwd@gmail.com',5),(22,'dwdwwd','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-29',NULL,1222,'wdwd@gmail.com',5),(23,'dwdwwd','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-29',NULL,1222,'wdwd@gmail.com',5),(24,'Booked 1','610730918','2023-12-07 00:00:00','2023-12-07','2023-12-29',NULL,1222,'angel@angel.com',5),(25,'Angel','555333444','2023-12-07 00:00:00','2023-12-07','2023-12-29','dwdwwdwddw',1222,'dwdw@gmail.com',5),(26,'laravel','610730918','2023-12-07 00:00:00','2023-12-07','2023-12-29','dwwdwd',1222,'wdwd@gmail.com',5),(27,'dwdwwd','610730918','2023-12-07 00:00:00','2023-12-07','2023-12-29','Ey que tal',1222,'dwdw@gmail.com',5),(28,'prueba','609875123','2023-12-07 00:00:00','2023-12-07','2023-12-29','dwwdwd',1222,'dwdw@gmail.com',5),(29,'prueba','609875123','2023-12-07 00:00:00','2023-12-07','2023-12-29','dwwdwd',1222,'dwdw@gmail.com',5),(30,'prueba','609875123','2023-12-07 00:00:00','2023-12-07','2023-12-29','dwwdwd',1222,'dwdw@gmail.com',5),(31,'dwdwwd','610730918','2023-12-07 00:00:00','2023-12-07','2023-12-29','dfwdwdwwd',705,'dwdw@gmail.com',3),(32,'dwdwwd','610730918','2023-12-07 00:00:00','2023-12-07','2023-12-29','dfwdwdwwd',705,'dwdw@gmail.com',3),(33,'pruebita jaja','610730918','2023-12-07 19:30:06','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'angel@angel.com',3),(34,'pruebasa loool','609875123','2023-12-07 19:32:51','2023-12-07','2023-12-29','vvbtgbg',705,'dwdw@gmail.com',3),(35,'dwdwwd','609875123','2023-12-07 19:34:16','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'ddwwd@gmail.com',3),(36,'dwdwwd','609875123','2023-12-07 19:34:36','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'ddwwd@gmail.com',3),(37,'dwdwwd','609875123','2023-12-07 19:34:46','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'ddwwd@gmail.com',3),(38,'prueba','609875123','2023-12-07 19:35:37','2023-12-07','2023-12-29','Ey que tal',705,'angel@angel.com',3),(39,'prueba','609875123','2023-12-07 19:39:14','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'ddwwd@gmail.com',3),(40,'prueba','609875123','2023-12-07 19:39:26','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'ddwwd@gmail.com',3),(41,'dwdwwd','610730918','2023-12-07 19:39:56','2023-12-07','2023-12-29','Ey que tal',705,'dwdw@gmail.com',3),(42,'Angel','610730918','2023-12-07 19:40:50','2023-12-07','2023-12-29','Ey que tal',705,'angel@angel.com',3),(43,'swdwdw','610730918','2023-12-07 19:42:15','2023-12-07','2023-12-29','dwdwdwwqd3r3v',705,'angel@angel.com',3),(44,'dwdwwd','610730918','2023-12-07 19:43:25','2023-12-07','2023-12-29','Ey que tal',705,'angel@angel.com',3),(45,'dwdwwd','610730918','2023-12-07 19:45:38','2023-12-07','2023-12-29','Ey que tal',705,'angel@angel.com',3),(46,'prueba dinero','610730918','2023-12-10 20:25:52','2023-12-10','2023-12-29','prueba dinero e id',1890,'dwdw@gmail.com',4),(47,'prueba dinero','610730918','2023-12-10 20:26:47','2023-12-10','2023-12-28','prueba dinero e id',1890,'dwdw@gmail.com',4),(48,'prueba dinero','610730918','2023-12-10 20:28:17','2023-12-10','2023-12-28','prueba dinero e id',1890,'dwdw@gmail.com',4),(49,'prueba dinero','610730918','2023-12-10 20:28:42','2023-12-10','2023-12-28','prueba dinero e id',1890,'dwdw@gmail.com',4),(50,'prueba dinero','610730918','2023-12-10 20:30:30','2023-12-10','2023-12-28','prueba dinero e id',1890,'dwdw@gmail.com',4);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `email_description` longtext,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_archived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Armando Kuvalis-Sauer','Duane67@hotmail.com','609.209.8074 x1814','pepper','turbo conservo calamitas adeptio clarus ipsum commodo basium abscido solum depraedor debitis sit communis dens','2023-11-25 23:00:00','2023-10-09 14:25:55',1),(2,'Lorraine McKenzie','Blake3@hotmail.com','837.533.3732 x98936','entitle','civis coniuratio creo abbas ars amoveo provident enim spargo benigne supplanto cornu demo ciminatio','2023-11-26 23:00:00','2023-01-29 13:28:10',0),(3,'Marcos Schinner','Osvaldo17@yahoo.com','(574) 573-2425','upset','cernuus amo viscus autus sequi cedo vaco adamo suus demo amoveo amplus agnosco veniam','2023-11-25 23:00:00','2024-03-15 10:49:18',1),(4,'Virginia McGlynn Sr.','Hermann86@hotmail.com','(735) 370-8204 x34077','warn','pariatur celebrer barba ager impedit succurro alius sortitus ambulo alias sollers curvo sonitus','2023-11-25 23:00:00','2023-05-24 21:43:29',1),(5,'Rhonda Pacocha','Lucas72@gmail.com','692.906.5602 x87039','sicken','altus vitiosus bonus vestrum deputo aut accusantium adeo quisquam adipisci auditor','2023-11-26 23:00:00','2023-12-11 04:00:47',0),(6,'Virginia Cole','Vince_Franecki64@gmail.com','1-493-581-8052 x51628','geld','eaque corrumpo eos subvenio inventore sed alioqui caelestis subvenio canto colo capio error','2023-11-25 23:00:00','2024-03-17 22:26:34',1),(7,'Theresa Watsica','Rosie65@gmail.com','(526) 822-6750 x678','creosote','illum cernuus terra quae contigo molestiae aspernatur veniam aspicio ager solium autus paens amor repudiandae','2023-11-26 23:00:00','2023-01-05 00:45:08',1),(8,'Jeffrey Kilback III','Dean25@yahoo.com','582.718.7667 x84224','conceal','cupiditate curiositas umerus debeo inventore ad asperiores conculco vereor calco creta nisi pauci absum speculum','2023-11-26 23:00:00','2023-03-22 09:14:31',0),(9,'Darrel Rempel','Trycia.Heller@gmail.com','1-204-600-0682 x25927','harbour','demo alter curatio verto usus vacuus curo catena doloribus adhuc defluo dedecor tergeo quam odio','2023-11-25 23:00:00','2023-07-03 17:57:56',0),(10,'Raul Padberg','Willard48@hotmail.com','(397) 591-0195 x0033','streamline','delego alioqui aut angustus id decumbo autem peccatus curia verbera tremo conatus vigor clibanus','2023-11-25 23:00:00','2023-05-09 22:27:53',1),(11,'prueba','610730918','angel@angel.com','prueba email','prueba mensaje','2023-11-26 23:00:00','2023-11-27 10:06:27',0),(12,'contacto miguel','952456789','miguel@miguel.com','miguelito','ey que taql','2023-11-26 23:00:00','2023-11-27 11:12:10',0),(13,'contacto miguel','miguel@miguel.com','952456789','miguelito','ey que taql','2023-11-26 23:00:00','2023-11-27 11:15:50',0),(14,'David','davidv@gmial.com','456789123','caca','tengo mucha caca','2023-11-26 23:00:00','2023-11-27 11:17:10',0),(15,'prueba','dwdw@gmail.com','610730918','prueba','Prueba angel','2023-11-29 23:00:00','2023-11-30 11:42:38',0),(16,'Prueba','prueba@prueba.com','610730918','fefe','efefef','2023-11-29 23:00:00','2023-11-30 11:43:05',0),(17,'laravel','dwdw@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 15:26:22',1),(18,'laravel','dwdw@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 15:27:02',1),(19,'laravel','dwdw@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 15:27:24',1),(20,'laravel','dwdw@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 15:32:59',1),(21,'laravel','ddwwd@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 17:00:43',1),(22,'laravel','dwdw@gmail.com',NULL,NULL,NULL,'2023-12-06 00:00:00','2023-12-06 17:03:54',1),(23,'laravel','angel@angel.com','608705632','wdprueba email','dwwdwd','2023-12-06 17:06:43','2023-12-06 17:06:43',1),(24,'laravel','dwdw@gmail.com','610730918','prueba email','dwwwdwd','2023-12-07 00:00:00','2023-12-07 10:29:44',1),(25,'Prueba laravel 520','asmuela.dev@gmail.com','609874123','prueba email','Esto es la prueba de laravel con mysql sin detener','2023-12-07 00:00:00','2023-12-07 10:51:23',1),(26,'Prueba was recentrly','emaill@email.com','609874123','prueba recently','K tal jaja esto es una prueba lol','2023-12-07 00:00:00','2023-12-07 15:33:49',0);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_photos`
--

DROP TABLE IF EXISTS `room_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_id` int DEFAULT NULL,
  `room_photo_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `room_photos_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_photos`
--

LOCK TABLES `room_photos` WRITE;
/*!40000 ALTER TABLE `room_photos` DISABLE KEYS */;
INSERT INTO `room_photos` VALUES (1,10,'https://tinyurl.com/RoomPhoto1'),(6,4,'https://tinyurl.com/TheRoomPhoto3'),(7,7,'https://tinyurl.com/RoomPhoto1'),(10,8,'https://tinyurl.com/RoomPhoto1'),(21,9,'https://tinyurl.com/TheRoomPhoto3'),(27,1,'https://tinyurl.com/TheRoomPhoto3'),(30,3,'https://tinyurl.com/TheRoomPhoto3'),(31,2,'https://tinyurl.com/TheRoomPhoto3'),(32,5,'https://tinyurl.com/TheRoomPhoto3'),(34,6,'https://tinyurl.com/RoomPhoto1');
/*!40000 ALTER TABLE `room_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `offer_price` tinyint(1) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'Double','13',1159,0,98,'available','molestias vulgus laboriosam cunctatio attollo angelus amiculum ducimus reiciendis iure abscido nostrum laborum triduana'),(2,'Imperial','501',1069,0,89,'available','ventus contra delectatio validus eaque cinis optio tenus crux ante tactus'),(3,'Deluxe','338',705,0,45,'available','arma fuga nemo sponte titulus eius conturbo admoneo quae crinis'),(4,'Suite','230',1890,0,57,'available','constans nemo volo peccatus antepono quas canonicus volo cogo tepesco tricesimus verbum vulgaris congregatio'),(5,'Deluxe','489',1222,0,65,'available','claudeo canto sub xiphias sopor spero ascit recusandae voluptas adnuo atqui aqua denuo ascisco'),(6,'Single','325',416,0,16,'available','textor valeo vinum apud ambulo tergeo vomica trepide audacia carus casso adulatio'),(7,'Imperial','157',1416,1,76,'available','tardus acquiro curatio arbitro adsuesco aliquid tumultus depereo ventosus contigo'),(8,'Imperial','387',670,1,24,'available','usque caput abutor territo coniuratio cogo colligo thymbra sponte antiquus aperte'),(9,'Suite','303',522,0,46,'available','conicio territo adopto celo cur sopor celer dolores veniam complectus utpote'),(10,'Suite','91',2019,1,63,'available','damno aeneus tertius stabilis turbo color cupio soleo deripio atrox bos solum saepe vicinus velociter');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `employee_position` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `job_description` longtext,
  `status` tinyint(1) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Cecelia Tromp','Gregorio92@hotmail.com','https://picsum.photos/seed/y9rXTGWUi/640/480','Creative','495.786.4920 x725','2023-11-27','Forward',1,'508c2f1e7553bd5c08cb82a4e9dbf62cf00fbf0f3e1a97aa54c8d8a0fc96e37212d746e8619b8ac31e21f1d7dc2b2b22d08cc1c11f6b1cffd76176355ffaa22d'),(2,'Leigh Johnston','Therese29@gmail.com','https://loremflickr.com/640/480?lock=2081325727088640','Implementation','987.508.3672 x476','2023-11-26','International',1,'6d3325db911f85714ff9efb78d4a818c531350f4bfcf01b4a5a3f4d14490aa7479d090bededd0a86224d606738d583b77173433642706c8b376acdaa9999484d'),(3,'Mabel Feeney','Tiffany.Donnelly@hotmail.com','https://picsum.photos/seed/7qZ3e/640/480','Identity','(406) 866-6584 x42204','2023-11-27','Dynamic',0,'9b3ed486c74da3da515fa6bbf6f5fc11fa34a99f5ca582d381c53795174f68d7bad34b2a51f25bec9ed112d85f2f9416b25a1656d97263b0565184b812a79fc2'),(4,'Kelley Koepp','Melyssa.Borer@yahoo.com','https://picsum.photos/seed/KOhsQ/640/480','Identity','(502) 209-4701 x7100','2023-11-27','Dynamic',0,'a0deabd8837f2f46565245b8c2bede70f7362d726b6ff0603fbe9bc707342a1dbac0921fd0433ea34908b4a7981fe5647d4ffe9f7574ec296806e4a4a7e49e66'),(5,'Archie Nienow','Barrett_Price13@gmail.com','https://picsum.photos/seed/KmGYm3/640/480','Paradigm','877-910-2441 x8039','2023-11-27','Investor',0,'19f19d4beb4f9bd2644c07692909f7cd0d0ba292346c30fb182e75ade535769a54b4e4a81e105debd8c8016af82fab2e78596ac64c9161d85ac1fcc1e86cb074'),(6,'Brenda Langworth','Bertha_Padberg37@hotmail.com','https://picsum.photos/seed/gItosl/640/480','Response','946-367-3287 x93608','2023-11-27','Forward',0,'869dfdff494da5f08478544b7658c92d9ea6b4c1945ea16abb949c24a6ff690ebddb7a9f733efbf36a477c5b9c2089ec324b64db6fbd5eefb8043deb744c35aa'),(7,'Dianna Stanton','Dagmar_Nikolaus@yahoo.com','https://picsum.photos/seed/hD4KCxf5x/640/480','Infrastructure','1-747-369-0875 x320','2023-11-26','Principal',0,'fc8bf25fdb916c18b6eee511bc9d8465da0c783d82541f407bab509f8ee6b9ad927e39c1d520db8643e16a27cea03c939728bea5013468bd4ee935837fd70e06'),(8,'Dr. Javier Zieme IV','Delbert.Pfeffer11@yahoo.com','https://picsum.photos/seed/GtD8Cw/640/480','Brand','969.934.5913 x8173','2023-11-26','Senior',0,'a752a4f3001af94e84efaf584c6bd08e769cc27bad11eb93abfc2153847d962142ff400430987886f5dffa64399c0454e7c087b1fbb1823e52e57809d7c82c0e'),(9,'Marshall Connelly','Zoe82@yahoo.com','https://picsum.photos/seed/XcufW/640/480','Infrastructure','1-996-879-5519 x3603','2023-11-27','Investor',1,'2d88f9461dc710a9626fa25d796326c83194281844966efe6b51c58b30badd13920c3ef35e31005222778753aea6a713bff5a873dcd807e3135f0b006c125215'),(10,'Lewis Hodkiewicz','Adrien26@yahoo.com','https://loremflickr.com/640/480?lock=4231795721633792','Configuration','1-452-881-6809 x51792','2023-11-26','Direct',0,'13fe79b9b9cc5a8767dad1a8feb39b7e17699ff543d1ed40f045221963cf024b549aff240241d3ad38b358545f0198f77cfbbe2e5321e504d5aa6d0e483b9831');
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

-- Dump completed on 2023-12-11 11:30:36
