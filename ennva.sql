-- MySQL dump 10.13  Distrib 5.6.26, for Linux (x86_64)
--
-- Host: localhost    Database: symfony
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `date_delete` datetime DEFAULT NULL,
  `date_edit` datetime DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'redirect alla home page',NULL,NULL,'Home'),(2,' Established in 1988, Quanta Computer is the largest notebook computer ODM company in the world. With leading technology and strong R&D capability, Quanta has become a leader in hi-tech markets and the best partner providing quality design and manufacturing services to top-notched brands worldwide for technology products. Besides continuous high growth, high quality and high value creation in notebook computers, Quanta has extended its businesses into enterprise network systems, home entertainment, mobile communication, automotive electronics and digital home markets. With revealing \"Cloud Computing\" as the center of business innovation and development, Quanta has been integrating resources and redefining business model to capture emerging growth opportunities. <br /><br />\n\n\"Rooted in Taiwan with broad vision and aggressive expansion in the global market\" is Quanta\'s strategy for long-term growth development. With \"Quanta R&D Complex\" (QRDC) as our global headquarters and the center of dynamics, we integrated worldwide resources in technology to ensure that Quanta Computer Inc. has technological advantages to design, develop, and manufacture high value-added products and solutions for customers. In addition, we have established operation centers across Asia, America, and Europe to manufacture, configure, and service products as well as to provide logistic supports to deliver products and services competitively everywhere in the world.\nQuanta has over 70,000 employees worldwide, of which around 5,000 people are located in headquarters with the majority working in R&D and engineering development. QRDC, inaugurated in late 2005, is a symbol of Quanta\'s long-term deep-rooted investment in Taiwan. As an intelligent building, QRDC has three major functions, including R&D, humanity and arts, as well as educational and leisure activities. The facility is also equipped with laboratories, stadium seating art performance hall—\"Quanta Hall\", library, art gallery, gym and swimming pool. The construction of QRDC with advanced facility meets our goal to harmonize humanity and technology. Capable of accommodating up to 7,000 employees, QRDC is unprecedented in the information industry in Taiwan in terms of architectural designs, space planning, intelligent functions and size.\nQuanta Computer continues to seek innovation and strives to exceed excellence through innovative product design, core technology advancement, and expansion into Non-NB product development. Quanta Computer is vastly invested in research & development with focuses on product innovation to further advance our competitive edge. In recent years, we have continuously demonstrate our innovative thinking in various areas, including cloud computing technology, servers, high definition video conferencing systems, touch panels, manufacturing processes, 3D images, and satellite technology. Furthermore, many intellectual property rights were granted to the aforementioned technology, while we expect to commercialize those innovative ideas in the future. The core business of Quanta Computer lies in notebook PCs, the area that we constantly demonstrate expertise and excellence in notebook manufacturing technology and innovative product design. In addition to our core business in notebook PCs, we expect product diversification into other non-NB area to accelerate gradually in coming years.',NULL,NULL,'Introduction'),(3,'Our Brands',NULL,NULL,'Brands'),(4,'Our Certification',NULL,NULL,'Certification'),(5,'Our current jobs offers ',NULL,NULL,'Job vacancies'),(6,'Links to our partners and collaborator.\r\n\r\n<br /><br />\r\n\r\nLinks to technical lectures.\r\n\r\n',NULL,NULL,'More'),(7,'Tech support description',NULL,NULL,'Tech support'),(8,'When Alex Ikonn and his wife Mimi realized how hard it was to find good hair extensions, they knew they had stumbled on a business opportunity. \n<br /><br />\nThey took their problem and solved it by creating Luxy Hair - an extremely successful online store selling hair extensions for women.\n<br /><br />\nAnd the coolest part? Their business is powered almost exclusively by tutorial-style YouTube videos.  \n<br /><br />\nTheir YouTube channel was created in 2010 and since then has amassed 1,474,246 subscribers and 173,657,125 total video views.\n<br /><br />\nIn other words, Luxy Hair is the perfect example of an audience enabled business that relies on a loyal community of fans instead of other channels like SEO and paid advertising. \n<br /><br />\nI caught up with Alex to find out how they took their site from idea to million dollar business. ',NULL,NULL,'E-commerce'),(9,'Server @ Software',NULL,NULL,'Server @ Software'),(10,'Management software',NULL,NULL,'Management software'),(11,'ERP',NULL,NULL,'ERP'),(12,'CRM',NULL,NULL,'CRM'),(13,'BUSINESS INTELIGENCE',NULL,NULL,'BUSINESS INTELIGENCE'),(14,'FINANCING',NULL,NULL,'FINANCING'),(15,'Web Services',NULL,NULL,'Web Services'),(16,'Web Design',NULL,NULL,'Web Design'),(17,'Web Marketing',NULL,NULL,'Web Marketing'),(18,'Web Hosting',NULL,NULL,'Web Hosting'),(19,'Graphic Design',NULL,NULL,'Graphic Design'),(20,'Achievements',NULL,NULL,'Achievements'),(21,'Highlights',NULL,NULL,'Highlights'),(22,'Contact',NULL,NULL,'Contact');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subpages`
--

DROP TABLE IF EXISTS `subpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subpages`
--

LOCK TABLES `subpages` WRITE;
/*!40000 ALTER TABLE `subpages` DISABLE KEYS */;
INSERT INTO `subpages` VALUES (1,'Story','story of the company',NULL,NULL,2),(2,'Organization','strutture on company organization',NULL,NULL,2);
/*!40000 ALTER TABLE `subpages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-31 10:58:48
