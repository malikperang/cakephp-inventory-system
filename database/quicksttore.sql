# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.20)
# Database: quicksstore_v1
# Generation Time: 2014-11-14 23:06:51 +0000
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
	(1,NULL,NULL,NULL,'controllers',1,164),
	(8,1,NULL,NULL,'Items',2,15),
	(9,8,NULL,NULL,'index',3,4),
	(10,8,NULL,NULL,'view',5,6),
	(11,8,NULL,NULL,'add',7,8),
	(12,8,NULL,NULL,'edit',9,10),
	(13,8,NULL,NULL,'delete',11,12),
	(14,1,NULL,NULL,'Pages',16,19),
	(15,14,NULL,NULL,'display',17,18),
	(22,1,NULL,NULL,'Stocks',20,37),
	(23,22,NULL,NULL,'index',21,22),
	(24,22,NULL,NULL,'view',23,24),
	(25,22,NULL,NULL,'add',25,26),
	(26,22,NULL,NULL,'edit',27,28),
	(27,22,NULL,NULL,'delete',29,30),
	(28,1,NULL,NULL,'UnitMeasurements',38,49),
	(29,28,NULL,NULL,'index',39,40),
	(30,28,NULL,NULL,'view',41,42),
	(31,28,NULL,NULL,'add',43,44),
	(32,28,NULL,NULL,'edit',45,46),
	(33,28,NULL,NULL,'delete',47,48),
	(34,1,NULL,NULL,'AclManagement',50,109),
	(35,34,NULL,NULL,'Groups',51,62),
	(36,35,NULL,NULL,'index',52,53),
	(37,35,NULL,NULL,'view',54,55),
	(38,35,NULL,NULL,'add',56,57),
	(39,35,NULL,NULL,'edit',58,59),
	(40,35,NULL,NULL,'delete',60,61),
	(41,34,NULL,NULL,'UserPermissions',63,72),
	(42,41,NULL,NULL,'index',64,65),
	(43,41,NULL,NULL,'sync',66,67),
	(44,41,NULL,NULL,'edit',68,69),
	(45,41,NULL,NULL,'toggle',70,71),
	(46,34,NULL,NULL,'Users',73,108),
	(47,46,NULL,NULL,'login',74,75),
	(48,46,NULL,NULL,'logout',76,77),
	(49,46,NULL,NULL,'index',78,79),
	(50,46,NULL,NULL,'view',80,81),
	(51,46,NULL,NULL,'add',82,83),
	(52,46,NULL,NULL,'edit',84,85),
	(53,46,NULL,NULL,'delete',86,87),
	(54,46,NULL,NULL,'toggle',88,89),
	(55,46,NULL,NULL,'register',90,91),
	(56,46,NULL,NULL,'confirm_register',92,93),
	(57,46,NULL,NULL,'forgot_password',94,95),
	(58,46,NULL,NULL,'activate_password',96,97),
	(59,46,NULL,NULL,'edit_profile',98,99),
	(60,46,NULL,NULL,'confirm_email_update',100,101),
	(61,46,NULL,NULL,'dashboard',102,103),
	(62,1,NULL,NULL,'Companies',110,121),
	(63,62,NULL,NULL,'index',111,112),
	(64,62,NULL,NULL,'view',113,114),
	(65,62,NULL,NULL,'add',115,116),
	(66,62,NULL,NULL,'edit',117,118),
	(67,62,NULL,NULL,'delete',119,120),
	(68,1,NULL,NULL,'ItemCategories',122,133),
	(69,68,NULL,NULL,'index',123,124),
	(70,68,NULL,NULL,'view',125,126),
	(71,68,NULL,NULL,'add',127,128),
	(72,68,NULL,NULL,'edit',129,130),
	(73,68,NULL,NULL,'delete',131,132),
	(74,1,NULL,NULL,'ItemImages',134,145),
	(75,74,NULL,NULL,'index',135,136),
	(76,74,NULL,NULL,'view',137,138),
	(77,74,NULL,NULL,'add',139,140),
	(78,74,NULL,NULL,'edit',141,142),
	(79,74,NULL,NULL,'delete',143,144),
	(86,1,NULL,NULL,'Subscriptions',146,149),
	(87,86,NULL,NULL,'terminated_subscription',147,148),
	(88,1,NULL,NULL,'SystemSettings',150,161),
	(89,88,NULL,NULL,'index',151,152),
	(90,88,NULL,NULL,'view',153,154),
	(91,88,NULL,NULL,'add',155,156),
	(92,88,NULL,NULL,'edit',157,158),
	(93,88,NULL,NULL,'delete',159,160),
	(95,22,NULL,NULL,'select_by_date',31,32),
	(97,22,NULL,NULL,'deleteSelected',33,34),
	(98,22,NULL,NULL,'viewPdf',35,36),
	(99,46,NULL,NULL,'member_add',104,105),
	(100,46,NULL,NULL,'member_view',106,107),
	(101,1,NULL,NULL,'Stockscontroller.old',162,163),
	(102,8,NULL,NULL,'deleteSelected',13,14);

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
	(2,NULL,'Group',2,NULL,5,14),
	(3,NULL,'Group',3,NULL,15,16),
	(4,1,'User',1,NULL,2,3),
	(5,2,'User',2,NULL,6,7),
	(6,2,'User',3,NULL,8,9),
	(7,2,'User',4,NULL,10,11),
	(8,2,'User',5,NULL,12,13);

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
	(1,1,1,'1','1','1','1'),
	(12,2,9,'1','1','1','1'),
	(13,3,9,'1','1','1','1'),
	(14,2,10,'1','1','1','1'),
	(15,3,10,'1','1','1','1'),
	(16,2,13,'1','1','1','1'),
	(17,3,13,'1','1','1','1'),
	(18,3,12,'1','1','1','1'),
	(19,2,12,'1','1','1','1'),
	(20,2,15,'1','1','1','1'),
	(21,3,15,'1','1','1','1'),
	(29,2,23,'1','1','1','1'),
	(30,3,23,'1','1','1','1'),
	(31,2,24,'1','1','1','1'),
	(32,3,24,'1','1','1','1'),
	(33,2,25,'1','1','1','1'),
	(34,3,25,'1','1','1','1'),
	(35,2,26,'1','1','1','1'),
	(36,3,26,'1','1','1','1'),
	(37,2,27,'1','1','1','1'),
	(38,3,27,'1','1','1','1'),
	(39,2,29,'1','1','1','1'),
	(40,3,29,'1','1','1','1'),
	(41,2,30,'1','1','1','1'),
	(42,3,30,'1','1','1','1'),
	(43,2,31,'1','1','1','1'),
	(44,3,31,'1','1','1','1'),
	(45,2,32,'1','1','1','1'),
	(46,3,32,'1','1','1','1'),
	(47,2,33,'1','1','1','1'),
	(48,3,33,'1','1','1','1'),
	(49,2,61,'1','1','1','1'),
	(50,3,61,'1','1','1','1'),
	(51,2,87,'1','1','1','1'),
	(52,3,87,'1','1','1','1'),
	(53,2,95,'1','1','1','1'),
	(54,3,95,'1','1','1','1'),
	(55,2,100,'1','1','1','1'),
	(56,3,100,'1','1','1','1'),
	(57,2,11,'1','1','1','1'),
	(58,3,11,'1','1','1','1'),
	(59,2,102,'1','1','1','1'),
	(60,3,102,'1','1','1','1');

