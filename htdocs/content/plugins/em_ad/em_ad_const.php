<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!');
// 开启状态
define('EM_AD_STATUS_ENABLED', 0);
// 停用状态
define('EM_AD_STATUS_DISABLED', 1);

$GLOBALS['em_ad_status'] = array(
	EM_AD_STATUS_ENABLED => '启用',
	EM_AD_STATUS_DISABLED => '停用',
);

// 顶部
define('EM_AD_POS_HEADER', 1);
// 侧边栏
define('EM_AD_POS_SIDEBAR', 2);
// 底部
define('EM_AD_POS_FOOTER', 3);
// 列表顶部
define('EM_AD_POS_POSTLIST_TOP', 4);
// 对联广告
define('EM_AD_POS_COUPLET', 5);
// 关联日志广告
define('EM_AD_POS_RELATED', 6);
// 页面底部弹窗广告
define('EM_AD_POS_PAGE_BOTTOM_WINDOW', 7);
// 页面全屏广告
define('EM_AD_POS_PAGE_FLOAT', 9);
// 代码调用广告
define('EM_AD_POS_SCRIPT', 10);


$GLOBALS['em_ad_position'] = array(
	EM_AD_POS_HEADER => '页面顶部广告位',
	EM_AD_POS_SIDEBAR => '侧边栏广告位',
	EM_AD_POS_FOOTER => '页面底部广告位',
	EM_AD_POS_POSTLIST_TOP => '日志列表顶部广告位',
	EM_AD_POS_COUPLET => '对联广告位',
	EM_AD_POS_RELATED => '相关日志广告位',
	EM_AD_POS_PAGE_BOTTOM_WINDOW => '页面底部弹窗广告位',
	EM_AD_POS_SCRIPT => '代码调用广告位',
);


$GLOBALS['em_ad_position_classname'] = array(
	EM_AD_POS_HEADER => 'em_ad_header',
	EM_AD_POS_SIDEBAR => 'em_ad_sidebar',
	EM_AD_POS_FOOTER => 'em_ad_footter',
	EM_AD_POS_POSTLIST_TOP => 'em_ad_post_top',
	EM_AD_POS_COUPLET => 'em_ad_couplet',
	EM_AD_POS_RELATED => 'em_ad_replated',
	EM_AD_POS_PAGE_BOTTOM_WINDOW => 'em_ad_button_window',
	EM_AD_POS_PAGE_FLOAT => 'em_ad_page_float',
);

$GLOBALS['em_ad_position_template_name'] = array(
	EM_AD_POS_COUPLET => 'couplet',
	EM_AD_POS_PAGE_BOTTOM_WINDOW => 'bottombox',
);

$GLOBALS['em_ad_params'] = array(
	EM_AD_POS_HEADER => array(
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;.',
			'value' => ''
		),					
	),
	
	EM_AD_POS_SIDEBAR => array(
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;.',
			'value' => ''
		),					
	),
	
	EM_AD_POS_FOOTER => array(
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;',
			'value' => ''
		),					
	),	
	
	EM_AD_POS_POSTLIST_TOP => array(
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;',
			'value' => ''
		),					
	),	
	
	EM_AD_POS_RELATED => array(
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => ''
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;',
			'value' => ''
		),					
	),	
	
	EM_AD_POS_COUPLET => array(
		'margin_top' => array(
			'name' => '广告距离网页顶部的距离',
			'desc' => '单位为像素',
			'value' => '60'
		),
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => '100'
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => '360'
		),
		'page_width' => array(
			'name' => '页面宽度',
			'desc' => '单位为像素',
			'value' => '800'			
		),
		'min_screen_width' => array(
			'name' => '显示广告的最小屏幕宽度',
			'desc' => '单位为像素',
			'value' => '800'			
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下显示错误.填写方式: display:block; line-height: 18px;',
			'value' => ''
		),							
	),
	
	EM_AD_POS_PAGE_BOTTOM_WINDOW => array(
		'ad_position' => array(
			'name' => '弹窗位置',
			'desc' => '设定广告在网页底部哪个位置弹出',
			'value' => array(
				array('name' => '左', 'value' => 'left'),
				array('name' => '右', 'value' => 'right'),
			)
		),
		'width' => array(
			'name' => '广告宽度',
			'desc' => '单位为像素,留空则不限制',
			'value' => '200'
		),
		'height' => array(
			'name' => '广告高度',
			'desc' => '单位为像素,留空则不限制',
			'value' => '200'
		),
		'extra_css' => array(
			'name' => '广告位容器附加css样式',
			'desc' => '用于手动修正广告位在某些模板下的显示错位.填写方式: display:block; line-height: 18px;',
			'value' => ''
		),			
	),
);

// 缓存文件夹
define('EM_AD_CACHE_FOLDER', EM_AD_ROOT.'/cache');
// 广告图片文件夹
define('EM_AD_IMAGE_FOLDER', EM_AD_ROOT.'/image');
// 缓存文件名前缀
define('EM_AD_CACHE_PREFIX', 'em_ad_cache_');