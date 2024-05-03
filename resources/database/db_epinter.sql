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

/*Table structure for table `activity_master` */

DROP TABLE IF EXISTS `activity_master`;

CREATE TABLE `activity_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_master` */

insert  into `activity_master`(`id`,`name`,`descriptions`,`images`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values
(1,'Kegiatan Pembelajaran 1','Gerak Lurus','','ACTIVE',1,0,NULL,'2024-05-03 10:58:24',NULL),
(2,'Kegiatan 2','Gerak Parabola','','ACTIVE',1,0,NULL,'2024-05-03 10:58:59',NULL),
(3,'Kegiatan 3','Gerak Melingkar','','ACTIVE',1,0,NULL,'2024-05-03 10:59:47',NULL);

/*Table structure for table `activity_step` */

DROP TABLE IF EXISTS `activity_step`;

CREATE TABLE `activity_step` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_step` */

insert  into `activity_step`(`id`,`title`,`descriptions`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values
(1,'Pengantaran Pembelajaran','Pengantaran Topik','ACTIVE',1,0,NULL,'2024-05-03 11:05:19',NULL),
(2,'Sintak 1','Memberikan pertanyaan esensial dari fenomena sekitar','ACTIVE',1,0,NULL,'2024-05-03 11:12:09',NULL),
(3,'Sintak 2','Menyusun jadwal dan merancang proyek berkelompok','ACTIVE',1,0,NULL,'2024-05-03 11:12:58',NULL),
(4,'Sintak 3','Pembuatan Proyek','ACTIVE',1,0,NULL,'2024-05-03 11:13:53',NULL),
(5,'Sintak 4','Melakukan eksperimen menggunakan teknologi','ACTIVE',1,0,NULL,'2024-05-03 11:14:18',NULL),
(6,'Sintak 5','Penyusunan laporan','ACTIVE',1,0,NULL,'2024-05-03 11:14:45',NULL),
(7,'Sintak 6','Refleksi','ACTIVE',1,0,NULL,'2024-05-03 11:15:08',NULL);

/*Table structure for table `activity_step_detail` */

DROP TABLE IF EXISTS `activity_step_detail`;

CREATE TABLE `activity_step_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` bigint(20) unsigned NOT NULL,
  `activity_master_id` bigint(20) unsigned NOT NULL,
  `activity_step_id` bigint(20) unsigned NOT NULL,
  `answers` text NOT NULL,
  `detail_progress` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_step_detail_user_group_id_foreign` (`user_group_id`),
  KEY `activity_step_detail_activity_master_id_foreign` (`activity_master_id`),
  KEY `activity_step_detail_activity_step_id_foreign` (`activity_step_id`),
  CONSTRAINT `activity_step_detail_activity_master_id_foreign` FOREIGN KEY (`activity_master_id`) REFERENCES `activity_master` (`id`),
  CONSTRAINT `activity_step_detail_activity_step_id_foreign` FOREIGN KEY (`activity_step_id`) REFERENCES `activity_step` (`id`),
  CONSTRAINT `activity_step_detail_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_step_detail` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2024_05_02_092519_create_user_group_table',2),
(6,'2024_05_02_093930_create_activity_master_table',2),
(9,'2024_05_02_094036_create_activity_step_table',3),
(10,'2024_05_02_094226_create_activity_step_detail_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`name`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values
(1,'Kelompok 1','ACTIVE',1,0,NULL,'2024-05-03 10:40:24',NULL),
(2,'Kelompok 2','ACTIVE',1,0,NULL,'2024-05-03 10:40:57',NULL),
(3,'Kelompok 3','ACTIVE',1,0,NULL,'2024-05-03 10:41:23',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`created_at`,`updated_at`) values
(1,'siswa257','siswa257@mailinator.com',NULL,'$2y$10$OB718NektacPelVLuFnF0.Pwlq4K/0VUX3zqgTK69V8DamAjuYl0y',NULL,NULL,NULL,'2024-03-05 11:35:31',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
