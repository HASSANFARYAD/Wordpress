/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wysija_list` (
  `list_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `namekey` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unsub_mail_id` int(10) unsigned NOT NULL DEFAULT 0,
  `welcome_mail_id` int(10) unsigned NOT NULL DEFAULT 0,
  `is_enabled` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `is_public` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `created_at` int(10) unsigned DEFAULT NULL,
  `ordering` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_wysija_list` (`list_id`, `name`, `namekey`, `description`, `unsub_mail_id`, `welcome_mail_id`, `is_enabled`, `is_public`, `created_at`, `ordering`) VALUES (1,'My first list','my-first-list','The list created automatically on install of the MailPoet.',0,0,1,1,1586270016,0);
INSERT INTO `wp_wysija_list` (`list_id`, `name`, `namekey`, `description`, `unsub_mail_id`, `welcome_mail_id`, `is_enabled`, `is_public`, `created_at`, `ordering`) VALUES (2,'WordPress Users','users','The list created automatically on import of the plugin\'s subscribers : \"WordPress',0,0,0,0,1586270016,0);
