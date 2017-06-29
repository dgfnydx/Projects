<?php
function callback_init(){
	global $CACHE;
	$DB = MySql::getInstance();
	$inDB = $DB->query("SELECT 1 FROM ".DB_PREFIX."navi WHERE url='".BLOG_URL."?plugin=ttjtg_jin'");
	if (!$DB->num_rows($inDB)) {
		$DB->query("INSERT INTO ".DB_PREFIX."navi (naviname, url, newtab, hide, taxis, isdefault) VALUES('历史今日', '".BLOG_URL."?plugin=ttjtg_jin', 'n', 'n', 1, 'n')");
	} else {
		$DB->query("UPDATE ".DB_PREFIX."navi SET hide='n' WHERE url='".BLOG_URL."?plugin=ttjtg_jin'");
	}
	$CACHE->updateCache('navi');
}

function callback_rm(){
	global $CACHE;
	$DB = MySql::getInstance();
	$DB->query("UPDATE ".DB_PREFIX."navi SET hide='y' WHERE url='".BLOG_URL."?plugin=ttjtg_jin'");
	$CACHE->updateCache('navi');
}

?>