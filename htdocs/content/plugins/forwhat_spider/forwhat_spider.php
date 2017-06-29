<?php
/*
Plugin Name: 蜘蛛爬行记录
Version: 1.0
Plugin URL: http://www.forwhat.cn
Description: 蜘蛛爬行记录技术支持<a href="http://www.adfun.cn/">emlog大博客</a>
Author: forwhat
Author Email: forwhat@forwhat.cn
Author URL: http://www.forwhat.cn
时间: 201402211710
*/

!defined('EMLOG_ROOT') && exit('access deined!');

require_once('forwhat_spider_config.php');

addAction('index_footer', 'forwhat_spider_fun');

addAction('adm_head', 'forwhat_spider_addjs_fun');

function forwhat_spider_addjs_fun()
{
	echo "<script type=\"text/javascript\" src=\"../content/plugins/forwhat_spider/forwhat_spider.js\"></script>";	
	echo "<link href=\"../content/plugins/forwhat_spider/forwhat_spider.css\" type=text/css rel=stylesheet>";	
}

function forwhat_spider_fun()
{
	$spiders=array(
	1=>array('baidu',array('baiduspider')),
	2=>array('360',array('360spider','qihoobot')),
	3=>array('google',array('googlebot','mediapartners-google','feedfetcher-google')),
	4=>array('soso',array('sosospider')),
	5=>array('msn',array('msnbot')),
	6=>array('yodao',array('yodaobot')),
	7=>array('yahoo',array('yahoo')),
	8=>array('sogou',array('sogou')),
	9=>array('bing',array('bingbot')),
	10=>array('sohu',array('sohu')),
	11=>array('iask',array('iask')),
	);

	$agent=strtolower($_SERVER["HTTP_USER_AGENT"]);
		$ip = $_SERVER["REMOTE_ADDR"];
		$uri = $_SERVER['REQUEST_URI'];
		$tim=$_SERVER['REQUEST_TIME'];

		$spider='';		
		foreach ($spiders as $key => $value) {
			foreach($value[1] as $v){
				if (strpos($agent, $v) !== false) {
					$spider = $value[0];
					break;
				}
			}
			if($spider)//如果符合其中任何一个
			break;
		}
		if ($spider) {//爬行数据入库
			$spider_data = array(
				'sname' => $spider,
				'stime' => $tim,
				'surl' => $uri,
				'sip' => $ip,
			);
			
			$db=MySql::getInstance();	
			$result = $db->query("show tables like '".DB_SPIDER_TABLENAME."'");
			if ($db->num_rows($result)> 0)
			{//存在
		
			} 
			else
			{//不存在，创建
				$db->query("create table ".DB_SPIDER_TABLENAME."(sname varchar(255), stime varchar(255),surl varchar(255),sip varchar(255))");	
			}
			$db->query("insert into " .DB_SPIDER_TABLENAME. "(sname,stime,surl,sip) VALUES ('".$spider."','".$tim."','".$uri."','".$sip."')");	
			
			$mylimit=$time-86400 *30;//删除该蜘蛛30天之前的记录
			$db->query("delete  * from ".DB_SPIDER_TABLENAME." where sname ='".$spider."' and stime < '".$mylimit."'");
		}
}
