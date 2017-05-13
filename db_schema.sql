CREATE TABLE `category` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(8) unsigned DEFAULT NULL,
  `top_level` tinyint(1) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `col2` varchar(50) DEFAULT NULL,
  `col3` varchar(50) DEFAULT NULL,
  `col4` varchar(50) DEFAULT NULL,
  `col5` varchar(50) DEFAULT NULL,
  `col6` varchar(50) DEFAULT NULL,
  `col7` varchar(50) DEFAULT NULL,
  `col8` varchar(50) DEFAULT NULL,
  `col9` varchar(50) DEFAULT NULL,
  `col10` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_parent` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `entry` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(8) unsigned DEFAULT NULL,
  `bank_id` int(8) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `last_edit` int(11) DEFAULT NULL,
  `col1` varchar(500) DEFAULT NULL,
  `col2` varchar(500) DEFAULT NULL,
  `col3` varchar(500) DEFAULT NULL,
  `col4` varchar(500) DEFAULT NULL,
  `col5` varchar(500) DEFAULT NULL,
  `col6` varchar(500) DEFAULT NULL,
  `col7` varchar(500) DEFAULT NULL,
  `col8` varchar(500) DEFAULT NULL,
  `col9` varchar(500) DEFAULT NULL,
  `col10` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bank` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;