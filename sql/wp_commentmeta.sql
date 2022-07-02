/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES (129,37,'akismet_result','true');
INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES (130,37,'akismet_history','a:2:{s:4:\"time\";d:1650782097.245917;s:5:\"event\";s:10:\"check-spam\";}');
INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES (131,37,'akismet_as_submitted','a:16:{s:14:\"comment_author\";s:13:\"Shirley Kriek\";s:20:\"comment_author_email\";s:18:\"Palombit@gmail.com\";s:18:\"comment_author_url\";N;s:15:\"comment_content\";s:102:\"There\'s certainly a lot to find out about this subject. I really like all of the points you have made.\";s:12:\"comment_type\";s:6:\"review\";s:7:\"user_ID\";i:0;s:7:\"user_id\";i:0;s:17:\"comment_author_IP\";s:13:\"37.221.67.137\";s:13:\"comment_agent\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36\";s:7:\"user_ip\";s:13:\"37.221.67.137\";s:10:\"user_agent\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36\";s:4:\"blog\";s:20:\"https://learndsl.com\";s:9:\"blog_lang\";s:5:\"en_US\";s:12:\"blog_charset\";s:5:\"UTF-8\";s:9:\"permalink\";s:34:\"https://learndsl.com/product/pant/\";s:10:\"POST_ak_js\";s:3:\"236\";}');
INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES (132,37,'verified','0');
