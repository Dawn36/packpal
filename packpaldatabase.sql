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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bid_comments` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bid_images` */

insert  into `bid_images`(`id`,`bids_id`,`user_id`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,2,'202211061738300-17.jpg','1/202211061738300-17.jpg','72904',NULL,NULL,NULL,NULL,NULL),(2,1,2,'202211061738300-18.jpg','1/202211061738300-18.jpg','85950',NULL,NULL,NULL,NULL,NULL),(3,1,2,'202211061738300-19.jpg','1/202211061738300-19.jpg','73568',NULL,NULL,NULL,NULL,NULL),(4,2,2,'202211110938img-28.jpg','2/202211110938img-28.jpg','34868',NULL,NULL,NULL,NULL,NULL),(5,2,2,'202211110938img-30.jpg','2/202211110938img-30.jpg','100171',NULL,NULL,NULL,NULL,NULL),(6,2,2,'202211110938img-32.jpg','2/202211110938img-32.jpg','82793',NULL,NULL,NULL,NULL,NULL);

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
  `status` enum('active','inactive','pending','denied','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `show_bid` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bids` */

insert  into `bids`(`id`,`user_id`,`categories_id`,`sub_categories_id`,`bids_name`,`location`,`city_post_code`,`contact_no`,`description`,`thumbnail`,`target_price`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`,`show_bid`) values (1,2,1,1,'Mariam Casey','Saepe maiores provid','In aut neque nisi ex','59','<p>this is my first bid</p>','1/202211061738300-3.jpg','741','completed','2',NULL,'2022-11-06 05:38:13','2022-11-09 19:00:23',NULL,'no'),(2,2,2,5,'Paul Hodge','Voluptates dolor ame','Nam proident enim e','70','<p>sad asd assas</p>','2/202211110938img-15.jpg','332','active','2',NULL,'2022-11-11 09:38:56','2022-11-15 16:45:20',NULL,'yes');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `chat` */

insert  into `chat`(`id`,`therd_id`,`user_id`,`message`,`type`,`created_at`,`deleted_at`,`is_read`) values (1,1,2,'hi sadksndlksa','text','2022-11-06 17:43:28',NULL,'yes'),(2,1,2,'asdasd','text','2022-11-06 17:43:32',NULL,'yes'),(3,1,2,'dsan','text','2022-11-06 17:44:21',NULL,'yes'),(4,1,2,'sad','text','2022-11-06 17:44:22',NULL,'yes'),(5,1,2,'sa d','text','2022-11-06 17:44:26',NULL,'yes'),(6,1,2,'asd','text','2022-11-06 17:45:36',NULL,'yes'),(7,1,2,'hi dawn here','text','2022-11-06 17:45:43',NULL,'yes'),(8,1,8,'asda','text','2022-11-06 17:46:07',NULL,'yes'),(9,1,8,'as d','text','2022-11-06 17:46:08',NULL,'yes'),(10,1,8,'sa d','text','2022-11-06 17:46:08',NULL,'yes'),(11,1,8,'as','text','2022-11-06 17:46:08',NULL,'yes'),(12,1,8,'da','text','2022-11-06 17:46:08',NULL,'yes'),(13,1,8,'Offer price change old offer price is : 5000 and the new offer price is : 10000','text','2022-11-06 17:48:51',NULL,'no'),(14,1,8,'Offer price change old offer price is : 10000 and the new offer price is : 1000','text','2022-11-06 17:49:17',NULL,'no'),(15,2,4,'dsaas d','text','2022-11-06 17:52:05',NULL,'yes'),(16,2,4,'sad','text','2022-11-06 17:52:06',NULL,'yes'),(17,2,4,'as','text','2022-11-06 17:52:06',NULL,'yes'),(18,2,4,'d as','text','2022-11-06 17:52:06',NULL,'yes'),(19,2,4,'d','text','2022-11-06 17:52:06',NULL,'yes'),(20,2,4,'as','text','2022-11-06 17:52:06',NULL,'yes'),(21,2,4,'d','text','2022-11-06 17:52:09',NULL,'yes');

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
  `show_offer` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`b_user_id`,`s_user_id`,`bids_id`,`categories_id`,`sub_categories_id`,`offer_price`,`status`,`feed_back`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`,`show_offer`) values (1,2,4,1,1,1,'1000','complete','no',4,NULL,'2022-11-06 00:00:00','2022-11-09 19:00:23',NULL,'yes'),(2,2,6,1,1,1,'1000','offer','no',6,NULL,'2022-11-06 00:00:00','2022-11-09 18:57:00',NULL,'no'),(3,2,8,1,1,1,'1000','reject','no',8,NULL,'2022-11-06 00:00:00','2022-11-06 17:49:39',NULL,'yes'),(4,2,4,2,2,5,'1000','reject','no',4,NULL,'2022-11-12 00:00:00','2022-11-15 16:45:20',NULL,'yes');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('dawngill08@gmail.com','$2y$10$KbbdWMsHZEDcSqOfFjAJ.uxtTN5EKW2Lhf9YE6CiHV6RgrQ5VR0/W','2022-09-13 18:31:50');

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

insert  into `reviews`(`id`,`from_user_id`,`to_user_id`,`bids_id`,`order_id`,`star`,`comment`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,2,4,1,1,'5','sada das das d',2,NULL,'2022-11-06 00:00:00',NULL,NULL);

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

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(2,4,'App\\Models\\User'),(2,5,'App\\Models\\User'),(2,6,'App\\Models\\User'),(2,8,'App\\Models\\User'),(3,2,'App\\Models\\User'),(3,7,'App\\Models\\User'),(3,9,'App\\Models\\User');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `therd` */

insert  into `therd`(`id`,`user_id_from`,`user_id_to`,`last_message_date`,`created_at`,`deleted_at`) values (1,8,2,'2022-11-06 17:43:23',NULL,NULL),(2,4,2,'2022-11-06 17:51:59',NULL,NULL);

/*Table structure for table `user_document` */

DROP TABLE IF EXISTS `user_document`;

CREATE TABLE `user_document` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` enum('utiltity bill','letter of authorization','visiting card','ntn certificate') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_document` */

insert  into `user_document`(`id`,`user_id`,`file_name`,`size`,`path`,`status`,`created_at`,`created_by`,`deleted_at`) values (1,4,'pattern-10.png',305010,'uploads/user-document/4/1668198971pattern-10.png','utiltity bill','2022-11-11 08:27:29',4,NULL),(2,4,'pattern-9.png',515558,'uploads/user-document/4/1668198468pattern-9.png','letter of authorization','2022-11-11 08:27:29',4,NULL);

/*Table structure for table `user_document_reject_command` */

DROP TABLE IF EXISTS `user_document_reject_command`;

CREATE TABLE `user_document_reject_command` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_document_reject_command` */

insert  into `user_document_reject_command`(`id`,`user_id`,`comment`,`created_at`) values (1,4,'sada',NULL),(2,4,'sd',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_expiry_image` */

insert  into `user_expiry_image`(`id`,`user_id`,`package`,`file_name`,`size`,`path`,`created_at`,`created_by`,`status`) values (1,4,'1 month','about.jpg','129573','uploads/user-subscription-document/4/1662367296about.jpg','2022-09-05 08:41:36',4,'accept'),(2,4,'1 month','ads1.png','353384','uploads/user-subscription-document/4/1662367296ads1.png','2022-09-05 08:41:36',4,'accept'),(3,4,'1 month','img20.jpg','11324','uploads/user-subscription-document/4/1663588112img20.jpg','2022-09-19 11:48:32',4,'accept'),(4,7,'1 month','sink-counter-repair.jpg','26169','uploads/user-subscription-document/7/1666291087sink-counter-repair.jpg','2022-10-20 18:38:07',7,'accept'),(5,7,'6 month','sink-counter-repair.jpg','26169','uploads/user-subscription-document/7/1666291395sink-counter-repair.jpg','2022-10-20 18:43:15',7,'accept'),(6,7,'1 month','studio-city-silicon-replacement-600.jpg','10649','uploads/user-subscription-document/7/1666361063studio-city-silicon-replacement-600.jpg','2022-10-21 14:04:23',7,'accept'),(7,7,'1 month','Screenshot 2022-10-26 104550.png','32206','uploads/user-subscription-document/7/1667334374Screenshot 2022-10-26 104550.png','2022-11-01 20:26:14',7,'pending');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` bigint(20) DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `company_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Company_Banner.png',
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
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`middle_name`,`email`,`password`,`password_show`,`user_type`,`profile_picture`,`company_name`,`company_logo`,`company_banner`,`designation`,`department`,`address`,`country`,`city`,`zip_postal_code`,`landline_no`,`phone_number`,`primary_business`,`specify`,`establishment_year`,`annual_sales`,`certifications`,`seller_of`,`buyer_of`,`categories_id`,`sub_categories_id`,`description`,`verified`,`send_doc`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`expiry_date`,`latitude`,`longitude`,`website`) values (1,'dawn','gill','hi','dawngill08@gmail.com','$2y$10$shmXeh/m5h8FkOzWw/Di1O.7prRuJqc1kpqf/onUp.UpdzTsd3zh6','aa',1,'blank.png',NULL,'blank.png','Company_Banner.png','sad','sad','Saddar Karachi, Pakistan','sad','sad','02121','02020','212020','manufacturer',NULL,'1970-01-01 00:00:00',NULL,NULL,NULL,NULL,'2','2',NULL,'yes','no',NULL,NULL,'2022-09-04 11:23:55','2022-11-06 16:03:25',NULL,'2023-03-01 15:47:17','24.8615984','67.0290744',NULL),(2,'darrel','asd','hi','darrelgill08@gmail.com','$2y$10$shmXeh/m5h8FkOzWw/Di1O.7prRuJqc1kpqf/onUp.UpdzTsd3zh6','aa',3,'blank.png',NULL,'blank.png','Company_Banner.png','asd','sad','Karimabad Block 3 Gulberg Town, Karachi, Pakistan','asd','dasd','3213','2131','23131',NULL,NULL,NULL,NULL,NULL,NULL,'asd',NULL,NULL,NULL,'no','no',NULL,NULL,'2022-09-04 19:48:52','2022-09-04 19:48:52',NULL,'2023-03-01 15:47:17',NULL,NULL,NULL),(4,'darwin','gill','hi','darwingill08@gmail.com','$2y$10$shmXeh/m5h8FkOzWw/Di1O.7prRuJqc1kpqf/onUp.UpdzTsd3zh6','aa',2,'blank.png','lliilil testing','blank.png','Company_Banner.png','sad','sds','Hyderabad, Pakistan','asd','asd','032','3213','3213','manufacturer',NULL,'2022-09-01 00:00:00','2121212','sadsad','sdasd',NULL,'2',NULL,'sad asda dkjaslkj','no','yes',NULL,NULL,'2022-09-05 08:00:48','2022-11-11 20:43:21',NULL,'2023-03-01 15:47:17','25.3959687','68.357776',NULL),(5,'asd','asd','hi','dawngill90090@gmail.com','$2y$10$iA/TT0OwYW61nhz3bKrzrOXn4ifi2L2YsVng8oDxtv0GkxUt9kmiS','aa',2,'blank.png','asd asdsa','blank.png','Company_Banner.png','sad','asd','asd',NULL,NULL,'21321','231321','213132','holesaler',NULL,'2022-09-21 00:00:00','10000','sad','asd',NULL,'2','4','Tempor atque dolorem','no','no',NULL,NULL,'2022-09-18 13:17:13','2022-09-18 13:17:13',NULL,'2023-03-01 15:47:17',NULL,NULL,NULL),(6,'Hedwig','Golden','hi','zusym@mailinator.com','$2y$10$Mh/m787qQmQc3rqat3fY3ezOL8QycbBRUbh37TcZjvZbYrXn3sxAy','aa',2,'blank.png','Herman Graham Trading','blank.png','Company_Banner.png','Consequat Velit es','Qui nulla sed mollit','Asghar Ali Shah Cricket Stadium Shahrah Noor Jahan, Block C North Nazimabad Town, Karachi, Pakistan','Expedita id quaerat','dawn','48810','89','56','manufacturer',NULL,'2022-09-30 00:00:00','24','Fugit enim odio rep','Nam non nisi qui fug',NULL,'2','4','Amet sint possimus','yes','yes',NULL,NULL,'2022-10-09 21:53:23','2022-10-21 13:57:27',NULL,'2023-03-01 15:47:17',NULL,NULL,NULL),(7,'Blaze','gill','hi','dybonyju@mailinator.com','$2y$10$Y/rHPnH1.sObA/WvIeUfheMMv0mYrscgwpoNKBno.qJMSUQ2ybe1q','aa',3,'blank.png','Palmer and Buckley Co','7/202211061436150-17.jpg','7/202211042004Screenshot 2022-10-26 104550.png','In sunt sequi eum al','Ex rerum adipisci ne','Nankana Sahib, Pakistan','Nihil et aut illum','Corrupti numquam en','27097','64','275','manufacturer',NULL,'2022-10-05 00:00:00','54','Reprehenderit expli','Doloremque voluptate','sad kndbas ','3','6','Dicta aperiam sit de','no','no',NULL,NULL,'2022-10-20 18:37:33','2022-11-06 16:51:12',NULL,'2023-03-01 15:47:17','31.449151','73.712479',NULL),(8,'Phillip','Landry','hi','lehakivi@mailinator.com','$2y$10$eYuy1V5r84mkbhJd4JhVV.MfyCwyml9rjVfeGxzQ185Pqt8Q.NnFm','aa',2,'blank.png','Burch and Obrien Inc','blank.png','Company_Banner.png','Mollit vitae irure i','Labore suscipit inci','Consequuntur digniss','Exercitationem paria','Laudantium culpa et','19319','17','558','reseller',NULL,'2022-11-02 00:00:00','88','Sapiente error excep','Numquam qui earum co',NULL,'2','4','Aut dolor placeat e','no','no',NULL,NULL,'2022-11-06 10:47:03','2022-11-06 10:47:03',NULL,'2023-03-01 15:47:17',NULL,NULL,NULL),(9,'Denton','Norman','Elton Brown','sisyz@mailinator.com','$2y$10$PYq0bZ5/HD1hRvMuSQWaAew4MNz7AFLPzHKwWp9gkW9.ASmBS0x1u','aa',3,'blank.png','Moran and Hunt Trading','blank.png','Company_Banner.png','Nesciunt numquam ab','Officia amet dolore','Nobis nisi ab molest','Sit alias in aperia','Ut atque ut odio dol','39840','62','744','distributor',NULL,'1970-01-01 00:00:00','78','Deserunt Nam minima','Sed quaerat enim omn','asd asdas d','2','4','Duis asperiores aut','no','no',NULL,NULL,'2022-11-11 09:52:32','2022-11-11 09:53:36',NULL,NULL,'0','0','https://www.luvokimokiror.wsdawn');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
