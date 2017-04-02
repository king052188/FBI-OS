CREATE DATABASE  IF NOT EXISTS `dbfbi_os_v1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbfbi_os_v1`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbfbi_os_v1
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `member_basic_table`
--

DROP TABLE IF EXISTS `member_basic_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_basic_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `streets` varchar(300) DEFAULT NULL,
  `barangay` varchar(80) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `education_attainment` tinyint(4) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `skills` varchar(200) DEFAULT NULL,
  `citizenship` varchar(20) DEFAULT NULL,
  `blood_type` varchar(10) DEFAULT NULL,
  `civil_status` tinyint(4) DEFAULT NULL,
  `sss_no` varchar(20) DEFAULT NULL,
  `tin_no` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_basic_table`
--

LOCK TABLES `member_basic_table` WRITE;
/*!40000 ALTER TABLE `member_basic_table` DISABLE KEYS */;
INSERT INTO `member_basic_table` VALUES (1,1,'lot 5 block 7 Eucalyptus St. A','Gordon Heights','Olongapo','Zambales','2200','NA','09474746282',3,'Software Engineer','Programmer, IT Network, Server and Driver','Philippines','NA',1,'NA','NA','2017-03-29 08:42:16','2017-03-29 08:42:16'),(2,4,'Blk. 6 Lot 1 Sealion St. Seaside Subd.','Matina Aplaya','Davao City','Davao del Sur','8000',NULL,'09085916321',3,'Retired Govt Employee','Driving, Computer Operation','Filipino','O',2,'GSIS 60032200152','121-006-240','2017-03-29 10:21:39','2017-03-29 10:10:05'),(3,22,'2544-B P. Villanueva St Pasay','87','Pasay','Manila','1300',NULL,'09175437884',3,NULL,NULL,NULL,NULL,2,'3387370395','302780532','2017-03-29 11:11:39','2017-03-29 11:11:39'),(4,62,'304 NTA Staffhousing,','17 Tabug','Batac City','Ilocos Norte','2906','09988695479','09953473650',3,'Financial Advisor/Tax Agent','Estate Planning','Philippines','O',2,'52092501108','119-789-975','2017-03-29 12:46:07','2017-03-29 12:46:06'),(5,71,'138','Barangay 30-B','Laoag City','Ilocos Norte','2900',NULL,'09100545038',3,'freelance','mass communication','Filipino','o',0,'1234567','925621287','2017-03-30 10:00:59','2017-03-30 10:00:59'),(6,60,'Sitio Cabot','Barangay Amaronan','Umingan','Pangasinan','2443',NULL,'09106142435',3,'Computer Technician','Data Encoder/Technician','Filipino','B',1,'1111111111111','111-111-111-000','2017-03-30 23:52:37','2017-03-30 23:52:37'),(7,2,'308 Macatangay St.','Poblacion','Ibaan','Batangas','4230',NULL,'09178772110',3,'Self employed','Taekwondo instructor','Philippines','O',2,'03-8802910--1','131-255-682-000','2017-03-31 01:17:02','2017-03-31 01:17:02');
/*!40000 ALTER TABLE `member_basic_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_beneficiary_table`
--

DROP TABLE IF EXISTS `member_beneficiary_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_beneficiary_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `name_of_beneficiary` varchar(200) DEFAULT NULL,
  `same_with_primary` tinyint(4) DEFAULT NULL,
  `streets` varchar(300) DEFAULT NULL,
  `barangay` varchar(80) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_beneficiary_table`
--

LOCK TABLES `member_beneficiary_table` WRITE;
/*!40000 ALTER TABLE `member_beneficiary_table` DISABLE KEYS */;
INSERT INTO `member_beneficiary_table` VALUES (1,1,'Gladys Alcantara Yusi',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-29 08:42:40','2017-03-29 08:42:40'),(2,4,'Sir Anthony Francis D. Domingo',0,'125 Gen. Luna St.','20','Laoag City','Ilocos Norte','2800',NULL,'09218928494',NULL,'2017-03-29 10:23:38','2017-03-29 10:23:38'),(3,22,'Cindy Tejada Hernandez',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-29 11:11:59','2017-03-29 11:11:59'),(4,62,'Crescencia B. Paculan',0,'304 NTA Staffhousing','17 Tabug','Batac City','Ilocos Norte','2906','09988695479','09953473650','mikepaculan.1978@gmail.com','2017-03-29 12:48:20','2017-03-29 12:48:19'),(5,71,'Ma Hazel Wenda',0,'Sitio Rang-ay','Poblacion 2','Pagudpud','Ilocos Norte','2919',NULL,'09100545038',NULL,'2017-03-30 10:03:01','2017-03-30 10:03:01'),(6,60,'Carolina Diza Motea',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-30 23:52:58','2017-03-30 23:52:58'),(7,2,'Mariebel P. Bernardo',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-03-31 01:17:41','2017-03-31 01:17:41');
/*!40000 ALTER TABLE `member_beneficiary_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_table`
--

DROP TABLE IF EXISTS `member_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_table` (
  `Id` int(11) NOT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `hash_code` varchar(60) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `middle_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `endorse_uid` int(11) DEFAULT NULL,
  `specialist_uid` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_table`
--

LOCK TABLES `member_table` WRITE;
/*!40000 ALTER TABLE `member_table` DISABLE KEYS */;
INSERT INTO `member_table` VALUES (1,1,'57715c7099043577b424ba386eea6092','king.a','3e9e1868bb0ecdff876f11a6ae5388ba','king paulo','cabalo','aquino',NULL,1,'me@kpa21.info','09177715380',0,0,2,2,'2017-03-29 08:53:59','2017-03-28 07:24:38'),(2,1,'78ac81cfae86880313195fbb934a28e5',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Antonino','Saludo','Bernardo','1967-12-07 00:00:00',1,'myrichdad77@gmail.com','09178772110',1,0,2,2,'2017-03-31 01:20:27','2017-03-16 01:01:41'),(3,1,'2f13a2e4ec94aedd114efb7ed5e200d3',NULL,'182d3db361e15ef93f0b4e2c8178f838','Gladys','Alcantara','Yusi','1996-08-11 00:00:00',2,'gladysalcantarayusi@gmail.com','09771819050',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 01:05:50'),(4,1,'9a0ec09b3ffb7a11b1dcbd5a51ac475b',NULL,'541c9a0605f8daa2b7f1b452925a82c4','FRANCIS','BARTOLOME','DOMINGO','1960-03-22 00:00:00',1,'francis707d@gmail.com','+639085916321',2,0,2,2,'2017-03-29 10:25:05','2017-03-16 01:30:37'),(5,1,'294225c812b839e83dd5acc78ce8a7f0',NULL,'a2640fef85543c43195ecf8c3ca13cd6','Jenny','Doctor','Peralta','1974-04-04 00:00:00',1,'jennydperalta@gmail.com','+639772175304',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 01:40:01'),(6,1,'9bd9aba1a679aa19971beb59429aff3d',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Maria Loreta','Aquino','Lozano','1974-01-10 00:00:00',2,'kizuna2012.ml@gmail.com','09206024150',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 01:41:17'),(7,1,'6fd1d9d2ee66d2dae580c3c963d59eb7',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Lolita','Bosita','Del Valle','1955-04-03 00:00:00',2,'jcblolit@yahoo.com','09502370299',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 01:56:25'),(8,1,'2b220d7ecf16bd277ef125175413aff3',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Benedicto','Cavaneyro','Asmiralde','2017-03-16 00:00:00',1,'basmiralde@yahoo.com','09208100541',6,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 02:18:50'),(9,1,'5b8181b2405f884c3f4d9313c15263dd',NULL,'541c9a0605f8daa2b7f1b452925a82c4','THERESITA','MEANA','CERALDE','1959-07-17 00:00:00',2,'tmceralde@yahoo.com','+639209239887',4,0,NULL,-1,'2017-03-28 07:24:38','2017-03-16 03:18:29'),(10,1,'bbf524ffdadbcc9932f3dbf9a78e8c6d',NULL,'541c9a0605f8daa2b7f1b452925a82c4','THERESITA','MEANA','CERALDE','1959-07-17 00:00:00',2,'tmceralde@yahoo.com','+639209239887',4,0,NULL,-1,'2017-03-28 07:24:38','2017-03-16 03:18:40'),(11,1,'0bd5886a28f6aaf06e39b4604ca1ebee',NULL,'541c9a0605f8daa2b7f1b452925a82c4','THERESITA','MEANA','CERALDE','1959-07-17 00:00:00',2,'tmceralde@yahoo.com','+639209239887',4,0,NULL,-1,'2017-03-28 07:24:38','2017-03-16 03:18:44'),(12,1,'fd390ba581e00403d3cdd66f50ed52ec',NULL,'541c9a0605f8daa2b7f1b452925a82c4','THERESITA','MEANA','CERALDE','1959-07-17 00:00:00',2,'tmceralde@yahoo.com','+639209239887',4,0,NULL,-1,'2017-03-28 07:24:38','2017-03-16 03:18:44'),(13,1,'8471fe80938a0efc39fc1bb2ff19ff8d',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Ambrosio','Pangkiwat','Guzman','1962-09-14 00:00:00',1,'bruce62.9guzman@gmail.com','09084113091',6,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 03:35:53'),(14,1,'6ef413215e8ff0cadf362ff4990a503d',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Vinda','Antonio','Dones','1967-07-11 00:00:00',2,'vindones@yahoo.com','0191380928',6,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 03:38:59'),(15,1,'0221964edfc375e5226a97dffbd2afa8',NULL,'541c9a0605f8daa2b7f1b452925a82c4','Francis','Bagalayos','Bagay','1977-06-16 00:00:00',1,'bagayfranz@gmail.com','09754514966',3,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 13:45:53'),(16,1,'5205649728f1cf8864dbaae0b5548203',NULL,'fa26fc6c99d85880ff446b27e306521d','Jason','212','Marsel','1988-11-16 00:00:00',1,'jason.marsel@gmail.com','09165934729',3,0,NULL,1,'2017-03-28 07:24:38','2017-03-16 15:47:14'),(17,1,'5c5c193caee2eac6c1c3cccf698c235e',NULL,'53947b0bf05bf48214810fcc63da9a85','aris','devora','artates','1976-07-10 00:00:00',1,'arisartates@gmail.com','09178446816',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 00:24:09'),(18,1,'2553819551b7fcad994759c6c383751f',NULL,'ced4c58ce5792ca36b29f70b2c36e08c','Fe','Sevilleja','Sudara','1969-04-11 00:00:00',2,'fesudara0411@gmail.com','09064765643',6,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 01:47:03'),(19,1,'7f3adfddf70ae32fbe03727fb4dba151',NULL,'3e17c6864752deabaa9e500c1ea574e0','Joey','Raciles','Requizo','1979-01-02 00:00:00',1,'joey.requizo@yahoo.com','09494124480',6,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 01:49:30'),(20,1,'543d7f94313df2572bb86f10c270302e',NULL,'b8cc04fb9e7f67ca3a5ec1fc5df51543','Florante','Cari','Ganuelas','1972-04-08 00:00:00',1,'fcganuelas@gmail.com','09204351120',8,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 01:56:52'),(21,1,'d0e4309da68d375f8b7722f417733991',NULL,'362af322ba5a9161003044cb7138fed2','Florita','Racelis','Dumaguin','1965-12-22 00:00:00',2,'fumaguinflor@yahoo.com','09089792193',8,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 01:59:23'),(22,1,'240747937283f3be698616759de2988d',NULL,'62eb3b9472024e6a03ebbac49f9e3f1c','Jamws Ryan','Abad','Hernandez','1981-02-04 00:00:00',1,'jamesryan.hernandez@gmail.com','09175437884',5,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 03:46:31'),(23,1,'53600b1d663546050e4f2231661bd30d',NULL,'701846367af21172b285ab37ab2f3275','Cherry','Supe','Fennis','2017-03-17 00:00:00',2,'csfennis@gmail.com','0905-3158610',22,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 05:56:14'),(24,1,'ef65a42ffde18388e55e38db624bc81a',NULL,'cd4bbbdfe582e441ddf037f32a6c61ed','Cherry','Supe','Fennis','2017-03-17 00:00:00',2,'csfennis@gmail.com','09053158619',22,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 06:22:52'),(25,1,'d8d12510a12156bc5413bf4a52c4246f',NULL,'429114e0dd237045a17368ac3b51f57d','leody','lingbanan','guzman','1986-01-02 00:00:00',1,'leody.guzman.pnp@gmail.com','09301896363',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 06:37:05'),(26,1,'618a6f0f35cb7552a310555aeb22c79c',NULL,'cd29bd46ab024276a7b5b83c465a7b7a','Charlie','Niel','Higgins','1974-03-12 00:00:00',1,'chiggins1974.ch@gmail.com','0538502301',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 14:53:51'),(27,1,'441cf378038cb408b4286c45ee393ffe',NULL,'3815c9e111823976aead1f258fff9fe9','jocelyn','gerardo','domingo','1983-08-26 00:00:00',2,'jamaica30.jd@gmail.com','+85268913554',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-17 23:05:26'),(28,1,'be1d27837622cdad9b62035da32a58ca',NULL,'02f92c8b6e6f19cc4b50e122e14946b7','Jun','Dela Cruz','Bagay','1977-06-04 00:00:00',1,'bagayjun@ymail.com','09166477966',5,0,NULL,1,'2017-03-28 07:24:38','2017-03-18 02:38:02'),(29,1,'255b51a604c3c3acf4ef3aa4a1a076fd',NULL,'d3430011d9d7d4f2318b7bcfe7b0f497','Ambrosio','Pangkiwat','Guzman','1962-09-14 00:00:00',1,'ambrosiopguzman@gmail.com','09184083064',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-18 05:32:30'),(30,1,'42099fb08a759ccf8363ccd2ce17fa5a',NULL,'941bc39c2ce6f31a16946aa3b135d634','ambrosio','pangkiwat','guzman','1962-09-14 00:00:00',1,'ambrosiopguzman@gmail.com','09184083064',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-18 05:41:49'),(31,1,'ee2c1443526cac881cbff6cb9b66637d',NULL,'b2630869f13e331c22e5a927f12e89ec','Mylene','Maregmen','Pineda','1982-06-20 00:00:00',2,'mylen3pineda@gmail.com','+974-7445-2941',28,0,NULL,1,'2017-03-28 07:24:38','2017-03-18 07:04:19'),(32,1,'86a0eb5c3e705221cfcb87e7327a05e3',NULL,'a309329725900953a0acc170836072f2','Mylene','Maregmen','Pineda','1982-06-20 00:00:00',2,'mylenepineda22@gmail.com','+974-7445-2941',28,0,NULL,1,'2017-03-28 07:24:38','2017-03-18 07:58:51'),(33,1,'d3bcbfbf076857fc2d72c936c1a54bcf',NULL,'0a1a22662369cc1865de0c220c529409','FRANCIS','BARTOLOME','DOMINGO','1960-03-22 00:00:00',1,'francis707d@gmail.com','+639085916321',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-19 15:15:43'),(34,1,'50b6b285d03b98a7001bda28256cbd12',NULL,'e61dc54d546a627d6e15c7cf23b22f7c','THERESITA','MEANA','CERALDE','1959-07-17 00:00:00',2,'tmceralde@yahoo.com','+639209239887',4,0,NULL,1,'2017-03-28 07:24:38','2017-03-19 15:49:38'),(35,1,'b598462a3d6fdcb972b9cad73d7dac8e',NULL,'541c9a0605f8daa2b7f1b452925a82c4','LEONA','DOMINGO','GASATAN','1957-11-17 00:00:00',2,'leny_gasatan@yahoo.com','+639153618604',4,0,NULL,1,'2017-03-28 07:24:38','2017-03-19 16:12:32'),(36,1,'7a39a3d5a2e35a1141fdc0ed6cc44888',NULL,'b417785616957e9dfee6ff861399d3d6','CARMELITA','PETILLA','PANTOJA','1949-12-21 00:00:00',2,'pantojacarmelita@yahoo.com','+639218928494',4,0,NULL,1,'2017-03-28 07:24:38','2017-03-19 16:16:40'),(37,1,'2927f1d62afd7610291b0f0eb8b1aa84',NULL,'1a7415542e168273100f29f2da211242','Hobert','Cadungog','Binagatan','1966-04-28 00:00:00',1,'hobert28mmm@gmail.com','09057228359',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-20 00:59:46'),(38,1,'27b8de0c2fd98a68d0846b8a1ce62290',NULL,'8da72554ccdab8f9631af52e0940d984','edgar','marinas','cacayuran','1967-12-02 00:00:00',1,'egaycaca@gmail.com','09301229074',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-20 04:05:20'),(39,1,'41a1f3df8a046604323b0a3961681bc3',NULL,'07d6704d28f4733fcfdebb3fab3734f5','Loreta','Tale','Navera','1956-06-20 00:00:00',2,'oyetnavera@gmail.com','09391471224',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-20 05:44:26'),(40,1,'dcc6f2ea50f4a0f06be83225f617ad9d',NULL,'2223513c3a34c3992e4d4fa196ec0952','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'raseru95@gmail.com','09106142435',5,0,NULL,1,'2017-03-28 07:24:38','2017-03-20 12:48:41'),(41,1,'ba4dc453c2a11f2fb702fd29488c9d61',NULL,'892f35774a28126b597a24efef5f7836','Roberto','Rico','Osorio','1980-02-09 00:00:00',1,'robertoricoosorio@gmail.com','09123805359',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-20 13:52:38'),(42,1,'f5b94b6b8ccee9e52efaef8062fe5557',NULL,'2cb6b98adca81fa1b419b7b1d71c97af','Ever','Gelsano','Solloso','1985-06-22 00:00:00',1,'reve19@gmail.com','09369687878',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 02:07:24'),(43,1,'4dac07b83628f606dd27c5a6c1ccc9a5',NULL,'3f2544a88336e83f1022b9ed76396ca4','Abubakar','Ismail','Barahama','2017-03-21 00:00:00',1,'region9zamboanga_a@yahoo.com','09758321888',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 02:17:37'),(44,1,'b4907b869089c8c1a7bc46cf5a8548ba',NULL,'8ecce475885ac85680e8337e539013b0','Abubakar','Ismail','Barahama','1972-03-10 00:00:00',1,'region9zamboanga_a@yahoo.com','09758321888',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 02:33:36'),(45,1,'3ac8f0a478eea92a8376d2cd11d5567a',NULL,'695aade4611e86f8b704a6c2157ee4ec','Benjie','Pecson','Plaza','1984-05-20 00:00:00',1,'bpazalp520@gmail.com','09998822079',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 08:34:45'),(46,1,'1f5a5e8bbdd67a811505e9f59f43c926',NULL,'b51d9c14c86b7bc6a095e06f2356ea91','BENJIE','PECSON','PLAZA','1984-05-20 00:00:00',1,'bpazalp520@gmail.com','+639998822079',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 10:29:33'),(47,1,'11a55dcc57e50b87342a3fe0f5596949',NULL,'9be07c365eb8950e8fdfe87eec65446e','Marlytte','Viscaya','Plaza','1984-03-10 00:00:00',2,'bmlytte84@gmail.com','09504407933',45,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 11:24:55'),(48,1,'b7724a2537a51a2a1fa4c35840918352',NULL,'85fd70bbe3dec6399aca9e2274293df0','Marlytte','Viscaya','Plaza','1984-03-10 00:00:00',2,'bmlytte84@gmail.com','09504407933',45,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 11:25:00'),(49,1,'e76a2e6ee07f8daa5e90f37976d9e2f4',NULL,'89e29149665e488e84517393eef462ec','Maria Ana','Ragos','Peralta','1973-12-06 00:00:00',2,'maria.anarperalta@gmail.com','+639122228884',5,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 20:34:35'),(50,1,'a2843b5021e74709111fd9ec55c3c852',NULL,'7557438b16d9ca9d01dbd9dedbdf1dd0','Miguel','Aumentado','Paculan','1952-09-25 00:00:00',1,'mikepaculan.prex@yahoo.com.ph','9988695479',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 21:02:00'),(51,1,'a3a8d79bc72142aa0bf6b342885bbb55',NULL,'1bec48d494b4395021d642116b84a382','Miguel','Aumentado','Paculan','1952-09-25 00:00:00',1,'mikepaculan.prex@yahoo.com.ph','9988695479',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-21 21:02:00'),(52,1,'69f1bd9df5938cee0e703bd5d2e11f10',NULL,'53ebba17fcf56ac5df4c71ce692abc56','Orland','Tadeo','Juachon','1986-07-15 00:00:00',1,'orland.juachon@yahoo.com','+639176299636',45,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 01:25:35'),(53,1,'4efb3016d168af989da4397b861c7101',NULL,'8e38fc3e82473ce1251a70ae29d9764a','james','cua','po','1964-05-17 00:00:00',1,'pojames964@gmail.com','09161369999',45,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 01:57:35'),(54,1,'e028b2379b0288487107a0168e8ae52e',NULL,'cb284fe98741b5f95b8baae2ed68ddb4','ROMAN','ZOILO','TORTOR','1961-08-08 00:00:00',1,'roman53tortor@gmail.com','9485294184',45,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 02:19:41'),(55,1,'b567ca6afb757a86b7bafdb16fc668da',NULL,'b083b0970fa7b1f67ea47a5099c8e49e','FRANSCHELINE ORVETTE','DOMINGO','LOAYON','1986-07-04 00:00:00',2,'meggy4786@gmail.com','09196305305',4,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 11:18:18'),(56,1,'e1c544c7a5e60d1e600ce08e31bb8c35',NULL,'34588b9988260fe4b3485562298f278c','Miguel','Aumentado','Paculan','1952-09-25 00:00:00',1,'mikepaculan.prex@yahoo.com.ph','9988695479',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 14:23:56'),(57,1,'0d7036fc0ee56d78891c1736c3fa4ed1',NULL,'a4ebb44170c00acefcc4a13410f5f7e7','Miguel','Aumentado','Paculan','1952-09-25 00:00:00',1,'mikepaculan.prex@yahoo.com.ph','9988695479',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 14:23:57'),(58,1,'55674efae76379f8098218716dfc5dcc',NULL,'a5510108545119f87b036baa63e110b0','Miguel','Aumentado','Paculan','1952-09-25 00:00:00',1,'mikepaculan.prex@yahoo.com.ph','9988695479',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-22 14:36:26'),(59,1,'04a35043acc66f1d44f29ae21fb5a7dc',NULL,'fa6a162ed5ebf73afd1432d405ba98ed','Lover Cain','Ragos','Peralta','1996-11-25 00:00:00',1,'cainperalta4@gmail.com','09505074997',5,0,NULL,1,'2017-03-28 07:24:38','2017-03-23 01:49:13'),(60,1,'87e7272964f1b90ecdc1488016af74e0',NULL,'2223513c3a34c3992e4d4fa196ec0952','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'r.motea23@gmail.com','09106142435',2,0,2,2,'2017-03-30 23:54:23','2017-03-23 02:32:17'),(61,1,'dd240edd1a476d61c26903b957766665',NULL,'97e2a652932d496a9b1f2773026e873d','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'r.motea23@gmail.com','09106142435',40,0,NULL,1,'2017-03-28 07:24:38','2017-03-23 03:18:49'),(62,1,'2d49364d8607c52455cc4bd08fe98138',NULL,'427f0cc7c51c22bb278ef0ab5f3d37fa','MIGUEL','AUMENTADO','PACULAN','1952-09-25 00:00:00',1,'mikepaculan.1978@gmail.com','09988695479',36,0,3,2,'2017-03-29 13:04:04','2017-03-23 17:59:26'),(63,1,'71449e0497e89a1c4e2d2b53635803e0',NULL,'437f53860e91f1e908e1183b7a9daf0d','Reah Liza','Padaoan','Salvino','1981-01-08 00:00:00',2,'sreahliza1981@gmail.com','09298884850',14,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 01:23:01'),(64,1,'e651d52caee5fad7839fe6ed2098a4e1',NULL,'c58e7a1b7e98992cf1fa81a429b957ad','maria ligaya','fahigal','tomas','1946-01-06 00:00:00',2,'maligayatomas@gmail.com','09194616126',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 01:39:39'),(65,1,'c202a5327488ed813877e41dd98d2a28',NULL,'85fde4c5ffdc45739b069a9799fc1557','Armida','Botdoy','Dontogan','1980-11-10 00:00:00',2,'armidadontogan123@gmail.com','09297466732',14,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 02:39:06'),(66,1,'702731aa43e95ea2671f6375c487ae38',NULL,'69f60d672542d03e5e98df2369d0e0d2','Florence','Antonio','Dones','1967-10-15 00:00:00',2,'senoderolf@gmail.com','09085586815',14,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 06:51:14'),(67,1,'7505f72b9c321a5cdd605202e2b8b924',NULL,'0ff29c9e4a46281bed50cc5540416bb1','Ean Karem','Nardo','Sofla','1992-07-21 00:00:00',1,'esofl001@gmail.com','09465187660',14,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 06:53:50'),(68,1,'aed275fb83899b7658c561cb0d4ccbc2',NULL,'a8bdd89a2ef94c390ada6b559c073b27','Maria Ligaya','Fajigal','Tomas','1946-01-06 00:00:00',2,'maligayatomas@gmail.com','09194616126',62,0,NULL,1,'2017-03-28 07:24:38','2017-03-24 12:17:14'),(69,1,'d260064ab715fc1e7e92c4a729f564ac',NULL,'83ce9787528a979444cadfe21e77caf3','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'r.motea23@gmail.com','09106142435',60,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 00:40:19'),(70,1,'a68c44292842d19cafbe95fe91024535',NULL,'a8c5f34bdeb1ebc57726c5bd7e88d398','maureen','gasatan','gutierrez','1991-08-21 00:00:00',2,'maureengasatan@gmail.com','09058653954',35,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 01:37:03'),(71,1,'f3fdfc4176c458842f6289a7724ef18e',NULL,'b9d5bc695761420d13931906947927a6','joseph','lagadon','catubay','1969-08-17 00:00:00',1,'catubay_j@yahoo.com','09100545038',35,0,3,2,'2017-03-30 10:04:29','2017-03-25 01:58:12'),(72,1,'c84de909bd9533ed419512d1e6503ceb',NULL,'f0c2f4af2e39104f49bc3cc3d85c1087','francisca','burigsay','aurellano','1952-08-29 00:00:00',2,'francingaurellano@gmail.com','09287305068',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 02:58:08'),(73,1,'41cc9378722bd12d4112d9c0fbed4c4e',NULL,'a016a92d9561b4f2f81127db1f58d3a5','vevina','turia','ringcodan','1962-10-16 00:00:00',2,'vtr1016@gmail.com','09436200696',72,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 13:42:45'),(74,1,'6064da99197243e274e96f3408e7df6a',NULL,'983d94949f2e83ca98b29b3cfa520c52','madeline','felix','semana','1961-05-25 00:00:00',2,'madeline61susan@gmail.com','09757540682',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 14:27:10'),(75,1,'63437cce9a397d2d763a343b11dc7191',NULL,'f7886a13f5e80368d6165d50edc03d99','clifton','ramos','juan','1993-12-14 00:00:00',1,'drizes.clifton@gmail.com','09297990979',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-25 14:41:04'),(76,1,'3dd2565ce41c344481b3fce4f33c5390',NULL,'1f164727776bfd17e2325d5602be3285','Francis','Bagalayos','Bagay','1977-06-16 00:00:00',1,'bagayfranz@gmail.com','09754514966',3,0,NULL,1,'2017-03-28 07:24:38','2017-03-26 00:09:52'),(77,1,'a83ed7d985cdf14d40a7f0cbfc9b7bae','gerry.77','8dd2bc3ed072f016552d39a9a9a4a5f3','GERRY','LIBON','VILLA','1983-08-15 00:00:00',1,'villagerry1523@gmail.com','09995588438',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-27 02:56:44'),(78,1,'e9703edd92d1fb22e221a61d0cca3bc2','helen.78','3ff39b91e291f2ca8862de8187a920b9','HELEN','OLAYTA','BOSITA','1961-02-05 00:00:00',2,'hobosita888@gmail.com','.+6584918254',7,0,NULL,1,'2017-03-28 07:24:38','2017-03-27 03:56:58'),(79,1,'af77b6c340a7b7f367dd2aa50643080e','clifton.79','df4056adc2b2ca972ffdc1a571a4928f','clifton','ramos','juan','1993-12-14 00:00:00',1,'drizer.clifton@gmail.com','09297990979',36,0,NULL,1,'2017-03-28 07:24:38','2017-03-27 03:59:43'),(80,1,'3e9394ca774d07cf6678fb9254bef82c','mariebel.80','625b6727f205fb32f3035dbb992fcdbb','MARIEBEL','PEREZ','BERNARDO','1960-12-12 00:00:00',2,'mabelpbernardo@yahoo.com','09175995914',2,0,NULL,1,'2017-03-28 07:24:38','2017-03-28 05:32:17'),(81,1,'15e877d90ae80b778d24adbcfc4b720d','rusell.81','7122193c5be7252a505ac2bacdf71e25','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'raseru95@gmail.com','09106142435',40,0,NULL,1,'2017-03-28 07:24:38','2017-03-28 06:20:58'),(82,1,'dcad6909198f23f7ab7a8de17f19d92a','rusell.82','4a1a2c160da1ee4d407bb2f7cc5aa128','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'raseru95@gmail.com','09106142435',40,0,NULL,1,'2017-03-28 07:24:38','2017-03-28 06:23:10'),(83,1,'87871b423e7a6e7735dab92bdfc21c7e','rusell.83','92bbd5f0e0146e821c6305599f5050ae','Rusell','Diza','Motea','1995-09-23 00:00:00',1,'raseru95@gmail.com','09106142435',40,0,NULL,1,'2017-03-29 02:16:05','2017-03-29 02:16:05'),(84,1,'b1529e77cb4773622218f694ea79a761','kayrapolly.84','87fdc8ee7cc81d662e46b53fe424515a','Kayra Polly','Yusi','Aquino','2016-10-20 00:00:00',2,'kingpauloaquino@gmail.com','09474746282',1,0,NULL,1,'2017-03-31 00:53:27','2017-03-31 00:53:27'),(85,1,'c2046fd6f8257d2e020aca670f758af7','rusell.85','a8c22b312b5273ad9e1153a768c9fcc6','Rusell','Diza','Motea','1995-09-23 00:00:00',2,'raseru95@gmail.com','09106142435',2,0,NULL,1,'2017-03-31 00:59:24','2017-03-31 00:59:24');
/*!40000 ALTER TABLE `member_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_table`
--

DROP TABLE IF EXISTS `payment_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_table` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `mode_of_payment` tinyint(4) DEFAULT NULL,
  `amount` decimal(18,4) DEFAULT NULL,
  `proof_of_payment_url` varchar(300) DEFAULT NULL,
  `confirming_a` tinyint(4) DEFAULT NULL,
  `confirming_b` tinyint(4) DEFAULT NULL,
  `confirming_c` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_table`
--

LOCK TABLES `payment_table` WRITE;
/*!40000 ALTER TABLE `payment_table` DISABLE KEYS */;
INSERT INTO `payment_table` VALUES (1,1,2,2,1500.0000,'NA',1,1,1,-1,'2017-03-29 08:42:54','2017-03-29 08:42:54'),(2,1,2,2,1500.0000,'NA',1,1,1,-1,'2017-03-29 08:50:46','2017-03-29 08:50:46'),(3,1,2,2,1500.0000,'NA',1,1,1,1,'2017-03-29 08:53:59','2017-03-29 08:53:59'),(4,4,2,0,1500.0000,'Paid',1,1,1,1,'2017-03-29 10:25:05','2017-03-29 10:25:05'),(5,62,3,1,1500.0000,'BPI deposit slip in the name of Francis Domingo',1,1,1,1,'2017-03-29 13:00:56','2017-03-29 13:00:56'),(6,71,3,1,1500.0000,'FRANCIS DOMINGO',1,1,1,1,'2017-03-30 10:04:29','2017-03-30 10:04:29'),(7,60,2,1,1500.0000,'Jenny Peralta',1,1,1,1,'2017-03-30 23:54:23','2017-03-30 23:54:23'),(8,2,2,1,1500.0000,'Anton',1,1,1,1,'2017-03-31 01:20:27','2017-03-31 01:20:27');
/*!40000 ALTER TABLE `payment_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-02 16:37:40
