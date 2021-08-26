-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: goncharov_db
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Phones','2021-08-03 13:58:05','2021-08-03 13:58:05'),(2,'Watches','2021-08-03 13:59:35','2021-08-04 00:56:10'),(3,'Tablets','2021-08-03 14:01:26','2021-08-03 14:01:26'),(4,'Notebooks','2021-08-03 14:01:26','2021-08-03 14:01:26'),(5,'Accessories','2021-08-03 14:01:26','2021-08-03 14:01:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_product` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_id_product` (`id_product`),
  KEY `index_id_user` (`id_user`),
  CONSTRAINT `fk_Orders_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Orders_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,2,'2021-08-15 02:32:23','2021-08-22 15:01:50'),(2,31,2,'2021-08-15 02:32:23','2021-08-22 15:01:50'),(3,15,2,'2021-08-15 02:32:23','2021-08-22 15:01:50'),(4,31,2,'2021-08-16 13:15:04','2021-08-22 15:01:50'),(10,26,1,'2021-08-23 12:37:19','2021-08-23 12:37:19'),(11,26,1,'2021-08-23 12:37:19','2021-08-23 12:37:19'),(12,26,1,'2021-08-23 12:37:19','2021-08-23 12:37:19'),(13,7,1,'2021-08-23 12:37:19','2021-08-23 12:37:46'),(14,6,1,'2021-08-23 12:37:19','2021-08-23 12:37:19'),(15,6,1,'2021-08-23 12:37:19','2021-08-23 12:37:19'),(16,7,1,'2021-08-23 17:12:00','2021-08-23 17:12:00'),(17,26,1,'2021-08-23 18:20:29','2021-08-23 18:20:29'),(18,26,1,'2021-08-23 18:20:29','2021-08-23 18:20:29'),(19,30,1,'2021-08-23 18:20:29','2021-08-23 18:20:29'),(20,30,1,'2021-08-23 18:20:29','2021-08-23 18:20:29'),(21,30,1,'2021-08-23 18:20:29','2021-08-23 18:20:29'),(22,7,1,'2021-08-24 13:44:36','2021-08-24 13:44:36'),(23,7,1,'2021-08-24 13:44:36','2021-08-24 13:44:36'),(24,14,2,'2021-08-24 13:50:33','2021-08-24 13:50:33'),(25,14,2,'2021-08-24 13:50:33','2021-08-24 13:50:33'),(26,14,2,'2021-08-24 13:50:33','2021-08-24 13:50:33'),(27,7,2,'2021-08-24 13:53:45','2021-08-24 13:53:45'),(28,7,2,'2021-08-24 13:56:05','2021-08-24 13:56:05'),(29,7,2,'2021-08-24 13:56:06','2021-08-24 13:56:06'),(30,7,2,'2021-08-24 13:56:06','2021-08-24 13:56:06'),(31,7,2,'2021-08-24 13:56:06','2021-08-24 13:56:06'),(32,7,2,'2021-08-24 13:56:06','2021-08-24 13:56:06'),(33,7,2,'2021-08-24 13:57:22','2021-08-24 13:57:22'),(34,14,1,'2021-08-24 14:27:38','2021-08-24 14:27:38'),(35,6,2,'2021-08-24 14:48:55','2021-08-24 14:48:55'),(36,28,2,'2021-08-24 14:48:55','2021-08-24 14:48:55'),(37,28,2,'2021-08-24 14:48:55','2021-08-24 14:48:55'),(38,21,1,'2021-08-24 14:50:04','2021-08-24 14:50:04'),(39,21,1,'2021-08-24 14:50:04','2021-08-24 14:50:04'),(40,26,1,'2021-08-24 14:50:04','2021-08-24 14:50:04'),(41,6,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(42,6,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(43,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(44,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(45,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(46,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(47,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(48,26,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(49,13,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(50,13,1,'2021-08-24 14:51:47','2021-08-24 14:51:47'),(51,7,1,'2021-08-24 15:28:18','2021-08-24 15:28:18'),(59,3,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(60,3,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(61,3,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(62,14,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(63,14,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(64,14,2,'2021-08-24 18:27:50','2021-08-24 18:27:50'),(65,21,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(66,21,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(67,21,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(68,21,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(69,30,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(70,30,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(71,30,2,'2021-08-24 18:33:49','2021-08-24 18:33:49'),(72,7,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(73,14,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(74,18,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(75,15,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(76,15,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(77,20,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(78,30,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(79,22,1,'2021-08-24 20:45:41','2021-08-24 20:45:41'),(80,7,2,'2021-08-24 20:49:36','2021-08-24 20:49:36'),(81,22,2,'2021-08-24 20:49:36','2021-08-24 20:49:36'),(82,26,2,'2021-08-24 20:49:36','2021-08-24 20:49:36'),(83,26,2,'2021-08-24 20:49:36','2021-08-24 20:49:36'),(95,7,1,'2021-08-24 22:29:14','2021-08-24 22:29:14'),(96,7,1,'2021-08-24 22:29:14','2021-08-24 22:29:14'),(97,25,1,'2021-08-24 22:29:14','2021-08-24 22:29:14'),(98,25,1,'2021-08-24 22:29:14','2021-08-24 22:29:14'),(99,7,2,'2021-08-25 11:29:44','2021-08-25 11:29:44'),(100,26,2,'2021-08-25 11:29:44','2021-08-25 11:29:44'),(101,30,2,'2021-08-25 11:29:44','2021-08-25 11:29:44'),(102,7,2,'2021-08-26 15:23:27','2021-08-26 15:23:27'),(103,8,2,'2021-08-26 15:23:27','2021-08-26 15:23:27'),(104,8,2,'2021-08-26 15:23:27','2021-08-26 15:23:27'),(105,25,2,'2021-08-26 15:23:27','2021-08-26 15:23:27'),(106,25,2,'2021-08-26 15:23:27','2021-08-26 15:23:27'),(107,8,2,'2021-08-26 15:51:26','2021-08-26 15:51:26'),(108,8,2,'2021-08-26 15:51:26','2021-08-26 15:51:26'),(109,25,2,'2021-08-26 15:51:26','2021-08-26 15:51:26'),(112,14,2,'2021-08-26 16:28:49','2021-08-26 16:28:49');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `price` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_category_id` (`category_id`),
  CONSTRAINT `fk_Products_id_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Apple iPhone 7 32Gb Black','A radical rethinking - this is how Apple\'s 2016 smartphones can be summed up in a nutshell. The processor, both cameras, screen, audio system, even the \'Home\' button - everything has undergone qualitative changes, with pinpoint accuracy fit into the new waterproof case.',300,1,'iphone-7-black.jpg','2021-08-03 15:43:47','2021-08-26 13:07:07'),(2,'iPhone 8 64Gb Gold','iPhone 8 is the next generation of iPhone. The front and back are made from the toughest \n        glass ever made for an iPhone, and the bezel is made from aerospace-grade aluminum. iPhone 8 charges wirelessly.\n         Protected from water and dust. Equipped with a 4.7-inch Retina HD display with True Tone technology. And a 12 \n         megapixel camera with a new matrix and an advanced signal processor. It all powers the A11 Bionic, the most \n         powerful and smartest processor in the iPhone. And iPhone 8 and iPhone 8 Plus also support augmented reality \n         in games and applications. iPhone 8 - Never before has intelligence been in such great shape.',400,1,'iphone-8-gold.jpg','2021-08-03 15:43:47','2021-08-07 15:56:53'),(3,'iPhone X 64Gb Silver','The entire front surface of iPhone X is occupied by a 5.8-inch Super Retina HD display with \n         support for HDR and True Tone technologies. The front and back are crafted from the toughest glass ever made for\n         an iPhone, and the bezel is made from surgical stainless steel. iPhone X charges wirelessly. Protected from \n         water and dust. And is equipped with a 12MP + 12MP dual camera with dual OIS for great shots even in low light. \n         The TrueDepth camera with new portrait lighting can take selfies in Portrait mode. And Face ID technology lets \n         you unlock your iPhone X at a glance. It\'s all powered by the A11 Bionic, the most powerful and smartest chip \n         ever in an iPhone. And iPhone X also supports augmented reality technologies in games and applications. \n         iPhone X is the new era of the iPhone.',500,1,'iphone-x-silver.jpg','2021-08-03 16:17:48','2021-08-03 16:17:48'),(4,'iPhone Xr 128Gb Black','Edge-to-edge display. The most powerful battery ever in an iPhone. Maximum productivity. \n        Splash and water resistant. Studio quality photos and 4K video. Even more secure with Face ID. The new \n        iPhone XR. Great update.',600,1,'iphone-xr-black.jpg','2021-08-03 16:17:48','2021-08-03 16:17:48'),(5,'iPhone 11 256Gb Black','True Tone technology. Wide color gamut (P3). Tactile feedback when pressed. \n        Brightness up to 625 cd / m² (standard). Oleophobic fingerprint-resistant coating. \n        Support for simultaneous display of multiple languages and character sets. Splash, \n        Water and Dust Resistant: IP68 rated according to IEC 60529 (biological immersion in water \n        up to 2 meters for up to 30 minutes). Face recognition with TrueDepth camera. Fast-charge capable: \n        Up to 50% charge in 30 minutes with 18W or greater AC adapter (sold separately). Wireless charging \n        (supports Qi chargers). Charge via power adapter or computer USB port.',700,1,'iphone-11-black.jpg','2021-08-03 16:27:18','2021-08-03 16:27:18'),(6,'iPhone 11 Pro 256Gb Gold','True Tone technology. Wide color gamut (P3). Tactile feedback when pressed. \n        Brightness up to 625 cd / m² (standard). Oleophobic fingerprint-resistant coating. \n        Support for simultaneous display of multiple languages and character sets. Splash, \n        Water and Dust Resistant: IP68 rated according to IEC 60529 (biological immersion in water \n        up to 2 meters for up to 30 minutes). Face recognition with TrueDepth camera. Fast-charge capable: \n        Up to 50% charge in 30 minutes with 18W or greater AC adapter (sold separately). Wireless charging \n        (supports Qi chargers). Charge via power adapter or computer USB port.',800,1,'iphone-11-pro-gold.jpg','2021-08-03 16:27:18','2021-08-03 16:27:18'),(7,'iPhone 12 256Gb Black','Display: HDR support. True Tone technology; Wide color gamut (P3). \n         Tactile feedback when pressed. Contrast 2,000,000: 1 (typical). Brightness up to 625 cd / m² (standard).\n         up to 1200 cd / m² when viewing content in HDR format. Oleophobic fingerprint-resistant coating. \n         Support for simultaneous display of multiple languages and character sets.',800,1,'iphone-12-black.jpg','2021-08-03 16:27:18','2021-08-03 16:27:18'),(8,'iPhone 12 Pro 256Gb Black','Display: HDR support. True Tone technology; Wide color gamut (P3). \n         Tactile feedback when pressed. Contrast 2,000,000: 1 (typical). Brightness up to 625 cd / m² (standard).\n         up to 1200 cd / m² when viewing content in HDR format. Oleophobic fingerprint-resistant coating. \n         Support for simultaneous display of multiple languages and character sets.',900,1,'iphone-12-pro-max-graphite.jpg','2021-08-03 16:27:18','2021-08-03 16:27:18'),(12,'Watch SE 40mm Gold','Apple Watch SE is a combination of the largest screen ever on an Apple Watch and the most important features available on an Apple Watch.',300,2,'watch-se-40-pink.jpg','2021-08-03 16:39:46','2021-08-03 16:41:44'),(13,'Watch Series 6 40mm Red','Apple Watch Series 6 is a powerful device that takes care of you.\n\nThis watch has a new sensor and a dedicated app for measuring blood oxygen levels. And many other advanced features for a healthy lifestyle.',400,2,'watch-6-40-red.jpg','2021-08-03 16:39:46','2021-08-03 16:41:44'),(14,'Watch Series 6 40mm Space Gray','Apple Watch Series 6 is a powerful device that takes care of you.\n\nThis watch has a new sensor and a dedicated app for measuring blood oxygen levels. And many other advanced features for a healthy lifestyle.',400,2,'watch-6-40-space-gray.jpg','2021-08-03 16:39:46','2021-08-03 16:41:44'),(15,'Watch Nike Series 6 40mm Silver','Apple Watch Series 6 is a powerful device that takes care of you.\n\nThis watch has a new sensor and a dedicated app for measuring blood oxygen levels. And many other advanced features for a healthy lifestyle.',500,2,'watch-6-nike-40-silver.jpg','2021-08-03 16:39:46','2021-08-03 16:41:44'),(16,'iPad Air 2020 256Gb Gray','The all-new iPad Air is even more versatile.\nIt features a stunning 10.9-inch Liquid Retina display with wide color gamut. Photos, videos and games look vivid and natural down to the smallest detail.',1000,3,'ipad-air-2020-gray.jpg','2021-08-03 16:49:09','2021-08-03 16:49:09'),(17,'iPad Air 2020 256Gb Green','The all-new iPad Air is even more versatile.\nIt features a stunning 10.9-inch Liquid Retina display with wide color gamut. Photos, videos and games look vivid and natural down to the smallest detail.',1000,3,'ipad-air-2020-green.jpg','2021-08-03 16:49:09','2021-08-03 16:49:09'),(18,'iPad Air 2020 256Gb Rose Gold','The all-new iPad Air is even more versatile.\nIt features a stunning 10.9-inch Liquid Retina display with wide color gamut. Photos, videos and games look vivid and natural down to the smallest detail.',1000,3,'ipad-air-2020-rose-gold.jpg','2021-08-03 16:49:09','2021-08-03 16:49:09'),(19,'iPad Air 2020 256Gb Sky Blue','The all-new iPad Air is even more versatile.\nIt features a stunning 10.9-inch Liquid Retina display with wide color gamut. Photos, videos and games look vivid and natural down to the smallest detail.',1000,3,'ipad-air-2020-sky-blue.jpg','2021-08-03 16:49:09','2021-08-03 16:49:09'),(20,'iPad Pro 11\" 128Gb Silver','This is the new iPad Pro.\nIt features an incredibly advanced mobile display. And two Pro level cameras that allow you to change reality. It handles tasks faster than many laptops. At the same time, you can control it with touch or use the Apple Pencil, keyboard, and now a mouse or trackpad for this.',1000,3,'ipad-pro-11-silver.jpg','2021-08-03 17:04:49','2021-08-03 17:04:49'),(21,'iPad Pro 11\" 128Gb Space Gray','This is the new iPad Pro.\nIt features an incredibly advanced mobile display. And two Pro level cameras that allow you to change reality. It handles tasks faster than many laptops. At the same time, you can control it with touch or use the Apple Pencil, keyboard, and now a mouse or trackpad for this.',1000,3,'ipad-pro-11-space-gray.jpg','2021-08-03 17:04:50','2021-08-03 17:04:50'),(22,'iPad Pro 12.9','iPad Pro. With the superpower of Apple M1 chip\r\nChip M1. iPad Pro with M1 chip is the fastest iPad. It is designed so that the unique technologies in the M1 chip - such as advanced signal processing and unified memory architecture - reach their full potential. And with the M1\'s energy efficiency, the thin and light iPad Pro can last all day on a single charge - an amazing combination of power and compactness.\r\n\r\nHigher processing speed of data and graphics. With an 8-core central processing unit in the M1 chip, performance is increased by up to 50%. And the 8-core GPU boosts graphics speed by up to 40%. This means you can create sophisticated AR models on iPad Pro, play games with console-quality graphics at high frame rates, and more.',2000,3,'ipad-pro-12.9-silver.jpg','2021-08-03 17:04:50','2021-08-26 15:22:54'),(23,'iPad Pro 12.9\" 512Gb M1 Space Gray','iPad Pro. With the superpower of Apple M1 chip\nChip M1. iPad Pro with M1 chip is the fastest iPad. It is designed so that the unique technologies in the M1 chip - such as advanced signal processing and unified memory architecture - reach their full potential. And with the M1\'s energy efficiency, the thin and light iPad Pro can last all day on a single charge - an amazing combination of power and compactness.\n\nHigher processing speed of data and graphics. With an 8-core central processing unit in the M1 chip, performance is increased by up to 50%. And the 8-core GPU boosts graphics speed by up to 40%. This means you can create sophisticated AR models on iPad Pro, play games with console-quality graphics at high frame rates, and more.',2000,3,'ipad-pro-12.9-space-gray.jpg','2021-08-03 17:04:50','2021-08-03 17:28:25'),(24,'MacBook Air 13\" 256Gb M1 Gold','MacBook Air - Apple\'s thinnest and lightest laptop - is now taken to a whole new level with the powerful Apple M1 chip.\nIt handles your tasks quickly with the amazing speed of an 8-core processor.\nOpens up new possibilities for graphics-intensive applications and games using the full power of a 7-core GPU. And accelerates machine learning operations using the 16-core Neural Engine. Everything is quiet because this is a laptop without a fan. And it works without recharging for up to 18 hours straight.',1500,4,'macbook-air-m1-13-gold.jpg','2021-08-03 17:28:25','2021-08-03 17:28:25'),(25,'MacBook Air 13\" 256Gb M1 Space Gray','MacBook Air - Apple\'s thinnest and lightest laptop - is now taken to a whole new level with the powerful Apple M1 chip.\nIt handles your tasks quickly with the amazing speed of an 8-core processor.\nOpens up new possibilities for graphics-intensive applications and games using the full power of a 7-core GPU. And accelerates machine learning operations using the 16-core Neural Engine. Everything is quiet because this is a laptop without a fan. And it works without recharging for up to 18 hours straight.',1500,4,'macbook-air-m1-13-space-gray.jpg','2021-08-03 17:28:25','2021-08-03 17:28:25'),(26,'MacBook Air 13\" 256Gb M1 Silver','MacBook Air - Apple\'s thinnest and lightest laptop - is now taken to a whole new level with the powerful Apple M1 chip.\nIt handles your tasks quickly with the amazing speed of an 8-core processor.\nOpens up new possibilities for graphics-intensive applications and games using the full power of a 7-core GPU. And accelerates machine learning operations using the 16-core Neural Engine. Everything is quiet because this is a laptop without a fan. And it works without recharging for up to 18 hours straight.',1500,4,'macbook-air-m1-13-silver.jpg','2021-08-03 17:28:25','2021-08-03 17:28:25'),(27,'MacBook Pro 13\" 256Gb M1 Space Gray','With the introduction of the M1 chip, the 13-inch MacBook Pro is incredibly powerful and fast. The power of the central processor has increased up to 2.8 times. Graphics processing speed - up to 5 times. With our advanced Neural Engine, machine learning is up to 11x faster. And MacBook Pro lasts up to 20 hours on a single charge - longer than any other Mac. Our most popular Pro laptop takes it to a whole new level.',1500,4,'macbook-pro-m1-13-space-gray.jpg','2021-08-03 17:28:25','2021-08-03 17:28:25'),(28,'AirPods Pro','Your ears love it.\nThese are headphones of a completely new class. AirPods Pro are exceptionally comfortable with Active Noise Canceling technology and even custom-sized earbuds. You will feel the music better than the headphones.',300,5,'accessory-airpods-pro.jpg','2021-08-03 17:38:04','2021-08-03 17:38:04'),(29,'EarPods with Lightning Connector','Apple EarPods with Lightning Connector (MMTN2ZMA) are Apple\'s all-new, sleek headphones designed to bring new dimensions of comfort and sound quality to users. The earbuds support all Lightning devices and iOS 10 or later, including iPod touch, iPad, and iPhone.\nA feature of the headphones is a deeper and richer sound in the low frequencies. EarPods speakers are specially designed to provide the lowest audio loss and the best sound possible.',50,5,'accessory-earpods.jpg','2021-08-03 17:38:04','2021-08-03 17:38:04'),(30,'Lightning iPad Digital AV Adapter','Use the Apple iPad Digital AV Adapter (MD826) Lightning with your iPad Retina, iPad mini, iPhone 5, or iPod Touch 5th generation with a Lightning connector. The Apple iPad Digital AV Adapter mirrors what appears on your mobile device\'s screen - including apps, presentations, websites, slideshows, and more - to an external monitor, HDMI TV, projector, or other compatible display with a resolution up to 1080p HD.\n\nIt also outputs video content - movies, TV shows, video footage - to a large monitor up to 1080p HD resolution. Simply attach the Digital AV Adapter to the Lightning connector on your device and then to your TV or projector using an HDMI cable (sold separately).',50,5,'accessory-lighting-ipad-digital-adapter.jpg','2021-08-03 17:38:04','2021-08-03 17:38:04'),(31,'Lightning to USB-C','Apple USB-C to Lightning is a high-tech and reliable cable for comfortable synchronization of Apple devices. The cable connects an iPhone, iPad, or iPod with a Lightning connector to a USB-C port on a MacBook or Thunderbolt 3 (USB-C) ports on a MacBook Pro.\n \n\nOne of the special advantages of Apple USB-C to Lightning is the safety of your personal data and information during synchronization. Using the cable, you can be sure that confidential information will not go to the side during the transfer.',50,5,'accessory-usb-to-lightning.jpg','2021-08-03 17:38:04','2021-08-03 17:38:04'),(71,'Apple iPhone 12 Mini 64GB Purple','Display: HDR support. True Tone technology; Wide color gamut (P3). Tactile feedback when pressed. Contrast 2,000,000: 1 (typical). Brightness up to 625 cd / m² (standard). up to 1200 cd / m² when viewing content in HDR format. Oleophobic fingerprint-resistant coating. Support for simultaneous display of multiple languages and character sets.',800,1,'f058709964ac30bf1adf0cf355aab1f8.jpg','2021-08-25 22:29:41','2021-08-25 22:29:41');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Alexey','Goncharov','80ka96@gmail.com','admin','$2y$10$gkCAxrJHHKFH/ZEh.6MvHe03LPHyE6p7QnEHNqSTNvTHq0caLxOHe','+380999999999',10,'2021-08-03 15:15:55','2021-08-11 23:23:04'),(2,'Leon','Goncharov','doka96@mail.ua','user','$2y$10$9TXKXGnZn7XMUIy1tUUQMux3Dh/Kh1cWEF4oFc6Gf4k1SPGIZMEGS','+380999999998',0,'2021-08-03 15:29:55','2021-08-11 23:23:04');
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

-- Dump completed on 2021-08-26 19:44:54
