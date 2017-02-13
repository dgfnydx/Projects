$(function(){
	$(window).resize(infinite);
	function infinite() {
		var htmlWidth = $('html').width();
		if (htmlWidth >= 1080) {
			$("html").css({
				"font-size" : "42px"
			});
		} else {
			$("html").css({
				"font-size" :  42 / 1080 * htmlWidth + "px"
			});
		}
	}infinite();
});