<?php defined('EMLOG_ROOT') or die('本页面禁止直接访问!'); ?>
<script type="text/javascript">
	$().ready(function() {
		var warning = $('.warning, .error');
		if (warning.length > 0) {
			window.setTimeout(function() {
				warning.fadeOut('slow');
			}, 10000);
		}
	});
</script>