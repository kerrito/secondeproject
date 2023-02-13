-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table oscart.addtocart
CREATE TABLE IF NOT EXISTS `addtocart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `user_email` varchar(235) DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `state` varchar(235) DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.banuser
CREATE TABLE IF NOT EXISTS `banuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(235) DEFAULT NULL,
  `pass` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `msg` text,
  `status` int DEFAULT '0',
  `lastname` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `feedback` text,
  `status` int DEFAULT '0',
  `lastname` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `address` text,
  `city` varchar(235) DEFAULT NULL,
  `country` varchar(235) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `card_name` varchar(235) DEFAULT NULL,
  `card_number` bigint DEFAULT NULL,
  `card_cvv` int DEFAULT NULL,
  `card_exp` varchar(235) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `state` varchar(235) DEFAULT 'Pending',
  `user_email` varchar(235) DEFAULT NULL,
  `tracking_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remainning_time` bigint DEFAULT NULL,
  `reason` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(235) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `categories` varchar(235) DEFAULT NULL,
  `brand` varchar(235) DEFAULT NULL,
  `status` int DEFAULT '1',
  `img` varchar(235) DEFAULT NULL,
  `desc` text,
  `date` varchar(235) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`)
) ENGINE=InnoDB AUTO_INCREMENT=1000066 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.roll
CREATE TABLE IF NOT EXISTS `roll` (
  `roll_id` int NOT NULL AUTO_INCREMENT,
  `user_roll` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`roll_id`),
  UNIQUE KEY `user_roll` (`user_roll`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.signup
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `pass` varchar(235) DEFAULT NULL,
  `status` int DEFAULT '0',
  `user_rol` int DEFAULT '1',
  `address` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `number` (`number`),
  KEY `user_rol` (`user_rol`),
  CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`user_rol`) REFERENCES `roll` (`roll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table oscart.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `user_email` varchar(235) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
