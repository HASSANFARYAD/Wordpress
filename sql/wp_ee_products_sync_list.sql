/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ee_products_sync_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gmc_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `google_status` varchar(50) NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `issues` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
