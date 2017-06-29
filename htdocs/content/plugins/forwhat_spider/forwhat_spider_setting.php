<?php

//!defined('EMLOG_ROOT') && exit('access deined!');

require_once('forwhat_spider_config.php');

if(isset($_POST['uhowtodo']))
{
	ob_clean();//清除缓存
	//开始输出XML	
	header("Content-Type: text/xml;charset=utf-8"); 
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	echo '<root>';
	
	
	$db=MySql::getInstance();
	$result = $db->query("show tables like '".DB_SPIDER_TABLENAME."'");
	if ($db->num_rows($result)> 0)
	{//存在	
		$totalnum=0;
		
			$result = $db->query(" select count(*) from ".DB_SPIDER_TABLENAME);
			$rownum= $db->fetch_row($result);
			//echo $rownum[0];
			$totalnum=intval($rownum[0]);	
	

			$startnum=intval($_POST['unum']);
			//每次最多16条
			if($totalnum<16)
			{
				$startnum=0;
				$result = $db->query(" select * from ".DB_SPIDER_TABLENAME);
			}
			else
			{
				if(($startnum+16)>$totalnum)
				{
					$startnum=$totalnum-16;
				}
				$result = $db->query(" select * from ".DB_SPIDER_TABLENAME." limit ".$startnum.",16");
			}
			while($rst=$db->fetch_row($result))
			{
				echo '<show><sname>'.$rst[0].'</sname>';
				echo '<stime>'.date('Y-m-d H:i:s', $rst[1]+3600*8).'</stime>';
				echo '<surl>'.$rst[2].'</surl>';		
				echo '<sip>'.$rst[3].'</sip></show>';
			}
		echo '<control><num>'.$totalnum.'</num><dqnum>'.$startnum.'</dqnum></control>';
			
	} 
	else
	{//不存在，创建
		$db->query("create table ".DB_SPIDER_TABLENAME."(sname varchar(255), stime varchar(255),surl varchar(255),sip varchar(255))");	
	}
	
	echo '</root>';
	exit();//结束进程
}
else
{
	
}
function plugin_setting_view() {
	?>
<div id='forwhat_spider_control'><a href='#' id='forwhat_spider_begin'>点我开始获取</a></div><div id='forwhat_spider_showresult'></div>
<?php	
//echo "";
}