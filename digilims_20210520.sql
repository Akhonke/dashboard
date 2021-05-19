-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: digilims
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1-log

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
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_start_date` datetime NOT NULL,
  `assessment_end_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `assessment_type` varchar(255) NOT NULL,
  `submission_type` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `unit_standard` varchar(255) NOT NULL,
  `programme_name` varchar(255) DEFAULT NULL,
  `programme_number` varchar(255) DEFAULT NULL,
  `intervention_name` varchar(255) DEFAULT NULL,
  `upload_learner_guide` varchar(255) NOT NULL,
  `upload_learner_workbook` varchar(255) NOT NULL,
  `upload_learner_poe` varchar(255) NOT NULL,
  `upload_facilitator_guide` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_role` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `module_id` int(11) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `learning_programme` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment`
--

LOCK TABLES `assessment` WRITE;
/*!40000 ALTER TABLE `assessment` DISABLE KEYS */;
INSERT INTO `assessment` VALUES (1,'2021-05-03 00:00:00','2021-05-28 00:00:00','Assessment Two','formative','manual document upload',20,'1,3',NULL,NULL,'intervention name','','','','',NULL,1,'faciltator','2021-05-19 18:00:02','2021-05-19 14:47:06',7,NULL,'learning programme 1');
/*!40000 ALTER TABLE `assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_report`
--

DROP TABLE IF EXISTS `assessment_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `assesor_id` int(11) NOT NULL,
  `assesor_fullname` varchar(100) NOT NULL,
  `assesor_surname` varchar(100) NOT NULL,
  `assesment_number` varchar(70) NOT NULL,
  `assesment_date` varchar(100) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnership_sub_type` varchar(100) NOT NULL,
  `classname` varchar(100) NOT NULL,
  `unit_statndards` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_report`
--

LOCK TABLES `assessment_report` WRITE;
/*!40000 ALTER TABLE `assessment_report` DISABLE KEYS */;
INSERT INTO `assessment_report` VALUES (1,4,3,3,3,'Noxolo','Grootboom','1st','2021-01-22',4,'2','Coal','16'),(4,13,1,1,1,'Slash Technology','Assessor','2nd','2021-03-08',13,'14','Introduction','12,16,24,25,27,28');
/*!40000 ALTER TABLE `assessment_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment_report_learner`
--

DROP TABLE IF EXISTS `assessment_report_learner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessment_report_learner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_report_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `overallcmnt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment_report_learner`
--

LOCK TABLES `assessment_report_learner` WRITE;
/*!40000 ALTER TABLE `assessment_report_learner` DISABLE KEYS */;
INSERT INTO `assessment_report_learner` VALUES (1,1,6,'Good','You can do better'),(2,1,5,'Fair','Pull up your socks'),(3,1,3,'Excellent','Perfect'),(4,1,2,'',''),(5,2,8,'veryy gooodd','norml good'),(6,3,8,'very ggod','normal'),(7,4,38,'Good performance','Well Done'),(8,4,37,'Good Performance ','Well Done');
/*!40000 ALTER TABLE `assessment_report_learner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessor`
--

DROP TABLE IF EXISTS `assessor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assessor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `acreditations` varchar(150) NOT NULL,
  `acreditations_file` varchar(1000) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `trainer_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessor`
--

LOCK TABLES `assessor` WRITE;
/*!40000 ALTER TABLE `assessor` DISABLE KEYS */;
INSERT INTO `assessor` VALUES (1,13,1,'Slash Technology','Assessor','Northern Cape Correct One','Frances Baard','','Warrenton','264','slash ','slash','456','assessor@gmail.com','1254789654412','158742563','254189654','','','',2,1,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 05:37:52','2021-02-02 05:34:06'),(2,4,3,'Menzi','Ngubane','Western Cape Correct One','Central Karoo','','Beaufort West','Beaufort','Kangala','Msholozi Avenue','555','menzi@gmail.com','8658985892365','125478565','236985412','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:4:\"UDBN\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 15:42:32','2021-01-20 15:42:32'),(3,4,3,'Noxolo','Grootboom','North West correct one','Dr Kenneth Kaunda','','Wolmaransstad','Maquassi','Gezina','Pretorious Street','','noxolo@gmail.com','2536987458','122455555','147852369','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:3:\"TUT\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-21 02:50:05','2021-01-21 02:50:05'),(4,1,1,'dxvfchfgjfd','dfgdfg','Limpopo','Koloti','','Bela Bela  Warmbad','Capricorn','Mumbai','aqas','232','driver1asse@gmail.com','shree@1234567','666666666','123123123','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:1:\"w\";s:18:\"acreditations_file\";s:16:\"1611309479_0.png\";}}',2,4,4,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-22 09:55:28','2021-01-22 09:57:59'),(5,1,1,'sdsds','dfsdf','Mpumalanga Correct one','Gert Sibande','','Piet Retief','241','fhfhgf','hghjghj','454','fsdfds@gmail.com','wrwere4456565','454645646','465646666','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1611649908_0.png\";}}',2,1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-26 08:29:16','2021-01-26 08:31:48'),(6,4,3,'Zolile','Mbonani','Western Cape Correct One','Overberg','','Bredasdorp','Cape','Mabopane','Eleventh Avenue','','zolile@gmail.com','6985478569875','625478965','569874587','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:3:\"WCU\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-26 13:06:50','2021-01-26 13:06:50'),(7,10,11,'Willy Maina','Maina','Mpumalanga Correct one','Ehlanzeni','','Bushbuckridge','Bushbuckridge','Johannesburg','Bend StreetBlairgowrie','1235','wmunyambu@live.com','1234567891011','113267333','740740732','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1613116898_0.jpg\";}}',2,5,5,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-02-12 08:01:38','2021-02-12 08:01:38'),(8,243,17,'Mosupi ','Khhnoana','North West correct one','Bojanala Platinum','','Rustenburg','Rustenburg','Rustenburg','Lucas Mangope','123','deepertwin@gmail.com','710312 3647 085','714656415','714656415','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-19 05:43:44','2021-02-19 05:43:44'),(9,243,17,'Vuyiswa ','Mtsweni','Gauteng','City Of Tshwane','','Soshanguve','City','Soshanguve','Molefe Makinta','123','teboho@tpntrading.co.za','7902110449089','110575352','784006697','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-21 11:21:32','2021-02-21 11:21:32'),(10,13,1,'Lerato','Phato','Mpumalanga','Nkangala','','Siyabuswa','Dr','Limbombo','Mahlathi Street','152','lerato@gmail.com','8504123662081','115584748','732501634','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:18:\"Food and Beverages\";s:18:\"acreditations_file\";s:16:\"1614944144_0.png\";}}',2,1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-05 11:35:44','2021-03-05 11:35:44');
/*!40000 ALTER TABLE `assessor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_id` int(11) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `learner_id_number` varchar(255) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `learnership_id` int(11) NOT NULL,
  `learnership_sub_type` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `training_provider` varchar(255) NOT NULL,
  `organization` int(11) NOT NULL,
  `projectmanager` varchar(255) NOT NULL,
  `day` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `learner_present` varchar(100) NOT NULL COMMENT 'Yes/No',
  `reason` varchar(255) NOT NULL,
  `attachment_one` varchar(255) NOT NULL,
  `attachment_two` varchar(255) NOT NULL,
  `assessor_id` int(11) NOT NULL,
  `facilitator` varchar(255) NOT NULL,
  `week_start_date` date NOT NULL,
  `week_date` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,0,'','','',4,'2','2','Multichoice',4,'3','','','2021','','','9cf9e310045fa8157b9982213f6cd2f1.docx','',3,'Songezo','0000-00-00','2021-01-22',1,3,'2021-01-21 02:57:02','2021-01-21 02:57:02'),(4,0,'','','',1,'1','1','Slash Training Provider',1,'1','','','2021','','','d2e3f3bd7b79d6d20da5bfc3f8365062.png','',1,'Slash Technology','0000-00-00','2021-01-24',1,1,'2021-01-23 05:48:41','2021-01-27 10:49:03'),(5,0,'','','',7,'6','5','Slash Training Provider',1,'1','','','2011','','','ebe240db18a61003a4f098be3b6e8e7a.png','',1,'Slash Technology','0000-00-00','2021-01-20',1,1,'2021-01-26 09:37:48','2021-01-26 09:37:48'),(8,0,'','','',10,'10','9','Multichoice',4,'3','','','2021','','','8e4c7a491e5394b84164d61fe92e96dc.docx','',3,'Songezo','0000-00-00','2021-01-25',1,3,'2021-01-26 13:23:45','2021-01-26 13:23:45'),(9,0,'','','',1,'6','1','Slash Training Provider',1,'1','','','2021','','','fb18ff70ea2e0486cec9aa6fb9668ea0.xlsx','',1,'1','0000-00-00','2021-01-08',1,0,'2021-01-27 10:30:38','2021-01-28 06:35:20'),(10,0,'','','',7,'1','1','Slash Training Provider',1,'1','','','2021','','','9c9f35aa2ff9657a74a0114ce0e3937d.png','',1,'1','0000-00-00','2021-01-27',1,0,'2021-01-27 10:42:39','2021-01-29 09:26:13'),(11,0,'','','',1,'1','1','Slash Training Provider',1,'1','','','2021','','','d64d93066bc7dbe472d56ebb08351070.xlsx','',1,'Slash Technology','0000-00-00','2021-01-27',1,1,'2021-01-27 10:48:44','2021-01-28 08:35:42'),(12,0,'','','',1,'1','1','Slash Training Provider',1,'1','','','','','','39c70d99f11d6eb538cc1ee530277b3d.jpg','',1,'Slash Technology','2021-01-27','2021-01-30',1,1,'2021-01-28 10:47:47','2021-01-28 10:47:47'),(13,0,'','','',7,'6','1','Slash Training Provider',1,'1','','','','','','e05442c76cd765e2741ab36ef9d5784a.png','',1,'Slash Technology','2021-01-20','2021-01-30',1,1,'2021-01-28 11:43:46','2021-01-28 11:44:41'),(14,0,'','','',0,'6','7th','Slash Training Provider',0,'','','','','','','256cc97ed2b1e2a5da92bf56a0206352.jpg','',0,'1','2021-01-28','2021-01-31',1,0,'2021-01-28 12:50:11','2021-01-28 12:50:11'),(15,0,'','','',0,'6','7th','Slash Training Provider',0,'','','','','','','129d8cc11403c13f4531021dfc2b12de.jpg','',0,'1','2021-01-28','2021-01-30',1,0,'2021-01-28 13:26:24','2021-01-28 13:26:24'),(16,0,'','','',0,'6','7th','Slash Training Provider',0,'','','','','','','0c891d7f6c0aed84acc1318b111cd3b8.png','',0,'1','0000-00-00','2021-01-28',1,0,'2021-01-28 13:28:30','2021-01-28 13:28:30'),(17,0,'','','',0,'1','slash','Slash Training Provider',0,'','','','','','','6a6c64986196c18980c14031d3727d53.png','',0,'1','2021-01-14','2021-01-20',1,0,'2021-01-29 09:30:03','2021-01-29 09:30:03'),(18,0,'','','',0,'1','slash','Slash Training Provider',0,'','','','','','','91f1eecb01ae8b04eb31e0c6df3106a2.png','',0,'1','2021-01-21','2021-01-27',1,0,'2021-01-29 09:31:25','2021-01-29 09:31:25'),(19,0,'','','',0,'1','1','Slash Training Provider',0,'','','','','','','0113ba30f22b51a9ab1f3f680759cc4a.png','',0,'1','2021-01-29','2021-02-05',1,0,'2021-01-29 09:37:45','2021-01-29 09:37:45'),(20,0,'','','',7,'','12','Slash Training Provider',13,'1','','','','','','945b0909b8135c60d383bff268fdf1f0.png','',1,'Slash Technology','2021-02-02','2021-02-03',1,1,'2021-02-02 10:26:09','2021-02-02 13:10:10'),(21,0,'','','',7,'6','12','Slash Training Provider',13,'1','','','','','','854025f64ce80e8627e6dbd78ab5d1ed.jpg','',1,'Slash Technology','2021-02-03','2021-02-04',1,1,'2021-02-02 13:13:46','2021-02-02 13:13:46'),(22,0,'','','',0,'6','12','Slash Training Provider',0,'','','','','','','011ec9dcd77b7472bd814fd1bbd97ea0.jpg','',0,'1','2021-02-02','2021-02-03',1,0,'2021-02-02 13:35:54','2021-02-02 13:35:54'),(23,0,'','','',1,'1','1','Slash Training Provider',13,'1','','','','','','92c67d90f541b8695b828adf43946859.jpg','',1,'Slash Technology','2021-02-17','2021-02-18',1,1,'2021-02-03 07:44:19','2021-02-03 07:44:19'),(24,0,'','','',0,'6','12','Slash Training Provider',0,'','','','','','','04a372155a8f7ee1c7ac4e2425c0b1b1.jpg','',0,'1','2021-02-19','2021-02-27',1,0,'2021-02-03 08:45:00','2021-02-03 08:45:00'),(25,0,'','','',0,'6','12','Slash Training Provider',0,'','','','','','','776c4c26c3d3ab440d126cd952309f83.jpg','',0,'1','2021-02-12','2021-02-19',1,0,'2021-02-03 08:46:55','2021-02-03 08:46:55'),(26,0,'','','',7,'6','5','Slash Training Provider',0,'','','','','','','a4c0640ee8b8ff4b5c0519794a6de91d.png','',0,'1','2021-02-17','2021-02-12',1,0,'2021-02-03 08:52:57','2021-02-03 08:52:57'),(27,0,'','','',1,'1','1','Slash Training Provider',0,'','','','','','','c7dac05d1386586765b6c9e4949f76df.png','',0,'1','2021-02-19','2021-02-24',1,0,'2021-02-03 09:00:04','2021-02-03 09:00:04'),(28,0,'','','',1,'1','1','Slash Training Provider',13,'1','','','','','','eff0df80614978abb43da9d651921cd0.jpg','',1,'Slash Technology','2021-02-04','2021-02-05',1,1,'2021-02-04 11:48:12','2021-02-04 11:48:12'),(29,0,'','','',1,'1','1','Slash Training Provider',13,'1','','','','','','e128d9287f0e2df6f9dfb6840924dca5.jpg','',1,'Slash Technology','2021-02-04','2021-02-05',1,1,'2021-02-04 11:48:13','2021-02-04 11:48:13'),(30,0,'','','',13,'14','16','Slash Training Provider',13,'1','','','','','','94c36d4f67bef1f08c9fa36b200716b6.png','',1,'James','2021-03-01','2021-03-07',1,1,'2021-03-05 08:07:52','2021-03-05 08:07:52'),(31,0,'','','',13,'14','16','Slash Training Provider',0,'','','','','','','283f4c75c969ab15e1f9fd6a96f8a91e.png','',0,'1','2021-03-01','2021-03-05',1,0,'2021-03-10 15:05:27','2021-03-10 15:05:27');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `status` int(100) NOT NULL COMMENT '1-active ',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (3,'Capitec Bank Limited',1,'2020-09-14 12:44:10','2020-09-14 12:07:01'),(2,'Bidvest Bank Limited',0,'2020-09-14 12:03:53','2020-09-14 12:03:53'),(4,'Boston',0,'2020-09-16 13:13:45','2020-09-16 13:13:45'),(5,'Imperial Bank South Africa',0,'2020-10-16 06:20:57','2020-09-16 13:17:25'),(6,'sds',0,'2020-10-16 06:18:23','2020-09-16 13:20:44'),(7,'Boston',0,'2021-01-22 07:52:06','2020-09-16 13:58:08'),(8,'Bank of Baroda',1,'2021-01-22 07:52:01','2020-09-18 06:10:24'),(9,'Cambridge',1,'2021-01-22 07:44:17','2020-09-18 06:14:27'),(10,'Cambridge',1,'2021-01-22 07:45:34','2020-09-18 06:14:46'),(11,'Capitec',1,'2021-01-22 07:50:55','2020-09-30 11:37:17'),(12,'Mthatha bank',1,'2021-01-22 07:50:51','2020-09-30 11:38:01'),(13,'Investec Bank Limited',1,'2021-01-22 07:50:47','2020-10-16 08:35:12'),(14,'Tyme Bank',0,'2021-01-28 14:52:12','2021-01-20 11:37:15'),(15,'d5354fgdfdhdgh',0,'2021-01-22 08:36:08','2021-01-22 08:36:03');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `province_id` varchar(100) NOT NULL,
  `district_id` varchar(100) NOT NULL,
  `region_id` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=660 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (639,0,'Western Cape','Cape Winelands','','Stellenbosch','2021-02-20 15:04:31','2021-02-20 15:04:31'),(638,0,'Western Cape','Cape Winelands','','Ashton','2021-02-20 15:03:40','2021-02-20 15:03:40'),(637,0,'Western Cape','Cape Winelands','','Paarl','2021-02-20 15:03:30','2021-02-20 15:03:30'),(636,0,'Western Cape','Cape Winelands','','Worcester','2021-02-20 15:03:18','2021-02-20 15:03:18'),(633,0,'Northern Cape','ZF Mgcawu','','Kakamas','2021-02-20 14:32:23','2021-02-20 14:32:23'),(634,0,'Northern Cape','ZF Mgcawu','','Danielskuil','2021-02-20 14:32:44','2021-02-20 14:32:44'),(635,0,'Northern Cape','ZF Mgcawu','','Postmasburg','2021-02-20 14:32:58','2021-02-20 14:32:58'),(352,0,'Mpumalanga','Ehlanzeni','','Bushbuckridge','2021-02-20 07:10:11','2021-02-20 07:10:11'),(353,0,'Mpumalanga','Ehlanzeni','','Nelspruit','2021-02-20 07:10:24','2021-02-20 07:10:24'),(354,0,'Mpumalanga','Ehlanzeni','','Malalane','2021-02-20 07:10:40','2021-02-20 07:10:40'),(355,0,'Mpumalanga','Ehlanzeni','','Lydenburg','2021-02-20 07:10:58','2021-02-20 07:10:58'),(356,0,'Mpumalanga','Gert Sibande','','Carolina','2021-02-20 07:13:21','2021-02-20 07:13:21'),(357,0,'Mpumalanga','Gert Sibande','','Balfour','2021-02-20 07:13:34','2021-02-20 07:13:34'),(358,0,'Mpumalanga','Gert Sibande','','Secunda','2021-02-20 07:13:46','2021-02-20 07:13:46'),(359,0,'Mpumalanga','Gert Sibande','','Standerton','2021-02-20 07:14:00','2021-02-20 07:14:00'),(360,0,'Mpumalanga','Gert Sibande','','Piet Retief','2021-02-20 07:14:13','2021-02-20 07:14:13'),(361,0,'Mpumalanga','Gert Sibande','','Ermelo','2021-02-20 07:14:30','2021-02-20 07:14:30'),(362,0,'Mpumalanga','Gert Sibande','','Volksrust','2021-02-20 07:14:44','2021-02-20 07:14:44'),(363,0,'Mpumalanga','Nkangala','','Siyabuswa','2021-02-20 07:17:52','2021-02-20 07:17:52'),(364,0,'Mpumalanga','Nkangala','','Belfast','2021-02-20 07:18:06','2021-02-20 07:18:06'),(365,0,'Mpumalanga','Nkangala','','eMalahleni','2021-02-20 07:18:21','2021-02-20 07:18:21'),(366,0,'Mpumalanga','Nkangala','','Middelburg','2021-02-20 07:18:37','2021-02-20 07:18:37'),(367,0,'Mpumalanga','Nkangala','','eMpumalanga','2021-02-20 07:18:55','2021-02-20 07:18:55'),(368,0,'Mpumalanga','Nkangala','','Delmas','2021-02-20 07:19:14','2021-02-20 07:19:14'),(369,0,'Eastern Cape','Alfred Nzo','','Matatiele','2021-02-20 08:16:58','2021-02-20 08:16:58'),(370,0,'Eastern Cape','Alfred Nzo','','Bizana','2021-02-20 08:17:17','2021-02-20 08:17:17'),(371,0,'Eastern Cape','Alfred Nzo','','Ntabankulu','2021-02-20 08:17:29','2021-02-20 08:17:29'),(372,0,'Eastern Cape','Alfred Nzo','','Ntabankulu','2021-02-20 08:17:30','2021-02-20 08:17:30'),(373,0,'Eastern Cape','Alfred Nzo','','Mount Frere','2021-02-20 08:17:45','2021-02-20 08:17:45'),(374,0,'Eastern Cape','Amathole','','Stutterheim','2021-02-20 08:19:47','2021-02-20 08:19:47'),(375,0,'Eastern Cape','Amathole','','Komga','2021-02-20 08:19:59','2021-02-20 08:19:59'),(376,0,'Eastern Cape','Amathole','','Dutywa','2021-02-20 08:20:17','2021-02-20 08:20:17'),(377,0,'Eastern Cape','Amathole','','Gcuwa','2021-02-20 08:20:29','2021-02-20 08:20:29'),(378,0,'Eastern Cape','Amathole','','Peddie','2021-02-20 08:20:42','2021-02-20 08:20:42'),(379,0,'Eastern Cape','Amathole','','Alice','2021-02-20 08:20:58','2021-02-20 08:20:58'),(380,0,'Eastern Cape','Chris Hani','','Lady Frere','2021-02-20 08:23:59','2021-02-20 08:23:59'),(381,0,'Eastern Cape','Chris Hani','','Ngcobo','2021-02-20 08:24:12','2021-02-20 08:24:12'),(382,0,'Eastern Cape','Chris Hani','','Queenstown','2021-02-20 08:24:26','2021-02-20 08:24:26'),(383,0,'Eastern Cape','Chris Hani','','Cofimvaba','2021-02-20 08:24:40','2021-02-20 08:24:40'),(384,0,'Eastern Cape','Chris Hani','','Cradock','2021-02-20 08:24:52','2021-02-20 08:24:52'),(385,0,'Eastern Cape','Chris Hani','','Cala','2021-02-20 08:25:05','2021-02-20 08:25:05'),(386,0,'Eastern Cape','Joe Gqabi','','Maclear','2021-02-20 08:27:45','2021-02-20 08:27:45'),(390,0,'Eastern Cape','Joe Gqabi','','Lady Grey','2021-02-20 08:31:28','2021-02-20 08:31:28'),(391,0,'Eastern Cape','Joe Gqabi','','Burgersdorp','2021-02-20 08:31:52','2021-02-20 08:31:52'),(392,0,'Eastern Cape','OR Tambo','','Flagstaff','2021-02-20 08:34:58','2021-02-20 08:34:58'),(393,0,'Eastern Cape','OR Tambo','','Mthatha','2021-02-20 08:35:13','2021-02-20 08:35:13'),(394,0,'Eastern Cape','OR Tambo','','Qumbu','2021-02-20 08:35:30','2021-02-20 08:35:30'),(395,0,'Eastern Cape','OR Tambo','','Libode','2021-02-20 08:35:47','2021-02-20 08:35:47'),(396,0,'Eastern Cape','OR Tambo','','Port St Johns','2021-02-20 08:36:01','2021-02-20 08:36:01'),(397,0,'Eastern Cape','Sarah Baartman','','Somerset East','2021-02-20 08:38:19','2021-02-20 08:38:19'),(398,0,'Eastern Cape','Sarah Baartman','','Graaff Reinet','2021-02-20 08:38:41','2021-02-20 08:38:41'),(399,0,'Eastern Cape','Sarah Baartman','','Kareedouw','2021-02-20 08:38:58','2021-02-20 08:38:58'),(400,0,'Eastern Cape','Sarah Baartman','','Jeffreys Bay','2021-02-20 08:39:12','2021-02-20 08:39:12'),(401,0,'Eastern Cape','Sarah Baartman','','Grahamstown','2021-02-20 08:39:27','2021-02-20 08:39:27'),(402,0,'Eastern Cape','Sarah Baartman','','Port Alfred','2021-02-20 08:39:42','2021-02-20 08:39:42'),(403,0,'Eastern Cape','Sarah Baartman','','Kirkwood','2021-02-20 08:39:56','2021-02-20 08:39:56'),(405,0,'Free State','Fezile Dabi','','Frankfort	','2021-02-20 08:50:20','2021-02-20 08:50:20'),(406,0,'Free State','Fezile Dabi','','Sasolburg','2021-02-20 08:50:35','2021-02-20 08:50:35'),(407,0,'Free State','Fezile Dabi','','Kroonstad','2021-02-20 08:50:48','2021-02-20 08:50:48'),(408,0,'Free State','Fezile Dabi','','Parys','2021-02-20 08:51:01','2021-02-20 08:51:01'),(409,0,'Free State','Lejweleputswa','','Theunissen','2021-02-20 08:53:25','2021-02-20 08:53:25'),(410,0,'Free State','Lejweleputswa','','Welkom','2021-02-20 08:53:45','2021-02-20 08:53:45'),(411,0,'Free State','Lejweleputswa','','Bothaville','2021-02-20 08:54:12','2021-02-20 08:54:12'),(412,0,'Free State','Lejweleputswa','','Boshof','2021-02-20 08:54:30','2021-02-20 08:54:30'),(413,0,'Free State','Lejweleputswa','','Bultfontein','2021-02-20 08:54:41','2021-02-20 08:54:41'),(632,0,'Northern Cape','ZF Mgcawu','','Upington','2021-02-20 14:32:11','2021-02-20 14:32:11'),(416,0,'Free State','Thabo Mofutsanyana','','Bethlehem','2021-02-20 09:01:02','2021-02-20 09:01:02'),(417,0,'Free State','Thabo Mofutsanyana','','Phuthaditjhaba','2021-02-20 09:01:15','2021-02-20 09:01:15'),(418,0,'Free State','Thabo Mofutsanyana','','Ladybrand','2021-02-20 09:01:31','2021-02-20 09:01:31'),(419,0,'Free State','Thabo Mofutsanyana','','Reitz','2021-02-20 09:01:45','2021-02-20 09:01:45'),(420,0,'Free State','Thabo Mofutsanyana','','Vrede','2021-02-20 09:02:02','2021-02-20 09:02:02'),(421,0,'Free State','Thabo Mofutsanyana','','Ficksburg','2021-02-20 09:02:18','2021-02-20 09:02:18'),(422,0,'Free State','Xhariep','','Trompsburg','2021-02-20 09:05:00','2021-02-20 09:05:00'),(423,0,'Free State','Xhariep','','Koffiefontein','2021-02-20 09:05:15','2021-02-20 09:05:15'),(424,0,'Free State','Xhariep','','Zastron','2021-02-20 09:05:30','2021-02-20 09:05:30'),(425,0,'Gauteng','Johannesburg','','Alexandra','2021-02-20 09:12:50','2021-02-20 09:12:50'),(426,0,'Gauteng','Johannesburg','','Chartwell','2021-02-20 09:13:08','2021-02-20 09:13:08'),(427,0,'Gauteng','Johannesburg','','City of Johannesburg nonurban','2021-02-20 09:13:38','2021-02-20 09:13:38'),(428,0,'Gauteng','Johannesburg','','Dainfern','2021-02-20 09:13:50','2021-02-20 09:13:50'),(429,0,'Gauteng','Johannesburg','','Diepsloot','2021-02-20 09:14:09','2021-02-20 09:14:09'),(430,0,'Gauteng','Johannesburg','','Drie Ziek','2021-02-20 09:14:22','2021-02-20 09:14:22'),(431,0,'Gauteng','Johannesburg','','Ebony Park','2021-02-20 09:14:38','2021-02-20 09:14:38'),(432,0,'Gauteng','Johannesburg','','Ennerdale','2021-02-20 09:14:51','2021-02-20 09:14:51'),(433,0,'Gauteng','Johannesburg','','Farmall','2021-02-20 09:15:10','2021-02-20 09:15:10'),(434,0,'Gauteng','Johannesburg','','Itsoseng','2021-02-20 09:15:22','2021-02-20 09:15:22'),(435,0,'Gauteng','Johannesburg','','Ivory Park','2021-02-20 09:15:41','2021-02-20 09:15:41'),(436,0,'Gauteng','Johannesburg','','Johannesburg','2021-02-20 09:15:55','2021-02-20 09:15:55'),(437,0,'Gauteng','Johannesburg','','Kaalfontein','2021-02-20 09:16:12','2021-02-20 09:16:12'),(438,0,'Gauteng','Johannesburg','','Kagiso','2021-02-20 09:16:39','2021-02-20 09:16:39'),(439,0,'Gauteng','Johannesburg','','Kanana Park','2021-02-20 09:16:52','2021-02-20 09:16:52'),(440,0,'Gauteng','Johannesburg','','Lakeside','2021-02-20 09:17:04','2021-02-20 09:17:04'),(441,0,'Gauteng','Johannesburg','','Lanseria','2021-02-20 09:17:22','2021-02-20 09:17:22'),(442,0,'Gauteng','Johannesburg','','Lawley','2021-02-20 09:17:34','2021-02-20 09:17:34'),(443,0,'Gauteng','Johannesburg','','Lehae','2021-02-20 09:17:51','2021-02-20 09:17:51'),(444,0,'Gauteng','Johannesburg','','Lenasia','2021-02-20 09:18:03','2021-02-20 09:18:03'),(445,0,'Gauteng','Johannesburg','','Lenasia South','2021-02-20 09:18:15','2021-02-20 09:18:15'),(446,0,'Gauteng','Johannesburg','','Lucky Seven','2021-02-20 09:18:35','2021-02-20 09:18:35'),(447,0,'Gauteng','Johannesburg','','Malatjie','2021-02-20 09:18:52','2021-02-20 09:18:52'),(448,0,'Gauteng','Johannesburg','','Mayibuye','2021-02-20 09:19:06','2021-02-20 09:19:06'),(449,0,'Gauteng','Johannesburg','','Midrand','2021-02-20 09:19:19','2021-02-20 09:19:19'),(450,0,'Gauteng','Johannesburg','','Millgate Farm','2021-02-20 09:19:30','2021-02-20 09:19:30'),(451,0,'Gauteng','Johannesburg','','Orange Farm','2021-02-20 09:19:43','2021-02-20 09:19:43'),(452,0,'Gauteng','Johannesburg','','Poortjie','2021-02-20 09:19:58','2021-02-20 09:19:58'),(453,0,'Gauteng','Johannesburg','','Rabie Ridge','2021-02-20 09:20:12','2021-02-20 09:20:12'),(454,0,'Gauteng','Johannesburg','','Randburg','2021-02-20 09:20:24','2021-02-20 09:20:24'),(455,0,'Gauteng','Johannesburg','','Randfontein','2021-02-20 09:20:36','2021-02-20 09:20:36'),(456,0,'Gauteng','Johannesburg','','Rietfontein','2021-02-20 09:20:50','2021-02-20 09:20:50'),(457,0,'Gauteng','Johannesburg','','Roodepoort','2021-02-20 09:21:01','2021-02-20 09:21:01'),(458,0,'Gauteng','Johannesburg','','Sandton','2021-02-20 09:21:12','2021-02-20 09:21:12'),(459,0,'Gauteng','Johannesburg','','Soweto','2021-02-20 09:21:26','2021-02-20 09:21:26'),(460,0,'Gauteng','Johannesburg','','Stretford','2021-02-20 09:21:37','2021-02-20 09:21:37'),(461,0,'Gauteng','Johannesburg','','Tshepisong','2021-02-20 09:21:49','2021-02-20 09:21:49'),(462,0,'Gauteng','Johannesburg','','Vlakfontein','2021-02-20 09:22:02','2021-02-20 09:22:02'),(463,0,'Gauteng','Johannesburg','','Zakariyya Park','2021-02-20 09:22:17','2021-02-20 09:22:17'),(464,0,'Gauteng','Johannesburg','','Zevenfontein','2021-02-20 09:22:33','2021-02-20 09:22:33'),(465,0,'Gauteng','City Of Tshwane','','Akasia','2021-02-20 09:48:02','2021-02-20 09:48:02'),(466,0,'Gauteng','City Of Tshwane','','Atteridgeville','2021-02-20 09:48:14','2021-02-20 09:48:14'),(467,0,'Gauteng','City Of Tshwane','','Baviaanspoort','2021-02-20 09:48:26','2021-02-20 09:48:26'),(468,0,'Gauteng','City Of Tshwane','','Bon Accord','2021-02-20 09:48:37','2021-02-20 09:48:37'),(469,0,'Gauteng','City Of Tshwane','','Boschkop','2021-02-20 09:48:46','2021-02-20 09:48:46'),(470,0,'Gauteng','City Of Tshwane','','Bronkhorstspruit','2021-02-20 09:48:58','2021-02-20 09:48:58'),(471,0,'Gauteng','City Of Tshwane','','Bultfontein','2021-02-20 09:49:07','2021-02-20 09:49:07'),(472,0,'Gauteng','City Of Tshwane','','Centurion','2021-02-20 09:49:19','2021-02-20 09:49:19'),(473,0,'Gauteng','City Of Tshwane','','Cullinan','2021-02-20 09:49:29','2021-02-20 09:49:29'),(474,0,'Gauteng','City Of Tshwane','','Dilopye','2021-02-20 09:49:39','2021-02-20 09:49:39'),(475,0,'Gauteng','City Of Tshwane','','Donkerhoek','2021-02-20 09:49:50','2021-02-20 09:49:50'),(476,0,'Gauteng','City Of Tshwane','','Eersterust','2021-02-20 09:49:59','2021-02-20 09:49:59'),(477,0,'Gauteng','City Of Tshwane','','Ekangala','2021-02-20 09:50:10','2021-02-20 09:50:10'),(478,0,'Gauteng','City Of Tshwane','','Ga Rankuwa','2021-02-20 09:50:31','2021-02-20 09:50:31'),(479,0,'Gauteng','City Of Tshwane','','Haakdoornboom','2021-02-20 09:50:42','2021-02-20 09:50:42'),(480,0,'Gauteng','City Of Tshwane','','Hammanskraal','2021-02-20 09:50:52','2021-02-20 09:50:52'),(481,0,'Gauteng','City Of Tshwane','','Hebron','2021-02-20 09:51:05','2021-02-20 09:51:05'),(482,0,'Gauteng','City Of Tshwane','','Kameeldrift','2021-02-20 09:51:18','2021-02-20 09:51:18'),(483,0,'Gauteng','City Of Tshwane','','Kekana Garden','2021-02-20 09:51:32','2021-02-20 09:51:32'),(484,0,'Gauteng','City Of Tshwane','','Kungwini Part Two','2021-02-20 09:51:51','2021-02-20 09:51:51'),(485,0,'Gauteng','City Of Tshwane','','Laudium','2021-02-20 09:52:12','2021-02-20 09:52:12'),(486,0,'Gauteng','City Of Tshwane','','Mabopane','2021-02-20 09:52:26','2021-02-20 09:52:26'),(487,0,'Gauteng','City Of Tshwane','','Majaneng','2021-02-20 09:52:39','2021-02-20 09:52:39'),(488,0,'Gauteng','City Of Tshwane','','Mamelodi','2021-02-20 09:52:52','2021-02-20 09:52:52'),(489,0,'Gauteng','City Of Tshwane','','Mandela Village','2021-02-20 09:53:03','2021-02-20 09:53:03'),(490,0,'Gauteng','City Of Tshwane','','Marokolong','2021-02-20 09:53:12','2021-02-20 09:53:12'),(491,0,'Gauteng','City Of Tshwane','','Mashemong','2021-02-20 09:53:23','2021-02-20 09:53:23'),(492,0,'Gauteng','City Of Tshwane','','Mooiplaas','2021-02-20 09:53:33','2021-02-20 09:53:33'),(493,0,'Gauteng','City Of Tshwane','','Nellmapius','2021-02-20 09:53:50','2021-02-20 09:53:50'),(494,0,'Gauteng','City Of Tshwane','','New Eersterus','2021-02-20 09:54:06','2021-02-20 09:54:06'),(495,0,'Gauteng','City Of Tshwane','','Olievenhoutbos','2021-02-20 09:54:18','2021-02-20 09:54:18'),(496,0,'Gauteng','City Of Tshwane','','Onverwacht','2021-02-20 09:54:30','2021-02-20 09:54:30'),(497,0,'Gauteng','City Of Tshwane','','Pretoria','2021-02-20 09:54:42','2021-02-20 09:54:42'),(498,0,'Gauteng','City Of Tshwane','','Ramotse','2021-02-20 09:54:55','2021-02-20 09:54:55'),(499,0,'Gauteng','City Of Tshwane','','Rayton','2021-02-20 09:55:08','2021-02-20 09:55:08'),(500,0,'Gauteng','City Of Tshwane','','Refilwe','2021-02-20 09:55:17','2021-02-20 09:55:17'),(501,0,'Gauteng','City Of Tshwane','','Rethabiseng','2021-02-20 09:55:27','2021-02-20 09:55:27'),(502,0,'Gauteng','City Of Tshwane','','Roodepoort B','2021-02-20 09:55:52','2021-02-20 09:55:52'),(503,0,'Gauteng','City Of Tshwane','','Saulsville','2021-02-20 09:56:05','2021-02-20 09:56:05'),(504,0,'Gauteng','City Of Tshwane','','Soshanguve','2021-02-20 09:56:20','2021-02-20 09:56:20'),(505,0,'Gauteng','Ekurhuleni','','Alberton','2021-02-20 10:17:47','2021-02-20 10:17:47'),(506,0,'Gauteng','Ekurhuleni','','Benoni','2021-02-20 10:18:09','2021-02-20 10:18:09'),(507,0,'Gauteng','Ekurhuleni','','Boksburg','2021-02-20 10:18:23','2021-02-20 10:18:23'),(508,0,'Gauteng','Ekurhuleni','','Brakpan','2021-02-20 10:18:33','2021-02-20 10:18:33'),(509,0,'Gauteng','Ekurhuleni','','Daveyton','2021-02-20 10:18:48','2021-02-20 10:18:48'),(510,0,'Gauteng','Ekurhuleni','','Duduza','2021-02-20 10:19:00','2021-02-20 10:19:00'),(511,0,'Gauteng','Ekurhuleni','','Edenvale','2021-02-20 10:19:12','2021-02-20 10:19:12'),(512,0,'Gauteng','Ekurhuleni','','Etwatwa','2021-02-20 10:19:22','2021-02-20 10:19:22'),(513,0,'Gauteng','Ekurhuleni','','Germiston','2021-02-20 10:19:37','2021-02-20 10:19:37'),(514,0,'Gauteng','Ekurhuleni','','Katlehong','2021-02-20 10:19:49','2021-02-20 10:19:49'),(515,0,'Gauteng','Ekurhuleni','','Kempton Park','2021-02-20 10:20:09','2021-02-20 10:20:09'),(516,0,'Gauteng','Ekurhuleni','','Kwa Thema','2021-02-20 10:20:24','2021-02-20 10:20:24'),(517,0,'Gauteng','Ekurhuleni','','Langaville','2021-02-20 10:20:40','2021-02-20 10:20:40'),(518,0,'Gauteng','Ekurhuleni','','Nigel','2021-02-20 10:20:53','2021-02-20 10:20:53'),(519,0,'Gauteng','Ekurhuleni','','Springs','2021-02-20 10:21:04','2021-02-20 10:21:04'),(520,0,'Gauteng','Ekurhuleni','','Tembisa','2021-02-20 10:21:15','2021-02-20 10:21:15'),(521,0,'Gauteng','Ekurhuleni','','Tokoza','2021-02-20 10:21:28','2021-02-20 10:21:28'),(522,0,'Gauteng','Ekurhuleni','','Tsakane','2021-02-20 10:21:40','2021-02-20 10:21:40'),(523,0,'Gauteng','Ekurhuleni','','Vosloorus','2021-02-20 10:21:51','2021-02-20 10:21:51'),(524,0,'Gauteng','Ekurhuleni','','Wattville','2021-02-20 10:22:03','2021-02-20 10:22:03'),(525,0,'Gauteng','Sedibeng','','Vanderbijlpark','2021-02-20 10:29:48','2021-02-20 10:29:48'),(526,0,'Gauteng','Sedibeng','','Heidelberg','2021-02-20 10:30:01','2021-02-20 10:30:01'),(527,0,'Gauteng','Sedibeng','','Meyerton','2021-02-20 10:30:17','2021-02-20 10:30:17'),(528,0,'Gauteng','West Rand','','Carletonville','2021-02-20 10:32:08','2021-02-20 10:32:08'),(529,0,'Gauteng','West Rand','','Krugersdorp','2021-02-20 10:32:19','2021-02-20 10:32:19'),(530,0,'Gauteng','West Rand','','Randfontein','2021-02-20 10:32:31','2021-02-20 10:32:31'),(531,0,'KwaZulu-Natal','Amajuba','','Dannhauser','2021-02-20 10:37:25','2021-02-20 10:37:25'),(532,0,'KwaZulu-Natal','Amajuba','','Utrecht','2021-02-20 10:37:45','2021-02-20 10:37:45'),(533,0,'KwaZulu-Natal','Amajuba','','Newcastle','2021-02-20 10:37:56','2021-02-20 10:37:56'),(534,0,'KwaZulu-Natal','Harry Gwala','','Creighton','2021-02-20 10:39:24','2021-02-20 10:39:24'),(535,0,'KwaZulu-Natal','Harry Gwala','','Kokstad','2021-02-20 10:39:37','2021-02-20 10:39:37'),(536,0,'KwaZulu-Natal','Harry Gwala','','Ixopo','2021-02-20 10:39:50','2021-02-20 10:39:50'),(537,0,'KwaZulu-Natal','Harry Gwala','','Umzimkhulu','2021-02-20 10:40:04','2021-02-20 10:40:04'),(538,0,'KwaZulu-Natal','King Cetshwayo','','Melmoth','2021-02-20 10:42:30','2021-02-20 10:42:30'),(539,0,'KwaZulu-Natal','King Cetshwayo','','Nkandla','2021-02-20 10:42:42','2021-02-20 10:42:42'),(540,0,'KwaZulu-Natal','King Cetshwayo','','KwaMbonambi','2021-02-20 10:42:56','2021-02-20 10:42:56'),(541,0,'KwaZulu-Natal','King Cetshwayo','','Richards Bay','2021-02-20 10:43:07','2021-02-20 10:43:07'),(542,0,'KwaZulu-Natal','King Cetshwayo','','Eshowe','2021-02-20 10:43:22','2021-02-20 10:43:22'),(543,0,'KwaZulu-Natal','Ugu','','Port Shepstone','2021-02-20 10:45:30','2021-02-20 10:45:30'),(544,0,'KwaZulu-Natal','Ugu','','Scottburgh','2021-02-20 10:45:43','2021-02-20 10:45:43'),(545,0,'KwaZulu-Natal','Ugu','','Harding','2021-02-20 10:45:55','2021-02-20 10:45:55'),(546,0,'KwaZulu-Natal','Ugu','','Mtwalume','2021-02-20 10:46:09','2021-02-20 10:46:09'),(547,0,'KwaZulu-Natal','uMgungundlovu','','Impendle','2021-02-20 10:48:19','2021-02-20 10:48:19'),(548,0,'KwaZulu-Natal','uMgungundlovu','','Camperdown','2021-02-20 10:48:33','2021-02-20 10:48:33'),(549,0,'KwaZulu-Natal','uMgungundlovu','','Mooi River','2021-02-20 10:48:46','2021-02-20 10:48:46'),(550,0,'KwaZulu-Natal','uMgungundlovu','','Pietermaritzburg','2021-02-20 10:48:59','2021-02-20 10:48:59'),(551,0,'KwaZulu-Natal','uMgungundlovu','','Richmond','2021-02-20 10:49:14','2021-02-20 10:49:14'),(552,0,'KwaZulu-Natal','uMgungundlovu','','Howick','2021-02-20 10:49:29','2021-02-20 10:49:29'),(553,0,'KwaZulu-Natal','uMgungundlovu','','Wartburg','2021-02-20 10:49:43','2021-02-20 10:49:43'),(554,0,'KwaZulu-Natal','Umkhanyakude','','Hlabisa','2021-02-20 10:52:53','2021-02-20 10:52:53'),(555,0,'KwaZulu-Natal','Umkhanyakude','','Jozini','2021-02-20 10:53:04','2021-02-20 10:53:04'),(556,0,'KwaZulu-Natal','Umkhanyakude','','Mtubatuba','2021-02-20 10:53:17','2021-02-20 10:53:17'),(557,0,'KwaZulu-Natal','Umkhanyakude','','Kwangwanase','2021-02-20 10:53:32','2021-02-20 10:53:32'),(558,0,'KwaZulu-Natal','Umzinyathi','','Dundee','2021-02-20 10:55:19','2021-02-20 10:55:19'),(559,0,'KwaZulu-Natal','Umzinyathi','','Tugela Ferry','2021-02-20 10:55:31','2021-02-20 10:55:31'),(560,0,'KwaZulu-Natal','Umzinyathi','','Nquthu','2021-02-20 10:55:44','2021-02-20 10:55:44'),(561,0,'KwaZulu-Natal','Umzinyathi','','Greytown','2021-02-20 10:55:56','2021-02-20 10:55:56'),(562,0,'KwaZulu-Natal','Uthukela','','Ladysmith','2021-02-20 10:58:03','2021-02-20 10:58:03'),(563,0,'KwaZulu-Natal','Uthukela','','Estcourt','2021-02-20 10:58:20','2021-02-20 10:58:20'),(564,0,'KwaZulu-Natal','Uthukela','','Bergville','2021-02-20 10:58:31','2021-02-20 10:58:31'),(565,0,'KwaZulu-Natal','Zululand','','Vryheid','2021-02-20 11:00:05','2021-02-20 11:00:05'),(566,0,'KwaZulu-Natal','Zululand','','Paulpietersburg','2021-02-20 11:00:19','2021-02-20 11:00:19'),(567,0,'KwaZulu-Natal','Zululand','','Nongoma','2021-02-20 11:00:30','2021-02-20 11:00:30'),(568,0,'KwaZulu-Natal','Zululand','','Ulundi','2021-02-20 11:00:41','2021-02-20 11:00:41'),(569,0,'KwaZulu-Natal','Zululand','','Pongola','2021-02-20 11:00:57','2021-02-20 11:00:57'),(570,0,'Limpopo','Capricorn','','Senwabarwana','2021-02-20 11:10:01','2021-02-20 11:10:01'),(571,0,'Limpopo','Capricorn','','Chuniespoort','2021-02-20 11:10:10','2021-02-20 11:10:10'),(572,0,'Limpopo','Capricorn','','Dendron','2021-02-20 11:10:21','2021-02-20 11:10:21'),(573,0,'Limpopo','Capricorn','','Polokwane','2021-02-20 11:10:33','2021-02-20 11:10:33'),(574,0,'Limpopo','Mopani','','Phalaborwa','2021-02-20 11:12:18','2021-02-20 11:12:18'),(575,0,'Limpopo','Mopani','','Giyani','2021-02-20 11:12:27','2021-02-20 11:12:27'),(576,0,'Limpopo','Mopani','','Modjadjiskloof','2021-02-20 11:12:39','2021-02-20 11:12:39'),(577,0,'Limpopo','Mopani','','Tzaneen','2021-02-20 11:12:49','2021-02-20 11:12:49'),(578,0,'Limpopo','Mopani','','Hoedspruit','2021-02-20 11:13:00','2021-02-20 11:13:00'),(579,0,'Limpopo','Sekhukhune','','Groblersdal','2021-02-20 11:15:47','2021-02-20 11:15:47'),(580,0,'Limpopo','Sekhukhune','','Marble Hall','2021-02-20 11:15:57','2021-02-20 11:15:57'),(581,0,'Limpopo','Sekhukhune','','Apel','2021-02-20 11:16:08','2021-02-20 11:16:08'),(582,0,'Limpopo','Sekhukhune','','Jane Furse','2021-02-20 11:16:20','2021-02-20 11:16:20'),(583,0,'Limpopo','Vhembe','','Malamulele','2021-02-20 11:18:05','2021-02-20 11:18:05'),(584,0,'Limpopo','Vhembe','','Louis Trichardt','2021-02-20 11:18:14','2021-02-20 11:18:14'),(585,0,'Limpopo','Vhembe','','Musina','2021-02-20 11:18:26','2021-02-20 11:18:26'),(586,0,'Limpopo','Vhembe','','Thohoyandou','2021-02-20 11:18:37','2021-02-20 11:18:37'),(587,0,'Limpopo','Waterberg','','Bela Bela','2021-02-20 11:20:15','2021-02-20 11:20:15'),(588,0,'Limpopo','Waterberg','','Lephalale','2021-02-20 11:20:24','2021-02-20 11:20:24'),(589,0,'Limpopo','Waterberg','','Modimolle','2021-02-20 11:20:36','2021-02-20 11:20:36'),(590,0,'Limpopo','Waterberg','','Mokopane','2021-02-20 11:20:50','2021-02-20 11:20:50'),(591,0,'Limpopo','Waterberg','','Thabazimbi','2021-02-20 11:21:10','2021-02-20 11:21:10'),(592,0,'North West','Bojanala Platinum','','Koster','2021-02-20 11:31:56','2021-02-20 11:31:56'),(593,0,'North West','Bojanala Platinum','','Brits','2021-02-20 11:32:09','2021-02-20 11:32:09'),(594,0,'North West','Bojanala Platinum','','Makapanstad','2021-02-20 11:32:20','2021-02-20 11:32:20'),(595,0,'North West','Bojanala Platinum','','Mogwase','2021-02-20 11:32:31','2021-02-20 11:32:31'),(596,0,'North West','Bojanala Platinum','','Rustenburg','2021-02-20 11:32:42','2021-02-20 11:32:42'),(597,0,'North West','Dr Kenneth Kaunda','','Klerksdorp','2021-02-20 11:34:45','2021-02-20 11:34:45'),(598,0,'North West','Dr Kenneth Kaunda','','Potchefstroom','2021-02-20 11:34:57','2021-02-20 11:34:57'),(599,0,'North West','Dr Kenneth Kaunda','','Wolmaransstad','2021-02-20 11:35:09','2021-02-20 11:35:09'),(600,0,'North West','Dr Ruth Segomotsi Mompati','','Taung','2021-02-20 11:36:43','2021-02-20 11:36:43'),(601,0,'North West','Dr Ruth Segomotsi Mompati','','Ganyesa','2021-02-20 11:36:55','2021-02-20 11:36:55'),(602,0,'North West','Dr Ruth Segomotsi Mompati','','Christiana','2021-02-20 11:37:05','2021-02-20 11:37:05'),(603,0,'North West','Dr Ruth Segomotsi Mompati','','Schweizer Reneke','2021-02-20 11:37:20','2021-02-20 11:37:20'),(604,0,'North West','Dr Ruth Segomotsi Mompati','','Vryburg','2021-02-20 11:37:30','2021-02-20 11:37:30'),(605,0,'North West','Ngaka Modiri Molema','','Lichtenburg','2021-02-20 11:39:28','2021-02-20 11:39:28'),(606,0,'North West','Ngaka Modiri Molema','','Mahikeng','2021-02-20 11:39:39','2021-02-20 11:39:39'),(607,0,'North West','Ngaka Modiri Molema','','Zeerust','2021-02-20 11:40:01','2021-02-20 11:40:01'),(608,0,'North West','Ngaka Modiri Molema','','Setlagole','2021-02-20 11:40:13','2021-02-20 11:40:13'),(609,0,'North West','Ngaka Modiri Molema','','Delareyville','2021-02-20 11:40:29','2021-02-20 11:40:29'),(610,0,'Northern Cape','Frances Baard','','Barkly West','2021-02-20 13:58:29','2021-02-20 13:58:29'),(611,0,'Northern Cape','Frances Baard','','Warrenton','2021-02-20 13:58:39','2021-02-20 13:58:39'),(612,0,'Northern Cape','Frances Baard','','Hartswater','2021-02-20 13:58:53','2021-02-20 13:58:53'),(613,0,'Northern Cape','Frances Baard','','Kimberley','2021-02-20 13:59:07','2021-02-20 13:59:07'),(614,0,'Northern Cape','John Taolo Gaetsewe','','Kuruman','2021-02-20 14:16:48','2021-02-20 14:16:48'),(615,0,'Northern Cape','John Taolo Gaetsewe','','Kathu','2021-02-20 14:16:59','2021-02-20 14:16:59'),(616,0,'Northern Cape','John Taolo Gaetsewe','','Mothibistad','2021-02-20 14:17:12','2021-02-20 14:17:12'),(617,0,'Northern Cape','Namakwa','','Calvinia','2021-02-20 14:20:54','2021-02-20 14:20:54'),(618,0,'Northern Cape','Namakwa','','Garies','2021-02-20 14:21:08','2021-02-20 14:21:08'),(619,0,'Northern Cape','Namakwa','','Williston','2021-02-20 14:21:19','2021-02-20 14:21:19'),(620,0,'Northern Cape','Namakwa','','Pofadder','2021-02-20 14:21:31','2021-02-20 14:21:31'),(621,0,'Northern Cape','Namakwa','','Springbok','2021-02-20 14:21:43','2021-02-20 14:21:43'),(622,0,'Northern Cape','Namakwa','','Port Nolloth','2021-02-20 14:21:55','2021-02-20 14:21:55'),(623,0,'Northern Cape','Pixley ka Seme','','De Aar','2021-02-20 14:24:28','2021-02-20 14:24:28'),(624,0,'Northern Cape','Pixley ka Seme','','Carnarvon','2021-02-20 14:24:41','2021-02-20 14:24:41'),(625,0,'Northern Cape','Pixley ka Seme','','Petrusville','2021-02-20 14:24:54','2021-02-20 14:24:54'),(626,0,'Northern Cape','Pixley ka Seme','','Douglas','2021-02-20 14:25:06','2021-02-20 14:25:06'),(627,0,'Northern Cape','Pixley ka Seme','','Prieska','2021-02-20 14:25:22','2021-02-20 14:25:22'),(628,0,'Northern Cape','Pixley ka Seme','','Hopetown','2021-02-20 14:25:36','2021-02-20 14:25:36'),(629,0,'Northern Cape','Pixley ka Seme','','Victoria West','2021-02-20 14:25:48','2021-02-20 14:25:48'),(630,0,'Northern Cape','Pixley ka Seme','','Colesberg','2021-02-20 14:26:02','2021-02-20 14:26:02'),(631,0,'Northern Cape','ZF Mgcawu','','Groblershoop','2021-02-20 14:31:57','2021-02-20 14:31:57'),(640,0,'Western Cape','Cape Winelands','','Ceres','2021-02-20 15:04:44','2021-02-20 15:04:44'),(641,0,'Western Cape','Central Karoo','','Beaufort West','2021-02-20 15:07:05','2021-02-20 15:07:05'),(642,0,'Western Cape','Central Karoo','','Laingsburg','2021-02-20 15:07:17','2021-02-20 15:07:17'),(643,0,'Western Cape','Central Karoo','','Prince Albert','2021-02-20 15:07:29','2021-02-20 15:07:29'),(644,0,'Western Cape','Garden Route','','Plettenberg Bay','2021-02-20 15:09:06','2021-02-20 15:09:06'),(645,0,'Western Cape','Garden Route','','George','2021-02-20 15:09:16','2021-02-20 15:09:16'),(646,0,'Western Cape','Garden Route','','Riversdale','2021-02-20 15:09:27','2021-02-20 15:09:27'),(647,0,'Western Cape','Garden Route','','Ladismith','2021-02-20 15:09:39','2021-02-20 15:09:39'),(648,0,'Western Cape','Garden Route','','Knysna','2021-02-20 15:09:51','2021-02-20 15:09:51'),(649,0,'Western Cape','Garden Route','','Mossel Bay','2021-02-20 15:10:06','2021-02-20 15:10:06'),(650,0,'Western Cape','Garden Route','','Oudtshoorn','2021-02-20 15:10:18','2021-02-20 15:10:18'),(651,0,'Western Cape','Overberg','','Bredasdorp','2021-02-20 15:13:37','2021-02-20 15:13:37'),(652,0,'Western Cape','Overberg','','Hermanus','2021-02-20 15:13:53','2021-02-20 15:13:53'),(653,0,'Western Cape','Overberg','','Swellendam','2021-02-20 15:14:06','2021-02-20 15:14:06'),(654,0,'Western Cape','Overberg','','Caledon','2021-02-20 15:14:18','2021-02-20 15:14:18'),(655,0,'Western Cape','West Coast','','Piketberg','2021-02-20 15:16:15','2021-02-20 15:16:15'),(656,0,'Western Cape','West Coast','','Clanwilliam','2021-02-20 15:16:29','2021-02-20 15:16:29'),(657,0,'Western Cape','West Coast','','Vredendal','2021-02-20 15:16:49','2021-02-20 15:16:49'),(658,0,'Western Cape','West Coast','','Vredenburg','2021-02-20 15:17:03','2021-02-20 15:17:03'),(659,0,'Western Cape','West Coast','','Malmesbury','2021-02-20 15:17:20','2021-02-20 15:17:20');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_module`
--

DROP TABLE IF EXISTS `class_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `upload_learner_guide` varchar(255) NOT NULL,
  `upload_learner_guide_name` varchar(255) NOT NULL,
  `upload_workbook` varchar(255) NOT NULL,
  `upload_workbook_name` varchar(255) NOT NULL,
  `upload_poe` varchar(255) NOT NULL,
  `upload_poe_name` varchar(255) NOT NULL,
  `upload_facilitator_guide` varchar(255) NOT NULL,
  `upload_facilitator_guide_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_module`
--

LOCK TABLES `class_module` WRITE;
/*!40000 ALTER TABLE `class_module` DISABLE KEYS */;
INSERT INTO `class_module` VALUES (1,16,'Module 1','37023d5e6ffd70b1cb148b930b750f60.pdf','AssetTagReportDashboard.pdf','ae667a57a0c1e74af2a6409342f21ce3.pdf','AssetTagReportDashboard.pdf','a7489459320b404208728a69f1342ba7.pdf','AssetTagReportDashboard.pdf','1bc1432ffedc14cd98b0e155e6828621.pdf','AssetTagReportDashboard.pdf','2021-05-09 19:52:18','2021-05-17 06:11:28'),(2,16,'module 2','25ef0d0c21ddd63a00e13d74344aa48f.pdf','AssetTagReportDashboard.pdf','41d7322a31b66485377b46b376fe5421.pdf','AssetTagReportDashboard.pdf','11e29cb8c9be4bdf9b95b6efc977499b.pdf','AssetTagReportDashboard.pdf','ab5310cde79cb5d0c468176e1970bf25.pdf','AssetTagReportDashboard.pdf','2021-05-09 19:55:50','2021-05-17 06:11:28'),(3,16,'module 3','0691fe5989bf8dc6fec023b47ac151c7.pdf','AssetTagReportDashboard.pdf','969d272c52dfcaecae42d7b9065caf31.pdf','AssetTagReportDashboard.pdf','ce1a4761656069609e5f3953cddf11d6.pdf','AssetTagReportDashboard.pdf','d51668d1bf0eec4f80681b10125974e6.pdf','AssetTagReportDashboard.pdf','2021-05-09 20:10:03','2021-05-17 06:11:28'),(4,16,'module 4','17cc62165f72a6534698dec4f47885c8.pdf','AssetTagReportDashboard.pdf','91634ea019ad8ba4fa7c7b80dc57fd7d.pdf','AssetTagReportDashboard.pdf','9abd058e09d46b0f3901d5b55cda1209.pdf','AssetTagReportDashboard.pdf','7b19a7333fafa1a57c66cec85b5f38f2.pdf','AssetTagReportDashboard.pdf','2021-05-09 20:11:45','2021-05-17 06:11:28'),(5,0,'Module 1 - Essay Reports','0f1d342ad8b35bf1982aeee28ea4c741.pdf','AssetTagReportDashboard.pdf','9cc4fbe086bc614e406018c4da1a426e.pdf','AssetTagReportDashboard.pdf','a276edef25ada8ac3a0b4c5e5988aef0.pdf','AssetTagReportDashboard.pdf','3f8918611d559ba8783b682811f952b9.pdf','AssetTagReportDashboard.pdf','2021-05-10 07:02:34','2021-05-10 10:32:34'),(6,0,'Module 2 - Graphic reports','3881aa343d3c4e5cfd25bc1b2577379d.pdf','AssetTagReportDashboard.pdf','39d3b6aa3e3757134fbb869e0d8cf0e0.pdf','AssetTagReportDashboard.pdf','d472c8275a759df8599d9dec9c4fddc1.pdf','AssetTagReportDashboard.pdf','9afd491f42ed10ae3410b060f0507557.pdf','AssetTagReportDashboard.pdf','2021-05-10 07:02:34','2021-05-10 10:32:34'),(7,20,'Module 1','','','b30fb17bc9549b5db3b2ae5f1a53cb5d.pdf','AssetTagReportDashboard.pdf','6e5228d36497427b009693c9992cef93.pdf','AssetTagReportDashboard.pdf','031be46a311a2fdcd9b4b82d88a4e281.pdf','AssetTagReportDashboard.pdf','2021-05-18 22:18:30','2021-05-19 01:49:06');
/*!40000 ALTER TABLE `class_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_name`
--

DROP TABLE IF EXISTS `class_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `learnership_id` int(11) NOT NULL,
  `learnership_sub_type_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `facilitator_id` int(111) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_name`
--

LOCK TABLES `class_name` WRITE;
/*!40000 ALTER TABLE `class_name` DISABLE KEYS */;
INSERT INTO `class_name` VALUES (1,1,1,1,1,1,1,'slash one class',1,'1','2021-01-20 05:45:47','2021-01-20 05:45:47'),(2,4,3,4,2,3,4,'Coal',3,'1','2021-01-20 14:55:42','2021-01-20 14:55:42'),(3,4,3,3,3,3,3,'Stock Exchange',3,'1','2021-01-20 14:56:17','2021-01-20 14:56:17'),(4,4,3,6,5,3,5,'Fuel and Gas',3,'1','2021-01-21 02:37:50','2021-01-21 02:37:50'),(5,1,1,7,6,1,1,'7th class',1,'1','2021-01-22 13:22:27','2021-01-22 13:23:02'),(6,10,11,9,9,5,8,'TestJanClass1',5,'1','2021-01-26 09:05:05','2021-01-26 09:05:05'),(8,10,11,9,9,5,8,'TestClassJan2',5,'1','2021-01-26 12:07:45','2021-01-26 12:07:45'),(9,4,3,10,10,3,4,'Datsun GO',3,'1','2021-01-26 12:54:58','2021-01-26 12:54:58'),(10,4,3,10,10,3,10,'Motor Parts',3,'1','2021-01-27 07:46:02','2021-01-27 07:46:02'),(11,10,11,9,9,5,9,'Seda Agri 1',5,'1','2021-02-01 09:53:27','2021-02-01 09:53:27'),(12,1,1,7,6,1,1,'8th class',1,'1','2021-02-01 09:57:23','2021-02-01 09:57:23'),(13,13,1,11,11,1,17,'Grade',1,'1','2021-02-19 06:33:12','2021-02-19 06:33:12'),(14,243,17,12,13,8,20,'Seda 116291',8,'1','2021-02-21 11:06:48','2021-02-21 11:06:48'),(15,243,17,0,13,8,21,'Seda 116291',8,'1','2021-02-21 11:23:23','2021-02-21 11:23:23'),(16,13,1,13,14,1,1,'Introduction to Food and Beverages',1,'1','2021-03-04 10:43:34','2021-04-25 17:50:32'),(17,10,11,14,15,5,8,'Thomas',5,'1','2021-03-09 09:21:06','2021-03-09 09:31:26'),(18,276,19,13,14,9,19,'grade',9,'1','2021-03-18 08:53:32','2021-03-18 08:53:32'),(19,13,1,13,14,1,17,'test class name',1,'1','2021-05-06 15:48:02','2021-05-06 15:48:02'),(20,13,1,13,14,1,17,'Report Writing',1,'1','2021-05-10 07:02:34','2021-05-18 22:19:06');
/*!40000 ALTER TABLE `class_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaints_and_suggestions`
--

DROP TABLE IF EXISTS `complaints_and_suggestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complaints_and_suggestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaints_and_suggestions`
--

LOCK TABLES `complaints_and_suggestions` WRITE;
/*!40000 ALTER TABLE `complaints_and_suggestions` DISABLE KEYS */;
INSERT INTO `complaints_and_suggestions` VALUES (1,2,'complaints','<p>Not enough food</p>\r\n<gdiv></gdiv>','2021-01-21 10:50:48','2021-01-21 10:50:48'),(2,2,'suggestions','<p>The bus to learning venues should be increased</p>\r\n<gdiv></gdiv>','2021-01-21 10:51:26','2021-01-21 10:51:26'),(3,1,'complaints','<p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n','2021-01-23 05:28:22','2021-01-23 05:28:22'),(4,1,'suggestions','<p>bbbbbbbbbbbbbbbbbbbbbbb</p>\r\n','2021-01-23 05:28:34','2021-01-23 05:28:34'),(5,1,'complaints','<p>reretete</p>\r\n','2021-01-26 10:44:42','2021-01-26 10:44:42'),(6,1,'suggestions','<p>rrrrrrrrrrrrrrrrrrr</p>\r\n','2021-01-26 10:45:12','2021-01-26 10:45:12'),(7,1,'complaints','wdewweqrfef','2021-02-01 09:36:46','2021-02-01 09:36:46'),(8,1,'complaints','','2021-03-10 21:39:54','2021-03-10 21:39:54');
/*!40000 ALTER TABLE `complaints_and_suggestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `message` varchar(450) NOT NULL,
  `name` text NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES (1,'william@epsitech.co.za','test email','william','2021-02-01 08:06:23'),(2,'wmunyambu@live.com','Test','willim','2021-02-01 14:37:13'),(3,'william@khathula.com','Test','willie','2021-02-01 14:47:28'),(4,'wmunyambu@live.com','Test ','willie','2021-02-01 14:50:37'),(5,'robert.tiya@hotmail.com','Hello','va','2021-02-02 10:49:52'),(6,'wmunyambu@live.com','test','willie','2021-02-02 14:26:29'),(7,'wmunyambu@live.com','Test','illyaina','2021-02-03 03:09:18'),(8,'barman0000@gmail.com','Hi','sheetal','2021-02-03 05:25:45'),(9,'rajveer@gmail.com','njkdnfklnjdsf n ','rajveer','2021-02-03 05:57:15'),(10,'wmunyambu@live.com','test','willie','2021-02-03 06:03:55'),(11,'wmunyambu@live.com','test','willie','2021-02-03 06:08:16'),(12,'wmunyambu@live.com','test','illie','2021-02-03 06:11:56'),(13,'rajveerbarman007@gmail.com','Hi I need LMS','rajveerbarman','2021-02-03 06:11:58'),(14,'slash.jyoti1806@gmail.com','hiii welcome','jyoti','2021-02-03 06:14:22'),(15,'jyoti18061998@gmail.com','hiiii','jyoti','2021-02-03 06:40:29'),(16,'slash.jyoti1806@gmail.com','hello','jyoti','2021-02-03 06:44:46'),(17,'slash.jyoti1806@gmail.com','hello team','jyoti','2021-02-03 06:49:09'),(18,'rajveerbarman007@gmail.com','Hi I need Friction ','RajveerBarman','2021-02-03 11:11:18'),(19,'wmunyambu@live.com','test','Willy','2021-02-04 06:06:39'),(20,'collegeonhills@gmail.com','How to be part of this funding for online studies ','Emanuel','2021-02-18 18:23:36'),(21,'dzynakonsultz@gmail.com','i would like to know how the system works ','kofi','2021-02-23 08:30:42');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(52) NOT NULL,
  `limits` varchar(52) NOT NULL,
  `discount` varchar(52) NOT NULL,
  `code` varchar(52) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `province_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,0,'Eastern Cape','Mthatha','2021-01-12 01:14:11','2021-01-12 01:14:11'),(199,0,'Limpopo','Capricorn','2021-02-20 11:09:27','2021-02-20 11:09:27'),(200,0,'Limpopo','Mopani','2021-02-20 11:12:00','2021-02-20 11:12:00'),(201,0,'Limpopo','Sekhukhune','2021-02-20 11:15:28','2021-02-20 11:15:28'),(202,0,'Limpopo','Vhembe','2021-02-20 11:17:47','2021-02-20 11:17:47'),(203,0,'Limpopo','Waterberg','2021-02-20 11:19:55','2021-02-20 11:19:55'),(167,0,'Mpumalanga','Ehlanzeni','2021-02-20 07:09:47','2021-02-20 07:09:47'),(168,0,'Mpumalanga','Gert Sibande','2021-02-20 07:13:01','2021-02-20 07:13:01'),(169,0,'Mpumalanga','Nkangala','2021-02-20 07:17:31','2021-02-20 07:17:31'),(194,0,'KwaZulu-Natal','Umkhanyakude','2021-02-20 10:52:31','2021-02-20 10:52:31'),(182,0,'Free State','Xhariep','2021-02-20 09:04:41','2021-02-20 09:04:41'),(186,0,'Gauteng','Ekurhuleni','2021-02-20 10:17:15','2021-02-20 10:17:15'),(187,0,'Gauteng','Sedibeng','2021-02-20 10:29:26','2021-02-20 10:29:26'),(188,0,'Gauteng','West Rand','2021-02-20 10:31:47','2021-02-20 10:31:47'),(189,0,'KwaZulu-Natal','Amajuba','2021-02-20 10:36:59','2021-02-20 10:36:59'),(190,0,'KwaZulu-Natal','Harry Gwala','2021-02-20 10:39:05','2021-02-20 10:39:05'),(191,0,'KwaZulu-Natal','King Cetshwayo','2021-02-20 10:42:00','2021-02-20 10:42:00'),(192,0,'KwaZulu-Natal','Ugu','2021-02-20 10:45:12','2021-02-20 10:45:12'),(193,0,'KwaZulu-Natal','uMgungundlovu','2021-02-20 10:48:03','2021-02-20 10:48:03'),(211,0,'Northern Cape','Namakwa','2021-02-20 14:17:27','2021-02-20 14:17:27'),(212,0,'Northern Cape','Pixley ka Seme','2021-02-20 14:24:07','2021-02-20 14:24:07'),(213,0,'Northern Cape','ZF Mgcawu','2021-02-20 14:31:33','2021-02-20 14:31:33'),(214,0,'Western Cape','Cape Winelands','2021-02-20 15:01:13','2021-02-20 15:01:13'),(210,0,'Northern Cape','John Taolo Gaetsewe','2021-02-20 14:16:23','2021-02-20 14:16:23'),(218,0,'Western Cape','West Coast','2021-02-20 15:15:49','2021-02-20 15:15:49'),(217,0,'Western Cape','Overberg','2021-02-20 15:12:57','2021-02-20 15:12:57'),(216,0,'Western Cape','Garden Route','2021-02-20 15:08:49','2021-02-20 15:08:49'),(215,0,'Western Cape','Central Karoo','2021-02-20 15:06:41','2021-02-20 15:06:41'),(209,0,'Northern Cape','Frances Baard','2021-02-20 13:54:01','2021-02-20 13:54:01'),(208,0,'North West','Ngaka Modiri Molema','2021-02-20 11:39:00','2021-02-20 11:39:00'),(205,0,'North West','Bojanala Platinum','2021-02-20 11:31:30','2021-02-20 11:31:30'),(206,0,'North West','Dr Kenneth Kaunda','2021-02-20 11:34:25','2021-02-20 11:34:25'),(207,0,'North West','Dr Ruth Segomotsi Mompati','2021-02-20 11:36:24','2021-02-20 11:36:24'),(103,0,'Kwazulu Natal','Vryheid','2021-01-15 09:20:33','2021-01-15 09:20:33'),(104,0,'Kwazulu Natal','Dannhauser','2021-01-15 09:21:45','2021-01-15 09:21:45'),(105,0,'Kwazulu Natal','Paulpietersburg','2021-01-15 09:21:59','2021-01-15 09:21:59'),(106,0,'Kwazulu Natal','Utrecht','2021-01-15 09:22:17','2021-01-15 09:22:17'),(107,0,'Kwazulu Natal','Ladysmith','2021-01-15 09:22:39','2021-01-15 09:22:39'),(108,0,'Kwazulu Natal','Dundee','2021-01-15 09:22:53','2021-01-15 09:22:53'),(109,0,'Kwazulu Natal','Durban','2021-01-15 09:23:13','2021-01-15 09:23:13'),(110,0,'Kwazulu Natal','Izingolweni','2021-01-15 09:23:31','2021-01-15 09:23:31'),(185,0,'Gauteng','Johannesburg','2021-02-20 09:11:03','2021-02-20 09:11:03'),(174,0,'Eastern Cape','Chris Hani','2021-02-20 08:23:34','2021-02-20 08:23:34'),(175,0,'Eastern Cape','Joe Gqabi','2021-02-20 08:27:21','2021-02-20 08:27:21'),(173,0,'Eastern Cape','Amathole','2021-02-20 08:19:20','2021-02-20 08:19:20'),(172,0,'Eastern Cape','Alfred Nzo','2021-02-20 08:16:37','2021-02-20 08:16:37'),(176,0,'Eastern Cape','OR Tambo','2021-02-20 08:34:28','2021-02-20 08:34:28'),(177,0,'Eastern Cape','Sarah Baartman','2021-02-20 08:37:59','2021-02-20 08:37:59'),(123,0,'Eastern Cape','Mthatha','2021-01-15 13:01:27','2021-01-15 13:01:27'),(181,0,'Free State','Thabo Mofutsanyana','2021-02-20 08:59:24','2021-02-20 08:59:24'),(179,0,'Free State','Fezile Dabi','2021-02-20 08:48:53','2021-02-20 08:48:53'),(180,0,'Free State','Lejweleputswa','2021-02-20 08:52:43','2021-02-20 08:52:43'),(128,0,'Kwazulu Natal','Amajuba','2021-01-16 10:20:22','2021-01-16 10:20:22'),(129,0,'Kwazulu Natal Correct One','Amajuba','2021-01-16 10:25:31','2021-01-16 10:27:09'),(130,0,'Kwazulu Natal Correct One','Harry Gwala','2021-01-16 10:35:33','2021-01-16 10:35:33'),(131,0,'Kwazulu Natal Correct One','iLembe','2021-01-16 10:39:08','2021-01-16 10:39:08'),(132,0,'Kwazulu Natal Correct One','King Cetshwayo','2021-01-16 10:42:38','2021-01-16 10:42:38'),(133,0,'Kwazulu Natal Correct One','Ugu','2021-01-16 10:47:15','2021-01-16 10:47:15'),(134,0,'Kwazulu Natal Correct One','uMgungundlovu','2021-01-16 10:51:13','2021-01-16 10:51:13'),(135,0,'Kwazulu Natal Correct One','Umkhanyakude','2021-01-16 11:01:28','2021-01-16 11:01:28'),(136,0,'Kwazulu Natal Correct One','Umzinyathi','2021-01-16 11:05:39','2021-01-16 11:05:39'),(137,0,'Kwazulu Natal Correct One','Uthukela','2021-01-16 11:09:00','2021-01-16 11:09:00'),(138,0,'Kwazulu Natal Correct One','Zululand','2021-01-16 11:24:28','2021-01-16 11:24:28'),(140,0,'Limpopo correct one','Mopani','2021-01-16 11:47:55','2021-01-16 11:47:55'),(141,0,'Limpopo correct one','Sekhukhune','2021-01-16 11:51:53','2021-01-16 11:51:53'),(142,0,'Limpopo correct one','Vhembe','2021-01-16 11:59:12','2021-01-16 11:59:12'),(143,0,'Limpopo correct one','Waterberg','2021-01-16 12:05:22','2021-01-16 12:05:22'),(145,0,'Mpumalanga Correct one','Gert Sibande','2021-01-16 12:28:24','2021-01-16 12:28:24'),(146,0,'Mpumalanga Correct one','Nkangala','2021-01-16 12:33:43','2021-01-16 12:33:43'),(148,0,'North West correct one','Dr Kenneth Kaunda','2021-01-16 13:21:32','2021-01-16 13:21:32'),(149,0,'North West correct one','Dr Ruth Segomotsi Mompati','2021-01-16 13:24:09','2021-01-16 13:24:09'),(150,0,'Northern Cape Correct One','Frances Baard','2021-01-17 13:25:00','2021-01-17 13:25:00'),(151,0,'Northern Cape Correct One','John Taolo Gaetsewe','2021-01-17 13:32:17','2021-01-17 13:32:17'),(152,0,'Northern Cape Correct One','Namakwa','2021-01-17 13:35:02','2021-01-17 13:35:02'),(153,0,'Northern Cape Correct One','Pixley ka Seme','2021-01-17 13:39:59','2021-01-17 13:39:59'),(154,0,'Northern Cape Correct One','ZF Mgcawu','2021-01-17 13:45:20','2021-01-17 13:45:20'),(155,0,'Western Cape Correct One','Cape Winelands','2021-01-17 19:27:06','2021-01-17 19:27:06'),(156,0,'Western Cape Correct One','Central Karoo','2021-01-17 19:30:59','2021-01-17 19:30:59'),(157,0,'Western Cape Correct One','Garden Route','2021-01-17 19:35:01','2021-01-17 19:35:01'),(158,0,'Western Cape Correct One','Overberg','2021-01-17 19:39:49','2021-01-17 19:39:49'),(164,0,'test aaa','test bbbb','2021-02-01 09:41:41','2021-02-01 09:41:41'),(160,0,'notforuseprovince','notforusedist','2021-01-19 06:37:41','2021-01-19 06:37:41'),(161,0,'test one','test two','2021-01-20 08:50:42','2021-01-20 08:50:42'),(165,0,'Gauteng','City Of Tshwane','2021-02-18 17:06:20','2021-02-18 17:06:20'),(195,0,'KwaZulu-Natal','Umzinyathi','2021-02-20 10:55:00','2021-02-20 10:55:00'),(196,0,'KwaZulu-Natal','Uthukela','2021-02-20 10:57:43','2021-02-20 10:57:43'),(197,0,'KwaZulu-Natal','Zululand','2021-02-20 10:59:50','2021-02-20 10:59:50');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drop_out`
--

DROP TABLE IF EXISTS `drop_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drop_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `learner_id_number` varchar(255) NOT NULL,
  `learner_classname` varchar(255) NOT NULL,
  `learnership_sub_type` varchar(255) NOT NULL,
  `replacement_learner_details` varchar(255) NOT NULL,
  `date_of_resignation` date NOT NULL,
  `reason_for_dropping_out` varchar(255) NOT NULL,
  `attachments` varchar(255) NOT NULL COMMENT ' Letter of resignation',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drop_out`
--

LOCK TABLES `drop_out` WRITE;
/*!40000 ALTER TABLE `drop_out` DISABLE KEYS */;
INSERT INTO `drop_out` VALUES (6,0,0,0,1,'Slash Technology','Learner','1','slash','1','','2021-03-01','Training too far from Location','b1d780ee0164bcf74aaa9040bfb0b5db.png','2021-03-10 22:04:29','2021-03-10 22:04:29'),(5,1,1,1,1,'ssddd','dddd','1236547896547','slash','1','sadfASDA','2021-01-29','Ill Health','02f06bd4d633b6b533bacac95554ff1b.png','2021-01-27 09:04:56','2021-01-27 09:28:49');
/*!40000 ALTER TABLE `drop_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elearner`
--

DROP TABLE IF EXISTS `elearner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elearner` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `orgnaization_id` int(100) NOT NULL,
  `project_manager` int(100) NOT NULL,
  `trainer_id` int(100) NOT NULL,
  `class_name` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `create_at` datetime(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` varchar(10) NOT NULL COMMENT '0= expire, 1=not expire',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elearner`
--

LOCK TABLES `elearner` WRITE;
/*!40000 ALTER TABLE `elearner` DISABLE KEYS */;
INSERT INTO `elearner` VALUES (1,4,3,3,2,'2021-01-21','13:00:00.000000','0622151432','robert.tiya@hotmail.com','https://digilims.co.za/b/siv-e1q-1rf-m5r','2021-01-21 16:28:11.000000','2021-01-21 10:58:11.032683','1'),(2,1,1,1,5,'2021-01-23','21:40:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-01-22 19:10:57.000000','2021-01-22 13:40:57.538880','1'),(3,10,11,5,6,'2021-01-27','04:35:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-01-26 15:05:59.000000','2021-01-26 09:35:59.141311','1'),(4,10,11,5,6,'2021-01-26','13:50:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/wil-ak6-mxn-jrm','2021-01-26 17:21:29.000000','2021-01-26 11:51:29.140101','1'),(5,10,11,5,8,'2021-01-26','14:08:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/wil-ak6-mxn-jrm','2021-01-26 17:38:36.000000','2021-01-26 12:08:36.124416','1'),(6,4,3,3,2,'2021-01-26','16:30:00.000000','0622151432','robert.tiya@hotmail.com','https://digilims.co.za/b/siv-e1q-1rf-m5r','2021-01-26 19:53:45.000000','2021-01-26 14:23:45.915376','1'),(7,10,11,5,8,'2021-01-27','04:52:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/wil-ak6-mxn-jrm','2021-01-27 08:23:19.000000','2021-01-27 02:53:19.941036','1'),(8,10,11,5,8,'2021-01-27','05:01:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-01-27 08:31:49.000000','2021-01-27 03:01:49.597599','1'),(9,10,11,5,8,'2021-02-01','10:52:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-02-01 14:23:15.000000','2021-02-01 08:53:15.439282','1'),(10,10,11,5,11,'2021-02-01','12:06:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-02-01 15:37:23.000000','2021-02-01 10:07:23.336528','1'),(11,10,11,5,8,'2021-02-11','10:00:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-02-11 13:31:28.000000','2021-02-11 08:01:28.520065','1'),(12,10,11,5,11,'2021-02-12','11:47:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-02-12 15:18:40.000000','2021-02-12 09:48:40.550891','1'),(13,10,11,5,11,'2021-02-15','16:53:00.000000','0740740732','wmunyambu@live.com','https://digilims.co.za/b/adm-eoc-mtz-tgg','2021-02-12 20:25:32.000000','2021-02-12 14:55:32.629042','1'),(14,13,1,1,16,'2021-03-18','11:30:00.000000','0724109013','kingsley@epsitech.co.za','https://digilims.co.za/b/kin-ydf-wxa-01p','2021-03-17 04:40:42.000000','2021-03-16 23:10:42.970041','1'),(15,276,19,9,18,'2021-03-18','11:00:00.000000','0622151432','asrtiya@gmail.com','https://demo.bigbluebutton.org/gl/siv-8cd-adg-buv','2021-03-18 14:27:43.000000','2021-03-18 08:57:43.726131','1'),(16,10,11,5,11,'2021-03-25','10:28:00.000000','0733829382','wmunyambu@live.com','https://digilims.co.za/b/wil-ak6-mxn-jrm','2021-03-25 13:59:44.000000','2021-03-25 08:29:44.886540','1'),(17,10,11,5,17,'2021-03-31','13:25:00.000000','072','wmunyambu@live.com','https://digilims.co.za/b/wil-ak6-mxn-jrm','2021-03-30 12:51:58.000000','2021-03-30 07:21:58.889128','1');
/*!40000 ALTER TABLE `elearner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `employer_contact_number` varchar(255) NOT NULL,
  `employer_contact_email` varchar(255) NOT NULL,
  `employer_province` varchar(255) NOT NULL,
  `employer_district` varchar(255) NOT NULL,
  `employer_region` varchar(255) NOT NULL,
  `employer_city` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `employer_Suburb` varchar(255) NOT NULL,
  `employer_Street_name` varchar(255) NOT NULL,
  `employer_Street_number` varchar(255) NOT NULL,
  `contact_person_name` varchar(50) NOT NULL,
  `contact_person_surname` varchar(50) NOT NULL,
  `contact_person_contact_no` varchar(20) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer`
--

LOCK TABLES `employer` WRITE;
/*!40000 ALTER TABLE `employer` DISABLE KEYS */;
INSERT INTO `employer` VALUES (1,1,'Slash Technology Employer','125478965','employer@gmail.com','Limpopo','Mookgophong','','Soekmekaar','Makhuduthamaga Local Municipality','slash','slash','12','emp contact','s','123658748',1,1,2,'2021-01-20 05:51:13','2021-01-27 06:57:57'),(2,4,'KFC','658965458','booth@kfc.com','Kwazulu Natal Correct One','King Cetshwayo','','Nkandla','','Nkandla','Gezeyihlekisa Drive','','Lwando','Mthwa','569874587',3,3,2,'2021-01-20 14:42:00','2021-01-20 14:42:00'),(3,4,'Nandos','365987589','chuma@kfc.com','North West correct one','Dr Kenneth Kaunda','','Klerksdorp','City of Matlosana Local Municipality','Klerksdorp','Nana Sita Street','256','Chumani','Matomela','256332144',3,3,2,'2021-01-20 14:43:37','2021-01-20 15:00:32'),(5,10,'WilliamKhathula','740740732','wmunyambu@live.com','Mpumalanga Correct one','Nkangala','','Middelburg','','Blairgowrie','bend','15','William','Maina','740740732',11,11,2,'2021-01-26 08:25:19','2021-01-26 08:25:19'),(6,4,'Engene','896589898','phiwe@enene.com','Northern Cape Correct One','Frances Baard','','Barkly West','','Qumbu','Chris Hani Avenue','245','Siwaphiwe','Mbiko','655874329',3,3,2,'2021-01-26 12:08:03','2021-01-26 12:08:03'),(7,4,'Zizo','698547858','zizo@gmail.com','Limpopo','Chuniespoort','','Modjadji or Duiwelskloof','','Gabazi','Voortrekker Road','','Mawande','Mnyaka','896587458',3,3,2,'2021-01-26 12:10:22','2021-01-26 12:10:22'),(8,243,'SEDA','124411169','lmatara@seda.org.za','Gauteng','City Of Tshwane','','Pretoria','','Hartfield','Burnett','1066','Linkie ','Matara','845924396',17,17,2,'2021-02-19 05:05:41','2021-02-19 05:05:41'),(9,10,'Thomas Lamola Pty Ltd','763451205','thomas@gmail.com','Free State','Thabo Mofutsanyana','','Bethlehem','','Maseru','Maseru Street','26','Faith','Sebeko','792541630',11,11,2,'2021-02-26 09:24:40','2021-02-26 09:24:40');
/*!40000 ALTER TABLE `employer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_moderation_report`
--

DROP TABLE IF EXISTS `external_moderation_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `external_moderation_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `moderator_id` int(100) NOT NULL,
  `moderator_name` varchar(255) NOT NULL,
  `moderator_surname` varchar(255) NOT NULL,
  `moderation_date` varchar(255) NOT NULL,
  `moderation_number` varchar(244) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnership_sub_type` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `unit_statndards` varchar(255) NOT NULL,
  `overall_comments` varchar(200) NOT NULL,
  `learner_id` int(100) NOT NULL,
  `learner_name` varchar(100) NOT NULL,
  `learner_surname` varchar(100) NOT NULL,
  `learner_performance` varchar(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `type_creator` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_moderation_report`
--

LOCK TABLES `external_moderation_report` WRITE;
/*!40000 ALTER TABLE `external_moderation_report` DISABLE KEYS */;
INSERT INTO `external_moderation_report` VALUES (1,4,3,3,2,'Lwazi','Booth','2021-01-22','3rd',4,'2','Coal','16','We can  do better',0,'','','','',''),(2,1,1,1,1,'Slash Technology','External Moderator','2021-02-22','2nd',7,'6','7th','53,54,55,56,57','',0,'','','','',''),(3,13,1,1,1,'Slash Technology','External Moderator','2021-03-09','1st',13,'14','Introduction','12,16,24,25,27,28','This is testing for external moderation report and the learner are doing very well.',0,'','','','','');
/*!40000 ALTER TABLE `external_moderation_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_moderation_report_learner`
--

DROP TABLE IF EXISTS `external_moderation_report_learner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `external_moderation_report_learner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moderation_report_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `overallcmnt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_moderation_report_learner`
--

LOCK TABLES `external_moderation_report_learner` WRITE;
/*!40000 ALTER TABLE `external_moderation_report_learner` DISABLE KEYS */;
INSERT INTO `external_moderation_report_learner` VALUES (1,1,6,'80%','Perfect'),(2,1,5,'75%','Distinction'),(3,1,3,'60%','Good'),(4,1,2,'47%','Fail'),(5,2,8,'sdsd','4et'),(6,3,38,'Good performance','Good'),(7,3,37,'Good performance','Very Good');
/*!40000 ALTER TABLE `external_moderation_report_learner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_moderator`
--

DROP TABLE IF EXISTS `external_moderator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `external_moderator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `acreditations` varchar(150) NOT NULL,
  `acreditations_file` varchar(1000) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `trainer_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_moderator`
--

LOCK TABLES `external_moderator` WRITE;
/*!40000 ALTER TABLE `external_moderator` DISABLE KEYS */;
INSERT INTO `external_moderator` VALUES (1,13,1,'Slash Technology','External Moderator','North West correct one','Dr Kenneth Kaunda','','Potchefstroom','256','aaa','we','4','extmoderator@gmail.com','7458965478952','125479547','587458963','','','',2,1,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 05:43:25','2021-02-02 05:34:10'),(2,4,3,'Lwazi','Booth','Kwazulu Natal Correct One','Zululand','','Pongola','uPhongolo','Durban','Smadzuri Drive','454','lwazi@gmail.com','2536974258641','125479623','215896578','','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:5:\"UNISA\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:6:\"UNITRA\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 15:46:53','2021-01-20 15:46:53'),(3,1,1,'exter','nel','Limpopo','Mokopane','','Phalaborwa','32','nasik','fg','5432','driver1exter@gmail.com','gfhfhgfh','666666666','123123120','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1611825991_0.png\";}}',2,1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-22 10:25:36','2021-01-28 09:26:31'),(4,13,1,'rty','try','test aaa','test bbbb','','test cccc','318','Indore','vijay nagar indore','232','slash@gmail.co','gfhfhgfh','666666666','088174017','','','',2,1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 10:16:44','2021-02-02 11:32:16'),(5,10,11,'Merriam','Thabitha','Gauteng','City Of Tshwane','','Hammanskraal','City','Rockville','Kubube Street','1763','merriam@gmail.com','7702138545085','127714465','724185293','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:17:\"Cleaning services\";s:18:\"acreditations_file\";s:16:\"1615276839_0.png\";}}',2,5,5,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-09 08:00:39','2021-03-09 08:00:39');
/*!40000 ALTER TABLE `external_moderator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilitator`
--

DROP TABLE IF EXISTS `facilitator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilitator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `acreditations` varchar(150) NOT NULL,
  `acreditations_file` varchar(500) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `trainer_id` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilitator`
--

LOCK TABLES `facilitator` WRITE;
/*!40000 ALTER TABLE `facilitator` DISABLE KEYS */;
INSERT INTO `facilitator` VALUES (1,13,1,'Slash Technology','Facilitator','Western Cape Correct One','Central Karoo','','Laingsburg','Laingsburg Local Municipality','slash ','slash','12','facilitator@gmail.com','','1233333333','123654741','125896325','','',2,1,'7th class',0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 05:36:18','2021-02-02 05:34:17'),(2,3,2,'Ziyanda','Mhlawuli','Western Cape Correct One','Cape Winelands','','Stellenbosch','Stellenbosch','Khwezi','Alexandria Road   ','','ziyanda@gmail.com','','870302565898','369856589','325698545','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:5:\"UNISA\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:6:\"UNITRA\";s:18:\"acreditations_file\";N;}}',2,2,'',2,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 13:15:07','2021-01-20 13:15:07'),(3,4,3,'Mandla','Madlala','Northern Cape Correct One','Frances Baard','','Kimberley','Sol','Kroonstad','Winnie Mandela Street','','mandla@gmail.com','','9856587589658','236541254','236589658','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:4:\"WUSU\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:6:\"UNITRA\";s:18:\"acreditations_file\";N;}}',2,3,'',3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 14:49:42','2021-01-20 14:49:42'),(4,4,3,'Songezo','Nqetho','North West correct one','Dr Kenneth Kaunda','','Wolmaransstad','Maquassi','Irene','Pierre van Ryneveld Drive','6587','songezo@gmail.com','','6958758989899','156962256','625874585','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:3:\"TUT\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:3:\"DUT\";s:18:\"acreditations_file\";N;}}',2,3,'',3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 14:52:00','2021-01-20 14:52:00'),(5,4,3,'Xola','Mlambo','Northern Cape Correct One','Namakwa','','Garies','Kamiesberg','Willovale','Thabo Sihume Street','654','xola@gmail.com','','5869854741254','254785658','566352114','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:3:\"UWC\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:4:\"UKZN\";s:18:\"acreditations_file\";N;}}',2,3,'',3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-21 02:32:06','2021-01-21 02:32:06'),(17,13,1,'tester failicator',' failicator','Mpumalanga Correct one','Ehlanzeni','','Nelspruit','234','abc',' fgjgf','1234','testerfailicator@gmail.com','','1234567898560','123456789','987654321','','a:0:{}',2,1,'',1,'354d38b52316ec7e0325b0668bea48d7a74d61ae','2021-02-03 11:24:11','2021-02-03 11:24:11'),(18,13,1,'raj driver','test','test aaa','test bbbb','','test cccc','318','sdefdf','dsfhgj','65','rajdriver@gmail.com','','gfhfhgfh','666666666','817401711','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-04 12:44:30','2021-02-04 12:44:30'),(7,1,1,'new ','test','Mpumalanga Correct one','Nkangala','','Belfast','16','aassd','swdsd','34','faci@gmail.com','','12301230','456456456','123123123','','a:1:{i:0;a:3:{s:2:\"id\";s:1:\"0\";s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1611649527_0.jpg\";}}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-26 08:22:33','2021-01-27 11:33:20'),(8,10,11,'Willy','Maina','Mpumalanga Correct one','Nkangala','','Middelburg','Steve','Bend','Bend','15','wmunyambu@live.com','','123456','113267333','740740732','','a:0:{}',2,5,'',5,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-01-26 08:52:48','2021-01-26 08:52:48'),(9,10,11,'Willy','Maina','Mpumalanga Correct one','Nkangala','','Middelburg','Steve','Randburg','Bend','15','wmunyambu@live.com','','123456','113267333','740740732','','a:0:{}',2,5,'',5,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-01-26 12:06:31','2021-01-26 12:06:31'),(10,4,3,'Zama','Mhlawuli','Mpumalanga Correct one','Ehlanzeni','','Bushbuckridge','Bushbuckridge','Mthatha','Long Street','','zama@gmail.com','','6985478989658','236587458','214589658','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:5:\"UNISA\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:6:\"UNITRA\";s:18:\"acreditations_file\";N;}}',2,3,'',3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-26 12:48:28','2021-01-26 12:48:28'),(11,13,1,'dxvfchfgjfd','dfdf','test aaa','test bbbb','','test cccc','test','dfgh','vfc','76','driver1@gmail.com','','123456cvb','666666666','123123127','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 09:59:47','2021-02-02 09:59:47'),(12,13,1,'testingdriver','dfgdfg','test aaa','test bbbb','','test cccc','test','Indore','ijay nagar indore','232','driver@gmail.com','','121212shree','666666666','088171231','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 10:02:31','2021-02-02 10:02:31'),(13,13,1,'dxvfchfgjfd','shree ','test aaa','test bbbb','','test cccc','test','thyft','ghfh','5432','driver1@gmail.com','','gfhfhgfh2434','666666666','123123123','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 10:03:49','2021-02-02 10:03:49'),(14,13,1,'dxvfchfgjfd','efsedf','test aaa','test bbbb','','test cccc','318','dffgdfg','gfdg','545','driver1@gmail.com','','sdfsgfdsg','666666666','123123127','','',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-03 10:25:13','2021-02-03 10:27:30'),(15,13,1,'tester','abc','Limpopo','Phalaborwa','','Dendron','Mopani','abc','dec','1234','tester@gmail.com','','1234569876523','123456789','987654321','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-03 10:59:41','2021-02-03 10:59:41'),(16,13,1,'Admin','hfghjfgj','Mpumalanga Correct one','Ehlanzeni','','Nelspruit','234','hfhfg',' dfgdsg','123','admin@gmail.com','','1234567896543','123456789','987654321','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-03 11:15:49','2021-02-03 11:15:49'),(19,276,19,'Nolundi','Tiya','Gauteng','City Of Tshwane','','Pretoria','319','Pierre van Ryneveld','Kirkness Avenue','210','nolundi@khathula.com','','8609186019089','118978478','781846248','','a:0:{}',2,9,'',9,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-18 17:48:31','2021-02-18 17:48:31'),(20,243,17,'Thabo ','Ngobeni','North West correct one','Bojanala Platinum','','Mogwase','253','Rustenburg','Lucas Mangope','123','plaes@webmail.co.za','','670201 5674 085','110575352','662350573','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,'',8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-19 05:37:28','2021-02-19 05:37:28'),(21,243,17,'Vuyiswa ','Mtsweni','Gauteng','City Of Tshwane','','Soshanguve','471','Soshanguve','Molefe Makinta','123','teboho@tpntrading.co.za','','7902110449089','110575352','784006697','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,'',8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-21 11:14:58','2021-02-21 11:14:58'),(22,13,1,'James','Bond','Mpumalanga','Nkangala','','Siyabuswa','331','Siyabuswa','Sotobe Street','45','james@gmail.com','','8609152565085','125569874','716800604','','a:0:{}',2,1,'',1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-03 22:40:26','2021-03-03 22:40:26');
/*!40000 ALTER TABLE `facilitator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance_bank_details`
--

DROP TABLE IF EXISTS `finance_bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance_bank_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `project_manager_name` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `bank_start_date` varchar(255) NOT NULL,
  `bank_end_date` varchar(255) NOT NULL,
  `upload_bank_statement` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance_bank_details`
--

LOCK TABLES `finance_bank_details` WRITE;
/*!40000 ALTER TABLE `finance_bank_details` DISABLE KEYS */;
INSERT INTO `finance_bank_details` VALUES (1,1,'Slash Project Manager','1','Quarter 1','2021-01-25','2021-01-31','148d5052e744ae0687bed0d47766089e.jpg',1,2,'2021-01-25 11:11:32','2021-01-25 11:12:21'),(3,3,'Sasol','2','Quarter 3','2021-01-26','2021-02-26','3cb086e25f365779ad351fa87c649c85.docx',3,2,'2021-01-26 03:45:50','2021-01-26 03:45:50'),(4,3,'Sasol','5','Quarter 4','2021-01-26','2021-02-26','ef9755f523ea2e100947d219a1aba205.docx',3,2,'2021-01-26 12:38:11','2021-01-26 12:38:11'),(5,11,'TestprojectMgr','11','Quarter 1','2021-01-01','2021-03-02','165db39342d0445a743dc5095af7f971.png',11,2,'2021-03-02 00:18:07','2021-03-02 00:18:07');
/*!40000 ALTER TABLE `finance_bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance_expense_item`
--

DROP TABLE IF EXISTS `finance_expense_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance_expense_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnershipSubType` varchar(100) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `funding_id` bigint(255) NOT NULL,
  `expense_type` varchar(255) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance_expense_item`
--

LOCK TABLES `finance_expense_item` WRITE;
/*!40000 ALTER TABLE `finance_expense_item` DISABLE KEYS */;
INSERT INTO `finance_expense_item` VALUES (1,3,4,'2',789489,0,'Learner Stipends','Salary',28000.00,'2021-01-28','2021-01-20 08:27:02','2021-01-20 08:27:02'),(2,3,4,'2',820597,0,'Tools of trade','Stationary',11000.00,'2021-01-29','2021-01-20 08:28:23','2021-01-20 08:28:23'),(3,1,7,'6',724277,0,'Training Costs','asda',20.00,'2021-02-02','2021-02-02 03:55:08','2021-02-02 03:55:08'),(4,1,7,'6',915893,0,'Tools of trade','asd',15.00,'2021-02-04','2021-02-04 05:52:01','2021-02-04 05:52:01'),(5,11,9,'9',206078,0,'Protective clothing','Masks',1500.00,'2021-03-02','2021-03-01 16:52:02','2021-03-01 16:52:02');
/*!40000 ALTER TABLE `finance_expense_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance_income_item`
--

DROP TABLE IF EXISTS `finance_income_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance_income_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnershipSubType` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payer` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `funding_id` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance_income_item`
--

LOCK TABLES `finance_income_item` WRITE;
/*!40000 ALTER TABLE `finance_income_item` DISABLE KEYS */;
INSERT INTO `finance_income_item` VALUES (1,4,3,4,'2','2021-01-20',50000.00,'UIF','<p>Loan to be paid in six months</p>\r\n<gdiv></gdiv>',315509,'2021-01-20 15:24:43','2021-01-20 15:24:43'),(2,4,3,4,'2','2021-01-21',78521.00,'Ithuba','<p>Sponsorship</p>\r\n<gdiv></gdiv>',111922,'2021-01-20 15:25:45','2021-01-20 15:25:45'),(3,45,1,1,'1','2021-01-12',50.00,'1500','<p>wrewrwreww</p>\r\n\r\n<p>wwwww</p>\r\n\r\n<p>www</p>\r\n\r\n<p>wwwww</p>\r\n\r\n<p>wwwwwwww</p>\r\n',253503,'2021-01-25 10:52:03','2021-02-02 10:49:51'),(4,10,11,9,'9','2021-03-01',20000.00,'Organization Funding','<p>This is funding is&nbsp;from&nbsp;the organization</p>\r\n',906147,'2021-03-01 23:10:01','2021-03-01 23:10:01');
/*!40000 ALTER TABLE `finance_income_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner`
--

DROP TABLE IF EXISTS `learner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `trining_provider` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `assessment` varchar(12) NOT NULL,
  `disable` varchar(12) NOT NULL,
  `utf_benefits` varchar(12) NOT NULL,
  `learner_accepted_training` varchar(255) NOT NULL DEFAULT 'yes',
  `learnship_id` int(11) NOT NULL,
  `learnershipSubType` varchar(100) NOT NULL,
  `id_copy` varchar(150) NOT NULL,
  `certificate_copy` varchar(150) NOT NULL,
  `contract_copy` varchar(150) NOT NULL,
  `SETA` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `Suburb` varchar(100) NOT NULL,
  `Street_name` varchar(100) NOT NULL,
  `Street_number` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_type` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `upload_proof_of_banking` varchar(255) DEFAULT NULL,
  `drop_out` int(11) NOT NULL DEFAULT 0,
  `enrollment_date` varchar(255) NOT NULL,
  `completion_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner`
--

LOCK TABLES `learner` WRITE;
/*!40000 ALTER TABLE `learner` DISABLE KEYS */;
INSERT INTO `learner` VALUES (1,13,1,1,'Slash Training Provider','Slash Technology','','Learner','1236547896547','learner@gmail.com','123654785','444555888','yes','','yes','',1,'1','','','','231321Scdb14','Limpopo','Koloti','Bela Bela  Warmbad','notforusemunc','','ff','  kug','7','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','8994d77045ece5e7e0b7b2920eaf0445.png',0,'','Report Writing','Slash Technology Employer','Standard Bank','Cheque','45455554444455555555','BRNCH MNAMWEN','5','',0,'','','2021-01-20 05:55:56','2021-05-19 06:38:35'),(2,4,3,3,'Multichoice','Siviwe','','Tiya','8609186019089','siviwe@khathula.com','622151432','644647453','no','no','yes','yes',4,'2','adb80a9df8a784b4aeeb553029497201.docx','828fc9006aceced99907fc841238c6af.docx','e733f0f301b5ef01f6035eb8fd2e837d.docx','65898','Kwazulu Natal Correct One','Harry Gwala','Creighton','Dr','','Ixopo','Church Street','','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','Coal','KFC','Post Bank','Cheque','25698754789898','Mthatha Branch','52145','32dc243be838735c5b7afa7faa179a1c.docx',0,'2021-01-27','2021-02-18','2021-01-20 14:59:52','2021-01-27 06:35:34'),(3,4,3,3,'Multichoice','Siphokazi','','Jezile','8609186019087','asrtiya@gmail.com','658965231','134562874','yes','yes','no','no',4,'2','ad727893034cf6d4736201ab7988fd9d.docx','c23dfe77f364285c8fc63a019a55d420.docx','69fa318b5c6fbabb9d28fa9d295e779f.docx','12125k','Northern Cape Correct One','ZF Mgcawu','Kakamas','Kai','','Northern Town','Mabala','2565','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'Above the age limit','Coal','Nandos','Nedbank','Saving','2656859568','Centurion','25698','a5e0f1da4d2a9f03c6d88ed44ec0cb9f.docx',0,'2021-02-25','2020-06-07','2021-01-20 15:04:56','2021-01-27 06:35:38'),(5,4,3,3,'Multichoice','Amanda','','Mtsotso','8609186019087','asrtiya@gmail.com','622151432','644647453','yes','yes','yes','yes',4,'2','30743c710b56f3242b094a77e36d66be.docx','4dca1ebf3e168186d4599a5bf5692daa.docx','10b26f89ec0e544c99d72301b087f565.docx','25685','Northern Cape Correct One','John Taolo Gaetsewe','Kathu','Khâi-Ma','','Mahikeng',' Malema Street','1455','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','Coal','Nandos','Post Bank','Cheque','256988','Pretoria North','25475','b3f54741f3337424eb149470af31d619.docx',0,'2021-01-21','2021-02-18','2021-01-20 15:58:22','2021-01-27 06:35:40'),(6,4,3,3,'Multichoice','Nokuzola','','Phalo','8609186019088','asrtiya@gmail.com','622151432','622151432','yes','yes','yes','yes',4,'2','8944e31ed1ed23ed8633d862c163b194.docx','c71b9a7bf4af0fc0a59e545ad82f4662.docx','ab9431daa6f2438c7faca39f7646a177.docx','258745','Northern Cape Correct One','Namakwa','Springbok','Nama','','Montana',' Kirkness Avenue','210','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','Coal','KFC','Nedbank','Saving','256854758','England','3656','7b461eab8d59195ee4766e200b324696.docx',0,'2021-01-29','2021-02-26','2021-01-21 02:41:08','2021-01-27 06:35:45'),(8,1,1,1,'Slash Training Provider','qwwww','','qw','1230123012301','qw@gmail.com','123123223','232323232','no','no','no','yes',7,'6','9007f7a55e9b992af39315a6119e65e7.png','ffd8042df255159aa1c73d924d9a642e.jpg','','dert5656','Western Cape Correct One','Central Karoo','Laingsburg','Laingsburg','','wqwewqe',' re45345','56','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','7th','Slash Technology Employer','ABSA','Cheque','234567890','hjncgfm ','4654','e3c0bd373d85100033b59d69df17a20d.jpg',1,'','','2021-01-25 11:47:17','2021-01-27 06:35:49'),(9,10,11,5,'TestWilliamJan','Willy','','Maina','1234567894574','wmunyambu@live.com','740740732','740740732','no','no','yes','yes',9,'9','f551783816bde3c5ef6ed56465e66fd4.jpg','','','13246','Mpumalanga Correct one','Nkangala','Middelburg','Steve','','Blairgworie','Bend','15','83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','Male','',0,'','TestJanClass1','WilliamKhathula','FNB','Cheque','123456','Randburg','123','18476f532a5e600c5dfe9d226c6e04df.jpg',0,'2021-01-27','2021-02-05','2021-01-26 09:09:23','2021-01-27 06:35:52'),(10,10,11,5,'TestWilliamJan','Winnie','','Maina','1234567891011','wmunyambu@live.com','836896330','836896330','yes','no','yes','yes',9,'9','2d6c2d4cfa71367382a252e4e60f3bcf.jpg','','','12345','North West correct one','Dr Kenneth Kaunda','Wolmaransstad','City','','Johannesburg',' 14 Bend Street, Blairgowrie','15','83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','Female','',0,'','TestJanClass1','WilliamKhathula','ABSA','Saving','132456','Randburg','12345','021f24fb9b9459dc53f2af5ae608dbc6.jpg',0,'2021-01-27','2021-02-05','2021-01-26 09:21:14','2021-01-27 06:35:56'),(11,1,1,1,'Slash Training Provider','ssddd','','dddd','1471471471470','ddd@gmail.com','456456456','410410410','no','no','no','yes',1,'1','','','','156fdsfs','Northern Cape Correct One','Frances Baard','Warrenton','Magareng','','sdfgh',' sdfghj','456','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','slash','Slash Technology Employer','ABSA','Cheque','456789','fdghjk','sedrtfgy567','a9f5d8d995b49e5f7f1b0b2fa4f12b3e.png',1,'','','2021-01-26 10:59:17','2021-01-27 09:04:56'),(12,4,3,3,'Multichoice','Xola','','Mlambo','8609186019086','xola@gmail.com','622151432','644647453','yes','no','yes','yes',10,'10','26d0c31fb609c7c7007d5521c0d19a24.docx','1e504264dc9261df915a9a1835e61e7e.docx','0d42aaf2809e9dbb15f3252dbc6c9a87.docx','698547','Western Cape Correct One','Central Karoo','Prince Albert','Prince','','Kraaifontein',' Hertzog','','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','Datsun','KFC','ABSA','Cheque','6985487887','Centurion','258747','723aabe9825601e671036280b28e5c68.docx',0,'2021-01-26','2021-03-26','2021-01-26 12:59:43','2021-01-27 06:36:04'),(13,4,3,3,'Multichoice','Sicelo','','Baba','8609186019085','sicelo@gmail.com','658896589','697845875','no','yes','yes','no',4,'2','931d527c8624992ac7530aa6229d5c6e.docx','6dd1e9afcad39cd8971949683fbf2247.docx','4bcf801665baf4104ccd5ec11bf4d9b5.docx','698545','Northern Cape Correct One','Frances Baard','Warrenton','Magareng','','Qwaqwa','Pierre van Ryneveld Road','','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'Late application','Coal','KFC','FNB','Cheque','3698547888','Pretoria','369885','6d3df04c7fef02ee81028e0ca8853d07.docx',0,'2021-02-16','2021-04-26','2021-01-26 13:03:59','2021-01-27 06:36:07'),(37,13,1,1,'Slash Training Provider','Sibongile','','Zwane','9205135628085','sibongile@epsitech.co.za','742581360','762206363','no','no','no','yes',13,'14','','','','22445','Mpumalanga','Nkangala','Siyabuswa','Dr','','Siyabuswa','Sotobe Street','45','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','Introduction to Food and Beverages','Slash Technology Employer','Capitec','Saving','1275698549','Vaal Branch','254605','69df8438e7e28668e34b8ee7561d06e6.png',0,'2021-03-01','2021-04-30','2021-03-04 11:11:33','2021-05-03 21:21:34'),(36,13,1,1,'Slash Training Provider','yrt','','yrrty','1234567890123','admin@gmail.com','123456789','123456789','yes','yes','yes','yes',7,'6','','','','123456789','North West correct one','Dr Kenneth Kaunda','Potchefstroom','JB','','hfhfg','eyrey','12','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','8th','Slash Technology Employer','ABSA','Cheque','43654757','567hfdhfh','645767','3879409c7e899d53279bca7409545a8c.png',0,'','','2021-02-03 07:39:43','2021-02-03 07:39:43'),(35,13,1,1,'Slash Training Provider','gfdfgdfd','','fdgfdhgdfh','1234567890123','admin@gmail.com','123456789','987654321','yes','yes','yes','yes',1,'1','','','','e43346457','Northern Cape Correct One','John Taolo Gaetsewe','Kathu','Khâi-Ma','','hfhfg',' dfgdsg','123456789','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','slash','Slash Technology Employer','Nedbank','Saving','123456789','456ghjghjf','12458','8ab93e01c4b95459308500e95ccdbf5e.png',0,'','','2021-02-03 05:08:09','2021-02-03 05:08:09'),(34,13,1,1,'Slash Training Provider','fdydfh','','hfdhdf','1234567890123','admin@gmail.com','123456789','987654321','yes','no','no','yes',1,'1','','','','e43346457','Mpumalanga Correct one','Gert Sibande','Secunda','Govan','','hfhfg',' fgjgf','12','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','slash','Slash Technology Employer','FNB','Cheque','56457547','456ghjghjf','fghjfgj','fbb0f2aad77ea7052476d3d07ce36c61.jpg',0,'','','2021-02-03 05:05:01','2021-02-03 05:05:01'),(33,13,1,1,'Slash Training Provider','fdydfh','','hfdhdf','1234567890123','admin@gmail.com','123456789','987654321','yes','no','no','yes',1,'1','','','','e43346457','Mpumalanga Correct one','Gert Sibande','Secunda','Govan','','hfhfg',' fgjgf','12','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','slash','Slash Technology Employer','FNB','Cheque','56457547','456ghjghjf','fghjfgj','d68b3c8b99bee53834a4b7d2a004a341.jpg',0,'','','2021-02-03 05:04:14','2021-02-03 05:04:14'),(32,13,1,1,'Slash Training Provider','fhfdhfdh','','hfghjfgj','1234567890123','admin@gmail.com','123456789','123456789','yes','no','yes','yes',0,'1','','','','e43346457','Northern Cape Correct One','Namakwa','Williston','Karoo','','hfhfg',' dfgdsg','45','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','slash','Slash Technology Employer','FNB','Cheque','5647457','45yrtuyru','turrtu','05fe2f7acc254396b71c284385c81ed7.jpg',0,'2021-02-11','2021-02-25','2021-02-03 04:58:53','2021-02-03 04:58:53'),(31,13,1,1,'Slash Training Provider','fhfdhfdh','','hfghjfgj','1234567891012','admin@gmail.com','123456789','546457547','yes','yes','yes','yes',0,'6','','','','e43346457','Limpopo','Dendron','Polokwane or Pietersburg','Makhado','','hfhfg','hggfh','4','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'','7th','Slash Technology Employer','Capitec','Saving','64356456','456ghjghjf','546546','1531cd2071f2eadaf357e58551725618.jpg',0,'2021-02-19','2021-02-25','2021-02-02 13:22:30','2021-02-02 13:22:30'),(29,13,1,1,'Slash Training Provider','DFSDF','','dfgdfg','1201201201201','driver@gmail.com','088174017','088174017','no','no','no','no',0,'6','','','','dert5656','test aaa','test bbbb','test cccc','test','','hjbk','fj','5432','7c4a8d09ca3762af61e59520943dc26494f8941b','Female','',0,'gbh','8th','Slash Technology Employer','ABSA','Saving','87798089098','jkl','zdfydf765783','80434133985b455495011fa2e799cbba.png',0,'','','2021-02-02 10:19:22','2021-02-02 10:19:22'),(30,13,1,1,'Slash Training Provider','DFSDF','','dfgdfg','1471471471471','driver@gmail.com','088174017','088174017','yes','no','no','yes',0,'6','','','','zs123','test aaa','test bbbb','test cccc','test','','Choto Haibor',' Orbit Mall Mall','545','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','8th','Slash Technology Employer','ABSA','Cheque','5658589565656','hjncgfm ','hjkh','c9b9d3a97e79c5a61a6f69b3d9aa4211.png',0,'','','2021-02-02 10:20:57','2021-02-02 10:20:57'),(38,0,0,0,'Slash Training Provider','David','','Stones','8705056235084','david@gmail.com','724586230','762581478','No','No','No','Yes',0,'Food','','','','EF44226644','Mpumalanga','Nkangala','Siyabuswa','Dr','','Siyabuswa','Sotobe Street','45','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','Introduction to Food and Beverages',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'','','2021-03-04 16:44:05','2021-05-03 21:21:34'),(39,10,11,5,'TestWilliamJan','Thabang','','Aphane','9201015326081','thabang@gmail.com','735241502','725142026','yes','no','no','yes',14,'15','','','','2266554411','Mpumalanga','Nkangala','Siyabuswa','Dr','','Siyabuswa','Thokozani Street','12','7c4a8d09ca3762af61e59520943dc26494f8941b','Male','',0,'','William\'s','Thomas Lamola Pty Ltd','ABSA','Saving','152405012630','Siyabuswa Branch','254150','f35c03cb456dcca52a8c8b29f4a9d6fa.png',0,'2021-01-04','2021-03-31','2021-03-09 09:24:05','2021-03-09 09:24:05');
/*!40000 ALTER TABLE `learner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_absent`
--

DROP TABLE IF EXISTS `learner_absent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_absent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer` int(11) NOT NULL,
  `learner_id` varchar(255) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `learnership_id` int(11) NOT NULL,
  `sublearnership_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `reason` varchar(11) NOT NULL,
  `doctor_note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_absent`
--

LOCK TABLES `learner_absent` WRITE;
/*!40000 ALTER TABLE `learner_absent` DISABLE KEYS */;
INSERT INTO `learner_absent` VALUES (1,1,1,1,'2147483647','qwwww','qw',7,6,'5','2021-01-20','',''),(2,1,1,1,'2147483647','Slash Technology','Learner',1,1,'1','2021-01-20','',''),(3,1,1,1,'2147483647','Slash Technology','Learner',7,6,'5','2021-01-28','',''),(4,4,3,3,'2147483647','Siviwe','Tiya',10,10,'9','2021-01-29','','278cfb97be99c7fdc0742c4e6a75b8df.docx'),(5,1,1,1,'2147483647','ssddd','dddd',0,0,'slash','2021-01-28','',''),(6,1,1,1,'2147483647','qwwww','qw',0,0,'7th','2021-01-28','',''),(7,1,1,1,'2147483647','Slash Technology','Learner',0,0,'slash','2021-01-30','','8ee8cc13a29aae851ccc795b7368b7b3.png'),(8,1,1,1,'1236547896547','Slash Technology','Learner',0,0,'slash','2021-01-27','','ec978ab31c9589da6e6e5a8975e94065.png'),(9,1,1,1,'1236547896547','Slash Technology','Learner',1,1,'slash','2021-01-21','',''),(10,13,1,1,'1471471471470','ssddd','dddd',1,1,'slash','2021-02-02','assdvddewah',''),(11,13,1,1,'9205135628085','Sibongile','Zwane',13,14,'Introduction','2021-03-05','Transport i','');
/*!40000 ALTER TABLE `learner_absent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_assessment`
--

DROP TABLE IF EXISTS `learner_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessment_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `internal_moderation_status` varchar(255) NOT NULL,
  `internal_moderation_by` int(11) DEFAULT NULL,
  `internal_moderation_date` datetime NOT NULL,
  `internal_moderation_notes` text DEFAULT NULL,
  `external_moderation_status` varchar(255) NOT NULL,
  `external_moderation_by` int(11) DEFAULT NULL,
  `external_moderation_date` datetime NOT NULL,
  `external_moderation_notes` text DEFAULT NULL,
  `upload_moderated_learner_guide` varchar(255) NOT NULL,
  `upload_moderated_learner_guide_name` varchar(255) NOT NULL,
  `upload_moderated_workbook` varchar(255) NOT NULL,
  `upload_moderated_workbook_name` varchar(255) NOT NULL,
  `upload_moderated_poe` varchar(255) NOT NULL,
  `upload_moderated_poe_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `competency_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_assessment`
--

LOCK TABLES `learner_assessment` WRITE;
/*!40000 ALTER TABLE `learner_assessment` DISABLE KEYS */;
INSERT INTO `learner_assessment` VALUES (1,1,1,'marked','submitted',NULL,'0000-00-00 00:00:00',NULL,'',NULL,'0000-00-00 00:00:00',NULL,'','','','','','','2021-05-20 02:35:51','2021-05-20 02:37:23','not competent');
/*!40000 ALTER TABLE `learner_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_assessment_submission`
--

DROP TABLE IF EXISTS `learner_assessment_submission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_assessment_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_assessment_id` int(11) NOT NULL,
  `assessment_submission_date` datetime NOT NULL,
  `upload_completed_learner_guide` varchar(255) NOT NULL,
  `upload_completed_learner_guide_name` varchar(255) NOT NULL,
  `upload_completed_workbook` varchar(255) NOT NULL,
  `upload_completed_workbook_name` varchar(255) NOT NULL,
  `upload_completed_poe` varchar(255) NOT NULL,
  `upload_completed_poe_name` varchar(255) NOT NULL,
  `assessment_status` varchar(255) NOT NULL,
  `assessed_by` int(11) DEFAULT NULL,
  `assessment_date` datetime NOT NULL,
  `assessment_notes` text DEFAULT NULL,
  `learner_feedback` text DEFAULT NULL,
  `overall_assessment` text DEFAULT NULL,
  `upload_marked_learner_guide` varchar(255) NOT NULL,
  `upload_marked_learner_guide_name` varchar(255) NOT NULL,
  `upload_marked_workbook` varchar(255) NOT NULL,
  `upload_marked_workbook_name` varchar(255) NOT NULL,
  `upload_marked_poe` varchar(255) NOT NULL,
  `upload_marked_poe_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `marked_by` int(11) DEFAULT NULL,
  `marked_date` datetime NOT NULL,
  `marked_status` varchar(255) NOT NULL,
  `assessment_mark` varchar(255) DEFAULT NULL,
  `competency_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_assessment_submission`
--

LOCK TABLES `learner_assessment_submission` WRITE;
/*!40000 ALTER TABLE `learner_assessment_submission` DISABLE KEYS */;
INSERT INTO `learner_assessment_submission` VALUES (1,1,'2021-05-20 00:17:14','','','b096536c10370c3548c135ca2d58d6c6.pdf','AssetTagReportDashboard.pdf','7555370a0a5435cef0d86c1af0cfe367.pdf','AssetTagReportDashboard.pdf','new',NULL,'2021-05-20 03:06:21','aaaaaa','bbbbbbbb','cccccccccccc','','','cb79dc82c36a9392c5617248cc9b307d.pdf','AssetTagReportDashboard.pdf','','','2021-05-19 22:17:14','2021-05-20 01:06:21',1,'0000-00-00 00:00:00','marked','23','not competent'),(3,1,'2021-05-20 04:00:27','','','dd78b821c13db0f0c90f71ac56088c5d.pdf','AssetTagReportDashboard.pdf','','','new',NULL,'2021-05-20 04:35:09','ddddd','eeeeee','fffffff','','','b111b907071e4fb4b9a5284565fd83f8.pdf','AssetTagReportDashboard.pdf','','','2021-05-20 02:00:27','2021-05-20 02:35:09',1,'0000-00-00 00:00:00','marked','33','not competent'),(4,1,'2021-05-20 04:35:51','','','0188b9fdda1637910430f077a902c30f.pdf','AssetTagReportDashboard.pdf','','','new',NULL,'2021-05-20 04:37:23','gggg','hhhhhh','iiiiiiiii','','','678549f61e7d879a796b728aef3032f2.pdf','AssetTagReportDashboard.pdf','','','2021-05-20 02:35:51','2021-05-20 02:37:23',1,'0000-00-00 00:00:00','marked','44','not competent');
/*!40000 ALTER TABLE `learner_assessment_submission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_bankdetail`
--

DROP TABLE IF EXISTS `learner_bankdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_bankdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_name` varchar(244) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `id_number` int(100) NOT NULL,
  `learnship_id` varchar(200) NOT NULL,
  `learnership_sub_type_id` varchar(255) NOT NULL,
  `learner_classname` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch_name` varchar(255) NOT NULL,
  `account_type` varchar(222) NOT NULL,
  `branch_code` varchar(222) NOT NULL,
  `account_number` varchar(222) NOT NULL,
  `account_holder_name` varchar(244) NOT NULL,
  `account_holder_surname` varchar(255) NOT NULL,
  `account_holder_idnumber` varchar(244) NOT NULL,
  `account_holder_id` varchar(255) NOT NULL,
  `account_holder_proof_id` varchar(255) NOT NULL,
  `training_provider` int(100) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_bankdetail`
--

LOCK TABLES `learner_bankdetail` WRITE;
/*!40000 ALTER TABLE `learner_bankdetail` DISABLE KEYS */;
INSERT INTO `learner_bankdetail` VALUES (1,'Slash Technology','Learner',2147483647,'1','1','slash','Investec Bank Limited','sadsaf','Saving','dfdretre','6564656645','gfgy','trfrtrt','rr556','278d3f0efd7b7e2e3428492b6b77c86e.png','97d9d9467c66ca69d808a7674c6d6605.png',1,'','2021-01-26 09:53:07','2021-01-26 09:53:07'),(2,'Slash Technology','Learner',2147483647,'0','slash one','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','Slash Technology','Learner','1236547896547','d8c3dc5c13d57902cd0292d40d375044.png','68b62b9dee5ef3564dde6d2c2565168b.png',1,'','2021-01-28 13:25:33','2021-01-28 13:25:33'),(3,'ssddd','dddd',2147483647,'0','slash one','slash','ABSA','fdghjk','Cheque','sedrtfgy567','456789','ssddd','dddd','1471471471470','b31e05a6a0583ca6fd901c130cdc8496.jpg','9b0526485a0eae3c9965c47719279b65.jpg',1,'','2021-02-02 13:18:49','2021-02-02 13:18:49'),(4,'fdydfh','hfdhdf',2147483647,'0','slash one','slash','FNB','ghjghjf','Cheque','fghjfgj','56457547','fdydfh','hfdhdf','1234567890123','3bb6c390396ce58278f3909560cd5f53.jpg','e55ea970d447e6f7807ba143c9ef39fc.jpg',1,'','2021-02-03 07:58:35','2021-02-03 07:58:35'),(5,'fdydfh','hfdhdf',2147483647,'0','slash one','slash','FNB','ghjghjf','Cheque','fghjfgj','56457547','fdydfh','hfdhdf','1234567890123','c120a48487e151533dfd228315cdb059.jpg','3764c409494f1844db0e7e80974b371d.png',1,'','2021-02-03 08:02:08','2021-02-03 08:02:08'),(6,'fdydfh','hfdhdf',2147483647,'0','slash one','slash','FNB','456ghjghjf','Cheque','fghjfgj','56457547','fdydfh','hfdhdf','1234567890123','dca824d1eeffb589784e374793f21450.jpeg','d78a47437ac46fe0fcc4c0a1630c452b.jpg',1,'','2021-02-03 08:38:51','2021-02-03 08:38:51'),(7,'fdydfh','hfdhdf',2147483647,'slash one','slash one','slash','FNB','456ghjghjf','Cheque','fghjfgj','56457547','fdydfh','hfdhdf','1234567890123','800d6d2bcdc3631a9c0cb8570c726d2f.jpg','6c0b9831db045c2e1b6fc3d0169956ed.png',1,'','2021-02-04 11:53:46','2021-02-04 11:53:46');
/*!40000 ALTER TABLE `learner_bankdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_bk`
--

DROP TABLE IF EXISTS `learner_bk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_bk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trining_provider` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `assessment` varchar(12) NOT NULL,
  `disable` varchar(12) NOT NULL,
  `utf_benefits` varchar(12) NOT NULL,
  `learner_accepted_training` varchar(255) NOT NULL,
  `learnershipSubType` varchar(100) NOT NULL,
  `id_copy` varchar(150) NOT NULL,
  `certificate_copy` varchar(150) NOT NULL,
  `contract_copy` varchar(150) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `SETA` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `Suburb` varchar(100) NOT NULL,
  `Street_name` varchar(100) NOT NULL,
  `Street_number` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `employer_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_type` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `upload_proof_of_banking` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_bk`
--

LOCK TABLES `learner_bk` WRITE;
/*!40000 ALTER TABLE `learner_bk` DISABLE KEYS */;
/*!40000 ALTER TABLE `learner_bk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_marks`
--

DROP TABLE IF EXISTS `learner_marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `training_provider` varchar(255) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnership_sub_type` varchar(255) NOT NULL,
  `programme_director` varchar(255) NOT NULL,
  `project_manager` varchar(255) NOT NULL,
  `facilirator` varchar(255) NOT NULL,
  `assessor` varchar(255) NOT NULL,
  `assessor_reg_no` varchar(255) NOT NULL,
  `moderator` varchar(255) NOT NULL,
  `moderator_reg_no` varchar(255) NOT NULL,
  `no_of_learner` varchar(255) NOT NULL,
  `training_start_date` date NOT NULL,
  `training_end_date` date NOT NULL,
  `cluster` varchar(255) NOT NULL,
  `standrad_name` varchar(255) NOT NULL,
  `standard_id` varchar(255) NOT NULL,
  `unit_standard_type` varchar(255) NOT NULL,
  `available_credits` varchar(255) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `learner_id_number` varchar(255) NOT NULL,
  `learner_classname` varchar(255) NOT NULL,
  `first_test` varchar(255) NOT NULL,
  `second_test` varchar(255) NOT NULL,
  `third_test` varchar(255) NOT NULL,
  `attempt1` varchar(255) NOT NULL,
  `attempt2` varchar(255) NOT NULL,
  `attempt3` varchar(255) NOT NULL,
  `total_credits_allocated` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `date` date NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_marks`
--

LOCK TABLES `learner_marks` WRITE;
/*!40000 ALTER TABLE `learner_marks` DISABLE KEYS */;
INSERT INTO `learner_marks` VALUES (1,4,'Multichoice',4,'2','','3','4','','','','','','0000-00-00','0000-00-00','','','','','','','','','2','','','','','','','','',2021,'0000-00-00','4ad236566b3c67e67462966487a5c57f.docx',2,3,'2021-01-21 02:51:40','2021-01-21 02:51:40'),(2,4,'Multichoice',4,'2','','3','4','','','','','','0000-00-00','0000-00-00','','','','','','','','','2','','','','','','','','',2021,'0000-00-00','aa08cbac6ce5b243a7a5b6b35136e9c5.docx',2,3,'2021-01-21 09:10:55','2021-01-21 09:10:55'),(3,0,'Multichoice',0,'3','','','Songezo','','','','','','0000-00-00','0000-00-00','','','','','','','','','3','','','','','','','','',2020,'0000-00-00','c4532673c3b360ee3eb21a860e9522a7.docx',2,4,'2021-01-21 09:12:28','2021-01-21 09:12:28'),(4,1,'Slash Training Provider',1,'1','','1','','','','','','','0000-00-00','0000-00-00','','','','','','','','','1','','','','','','','','',2021,'0000-00-00','d8c1589c490bf8744b563a072c694fab.jpg',2,1,'2021-01-23 05:51:25','2021-01-26 09:34:45'),(5,0,'Slash Training Provider',0,'6','','','Slash Technology','','','','','','0000-00-00','0000-00-00','','','','','','','','','5','','','','','','','','',2019,'0000-00-00','f7f6b5192e40ed0ddc8d36679435901e.png',2,1,'2021-01-26 10:04:49','2021-01-26 10:04:49'),(6,1,'Slash Training Provider',7,'6','','1','1','','','','','','0000-00-00','0000-00-00','','','','','','','','','5','','','','','','','','',2011,'0000-00-00','6eba57ca42e1f725fb09f5b0d7bfef53.png',2,1,'2021-01-26 11:03:30','2021-01-26 11:03:30'),(7,4,'Multichoice',10,'10','','3','4','','','','','','0000-00-00','0000-00-00','','','','','','','','','9','','','','','','','','',2021,'0000-00-00','51df63c3f0bcfce1e8b0e0ea092fcc33.docx',2,3,'2021-01-26 13:22:04','2021-01-26 13:22:04'),(8,0,'Slash Training Provider',0,'1','','','Slash Technology','','','','','','0000-00-00','0000-00-00','','','','','','','','','1','','','','','','','','',2019,'2020-12-31','39cad080bd1f584a2bda8919f569dc99.png',2,1,'2021-01-28 06:54:17','2021-01-28 06:54:17'),(9,13,'Slash Training Provider',7,'6','','1','1','','','','','','0000-00-00','0000-00-00','','','','','','','','','5','','','','','','','','',2019,'0000-00-00','7a7f08b395cf1c3d1f4251fa2ebb8ad0.png',2,1,'2021-02-02 10:24:40','2021-02-02 10:24:40'),(10,13,'Slash Training Provider',13,'14','','1','22','','','','','','0000-00-00','0000-00-00','','','','','','','','','16','','','','','','','','',2020,'0000-00-00','e755337fd2e59d524839219b462e675b.png',2,1,'2021-03-05 11:21:04','2021-03-05 11:21:04'),(11,0,'Slash Training Provider',0,'14','','','Slash Technology','','','','','','0000-00-00','0000-00-00','','','','','','','','','16','','','','','','','','',2021,'2021-03-10','fdcbdf88dfdc24534bc425f5a12686f6.png',2,1,'2021-03-10 09:09:31','2021-03-10 09:09:31');
/*!40000 ALTER TABLE `learner_marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learner_performance`
--

DROP TABLE IF EXISTS `learner_performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learner_performance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_name` varchar(255) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `learner_id` varchar(255) NOT NULL,
  `date_of_incident` varchar(100) NOT NULL,
  `insident_desc` varchar(255) NOT NULL,
  `evidance` varchar(255) NOT NULL,
  `current_status_incident` varchar(200) NOT NULL,
  `outcome_of_incident` varchar(200) NOT NULL,
  `warning_letter` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learner_performance`
--

LOCK TABLES `learner_performance` WRITE;
/*!40000 ALTER TABLE `learner_performance` DISABLE KEYS */;
INSERT INTO `learner_performance` VALUES (1,'Nokuzola','Phalo','8609186019088','2021-01-21','kgkjgjkgkj','','complete','warning_letter_issued','67c2bf57b555138618d85221832cc817.docx','4','Facilitator','2021-01-21 10:26:50','0000-00-00 00:00:00'),(2,'Siviwe','Tiya','8609186019089','2021-01-21','jhdjfhjdf','','complete','Learner_expelled','e769ab597edfa99dc434ba08be66c6bf.docx','4','Facilitator','2021-01-21 10:27:35','0000-00-00 00:00:00'),(3,'Siphokazi','Jezile','8609186019087','2021-01-26','Stealing','','complete','warning_letter_issued','d159efe27da8f6c5a7583d9b1a1c8b4d.docx','4','Facilitator','2021-01-26 04:22:11','0000-00-00 00:00:00'),(4,'Slash Technology','Learner','1236547896547','2021-01-13','wdwrewtewt','1611656233_0.png','pending','warning_letter_issued','ea627b5bf547f7e8fe4eeb3a6ab117e8.png','1','Facilitator','2021-01-26 10:17:13','0000-00-00 00:00:00'),(5,'Thabang','Aphane','9201015326081','2021-03-08','We are testing that the issue was submitted.','','complete','warning_letter_issued','57c1e67b6ac1e7b71ff377a9aa2b6ebe.png','1','Facilitator','2021-03-10 15:21:31','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `learner_performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learnership`
--

DROP TABLE IF EXISTS `learnership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learnership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `saqa_registration_id` varchar(100) NOT NULL,
  `total_credits` int(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learnership`
--

LOCK TABLES `learnership` WRITE;
/*!40000 ALTER TABLE `learnership` DISABLE KEYS */;
INSERT INTO `learnership` VALUES (1,2,'slash one','ddgsfe545f4sf5',10,1,'2021-01-20 05:44:51','0000-00-00 00:00:00',1,1,1),(2,2,'Capitec Management','12065',120,2,'2021-01-20 13:18:23','0000-00-00 00:00:00',3,2,2),(3,2,'Capitec Finance Management','CAP5785',120,3,'2021-01-20 14:52:42','0000-00-00 00:00:00',4,3,3),(4,2,'Transnet Learnership','Trans5858J',200,3,'2021-01-20 14:53:29','0000-00-00 00:00:00',4,3,3),(5,2,'Indwe','25655',320,3,'2021-01-20 15:38:58','0000-00-00 00:00:00',4,3,3),(6,2,'Garage','2565',220,3,'2021-01-21 02:33:11','0000-00-00 00:00:00',4,3,3),(7,2,'test','dfggdfgd',3400,1,'2021-02-03 09:40:08','0000-00-00 00:00:00',1,1,6),(9,2,'TestJan26','123456',16,5,'2021-01-26 08:54:42','0000-00-00 00:00:00',10,11,5),(10,2,'Nissan','586985',120,3,'2021-01-26 12:52:54','0000-00-00 00:00:00',4,3,3),(11,2,'Maths','12345',10,1,'2021-02-19 06:31:06','0000-00-00 00:00:00',13,1,1),(12,2,'Skills Programme','116291',3,8,'2021-02-19 07:00:41','0000-00-00 00:00:00',243,17,8),(13,2,'Food beverages','116390',28,1,'2021-03-03 23:53:23','0000-00-00 00:00:00',13,1,1),(14,2,'Food beverages and Services','152462526',28,5,'2021-03-09 09:19:39','0000-00-00 00:00:00',10,11,5);
/*!40000 ALTER TABLE `learnership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `learnership_sub_type`
--

DROP TABLE IF EXISTS `learnership_sub_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `learnership_sub_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `facilitator` int(100) NOT NULL,
  `sub_type` varchar(100) NOT NULL,
  `min_credit` int(11) NOT NULL,
  `unit_standard` varchar(150) NOT NULL,
  `unit_name` text NOT NULL,
  `total_credits_allocated` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `learnership_sub_type`
--

LOCK TABLES `learnership_sub_type` WRITE;
/*!40000 ALTER TABLE `learnership_sub_type` DISABLE KEYS */;
INSERT INTO `learnership_sub_type` VALUES (1,1,1,1,2,1,1,'slash one',10,'10,11,12,13,15,16,17,18,19,20,21,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,39,4,40,41,42,43,44,45,46,47,48,49,5,50,51,52,53,54,55,6,8,9','Conduct a structured meeting.,Motivate and build a team.,Manage individual and team performance. ,Solve problems, make decisions and implement solutions.,Monitor the level of service to a range of customers. ,Induct a member into a team,Demonstrate basic understanding of the primary labour legislation that impacts on a business unit,Apply knowledge of statistics and probability to critically interrogate and effectively, communicate,Represent analyse and calculate shape and motion in 2-and 3- dimensional space in different contexts,Use mathematics to investigate and monitor the financial aspects of personal, business, national and,Engage in sustained oral/ signed communication and evaluate spoken/ signed texts.,Read/view, analyse and respond to a variety of texts.,Write/present/sign for a wide range of contexts.,Use writing process to compose texts required in business environment,Accommodate audience and context needs in oral/ signed communication. ,Use language and communication in occupational learning programmes. ,Interpret and use information from texts.,unication contexts,sdasdqeq,sds,test1,2321,dfgdfg,ghhghgdf,gdgf,Unit 34,sfsetywrywry,Prioritise time & work for self and team,AAA,BBB,Shakes,Bravo,fg,Apply Cooking Methods ,Google,BBB,ZXCVMN,BBBEE,Identify responsibilities of a team leader in ensuring that organisational standards are met.,Builders,Rochester,We buy Cars,Slash Technologies,Slash Technologies,shirts,Employ a systematic approach to achieving objectives.,Apply leadership concepts in work context.,Apply the organisations code of conduct in a work environment.  ',435592291,'',1,'2021-01-20 05:45:26','0000-00-00 00:00:00'),(2,4,3,3,2,4,4,'Railway',200,'16','Induct a member into a team',4,'',3,'2021-01-20 14:54:29','0000-00-00 00:00:00'),(3,4,3,3,2,3,3,'Finance',120,'52','We buy Cars',99,'',3,'2021-01-20 14:55:09','0000-00-00 00:00:00'),(4,4,3,3,2,5,4,'Construction',320,'50','Builders',12,'',3,'2021-01-20 15:40:27','0000-00-00 00:00:00'),(5,4,3,3,2,6,5,'Total',220,'56','Petrol 95',30,'',3,'2021-01-21 02:35:14','0000-00-00 00:00:00'),(6,1,1,1,2,7,1,'test subtyp',3400,'53,54,55,56,57','Slash Technologies,Slash Technologies,shirts,Petrol 95,testing purpose create',434336727,'',1,'2021-01-22 10:37:24','0000-00-00 00:00:00'),(9,10,11,5,2,9,8,'TestSubType1',16,'59,60','TestJan26Unit1,TestJan26Unit2',8,'',5,'2021-01-26 08:57:38','0000-00-00 00:00:00'),(8,1,1,1,2,7,1,'test twoooooooo',3400,'52,52,53,53,54,54,55,56,56,57,57','We buy Cars,We buy Cars,Slash Technologies,Slash Technologies,Slash Technologies,Slash Technologies,shirts,Petrol 95,Petrol 95,testing purpose create,testing purpose create',868673409,'',1,'2021-01-26 08:18:09','0000-00-00 00:00:00'),(10,4,3,3,2,10,4,'Datsun',120,'57','testing purpose create',2100,'',3,'2021-01-26 12:53:35','0000-00-00 00:00:00'),(11,13,1,1,2,11,17,'1',10,'54','Slash Technologies',434334353,'',1,'2021-02-19 06:31:50','0000-00-00 00:00:00'),(12,243,17,8,2,12,20,'skills programme 116291',3,'61','Participate in the development and management of an agri business plan',435594432,'',8,'2021-02-19 07:03:34','0000-00-00 00:00:00'),(13,243,17,8,2,12,20,'skills programme 116291',3,'61','Participate in the development and management of an agri business plan',435594432,'',8,'2021-02-19 07:03:34','0000-00-00 00:00:00'),(14,13,1,1,2,13,22,'Food',28,'1,3','Unit Standard One,Unit Standard Three',29,'',1,'2021-05-19 13:50:10','0000-00-00 00:00:00'),(15,10,11,5,2,14,9,'Food and Services',28,'4,5,53,55,57,6,63,8,9','Prioritise time & work for self and team,Identify responsibilities of a team leader in ensuring that organisational standards are met.,Slash Technologies,shirts,testing purpose create,Employ a systematic approach to achieving objectives.,ICE Task ,Apply leadership concepts in work context.,Apply the organisations code of conduct in a work environment.  ',2409,'',5,'2021-03-09 09:20:38','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `learnership_sub_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_admin`
--

DROP TABLE IF EXISTS `master_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_admin`
--

LOCK TABLES `master_admin` WRITE;
/*!40000 ALTER TABLE `master_admin` DISABLE KEYS */;
INSERT INTO `master_admin` VALUES (1,2,'Slash Admin','7c4a8d09ca3762af61e59520943dc26494f8941b','superadmin@gmail.com','836896330','7cc36dd8b4c60a9b5fbb1aba4a0216da.jpg','2020-09-07 05:19:59');
/*!40000 ALTER TABLE `master_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(11) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `on_trash_sender` varchar(255) NOT NULL,
  `on_trash_receiver` varchar(255) NOT NULL,
  `deleted_sender` varchar(255) NOT NULL,
  `deleted_receiver` varchar(255) NOT NULL,
  `imp_sender` varchar(255) NOT NULL,
  `imp_receiver` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'superadmin','superadmin','4','organization','Hello','Welcome to digilims','1947c1db7049ea96e9c97522e43f8c2d.docx','2021-01-20 15:59:36','','','','','',''),(2,'3','projectmanager','3','trainer','Deadline','Do not forget the deadline','7285aae664348791cb0807edb0e06f87.docx','2021-01-20 16:07:08','','','','','',''),(3,'1','organization','superadmin','superadmin','new msg1','qaaaaaaaaaaaaaaaaaaaaa','','2021-01-23 05:59:27','','','','','',''),(4,'superadmin','superadmin','1','organization','new msg1','abbbbbbbbbbbbbbbbbb','','2021-01-23 05:59:59','','','','','',''),(5,'1','projectmanager','4,1','trainer','new msg1','wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww','','2021-01-25 11:16:45','','','','','',''),(6,'1','trainer','1','projectmanager','new msg1','ttttttttttttttttttttttttttttttttttttttttttttt','','2021-01-25 11:17:41','','','','','',''),(7,'4','organization','6,3','projectmanager','Welcome','We are glad you are onboard','','2021-01-26 04:01:23','','','','','',''),(8,'4','organization','4','facilitator','Facilitator','Hello there ','','2021-01-26 04:42:21','','','','','',''),(9,'4','organization','3','projectmanager','Project','There is a new project online','','2021-01-26 04:43:27','','','','','',''),(10,'superadmin','superadmin','6,5,4,1','organization','Welcome','Welcome','','2021-01-26 07:53:22','','','','','',''),(11,'5','trainer','11','projectmanager','Wassup','Wassup','','2021-01-26 09:30:06','','','','','',''),(12,'5','trainer','8','facilitator','Wassup','Wassup','','2021-01-26 09:33:46','','','','','',''),(13,'1','trainer','1','facilitator','dfewffeg','eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee','','2021-01-26 09:55:04','','','','','',''),(14,'1','facilitator','1','trainer','dadasd','rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr','','2021-01-26 09:57:03','','','','','',''),(15,'1','facilitator','1','trainer','eeee','xxxxxxxxxxxxxxxxxxxx','','2021-01-26 10:21:07','','','','','',''),(16,'5','trainer','8','facilitator','Class Link','Class Link - https://digilims.co.za/b/wil-ak6-mxn-jrm\r\n','','2021-01-26 12:12:46','','','','','',''),(17,'3','projectmanager','7,6,3','trainer','Do not forget to submit','All submissions are online','c40be044e7c39a9b03bf5fb6cf9d688b.docx','2021-01-26 12:39:57','','','','','',''),(18,'3','trainer','3','projectmanager','Hi there','How are you today','bf679391680be5003ab64cafbe86b9f5.docx','2021-01-26 14:48:13','','','','','',''),(19,'3','projectmanager','3','trainer','Hello','Morning','','2021-01-27 06:58:23','','','','','',''),(20,'3','projectmanager','3','trainer','Attachmentt','See above','bf2f8cfbd620e57dbbea9aea5434a924.docx','2021-01-27 07:06:02','','','','','','');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderation_report`
--

DROP TABLE IF EXISTS `moderation_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderation_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `moderator_id` int(100) NOT NULL,
  `moderator_name` varchar(255) NOT NULL,
  `moderator_surname` varchar(255) NOT NULL,
  `moderation_date` varchar(255) NOT NULL,
  `moderation_number` varchar(244) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnership_sub_type` varchar(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `unit_statndards` varchar(255) NOT NULL,
  `overall_comments` varchar(200) NOT NULL,
  `learner_id` int(100) NOT NULL,
  `learner_name` varchar(100) NOT NULL,
  `learner_surname` varchar(100) NOT NULL,
  `learner_performance` varchar(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `type_creator` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderation_report`
--

LOCK TABLES `moderation_report` WRITE;
/*!40000 ALTER TABLE `moderation_report` DISABLE KEYS */;
INSERT INTO `moderation_report` VALUES (1,4,3,3,2,'Luxolo','Dambane','2021-01-29','4th',3,'3','Stock','52','Great work',0,'','','','',''),(5,1,1,1,1,'Slash Technology','Internal Moderator','2021-01-28','3rd',1,'1','slash','10,11,12,13,15,16,17,18,19,20,21,22,23,24,25,26,27,28,30,31,32,33,34,35,36,37,39,4,40,41,42,43,44,45,46,47,48,49,5,50,51,52,53,54,55,6,8,9','',0,'','','','',''),(4,1,1,1,1,'Slash Technology','Internal Moderator','2021-01-07','',7,'6','7th','53,54,55,56,57','',0,'','','','',''),(6,13,1,6,1,'Slash Technology','Internal Moderator','2021-03-08','1st',7,'6','8th','53,54,55,56,57','We are testing',0,'','','','',''),(7,13,1,6,1,'Slash Technology','Internal Moderator','2021-03-01','1st',7,'6','8th','53,54,55,56,57','We are testing.',0,'','','','','');
/*!40000 ALTER TABLE `moderation_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderation_report_learner`
--

DROP TABLE IF EXISTS `moderation_report_learner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderation_report_learner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moderation_report_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `overallcmnt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderation_report_learner`
--

LOCK TABLES `moderation_report_learner` WRITE;
/*!40000 ALTER TABLE `moderation_report_learner` DISABLE KEYS */;
INSERT INTO `moderation_report_learner` VALUES (1,2,6,'78%','Distinction'),(2,2,5,'50%','Pass'),(3,2,3,'65%','Good'),(4,2,2,'32%','Fail'),(5,3,1,'defewf','erete'),(6,4,8,'sdsf','eterte'),(7,5,11,'q2we3rt','qwderfg'),(8,5,1,'WET43','45TDRH'),(9,7,36,'Average','Good job'),(10,7,30,'Poor','Try again'),(11,7,29,'excellent','Very good');
/*!40000 ALTER TABLE `moderation_report_learner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderator`
--

DROP TABLE IF EXISTS `moderator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `acreditations` varchar(150) NOT NULL,
  `acreditations_file` varchar(1000) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `trainer_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderator`
--

LOCK TABLES `moderator` WRITE;
/*!40000 ALTER TABLE `moderator` DISABLE KEYS */;
INSERT INTO `moderator` VALUES (1,13,1,'Slash Technology','Internal Moderator','Western Cape Correct One','Central Karoo','','Laingsburg','295','slash ','slash','2','intmoderator@gmail.com','1236485698745','145896654','452874589','','','a:1:{i:0;a:3:{s:2:\"id\";s:1:\"0\";s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1611825664_0.png\";}}',2,6,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 05:41:42','2021-02-02 05:34:14'),(2,4,3,'Luxolo','Dambane','Mpumalanga Correct one','Nkangala','','eMpumalanga','Thembisile','Siyabuswa','King Street','','luxolo@gmail.com','2365874589566','232547854','125478956','','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:5:\"UNISA\";s:18:\"acreditations_file\";N;}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:20:\"University of London\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 15:44:43','2021-01-20 15:44:43'),(4,4,3,'Sivuyile','Matwa','Mpumalanga Correct one','Gert Sibande','','Secunda','Govan','Ermelo','govan Mbeki Drive','12545','sivuyile@gmail.com','2569874587878','658747898','685478888','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:4:\"WUSU\";s:18:\"acreditations_file\";N;}}',2,3,3,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-26 13:17:08','2021-01-26 13:17:08'),(5,13,1,'dxvfchfgjfd','fsertgr','test aaa','test bbbb','','test cccc','318','erwetwt','gfjhgjgyj','87','driver1@gmail.com','yrtyru','666666666','121231230','','','',2,1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 10:11:34','2021-02-02 11:31:38'),(6,10,11,'Willy Maina','Maina','Northern Cape Correct One','John Taolo Gaetsewe','','Kuruman','Magareng','Johannesburg','Blairgowrie','15','wmunyambu@live.com','45646545654','113267333','740740732','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:0:\"\";s:18:\"acreditations_file\";s:16:\"1613117053_0.jpg\";}}',2,5,5,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-02-12 08:04:13','2021-02-12 08:04:13'),(7,243,17,'Vuyiswa ','Mtshweni','Gauteng','City Of Tshwane','','Pretoria','City','Soshanguve','Molefe Makinta','123','vuyimtsweni@gmail.com','690201 5674 085','784006697','784006697','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-19 05:47:41','2021-02-19 05:47:41'),(8,243,17,'Vuyiswa ','Mtsweni','Gauteng','City Of Tshwane','','Soshanguve','City','Soshanguve','Molefe Makinta','123','teboho@tpntrading.co.za','7902110449089','110575352','784006697','','','a:1:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:8:\"AGRISETA\";s:18:\"acreditations_file\";N;}}',2,8,8,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-21 11:18:19','2021-02-21 11:18:19'),(9,10,11,'Shane','Matthews','Mpumalanga','Nkangala','','Siyabuswa','Dr','Thokoza Park','Sisulu Street','36','shane@gmail.com','8704225635085','125568467','785912346','','','a:2:{i:0;a:3:{s:2:\"id\";i:0;s:13:\"acreditations\";s:13:\"Food Services\";s:18:\"acreditations_file\";s:16:\"1615276231_0.png\";}i:1;a:3:{s:2:\"id\";i:1;s:13:\"acreditations\";s:9:\"Food Chef\";s:18:\"acreditations_file\";s:16:\"1615276231_1.png\";}}',2,5,5,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-09 07:50:31','2021-03-09 07:50:31');
/*!40000 ALTER TABLE `moderator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipality`
--

DROP TABLE IF EXISTS `municipality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` varchar(11) NOT NULL,
  `district_id` varchar(110) NOT NULL,
  `region_id` varchar(110) NOT NULL,
  `city_id` varchar(110) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=631 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipality`
--

LOCK TABLES `municipality` WRITE;
/*!40000 ALTER TABLE `municipality` DISABLE KEYS */;
INSERT INTO `municipality` VALUES (570,'North West','Dr Ruth Segomotsi Mompati','','Ganyesa','Kagisano-Molopo Local Municipality','2021-02-20 11:38:01','2021-02-20 11:38:01'),(571,'North West','Dr Ruth Segomotsi Mompati','','Christiana','Lekwa-Teemane Local Municipality','2021-02-20 11:38:16','2021-02-20 11:38:16'),(572,'North West','Dr Ruth Segomotsi Mompati','','Schweizer Reneke','Mamusa Local Municipality','2021-02-20 11:38:30','2021-02-20 11:38:30'),(569,'North West','Dr Ruth Segomotsi Mompati','','Taung','Greater Taung Local Municipality','2021-02-20 11:37:49','2021-02-20 11:37:49'),(568,'North West','Dr Kenneth Kaunda','','Wolmaransstad','Maquassi Hills Local Municipality','2021-02-20 11:36:06','2021-02-20 11:36:06'),(566,'North West','Dr Kenneth Kaunda','','Klerksdorp','City of Matlosana Local Municipality','2021-02-20 11:35:34','2021-02-20 11:35:34'),(567,'North West','Dr Kenneth Kaunda','','Potchefstroom','JB Marks Local Municipality','2021-02-20 11:35:52','2021-02-20 11:35:52'),(565,'North West','Bojanala Platinum','','Rustenburg','Rustenburg Local Municipality','2021-02-20 11:34:01','2021-02-20 11:34:01'),(564,'North West','Bojanala Platinum','','Mogwase','Moses Kotane Local Municipality','2021-02-20 11:33:43','2021-02-20 11:33:43'),(563,'North West','Bojanala Platinum','','Makapanstad','Moretele Local Municipality','2021-02-20 11:33:32','2021-02-20 11:33:32'),(562,'North West','Bojanala Platinum','','Brits','Madibeng Local Municipality','2021-02-20 11:33:17','2021-02-20 11:33:17'),(561,'North West','Bojanala Platinum','','Koster','Kgetlengrivier Local Municipality','2021-02-20 11:33:06','2021-02-20 11:33:06'),(560,'Limpopo','Waterberg','','Thabazimbi','Thabazimbi Local Municipality','2021-02-20 11:22:31','2021-02-20 11:22:31'),(559,'Limpopo','Waterberg','','Mokopane','Mogalakwena Local Municipality','2021-02-20 11:22:16','2021-02-20 11:22:16'),(558,'Limpopo','Waterberg','','Modimolle','Modimolle/Mookgophong Local Municipality','2021-02-20 11:21:59','2021-02-20 11:21:59'),(557,'Limpopo','Waterberg','','Lephalale','Lephalale Local Municipality','2021-02-20 11:21:46','2021-02-20 11:21:46'),(556,'Limpopo','Waterberg','','Bela Bela','Bela-Bela Local Municipality','2021-02-20 11:21:32','2021-02-20 11:21:32'),(555,'Limpopo','Vhembe','','Thohoyandou','Thulamela Local Municipality','2021-02-20 11:19:36','2021-02-20 11:19:36'),(554,'Limpopo','Vhembe','','Musina','Musina Local Municipality','2021-02-20 11:19:22','2021-02-20 11:19:22'),(553,'Limpopo','Vhembe','','Louis Trichardt','Makhado Local Municipality','2021-02-20 11:19:10','2021-02-20 11:19:10'),(552,'Limpopo','Vhembe','','Malamulele','Collins Chabane Local Municipality','2021-02-20 11:18:57','2021-02-20 11:18:57'),(551,'Limpopo','Sekhukhune','','Jane Furse','Makhuduthamaga Local Municipality','2021-02-20 11:17:21','2021-02-20 11:17:21'),(550,'Limpopo','Sekhukhune','','Apel','Fetakgomo/Greater Tubatse Local Municipality','2021-02-20 11:17:06','2021-02-20 11:17:06'),(549,'Limpopo','Sekhukhune','','Groblersdal','Ephraim Mogale Local Municipality','2021-02-20 11:16:51','2021-02-20 11:16:51'),(548,'Limpopo','Sekhukhune','','Groblersdal','Elias Motsoaledi Local Municipality','2021-02-20 11:16:39','2021-02-20 11:16:39'),(547,'Limpopo','Mopani','','Hoedspruit','Maruleng Local Municipality','2021-02-20 11:15:08','2021-02-20 11:15:08'),(546,'Limpopo','Mopani','','Tzaneen','Greater Tzaneen Local Municipality','2021-02-20 11:14:40','2021-02-20 11:14:40'),(545,'Limpopo','Mopani','','Modjadjiskloof','Greater Letaba Local Municipality','2021-02-20 11:14:24','2021-02-20 11:14:24'),(544,'Limpopo','Mopani','','Giyani','Greater Giyani Local Municipality','2021-02-20 11:14:10','2021-02-20 11:14:10'),(543,'Limpopo','Mopani','','Phalaborwa','Ba-Phalaborwa Local Municipality','2021-02-20 11:13:58','2021-02-20 11:13:58'),(541,'Limpopo','Capricorn','','Polokwane','Polokwane Local Municipality','2021-02-20 11:11:39','2021-02-20 11:11:39'),(540,'Limpopo','Capricorn','','Dendron','Molemole Local Municipality','2021-02-20 11:11:25','2021-02-20 11:11:25'),(539,'Limpopo','Capricorn','','Chuniespoort','Lepelle-Nkumpi Local Municipality','2021-02-20 11:11:07','2021-02-20 11:11:07'),(538,'Limpopo','Capricorn','','Senwabarwana','Blouberg Local Municipality','2021-02-20 11:10:53','2021-02-20 11:10:53'),(537,'KwaZulu-Nat','Zululand','','Pongola','uPhongolo Local Municipality','2021-02-20 11:02:18','2021-02-20 11:02:18'),(536,'KwaZulu-Nat','Zululand','','Ulundi','Ulundi Local Municipality','2021-02-20 11:02:02','2021-02-20 11:02:02'),(535,'KwaZulu-Nat','Zululand','','Nongoma','Nongoma Local Municipality','2021-02-20 11:01:48','2021-02-20 11:01:48'),(534,'KwaZulu-Nat','Zululand','','Paulpietersburg','eDumbe Local Municipality','2021-02-20 11:01:31','2021-02-20 11:01:31'),(533,'KwaZulu-Nat','Zululand','','Vryheid','Abaqulusi Local Municipality','2021-02-20 11:01:16','2021-02-20 11:01:16'),(532,'KwaZulu-Nat','Uthukela','','Bergville','Okhahlamba Local Municipality','2021-02-20 10:59:29','2021-02-20 10:59:29'),(531,'KwaZulu-Nat','Uthukela','','Estcourt','Inkosi Langalibalele Local Municipality','2021-02-20 10:59:13','2021-02-20 10:59:13'),(530,'KwaZulu-Nat','Uthukela','','Ladysmith','Alfred Duma Local Municipality','2021-02-20 10:58:57','2021-02-20 10:58:57'),(529,'KwaZulu-Nat','Umzinyathi','','Greytown','Umvoti Local Municipality','2021-02-20 10:57:07','2021-02-20 10:57:07'),(528,'KwaZulu-Nat','Umzinyathi','','Nquthu','Nqutu Local Municipality','2021-02-20 10:56:52','2021-02-20 10:56:52'),(527,'KwaZulu-Nat','Umzinyathi','','Tugela Ferry','Msinga Local Municipality','2021-02-20 10:56:33','2021-02-20 10:56:33'),(526,'KwaZulu-Nat','Umzinyathi','','Dundee','Endumeni Local Municipality','2021-02-20 10:56:21','2021-02-20 10:56:21'),(525,'KwaZulu-Nat','Umkhanyakude','','Kwangwanase','uMhlabuyalingana Local Municipality','2021-02-20 10:54:41','2021-02-20 10:54:41'),(524,'KwaZulu-Nat','Umkhanyakude','','Mtubatuba','Mtubatuba Local Municipality','2021-02-20 10:54:26','2021-02-20 10:54:26'),(523,'KwaZulu-Nat','Umkhanyakude','','Jozini','Jozini Local Municipality','2021-02-20 10:54:12','2021-02-20 10:54:12'),(522,'KwaZulu-Nat','Umkhanyakude','','Hlabisa','Big Five Hlabisa Local Municipality','2021-02-20 10:54:01','2021-02-20 10:54:01'),(521,'KwaZulu-Nat','uMgungundlovu','','Wartburg','uMshwathi Local Municipality','2021-02-20 10:52:02','2021-02-20 10:52:02'),(520,'KwaZulu-Nat','uMgungundlovu','','Howick','uMngeni Local Municipality','2021-02-20 10:51:47','2021-02-20 10:51:47'),(519,'KwaZulu-Nat','uMgungundlovu','','Richmond','Richmond Local Municipality','2021-02-20 10:51:30','2021-02-20 10:51:30'),(518,'KwaZulu-Nat','uMgungundlovu','','Pietermaritzburg','Msunduzi Local Municipality','2021-02-20 10:51:10','2021-02-20 10:51:10'),(517,'KwaZulu-Nat','uMgungundlovu','','Mooi River','Mpofana Local Municipality','2021-02-20 10:50:53','2021-02-20 10:50:53'),(516,'KwaZulu-Nat','uMgungundlovu','','Camperdown','Mkhambathini Local Municipality','2021-02-20 10:50:34','2021-02-20 10:50:34'),(515,'KwaZulu-Nat','uMgungundlovu','','Impendle','Impendle Local Municipality','2021-02-20 10:50:17','2021-02-20 10:50:17'),(514,'KwaZulu-Nat','Ugu','','Mtwalume','Umzumbe Local Municipality','2021-02-20 10:47:17','2021-02-20 10:47:17'),(513,'KwaZulu-Nat','Ugu','','Harding','uMuziwabantu Local Municipality','2021-02-20 10:47:03','2021-02-20 10:47:03'),(512,'KwaZulu-Nat','Ugu','','Scottburgh','uMdoni Local Municipality','2021-02-20 10:46:49','2021-02-20 10:46:49'),(511,'KwaZulu-Nat','Ugu','','Port Shepstone','Ray Nkonyeni Local Municipality','2021-02-20 10:46:38','2021-02-20 10:46:38'),(510,'KwaZulu-Nat','King Cetshwayo','','Eshowe','uMlalazi Local Municipality','2021-02-20 10:44:51','2021-02-20 10:44:51'),(509,'KwaZulu-Nat','King Cetshwayo','','Richards Bay','uMhlathuze Local Municipality','2021-02-20 10:44:30','2021-02-20 10:44:30'),(508,'KwaZulu-Nat','King Cetshwayo','','KwaMbonambi','uMfolozi Local Municipality','2021-02-20 10:44:18','2021-02-20 10:44:18'),(507,'KwaZulu-Nat','King Cetshwayo','','Nkandla','Nkandla Local Municipality','2021-02-20 10:44:01','2021-02-20 10:44:01'),(506,'KwaZulu-Nat','King Cetshwayo','','Melmoth','Mthonjaneni Local Municipality','2021-02-20 10:43:46','2021-02-20 10:43:46'),(505,'KwaZulu-Nat','Harry Gwala','','Umzimkhulu','Umzimkhulu Local Municipality','2021-02-20 10:41:38','2021-02-20 10:41:38'),(504,'KwaZulu-Nat','Harry Gwala','','Ixopo','Ubuhlebezwe Local Municipality','2021-02-20 10:41:01','2021-02-20 10:41:01'),(503,'KwaZulu-Nat','Harry Gwala','','Kokstad','Greater Kokstad Local Municipality','2021-02-20 10:40:43','2021-02-20 10:40:43'),(502,'KwaZulu-Nat','Harry Gwala','','Creighton','Dr Nkosazana Dlamini Zuma Local Municipality','2021-02-20 10:40:27','2021-02-20 10:40:27'),(501,'KwaZulu-Nat','Amajuba','','Newcastle','Newcastle Local Municipality','2021-02-20 10:38:46','2021-02-20 10:38:46'),(500,'KwaZulu-Nat','Amajuba','','Utrecht','eMadlangeni Local Municipality','2021-02-20 10:38:30','2021-02-20 10:38:30'),(499,'KwaZulu-Nat','Amajuba','','Dannhauser','Dannhauser Local Municipality','2021-02-20 10:38:14','2021-02-20 10:38:14'),(498,'Gauteng','West Rand','','Randfontein','Rand West City Local Municipality','2021-02-20 10:33:23','2021-02-20 10:33:23'),(497,'Gauteng','West Rand','','Krugersdorp','Mogale City Local Municipality','2021-02-20 10:33:07','2021-02-20 10:33:07'),(496,'Gauteng','West Rand','','Carletonville','Merafong City Local Municipality','2021-02-20 10:32:53','2021-02-20 10:32:53'),(495,'Gauteng','Sedibeng','','Meyerton','Midvaal Local Municipality','2021-02-20 10:31:13','2021-02-20 10:31:13'),(494,'Gauteng','Sedibeng','','Heidelberg','Lesedi Local Municipality','2021-02-20 10:30:54','2021-02-20 10:30:54'),(493,'Gauteng','Sedibeng','','Vanderbijlpark','Emfuleni Local Municipality','2021-02-20 10:30:35','2021-02-20 10:30:35'),(492,'Gauteng','Ekurhuleni','','Wattville','Ekurhuleni Metropolitan Municipality','2021-02-20 10:27:57','2021-02-20 10:27:57'),(491,'Gauteng','Ekurhuleni','','Vosloorus','Ekurhuleni Metropolitan Municipality','2021-02-20 10:27:45','2021-02-20 10:27:45'),(490,'Gauteng','Ekurhuleni','','Tsakane','Ekurhuleni Metropolitan Municipality','2021-02-20 10:27:30','2021-02-20 10:27:30'),(489,'Gauteng','Ekurhuleni','','Tokoza','Ekurhuleni Metropolitan Municipality','2021-02-20 10:27:09','2021-02-20 10:27:09'),(488,'Gauteng','Ekurhuleni','','Tembisa','Ekurhuleni Metropolitan Municipality','2021-02-20 10:26:54','2021-02-20 10:26:54'),(487,'Gauteng','Ekurhuleni','','Springs','Ekurhuleni Metropolitan Municipality','2021-02-20 10:26:42','2021-02-20 10:26:42'),(486,'Gauteng','Ekurhuleni','','Nigel','Ekurhuleni Metropolitan Municipality','2021-02-20 10:26:30','2021-02-20 10:26:30'),(485,'Gauteng','Ekurhuleni','','Langaville','Ekurhuleni Metropolitan Municipality','2021-02-20 10:26:19','2021-02-20 10:26:19'),(484,'Gauteng','Ekurhuleni','','Kwa Thema','Ekurhuleni Metropolitan Municipality','2021-02-20 10:26:05','2021-02-20 10:26:05'),(482,'Gauteng','Ekurhuleni','','Katlehong','Ekurhuleni Metropolitan Municipality','2021-02-20 10:25:27','2021-02-20 10:25:27'),(483,'Gauteng','Ekurhuleni','','Kempton Park','Ekurhuleni Metropolitan Municipality','2021-02-20 10:25:38','2021-02-20 10:25:38'),(480,'Gauteng','Ekurhuleni','','Germiston','Ekurhuleni Metropolitan Municipality','2021-02-20 10:24:52','2021-02-20 10:24:52'),(479,'Gauteng','Ekurhuleni','','Etwatwa','Ekurhuleni Metropolitan Municipality','2021-02-20 10:24:38','2021-02-20 10:24:38'),(478,'Gauteng','Ekurhuleni','','Edenvale','Ekurhuleni Metropolitan Municipality','2021-02-20 10:24:27','2021-02-20 10:24:27'),(477,'Gauteng','Ekurhuleni','','Duduza','Ekurhuleni Metropolitan Municipality','2021-02-20 10:24:12','2021-02-20 10:24:12'),(476,'Gauteng','Ekurhuleni','','Daveyton','Ekurhuleni Metropolitan Municipality','2021-02-20 10:23:55','2021-02-20 10:23:55'),(475,'Gauteng','Ekurhuleni','','Brakpan','Ekurhuleni Metropolitan Municipality','2021-02-20 10:23:40','2021-02-20 10:23:40'),(474,'Gauteng','Ekurhuleni','','Boksburg','Ekurhuleni Metropolitan Municipality','2021-02-20 10:23:23','2021-02-20 10:23:23'),(473,'Gauteng','Ekurhuleni','','Benoni','Ekurhuleni Metropolitan Municipality','2021-02-20 10:23:08','2021-02-20 10:23:08'),(472,'Gauteng','Ekurhuleni','','Alberton','Ekurhuleni Metropolitan Municipality','2021-02-20 10:22:54','2021-02-20 10:22:54'),(471,'Gauteng','City Of Tshwane','','Soshanguve','City of Tshwane Metropolitan Municipality ','2021-02-20 10:07:21','2021-02-20 10:07:21'),(470,'Gauteng','City Of Tshwane','','Saulsville','City of Tshwane Metropolitan Municipality ','2021-02-20 10:06:51','2021-02-20 10:06:51'),(469,'Gauteng','City Of Tshwane','','Roodepoort B','City of Tshwane Metropolitan Municipality ','2021-02-20 10:06:37','2021-02-20 10:06:37'),(468,'Gauteng','City Of Tshwane','','Rethabiseng','City of Tshwane Metropolitan Municipality ','2021-02-20 10:06:21','2021-02-20 10:06:21'),(467,'Gauteng','City Of Tshwane','','Refilwe','City of Tshwane Metropolitan Municipality ','2021-02-20 10:06:05','2021-02-20 10:06:05'),(466,'Gauteng','City Of Tshwane','','Rayton','City of Tshwane Metropolitan Municipality ','2021-02-20 10:05:51','2021-02-20 10:05:51'),(465,'Gauteng','City Of Tshwane','','Ramotse','City of Tshwane Metropolitan Municipality ','2021-02-20 10:05:34','2021-02-20 10:05:34'),(464,'Gauteng','City Of Tshwane','','Pretoria','City of Tshwane Metropolitan Municipality ','2021-02-20 10:05:16','2021-02-20 10:05:16'),(463,'Gauteng','City Of Tshwane','','Onverwacht','City of Tshwane Metropolitan Municipality ','2021-02-20 10:04:57','2021-02-20 10:04:57'),(462,'Gauteng','City Of Tshwane','','Olievenhoutbos','City of Tshwane Metropolitan Municipality ','2021-02-20 10:04:43','2021-02-20 10:04:43'),(461,'Gauteng','City Of Tshwane','','New Eersterus','City of Tshwane Metropolitan Municipality ','2021-02-20 10:04:29','2021-02-20 10:04:29'),(460,'Gauteng','City Of Tshwane','','Nellmapius','City of Tshwane Metropolitan Municipality ','2021-02-20 10:04:14','2021-02-20 10:04:14'),(459,'Gauteng','City Of Tshwane','','Mooiplaas','City of Tshwane Metropolitan Municipality ','2021-02-20 10:03:55','2021-02-20 10:03:55'),(458,'Gauteng','City Of Tshwane','','Mashemong','City of Tshwane Metropolitan Municipality ','2021-02-20 10:03:39','2021-02-20 10:03:39'),(457,'Gauteng','City Of Tshwane','','Marokolong','City of Tshwane Metropolitan Municipality ','2021-02-20 10:03:25','2021-02-20 10:03:25'),(456,'Gauteng','City Of Tshwane','','Mandela Village','City of Tshwane Metropolitan Municipality ','2021-02-20 10:03:03','2021-02-20 10:03:03'),(455,'Gauteng','City Of Tshwane','','Mamelodi','City of Tshwane Metropolitan Municipality ','2021-02-20 10:02:47','2021-02-20 10:02:47'),(454,'Gauteng','City Of Tshwane','','Majaneng','City of Tshwane Metropolitan Municipality ','2021-02-20 10:02:31','2021-02-20 10:02:31'),(453,'Gauteng','City Of Tshwane','','Mabopane','City of Tshwane Metropolitan Municipality ','2021-02-20 10:02:14','2021-02-20 10:02:14'),(452,'Gauteng','City Of Tshwane','','Laudium','City of Tshwane Metropolitan Municipality ','2021-02-20 10:02:00','2021-02-20 10:02:00'),(451,'Gauteng','City Of Tshwane','','Kungwini Part Two','City of Tshwane Metropolitan Municipality ','2021-02-20 10:01:46','2021-02-20 10:01:46'),(450,'Gauteng','City Of Tshwane','','Kekana Garden','City of Tshwane Metropolitan Municipality ','2021-02-20 10:01:36','2021-02-20 10:01:36'),(449,'Gauteng','City Of Tshwane','','Kameeldrift','City of Tshwane Metropolitan Municipality ','2021-02-20 10:01:16','2021-02-20 10:01:16'),(448,'Gauteng','City Of Tshwane','','Hebron','City of Tshwane Metropolitan Municipality ','2021-02-20 10:01:04','2021-02-20 10:01:04'),(447,'Gauteng','City Of Tshwane','','Hammanskraal','City of Tshwane Metropolitan Municipality ','2021-02-20 10:00:52','2021-02-20 10:00:52'),(446,'Gauteng','City Of Tshwane','','Haakdoornboom','City of Tshwane Metropolitan Municipality ','2021-02-20 10:00:39','2021-02-20 10:00:39'),(445,'Gauteng','City Of Tshwane','','Ga Rankuwa','City of Tshwane Metropolitan Municipality ','2021-02-20 10:00:25','2021-02-20 10:00:25'),(444,'Gauteng','City Of Tshwane','','Ekangala','City of Tshwane Metropolitan Municipality ','2021-02-20 10:00:09','2021-02-20 10:00:09'),(443,'Gauteng','City Of Tshwane','','Eersterust','City of Tshwane Metropolitan Municipality ','2021-02-20 09:59:55','2021-02-20 09:59:55'),(442,'Gauteng','City Of Tshwane','','Donkerhoek','City of Tshwane Metropolitan Municipality ','2021-02-20 09:59:40','2021-02-20 09:59:40'),(441,'Gauteng','City Of Tshwane','','Dilopye','City of Tshwane Metropolitan Municipality ','2021-02-20 09:59:25','2021-02-20 09:59:25'),(440,'Gauteng','City Of Tshwane','','Cullinan','City of Tshwane Metropolitan Municipality ','2021-02-20 09:59:12','2021-02-20 09:59:12'),(439,'Gauteng','City Of Tshwane','','Centurion','City of Tshwane Metropolitan Municipality ','2021-02-20 09:59:01','2021-02-20 09:59:01'),(438,'Gauteng','City Of Tshwane','','Bultfontein','City of Tshwane Metropolitan Municipality ','2021-02-20 09:58:48','2021-02-20 09:58:48'),(437,'Gauteng','City Of Tshwane','','Bronkhorstspruit','City of Tshwane Metropolitan Municipality ','2021-02-20 09:58:30','2021-02-20 09:58:30'),(436,'Gauteng','City Of Tshwane','','Boschkop','City of Tshwane Metropolitan Municipality ','2021-02-20 09:58:14','2021-02-20 09:58:14'),(435,'Gauteng','City Of Tshwane','','Bon Accord','City of Tshwane Metropolitan Municipality ','2021-02-20 09:58:02','2021-02-20 09:58:02'),(434,'Gauteng','City Of Tshwane','','Baviaanspoort','City of Tshwane Metropolitan Municipality ','2021-02-20 09:57:44','2021-02-20 09:57:44'),(433,'Gauteng','City Of Tshwane','','Atteridgeville','City of Tshwane Metropolitan Municipality ','2021-02-20 09:57:32','2021-02-20 09:57:32'),(432,'Gauteng','City Of Tshwane','','Akasia','City of Tshwane Metropolitan Municipality ','2021-02-20 09:57:19','2021-02-20 09:57:19'),(431,'Gauteng','Johannesburg','','Zevenfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:35:22','2021-02-20 09:35:22'),(430,'Gauteng','Johannesburg','','Zakariyya Park',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:35:06','2021-02-20 09:35:06'),(429,'Gauteng','Johannesburg','','Vlakfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:34:51','2021-02-20 09:34:51'),(428,'Gauteng','Johannesburg','','Vlakfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:34:33','2021-02-20 09:34:33'),(427,'Gauteng','Johannesburg','','Tshepisong',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:34:20','2021-02-20 09:34:20'),(426,'Gauteng','Johannesburg','','Stretford',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:34:06','2021-02-20 09:34:06'),(425,'Gauteng','Johannesburg','','Soweto',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:33:50','2021-02-20 09:33:50'),(424,'Gauteng','Johannesburg','','Sandton',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:33:36','2021-02-20 09:33:36'),(423,'Gauteng','Johannesburg','','Roodepoort',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:33:22','2021-02-20 09:33:22'),(422,'Gauteng','Johannesburg','','Rietfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:33:07','2021-02-20 09:33:07'),(421,'Gauteng','Johannesburg','','Randfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:32:49','2021-02-20 09:32:49'),(420,'Gauteng','Johannesburg','','Randburg',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:32:29','2021-02-20 09:32:29'),(419,'Gauteng','Johannesburg','','Rabie Ridge',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:32:16','2021-02-20 09:32:16'),(418,'Gauteng','Johannesburg','','Poortjie',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:31:57','2021-02-20 09:31:57'),(417,'Gauteng','Johannesburg','','Orange Farm',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:31:41','2021-02-20 09:31:41'),(416,'Gauteng','Johannesburg','','Millgate Farm',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:31:21','2021-02-20 09:31:21'),(415,'Gauteng','Johannesburg','','Midrand',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:31:07','2021-02-20 09:31:07'),(414,'Gauteng','Johannesburg','','Mayibuye',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:30:48','2021-02-20 09:30:48'),(413,'Gauteng','Johannesburg','','Malatjie',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:30:34','2021-02-20 09:30:34'),(412,'Gauteng','Johannesburg','','Lucky Seven',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:30:20','2021-02-20 09:30:20'),(411,'Gauteng','Johannesburg','','Lenasia South',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:30:04','2021-02-20 09:30:04'),(358,'Eastern Cap','Joe Gqabi','','Burgersdorp','Walter Sisulu Local Municipality','2021-02-20 08:32:35','2021-02-20 08:32:35'),(359,'Eastern Cap','OR Tambo','','Flagstaff','Ingquza Hill Local Municipality','2021-02-20 08:36:27','2021-02-20 08:36:27'),(360,'Eastern Cap','OR Tambo','','Mthatha','King Sabata Dalindyebo Local Municipality','2021-02-20 08:36:47','2021-02-20 08:36:47'),(361,'Eastern Cap','OR Tambo','','Qumbu','Mhlontlo Local Municipality','2021-02-20 08:37:04','2021-02-20 08:37:04'),(362,'Eastern Cap','OR Tambo','','Libode','Nyandeni Local Municipality','2021-02-20 08:37:23','2021-02-20 08:37:23'),(363,'Eastern Cap','OR Tambo','','Port St Johns','Port St Johns Local Municipality','2021-02-20 08:37:37','2021-02-20 08:37:37'),(364,'Eastern Cap','Sarah Baartman','','Somerset East','Blue Crane Route Local Municipality','2021-02-20 08:40:22','2021-02-20 08:40:22'),(365,'Eastern Cap','Sarah Baartman','','Graaff Reinet','Dr Beyers Naudé Local Municipality','2021-02-20 08:40:40','2021-02-20 08:40:40'),(366,'Eastern Cap','Sarah Baartman','','Kareedouw','Kou Kamma Local Municipality','2021-02-20 08:41:02','2021-02-20 08:41:02'),(367,'Eastern Cap','Sarah Baartman','','Jeffreys Bay','Kouga Local Municipality','2021-02-20 08:41:25','2021-02-20 08:41:25'),(368,'Eastern Cap','Sarah Baartman','','Grahamstown','Makana Local Municipality','2021-02-20 08:41:41','2021-02-20 08:41:41'),(369,'Eastern Cap','Sarah Baartman','','Port Alfred','Ndlambe Local Municipality','2021-02-20 08:41:57','2021-02-20 08:41:57'),(370,'Eastern Cap','Sarah Baartman','','Kirkwood','Sundays River Valley Local Municipality','2021-02-20 08:42:17','2021-02-20 08:42:17'),(371,'Free State','Fezile Dabi','','Frankfort	','Mafube Local Municipality','2021-02-20 08:51:31','2021-02-20 08:51:31'),(372,'Free State','Fezile Dabi','','Sasolburg','Metsimaholo Local Municipality','2021-02-20 08:51:49','2021-02-20 08:51:49'),(373,'Free State','Fezile Dabi','','Kroonstad','Moqhaka Local Municipality','2021-02-20 08:52:03','2021-02-20 08:52:03'),(374,'Free State','Fezile Dabi','','Parys','Ngwathe Local Municipality','2021-02-20 08:52:19','2021-02-20 08:52:19'),(375,'Free State','Lejweleputswa','','Theunissen','Masilonyana Local Municipality','2021-02-20 08:55:16','2021-02-20 08:55:16'),(376,'Free State','Lejweleputswa','','Welkom','Matjhabeng Local Municipality','2021-02-20 08:57:52','2021-02-20 08:57:52'),(377,'Free State','Lejweleputswa','','Bothaville','Nala Local Municipality','2021-02-20 08:58:06','2021-02-20 08:58:06'),(378,'Free State','Lejweleputswa','','Boshof','Tokologo Local Municipality','2021-02-20 08:58:26','2021-02-20 08:58:26'),(379,'Free State','Lejweleputswa','','Bultfontein','Tswelopele Local Municipality','2021-02-20 08:58:44','2021-02-20 08:58:44'),(381,'Free State','Thabo Mofutsanyana','','Bethlehem','Dihlabeng Local Municipality','2021-02-20 09:02:53','2021-02-20 09:02:53'),(382,'Free State','Thabo Mofutsanyana','','Phuthaditjhaba','Maluti a Phofung Local Municipality','2021-02-20 09:03:17','2021-02-20 09:03:17'),(383,'Free State','Thabo Mofutsanyana','','Ladybrand','Mantsopa Local Municipality','2021-02-20 09:03:33','2021-02-20 09:03:33'),(384,'Free State','Thabo Mofutsanyana','','Reitz','Nketoana Local Municipality','2021-02-20 09:03:51','2021-02-20 09:03:51'),(385,'Free State','Thabo Mofutsanyana','','Vrede','Phumelela Local Municipality','2021-02-20 09:04:07','2021-02-20 09:04:07'),(386,'Free State','Thabo Mofutsanyana','','Ficksburg','Setsoto Local Municipality','2021-02-20 09:04:23','2021-02-20 09:04:23'),(387,'Free State','Xhariep','','Trompsburg','Kopanong Local Municipality','2021-02-20 09:05:50','2021-02-20 09:05:50'),(388,'Free State','Xhariep','','Koffiefontein','Letsemeng Local Municipality','2021-02-20 09:06:04','2021-02-20 09:06:04'),(389,'Free State','Xhariep','','Zastron','Mohokare Local Municipality','2021-02-20 09:06:20','2021-02-20 09:06:20'),(390,'Gauteng','Johannesburg','','Alexandra',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:23:37','2021-02-20 09:23:37'),(391,'Gauteng','Johannesburg','','Chartwell',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:23:56','2021-02-20 09:23:56'),(392,'Gauteng','Johannesburg','','City of Johannesburg nonurban',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:24:09','2021-02-20 09:24:09'),(393,'Gauteng','Johannesburg','','Dainfern',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:24:45','2021-02-20 09:24:45'),(394,'Gauteng','Johannesburg','','Diepsloot',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:25:03','2021-02-20 09:25:03'),(395,'Gauteng','Johannesburg','','Drie Ziek',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:25:18','2021-02-20 09:25:18'),(396,'Gauteng','Johannesburg','','Ebony Park',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:25:34','2021-02-20 09:25:34'),(397,'Gauteng','Johannesburg','','Ennerdale',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:25:59','2021-02-20 09:25:59'),(398,'Gauteng','Johannesburg','','Farmall',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:26:14','2021-02-20 09:26:14'),(399,'Gauteng','Johannesburg','','Itsoseng',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:26:29','2021-02-20 09:26:29'),(400,'Gauteng','Johannesburg','','Ivory Park',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:27:01','2021-02-20 09:27:01'),(402,'Gauteng','Johannesburg','','Johannesburg',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:27:50','2021-02-20 09:27:50'),(403,'Gauteng','Johannesburg','','Kaalfontein',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:28:05','2021-02-20 09:28:05'),(404,'Gauteng','Johannesburg','','Kagiso',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:28:20','2021-02-20 09:28:20'),(405,'Gauteng','Johannesburg','','Kanana Park',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:28:32','2021-02-20 09:28:32'),(406,'Gauteng','Johannesburg','','Lakeside',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:28:45','2021-02-20 09:28:45'),(407,'Gauteng','Johannesburg','','Lanseria',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:29:00','2021-02-20 09:29:00'),(408,'Gauteng','Johannesburg','','Lawley',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:29:20','2021-02-20 09:29:20'),(409,'Gauteng','Johannesburg','','Lehae',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:29:34','2021-02-20 09:29:34'),(410,'Gauteng','Johannesburg','','Lenasia',' City of Johannesburg Metropolitan Municipality','2021-02-20 09:29:50','2021-02-20 09:29:50'),(346,'Eastern Cap','Amathole','','Alice','Raymond Mhlaba Local Municipality','2021-02-20 08:23:09','2021-02-20 08:23:09'),(347,'Eastern Cap','Chris Hani','','Lady Frere','Emalahleni Local Municipality','2021-02-20 08:25:31','2021-02-20 08:25:31'),(348,'Eastern Cap','Chris Hani','','Ngcobo','Engcobo Local Municipality','2021-02-20 08:25:44','2021-02-20 08:25:44'),(349,'Eastern Cap','Chris Hani','','Queenstown','Enoch Mgijima Local Municipality','2021-02-20 08:26:01','2021-02-20 08:26:01'),(350,'Eastern Cap','Chris Hani','','Cofimvaba','Intsika Yethu Local Municipality','2021-02-20 08:26:18','2021-02-20 08:26:18'),(351,'Eastern Cap','Chris Hani','','Cradock','Inxuba Yethemba Local Municipality','2021-02-20 08:26:41','2021-02-20 08:26:41'),(352,'Eastern Cap','Chris Hani','','Cala','Sakhisizwe Local Municipality','2021-02-20 08:26:57','2021-02-20 08:26:57'),(353,'Eastern Cap','Joe Gqabi','','Maclear','Elundini Local Municipality','2021-02-20 08:28:43','2021-02-20 08:28:43'),(357,'Eastern Cap','Joe Gqabi','','Lady Grey','Senqu Local Municipality','2021-02-20 08:32:15','2021-02-20 08:32:15'),(337,'Eastern Cap','Alfred Nzo','','Matatiele','Matatiele Local Municipality','2021-02-20 08:18:11','2021-02-20 08:18:11'),(338,'Eastern Cap','Alfred Nzo','','Bizana','Mbizana Local Municipality','2021-02-20 08:18:28','2021-02-20 08:18:28'),(339,'Eastern Cap','Alfred Nzo','','Ntabankulu','Ntabankulu Local Municipality','2021-02-20 08:18:43','2021-02-20 08:18:43'),(340,'Eastern Cap','Alfred Nzo','','Mount Frere','Umzimvubu Local Municipality','2021-02-20 08:19:01','2021-02-20 08:19:01'),(341,'Eastern Cap','Amathole','','Stutterheim','Amahlathi Local Municipality','2021-02-20 08:21:40','2021-02-20 08:21:40'),(342,'Eastern Cap','Amathole','','Komga','Great Kei Local Municipality','2021-02-20 08:21:59','2021-02-20 08:21:59'),(343,'Eastern Cap','Amathole','','Dutywa','Mbhashe Local Municipality','2021-02-20 08:22:14','2021-02-20 08:22:14'),(344,'Eastern Cap','Amathole','','Gcuwa','Mnquma Local Municipality','2021-02-20 08:22:31','2021-02-20 08:22:31'),(345,'Eastern Cap','Amathole','','Peddie','Ngqushwa Local Municipality','2021-02-20 08:22:49','2021-02-20 08:22:49'),(320,'Mpumalanga','Ehlanzeni','','Bushbuckridge','Bushbuckridge Local Municipality','2021-02-20 07:11:37','2021-02-20 07:11:37'),(321,'Mpumalanga','Ehlanzeni','','Nelspruit','Mbombela Local Municipality','2021-02-20 07:11:51','2021-02-20 07:11:51'),(322,'Mpumalanga','Ehlanzeni','','Malalane','Nkomazi Local Municipality','2021-02-20 07:12:10','2021-02-20 07:12:10'),(323,'Mpumalanga','Ehlanzeni','','Lydenburg','Thaba Chweu Local Municipality','2021-02-20 07:12:39','2021-02-20 07:12:39'),(324,'Mpumalanga','Gert Sibande','','Carolina','Albert Luthuli Local Municipality','2021-02-20 07:15:08','2021-02-20 07:15:08'),(325,'Mpumalanga','Gert Sibande','','Balfour','Dipaleseng Local Municipality','2021-02-20 07:15:26','2021-02-20 07:15:26'),(326,'Mpumalanga','Gert Sibande','','Secunda','Govan Mbeki Local Municipality','2021-02-20 07:15:44','2021-02-20 07:15:44'),(327,'Mpumalanga','Gert Sibande','','Standerton','Lekwa Local Municipality','2021-02-20 07:16:10','2021-02-20 07:16:10'),(328,'Mpumalanga','Gert Sibande','','Piet Retief','Mkhondo Local Municipality','2021-02-20 07:16:29','2021-02-20 07:16:29'),(329,'Mpumalanga','Gert Sibande','','Ermelo','Msukaligwa Local Municipality','2021-02-20 07:16:51','2021-02-20 07:16:51'),(330,'Mpumalanga','Gert Sibande','','Volksrust','Pixley ka Seme Local Municipality','2021-02-20 07:17:09','2021-02-20 07:17:09'),(331,'Mpumalanga','Nkangala','','Siyabuswa','Dr JS Moroka Local Municipality','2021-02-20 07:19:42','2021-02-20 07:19:42'),(332,'Mpumalanga','Nkangala','','Belfast','Emakhazeni Local Municipality','2021-02-20 07:19:58','2021-02-20 07:19:58'),(333,'Mpumalanga','Nkangala','','eMalahleni','Emalahleni Local Municipality','2021-02-20 07:20:14','2021-02-20 07:20:14'),(334,'Mpumalanga','Nkangala','','Middelburg','Steve Tshwete Local Municipality','2021-02-20 07:20:32','2021-02-20 07:20:32'),(335,'Mpumalanga','Nkangala','','eMpumalanga','Thembisile Hani Local Municipality','2021-02-20 07:20:52','2021-02-20 07:20:52'),(336,'Mpumalanga','Nkangala','','Delmas','Victor Khanye Local Municipality','2021-02-20 07:21:10','2021-02-20 07:21:10'),(573,'North West','Dr Ruth Segomotsi Mompati','','Vryburg','Naledi Local Municipality','2021-02-20 11:38:45','2021-02-20 11:38:45'),(574,'North West','Ngaka Modiri Molema','','Lichtenburg','Ditsobotla Local Municipality','2021-02-20 11:40:58','2021-02-20 11:40:58'),(575,'North West','Ngaka Modiri Molema','','Mahikeng','Mahikeng Local Municipality','2021-02-20 11:41:10','2021-02-20 11:41:10'),(576,'North West','Ngaka Modiri Molema','','Zeerust','Ramotshere Moiloa Local Municipality','2021-02-20 11:41:27','2021-02-20 11:41:27'),(577,'North West','Ngaka Modiri Molema','','Setlagole','Ratlou Local Municipality','2021-02-20 11:41:41','2021-02-20 11:41:41'),(578,'North West','Ngaka Modiri Molema','','Delareyville','Tswaing Local Municipality','2021-02-20 11:41:56','2021-02-20 11:41:56'),(579,'Northern Ca','Frances Baard','','Barkly West','Dikgatlong Local Municipality','2021-02-20 13:59:23','2021-02-20 13:59:23'),(580,'Northern Ca','Frances Baard','','Warrenton','Magareng Local Municipality','2021-02-20 13:59:34','2021-02-20 13:59:34'),(581,'Northern Ca','Frances Baard','','Hartswater','Phokwane Local Municipality','2021-02-20 13:59:51','2021-02-20 13:59:51'),(582,'Northern Ca','Frances Baard','','Kimberley','Sol Plaatje Local Municipality','2021-02-20 14:00:10','2021-02-20 14:00:10'),(583,'Northern Ca','John Taolo Gaetsewe','','Kuruman','Ga-Segonyana Local Municipality','2021-02-20 14:17:59','2021-02-20 14:17:59'),(584,'Northern Ca','John Taolo Gaetsewe','','Kathu','Gamagara Local Municipality','2021-02-20 14:18:14','2021-02-20 14:18:14'),(585,'Northern Ca','John Taolo Gaetsewe','','Mothibistad','Joe Morolong Local Municipality','2021-02-20 14:18:30','2021-02-20 14:18:30'),(586,'Northern Ca','Namakwa','','Calvinia','Hantam Local Municipality','2021-02-20 14:22:15','2021-02-20 14:22:15'),(587,'Northern Ca','Namakwa','','Garies','Kamiesberg Local Municipality','2021-02-20 14:22:29','2021-02-20 14:22:29'),(588,'Northern Ca','Namakwa','','Williston','Karoo Hoogland Local Municipality','2021-02-20 14:22:43','2021-02-20 14:22:43'),(589,'Northern Ca','Namakwa','','Pofadder','Khâi-Ma Local Municipality','2021-02-20 14:22:56','2021-02-20 14:22:56'),(590,'Northern Ca','Namakwa','','Springbok','Nama Khoi Local Municipality','2021-02-20 14:23:10','2021-02-20 14:23:10'),(591,'Northern Ca','Namakwa','','Port Nolloth','Richtersveld Local Municipality','2021-02-20 14:23:24','2021-02-20 14:23:24'),(592,'Northern Ca','Pixley ka Seme','','De Aar','Emthanjeni Local Municipality','2021-02-20 14:26:26','2021-02-20 14:26:26'),(593,'Northern Ca','Pixley ka Seme','','Carnarvon','Kareeberg Local Municipality','2021-02-20 14:26:41','2021-02-20 14:26:41'),(594,'Northern Ca','Pixley ka Seme','','Petrusville','Renosterberg Local Municipality','2021-02-20 14:26:55','2021-02-20 14:26:55'),(595,'Northern Ca','Pixley ka Seme','','Douglas','Siyancuma Local Municipality','2021-02-20 14:27:10','2021-02-20 14:27:10'),(596,'Northern Ca','Pixley ka Seme','','Prieska','Siyathemba Local Municipality','2021-02-20 14:27:26','2021-02-20 14:27:26'),(600,'Northern Ca','Pixley ka Seme','','Hopetown','Thembelihle Local Municipality','2021-02-20 14:30:50','2021-02-20 14:30:50'),(599,'Northern Ca','Pixley ka Seme','','Colesberg','Umsobomvu Local Municipality','2021-02-20 14:29:03','2021-02-20 14:29:03'),(602,'Northern Ca','ZF Mgcawu','','Groblershoop','!Kheis Local Municipality','2021-02-20 14:36:21','2021-02-20 14:36:21'),(603,'Northern Ca','ZF Mgcawu','','Upington','Dawid Kruiper Local Municipality','2021-02-20 14:36:34','2021-02-20 14:36:34'),(604,'Northern Ca','ZF Mgcawu','','Kakamas','Kai !Garib Local Municipality','2021-02-20 14:36:49','2021-02-20 14:36:49'),(605,'Northern Ca','ZF Mgcawu','','Danielskuil','Kgatelopele Local Municipality','2021-02-20 14:37:06','2021-02-20 14:37:06'),(606,'Northern Ca','ZF Mgcawu','','Postmasburg','Tsantsabane Local Municipality','2021-02-20 14:37:21','2021-02-20 14:37:21'),(607,'Western Cap','Cape Winelands','','Worcester','Breede Valley Local Municipality','2021-02-20 15:05:11','2021-02-20 15:05:11'),(608,'Western Cap','Cape Winelands','','Paarl','Drakenstein Local Municipality','2021-02-20 15:05:25','2021-02-20 15:05:25'),(609,'Western Cap','Cape Winelands','','Ashton','Langeberg Local Municipality','2021-02-20 15:05:39','2021-02-20 15:05:39'),(610,'Western Cap','Cape Winelands','','Stellenbosch','Stellenbosch Local Municipality','2021-02-20 15:05:55','2021-02-20 15:05:55'),(611,'Western Cap','Cape Winelands','','Ceres','Witzenberg Local Municipality','2021-02-20 15:06:11','2021-02-20 15:06:11'),(612,'Western Cap','Central Karoo','','Beaufort West','Beaufort West Local Municipality','2021-02-20 15:07:52','2021-02-20 15:07:52'),(613,'Western Cap','Central Karoo','','Laingsburg','Laingsburg Local Municipality','2021-02-20 15:08:07','2021-02-20 15:08:07'),(614,'Western Cap','Central Karoo','','Prince Albert','Prince Albert Local Municipality','2021-02-20 15:08:21','2021-02-20 15:08:21'),(615,'Western Cap','Garden Route','','Plettenberg Bay','Bitou Local Municipality','2021-02-20 15:10:53','2021-02-20 15:10:53'),(616,'Western Cap','Garden Route','','George','George Local Municipality','2021-02-20 15:11:10','2021-02-20 15:11:10'),(617,'Western Cap','Garden Route','','Riversdale','Hessequa Local Municipality','2021-02-20 15:11:27','2021-02-20 15:11:27'),(618,'Western Cap','Garden Route','','Ladismith','Kannaland Local Municipality','2021-02-20 15:11:40','2021-02-20 15:11:40'),(619,'Western Cap','Garden Route','','Knysna','Knysna Local Municipality','2021-02-20 15:11:57','2021-02-20 15:11:57'),(620,'Western Cap','Garden Route','','Mossel Bay','Mossel Bay Local Municipality','2021-02-20 15:12:14','2021-02-20 15:12:14'),(621,'Western Cap','Garden Route','','Oudtshoorn','Oudtshoorn Local Municipality','2021-02-20 15:12:31','2021-02-20 15:12:31'),(622,'Western Cap','Overberg','','Bredasdorp','Cape Agulhas Local Municipality','2021-02-20 15:14:40','2021-02-20 15:14:40'),(623,'Western Cap','Overberg','','Hermanus','Overstrand Local Municipality','2021-02-20 15:14:53','2021-02-20 15:14:53'),(624,'Western Cap','Overberg','','Swellendam','Swellendam Local Municipality','2021-02-20 15:15:09','2021-02-20 15:15:09'),(625,'Western Cap','Overberg','','Caledon','Theewaterskloof Local Municipality','2021-02-20 15:15:25','2021-02-20 15:15:25'),(626,'Western Cap','West Coast','','Piketberg','Bergrivier Local Municipality','2021-02-20 15:17:52','2021-02-20 15:17:52'),(627,'Western Cap','West Coast','','Clanwilliam','Cederberg Local Municipality','2021-02-20 15:18:05','2021-02-20 15:18:05'),(628,'Western Cap','West Coast','','Vredendal','Matzikama Local Municipality','2021-02-20 15:18:20','2021-02-20 15:18:20'),(629,'Western Cap','West Coast','','Vredenburg','Saldanha Bay Local Municipality','2021-02-20 15:18:46','2021-02-20 15:18:46'),(630,'Western Cap','West Coast','','Malmesbury','Swartland Local Municipality','2021-02-20 15:19:05','2021-02-20 15:19:05');
/*!40000 ALTER TABLE `municipality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(100) NOT NULL,
  `companyAddress` varchar(255) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `Suburb` varchar(255) DEFAULT NULL,
  `Street_name` varchar(255) DEFAULT NULL,
  `Street_number` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `landline_number` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cardHolderName` varchar(100) DEFAULT NULL,
  `cardNumber` varchar(50) DEFAULT NULL,
  `cardCVV` int(5) DEFAULT NULL,
  `cardExpiration` varchar(11) DEFAULT NULL,
  `packageName` varchar(100) NOT NULL,
  `packageExpiryDate` varchar(50) NOT NULL,
  `packagePrice` varchar(50) NOT NULL,
  `paid_and_free` int(1) DEFAULT NULL COMMENT '1-paid and 0-free',
  `packageCreatedDate` varchar(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=280 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation`
--

LOCK TABLES `organisation` WRITE;
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` VALUES (279,'Test ','Test',NULL,'Sva','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','asrtiya@yahoo.com',NULL,'0332587458','0832671107',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-24 06:57:12','2021-04-13 11:45:09','','',0,'01/2018','FREEMIUM','24-09-2021','FREE',0,'24/03/2021',1),(120,'Slash Technologies','India ',NULL,'Rajveer','barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajveer@gmail.com',NULL,'07315000308','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-10 11:18:04','2021-02-10 11:18:04','','',0,'01/2018','STANDARD','10-08-2021','4.25',1,'10/02/2021',2),(110,'Slash Technologies','India ',NULL,'Rajveer','Barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajveerbarman007@gmail.com',NULL,'7894561230','9874563210',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-10 06:58:38','2021-02-10 06:58:38','','',0,'01/2018','STANDARD','10-08-2021','4.25',1,'10/02/2021',2),(13,'ORGANIZATION aaaa','dsfhgj',NULL,'dxvfchfgjfd','driver',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','driver1@gmail.com',NULL,'1212121212','1231231230',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-22 12:26:20','2021-02-17 06:12:56','test','41111111111111',123,'01/2023','FREEMIUM','22-07-2021','110',1,'22/01/2021',1),(10,'Epsitech','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','wmunyambu@live.com',NULL,'0112367333','0740740732',0,0,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-01-26 08:01:29','2021-03-30 08:50:00','TestJan','454845158451584845',555,'11/2023','FREEMIUM','26-07-2021','220.00',1,'26/01/2021',1),(123,'Test2','4 Tim Avenue',NULL,'Mtutuzeli','Molomo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','tutu@epsitech.co.za',NULL,'0117647657','0836896330',0,0,'a426816d4379d406a655b62a8b34d4890aca134c','2021-02-10 14:41:34','2021-02-10 14:41:34','Mtutuzeli Molomo','4578965068801321',10,'11/2023','STANDARD','10-08-2021','4.25',1,'10/02/2021',2),(268,'Epsitech','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','info@digilims.com',NULL,'01112345679','0740740732',0,0,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-02-17 07:23:37','2021-02-17 07:23:37','W M Maina','4578965084038718',868,'09/2024','STANDARD','17-08-2021','1',1,'17/02/2021',2),(40,'Khathula','Kirkness',NULL,'Akhonke','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','robert.tiya@hotmail.com',NULL,'0115865874','0622151432',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-01 17:33:48','2021-02-03 06:56:55','Akhonke Tiya','0987654323456',565,'11/2031','FREEMIUM','01-08-2021','FREE',0,'01/02/2021',1),(147,'TPN Training & Recruitment','140 West Street, Sandton',NULL,'Teboho','Ntsihlele',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','tpntrainingrecruitment@gmail.com',NULL,'0110575352','0731731633',0,0,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-16 07:46:59','2021-02-16 07:46:59','T B Ntsihlele','4854422130923043',540,'11/2025','Advanced','16-08-2021','1364.09',1,'16/02/2021',3),(124,'Test2','4 Tim Avenue',NULL,'Mtutuzeli','Molomo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','tutu@khathula.com',NULL,'0117647657','0836896330',0,0,'a426816d4379d406a655b62a8b34d4890aca134c','2021-02-10 14:55:57','2021-02-10 14:55:57','Tutu Molomo','4578965068801321',10,'11/2023','STANDARD','10-08-2021','4.25',1,'10/02/2021',2),(126,'Epsitech','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','wmunyambu@gmail',NULL,'0112367333','0740740732',0,0,'d431971165b3c6d15c40f7b98318191eaa7e5fb0','2021-02-11 08:28:57','2021-02-11 08:28:57','william','4127525031126564',621,'11/2024','Advanced','11-08-2021','5.46',1,'11/02/2021',3),(242,'Bantox  Pvt Ltd','India MP ',NULL,'Ravi','Verma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','ravi11110000000000@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 15:16:06','2021-02-16 15:16:06','','',0,'01/2018','Advanced','16-08-2021','1484.01',1,'16/02/2021',3),(243,'TPN Training & Recruitment','140 West Street, Sandton',NULL,'Teboho','Ntsihlele',NULL,NULL,NULL,NULL,'Sandton','West Street','140','','teboho@tpntrading.co.za','Santon','0110575352','0731731633',0,0,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-16 15:21:28','2021-02-17 06:03:33','T B Ntsihlele','4854422130923043',540,'11/2025','Advanced','16-08-2021','1484.01',1,'16/02/2021',3),(241,'Bantox  Pvt Ltd','India MP ',NULL,'Ravi','Verma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','ravi11110000000@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 15:12:42','2021-02-16 15:12:42','','',0,'01/2018','STANDARD','16-08-2021','-8981.01',1,'16/02/2021',2),(131,'khathula','kirkness',NULL,'Siviwe','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','asrtiya1@gmail.com',NULL,'0112587458','0622151432',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-11 09:10:44','2021-02-11 09:10:44','Akhonke Tiya',' 5222502273587465',60,'11/2025','STANDARD','11-08-2021','4.25',1,'11/02/2021',2),(132,'khathula','kirkness',NULL,'Siviwe','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','asrtiya3@gmail.com',NULL,'0112587458','0622151432',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-11 09:11:30','2021-02-11 09:11:30','Akhonke Tiya',' 5222502273587465',60,'11/2025','STANDARD','11-08-2021','4.25',1,'11/02/2021',2),(133,'Epsitech','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','wmunyambu@gmail.com',NULL,'0112367333','0740740732',0,0,'d431971165b3c6d15c40f7b98318191eaa7e5fb0','2021-02-11 09:18:06','2021-02-11 09:18:06','william','4127525031126564',621,'11/2024','Advanced','11-08-2021','5.46',1,'11/02/2021',3),(134,'Epsitech','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','william@epsitech.co.za',NULL,'01112345679','0740740732',0,0,'d431971165b3c6d15c40f7b98318191eaa7e5fb0','2021-02-11 10:53:54','2021-02-11 10:53:54','Willy Maina','4127525031126564',621,'11/2024','Advanced','11-08-2021','5.46',1,'11/02/2021',3),(135,'TPN ','14 Bend Street, Blairgowrie',NULL,'Willy','Maina',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','sales@digilims.com',NULL,'0112367333','0740740732',0,0,'d431971165b3c6d15c40f7b98318191eaa7e5fb0','2021-02-11 13:39:06','2021-02-11 13:39:06','Willy Maina','4127525031126564',621,'11/2024','Advanced','11-08-2021','1364.09',1,'11/02/2021',3),(136,'AGSA','23 Normandy Gardens',NULL,'Rofhiwa','Nesamvumi',NULL,NULL,NULL,NULL,'','','','','rofhiwa@africanglobalacademy.co.za','','0782662048','0782662048',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-15 07:11:36','2021-03-12 04:59:59','Akhonke Tiya','5222502273587465',60,'11/2025','STANDARD','15-08-2021','849.15',1,'15/02/2021',2),(137,'AGSA','23 Normandy Gardens',NULL,'Zwanga','Tshabuse',NULL,NULL,NULL,NULL,'','','','','zwanga@africangloba.co.za','','0782662048','0782662048',0,0,'89653fd5bca9db3c729611b50b97d6aba3fc6ebe','2021-02-15 07:14:59','2021-03-12 04:56:20','Akhonke Tiya','5222502273587465',60,'11/2025','STANDARD','15-08-2021','849.15',1,'15/02/2021',2),(138,'Siviwe','23 Normandy Gardens',NULL,'Siviwe','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','sivi@khathula.com',NULL,'025698589','0622151432',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-15 07:15:12','2021-02-15 07:15:12','Akhonke Tiya','5222502273587465',60,'11/2025','STANDARD','15-08-2021','849.15',1,'15/02/2021',2),(234,'Slash Technologies','Indore MP',NULL,'Rajveer ','Barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajveer1111@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 14:50:38','2021-02-16 14:50:38','','',0,'01/2018','FREEMIUM','16-08-2021',',',0,'16/02/2021',1),(238,'Bantox  Pvt Ltd','India MP ',NULL,'Ravi','Verma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','ravi1111@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 15:10:03','2021-02-16 15:10:03','','',0,'01/2018','STANDARD','16-08-2021',',',1,'16/02/2021',2),(239,'Bantox  Pvt Ltd','India MP ',NULL,'Ravi','Verma',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','ravi11110000@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 15:11:27','2021-02-16 15:11:27','','',0,'01/2018','STANDARD','16-08-2021','989.01',1,'16/02/2021',2),(236,'Slash Technologies','Indore MP',NULL,'Rajveer ','Barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajveer11110000@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-16 14:54:14','2021-02-16 14:54:14','','',0,'01/2018','FREEMIUM','16-08-2021',',',0,'16/02/2021',1),(276,'Khathula Consulting Services','210 Kirkness Avenue, Pierre van Ryneveld',NULL,'Nolundi ','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','nolundi@khathula.com',NULL,'0115254789','0781846284',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-18 16:56:18','2021-02-18 16:56:18','Akhonke Tiya','5222502273587465',60,'11/2025','Advanced','18-08-2021','1499',1,'18/02/2021',3),(277,'IALE institute','16 New Main Road, Kimberley',NULL,'Allen','Mutono',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','allen@ialeinstitute.org',NULL,'0530040514','0730210294',0,0,'7e73b92ce586201b93e70734ae12c4c1d9c8e89c','2021-02-22 16:34:17','2021-02-22 16:34:17','','',0,'01/2018','FREEMIUM','22-08-2021','FREE',0,'22/02/2021',1),(278,'AGSA','Gauteng',NULL,'Onica','Onica',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','onica@gmail.com',NULL,'0115879856','0782662048',0,0,'d8f28011729212d53bf16e37f93706dd1ea22a4e','2021-03-11 12:09:18','2021-03-11 12:09:18','','',0,'01/2018','Advanced','11-09-2021','1499',1,'11/03/2021',3),(272,'AGSA','Kirkness',NULL,'Zwanga','Tshabuse',NULL,NULL,NULL,NULL,'','','','','zwanga@africanglobalacademy.co.za','','0782662048','0782662048',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-17 07:41:18','2021-03-12 05:04:45','Akhonke Tiya','5222502273587465',60,'11/2025','STANDARD','17-08-2021','1',1,'17/02/2021',2),(275,'dsf','dsf',NULL,'sdf','dsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','slash.jyoti1806@gmail.com',NULL,'123456789','9876541230',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-17 07:49:36','2021-02-17 07:49:36','sheetal prasad','5366210005604337',699,'07/2023','STANDARD','17-08-2021','1',1,'17/02/2021',2),(266,'Slash Technologies','Indore MP',NULL,'Rajveer ','Barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajver7111111111@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-17 06:04:04','2021-02-17 06:04:04','','',0,'01/2018','Advanced','17-08-2021','1499',1,'17/02/2021',3),(264,'Khathula','Normandy',NULL,'Sva','Tiya',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','Sva1@gmail.com',NULL,'011 671 9500 ','0622151432 ',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-17 05:42:52','2021-02-17 05:42:52','Tiya Sva','09876443365',60,'11/2019','FREEMIUM','17-08-2021','FREE',0,'17/02/2021',1),(265,'Slash Technologies','Indore MP',NULL,'Rajveer ','Barman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','rajver7845962645@gmail.com',NULL,'7894561230','7894561230',0,0,'71fcb403c4fab488547bfeefae150c96fe9e8ffa','2021-02-17 06:03:14','2021-02-17 06:03:14','','',0,'01/2018','STANDARD','17-08-2021','999',1,'17/02/2021',2);
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ourCustomerLogo`
--

DROP TABLE IF EXISTS `ourCustomerLogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ourCustomerLogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ourCustomerLogo`
--

LOCK TABLES `ourCustomerLogo` WRITE;
/*!40000 ALTER TABLE `ourCustomerLogo` DISABLE KEYS */;
INSERT INTO `ourCustomerLogo` VALUES (23,'50b618f44350fd864d32b78a8383baa0.jpg'),(20,'2eb58f3de06f34475c5f142894036ba8.png'),(21,'310e52d2043c585e558f4f4d04a4e969.png'),(22,'b7212e3b4444508218149b33eb1175d5.png');
/*!40000 ALTER TABLE `ourCustomerLogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_gateway`
--

DROP TABLE IF EXISTS `payment_gateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_gateway` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `plan_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_gateway`
--

LOCK TABLES `payment_gateway` WRITE;
/*!40000 ALTER TABLE `payment_gateway` DISABLE KEYS */;
INSERT INTO `payment_gateway` VALUES (30,'5f3e8641-0273-4d7d-a390-bd8acf4169bc','100.00','ZAR',12,'SETTLED','2021-02-01 01:52:09',1),(31,'2011aa68-98e3-45d1-8f0a-09b8b9c8f30e','100.00','ZAR',13,'SETTLED','2021-02-01 04:03:35',1),(32,'dc92d010-da6e-4b4d-86bf-876c296a53d3','100.00','ZAR',14,'SETTLED','2021-02-01 04:56:17',1),(33,'b71da2c9-718f-4729-af87-58136a518b9c','100.00','ZAR',15,'SETTLED','2021-02-01 05:04:05',1),(34,'f4703e21-6b55-45ae-ac1d-16800326a9a6','100.00','ZAR',16,'SETTLED','2021-02-01 05:10:16',1),(35,'5bd7aead-5ab8-478e-ad4e-dbacc80f42db','100.00','ZAR',17,'SETTLED','2021-02-01 05:15:56',1),(36,'b0afd0cf-8731-4c62-b897-c60f618e6e18','100.00','ZAR',18,'SETTLED','2021-02-01 05:23:11',1),(37,'1b469661-f98a-4c05-8ec8-ac5226c2b33d','100.00','ZAR',19,'SETTLED','2021-02-01 05:34:21',1),(38,'9c8e15d9-d828-4d97-a464-e8f6a6ec1228','100.00','ZAR',20,'SETTLED','2021-02-01 05:39:57',1),(39,'24590e84-a171-4cce-a369-86df3fa3d343','100.00','ZAR',21,'SETTLED','2021-02-01 05:42:03',1),(40,'456ce51e-c766-417b-b48d-247fa6cb0a20','100.00','ZAR',23,'SETTLED','2021-02-01 05:53:35',1),(41,'97f98df0-a144-48d3-8bce-b6d0634c6425','100.00','ZAR',24,'SETTLED','2021-02-01 06:13:57',1),(42,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'SETTLED','2021-02-01 06:29:33',3),(43,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'SETTLED','2021-02-01 06:44:08',3),(44,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'CANCELLED','2021-02-01 06:44:20',3),(45,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'FAILED','2021-02-01 06:44:39',3),(46,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'FAILED','2021-02-01 06:44:48',3),(47,'d4f8aa64-0de9-4f58-ab10-d75989694819','1364.00','ZAR',26,'SETTLED','2021-02-01 06:44:57',3),(48,'bc8ffa71-43ac-4bae-9c30-2ed4ed0bc7ab','849.00','ZAR',27,'SETTLED','2021-02-01 06:49:40',2),(49,'bc8ffa71-43ac-4bae-9c30-2ed4ed0bc7ab','849.00','ZAR',27,'FAILED','2021-02-01 06:51:37',2),(50,'93919566-f69f-42ad-b8ff-33602424505b','14.00','ZAR',0,'SETTLED','2021-02-03 05:11:09',0),(51,'65ec7d24-4778-41e4-afe1-c6226f470a4a','9.00','ZAR',0,'SETTLED','2021-02-03 10:35:59',0),(52,'2a5b6d20-1e48-46d2-b340-6191070d6371','4.00','ZAR',0,'SETTLED','2021-02-09 02:31:49',0),(53,'99b4b648-f4b3-4e5c-9384-de9331974a50','4.00','ZAR',0,'SETTLED','2021-02-09 02:35:12',0),(54,'7c22e180-b500-4e46-9a30-b30f7fa095ab','4.00','ZAR',0,'SETTLED','2021-02-09 20:49:37',0),(55,'e4cadf3d-2e14-4614-a017-8bb9c70bd03f','4.00','ZAR',0,'SETTLED','2021-02-10 04:20:30',0),(56,'53ab783a-76a3-4f67-8112-ee3e55c0a0aa','5.00','ZAR',0,'SETTLED','2021-02-11 03:55:17',0),(57,'9de9f0be-e66e-484f-bd52-886f0d35401b','1.00','ZAR',0,'SETTLED','2021-02-17 00:25:19',0);
/*!40000 ALTER TABLE `payment_gateway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(52) NOT NULL,
  `description` varchar(52) NOT NULL,
  `duration` varchar(52) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  `feature` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0-inactive,1-active',
  `manage_project_value` int(11) NOT NULL COMMENT '0-UNLIMITED ',
  `pricediscount` int(50) NOT NULL,
  `name_color` varchar(20) NOT NULL DEFAULT '#1ebdd2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
INSERT INTO `plan` VALUES (1,'FREEMIUM','','6 Months','','FREE','Qualification Management%@#$Class Management%@#$Learner List Management%@#$Stipend Management%@#$Attendance Management%@#$Facilitator and Moderator Management%@#$Drop Out Management%@#$Learner Performance Management%@#$Host employer Management%@#$Financial Management (including Stipends)',1,2,0,'#1ebdd2'),(2,'STANDARD','','6 Months','','999','Learnership Project Management%@#$Advanced Reporting and Analytics%@#$Qualification Management%@#$SMS and Email Sending%@#$Class Management%@#$Learner List Management%@#$Stipend Management%@#$Attendance Management%@#$Facilitator and Moderator Management%@#$Drop Out Management%@#$Learner Performance Management%@#$Host employer Management%@#$Quarterly report Compilation%@#$Financial Management (including Stipends)',1,0,0,'#8bc24a'),(3,'Advanced','','6 Months','','1499','FREE E-LEARNING PORTAL%@#$Learnership Project Management%@#$Advanced Reporting and Analytics%@#$Qualification Management%@#$SMS and Email Sending%@#$Class Management%@#$Learner List Management%@#$Stipend Management%@#$Attendance Management%@#$Facilitator and Moderator Management%@#$Drop Out Management%@#$Learner Performance Management%@#$Host employer Management%@#$Quarterly report Compilation%@#$Financial Management (including Stipends)',1,0,0,'#feca28');
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programme_director`
--

DROP TABLE IF EXISTS `programme_director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programme_director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_director` varchar(255) NOT NULL COMMENT 'Company Name',
  `organisation_id` int(11) NOT NULL,
  `programme_name` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `programme_start_date` varchar(100) NOT NULL,
  `programme_end_date` varchar(100) NOT NULL,
  `q1_start_date` varchar(255) NOT NULL COMMENT ' Quarter 1 start date',
  `q1_end_date` varchar(255) NOT NULL COMMENT ' Quarter 1 end date',
  `q2_start_date` varchar(255) NOT NULL COMMENT ' Quarter 2 start date',
  `q2_end_date` varchar(255) NOT NULL COMMENT ' Quarter 2 end date',
  `q3_start_date` varchar(255) NOT NULL COMMENT ' Quarter 3 start date',
  `q3_end_date` varchar(255) NOT NULL COMMENT ' Quarter 3 end date',
  `q4_start_date` varchar(255) NOT NULL COMMENT ' Quarter 4 start date',
  `q4_end_date` varchar(255) NOT NULL COMMENT ' Quarter 4 end date',
  `contact_number` varchar(100) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `physical_address` varchar(255) NOT NULL,
  `tax_clearance` varchar(255) NOT NULL,
  `company_registration_documents` varchar(500) NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_organisation` (`organisation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programme_director`
--

LOCK TABLES `programme_director` WRITE;
/*!40000 ALTER TABLE `programme_director` DISABLE KEYS */;
/*!40000 ALTER TABLE `programme_director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(100) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` int(11) NOT NULL,
  `planned_start_date` varchar(255) NOT NULL,
  `actual_start_date` varchar(255) NOT NULL,
  `planned_end_date` varchar(255) NOT NULL,
  `actual_end_date` varchar(255) NOT NULL,
  `project_owner_name` varchar(255) NOT NULL,
  `project_owner_surname` varchar(255) NOT NULL,
  `project_owner_email` varchar(255) NOT NULL,
  `project_owner_mobile` bigint(100) NOT NULL,
  `project_owner_landline` bigint(100) NOT NULL,
  `project_owner_id_number` varchar(255) NOT NULL,
  `project_owner_gender` varchar(255) NOT NULL,
  `project_owner_dob` varchar(255) NOT NULL,
  `pre_implement_planned_start_date` varchar(255) NOT NULL,
  `pre_implement_actual_start_date` varchar(255) NOT NULL,
  `pre_implement_planned_end_date` varchar(255) NOT NULL,
  `pre_implement_actual_end_date` varchar(255) NOT NULL,
  `implement_planned_start_date` varchar(255) NOT NULL,
  `implement_actual_start_date` varchar(255) NOT NULL,
  `implement_planned_end_date` varchar(255) NOT NULL,
  `implement_actual_end_date` varchar(255) NOT NULL,
  `closeout_planned_start_date` varchar(255) NOT NULL,
  `closeout_actual_start_date` varchar(255) NOT NULL,
  `closeout_planned_end_date` varchar(255) NOT NULL,
  `closeout_actual_end_date` varchar(255) NOT NULL,
  `status` varchar(122) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,1,1,'digilims project sssss','Learnership','Mpumalanga Correct one','146','','277',46,'2021-01-24','2021-01-25','2021-01-26','2021-01-27','Shree','test','shree@gmail.com',881740172,123123123,'1201201201201','Male','2021-01-15','2021-01-24','2021-01-25','2021-01-26','2021-01-27','2021-01-28','2021-01-29','2021-01-30','2021-01-31','2021-02-01','2021-02-02','2021-02-03','2021-02-04',''),(2,4,3,'Bidvest','wil','Limpopo','2','','25',15,'2021-01-26','2021-01-27','2021-01-28','2021-01-29','Susan','Mapoloko','susan@gmail.com',625478985,569854758,'9854756245865','Male','2020-12-29','2021-01-26','2021-01-27','2021-01-29','2021-01-29','2021-02-02','2021-02-05','2021-02-08','2021-02-09','2021-02-15','2021-02-16','2021-02-17','2021-02-18','1'),(3,1,1,'TestJan26','Learnership','Mpumalanga Correct one','146','','275',247,'2021-02-01','2021-02-02','2021-02-05','2021-02-06','Willy','Maina','wmunyambu@live.com',740740732,113267333,'A2395206','Male','2000-06-18','2021-02-01','2021-02-05','2021-02-02','2021-03-06','2021-03-08','2021-03-09','2021-04-07','2021-03-10','2021-03-12','2021-03-13','2021-03-15','2021-03-19',''),(4,10,11,'TestJan26','Learnership','Mpumalanga Correct one','146','','275',247,'2021-01-26','2021-01-27','2021-01-29','2021-01-30','Willy','Maina','wmunyambu@live.com',740740732,113267333,'123456','Male','2000-06-18','2021-01-26','2021-01-27','2021-01-28','2021-01-29','2021-02-01','2021-02-02','2021-02-03','2021-02-03','2021-02-04','2021-02-04','2021-02-05','2021-02-05',''),(5,4,3,'Eskom','Learnership','Mpumalanga Correct one','144','','261',44,'2021-01-27','2021-01-28','2021-01-29','2021-01-30','Lwazi','Magadla','lwazi@gmail.com',698547858,586987898,'3658745896587','Male','1970-06-15','2021-01-27','2021-01-28','2021-01-29','2021-01-30','2021-02-01','2021-02-02','2021-02-05','2021-02-06','2021-02-15','2021-02-16','2021-02-17','2021-02-18',''),(6,1,1,'Shree test manager','Learnership','test aaa','164','','349',318,'2021-02-01','2021-02-02','2021-02-03','2021-02-04','raj','driver','rajdriver@gmail.com',881740171,456456456,'shree@1234567','Female','1990-02-12','2021-02-01','2021-02-02','2021-02-03','2021-02-04','2021-02-05','2021-02-06','2021-02-07','2021-02-08','2021-02-09','2021-02-10','2021-02-11','2021-02-12',''),(7,13,1,'dtgdfhgfd','Bursary','Mpumalanga Correct one','145','','270',52,'2018-06-01','2019-01-20','2019-01-31','2021-02-03','fgfd','gdfgdfg','sfsdg@gmail.com',123456789,123456789,'1234567890123','Female','2008-06-03','2019-06-18','2021-01-04','2021-02-03','2021-03-12','2018-07-03','2020-12-29','2021-02-26','2021-03-13','2017-06-03','2017-06-03','2017-07-03','2021-02-10',''),(8,13,1,'a','Learnership','Limpopo','19','','42',215,'2021-02-17','2021-02-19','2021-03-25','2021-03-27','Sva','Tiya','siviwe@khathula.com',622151432,365254722,'8609183019089','Other','2021-02-25','2021-02-25','2021-02-26','2021-02-27','2021-02-28','2021-03-25','2021-03-28','2021-04-05','2021-04-28','2021-05-13','2021-05-25','2021-06-18','2021-07-21',''),(9,13,1,'Dudula projects','Learnership','Limpopo','2','','25',15,'2021-02-08','2021-02-09','2021-02-12','2021-02-15','Thabang','Molelo','thabang@gmail.com',761592365,117536969,'8504055426081','Male','1985-04-05','2021-01-04','2021-01-05','2021-01-08','2021-01-08','2021-01-11','2021-01-11','2021-01-15','2021-01-15','2021-01-25','2021-01-25','2021-01-29','2021-01-29',''),(10,243,17,'Seda Agri business ','Skills_Program','Gauteng','165','','350',319,'2021-02-17','2021-02-22','2021-02-25','2021-02-26','TPN training and Recruitment ','Teboho','teboho@tpntrading.co.za',731731633,110575352,'6608240789085','Female','2021-08-24','2021-02-17','2021-02-18','2021-02-19','2021-02-19','2021-02-19','2021-02-22','2021-02-25','2021-02-26','2021-02-25','2021-02-25','2021-02-26','2021-02-26',''),(11,10,11,'Testing Project','Learnership','Gauteng','186','','505',472,'2021-02-01','2021-02-02','2021-03-30','2021-03-31','William','Smith','wmunyambu@live.com',762514809,125369145,'7902126859081','Male','1979-02-12','2021-02-01','2021-02-01','2021-02-05','2021-02-05','2021-02-08','2021-02-08','2021-03-26','2021-03-29','2021-03-30','2021-03-30','2021-03-31','2021-03-31',''),(12,10,11,'BPO','Bursary','Free State','182','','423',388,'2021-03-05','2021-03-06','2021-03-30','2021-03-31','Mtutuzeli','Molomo','wmunyambu@live.com',123456789,113267333,'21062873298322','Male','2021-03-24','2021-03-31','2021-04-01','2021-04-02','2021-04-03','2021-04-04','2021-04-05','2021-05-07','2021-04-09','2021-04-11','2021-04-13','2021-04-15','2021-04-18','');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_manager`
--

DROP TABLE IF EXISTS `project_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_manager` varchar(255) NOT NULL COMMENT 'company name',
  `organization` varchar(255) NOT NULL COMMENT 'Company name (default)',
  `fullname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Street_name` varchar(255) NOT NULL,
  `Street_number` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `physical_address` varchar(255) NOT NULL,
  `landline_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `company_registration_documents` varchar(255) NOT NULL,
  `tax_clearance` varchar(255) NOT NULL,
  `assesor_acreditations` varchar(255) NOT NULL,
  `seta_creditiations` varchar(255) NOT NULL,
  `moderator_accreditations` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_manager`
--

LOCK TABLES `project_manager` WRITE;
/*!40000 ALTER TABLE `project_manager` DISABLE KEYS */;
INSERT INTO `project_manager` VALUES (1,'Slash Project Manager','13','project ','manager','','Limpopo','Koloti','','Bela Bela  Warmbad','Lephalale Local Municipality','pmanager suburb','p mngr street','23223','','projectmanager@gmail.com','','123456789','123456987','c09469922cbfeaa8e40992188a626c8c.png','c45fce53a8559edd4350ddcdf878a7af.png','bf152460593af97ed5a597a073b50b76.png','c9d5eaaadb97cea5f2b3d72127d4943d.png','8de758f119445b4ca15219162a339b03.png',1,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 05:31:15','2021-02-02 05:13:51'),(2,'Pick n Pay','3','Thabo','Pase','','Western Cape Correct One','Cape Winelands','','Worcester','Breede Valley Local Municipality','Montana','Montana Avenue','','','thabopase@gmail.com','','658965833','256232147','','','','','',2,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 11:02:29','2021-01-20 15:15:21'),(10,'projectM','9','pro','ject yes','','North West correct one','Dr Kenneth Kaunda','','Klerksdorp','City of Matlosana Local Municipality','tyry','273 vijay nagar indore','232','','pro@gmail.com','','121212121','232323233','','','','','',10,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-25 11:40:46','2021-02-02 06:37:54'),(3,'Sasol','4','Sipho','Nkosi','','Kwazulu Natal Correct One','Amajuba','','Dannhauser','Dannhauser Local Municipality','Moreleta Park','Mandela Drive','256','','sipho@gmail.com','','369854789','325478965','dc1df358b6e519fcc07be871e487aca5.docx','1c8afadbf6779f8f07765e060878c15f.docx','d4768a85145b7fda44f25bd194ab8a97.docx','612eb7707d2e51960311ee767d23f125.docx','456db8db6e820ae94611929460676e0d.docx',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 11:17:13','2021-01-20 11:17:13'),(9,'projectmanager','1','Second Project ','Manager','','Limpopo','Koloti','','Bela Bela  Warmbad','Capricorn District Municipality','xdc','1321','65','','projectmanager2@gmail.com','','444444444','878789887','','6c9f7b8b113dc5f1c2271908dca7a834.png','dda42486edd89b84d6e12abaae7ee3a4.png','b1f96d652b92de7f8b254a5806b03c53.png','64cbc8b0c96034f5a90bd14113450ea8.png',9,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-25 05:50:56','2021-01-28 05:07:08'),(6,'Sasol','4','Mabhulu','Masiza','','Western Cape Correct One','Cape Winelands','','Paarl','Drakenstein Local Municipality','Thembisa','Walter Sisulu Drive','','','mabhulu@gmail.com','','125632478','225632214','','','','','',0,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-01-20 12:11:35','2021-01-20 12:12:16'),(11,'TestprojectMgr','10','Willy','Maina','','Mpumalanga Correct one','Nkangala','','Middelburg','Steve Tshwete Local Municipality','Tswete','Bend','15','','wmunyambu@live.com','','113267333','740740732','','da904806de1a028385beee371c9f6dde.jpg','','','11943c1c62a6eb13fbbbb5bd55fd6f7c.jpg',0,0,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','2021-01-26 08:06:51','2021-01-26 08:06:51'),(12,'Sva','40','Siviwe','Tiya','','Mpumalanga Correct one','Ehlanzeni','','Bushbuckridge','Bushbuckridge Local Municipality','Montana','Kirkness','','','sva@gmail.com','','115698578','325698589','','','','','',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-02 17:26:18','2021-02-02 17:26:18'),(13,'Dudula Projects','130','Thulani','Mhlongo','','Limpopo','Phalaborwa','','Dendron','Molemole Local Municipality','Seshego','Lethabong Street','14','','thulani@gmail.com','','114465588','795641414','290c2e8821655c9afc0350697bbef4de.png','35f86c9b4086407a3937f6fa2700158e.png','8ad751aab3073cf0cb171d6a84926fe9.png','38564bdf5b848bc393f04f0c6e359105.png','0c3ecd5f6edc5bc13eed6d881c178281.png',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-15 07:47:56','2021-02-15 07:47:56'),(14,'Dudula Projects','13','John','Dow','','Limpopo','Koloti','','Bela Bela  Warmbad','Capricorn District Municipality','Seshego','Thabela Street','14','','john@gmail.com','','115568952','761452586','548757ce68b14636faa50cf6474bbd8f.png','12efef33d25df9e133a32a2241f2dde5.png','93387597e81f762c0f6eb1c04b3ff26e.png','6a804ff8e736f164be7b8405a8d05f9c.png','12a135b1846854de9495aba0673a3050.png',0,1,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-15 07:58:51','2021-02-15 07:59:12'),(15,'testing','13','Sol','Dean','','Western Cape Correct One','Cape Winelands','','Worcester','Breede Valley Local Municipality','Worcester','Fredrick Street','14','','sol@gmail.com','','114478484','714569632','00a766edeaca3718a4faa701f7375932.jpg','57c935de2b8da77f5fe56e3fed319776.jpg','db7c13853f593a5a2aa15972be203a70.jpg','5460f4f8e4895807bc7df4776bb578fa.jpg','a62b141a9962e85490841daab301eb23.jpg',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-15 09:28:55','2021-02-15 09:28:55'),(17,'Teboho Ntsihlele','243','Teboho ','Ntsihlele','','Limpopo','Modimolle','','Other Limpopo','Lepelle-Nkumpi Local Municipality','Modimolle','Mandela ','123','','teboho@tpntrading.co.za','','110575352','731731633','','','','','',0,0,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','2021-02-17 11:14:17','2021-02-17 11:14:17'),(21,'Project Manager','275','Project','Manager','','Gauteng','Johannesburg','','Alexandra',' City of Johannesburg Metropolitan Municipality','Sandton','Mathole Stree','14','','projectmanager@gmail.com','','115869525','796511025','','','','','',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-25 23:13:03','2021-02-25 23:13:03'),(19,'Khathula Consultant Services','276','Nolundi ','Tiya','','Gauteng','City Of Tshwane','','Pretoria','City of Tshwane','Pierre van Ryneveld','Kirkness','210','','nolundi@khathula.com','','126987458','781846248','','','','','',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-02-18 17:09:36','2021-02-18 17:09:36'),(22,'Zwivhuya Tshabuse ','272','Zwanga ','Tshabuse ','','Gauteng','Johannesburg','','Randburg',' City of Johannesburg Metropolitan Municipality','Randburg','Burke  ','8','','zwivhuya@africanglobalacademy.co.za','','117816902','658286503','','','','','',0,0,'7c4a8d09ca3762af61e59520943dc26494f8941b','2021-03-17 06:39:30','2021-03-17 06:39:30');
/*!40000 ALTER TABLE `project_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (79,0,'Mpumalanga','2021-02-20 06:39:32'),(80,0,'Eastern Cape','2021-02-20 07:25:58'),(81,0,'Free State','2021-02-20 08:45:48'),(82,0,'Gauteng','2021-02-20 09:07:24'),(83,0,'KwaZulu-Natal','2021-02-20 10:34:06'),(84,0,'Limpopo','2021-02-20 11:05:05'),(85,0,'North West','2021-02-20 11:27:21'),(86,0,'Northern Cape','2021-02-20 13:52:32'),(87,0,'Western Cape','2021-02-20 15:00:58');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quarterly_progress_report`
--

DROP TABLE IF EXISTS `quarterly_progress_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quarterly_progress_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `created_by_first_name` varchar(255) NOT NULL,
  `created_by_surname` varchar(255) NOT NULL,
  `training_provider_name` varchar(255) NOT NULL,
  `project_manager_name` varchar(255) NOT NULL,
  `quater_name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `document` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarterly_progress_report`
--

LOCK TABLES `quarterly_progress_report` WRITE;
/*!40000 ALTER TABLE `quarterly_progress_report` DISABLE KEYS */;
INSERT INTO `quarterly_progress_report` VALUES (1,4,3,'Sabelo','Mgca','3','','Quarter 3','2021-01-28 00:00:00','2021-01-27 00:00:00','b03dff42639d55f4b6b3d41d25d71b89.docx','2021-01-21 03:20:43'),(2,1,1,'shree','test','1','digilims project sssss','Quarter 2','2021-01-19 00:00:00','2021-01-25 00:00:00','866611b23094167660057ac178d6986b.png','2021-01-25 10:34:09'),(3,1,1,'shree','test','1','digilims project sssss','Quarter 2','2021-01-19 00:00:00','2021-01-25 00:00:00','723f502609c09b59c0fb86390579ac90.png','2021-01-25 10:34:12'),(4,1,1,'shree','test etretr','1','digilims project sssss','Quarter 1','2021-01-25 00:00:00','2021-01-26 00:00:00','184c9033d6ade32e1d019e66a56158a2.png','2021-01-25 11:41:28'),(6,4,3,'Mbali','Ntuli','3','TestJan26','Quarter 2','2021-01-26 00:00:00','2021-01-29 00:00:00','6c45faf3b46e9ae1dfaef213f25a6072.docx','2021-01-26 13:26:52'),(7,4,3,'Mava','Madolo','3','TestJan26','Quarter 3','2021-01-30 00:00:00','2021-02-24 00:00:00','88c9cecd86ae4ee5816e064b7a9ad2f9.docx','2021-01-26 13:27:56'),(8,10,11,'Themba','Duma','5','Testing Project','Quarter 1','2021-01-04 00:00:00','2021-03-31 00:00:00','5d60646bf35de04c1e2c780f0207f269.png','2021-03-09 10:41:44');
/*!40000 ALTER TABLE `quarterly_progress_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reason`
--

DROP TABLE IF EXISTS `reason`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reason`
--

LOCK TABLES `reason` WRITE;
/*!40000 ALTER TABLE `reason` DISABLE KEYS */;
/*!40000 ALTER TABLE `reason` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `district_id` varchar(255) NOT NULL,
  `province_id` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,0,'Mthatha','Eastern Cape','Zandukwane','2021-01-12 01:14:36','2021-01-12 01:14:36');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stipend`
--

DROP TABLE IF EXISTS `stipend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stipend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `learner_name` varchar(255) NOT NULL,
  `learner_surname` varchar(255) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `learnship_id` int(11) NOT NULL,
  `learnership_subtype` varchar(255) NOT NULL,
  `class` varchar(222) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch_name` varchar(255) NOT NULL,
  `account_type` varchar(244) NOT NULL,
  `branch_code` varchar(124) NOT NULL,
  `account_number` varchar(155) NOT NULL,
  `total_attendence` varchar(111) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stipend`
--

LOCK TABLES `stipend` WRITE;
/*!40000 ALTER TABLE `stipend` DISABLE KEYS */;
INSERT INTO `stipend` VALUES (4,1,0,0,'ssddd','dddd',1,'0000-00-00',7567.00,'1471471471470',1,'6','7th','15','et44r','saving_account','rtyrthty','46565767','575','2021-01-26 11:01:21','2021-01-27 06:32:49'),(3,1,0,0,'test two','twooo',1,'0000-00-00',12500.00,'7',1,'1','slash','9','FGG','saving_account','qqs654343','12341234123','125','2021-01-25 07:39:27','2021-01-25 07:39:27'),(5,4,0,0,'Siphokazi','Jezile',3,'0000-00-00',600.00,'3',10,'10','Datsun','14','Mthatha','current_account','25488','3698547','2','2021-01-26 13:25:57','2021-01-26 13:25:57'),(6,1,0,0,'qwwww','qw',1,'0000-00-00',545.00,'1230123012301',1,'1','slash','15','adsadasd','current_account','rerwer','46346363','46345','2021-01-29 05:11:12','2021-01-29 05:11:12'),(7,1,0,0,'ssddd','dddd',1,'0000-00-00',54.00,'1471471471470',7,'6','7th','14','BRNCH MNAMWEN','saving_account','4335435','45334354','44','2021-01-29 05:12:58','2021-01-29 05:12:58'),(8,1,0,0,'Slash Technology','Learner',1,'0000-00-00',35435.00,'1236547896547',1,'1','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','446464','2021-01-30 10:10:25','2021-01-30 10:10:25'),(9,1,0,0,'Slash Technology','Learner',1,'0000-00-00',500.00,'1236547896547',1,'1','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','45','2021-02-01 06:25:35','2021-02-01 06:25:35'),(10,1,0,0,'Slash Technology','Learner',1,'0000-00-00',1000.00,'1236547896547',1,'1','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','10','2021-02-01 06:26:32','2021-02-01 06:26:32'),(11,1,0,0,'ssddd','dddd',1,'2021-02-01',1200.00,'1471471471470',1,'1','slash','ABSA','fdghjk','Cheque','sedrtfgy567','456789','123','2021-02-01 09:44:14','2021-02-01 09:44:14'),(12,1,0,0,'qwwww','qw',1,'2021-02-01',2500.00,'1230123012301',7,'6','7th','ABSA','hjncgfm ','Cheque','4654','234567890','1200','2021-02-01 09:45:57','2021-02-01 09:45:57'),(13,13,0,0,'Slash Technology','Learner',1,'2021-02-02',99999999.99,'1236547896547',1,'slash one','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','4643645','2021-02-02 13:16:26','2021-02-02 13:16:26'),(14,13,0,0,'Slash Technology','Learner',1,'2021-02-02',99999999.99,'1236547896547',1,'1','slash','Standard Bank','BRNCH MNAMWEN','Cheque','5','45455554444455555555','3543543','2021-02-02 13:18:04','2021-02-02 13:18:04'),(15,13,0,0,'qwwww','qw',1,'2021-02-04',1500.00,'1230123012301',7,'6','7th','ABSA','hjncgfm ','Cheque','4654','234567890','120','2021-02-04 12:10:03','2021-02-04 12:10:03'),(16,10,0,0,'Winnie','Maina',11,'2021-02-26',2000.00,'1234567891011',9,'9','TestJanClass1','ABSA','Randburg','Saving','12345','132456','20','2021-02-26 08:47:33','2021-02-26 08:47:33'),(17,10,0,0,'Winnie','Maina',11,'2021-03-01',2000.00,'1234567891011',9,'9','TestJanClass1','ABSA','Randburg','Saving','12345','132456','10','2021-03-01 12:54:41','2021-03-01 12:54:41');
/*!40000 ALTER TABLE `stipend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_user`
--

DROP TABLE IF EXISTS `sub_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_by_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_user`
--

LOCK TABLES `sub_user` WRITE;
/*!40000 ALTER TABLE `sub_user` DISABLE KEYS */;
INSERT INTO `sub_user` VALUES (1,'Mlamli','Masiza','CFO','mlamli@gmail.com','365874589','MTIzNDU2','Project_Manager',3,'2021-01-20 15:34:59'),(2,'Sabelo','Mchunu','MD','sabelo@gmail.com','256985412','MTIzNDU2','Project_Manager',3,'2021-01-20 15:35:43'),(3,'Kabelo','Mogorosi','President','kabelo@gmail.com','256324785','NjU0MzIx','Project_Manager',3,'2021-01-20 15:36:53'),(4,'test','user','student','testuser@gmail.com','088174017','MTIzNDU2','Project_Manager',1,'2021-01-25 07:30:44'),(6,'raj','driver','student','rajdriver@gmail.com','08817401711','MTIzNDU2','Provider',1,'2021-01-25 11:42:28'),(8,'Maina','Willy','Facilitator','wmunyambu@live.com','740740732','TWlzaGllODA=','Project_Manager',11,'2021-01-26 13:12:41'),(9,'Esabo','Sikhuza','MD','esabo@gmail.com','011586985698','MTIzNDU2','Provider',3,'2021-01-26 13:29:25'),(10,'thgdshgdh','dfgfdg','fdgdfg','dgfdgfdg@gmail.com','123456789','ZmRnZmRn','Provider',1,'2021-01-28 12:53:22'),(13,'Thomas','Van Tonder','Manager','thomas@gmail.com','732596408','MTIzNDU2','Project_Manager',11,'2021-03-03 14:07:21'),(14,'Sonto','Sibiya','director','sonto@gmail.com','782563501','MTIzNDU2','Provider',5,'2021-03-09 11:00:17'),(16,'zwanga','Tshabuse','User One','zwanga@africanglobalacademy.co.za','0782662048','endhbmdhMTIzNDU2','Provider',9,'2021-03-11 11:07:32');
/*!40000 ALTER TABLE `sub_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `project_manager` int(122) NOT NULL,
  `project` int(11) NOT NULL,
  `task_name` varchar(222) NOT NULL,
  `task_desc` varchar(222) NOT NULL,
  `task_owner` varchar(222) NOT NULL,
  `planned_start_date` varchar(222) NOT NULL,
  `actual_start_date` varchar(222) NOT NULL,
  `planned_end_date` varchar(222) NOT NULL,
  `actual_end_date` varchar(222) NOT NULL,
  `task_status` varchar(222) NOT NULL,
  `task_status_colour` varchar(222) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,1,1,1,'paaaa','all boxesssss testing','asdasd','2021-01-24','2021-01-27','2021-01-26','2021-01-29','Inprogress','Amber','2021-01-23 07:06:06'),(3,4,3,2,'Investments','Stocks and Bonds','Bidvest','2021-01-26','2021-01-27','2021-01-28','2021-01-29','Inprogress','Amber','2021-01-26 03:44:53'),(4,1,1,3,'TestJantask','Testing Digilims System','William','2021-01-26','2021-01-26','2021-01-27','2021-01-27','Started','Red','2021-01-26 07:45:03'),(5,10,11,4,'TestJanTask','Testing Digilims System','William','2021-01-27','2021-01-27','2021-01-28','2021-01-28','Started','Red','2021-01-26 08:21:02'),(6,4,3,5,'Mpumalanga power station','Coal','Mlungisi','2021-02-01','2021-02-01','2021-02-24','2021-02-23','Completed','Green','2021-01-26 10:35:11'),(7,243,17,10,'Buy data','buy data for learners','Pearl','2021-02-20','2021-02-22','2021-02-22','2021-02-23','Inprogress','Amber','2021-02-19 05:26:38'),(8,10,11,11,'Test Learners','We want to test the learners','William','2021-02-27','2021-02-27','2021-02-28','2021-02-28','Started','Red','2021-02-25 23:57:50'),(9,10,11,12,'PPE ','Purchase of PPE','Patricia','2021-03-30','2021-03-30','2021-03-31','2021-03-31','Started','Red','2021-03-30 07:15:10');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainer`
--

DROP TABLE IF EXISTS `trainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` bigint(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `landline` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `Suburb` varchar(100) NOT NULL,
  `Street_name` varchar(100) NOT NULL,
  `Street_number` varchar(100) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `attach_documents` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainer`
--

LOCK TABLES `trainer` WRITE;
/*!40000 ALTER TABLE `trainer` DISABLE KEYS */;
INSERT INTO `trainer` VALUES (1,13,2,'Training','Provider','trainer@gmail.com',123456789,'7c4a8d09ca3762af61e59520943dc26494f8941b','004e1bc08a8014d21931ebdca870dea1.png','default.jpg','123654741','','','notforuseprovince','','notforusemunc','slash ','slash','12','1',0,'Slash Training Provider','','1','2021-01-20 05:33:39','2021-02-02 05:52:59'),(2,3,2,'Robert','Tiya','robert.tiya@hotmail.com',644647453,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','365896547','Central Karoo','','Western Cape Correct One','Beaufort West','Beaufort West Local Municipality','Soshanguvhe','Solomon Mahlangu','5487','2',0,'Phumelela Strategies','','1','2021-01-20 12:56:02','2021-01-20 12:56:02'),(3,4,2,'Sive','Ntaba','robert.tiya@hotmail.com',644647453,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','256987458','','','Mpumalanga Correct one','','Bushbuckridge Local Municipality','Emalahleni','Paul Kruger Street','','3',0,'Multichoice','','1','2021-01-20 13:53:19','2021-01-28 06:42:26'),(4,13,2,'dxv test','trainer','drivertest1@gmail.com',123123123,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','666666666','Koloti','','Limpopo','Bela Bela  Warmbad','Capricorn District Municipality','Indore','273 vijay nagar indore','5432','1',0,'rftg','1611307719_0.jpg','1','2021-01-22 09:28:39','2021-02-02 09:54:29'),(5,10,2,'Willy','Maina','wmunyambu@live.com',740740732,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','','default.jpg','113267333','Nkangala','','Mpumalanga Correct one','Middelburg','Steve Tshwete Local Municipality','Blairgworie','Bend','15','11',0,'TestWilliamJan','1611649430_0.jpg','1','2021-01-26 08:23:50','2021-01-26 08:23:50'),(6,4,2,'Anda','Ndungane','anda@gmail.com',698745878,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','696547858','Dr Kenneth Kaunda','','North West correct one','Klerksdorp','City of Matlosana Local Municipality','Montana','Hertzog','589','3',0,'BMW','','1','2021-01-26 11:12:26','2021-01-26 11:12:26'),(7,4,2,'Mandla','Masango','mandla@gmail.com',698547898,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','254126398','Overberg','','Western Cape Correct One','Swellendam','Swellendam Local Municipality','Gezina','Mandela Drive','','3',0,'Kaizer Chiefs','','1','2021-01-26 12:01:43','2021-01-26 12:01:43'),(8,243,2,'Teboho ','Ntsihlele','teboho@tpntrading.co.za',731731633,'ed55ee8043390f2debef17af3519f5a0ca2a8ff3','','default.jpg','110575352','City Of Tshwane','','Gauteng','Pretoria','City of Tshwane','Rivonia','Rivonia Boulevard','354','17',0,'TPN Training and Recruitment Pty Ltd','','1','2021-02-17 12:43:30','2021-02-19 05:08:53'),(9,276,2,'Nomkhitha','Maphoella','khitha@pndacademy.co.za',116565819,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','116565819','City Of Tshwane','','Gauteng','Pretoria','City of Tshwane','Wendywood Shopping Centre','1 Daphny Road','2144','19',0,'PND Academy ','','1','2021-02-18 17:35:13','2021-02-18 17:35:13'),(10,10,2,'Swiss Roll Pty Ltd','Swiss Roll Pty Ltd','info@swissroll.co.za',793562025,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','115586397','Thabo Mofutsanyana','','Free State','Bethlehem','Dihlabeng Local Municipality','Bethel','Maseru street','14','11',0,'Swiss Roll Pty Ltd','1614330591_0.png','1','2021-02-26 09:09:51','2021-02-26 09:09:51'),(11,10,2,'Thabang','Majane','thabang@mollo.co.za',741591535,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','114563698','Thabo Mofutsanyana','','Free State','Bethlehem','Dihlabeng Local Municipality','Maseru','Lipompong Street','55','11',0,'Mollo Pty Ltd','1614637653_0.png','1','2021-03-01 22:27:33','2021-03-01 22:27:33'),(12,272,2,'Tshabuse ','Zwivhuya ','zwivhuya@africanglobalacademy.co.za',658286503,'7c4a8d09ca3762af61e59520943dc26494f8941b','','default.jpg','117816902','Johannesburg','','Gauteng','Randburg',' City of Johannesburg Metropolitan Municipality','Randburg','8','8','22',0,'AGSA','','1','2021-03-17 06:50:20','2021-03-17 06:50:20'),(13,10,2,'Patricia','Patricia','wmunyambu@live.com',740740732,'83fe6c4ce3eff6702dce20a8c3c5788f654dd7a1','','default.jpg','223267333','Ehlanzeni','','Mpumalanga','Malalane','Nkomazi Local Municipality','Edenvale','4 Tim Avenue','15','11',0,'BPO Academy','','1','2021-03-30 07:16:34','2021-03-30 07:16:34');
/*!40000 ALTER TABLE `trainer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `total_credits` int(11) NOT NULL,
  `unit_standard_type` varchar(100) NOT NULL,
  `created_by` varchar(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,2,'Unit Standard One',11111,10,'Type 1','1','2021-05-19 13:12:13','0000-00-00 00:00:00'),(2,2,'Unit Standard Two',22222,10,'Type 2','1','2021-05-19 13:12:46','0000-00-00 00:00:00'),(3,2,'Unit Standard Three',33333,19,'Type 3','1','2021-05-19 13:15:12','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` bigint(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin,2=transpoter,3=interviver',
  `image` varchar(255) DEFAULT 'default.jpg',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_modules`
--

DROP TABLE IF EXISTS `user_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel_name` varchar(50) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_modules`
--

LOCK TABLES `user_modules` WRITE;
/*!40000 ALTER TABLE `user_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `is_view` int(11) NOT NULL,
  `is_add` int(11) NOT NULL,
  `is_edit` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission`
--

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-20  1:35:45
