<?php
/**
 * Plugin Name: 网站公告插件
 * Version: 1.2
 * Plugin URL: http://www.liuzp.com/plug/10.html
 * Description: 支持两种不同风格的展现形式，支持设置首页或者所有页面显示，支持多条公告显示，支持直接调用微语的数据<br />
 * Author: Liuzp
 * Author Email: root@liuzp.com
 * Author URL: http://www.liuzp.com
 */
 !defined('EMLOG_ROOT') && exit('access deined!');

function announcement_show(){
	require_once 'announcement_config.php';
	
	if($config["show"]==0){
		show_page($config);
	}else{
		$nowUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if($nowUrl==BLOG_URL || $nowUrl==BLOG_URL.'index.php'){
			show_page($config);
		}
	}
}

function show_page($config){
	echo '<link href="'.BLOG_URL.'content/plugins/announcement/style.css" type="text/css" rel="stylesheet" />';
	echo '<script src="'.BLOG_URL.'content/plugins/announcement/script.js" type="text/javascript"></script>';
	$callt = '';
	if($config["callt"]){
		$DB = MySql :: getInstance();
		$query = $DB->query("select content from " . DB_PREFIX . "twitter limit ".$config['num']);
		while ($rs = $DB->fetch_array($query)) {
			$callt = $callt.str_replace("\r\n", " ", str_replace('"', "'", $rs["content"]))."####";
		}
		$callt=rtrim($callt, "####");
	}else{
		$callt = $config["content"];
	}
	echo '<span id="announcement_plug" data-type="'.$config["type"].'" data-content="'.$callt.'"></span>';
}

function announcement_side() {
	echo '<div class="sidebarsubmenu" id="announcement"><a href="./plugin.php?plugin=announcement">网站公告</a></div>';
}

addAction('index_footer', 'announcement_show');
addAction('adm_sidebar_ext', 'announcement_side');