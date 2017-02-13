$(function() {
	// 获取日期时间
	var timer = null;
	function nowTime() {
		var time = new Date();
		var hour = time.getHours();
		var minute = time.getMinutes();
		var month = time.getMonth() + 1;
		var date = time.getDate();
		var week = time.getDay();
		var weekArr = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
		$(".nowtime").text(tips(hour) + ":" + tips(minute));
		$(".week span").eq(0).text(tips(month) + "." + tips(date)).siblings().text(weekArr[week]); 
	} nowTime();
	timer = setInterval(nowTime, 50000);
	function tips(num) {
		if(num < 10) {
			return "0" + num;
		} else {
			return num;
		}
	}
	
	// 设置cookie
	function setCookie(name,value,hours){  
	    var d = new Date();
	    d.setTime(d.getTime() + hours * 3600 * 1000);
	    document.cookie = name + "=" + value + "; expires=" + d.toGMTString();
	}
	// 获取cookie
	function getCookie(name){  
	    var arr = document.cookie.split('; ');
	    for(var i = 0; i < arr.length; i++){
	        var temp = arr[i].split('=');
	        if(temp[0] == name){
	            return temp[1];
	        }
	    }
	    return '';
	}
	// 移除cookie
	// function removeCookie(name){
	//     var d = new Date();
	//     d.setTime(d.getTime() - 10000);
	//     document.cookie = name + '=1; expires=' + d.toGMTString();
	// }
	// 点击换肤
	$(".footer b").click(function() {
		var index = $(this).index();
		if(index == 1) {
			setCookie("skin", 0, 1);
		} else if(index == 2) {
			setCookie("skin", 1, 1);
		} 
		window.location.reload();
	})
	// 获取URL
	var address = window.location.href
	// 将获取的URL分割成字符串数组
	var adrsArr = address.split("/")
	// 获取字符串数组最后一个元素，即为子页面名称
	var sonPage = adrsArr.pop()
	// 引入皮肤CSS文件
	if(getCookie("skin") == 1) {
		if(sonPage == "index.html" || sonPage == "") {
			$("head").append('<link rel="stylesheet" href="css/black.css" type="text/css">');	
		} else {
			$("head").append('<link rel="stylesheet" href="../css/black.css" type="text/css">');	
		}
	} else {
		if(sonPage == "index.html" || sonPage == "") {
			$("head").append('<link rel="stylesheet" href="css/white.css" type="text/css">');	
		} else {
			$("head").append('<link rel="stylesheet" href="../css/white.css" type="text/css">');	
		}
	}

	// 切换浏览模式
	$(".select-layout span").click(function() {
		var index = $(this).index();
		if(index == 0) {
			setCookie("layout", 0, 1);
			$(".list-page").children().removeClass("course-list").addClass("course-box");
			$(".select-layout span").eq(1).css({"backgroundPosition":"-40px -40px"}).siblings().css({"backgroundPosition":"-80px 0"});
		} else if (index == 1) {
			setCookie("layout", 1, 1);
			$(".list-page").children().removeClass("course-box").addClass("course-list");
			$(".select-layout span").eq(1).css({"backgroundPosition":"0 -40px"}).siblings().css({"backgroundPosition":"-40px 0"})
		}
	})
	if(getCookie("layout") == 0) {
		$(".list-page").children().removeClass("course-list").addClass("course-box");
		$(".select-layout span").eq(1).css({"backgroundPosition":"-40px -40px"}).siblings().css({"backgroundPosition":"-80px 0"});

	} else {
		$(".list-page").children().removeClass("course-box").addClass("course-list");
		$(".select-layout span").eq(1).css({"backgroundPosition":"0 -40px"}).siblings().css({"backgroundPosition":"-40px 0"})
	}

})

