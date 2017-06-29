<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
'logo' => array(
'type' => 'image',
'name' => '导航圆形头像',
'values' => array(TEMPLATE_URL . 'image/logo.png',),
'description' => '站点左侧头像，建议png格式，大小长方形。不能上传请手动ftp',
	),
'bgopen' => array(
'type' => 'radio',
'name' => '开启背景图片',
'values' => array(
'1' => '开启',
'0' => '关闭',
),
'default' => '1',
),
'bgtime' => array(
		'type' => 'text',
		'name' => '背景图片切换时间 (单位/秒)',
		'description' => '图片切换时间，默认10秒',
		'default' => '10',
	),
'bg1' => array(
'type' => 'image',
'name' => '背景图片1',
'values' => array(TEMPLATE_URL . 'image/bg/010.jpg',),
'description' => '建议1080p以适应高分屏幕',
	),
'bg2' => array(
'type' => 'image',
'name' => '背景图片2',
'values' => array(TEMPLATE_URL . 'image/bg/009.jpg',),
'description' => '建议1080p以适应高分屏幕',
	),
'bg3' => array(
'type' => 'image',
'name' => '背景图片3',
'values' => array(TEMPLATE_URL . 'image/bg/008.jpg',),
'description' => '建议1080p以适应高分屏幕',
	),
'bg4' => array(
'type' => 'image',
'name' => '背景图片4',
'values' => array(TEMPLATE_URL . 'image/bg/007.jpg',),
'description' => '建议1080p以适应高分屏幕',
	),
'bg5' => array(
'type' => 'image',
'name' => '背景图片5',
'values' => array(TEMPLATE_URL . 'image/bg/006.jpg',),
'description' => '建议1080p以适应高分屏幕',
	),
'topsousuo' => array(
'type' => 'radio',
'name' => '设置顶部搜索框',
'values' => array(
'1' => '显示',
'0' => '隐藏',
),
'default' => '1',
),
'banquan' => array(
'type' => 'radio',
'name' => '设置文章页版权信息',
'values' => array(
'1' => '显示',
'0' => '隐藏',
),
'default' => '1',
),
'xiangguan' => array(
'type' => 'radio',
'name' => '设置文章页相关文章',
'values' => array(
'1' => '显示',
'0' => '隐藏',
),
'default' => '1',
),
'phone_sort' => array(
'type' => 'radio',
'name' => '移动端导航菜单显示文章分类',
'values' => array(
'1' => '显示',
'0' => '隐藏',
),
'default' => '1',
),
'footer_link' => array(
'type' => 'radio',
'name' => '底部友情链接',
'values' => array(
'1' => '显示',
'0' => '隐藏',
),
'default' => '1',
),
);

