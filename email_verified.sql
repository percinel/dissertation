-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dissertation
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1

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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `sreader_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `step` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `last_user` int(11) NOT NULL,
  `last_action` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_header` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_intent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_header_perm` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_report` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_report_commect` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processes`
--

DROP TABLE IF EXISTS `processes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `sreader_id` int(11) NOT NULL,
  `step` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `last_user` int(11) NOT NULL DEFAULT '0',
  `last_action` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `project_header` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_header_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_intent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_header_perm` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `project_tags` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_report` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_report_commect` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processes`
--

LOCK TABLES `processes` WRITE;
/*!40000 ALTER TABLE `processes` DISABLE KEYS */;
INSERT INTO `processes` VALUES (1,1,0,0,'project-intent','project-intent',0,'','','','','','','','',1,'2014-02-20 00:00:00','2014-02-20 00:00:00'),(2,2,0,0,'project-intent','project-intent',0,'','','','','','','','',1,'2014-02-20 00:00:00','2014-02-20 00:00:00');
/*!40000 ALTER TABLE `processes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `email_validated` int(11) NOT NULL DEFAULT '0',
  `email_code` varchar(256) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'st1','necdetper@gmail.com','edba4817f374729d6eab02742cf9ef740b13020e','student',2,'0d2eb1dc589c680eca575cfe03d37d9f48a2c444','2014-02-11 23:11:34','2014-04-06 15:58:39'),(2,'st2','','edba4817f374729d6eab02742cf9ef740b13020e','student',0,'','2014-02-11 23:11:34','2014-03-19 03:43:40'),(3,'st3',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','student',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34'),(4,'st4',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','student',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34'),(5,'in1','necdetper@gmail.com','edba4817f374729d6eab02742cf9ef740b13020e','instructor',2,'9bbaa17d93167a25b4108fa1d7d946ceaca1e0db','2014-02-11 23:11:34','2014-04-06 15:59:53'),(6,'in2','','edba4817f374729d6eab02742cf9ef740b13020e','instructor',0,'','2014-02-11 23:11:34','2014-03-19 04:52:51'),(7,'in3',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','instructor',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34'),(8,'in4',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','instructor',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34'),(9,'pia',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','pia',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34'),(10,'bpdk',NULL,'edba4817f374729d6eab02742cf9ef740b13020e','bpdk',0,'','2014-02-11 23:11:34','2014-02-11 23:11:34');
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

-- Dump completed on 2014-04-06 16:01:56
