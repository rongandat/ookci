ALTER TABLE `users`
	CHANGE COLUMN `status` `status` TINYINT(4) NOT NULL DEFAULT '1' AFTER `email`;