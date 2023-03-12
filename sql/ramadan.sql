-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ramadan.activation
CREATE TABLE IF NOT EXISTS `activation` (
  `active` tinyint(1) DEFAULT NULL COMMENT '0=>inactive ,1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ramadan.activation: ~1 rows (approximately)
INSERT INTO `activation` (`active`) VALUES
	(1);

-- Dumping structure for table ramadan.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ramadan.admins: ~0 rows (approximately)
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'mahmoud medhat', 'hetlarhhs@gmail.com', '$2y$10$PLrjvGcyKDnUKXh4FUhujeQR3F2/Y9F0TT25KX67Qhy8HB7Di/LiK', '2023-02-26 05:30:11', '2023-02-26 05:30:11');

-- Dumping structure for table ramadan.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `number` char(11) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `answer_rec_id` int DEFAULT NULL,
  `question_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK__questions` (`question_id`),
  KEY `FK_answers_answers_record` (`answer_rec_id`),
  CONSTRAINT `FK__questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_answers_answers_record` FOREIGN KEY (`answer_rec_id`) REFERENCES `answer_records` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ramadan.answers: ~3 rows (approximately)
INSERT INTO `answers` (`id`, `name`, `number`, `address`, `answer`, `answer_rec_id`, `question_id`, `created_at`) VALUES
	(1, 'hjhjhh', '01148422820', 'ghghjghj', 'hgjghjghjghj', 1, 1, '2023-02-27 15:08:17'),
	(2, 'rge', '01551407492', 'erege', 'rgrrrgrrg', 1, 1, '2023-02-27 22:46:50'),
	(3, 'احمد محمد ابراهيم سكر', '01551613339', 'بيجام شبرا الخيمة', 'ابو بكر', 2, 1, '2023-02-28 08:12:07');

-- Dumping structure for table ramadan.answer_records
CREATE TABLE IF NOT EXISTS `answer_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `question_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`),
  KEY `FK_answers_record_questions` (`question_id`),
  CONSTRAINT `FK_answers_record_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ramadan.answer_records: ~3 rows (approximately)
INSERT INTO `answer_records` (`id`, `date`, `question_id`, `created_at`) VALUES
	(1, '2023-02-27', 1, '2023-02-27 15:08:17'),
	(2, '2023-02-28', 1, '2023-02-28 08:11:16'),
	(3, '2023-03-07', 1, '2023-03-07 12:21:20'),
	(4, '2023-03-09', 1, '2023-03-09 18:37:58');

-- Dumping structure for table ramadan.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `AnswersCount` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ramadan.questions: ~0 rows (approximately)
INSERT INTO `questions` (`id`, `question`, `AnswersCount`, `created_at`, `updated_at`) VALUES
	(1, 'ما هو اسم صديق الرسول صلى الله عليه و سلم', 3, '2023-02-27 12:53:02', '2023-02-28 08:12:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
