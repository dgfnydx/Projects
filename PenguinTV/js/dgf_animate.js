/**
 * 
 * @authors  ()
 * @date    2016-07-23
 * @version $Id$
 */

// 文案页
$(function() {
var logo = document.querySelector(".logo");
	var i = -1;
	var timer = null;
	function copyWrite() {
		i++
		$(".copy-write li").eq(i).animate({"opacity": 1}, 3000);
		if(i >= 8) {
			clearInterval(timer);
			rotateImg();
		}
	}
	timer = setInterval(copyWrite, 2000);
	// logo动画
	function rotateImg() {
		$(".logo").css({
			"-webkit-animation": "rotatelogo 3s linear", 
			"animation": "rotatelogo 3s linear", 
			"opacity": 1
		})
	}
	logo.addEventListener("webkitAnimationEnd", function() {
		$(".wrap-copy .next-hyq").show();
	})
});
