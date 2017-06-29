<?php
!defined('EMLOG_ROOT') && exit('access deined!');

function callback_init(){
$db = MySql::getInstance();
$sql = "ALTER TABLE  `".DB_PREFIX."blog` ADD  `xycode` LONGTEXT DEFAULT NULL;";
if(!array_key_exists('xycode',$db->fetch_array($db->query("SELECT * FROM `".DB_PREFIX."blog`;")))){$db->query($sql);}
}
?>