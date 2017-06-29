<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="footer">
    <div class="resize">
		<div class="text_left"></div>
		<div>Copyright &copy; 2011 <?php echo $blogname; ?> All rights reserved.<?php echo $footer_info; ?> Powered by <a href="http://www.emlog.net/"  title="emlog <?php echo Option::EMLOG_VERSION;?>" rel="external">emlog</a><br/><?php doAction('index_footer'); ?>
        | Design by <a href="http://www.weisay.com/">Weisay</a> & for emlog by  <a href="http://www.cooron.net" target="_blank">Kuma</a> | <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>
		</div>
	</div>
	<div class="clear"></div>
</div>   
</div>
</body>
</html>
