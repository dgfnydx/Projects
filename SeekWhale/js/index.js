// banner轮播
$("#myCarousel").carousel('cycle');
$(".twocode, .wechatcode").hover(function(event) {
	event.stopPropagation();
})
// 功能场景及版本介绍遮罩动画
function slideAnimation(tag, sonTag) {
	$(tag).hover(function() {
		$(this).children(sonTag).stop().slideDown(1000);
	},function() {
		$(this).children(sonTag).stop().slideUp(1000);
	})
	
}
// 功能场景
slideAnimation(".scene-img", ".scene-text");
// 版本介绍
slideAnimation(".versions", ".intr-info");
// 导航栏 下载
slideAnimation(".download", ".twocode");
$(".wechat").hover(function() {
	$(".wechatcode").stop().slideDown(500);
},function() {
	$(".wechatcode").stop().slideUp(500);
})
// 定位到申请测试表单
function anchor(btnTag, boxTag, n) {
	$(btnTag).click(function() {
	    $("body,html").animate({
	        'scrollTop': $(boxTag).offset().top - n
	    }, '1000');
	});
}
anchor(".applytest", ".versions", 0)
anchor(".func", ".scene", 60)
anchor(".top", ".wrap", 60)


// 申请测试表单验证
var inputInfo = {
	name: "",
	phone: ""
};
var names, tels;
$(".apply-form input").blur(function() {
	var nameReg = /^\s*$/g;//不能为空和空格
	var telReg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;//匹配手机号正则
	var inputVal = $(this).val();
	var whichVal = $(this).attr("name");
	if(whichVal == "name") {
		if(nameReg.test(inputVal)) {
			names = false;
			$(".tip").text("请输入您的尊称！").css({"color": "red","margin-top": "5px"});
		} else {
			$(".tip").text("")
			inputInfo["name"] = inputVal;
			names = true;
		}
	}
	if(whichVal == "phone") {
		if(!telReg.test(inputVal)) {
			tels = false;
			$(".tip").text("请输入正确的手机号！").css({"color": "red","margin-top": "5px"});
		} else {
			$(".tip").text("")
			inputInfo["phone"] = inputVal;
			tels = true;
		}
	}
	
});
// 申请测试按钮
$(".apply-btn").click(function() {
	if(names && tels) {
		$(".tip").text("")
	//	var apply = JSON.stringify(inputInfo)
	//	console.log(inputInfo)
		$.ajax({
		    url: "./admin/info.php",
		    type: "post",
		    data: {name:inputInfo.name,phone:inputInfo.phone},
		    success: function(data) {
				if(data == 2){
					$(".tip").text("已经提交过了，请稍后在试！").css({"color": "green","margin-top": "5px"});
					$(".apply-form input").val("")
				}else{
					$(".tip").text("提交成功！").css({"color": "red","margin-top": "5px"});
					$(".apply-form input").val("")
				}

		    },
		    error:function() {
		    	$(".tip").text("提交失败！").css({"color": "red","margin-top": "5px"});
		    	clean()
		    }
		    // complete: function() {
		    //     ajaxStatus = true;
		    // }
		});
		// 提交成功或失败，清除提示
		function clean() {
			setTimeout(function() {
				$(".tip").text("")
			}, 3000)
		}
	} else if(!names) {
		$(".tip").text("请输入您的尊称！").css({"color": "red","margin-top": "5px"});
	} else if(!tels) {
		$(".tip").text("请输入正确的手机号！").css({"color": "red","margin-top": "5px"});
	}
})

// 商户登入

$(".login-btn").click(function() {
	//$(".shade").show()
	//$(".login-win").show()
	location.href='http://www.eyesar.com/index.php/Lab/Login/index';
})
$(".close-btn").click(function() {
	$(".shade").hide()
	$(".login-win").hide()
})

var loginInfo = {
	user: "",
	password: "",
	value: 1
}
var users, psws;
$(".login-form input").blur(function() {
	var userReg = /^.{6,18}$/;
	var pswReg = /^[a-zA-Z0-9_]{8,15}$/;
	var inputVal = $(this).val();
	var whichVal = $(this).attr("name");
	if(whichVal == "user") {
		if(!userReg.test(inputVal)) {
			users = false;
			$(".utip").text("请输入6到18个字符或邮箱").css({"color": "red","margin-top": "5px"});
		} else {
			$(".utip").text("")
			loginInfo["user"] = inputVal;
			users = true;
			console.log(loginInfo)
		}
	}
	if(whichVal == "password") {
		if(!pswReg.test(inputVal)) {
			psws = false;
			$(".ptip").text("8-15个字符(子母数字下划线)").css({"color": "red","margin-top": "5px"});
		} else {
			$(".ptip").text("")
			loginInfo["password"] = inputVal;
			psws = true;
			console.log(loginInfo)
		}
	}
	
});
var check = true;
$("#remember").click(function() {
	
	if(check) {
		loginInfo["value"] = 0;
		check = false;
	} else {
		loginInfo["value"] = 1;
		check = true;
	}
})
$(".login-btns").click(function() {


	//if(users && psws) {
	//	$(".tip").text("")
	//	var login = JSON.stringify(loginInfo)
	//	$.ajax({
	//	    url: "./admin/login.php",
	//	    type: "post",
	//	    data: {name:loginInfo.user,pass:loginInfo.password},
	//	    success: function(data) {
	//			if(data ==2){
	//				$(".login-win h3").text("提示")
	//				$(".login-form, .login-btn").hide()
	//				$(".success").show()
    //
	//			}else{
	//				$(".login-win h3").text("用户名或密码错误！")
	//				//$(".login-form, .login-btn").hide()
	//				//$(".success").show()
	//			}
    //
	//	    },
	//	    error:function() {
	//
	//	    }
	//	    // complete: function() {
	//	    //     ajaxStatus = true;
	//	    // }
	//	});
	//	// 提交成功或失败，清除提示
	//} else if(!users) {
	//	$(".utip").text("请输入6到18个字符或邮箱").css({"color": "red","margin-top": "5px"});
	//} else if(!psws) {
	//	$(".ptip").text("8-15个字符(子母数字下划线)").css({"color": "red","margin-top": "5px"});
	//}
})
