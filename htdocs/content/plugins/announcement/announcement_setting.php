<?php
/**
 * Plugin Name: 网站公告插件
 * Version: 1.1
 * Plugin URL: http://www.liuzp.com/plug/10.html
 * Description: 支持两种不同风格的展现形式，支持设置首页或者所有页面显示，支持多条公告显示，支持直接调用微语的数据<br />
 * Author: Liuzp
 * Author Email: root@liuzp.com
 * Author URL: http://www.liuzp.com
 */
 !defined('EMLOG_ROOT') && exit('access deined!');
 function plugin_setting_view(){
	require (EMLOG_ROOT . '/content/plugins/announcement/announcement_config.php');
	?>
	<link href="/content/plugins/announcement/style.css" type="text/css" rel="stylesheet" />
	<div class="com-hd">
		<b>网站公告插件设置</b>
		<?php
		if(isset($_GET['setting'])){
			echo "<span class='actived'>设置保存成功!</span>";
		}
		?>
	</div>
	<script>
	$(function(){
		$("#callt").click(function(){
			if($(this).is(":checked")){
				$("#announcement_content").attr("readonly", "readonly");
				$("#calltNum").removeAttr("readonly").focus();
			}else{
				$("#announcement_content").removeAttr("readonly").focus();
				$("#calltNum").attr("readonly", "readonly");
			}
		});
	});
	</script>
	<form action="plugin.php?plugin=announcement&action=setting" method="post">
		<table class="tb-set">
			<tr>
				<td align="right" width="25%"><b>展现形式：</b></td>
				<td width="75%"><span class="sel"><select name="type"><option value="1" <?php if($config["type"]=="1") echo "selected"; ?>>弹出层</option><option value="2" <?php if($config["type"]=="2") echo "selected"; ?>>底部固定</option></select></span></td>
			</tr>
			<tr>
				<td align="right"><b>显示页面：</b></td>
				<td><span class="sel"><select name="show"><option value="0" <?php if($config["show"]=="0") echo "selected"; ?>>所有页面</option><option value="1" <?php if($config["show"]=="1") echo "selected"; ?>>仅首页</option></select></span></td>
			</tr>
			<tr>
				<td align="right"><b>公告内容：</b><br />(文本框中多条可使用“####”分隔，如：测试公告1####测试公告2)</td>
				<td>
					<input type="checkbox" name="callt" id="callt" value="true" <?php if($config["callt"]) echo "checked"; ?> />&nbsp;是否直接调用微语数据&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="txt txt-min" id="calltNum" name="num" <?php if(!$config["callt"]) echo 'readonly'; ?> value="<?php echo $config["num"] ?>" />&nbsp;条
					<p><textarea class="txt txt-lar" id="announcement_content" name="content" <?php if($config["callt"]) echo 'readonly'; ?>><?php echo $config["content"] ?></textarea></p>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="保存" /></td>
			</tr>
		</table>
	</form>
	<?php
}

function plugin_setting(){
	$callt = $_POST["callt"]=="true"?"true":"false";
	$newConfig = '<?php
$config = array(
	"type" => "'.$_POST["type"].'",//公告展现形式1为弹出层，2为底部固定
	"show" => "'.$_POST["show"].'",//显示页面，0为所有页面，1为首页
	"callt" => '.$callt.',//是否直接调用微语数据，为true时content无效
	"num" => "'.intval($_POST["num"]).'",//调取微语条数
	"content" => "'.str_replace("\r\n", " ", str_replace('"', "'", $_POST["content"])).'"
);';
	@file_put_contents(EMLOG_ROOT.'/content/plugins/announcement/announcement_config.php', $newConfig);
}
?>