/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_setting_id` int(11) DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `system_setting_id`, `subscription_id`, `created`, `modified`, `created_by`, `modified_by`)
VALUES
	(1,NULL,1,'2014-10-26 22:25:03','2014-10-26 22:25:03',1,1);

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
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
	(1,'administrator','2014-10-26 13:11:20','2014-10-26 13:11:20'),
	(2,'members','2014-10-26 13:11:28','2014-10-26 13:11:28'),
	(3,'staff','2014-10-26 13:11:35','2014-10-26 13:11:35');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table item_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item_categories`;

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueID` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table item_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item_images`;

CREATE TABLE `item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueID` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `image_path` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `minimum_qty` int(11) NOT NULL,
  `maximum_qty` int(11) NOT NULL,
  `unit_measurement_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `uniqueID`, `company_id`, `name`, `item_category_id`, `minimum_qty`, `maximum_qty`, `unit_measurement_id`, `created`, `modified`, `created_by`, `modified_by`)
VALUES
	(4,'i545cf53ce257a',1,'Barang 5',NULL,20,200,NULL,'2014-11-07 17:37:16','2014-11-07 17:37:16',NULL,NULL),
	(5,'0qQGtRApBX',1,'ASD',NULL,10,100,NULL,'2014-11-07 18:11:39','2014-11-07 18:11:39',NULL,NULL),
	(6,'IDUMJIWSQNCC',1,'Laala',NULL,10,100,NULL,'2014-11-07 18:13:21','2014-11-07 18:13:21',NULL,NULL),
	(7,'#0BZWKMKJLH',1,'WWW',NULL,100,1000,NULL,'2014-11-07 18:14:49','2014-11-07 18:14:49',NULL,NULL);

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `logon` datetime NOT NULL,
  `logout` datetime DEFAULT NULL,
  `user_agent` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table stocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `stock_in` varchar(200) DEFAULT NULL,
  `stock_out` varchar(200) DEFAULT NULL,
  `stock_balance` varchar(200) NOT NULL,
  `stock_status` varchar(50) NOT NULL DEFAULT '',
  `alert_color` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;

INSERT INTO `stocks` (`id`, `uniqueID`, `company_id`, `item_id`, `stock_in`, `stock_out`, `stock_balance`, `stock_status`, `alert_color`, `created`, `modified`, `created_by`, `modified_by`)
VALUES
	(1,NULL,1,1,'100',NULL,'100','',NULL,'2014-11-07 14:50:50','2014-11-07 14:50:50',NULL,NULL),
	(2,NULL,1,1,'20',NULL,'20','',NULL,'2014-11-07 15:12:19','2014-11-07 15:12:19',NULL,NULL),
	(3,NULL,1,1,'100',NULL,'100','',NULL,'2014-11-07 15:13:05','2014-11-07 15:13:05',NULL,NULL),
	(4,NULL,1,1,'100',NULL,'100','',NULL,'2014-11-07 15:13:21','2014-11-07 15:13:21',NULL,NULL),
	(5,NULL,1,1,'100',NULL,'100','',NULL,'2014-11-07 15:13:41','2014-11-07 15:13:41',NULL,NULL),
	(6,NULL,1,1,'100',NULL,'200','',NULL,'2014-11-07 15:29:06','2014-11-07 15:29:06',NULL,NULL),
	(7,'0',1,1,'100',NULL,'300','',NULL,'2014-11-07 15:42:07','2014-11-07 15:42:07',NULL,NULL),
	(8,'0',1,1,'100',NULL,'400','',NULL,'2014-11-07 15:43:29','2014-11-07 15:43:29',NULL,NULL),
	(9,'#_545cdac52f14b',1,1,'100',NULL,'20','',NULL,'2014-11-07 15:44:21','2014-11-07 15:44:21',NULL,NULL),
	(10,NULL,1,1,NULL,'10','10','',NULL,'2014-11-07 17:02:21','2014-11-07 17:02:21',NULL,NULL),
	(11,NULL,1,1,NULL,'5','5','Reached minimum quantity. Item need to restock',NULL,'2014-11-07 17:03:11','2014-11-07 17:03:11',NULL,NULL),
	(12,NULL,1,1,NULL,'5','0','Item out of stock',NULL,'2014-11-07 17:03:19','2014-11-07 17:03:19',NULL,NULL),
	(13,'#545cefd78763b',1,1,'100',NULL,'100','in',NULL,'2014-11-07 17:14:15','2014-11-07 17:14:15',NULL,NULL),
	(14,'#545cf05e41b0c',1,1,NULL,'50','50','',NULL,'2014-11-07 17:16:30','2014-11-07 17:16:30',NULL,NULL);

/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subs_billings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subs_billings`;

