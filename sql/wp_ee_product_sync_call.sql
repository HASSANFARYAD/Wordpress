/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ee_product_sync_call` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sync_product_ids` longtext DEFAULT NULL,
  `w_total_product` int(10) NOT NULL,
  `total_sync_product` int(10) NOT NULL,
  `last_sync` datetime NOT NULL,
  `create_sync` datetime NOT NULL,
  `next_sync` datetime NOT NULL,
  `last_sync_product_id` bigint(20) NOT NULL,
  `action_scheduler_id` int(10) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 failed, 1 completed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
