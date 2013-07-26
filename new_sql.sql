ALTER TABLE `transactions`
	ADD COLUMN `status` TINYINT NOT NULL DEFAULT '1' AFTER `fee_text`;