// if (readyState == 404) {
// 	window.location.href="http://localhost/wamp/www/loveDD2016.6.12/cn/404.php";
// };

// 导航栏背景颜色切换
function ChangeNav(clickTag, selClass) {
	this.clickTag = clickTag;//点击的标签
	this.selClass = selClass;//增删的类名
	// 获取URL
	this.address = window.location.href;
	// 将获取的URL分割成字符串数组
	this.adrsArr = this.address.split("/");
	// 获取字符串数组最后一个元素，即为子页面名称
	this.sonPage = this.adrsArr.pop();
	this.urls = pages;
	for(var i = 0; i < this.urls.length; i++) {
		if(this.sonPage == this.urls[i]) {
			this.changeClass(i)
		}
	}
	// switch (this.sonPage) {
	// 	case "index.php":
	// 	case "":
	// 		this.changeClass(0)
	// 		break;
	// 	case "production.php":
	// 		this.changeClass(1)
	// 		break;
	// 	case "individual.php":
	// 		this.changeClass(2)
	// 		break;
	// 	case "shop.php":
	// 		this.changeClass(3)
	// 		break;
	// 	case "designer-list.php":
	// 		this.changeClass(4)
	// 		break;
	// 	case "activity.php":
	// 		this.changeClass(5)
	// 		break;
	// 	default:
	// 		// changeClass(0)
	// 		$(this.clickTag).removeClass(this.selClass)
	// 		break;
	// }
}
ChangeNav.prototype.changeClass = function(n) {
	$(this.clickTag).eq(n).addClass(this.selClass).siblings().removeClass(this.selClass)
}
var pages = [
		"index.php",
		"production.php",
		"individual.php",
		"shop.php",
		"designer-list.php",
		"activity.php"
	]
new ChangeNav(".h-bottom a", "selected", pages)



var common = {
	//购物车图标
	//鼠标移入效果
	shopAni: function(aniTag) {
		$(aniTag).mouseover(function() {
			func(this, "-28px")
		})
		$(aniTag).mouseleave(function() {
			func(this, "0px")
		})
		function func(dd, leave) {
			$(dd).stop(true).animate({
				"marginTop": leave
			})
		}
	},
	run: function() {
		this.shopAni(".btn-list a")
	}
	
}
common.run()


// 购物车商品数量
function shoppingNum() {
    $(".shop-num").text($('.htl-shopc-con').size())
    // 购物车
    showNum(".shop-num");
}

// 当购物车和私信的数字大于0时显示数字
function showNum(className) {
	var num = $(className).text();
	// var letterNum = $(".letter-num").text();
	if(num > 0) {
		$(className).css({"display": "block"})
		// 当数量大于9时显示9+
		if(num > 9) {
			$(".shop-num").text("9+")
		}
	}
}
// 私信
showNum(".letter-num");


