CREATE DATABASE IF NOT EXISTS `prest`;
CREATE TABLE `tbl_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `technical_contact` varchar(128) NOT NULL,
  `business_contact` varchar(128) DEFAULT NULL,
  `ip_range_low` bigint(12) DEFAULT '0',
  `ip_range_high` bigint(12) DEFAULT '0',
  `key` varchar(64) DEFAULT NULL,
  `daily_request_limit` varchar(128) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;