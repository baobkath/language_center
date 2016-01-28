-- MySQL dump 10.14  Distrib 5.5.44-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: studyjapan
-- ------------------------------------------------------
-- Server version	5.5.44-MariaDB

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
-- Table structure for table `advertise`
--

DROP TABLE IF EXISTS `advertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `is_show` tinyint(1) DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `show_in` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdCategory` (`type`),
  KEY `ad_lang` (`show_in`),
  CONSTRAINT `advertise_ibfk_1` FOREIGN KEY (`show_in`) REFERENCES `languecenter` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise`
--

LOCK TABLES `advertise` WRITE;
/*!40000 ALTER TABLE `advertise` DISABLE KEYS */;
INSERT INTO `advertise` VALUES (1,'công ty 2','9lAYjLuue9ESSSyV-N1vEkGbThMyZIbb.gif','','2015-12-04 18:13:34','2015-12-17 21:45:36',0,'http://studyjapan.vn','image','right',NULL),(2,'công ty 2','IrSaeXpZdY_pMJPVgBJyq3fxwp6kkKvu.png','','2015-11-17 21:00:00','2015-11-28 01:16:23',1,'http://studyjapan.vn','image','right',NULL),(3,'công ty 3','3BiEbMgwk5S1l-4jtzOn5t3PTstNjBDp.jpg','','2015-11-18 00:00:00','2015-11-26 00:00:00',1,'http://studyjapan.vn','image','body',NULL),(4,'công ty 4','hM0wZ5UDFhds-Kvdco9z98PLq-SvgckC.jpg','','2015-11-17 00:00:00','2015-11-26 00:00:00',1,'http://studyjapan.vn','image','right',NULL),(5,'công ty 5','-GX7TNdObYOz519jku2EM1C4WV2kko5T.png','','2015-11-17 07:00:00','2015-11-25 01:25:00',1,'http://studyjapan.vn','image','body',6),(6,'Let study japan','IkzvF7NxhmJspDZVBUzSyxp4XsCKuvgo.png','','2000-11-30 21:00:00','2000-11-30 21:00:00',1,'http://studyjapan.vn','image','top',NULL),(8,'công ty 2','4d5mwpANyhCzwyED9gaSba4VlxxxlATH.png','<p>đasdf</p>\r\n','2015-11-11 23:45:37','2015-11-29 03:50:37',1,'http://studyjapan.vn','image','body',3),(9,'chiến dịch 1','jAY5L3NVRn9dbk9as1E5m6Epeg2LWzNp.jpg','<p>fgsdfg</p>\r\n','2015-11-19 14:45:53','2015-12-01 04:45:53',1,'http://studyjapan.vn','image','body',3),(10,'Let study japan','RpyP4g6jTtnCAGq8KOZ4okqE7KOXG3vF.jpg','<p>adsd</p>\r\n','2015-12-06 04:12:56','2015-12-24 03:45:33',0,'http://danhsach.com.vn','image','top',NULL);
/*!40000 ALTER TABLE `advertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertise_click`
--

DROP TABLE IF EXISTS `advertise_click`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertise_click` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IdAd` int(11) NOT NULL,
  `click_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdAd` (`IdAd`),
  CONSTRAINT `advertise_click_ibfk_1` FOREIGN KEY (`IdAd`) REFERENCES `advertise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise_click`
--

LOCK TABLES `advertise_click` WRITE;
/*!40000 ALTER TABLE `advertise_click` DISABLE KEYS */;
INSERT INTO `advertise_click` VALUES (1,'127.0.0.1',4,'2015-11-25 15:38:27'),(2,'127.0.0.1',4,'2015-11-25 15:39:02'),(3,'127.0.0.1',4,'2015-11-25 15:39:41'),(4,'127.0.0.1',4,'2015-11-25 15:39:52'),(5,'127.0.0.1',4,'2015-11-25 15:41:09'),(6,'127.0.0.1',4,'2015-11-25 15:42:48'),(7,'127.0.0.1',1,'2015-11-25 15:42:55'),(8,'127.0.0.1',2,'2015-11-25 15:45:37'),(9,'127.0.0.1',2,'2015-11-25 15:48:32'),(10,'127.0.0.1',1,'2015-11-25 16:00:19'),(11,'127.0.0.1',1,'2015-12-03 12:00:51'),(12,'127.0.0.1',1,'2015-12-03 12:02:11');
/*!40000 ALTER TABLE `advertise_click` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('admin','2',NULL),('manage_magazin','5',1449463996),('manage-advertise','4',NULL),('manage-languagecenter','3',NULL),('sysadmin','6',NULL);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin',2,'can login admin',NULL,NULL,NULL,NULL),('manage_magazin',2,'Can manage magazin',NULL,NULL,1449463916,1449463932),('manage-advertise',2,'can change advertise',NULL,NULL,NULL,NULL),('manage-languagecenter',2,'can change Language Center',NULL,NULL,NULL,NULL),('sysadmin',1,'can change system',NULL,NULL,NULL,1449463954);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('manage_magazin','admin'),('manage-advertise','admin'),('manage-languagecenter','admin'),('sysadmin','admin'),('sysadmin','manage_magazin'),('sysadmin','manage-advertise'),('sysadmin','manage-languagecenter');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_param`
--