// 显示隐藏购物清单
$(".shop, .shop-num, .shop-list").mouseover(function() {
	if($(".shop-num").text() > 0) {
		$(".shop-list").css({"display": "block"})	
	}
})
$(".shop, .shop-num, .shop-list").mouseleave(function() {
	$(".shop-list").css({"display": "none"})
})
// 显示隐藏gototop模块
function disblok() {
	var top = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
	if(top >= 150) {
		$(".tool-bar").css({"display": "block"})
	} else {
		$(".tool-bar").css({"display": "none"})
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
$(".tool-bar .to-top").click(function() {
	toTop()
})

// 内容不足以撑开的页面，自动获取高度设置最小高度，常量262位头部和脚部高度和
$(window).load(function() {
	$(".main").css({"min-height": $(window).height()-280})
})
$(window).resize(function() {
	$(".main").css({"min-height": $(window).height()-280})
})
/**
* [个人中心页]
* @tab切换
*/
 $(".personal-common-item-son .tab").click(function() {
 	var index = $(this).index(".tab")
 	$(this).css({"color": "#e45845"}).siblings().css({"color": ""}).parent().siblings().children().css({"color": ""})
 	$(".personal-common-body").children(".personal-show").eq(index).css({"display": "block"}).siblings().css({"display": "none"})
 	$(".myorder-lis").css({"display": "block"}).siblings().css({"display": "none"})
 	if(index == 8) {
 		$(".personal-common-body").siblings().css({"display": "none"})
 	} else {
 		$(".personal-common-body").siblings().css({"display": "block"})
 	}
 })


// 首页——资讯分享滚动
function autoScroll() {
	$(".news-box").find("ul").animate({
		"marginTop": "-30px"
	}, 500, function() {
		$(this).css({"marginTop": "0px"}).find("li:first").appendTo(this);
	})
}
setInterval(autoScroll,3000);
 
//首页——资讯分享滚动
var indexScroll = 0;
$(".news span").eq(0).click(function(event) {
	console.log($(".news-box").scrollTop())
	if (indexScroll >= 120) {
		indexScroll = 0;
		$(".news-box").animate({	
			scrollTop: indexScroll
		},300, function() {
			/* stuff to do after animation is complete */
		});
	} else {
		indexScroll += 30;
		$(".news-box").animate({
			scrollTop: indexScroll
		},300, function() {
			/* stuff to do after animation is complete */
		});
	};
});
$(".news span").eq(1).click(function(event) {
	if (indexScroll <= 0) {
		indexScroll = 120;
		$(".news-box").animate({	
			scrollTop: indexScroll
		},300, function() {
			/* stuff to do after animation is complete */
		});
	} else {
		indexScroll -= 30;
		$(".news-box").animate({
			scrollTop: indexScroll
		},300, function() {
			/* stuff to do after animation is complete */
		});
	};
});

//首页——作品欣赏悬浮
$(".appreciate-left a").hover(function() {
	$(this).children("p").animate({
		bottom: 0
	},300, function() {
		/* stuff to do after animation is complete */
	});
}, function() {
	$(this).children("p").animate({
		bottom: "-40px"
	},300, function() {
		/* stuff to do after animation is complete */
	});
});

//首页——最新推荐
$(".include").hover(function() {
	$(this).css({
		"boxShadow": "0 0 0 1px #c5c5c5"
	})
}, function() {
	$(this).css({
		"boxShadow": "0 0 0 1px #fff"
	})
});

	// 。。。。。。。。。。陈渊荣JS结束。。。。。。。。
	// 。。。。。。。。。。陈渊荣JS结束。。。。。。。。
	// 。。。。。。。。。。陈渊荣JS结束。。。。。。。。

//。。。。。。。张飞翔js开始。。。。。。。。。
//。。。。。。。张飞翔js开始。。。。。。。。。
//。。。。。。。张飞翔js开始。。。。。。。。。

//艺术发现
$(".navs-zfx a").click(function() {
    $(this).addClass("copyright-zfx").siblings("a").removeClass("copyright-zfx")
})

// 底部翻页
$(".key-zfx span").click(function() {
    $(this).addClass("keys-zfx").siblings().removeClass("keys-zfx")
});

//。。。。。。。张飞翔js结束。。。。。。。。。
//。。。。。。。张飞翔js结束。。。。。。。。。
//。。。。。。。张飞翔js结束。。。。。。。。。

// $(".write .submit").click(function(event) {
// 	window.location.href="http://localhost/wamp/www/loveDD2016.6.12/cn";
// });



//。。。。。。。张飞翔js开始。。。。。。。。。
//。。。。。。。张飞翔js开始。。。。。。。。。
//。。。。。。。张飞翔js开始。。。。。。。。。
// 点击数量，金额随着变化
function sub(){
     document.getElementById("num-zfx").value--;
     var num = document.getElementById("num-zfx").value;
     if(num <= 1){
         document.getElementById("num-zfx").value = 1;
         num = 1;
     }
     var money = num * 153.0;
     document.getElementById("moneys-zfx").innerHTML = "￥" + money.toFixed(1);
}
function add(){
 document.getElementById("num-zfx").value++;
 var num = document.getElementById("num-zfx").value;
 var money = num * 153.0;
 document.getElementById("moneys-zfx").innerHTML = "￥" + money.toFixed(1);
};
// 尺码选择
	$(".mans-zfx span").click(function() {
		$(this).addClass("manss-zfx").css({
			"background" : "#d04836",
			"color" : "#fff"
		}).siblings().removeClass("manss-zfx").css({
			"background" : "#fff",
			"color" : "#d04836"
		});
	});

	$(".womans-zfx span").click(function() {
		$(this).addClass("womanss-zfx").css({
			"background" : "#d04836",
			"color" : "#fff"
		}).siblings().removeClass("womanss-zfx").css({
			"background" : "#fff",
			"color" : "#d04836"
		});
	});
//。。。。。。。张飞翔js结束。。。。。。。。。
//。。。。。。。张飞翔js结束。。。。。。。。。
//。。。。。。。张飞翔js结束。。。。。。。。。
