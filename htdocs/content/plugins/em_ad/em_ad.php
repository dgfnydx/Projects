<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');
/*
Plugin Name: EMLOG广告插件
Version: 1.0.1
Plugin URL: http://www.emlog.net/plugin/65
Description: EMLOG广告插件
Author: 朦胧之影
Author URL: http://www.emlog.net
*/

define('EM_AD_ROOT', EMLOG_ROOT.'/content/plugins/em_ad');

require_once EM_AD_ROOT.'/em_ad_const.php';
require_once EM_AD_ROOT.'/em_ad_func.php';

define('EM_AD_BLOG_PATH', BLOG_URL);

$em_ad_config_file = EM_AD_CACHE_FOLDER.'/config.php';
$em_ad_config = array('enable_cache' => 0);
if (is_file($em_ad_config_file)) {
	$em_ad_config = include $em_ad_config_file;
}

define('EM_AD_ENABLE_CACHE', $em_ad_config['enable_cache']);
unset($em_ad_config, $em_ad_config_file);

$GLOBALS['em_ad_count'] = em_ad_get_ad_count();
addAction('adm_sidebar_ext', 'advertisement_menu');
addAction('log_related', 'em_ad_post_related');
addAction('index_loglist_top', 'em_ad_post_list_top');
addAction('diff_side', 'em_ad_sidebar');
addAction('index_footer','em_ad_footer');
addAction('index_head', 'em_ad_header');
addAction('index_head_ad', 'em_ad_head');
addAction('data_prebakup', 'em_ad_add_datatable');

function em_ad_post_related() {
	if ($GLOBALS['em_ad_count'][EM_AD_POS_RELATED] > 0)
		em_ad_echo_script_url(EM_AD_POS_RELATED);
}


function em_ad_post_list_top() {
	if ($GLOBALS['em_ad_count'][EM_AD_POS_POSTLIST_TOP] > 0)
		em_ad_echo_script_url(EM_AD_POS_POSTLIST_TOP);
}


function em_ad_sidebar() {
	if ($GLOBALS['em_ad_count'][EM_AD_POS_SIDEBAR] > 0)
		em_ad_echo_script_url(EM_AD_POS_SIDEBAR);
}

function em_ad_footer() {
	if ($GLOBALS['em_ad_count'][EM_AD_POS_FOOTER] > 0)
		em_ad_echo_script_url(EM_AD_POS_FOOTER);
	if ($GLOBALS['em_ad_count'][EM_AD_POS_COUPLET] > 0)
		em_ad_echo_script_url(EM_AD_POS_COUPLET);
	if ($GLOBALS['em_ad_count'][EM_AD_POS_PAGE_BOTTOM_WINDOW] > 0)
		em_ad_echo_script_url(EM_AD_POS_PAGE_BOTTOM_WINDOW);
	if ($GLOBALS['em_ad_count'][EM_AD_POS_PAGE_FLOAT] > 0)
		em_ad_echo_script_url(EM_AD_POS_PAGE_FLOAT);
}

function em_ad_head() {
	if ($GLOBALS['em_ad_count'][EM_AD_POS_HEADER] > 0)
		em_ad_echo_script_url(EM_AD_POS_HEADER);	
}

function em_ad_header() {
	echo '<script type="text/javascript" src="'.EM_AD_BLOG_PATH.'/content/plugins/em_ad/em_ad_common.js"></script>';
}

function advertisement_menu() {
	echo '<div class="sidebarsubmenu" id="em_ad"><a href="./plugin.php?plugin=em_ad">广告管理</a></div>';
}

function em_ad_add_datatable() {
	global $tables;
	$tables[] = 'ad';
}

