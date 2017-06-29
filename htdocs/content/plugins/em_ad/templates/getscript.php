<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<div class=containertitle><b>获取广告代码</b></div>
<div class=line></div>
<div id="em_ad">
	<p><a href="?plugin=em_ad">&lt;&lt; 返回广告位管理 </a></p>
	<p><b>广告名称</b></p>
	<p><?php echo $ad['title'] ?></p>
	<p><b>所属广告位</b></p>
	<p><?php isset($GLOBALS['em_ad_position'][$ad['position']]) && print $GLOBALS['em_ad_position'][$ad['position']] ?></p>	
	<p><b>广告位调用代码</b></p>
	<p>将下面的代码粘贴到博客模板中你想显示此广告位的位置即可实现自定义广告位.</p>
	<p><font color="red">如果你的模板不支持该广告位,您可以把下面的代码放到模板代码的适当的位置来实现该广告位</font></p>
	<p>
		<textarea rows="5" cols="80"><?php echo htmlentities('<script type="text/javascript" src="'.EM_AD_BLOG_PATH.'/content/plugins/em_ad/em_ad_js.php?pos='.$ad['position'].'"></script>') ?></textarea>		
	</p>	
	
	<p><b>广告独立调用代码</b></p>
	<p>将下面的代码粘贴到博客模板中的适当位置即可单独显示该广告.</p>
	<p><font color="red">请注意本方式调用的广告不会根据所属广告位的表现形式来显示.只是单纯的输出广告内容.</font></p>
	<p>
		<textarea rows="5" cols="80"><?php echo htmlentities('<script type="text/javascript" src="'.EM_AD_BLOG_PATH.'/content/plugins/em_ad/em_ad_js.php?id='.$ad['id'].'"></script>') ?></textarea>		
	</p>
</div>