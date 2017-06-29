<?php defined('EMLOG_ROOT') or die('access deined!');
function callback_init() {
	$db = MySql::getInstance();
	$dbcharset = 'utf8';
	$type = 'MYISAM';
	$add = $db->getMysqlVersion() > '4.1' ? "ENGINE=".$type." DEFAULT CHARSET=".$dbcharset.";":"TYPE=".$type.";";
	$sql = "
	CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ad` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`status` TINYINT(1) NULL DEFAULT '0',
		`position` TINYINT(1) UNSIGNED NULL DEFAULT '0',
		`title` VARCHAR(50) NULL DEFAULT NULL,
		`weight` TINYINT(2) UNSIGNED NULL DEFAULT '10',
		`content` TEXT NULL,
		PRIMARY KEY (`id`),
		INDEX `status` (`status`),
		INDEX `position` (`position`)
	)
	".$add;	
	$db->query($sql);
}

function callback_rm() {

}