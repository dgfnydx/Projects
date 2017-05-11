/*
* @Author: dgfnydx
* @Date:   2017-05-04 17:45:41
* @Last Modified by:   dgfnydx
* @Last Modified time: 2017-05-11 08:44:55
*/

var common = {
	// 移动端隐藏导航
	hideNav: function() {
		$(".navbar-nav li, .about, .solution, .display, .partner, .contacts").click(function() {
			$("#navbar").removeClass("in")
		})
		$(".wrap, .navbar-nav li").on("touchmove", function() {
			$("#navbar").removeClass("in")
		})
	},
	start: function() {
		this.hideNav();
	}
}
common.start()