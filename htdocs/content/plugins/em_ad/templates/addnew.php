<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<div class=containertitle><b>添加新广告</b></div>
<div class=line></div>
<div id="em_ad">
	<?php if ( ! is_writable(EM_AD_CACHE_FOLDER)):?>
	<div class="warning">警告: em_ad/image目录没有写入权限. 您将无法上传广告图片.</div>
	<?php endif;?>	
	<?php if (isset($error_msg)):?>
	<div class="error"><?php echo $error_msg ?></div>
	<?php endif;?>
	<p><a href="?plugin=em_ad">&lt;&lt; 返回广告位管理 </a></p>
	<form method="post" enctype="multipart/form-data">
	<p><b>广告名称</b></p>
	<p><input type="text" name="title"/></p>
	<p><b>广告位置</b></p>
	<p>
		<select name="position" id="position">
			<?php foreach ($GLOBALS['em_ad_position'] as $index => $position):?>
			<option value="<?php echo $index ?>"><?php echo $position ?></option>
			<?php endforeach;?>
		</select>
	</p>
	<div id="params"></div>
	<p><b>广告展示几率</b>(设定该广告在一个广告位有多个广告的情况下出现的几率)</p>
	<p>
		<select name="weight">
		<?php for ($i = 1; $i <= 10; $i++):?>
			<option value="<?php echo $i?>" <?php $i == 10 and print 'selected' ?>><?php echo $i * 10?>%</option> 
		<?php endfor;?>
		</select>
		例:设定为30%时, 该广告在其广告位的100次访问中会出现大约30次
	</p>	
	<p><b>上传广告图片/Flash</b>(支持类型：jpg,gif,png,swf. 服务器允许上传大小:<?php echo ini_get('upload_max_filesize') ?>)</p>
	<p><input type="file" name="ad_image" /></p>
	<p><b>广告内容</b>(支持html，如果您上传了广告图片下面内容将自动识别为图片上的链接地址)</p>
	<p><textarea name="content" rows="10" cols="80"></textarea></p>	
	<p><input type="submit" value="创建广告" /></p>
	</form>
</div>
<script type="text/javascript">
$().ready(function(){
	$('#position').change(function() {
		$('#params').html('正在读取广告位设置项....').load('?plugin=em_ad&do=getparam&pos='+this.value);
	});
});
</script>