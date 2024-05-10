/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 8.0.30 : Database - db_e_pinter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_e_pinter` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_e_pinter`;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`name`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Kelompok 1','ACTIVE',1,0,NULL,'2024-05-04 06:10:17',NULL),
(2,'Kelompok 2','ACTIVE',1,0,NULL,'2024-05-04 06:10:46',NULL),
(3,'Kelompok 3','ACTIVE',1,0,NULL,'2024-05-04 06:11:01',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
