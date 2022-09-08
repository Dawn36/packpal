/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - packpal
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`packpal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `packpal`;

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('top','middle','last') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'top',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ads` */

insert  into `ads`(`id`,`ads_name`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`status`,`created_at`,`updated_at`,`deleted_at`) values (4,'aa','ads1.png','uploads/user-ads/1/1662108430ads1.png','353384','1',NULL,'top','2022-09-02 08:47:10','2022-09-02 08:47:10',NULL),(5,'aa','service-05.jpg','uploads/user-ads/1/1662108441service-05.jpg','7651','1',NULL,'middle','2022-09-02 08:47:21','2022-09-02 08:47:21',NULL),(6,'aaa','about.jpg','uploads/user-ads/1/1662108452about.jpg','129573','1',NULL,'middle','2022-09-02 08:47:32','2022-09-02 08:47:32',NULL),(7,'aaaaaaa','job1.png','uploads/user-ads/1/1662108463job1.png','250053','1',NULL,'last','2022-09-02 08:47:43','2022-09-02 08:47:43',NULL),(8,'aaa','artsi3d.jpg','uploads/user-ads/1/1662108470artsi3d.jpg','49840','1',NULL,'last','2022-09-02 08:47:50','2022-09-02 08:47:50',NULL),(9,'aaaaa','guide-01.jpg','uploads/user-ads/1/1662108480guide-01.jpg','160839','1',NULL,'top','2022-09-02 08:48:00','2022-09-02 08:48:00',NULL);

/*Table structure for table `bid_comments` */

DROP TABLE IF EXISTS `bid_comments`;

CREATE TABLE `bid_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bids_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `comment` text,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bid_comments` */

insert  into `bid_comments`(`id`,`bids_id`,`user_id`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'no sad \\ad as\r\nd as\r\nsad as',1,NULL,'2022-09-04 21:10:39','2022-09-04 21:10:39',NULL);

/*Table structure for table `bid_images` */

DROP TABLE IF EXISTS `bid_images`;

CREATE TABLE `bid_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bids_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bid_images` */

