<?php
require(__DIR__ . "/dbconnection.php");
	//from dbconnection.php
	$stmt = getDB()->query("CREATE TABLE IF NOT EXISTS `Users` (  `email` varchar(50) NOT NULL,  `user_name` varchar(50) NOT NULL,  `first_name` char(50) NOT NULL,  `last_name` char(50) NOT NULL,  `password` varchar(255) NOT NULL,  `role` enum('client','product manager','admin') NOT NULL DEFAULT 'client',  `balance` decimal(10,2) DEFAULT '5000.00',  PRIMARY KEY (`email`),  UNIQUE KEY `Username` (`user_name`))");
	$stmt = getDB()->query("CREATE TABLE IF NOT EXISTS `Products` (  `asin` varchar(10) NOT NULL,  `title` varchar(200) NOT NULL,  `current_price` decimal(10,2) NOT NULL,  `description` varchar(2000) NOT NULL,  `out_of_stock` tinyint(1) NOT NULL,  `images` varchar(2000) NOT NULL,  `features` varchar(1000) NOT NULL,  `product_family_name` varchar(45) DEFAULT NULL,  `quantity` tinyint NOT NULL DEFAULT '0',  PRIMARY KEY (`asin`))");
	$stmt = getDB()->query("CREATE TABLE IF NOT EXISTS `Tracking` (  `user_name` varchar(50) NOT NULL,  `product_family_name` varchar(500) DEFAULT NULL,  PRIMARY KEY (`user_name`))");
	$stmt = getDB()->query("'CREATE TABLE IF NOT EXISTS `ProductFamily` (`product_family_name` varchar(45) NOT NULL, `count` int DEFAULT '0', PRIMARY KEY (`product_family_name`))");
	$stmt = getDB()->query("CREATE TABLE TrackStats (date DATETIME, count INT)");


?>	
