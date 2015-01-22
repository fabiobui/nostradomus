ALTER TABLE `wordpress_3`.`wp_users` ADD COLUMN `user_serverkey` VARCHAR(64) NOT NULL AFTER `display_name`;
ALTER TABLE `wordpress_3`.`wp_users` DROP COLUMN `user_serverkey`;
