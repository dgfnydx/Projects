<footer>
<?php if(_g(footer_link)==1)bottom_link(); ?>
	<div class="footer-bottom">
		<p>Copyright @ <?php echo date('Y')?> <a href="<?php echo $blogurl; ?>" target=_blank><?php echo $blogname; ?></a>. All rights reserved.<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a></p> 
		<p>Powered by <a href="http://www.emlog.net" title="采用emlog系统" target="_blank">emlog</a> Theme by 仿IT技术宅</p>
		<p>个人网站免责声明：本站內容出自原创和来源互联网, 如有侵权烦请告知,将在第一时间处理。 </p>
	</div>
</footer>
<?php doAction('index_footer'); ?>
<script>
	prettyPrint();
</script>
</body></html>