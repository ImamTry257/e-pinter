/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 5.7.42 : Database - db_dev_epinter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dev_epinter` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_dev_epinter`;

/*Table structure for table `activity_master` */

DROP TABLE IF EXISTS `activity_master`;

CREATE TABLE `activity_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_id` int(11) NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_step` */

insert  into `activity_step`(`id`,`title`,`step_id`,`descriptions`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Pengantaran Pembelajaran',0,'Pengantaran Topik','ACTIVE',1,0,NULL,'2024-05-03 11:05:19',NULL),
(2,'Sintak 1',1,'Memberikan pertanyaan esensial dari fenomena sekitar','ACTIVE',1,0,NULL,'2024-05-03 11:12:09',NULL),
(3,'Sintak 2',2,'Menyusun jadwal dan merancang proyek berkelompok','ACTIVE',1,0,NULL,'2024-05-03 11:12:58',NULL),
(4,'Sintak 3',3,'Pembuatan Proyek','ACTIVE',1,0,NULL,'2024-05-03 11:13:53',NULL),
(5,'Sintak 4',4,'Melakukan eksperimen menggunakan teknologi','ACTIVE',1,0,NULL,'2024-05-03 11:14:18',NULL),
(6,'Sintak 5',5,'Penyusunan laporan','ACTIVE',1,0,NULL,'2024-05-03 11:14:45',NULL),
(7,'Sintak 6',6,'Refleksi','ACTIVE',1,0,NULL,'2024-05-03 11:15:08',NULL);

/*Table structure for table `activity_step_detail` */

DROP TABLE IF EXISTS `activity_step_detail`;

CREATE TABLE `activity_step_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `activity_progress_id` bigint(20) unsigned DEFAULT NULL,
  `is_intro` int(11) NOT NULL DEFAULT '0',
  `answers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_progress` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_step_detail_activity_progress_id_foreign` (`activity_progress_id`),
  CONSTRAINT `activity_step_detail_activity_progress_id_foreign` FOREIGN KEY (`activity_progress_id`) REFERENCES `activity_step_progress` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_step_detail` */

