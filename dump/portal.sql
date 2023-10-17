-- MySQL dump 10.13  Distrib 5.7.43, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: portal
-- ------------------------------------------------------
-- Server version	5.7.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `batch_logs`
--

DROP TABLE IF EXISTS `batch_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instance_id` int(10) unsigned NOT NULL DEFAULT '0',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `batch_logs_instance_id_foreign` (`instance_id`),
  CONSTRAINT `batch_logs_instance_id_foreign` FOREIGN KEY (`instance_id`) REFERENCES `instances` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_logs`
--

LOCK TABLES `batch_logs` WRITE;
/*!40000 ALTER TABLE `batch_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `batch_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_types`
--

DROP TABLE IF EXISTS `client_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_types`
--

LOCK TABLES `client_types` WRITE;
/*!40000 ALTER TABLE `client_types` DISABLE KEYS */;
INSERT INTO `client_types` VALUES (1,'Escola','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,'Institut','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,'Institut-Escola','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,'Adults','2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,'Servei educatiu','2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,'Escola Oficial d\'Idiomes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,'Altres','2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,'CEE','2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,'Centre concertat','2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,'ECA','2023-10-16 16:17:54','2023-10-16 16:17:54'),(11,'ZER','2023-10-16 16:17:54','2023-10-16 16:17:54'),(12,'Projecte','2023-10-16 16:17:54','2023-10-16 16:17:54'),(13,'Formació','2023-10-16 16:17:54','2023-10-16 16:17:54'),(14,'Llar d\\infants','2023-10-16 16:17:54','2023-10-16 16:17:54'),(15,'No definit','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `client_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `dns` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_dns` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_type` enum('standard','subdomain') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `host` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_host` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `postal_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00000',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `location_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `visible` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_code_unique` (`code`),
  UNIQUE KEY `clients_dns_unique` (`dns`),
  UNIQUE KEY `clients_host_unique` (`host`),
  UNIQUE KEY `clients_old_host_unique` (`old_host`),
  KEY `clients_location_id_foreign` (`location_id`),
  KEY `clients_type_id_foreign` (`type_id`),
  CONSTRAINT `clients_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  CONSTRAINT `clients_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `client_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'a0000001','Client 1','centre-1','usu1','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,1,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,'a0000002','Client 2','centre-2','usu2','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,2,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,'a0000003','Client 3','centre-3','usu3','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,4,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,'a0000004','Client 4','centre-4','usu4','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,6,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,'a0000005','Client 5','centre-5','usu5','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,11,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,'a0000006','Client 6','centre-6','usu6','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,8,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,'a0000007','Client 7','centre-7','usu7','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,7,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,'a0000008','Client 8','centre-8','usu8','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,5,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,'a0000009','Client 9','centre-9','usu9','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,12,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,'a0000010','Client 10','centre-10','usu10','standard',NULL,NULL,'C/ Via Làctia, 584','Barcelona','08012','','active',1,1,'yes','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` VALUES (1,'notify_address_quota','admin@xtec.invalid',NULL,NULL),(2,'notify_address_request','admin@xtec.invalid',NULL,NULL),(3,'notify_address_user_cco','admin@xtec.invalid',NULL,NULL),(4,'quota_usage_to_request','0.75',NULL,NULL),(5,'quota_free_to_request','3',NULL,NULL),(6,'quota_usage_to_notify','0.85',NULL,NULL),(7,'quota_free_to_notify','3',NULL,NULL),(8,'xtecadmin_hash','',NULL,NULL),(9,'max_file_size_for_large_upload','800',NULL,NULL),(10,'nodes_create_db','1',NULL,NULL),(11,'min_db_id','1',NULL,NULL);
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instances`
--

DROP TABLE IF EXISTS `instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL DEFAULT '0',
  `service_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` enum('pending','active','inactive','denied','withdrawn','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `db_id` int(10) unsigned NOT NULL DEFAULT '0',
  `db_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `quota` bigint(20) unsigned NOT NULL DEFAULT '0',
  `used_quota` bigint(20) unsigned NOT NULL DEFAULT '0',
  `model_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `contact_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `contact_profile` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `observations` text COLLATE utf8mb4_unicode_ci,
  `annotations` text COLLATE utf8mb4_unicode_ci,
  `requested_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `instances_client_id_foreign` (`client_id`),
  KEY `instances_service_id_foreign` (`service_id`),
  KEY `instances_model_type_id_foreign` (`model_type_id`),
  CONSTRAINT `instances_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `instances_model_type_id_foreign` FOREIGN KEY (`model_type_id`) REFERENCES `model_types` (`id`),
  CONSTRAINT `instances_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instances`
--

LOCK TABLES `instances` WRITE;
/*!40000 ALTER TABLE `instances` DISABLE KEYS */;
INSERT INTO `instances` VALUES (1,1,4,'active',1,'localhost',5368709120,0,1,'Manager 1','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,2,4,'active',2,'localhost',5368709120,0,1,'Manager 2','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,3,4,'active',3,'localhost',5368709120,0,2,'Manager 3','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,4,4,'active',4,'localhost',5368709120,0,2,'Manager 4','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,1,5,'active',1,'localhost',5368709120,0,3,'Manager 1','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,2,5,'active',2,'localhost',5368709120,0,4,'Manager 2','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,3,5,'active',3,'localhost',5368709120,0,5,'Manager 3','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,4,5,'active',4,'localhost',5368709120,0,6,'Manager 4','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,5,5,'active',5,'localhost',5368709120,0,7,'Manager 5','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,6,5,'active',6,'localhost',5368709120,0,8,'Manager 6','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(11,7,5,'active',7,'localhost',5368709120,0,9,'Manager 7','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(12,8,5,'active',8,'localhost',5368709120,0,10,'Manager 8','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54'),(13,9,5,'active',9,'localhost',5368709120,0,11,'Manager 9','Coordinador TAC','','','2023-10-16 16:17:54','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `instances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` longtext COLLATE utf8mb4_unicode_ci,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Baix Llobregat','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,'Barcelona Comarques','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,'Catalunya Central','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,'Consorci d\'Educació de Barcelona','2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,'Girona','2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,'Lleida','2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,'Maresme-Vallès Oriental','2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,'Tarragona','2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,'Terres de l\'Ebre','2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,'Vallès Occidental','2023-10-16 16:17:54','2023-10-16 16:17:54'),(11,'No definit','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `managers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `managers_client_id_foreign` (`client_id`),
  KEY `managers_user_id_foreign` (`user_id`),
  CONSTRAINT `managers_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `managers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `managers`
--

LOCK TABLES `managers` WRITE;
/*!40000 ALTER TABLE `managers` DISABLE KEYS */;
INSERT INTO `managers` VALUES (1,1,12,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,2,13,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,3,14,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,4,15,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,5,16,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,6,17,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,7,18,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,8,19,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,9,20,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,10,21,'2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `managers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_04_27_094036_create_client_types_table',1),(6,'2023_04_27_100012_create_locations_table',1),(7,'2023_04_27_110000_create_clients_table',1),(8,'2023_04_27_110104_create_managers_table',1),(9,'2023_04_27_133521_create_services_table',1),(10,'2023_04_27_141208_create_model_types_table',1),(11,'2023_04_27_143543_create_queries_table',1),(12,'2023_04_28_094615_create_request_types_table',1),(13,'2023_04_28_110340_create_request_type_service_table',1),(14,'2023_04_28_112213_create_requests_table',1),(15,'2023_05_05_113305_create_instances_table',1),(16,'2023_05_24_085741_create_permission_tables',1),(17,'2023_05_30_121405_create_logs_table',1),(18,'2023_06_20_185706_create_jobs_table',1),(19,'2023_06_22_164454_create_job_logs_table',1),(20,'2023_07_23_094218_create_configs_table',1),(21,'2023_10_09_144734_create_batch_logs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(2,'App\\Models\\User',3),(2,'App\\Models\\User',4),(2,'App\\Models\\User',5),(2,'App\\Models\\User',6),(2,'App\\Models\\User',7),(2,'App\\Models\\User',8),(2,'App\\Models\\User',9),(2,'App\\Models\\User',10),(2,'App\\Models\\User',11),(3,'App\\Models\\User',12),(3,'App\\Models\\User',13),(3,'App\\Models\\User',14),(3,'App\\Models\\User',15),(3,'App\\Models\\User',16),(3,'App\\Models\\User',17),(3,'App\\Models\\User',18),(3,'App\\Models\\User',19),(3,'App\\Models\\User',20),(3,'App\\Models\\User',21);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_types`
--

DROP TABLE IF EXISTS `model_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(10) unsigned NOT NULL,
  `short_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_types_service_id_foreign` (`service_id`),
  CONSTRAINT `model_types_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_types`
--

LOCK TABLES `model_types` WRITE;
/*!40000 ALTER TABLE `model_types` DISABLE KEYS */;
INSERT INTO `model_types` VALUES (1,4,'pri','Maqueta primària','','','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,4,'sec','Maqueta secundària','','','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,5,'ssee','Maqueta SSEE','http://pwc-int.educacio.intranet/agora/masterssee/','usu5','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,5,'pri','Maqueta primària','http://pwc-int.educacio.intranet/agora/masterpri/','usu6','2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,5,'sec','Maqueta secundària','http://pwc-int.educacio.intranet/agora/mastersec/','usu7','2023-10-16 16:17:54','2023-10-16 16:17:54'),(6,5,'cfa','Maqueta adults','http://pwc-int.educacio.intranet/agora/mastercfa/','usu8','2023-10-16 16:17:54','2023-10-16 16:17:54'),(7,5,'eoi','Maqueta EOI','http://pwc-int.educacio.intranet/agora/mastereoi/','usu9','2023-10-16 16:17:54','2023-10-16 16:17:54'),(8,5,'zer','Maqueta ZER','http://pwc-int.educacio.intranet/agora/masterzer/','usu10','2023-10-16 16:17:54','2023-10-16 16:17:54'),(9,5,'cda','Maqueta CdA','http://pwc-int.educacio.intranet/agora/mastercda/','usu4','2023-10-16 16:17:54','2023-10-16 16:17:54'),(10,5,'creda','Maqueta CREDA','http://pwc-int.educacio.intranet/agora/mastercreda/','usu11','2023-10-16 16:17:54','2023-10-16 16:17:54'),(11,5,'pro','Maqueta Projectes','http://pwc-int.educacio.intranet/agora/masterpro/','usu3','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `model_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Administrate site','web','2023-10-16 16:17:55','2023-10-16 16:17:55'),(2,'Manage own managers','web','2023-10-16 16:17:55','2023-10-16 16:17:55'),(3,'Manage clients','web','2023-10-16 16:17:55','2023-10-16 16:17:55');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(10) unsigned NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('select','insert','update','delete','alter','drop','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'select',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queries`
--

LOCK TABLES `queries` WRITE;
/*!40000 ALTER TABLE `queries` DISABLE KEYS */;
INSERT INTO `queries` VALUES (1,5,'UPDATE wp_users SET user_pass = MD5(\'agora\') WHERE user_login = \'admin\';','Canvia la contrasenya a l\'usuari admin','update','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,4,'UPDATE m2user SET password = MD5(\'agora\') WHERE username = \'admin\';','Canvia la contrasenya a l\'usuari admin','update','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `queries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_type_service`
--

DROP TABLE IF EXISTS `request_type_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_type_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_type_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `request_type_service_request_type_id_foreign` (`request_type_id`),
  KEY `request_type_service_service_id_foreign` (`service_id`),
  CONSTRAINT `request_type_service_request_type_id_foreign` FOREIGN KEY (`request_type_id`) REFERENCES `request_types` (`id`),
  CONSTRAINT `request_type_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_type_service`
--

LOCK TABLES `request_type_service` WRITE;
/*!40000 ALTER TABLE `request_type_service` DISABLE KEYS */;
INSERT INTO `request_type_service` VALUES (1,1,5),(2,2,5),(3,4,5),(4,3,5),(5,3,4),(6,1,4),(7,2,4);
/*!40000 ALTER TABLE `request_type_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_types`
--

DROP TABLE IF EXISTS `request_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_types`
--

LOCK TABLES `request_types` WRITE;
/*!40000 ALTER TABLE `request_types` DISABLE KEYS */;
INSERT INTO `request_types` VALUES (1,'Ampliació de quota','Si esteu exhaurint la quota podeu sol·licitar-ne l\'ampliació. L\'acceptació d\'aquesta ampliació està subjecta a les condicions d\'ús del servei i, en conseqüència, la seva sol·licitud no implica la seva concesió. Cada cas es valorarà individualment.','Indiqueu el motiu pel qual demaneu l\'ampliació','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,'Restauració de la contrasenya de l\'usuari/ària admin','Si no recordeu la contrasenya de l\'administrador/a predeterminat del servei, podeu demanar-ne el canvi.','Observacions (opcional)','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,'Baixa al servei','Els centres poden demanar que un servei determinat pugui ser donat de baixa','Indiqueu els motius pels quals sol·liciteu la baixa al servei','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,'Activació de la importació massiva d\'usuaris','L\'activació de l\'extensió <em>Import users from CSV with meta</em> afegeix l\'opció <strong>Eines > Importa usuaris</strong> al Nodes, des d\'on es pot utilitzar un fitxer CSV per crear molts usuaris ràpidament.','Observacions (opcional)','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `request_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_type_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` enum('pending','under_study','solved','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_comment` text COLLATE utf8mb4_unicode_ci,
  `admin_comment` text COLLATE utf8mb4_unicode_ci,
  `private_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_request_type_id_foreign` (`request_type_id`),
  KEY `requests_service_id_foreign` (`service_id`),
  KEY `requests_client_id_foreign` (`client_id`),
  KEY `requests_user_id_foreign` (`user_id`),
  CONSTRAINT `requests_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `requests_request_type_id_foreign` FOREIGN KEY (`request_type_id`) REFERENCES `request_types` (`id`),
  CONSTRAINT `requests_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,1,4,1,1,'pending','This is a user comment','This is an admin comment','This is a private note','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,1,5,2,2,'pending','This is a user comment','This is an admin comment','This is a private note','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2023-10-16 16:17:54','2023-10-16 16:17:54'),(2,'client','web','2023-10-16 16:17:54','2023-10-16 16:17:54'),(3,'manager','web','2023-10-16 16:17:54','2023-10-16 16:17:54'),(4,'user','web','2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `quota` bigint(20) unsigned NOT NULL DEFAULT '5368709120',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (4,'Moodle','active','Entorn virtual d\'aprenentatge fet amb Moodle','moodle',5368709120,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(5,'Nodes','active','Web de centre fet amb WordPress','',5368709120,'2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standard_logs`
--

DROP TABLE IF EXISTS `standard_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standard_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `action_type` tinyint(4) NOT NULL DEFAULT '0',
  `action_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `standard_logs_client_id_foreign` (`client_id`),
  KEY `standard_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `standard_logs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `standard_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standard_logs`
--

LOCK TABLES `standard_logs` WRITE;
/*!40000 ALTER TABLE `standard_logs` DISABLE KEYS */;
INSERT INTO `standard_logs` VALUES (1,1,12,1,'S\'ha fet la sol·licitud de \"Ampliació de quota\" del servei moodle2','2023-10-16 16:17:55','2023-10-16 16:17:55'),(2,1,1,2,'S\'ha atès la vostra sol·licitud i ha quedat com a <strong>Solucionada</strong>. Podeu trobar més informació <a href=\\\"index.php?module=Agoraportal&type=user&func=requests\\\">aquí</a>','2023-10-16 16:17:55','2023-10-16 16:17:55');
/*!40000 ALTER TABLE `standard_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `success_jobs`
--

DROP TABLE IF EXISTS `success_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `success_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci,
  `queued_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `success_jobs`
--

LOCK TABLES `success_jobs` WRITE;
/*!40000 ALTER TABLE `success_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `success_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@xtec.invalid',NULL,'$2y$10$K2kni4tUOWMXaXixHcWlKO/cZ13FGdzuaMuZKZX0cxXeKsp9AG2OG',NULL,'2023-10-16 16:24:10','2023-10-16 16:17:53','2023-10-16 16:24:10'),(2,'a0000001','a0000001@xtec.invalid',NULL,'$2y$10$lAvY22yRHyqlOfKIBi6lNuiMm.8qG9EjXgI37wb/voa3FfMvTW81y',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(3,'a0000002','a0000002@xtec.invalid',NULL,'$2y$10$EqMe83bgoMfgQnPU43L3wudjnouGfPI.A7BKllJwkisvPbNVW7QuW',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(4,'a0000003','a0000003@xtec.invalid',NULL,'$2y$10$HkWqyMCukAWg5jk/CigF4OhVzHKiHRp34ruDUhL5l2aodAXwEJ9Q.',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(5,'a0000004','a0000004@xtec.invalid',NULL,'$2y$10$ITlk0XPjTSLRL9Id1/uCPeBXxiM4QRLNCJ.PeKqkQknUzMgaADYQi',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(6,'a0000005','a0000005@xtec.invalid',NULL,'$2y$10$eGnvcUFR7IIct5h354AO..hFmiSPokJsE7O3W4Vvn5SEXtZgJW9GK',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(7,'a0000006','a0000006@xtec.invalid',NULL,'$2y$10$xQHYhEheC3FgOSOy55XNvOc6I4MirVTb.J9bc32UtldtvzlEQ03fC',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(8,'a0000007','a0000007@xtec.invalid',NULL,'$2y$10$6d58zxXurpwzD/FYFhpclOj1nWd7ZX/R/ct8w5BTNAcvBOzlFWyke',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(9,'a0000008','a0000008@xtec.invalid',NULL,'$2y$10$2FF38Zz6QBE01nPFe6K3JuK7p/K/cAJokfhb/e3hUZBJiLPnE444.',NULL,NULL,'2023-10-16 16:17:53','2023-10-16 16:17:53'),(10,'a0000009','a0000009@xtec.invalid',NULL,'$2y$10$geDeDxF2MVxqKhYNizQyaOHLc0V2.dVJmGSnWVuqs8n9RizaZYj4G',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(11,'a0000010','a0000010@xtec.invalid',NULL,'$2y$10$jsAlrTJYI3ltRQVNHtWRpuFovC.w4M9jbP4mZK9bE9AJz3sUd.9uq',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(12,'manager1','manager1@xtec.invalid',NULL,'$2y$10$G4wPH4e5ylo11LzK4iCrJOyPYaU940ISAfMmyhzBv.288vhSsewt6',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(13,'manager2','manager2@xtec.invalid',NULL,'$2y$10$0VmbCFoY9mIXhRiX5ZBZruU3ECVtdykL7Cu5wz3k4SBjr53p43dC2',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(14,'manager3','manager3@xtec.invalid',NULL,'$2y$10$maUukXtlc041fSdXODQL6.fUgB8QsF61QHLE/0asXY4e6kdnI/5Zm',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(15,'manager4','manager4@xtec.invalid',NULL,'$2y$10$pDsiRaWA1LyaeXqWxH1Vqub9BP6EBpuZCzdlebe9Ij6xRiO/DN2pa',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(16,'manager5','manager5@xtec.invalid',NULL,'$2y$10$L06L9./0c4HSMaSS6aldXuIdvtvYYN4/XuGimqQOXzl81Hd/VhKuy',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(17,'manager6','manager6@xtec.invalid',NULL,'$2y$10$Lf53eEr.wxfIKS7Kji80.eFU5wYsb1q8GRNWBVyO1nBG5djcj8HIS',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(18,'manager7','manager7@xtec.invalid',NULL,'$2y$10$UDYjgnzuGIzWmuqXvGcXPuFapbTELz3TvPLsWmATHx5qu.kbiAsle',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(19,'manager8','manager8@xtec.invalid',NULL,'$2y$10$9SsWlyMRplWBKovhmkeeLuC3h7fhOqVeXfdbpdwJTBFV40adQxFuO',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(20,'manager9','manager9@xtec.invalid',NULL,'$2y$10$OYtBexbkmQcV4GTI5U84Cur.cjaEe0e5g88wJqOW0rRz6I4G30iO6',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54'),(21,'manager10','manager10@xtec.invalid',NULL,'$2y$10$gwK3r5.Suntq4D1FidyTjeOfcchYC6sYkjJ6P2gRfAQ3q3daIDiMe',NULL,NULL,'2023-10-16 16:17:54','2023-10-16 16:17:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-17 13:59:17
