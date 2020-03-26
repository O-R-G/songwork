-- MySQL dump 10.13  Distrib 5.7.19, for osx10.13 (x86_64)
--
-- Host: localhost    Database: songwork_local
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `object` int(10) unsigned DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'jpg',
  `caption` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,0,'2019-09-24 18:18:16','2019-09-24 18:18:16',3,NULL,NULL,'gif',''),(2,1,'2019-09-24 18:26:33','2019-09-24 18:30:28',5,NULL,1,'png',''),(3,1,'2019-09-24 18:31:47','2019-09-24 18:31:47',6,NULL,NULL,'png',''),(4,1,'2019-09-24 18:33:00','2019-09-24 18:36:47',7,NULL,1,'jpg',''),(5,0,'2019-09-24 18:45:05','2019-09-24 18:45:05',8,NULL,NULL,'jpg',''),(6,1,'2019-09-24 18:45:37','2019-09-24 18:45:37',8,NULL,NULL,'jpg',''),(7,1,'2019-09-24 18:46:22','2019-09-24 18:46:22',9,NULL,NULL,'png',''),(8,1,'2019-09-24 18:47:28','2019-09-24 18:47:28',10,NULL,NULL,'jpg',''),(9,1,'2019-09-24 19:50:40','2019-09-24 20:18:06',11,NULL,1,'mp3',''),(10,0,'2020-01-23 16:34:48','2020-01-23 16:34:48',12,NULL,NULL,'mp4',''),(11,1,'2020-01-23 16:35:15','2020-01-23 16:36:09',13,NULL,1,'mp4',''),(12,0,'2020-01-23 17:58:34','2020-01-23 17:59:28',14,NULL,1,'mp4',''),(13,1,'2020-01-23 17:59:28','2020-01-23 18:44:28',14,NULL,1,'mp4',''),(14,1,'2020-01-23 17:59:51','2020-01-23 18:44:40',15,NULL,1,'mp4',''),(15,1,'2020-01-23 18:00:18','2020-01-23 18:44:52',16,NULL,1,'mp4',''),(16,1,'2020-01-23 18:00:35','2020-01-23 18:44:18',17,NULL,1,'mp4',''),(17,1,'2020-01-23 18:00:50','2020-01-23 18:44:08',18,NULL,1,'mp4',''),(18,1,'2020-01-23 18:01:09','2020-01-23 18:43:55',19,NULL,1,'mp4','');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `rank` int(10) unsigned DEFAULT NULL,
  `name1` tinytext,
  `name2` tinytext,
  `address1` text,
  `address2` text,
  `city` tinytext,
  `state` tinytext,
  `zip` tinytext,
  `country` tinytext,
  `phone` tinytext,
  `fax` tinytext,
  `url` tinytext,
  `email` tinytext,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `head` tinytext,
  `deck` mediumblob,
  `body` mediumblob,
  `notes` mediumblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2019-09-24 18:17:31','2019-09-24 18:17:31',NULL,'Images',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'images',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,'2019-09-24 18:17:41','2019-09-24 19:50:18',NULL,'Music',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'music',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,0,'2019-09-24 18:18:16','2019-09-24 18:26:18',NULL,'untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,0,'2019-09-24 18:23:13','2019-09-24 20:17:57',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'first',NULL,NULL,NULL,NULL,NULL,NULL,'<audio controls=\"\">\r\n  <source src=\"/static/mp3/hushedness.mp3\" type=\"audio/mpeg\">\r\n  Your browser does not support the audio element.\r\n</audio>',NULL),(5,0,'2019-09-24 18:26:33','2019-09-24 18:51:14',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness',NULL,NULL,NULL,NULL,NULL,'<br>','<br>',NULL),(6,0,'2019-09-24 18:31:47','2020-01-23 17:30:51',NULL,'Hushedness 16-bit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness-16-bit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,0,'2019-09-24 18:33:00','2019-09-24 18:47:43',NULL,'Spectrogram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ok',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,0,'2019-09-24 18:45:05','2020-01-23 17:30:36',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,0,'2019-09-24 18:46:22','2020-01-23 17:30:55',NULL,'Placeholder',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'placeholder',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,0,'2019-09-24 18:47:28','2020-01-23 17:30:43',NULL,'1-grey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1-grey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,'2019-09-24 19:50:40','2019-09-24 20:18:06',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,0,'2020-01-23 16:34:48','2020-01-23 16:35:48',NULL,'mov',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mov',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,'2020-01-23 16:35:15','2020-01-23 18:45:03',NULL,'Pressure washer on silk screen - DCA Print Studio, Dundee, 5 Apr 2017 - recorded by Sio n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pressure',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,1,'2020-01-23 17:58:34','2020-01-23 18:44:28',NULL,'Print machine switched on & off (piston release and conveyor belt) - DCA Print Studio, Dundee, 5 Apr 2017 - recorded by Sio n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'print-machine-switched-on-off-piston-release-and-conveyor-belt-dca-print-studio-dundee-5-apr-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,'2020-01-23 17:59:51','2020-01-23 18:44:40',NULL,'Steel drying rack trays being lowered via spring tension arms - DCA Print Studio, Dundee, 5 Apr 2017 - recorded by Sio n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'steel-drying-rack-trays-being-lowered-via-spring-tension-arms-dca-print-studio-dundee-5-apr-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,1,'2020-01-23 18:00:18','2020-01-23 18:44:52',NULL,'Hydraulic release press on flat bed table (up and down)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hydraulic-release-press-on-flat-bed-table-up-and-down',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,1,'2020-01-23 18:00:35','2020-01-23 18:44:18',NULL,'Factory Floor 1 - Michelin Tyre Factory, Dundee, 5 Apr 2017 - recorded by Andy Truscott on Tascam DR-44WL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'factory-floor-1-michelin-tyre-factory-dundee-5-apr-2017-recorded-by-andy-truscott-on-tascam-dr-44wl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,1,'2020-01-23 18:00:50','2020-01-23 18:44:08',NULL,'Cop and spool winding machine - Verdant Works, Dundee, 28 Mar 2017 - recorded by Sio n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cop-and-spool-winding-machine-verdant-works-dundee-28-mar-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,1,'2020-01-23 18:01:09','2020-01-23 18:43:55',NULL,'Batching and softening machine - Verdant Works, Dundee, 28 Mar 2017 - recorded by Sio n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'batching-and-softening-machine-verdant-works-dundee-28-mar-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wires`
--

DROP TABLE IF EXISTS `wires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fromid` int(10) unsigned DEFAULT NULL,
  `toid` int(10) unsigned DEFAULT NULL,
  `weight` float NOT NULL DEFAULT '1',
  `notes` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2019-09-24 18:17:31','2019-09-24 18:17:31',0,1,1,NULL),(2,1,'2019-09-24 18:17:41','2019-09-24 18:17:41',0,2,1,NULL),(3,0,'2019-09-24 18:18:16','2019-09-24 18:26:18',1,3,1,NULL),(4,0,'2019-09-24 18:23:13','2019-09-24 20:17:57',2,4,1,NULL),(5,0,'2019-09-24 18:26:33','2019-09-24 18:51:14',1,5,1,NULL),(6,1,'2019-09-24 18:31:47','2019-09-24 18:31:47',5,6,1,NULL),(7,0,'2019-09-24 18:33:00','2019-09-24 18:47:43',1,7,1,NULL),(8,0,'2019-09-24 18:45:05','2020-01-23 17:30:36',1,8,1,NULL),(9,0,'2019-09-24 18:46:22','2020-01-23 17:30:55',1,9,1,NULL),(10,0,'2019-09-24 18:47:28','2020-01-23 17:30:43',1,10,1,NULL),(11,0,'2019-09-24 18:51:09','2020-01-23 17:30:51',1,6,1,NULL),(12,1,'2019-09-24 19:50:40','2019-09-24 19:50:40',2,11,1,NULL),(13,0,'2020-01-23 16:34:48','2020-01-23 16:35:48',1,12,1,NULL),(14,1,'2020-01-23 16:35:15','2020-01-23 16:35:15',1,13,1,NULL),(15,1,'2020-01-23 17:58:34','2020-01-23 17:58:34',1,14,1,NULL),(16,1,'2020-01-23 17:59:51','2020-01-23 17:59:51',1,15,1,NULL),(17,1,'2020-01-23 18:00:18','2020-01-23 18:00:18',1,16,1,NULL),(18,1,'2020-01-23 18:00:35','2020-01-23 18:00:35',1,17,1,NULL),(19,1,'2020-01-23 18:00:50','2020-01-23 18:00:50',1,18,1,NULL),(20,1,'2020-01-23 18:01:09','2020-01-23 18:01:09',1,19,1,NULL);
/*!40000 ALTER TABLE `wires` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-26 11:37:24
