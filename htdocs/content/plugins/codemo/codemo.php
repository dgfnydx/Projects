<?php
/*
Plugin Name: 代码演示[Codemo]
Version: 2.0
Plugin URL: http://www.ewceo.com/codemo.html
Description:网页前端代码(HTML/CSS/JS)演示，将代码单独贴出并可演示
ForEmlog:5.x
Author:	尔今
Author Email: erx@qq.com
Author URL: http://www.ewceo.com
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function codemo_bar(){
	echo '<a href="javascript:displayToggle(\'codemo_bar\', 0);" class="show_advset">添加代码</a>';
	if(!empty($_GET['gid'])){
		$id = intval($_GET['gid']);
		$db = MySql::getInstance();
		$addto = $db -> query("SELECT * FROM `".DB_PREFIX."blog` WHERE `gid` = '".$id."' ");
		$rows = $db -> fetch_array($addto);
		echo '<div id="codemo_bar" style="display: none;"><textarea id="xycodearea" name="xycode" placeholder="输入要演示的代码" style="width:838px;height:260px;margin:5px 0;border:2px #2A9DDB solid;">'.$rows['xycode'].'</textarea><br /><a href="http://www.ewceo.com/codemo.html" target="_blank">使用说明</a></div>';
	}else{
		echo '<div id="codemo_bar" style="display: none;"><textarea id="xycodearea" name="xycode" placeholder="输入要演示的代码" style="width:838px;height:260px;margin:5px 0;border:2px #2A9DDB solid;"></textarea><br /><a href="http://www.ewceo.com/codemo.html" target="_blank">使用说明</a></div>';
	}
 }
addAction('adm_writelog_head', 'codemo_bar');
?>
<?php
function codemo_add($blogid){
	$codetext=addslashes($_POST['xycode']);
	$db = MySql::getInstance();
	$db->query("UPDATE `".DB_PREFIX."blog` SET  `xycode` =  '".$codetext."'  WHERE  `gid` = '".$blogid."' ");
}
addAction('save_log','codemo_add');
?>
<?php 
function codemo_show($data){
    if(!isset($data['logid'])){
        return;
    }
	$db = MySql::getInstance();
	$sql="SELECT * FROM `".DB_PREFIX."blog` WHERE `gid` = '{$data['logid']}' ";
	$addto = $db -> query("SELECT * FROM `".DB_PREFIX."blog` WHERE `gid` = '{$data['logid']}' ");
	$row = $db -> fetch_array($addto);
	if($row['xycode']==''){
	}else{
		echo <<<html
<style type="text/css">
.xycodeshow{position:relative;margin:3px auto;clear:both}
.xycodeshow b{font-size:12px;line-height:1.7;}
.xycodeshow input{color:#FFF;font-weight:bold;margin:0 8px 5px 0;padding:5px 10px;border:0;background:#4899E0;cursor:pointer}
.xycodeshow input:hover{background:#368DD9}
.xycodearea{width:98%;height:150px;line-height:1.7;margin-bottom:8px;font-size:12px;padding:1%}
.xyaddht{height:550px;}
.xycopytip{color:#98D020;font-size:12px}
.xycodeshow input.nocopy{background:#999}
.xyped{display:none;position:absolute;bottom:12px;right:5px;color:#DDD;font-size:10px;font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;}
.xyped a{color:#DDD}
</style>
<div class="xycodeshow"><b>以下为全部代码：</b><br /><textarea id="xycodearea" class="xycodearea">{$row['xycode']}</textarea>
<input type="button" onclick="runEx('xycodearea')" value="运行代码" id="view" />
<input type="button" value="展开代码" id="open9" />
<input type="button" value="复制代码" id="xycopy" data-clipboard-target="xycodearea" />
<span class="xycopytip"></span>
<span class="xyped">Plugins by <a href="http://www.ewceo.com/codemo.html" target="_blank">ewCEO.com</a></span>
</div>
<script>!window.jQuery && document.writeln('<script type="text/javascript" src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"><\/script>');</script>
<script type="text/javascript">
function runEx(cod1)  {
	 cod=document.getElementById(cod1)
	  var code=cod.value;
	  if (code!=""){
		  var newwin=window.open('','','');  
		  newwin.opener = null 
		  newwin.document.write(code);  
		  newwin.document.close();
	}
}
document.writeln('<script type="text/javascript" src="../content/plugins/codemo/ZeroClipboard.min.js"><\/script>');
$(function(){
	var xybestfocus = $("#xycodearea").offset().top;
	$("#open9").click(function(){
		$("#xycodearea").toggleClass("xyaddht");
		$("html,body").animate({ scrollTop : xybestfocus-23}, 500);
		if("收起代码" == $("#open9")[0].value){
			$("#open9")[0].value = "展开代码";
			$(".xyped").hide();
		}else{
			$("#open9")[0].value = "收起代码";
			$(".xyped").show();
		}
	});
var clip = new ZeroClipboard($("#xycopy"), {
  moviePath: "../content/plugins/codemo/ZeroClipboard.swf"
});
clip.on('noFlash', function (client) {
  $("#xycopy").addClass("nocopy");
  debugstr("很遗憾，无法一键复制！浏览器没有安装Flash插件");
});
clip.on('wrongFlash', function (client, args) {
  $("#xycopy").addClass("nocopy");
  debugstr("抱歉，无法一键复制！浏览器Flash插件版本低于10.0.0");
});
clip.on('complete', function (client, args) {
  debugstr("复制成功！");
});
function debugstr(text){
  $(".xycopytip").text(text);
}
})
</script>
html;
	}
}
addAction('log_related', 'codemo_show');