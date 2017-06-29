<?php
!defined('EMLOG_ROOT') && exit('fuck♂you');
define('WMZZ_E_PROT_ROOT', EMLOG_ROOT.'/content/plugins/wmzz_protector/');
//插件激活
function callback_init() {
	$sql ="
	create table if not exists `".DB_PREFIX."ailab_spider` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `spidername` varchar(200) DEFAULT NULL,
	  `spiderip` varchar(200) DEFAULT NULL,
	  `dateline` int(10) unsigned NOT NULL default '0',
	  `url` varchar(255) DEFAULT NULL,
	  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',  
	  PRIMARY KEY (`id`)
	)ENGINE=MyISAM;";
	$DB = MySql::getInstance();
	$DB->query($sql);
}
//插件禁用事件
function callback_rm(){
}
?>