insert  into `activity_step_detail`(`id`,`activity_progress_id`,`is_intro`,`answers`,`detail_progress`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,1,'{\"type\":\"intro\",\"presentase\":100,\"value\":\"intro_step\"}',100,1,1,NULL,'2024-05-25 08:11:24','2024-06-02 17:19:51'),
(2,2,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"answer-a\\\",\\\"value_text\\\":\\\"pppp\\\",\\\"value_html\\\":\\\"<p>pppp<br><\\/p>\\\"},{\\\"id\\\":\\\"answer-b\\\",\\\"value_text\\\":\\\"hhhh\\\",\\\"value_html\\\":\\\"<p>hhhh<br><\\/p>\\\"}]\"}',100,1,0,NULL,'2024-05-25 08:11:34',NULL),
(3,3,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"date\\\",\\\"value_text\\\":\\\"2024-05-08\\\",\\\"value_html\\\":\\\"2024-05-08\\\"},{\\\"id\\\":\\\"start_time\\\",\\\"value_text\\\":\\\"10:30\\\",\\\"value_html\\\":\\\"10:30\\\"},{\\\"id\\\":\\\"end_time\\\",\\\"value_text\\\":\\\"13:30\\\",\\\"value_html\\\":\\\"13:30\\\"},{\\\"id\\\":\\\"title\\\",\\\"value_text\\\":\\\"judul1\\\",\\\"value_html\\\":\\\"judul1\\\"},{\\\"id\\\":\\\"descriptions\\\",\\\"value_text\\\":\\\"detail1\\\",\\\"value_html\\\":\\\"<p>detail1<br><\\/p>\\\"}]\"}',100,1,1,NULL,'2024-05-25 08:12:13','2024-05-25 08:12:35'),
(4,4,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"file\\\",\\\"value_text\\\":\\\"100_3_20240525111038.mp4\\\",\\\"value_html\\\":\\\"100_3_20240525111038.mp4\\\"}]\"}',100,1,1,NULL,'2024-05-25 11:09:59','2024-05-25 11:10:38'),
(5,5,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"file\\\",\\\"value_text\\\":\\\"100_4_20240525111055.jpg\\\",\\\"value_html\\\":\\\"100_4_20240525111055.jpg\\\"}]\"}',100,1,0,NULL,'2024-05-25 11:10:55',NULL),
(6,9,1,'{\"type\":\"intro\",\"presentase\":100,\"value\":\"intro_step\"}',100,2,0,NULL,'2024-06-05 11:34:03',NULL),
(7,10,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"answer-a\\\",\\\"value_text\\\":\\\"weqweqw\\\",\\\"value_html\\\":\\\"<p>weqweqw<\\/p>\\\"},{\\\"id\\\":\\\"answer-b\\\",\\\"value_text\\\":\\\"xzczxc\\\",\\\"value_html\\\":\\\"<p>xzczxc<\\/p>\\\"}]\"}',100,2,0,NULL,'2024-06-05 11:34:23',NULL),
(8,11,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"date\\\",\\\"value_text\\\":\\\"2024-06-03\\\",\\\"value_html\\\":\\\"2024-06-03\\\"},{\\\"id\\\":\\\"start_time\\\",\\\"value_text\\\":\\\"11:36\\\",\\\"value_html\\\":\\\"11:36\\\"},{\\\"id\\\":\\\"end_time\\\",\\\"value_text\\\":\\\"14:36\\\",\\\"value_html\\\":\\\"14:36\\\"},{\\\"id\\\":\\\"title\\\",\\\"value_text\\\":\\\"fffff\\\",\\\"value_html\\\":\\\"fffff\\\"},{\\\"id\\\":\\\"descriptions\\\",\\\"value_text\\\":\\\"xczxczx\\\",\\\"value_html\\\":\\\"<p>xczxczx<\\/p>\\\"}]\"}',100,2,2,NULL,'2024-06-05 11:36:20','2024-06-05 11:36:22'),
(9,12,0,'{\"type\":\"non-intro\",\"presentase\":100,\"value\":\"[{\\\"id\\\":\\\"file\\\",\\\"value_text\\\":{},\\\"value_html\\\":{}}]\"}',100,2,0,NULL,'2024-06-05 11:36:31',NULL);

/*Table structure for table `activity_step_progress` */

DROP TABLE IF EXISTS `activity_step_progress`;

CREATE TABLE `activity_step_progress` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_group_id` bigint(20) unsigned NOT NULL,
  `activity_master_id` bigint(20) unsigned NOT NULL,
  `activity_step_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_step_progress_user_group_id_foreign` (`user_group_id`),
  KEY `activity_step_progress_activity_master_id_foreign` (`activity_master_id`),
  KEY `activity_step_progress_activity_step_id_foreign` (`activity_step_id`),
  KEY `activity_step_progress_user_id_foreign` (`user_id`),
  CONSTRAINT `activity_step_progress_activity_master_id_foreign` FOREIGN KEY (`activity_master_id`) REFERENCES `activity_master` (`id`),
  CONSTRAINT `activity_step_progress_activity_step_id_foreign` FOREIGN KEY (`activity_step_id`) REFERENCES `activity_step` (`id`),
  CONSTRAINT `activity_step_progress_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`),
  CONSTRAINT `activity_step_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_step_progress` */

insert  into `activity_step_progress`(`id`,`user_id`,`user_group_id`,`activity_master_id`,`activity_step_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,1,1,1,NULL,'2024-05-25 08:11:01','2024-06-17 10:33:49'),
(2,1,1,1,2,NULL,'2024-05-25 08:11:24','2024-05-25 15:50:28'),
(3,1,1,1,3,NULL,'2024-05-25 08:11:34',NULL),
(4,1,1,1,4,NULL,'2024-05-25 08:12:35','2024-05-25 11:04:18'),
(5,1,1,1,5,NULL,'2024-05-25 11:10:38',NULL),
(6,1,1,1,6,NULL,'2024-05-25 11:10:55',NULL),
(7,1,2,2,1,NULL,'2024-06-02 17:14:18',NULL),
(8,1,1,2,1,NULL,'2024-06-02 17:14:21',NULL),
(9,2,1,1,1,NULL,'2024-06-05 11:33:58',NULL),
(10,2,1,1,2,NULL,'2024-06-05 11:34:03',NULL),
(11,2,1,1,3,NULL,'2024-06-05 11:34:23',NULL),
(12,2,1,1,4,NULL,'2024-06-05 11:36:22',NULL),
(13,2,1,1,5,NULL,'2024-06-05 11:36:31',NULL);

/*Table structure for table `activity_summary` */

DROP TABLE IF EXISTS `activity_summary`;

CREATE TABLE `activity_summary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `activity_master_id` bigint(20) unsigned NOT NULL,
  `is_completed` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_summary_user_id_foreign` (`user_id`),
  KEY `activity_summary_activity_master_id_foreign` (`activity_master_id`),
  CONSTRAINT `activity_summary_activity_master_id_foreign` FOREIGN KEY (`activity_master_id`) REFERENCES `activity_master` (`id`),
  CONSTRAINT `activity_summary_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_summary` */

insert  into `activity_summary`(`id`,`user_id`,`activity_master_id`,`is_completed`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,1,0,NULL,'2024-05-25 08:11:01',NULL),
(2,1,2,0,NULL,'2024-06-02 17:14:18',NULL),
(3,2,1,0,NULL,'2024-06-05 11:33:58',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2024_05_02_092519_create_user_group_table',1),
(6,'2024_05_02_093930_create_activity_master_table',1),
(7,'2024_05_02_094036_create_activity_step_table',1),
(8,'2024_05_02_094226_create_activity_step_detail_table',1),
(9,'2024_05_03_042841_add_user_group_id_columns_to_users_table',1),
(10,'2024_05_09_074559_add_is_intro_to_activity_step_detail_table',1),
(11,'2024_05_11_160750_create_activity_step_progress',1),
(12,'2024_05_11_161038_add_activity_progress_id_to_activity_step_detail_table',1),
(13,'2024_05_13_222034_add_user_id_to_activity_step_progress_table',1),
(14,'2024_05_14_095922_add_sintak_id_to_activity_step_table',1),
(15,'2024_05_24_025036_create_activity_summary_table',1),
(16,'2024_05_29_143730_create_teachers_table',2),
(17,'2024_06_04_141859_add_school_name_to_users_table',3),
(18,'2024_06_08_151446_create_question_master_table',4),
(19,'2024_06_08_151545_create_question_answer_key_table',4),
(20,'2024_06_08_151556_create_question_answer_user_table',4),
(21,'2024_06_08_151609_create_question_summary_user_table',4),
(22,'2024_06_08_154224_create_question_setting_table',4),
(23,'2024_06_08_171929_change_answer_to_activity_step_detail_table',4),
(24,'2024_06_16_130444_create_questionniare_master_table',5),
(25,'2024_06_16_130507_create_questionniare_user_answer',5),
(26,'2024_06_16_130527_create_questionniare_user_summary',5),
(27,'2024_06_16_141849_add_answer_code_to_questionniare_user_answer_table',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `question_answer_key` */

DROP TABLE IF EXISTS `question_answer_key`;

CREATE TABLE `question_answer_key` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_master_id` bigint(20) unsigned NOT NULL,
  `key_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'kunci jawaban, data string json',
  `key_answer_with_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'pilihan ganda yang digunakan untuk mengetahui jawaban alasan, data sting json',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_answer_key_question_master_id_foreign` (`question_master_id`),
  CONSTRAINT `question_answer_key_question_master_id_foreign` FOREIGN KEY (`question_master_id`) REFERENCES `question_master` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `question_answer_key` */

insert  into `question_answer_key`(`id`,`question_master_id`,`key_answer`,`key_answer_with_reason`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,'A','D',1,1,0,NULL,'2024-06-12 08:49:16',NULL),
(2,2,'B','C',1,1,0,NULL,'2024-06-12 08:51:18',NULL),
(3,3,'C','A',1,1,0,NULL,'2024-06-12 08:51:42',NULL),
(4,4,'D','E',1,1,0,NULL,'2024-06-12 08:53:43',NULL),
(5,5,'A','B',1,1,0,NULL,'2024-06-12 08:54:15',NULL),
(6,6,'D','C',1,1,0,NULL,'2024-06-12 08:54:42',NULL),
(7,9,'C','A',1,1,0,NULL,'2024-06-12 08:55:02',NULL);

/*Table structure for table `question_answer_user` */

DROP TABLE IF EXISTS `question_answer_user`;

CREATE TABLE `question_answer_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `question_master_id` bigint(20) unsigned NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jawaban siswa, data string json',
  `answer_with_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jawaban siswa untuk pilihan ganda alasan, data sting json',
  `is_answered` int(11) NOT NULL COMMENT 'flaq untuk apakah sudah dijawab atau belum',
  `score` int(11) NOT NULL COMMENT 'nilai dari hasil jawaban dibandingkan dengan kunci jawaban siswa',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_answer_user_user_id_foreign` (`user_id`),
  KEY `question_answer_user_question_master_id_foreign` (`question_master_id`),
  CONSTRAINT `question_answer_user_question_master_id_foreign` FOREIGN KEY (`question_master_id`) REFERENCES `question_master` (`id`),
  CONSTRAINT `question_answer_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `question_answer_user` */

insert  into `question_answer_user`(`id`,`user_id`,`question_master_id`,`answer`,`answer_with_reason`,`is_answered`,`score`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,2,1,'B','D',1,2,1,2,2,NULL,'2024-06-12 09:15:00','2024-06-12 21:38:45'),
(2,2,2,'B','D',1,3,1,2,2,NULL,'2024-06-12 09:15:05','2024-06-12 21:37:12'),
(3,2,3,'B','A',1,2,1,2,2,NULL,'2024-06-12 09:15:08','2024-06-12 21:37:19'),
(4,2,5,'E','B',1,2,1,2,0,NULL,'2024-06-12 09:15:20',NULL),
(5,2,4,'-','-',1,0,1,2,0,NULL,'2024-06-12 09:15:22',NULL);

/*Table structure for table `question_master` */

DROP TABLE IF EXISTS `question_master`;

CREATE TABLE `question_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL COMMENT 'nomor soal',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'isi soal',
  `options` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'pilihan ganda, data sting json',
  `options_with_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'pilihan ganda yang digunakan untuk mengetahui jawaban alasan, data sting json',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `question_master` */

insert  into `question_master`(`id`,`number`,`description`,`options`,`options_with_reason`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,'<span style=\"font-family: Arial;\">Indonesia pada bulan Juni tahun 2024 akan menjalani pertandingan kualifikasi Piala Dunia, guna menjaga kebugaran fisiknya salah satu punggawa tim nasional yaitu Ricky Kambuaya menjalani latihan dengan berlari. Ricky memulai dengan titik awal di halaman rumahnya. Ricky mengawali lari dengan jarak 1200 m ke arah utara dan di lanjutkan 300 m ke arah barat, setelahnya Ricky menambah lagi dengan berlari 700 m ke arah utara menuju suatu Tugu. Sesampainya di Tugu, Ricky kemudian kembali lagi ke rumahnya. Rutinitas dalam satu kali sesi latihan Ricky melakukan minimal lima kali bolak balik dari rumahnya ke Tugu dan maksimal sepuluh kali bolak balik. Berdasarkan narasi tersebut dapat diketahui bahwa ….</span>\r\n<p><span style=\"font-family: Arial;\"><br /></span></p>','[{\"value_key\":\"A\",\"value_text\":\"<span style=\\\"font-family: Arial;\\\">Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 22000 m dan jarak maksimal yang ditempuhnya adalah 44000 m.<\\/span>\\r\\n<p><span style=\\\"font-family: Arial;\\\"><br \\/><\\/span><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 22000 m.\"},{\"value_key\":\"C\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 44000 m.\"},{\"value_key\":\"D\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 4400 m.\"},{\"value_key\":\"E\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 22000 m.\"}]','[{\"value_key\":\"A\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 22000 m dan jarak maksimal yang ditempuhnya adalah 44000 m.\"},{\"value_key\":\"B\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 22000 m.\"},{\"value_key\":\"C\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 4400 m dan jarak maksimal yang ditempuhnya adalah 44000 m.\"},{\"value_key\":\"D\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 4400 m.\"},{\"value_key\":\"E\",\"value_text\":\"Selama satu kali sesi latihan jarak minimal yang ditempuh Ricky 2200 m dan jarak maksimal yang ditempuhnya adalah 22000 m.\"}]',1,4,4,NULL,'2024-06-12 04:02:45','2024-06-12 04:03:58'),
(2,2,'Nur, Sigit, Tri, dan Tara mendaftarkan diri dalam satu kelompok untuk mengikuti lomba lari estafet. Nur sebagai pelari pertama menempuh jarak 50 m ke arah utara kemudian dilanjutkan Sigit sebagai pelari kedua dan berlari 60 m ke timur. Tri sebagai pelari ketiga berlari 35 m ke arah barat, dan Tara berlari sejauh 25 m ke garis finish yang membentuk sudut sudut 37⁰ kearah timur terhadap arah selatan.\r\nBerdasarkan narasi tersebut dapat diketahui bahwa ….\r\n','[{\"value_key\":\"A\",\"value_text\":\"Perpindahan yang dilalui oleh tongkat estafet sebesar 170 m\"},{\"value_key\":\"B\",\"value_text\":\"Perpindahan yang dilalui oleh tongkat estafet sebesar 50 m\"},{\"value_key\":\"C\",\"value_text\":\"Perpindahan yang dilalui oleh tongkat estafet sebesar 85 m\"},{\"value_key\":\"D\",\"value_text\":\"Perpindahan yang dilalui oleh tongkat estafet sebesar 0 m\"},{\"value_key\":\"E\",\"value_text\":\"Perpindahan yang dilalui oleh tongkat estafet tidak dapat ditentukan\"}]','\"[{\"value_key\":\"A\",\"value_text\":\"perpindahan merupakan total panjang lintasan yang ditempuh oleh suatu objek yang bergerak tanpa memandang arah lintasan\"},{\"value_key\":\"B\",\"value_text\":\"Perpindahan diartikan sebagai perubahan total posisi benda dari posisi akhir terhadap posisi awalnya\"},{\"value_key\":\"C\",\"value_text\":\"Perpindahan merupakan total panjang lintasan yang berada dalam arah yang sama saja\"},{\"value_key\":\"D\",\"value_text\":\"Tidak terjadi perpindahan karena tongkat estafet kembali ke posisi semula\"},{\"value_key\":\"E\",\"value_text\":\"Perpindahan tidak dapat ditentukan karena tongkat estafet melalui arah yang berbeda beda\"}]',1,1,0,NULL,'2024-06-08 23:43:23',NULL),
(3,3,'Arifin mengamati mobil A dan B yang bergerak dengan kecepatan tetap di jalan bebas hambatan yang lurus. Mobil A berjarak 200 m di depan mobil B. Jika kecepatan mobil A 54 km/jam dan kecepatan mobil B 72 km/jam, jarak yang ditempuh mobil B tepat menyusul mobil A adalah ….\r\n','[{\"value_key\":\"A\",\"value_text\":\"1200 m\"},{\"value_key\":\"B\",\"value_text\":\"1000 m\"},{\"value_key\":\"C\",\"value_text\":\"800 m\"},{\"value_key\":\"D\",\"value_text\":\"600 m\"},{\"value_key\":\"E\",\"value_text\":\"400 m\"}]','\"[{\"value_key\":\"A\",\"value_text\":\"jarak tempuh mobil B ketika menyalip adalah jarak tempuh mobil A dikurang 200 m, dan waktu yang diperlukan untuk menyalip adalah 40 detik\"},{\"value_key\":\"B\",\"value_text\":\"jarak tempuh mobil B ketika menyalip adalah jarak tempuh mobil A ditambah 200 m, dan waktu yang diperlukan untuk menyalip adalah 200 detik\"},{\"value_key\":\"C\",\"value_text\":\"jarak tempuh mobil B ketika menyalip adalah jarak tempuh mobil A ditambah 200 m, dan waktu yang diperlukan untuk menyalip adalah 40 detik\"},{\"value_key\":\"D\",\"value_text\":\"jarak tempuh mobil B ketika menyalip adalah jarak tempuh mobil A dikurang 200 m, dan waktu yang diperlukan untuk menyalip adalah 200 detik\"},{\"value_key\":\"E\",\"value_text\":\"jarak tempuh mobil B ketika menyalip dan jarak tempuh mobil A tidak saling mempengaruhi\"}]',1,1,0,NULL,'2024-06-08 23:43:27',NULL),
(4,4,'Suatu objek bermassa 500 gram dilemparkan pada sebuah lubang tambang. Objek tersebut dilemparkan ke dalam dengan kecepatan awal 6 m/s. Objek mampu mencapai dasar lubang setelah waktu 3 detik. <br/> Pernyataan berikut yang sesuai dengan deskripsi objek tersebut adalah ….','[{\"value_key\":\"A\",\"value_text\":\"kecepatan objek saat mencapai dasar lubang sebesar 36 m\\/s\"},{\"value_key\":\"B\",\"value_text\":\"objek mengalami kecepatan yang konstan selama perjalanan menuju dasar lubang\"},{\"value_key\":\"C\",\"value_text\":\"kecepatan objek saat mencapai dasar lubang sebesar 30 m\\/s\"},{\"value_key\":\"D\",\"value_text\":\"kecepatan objek semakin berkurang selama perjalanan menuju dasar lubang\"},{\"value_key\":\"E\",\"value_text\":\"objek tidak mengalami percepatan\"}]','[{\"value_key\":\"A\",\"value_text\":\"kecepatan awal tidak mempengaruhi kecepatan akhir saat mencapai dasar\"},{\"value_key\":\"B\",\"value_text\":\"percepatan gravitasi berubah-ubah sehingga kecepatan akhir saat mencapai dasar tidak dapat ditentukan\"},{\"value_key\":\"C\",\"value_text\":\"percepatan gravitasi menyebabkan benda yang bergerak vertikal ke bawah mengalami pertambahan kecepatan\"},{\"value_key\":\"D\",\"value_text\":\"percepatan gravitasi tidak mempengaruhi dalam penentuan kecepatan akhir saat mencapai dasar\"},{\"value_key\":\"E\",\"value_text\":\"kecepatan awal semakin besar ketika benda bergerak vertical ke bawah ke bawah\"}]',1,1,0,NULL,'2024-06-09 09:51:25',NULL),
(5,5,'Sebuah partikel bergerak dengan kecepatan konstan 12 m/s, kemudian partikel diperlambat sampai berhenti. Setelah 1,5 detik semenjak diperlambat partikel kecepatannya berkurang menjadi 7,5 m/s dan partikel berhenti tepat 4 detik semenjak diperlambat. <br/> Pernyataan berikut yang sesuai dengan deskripsi partikel tersebut adalah ….','[{\"value_key\":\"A\",\"value_text\":\"partikel menempuh jarak 12 m semenjak diperlambat sampai berhenti\"},{\"value_key\":\"B\",\"value_text\":\"partikel menempuh jarak 12 m setelah 1,5 detik semenjak diperlambat\"},{\"value_key\":\"C\",\"value_text\":\"partikel menempuh jarak 18 m setelah 1,5 detik semenjak diperlambat\"},{\"value_key\":\"D\",\"value_text\":\"partikel menempuh jarak 24 m setelah 1,5 detik semenjak diperlambat\"},{\"value_key\":\"E\",\"value_text\":\"partikel menempuh jarak 24 m semenjak diperlambat sampai berhenti\"}]','[{\"value_key\":\"A\",\"value_text\":\"perlambatan pada gerak partikel tersebut bernilai konstan yaitu 6 m\\/s2\"},{\"value_key\":\"B\",\"value_text\":\"perlambatan pada gerak partikel tersebut nilainya tidak stabil\"},{\"value_key\":\"C\",\"value_text\":\"perlambatan pada gerak partikel tersebut nilainya tidak stabil dan memiliki rata-rata perlambatan sebesar 6 m\\/s2\"},{\"value_key\":\"D\",\"value_text\":\"perlambatan pada gerak partikel tersebut nilainya tidak stabil dan memiliki rata-rata perlambatan sebesar 4,5 m\\/s2\"},{\"value_key\":\"E\",\"value_text\":\"perlambatan pada gerak partikel tersebut bernilai konstan yaitu 3 m\\/s2\"}]',1,1,0,NULL,'2024-06-09 09:51:25',NULL),
(6,6,'<p>\r\n<meta charset=\"utf-8\" /><b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-79319394-7fff-ed44-6ba7-31cb689ccc80\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Sebuah truk bergerak dari keadaan diam. Jarak yang ditempuh truk selama bergerak ditunjukkan dalam tabel berikut .</span></b></p>\r\n\r\n\r\n<p><b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-79319394-7fff-ed44-6ba7-31cb689ccc80\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\r\n<table style=\"width: 164px; height: 179px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>t(s)<br />\r\n			</td>\r\n			<td>x(m)<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>0<br />\r\n			</td>\r\n			<td>0<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2<br />\r\n			</td>\r\n			<td>8<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4<br />\r\n			</td>\r\n			<td>32<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6<br />\r\n			</td>\r\n			<td>72<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8<br />\r\n			</td>\r\n			<td>128<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10<br />\r\n			</td>\r\n			<td>200<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table></span></b></p>\r\n<b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-79319394-7fff-ed44-6ba7-31cb689ccc80\">Berdasarkan analisis terhadap data pada tabel, maka dapat dikatakan bahwa…\r\n<br class=\"Apple-interchange-newline\" />\r\n<br />\r\n</b>\r\n\r\n\r\n<p><br /></p>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br />\r\n</span></p>','[{\"value_key\":\"A\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-59534cc6-7fff-04a3-9843-72f04db427a1\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Selama 5 detik jarak yang ditempuh truk sebesar 60 m<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-9ff9383e-7fff-2046-a9a1-9d43394ff961\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Pada detik ke 5 truk tersebut berhenti<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"C\",\"value_text\":\"<p>D<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-79fc6245-7fff-6b04-8d51-aeca797d9365\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Selama 9 detik jarak yang ditempuh truk sebesar 162 m<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-62cb2d51-7fff-842c-6eae-48f9fb5629b7\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Percepatan yang di lakukan truk saat bergerak selalu meningkat<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"}]','[{\"value_key\":\"A\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-562cf1e3-7fff-da70-32ab-dd2e51d274b6\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">truk bergerak dengan kecepatan konstan<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<meta charset=\\\"utf-8\\\" \\/>\\r\\n<b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-ca992535-7fff-fd74-9e6b-d8c039cd88a5\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">truk mengalami gerak lurus berubah beraturan dipercepat dengan percepatan sebesar 2m\\/s<\\/span><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\"><span style=\\\"font-size:0.6em;vertical-align:super\\\">2<\\/span><\\/span><\\/b>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-e210cc25-7fff-1f60-b2a3-787610c6d3a8\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">truk mengalami gerak lurus berubah beraturan dipercepat dengan percepatan sebesar 4m\\/s<\\/span><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\"><span style=\\\"font-size:0.6em;vertical-align:super\\\">2<\\/span><\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-05327e63-7fff-3e7d-b936-15cc5b57bad4\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">truk mengalami gerak lurus berubah beraturan dipercepat dengan percepatan sebesar 6m\\/s<\\/span><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\"><span style=\\\"font-size:0.6em;vertical-align:super\\\">2<\\/span><\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-2c5280d5-7fff-60a8-6a1f-5c949660658d\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">kecepatan truk berubah setiap 2 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"}]',1,4,0,NULL,'2024-06-12 05:11:41',NULL),
(7,7,'<b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-349bd2d9-7fff-739b-ace0-2292ed3235c9\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pada waktu bersamaan dua bola dilempar ke atas, masing-masing dengan kelajuan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">A</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 10 m/s (Bola A) dan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">B</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 20 m/s (Bola B). Setelah 2 detik bola A kembali ke posisi awal. \r\n<b style=\"font-weight:normal\" id=\"docs-internal-guid-99d774d4-7fff-bbfc-9367-dec6166169fc\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Berdasarkan narasi tersebut dapat diketahui bahwa ….</span></b>\r\n</span></b>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>','[{\"value_key\":\"A\",\"value_text\":\"<p><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 10 m<\\/span>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<div>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-f173fc4f-7fff-4f8d-f625-13e8208d165d\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 15 m<\\/span><\\/b>\\r\\n<br \\/><\\/div>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-99e82629-7fff-78a1-a7b0-92edf5356d86\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">selisih jarak antara kedua bola pada saat bola A mencapai titik tertinggi adalah 10 m<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-88f2f950-7fff-950c-c634-40add274ea40\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum kedua bola adalah sama<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<meta charset=\\\"utf-8\\\" \\/>\\r\\n<b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-dd5e57dd-7fff-b0b4-f3b1-9686eb993bbc\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola B dua kali ketinggian maksimum bola A<\\/span><\\/b>\"}]','[{\"value_key\":\"A\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-21acc5a5-7fff-e14b-ef47-c4c6e855dd55\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak sama dengan waktu bola B mencapai puncak<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-534a86e8-7fff-fa2f-31eb-df6a2732b0e2\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak tidak dapat ditentukan<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-5c03fc38-7fff-1783-1424-a3ea9cf3dbdd\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 2 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-da8a91d8-7fff-303f-253f-942b0d9afdf8\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-c7e258c1-7fff-49fd-adbb-e6de61f3c84b\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"}]',1,4,0,NULL,'2024-06-12 05:17:17',NULL),
(8,7,'<b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-349bd2d9-7fff-739b-ace0-2292ed3235c9\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pada waktu bersamaan dua bola dilempar ke atas, masing-masing dengan kelajuan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">A</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 10 m/s (Bola A) dan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">B</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 20 m/s (Bola B). Setelah 2 detik bola A kembali ke posisi awal. \r\n<b style=\"font-weight:normal\" id=\"docs-internal-guid-99d774d4-7fff-bbfc-9367-dec6166169fc\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Berdasarkan narasi tersebut dapat diketahui bahwa ….</span></b>\r\n</span></b>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>','[{\"value_key\":\"A\",\"value_text\":\"<p><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 10 m<\\/span>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<div>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-f173fc4f-7fff-4f8d-f625-13e8208d165d\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 15 m<\\/span><\\/b>\\r\\n<br \\/><\\/div>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-99e82629-7fff-78a1-a7b0-92edf5356d86\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">selisih jarak antara kedua bola pada saat bola A mencapai titik tertinggi adalah 10 m<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-88f2f950-7fff-950c-c634-40add274ea40\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum kedua bola adalah sama<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<meta charset=\\\"utf-8\\\" \\/>\\r\\n<b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-dd5e57dd-7fff-b0b4-f3b1-9686eb993bbc\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola B dua kali ketinggian maksimum bola A<\\/span><\\/b>\"}]','[{\"value_key\":\"A\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-21acc5a5-7fff-e14b-ef47-c4c6e855dd55\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak sama dengan waktu bola B mencapai puncak<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-534a86e8-7fff-fa2f-31eb-df6a2732b0e2\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak tidak dapat ditentukan<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-5c03fc38-7fff-1783-1424-a3ea9cf3dbdd\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 2 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-da8a91d8-7fff-303f-253f-942b0d9afdf8\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-c7e258c1-7fff-49fd-adbb-e6de61f3c84b\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"}]',1,4,0,NULL,'2024-06-12 05:18:00',NULL),
(9,7,'<b style=\"font-weight: normal; font-family: sans-serif;\" id=\"docs-internal-guid-349bd2d9-7fff-739b-ace0-2292ed3235c9\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pada waktu bersamaan dua bola dilempar ke atas, masing-masing dengan kelajuan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">A</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 10 m/s (Bola A) dan V</span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span style=\"font-size:0.6em;vertical-align:sub\">B</span></span><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;= 20 m/s (Bola B). Setelah 2 detik bola A kembali ke posisi awal. \r\n<b style=\"font-weight:normal\" id=\"docs-internal-guid-99d774d4-7fff-bbfc-9367-dec6166169fc\"><span style=\"font-size: 11pt; color: rgb(0, 0, 0); background-color: transparent; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Berdasarkan narasi tersebut dapat diketahui bahwa ….</span></b>\r\n</span></b>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>','[{\"value_key\":\"A\",\"value_text\":\"<p><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 10 m<\\/span>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<div>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-f173fc4f-7fff-4f8d-f625-13e8208d165d\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola A adalah 15 m<\\/span><\\/b>\\r\\n<br \\/><\\/div>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-99e82629-7fff-78a1-a7b0-92edf5356d86\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">selisih jarak antara kedua bola pada saat bola A mencapai titik tertinggi adalah 10 m<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-88f2f950-7fff-950c-c634-40add274ea40\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum kedua bola adalah sama<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<meta charset=\\\"utf-8\\\" \\/>\\r\\n<b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-dd5e57dd-7fff-b0b4-f3b1-9686eb993bbc\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">ketinggian maksimum bola B dua kali ketinggian maksimum bola A<\\/span><\\/b>\"}]','[{\"value_key\":\"A\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-21acc5a5-7fff-e14b-ef47-c4c6e855dd55\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak sama dengan waktu bola B mencapai puncak<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"B\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-534a86e8-7fff-fa2f-31eb-df6a2732b0e2\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak tidak dapat ditentukan<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"C\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-5c03fc38-7fff-1783-1424-a3ea9cf3dbdd\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 2 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"D\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-da8a91d8-7fff-303f-253f-942b0d9afdf8\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola A mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"},{\"value_key\":\"E\",\"value_text\":\"<p>\\r\\n\\r\\n<meta charset=\\\"utf-8\\\" \\/><b style=\\\"font-weight:normal\\\" id=\\\"docs-internal-guid-c7e258c1-7fff-49fd-adbb-e6de61f3c84b\\\"><span style=\\\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap\\\">Waktu ketika bola B mencapai puncak yaitu 1 detik<\\/span><\\/b>\\r\\n<br \\/><\\/p>\"}]',1,4,0,NULL,'2024-06-12 05:47:22',NULL);

/*Table structure for table `question_setting` */

DROP TABLE IF EXISTS `question_setting`;

CREATE TABLE `question_setting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kegiatan mengerjakan soal di E-Pinter',
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'durasi waktu mengerjakan soal',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `question_setting` */

insert  into `question_setting`(`id`,`title`,`duration`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(2,'Kegiatan mengerjakan soal di E-Pinter','14400',1,1,NULL,'2024-06-14 05:31:45','2024-06-14 11:30:23');

/*Table structure for table `question_summary_user` */

DROP TABLE IF EXISTS `question_summary_user`;

CREATE TABLE `question_summary_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `score` int(11) NOT NULL COMMENT 'nilai total siswa',
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_summary_user_user_id_foreign` (`user_id`),
  CONSTRAINT `question_summary_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `question_summary_user` */

/*Table structure for table `questionniare_master` */

DROP TABLE IF EXISTS `questionniare_master`;

CREATE TABLE `questionniare_master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` int(11) NOT NULL COMMENT 'page untuk kuisioner',
  `number` int(11) NOT NULL COMMENT 'nomor kuisioner',
  `number_string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nomor kuisioner dalam huruf, digunakan untuk attribute name di tag input',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'isi kuisioner',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `questionniare_master` */

insert  into `questionniare_master`(`id`,`page`,`number`,`number_string`,`description`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,1,1,'SATU','Ketika belajar secara kelompok, saya memberikan saran atau pendapat pada kelompok',1,1,0,NULL,'2024-06-16 20:30:40',NULL),
(2,1,2,'DUA','Saya membaca materi fisika menggunakan e-learning pada malam hari sebelum diajarkan di sekolah ',1,1,0,NULL,'2024-06-16 20:36:16',NULL),
(3,1,3,'TIGA','<span style=\"font-family: sans-serif;\">Ketika mengerjakan soal fisika menggunakan e-learning kemudian dibahas di kelas, saya berani menyampaikan cara lain dalam menjawab soal</span>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,1,4,NULL,'2024-06-16 20:36:23','2024-06-17 00:45:22'),
(4,1,4,'EMPAT','Saya membuat catatan dan daftar pertanyaan terkait materi fisika yang ada di e-learning sebelum diajarkan di sekolah',1,1,0,NULL,'2024-06-16 20:37:14',NULL),
(5,1,5,'LIMA','Saya mengerjakan ujian atau tes yang diberikan guru tanpa bantuan orang lain ',1,1,0,NULL,'2024-06-16 20:37:32',NULL),
(6,1,6,'ENAM','<span style=\"font-family: sans-serif;\">Saya mencari bahan pembelajaran fisika melalui internets</span>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,1,4,NULL,'2024-06-16 20:37:56','2024-06-17 00:44:35'),
(7,1,7,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika ada materi pelajaran fisika yang belum\r\ndipahami maka saya berusaha bertanya kepada guru</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 00:36:04',NULL),
(8,1,8,'-','<div>\r\n\r\n\r\n\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n<style>\r\n\r\n</style>\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Sebelum pelajaran fisika dimulai saya\r\nmengerjakan latihan soal yang ada di <i>e-learning</i></span><span style=\"font-family: sans-serif;\">\r\n<br /></span></div>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,4,NULL,'2024-06-17 09:26:17','2024-06-17 11:37:44'),
(9,1,9,'-','<div>\r\n\r\n\r\n\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya rutin belajar setiap hari atas kehendak\r\nsaya sendiri </span><span style=\"font-family: sans-serif;\">\r\n<br /></span></div>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,4,NULL,'2024-06-17 10:05:11','2024-06-17 11:38:51'),
(10,1,10,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya membuka <i>e-learning</i>\r\nuntuk mendukung dalam menjawab soal fisika yang diberikan guru</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:39:22',NULL),
(11,2,11,'-','<p>\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya memilih bermain game dimalam hari daripada\r\nbelajar mata pelajaran fisika </span><span style=\"font-family: sans-serif;\">\r\n<br /></span></p>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:40:56',NULL),
(12,2,12,'-','<p>\r\n\r\n\r\n\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n<style>\r\n\r\n</style>\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Jika saya tidak masuk sekolah, maka saya segera\r\nmenanyakan tugas fisika yang diberikan kepada guru atau teman kelas</span><span style=\"font-family: sans-serif;\">\r\n<br /></span></p>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:41:28',NULL),
(13,2,13,'-','<p>\r\n\r\n\r\n\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"ProgId\" content=\"Word.DocumentW\" />\r\n<meta name=\"Generator\" content=\"Microsoft Word 14\" />\r\n<meta name=\"Originator\" content=\"Microsoft Word 14\" />\r\n<link rel=\"File-List\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_filelist.xml\" />\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n \r\n</xml></span>\r\n<link rel=\"themeData\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_themedata.thmx\" />\r\n<link rel=\"colorSchemeMapping\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_colorschememapping.xml\" />\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  </xml><span style=\"font-size: 12pt; line-height: 107%;\">Saya hanya mempelajari fisika saat pelajaran di\r\nkelas</span>\r\n<br /></span></p>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:41:56',NULL),
(14,2,14,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya hanya mengajukan pertanyaan ketika\r\ndiperintah oleh guru</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:42:31',NULL),
(15,2,15,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya hanya mempelajari soal dan materi yang ada\r\ndi <i>e-learning</i></span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:48:22',NULL),
(16,3,16,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saat diadakan tes atau ujian oleh guru, saya\r\nmengganti jawaban setelah mendengar jawaban yang berbeda dari teman</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:48:44',NULL),
(17,3,17,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Apabila dalam pembelajaran fisika guru\r\nmenyampaikan konsep berbeda dengan yang ada di e-learning, maka saya akan\r\nmengingatkan</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 11:49:03',NULL),
(18,2,18,'-','<p>\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika di rumah, saya hanya membuka <i>e-learning</i> tanpa pernah mencoba\r\nmengerjakan soal fisika</span><span style=\"font-family: sans-serif;\">\r\n<br /></span></p>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 15:52:03',NULL),
(19,2,19,'-','<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n\r\n\r\n<meta name=\"ProgId\" content=\"Word.DocumentW\" />\r\n\r\n\r\n<meta name=\"Generator\" content=\"Microsoft Word 14\" />\r\n\r\n\r\n<meta name=\"Originator\" content=\"Microsoft Word 14\" />\r\n\r\n\r\n<link rel=\"File-List\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_filelist.xml\" />\r\n\r\n\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<link rel=\"themeData\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_themedata.thmx\" />\r\n\r\n\r\n<link rel=\"colorSchemeMapping\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_colorschememapping.xml\" />\r\n\r\n\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n    \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n  \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n</xml><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<style>\r\n\r\n</style>\r\n\r\n\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya yakin nilai yang saya peroleh saat ujian fisika\r\nadalah usaha keras saya sendiri dalam belajar</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 15:55:28',NULL),
(20,2,20,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya menanggapi penjelasan guru hanya pada\r\nmateri yang menarik perhatian saya</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:21:13',NULL),
(21,3,21,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika belajar kelompok, saya menganggap\r\npendapat teman lebih baik daripada pendapat sendiri</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:21:34',NULL),
(22,3,22,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya memiliki keinginan sendiri dan ketekunan untuk\r\nmencari sumber pengetahuan lain</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:21:58',NULL),
(23,3,23,'-','<p>\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya merasa malas mencari materi fisika pada\r\nsumber selain <i>e-learning</i></span><span style=\"font-family: sans-serif;\">\r\n<br /></span></p>\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:22:24',NULL),
(24,3,24,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika belajar kelompok, saya hanya berbicara\r\njika diperintah oleh guru</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:22:44',NULL),
(25,3,25,'-','<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya hanya akan belajar fisika sungguh-sungguh\r\nsaat mendekati waktu ujian</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:23:01',NULL),
(26,3,26,'-','<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<style>\r\n\r\n</style>\r\n\r\n\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika mata pelajaran fisika guru tidak masuk,\r\nsaya memilih bermain game bersama teman daripada membaca materi fisika</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:23:22',NULL),
(27,3,27,'-','<span style=\"font-family: sans-serif;\"><xml>  \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n  \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n</xml><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<style>\r\n\r\n</style>\r\n\r\n\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya selalu percaya pada kemampuan saya sendiri\r\nketika mengerjakan tugas yang diberikan oleh guru </span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:23:38',NULL),
(28,3,28,'-','<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<style>\r\n\r\n</style>\r\n\r\n\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Ketika diberi tugas di rumah oleh guru, saya\r\nmemilih menyalin hasil pekerjaan teman saat sampai di sekolah</span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:24:02',NULL),
(29,3,29,'-','<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n\r\n\r\n<meta name=\"ProgId\" content=\"Word.DocumentW\" />\r\n\r\n\r\n<meta name=\"Generator\" content=\"Microsoft Word 14\" />\r\n\r\n\r\n<meta name=\"Originator\" content=\"Microsoft Word 14\" />\r\n\r\n\r\n<link rel=\"File-List\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_filelist.xml\" />\r\n\r\n\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<link rel=\"themeData\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_themedata.thmx\" />\r\n\r\n\r\n<link rel=\"colorSchemeMapping\" href=\"file:///C:\\Users\\imam\\AppData\\Local\\Temp\\msohtmlclip1\\01\\clip_colorschememapping.xml\" />\r\n\r\n\r\n<span style=\"font-family: sans-serif;\"><xml>\r\n \r\n  </xml><span style=\"font-size: 12pt; line-height: 107%;\">Saya merasa perlu untuk menggunakan <i>e-learning</i> sebagai penunjang materi\r\nfisika agar pengetahuan saya bertambah</span></span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:24:18',NULL),
(30,3,30,'-','<span style=\"font-family: sans-serif;\"><xml>  \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n  \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n  \r\n</xml><xml>\r\n \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n \r\n</xml></span>\r\n\r\n\r\n<style>\r\n\r\n</style>\r\n\r\n\r\n\r\n<style><span style=\"font-family: sans-serif;\">\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin-top:0cm;\r\n	mso-para-margin-right:0cm;\r\n	mso-para-margin-bottom:8.0pt;\r\n	mso-para-margin-left:0cm;\r\n	line-height:107%;\r\n	mso-pagination:widow-orphan;\r\n	font-size:11.0pt;\r\n	font-family:\"Calibri\",\"sans-serif\";\r\n	mso-ascii-font-family:Calibri;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Calibri;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;\r\n	mso-ansi-language:EN-ID;}\r\n</span></style>\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size: 12pt; line-height: 107%; font-family: sans-serif;\">Saya selalu tepat waktu dalam mengerjakan tugas\r\nindividu yang diberikan oleh guru </span>\r\n\r\n\r\n<p><span style=\"font-family: sans-serif;\"><br /></span></p>',1,4,0,NULL,'2024-06-17 16:24:34',NULL);

/*Table structure for table `questionniare_user_answer` */

DROP TABLE IF EXISTS `questionniare_user_answer`;

CREATE TABLE `questionniare_user_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `questionniare_master_id` bigint(20) unsigned NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jawaban siswa, data string json',
  `answer_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_answered` int(11) NOT NULL COMMENT 'flaq untuk apakah sudah dijawab atau belum',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionniare_user_answer_user_id_foreign` (`user_id`),
  KEY `questionniare_user_answer_questionniare_master_id_foreign` (`questionniare_master_id`),
  CONSTRAINT `questionniare_user_answer_questionniare_master_id_foreign` FOREIGN KEY (`questionniare_master_id`) REFERENCES `questionniare_master` (`id`),
  CONSTRAINT `questionniare_user_answer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `questionniare_user_answer` */

/*Table structure for table `questionniare_user_summary` */

DROP TABLE IF EXISTS `questionniare_user_summary`;

CREATE TABLE `questionniare_user_summary` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `is_completed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionniare_user_summary_user_id_foreign` (`user_id`),
  CONSTRAINT `questionniare_user_summary_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `questionniare_user_summary` */

/*Table structure for table `teachers` */

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teachers` */

insert  into `teachers`(`id`,`name`,`email`,`password`,`token`,`status`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Admin IT2','imemuhiu@gmail.com','9fa7b58aec911632535fbdcaf2f408416a7d64fc21c26f529a0c1668606443c8','55b0293cc0084a280bb38c6fcbc795795a031fa2f16859cccfd3ae475f2dfaa4',1,NULL,'2024-06-02 10:05:31',NULL);

/*Table structure for table `user_group` */

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`name`,`status`,`created_by`,`updated_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Kelompok 1','ACTIVE',1,0,NULL,'2024-05-04 06:10:17',NULL),
(2,'Kelompok 2','ACTIVE',1,0,NULL,'2024-05-04 06:10:46',NULL),
(3,'Kelompok 3','ACTIVE',1,0,NULL,'2024-05-04 06:11:01',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name_capital` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group_id` bigint(20) unsigned DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_group_id_foreign` (`user_group_id`),
  CONSTRAINT `users_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`school_name`,`school_name_capital`,`user_group_id`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`created_at`,`updated_at`) values 
(1,'siswa1','siswa1@mailinator.com','','',1,NULL,'$2y$10$WZdJNI40vbx0nSiocIx3UuIkAv2fQ20IEptB4zSZra2uKaTjwV/VC',NULL,NULL,NULL,'2024-05-30 21:39:03',NULL),
(2,'siswaG','siswag@email.com','SMAN 1 Jambi','SMAN 1 JAMBI',1,NULL,'$2y$10$VCHcs7v5a6C0MHbRxLRyJO2f68hIAytagBCkfSpe8TSmwm358LqYu',NULL,NULL,NULL,'2024-06-07 21:39:06',NULL),
(3,'siswaH','siswah@mailinator.com','SMPN 3 Gombong','SMPN 3 GOMBONG',NULL,NULL,'$2y$10$10oYC/bAo3mKpI1Kf2vGvuQHDoqhxijc8fVho4ZKM0/GgynZEYTe.',NULL,NULL,NULL,'2024-06-10 21:39:09',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