DROP TABLE IF EXISTS `config_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 COMMENT='table of all parameters config for entire webpage';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_param`
--

LOCK TABLES `config_param` WRITE;
/*!40000 ALTER TABLE `config_param` DISABLE KEYS */;
INSERT INTO `config_param` VALUES (24,'NUMBER_LANGUE_IN_MOST','5','number topic in detail',1),(25,'NUMBER_LANGUE_IN_HOME','6','number langue center in home',1),(26,'PAGING_5','5','paginate with five items per page',0),(27,'PAGING_10','10','paginate with ten items per page',0),(28,'PAGING_15','15','paginate with fifteen items per page',0),(29,'PAGING_20','20','paginate with twenty items per page',0),(30,'_CACHED_A_DAY','86400','cache one day( in seconds)',0),(31,'_CACHED_AN_HOUR','3600','cache one hour( in seconds)',0),(32,'_CACHED_30M','1800','cache thirty minutes(in seconds)',0),(33,'_LIMIT_5','5','limit five line in page',0),(34,'_LIMIT_10','10','limit ten line in page',0),(35,'_LIMIT_15','15','limit fifteen line in page',0),(36,'_LIMIT_20','20','limit twenty line in page',0),(41,'_LIMIT_30','30','30 items per page',0),(42,'NUMBER_AD_IN_RIGHT','2','Number of Advertise in right',1),(43,'NUMBER_AD_IN_BODY','2','Number of Advertise in body',1),(44,'NUMBER_IMAGE_TOP','2','Number of image in top page',1),(45,'NUMBER_MAIL_MAGAZIN','6','Number of mail send magazin',1);
/*!40000 ALTER TABLE `config_param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_magazin`
--

DROP TABLE IF EXISTS `content_magazin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_magazin` (
  `Day` int(11) NOT NULL,
  `Level` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Day`,`Level`),
  KEY `child` (`Level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_magazin`
--

LOCK TABLES `content_magazin` WRITE;
/*!40000 ALTER TABLE `content_magazin` DISABLE KEYS */;
INSERT INTO `content_magazin` VALUES (0,'N0','Bài tập trình độ N0 cho lúc đăng ký','<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/19C1jeyzKDI\" width=\"420\"></iframe></p>\r\n\r\n<p><img alt=\"trung tâm\" src=\"http://trungtamtiengnhat.danhsach.com.vn/admin/uploads/center/R5pDLi_fEhU41kUy10LZt1wpR_GrrD2M.png\" style=\"height:150px; width:150px\" /></p>\r\n'),(1,'N0','Bài tập cho buổi thứ nhất sau khi đăng ký','<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>B&agrave;i 1</td>\r\n			<td>B&agrave;i 2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>A</td>\r\n			<td>C</td>\r\n		</tr>\r\n		<tr>\r\n			<td>B</td>\r\n			<td>C</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');
/*!40000 ALTER TABLE `content_magazin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languecenter`
--

DROP TABLE IF EXISTS `languecenter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languecenter` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `schedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float DEFAULT '0',
  `ordinal_view` int(11) DEFAULT '255',
  `is_show` tinyint(1) DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languecenter`
--

LOCK TABLES `languecenter` WRITE;
/*!40000 ALTER TABLE `languecenter` DISABLE KEYS */;
INSERT INTO `languecenter` VALUES (1,'Center language 2','Trung tâm ngoại ngữ 1, chuyên đào tạo tiếng nhật','7uvxwUTD2sZ_lHQsQ2JWrNGPSitXore8.png','bmacfLnkOSxjXg8NvMXmdN2rBzLwfR78.png','12 Linh lang, Ba đình đội cấn','baobkath@gmail.com','01698599540','11:45:00','http://bcv.com',3.5,2,0,142,'center-language-2',NULL),(2,'Trung tâm tiếng Nhật núi Trúc','Đào tạo cơ bản và xuất khẩu lao động, du học bên Nhật','R5pDLi_fEhU41kUy10LZt1wpR_GrrD2M.png','6MxAt06T6YmgFo-ySZRyXGnc8MCOFnna.png','số 15 ngõ núi trúc - kim mã - ba đình - hà nội','baobkath@gmail.com','0438460341','08:30:00','http://trungtamtiengnhat.edu.vn/',3.44444,1,1,404,'trung-tam-tieng-nhat-nui-truc',1),(3,'Trung tâm Nhật ngữ Tokyo','Chuyên đào tạo xuất khẩu lao động, du học bên Nhật','7he0UuMWppTlwb7p9uacjHWNTGOLpTxC.png','2T4_6geoAhwNH9EJ5MxusxkUg06l5EUf.png','Số 8Đ Điện Biên Phủ - Hoàn Kiếm - Hà Nội','baobkath@gmail.com','0439381609','08:30:00','http://www.nhatngutokyo.com',3.16667,1,1,329,'trung-tam-nhat-ngu-tokyo',NULL),(4,'Trung tâm tiếng Nhật SJP','Chỉ đào tạo cơ bản.','B2nx-JPRkw8ftZQg5KFTOgeGT7I3WFny_3.png','V8tDPhZMK2PBYbWBd_LTpvakke2EufQN.png','Số 15 phố Phương Liệt','baobkath@gmail.com','0438647014','19:00:00','http://sjpedu.com/vi/',3.4,255,1,59,'trung-tam-tieng-nhat-sjp',NULL),(5,'Trung tâm Yuki','Đào tạo cơ bản và xuất khẩu lao động, du học bên Nhật','sO1wBW1FY6CtNQfwf8FYU1cClNCxdfib.jpg','YRqiL_W0Z_uHof6-5iHyfeXROexFgTQq.png','Tầng 4 – Số 50 – 52 Yên Bái 1, Hai Bà Trưng, Hà Nội','baobkath@gmail.com','0462800455','\"Sáng: 8h30 - 11h30 Chiều: 13h30 - 16h30 Tối: 17h30 - 19h ; 19h - 20h30\"','http://www.yukicenter.com/',3.4,2,1,150,'trung-tam-yuki',NULL),(6,'Trung tâm hợp tác nguồn nhân lực Việt Nam - Nhật Bản (VJCC)','Chỉ đào tạo cơ bản','sZManiz2OwraE8YrGe6-ZL3bxUVHlRFl.gif','kjpxBY8-vFwgQ8RTTp42k2X0cqh6dC00.jpg','Tòa nhà VJCC Hà nội, Trường ĐH Ngoại thương - Số 91. Chùa láng. Đống đa. Hà nội','baobkath@gmail.com','043775127','2-4-6 hoặc 3-5-7: 18h30 -20h30','http://www.vjcc.org.vn/',3.22222,NULL,1,258,'trung-tam-hop-tac-nguon-nhan-luc-viet-nam-nhat-ban-vjcc',NULL),(7,'Trung tâm Nhật ngữ Zen','Đào tạo cơ bản và xuất khẩu lao động, du học bên Nhật','tpul_66WhFTybQgR16e-K-0X5EQwUB0r.jpg','NrRfnVdVIurvtrRKSNPhhJBzejBcyFKB.jpg','Số 97B Thụy khuê - Tây Hồ - Hà Nội','info@zen-jsc.com.vn','0437281501','Sáng: 8h - 12h, Tối: 18h - 19h30 ; 19h30 - 21h','http://www.zen-jsc.com.vn/',4,NULL,1,10,'trung-tam-nhat-ngu-zen',NULL);
/*!40000 ALTER TABLE `languecenter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazin`
--

DROP TABLE IF EXISTS `magazin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `magazin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `Day` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazin`
--

LOCK TABLES `magazin` WRITE;
/*!40000 ALTER TABLE `magazin` DISABLE KEYS */;
INSERT INTO `magazin` VALUES (14,'bảo','baobkath@gmail.com','N0','2015-12-07 00:00:00',1),(15,'Nguyễn Đức Tuấn','o936o661o2@gmail.com','N5','2015-12-07 00:00:00',-1);
/*!40000 ALTER TABLE `magazin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate_center`
--

DROP TABLE IF EXISTS `rate_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rate_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_session` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `id_center` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `rate_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_center` (`id_center`),
  CONSTRAINT `rate_center_ibfk_1` FOREIGN KEY (`id_center`) REFERENCES `languecenter` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate_center`
--

LOCK TABLES `rate_center` WRITE;
/*!40000 ALTER TABLE `rate_center` DISABLE KEYS */;
INSERT INTO `rate_center` VALUES (1,'ej21qc69j4p31r41s11kap5if7',2,4,'0000-00-00 00:00:00'),(2,'ej21qc69j4p31r41s11kap5if7',1,3,'0000-00-00 00:00:00'),(3,'aqr15hpsr7b084f6rdjabh8ps5',1,4,'0000-00-00 00:00:00'),(4,'fqc0eji565ntc9tjrgo2j7ikl4',1,4,'0000-00-00 00:00:00'),(5,'aqr15hpsr7b084f6rdjabh8ps5',3,2,'0000-00-00 00:00:00'),(6,'aqr15hpsr7b084f6rdjabh8ps5',5,4,'0000-00-00 00:00:00'),(7,'aqr15hpsr7b084f6rdjabh8ps5',6,4,'0000-00-00 00:00:00'),(8,'rbvmikahpct7si61v8k0hd4kr3',6,3,'0000-00-00 00:00:00'),(9,'htpp0n96850tjvupl631mop6l0',6,2,'0000-00-00 00:00:00'),(10,'aqr15hpsr7b084f6rdjabh8ps5',2,4,'2015-11-19 15:02:57'),(11,'rbvmikahpct7si61v8k0hd4kr3',3,3,'2015-11-19 15:28:10'),(12,'rbvmikahpct7si61v8k0hd4kr3',5,3,'2015-11-19 15:35:32'),(13,'htpp0n96850tjvupl631mop6l0',3,4,'2015-11-19 16:52:41'),(14,'f182arf4tdngn766131km5c5u6',6,4,'2015-11-19 17:06:23'),(15,'4a3ce25n5o313t3jtgjmttmqn1',4,3,'2015-11-20 12:16:15'),(16,'4a3ce25n5o313t3jtgjmttmqn1',3,4,'2015-11-20 13:58:34'),(17,'jeiqjli17lo8dlk8meonpe10f6',2,3,'2015-11-21 10:50:32'),(18,'bkqpt65cso9srgq39kvv8up0i6',2,2,'2015-11-21 13:40:06'),(19,'5qhs6lvp7nun8oecrmaql3d0n1',4,4,'2015-11-23 08:27:25'),(20,'5qhs6lvp7nun8oecrmaql3d0n1',2,4,'2015-11-23 08:31:33'),(21,'5qhs6lvp7nun8oecrmaql3d0n1',3,2,'2015-11-23 08:34:20'),(22,'5qhs6lvp7nun8oecrmaql3d0n1',5,3,'2015-11-23 08:45:58'),(23,'dud02q238m1ela6ibku4re9a75',6,4,'2015-11-24 08:42:55'),(24,'dud02q238m1ela6ibku4re9a75',1,3,'2015-11-24 16:21:12'),(25,'pq65la5lglb4ve42c6d477gua7',2,4,'2015-11-25 09:48:36'),(26,'pq65la5lglb4ve42c6d477gua7',3,4,'2015-11-25 09:50:12'),(27,'pq65la5lglb4ve42c6d477gua7',5,4,'2015-11-25 09:51:52'),(28,'pq65la5lglb4ve42c6d477gua7',1,3,'2015-11-25 09:54:08'),(29,'pq65la5lglb4ve42c6d477gua7',4,2,'2015-11-25 09:55:35'),(30,'cvjnhtoodlv6j9dl2ldqj76d52',2,3,'2015-11-25 11:13:52'),(31,'j9i14g8rs135d178fv97hcvgc0',6,2,'2015-11-25 11:14:27'),(32,'j9i14g8rs135d178fv97hcvgc0',4,4,'2015-11-25 14:51:15'),(33,'j9i14g8rs135d178fv97hcvgc0',1,4,'2015-11-25 15:50:29'),(34,'c5jdm1b7prap02n60lu4kgsla1',2,4,'2015-11-26 15:37:27'),(35,'f9uqc6s1j6ic1kn1rhldrh50l3',4,4,'2015-11-30 13:32:02'),(36,'f9uqc6s1j6ic1kn1rhldrh50l3',6,4,'2015-11-30 13:34:33'),(37,'f9uqc6s1j6ic1kn1rhldrh50l3',5,3,'2015-11-30 13:35:09'),(38,'qf4281aglu0s0ofvkl7hqn2ut0',2,3,'2015-12-02 09:19:45'),(39,'15epvm8nj1l7vctpbii163nnm0',6,4,'2015-12-02 16:10:39'),(40,'m8r6oe4nq3pnmn7fp408q8mrm4',6,2,'2015-12-03 11:18:42'),(41,'ck1vr59dj3mimhj2p0ie43tt23',7,4,'2015-12-05 14:23:10');
/*!40000 ALTER TABLE `rate_center` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (7,'YUZ9Vy79jcGfSGH4whBk7KBRmnQHKmYP',1447292351,0);
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `registration_ip` bigint(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'baobkath','baobkath@gmail.com','$2y$12$kMs52T3Tfu8Y.8OJ5KmCBuSb.ZzG3KET7Jxvab7.EAb1IHSzJEPcm','rV1U1p-5KscSzSLJhqypz9BghKE9Y_mO',145930,'14:59:30',NULL,'member',10,145930,145930,0),(2,'admin','admin@gmail.com','$2y$12$kMs52T3Tfu8Y.8OJ5KmCBuSb.ZzG3KET7Jxvab7.EAb1IHSzJEPcm','rV1U1p-5KscSzSLJhqypz9BghKE9Y_mO',145930,'14:59:30',NULL,'admin',10,145930,145930,0),(3,'bao_center','b.aobkath@gmail.com','$2y$12$aEpyMpOsHVijKsXRlynpO.kpzuPPL6RNNK9ReaC8nVU.anViRPC/y','TmLxjBf7Ma_jZVqGqkUJTM_oxMUxVCWg',1446884219,NULL,NULL,NULL,1270,1446884220,1447054226,0),(4,'bao_adverstise','ba.obkath@gmail.com','$2y$12$JN8InemieqLMTr1nHxmZjOu.vTl4vEHJUlryUHRL7QNRU9OwwoU9e','IQk8erQIHx340810TJIOG0rVMxIATSAb',1447054399,NULL,NULL,NULL,1270,1447054399,1447054399,0),(5,'bao_magazin','bao.bkath@gmail.com','$2y$12$0fbkSEq44pTv4YIsN.ym4OFzVKRWouwEjLA4aUERYDafBYlaFeei6','hhiqZpIcyS5a5CQVja3RLLaW1MH5yzNu',1447054435,NULL,NULL,'admin',1270,1447054435,1449463981,0),(6,'superadmin','baob.kath@gmail.com','$2y$12$T4.z6x9/DkI2/9jQHqlAHutt4sRnrbSHvRTICOe81l52eDTUe0fZS','5N6aUvEjSyW0xTPSybclSZ7iettJ6q5m',1447131769,NULL,NULL,'sysadmin',1270,1447131770,1447735283,0),(7,'baobkath2','baobk.ath@gmail.com','$2y$12$nHuEai0acIejy2QRBQnSY.3GgJi/SmnlhmANttfT8yRoH.fhrBQvi','Q3AntiWiulKu0ROikiHOFmOn2yl5Q1hv',NULL,NULL,NULL,'member',1270,1447292351,1447292351,0),(8,'baobkath3','baobka.th@gmail.com','$2y$12$kxDhATft6nsW5aeEs9XBxu3BvbsctO2LRsSiVUe8ZAxXK4LmeAlUi','kVdePt9GHAf6rIHDUi3eH7ISgedaOuaC',1447738079,NULL,NULL,'member',1270,1447738079,1447738079,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-22 15:22:35
