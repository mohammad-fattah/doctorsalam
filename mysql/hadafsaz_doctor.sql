-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: hadafsaz_doctor
-- ------------------------------------------------------
-- Server version	5.7.29-cll-lve

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
-- Current Database: `hadafsaz_doctor`
--


--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `action` enum('created','updated','deleted') COLLATE utf8_persian_ci NOT NULL,
  `log_type` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `log_type_title` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `log_type_id` int(11) NOT NULL DEFAULT '0',
  `changes` mediumtext COLLATE utf8_persian_ci,
  `log_for` varchar(30) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `log_for_id` int(11) NOT NULL DEFAULT '0',
  `log_for2` varchar(30) COLLATE utf8_persian_ci DEFAULT NULL,
  `log_for_id2` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api`
--

DROP TABLE IF EXISTS `api`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `method` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT '200',
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api`
--

LOCK TABLES `api` WRITE;
/*!40000 ALTER TABLE `api` DISABLE KEYS */;
/*!40000 ALTER TABLE `api` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `per` int(6) DEFAULT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `name`, `per`, `logo`) VALUES (1,'بانک ملی ایران',603799,'/upload/images/bank/melli.jpg'),(2,'بانک سپه',589210,''),(3,'بانک توسعه صادرات',627648,''),(4,'بانک صنعت و معدن',627961,'/upload/images/bank/sanatmadan.jpg'),(5,'بانک کشاورزی',603770,'/upload/images/bank/keshavarzi.jpg'),(6,'بانک مسکن',628023,'/upload/images/bank/maskan.jpg'),(7,'پست بانک ایران',627760,'/upload/images/bank/postbank.jpg'),(8,'بانک توسعه تعاون',502908,''),(9,'بانک اقتصاد نوین',627412,'/upload/images/bank/novin.jpg'),(10,'بانک پارسیان',622106,'/upload/images/bank/parsian.jpg'),(11,'بانک پاسارگاد',502229,'/upload/images/bank/pasargad.jpg'),(12,'بانک کارآفرین',627488,''),(13,'بانک سامان',621986,'/upload/images/bank/saman.jpg'),(14,'بانک سینا',639346,'/upload/images/bank/sina.jpg'),(15,'بانک سرمایه',639607,'/upload/images/bank/sarmaye.jpg'),(17,'بانک شهر',502806,'/upload/images/bank/shahr.jpg'),(18,'بانک دی',502938,'/upload/images/bank/dey.jpg'),(19,'بانک صادرات',603769,'/upload/images/bank/saderat.jpg'),(20,'بانک ملت',610433,'/upload/images/bank/mellat.jpg'),(21,'بانک تجارت',627353,'/upload/images/bank/tejarat.jpg'),(22,'بانک رفاه',589463,''),(23,'بانک انصار',627381,'/upload/images/bank/ansar.jpg'),(24,'بانک مهر اقتصاد',639370,'/upload/images/bank/eghtesad.jpg'),(25,'بانک ایران زمین',505785,'/upload/images/bank/iranzamin.jpg'),(26,'بانک پارسیان',639194,'/upload/images/bank/parsian.jpg'),(27,'بانک پارسیان',627884,'/upload/images/bank/parsian.jpg'),(28,'بانک پاسارگاد',639347,'/upload/images/bank/pasargad.jpg'),(29,'بانک توسعه صادرات',207177,''),(30,'بانک حکمت ایرانیان',636949,'/upload/images/bank/hekmat.jpg'),(31,'بانک مهر ایران',606373,'/upload/images/bank/mehr.jpg'),(32,'بانک قوامین',639599,''),(33,'بانک کارآفرین',502910,''),(34,'بانک کشاورزی',639217,'/upload/images/bank/keshavarzi.jpg'),(35,'بانک گردشگری',505416,''),(36,'بانک مرکزی',636795,''),(37,'بانک ملت',991975,'/upload/images/bank/mellat.jpg'),(38,'موسسه اعتباری توسعه',628157,''),(39,'موسسه اعتباری کوثر',505801,''),(40,'بانک آینده',636214,'');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf32_persian_ci NOT NULL,
  `olv` int(11) NOT NULL,
  `pic` varchar(100) COLLATE utf32_persian_ci NOT NULL,
  `type` varchar(500) COLLATE utf32_persian_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf32_persian_ci NOT NULL DEFAULT 'active',
  `insure` enum('thirdparty','body') COLLATE utf32_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`id`, `name`, `olv`, `pic`, `type`, `status`, `insure`) VALUES (1,'اپل',100,'','personal','active','thirdparty'),(2,'آلفارومئو',100,'','personal','active','thirdparty'),(3,'ام جی',100,'','personal','active','thirdparty'),(4,'ام وی ام',11,'','personal','active','thirdparty'),(5,'ایسوزو',100,'','personal','active','thirdparty'),(6,'اینفینیتی',100,'','personal','active','thirdparty'),(7,'آئودی',100,'','personal','active','thirdparty'),(8,'ب ام و',8,'','personal','active','thirdparty'),(9,'بایک',100,'','personal','active','thirdparty'),(10,'برلیانس',4,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(11,'بسترن',4,'','personal','active','thirdparty'),(12,'بنتلی',100,'','personal','active','thirdparty'),(13,'بنز',9,'','personal','active','thirdparty'),(14,'بیوک',100,'','personal','active','thirdparty'),(15,'پاژن',100,'','personal','active','thirdparty'),(16,'پروتون',100,'','personal','active','thirdparty'),(17,'پورشه',100,'','personal','active','thirdparty'),(18,'پونتیاک',100,'','personal','active','thirdparty'),(19,'پیکان',3,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(20,'تویوتا',6,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(21,'تیبا',4,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(22,'جک',5,'','personal','active','thirdparty'),(23,'جگوار',100,'','personal','active','thirdparty'),(24,'جیپ',100,'','personal','active','thirdparty'),(25,'جیلی',26,'','personal','active','thirdparty'),(26,'چانگان',100,'','personal','active','thirdparty'),(27,'چری',4,'','personal','active','thirdparty'),(28,'داتسون',100,'','personal','active','thirdparty'),(29,'دانگ فنگ',100,'','personal','active','thirdparty'),(30,'دنا',3,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(31,'دوج',100,'','personal','active','thirdparty'),(32,'دوو',100,'','personal','active','thirdparty'),(33,'دی اس',100,'','personal','active','thirdparty'),(34,'رانا',3,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(35,'رنو',12,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(36,'رولز رویس',100,'','personal','active','thirdparty'),(37,'روور',100,'','personal','active','thirdparty'),(38,'زوتی',100,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(39,'سانگ یانگ',20,'','personal','active','thirdparty'),(40,'ساینا',5,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(41,'سمند',3,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(42,'سوبارو',100,'','personal','active','thirdparty'),(43,'سوزوکی',5,'','personal','active','thirdparty'),(44,'سیتروئن',4,'','personal','active','thirdparty'),(45,'سیناد',100,'','personal','active','thirdparty'),(46,'شورولت',100,'','personal','active','thirdparty'),(47,'فراری',100,'','personal','active','thirdparty'),(48,'فورد',100,'','personal','active','thirdparty'),(49,'فولکس',100,'','personal','active','thirdparty'),(50,'فیات',100,'','personal','active','thirdparty'),(51,'کاپرا',100,'','personal','active','thirdparty'),(52,'کادیلاک',100,'','personal','active','thirdparty'),(53,'کرایسلر',100,'','personal','active','thirdparty'),(54,'کیا',5,'','personal','active','thirdparty'),(55,'گریت وال',100,'','personal','active','thirdparty'),(56,'لامبورگینی',100,'','personal','active','thirdparty'),(57,'لکسوس',15,'','personal','active','thirdparty'),(58,'لندرور',100,'','personal','active','thirdparty'),(59,'لندمارک',100,'','personal','active','thirdparty'),(60,'لوبو',100,'','personal','active','thirdparty'),(61,'لوتوس',100,'','personal','active','thirdparty'),(62,'لیفان',19,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(63,'مازراتی',100,'','personal','active','thirdparty'),(64,'مزدا',10,'','personal','active','thirdparty'),(65,'مک لارن',100,'','personal','active','thirdparty'),(66,'میتسوبیشی',100,'','personal','active','thirdparty'),(67,'مینی ماینر',100,'','personal','active','thirdparty'),(68,'نیسان',17,'','personal','active','thirdparty'),(69,'هامر',100,'','personal','active','thirdparty'),(70,'هایما',100,'','personal','active','thirdparty'),(71,'هوندا',13,'','personal','active','thirdparty'),(72,'هیوندای',7,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(73,'وانت',100,'','personal','active','thirdparty'),(74,'ولوو',100,'','personal','active','thirdparty'),(75,'ون',100,'','personal','active','thirdparty'),(76,'آمیکو',0,'','motor','active','thirdparty'),(77,'آپاچی',0,'','motor','active','thirdparty'),(78,'آپرلیا',0,'','motor','active','thirdparty'),(79,'آی تک',0,'','motor','active','thirdparty'),(80,'ام وی آگوستا',0,'','motor','active','thirdparty'),(81,'انرژی موتور',0,'','motor','active','thirdparty'),(82,'ایران دوچرخ',0,'','motor','active','thirdparty'),(83,'ب ام و',0,'','motor','active','thirdparty'),(84,'بنلی',0,'','motor','active','thirdparty'),(85,'باجاج',0,'','motor','active','thirdparty'),(86,'تلاش',0,'','motor','active','thirdparty'),(87,'تکتاز موتور',0,'','motor','active','thirdparty'),(88,'تی جی بی',0,'','motor','active','thirdparty'),(89,'تی وی اس',0,'','motor','active','thirdparty'),(90,'ثاقب خودرو',0,'','motor','active','thirdparty'),(91,'جهان همتا سیکلت',0,'','motor','active','thirdparty'),(92,'دایلیم',0,'','motor','active','thirdparty'),(93,'دربی',0,'','motor','active','thirdparty'),(94,'دوکاتی',0,'','motor','active','thirdparty'),(95,'روان سیکلت',0,'','motor','active','thirdparty'),(96,'رگال رپتور',0,'','motor','active','thirdparty'),(97,'زیگما',0,'','motor','active','thirdparty'),(98,'سابین موتور',0,'','motor','active','thirdparty'),(99,'سالار گستر آسیا',0,'','motor','active','thirdparty'),(100,'سوزوکی',0,'','motor','active','thirdparty'),(101,'شاهین موتور',0,'','motor','active','thirdparty'),(102,'شهاب',0,'','motor','active','thirdparty'),(103,'متین خودرو',0,'','motor','active','thirdparty'),(104,'موتور هیسپانیا',0,'','motor','active','thirdparty'),(105,'مگلی',0,'','motor','active','thirdparty'),(106,'نیرو محرکه',0,'','motor','active','thirdparty'),(107,'همتا سیکلت',0,'','motor','active','thirdparty'),(108,'هوندا',0,'','motor','active','thirdparty'),(109,'هیلدا',0,'','motor','active','thirdparty'),(110,'هیوسانگ',0,'','motor','active','thirdparty'),(111,'وسپا',0,'','motor','active','thirdparty'),(112,'پاسارگاد سیکلت فارس',0,'','motor','active','thirdparty'),(113,'پیاجیو',0,'','motor','active','thirdparty'),(114,'پیشتاز موتور توس',0,'','motor','active','thirdparty'),(115,'پیشرو',0,'','motor','active','thirdparty'),(116,'کاوازاکی',0,'','motor','active','thirdparty'),(117,'کبیر',0,'','motor','active','thirdparty'),(118,'کثیر',0,'','motor','active','thirdparty'),(119,'کویر موتور',0,'','motor','active','thirdparty'),(120,'کی تی ام',0,'','motor','active','thirdparty'),(121,'کیان',0,'','motor','active','thirdparty'),(122,'تا یک تن',0,'','truck_1','active','thirdparty'),(123,'یک تن تا سه تن',0,'','truck_3','active','thirdparty'),(124,'سه تن تا پنج تن',0,'','truck_5','active','thirdparty'),(125,'پنج تن تا ده تن',0,'','truck_10','active','thirdparty'),(126,'ده تن تا بیست تن',0,'','truck_20','active','thirdparty'),(127,'بیش از بیست تن',0,'','truck_more_than_20','active','thirdparty'),(128,'پراید',1,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(183,'اتوبوس با ظرفیت ۴۰ نفر با راننده و کمک',0,'','autocar_bus_40seat','active','thirdparty'),(184,'اتوبوس با ظرفیت ۲۷ نفر با راننده و کمک',0,'','autocar_bus_27seat','active','thirdparty'),(185,'مینی‌بوس با ظرفیت ۲۱ نفر با راننده',0,'','autocar_minibus_21seat','active','thirdparty'),(186,'مینی‌بوس با ظرفیت ۱۶ نفر با راننده',0,'','autocar_minibus_16seat','active','thirdparty'),(187,'ون با ظرفیت ۱۰ نفر با راننده',0,'','autocar_van_10seat','active','thirdparty'),(188,'خودرو عمومی با ظرفیت ۹ نفر با راننده',0,'','autocar_9seat_public','active','thirdparty'),(189,'خودرو عمومی با ظرفیت ۷ نفر با راننده',0,'','autocar_7seat_public','active','thirdparty'),(190,'پژو',1,'','personal,taxiin,taxiout,agancy','active','thirdparty'),(191,'اپل',100,'','personal','active','body'),(192,'آلفارومئو',100,'','personal','active','body'),(193,'ام جی',100,'','personal','active','body'),(194,'ام وی ام',11,'','personal','active','body'),(195,'ایسوزو',100,'','personal','active','body'),(196,'اینفینیتی',100,'','personal','active','body'),(197,'آئودی',100,'','personal','active','body'),(198,'ب ام و',8,'','personal','active','body'),(199,'بایک',100,'','personal','active','body'),(200,'برلیانس',4,'','personal,taxiin,taxiout,agancy','active','body'),(201,'بسترن',4,'','personal','active','body'),(202,'بنتلی',100,'','personal','active','body'),(203,'بنز',9,'','personal','active','body'),(204,'بیوک',100,'','personal','active','body'),(205,'پاژن',100,'','personal','active','body'),(206,'پروتون',100,'','personal','active','body'),(207,'پورشه',100,'','personal','active','body'),(208,'پونتیاک',100,'','personal','active','body'),(209,'پیکان',3,'','personal,taxiin,taxiout,agancy','active','body'),(210,'تویوتا',6,'','personal,taxiin,taxiout,agancy','active','body'),(211,'تیبا',4,'','personal,taxiin,taxiout,agancy','active','body'),(212,'جک',5,'','personal','active','body'),(213,'جگوار',100,'','personal','active','body'),(214,'جیپ',100,'','personal','active','body'),(215,'جیلی',26,'','personal','active','body'),(216,'چانگان',100,'','personal','active','body'),(217,'چری',4,'','personal','active','body'),(218,'داتسون',100,'','personal','active','body'),(219,'دانگ فنگ',100,'','personal','active','body'),(220,'دنا',3,'','personal,taxiin,taxiout,agancy','active','body'),(221,'دوج',100,'','personal','active','body'),(222,'دوو',100,'','personal','active','body'),(223,'دی اس',100,'','personal','active','body'),(224,'رانا',3,'','personal,taxiin,taxiout,agancy','active','body'),(225,'رنو',12,'','personal,taxiin,taxiout,agancy','active','body'),(226,'رولز رویس',100,'','personal','active','body'),(227,'روور',100,'','personal','active','body'),(228,'زوتی',100,'','personal,taxiin,taxiout,agancy','active','body'),(229,'سانگ یانگ',20,'','personal','active','body'),(230,'ساینا',5,'','personal,taxiin,taxiout,agancy','active','body'),(231,'سمند',3,'','personal,taxiin,taxiout,agancy','active','body'),(232,'سوبارو',100,'','personal','active','body'),(233,'سوزوکی',5,'','personal','active','body'),(234,'سیتروئن',4,'','personal','active','body'),(235,'سیناد',100,'','personal','active','body'),(236,'شورولت',100,'','personal','active','body'),(237,'فراری',100,'','personal','active','body'),(238,'فورد',100,'','personal','active','body'),(239,'فولکس',100,'','personal','active','body'),(240,'فیات',100,'','personal','active','body'),(241,'کاپرا',100,'','personal','active','body'),(242,'کادیلاک',100,'','personal','active','body'),(243,'کرایسلر',100,'','personal','active','body'),(244,'کیا',5,'','personal','active','body'),(245,'گریت وال',100,'','personal','active','body'),(246,'لامبورگینی',100,'','personal','active','body'),(247,'لکسوس',15,'','personal','active','body'),(248,'لندرور',100,'','personal','active','body'),(249,'لندمارک',100,'','personal','active','body'),(250,'لوبو',100,'','personal','active','body'),(251,'لوتوس',100,'','personal','active','body'),(252,'لیفان',19,'','personal,taxiin,taxiout,agancy','active','body'),(253,'مازراتی',100,'','personal','active','body'),(254,'مزدا',10,'','personal','active','body'),(255,'مک لارن',100,'','personal','active','body'),(256,'میتسوبیشی',100,'','personal','active','body'),(257,'مینی ماینر',100,'','personal','active','body'),(258,'نیسان',17,'','personal','active','body'),(259,'هامر',100,'','personal','active','body'),(260,'هایما',100,'','personal','active','body'),(261,'هوندا',13,'','personal','active','body'),(262,'هیوندای',7,'','personal,taxiin,taxiout,agancy','active','body'),(263,'وانت',100,'','personal','active','body'),(264,'ولوو',100,'','personal','active','body'),(265,'ون',100,'','personal','active','body'),(266,'آمیکو',0,'','motor','active','body'),(267,'آپاچی',0,'','motor','active','body'),(268,'آپرلیا',0,'','motor','active','body'),(269,'آی تک',0,'','motor','active','body'),(270,'ام وی آگوستا',0,'','motor','active','body'),(271,'انرژی موتور',0,'','motor','active','body'),(272,'ایران دوچرخ',0,'','motor','active','body'),(273,'ب ام و',0,'','motor','active','body'),(274,'بنلی',0,'','motor','active','body'),(275,'باجاج',0,'','motor','active','body'),(276,'تلاش',0,'','motor','active','body'),(277,'تکتاز موتور',0,'','motor','active','body'),(278,'تی جی بی',0,'','motor','active','body'),(279,'تی وی اس',0,'','motor','active','body'),(280,'ثاقب خودرو',0,'','motor','active','body'),(281,'جهان همتا سیکلت',0,'','motor','active','body'),(282,'دایلیم',0,'','motor','active','body'),(283,'دربی',0,'','motor','active','body'),(284,'دوکاتی',0,'','motor','active','body'),(285,'روان سیکلت',0,'','motor','active','body'),(286,'رگال رپتور',0,'','motor','active','body'),(287,'زیگما',0,'','motor','active','body'),(288,'سابین موتور',0,'','motor','active','body'),(289,'سالار گستر آسیا',0,'','motor','active','body'),(290,'سوزوکی',0,'','motor','active','body'),(291,'شاهین موتور',0,'','motor','active','body'),(292,'شهاب',0,'','motor','active','body'),(293,'متین خودرو',0,'','motor','active','body'),(294,'موتور هیسپانیا',0,'','motor','active','body'),(295,'مگلی',0,'','motor','active','body'),(296,'نیرو محرکه',0,'','motor','active','body'),(297,'همتا سیکلت',0,'','motor','active','body'),(298,'هوندا',0,'','motor','active','body'),(299,'هیلدا',0,'','motor','active','body'),(300,'هیوسانگ',0,'','motor','active','body'),(301,'وسپا',0,'','motor','active','body'),(302,'پاسارگاد سیکلت فارس',0,'','motor','active','body'),(303,'پیاجیو',0,'','motor','active','body'),(304,'پیشتاز موتور توس',0,'','motor','active','body'),(305,'پیشرو',0,'','motor','active','body'),(306,'کاوازاکی',0,'','motor','active','body'),(307,'کبیر',0,'','motor','active','body'),(308,'کثیر',0,'','motor','active','body'),(309,'کویر موتور',0,'','motor','active','body'),(310,'کی تی ام',0,'','motor','active','body'),(311,'کیان',0,'','motor','active','body'),(312,'تا یک تن',0,'','truck_1','active','body'),(313,'یک تن تا سه تن',0,'','truck_3','active','body'),(314,'سه تن تا پنج تن',0,'','truck_5','active','body'),(315,'پنج تن تا ده تن',0,'','truck_10','active','body'),(316,'ده تن تا بیست تن',0,'','truck_20','active','body'),(317,'بیش از بیست تن',0,'','truck_more_than_20','active','body'),(318,'پراید',1,'','personal,taxiin,taxiout,agancy','active','body'),(319,'یوتانگ',0,'','autocar','active','body'),(320,'آرتا',0,'','autocar','active','body'),(321,'دی اف ام',0,'','autocar','active','body'),(322,'فوتون',0,'','autocar','active','body'),(323,'تفتان',0,'','autocar','active','body'),(324,'وانا',0,'','autocar','active','body'),(325,'کاروان',0,'','autocar','active','body'),(326,'آریا',0,'','autocar','active','body'),(327,'برلیانس',0,'','autocar','active','body'),(328,'آرین',0,'','autocar','active','body'),(329,'ایران خودکفا',0,'','autocar','active','body'),(330,'مکسوس',0,'','autocar','active','body'),(331,'ایران خودرو',0,'','autocar','active','body'),(332,'آرگو',0,'','autocar','active','body'),(333,'آتکایی',0,'','autocar','active','body'),(334,'یاتونگ',0,'','autocar','active','body'),(335,'هیوندای',0,'','autocar','active','body'),(336,'هایگر',0,'','autocar','active','body'),(337,'ولوو',0,'','autocar','active','body'),(338,'نیسان',0,'','autocar','active','body'),(339,'نارون',0,'','autocar','active','body'),(340,'میتسوبیشی',0,'','autocar','active','body'),(341,'مهسان',0,'','autocar','active','body'),(342,'مزدا',0,'','autocar','active','body'),(343,'مان',0,'','autocar','active','body'),(344,'ماگروس',0,'','autocar','active','body'),(345,'مارال',0,'','autocar','active','body'),(346,'لیلانو',0,'','autocar','active','body'),(347,'کینگ دانگ',0,'','autocar','active','body'),(348,'کاسپین',0,'','autocar','active','body'),(349,'فیات',0,'','autocar','active','body'),(350,'کارسان',0,'','autocar','active','body'),(351,'فولکس واگن',0,'','autocar','active','body'),(352,'فاو',0,'','autocar','active','body'),(353,'فورد',0,'','autocar','active','body'),(354,'عقاب',0,'','autocar','active','body'),(355,'شهاب',0,'','autocar','active','body'),(356,'شورولت',0,'','autocar','active','body'),(357,'سیترا',0,'','autocar','active','body'),(358,'سوبول',0,'','autocar','active','body'),(359,'سحر',0,'','autocar','active','body'),(360,'سپهر',0,'','autocar','active','body'),(361,'دانگ تانگ',0,'','autocar','active','body'),(362,'رهرو',0,'','autocar','active','body'),(363,'رهپو',0,'','autocar','active','body'),(364,'رنو',0,'','autocar','active','body'),(365,'دلیکا',0,'','autocar','active','body'),(366,'دانگ فنگ',0,'','autocar','active','body'),(367,'داف',0,'','autocar','active','body'),(368,'جین بی',0,'','autocar','active','body'),(369,'جویلونگ',0,'','autocar','active','body'),(370,'جک',0,'','autocar','active','body'),(371,'تویوتا',0,'','autocar','active','body'),(372,'پیشرو',0,'','autocar','active','body'),(373,'بنز',0,'','autocar','active','body'),(374,'آکیا',0,'','autocar','active','body'),(375,'ایکاروس',0,'','autocar','active','body'),(376,'ایسوزو',0,'','autocar','active','body'),(377,'اسیتانا',0,'','autocar','active','body'),(378,'اویکو',0,'','autocar','active','body'),(379,'اسکانیا',0,'','autocar','active','body'),(380,'پژو',1,'','personal,taxiin,taxiout,agancy','active','body'),(381,'اتوبوس با ظرفیت ۴۴ نفر با راننده و کمک',0,'','autocar_bus_44seat','active','thirdparty');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `type` enum('bank','credit') COLLATE utf8_persian_ci NOT NULL,
  `card_number` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `card_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `card_user_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `card_pass` varchar(512) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `deleted` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `send_to_psp` int(1) NOT NULL,
  `per` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id`, `user_key`, `type`, `card_number`, `card_name`, `card_user_name`, `card_pass`, `status`, `deleted`, `date`, `send_to_psp`, `per`) VALUES (1,'9bbee63d358daae0ed7fb057feb5439f','bank','6037697522030953','صادرات','','','active',0,'2020-02-15 23:28:04',0,'603769');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `to_user_id` int(20) DEFAULT NULL,
  `chat_message` text COLLATE utf8_persian_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_persian_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `state`, `name`, `deleted`) VALUES (1,1,'آذرشهر',0),(2,1,'اسکو',0),(3,1,'اهر',0),(4,1,'بستان آباد',0),(5,1,'بناب',0),(6,1,'تبریز',0),(7,1,'جلفا',0),(8,1,'چاراویماق',0),(9,1,'سراب',0),(10,1,'شبستر',0),(11,1,'عجب شیر',0),(12,1,'کلیبر',0),(13,1,'خدا آفرین',0),(14,1,'مراغه',0),(15,1,'مرند',0),(16,1,'ملکان',0),(17,1,'میانه',0),(18,1,'ورزقان',0),(19,1,'هریس',0),(20,1,'هشترود',0),(21,2,'ارومیه',0),(22,2,'اشنویه',0),(23,2,'بوکان',0),(24,2,'پیرانشهر',0),(25,2,'تکاب',0),(26,2,'چالدران',0),(27,2,'خوی',0),(28,2,'چایپاره',0),(29,2,'سردشت',0),(30,2,'سلماس',0),(31,2,'شاهین دژ',0),(32,2,'ماکو',0),(33,2,'پلدشت',0),(34,2,'شوط',0),(35,2,'مهاباد',0),(36,2,'میاندوآب',0),(37,2,'نقده',0),(38,3,'اردبیل',0),(39,3,'سرعین',0),(40,3,'بیله سوار',0),(41,3,'پارس آباد',0),(42,3,'خلخال',0),(43,3,'کوثر',0),(44,3,'گرمی',0),(45,3,'مشگین شهر',0),(46,3,'نمین',0),(47,3,'نیر ',0),(48,4,'آران و بیدگل',0),(49,4,'اردستان',0),(50,4,'اصفهان',0),(51,4,'شاهین شهرو میمه',0),(52,4,'برخوار',0),(53,4,'تیران و کرون',0),(54,4,'چادگان',0),(55,4,'خمینی شهر',0),(56,4,'خوانسار',0),(57,4,'سمیرم',0),(58,4,'شهرضا',0),(59,4,'دهاقان',0),(60,4,'فریدن',0),(61,4,'بوئین ماندشت',0),(62,4,'فریدونشهر',0),(63,4,'فلاورجان',0),(64,4,'کاشان',0),(65,4,'گلپایگان',0),(66,4,'لنجان',0),(67,4,'مبارکه',0),(68,4,'نائین',0),(69,4,'خور و بیابانک',0),(70,4,'نجف آباد',0),(71,4,'نطنز',0),(72,5,'کرج',0),(73,5,'فردیس',0),(74,5,'اشتهارد',0),(75,5,'ساوجبلاغ',0),(76,5,'طالقان',0),(77,5,'نظرآباد',0),(78,6,'آبدانان',0),(79,6,'ایلام',0),(80,6,'ایوان',0),(81,6,'دره شهر',0),(82,6,'بدره',0),(83,6,'دهلران',0),(84,6,'چرداول',0),(85,6,'سیروان',0),(86,6,'مهران',0),(87,6,'ملکشاهی',0),(88,7,'بوشهر',0),(89,7,'تنگستان',0),(90,7,'جم',0),(91,7,'دشتستان',0),(92,7,'دشتی',0),(93,7,'دیر	دیلم',0),(94,7,'کنگان',0),(95,7,'عسلویه',0),(96,7,'گناوه',0),(97,8,'اسلامشهر',0),(98,8,'پاکدشت',0),(99,8,'تهران',0),(100,8,'پردیس',0),(101,8,'دماوند',0),(102,8,'رباط کریم',0),(103,8,'بهارستان',0),(104,8,'ری  ',0),(105,8,'شمیرانات',0),(106,8,'شهریار',0),(107,8,'ملارد',0),(108,8,'قدس',0),(109,8,'فیروزکوه',0),(110,8,'ورامین',0),(111,8,'قرچک',0),(112,8,'پیشوا',0),(113,9,'اردل',0),(114,9,'بروجن',0),(115,9,'شهرکرد',0),(116,9,'بن',0),(117,9,'سامان',0),(118,9,'کیار',0),(119,9,'فارسان',0),(120,9,'کوهرنگ',0),(121,9,'لردگان',0),(122,10,'بیرجند',0),(123,10,'خوسف',0),(124,10,'درمیان',0),(125,10,'سربیشه',0),(126,10,'نهبندان',0),(127,10,'قائنات',0),(128,10,'زیرکوه',0),(129,10,'سرایان',0),(130,10,'فردوس',0),(131,10,'بشرویه',0),(132,10,'طبس',0),(133,11,'بردسکن',0),(134,11,'فیروز',0),(135,11,'تایباد',0),(136,11,'باخرز',0),(137,11,'تربت جام',0),(138,11,'تربت حیدریه',0),(139,11,'زاوه',0),(140,11,'مه ولایت',0),(141,11,'چناران',0),(142,11,'خواف',0),(143,11,'درگز',0),(144,11,'رشتخوار',0),(145,11,'سبزوار',0),(146,11,'داورزن',0),(147,11,'خوشاب',0),(148,11,'جغتای',0),(149,11,'جوین',0),(150,11,'سرخس',0),(151,11,'فریمان',0),(152,11,'قوچان',0),(153,11,'کاشمر',0),(154,11,'خلیل آباد',0),(155,11,'گناباد',0),(156,11,'بجستان',0),(157,11,'مشهد',0),(158,11,'بینالود',0),(159,11,'کلات',0),(160,11,'نیشابور',0),(161,12,'گرمه',0),(162,12,'شیروان',0),(163,12,'مانه و سملقان',0),(164,12,'اسفراین',0),(165,12,'بجنورد',0),(166,12,'راز و جرگلان',0),(167,12,'جاجرم',0),(168,12,'فاروج',0),(169,13,'آبادان',0),(170,13,'امیدیه',0),(171,13,'اندیمشک',0),(172,13,'اهواز',0),(173,13,'کارون',0),(174,13,'حمیدیه',0),(175,13,'باوه',0),(176,13,'ایذه',0),(177,13,'باغملک',0),(178,13,'بهبهان',0),(179,13,'آغاجاری',0),(180,13,'بندرماهشهر',0),(181,13,'خرمشهر',0),(182,13,'دزفول',0),(183,13,'دشت آزادگان',0),(184,13,'هویزه',0),(185,13,'رامهرمز',0),(186,13,'هفتگل',0),(187,13,'رامشیر',0),(188,13,'شادگان',0),(189,13,'شوش',0),(190,13,'شوشتر',0),(191,13,'گتوند',0),(192,13,'مسجدسلیمان',0),(193,13,'اندیکا',0),(194,13,'لالی',0),(195,13,'هندیجان',0),(196,14,'ابهر',0),(197,14,'سلطانیه',0),(198,14,'ایجرود',0),(199,14,'خدابنده',0),(200,14,'خرمدره',0),(201,14,'زنجان',0),(202,14,'طارم',0),(203,14,'ماهنشان',0),(204,15,'دامغان',0),(205,15,'سمنان',0),(206,15,'سرخه',0),(207,15,'مهدی شهر',0),(208,15,'شاهرود',0),(209,15,'بسطام',0),(210,15,'میامی',0),(211,15,'گرمسار',0),(212,15,'آرادان',0),(213,16,'ایرانشهر',0),(214,16,'دلگان',0),(215,16,'چاه بهار	',0),(216,16,'کنارک',0),(217,16,'خاش',0),(218,16,'زابل',0),(219,16,'نیمروز',0),(220,16,'هامون',0),(221,16,'هیرمند',0),(222,16,'زهک',0),(223,16,'زاهدان',0),(224,16,'میرجاوه',0),(225,16,'سراوان',0),(226,16,'سیب سوران',0),(227,16,'مهرستان',0),(228,16,'سرباز',0),(229,16,'نیک شهر',0),(230,16,'فنوج',0),(231,16,'قصرقند',0),(232,17,'آباده',0),(233,17,'نی ریز',0),(234,17,'ارسنجان',0),(235,17,'استهبان',0),(236,17,'اقلید',0),(237,17,'بوانات',0),(238,17,'جهرم',0),(239,17,'خرم بید',0),(240,17,'داراب',0),(241,17,'زرین دشت',0),(242,17,'سپیدان',0),(243,17,'شیراز',0),(244,17,'خرامه',0),(245,17,'کوار',0),(246,17,'سروستان',0),(247,17,'فراشبند',0),(248,17,'فسا',0),(249,17,'فیروزآباد',0),(250,17,'قیروکارزین',0),(251,17,'کازرون',0),(252,17,'لارستان',0),(253,17,'گراش',0),(254,17,'خنج',0),(255,17,'لامرد',0),(256,17,'مهر',0),(257,17,'مرودشت',0),(258,17,'پاسارگاد',0),(259,17,'ممسنی',0),(260,17,'رستم',0),(261,18,'آبیک',0),(262,18,'بوئین زهرا',0),(263,18,'آوج',0),(264,18,'تاکستان',0),(265,18,'قزوین',0),(266,18,'البرز',0),(267,19,'قم',0),(268,20,'بانه',0),(269,20,'بیجار',0),(270,20,'دیواندره',0),(271,20,'سروآباد',0),(272,20,'سقز',0),(273,20,'سنندج',0),(274,20,'قروه',0),(275,20,'دهگلان',0),(276,20,'کامیاران',0),(277,20,'مریوان',0),(278,21,'بافت',0),(279,21,'ارزوئیه',0),(280,21,'رابر',0),(281,21,'بردسیر',0),(282,21,'بم',0),(283,21,'نرمانشیر',0),(284,21,'فهرج',0),(285,21,'ریگان',0),(286,21,'جیرفت',0),(287,21,'رفسنجان',0),(288,21,'انار',0),(289,21,'راور',0),(290,21,'زرند',0),(291,21,'کوهبنان',0),(292,21,'سیرجان',0),(293,21,'شهربابک',0),(294,21,'عنبرآباد',0),(295,21,'کرمان',0),(296,21,'کهنوج',0),(297,21,'فاریاب',0),(298,21,'رودبارجنوب',0),(299,21,'قلعه گنج',0),(300,21,'منوجان',0),(301,22,'اسلام آباد غرب',0),(302,22,'دالاهو',0),(303,22,'پاوه',0),(304,22,'ثلاث باباجانی',0),(305,22,'جوانرود',0),(306,22,'روانسر',0),(307,22,'سرپل ذهاب',0),(308,22,'سنقر',0),(309,22,'صحنه',0),(310,22,'قصرشیرین',0),(311,22,'کرمانشاه',0),(312,22,'کنگاور',0),(313,22,'گیلانغرب',0),(314,22,'هرسین',0),(315,23,'دنا',0),(316,23,'بویراحمد',0),(317,23,'کهگیلویه',0),(318,23,'لنده',0),(319,23,'چرام',0),(320,23,'بهمئی',0),(321,23,'گچساران',0),(322,23,'باشت',0),(323,24,'آزادشهر',0),(324,24,'آق قلا',0),(325,24,'بندرگز',0),(326,24,'ترکمن',0),(327,24,'گمیشان',0),(328,24,'رامیان',0),(329,24,'علی آباد',0),(330,24,'کردکوی',0),(331,24,'کلاله',0),(332,24,'مراوه تپه',0),(333,24,'گرگان',0),(334,24,'گنبدکاووس',0),(335,24,'مینودشت',0),(336,24,'گالیکش',0),(337,25,'آستارا',0),(338,25,'آستانه',0),(339,25,'اشرفیه',0),(340,25,'املش',0),(341,25,'بندرانزلی',0),(342,25,'رشت',0),(343,25,'رضوانشهر',0),(344,25,'رودبار',0),(345,25,'رودسر',0),(346,25,'سیاهکل',0),(347,25,'شفت',0),(348,25,'صومعه سرا',0),(349,25,'فومن',0),(350,25,'طوالش',0),(351,25,'لنگرود',0),(352,25,'لاهیجان',0),(353,25,'ماسال',0),(354,26,'ازنا',0),(355,26,'الیگودرز',0),(356,26,'بروجرد',0),(357,26,'پلدختر',0),(358,26,'خرم آباد',0),(359,26,'دوره',0),(360,26,'دورود',0),(361,26,'دلفان',0),(362,26,'سلسله',0),(363,26,'کوهدشت',0),(364,26,'رومشکان',0),(365,27,'آمل',0),(366,27,'بابل',0),(367,27,'بابلسر',0),(368,27,'فریدونکنار',0),(369,27,'بهشهر',0),(370,27,'گلوگاه',0),(371,27,'تنکابن',0),(372,27,'عباس آباد',0),(373,27,'جویبار',0),(374,27,'چالوس',0),(375,27,'کلاردشت',0),(376,27,'رامسر',0),(377,27,'ساری',0),(378,27,'میاندورود',0),(379,27,'سوادکوه',0),(380,27,'سوادکوه شمالی',0),(381,27,'قائم شهر',0),(382,27,'سیمرغ',0),(383,27,'محمود آباد',0),(384,27,'نکا',0),(385,27,'نور',0),(386,27,'نوشهر',0),(387,28,'آشتیان',0),(388,28,'اراک',0),(389,28,'خنداب',0),(390,28,'تفرش',0),(391,28,'فراهان',0),(392,28,'خمین',0),(393,28,'دلیجان',0),(394,28,'زرندیه',0),(395,28,'ساوه',0),(396,28,'شازند',0),(397,28,'کمیجان',0),(398,28,'محلات',0),(399,29,'ابوموسی',0),(400,29,'میناب',0),(401,29,'بندرعباس',0),(402,29,'سیریک',0),(403,29,'خمیر',0),(404,29,'بستک',0),(405,29,'بندرلنگه',0),(406,29,'پارسیان',0),(407,29,'جاسک',0),(408,29,'بشاگرد',0),(409,29,'حاجی آباد',0),(410,29,'رودان',0),(411,29,'قشم',0),(412,30,'اسدآباد',0),(413,30,'بهار',0),(414,30,'تویسرکان',0),(415,30,'رزن',0),(416,30,'کبودرآهنگ',0),(417,30,'ملایر',0),(418,30,'نهاوند',0),(419,30,'همدان',0),(420,30,'فامنین',0),(421,31,'ابرکوه',0),(422,31,'اردکان',0),(423,31,'بافق',0),(424,31,'بهاباد',0),(425,31,'تفت',0),(426,31,'خاتم',0),(427,31,'اشکذر',0),(428,31,'مهریز',0),(429,31,'میبد',0),(430,31,'یزد',0);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `en_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `emtiaz` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `tavangari` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `pasokh` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `rezayat` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `khesarat` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `market` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `sayar` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `active` enum('active','deactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `sort` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `name`, `en_name`, `logo`, `emtiaz`, `tavangari`, `pasokh`, `rezayat`, `khesarat`, `market`, `sayar`, `active`, `sort`, `deleted`) VALUES (1,'ایران','iran','/upload/images/company/iran.png','5','5','75','3','63','43','دارد','active',2,0),(2,'رازی','razi','/upload/images/company/razi.png','1','4','33','4','50','3','ندارد','active',5,1),(3,'البرز','alborz','/upload/images/company/alborz.png','1','4','9','12','42','4','دارد','active',4,1),(4,'آسیا','asia','/upload/images/company/asia.png','2','4','21','1','74','11','ندارد','active',3,1),(5,'پارسیان','parsian','/upload/images/company/parsian.png','1','4','23','7','41','5','دارد','active',0,0),(6,'پاسارگاد','pasargad','/upload/images/company/pasrgad.png','1','5','12','24','90','25','دارد','active',1,0),(7,'دانا','dana','/upload/images/company/dana.png','2','4','20','2','73','7.8','دارد','active',0,0),(8,'ملت','mellat','/upload/images/company/melat.png','3','4','20','7','23','7.8','ندارد','active',0,0),(9,'کارآفرین','karafarin','/upload/images/company/karafrin.png','5','4','20','6','60','2.9','ندارد','active',0,1),(10,'سینا','sina','/upload/images/company/sina.png','10','4','25','10','36','1.9','ندارد','active',0,0),(11,'دی','dey','/upload/images/company/dey.png','10','4','25','13','36','4.1','ندارد','active',0,0),(12,'نوین','novin','/upload/images/company/novin.png','11','4','25','11','36','1.3','ندارد','active',0,0),(13,'ما','ma','/upload/images/company/ma.png','18','4','25','18','36','1.3','ندارد','active',0,0),(14,'سرمد','sarmad','/upload/images/company/sarmad.png','17','4','25','17','36','0.7','ندارد','active',0,0),(15,'میهن','mihan','/upload/images/company/mihan.png','14','4','25','14','36','0.5','ندارد','active',0,0),(16,'کوثر','kosar','/upload/images/company/kosar.png','14','4','25','14','36','3.6','ندارد','active',0,0),(17,'آرمان','arman','/upload/images/company/arman.png','19','4','25','19','36','0.8','ندارد','active',0,0),(18,'تجارت نو','tejarat','/upload/images/company/tejarat.png','19','4','25','19','36','0.2','ندارد','active',0,0),(19,'حکمت','hekmat','/upload/images/company/hekmat.png','19','4','25','19','36','0.2','ندارد','active',0,0),(20,'تعاون','taavon','/upload/images/company/taavon.png','18','4','25','18','36','1.3','ندارد','active',0,0);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `name_family` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `subject` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `message` varchar(600) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_articles`
--

DROP TABLE IF EXISTS `help_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `total_views` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `yt_thumb` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `article_slug` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_articles`
--

LOCK TABLES `help_articles` WRITE;
/*!40000 ALTER TABLE `help_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `help_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_categories`
--

DROP TABLE IF EXISTS `help_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `type` enum('help','knowledge_base') COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_categories`
--

LOCK TABLES `help_categories` WRITE;
/*!40000 ALTER TABLE `help_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `help_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `pic` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `site_link` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `tax` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `wage` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `issuance` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_persian_ci NOT NULL,
  `mainsub` varchar(10) COLLATE utf8_persian_ci NOT NULL DEFAULT 'اصلی',
  `tab_message` text COLLATE utf8_persian_ci NOT NULL,
  `off_code` varchar(2) COLLATE utf8_persian_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` (`id`, `name`, `status`, `pic`, `site_link`, `sort`, `tax`, `wage`, `issuance`, `deleted`, `message`, `mainsub`, `tab_message`, `off_code`) VALUES (5,'پزشک عمومی','1','/moderator/files/profile_images/_file5e6915cb0a72c-avatar.png','doctor',1,'','','',0,'','اصلی','','1'),(6,'دندانپزشک','1','/moderator/files/profile_images/_file5e6915de0beb6-avatar.png','dentist',2,'','','',0,'','اصلی','','1'),(7,'چشم پزشک','1','/moderator/files/profile_images/_file5e6915f81e2ba-avatar.png','optometrist',3,'','','',0,'','اصلی','','1'),(8,'جراح عمومی','1','/moderator/files/profile_images/_file5e69160989a41-avatar.png','general_surgeon',4,'','','',0,'','اصلی','','1'),(9,'گوش پزشک','1','/moderator/files/profile_images/_file5e69164dd1174-avatar.png','ear_doctor',5,'','','',0,'','اصلی','','1'),(10,'متخصص قلب','1','/moderator/files/profile_images/_file5e6916fd90f1d-avatar.png','heart_specialist',6,'','','',0,'','اصلی','','1');
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_archive`
--

DROP TABLE IF EXISTS `insurance_archive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `create_date` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_archive`
--

LOCK TABLES `insurance_archive` WRITE;
/*!40000 ALTER TABLE `insurance_archive` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_archive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_cover`
--

DROP TABLE IF EXISTS `insurance_cover`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_insure_id` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `insurance_cover` varchar(64) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `type` enum('percentage','cash') COLLATE utf8_persian_ci NOT NULL,
  `deleted` varchar(2) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_cover`
--

LOCK TABLES `insurance_cover` WRITE;
/*!40000 ALTER TABLE `insurance_cover` DISABLE KEYS */;
INSERT INTO `insurance_cover` (`id`, `agent_insure_id`, `company`, `insurance_cover`, `value`, `type`, `deleted`) VALUES (2,'body','','سیل و زلزله','5','percentage','1'),(3,'body','','نوسان قیمت','10','percentage','0'),(4,'body','','سرقت درجا قطعات','10','percentage','0'),(5,'body','','حذف فرانشیز','20','percentage','0'),(6,'body','','تزانزیت','50','percentage','0'),(7,'body','','ایاب و ذهاب','15000','cash','0'),(8,'fire','','سرقت با شکست حرز','5','cash','0'),(9,'fire','','ترکیدگی لوله','0.15','percentage','0'),(10,'fire','','نشست و رانش زمین','0.5','percentage','0'),(11,'fire','','زلزله','0.2','percentage','0'),(12,'fire','','ضایعات ناشی از آب باران و برف','0.15','percentage','0'),(13,'fire','','سیل و طغیان آب','0.15','percentage','0'),(14,'fire','','طوفان و گردباد','0.1','percentage','0'),(15,'fire','','سقوط هواپیما تا 5 کیلومتری فرودگاه','0.07','percentage','0'),(16,'fire','','سقوط بهمن','0.3','percentage','0'),(17,'fire','','ریزش سقف در اثر سنگینی برف','0.05','percentage','0'),(21,'body','','شکست شیشه','5','percentage','0'),(22,'fire','','هزینه پاکسازی','0.34','percentage','0'),(23,'fire','','مسیولیت مالی ناشی از خطرات آتش سوزی در قبال همسایگان','0.09','percentage','1'),(24,'fire','','برخورد جسم خارجی','0.01','percentage','0'),(25,'fire','','سقوط هواپیما دور از فرودگاه','0.03','percentage','0'),(26,'life','','فوت براساس حادثه','2','percentage','0'),(27,'life','','نقض عضو براساس حادثه','3','percentage','0'),(28,'life','','هزینه پزشکی براساس حادثه','2.5','percentage','0'),(29,'life','','غرامت امراض خاص','3.1','percentage','0'),(30,'life','','معافیت از پرداخت حق بیمه','1.2','percentage','0'),(31,'life','','از کار افتادگی کامل','1.2','percentage','0');
/*!40000 ALTER TABLE `insurance_cover` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_document`
--

DROP TABLE IF EXISTS `insurance_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `insurance` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `element_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `priority` int(2) NOT NULL,
  `dependent` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `default` int(5) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_document`
--

LOCK TABLES `insurance_document` WRITE;
/*!40000 ALTER TABLE `insurance_document` DISABLE KEYS */;
INSERT INTO `insurance_document` (`id`, `type`, `insurance`, `name`, `element_name`, `size`, `priority`, `dependent`, `default`, `deleted`) VALUES (1,'image','thirdparty','تصویر روی کارت وسیله نقلیه','PictureOnVehicle','2',1,'1',1,0),(2,'image','thirdparty','تصویر پشت کارت وسیله نقلیه','PictureBackVehicle','2',2,'1',1,0),(3,'image','thirdparty','تصویر بیمه نامه قبلی','PreviousInsurancePicture','2',3,'1',1,0),(4,'image','thirdparty','تصویر کارت ملی','NationalImage','2',4,'1',0,0),(5,'text','thirdparty','کد ملی','NationalCode','8',5,'1',1,0),(6,'datepicker','thirdparty','تاریخ تولد بیمه گذار','DateBirth','8',6,'1',1,0),(7,'select','thirdparty','جنسیت','Gender','8',7,'1',1,0),(8,'image','thirdparty','تصویر روی کارت وسیله نقلیه','PictureOnVehicle','2',1,'2',1,0),(9,'image','thirdparty','تصویر پشت کارت وسیله نقلیه','PictureBackVehicle','2',2,'2',1,0),(10,'image','thirdparty','تصویر بیمه نامه قبلی','PreviousInsurancePicture','2',3,'2',1,0),(11,'image','thirdparty','تصویر کارت ملی','NationalImage','2',4,'2',0,0),(12,'text','thirdparty','کد ملی','NationalCode','8',6,'2',1,0),(13,'datepicker','thirdparty','تاریخ تولد بیمه گذار','DateBirth','8',7,'2',1,0),(14,'select','thirdparty','جنسیت','Gender','8',8,'2',1,0),(15,'image','thirdparty','تصویر چک صیادی','SayadiPic','2',5,'2',1,0),(16,'comment','thirdparty','توضیحات','CommentThirdparty','8',9,'2',1,0);
/*!40000 ALTER TABLE `insurance_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_document_val`
--

DROP TABLE IF EXISTS `insurance_document_val`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_document_val` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `id_val` int(10) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_document_val`
--

LOCK TABLES `insurance_document_val` WRITE;
/*!40000 ALTER TABLE `insurance_document_val` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_document_val` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_off`
--

DROP TABLE IF EXISTS `insurance_off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_insure_id` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `insurance_off` varchar(64) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `type` enum('percentage','cash') COLLATE utf8_persian_ci NOT NULL,
  `deleted` varchar(2) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `display` enum('yes','no') COLLATE utf8_persian_ci NOT NULL,
  `backend` enum('yes','no') COLLATE utf8_persian_ci NOT NULL DEFAULT 'no',
  `sort` int(5) NOT NULL,
  `group` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `first_price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `final_price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_off`
--

LOCK TABLES `insurance_off` WRITE;
/*!40000 ALTER TABLE `insurance_off` DISABLE KEYS */;
INSERT INTO `insurance_off` (`id`, `agent_insure_id`, `insurance_off`, `value`, `type`, `deleted`, `display`, `backend`, `sort`, `group`, `first_price`, `final_price`, `company`) VALUES (1,'body','توافقی','40','percentage','0','no','yes',2,'agreed','','','dana'),(2,'body','کارمندی','0','percentage','0','no','yes',0,'employee','','','dana'),(3,'body','هیات علمی','0','percentage','0','no','yes',0,'faculty','','','dana'),(4,'body','نمایندگی','0','percentage','0','no','yes',0,'representation','','','dana'),(5,'body','تخفیف صفر کیلومتر','30','percentage','0','yes','no',3,'zero','','','dana'),(6,'body','نقدی','10','percentage','0','yes','yes',5,'cash','','','dana'),(7,'body','تخفیف ارزش خودرو 10 تا 18 میلیون','5','percentage','0','no','yes',4,'cost','10000000','18000000','dana'),(8,'body','تخفیف ارزش خودرو 18 تا 25 میلیون','8','percentage','0','no','yes',4,'cost','18000000','25000000','dana'),(9,'body','تخفیف ارزش خودرو 25 تا 35 میلیون','11','percentage','0','no','yes',4,'cost','25000000','35000000','dana'),(10,'body','تخفیف ارزش خودرو 35 تا 50 میلیون','14','percentage','0','no','yes',4,'cost','35000000','50000000','dana'),(11,'body','تخفیف ارزش خودرو 50 تا 75 میلیون','17','percentage','0','no','yes',4,'cost','50000000','75000000','dana'),(12,'body','تخفیف ارزش خودرو 75 تا 100 میلیون','20','percentage','0','no','yes',4,'cost','75000000','100000000','dana'),(13,'body','تخفیف ارزش خودرو 100 تا 200 میلیون','25','percentage','0','no','yes',4,'cost','100000000','200000000','dana'),(14,'body','تخفیف ارزش خودرو 200 تا 500 میلیون','30','percentage','0','no','yes',4,'cost','200000000','500000000','dana'),(15,'body','تخفیف ارزش خودرو بالای 500 میلیون','35','percentage','0','no','yes',4,'cost','500000000','5000000000','dana'),(16,'thirdparty','بیمه عمر','2.5','percentage','0','yes','no',0,'','','','pasargad'),(17,'body','تاسیس بیمه ایران','15','percentage','0','no','yes',1,'','','','iran'),(18,'body','نقدی','10','percentage','0','no','yes',1,'','','','iran'),(19,'body','ویژه خودروهای سواری','0','percentage','0','no','yes',1,'','','','iran');
/*!40000 ALTER TABLE `insurance_off` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_parameter_price`
--

DROP TABLE IF EXISTS `insurance_parameter_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_parameter_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter_val` text COLLATE utf8_persian_ci NOT NULL,
  `company` text COLLATE utf8_persian_ci NOT NULL,
  `insurance` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `per_value` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `type_value` enum('cash','percentage','formula') COLLATE utf8_persian_ci NOT NULL,
  `priority` int(10) NOT NULL,
  `group` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_parameter_price`
--

LOCK TABLES `insurance_parameter_price` WRITE;
/*!40000 ALTER TABLE `insurance_parameter_price` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_parameter_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_parameter_val`
--

DROP TABLE IF EXISTS `insurance_parameter_val`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_parameter_val` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `orderby` tinyint(2) NOT NULL,
  `id_val` int(5) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `insurance_parameter` varchar(10) NOT NULL,
  `insurance` varchar(100) NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_parameter_val`
--

LOCK TABLES `insurance_parameter_val` WRITE;
/*!40000 ALTER TABLE `insurance_parameter_val` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_parameter_val` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_payment`
--

DROP TABLE IF EXISTS `insurance_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_payment`
--

LOCK TABLES `insurance_payment` WRITE;
/*!40000 ALTER TABLE `insurance_payment` DISABLE KEYS */;
INSERT INTO `insurance_payment` (`id`, `insurance`, `company`, `deleted`, `title`) VALUES (1,'thirdparty','dana','0','سفارش نقدی'),(2,'thirdparty','dana','0','مهر دانا'),(3,'thirdparty','dana','0','دیجی قسطی'),(4,'thirdparty','iran','0','دیجی قسطی'),(5,'thirdpaty','iran','0','دیجی');
/*!40000 ALTER TABLE `insurance_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_price`
--

DROP TABLE IF EXISTS `insurance_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_price` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `poshesh` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `insur_type` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `off` varchar(12) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `fixed_premium` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `surplus_price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `driver_accidents` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `age` varchar(20) COLLATE utf8_persian_ci NOT NULL DEFAULT '0@0',
  `delay` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_price`
--

LOCK TABLES `insurance_price` WRITE;
/*!40000 ALTER TABLE `insurance_price` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_type`
--

DROP TABLE IF EXISTS `insurance_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `english_type` varchar(32) COLLATE utf8_persian_ci NOT NULL,
  `InOut` enum('داخلی','وارداتی','فلزی','بتنی','آجری') COLLATE utf8_persian_ci NOT NULL,
  `agent_insure_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_type`
--

LOCK TABLES `insurance_type` WRITE;
/*!40000 ALTER TABLE `insurance_type` DISABLE KEYS */;
INSERT INTO `insurance_type` (`id`, `type`, `english_type`, `InOut`, `agent_insure_id`, `deleted`) VALUES (1,'سواری شخصی کمتر از 4 سیلندر','less_than_4_cylinders','داخلی','thirdparty',0),(2,'سواری شخصی پراید , پیکان , سپند','pride','داخلی','thirdparty',0),(3,'سواری شخصی 4 سیلندر','4-cylinder','داخلی','thirdparty',0),(4,'سواری شخصی 4 سیلندر به بالا','more_than_4_cylinders','داخلی','thirdparty',0),(5,'بارکش تا یک تن','truck_1','داخلی','thirdparty',0),(6,'بارکش یک تا سه تن','truck_3','داخلی','thirdparty',0),(7,'بارکش سه تا پنج تن','truck_5','داخلی','thirdparty',0),(8,'بارکش پنج تا ده تن','truck_10','داخلی','thirdparty',0),(9,'بارکش ده تا بیست تن','truck_20','داخلی','thirdparty',0),(10,'بارکش بیش از بیست تن','truck_more_than_20','داخلی','thirdparty',0),(11,'موتور سیکلت','motor','داخلی','thirdparty',0),(12,'سواری شخصی کمتر از 4 سیلندر','less_than_4_cylinders','وارداتی','thirdparty',0),(13,'سواری شخصی پراید , پیکان , سپند','pride','وارداتی','thirdparty',0),(14,'سواری شخصی 4 سیلندر','4-cylinder','وارداتی','thirdparty',0),(15,'سواری شخصی 4 سیلندر به بالا','more_than_4_cylinders','وارداتی','thirdparty',0),(16,'بارکش تا یک تن','truck_1','وارداتی','thirdparty',0),(17,'بارکش یک تا سه تن','truck_3','وارداتی','thirdparty',0),(18,'بارکش سه تا پنج تن','truck_5','وارداتی','thirdparty',0),(19,'بارکش پنج تا ده تن','truck_10','وارداتی','thirdparty',0),(20,'بارکش ده تا بیست تن','truck_20','وارداتی','thirdparty',0),(21,'بارکش بیش از بیست تن','truck_more_than_20','وارداتی','thirdparty',0),(22,'موتور سیکلت','motor','وارداتی','thirdparty',0),(23,'سواری شخصی کمتر از 4 سیلندر','less_than_4_cylinders','داخلی','body',0),(24,'سواری شخصی پراید , پیکان , سپند','pride','داخلی','body',0),(25,'سواری شخصی 4 سیلندر','4-cylinder','داخلی','body',0),(26,'سواری شخصی 4 سیلندر به بالا','more_than_4_cylinders','داخلی','body',0),(27,'بارکش تا یک تن','truck_1','داخلی','body',0),(28,'بارکش یک تا سه تن','truck_3','داخلی','body',0),(29,'بارکش سه تا پنج تن','truck_5','داخلی','body',0),(30,'بارکش پنج تا ده تن','truck_10','داخلی','body',0),(31,'بارکش ده تا بیست تن','truck_20','داخلی','body',0),(32,'بارکش بیش از بیست تن','truck_more_than_20','داخلی','body',0),(33,'موتور سیکلت','motor','داخلی','body',0),(34,'سواری شخصی کمتر از 4 سیلندر','less_than_4_cylinders','وارداتی','body',0),(35,'سواری شخصی پراید , پیکان , سپند','pride','وارداتی','body',0),(36,'سواری شخصی 4 سیلندر','4-cylinder','وارداتی','body',0),(37,'سواری شخصی 4 سیلندر به بالا','more_than_4_cylinders','وارداتی','body',0),(38,'بارکش تا یک تن','truck_1','وارداتی','body',0),(39,'بارکش یک تا سه تن','truck_3','وارداتی','body',0),(40,'بارکش سه تا پنج تن','truck_5','وارداتی','body',0),(41,'بارکش پنج تا ده تن','truck_10','وارداتی','body',0),(42,'بارکش ده تا بیست تن','truck_20','وارداتی','body',0),(43,'بارکش بیش از بیست تن','truck_more_than_20','وارداتی','body',0),(44,'موتور سیکلت','motor','وارداتی','body',0),(45,'اتوکار','autocar','داخلی','body',0),(46,'مسکونی','residential','فلزی','fire',0),(47,'صنعتی','industrial','فلزی','fire',0),(48,'غیر صنعتی','non-industrial','فلزی','fire',0),(49,'اداری','official','فلزی','fire',0),(53,'تست','test','داخلی','health',0),(54,'test','test','داخلی','thirdparty',0),(55,'کودکان','child','داخلی','life',0),(56,'تست','test','داخلی','test',0);
/*!40000 ALTER TABLE `insurance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insure_area`
--

DROP TABLE IF EXISTS `insure_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insure_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `insure_type` enum('thirdparty','body','fire','life') COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insure_area`
--

LOCK TABLES `insure_area` WRITE;
/*!40000 ALTER TABLE `insure_area` DISABLE KEYS */;
INSERT INTO `insure_area` (`id`, `state`, `insure_type`, `company`, `status`) VALUES (1,'تهران','thirdparty','دانا','active'),(2,'گیلان','thirdparty','دانا','active'),(3,'آذربایجان شرقی','thirdparty','دانا','active'),(4,'آذربایجان غربی','thirdparty','دانا','active'),(5,'خوزستان','thirdparty','دانا','active'),(6,'فارس','thirdparty','دانا','active'),(7,'اصفهان','thirdparty','دانا','active'),(8,'خراسان رضوی','thirdparty','دانا','active'),(9,'قزوین','thirdparty','دانا','active'),(10,'سمنان','thirdparty','دانا','active'),(11,'قم','thirdparty','دانا','active'),(12,'مرکزی','thirdparty','دانا','active'),(13,'زنجان','thirdparty','دانا','active'),(14,'مازندران','thirdparty','دانا','active'),(15,'گلستان','thirdparty','دانا','active'),(16,'اردبیل','thirdparty','دانا','active'),(17,'همدان','thirdparty','دانا','active'),(18,'کردستان','thirdparty','دانا','active'),(19,'کرمانشاه','thirdparty','دانا','active'),(20,'لرستان','thirdparty','دانا','active'),(21,'بوشهر','thirdparty','دانا','active'),(22,'کرمان','thirdparty','دانا','active'),(23,'چهارمحال و بختیاری','thirdparty','دانا','active'),(24,'هرمزگان','thirdparty','دانا','active'),(25,'یزد','thirdparty','دانا','active'),(26,'سیستان و بلوچستان','thirdparty','دانا','active'),(27,'ایلام','thirdparty','دانا','active'),(28,'البرز','thirdparty','دانا','active'),(29,'کهگلویه و بویراحمد','thirdparty','دانا','active'),(30,'خراسان شمالی','thirdparty','دانا','active'),(31,'خراسان جنوبی','thirdparty','دانا','active'),(32,'تهران','body','دانا','active'),(33,'گیلان','body','دانا','active'),(34,'آذربایجان شرقی','body','دانا','active'),(35,'آذربایجان غربی','body','دانا','active'),(36,'خوزستان','body','دانا','active'),(37,'فارس','body','دانا','active'),(38,'اصفهان','body','دانا','active'),(39,'خراسان رضوی','body','دانا','active'),(40,'قزوین','body','دانا','active'),(41,'سمنان','body','دانا','active'),(42,'قم','body','دانا','active'),(43,'مرکزی','body','دانا','active'),(44,'زنجان','body','دانا','active'),(45,'مازندران','body','دانا','active'),(46,'گلستان','body','دانا','active'),(47,'اردبیل','body','دانا','active'),(48,'همدان','body','دانا','active'),(49,'کردستان','body','دانا','active'),(50,'کرمانشاه','body','دانا','active'),(51,'لرستان','body','دانا','active'),(52,'بوشهر','body','دانا','active'),(53,'کرمان','body','دانا','active'),(54,'چهارمحال و بختیاری','body','دانا','active'),(55,'هرمزگان','body','دانا','active'),(56,'یزد','body','دانا','active'),(57,'سیستان و بلوچستان','body','دانا','active'),(58,'ایلام','body','دانا','active'),(59,'البرز','body','دانا','active'),(60,'کهگلویه و بویراحمد','body','دانا','active'),(61,'خراسان شمالی','body','دانا','active'),(62,'خراسان جنوبی','body','دانا','active'),(63,'تهران','fire','دانا','active'),(64,'گیلان','fire','دانا','active'),(65,'آذربایجان شرقی','fire','دانا','active'),(66,'آذربایجان غربی','fire','دانا','active'),(67,'خوزستان','fire','دانا','active'),(68,'فارس','fire','دانا','active'),(69,'اصفهان','fire','دانا','active'),(70,'خراسان رضوی','fire','دانا','active'),(71,'قزوین','fire','دانا','active'),(72,'سمنان','fire','دانا','active'),(73,'قم','fire','دانا','active'),(74,'مرکزی','fire','دانا','active'),(75,'زنجان','fire','دانا','active'),(76,'مازندران','fire','دانا','active'),(77,'گلستان','fire','دانا','active'),(78,'اردبیل','fire','دانا','active'),(79,'همدان','fire','دانا','active'),(80,'کردستان','fire','دانا','active'),(81,'کرمانشاه','fire','دانا','active'),(82,'لرستان','fire','دانا','active'),(83,'بوشهر','fire','دانا','active'),(84,'کرمان','fire','دانا','active'),(85,'چهارمحال و بختیاری','fire','دانا','active'),(86,'هرمزگان','fire','دانا','active'),(87,'یزد','fire','دانا','active'),(88,'سیستان و بلوچستان','fire','دانا','active'),(89,'ایلام','fire','دانا','active'),(90,'البرز','fire','دانا','active'),(91,'کهگلویه و بویراحمد','fire','دانا','active'),(92,'خراسان شمالی','fire','دانا','active'),(93,'خراسان جنوبی','fire','دانا','active'),(94,'تهران','life','دانا','active'),(95,'گیلان','life','دانا','active'),(96,'آذربایجان شرقی','life','دانا','active'),(97,'آذربایجان غربی','life','دانا','active'),(98,'خوزستان','life','دانا','active'),(99,'فارس','life','دانا','active'),(100,'اصفهان','life','دانا','active'),(101,'خراسان رضوی','life','دانا','active'),(102,'قزوین','life','دانا','active'),(103,'سمنان','life','دانا','active'),(104,'قم','life','دانا','active'),(105,'مرکزی','life','دانا','active'),(106,'زنجان','life','دانا','active'),(107,'مازندران','life','دانا','active'),(108,'گلستان','life','دانا','active'),(109,'اردبیل','life','دانا','active'),(110,'همدان','life','دانا','active'),(111,'کردستان','life','دانا','active'),(112,'کرمانشاه','life','دانا','active'),(113,'لرستان','life','دانا','active'),(114,'بوشهر','life','دانا','active'),(115,'کرمان','life','دانا','active'),(116,'چهارمحال و بختیاری','life','دانا','active'),(117,'هرمزگان','life','دانا','active'),(118,'یزد','life','دانا','active'),(119,'سیستان و بلوچستان','life','دانا','active'),(120,'ایلام','life','دانا','active'),(121,'البرز','life','دانا','active'),(122,'کهگلویه و بویراحمد','life','دانا','active'),(123,'خراسان شمالی','life','دانا','active'),(124,'خراسان جنوبی','life','دانا','active'),(125,'تهران','','دانا','active'),(126,'گیلان','','دانا','active'),(127,'آذربایجان شرقی','','دانا','active'),(128,'آذربایجان غربی','','دانا','active'),(129,'خوزستان','','دانا','active'),(130,'فارس','','دانا','active'),(131,'اصفهان','','دانا','active'),(132,'خراسان رضوی','','دانا','active'),(133,'قزوین','','دانا','active'),(134,'سمنان','','دانا','active'),(135,'قم','','دانا','active'),(136,'مرکزی','','دانا','active'),(137,'زنجان','','دانا','active'),(138,'مازندران','','دانا','active'),(139,'گلستان','','دانا','active'),(140,'اردبیل','','دانا','active'),(141,'همدان','','دانا','active'),(142,'کردستان','','دانا','active'),(143,'کرمانشاه','','دانا','active'),(144,'لرستان','','دانا','active'),(145,'بوشهر','','دانا','active'),(146,'کرمان','','دانا','active'),(147,'چهارمحال و بختیاری','','دانا','active'),(148,'هرمزگان','','دانا','active'),(149,'یزد','','دانا','active'),(150,'سیستان و بلوچستان','','دانا','active'),(151,'ایلام','','دانا','active'),(152,'البرز','','دانا','active'),(153,'کهگلویه و بویراحمد','','دانا','active'),(154,'خراسان شمالی','','دانا','active'),(155,'خراسان جنوبی','','دانا','active'),(156,'تهران','','دانا','active'),(157,'گیلان','','دانا','active'),(158,'آذربایجان شرقی','','دانا','active'),(159,'آذربایجان غربی','','دانا','active'),(160,'خوزستان','','دانا','active'),(161,'فارس','','دانا','active'),(162,'اصفهان','','دانا','active'),(163,'خراسان رضوی','','دانا','active'),(164,'قزوین','','دانا','active'),(165,'سمنان','','دانا','active'),(166,'قم','','دانا','active'),(167,'مرکزی','','دانا','active'),(168,'زنجان','','دانا','active'),(169,'مازندران','','دانا','active'),(170,'گلستان','','دانا','active'),(171,'اردبیل','','دانا','active'),(172,'همدان','','دانا','active'),(173,'کردستان','','دانا','active'),(174,'کرمانشاه','','دانا','active'),(175,'لرستان','','دانا','active'),(176,'بوشهر','','دانا','active'),(177,'کرمان','','دانا','active'),(178,'چهارمحال و بختیاری','','دانا','active'),(179,'هرمزگان','','دانا','active'),(180,'یزد','','دانا','active'),(181,'سیستان و بلوچستان','','دانا','active'),(182,'ایلام','','دانا','active'),(183,'البرز','','دانا','active'),(184,'کهگلویه و بویراحمد','','دانا','active'),(185,'خراسان شمالی','','دانا','active'),(186,'خراسان جنوبی','','دانا','active');
/*!40000 ALTER TABLE `insure_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insure_type`
--

DROP TABLE IF EXISTS `insure_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insure_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `orderby` tinyint(2) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `insure` enum('thirdparty','body','fire') NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insure_type`
--

LOCK TABLES `insure_type` WRITE;
/*!40000 ALTER TABLE `insure_type` DISABLE KEYS */;
INSERT INTO `insure_type` (`id`, `title`, `type`, `orderby`, `pic`, `insure`, `status`) VALUES (1,'سواری','personal',1,'https://bimiapp.ir/api/insurepic/car.png','thirdparty','active'),(2,'تاکسی درون شهری','taxiin',2,'https://bimiapp.ir/api/insurepic/location.png','thirdparty','active'),(3,'تاکسی برون شهری','taxiout',3,'https://bimiapp.ir/api/insurepic/taxi.png','thirdparty','active'),(4,'آژانس','agancy',4,'https://bimiapp.ir/api/insurepic/automobile.png','thirdparty','active'),(5,'موتور سیکلت','motor',5,'https://bimiapp.ir/api/insurepic/motorcycle.png','thirdparty','active'),(6,'اتوکار','autocar',6,'https://bimiapp.ir/api/insurepic/crane.png','thirdparty','active'),(7,'بارکش','truck',7,'https://bimiapp.ir/api/insurepic/camion.png','thirdparty','active'),(8,'ماشین آلات راه سازی','',8,'https://bimiapp.ir/api/insurepic/construction.png','thirdparty','deactive'),(9,'ماشین آلات کشاورزی','',9,'https://bimiapp.ir/api/insurepic/tractor.png','thirdparty','deactive'),(10,'مسکونی','residential',10,'https://bimiapp.ir/api/insurepic/residential.png','fire','active'),(11,'اداری','official',11,'https://bimiapp.ir/api/insurepic/architecture.png','fire','active'),(12,'تجاری','commercial',12,'https://bimiapp.ir/api/insurepic/buildings.png','fire','active'),(13,'سواری','personal',1,'https://bimiapp.ir/api/insurepic/car.png','body','active'),(14,'تاکسی درون شهری','taxiin',2,'https://bimiapp.ir/api/insurepic/location.png','body','active'),(15,'تاکسی برون شهری','taxiout',3,'https://bimiapp.ir/api/insurepic/taxi.png','body','active'),(16,'آژانس','agancy',4,'https://bimiapp.ir/api/insurepic/automobile.png','body','active'),(17,'موتور سیکلت','motor',5,'https://bimiapp.ir/api/insurepic/motorcycle.png','body','active'),(18,'اتوکار','autocar',6,'https://bimiapp.ir/api/insurepic/crane.png','body','deactive'),(19,'بارکش','truck',7,'https://bimiapp.ir/api/insurepic/camion.png','body','deactive'),(20,'ماشین آلات راه سازی','',8,'https://bimiapp.ir/api/insurepic/construction.png','body','deactive'),(21,'ماشین آلات کشاورزی','',9,'https://bimiapp.ir/api/insurepic/tractor.png','body','deactive');
/*!40000 ALTER TABLE `insure_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lottery`
--

DROP TABLE IF EXISTS `lottery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `lowest_score` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `start_date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `end_date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lottery_date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `prize` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `club` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `customers` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lottery`
--

LOCK TABLES `lottery` WRITE;
/*!40000 ALTER TABLE `lottery` DISABLE KEYS */;
INSERT INTO `lottery` (`id`, `title`, `comment`, `lowest_score`, `start_date`, `end_date`, `lottery_date`, `prize`, `club`, `customers`, `status`, `deleted`) VALUES (1,'سلام','م','','۱۳۹۸-۱۲-۲۳','۱۳۹۸-۱۲-۲۳','','','','','1',1),(2,'تلفنی و از راه دور ویزیت شوید !','','','۱۳۹۸-۱۲-۲۳','۱۳۹۸-۱۲-۲۳','','/id=2','','','1',1),(3,'تلفنی و از راه دور ویزیت شوید !','','مشاهده پزشکان','۱۳۹۸-۱۲-۲۳','۱۳۹۸-۱۲-۲۳','','/search?type=doctor','','','1',0),(4,'بیمه شخص ثالث','','ادامه','۱۳۹۸-۱۲-۲۷','۱۳۹۸-۱۲-۲۷','','gg.com','','','1',1),(5,'20 درصد تخفیف بیشتر','','اطلاعات بیشتر','۱۳۹۸-۱۲-۲۷','۱۳۹۸-۱۲-۲۷','','/search','','','1',1);
/*!40000 ALTER TABLE `lottery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT 'Untitled',
  `message` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `from_user_id` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `to_user_id` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('unread','read') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unread',
  `message_id` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `files` longtext COLLATE utf8_persian_ci NOT NULL,
  `deleted_by_users` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_from` (`from_user_id`),
  KEY `message_to` (`to_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `subject`, `message`, `created_at`, `from_user_id`, `to_user_id`, `status`, `message_id`, `deleted`, `files`, `deleted_by_users`) VALUES (1,'hi','1','2020-03-26 00:00:00','2','1','read',0,0,'a:0:{}',''),(2,'Untitled','hi','2020-03-26 00:00:00','2','1','unread',0,0,'a:0:{}','');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_settings`
--

DROP TABLE IF EXISTS `notification_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `enable_email` int(1) NOT NULL DEFAULT '0',
  `enable_web` int(1) NOT NULL DEFAULT '0',
  `notify_to_team` text NOT NULL,
  `notify_to_team_members` text NOT NULL,
  `notify_to_terms` text NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `event` (`event`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_settings`
--

LOCK TABLES `notification_settings` WRITE;
/*!40000 ALTER TABLE `notification_settings` DISABLE KEYS */;
INSERT INTO `notification_settings` (`id`, `event`, `category`, `enable_email`, `enable_web`, `notify_to_team`, `notify_to_team_members`, `notify_to_terms`, `sort`, `deleted`) VALUES (1,'project_created','project',1,0,'','','',1,0),(2,'project_deleted','project',0,0,'','','',2,0),(3,'project_task_created','project',0,1,'','','project_members,task_assignee',3,0),(4,'project_task_updated','project',0,1,'','','task_assignee',4,0),(5,'project_task_assigned','project',0,1,'','','task_assignee',5,0),(7,'project_task_started','project',0,0,'','','',7,0),(8,'project_task_finished','project',0,0,'','','',8,0),(9,'project_task_reopened','project',0,0,'','','',9,0),(10,'project_task_deleted','project',0,1,'','','task_assignee',10,0),(11,'project_task_commented','project',0,1,'','','task_assignee',11,0),(12,'project_member_added','project',0,1,'','','project_members',12,0),(13,'project_member_deleted','project',0,1,'','','project_members',13,0),(14,'project_file_added','project',0,1,'','','project_members',14,0),(15,'project_file_deleted','project',0,1,'','','project_members',15,0),(16,'project_file_commented','project',0,1,'','','project_members',16,0),(17,'project_comment_added','project',0,1,'','','project_members',17,0),(18,'project_comment_replied','project',0,1,'','','project_members,comment_creator',18,0),(19,'project_customer_feedback_added','project',0,1,'','','project_members',19,0),(20,'project_customer_feedback_replied','project',0,1,'','','project_members,comment_creator',20,0),(21,'client_signup','client',0,0,'','','',21,0),(22,'invoice_online_payment_received','invoice',0,0,'','','',22,0),(23,'leave_application_submitted','leave',0,0,'','','',23,0),(24,'leave_approved','leave',0,1,'','','leave_applicant',24,0),(25,'leave_assigned','leave',0,1,'','','leave_applicant',25,0),(26,'leave_rejected','leave',0,1,'','','leave_applicant',26,0),(27,'leave_canceled','leave',0,0,'','','',27,0),(28,'ticket_created','ticket',0,0,'','','',28,0),(29,'ticket_commented','ticket',0,1,'','','client_primary_contact,ticket_creator',29,0),(30,'ticket_closed','ticket',0,1,'','','client_primary_contact,ticket_creator',30,0),(31,'ticket_reopened','ticket',0,1,'','','client_primary_contact,ticket_creator',31,0),(32,'estimate_request_received','estimate',0,0,'','','',32,0),(33,'estimate_sent','estimate',0,0,'','','',33,0),(34,'estimate_accepted','estimate',0,0,'','','',34,0),(35,'estimate_rejected','estimate',0,0,'','','',35,0),(36,'new_message_sent','message',0,0,'','','',36,0),(37,'message_reply_sent','message',0,0,'','','',37,0),(38,'invoice_payment_confirmation','invoice',0,0,'','','',22,0);
/*!40000 ALTER TABLE `notification_settings` ENABLE KEYS */;
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
  `description` longtext COLLATE utf8_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `notify_to` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `read_by` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `event` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `project_comment_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `ticket_comment_id` int(11) NOT NULL,
  `project_file_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `activity_log_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_payment_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `estimate_id` int(11) NOT NULL,
  `estimate_request_id` int(11) NOT NULL,
  `actual_message_id` int(11) NOT NULL,
  `parent_message_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `off`
