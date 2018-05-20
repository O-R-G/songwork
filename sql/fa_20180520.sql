-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: fa
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,0,'2018-05-18 14:06:18','2018-05-18 14:06:18',4,NULL,NULL,'png',''),(2,1,'2018-05-18 14:06:49','2018-05-18 14:06:49',5,NULL,NULL,'png',''),(3,1,'2018-05-18 14:07:43','2018-05-18 14:55:52',4,NULL,1,'png',''),(4,0,'2018-05-18 15:16:37','2018-05-18 15:17:36',7,NULL,1,'png',''),(5,1,'2018-05-18 16:04:08','2018-05-18 16:07:42',9,NULL,1,'jpg',''),(6,0,'2018-05-18 17:55:16','2018-05-18 17:59:09',10,NULL,1,'png',''),(7,1,'2018-05-18 17:59:09','2018-05-18 17:59:09',10,NULL,NULL,'png',''),(8,0,'2018-05-18 18:13:26','2018-05-19 10:04:20',16,NULL,1,'jpg',''),(9,1,'2018-05-18 18:13:43','2018-05-18 18:14:06',17,NULL,1,'png',''),(10,1,'2018-05-18 18:15:16','2018-05-18 18:15:16',18,NULL,NULL,'png',''),(11,1,'2018-05-19 08:02:24','2018-05-19 08:02:52',20,NULL,1,'jpg',''),(12,1,'2018-05-19 08:03:44','2018-05-19 08:34:58',21,NULL,1,'jpg',''),(13,1,'2018-05-19 09:08:50','2018-05-19 09:08:50',22,NULL,NULL,'jpg',''),(14,1,'2018-05-19 09:16:13','2018-05-19 09:16:48',23,NULL,1,'jpg',''),(15,1,'2018-05-19 10:03:57','2018-05-19 10:04:20',16,NULL,1,'jpg',''),(16,1,'2018-05-20 14:21:09','2018-05-20 14:22:02',25,NULL,1,'jpg','');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,1,'2018-05-18 13:18:18','2018-05-20 14:26:33',10,'Skeleton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'skeleton',NULL,NULL,NULL,NULL,NULL,NULL,'<div>A proposal:</div><div><br></div><div>Any collection of information ALWAYS already has an inherent architecture — a scaffold or skeleton that both records how it was put together and regulates how it can grow. Such internal logic is distinct from what the data expresses (its visible ‘content’). Beyond the surface, this structural ‘information about information’ assembles in a digital artifact’s <a href=\"https://en.wikipedia.org/wiki/Metadata\">meta-data</a>.<br></div>','Forensic Architecture is an independent research agency based at Goldsmiths, University of London. Our interdisciplinary team of investigators includes architects, scholars, artists, filmmakers, software developers, investigative journalists, archaeologists, lawyers, and scientists.'),(2,1,'2018-05-18 13:18:35','2018-05-20 14:27:06',20,'Typography',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'typography',NULL,NULL,NULL,NULL,NULL,NULL,'The structure goes by many names: rhetoric, outline, framework, system. We<span style=\"font-family: &quot;Helvetica Neue&quot;; -webkit-text-stroke: rgb(0, 0, 0);\">’</span>d call it simply ‘typography’. The common understanding of typography is that it involves choosing fonts and arranging layouts, usually in view of so much style or decoration. We have a different idea. Yes, <a href=\"http://t-y-p-o-g-r-a-p-h-y.org\">typography</a> is the soft science of point-size, line-spacing, weight, colour and so on. But it is equally – and more consequently – concerned with structure, and so with conveying intrinsic logic as more or less crisply rendered sets of dependent relationships. Typography is visual, and when it is done well, as well as transmitting its ostensible content, it also reflects its fundamental organization.','<div>Our evidence is&nbsp;<a href=\"http://forensic-architecture.local/\">presented</a>&nbsp;in political and legal forums, truth commissions, courts, and human rights reports. We also undertake historical and theoretical examinations of the history and present status of forensic practices in articulating notions of public truth.</div>'),(3,1,'2018-05-18 13:52:00','2018-05-20 10:39:07',30,'Architecture',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'architecture',NULL,NULL,NULL,NULL,NULL,NULL,'In the early days of the internet, the structural relationships between pieces of digital information on a website were known as its ‘Information Architecture’. The phrase seems almost quaint. Today we are thoroughly accustomed to the low-key magic&nbsp;of webpages drawing from live databases and assembling themselves in front of us on demand. The films site shows us what is playing now, nearby. The music site shows us the top 10 most-streamed songs. Youtube tells us who of our friends is watching what and when. And, of course, there is the info air we breathe, <a href=\"http://web.archive.org/web/19981111184551/http://google.com:80/\">Google</a>.','Forensic Architecture has worked closely with communities affected by acts of social and political violence, alongside NGOs, human rights groups, activists, and media organisations. Their investigations have provided decisive evidence in a number of legal cases, and contested accounts given by state authorities, leading to military, parliamentary and UN inquiries.'),(4,1,'2018-05-18 14:06:18','2018-05-18 17:30:03',50,'Cracks',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'image1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,'2018-05-18 14:06:49','2018-05-18 14:07:35',NULL,'Image1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,'2018-05-18 15:10:06','2018-05-20 14:27:59',40,'Materials',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test2',NULL,NULL,NULL,NULL,NULL,NULL,'Naturally, the information that comprises a Forensic Architecture website also has its own unique skeleton, its bones a collection of digital files in a variety of <a href=\"https://en.wikipedia.org/wiki/List_of_filename_extensions\">media types</a>, each governed by one of several format protocols. There will be plain text from a database, html markup text, javascript, php, and mysql queries. There will also be jpegs, gifs, pngs,&nbsp;rsa public keys, tiffs, mp4s, mp3s, movs, docs, and so on. All of this digital data is the raw material from which the site is built; and as we know, all materials – even digital ones – record the trace of their use, and so too of their evolution.',NULL),(7,1,'2018-05-18 15:14:23','2018-05-20 11:43:14',55,'Clarity',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'clarity',NULL,NULL,NULL,NULL,NULL,NULL,'To serve the brief’s twin goals – clarity of internal organization and clarity of external interface – we therefore propose a website for FA that is&nbsp;PATENTLY structured by the skeleton of its information.','As part of the exhibition Counter Investigations, Forensic Architecture leads five seminars organized around key concepts that underpin the agency’s work, adding up to a short course in forensic architecture. These seminars take place in the ICA gallery spaces, within and around the investigations on display. Whereas these investigations were produced for presentation in juridical and political forums, the seminars will gather an alternative forum in which the same evidence is interrogated theoretically and historically.'),(8,0,'2018-05-18 16:00:23','2018-05-18 16:04:20',NULL,'untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,'2018-05-18 16:04:08','2018-05-19 10:24:36',160,'Transparency',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9',NULL,NULL,NULL,NULL,NULL,NULL,'<br>',NULL),(10,1,'2018-05-18 17:44:40','2018-05-18 17:56:53',90,'Search',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'search',NULL,NULL,NULL,NULL,NULL,NULL,'<div><br></div>',NULL),(11,1,'2018-05-18 17:51:05','2018-05-20 15:04:48',95,'What does it look like?',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'what-does-it-look-like',NULL,NULL,NULL,NULL,NULL,NULL,'Ok, but what does it look like? Well, what you’re looking at now (as opposed to reading) is a start – but strictly only a start. We don’t mean to imply something self-consciously ‘default’ and certainly don’t intend something easily filed under the stylistic shorthand of ‘<a href=\"http://brutalistwebsites.com\">Brutalist web design</a>’. We are suggesting something much more fundamental: an approach to the design that is baked into the organization of the materials. We might say, in fact, that contrary to the tired TROPE of Brutalist aesthetics, what we\'re proposing is actually in line with the two-fold premise of Brutalist SPIRIT. Namely,&nbsp;the pointed use of raw, fundamental materials and the setting up of spaces to be populated by multiple, changing content. We might productively take the graphic premise of the ‘key concept’ walls in&nbsp;<i>Counter Investigations&nbsp;</i>as a jumping-off point. We are well-aware that the site needs to directly address various and distinct audiences at radically different scales, from students to governments.',NULL),(12,0,'2018-05-18 17:51:12','2018-05-18 17:57:32',110,'Included',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'included',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,'2018-05-18 17:51:33','2018-05-20 15:18:08',125,'Schedule and Fees',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'schedule',NULL,NULL,NULL,NULL,NULL,NULL,'As discussed during the Skype briefing, we feel that building a website as necessarily involved as FA’s by the end of summer 2018 is HIGHLY inadvisable and that it would be irresponsible to pretend otherwise. We instead propose to proceed over a six-month time frame, roughly broken down into two months of design development, three months of programming plus design development, and one month of refinement and optimization.&nbsp;<div><br></div><div>Any new website these days should obviously work as well on small mobile devices as it does on large desktop screens. With this in mind, it is worth reading this proposal on both types of hardware to get an idea how the dual purpose might play out.<div><br></div><div>The website’s Content Management System should also be carefully considered. We have no immediate prejudices, but wide experience with various standard and less-standard systems – including a <a href=\"http://o-r-g.com/other/open-records-generator\">CMS</a> developed by <a href=\"http://o-r-g.com\">David’s software company O-R-G</a> that has been adapted consistently through four revised versions over the past 15 years and is currently used to run hundreds of websites. There are an increasing number of lightweight CMSs available and FA should not be tethered to either a monumental nor proprietary system. This choice should be taken in view of the rapid turnover of web standards.&nbsp;</div><div><br></div><div>Basic design fee: 2 months, £15,000<br></div><div>Development fee: 4 months, £45,000</div><div>Optimization fee: 1 month, £7,500</div><div><br></div><div>TOTAL: £67,500&nbsp;<br></div><div><br></div></div>',NULL),(14,1,'2018-05-18 17:55:46','2018-05-20 14:29:10',70,'That sounds vague',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'this-sounds-vague',NULL,NULL,NULL,NULL,NULL,NULL,'That sounds vague — let’s try again. We propose to build a website for FA where what it looks like and how it is assembled and maintained are mirror images of each other; and where the materiality of its digital contents is pronounced. This does not have to come at the cost of clarity or difficulty in navigation. The site should assemble itself by filing most recent information first, then articulate itself backwards – both in terms of the overall site and within each specific investigation. The content could then be dynamically filtered and displayed by project, by client, by collaborator, by individual contributor, by media, and so on. Consider the site the way we still picture a computer’s brain as a <a href=\"https://gridmetric.files.wordpress.com/2011/10/packagebranching-11.png\">branching file system</a>, a primitive logic tree. And think of this filtering mechanism as essentially a search bar – albeit a distinctly SMART search bar that knows quite a lot about what it can find and isn’t coy about showing off that knowledge.',NULL),(15,0,'2018-05-18 17:56:24','2018-05-19 08:34:37',25,'.GDPR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gdpr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,1,'2018-05-18 18:13:26','2018-05-18 18:17:09',115,'Exhibition',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'exhibition',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,1,'2018-05-18 18:13:43','2018-05-18 18:16:45',35,'Tender',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'tender',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,0,'2018-05-18 18:15:16','2018-05-20 13:45:42',140,'Mobile',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mobile',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,1,'2018-05-18 18:17:33','2018-05-20 15:17:08',200,'End',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'end',NULL,NULL,NULL,NULL,NULL,NULL,'One final word on the logotype at the top of this page — changing the colour of the Forensic Architecture lozenge from red to blue is not a mistake, a joke or a flippant decision. It simply seemed a straightforward yet engagingly strange thing to do in view of clinically marking the next stage of FA’s (online) existence.',NULL),(20,0,'2018-05-19 08:02:24','2018-05-20 14:23:29',25,'Specimen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'specimen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,1,'2018-05-19 08:03:25','2018-05-19 08:34:58',22,'IVJ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ivj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,1,'2018-05-19 09:08:50','2018-05-19 09:08:50',15,'Durer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'durer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,1,'2018-05-19 09:16:13','2018-05-20 14:42:10',58,'Mallarme Broodthaers',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mallarme-broodthaers',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,0,'2018-05-20 13:46:08','2018-05-20 13:57:01',70,'Video',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'video',NULL,NULL,NULL,NULL,NULL,NULL,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ehvtpGzF1r4?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe>',NULL),(25,1,'2018-05-20 14:21:09','2018-05-20 14:22:35',98,'Brutalism',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'brutalism',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,1,'2018-05-20 14:34:51','2018-05-20 14:47:13',56,'Video',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'video',NULL,NULL,NULL,NULL,NULL,NULL,'<iframe src=\"https://player.vimeo.com/video/265709912?title=0&amp;byline=0&amp;portrait=0\" frameborder=\"0\" webkitallowfullscreen=\"\" mozallowfullscreen=\"\" allowfullscreen=\"\"></iframe>',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wires`
--

