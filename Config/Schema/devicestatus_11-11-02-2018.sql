# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.33.10 (MySQL 5.5.53-0ubuntu0.14.04.1)
# Database: cake_inventory
# Generation Time: 2018-02-10 22:05:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acos`;

CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(1,NULL,NULL,NULL,'controllers',1,104),
	(2,1,NULL,NULL,'Groups',2,13),
	(3,2,NULL,NULL,'index',3,4),
	(4,2,NULL,NULL,'view',5,6),
	(5,2,NULL,NULL,'add',7,8),
	(6,2,NULL,NULL,'edit',9,10),
	(7,2,NULL,NULL,'delete',11,12),
	(8,1,NULL,NULL,'Items',14,27),
	(9,8,NULL,NULL,'index',15,16),
	(10,8,NULL,NULL,'view',17,18),
	(11,8,NULL,NULL,'add',19,20),
	(12,8,NULL,NULL,'edit',21,22),
	(13,8,NULL,NULL,'delete',23,24),
	(14,8,NULL,NULL,'deleteSelected',25,26),
	(15,1,NULL,NULL,'Pages',28,31),
	(16,15,NULL,NULL,'display',29,30),
	(17,1,NULL,NULL,'Stocks',32,49),
	(18,17,NULL,NULL,'index',33,34),
	(19,17,NULL,NULL,'view',35,36),
	(20,17,NULL,NULL,'add',37,38),
	(21,17,NULL,NULL,'delete',39,40),
	(22,17,NULL,NULL,'deleteSelected',41,42),
	(23,17,NULL,NULL,'select_by_date',43,44),
	(24,17,NULL,NULL,'report',45,46),
	(25,17,NULL,NULL,'search',47,48),
	(26,1,NULL,NULL,'SystemSettings',50,57),
	(27,26,NULL,NULL,'add',51,52),
	(28,26,NULL,NULL,'edit',53,54),
	(29,26,NULL,NULL,'delete',55,56),
	(30,1,NULL,NULL,'UnitMeasurements',58,67),
	(31,30,NULL,NULL,'add',59,60),
	(32,30,NULL,NULL,'edit',61,62),
	(33,30,NULL,NULL,'delete',63,64),
	(34,30,NULL,NULL,'deleteSelected',65,66),
	(35,1,NULL,NULL,'UserPermissions',68,77),
	(36,35,NULL,NULL,'index',69,70),
	(37,35,NULL,NULL,'sync',71,72),
	(38,35,NULL,NULL,'edit',73,74),
	(39,35,NULL,NULL,'toggle',75,76),
	(40,1,NULL,NULL,'Users',78,103),
	(41,40,NULL,NULL,'login',79,80),
	(42,40,NULL,NULL,'logout',81,82),
	(43,40,NULL,NULL,'index',83,84),
	(44,40,NULL,NULL,'view',85,86),
	(45,40,NULL,NULL,'add',87,88),
	(46,40,NULL,NULL,'edit',89,90),
	(47,40,NULL,NULL,'delete',91,92),
	(48,40,NULL,NULL,'toggle',93,94),
	(49,40,NULL,NULL,'forgot_password',95,96),
	(50,40,NULL,NULL,'activate_password',97,98),
	(51,40,NULL,NULL,'confirm_email_update',99,100),
	(52,40,NULL,NULL,'dashboard',101,102);

/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros`;

CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
VALUES
	(1,NULL,'Group',1,NULL,1,4),
	(2,1,'User',1,NULL,2,3);

/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros_acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros_acos`;

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
VALUES
	(1,1,1,'1','1','1','1');

/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'Administrator','2017-01-11 12:04:55','2017-01-11 12:04:55');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemCode` varchar(255) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `minimum_qty` int(11) NOT NULL,
  `maximum_qty` int(11) NOT NULL,
  `unit_measurement_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `stock_status_id` int(11) NOT NULL,
  `stock_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `itemCode`, `name`, `minimum_qty`, `maximum_qty`, `unit_measurement_id`, `created`, `modified`, `created_by`, `modified_by`, `stock_status_id`, `stock_modified`)
VALUES
	(1,'AUTO1LXLDB8ARM','Apollo',15,200,1,'2017-01-11 12:20:44','2017-01-12 00:24:08',1,1,4,'2017-01-12 00:24:08'),
	(2,'AUTOI150BAXTT6','Aircond',30,40,NULL,'2017-01-12 00:17:52','2017-01-12 00:17:52',1,NULL,0,'0000-00-00 00:00:00'),
	(3,'AUTOU7NVJETNTM','Coca Cola',20,200,3,'2017-01-12 00:19:07','2017-01-12 00:22:49',1,1,1,'2017-01-12 00:22:49');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stock_statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stock_statuses`;

CREATE TABLE `stock_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table stocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(200) NOT NULL DEFAULT '',
  `item_id` int(11) NOT NULL,
  `stock_status_id` int(11) NOT NULL,
  `stock_in` varchar(200) DEFAULT NULL,
  `stock_out` varchar(200) DEFAULT NULL,
  `stock_balance` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `transaction_remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;

INSERT INTO `stocks` (`id`, `transID`, `item_id`, `stock_status_id`, `stock_in`, `stock_out`, `stock_balance`, `created`, `modified`, `created_by`, `modified_by`, `transaction_remarks`)
VALUES
	(1,'7870C2C744',1,1,'200',NULL,'200','2017-01-11 12:24:35','2017-01-11 12:24:35',1,NULL,''),
	(2,'215CA83C8C',3,1,'100',NULL,'100','2017-01-12 00:19:53','2017-01-12 00:19:53',1,NULL,'Barang  baru sampai'),
	(3,'2B10281028',3,3,NULL,' 90','10','2017-01-12 00:20:32','2017-01-12 00:20:32',1,NULL,'Jualan coc untung'),
	(4,'4725B4C336',3,1,'190',NULL,'200','2017-01-12 00:22:49','2017-01-12 00:22:49',1,NULL,''),
	(5,'280B1B1C61',1,4,NULL,' 200','0','2017-01-12 00:24:08','2017-01-12 00:24:08',1,NULL,'habis\r\n');

/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_settings`;

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table unit_measurements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `unit_measurements`;

CREATE TABLE `unit_measurements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `unit_measurements` WRITE;
/*!40000 ALTER TABLE `unit_measurements` DISABLE KEYS */;

INSERT INTO `unit_measurements` (`id`, `name`, `key`, `created`, `modified`, `created_by`, `modified_by`)
VALUES
	(1,'Packet','Packet','2017-01-11 12:21:07','2017-01-11 12:21:07',NULL,NULL),
	(2,'Unit','Unit','2017-01-12 00:18:05','2017-01-12 00:18:05',NULL,NULL),
	(3,'Botol','Botol','2017-01-12 00:18:44','2017-01-12 00:18:44',NULL,NULL);

/*!40000 ALTER TABLE `unit_measurements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` tinytext COLLATE utf8_unicode_ci COMMENT 'full url to avatar image file',
  `language` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
VALUES
	(1,1,NULL,'Super User','e8cadff5131bd89bc546289d3c4b8d98d4dda2b7','super@myinventory.com',NULL,NULL,NULL,NULL,1,'2017-01-11 12:06:27','2017-01-11 12:06:27','0000-00-00 00:00:00',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
