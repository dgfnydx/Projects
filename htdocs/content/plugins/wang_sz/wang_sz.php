<?php
/*
Plugin Name: 蜘蛛网随机数字
Version: 1.0
Plugin URL: http://www.a2012.com
Description: 页面添加蜘蛛网和随机数字
Author: .com
Author Email: a77q77@163.com
Author URL: http://www.a2012.com
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function wang_sz() {
	echo '<style type="text/css">#cas { position: fixed; top: 0; left: 0; z-index: -1; opacity: .8 }</style>'."\r\n";
	echo '<script type="text/javascript" src="'.BLOG_URL.'content/plugins/wang_sz/js/sztexiao.js"></script>'."\r\n";
    echo '<script type="text/javascript" src="'.BLOG_URL.'content/plugins/wang_sz/js/wang.js"></script>'."\r\n";
}

addAction('index_head', 'wang_sz');