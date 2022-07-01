/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.24-MariaDB : Database - ajax_chat_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ajax_chat_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ajax_chat_app`;

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `added_on` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chat` */

insert  into `chat`(`chat_id`,`message`,`added_on`,`user_id`) values 
(1,'Hello','1649800139',4),
(2,'bro How are you?','1649800170',4),
(3,'helo Ravi how are you?','1649800202',1),
(4,'yes bro','1649800288',4),
(5,'where are you?','1649800466',1),
(6,'Iam at jamshoro','1649800492',4),
(7,'helo Friends ','1649800539',2),
(8,'hi','1649800742',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `image_path` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`password`,`is_online`,`image_path`) values 
(1,'Salman','khan','salman@gmail.com','12345',0,'images/salmanpic.jpg'),
(2,'Amir','khaskheli','amir@gmail.com','12345',0,'images/Amir.jpg'),
(3,'Uni','Sindh ','uni@gmail.com','12345678',0,'images/uni.jpg'),
(4,'Ravi','Rathore','ravi@gmail.com','123',0,'images/ravi.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
