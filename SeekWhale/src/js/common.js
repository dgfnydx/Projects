/*
* @Author: dgfnydx
* @Date:   2017-05-04 17:45:41
* @Last Modified by:   dgfnydx
* @Last Modified time: 2017-05-04 17:50:08
*/

var common = {
	// 移动端隐藏导航
	hideNav: function() {
		$(".wrap, .navbar-nav li").click(function() {
			$("#navbar").removeClass("in")
		})
	},
	start: function() {
		this.hideNav();
	}
}
common.start()