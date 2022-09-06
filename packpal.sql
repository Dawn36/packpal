/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.11-MariaDB : Database - packpal
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

/*Table structure for table `bid_comments` */

DROP TABLE IF EXISTS `bid_comments`;

CREATE TABLE `bid_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bids_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bid_comments` */

insert  into `bid_comments`(`id`,`bids_id`,`user_id`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'hi how are you',NULL,NULL,'2022-08-10 02:11:12',NULL,NULL),(2,1,1,'hi how are you asdsad',NULL,NULL,'2022-08-10 02:11:12',NULL,NULL),(3,NULL,1,'what',1,NULL,'2022-08-09 09:27:06','2022-08-09 21:27:06',NULL),(4,NULL,1,'sadasd',1,NULL,'2022-08-09 09:27:13','2022-08-09 21:27:13',NULL),(5,1,1,'asd',1,NULL,'2022-08-09 09:28:21','2022-08-09 21:28:21',NULL),(6,1,1,'asd',1,NULL,'2022-08-09 21:28:42','2022-08-09 21:28:42',NULL),(7,2,1,'asd',1,NULL,'2022-08-09 21:30:01','2022-08-09 21:30:01',NULL),(8,1,1,'no this is wor',1,NULL,'2022-08-09 21:33:38','2022-08-09 21:33:38',NULL),(9,3,1,'hsakjhdk dhaskjdhaskh dkash dkhas',1,NULL,'2022-08-19 15:22:13','2022-08-19 15:22:13',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bid_images` */

insert  into `bid_images`(`id`,`bids_id`,`user_id`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'2022080912293.jpg','1/2022080912293.jpg','165158',NULL,NULL,NULL,NULL,NULL),(2,1,1,'2022080912294.jpg','1/2022080912294.jpg','204791',NULL,NULL,NULL,NULL,NULL),(3,2,1,'2022080912335.jpg','2/2022080912335.jpg','94055',NULL,NULL,NULL,NULL,NULL),(4,2,1,'2022080912336.jpg','2/2022080912336.jpg','127118',NULL,NULL,NULL,NULL,NULL),(5,1,1,'20220809164416.jpg','1/20220809164416.jpg','102986',NULL,NULL,NULL,NULL,'2022-08-09 16:44:46'),(6,3,1,'2022081915141.jpg','3/2022081915141.jpg','98664',NULL,NULL,NULL,NULL,NULL),(7,3,1,'2022081915142.jpg','3/2022081915142.jpg','116317',NULL,NULL,NULL,NULL,NULL),(8,3,1,'2022081915143.jpg','3/2022081915143.jpg','165158',NULL,NULL,NULL,NULL,NULL),(9,3,1,'2022081915144.jpg','3/2022081915144.jpg','204791',NULL,NULL,NULL,NULL,'2022-08-19 15:17:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bids` */

insert  into `bids`(`id`,`user_id`,`categories_id`,`sub_categories_id`,`bids_name`,`location`,`city_post_code`,`contact_no`,`description`,`thumbnail`,`target_price`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,2,'Karen Maysa','sada','Tempora cumque aspera','12192019209102','<p>asdsad <strong>aaa sad</strong></p>','1/2022080912291.jpg','370','active','1','1','2022-08-09 12:29:32','2022-08-12 17:13:22',NULL),(2,1,1,2,'Brielle Hornea','asd','Vel distinctio Labo','213','<p>asdas sdas s<em>adsa</em></p>','2/2022080912333.jpg','628','active','1','1','2022-08-09 12:33:18','2022-08-09 21:34:08',NULL),(3,1,2,4,'abc','hjsahkjhsd bnbsakj sd','karachi /123','1546546123751273','<p>my first ads</p>','3/2022081915142.jpg','1000','active','1','1','2022-08-19 03:14:52','2022-08-19 15:23:14',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`user_id`,`category_name`,`category_image`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'sad',NULL,NULL,NULL,'2022-08-10 00:00:00',NULL,NULL),(2,1,'fff',NULL,NULL,NULL,'2022-08-10 00:00:00',NULL,NULL),(3,1,'dawna','3/202208101926150-10.jpg','1',NULL,'2022-08-10 00:00:00','2022-08-10 19:27:01','2022-08-10 19:27:01'),(4,1,'123aa','4/2022081915257.jpg','1',NULL,'2022-08-19 00:00:00','2022-08-19 15:25:01',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chat` */

insert  into `chat`(`id`,`therd_id`,`user_id`,`message`,`type`,`created_at`,`deleted_at`,`is_read`) values (1,2,1,'hi dawn','text','2022-08-23 20:52:05',NULL,'yes'),(2,2,1,'a','text','2022-08-23 20:52:07',NULL,'yes'),(3,2,1,'aa','text','2022-08-23 20:52:09',NULL,'yes'),(4,1,1,'aa','text','2022-08-23 20:52:14',NULL,'yes'),(5,1,1,'aaa','text','2022-08-23 20:52:16',NULL,'yes'),(6,2,1,'1','text','2022-08-23 20:52:38',NULL,'yes'),(7,2,1,'2','text','2022-08-23 20:52:40',NULL,'yes'),(8,1,1,'1','text','2022-08-23 20:52:44',NULL,'yes'),(9,1,1,'2','text','2022-08-23 20:52:46',NULL,'yes'),(10,1,1,'3','text','2022-08-23 20:52:50',NULL,'yes'),(11,1,2,'good job','text','2022-08-23 20:53:21',NULL,'no'),(12,2,4,'well done','text','2022-08-23 20:53:35',NULL,'yes');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(7,'2022_08_08_175023_laratrust_setup_tables',2),(8,'2022_08_08_205320_create_bids_table',3),(9,'2022_08_09_113820_create_categories_table',4),(10,'2022_08_09_113950_create_sub_categories_table',4),(11,'2022_08_10_141903_create_products_table',5),(12,'2022_08_12_173137_create_orders_table',6),(13,'2022_08_12_210701_review',7);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`bids_id`,`categories_id`,`sub_categories_id`,`offer_price`,`status`,`feed_back`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,1,1,'1000','complete','yes',NULL,NULL,NULL,'2022-08-19 16:10:10',NULL),(2,1,1,1,1,'1000','complete','yes',NULL,NULL,NULL,'2022-08-12 21:49:41',NULL),(3,1,1,1,1,'1000','complete','yes',NULL,NULL,NULL,'2022-08-12 21:10:28',NULL);

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

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(1,2),(2,1),(2,2),(3,1),(3,2),(4,1),(4,2),(5,1),(6,1),(7,1),(8,1),(9,1),(9,2),(9,3),(10,1),(10,2),(10,3);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_comments` */

insert  into `product_comments`(`id`,`products_id`,`user_id`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'hi why are you doing this','1',NULL,'2022-08-10 17:36:04','2022-08-10 17:36:04',NULL),(2,1,1,'noooooooooo','1',NULL,'2022-08-10 17:37:39','2022-08-10 17:37:39',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`products_id`,`user_id`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'202208101724150-10.jpg','1/202208101724150-10.jpg','28074',NULL,NULL,NULL,NULL,NULL),(2,1,1,'202208101724150-11.jpg','1/202208101724150-11.jpg','29324',NULL,NULL,NULL,NULL,NULL),(3,1,1,'202208101724150-12.jpg','1/202208101724150-12.jpg','20678',NULL,NULL,NULL,NULL,'2022-08-10 17:25:50'),(4,1,1,'202208101725150-13.jpg','1/202208101725150-13.jpg','30777',NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`categories_id`,`sub_categories_id`,`product_name`,`location`,`city_post_code`,`contact_no`,`description`,`thumbnail`,`target_price`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,3,'dawa','sad','asd','32231321','<p>asd adasd as das</p>','1/202208101726150-12.jpg','1000','inactive','1','1','2022-08-10 05:24:21','2022-08-20 00:00:00',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`from_user_id`,`to_user_id`,`bids_id`,`order_id`,`star`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,1,3,'2','sad',1,NULL,'2022-08-12 00:00:00',NULL,NULL),(2,1,1,1,2,'5','good work',1,NULL,'2022-08-12 00:00:00',NULL,NULL),(3,1,2,1,1,'1','dooo',1,NULL,'2022-08-13 00:00:00',NULL,NULL),(4,1,2,1,1,'2','dooo',1,NULL,'2022-08-13 00:00:00',NULL,NULL),(5,1,1,1,1,'5','xzczxc',1,NULL,'2022-08-19 00:00:00',NULL,NULL);

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

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (3,1,'App\\Models\\User'),(2,2,'App\\Models\\User'),(2,4,'App\\Models\\User');

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

insert  into `sub_categories`(`id`,`user_id`,`categories_id`,`sub_category_name`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'sd',NULL,NULL,NULL,NULL,'2022-08-09 17:18:06'),(2,1,1,'daw',NULL,NULL,NULL,NULL,NULL),(3,1,1,'hahaah',NULL,NULL,NULL,NULL,NULL),(4,1,2,'aaa',NULL,NULL,NULL,NULL,NULL),(5,1,1,'asdsas','1',NULL,'2022-08-12 00:00:00','2022-08-12 17:00:47','2022-08-12 17:00:47'),(6,1,4,'qqq','1',NULL,'2022-08-19 00:00:00','2022-08-19 15:25:17',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `therd` */

insert  into `therd`(`id`,`user_id_from`,`user_id_to`,`last_message_date`,`created_at`,`deleted_at`) values (1,1,2,'2022-08-21 19:01:36',NULL,NULL),(2,1,4,'2022-08-21 19:01:39',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_document` */

insert  into `user_document`(`id`,`user_id`,`file_name`,`size`,`path`,`created_at`,`created_by`,`deleted_at`) values (1,1,'logo tekrevol.png',4186,'uploads/user-document/1/1660761132logo tekrevol.png','2022-08-16 23:45:57',0,NULL),(2,1,'logo tekrevol.png',4186,'uploads/user-document/1/1660761575logo tekrevol.png','2022-08-16 23:45:57',0,NULL),(3,1,'adminpanel (1).sql',15444,'uploads/user-document/1/1660761575adminpanel (1).sql','2022-08-16 23:45:57',0,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`middle_name`,`email`,`password`,`profile_picture`,`company_name`,`company_logo`,`company_banner`,`designation`,`department`,`address`,`country`,`city`,`zip_postal_code`,`landline_no`,`phone_number`,`primary_business`,`specify`,`establishment_year`,`annual_sales`,`certifications`,`seller_of`,`buyer_of`,`categories_id`,`sub_categories_id`,`description`,`verified`,`send_doc`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'dawn','gill','Hedwig Dawson','dawn@gmail.com','$2y$10$wfMRSjxG.6EtKz8LNJkVNeMevQRI91ZCQb7cV07jmCQ3fFrx/YIn6','blank.png','Fox Wilkinson Associates','1/202208141747150-9.jpg','blankbanner.jpg','Voluptates sunt volu','Qui aut magnam quasi','Neque et veniam min','Recusandae Ut quos','Molestiae omnis vel','39131','Ut quaerat ut quia c','+1 (843) 218-8947','other',NULL,'2006-05-04 00:00:00','97','Incididunt sunt ame','Corporis quisquam ve','Expedita quia incidi','2','2','Aut quis voluptatem','yes','yes',NULL,NULL,'2022-08-08 20:05:19','2022-08-19 16:23:40',NULL),(2,'darrel','gill','asd','darrel@gmail.com','$2y$10$wfMRSjxG.6EtKz8LNJkVNeMevQRI91ZCQb7cV07jmCQ3fFrx/YIn6','blank.png','Fox Wilkinson Associates','blanklogo.jpg','blankbanner.jpg','Voluptates sunt volu','Qui aut magnam quasi','Neque et veniam min','Recusandae Ut quos','Molestiae omnis vel','39131','Ut quaerat ut quia c','+1 (843) 218-8947','other',NULL,'2006-05-04 00:00:00','97','Incididunt sunt ame','Corporis quisquam ve','Expedita quia incidi','2','4','Aut quis voluptatem','no','no',NULL,NULL,'2022-08-08 20:05:19','2022-08-09 11:18:28',NULL),(4,'darwin','gill','asdsasad','darwin@gmail.com','$2y$10$wfMRSjxG.6EtKz8LNJkVNeMevQRI91ZCQb7cV07jmCQ3fFrx/YIn6','blank.png','Fox Wilkinson Associates','blanklogo.jpg','blankbanner.jpg','Voluptates sunt volu','Qui aut magnam quasi','Neque et veniam min','Recusandae Ut quos','Molestiae omnis vel','39131','Ut quaerat ut quia c','+1 (843) 218-8947','other',NULL,'2006-05-04 00:00:00','97','Incididunt sunt ame','Corporis quisquam ve','Expedita quia incidi','1','4','Aut quis voluptatem','no','no',NULL,NULL,'2022-08-08 20:05:19','2022-08-09 11:18:28',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
