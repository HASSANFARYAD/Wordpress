/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_actionscheduler_groups` (
  `group_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `slug` (`slug`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES (1,'action-scheduler-migration');
INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES (2,'woocommerce-db-updates');
INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES (3,'facebook-for-woocommerce');
INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES (4,'wc-admin-data');
INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES (5,'woocommerce_payments');
