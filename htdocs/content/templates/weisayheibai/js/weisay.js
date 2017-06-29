//图片渐隐
jQuery(function () {
jQuery('.thumbnail img,.thumbnail_a img,.thumbnail_t img,.thumbnail_b img').hover(
function() {jQuery(this).fadeTo("fast", 0.5);},
function() {jQuery(this).fadeTo("fast", 1);
});
});

//顶部微博等图标渐隐
jQuery(document).ready(function(jQuery){
			jQuery('.icon1,.icon2,.icon3,.icon4,').wrapInner('<span class="hover"></span>').css('textIndent','0').each(function () {
				jQuery('span.hover').css('opacity', 0).hover(function () {
					jQuery(this).stop().fadeTo(350, 1);
				}, function () {
					jQuery(this).stop().fadeTo(350, 0);
				});
			});
});