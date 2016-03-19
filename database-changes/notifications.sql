CREATE DATABASE wingify;

GRANT ALL ON wingify.* TO ''@'localhost';

USE wingify;

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_message` varchar(128) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `img_path` varchar(128) DEFAULT NULL,
  `is_read` int(11) DEFAULT '0' COMMENT 'Default: Not read->Status=0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;