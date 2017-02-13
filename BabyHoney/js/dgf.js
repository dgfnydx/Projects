/**
 * 
 * @authors  ()
 * @date    2016-07-12
 * @version $Id$
 */

$(function() {
	// 手机号、密码格式验证
	var telReg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
	var pswReg = /^[a-zA-Z]\w{5,12}$/;
	var tipArr = ["手机号为空或格式不正确", "密码长度6-12位 字母开头", "验证码错误", "两次密码不一致", "信息有误"];
	var val1 = false, val2 = false;
	function verMethod(whichVal, tipsText, regVal, tiptext) {
	    whichVal.blur(function() {
	        var inputVal = $(this).val()
	        if(!regVal.test(inputVal)) {
	            tipsText.css({"visibility": "visible"}).text(tipArr[tiptext]);
	            val1 = false;
	        } else {
	            tipsText.css({"visibility": "hidden"});
	            val1 = true;
	        }
	    })

	}
	// 验证手机号码
	verMethod($(".phone-num input"), $(".tips"), telReg, 0);
	// 验证密码格式
	verMethod($(".psw-num input"), $(".tips"), pswReg, 1);
	// 验证码
	function verNum(whichVal, regV, valV, n) {
		whichVal.blur(function() {
			if(regV.text().length == 0) {
				var verReg = regV.val();
			} else {	
				var verReg = regV.text();
			}
			var verVal = valV.val();
			if(verVal != verReg) {
				$(".tips").css({"visibility": "visible"}).text(tipArr[n]);
				val2 = false;
			} else {
				$(".tips").css({"visibility": "hidden"});
				val2 = true;
			}
		})
	}
	// 注册页确认密码
	verNum($(".qpsw-num input"), $(".psw-num input"), $(".qpsw-num input"), 3)
	// 登录页验证码
	verNum($(".verify-num input"), $(".verify-num span"), $(".verify-num input"), 2)
	// 激活码
	verNum($(".active-num input"), $(".active-num span"), $(".active-num input"), 2)
	
	// 登录按钮、找回密码下一步等按钮
	function enter(enterBtn, url, ca, cc) {
		var argLength = arguments.length;
		enterBtn.tap(function() {
			if(argLength == 2) {
				if(val1 && val2) {
					window.location.href = url;
					// 首页进入个人中心判断是否登录
					if(window.localStorage) {
						var ls = window.localStorage;
						ls.setItem("enter", "true")
						ls.setItem("srcs", "images/demo/head.png")
					}
				} else {
					$(".tips").css({"visibility": "visible"}).text(tipArr[4]);
				}
			} else if (argLength == 4) {
				var hasClas = ca.hasClass(cc);
				if(val1 && val2 && hasClas) {
					window.location.href = url;
					// 首页进入个人中心判断是否登录
					if(window.localStorage) {
						var ls = window.localStorage;
						ls.setItem("enter", "true")
						ls.setItem("srcs", "images/demo/head.png");//登录头像
					}
				} else {
					$(".tips").css({"visibility": "visible"}).text(tipArr[4]);
				}
			}
			
		})
	}
	//登录
	enter($(".sig-btn span"), "../cn/user_center.html")
	// 注册确认
	enter($(".reg-btn span"), "../cn/user_center.html", $(".protocol span"), "select")
	// 重置密码下一步
	enter($(".step-btn .enter-tel"), "../cn/find_password_verify.html");
	enter($(".step-btn .enter-ver"), "../cn/find_password_reset.html");
	enter($(".step-btn .enter"), "../cn/user_center.html");

	$(".man-center").tap(function() {
		if(window.localStorage) {
			var ls = window.localStorage;
			var enters = ls.getItem("enter");
			if(enters) {
				window.location.href = "../cn/user_center.html"
			} else {
				window.location.href = "../cn/signin.html"
			}
		}
	})
	// 退出登录
	$(".z-logn").tap(function() {
		if(window.localStorage) {
			var ls = window.localStorage;
			ls.removeItem("enter");//判断登录情况
			ls.removeItem("srcs");//头像
			// ls.setItem("srcs", "images/user.png")
			window.location.href = "../index.php"
		}
	})

	// 设置登录头像
	
	if(window.localStorage) {
		var ls = window.localStorage;
		var enters = ls.getItem("enter");
		var srcss = ls.getItem("srcs");
		if(enters) {
			$(".man-center img").attr("src", srcss);
		} else {
			$(".man-center img").attr("src", "images/user.png");
		}
	}
		
	

	// 装小蜜用户服务协定
	var sel = true;
	$(".protocol span").tap(function() {
		if(sel) {
			$(this).addClass("select");
			sel = false;
		} else {
			$(this).removeClass("select");
			sel = true;
		}
	})

	// 记住密码
	var select = true;
	$(".forget span").tap(function() {
		if(select) {
			$(this).addClass("selected");
			select = false;
			// 把输入信息存储到本地存储
			if(window.localStorage) {
				var ls = window.localStorage;
				ls.setItem("user", $(".phone-num input").val())
				ls.setItem("psw", $(".psw-num input").val())
				ls.setItem("className", "selected")
			}
		} else {
			$(this).removeClass("selected");
			select = true;
			// 清除本地存储的信息
			if(window.localStorage) {
				var ls = window.localStorage;
				ls.removeItem("user");
				ls.removeItem("psw");
				ls.removeItem("className");
			}
		}
	})
	
	// 获取本地存储信息给输入框设置值(记住密码)
	if(window.localStorage) {
		var ls = window.localStorage;
		var phone = ls.getItem("user");
		var psw = ls.getItem("psw");
		var classN = ls.getItem("className")
		$(".phone-num input").val(phone)
		$(".psw-num input").val(psw)
		$(".forget span").addClass(classN);
	}
	// 随机生成验证码
	var verNumArr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e",
	"f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q","r", "s",
	"t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H",
	 "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
	// 点击生成
	$(".verify-num span").tap(function() {
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
	// 页面加载时生成
	$(".verify-num span").text(randomNum())

	// 获取激活码
	var timer = null;
	var i = 5;
	function countDown() {
		i--
		$(".active-num span").text("(" + i + "s" + ")");
		if(i == 0) {

			$(".active-num span").text(randomNum());
			clearInterval(timer)
			i = 5;
		}
	}
	$(".active-num span").tap(function() {
		if(timer) {
			clearInterval(timer)
		}
		timer = setInterval(countDown, 1000)
	})
})


$(function() {
	 // 服务报告
    $(document).bind("click",function(e){
        var target = $(e.target);
         if(target.closest($(".k-write-com")).length == 0){
            $(".k-write-com").hide().children('textarea').val("");
            $(".k-sy-footer").show();
            $(".k-write-com i").html("");
        }
    })
    // 点击发布
      // 点击发布
     $(".k-write-com span").tap(function() {
        if($(".k-write-com textarea").val() == "") {
            $(".k-write-com i").html("内容不能为空");
             // $(".k-write-com").show();
        } else {
            var ktext = $(".k-write-com textarea").val();
            $(".k-write-com").hide().children('i').html("");
            $(".s-review").append("<div class='s-user'><img src='../images/s_user.jpg' /><div class='s-reply clearfix'><h2><em>贺纯元</em><em></em><span>34F</span></h2><p>"+ktext+"</p><p><em>刚刚</em><strong></strong><i>125</i></h3></div></p>")
            $(".s-amount strong").html(parseInt($(".s-amount strong").html())+1)
            $(".k-write-com textarea").val("");
            $(".k-sy-footer").show();
        } 
    })
    // 文本用字数统计
    var textNum = $(".z-textarea");
    textClick(textNum);
     function textClick(zclick) {
        zclick.keyup(function(){
        var wordNum = (500 - $(".k-write-com textarea").val().length);
        $(".k-write-com strong em").html(wordNum);
      })
    }
    $(".z-write").tap(function() {
    	if(window.localStorage) {
    		var ls = window.localStorage;
    		var enters = ls.getItem("enter");
    		if(enters) {
    			$(".k-write-com").show();
    		} else {
    			alert("您还未登录！");
    			window.location.href = "../cn/signin.html"
    		}
    	}
    })
})

// window.onbeforeunload = function()
// {
//     return "真的离开?";
// }