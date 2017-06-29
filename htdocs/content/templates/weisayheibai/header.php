<?php
/*
Template Name:Weisayheibai
Description:http://www.weisay.com/制作的一款模板，移植到emlog平台。黑白经典风格
Version:2.0
Author:Kuma
Author Url:http://www.cooron.net
Sidebar Amount:1
ForEmlog:5.0.0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/hoveraccordion.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/custom.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/weisay.js"></script>
<?php doAction('index_head'); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#tab-title span').click(function(){
	jQuery(this).addClass("selected").siblings().removeClass();
	jQuery("#tab-content > ul").slideUp('1500').eq(jQuery('#tab-title span').index(this)).slideDown('1500');
});
});

$(document).ready(function() {
$('h2 a').click(function(){
myloadoriginal = this.text;
$(this).text('正在给力加载中...');
var myload = this;
setTimeout(function() { $(myload).text(myloadoriginal); }, 2011);
});
});
</script>


</script>
<!-- 图片延迟加载 -->
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/lazyload.js"></script>
<script type="text/javascript">
	$(function() {          
    	$(".article img").not("#respond_box img").lazyload({
        	placeholder:"<?php echo TEMPLATE_URL; ?>images/image-pending.gif",
            effect:"fadeIn"
          });
    	});
</script>
</head>
<body>
	
	<div id="page">
		<div id="header">
			<div class="topnav">
				<ul id="nav" class="menu">
					<?php if(ROLE == 'admin' || ROLE == 'writer'): ?>
					<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a></li>
					<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/">管理中心</a></li>
					<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
					<?php else: ?>
					<li class="menu-item"><a href="<?php echo BLOG_URL; ?>admin/">登录</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="open-follow">
                <table class="rss">
					<tr>
						<td><a href="http://mail.qq.com/cgi-bin/feed?u=<?php echo BLOG_URL; ?>rss.php" target="_blank" class="icon4" title="用QQ邮箱阅读空间订阅我的博客"></a></td>
						<td><a href="http://weibo.com/yuusenki" target="_blank" class="icon3" title="我的新浪微博"></a></td>
						<td><a href="http://t.qq.com/artmemory" target="_blank" class="icon2" title="我的腾讯微博"></a></td>
						<td><a href="<?php echo BLOG_URL; ?>rss.php" target="_blank" class="icon1" title="订阅<?php echo $blogname; ?>"></a></td>
						<td>
							<div class="search">
								<form method="get" name="keyform" id="searchform" action="<?php echo BLOG_URL; ?>index.php">
									<fieldset id="search">
										<span>
											<input value="" onclick="this.value='';" name="keyword" id="s" type="text" />
											<input name="searchsubmit" src="<?php echo TEMPLATE_URL; ?>images/gg.png" value="Go" id="searchsubmit" class="btn" type="image" />
										</span>
									</fieldset>
								</form>
							</div>
						</td>
					</tr>
				</table>
			</div>
            <div class="clear"></div>
			<div id="blogname"><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
				<div id="blogtitle"><?php echo $bloginfo; ?></div>
			</div> 
			<?php blog_navi();?>
		</div>
		<div id="roll">
			<div title="回到顶部" id="roll_top"></div>
			<div title="转到底部" id="fall"></div>
		</div>
		<div id="content">
			
		