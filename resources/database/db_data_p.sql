/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_p
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_p` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_general_ci */;

USE `db_p`;

/*Data for the table `activity_master` */

insert  into `activity_master`(`id`,`name`,`descriptions`,`images`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Kegiatan Pembelajaran 1','Gerak Lurus','','ACTIVE',1,0,NULL,'2024-05-03 10:58:24',NULL),
(2,'Kegiatan 2','Gerak Parabola','','ACTIVE',1,0,NULL,'2024-05-03 10:58:59',NULL),
(3,'Kegiatan 3','Gerak Melingkar','','ACTIVE',1,0,NULL,'2024-05-03 10:59:47',NULL);

/*Data for the table `activity_step` */

insert  into `activity_step`(`id`,`title`,`descriptions`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Pengantaran Pembelajaran','Pengantaran Topik','ACTIVE',1,0,NULL,'2024-05-03 11:05:19',NULL),
(2,'Sintak 1','Memberikan pertanyaan esensial dari fenomena sekitar','ACTIVE',1,0,NULL,'2024-05-03 11:12:09',NULL),
(3,'Sintak 2','Menyusun jadwal dan merancang proyek berkelompok','ACTIVE',1,0,NULL,'2024-05-03 11:12:58',NULL),
(4,'Sintak 3','Pembuatan Proyek','ACTIVE',1,0,NULL,'2024-05-03 11:13:53',NULL),
(5,'Sintak 4','Melakukan eksperimen menggunakan teknologi','ACTIVE',1,0,NULL,'2024-05-03 11:14:18',NULL),
(6,'Sintak 5','Penyusunan laporan','ACTIVE',1,0,NULL,'2024-05-03 11:14:45',NULL),
(7,'Sintak 6','Refleksi','ACTIVE',1,0,NULL,'2024-05-03 11:15:08',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
