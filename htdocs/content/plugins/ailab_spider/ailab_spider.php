<?php
/*
Plugin Name: 蜘蛛来访统计
Version: 1.0
ForEmlog:5.0.0+
Plugin URL:http://blog.ailab.cn/post/118
Description: 本插件可以实时对搜索引擎来访进行统计，指导站长的运营，来访的蜘蛛类型和访问的页面都能在后台一目了然！
Author: 土著人宁巴
Author URL: http://blog.ailab.cn/
Author Email: lih062624@126.com
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function ailab_spider(){
	 echo '<div class="sidebarsubmenu" id="ailab_spider"><a href="./plugin.php?plugin=ailab_spider">蜘蛛来访统计</a></div>';
}

function ailab_sider_stat(){
	global $DB;
	$agent=$_SERVER['HTTP_USER_AGENT'];
	$domain=$_SERVER['HTTP_HOST'];
	$url=$_SERVER['REQUEST_URI'];
	$ip=getIp();
	$dateline=time();
	$baidu=stristr($agent,"Baiduspider");
	$google=stristr($agent,"Googlebot");
	$soso=stristr($agent,"Sosospider");
	$youdao=stristr($agent,"YoudaoBot");
	$bing=stristr($agent,"bingbot");
	$sogou=stristr($agent,"Sogou web spider");
	$yahoo=stristr($agent,"Yahoo! Slurp");
	$Alexa=stristr($agent,"Alexa");
	$so=stristr($agent,"360Spider");
	if($baidu){
		if($var['baidu']) $agent="baidu";
		else $agent=null;
	}elseif($google){
		if($var['google']) $agent="Google";
		else $agent=null;
	}elseif($soso){
		if($var['soso']) $agent="soso";
		else $agent=null;
	}elseif($youdao){
		if($var['youdao']) $agent="youdao";
		else $agent=null;
	}elseif($bing){
		if($var['bing']) $agent="bing";
		else $agent=null;
	}elseif($sogou){
		if($var['sogou']) $agent="sogou";
		else $agent=null;
	}elseif($yahoo){
		if($var['yahoo']) $agent="yahoo";
		else $agent=null;
	}elseif($Alexa){
		if($var['alexa']) $agent="Alexa";
		else $agent=null;
	}elseif($so){
		if($var['s360']) $agent="so";
		else $agent=null;
	}else{
		$agent=null;
	}
	$url='http://'.$domain.$url;
	if($url&&$agent){
		$DB = MySql::getInstance();
		$sql="insert into ".DB_PREFIX."ailab_spider (spidername,spiderip,dateline,url,status) values ('$agent','$ip','$dateline','$url',1)";
		$DB->query($sql);
		
	}
	return '';
}
addAction('adm_sidebar_ext','ailab_spider');
addAction('index_footer','ailab_sider_stat');
?>