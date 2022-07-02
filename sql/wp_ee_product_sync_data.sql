/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ee_product_sync_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `w_product_id` bigint(20) NOT NULL,
  `w_cat_id` int(10) NOT NULL,
  `g_cat_id` int(10) NOT NULL,
  `g_attribute_mapping` longtext NOT NULL,
  `update_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
