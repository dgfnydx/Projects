<?php
!defined('EMLOG_ROOT') && exit('Access deined!');

function plugin_setting()
{
    $dw = isset($_POST['istyle']) ? trim($_POST['istyle']) : '';
	$cad = isset($_POST['cad']) ? trim($_POST['cad']) : '';
$str='<?php $pyj=\''.$dw.'\'; $cade=\''.$cad.'\'; ?>';
$file = fopen(EMLOG_ROOT.'/content/plugins/wmzz_ujian/config.php','w');
fwrite($file,$str);
fclose($file);
}

function plugin_setting_view() {
if (isset($_GET['setting'])) {
        echo '<span class="actived">设置完成！</span>';
    }
    else if (isset($_GET['error'])) {
        echo '<span class="error">更改设置失败：系统错误</span>';
    }
	
include(EMLOG_ROOT.'/content/plugins/wmzz_ujian/config.php') ;
?>
<div class="containertitle"><b>友荐 - 设置</b>
<br/><form action="plugin.php?plugin=wmzz_ujian&action=setting" method="post"><br/>
<h3>插入 友荐 代码</h3>
请输入您获得的友荐代码　　　　　　<a href="http://www.ujian.cc/getcode/widget" target="_blank" title="从友荐官方获得代码">获取代码</a>
<br/><br/>
<textarea name="istyle" id="istyle" style="width:510px;height:200px"><?php echo $pyj ?></textarea>
<br/><input type="checkbox" <?php if($cade == 'y') { echo 'checked="checked"' ;} ?> value="y" name="cad">去除友荐版权   [ 无名智者提供 | 需要jQuery库才能正常使用 | 警告:使用此功能导致的纠纷无名智者概不负责 ]<br/><br/>
<input type="submit" value="　提交更改　"></form>
<br/><br/><br/><code>作者：无名智者 | <a href="http://zhizhe8.net" target="_blank">访问 无名智者个人博客</code>
<?php } ?>