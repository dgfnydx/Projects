<?php
/*
Plugin Name: Rss订阅
Version: 1.3.4
Plugin URL: http://xiaosong.org/tech/the-official-releas-of-rss-subscribe-plugin
Description: 订阅朋友的博客feed，显示在自己博客~
Author: 小松
Author Email: sahala_2007@126.com
Author URL: http://xiaosong.org/
*/
!defined('EMLOG_ROOT') && exit('access deined!');
require_once(EMLOG_ROOT.'/content/plugins/lastRSS/lastRSS_config.php');
require_once(EMLOG_ROOT.'/content/plugins/lastRSS/lastRSS_class.php');
$rssparser = new lastRSS;
$rssparser->cache_dir = EMLOG_ROOT.'/content/cache/'; 
$rssparser->cache_time = $lastRSS_cache_time; 
$rssparser->items_limit = $lastRSS_item_num > 3 ? 3 : $lastRSS_item_num;
$rssparser->CDATA = 'content'; 
$rssparser->cp = 'UTF-8'; 
$rssparser->channeltags = array ('title');
$rssparser->itemtags = array ('title','link');
$rssparser->imagetags = array ();
$rssparser->textinputtags = array ();
$DB = MySql::getInstance();

function urlShort($url){
	global $rssparser, $lastRSS_urlshort_domain;
	$api = 'http://json.so/api/short.htm?d='.$lastRSS_urlshort_domain.'&u='.$url;
	$results = $rssparser->getRemoteFile($api);
	if (empty($results)) {
		return $url;
	} else {
		$results = json_decode($results, true);
		if(isset($results['state']) && $results['state'] == 'success'){
			return $results['msg'];
		}
		return $url;
	}
}
function getRssFeeds(){
	global $DB;
	$sql = "SELECT * FROM ".DB_PREFIX."rssfeeds ORDER BY id ASC";
	$result = $DB->query($sql);
	return $result;
}
function isLogExists($rssid, $hash){
	global $DB;
	$sql = "SELECT id FROM ".DB_PREFIX."rsslogs WHERE rssid = $rssid AND hash = '$hash'";
	$result = $DB->query($sql);
	$rows = $DB->num_rows($result);
	return $rows;
}
function isFeedExists($url){
	global $DB;
	$sql = "SELECT id FROM ".DB_PREFIX."rssfeeds WHERE url = '$url'";
	$result = $DB->query($sql);
	$rows = $DB->num_rows($result);
	return $rows;
}
function insertLog($rssid, $log ,$hash){
	global $DB;
	if (isLogExists($rssid, $hash) == 0) {
		$DB->query("INSERT INTO ".DB_PREFIX."rsslogs (rssid, log, hash) VALUES($rssid, '$log', '$hash')");
	}
}
function insertFeed($url, $title){
	global $DB;
	if (isFeedExists($url) == 0) {
		$DB->query("INSERT INTO ".DB_PREFIX."rssfeeds (url, title) VALUES('$url', '$title')");
	} elseif (!getTitle($url)) {
		emMsg("RSS导入失败，RSS地址{$url}解析失败，请确定RSS地址及XML文件格式正确");
	} else {
		emMsg("RSS导入失败，数据库中已存在{$url}");
	}
}
function deleteFeed($id){
	global $DB;
	$rssurl = $DB->fetch_array($DB->query("SELECT url FROM ".DB_PREFIX."rssfeeds WHERE id = $id"));
	$rssurl = $rssurl['url'];
	$cache_file = EMLOG_ROOT.'/content/cache/rsscache_'.md5($rssurl);
	$DB->query("DELETE FROM ".DB_PREFIX."rssfeeds WHERE id = $id");
	$DB->query("DELETE FROM ".DB_PREFIX."rsslogs WHERE rssid = $id");
	unlink($cache_file);
}
function updateFeed($id, $url, $title){
	global $DB;
	$DB->query("UPDATE ".DB_PREFIX."rssfeeds SET url = '$url', title = '$title' WHERE id = $id");
}
function getTitle($rss_url){
	global $rssparser;
	$rss = $rssparser->Get($rss_url);
	return $rss['title'];
}
function updateLogs(){
	global $rssparser, $DB, $lastRSS_is_urlshort, $lastRSS_is_blank;
	$feeds = getRssFeeds();
	while ($item = $DB->fetch_array($feeds)) {
		$rss = $rssparser->Get($item['url']);
		if(!empty($rss['items'])) {
			foreach ($rss['items'] as $key => $data) {
				$rssid = $item['id'];
				$hash = md5($data['title']);
				$checklog = isLogExists($rssid, $hash);
				if ($checklog == 0) {
					if (trim($data['title']) != '') {
						$link = $lastRSS_is_urlshort ? urlShort($data['link']) : $data['link'];
						$target = $lastRSS_is_blank ? ' target="_blank"' : '';
						$log = '<a href="'.$link.'"'.$target.'>'.strip_tags($data['title']).'</a>';
						insertLog($rssid, $log ,$hash);
					}
				}
			}
		}
	}
}
function displayLog(){
	global $DB, $lastRSS_item_num;
	$sql = "SELECT ".DB_PREFIX."rsslogs.log,".DB_PREFIX."rssfeeds.title FROM ".DB_PREFIX."rsslogs INNER JOIN ".DB_PREFIX."rssfeeds ON ".DB_PREFIX."rsslogs.rssid = ".DB_PREFIX."rssfeeds.id ORDER BY ".DB_PREFIX."rsslogs.id DESC limit $lastRSS_item_num";
	$result = $DB->query($sql);
	$output = '';
	while ($row = $DB->fetch_array($result)) {
		$output .= '<li>'.$row['log'].' 来自 《'.$row["title"].'》</li>';
	}
	$output = empty($output) ? '<li>暂无Rss文章 ^_^' : $output;
	$output = '<ul class="rsslogs">'.$output.'</ul>';
	return $output;
}
function displayLogIndex(){
	echo '<div id="lastRSS" class="lastRSS_loding"></div>';
}
function lastRSS_css(){
	echo '<link rel="stylesheet" href="'.BLOG_URL.'content/plugins/lastRSS/css/lastRSS.css" />'."\n";
}
function lastRSS_ajax(){
	echo '<script type="text/javascript" src="'.BLOG_URL.'content/plugins/lastRSS/js/jquery-autoscroll.js"></script>'."\n";
	echo '<script type="text/javascript">$(function(){$.get("'.BLOG_URL.'index.php?plugin=lastRSS&action=update&r="+Math.random());$("#lastRSS").load("'.BLOG_URL.'index.php?plugin=lastRSS&action=ajaxshow&r="+Math.random(),function(){$(this).removeClass("lastRSS_loding").autoScroll()})})</script>'."\n";
}
function lastRSS_adminUpdate(){
	echo '<script type="text/javascript">$(function(){$.get("'.BLOG_URL.'index.php?plugin=lastRSS&action=update&r="+Math.random());})</script>'."\n";
}
function lastRSS_menu(){
	echo '<div class="sidebarsubmenu" id="lastRSS"><a href="./plugin.php?plugin=lastRSS">Rss订阅</a></div>';
}
function lastRSS_backup(){
	global $DB, $tables;
	$is_exist_rssfeeds_query = $DB->query('show tables like "'.DB_PREFIX.'rssfeeds"');
	$is_exist_rsslogs_query = $DB->query('show tables like "'.DB_PREFIX.'rsslogs"');
	if($DB->num_rows($is_exist_rssfeeds_query) != 0) array_push($tables, 'rssfeeds');
	if($DB->num_rows($is_exist_rsslogs_query) != 0) array_push($tables, 'rsslogs');
}
emLoadJQuery();
addAction('data_prebakup', 'lastRSS_backup');
addAction('index_head', 'lastRSS_css');
addAction('index_loglist_top', 'displayLogIndex');
addAction('index_footer', 'lastRSS_ajax');
addAction('adm_head', 'lastRSS_adminUpdate');
addAction('adm_sidebar_ext', 'lastRSS_menu');
?>