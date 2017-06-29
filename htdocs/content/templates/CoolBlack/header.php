<?php
/*
Template Name:CoolBlack 1.0
Description:黑的有质感
Version:1.0
Author:IT技术宅
Author Url:http://ilt.me
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="baidu-site-verification" content="MwiuHBpwFQ" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title><?php echo $site_title; ?></title>
<link rel="icon" href="content/templates/CoolBlack/image/logo.icon" type="image/x-icon">
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<link href="<?php echo TEMPLATE_URL; ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="http://apps.bdimg.com/libs/fontawesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<?php if(isset($sortName)): ?>
<link rel="canonical" href="<?php echo Url::sort($sortid);?>" />
<?php elseif(isset($logid)):?>
<link rel="canonical" href="<?php echo Url::log($logid);?>" />
<?php else:?><?php endif;?>
<script src="http://apps.bdimg.com/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<!-- <link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" /> -->

<script src="<?php echo TEMPLATE_URL; ?>js/js.js" type="text/javascript"></script>
<?php doAction('index_head'); ini_set('date.timezone','Asia/Shanghai');?>
<script src="http://api.asilu.com/cdn/jquery.js,jquery.backstretch.min.js" type="text/javascript"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8c4fcb9fc626f852f2a5015395585519";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<?php if(_g('bgopen')==1): ?>
<script type="text/javascript">
$.backstretch([
		'<?php echo _g('bg1');  ?>',
		'<?php echo _g('bg2');  ?>',
		'<?php echo _g('bg3');  ?>',
		'<?php echo _g('bg4');  ?>',
		'<?php echo _g('bg5');  ?>'
	], {
		fade : 750, 
		duration : <?php echo _g('bgtime')*1000 ?>
});
</script>
<?php endif; ?>
<div id="backtoTop" title="回到顶部" data-action="gototop" class=""><canvas id="backtoTopCanvas" width="48" height="48"></canvas><div class="per" data-percent="0"></div></div>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/gotop.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/gotop.css"/>
<header>
<nav>
<ul>
	<a href="<?php echo BLOG_URL ?>"><img src="<?php echo _g('logo'); ?>" height="60" ></a>
	<?php blog_navi(); ?>
</ul>
<div id="navigation"><i class="fa fa-list-ul"></i></div>
<div class="m_sort">
<dl>
	<span id="close_m"><i class="fa fa-times"></i></span>
	<?php m_sort(); ?>
</dl>
</div>
<div class="media_bg"></div>
</nav>
</header>
<div class="content">
	<div class="hot"><h2>最新文章：</h2>
    	<ul>
			<?php newlog(); ?>
		</ul>
		<ol>
			<li class="sli"></li>
			<li class=""></li>
			<li class=""></li>
			<li class=""></li>
			<li class=""></li>
        </ol>
		<?php if(_g('topsousuo')==1): ?>
		<form class="searchform" method="get" action="<?php echo BLOG_URL; ?>index.php">
          <input type="text" name="keyword" value="搜索" onfocus="this.value=&#39;&#39;" onblur="this.value=&#39;搜索&#39;">
        </form>
		<?php endif; ?>
	</div>
