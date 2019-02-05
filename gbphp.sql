-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: gbphp
-- ------------------------------------------------------
-- Server version	5.5.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `idFeedback` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `feedback` varchar(300) DEFAULT NULL,
  `idgoods` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  UNIQUE KEY `idFeedback_UNIQUE` (`idFeedback`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,1,'Very nice dress with long sleeves, but quite shiny',1,5),(2,1,'Shorts are so so',2,4),(3,2,'Disguasting',1,3),(4,2,'Very very bad',2,4),(6,3,'Not my size',2,4);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `idgoods` int(11) NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(45) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `imgsrc` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgoods`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'Mango Parka','Red','M','150','45','img/catalog-1.jpg','singlepage.html',3),(2,'Mango Jacket','Black','XL','200','74','img/catalog-2.jpg','singlepage.html',5),(3,'Mango Bag','Light grey','NA','300','10','img/catalog-3.jpg','singlepage.html',5),(4,'Mango T-shirt','Grey','S','90','148','img/catalog-4.jpg','singlepage.html',4),(5,'Mango Shorts','White','S','110','84','img/catalog-5.jpg','singlepage.html',5);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_src_min` varchar(45) NOT NULL,
  `img_src_max` varchar(45) NOT NULL,
  `img_name` varchar(45) DEFAULT NULL,
  `img_size` varchar(45) DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `img_src_min_UNIQUE` (`img_src_min`),
  UNIQUE KEY `img_src_max_UNIQUE` (`img_src_max`),
  UNIQUE KEY `id_image_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'images/min/1.jpg','images/max/1.jpg','first','38',1),(2,'images/min/2.jpg','images/max/2.jpg','second','7',4),(3,'images/min/3.jpg','images/max/3.jpg','third','16',3),(4,'images/min/4.jpg','images/max/4.jpg','fourth','6',6);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `avatar_src` varchar(45) DEFAULT NULL,
  `passmd5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'serg','serg23','1','2000-04-01','Serega','img/avatar1.jpg','a7076c4a1e101b4798cd530c3842632a'),(2,'petya','pet','0','1999-05-01','Petr','img/avatar2.jpg','6c43c0a88fbf0f44ba944d00524e45c3'),(3,'galya','gal','0','1998-04-03','Galina','img/avatar3.jpg','d7271b0e449d2ba150b1e9aac7f20776');
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

-- Dump completed on 2019-02-05 16:17:34
