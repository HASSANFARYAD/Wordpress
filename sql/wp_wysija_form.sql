/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wysija_form` (
  `form_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data` longtext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `styles` longtext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `subscribed` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_wysija_form` (`form_id`, `name`, `data`, `styles`, `subscribed`) VALUES (1,'Subscribe to our Newsletter','YTo0OntzOjc6InZlcnNpb24iO3M6MzoiMC40IjtzOjg6InNldHRpbmdzIjthOjQ6e3M6MTA6Im9uX3N1Y2Nlc3MiO3M6NzoibWVzc2FnZSI7czoxNToic3VjY2Vzc19tZXNzYWdlIjtzOjY1OiJDaGVjayB5b3VyIGluYm94IG9yIHNwYW0gZm9sZGVyIG5vdyB0byBjb25maXJtIHlvdXIgc3Vic2NyaXB0aW9uLiI7czo1OiJsaXN0cyI7YToxOntpOjA7czoxOiIxIjt9czoxNzoibGlzdHNfc2VsZWN0ZWRfYnkiO3M6NToiYWRtaW4iO31zOjQ6ImJvZHkiO2E6Mjp7aTowO2E6NDp7czo0OiJuYW1lIjtzOjU6IkVtYWlsIjtzOjQ6InR5cGUiO3M6NToiaW5wdXQiO3M6NToiZmllbGQiO3M6NToiZW1haWwiO3M6NjoicGFyYW1zIjthOjI6e3M6NToibGFiZWwiO3M6NToiRW1haWwiO3M6ODoicmVxdWlyZWQiO2I6MTt9fWk6MTthOjQ6e3M6NDoibmFtZSI7czo2OiJTdWJtaXQiO3M6NDoidHlwZSI7czo2OiJzdWJtaXQiO3M6NToiZmllbGQiO3M6Njoic3VibWl0IjtzOjY6InBhcmFtcyI7YToxOntzOjU6ImxhYmVsIjtzOjEwOiJTdWJzY3JpYmUhIjt9fX1zOjc6ImZvcm1faWQiO2k6MTt9',NULL,0);
