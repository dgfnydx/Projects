<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
error_reporting(0);
global $CACHE;

$options_cache = $CACHE->readCache('options');

$blogname = Option::get('blogname');
$site_title = '历史今日 - 同步世界最大的百度中文文库中心资料 - '.$blogname;
$log_title = '历史今日 - 同步世界最大的百度中文文库中心资料';
$icp = Option::get('icp');
$footer_info = Option::get('footer_info');


$url='http://baike.baidu.com/app/historyontoday?bd_user=3608121197&bd_sig=c312696ea273cbf06eaf98040e335d3c&canvas_pos=search&keyword=%E5%8E%86%E5%8F%B2%E4%B8%8A%E7%9A%84%E4%BB%8A%E5%A4%A9&ie=utf-8';
//$ttjtg_cai=file_get_contents($url);

//cache_ttjtg_jin($ttjtg_cai,'ttjtg_jin');

$php_url = BLOG_URL.'content/cache/ttjtg_jin.php';

include View::getView('header');

$log_content='<div style="background-image:URL(content/plugins/ttjtg_jin/bei.png)" align="center">
<div style="height:40px; color: #FFFFFF;padding:15px;">欢迎来到'.$blogname.'历史今日中心，这里是同步世界最大的百度中文文库中心资料，完全可以满足大众。</div>
<script type="text/javascript">
document.writeln("<iframe  frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" border=\"0\" scrolling=\"no\" height=\"540\" width=\"560\" src=\"'.$url.'\" ></iframe>");</script >
</div>';
?>

<?php include View::getView('page');?>