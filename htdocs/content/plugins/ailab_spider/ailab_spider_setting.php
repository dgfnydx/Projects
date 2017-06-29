<?php
!defined('EMLOG_ROOT') && exit('access deined!');

function plugin_setting_view() {
	$DB=MySql::getInstance();
	$page=max(1,intval($_GET['page']));
	$pagenum=20;
	$count=$DB->once_fetch_array("select count(*) as num from `".DB_PREFIX."ailab_spider` ");
	$query=$DB->query("select * from `".DB_PREFIX."ailab_spider` order by dateline desc limit ".(($page-1)*$pagenum).",$pagenum");
	$pageurl =  pagination($count['num'],$pagenum,$page,"plugin.php?plugin=ailab_spider&page=");
	include(EMLOG_ROOT . '/content/plugins/ailab_spider/ailab_spider_setting_view.php');
}

function plugin_setting() {
   
}
?>