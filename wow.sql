# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: wow
# Generation Time: 2019-09-07 13:26:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nodins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nodins`;

CREATE TABLE `nodins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_nodin` varchar(25) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `nodin_type` varchar(10) DEFAULT NULL,
  `nodin_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `no_nodin_parent` varchar(25) DEFAULT NULL,
  `to` varchar(11) DEFAULT NULL,
  `cc` varchar(11) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nodins` WRITE;
/*!40000 ALTER TABLE `nodins` DISABLE KEYS */;

INSERT INTO `nodins` (`id`, `no_nodin`, `title`, `nodin_type`, `nodin_date`, `target_date`, `no_nodin_parent`, `to`, `cc`, `body`)
VALUES
	(1,'0809 MKT/Entah Apa','Program Suka-Suka ABC','Request','2019-09-01','2019-09-15',NULL,'GM PSM','Managers','Adalah'),
	(2,'0909 MKT/Entah Apa','RFS Program Suka-suka','RFS','2019-09-01','2019-09-07','0809 MKT/Entah Apa','GM PSM','Managers','Adalah'),
	(3,'1009 MKT/Entah Apa','RFC Program Suka-suka','RFC','2019-09-10','2019-09-10','0909 MKT/Entah Apa','GM PSM','Managers','Adalah');

/*!40000 ALTER TABLE `nodins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `total_request` int(11) DEFAULT NULL,
  `total_rfs` int(11) DEFAULT NULL,
  `total_rfi` int(11) DEFAULT NULL,
  `total_rfc` int(11) DEFAULT NULL,
  `total_itr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL DEFAULT '',
  `department` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `subdir` varchar(10) DEFAULT 'BA & PSM',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`username`, `department`, `password`, `subdir`)
VALUES
	('ab','abc',NULL,'BA & PSM'),
	('arfaneyza','New Toddler in the World',NULL,NULL),
	('hasbi_akbar','Hooray - hooray',NULL,NULL),
	('rachmawaty','Consumer Analytics and Reporting',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
