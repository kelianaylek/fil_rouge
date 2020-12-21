-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour fil_rouge
CREATE DATABASE IF NOT EXISTS `fil_rouge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fil_rouge`;

-- Listage de la structure de la table fil_rouge. friends
CREATE TABLE IF NOT EXISTS `friends` (
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table fil_rouge.friends : ~16 rows (environ)
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
	(1, 4),
	(4, 1),
	(3, 4),
	(4, 3),
	(1, 3),
	(3, 1),
	(9, 6),
	(6, 9),
	(9, 8),
	(8, 9),
	(8, 6),
	(6, 8),
	(2, 8),
	(8, 2);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;

-- Listage de la structure de la table fil_rouge. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `message_content` varchar(50) DEFAULT NULL,
  `message_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table fil_rouge.messages : ~0 rows (environ)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Listage de la structure de la table fil_rouge. polls
CREATE TABLE IF NOT EXISTS `polls` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_title` varchar(80) NOT NULL,
  `poll_answer1` varchar(20) NOT NULL,
  `poll_answer2` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `poll_limit` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `poll_creator` varchar(80) NOT NULL,
  `accepted_id` int(11) DEFAULT NULL,
  `poll_answer1_votes` int(11) DEFAULT '0',
  `poll_answer2_votes` int(11) DEFAULT '0',
  `poll_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table fil_rouge.polls : ~24 rows (environ)
/*!40000 ALTER TABLE `polls` DISABLE KEYS */;
INSERT INTO `polls` (`poll_id`, `poll_title`, `poll_answer1`, `poll_answer2`, `created_at`, `poll_limit`, `poll_creator`, `accepted_id`, `poll_answer1_votes`, `poll_answer2_votes`, `poll_type`) VALUES
	(11, 'thrth', 'trhtrh', 'rthtrh', '2020-12-18 15:17:56', '2022-01-01 01:00:00', 'y', 9, 0, 1, 'streaming'),
	(12, 'Je mange quoi ?', 'Japonais', 'Chinois', '2020-12-18 15:30:37', '2021-01-01 01:00:00', 'y', 9, 1, 0, 'sport'),
	(13, 'e', 'e', 'e', '2020-12-18 15:57:29', '2022-01-01 01:00:00', 'b', 8, 1, 0, 'streaming'),
	(14, 'a', 'a', 'a', '2020-12-18 15:57:37', '2023-01-01 01:00:00', 'b', 8, 1, 0, 'streaming'),
	(15, 'r', 'r', 'r', '2020-12-18 15:57:46', '2023-01-01 01:00:00', 'b', 8, 1, 0, 'tv'),
	(16, 'a', 'a', 'a', '2020-12-18 16:02:01', '2024-01-01 01:00:00', 'y', 9, 1, 0, 'tv'),
	(17, 'z', 'z', 'z', '2020-12-18 16:02:07', '2024-01-01 01:00:00', 'y', 9, 1, 0, 'sport'),
	(18, 'e', 'e', 'e', '2020-12-18 16:02:14', '2025-01-01 01:00:00', 'y', 9, 1, 0, 'sport'),
	(19, 't', 't', 't', '2020-12-18 16:02:22', '2023-01-01 01:00:00', 'y', 9, 1, 0, 'sport'),
	(20, 'h', 'h', 'h', '2020-12-18 16:02:28', '2023-01-01 01:00:00', 'y', 9, 1, 0, 'sport'),
	(21, 'y', 'y', 'y', '2020-12-18 16:10:55', '2022-01-01 01:00:00', 'b', 8, 1, 0, 'streaming'),
	(22, 'j', 'j', 'j', '2020-12-18 16:11:02', '2021-01-01 01:00:00', 'b', 8, 1, 0, 'sport'),
	(24, 'a', 'a', 'a', '2020-12-18 16:24:06', '2022-01-01 01:00:00', 'b', 8, 1, 0, 'sport');
/*!40000 ALTER TABLE `polls` ENABLE KEYS */;

-- Listage de la structure de la table fil_rouge. polls_answered
CREATE TABLE IF NOT EXISTS `polls_answered` (
  `poll_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table fil_rouge.polls_answered : ~15 rows (environ)
/*!40000 ALTER TABLE `polls_answered` DISABLE KEYS */;
INSERT INTO `polls_answered` (`poll_id`, `user_id`) VALUES
	(5, 1),
	(12, 8),
	(11, 8),
	(10, 8),
	(15, 9),
	(14, 9),
	(13, 9),
	(20, 8),
	(19, 8),
	(17, 8),
	(18, 8),
	(23, 9),
	(22, 9),
	(21, 9),
	(24, 9),
	(16, 8);
/*!40000 ALTER TABLE `polls_answered` ENABLE KEYS */;

-- Listage de la structure de la table fil_rouge. users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(65) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_isOnline` tinyint(4) NOT NULL DEFAULT '0',
  `user_score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table fil_rouge.users : ~10 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_isOnline`, `user_score`) VALUES
	(1, 'lucas', 'raoultkelian@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f', 1, 0),
	(2, 'matthis', 'matthis@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 0),
	(3, 'hugo', 'hugo@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 0, 0),
	(4, 'nop', 'timogo@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 0),
	(5, 'nop', 'test@gmail.com', '9e3669d19b675bd57058fd4664205d2a', 1, 0),
	(6, 'naylek', 'new@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 0, 0),
	(7, 'merde', 'a@gmail.com', '8cb4f88ffd80dac9c59859dcea8e2ae4', 1, 0),
	(8, 'b', 'b@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f', 1, 4),
	(9, 'y', 'y@gmail.com', '415290769594460e2e485922904f345d', 0, 4),
	(10, 'naylek', 'kelian@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
