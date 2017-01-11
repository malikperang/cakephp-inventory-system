<?php 
include_once '../Lib/Cake/Core/App.php';
include_once '../Lib/Cake/Core/Configure.php';
include_once '../Lib/Cake/Utility/Security.php';
include_once '../Lib/Cake/Utility/String.php';
include_once '../Lib/Cake/Utility/Hash.php';

date_default_timezone_set('UTC');
session_start();
if (isset($_POST) && !empty($_POST)) {

	if(isset($_POST['dbset'])){
		$host 		= $_POST['dbhost'];
		$database 	= $_POST['dbname'];
		$username 	= $_POST['dbusername'];
		$password 	= $_POST['dbpass'];
		$tb_prefix 	= $_POST['dbprefix'];

		$_SESSION['dbhost'] 	= $host;
		$_SESSION['dbname'] 	= $database;
		$_SESSION['dbusername'] = $username;
		$_SESSION['dbpass']		= $password;
		$_SESSION['dbprefix'] 	= $tb_prefix; 

		try {
	    $dbc = new pdo( "mysql:host=$host;dbname=$database","$username","$password",
	                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    $data = "<?php
/**
*
*
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.Config
* @since         CakePHP(tm) v 0.2.9
*/

/**
* Database configuration class.
* You can specify multiple configurations for production, development and testing.
*
* datasource => The name of a supported datasource; valid options are as follows:
*  Database/Mysql - MySQL 4 & 5,
*  Database/Sqlite - SQLite (PHP5 only),
*  Database/Postgres - PostgreSQL 7 and higher,
*  Database/Sqlserver - Microsoft SQL Server 2005 and higher
*
* You can add custom database datasources (or override existing datasources) by adding the
* appropriate file to app/Model/Datasource/Database. Datasources should be named 'MyDatasource.php',
*
*
* persistent => true / false
* Determines whether or not the database should use a persistent connection
*
* host =>
* the host you connect to the database. To add a socket or port number, use 'port' => #
*
* prefix =>
* Uses the given prefix for all the tables in this database. This setting can be overridden
* on a per-table basis with the Model::\$tablePrefix property.
*
* schema =>
* For Postgres/Sqlserver specifies which schema you would like to use the tables in. Postgres defaults to 'public'. For Sqlserver, it defaults to empty and use
* the connected user's default schema (typically 'dbo').
*
* encoding =>
* For MySQL, Postgres specifies the character encoding to use when connecting to the
* database. Uses database default not specified.
*
* unix_socket =>
* For MySQL to connect via socket specify the `unix_socket` parameter instead of `host` and `port`
* settings =>
* Array of key/value pairs, on connection it executes SET statements for each pair
* For MySQL : http://dev.mysql.com/doc/refman/5.6/en/set-statement.html
* For Postgres : http://www.postgresql.org/docs/9.2/static/sql-set.html
* For Sql Server : http://msdn.microsoft.com/en-us/library/ms190356.aspx
*/
class DATABASE_CONFIG {

public \$default = array(
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => '$host',
	'login' => '$username',
	'password' => '$password',
	'database' => '$database',
	'prefix' => '$tb_prefix',
	'unix_socket'=>'',
	//'encoding' => 'utf8',
);

public \$test = array(
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'user',
	'password' => 'password',
	'database' => 'test_database_name',
	'prefix' => '',
	//'encoding' => 'utf8',
);
}";
	   	
		
		if (file_put_contents('../Config/database.php', $data)) {
			echo json_encode(array('message'=>'success'));
		}else{
			echo json_encode(array('message'=>'failed'));
		}
			
		}
		catch(PDOException $ex){
		    die(json_encode(array('message'=>'Sorry! We are unable to connect to database using the given credentials.')));
		}
	} 

	if (isset($_POST['addadmin'])) {
		$group = $_POST['group'];
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		Configure::write('Security.salt', 'eb7af1cbafe40eb253225721c9b32ee9242ab1df');
		$salt = Configure::read("Security.salt");
		$pass  = Security::hash($_POST['password'], null, true);

		$host 		= $_SESSION['dbhost'];
		$database 	= $_SESSION['dbname'];
		$username 	= $_SESSION['dbusername'];
		$password 	= $_SESSION['dbpass'];
		$tb_prefix 	= $_SESSION['dbprefix'];

		$_SESSION['adminemail'] = $_POST['email'];
		try {
	    $dbc = new  pdo( "mysql:host=$host;dbname=$database","$username","$password",
	                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    $stmt = $dbc->prepare("
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

			
			UNLOCK TABLES;


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

				INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
				VALUES (1,NULL,'Group',1,NULL,1,4),(3,1,'User',1,NULL,2,3);

				UNLOCK TABLES;

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

				INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
				VALUES
					(1,1,1,'1','1','1','1');

				UNLOCK TABLES;


				DROP TABLE IF EXISTS `groups`;

				CREATE TABLE `groups` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(100) NOT NULL,
				  `created` datetime DEFAULT NULL,
				  `modified` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;

				LOCK TABLES `groups` WRITE;
				

				INSERT INTO `groups` (`name`, `created`, `modified`)
				VALUES
					('administrator',:today,:today);

				UNLOCK TABLES;

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
				
				INSERT INTO `users` (`group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
				VALUES
					(1,NULL,:fname,:pass,:email,NULL,NULL,NULL,NULL,1,:today,:today,'0000-00-00 00:00:00',NULL,NULL);

				UNLOCK TABLES;

				DROP TABLE IF EXISTS `stock_statuses`;

				CREATE TABLE `stock_statuses` (
				  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) DEFAULT NULL,
				  `created` int(11) DEFAULT NULL,
				  `modified` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;

				LOCK TABLES `stock_statuses` WRITE;

				INSERT INTO `stock_statuses` (`id`, `name`, `created`, `modified`)
				VALUES
					(1,'in',NULL,NULL),
					(2,'out',NULL,NULL),
					(3,'Reached minimum quantity. Item need to restock',NULL,NULL),
					(4,'Item out of stock',NULL,NULL);

				UNLOCK TABLES;


				");
	  
	  	if (!empty($tb_prefix)) {
	  		$stmt = $dbc->prepare("
	    	DROP TABLE IF EXISTS `{$tb_prefix}acos`;

			CREATE TABLE `{$tb_prefix}acos` (
			  `id` int(10) NOT NULL AUTO_INCREMENT,
			  `parent_id` int(10) DEFAULT NULL,
			  `model` varchar(255) DEFAULT NULL,
			  `foreign_key` int(10) DEFAULT NULL,
			  `alias` varchar(255) DEFAULT NULL,
			  `lft` int(10) DEFAULT NULL,
			  `rght` int(10) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;

			LOCK TABLES `{$tb_prefix}acos` WRITE;

			INSERT INTO `{$tb_prefix}acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
			VALUES
				(1,NULL,NULL,NULL,'controllers',1,106),
				(2,1,NULL,NULL,'Items',2,15),
				(3,2,NULL,NULL,'index',3,4),
				(4,2,NULL,NULL,'view',5,6),
				(5,2,NULL,NULL,'add',7,8),
				(6,2,NULL,NULL,'edit',9,10),
				(7,2,NULL,NULL,'delete',11,12),
				(8,2,NULL,NULL,'deleteSelected',13,14),
				(9,1,NULL,NULL,'Pages',16,19),
				(10,9,NULL,NULL,'display',17,18),
				(11,1,NULL,NULL,'Stocks',20,37),
				(12,11,NULL,NULL,'index',21,22),
				(13,11,NULL,NULL,'view',23,24),
				(14,11,NULL,NULL,'add',25,26),
				(15,11,NULL,NULL,'delete',27,28),
				(16,11,NULL,NULL,'deleteSelected',29,30),
				(17,11,NULL,NULL,'select_by_date',31,32),
				(18,11,NULL,NULL,'report',33,34),
				(19,11,NULL,NULL,'search',35,36),
				(20,1,NULL,NULL,'SystemSettings',38,45),
				(21,20,NULL,NULL,'add',39,40),
				(22,20,NULL,NULL,'edit',41,42),
				(23,20,NULL,NULL,'delete',43,44),
				(24,1,NULL,NULL,'UnitMeasurements',46,55),
				(25,24,NULL,NULL,'add',47,48),
				(26,24,NULL,NULL,'edit',49,50),
				(27,24,NULL,NULL,'delete',51,52),
				(28,24,NULL,NULL,'deleteSelected',53,54),
				(29,1,NULL,NULL,'AclManagement',56,105),
				(30,29,NULL,NULL,'Groups',57,68),
				(31,30,NULL,NULL,'index',58,59),
				(32,30,NULL,NULL,'view',60,61),
				(33,30,NULL,NULL,'add',62,63),
				(34,30,NULL,NULL,'edit',64,65),
				(35,30,NULL,NULL,'delete',66,67),
				(36,29,NULL,NULL,'UserPermissions',69,78),
				(37,36,NULL,NULL,'index',70,71),
				(38,36,NULL,NULL,'sync',72,73),
				(39,36,NULL,NULL,'edit',74,75),
				(40,36,NULL,NULL,'toggle',76,77),
				(41,29,NULL,NULL,'Users',79,104),
				(42,41,NULL,NULL,'login',80,81),
				(43,41,NULL,NULL,'logout',82,83),
				(44,41,NULL,NULL,'index',84,85),
				(45,41,NULL,NULL,'view',86,87),
				(46,41,NULL,NULL,'add',88,89),
				(47,41,NULL,NULL,'edit',90,91),
				(48,41,NULL,NULL,'delete',92,93),
				(49,41,NULL,NULL,'toggle',94,95),
				(50,41,NULL,NULL,'forgot_password',96,97),
				(51,41,NULL,NULL,'activate_password',98,99),
				(52,41,NULL,NULL,'confirm_email_update',100,101),
				(53,41,NULL,NULL,'dashboard',102,103);

			
			UNLOCK TABLES;

				DROP TABLE IF EXISTS `{$tb_prefix}aros`;

				CREATE TABLE `{$tb_prefix}aros` (
				  `id` int(10) NOT NULL AUTO_INCREMENT,
				  `parent_id` int(10) DEFAULT NULL,
				  `model` varchar(255) DEFAULT NULL,
				  `foreign_key` int(10) DEFAULT NULL,
				  `alias` varchar(255) DEFAULT NULL,
				  `lft` int(10) DEFAULT NULL,
				  `rght` int(10) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;

				LOCK TABLES `{$tb_prefix}aros` WRITE;

				INSERT INTO `{$tb_prefix}aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
				VALUES (1,NULL,'Group',1,NULL,1,4),(3,1,'User',1,NULL,2,3);

				UNLOCK TABLES;

				DROP TABLE IF EXISTS `{$tb_prefix}aros_acos`;

				CREATE TABLE `{$tb_prefix}aros_acos` (
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

				LOCK TABLES `{$tb_prefix}aros_acos` WRITE;

				INSERT INTO `{$tb_prefix}aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
				VALUES
					(1,1,1,'1','1','1','1');

				UNLOCK TABLES;


				DROP TABLE IF EXISTS `{$tb_prefix}groups`;

				CREATE TABLE `{$tb_prefix}groups` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(100) NOT NULL,
				  `created` datetime DEFAULT NULL,
				  `modified` datetime DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;

				LOCK TABLES `{$tb_prefix}groups` WRITE;

				INSERT INTO `{$tb_prefix}groups` (`name`, `created`, `modified`)
				VALUES
					('administrator',:today,:today);
				UNLOCK TABLES;

				DROP TABLE IF EXISTS `{$tb_prefix}items`;

				CREATE TABLE `{$tb_prefix}items` (
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

				DROP TABLE IF EXISTS `{$tb_prefix}stocks`;

				CREATE TABLE `{$tb_prefix}stocks` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `transID` varchar(200) NOT NULL DEFAULT '',
				  `item_id` int(11) NOT NULL,
				  `stock_in` varchar(200) DEFAULT NULL,
				  `stock_out` varchar(200) DEFAULT NULL,
				  `stock_balance` varchar(200) NOT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime NOT NULL,
				  `created_by` int(11) DEFAULT NULL,
				  `modified_by` int(11) DEFAULT NULL,
				  `transaction_remarks` varchar(255) DEFAULT NULL,
				  `stock_status_id` int(11) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;
				
				DROP TABLE IF EXISTS `{$tb_prefix}system_settings`;

				CREATE TABLE `{$tb_prefix}system_settings` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) DEFAULT NULL,
				  `title` varchar(255) DEFAULT NULL,
				  `created` datetime NOT NULL,
				  `modified` datetime DEFAULT NULL,
				  `created_by` int(11) DEFAULT NULL,
				  `modified_by` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;


				DROP TABLE IF EXISTS `{$tb_prefix}unit_measurements`;

				CREATE TABLE `{$tb_prefix}unit_measurements` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(100) NOT NULL,
				  `key` varchar(100) NOT NULL,
				  `created` datetime DEFAULT NULL,
				  `modified` datetime DEFAULT NULL,
				  `created_by` int(11) DEFAULT NULL,
				  `modified_by` int(11) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;


				DROP TABLE IF EXISTS `{$tb_prefix}users`;

				CREATE TABLE `{$tb_prefix}users` (
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

				LOCK TABLES `{$tb_prefix}users` WRITE;

				INSERT INTO `{$tb_prefix}users` (`group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
				VALUES
					(1,NULL,:fname,:pass,:email,NULL,NULL,NULL,NULL,1,:today,:today,'0000-00-00 00:00:00',NULL,NULL);

				
				UNLOCK TABLES;
				");
	  	}else{

	  	}
	    if($stmt->execute(array('fname'=>$fname,'pass'=>$pass,'email'=>$email,'today'=>date('Y-m-d H:i:s')))){
	    	 echo json_encode(array('message'=>'success'));

	    }else{
	    	 echo json_encode(array('message'=>'failed'));
	    }	
	  
		}catch(PDOException $ex){
			// print_r($ex);
		    die(json_encode(array('message'=>'Sorry! We are unable to connect to database using the given credentials.')));
		}
	}

	if (isset($_POST['adduser'])) {
		$group = $_POST['group'];
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		Configure::write('Security.salt', 'eb7af1cbafe40eb253225721c9b32ee9242ab1df');
		$salt = Configure::read("Security.salt");
		$pass  = Security::hash($_POST['password'], null, true);

		$host 		= $_SESSION['dbhost'];
		$database 	= $_SESSION['dbname'];
		$username 	= $_SESSION['dbusername'];
		$password 	= $_SESSION['dbpass'];
		$tb_prefix 	= $_SESSION['dbprefix'];

		if ($email == $_SESSION['adminemail']) {
		 	 echo json_encode(array('message'=>'Cant use same email.'));	 
		}else{
			try {
		    $dbc = new  pdo( "mysql:host=$host;dbname=$database","$username","$password",
		                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		    $stmt = $dbc->prepare("
		    	LOCK TABLES `groups` WRITE;

				INSERT INTO `groups` (`name`, `created`, `modified`)
				VALUES
					(:gname,:today,:today);

				UNLOCK TABLES;
		    	LOCK TABLES `users` WRITE;
		    	INSERT INTO `users` (`group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
				VALUES (2,NULL,:fname,:pass,:email,NULL,NULL,NULL,NULL,1,:today,:today,'0000-00-00 00:00:00',NULL,NULL);
				UNLOCK TABLES;

				LOCK TABLES `aros` WRITE;

				INSERT INTO `aros` (`id`,`parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
				VALUES (2,NULL,'Group',2,NULL,5,8),(4,3,'User',2,NULL,6,7);
				UNLOCK TABLES;

				LOCK TABLES `aros_acos` WRITE;

				INSERT INTO `aros_acos` (`aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
				VALUES
					(2,9,'1','1','1','1'),
					(2,10,'1','1','1','1'),
					(2,11,'1','1','1','1'),
					(2,12,'1','1','1','1'),
					(2,13,'1','1','1','1'),
					(2,14,'1','1','1','1'),
					(2,18,'1','1','1','1'),
					(2,19,'1','1','1','1'),
					(2,20,'1','1','1','1'),
					(2,23,'1','1','1','1'),
					(2,24,'1','1','1','1'),
					(2,25,'1','1','1','1'),
					(2,31,'1','1','1','1'),
					(2,32,'1','1','1','1'),
					(2,33,'1','1','1','1'),
					(2,34,'1','1','1','1'),
					(2,52,'1','1','1','1'),
					(2,44,'1','1','1','1');

				UNLOCK TABLES;
		    	");
			if (!empty($tb_prefix)) {
				$stmt = $dbc->prepare("
		    	LOCK TABLES `{$tb_prefix}groups` WRITE;

				INSERT INTO `{$tb_prefix}groups` (`name`, `created`, `modified`)
				VALUES
					(:gname,:today,:today);

				UNLOCK TABLES;
		    	LOCK TABLES `{$tb_prefix}users` WRITE;
		    	INSERT INTO `{$tb_prefix}users` (`group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `token`, `status`, `created`, `modified`, `last_login`, `created_by`, `modified_by`)
				VALUES (2,NULL,:fname,:pass,:email,NULL,NULL,NULL,NULL,1,:today,:today,'0000-00-00 00:00:00',NULL,NULL);
				UNLOCK TABLES;

				LOCK TABLES `{$tb_prefix}aros` WRITE;

				INSERT INTO `{$tb_prefix}aros` (`id`,`parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`)
				VALUES (2,NULL,'Group',2,NULL,5,8),(4,3,'User',2,NULL,6,7);
				UNLOCK TABLES;

				LOCK TABLES `{$tb_prefix}aros_acos` WRITE;

				INSERT INTO `{$tb_prefix}aros_acos` (`aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`)
				VALUES
					(2,9,'1','1','1','1'),
					(2,10,'1','1','1','1'),
					(2,11,'1','1','1','1'),
					(2,12,'1','1','1','1'),
					(2,13,'1','1','1','1'),
					(2,14,'1','1','1','1'),
					(2,18,'1','1','1','1'),
					(2,19,'1','1','1','1'),
					(2,20,'1','1','1','1'),
					(2,23,'1','1','1','1'),
					(2,24,'1','1','1','1'),
					(2,25,'1','1','1','1'),
					(2,31,'1','1','1','1'),
					(2,32,'1','1','1','1'),
					(2,33,'1','1','1','1'),
					(2,34,'1','1','1','1'),
					(2,52,'1','1','1','1'),
					(2,44,'1','1','1','1');
				UNLOCK TABLES;
		    	");
			}
			   	$stmt->execute(array('gname'=>$group,'fname'=>$fname,'pass'=>$pass,'email'=>$email,'today'=>date('Y-m-d H:i:s')));
			   	echo json_encode(array('message'=>'success'));
			   
				}catch(PDOException $ex){
				    die(json_encode(array('message'=>'Sorry! We are unable to connect to database using the given credentials.')));
				}
			}
	}
}else{
	echo json_encode(array('message'=>'problem'));
}


?>