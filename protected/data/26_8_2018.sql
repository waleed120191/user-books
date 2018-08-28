CREATE TABLE `book_user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`book_id` INT(11) NOT NULL DEFAULT '0',
	`user_id` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;


ALTER TABLE `user`
	ADD COLUMN `image` VARCHAR(1000) NULL DEFAULT '' AFTER `register_date`;
