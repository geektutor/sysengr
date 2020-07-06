/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.7.24 : Database - sysengr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sysengr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sysengr`;

/*Table structure for table `clearance` */

DROP TABLE IF EXISTS `clearance`;

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `matric` bigint(20) NOT NULL,
  `adviser_no` varchar(20) NOT NULL,
  `superviser_no` varchar(20) NOT NULL,
  `comment` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clearance` */

insert  into `clearance`(`id`,`title`,`matric`,`adviser_no`,`superviser_no`,`comment`,`status`,`date_added`) values (1,'How to kill a rat',123456789,'123456789','123456780','',1,'2020-06-11 00:00:00'),(2,'Learning arrays in javascript',123456789,'123456780','123456780',NULL,0,'2020-07-06 14:10:59'),(3,'The Seven Pillars Of Wisdom',123456789,'123456780','123456789',NULL,0,'2020-07-06 15:24:13');

/*Table structure for table `complaints` */

DROP TABLE IF EXISTS `complaints`;

CREATE TABLE `complaints` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `complaint` longtext NOT NULL,
  `reciever` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `complaints` */

insert  into `complaints`(`ID`,`email`,`complaint`,`reciever`) values (1,'zubairidrisaweda@gmail.com','I love you','1'),(2,'zubairidrisaweda@gmail.com','I love you','Course Advisor'),(3,'mumu@mumu.com','lol','Supervisor'),(4,'mumu@mumu.com','vdkjb;','HOD'),(5,'mumu@mumu.com','I am testing ','HOD'),(6,'mumu@mumu.com','I love you','HOD'),(7,'test@test.com','This is the student test','Course Advisor'),(8,'Anonymous','hhhhhh','daddysodiq@gmail.com');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_number` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`user_number`,`name`,`email`,`password`,`type`) values (1,123456789,'Dr. Zubair Idris Aweda','zubairidrisaweda@gmail.com','$2y$10$peLJIMY.zXrpXVe21S5FFuYKPPGzfqxvFV8B.Q3/MAq3juwWfNOFu',2),(2,190408024,'PHP Artisan','mumu@mumu.com','$2y$10$gwfe0t0fTwGlqEX/tcROs.sRrfNJjKKmCiWI7O21zfVhAdUehbT0C',0),(3,123456780,'Prof. El Hajj Zubair','test@test.com','$2y$10$gwfe0t0fTwGlqEX/tcROs.sRrfNJjKKmCiWI7O21zfVhAdUehbT0C',2),(4,1246890012,'Dr. Adeola Benson','test@test.com','$2y$10$gwfe0t0fTwGlqEX/tcROs.sRrfNJjKKmCiWI7O21zfVhAdUehbT0C',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