insert  into `bid_images`(`id`,`bids_id`,`user_id`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,2,'202209042033about.jpg','1/202209042033about.jpg','129573',NULL,NULL,NULL,NULL,NULL),(2,1,2,'202209042033ads1.png','1/202209042033ads1.png','353384',NULL,NULL,NULL,NULL,NULL),(3,1,2,'202209042033artsi3d.jpg','1/202209042033artsi3d.jpg','49840',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `bids` */

DROP TABLE IF EXISTS `bids`;

CREATE TABLE `bids` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `sub_categories_id` bigint(20) NOT NULL,
  `bids_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','pending','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bids` */

insert  into `bids`(`id`,`user_id`,`categories_id`,`sub_categories_id`,`bids_name`,`location`,`city_post_code`,`contact_no`,`description`,`thumbnail`,`target_price`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,2,1,1,'Alma Trana','Rerum corrupti expl','Suscipit magni aut e','29131','<p><strong><em>hi i m selleinsad as das dkj sajd sad kaskd \'asl d</em></strong></p>','1/202209042033artsi3d.jpg','1000','active','2','2','2022-09-04 08:33:42','2022-09-04 21:15:32',NULL);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`user_id`,`category_name`,`category_image`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'c1','1/202209041213service-01.jpg','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:13:11',NULL),(2,1,'c2','2/202209041213service-02.jpg','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:13:20',NULL),(3,1,'c3','3/202209041213service-03.jpg','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:13:31',NULL);

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `therd_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `type` enum('text','file') DEFAULT 'text',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_read` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chat` */

insert  into `chat`(`id`,`therd_id`,`user_id`,`message`,`type`,`created_at`,`deleted_at`,`is_read`) values (1,1,2,'aa','text','2022-09-04 20:09:14',NULL,'yes'),(2,1,1,'who','text','2022-09-04 22:41:36',NULL,'yes'),(3,1,1,'hn','text','2022-09-04 22:43:15',NULL,'yes'),(4,3,4,'hi','text','2022-09-05 11:08:19',NULL,'yes'),(5,3,2,'who','text','2022-09-05 11:08:35',NULL,'yes'),(6,3,2,'what do you want','text','2022-09-05 11:08:44',NULL,'yes'),(7,3,4,'hi da','text','2022-09-05 11:27:37',NULL,'yes'),(8,3,4,'asd','text','2022-09-05 11:27:37',NULL,'yes'),(9,3,4,'sad','text','2022-09-05 11:27:38',NULL,'yes'),(10,3,2,'sdas dsa d','text','2022-09-05 11:38:03',NULL,'yes'),(11,3,2,'as das','text','2022-09-05 11:38:03',NULL,'yes'),(12,3,2,'as d','text','2022-09-05 11:38:04',NULL,'yes'),(13,3,2,'Offer price change old offer price is : 200 and the new offer price is : 1000','text','2022-09-05 12:00:37',NULL,'yes'),(14,3,4,'l','text','2022-09-05 12:01:34',NULL,'yes'),(15,3,4,'Offer price change old offer price is : 1000 and the new offer price is : 200','text','2022-09-05 12:02:08',NULL,'yes'),(16,3,4,'asd','text','2022-09-05 12:22:18',NULL,'yes'),(17,3,4,'asd','text','2022-09-05 12:22:21',NULL,'yes'),(18,3,4,'sad','text','2022-09-05 12:23:58',NULL,'yes'),(19,3,4,'asd','text','2022-09-05 12:24:01',NULL,'yes'),(20,3,4,'cb','text','2022-09-05 12:24:58',NULL,'yes'),(21,3,4,'a','text','2022-09-05 12:26:56',NULL,'yes'),(22,3,4,'hi','text','2022-09-05 12:27:32',NULL,'yes'),(23,3,4,'a','text','2022-09-05 12:27:52',NULL,'yes'),(24,3,4,'a','text','2022-09-05 12:27:59',NULL,'yes'),(25,3,4,'a','text','2022-09-05 12:28:03',NULL,'yes'),(26,3,4,'dawn','text','2022-09-05 12:28:09',NULL,'yes'),(27,3,4,'what','text','2022-09-05 12:33:54',NULL,'yes'),(28,3,4,'the','text','2022-09-05 12:33:57',NULL,'yes'),(29,3,4,'it is working','text','2022-09-05 12:34:01',NULL,'yes'),(30,3,2,'fuck you','text','2022-09-05 12:34:28',NULL,'no');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(7,'2022_08_08_175023_laratrust_setup_tables',2),(8,'2022_08_08_205320_create_bids_table',3),(9,'2022_08_09_113820_create_categories_table',4),(10,'2022_08_09_113950_create_sub_categories_table',4),(11,'2022_08_10_141903_create_products_table',5),(12,'2022_08_12_173137_create_orders_table',6),(13,'2022_08_12_210701_review',7),(14,'2022_08_31_202415_create_ads_table',8);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `b_user_id` bigint(20) DEFAULT NULL,
  `s_user_id` bigint(20) NOT NULL,
  `bids_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `sub_categories_id` bigint(20) NOT NULL,
  `offer_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('offer','inprocess','complete','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offer',
  `feed_back` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`b_user_id`,`s_user_id`,`bids_id`,`categories_id`,`sub_categories_id`,`offer_price`,`status`,`feed_back`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,2,4,1,1,1,'200','complete','yes',4,NULL,'2022-09-05 00:00:00','2022-09-05 12:08:00',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2022-08-08 19:18:37','2022-08-08 19:18:37'),(2,'users-read','Read Users','Read Users','2022-08-08 19:18:37','2022-08-08 19:18:37'),(3,'users-update','Update Users','Update Users','2022-08-08 19:18:37','2022-08-08 19:18:37'),(4,'users-delete','Delete Users','Delete Users','2022-08-08 19:18:37','2022-08-08 19:18:37'),(5,'payments-create','Create Payments','Create Payments','2022-08-08 19:18:37','2022-08-08 19:18:37'),(6,'payments-read','Read Payments','Read Payments','2022-08-08 19:18:37','2022-08-08 19:18:37'),(7,'payments-update','Update Payments','Update Payments','2022-08-08 19:18:37','2022-08-08 19:18:37'),(8,'payments-delete','Delete Payments','Delete Payments','2022-08-08 19:18:37','2022-08-08 19:18:37'),(9,'profile-read','Read Profile','Read Profile','2022-08-08 19:18:37','2022-08-08 19:18:37'),(10,'profile-update','Update Profile','Update Profile','2022-08-08 19:18:37','2022-08-08 19:18:37');

/*Table structure for table `product_comments` */

DROP TABLE IF EXISTS `product_comments`;

CREATE TABLE `product_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `products_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_comments` */

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `products_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `sub_categories_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','pending','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` bigint(20) NOT NULL,
  `to_user_id` bigint(20) NOT NULL,
  `bids_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `star` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`from_user_id`,`to_user_id`,`bids_id`,`order_id`,`star`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,2,4,1,1,'5','good work',2,NULL,'2022-09-05 00:00:00',NULL,NULL);

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(2,4,'App\\Models\\User'),(3,2,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2022-08-08 19:18:37','2022-08-08 19:18:37'),(2,'supplier','Supplier','Supplier','2022-08-08 19:18:37','2022-08-08 19:18:37'),(3,'buyer','Buyer','Buyer','2022-08-08 19:18:37','2022-08-08 19:18:37');

/*Table structure for table `sub_categories` */

DROP TABLE IF EXISTS `sub_categories`;

CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `categories_id` bigint(20) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_categories` */

insert  into `sub_categories`(`id`,`user_id`,`categories_id`,`sub_category_name`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'c1-cs1','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:13:50',NULL),(2,1,1,'c1-cs2','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:13:55',NULL),(3,1,1,'c1-cs3','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:14:00',NULL),(4,1,2,'c2-cs1','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:14:29',NULL),(5,1,2,'c2-cs2','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:14:33',NULL),(6,1,3,'c3-cs1','1',NULL,'2022-09-04 00:00:00','2022-09-04 12:14:42',NULL);

/*Table structure for table `therd` */

DROP TABLE IF EXISTS `therd`;

CREATE TABLE `therd` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id_from` bigint(20) DEFAULT NULL,
  `user_id_to` bigint(20) DEFAULT NULL,
  `last_message_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `therd` */

insert  into `therd`(`id`,`user_id_from`,`user_id_to`,`last_message_date`,`created_at`,`deleted_at`) values (1,2,1,'2022-09-04 20:00:15',NULL,NULL),(3,4,2,'2022-09-05 11:02:39',NULL,NULL),(4,4,1,'2022-09-05 11:03:23',NULL,NULL);

/*Table structure for table `user_document` */

DROP TABLE IF EXISTS `user_document`;

CREATE TABLE `user_document` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_document` */

/*Table structure for table `user_expiry_image` */

DROP TABLE IF EXISTS `user_expiry_image`;

CREATE TABLE `user_expiry_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `status` enum('pending','accept','reject') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_expiry_image` */

insert  into `user_expiry_image`(`id`,`user_id`,`package`,`file_name`,`size`,`path`,`created_at`,`created_by`,`status`) values (1,4,'1 month','about.jpg','129573','uploads/user-subscription-document/4/1662367296about.jpg','2022-09-05 08:41:36',4,'accept'),(2,4,'1 month','ads1.png','353384','uploads/user-subscription-document/4/1662367296ads1.png','2022-09-05 08:41:36',4,'accept');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blanklogo.jpg',
  `company_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blankbanner.jpg',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_year` datetime DEFAULT NULL,
  `annual_sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certifications` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_of` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_of` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_categories_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `send_doc` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`middle_name`,`email`,`password`,`user_type`,`profile_picture`,`company_name`,`company_logo`,`company_banner`,`designation`,`department`,`address`,`country`,`city`,`zip_postal_code`,`landline_no`,`phone_number`,`primary_business`,`specify`,`establishment_year`,`annual_sales`,`certifications`,`seller_of`,`buyer_of`,`categories_id`,`sub_categories_id`,`description`,`verified`,`send_doc`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`expiry_date`,`latitude`,`longitude`) values (1,'dawn','gill','sad','dawngill08@gmail.com','$2y$10$Z2zScBG2OsLDJAqxc616Cu5VX.OzZhtUrCS64raxFB/Xfl.XjkVAu',1,'blank.png',NULL,'blanklogo.jpg','blankbanner.jpg','sad','sad','Saddar Karachi, Pakistan','sad','sad','02121','02020','212020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1',NULL,'yes','no',NULL,NULL,'2022-09-04 11:23:55','2022-09-04 11:23:55',NULL,NULL,NULL,NULL),(2,'darrel','asd','asd','darrelgill08@gmail.com','$2y$10$shmXeh/m5h8FkOzWw/Di1O.7prRuJqc1kpqf/onUp.UpdzTsd3zh6',3,'blank.png',NULL,'blanklogo.jpg','blankbanner.jpg','asd','sad','Karimabad Block 3 Gulberg Town, Karachi, Pakistan','asd','dasd','3213','2131','23131',NULL,NULL,NULL,NULL,NULL,NULL,'asd',NULL,NULL,NULL,'no','no',NULL,NULL,'2022-09-04 19:48:52','2022-09-04 19:48:52',NULL,'2022-09-04 12:47:28',NULL,NULL),(4,'darwin','gill','sad','darwingill08@gmail.com','$2y$10$hrr5EIkko2FG2GVK.kWsPOvttQiWRQOxaG0T7oU/BD6zswbqN.hhO',2,'blank.png','hahahaha','blanklogo.jpg','blankbanner.jpg','sad','sds','Hyderabad, Pakistan','asd','asd','032','3213','3213',NULL,NULL,'2022-09-01 00:00:00','2121212','sadsad','sdasd',NULL,'2','5','sad asda dkjaslkj','no','no',NULL,NULL,'2022-09-05 08:00:48','2022-09-05 08:42:21',NULL,'2022-10-05 00:00:00','40.7767644','-73.9761399');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
