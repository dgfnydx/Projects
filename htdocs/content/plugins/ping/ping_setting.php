<?php
!defined('EMLOG_ROOT') && exit('access deined!');

function plugin_setting_view() {
	echo '<script>$("#ping").addClass(\'sidebarsubmenu1\');</script>';
	echo '<div class=containertitle><b>索引通知 2.3</b>';
	if (isset($_GET['setting']))
		echo '<span class="actived">插件设置完成</span>';
	echo '</div><div class=line></div>';

	if (file_exists(EMLOG_ROOT.'/config.yaml'))
	{
		echo '<div class="des">对不起, 索引通知插件暂不支持在新浪SAE环境中运行 :(</div>';
		return;
	}
	else if (!extension_loaded('curl'))
	{
		echo '<div class="des">对不起, 您的主机未启用 php-curl 扩展, 无法使用此插件 :(</div>';
		return;
	}
	else if (ping_update() != false)
		echo '<div class="des">索引通知插件有更新，最新版本为 '.ping_update().'&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://vsean.net/go/ping-plugin" target="_black">点击这里查看</a></div>';
	else
		echo '<div class="des">勾选你想通知的搜索引擎，在你发表新文章后，就会自动通知他们来索引你的新文章～</div>';

	$list = ping_getconfig('ping_list');
	$custom = ping_getconfig('ping_custom');
	$custom = str_replace("\n", "\r\n", $custom);
?>
<form action="plugin.php?plugin=ping&action=setting" method="post">
	<div style="margin-left:10px;">
	<p><input type="checkbox" name="ping_bing" value="true"
	<?php if (strpos($list, 'bing') !== false)
		echo ' checked="checked"'; ?>
	/> Bing搜索 <a href="http://www.bing.com/" target="_blank">http://www.bing.com/</a></p>

	<p><input type="checkbox" name="ping_google" value="true"

	<?php if (strpos($list, 'google') !== false)
		echo ' checked="checked"'; ?>
	/> Google搜索 <a href="http://www.google.com/" target="_blank">http://www.google.com/</a></p>

	<p><input type="checkbox" name="ping_baidu" value="true"
	<?php if (strpos($list, 'baidu') !== false)
		echo ' checked="checked"'; ?>
	/> 百度搜索 <a href="http://www.baidu.com/" target="_blank">http://www.baidu.com/</a></p>

	<p><input type="checkbox" name="ping_soso" value="true"
	<?php if (strpos($list, 'soso') !== false)
		echo ' checked="checked"'; ?>
	/> 腾讯soso <a href="http://www.soso.com/" target="_blank">http://www.soso.com/</a></p>

	<p><input type="checkbox" name="ping_youdao" value="true"
	<?php if (strpos($list, 'youdao') !== false)
		echo ' checked="checked"'; ?>
	/> 有道搜索 <a href="http://www.youdao.com/" target="_blank">http://www.youdao.com/</a></p>

	<p><input type="checkbox" name="ping_feedsky" value="true"
	<?php if (strpos($list, 'feedsky') !== false)
		echo ' checked="checked"'; ?>
	/> FeedSky <a href="http://www.feedsky.com/" target="_blank">http://www.feedsky.com/</a></p>

	<p><input type="checkbox" name="ping_feedburner" value="true"
	<?php if (strpos($list, 'feedsky') !== false)
		echo ' checked="checked"'; ?>
	/> FeedBurner <a href="http://www.feedburner.com/" target="_blank">http://www.feedburner.com/</a></p>

	<p>其他要通知的搜索引擎的Ping地址（每行一个）：<br />
	<textarea name="ping_custom" style="width: 300px"><?php echo $custom; ?></textarea></p>

	<p><input type="submit" value="保存设置"  class="button"/></p>
	</div>
</form>
<?php
}

function plugin_setting() {
	$list = '';

	if ($_POST['ping_bing'] == 'true')
		$list .= 'bing';

	if ($_POST['ping_google'] == 'true')
		$list .= 'google';

	if ($_POST['ping_baidu'] == 'true')
		$list .= 'baidu';

	if ($_POST['ping_soso'] == 'true')
		$list .= 'soso';

	if ($_POST['ping_youdao'] == 'true')
		$list .= 'youdao';

	if ($_POST['ping_feedsky'] == 'true')
		$list .= 'feedsky';

	if ($_POST['ping_feedburner'] == 'true')
		$list .= 'feedburner';

	$custom = trim($_POST['ping_custom']);
	$custom = str_replace("\r", "\n", $custom);
	$custom = str_replace("\n\n", "\n", $custom);

	ping_putconfig('ping_list', $list);
	ping_putconfig('ping_custom', $custom);
}
?>
