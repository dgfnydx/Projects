<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<div class="containertitle2">
<a class="navi3" href="?plugin=em_ad">广告管理</a>
<a class="navi4" href="?plugin=em_ad&do=setting">广告设置</a>
<a class="navi4" href="?plugin=em_ad&do=addnew">添加广告 &gt;&gt;</a>
</div>
<form method="get">
<p>
	<input type="hidden" name="plugin" value="em_ad" />
	广告位置:
	<select name="position">
		<option value="">全部</option>
		<?php foreach ($GLOBALS['em_ad_position'] as $index => $value):?>
		<option value="<?php echo $index ?>" <?php $position == $index and print 'selected' ?>><?php echo $value ?></option>
		<?php endforeach;?>
	</select>	
	状态:
	<select name="status">
		<option value="">全部</option>
		<?php foreach ($GLOBALS['em_ad_status'] as $index => $value):?>
		<option value="<?php echo $index ?>" <?php $status == $index and print 'selected' ?>><?php echo $value ?></option>
		<?php endforeach;?>
	</select>
	<input type="submit" value="筛选结果" />
</p>
</form>
<div id="em_ad">
	<?php if ( ! is_writable(EM_AD_IMAGE_FOLDER)):?>
	<div class="warning">警告: em_ad/cache目录没有写入权限. 您将无法保存插件设置和开启广告缓存功能.</div>
	<?php endif;?>
	<table width="98%" class="item_list">
	<tr>
	<th>广告名称</th>
	<th>所在位置</th>
	<th>展现几率</th>
	<th>状态</th>
	<th>操作</th>
	</tr>
	<?php if (!empty($ads)):?>
	<?php foreach ($ads as $ad):?>
	<tr>
		<td><?php echo $ad['title'] ?></td>
		<td><?php isset ($GLOBALS['em_ad_position'][$ad['position']]) and print $GLOBALS['em_ad_position'][$ad['position']]?></td>
		<td><?php echo $ad['weight'] * 10 ?>%</td>
		<td>
			<?php if ($ad['status'] == EM_AD_STATUS_ENABLED):?>
			<font color="green"><?php echo $GLOBALS['em_ad_status'][$ad['status']] ?></font>
			<?php else:?>
			<font color="red"><?php echo $GLOBALS['em_ad_status'][$ad['status']] ?></font>
			<?php endif;?>
		</td>
		<td>
			<a href="?plugin=em_ad&do=setstatus&id=<?php echo $ad['id']?>">
			<?php if ($ad['status'] == EM_AD_STATUS_ENABLED):?>
				<?php echo $GLOBALS['em_ad_status'][EM_AD_STATUS_DISABLED] ?>
			<?php else:?>
				<?php echo $GLOBALS['em_ad_status'][EM_AD_STATUS_ENABLED] ?>
			<?php endif;?>
			</a> | 
			<a href="?plugin=em_ad&do=edit&id=<?php echo $ad['id']?>">编辑</a> | 
			<a href="?plugin=em_ad&do=delete&id=<?php echo $ad['id']?>" class="delete_button">删除</a> |
			<a href="?plugin=em_ad&do=getscript&id=<?php echo $ad['id']?>">获取调用代码</a>
		</td>
	</tr>
	<?php endforeach;?>
	<?php endif;?>
	</table>
</div>
<script>
$().ready(function() {
	$('a.delete_button').click(function() {
		if ( ! confirm('确认删除吗?')) {
			return false;
		}
	});
	$("#em_ad").addClass('sidebarsubmenu1');
});
</script>
