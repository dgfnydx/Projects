<?php
/*
Plugin Name: 关闭博客
Version: 1.1
Plugin URL: http://www.emlog.net/plugin/86
Description: 启用插件后将禁止任何人访问博客前台（管理员可正常访问）。
Author: Amanda
Author Email: lzuhzy@126.com
Author URL: http://www.lzuhzy.com
*/

!defined('EMLOG_ROOT') && exit('access deined!');

require_once (EMLOG_ROOT . "/content/plugins/closed/closed_config.php");

function closed() {//自定义函数
if (CLOSED_YN == "Y") {
	if (ROLE == 'visitor'): 
		emMsg(CLOSED_BE);//显示closed_config.php里面的CLOSED_BE信息
	endif;
	}
}

function m_closed() {//手机版
if (CLOSED_YN == "Y") {
    if (MCLOSED_YN == "N") {
	if (ROLE == 'visitor'):
		emMsg(CLOSED_BE);//显示closed_config.php里面的CLOSED_BE信息
	endif;
	}
    }
}

function closed_menu() {//后台插件侧边栏菜单
	echo '<div class="sidebarsubmenu" id="closed"><a href="./plugin.php?plugin=closed">关闭博客</a></div>';
}

addAction('index_head', 'closed');
addAction('index_mhead', 'm_closed');
addAction('adm_sidebar_ext', 'closed_menu');
?>
