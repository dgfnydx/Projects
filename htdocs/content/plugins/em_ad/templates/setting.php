<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<div class="containertitle2">
	<a class="navi4" href="?plugin=em_ad">广告管理</a>
	<a class="navi3" href="?plugin=em_ad&do=setting">广告设置</a>
	<a class="navi4" href="?plugin=em_ad&do=addnew">添加广告 &gt;&gt;</a>
</div>
<form method="post">
	<table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
		  <tr>
			<td width="18%" align="right">开启广告缓存：</td>
			<td width="82%">
				<input type="radio" name="enable_cache" value="1" <?php $config['enable_cache'] == 1 and print 'checked'?> />开启 
				<input type="radio" name="enable_cache" value="0" <?php $config['enable_cache'] == 0 and print 'checked'?> />关闭
				(开启广告缓存可以大幅度提高程序运行速度)
			</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">缓存文件：</td>
			<td>共计<b><?php echo $cache_count?></b>个缓存文件 <input type="checkbox" name="clean_cache" />清除所有缓存</td>
		  </tr>
		  <tr><td></td><td><input type="submit" value="保存设置" /></td></tr>
	</table>
</form>

