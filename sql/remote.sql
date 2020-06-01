-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: songwork
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2019-09-24 18:17:31','2019-09-24 18:17:31',NULL,'Images',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'images',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,'2019-09-24 18:17:41','2019-09-24 19:50:18',NULL,'Music',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'music',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,0,'2019-09-24 18:18:16','2019-09-24 18:26:18',NULL,'untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,0,'2019-09-24 18:23:13','2019-09-24 20:17:57',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'first',NULL,NULL,NULL,NULL,NULL,NULL,_binary '<audio controls=\"\">\r\n  <source src=\"/static/mp3/hushedness.mp3\" type=\"audio/mpeg\">\r\n  Your browser does not support the audio element.\r\n</audio>',NULL),(5,0,'2019-09-24 18:26:33','2019-09-24 18:51:14',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness',NULL,NULL,NULL,NULL,NULL,_binary '<br>',_binary '<br>',NULL),(6,0,'2019-09-24 18:31:47','2020-01-23 17:30:51',NULL,'Hushedness 16-bit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness-16-bit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,0,'2019-09-24 18:33:00','2019-09-24 18:47:43',NULL,'Spectrogram',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ok',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,0,'2019-09-24 18:45:05','2020-01-23 17:30:36',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,0,'2019-09-24 18:46:22','2020-01-23 17:30:55',NULL,'Placeholder',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'placeholder',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,0,'2019-09-24 18:47:28','2020-01-23 17:30:43',NULL,'1-grey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1-grey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,'2019-09-24 19:50:40','2019-09-24 20:18:06',NULL,'Hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hushedness',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,0,'2020-01-23 16:34:48','2020-01-23 16:35:48',NULL,'mov',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mov',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,'2020-01-23 16:35:15','2020-02-11 10:36:15',NULL,'Pressure washer on silk screen â€“ DCA Print Studio, Dundee, 5 Apr 2017 â€“ recorded by SiÃ´n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pressure',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,1,'2020-01-23 17:58:34','2020-02-11 10:36:33',NULL,'Print machine switched on & off (piston release and conveyor belt) â€“ DCA Print Studio, Dundee, 5 Apr 2017 â€“ recorded by SiÃ´n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'print-machine-switched-on-off-piston-release-and-conveyor-belt-dca-print-studio-dundee-5-apr-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,'2020-01-23 17:59:51','2020-02-11 10:36:48',NULL,'Steel drying rack trays being lowered via spring tension arms â€“ DCA Print Studio, Dundee, 5 Apr 2017 â€“ recorded by SiÃ´n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'steel-drying-rack-trays-being-lowered-via-spring-tension-arms-dca-print-studio-dundee-5-apr-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,1,'2020-01-23 18:00:18','2020-01-23 18:44:52',NULL,'Hydraulic release press on flat bed table (up and down)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hydraulic-release-press-on-flat-bed-table-up-and-down',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,1,'2020-01-23 18:00:35','2020-02-11 10:35:50',NULL,'Factory Floor 1 â€“ Michelin Tyre Factory, Dundee, 5 Apr 2017 â€“ recorded by Andy Truscott on Tascam DR-44WL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'factory-floor-1-michelin-tyre-factory-dundee-5-apr-2017-recorded-by-andy-truscott-on-tascam-dr-44wl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,1,'2020-01-23 18:00:50','2020-02-11 10:35:36',NULL,'Cop and spool winding machine â€“ Verdant Works, Dundee, 28 Mar 2017 â€“ recorded by SiÃ´n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cop-and-spool-winding-machine-verdant-works-dundee-28-mar-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,1,'2020-01-23 18:01:09','2020-02-11 10:35:19',NULL,'Batching and softening machine â€“ Verdant Works, Dundee, 28 Mar 2017 â€“ recorded by SiÃ´n Parkinson on Sony PCM-D100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'batching-and-softening-machine-verdant-works-dundee-28-mar-2017-recorded-by-sio-n-parkinson-on-sony-pcm-d100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,1,'2020-05-28 18:10:49','2020-05-28 18:20:32',NULL,'submit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'submit',NULL,NULL,NULL,NULL,NULL,_binary '<div>\r\n		SONG WORK is an online audio library of workplace noise. The library serves as a resource to (1) inspire the creation of new ‘work songs’ for the 21st century; and (2) to conserve the sound heritage of work environments in Scotland. The kinds of sounds we hope to capture include machinery, computer or robotic noises, sounds of hand-making processes in the workshop or studio, and background or ‘ambient’ noise. All sounds are Creative-Commons-licensed for musicians, artists and sound designers to download and use for free.\r\n		</div>\r\n		<br>\r\n		<div class=\"section-title text-center\">SUBMISSION</div>\r\n		<br>\r\n		<div>\r\n		Attached to each recording will be a set of data describing where and when the sound was captured, the name and nature of your business, and a short description of the focus of the recording. When submitting a new recording for consideration, please provide the following information, to be displayed on the online archive, formatted according to the example in grey.\r\n		</div>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">A.</div>\r\n			<div class=\"item-content\">TITLE<br>Description of machine’s function, including brand name</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">B.</div>\r\n			<div class=\"item-content\">LOCATION<br>Factory/building/company name, town/city</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">C.</div>\r\n			<div class=\"item-content\">DATE RECORDED (Day.Month.Year)</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">D.</div>\r\n			<div class=\"item-content\">NAME OF SOUND RECORDIST</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">E.</div>\r\n			<div class=\"item-content\">DURATION</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">F.</div>\r\n			<div class=\"item-content\">APPARATUS<br>Make and model of audio recording device/microphone</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">G.</div>\r\n			<div class=\"item-content\">FILE FORMAT(S)<br>Ideally MP3 and WAV (AIFF or FLAC also possible)</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div class=\"list-item\">\r\n			<div class=\"item-order\">H.</div>\r\n			<div class=\"item-content\">FILE SIZE</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br>\r\n		<br>\r\n		<div>An automated graphic translation of each sound file will be usedto identify each entry in the online archive interface:</div>',_binary '<div class=\"list-item\">\r\n			<div class=\"item-order\">I.</div>\r\n			<div class=\"item-content\">ADDITIONAL NOTES<br>e.g. age of machine, position of microphone/s, additional sounds, mono/stereo</div>\r\n		</div>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div class=\"text-center\">CONSENT</div>\r\n		<br><br>\r\n		<div>The information submitted in this part ensure that the recording is added to the collection in strict accordance with the wishes of the workplace. Recordings will be uploaded to the SONG WORK library and may be used in electronic media for creative, education and research purposes. Some sounds will be shared with our partners for permanent preservation in the National Library of Scotland or British Library Sound Archive as a record of workplace noise and may be used for publication, lectures, broadcasting, public performances, displays and exhibitions. SONG WORK does not intend to capture the human voice. Other than incidental inclusion (e.g. background conversation), no identifiable individuals will feature in any sound recording uploaded to the library or shared with partner organisations, and no personal data will be used. The intellectual property and copyright of the sound recordings created at your workplace hereby belong to SONG WORK under the Copyright, Designs &amp; Patents Act 1988 (‘sound-recording’). If you wish to limit public access to the sounds recorded at your workplace for a specific period, state these conditions here:</div>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div>This agreement is made between SONG WORK at 4 James Place, Dundee, DD5 1EE (‘The Recordist’) and you (‘The Workplace’) NAME (of business, workshop or studio)\r\n		</div>\r\n		<br><br>\r\n		<div>NAME (of business, workshop or studio)</div>\r\n		<br>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div>in regard to the sound recording that took place on</div>\r\n		<br>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div>By signing below, I, the owner or representative on behalf of ‘The Workplace’:\r\n		</div>\r\n		<br>\r\n		<ol>\r\n			<li>Confirm that I consented to take part in the recording;</li><br>\r\n			<li>Have read and understood the information provided on the creation and use of sound recording and what data the recordist will seek to capture;</li><br>\r\n			<li>Have read and understood the information provided on the use of personal data. This Agreement will be governed by and construed in accordance with the laws of Scotland.</li>\r\n		</ol>\r\n		<br>\r\n		<div>This Agreement will be governed by and construed in accordance with the laws of Scotland.</div>\r\n		<br>\r\n		<input type=\"checkbox\"><label>Signed on behalf of “The Workplace”</label>\r\n		<br><br>\r\n		<div>YOUR NAME</div>\r\n		<br>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div>NAME AND ADDRESS OF ‘THE WORKPLACE’</div>\r\n		<br>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<div>DATE</div>\r\n		<br>\r\n		<input type=\"text\">\r\n		<br><br>\r\n		<input class=\"text-center\" type=\"submit\" value=\"submit\">',NULL),(21,1,'2020-06-01 14:26:34','2020-06-01 14:26:34',NULL,'_menu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'menu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,1,'2020-06-01 14:26:43','2020-06-01 14:26:43',NULL,'HOMEPAGE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'homepage',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,1,'2020-06-01 14:26:52','2020-06-01 14:26:52',NULL,'SUBMIT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'submit',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,1,'2020-06-01 14:27:24','2020-06-01 14:27:24',NULL,'.catalogue',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'catalogue',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,1,'2020-06-01 14:27:48','2020-06-01 14:27:48',NULL,'Apparatus (Aâ€“Z)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'apparatus-a-z',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,'2020-06-01 14:28:11','2020-06-01 14:28:11',NULL,'Duration (shortâ€“long)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'duration-short-long',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,1,'2020-06-01 14:28:38','2020-06-01 14:28:38',NULL,'Name of sound recordist (Aâ€“Z)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'name-of-sound-recordist-a-z',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,1,'2020-06-01 14:28:53','2020-06-01 14:28:53',NULL,'Date recorded (newâ€“old)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'date-recorded-new-old',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,1,'2020-06-01 14:29:04','2020-06-01 14:29:04',NULL,'Location (Aâ€“Z)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'location-a-z',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,1,'2020-06-01 14:29:25','2020-06-01 14:29:25',NULL,'Title (Aâ€“Z)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'title-a-z',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,1,'2020-06-01 14:29:44','2020-06-01 14:29:44',NULL,'Catalogue number (oldâ€“new)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'catalogue-number-old-new',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2019-09-24 18:17:31','2019-09-24 18:17:31',0,1,1,NULL),(2,1,'2019-09-24 18:17:41','2019-09-24 18:17:41',0,2,1,NULL),(3,0,'2019-09-24 18:18:16','2019-09-24 18:26:18',1,3,1,NULL),(4,0,'2019-09-24 18:23:13','2019-09-24 20:17:57',2,4,1,NULL),(5,0,'2019-09-24 18:26:33','2019-09-24 18:51:14',1,5,1,NULL),(6,1,'2019-09-24 18:31:47','2019-09-24 18:31:47',5,6,1,NULL),(7,0,'2019-09-24 18:33:00','2019-09-24 18:47:43',1,7,1,NULL),(8,0,'2019-09-24 18:45:05','2020-01-23 17:30:36',1,8,1,NULL),(9,0,'2019-09-24 18:46:22','2020-01-23 17:30:55',1,9,1,NULL),(10,0,'2019-09-24 18:47:28','2020-01-23 17:30:43',1,10,1,NULL),(11,0,'2019-09-24 18:51:09','2020-01-23 17:30:51',1,6,1,NULL),(12,1,'2019-09-24 19:50:40','2019-09-24 19:50:40',2,11,1,NULL),(13,0,'2020-01-23 16:34:48','2020-01-23 16:35:48',1,12,1,NULL),(14,1,'2020-01-23 16:35:15','2020-01-23 16:35:15',1,13,1,NULL),(15,1,'2020-01-23 17:58:34','2020-01-23 17:58:34',1,14,1,NULL),(16,1,'2020-01-23 17:59:51','2020-01-23 17:59:51',1,15,1,NULL),(17,1,'2020-01-23 18:00:18','2020-01-23 18:00:18',1,16,1,NULL),(18,1,'2020-01-23 18:00:35','2020-01-23 18:00:35',1,17,1,NULL),(19,1,'2020-01-23 18:00:50','2020-01-23 18:00:50',1,18,1,NULL),(20,1,'2020-01-23 18:01:09','2020-01-23 18:01:09',1,19,1,NULL),(21,1,'2020-05-28 18:10:49','2020-05-28 18:10:49',0,20,1,NULL),(22,1,'2020-06-01 14:26:34','2020-06-01 14:26:34',0,21,1,NULL),(23,1,'2020-06-01 14:26:43','2020-06-01 14:26:43',21,22,1,NULL),(24,1,'2020-06-01 14:26:52','2020-06-01 14:26:52',21,23,1,NULL),(25,1,'2020-06-01 14:27:24','2020-06-01 14:27:24',21,24,1,NULL),(26,1,'2020-06-01 14:27:48','2020-06-01 14:27:48',24,25,1,NULL),(27,1,'2020-06-01 14:28:11','2020-06-01 14:28:11',24,26,1,NULL),(28,1,'2020-06-01 14:28:38','2020-06-01 14:28:38',24,27,1,NULL),(29,1,'2020-06-01 14:28:53','2020-06-01 14:28:53',24,28,1,NULL),(30,1,'2020-06-01 14:29:04','2020-06-01 14:29:04',24,29,1,NULL),(31,1,'2020-06-01 14:29:25','2020-06-01 14:29:25',24,30,1,NULL),(32,1,'2020-06-01 14:29:44','2020-06-01 14:29:44',24,31,1,NULL);
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

-- Dump completed on 2020-06-01 19:02:08
