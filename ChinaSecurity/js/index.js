// 首页焦点图切换
$(function() {
	var mySwiper = new Swiper('.swiper-container',{
		autoplay : 3000,//可选选项，自动滑动
		loop : true,//可选选项，开启循环
		pagination: '.swiper-pagination',
		paginationClickable :true,
	})
})
$(function() {
	var menu = true;
	$(".menu").tap(function() {

		if(menu) {
			$(".pannel").animate({"left": "-20%"});
			$(".head, .dgf-main, .foot").animate({"left": "80%"});
			$(".pannel, .dgf-main").css({"position": "fixed"});
			menu = false;
		} else {
			$(".pannel").animate({"left": "-100%"});
			$(".head, .dgf-main, .foot").animate({"left": "0"});
			$(".pannel, .dgf-main").css({"position": "absolute"});
			menu = true;
		}
	})
})