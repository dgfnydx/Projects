$(function() {
	// 研发资讯下拉列表
	$(".infomatic em").tap(function() {
		$(this).parent().addClass("select2").parent().siblings().children("h2").removeClass("select2");
		$(this).parent().siblings().css({"display": "block"}).parent().siblings().children("ul").css({"display": "none"});
	});
	// 双击收起列表
	function listUp(whichLab) {
		whichLab.doubleTap(function() {
			$(this).children("h2").removeClass("select2");
			$(this).children("ul").css({"display": "none"});
		})
	}
	listUp($(".infomatic"));
	listUp($(".capability"));
	// 消息推送tab切换
	$(".login-tab span").tap(function() {
		var index = $(this).index();
		$(this).parent().siblings().children("div").eq(index).removeClass("cap-select").siblings().addClass("cap-select");
		if(index == 0) {
			$(this).addClass("bac1").siblings().removeClass("bac2");
		} else if(index == 1) {
			$(this).addClass("bac2").siblings().removeClass("bac1");
		}
	})
	// 消息推送下拉列表
	$(".capability").tap(function() {
		$(this).children("h2").addClass("select2").parent().siblings().children("h2").removeClass("select2");
		$(this).children().css({"display": "block"}).parent().siblings().children("ul").css({"display": "none"});
	});

})