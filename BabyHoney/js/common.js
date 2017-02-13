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
// 返回顶部
$(function() {
	// 显示隐藏gototop模块
	function disblok() {
		var top = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
		if(top >= 150) {
			$(".to-top").css({"display": "block"})
		} else {
			$(".to-top").css({"display": "none"})
		}
	}
	// 函数调用
	$(window).scroll(function() {
		disblok();
	})
	// 回到顶部
	var timer = null;
	function toTop() {
		var top = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
		clearTimeout(timer);
		window.scrollBy(0, -100);
		timer = setTimeout(toTop, 10);
		if(top == 0) {
			clearTimeout(timer);
		}
	}
	// 函数调用
	$(".to-top").tap(function() {
		toTop()
	})
})

// 全站弹窗
$(function() {
	var global = true;
	$(".more, .order").tap(function() {
		if(global) {
			$.ajax({
		        url: "ajaxRequestData/cpm.html",
		        type: "get",
		        success: function(data) {
		            $(".global").html(data);
		            hide()
		        },
		        error: function() {
		            // 此处添加未请求成功后要执行的事件
		            alert("加载失败！")
		        }
		    })
		    global = false;
		} else {
			$(".global-cpm").css({"display": "none"});
			global = true;
		}

	})
	function hide() {
		$(".global-cpm").click(function() {
			$(this).css({"display": "none"})
		})
	}
})