--

DROP TABLE IF EXISTS `off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `number` int(10) DEFAULT '0',
  `status` enum('active','deactive') COLLATE utf8_persian_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `number_of_use` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `price_type` enum('percent','cash','prize','credit','wallet') COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `insurance` enum('thirdparty','body','fire','life','health','pet','travel') COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `off`
--

LOCK TABLES `off` WRITE;
/*!40000 ALTER TABLE `off` DISABLE KEYS */;
/*!40000 ALTER TABLE `off` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_comments`
--

DROP TABLE IF EXISTS `order_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `doctor_id` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_comments`
--

LOCK TABLES `order_comments` WRITE;
/*!40000 ALTER TABLE `order_comments` DISABLE KEYS */;
INSERT INTO `order_comments` (`id`, `user_key`, `date`, `description`, `order_id`, `doctor_id`, `deleted`) VALUES (1,'d9539d086564e50d887c45424890e6d9','2020-03-31 00:00:00','سلام',7,'001b8c8f241ccf01970b1ccb385c497a',0);
/*!40000 ALTER TABLE `order_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_files`
--

DROP TABLE IF EXISTS `order_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` text COLLATE utf8_persian_ci NOT NULL,
  `description` mediumtext COLLATE utf8_persian_ci,
  `file_size` double NOT NULL,
  `created_at` datetime NOT NULL,
  `project_id` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_files`
--

LOCK TABLES `order_files` WRITE;
/*!40000 ALTER TABLE `order_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_financial`
--

DROP TABLE IF EXISTS `order_financial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_financial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_factor` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `wage` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('not_yet','unpaid','paid') COLLATE utf8_persian_ci NOT NULL DEFAULT 'not_yet',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_financial`
--

LOCK TABLES `order_financial` WRITE;
/*!40000 ALTER TABLE `order_financial` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_financial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_parameter`
--

DROP TABLE IF EXISTS `order_parameter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `parameter` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `val` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_parameter`
--

LOCK TABLES `order_parameter` WRITE;
/*!40000 ALTER TABLE `order_parameter` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_parameter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_time`
--

DROP TABLE IF EXISTS `order_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` enum('open','logged','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'logged',
  `note` text COLLATE utf8_persian_ci,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_time`
--

LOCK TABLES `order_time` WRITE;
/*!40000 ALTER TABLE `order_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('ثبت سفارش','پرداخت موفق صورتحساب','پرداخت غیرموفق صورتحساب','ویزیت شده','نظرسنجی','بایگانی') COLLATE utf8_persian_ci NOT NULL DEFAULT 'ثبت سفارش',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `factor` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `CashIinstallments` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `doctor_id` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `broker_id` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `user_key` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_persian_ci NOT NULL,
  `insurance` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `view` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `reson` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `archive` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `product_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `start_date`, `status`, `deleted`, `factor`, `CashIinstallments`, `doctor_id`, `broker_id`, `user_key`, `address`, `insurance`, `view`, `reson`, `archive`, `product_id`) VALUES (1,'2020-03-18 09:41:56','ثبت سفارش',0,'597784210','','2','','f5b5d8642901b23f2d184893ffbd20ac','تهران -  تهران  - سعادت آباد - چهارراه سرو','بیمه نیروهای مسلح','خیر , بار اولم هست','امتحان سالانه پاپ اسمیر / GYN','','1'),(3,'2020-03-25 17:19:28','ثبت سفارش',0,'213007019','','6','','f5b5d8642901b23f2d184893ffbd20ac','تهران -  تهران  - الهیه - خیابان فرشته , خیابان چناران , خیابان شریفی منش , بیمارستان خضرا','بیمه نیروهای مسلح','خیر , بار اولم هست','سالانه جسمی','','1'),(4,'2020-03-27 18:17:48','ثبت سفارش',0,'476262787','','9','','f5b5d8642901b23f2d184893ffbd20ac','گیلان -  رشت  - گلسار - خیابان گلسار , پلاک 128','بیمه نیروهای مسلح','خیر , بار اولم هست','امتحان سالانه پاپ اسمیر / GYN','','2'),(5,'2020-03-27 18:17:50','ثبت سفارش',0,'779334656','','9','','f5b5d8642901b23f2d184893ffbd20ac','گیلان -  رشت  - گلسار - خیابان گلسار , پلاک 128','بیمه نیروهای مسلح','خیر , بار اولم هست','امتحان سالانه پاپ اسمیر / GYN','','2'),(6,'2020-03-30 00:35:52','پرداخت غیرموفق صورتحساب',0,'508060791','','6','','d9539d086564e50d887c45424890e6d9','کردستان -  سنندج  - خیابان اما خمینی - پلاک 38 , واحد 2','بیمه نیروهای مسلح','خیر , بار اولم هست','بیماری','','3'),(7,'2020-03-30 00:39:35','پرداخت موفق صورتحساب',0,'756652283','','6','','d9539d086564e50d887c45424890e6d9','کردستان -  سنندج  - خیابان اما خمینی - پلاک 38 , واحد 2','بیمه نیروهای مسلح','خیر , بار اولم هست','امتحان سالانه پاپ اسمیر / GYN','','3');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_persian_ci NOT NULL DEFAULT 'custom',
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `online_payable` tinyint(1) NOT NULL DEFAULT '0',
  `available_on_invoice` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_payment_amount` double NOT NULL DEFAULT '0',
  `settings` longtext COLLATE utf8_persian_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
INSERT INTO `payment_methods` (`id`, `title`, `type`, `description`, `online_payable`, `available_on_invoice`, `minimum_payment_amount`, `settings`, `deleted`) VALUES (1,'نقدی','custom','نقدی',0,0,0,'a:0:{}',1),(2,'Stripe','stripe','Stripe online payments',1,0,0,'a:3:{s:15:\"pay_button_text\";s:6:\"Stripe\";s:10:\"secret_key\";s:6:\"\";s:15:\"publishable_key\";s:6:\"\";}',0),(3,'درگاه پرداخت','paypal_payments_standard','درگاه پرداخت بانک ملت',1,0,0,'a:4:{s:15:\"pay_button_text\";s:15:\"PayPal Standard\";s:5:\"email\";s:18:\"prof7201@yahoo.com\";s:11:\"paypal_live\";s:1:\"0\";s:5:\"debug\";s:1:\"0\";}',0),(4,'دستگاه کارت خوان','custom','دستگاه کارت خوان',0,0,0,'a:0:{}',0),(6,'چک','custom','چک',0,0,0,'a:0:{}',0);
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `share_with` text COLLATE utf8_persian_ci,
  `files` longtext COLLATE utf8_persian_ci,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_for` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `unique_id` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `reply` int(1) NOT NULL DEFAULT '0',
  `source_description` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `client_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `created_by`, `created_at`, `description`, `post_id`, `share_with`, `files`, `deleted`, `created_for`, `unique_id`, `reply`, `source_description`, `client_name`) VALUES (1,'<br />\n<b>Notice</b>','0000-00-00 00:00:00','salam',0,NULL,NULL,0,'1','<br />\n<b>Notice</b>',0,'','امیر رادسعید');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL,
  `agent_insure_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `index` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `base_price` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `bime_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_members`
--

DROP TABLE IF EXISTS `project_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `is_leader` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_members`
--

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_settings`
--

DROP TABLE IF EXISTS `project_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_settings` (
  `project_id` int(11) NOT NULL,
  `setting_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `setting_value` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `unique_index` (`project_id`,`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_settings`
--

LOCK TABLES `project_settings` WRITE;
/*!40000 ALTER TABLE `project_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminder`
--

DROP TABLE IF EXISTS `reminder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `insurance_type` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `company` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `pic` varchar(500) NOT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `broker` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminder`
--

LOCK TABLES `reminder` WRITE;
/*!40000 ALTER TABLE `reminder` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `permissions` mediumtext COLLATE utf8_persian_ci,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `club` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `setting_value` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `setting_name` (`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`setting_name`, `setting_value`, `deleted`) VALUES ('accepted_file_formats','jpg,jpeg,doc,png',0),('agent_name','احسان انصاری',0),('agent_pic','',0),('allow_company','all',0),('allow_partial_invoice_payment_from_clients','1',0),('allowed_ip_addresses','',0),('android_app_link','android',0),('api_kavenegar','36576639336B6645545875595145376C4F597A5A526768394B53494E6A795137',0),('api_pay','a0103c65261c9e2306a46edd7b120b37',0),('app_background','',0),('app_title','دکتر آنلاین',0),('application_name','نام اپلیکیشن',0),('application_phone','09125068717',0),('can_create_announcement','0',0),('can_create_brokers','0',0),('can_create_clients','0',0),('can_create_company','0',0),('can_create_help_article','0',0),('can_create_help_categories','0',0),('can_create_insurance_policy','0',0),('can_create_lottery','0',0),('can_create_off','0',0),('can_create_reminders','0',0),('can_create_team_member','0',0),('can_delete_announcement','0',0),('can_delete_brokers','0',0),('can_delete_clients','0',0),('can_delete_company','0',0),('can_delete_help_article','0',0),('can_delete_help_categories','0',0),('can_delete_insurance_policy','0',0),('can_delete_lottery','0',0),('can_delete_off','0',0),('can_delete_reminders','0',0),('can_delete_team_member','0',0),('can_edit_announcement','0',0),('can_edit_brokers','0',0),('can_edit_clients','0',0),('can_edit_company','0',0),('can_edit_help_article','0',0),('can_edit_help_categories','0',0),('can_edit_reminders','0',0),('can_edit_team_member','0',0),('can_view_area_body','0',0),('can_view_area_fire','0',0),('can_view_area_life','0',0),('can_view_area_third','0',0),('can_view_body_order','0',0),('can_view_charge_credit','0',0),('can_view_clearing','0',0),('can_view_fire_order','0',0),('can_view_health_order','0',0),('can_view_life_order','0',0),('can_view_order','0',0),('can_view_settings','0',0),('can_view_thirdparty_order','0',0),('can_view_timeline','0',0),('can_view_transfer','0',0),('can_view_travel_order','0',0),('can_view_vehicle_body','0',0),('can_view_vehicle_third','0',0),('can_view_wallet','0',0),('can_view_wallet_charge','0',0),('client_can_add_project_files','',0),('client_can_comment_on_files','',0),('client_can_comment_on_tasks','',0),('client_can_create_projects','1',0),('client_can_create_tasks','1',0),('client_can_edit_tasks','1',0),('client_can_view_gantt','',0),('client_can_view_milestones','',0),('client_can_view_overview','',0),('client_can_view_project_files','',0),('client_can_view_tasks','1',0),('client_message_users','',0),('company_address','تهران , سعادت آباد , چهارراه سرو , ساختمان مینیاتور , طبقه سوم , واحد 12',0),('company_aparat','https://aparat.com',0),('company_email','info@doctor.com',0),('company_email_sell','info@bimiapp.ir',0),('company_facebook','facebook.com',0),('company_instagram','https://www.instagram.com/',0),('company_name','نمایندگی 9564 بیمه دانا',0),('company_phone','02122446688',0),('company_telegram','telegram.org',0),('company_twitter','twitter.com',0),('company_website','https://doctor.com',0),('currency_position','right',0),('currency_symbol','تومان',0),('date_format','Y-m-d',0),('decimal_separator','.',0),('default_currency','IRR',0),('disable_client_login','',0),('disable_client_signup','',0),('email_protocol','',0),('email_sent_from_address','info@bimiapp.ir',0),('email_sent_from_name','نمایندگی 9564 بیمه دانا',0),('email_smtp_host','',0),('email_smtp_pass','',0),('email_smtp_port','',0),('email_smtp_security_type','tls',0),('email_smtp_user','',0),('first_day_of_week','6',0),('ios_app_link','ios',0),('language','persian',0),('latitude','51.399016',0),('longitude','35.742644',0),('message_body','',0),('message_fire','',0),('message_health','',0),('message_life','',0),('message_off','اطلاعیه',0),('message_thirdparty','',0),('message_travel','',0),('module_announcement','',0),('module_attendance','',0),('module_estimate','',0),('module_estimate_request','',0),('module_event','',0),('module_expense','',0),('module_help','',0),('module_invoice','',0),('module_knowledge_base','1',0),('module_leave','',0),('module_message','',0),('module_note','',0),('module_project_timesheet','',0),('module_ticket','1',0),('module_timeline','',0),('rows_per_page','10',0),('scrollbar','native',0),('share_message','',0),('show_background_image_in_signin_page','no',0),('show_logo_in_signin_page','no',0),('site_background','#2e7673',0),('site_fav','/assets/img/fav.png',0),('site_logo','/moderator/files/system/_file5e836f1c295f1-site-logo.png',0),('sms_per_price','15',0),('status_app_background','#37452e',0),('theme_color','#0f2d63',0),('time_format','',0),('timezone','UTC',0),('website_show_broker','on',0),('website_show_club','on',0),('website_show_tv','on',0),('website_status','on',0);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `type` enum('help','knowledge_base') COLLATE utf8_persian_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` (`id`, `title`, `description`, `type`, `sort`, `status`, `deleted`) VALUES (1,'آذربایجان شرقی','1','help',0,'active',0),(2,'آذربایجان غربی','1','help',0,'active',0),(3,'اردبیل','1','help',0,'active',0),(4,'اصفهان','1','help',0,'active',0),(5,'البرز','1','help',0,'active',0),(6,'ایلام','1','help',0,'active',0),(7,'بوشهر','1','help',0,'active',0),(8,'تهران','1','help',0,'active',0),(9,'چهارمحال وبختیاری','1','help',0,'active',0),(10,'خراسان جنوبی','1','help',0,'active',0),(11,'خراسان رضوی','1','help',0,'active',0),(12,'خراسان شمالی','1','help',0,'active',0),(13,'خوزستان','1','help',0,'active',0),(14,'زنجان','1','help',0,'active',0),(15,'سمنان','1','help',0,'active',0),(16,'سیستان وبلوچستان','1','help',0,'active',0),(17,'فارس','1','help',0,'active',0),(18,'قزوین','1','help',0,'active',0),(19,'قم','1','help',0,'active',0),(20,'کردستان','1','help',0,'active',0),(21,'کرمان','1','help',0,'active',0),(22,'کرمانشاه','1','help',0,'active',0),(23,'کهگیلویه وبویراحمد','1','help',0,'active',0),(24,'گلستان','1','help',0,'active',0),(25,'گیلان','1','help',0,'active',0),(26,'لرستان','1','help',0,'active',0),(27,'مازندران','1','help',0,'active',0),(28,'مرکزی','1','help',0,'active',0),(29,'هرمزگان','1','help',0,'active',0),(30,'همدان','1','help',0,'active',0),(31,'یزد','1','help',0,'active',0);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_specialty`
--

DROP TABLE IF EXISTS `sub_specialty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `element_name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `priority` int(2) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_specialty`
--

LOCK TABLES `sub_specialty` WRITE;
/*!40000 ALTER TABLE `sub_specialty` DISABLE KEYS */;
INSERT INTO `sub_specialty` (`id`, `specialty`, `name`, `element_name`, `priority`, `deleted`) VALUES (1,'doctor','تست','test',0,0),(2,'doctor','تست 2','test2',0,0);
/*!40000 ALTER TABLE `sub_specialty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_comments`
--

DROP TABLE IF EXISTS `ticket_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `description` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `files` longtext COLLATE utf8_persian_ci,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_comments`
--

LOCK TABLES `ticket_comments` WRITE;
/*!40000 ALTER TABLE `ticket_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_types`
--

DROP TABLE IF EXISTS `ticket_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_types`
--

LOCK TABLES `ticket_types` WRITE;
/*!40000 ALTER TABLE `ticket_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `ticket_type_id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('new','client_replied','open','closed') COLLATE utf8_persian_ci NOT NULL DEFAULT 'new',
  `last_activity_at` datetime DEFAULT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT '0',
  `labels` text COLLATE utf8_persian_ci,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `doctor` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `internet_call` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `payment_method` enum('online','in_home','in_clinic','no_payment') COLLATE utf8_persian_ci NOT NULL DEFAULT 'online',
  `deleted` int(2) NOT NULL DEFAULT '0',
  `status` varchar(100) COLLATE utf8_persian_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `times`
--

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` (`id`, `date`, `title`, `doctor`, `price`, `comment`, `internet_call`, `payment_method`, `deleted`, `status`) VALUES (1,'2020-03-25','12:00 ب.ظ','6','1000','20 دقیقه','','online',0,'in_use'),(2,'2020-03-28','12:00 ب.ظ','9','25000','30 دقیقه','','online',0,'in_use'),(3,'2020-03-30','12:00 ب.ظ','6','25000','30 دقیقه','','online',0,'in_use'),(4,'2020-03-31','12:00 ب.ظ','7','1000','30 دقیقه','','online',0,'active');
/*!40000 ALTER TABLE `times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_type` enum('staff','client','doctor','clinic','broker') COLLATE utf8_persian_ci DEFAULT 'client',
  `is_admin` tinyint(1) DEFAULT '0',
  `role_id` int(11) DEFAULT '0',
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `user_key` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `image` text COLLATE utf8_persian_ci,
  `status` enum('active','inactive') COLLATE utf8_persian_ci DEFAULT 'active',
  `job_title` varchar(100) COLLATE utf8_persian_ci DEFAULT 'کاربر',
  `disable_login` tinyint(1) DEFAULT '0',
  `address` text COLLATE utf8_persian_ci,
  `alternative_address` text COLLATE utf8_persian_ci,
  `phone` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `alternative_phone` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_persian_ci DEFAULT 'male',
  `skype` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(1) DEFAULT '0',
  `state` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `postalcode` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL,
  `birthday` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `broker_id` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `merchant_code` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `comment` text COLLATE utf8_persian_ci,
  `lat` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `long` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `referral_code` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `melli_code` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `specialty` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `system_code` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `cellphone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`),
  KEY `email` (`email`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `is_admin`, `role_id`, `email`, `password`, `user_key`, `image`, `status`, `job_title`, `disable_login`, `address`, `alternative_address`, `phone`, `alternative_phone`, `gender`, `skype`, `created_at`, `deleted`, `state`, `city`, `area`, `postalcode`, `birthday`, `client_id`, `broker_id`, `merchant_code`, `comment`, `lat`, `long`, `referral_code`, `melli_code`, `specialty`, `system_code`, `cellphone`) VALUES (1,'امیر','رادسعید','staff',1,0,'09123456789','21ef05aed5af92469a50b35623d52101','f5b5d8642901b23f2d184893ffbd20ac','_file5e6cb0d860b7e-avatar.png','active','نماینده بیمه',0,'آدرس',NULL,'09123456789',NULL,'male',NULL,'2020-03-26 13:10:21',0,'تهران','تهران','','','',1,'','','','','','2019-07-23 01:04:03','0000000000','0','0',''),(2,'دکتر ملیحه','رمضانی مهر','doctor',0,0,'fahimeh@gmail.com','21ef05aed5af92469a50b35623d52101','6cb5836a3025781cbeea65d9e2013b63','_file5e7e3d17e38df-avatar.png','active','فوق تخصص مغز و اعصاب',0,'میدان ونک، ابتدای خیابان گاندی جنوبی، نبش کوی بیستم، پلاک 142، طبقه سوم، واحد 31',NULL,'09123456788',NULL,'male',NULL,'2020-04-05 00:57:00',0,'تهران',' تهران ',NULL,NULL,NULL,2,NULL,NULL,'دکتر دکتر فهمیه سهیلی پور فوق تخصص گوارش و کبد کودکان از دانشگاه تهران و متخصص کودکان از دانشگاه علوم پزشکی فردوسی مشهد و عضو هیات علمی دانشگاه علوم پزشکی و خدمات بهداشتی و درمانی شهید بهشتی است.\nسوابق و افتخارات پزشک\n۴1 سال سابقه طبابت در زمینه گوارش و کبد و تغذیه کودکان\nعضو هیأت علمی دانشگاه علوم پزشکی و خدمات درمانی بهداشتی شهید بهشتی از سال ۱۳۶۳ تا کنون\nبیش از ۲۰ سال معاونت وزارت علوم و بهداشت\nمدیر گروه اطفال دانشگاه علوم پزشکی شهید بهشتی تهران\nرئیس هیأت بورد رشته تخصص کودکان\nرئیس بخش گوارش و آندوسکوپی بیمارستان مفید\nرئیس مرکز تحقیقات گوارش، کبد و تغذیه کودکان\n\nبیمارستان‌های همکار\nبیمارستان مفید تهران\nبیمارستان پارسیان تهران\nآدرس سایت اختصاصی پزشک',NULL,NULL,'2020-03-14 06:12:34','1234567891','general_surgeon','5',''),(3,'دکتر محمد','نبوی','client',0,0,'nabavi@gmail.com','21ef05aed5af92469a50b35623d52101','1ef4a0411d1756878182e89ec7272a09','default_male.jpg','active','کاربر',0,'چهارراه پاسداران، خیابان شهید کلاهدوز، مابین چهارراه اختیاریه و دیباجی (دولت)، روبروی مسجد محمدیه، پلاک 138، طبقه 3، واحد 6',NULL,'55555555555',NULL,'male',NULL,'2020-03-26 18:30:31',0,'کرمان',' تهران ',NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,'2020-03-14 06:15:49','5555555555','0','0',''),(4,'رضا','حسنی','client',0,0,NULL,'21ef05aed5af92469a50b35623d52101','90f45bd5891277025a990c2a330e7d47',NULL,'active','کاربر',0,'سعادت آباد',NULL,'22222222222',NULL,'male',NULL,'2020-03-26 18:27:58',0,'تهران',' تهران ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-03-14 07:02:27','1111111111','0','0',''),(5,'بیمارستان','بیمارستان 501ارتش','clinic',0,0,NULL,'21ef05aed5af92469a50b35623d52101','90f45bd5891277025a990c2a330e7d45','_file5e6d57ec55803-avatar.png','active','کلینیک',0,'خیابان فاطمی غربی، خیابان اعتمادزاده، بالاتر از سفارت پاکستان',NULL,'02186096350',NULL,'male',NULL,'2020-03-14 22:17:16',0,'تهران','تهران',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-03-14 21:25:09',NULL,'0','0',''),(6,'دکتر عزت الله','رحیمی','doctor',0,0,'','21ef05aed5af92469a50b35623d52101','fc21bb81f5e1906f3239d4b25d92d3b9','_file5e7e3dc7ca168-avatar.png','active','کاربر',0,'آدرس خانه',NULL,'01245877777',NULL,'female',NULL,'2020-03-30 02:24:42',0,'تهران',' تهران ',NULL,NULL,NULL,NULL,NULL,NULL,'فارغ التحصیل پزشکی عمومی در سال 88 از دانشگاه علوم پزشکی ایران\nفارغ التحصیل رشته بیماریهای داخلی در سال 96 از دانشگاه تهران\nدارای بورد تخصصی بیماریهای داخلی\nدر زمینه بیماریهای دیابت و تیرویید، بیماریهای کبد و گوارش، \nفشار خون و چربی خون بالا، نقرس و بیماریهای روماتیسمی و مفاصل،\n بیماریهای کلیوی، انواع کم خونی، سینوزیت، آسم و بیماریهای ریوی پاسخگوی عزیزان هستم.',NULL,NULL,'2020-03-24 20:24:18','1020306322','dentist','',''),(7,'دکتر مهدیه','نیک نژاد خسمخی','doctor',0,0,'','21ef05aed5af92469a50b35623d52101','aeeaac7a0612c85bb2d24e6a9cb072d5','_file5e7e39bbc2853-avatar.png','active','کاربر',0,'پیاده راه امام، کوچه بانک ملی مرکزی، ساختمان هما، طبقه 5،واحد 19',NULL,'12332112332',NULL,'female',NULL,'2020-03-27 17:40:04',0,'مرکزی',' اراک ',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2020-03-27 17:30:54','1478523698','doctor','',''),(8,'دکتر فریده','افتخارزاده','doctor',0,0,'','21ef05aed5af92469a50b35623d52101','8ebfefc8eadf229156c3cf5ac105c9c5','_file5e7e3e9d7fa9b-avatar.png','active','کاربر',0,'سعادت آباد',NULL,'78778777777',NULL,'female',NULL,'2020-03-27 17:58:00',0,'تهران',' تهران ',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2020-03-27 17:57:11','7878787878','doctor','',''),(9,'دکتر مهناز','اسکندری','doctor',0,0,'','21ef05aed5af92469a50b35623d52101','001b8c8f241ccf01970b1ccb385c497a','_file5e7e3f9fd460e-avatar.png','active','کاربر',0,'خیابان گلسار',NULL,'21255555555',NULL,'female',NULL,'2020-03-27 18:03:20',0,'گیلان',' رشت ',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2020-03-27 18:01:48','8985555555','general_surgeon','',''),(10,'علی','محمدی','client',0,0,NULL,'21ef05aed5af92469a50b35623d52101','d9539d086564e50d887c45424890e6d9',NULL,'active','کاربر',0,'وحید دستگردی پلاک ۲۹۵, ۳',NULL,'09125068717',NULL,'male',NULL,'2020-03-30 21:02:06',0,'تهران','تهران',NULL,'1998884791',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-03-29 01:04:19','3040106351','','','02188322661'),(11,'بازاریاب','تستی','broker',0,0,'','21ef05aed5af92469a50b35623d52101','bde7d11155b568bee41ad92323951500',NULL,'active','کاربر',0,'آدرس',NULL,'85236985236',NULL,'male','test','2020-03-31 16:20:19',0,'تهران',' تهران ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-03-31 16:18:18','1254444444','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_address`
--

DROP TABLE IF EXISTS `users_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `state` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `area` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_address`
--

LOCK TABLES `users_address` WRITE;
/*!40000 ALTER TABLE `users_address` DISABLE KEYS */;
INSERT INTO `users_address` (`id`, `user_key`, `state`, `city`, `area`, `address`, `deleted`) VALUES (1,'001b8c8f241ccf01970b1ccb385c497a','آذربایجان شرقی',' آبش‌احمد ','','ادرس 0',0),(2,'001b8c8f241ccf01970b1ccb385c497a','آذربایجان شرقی',' آبش‌احمد ','','ادرس اذری',0);
/*!40000 ALTER TABLE `users_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_discount`
--

DROP TABLE IF EXISTS `users_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `company` text COLLATE utf8_persian_ci NOT NULL,
  `user_key` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `value_type` enum('cash','percent') COLLATE utf8_persian_ci NOT NULL,
  `more_less` enum('more','less') COLLATE utf8_persian_ci NOT NULL,
  `more_less_val` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_discount`
--

LOCK TABLES `users_discount` WRITE;
/*!40000 ALTER TABLE `users_discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validation`
--

DROP TABLE IF EXISTS `validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `API_Key` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validation`
--

LOCK TABLES `validation` WRITE;
/*!40000 ALTER TABLE `validation` DISABLE KEYS */;
/*!40000 ALTER TABLE `validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `uniq_id` varchar(10) NOT NULL DEFAULT '',
  `video_title` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `yt_id` varchar(50) NOT NULL DEFAULT '',
  `yt_length` mediumint(5) unsigned NOT NULL DEFAULT '0',
  `yt_thumb` varchar(255) NOT NULL DEFAULT '',
  `yt_views` int(10) NOT NULL DEFAULT '0',
  `category` varchar(30) NOT NULL DEFAULT 'none',
  `submitted` varchar(100) NOT NULL DEFAULT 'admin',
  `lastwatched` int(10) unsigned NOT NULL DEFAULT '0',
  `added` int(10) unsigned NOT NULL DEFAULT '0',
  `site_views` int(9) NOT NULL DEFAULT '0',
  `url_flv` varchar(255) NOT NULL DEFAULT '',
  `source_id` smallint(2) unsigned NOT NULL DEFAULT '0',
  `language` smallint(2) unsigned NOT NULL DEFAULT '0',
  `age_verification` enum('0','1') NOT NULL DEFAULT '0',
  `last_check` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `restricted` enum('0','1') NOT NULL DEFAULT '0',
  `allow_comments` enum('0','1') NOT NULL DEFAULT '1',
  `video_slug` varchar(255) NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `aparat` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniq_id` (`uniq_id`),
  KEY `added` (`added`),
  KEY `yt_id` (`yt_id`),
  KEY `featured` (`featured`),
  FULLTEXT KEY `fulltext_index` (`video_title`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id`, `uniq_id`, `video_title`, `description`, `yt_id`, `yt_length`, `yt_thumb`, `yt_views`, `category`, `submitted`, `lastwatched`, `added`, `site_views`, `url_flv`, `source_id`, `language`, `age_verification`, `last_check`, `status`, `featured`, `restricted`, `allow_comments`, `video_slug`, `position`, `aparat`, `deleted`) VALUES (84,'87592','اطلاع دادن خسارت به شرکت بیمه','اطلاع دادن خسارت به شرکت بیمه','',140,'https://bimitek.com/videos/img/13505681-1215__4786.jpg',0,'5','admin',1538705440,1534873855,1,'https://bimitek.com/videos/19da9e25c85c2db096ac94b52386d59113505681-240p__66452.mp4',1,1,'0',0,0,'0','0','1','%d8%a8%db%8c%d9%85%d9%87-%d9%85%d8%a7%d9%86-%d8%a8%da%86%d9%87-%d9%87%d8%a7',0,1,0),(85,'70638','حسن نیت در بیمه','حسن نیت در بیمه','',152,'https://bimitek.com/videos/img/13505669-4517__5174.jpg',0,'5','admin',0,1534873901,0,'https://bimitek.com/videos/865caa9038b3472bfe764c9278b7f1f813505669-240p__43225.mp4',1,1,'0',0,0,'0','0','1','%d8%a8%db%8c%d9%85%d9%87-%d8%a7%d8%b2%d8%af%d9%88%d8%a7%d8%ac-%d8%a8%db%8c%d9%85%d9%87-%d8%a7%db%8c%d8%b1%d8%a7%d9%86',0,1,0),(86,'56953','بیمه نامه عمر','بیمه نامه عمر','',174,'https://bimitek.com/videos/img/13505659-3122__9336.jpg',0,'5','admin',1538705463,1534873922,1,'https://bimitek.com/videos/dbe9998edbe21fb28bef0405c9bee18e13505659-240p__25756.mp4',1,1,'0',0,0,'0','0','1','%d9%87%d8%b4%d8%aa%d8%a7%d8%af-%d9%88-%d8%af%d9%88%d9%85%db%8c%d9%86-%d8%b3%d8%a7%d9%84%da%af%d8%b1%d8%af-%d8%aa%d8%a7%d8%b3%db%8c%d8%b3-%d8%a8%db%8c%d9%85%d9%87-%d8%a7%db%8c%d8%b1%d8%a7%d9%86',0,1,0),(87,'54949','بیمه عمر','بیمه عمر','',160,'https://bimitek.com/videos/img/13505651-4189__1639.jpg',0,'5,4,7,8,9','admin',1538705475,1534873963,2,'https://bimitek.com/videos/f35a53dfa65b2a224c6479b02c7e5f0d13505651-240p__11553.mp4',1,1,'0',0,0,'0','0','1','%d8%a8%db%8c%d9%85%d9%87-%d8%a7%db%8c%d8%b1%d8%a7%d9%86-%d9%87%d9%85%d8%b1%d8%a7%d9%87-%d8%a8%d8%a7-%d8%b2%d8%a7%d8%a6%d8%b1%d8%a7%d9%86-%d8%a7%d8%b1%d8%a8%d8%b9%db%8c%d9%86-%d8%ad%d8%b3%db%8c%d9%86',0,1,0),(88,'95909','بیمه مسئولیت','بیمه مسئولیت','',184,'https://bimitek.com/videos/img/13505639-9511__4334.jpg',0,'5,4,7,8,9','admin',1538705488,1534873995,2,'https://bimitek.com/videos/f51f7df4a695dce861e38b525878caad13505639-240p__94553.mp4',1,1,'0',0,0,'0','0','1','%da%af%d8%b2%d8%a7%d8%b1%d8%b4-%d9%85%d8%ac%d9%85%d8%b9-%d8%b9%d9%85%d9%88%d9%85%db%8c-%d8%b9%d8%a7%d8%af%db%8c-%d8%b3%d8%a7%d9%84%db%8c%d8%a7%d9%86%d9%87-%d8%a8%db%8c%d9%85%d9%87-%d8%a7%db%8c%d8%b1',0,1,0),(89,'95102','مدیریت ریسک','مدیریت ریسک','',128,'https://bimitek.com/videos/img/13505627-2225__3977.jpg',0,'5,4,7,8,9','admin',1538428098,1534874051,2,'https://bimitek.com/videos/4bdddc68023236e815a68179d402f78513505627-240p__32883.mp4',1,1,'0',0,0,'0','0','1','%db%8c%da%a9-%d9%85%d8%b1%d8%a8%db%8c%d8%8c-%d8%a7%d8%b9%d8%aa%d9%85%d8%a7%d8%af-%d8%b1%d8%a7-%d8%a7%d8%b9%d8%aa%d8%a8%d8%a7%d8%b1-%d9%85%db%8c-%d8%a8%d8%ae%d8%b4%d8%af',0,1,0),(90,'29927','احراز هویت شبکه فروش','احراز هویت شبکه فروش','',195,'https://bimitek.com/videos/img/13505616-1794__4284.jpg',0,'4','admin',0,1534874086,0,'https://bimitek.com/videos/b902e893ade340c4cf08508cd0839a2713505616-240p__41732.mp4',1,1,'0',0,0,'0','0','1','%d8%ad%d9%85%d8%a7%db%8c%d8%aa-%d8%a7%d8%b2-%d9%85%db%8c%d8%b1%d8%a7%d8%ab-%d8%a7%d8%b1%d8%b2%d8%b4%d9%85%d9%86%d8%af-%d9%86%db%8c%d8%a7%da%a9%d8%a7%d9%86%d9%85%d8%a7%d9%86-%d8%b1%d8%a7-%d9%88%d8%b8',0,1,0),(91,'46816','بیمه و رعایت اصول ایمنی','بیمه و رعایت اصول ایمنی','',126,'https://bimitek.com/videos/img/13505594-7945__2529.jpg',0,'4','admin',1540673601,1534874109,6,'https://bimitek.com/videos/2bfcfe2cad30c12c6cfb835e64039a2513505594-240p__46312.mp4',1,1,'0',0,0,'0','0','1','%d9%85%d8%b1%d8%a7%d8%b3%d9%85-%d8%a7%d8%ae%d8%aa%d8%aa%d8%a7%d9%85%db%8c%d9%87-%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%d8%a8%db%8c%d9%85%d9%87-%d8%b9%d9%85%d8%b1-%d8%b3%d8%a7%d9%85%d8%a7%d9%86',0,1,0),(92,'64057','حسن نیت','حسن نیت','',147,'https://bimitek.com/videos/img/13505578-5435__3213.jpg',0,'5,4,7,8,9','admin',1536077129,1534874133,2,'https://bimitek.com/videos/98dce40cb08254d31a29c8bedf8ec1d513505578-240p__80777.mp4',1,1,'0',0,0,'0','0','1','%d8%a7%d8%ae%d8%aa%d8%aa%d8%a7%d9%85%db%8c%d9%87-%d8%ac%d8%b4%d9%86%d9%88%d8%a7%d8%b1%d9%87-%db%8c%da%a9-%d8%b9%d9%85%d8%b1-%d9%85%d8%b7%d9%85%d8%a6%d9%86',0,1,0),(93,'58048','تمدید بیمه نامه','تمدید بیمه نامه','',142,'https://bimitek.com/videos/img/13505563-6974__3311.jpg',0,'5,4,7,8,9','admin',0,1534874160,0,'https://bimitek.com/videos/4c8103fb04d9b1ec45d86fc070c994a213505563-240p__88450.mp4',1,1,'0',0,0,'0','0','1','%e2%9c%85-%d8%a8%d9%87-%d8%b3%d8%a7%d9%85%d8%a7%d9%86-%d8%a8%d8%b1%d8%b3',0,1,0),(94,'95145','بیمه آتش سوزی','بیمه آتش سوزی','',117,'https://bimitek.com/videos/img/13505553-8675__9297.jpg',0,'5,4,7,8,9','admin',1540735183,1534874186,18,'https://bimitek.com/videos/d55b56aff7458402d798b61526e3a95d13505553-240p__79167.mp4',1,1,'0',0,0,'0','0','1','%d9%85%d9%88%d8%b4%d9%86-%da%af%d8%b1%d8%a7%d9%81%db%8c%da%a9-%d8%a8%db%8c%d9%85%d9%87-%d8%b9%d9%85%d8%b1-%d9%88-%d8%aa%d8%b4%da%a9%db%8c%d9%84-%d8%b3%d8%b1%d9%85%d8%a7%db%8c%d9%87-%d8%b3%d8%a7%d9%85',0,1,0);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `for` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `id_sell` int(10) NOT NULL,
  `amount` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `type` enum('plus','minus') COLLATE utf8_persian_ci NOT NULL,
  `extant` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf8_persian_ci NOT NULL,
  `wallet_type` enum('cash','credit') COLLATE utf8_persian_ci NOT NULL,
  `factor` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `msg` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet`
--

LOCK TABLES `wallet` WRITE;
/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
INSERT INTO `wallet` (`id`, `username`, `date`, `for`, `id_sell`, `amount`, `type`, `extant`, `status`, `wallet_type`, `factor`, `msg`) VALUES (1,'f5b5d8642901b23f2d184893ffbd20ac','1398-01-02','شارژ حساب',0,'800000','plus','800000','active','cash','123456',''),(2,'d9539d086564e50d887c45424890e6d9','','شارژ کیف پول',0,'50000','plus','50000','deactive','cash','557297394',''),(3,'d9539d086564e50d887c45424890e6d9','','شارژ کیف پول',0,'100000','plus','100000','deactive','cash','13713104',''),(4,'d9539d086564e50d887c45424890e6d9','','شارژ کیف پول',0,'20000','plus','20000','active','cash','873356751',''),(5,'d9539d086564e50d887c45424890e6d9','','شارژ کیف پول',0,'100000','plus','120000','active','cash','720311707',''),(6,'d9539d086564e50d887c45424890e6d9','','شارژ کیف پول',0,'50000','plus','170000','active','cash','910886322','');
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hadafsaz_doctor'
--

--
-- Dumping routines for database 'hadafsaz_doctor'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14 10:37:48