CREATE TABLE `subs_billings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueID` varchar(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table subscription_statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscription_statuses`;

CREATE TABLE `subscription_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table subscriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'Which user subscribing this',
  `subs_billing_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `plan` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table system_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_settings`;

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `company_banner` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
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
  `uniqueID` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
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

INSERT INTO `unit_measurements` (`id`, `uniqueID`, `company_id`, `name`, `key`, `created`, `modified`, `created_by`, `modified_by`)
VALUES
	(1,NULL,NULL,'Kilogram','Kilogram','2014-11-07 19:43:34','2014-11-07 19:43:34',NULL,NULL);

/*!40000 ALTER TABLE `unit_measurements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `group_id`, `company_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
VALUES
	(2,2,1,NULL,'Fariz Izwan','e8cadff5131bd89bc546289d3c4b8d98d4dda2b7','fariz@gmail.com',NULL,NULL,NULL,NULL,1,'2014-10-26 13:12:13','2014-10-26 13:12:13','0000-00-00 00:00:00',NULL,NULL),
	(3,2,NULL,NULL,'dsad','e8cadff5131bd89bc546289d3c4b8d98d4dda2b7','asdas@gmail.com',NULL,NULL,NULL,'1805b250bd7e268822507a735ec51f81',0,'2014-11-08 07:59:23','2014-11-08 07:59:23','0000-00-00 00:00:00',NULL,NULL),
	(4,2,NULL,NULL,'Fariz Izwan','e8cadff5131bd89bc546289d3c4b8d98d4dda2b7','malikpenrang@gmail.com',NULL,NULL,NULL,'4bb488bab72fafdfcdc920ed2c46ac50',0,'2014-11-08 07:59:54','2014-11-08 07:59:54','0000-00-00 00:00:00',NULL,NULL),
	(5,2,NULL,NULL,'Malik Perang','e8cadff5131bd89bc546289d3c4b8d98d4dda2b7','malikperang@gmail.com',NULL,NULL,NULL,'44d223e59306df00a908484c8f950803',0,'2014-11-11 15:31:28','2014-11-11 15:31:28','0000-00-00 00:00:00',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
