<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<?php echo $ad_style?>
<?php echo $ad_html?>
<script>
(function() {
	function init() {
		var left_ad = document.getElementById('left_couplet');
		var right_ad = document.getElementById('right_couplet');
		if (window.screen.width < <?php echo $min_screen_width?>) {
			left_ad.style.display = 'none';
			right_ad.style.display = 'none';
			return;
		}
		var left_pos = ((window.screen.width - <?php echo $page_width?>) / 2 - <?php echo $width?>) / 2;

		left_ad.style.display = 'block';
		left_ad.style.top = document.body.scrollTop + <?php echo $margin_top ?> + 'px';
		left_ad.style.left = document.body.scrollLeft + left_pos + 'px'; 
		right_ad.style.display = 'block';
		right_ad.style.top = document.body.scrollTop + <?php echo $margin_top ?> + 'px';
		right_ad.style.left = document.body.scrollLeft + document.body.clientWidth - right_ad.offsetWidth - left_pos + 'px';
	}
	init();

	var close_ad = function () {
		document.getElementById('left_couplet').style.display = 'none';
		document.getElementById('right_couplet').style.display = 'none';
	};	
	document.getElementById('left_close').onclick = close_ad;
	document.getElementById('right_close').onclick = close_ad;
})();
</script>