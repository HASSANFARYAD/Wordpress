/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wysija_url_mail` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(10) unsigned NOT NULL,
  `unique_clicked` int(10) unsigned NOT NULL DEFAULT 0,
  `total_clicked` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`email_id`,`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
