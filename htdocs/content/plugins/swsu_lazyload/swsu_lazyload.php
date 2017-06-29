<?php
/*
 Plugin Name: 图片延时加载
 Version: 1.0
 Plugin URL: http://swsu.net/post-18.html
 Description: 整站图片延时加载。
 ForEmlog:5.3.x
 Author: Liangge
 Author Email: free5252@qq.com
 Author URL: http://swsu.net/
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function swsu_lazyload(){?>
<script type="text/javascript" src="<?php echo BLOG_URL;?>content/plugins/swsu_lazyload/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo BLOG_URL;?>content/plugins/swsu_lazyload/jquery.lazyload.js"></script>
<script type="text/javascript">
	var jQuery=$.noConflict();
	jQuery("img").lazyload({
		effect : "fadeIn",
		failurelimit : 10});
</script>
<?php }
addAction('index_footer', 'swsu_lazyload');