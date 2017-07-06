/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2016-06-21 11:34:29
 * @version $Id$
 */
// 字号匹配
$(function() {
	$(window).resize(infinite);
	function infinite() {
		var htmlWidth = $("html").width();
		if(htmlWidth >= 640) {
			$("html").css({"font-size": "24px"});
		} else {
			$("html").css({"font-size": 24 / 640 * htmlWidth + "px"});
		}
	} infinite();
})