LOCK TABLES `wires` WRITE;
/*!40000 ALTER TABLE `wires` DISABLE KEYS */;
INSERT INTO `wires` VALUES (1,1,'2018-05-18 13:18:18','2018-05-18 13:18:18',0,1,1,NULL),(2,1,'2018-05-18 13:18:35','2018-05-18 13:18:35',0,2,1,NULL),(3,1,'2018-05-18 13:52:00','2018-05-18 13:52:00',0,3,1,NULL),(4,1,'2018-05-18 14:06:18','2018-05-18 14:06:18',0,4,1,NULL),(5,0,'2018-05-18 14:06:49','2018-05-18 14:07:35',0,5,1,NULL),(6,1,'2018-05-18 15:10:06','2018-05-18 15:10:06',0,6,1,NULL),(7,1,'2018-05-18 15:14:23','2018-05-18 15:14:23',0,7,1,NULL),(8,0,'2018-05-18 16:00:23','2018-05-18 16:04:20',0,8,1,NULL),(9,1,'2018-05-18 16:04:08','2018-05-18 16:04:08',0,9,1,NULL),(10,1,'2018-05-18 17:44:40','2018-05-18 17:44:40',0,10,1,NULL),(11,1,'2018-05-18 17:51:05','2018-05-18 17:51:05',0,11,1,NULL),(12,0,'2018-05-18 17:51:12','2018-05-18 17:57:32',0,12,1,NULL),(13,1,'2018-05-18 17:51:33','2018-05-18 17:51:33',0,13,1,NULL),(14,1,'2018-05-18 17:55:46','2018-05-18 17:55:46',0,14,1,NULL),(15,0,'2018-05-18 17:56:24','2018-05-19 08:34:37',0,15,1,NULL),(16,1,'2018-05-18 18:13:26','2018-05-18 18:13:26',0,16,1,NULL),(17,1,'2018-05-18 18:13:43','2018-05-18 18:13:43',0,17,1,NULL),(18,0,'2018-05-18 18:15:16','2018-05-20 13:45:42',0,18,1,NULL),(19,1,'2018-05-18 18:17:33','2018-05-18 18:17:33',0,19,1,NULL),(20,0,'2018-05-19 08:02:24','2018-05-20 14:23:29',0,20,1,NULL),(21,1,'2018-05-19 08:03:25','2018-05-19 08:03:25',0,21,1,NULL),(22,1,'2018-05-19 09:08:50','2018-05-19 09:08:50',0,22,1,NULL),(23,1,'2018-05-19 09:16:13','2018-05-19 09:16:13',0,23,1,NULL),(24,0,'2018-05-20 13:46:08','2018-05-20 13:57:01',0,24,1,NULL),(25,1,'2018-05-20 14:21:09','2018-05-20 14:21:09',0,25,1,NULL),(26,1,'2018-05-20 14:34:51','2018-05-20 14:34:51',0,26,1,NULL);
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

-- Dump completed on 2018-05-20 19:19:58
