# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: wow
# Generation Time: 2019-09-11 00:59:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cc_nodins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cc_nodins`;

CREATE TABLE `cc_nodins` (
  `nodin_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`nodin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table from_nodins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `from_nodins`;

CREATE TABLE `from_nodins` (
  `nodin_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`nodin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nodins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nodins`;

CREATE TABLE `nodins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_nodin` varchar(30) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `nodin_type` varchar(10) DEFAULT NULL,
  `nodin_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `no_nodin_parent` varchar(25) DEFAULT NULL,
  `from` varchar(11) DEFAULT NULL,
  `to` varchar(11) DEFAULT NULL,
  `cc` varchar(11) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nodins` WRITE;
/*!40000 ALTER TABLE `nodins` DISABLE KEYS */;

INSERT INTO `nodins` (`id`, `no_nodin`, `title`, `nodin_type`, `nodin_date`, `target_date`, `no_nodin_parent`, `from`, `to`, `cc`, `body`)
VALUES
	(1,'01270/MK.05/EN-01/VI/2019','Request ABC','Request','2019-09-01','2019-09-15',NULL,NULL,'GM PSM','Managers','Adalah'),
	(2,'002/BO','Request DEF','Request','2019-09-02','2019-09-07',NULL,NULL,'GM PSM','Managers','Adalah'),
	(3,'001/IT','Request Development ABC','IT','2019-09-03','2019-09-05',NULL,NULL,'GM PSM','Managers','sehubungan 01270/MK.05/EN-01/VI/2019 lele'),
	(4,'01386/MK.05/EN-01/VII/2019','RFS ABC','RFS','2019-09-05','2019-09-09',NULL,NULL,'Quality','Managers','sehubungan 01270/MK.05/EN-01/VI/2019 lala'),
	(5,'001/RFC','RFC ABC','RFC','2019-09-05','2019-09-09',NULL,NULL,'BO','Managers','sehubungan 01386/MK.05/EN-01/VII/2019 lele');

/*!40000 ALTER TABLE `nodins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stats
# ------------------------------------------------------------

DROP VIEW IF EXISTS `stats`;

CREATE TABLE `stats` (
   `All` BIGINT(21) NOT NULL DEFAULT '0',
   `Request` BIGINT(21) NOT NULL DEFAULT '0',
   `IT_Dev` BIGINT(21) NOT NULL DEFAULT '0',
   `RFS` BIGINT(21) NOT NULL DEFAULT '0',
   `RFC` BIGINT(21) NOT NULL DEFAULT '0',
   `RFI` BIGINT(21) NOT NULL DEFAULT '0',
   `ITR` BIGINT(21) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table to_nodins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `to_nodins`;

CREATE TABLE `to_nodins` (
  `nodin_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`nodin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL DEFAULT '',
  `department` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `subdir` varchar(10) DEFAULT 'BA & PSM',
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`username`, `department`, `password`, `subdir`, `employee_id`)
VALUES
	('ab','abc',NULL,'BA & PSM',NULL),
	('arfaneyza','New Toddler in the World',NULL,NULL,NULL),
	('hasbi_akbar','Hooray - hooray',NULL,NULL,NULL),
	('rachmawaty','Consumer Analytics and Reporting',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;




# Replace placeholder table for stats with correct view syntax
# ------------------------------------------------------------

DROP TABLE `stats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stats`
AS SELECT
   count(0) AS `All`,count(if((`nodins`.`nodin_type` = 'Request'),1,NULL)) AS `Request`,count(if((`nodins`.`nodin_type` = 'IT'),1,NULL)) AS `IT_Dev`,count(if((`nodins`.`nodin_type` = 'RFS'),1,NULL)) AS `RFS`,count(if((`nodins`.`nodin_type` = 'RFC'),1,NULL)) AS `RFC`,count(if((`nodins`.`nodin_type` = 'RFI'),1,NULL)) AS `RFI`,count(if((`nodins`.`nodin_type` = 'ITR'),1,NULL)) AS `ITR`
FROM `nodins`;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
