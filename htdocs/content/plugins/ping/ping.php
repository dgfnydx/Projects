<?php
/**
 * Plugin Name:索引通知
 * Version:2.3
 * Description:当你更新博客时自动通知搜索引擎
 * ForEmlog:4.0.0+
 * Author:vibbow
 * Author Email:vibbow@gmail.com
 * Author URL:http://vsean.net/
 */

!defined('EMLOG_ROOT') && exit('access deined!');

function ping_menu()
{
	echo '<div class="sidebarsubmenu" id="ping"><a href="./plugin.php?plugin=ping" ';
	if (ping_update() !== false)
		echo 'style="background: url(../content/plugins/ping/update.png) no-repeat 4px 1px;"';
	echo '>索引通知</a></div>';
}
addAction('adm_sidebar_ext', 'ping_menu');

function ping($blogid)
{
	if (file_exists(EMLOG_ROOT.'/config.yaml'))
		return;

	if (!extension_loaded('curl'))
		return;

	global $action;
	if ($action == 'autosave')
		return;

	$loginfo = ping_loginfo($blogid);
	if ($loginfo['hide'] == 'y')
		return;

	$history = ping_getconfig('ping_history');
	if (strpos($history, "|{$blogid}|") !== false)
		return;

	$list = ping_getconfig('ping_list');
	$custom = ping_getconfig('ping_custom');
	$custom = explode("\n", $custom);

	$blogname = addslashes(Option::get('blogname'));
	$blogurl = BLOG_URL;
	$blogrss = BLOG_URL . 'rss.php';
	$logurl = Url::log($blogid);

	$xml_rpc_data = <<< EOF
<?xml version="1.0" encoding="UTF-8"?><methodCall><methodName>weblogUpdates.extendedPing</methodName><params>
<param><value>BLOGNAME</value></param>
<param><value>BLOGURL</value></param>
<param><value>LOGURL</value></param>
<param><value>BLOGRSS</value></param>
</params></methodCall>
EOF;

	$xml_rpc_data = str_replace('BLOGNAME', $blogname, $xml_rpc_data);
	$xml_rpc_data = str_replace('BLOGURL', $blogurl, $xml_rpc_data);
	$xml_rpc_data = str_replace('LOGURL', $logurl, $xml_rpc_data);
	$xml_rpc_data = str_replace('BLOGRSS', $blogrss, $xml_rpc_data);

	$curl_mh = curl_multi_init();

	if (strpos($list, 'bing') !== false)
	{
		$ping_bing = curl_init();
		$url = 'http://www.bing.com/webmaster/ping.aspx?siteMap='.urlencode($blogrss);
		$header = array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_bing, CURLOPT_URL, $url);
		curl_setopt($ping_bing, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_bing, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_bing, CURLOPT_HTTPHEADER, $header);
		curl_multi_add_handle($curl_mh, $ping_bing);
	}

	if (strpos($list, 'google') !== false)
	{
		$ping_google = curl_init();
		$url = 'http://blogsearch.google.com/ping/RPC2';
		$header = array('Content-Type: text/xml; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_google, CURLOPT_URL, $url);
		curl_setopt($ping_google, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_google, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_google, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ping_google, CURLOPT_POST, 1);
		curl_setopt($ping_google, CURLOPT_POSTFIELDS, $xml_rpc_data);
		curl_multi_add_handle($curl_mh, $ping_google);
	}

	if (strpos($list, 'baidu') !== false)
	{
		$ping_baidu = curl_init();
		$url = 'http://ping.baidu.com/ping/RPC2';
		$header = array('Content-Type: text/xml; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_baidu, CURLOPT_URL, $url);
		curl_setopt($ping_baidu, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_baidu, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_baidu, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ping_baidu, CURLOPT_POST, 1);
		curl_setopt($ping_baidu, CURLOPT_POSTFIELDS, $xml_rpc_data);
		curl_multi_add_handle($curl_mh, $ping_baidu);
	}

	if (strpos($list, 'soso') !== false)
	{
		$ping_soso = curl_init();
		$url = 'http://blog.soso.com/qz.q/default/notice/ping?ty=ping&pingurl='.urlencode($blogrss);
		$header = array('Content-Type: application/x-www-form-urlencoded; charset=gb2312', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_soso, CURLOPT_URL, $url);
		curl_setopt($ping_soso, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_soso, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_soso, CURLOPT_HTTPHEADER, $header);
		curl_multi_add_handle($curl_mh, $ping_soso);
	}

	if (strpos($list, 'youdao') !== false)
	{
		$ping_youdao = curl_init();
		$url = 'http://blog.youdao.com/ping/RPC2';
		$header = array('Content-Type: text/xml; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_youdao, CURLOPT_URL, $url);
		curl_setopt($ping_youdao, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_youdao, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_youdao, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ping_youdao, CURLOPT_POST, 1);
		curl_setopt($ping_youdao, CURLOPT_POSTFIELDS, $xml_rpc_data);
		curl_multi_add_handle($curl_mh, $ping_youdao);
	}

	if (strpos($list, 'feedsky') !== false)
	{
		$ping_feedsky = curl_init();
		$url = 'http://www.feedsky.com/api/RPC2';
		$header = array('Content-Type: text/xml; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_feedsky, CURLOPT_URL, $url);
		curl_setopt($ping_feedsky, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_feedsky, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_feedsky, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ping_feedsky, CURLOPT_POST, 1);
		curl_setopt($ping_feedsky, CURLOPT_POSTFIELDS, $xml_rpc_data);
		curl_multi_add_handle($curl_mh, $ping_feedsky);
	}

	if (strpos($list, 'feedburner') !== false)
	{
		$ping_feedburner = curl_init();
		$url = 'http://feedburner.google.com/fb/a/pingSubmit?bloglink='.urlencode($blogrss);
		$header = array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
		curl_setopt($ping_feedburner, CURLOPT_URL, $url);
		curl_setopt($ping_feedburner, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ping_feedburner, CURLOPT_TIMEOUT, 10);
		curl_setopt($ping_feedburner, CURLOPT_HTTPHEADER, $header);
		curl_multi_add_handle($curl_mh, $ping_feedburner);
	}

	if (!empty($custom))
	{
		$ping_custom[] = array();
		foreach ($custom as $key => $value)
		{
			$value = trim($value);
			if (empty($value))
				continue;

			$ping_custom[$key] = curl_init();
			$url = $value;
			$header = array('Content-Type: text/xml; charset=UTF-8', 'User-Agent: Emlog Ping Plugin/2.3');
			curl_setopt($ping_custom[$key], CURLOPT_URL, $url);
			curl_setopt($ping_custom[$key], CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ping_custom[$key], CURLOPT_TIMEOUT, 10);
			curl_setopt($ping_custom[$key], CURLOPT_HTTPHEADER, $header);
			curl_setopt($ping_custom[$key], CURLOPT_POST, 1);
			curl_setopt($ping_custom[$key], CURLOPT_POSTFIELDS, $xml_rpc_data);
			curl_multi_add_handle($curl_mh, $ping_custom[$key]);
		}
	}

	$curl_multi_flag = 1;
	while ($curl_multi_flag)
		curl_multi_exec($curl_mh, $curl_multi_flag);

	$history .= "|{$blogid}|";
	ping_putconfig('ping_history', $history);
}
addAction('save_log', 'ping');

function ping_loginfo($blogid)
{
	$db = MySql::getInstance();
	$sql = 'SELECT * FROM '.DB_PREFIX.'blog where gid = '.$blogid;
	$query = $db->query($sql);
	$result = $db->fetch_array($query);
	return $result;
}

function ping_update()
{
	if (file_exists(EMLOG_ROOT.'/config.yaml'))
		return false;

	if (!extension_loaded('curl'))
		return false;

	$lastupdate = ping_getconfig('ping_lastupdate');
	if (time() - $lastupdate > 86400) {
		$ch = curl_init();
		$url = 'http://vsean.net/update/check.php?plugin=ping&version=2.3&source='.urlencode(BLOG_URL);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Emlog Ping Plugin/2.3');
		$lastversion = curl_exec($ch);
		curl_close($ch);

		ping_putconfig('ping_lastupdate', time());
		if (!empty($lastversion))
			ping_putconfig('ping_lastversion', $lastversion);
	}

	$lastversion = ping_getconfig('ping_lastversion');
	if ($lastversion > 2.3)
		return $lastversion;
	else
		return false;
}

function ping_getconfig($name)
{
	$filelist = glob(dirname(__FILE__).'/'.$name.'_*.conf');
	if (empty($filelist))
		return '';

	$filepath = $filelist[0];
	return file_get_contents($filepath);
}

function ping_putconfig($name, $value = '')
{
	$filelist = glob(dirname(__FILE__).'/'.$name.'_*.conf');
	if (empty($filelist))
		$filepath = dirname(__FILE__).'/'.$name.'_'.getRandStr(6, FALSE).'.conf';
	else
		$filepath = $filelist[0];

	if (file_put_contents($filepath, $value) === false)
		emMsg('保存设置失败，请检查插件是否有权限写入 '.$filepath.' 文件');
}
?>
