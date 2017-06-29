<?php
/*
Plugin Name: 友荐
Version: 1.0
Plugin URL: http://zhizhe8.net
Description: 可以在文章插入友荐，并支持去除友荐版权信息
Author: 无名智者
Author Email: kenvix@vip.qq.com
Author URL: http://zhizhe8.net
*/
!defined('EMLOG_ROOT') && exit('(109) Access deined!');

function wmzz_ujian_admin(){
echo '<div class="sidebarsubmenu" id="emlog_sinat"><a href="./plugin.php?plugin=wmzz_ujian">友荐设置</a></div>';
}

function wmzz_ujian_elog() {
echo '<div id="wmzz_ujian_sys">';
include(EMLOG_ROOT.'/content/plugins/wmzz_ujian/config.php');
if($cade == 'y') { echo '<script type="text/javascript">
jQuery(document).ready(function(){
$(\'.ujian-hook div div div a:last\').text("");
});
</script>' ;}
echo $pyj;
echo '</div>';
}

addAction('log_related','wmzz_ujian_elog');
addAction('adm_sidebar_ext','wmzz_ujian_admin');
?>