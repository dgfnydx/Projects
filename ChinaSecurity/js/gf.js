$(function() {
	// 注册、绑定页tab切换
	$(".login-tab span").tap(function() {
		var index = $(this).index();
		$(this).parent().siblings().children("div").eq(index).removeClass("login-select").siblings().addClass("login-select");
		if(index == 0) {
			$(this).addClass("bac1").siblings().removeClass("bac2");
		} else if(index == 1) {
			$(this).addClass("bac2").siblings().removeClass("bac1");
		}
	})
	// 获取期货相关信息
	$(".log-info").tap(function() {
		$(".login-cover").css({"display": "block"});
	})
	$(".login-cover").tap(function() {
		$(this).css({"display": "none"});
	})
	// 用户名正则：首字母开头，字母、数字、下划线组成的6-12位的用户名
	var userReg = /^[a-zA-Z]\w{5,12}$/;
	// 邮箱
	var mailReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	// 手机号
	var telReg = /^(13|14|15|18)\d{9}$/;
	// 密码
	var pwdReg = /^[a-zA-Z]\w{5,12}$/;
	// 资金账号
	var fundReg = /\d{6,12}$/;
	// 姓名
	var nameReg = /^[\u4e00-\u9fa5]{2,20}$/;
	// 身份证
	var idReg = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/;
	var tipsArr = ["用户名错误！", "邮箱错误！", "密码错误！",
					"两次密码不一致！", "验证码错误！","手机号错误！",
					"账号错误！", "身份证号码错误！"]
	function verMethod(whichVal, regVal, n) {
	    whichVal.blur(function() {
	        var inputVal = $(this).val()
	        if(!regVal.test(inputVal)) {
	           $(this).val(tipsArr[n]).css({"color": "red"});
	        } else {
	            $(this).css({"color": "#ccc"});
	        }
	    })
	}
	// 用户名验证
	verMethod($(".log-user input"), userReg, 0);
	// 邮箱
	verMethod($(".log-mail input"), mailReg, 1);
	// 手机号验证
	verMethod($(".log-tel input"), telReg, 5);
	// 密码
	verMethod($(".log-pwd input"), pwdReg, 2);
	// 资金账号
	verMethod($(".log-count input"), fundReg, 6);
	// 身份证
	verMethod($(".log-id input"), idReg, 7);


	// 确认密码及验证码匹配
	function verNum(whichVal, regV, n) {
		whichVal.blur(function() {
			var verVal = $(this).val();
			if(regV.text().length == 0) {
				var verReg = regV.val();
			} else {	
				var verReg = regV.text();
			}
			if(verVal != verReg) {
				$(this).val(tipsArr[n]).css({"color": "red"});
			} else {
				$(this).css({"color": "#ccc"});
			}
			
		})
	}
	// 确认密码
	verNum($(".log-qpwd input"), $(".log-pwd input"), 3);
	verNum($(".activ input"), $(".activ span"), 4);
	verNum($(".auth input"), $(".auth span"), 4);
	// 四位验证码
	var verNumArr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e",
	"f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q","r", "s",
	"t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H",
	 "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", 
	 "X", "Y", "Z"];

	 // 获取验证码
	$(".activ span").tap(function() {
		$(this).text(randomNum())
	})
	function randomNum() {
		verNumArr.sort(function() {
			return 0.5 - Math.random() ;
		})
		verNumArr.length = 4;
		var randomVal = verNumArr.join("");
		return randomVal;
	} 
	// 页面加载时生成4位随机验证码
	$(".activ span").text(randomNum());

	// 获取激活码
	var timer = null;
	var i = 5;
	function countDown() {
		i--
		$(".auth span").text("(" + i + "s" + ")");
		if(i == 0) {
			$(".auth span").text(randomNum());
			clearInterval(timer)
			i = 5;
		}
	}
	$(".auth span").tap(function() {
		if(timer) {
			clearInterval(timer)
		}
		timer = setInterval(countDown, 1000)
	})

	// 双击清除input数据
	$(".wrap input").doubleTap(function() {
		$(this).val("");
		console.log(1)
	})

	// 记住用户名？
	var memory = true;
	$(".memory b, .memory em").tap(function() {
		if(memory) {
			$(".memory b").text("√");
			memory = false;
		} else {
			$(".memory b").text("");
			memory = true;
		}
	})


})



