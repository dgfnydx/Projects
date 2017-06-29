<?php
function callback_init(){
	if (!get_cfg_var("allow_url_fopen") && !extension_loaded('curl') && !function_exists('file_get_contents')) emMsg('该插件需要开启“allow_url_fopen”或“curl”或“file_get_contents”。请联系空间商开启！'); 
	$DB = MySql::getInstance();
	$is_exist_rssfeeds_query = $DB->query('show tables like "'.DB_PREFIX.'rssfeeds"');
	$is_exist_rsslogs_query = $DB->query('show tables like "'.DB_PREFIX.'rsslogs"');
	$dbcharset = 'utf8';
	$type = 'MYISAM';
	$add = $DB->getMysqlVersion() > '4.1' ? "ENGINE=".$type." DEFAULT CHARSET=".$dbcharset.";":"TYPE=".$type.";";
	$addone = "INSERT INTO ".DB_PREFIX."rssfeeds (url, title) VALUES('http://xiaosong.org/rss.php', '快乐忆站')";
	if($DB->num_rows($is_exist_rssfeeds_query) == 0){
		$sql_rssfeeds = "
CREATE TABLE `".DB_PREFIX."rssfeeds` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`url` text NOT NULL,
`title` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
)".$add;
		$DB->query($sql_rssfeeds);
		$DB->query($addone);
		
	}
	if($DB->num_rows($is_exist_rsslogs_query) == 0){
		$sql_rsslogs = "
CREATE TABLE `".DB_PREFIX."rsslogs` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`rssid` int(10) NOT NULL,
`log` text NOT NULL,
`hash` varchar(64) NOT NULL,
PRIMARY KEY (`id`)
)".$add;
		$DB->query($sql_rsslogs);
	}
}

function callback_rm(){
	$DB = MySql::getInstance();
	$feeds = getRssFeeds();
	while ($item = $DB->fetch_array($feeds)) {
		deleteFeed($item['id']);
	}
	$DB->query("DROP TABLE IF EXISTS ".DB_PREFIX."rssfeeds");
	$DB->query("DROP TABLE IF EXISTS ".DB_PREFIX."rsslogs");
}
?>