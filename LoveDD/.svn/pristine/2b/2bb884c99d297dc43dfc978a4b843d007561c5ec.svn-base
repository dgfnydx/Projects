// 。。。。。。。。丁国富JS开始。。。。。
// 。。。。。。。。丁国富JS开始。。。。。
// 。。。。。。。。丁国富JS开始。。。。。
/**
* [我的订制页]
* @我的订制复选框选择
*/
 var tick = true;
 $(".del-btn b, .del-btn em").click(function() {
 	if(tick) {
 		$(".del-btn b i").css({"display": "block"});
 		tick = false;
 	} else {
 		$(".del-btn b i").css({"display": "none"});
 		tick = true;
 	}
 })
 /**
 * [我的资料页]
 * @验证是否输入用户名及其格式
 */
function datumName(whichInput) {
	$(whichInput).blur(function() {
		var useName = $(this).val().length;
		if(useName < 3) {
			$(this).parent().siblings("strong").css({"display": "block"});
		} else {
			$(this).parent().siblings("strong").css({"display": "none"});
		}
	})
}  datumName(".user-name input");
/**
* [我的资料页]
* @验证是否输入及输入邮箱格式
*/
$(".dgf-email input").blur(function() {
	var emailReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
	var emailVal = $(this).val()
	if(!emailReg.test(emailVal)) {
		$(this).parent().siblings("strong").css({"display": "block"})
	} else {
		$(this).parent().siblings("strong").css({"display": "none"})
	}
})


/**
* [我的资料页]
* @真实姓名验证
*/
$(".true-name input").blur(function() {
	var cnNameReg = /^[\u4e00-\u9fa5]{2,20}$/;
	var trueNameVal = $(this).val();
	if(!cnNameReg.test(trueNameVal)) {
		$(this).parent().siblings("strong").css({"display": "block"})
	} else {
		$(this).parent().siblings("strong").css({"display": "none"})
	}
})

/**
* [我的资料页]
* @qq号码验证
*/
$(".qq-num input").blur(function() {
	var qqNumReg = /^\d{5,10}$/;
	var qqNumVal = $(this).val();
	if(!qqNumReg.test(qqNumVal)) {
		$(this).parent().siblings("strong").css({"display": "block"})
	} else {
		$(this).parent().siblings("strong").css({"display": "none"})
	}
})

/**
* [我的资料页]
* @性别选择
*/
$(".dgf-sex span").click(function() {
	$(".dgf-sex span i").css({"display": "block"})
	$(this).siblings().children().children().css({"display": "none"})
})
/**
* [我的资料页]
* @电话号码修改
*/
var modified = true;
var nowday = null;
var original = $(".phone-num div span").text();
$(".phone-num div a").click(function() {
	if(modified) {
		$(".phone-num div span").attr("contenteditable","true").focus()
		$(this).text("(保存)")
		modified = false;
	} else {
		$(".phone-num div span").removeAttr("contenteditable");
		$(this).text("(修改)");
		modified = true;
		nowday = $(".phone-num div span").text();
		if(original != nowday) {
			$(".phone-num div em").text("待验证").css({"color": "red"});
		}
	}
})

// 我的资料-生日插件引用
$(function () { 
	$.ms_DatePicker({ 
	    YearSelector: "#sel_year", 
	    MonthSelector: "#sel_month", 
	    DaySelector: "#sel_day" 
	}); 
});
/**
* [我的资料页]
* @头像上传预览
*/
function previewImage(file) {
	var MAXWIDTH  = 260; 
	var MAXHEIGHT = 180;
	var div = document.getElementById('preview');
	if (file.files && file.files[0]) {
		div.innerHTML ='<img id=imghead>';
		var img = document.getElementById('imghead');
		img.onload = function(){
		var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
		img.width  =  rect.width;
		img.height =  rect.height;
		//img.style.marginLeft = rect.left+'px';
		img.style.marginTop = rect.top+'px';
	}
	var reader = new FileReader();
	reader.onload = function(evt){img.src = evt.target.result;}
	reader.readAsDataURL(file.files[0]);
	} else {//兼容IE
		var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
		file.select();
		var src = document.selection.createRange().text;
		div.innerHTML = '<img id=imghead>';
		var img = document.getElementById('imghead');
		img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
		var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
		status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
		div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
	}
}
function clacImgZoomParam( maxWidth, maxHeight, width, height ){
	var param = {top:0, left:0, width:width, height:height};
	if( width>maxWidth || height>maxHeight) {
		rateWidth = width / maxWidth;
		rateHeight = height / maxHeight;
		if( rateWidth > rateHeight) {
			param.width =  maxWidth;
			param.height = Math.round(height / rateWidth);
		} else {
			param.width = Math.round(width / rateHeight);
			param.height = maxHeight;
		}
	}
	param.left = Math.round((maxWidth - param.width) / 2);
	param.top = Math.round((maxHeight - param.height) / 2);
	return param;
}


/**
* [收货地址页]
* @点击创建收货地址
*/
var nodenum = false;
$(".dgf-adr b").click(function() {
	$(".dgf-add-adr").css({"display": "block"})
	nodenum = true;
})

/**
* [收货地址页]
* @点击保存收货地址
*/
$(".dgf-save-btn").click(function() {
	var numNode = $(".dgf-adr .set-num").text()
	if(nodenum && numNode <= 4) {
		$.ajax({
		    url: "ajaxRequestData/address.html",
		    type: "get",
		    success: function(data) {
		        $(".dgf-adr-lis").append(data)
		        getNodeNum()
		    },
		    error: function() {
		    	alert("加载失败！")
		    }
		})
	}
	var	writeAdr = []
	var shipMan = $(".ship-man input").val(),
		detailedAdr = $(".abd input").val(),
		dgfTel = $(".dgf-tel input").val();
	for(var i = 0; i < 4; i++) {
		writeAdr.push($("#writeadr div").eq(i).text())
	}
	$(".ship-name strong").text(shipMan);
	$(".xx-adr").text(detailedAdr)
	$(".dgf-concat strong").text(dgfTel);
	for(var j = 0; j < 4; j++) {
		$(".adr-sheet p span").eq(j).text(writeAdr[j]);	
	}
		// 点击保存后隐藏地址输入框
	$(".dgf-add-adr").css({"display": "none"})		
})

/**
* [收货地址页]
* @点击修改收货地址
*/
$(".dgf-concat span").click(function() {
	var adrArr = []
	$(".dgf-add-adr").css({"display": "block"})
	for(var i = 0; i < 7; i++) {
		adrArr.push($(".adr-sheet .show-adr").eq(i).text()) 	
	}
	$(".ship-man input").val(adrArr[0])
	for(var j = 1; j < 5; j++) {
		$("#writeadr div").eq(j - 1).text(adrArr[j])
	}
	$(".detailed-adr input").val(adrArr[5])
	$(".dgf-tel input").val(adrArr[6])
})

/**
* [收货地址页]
* @已创建收货地址个数提示
*/
function getNodeNum() {
	var nodeNum = $(".dgf-adr-lis").children(".adr-sheet").length
	$(".dgf-adr .set-num").text(nodeNum)
	return nodeNum;
}
/**
* [收货地址页]
* @收货人验证（字符长度）
*/ 
$(".ship-man input").blur(function() {
	var shipVal = $(this).val().length;
	if(shipVal < 3) {
		$(".ship-man em").css({"display": "block"}).css({"color": "red"})
	} else {
		$(".ship-man em").css({"display": "none"}).css({"color": "black"})
	}
})

/**
* [收货地址页]
* @收货人电话验证
*/ 
$(".dgf-tel input").blur(function() {
	var telReg = /^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/
	var telVal = $(".dgf-tel input").val();
	if(!telReg.test(telVal)) {
		$(".dgf-tel em").css({"display": "block"}).css({"color": "red"})
	} else {
		$(".dgf-tel em").css({"display": "none"}).css({"color": "black"})
	}
})
// 收货地址四级联动
var provArr = ["福建省","广东省"];
var cityArr = [
    ["福州市","厦门市","龙岩市"],
    ["广州市","深圳市","佛山市"],
   
]
var countyArr = [
    [
    	["鼓楼区","台江区","仓山区"],["湖里区","思明区","同安区"],["新罗区","长汀县","上杭县"]
    ],
    [
    	["番禹区","天河区","白云区"],["福田区","罗湖区","南山区"],["禅城区","南海区","顺德区"]
    ]
]
var streetArr = [
	[
		[
			["宁海路街道","华侨路街道"],
			["鳌峰街道","洋中街道"],
			["仓前街道","东升街道"]

		],
		[
			["湖里街道","殿前街道"],
			["开元街道","莲前街道"],
			["西柯镇","五显镇"]
		],
		[
			["曹溪街道","东肖街道"],
			["大同镇","新桥镇"],
			["临江镇","中都镇"]
		]
	],
	[
		[
			["东环街道","桥南街道"],
			["三元里街道","松洲街道"],
			["五山街道","员村街道"]
		],
		[
			["园岭街道","南园街道"],
			["东门街道","南湖街道"],
			["南山街道","南头街道"]
		],
		[
			["祖庙街道","石湾街道"],
			["里水镇","九江镇"],
			["陈村镇","龙江镇"]
		]
	]
]
// 点击显示列表
var writeadr = document.getElementById("writeadr")
var provinces = document.getElementById("province-lis");
var citys = document.getElementById("citys-lis");
var countys = document.getElementById("countys-lis");
var street = document.getElementById("streets-lis");
function addEle(parentEle, fullTag, n) {
    var str = "";
    for(var i = 0; i < n; i++) {
       str += fullTag;
    }
    parentEle.innerHTML = str ;   
}
addEle(provinces, "<li></li>", provArr.length)
function insertProv() {
    for(var i = 0; i < provArr.length; i++) {
        $(".province-lis li").eq(i).text(provArr[i])
    }
}
insertProv()
// 
$("#writeadr div").click(function() {
    $(this).siblings("ul").eq($(this).index()).slideToggle().siblings("ul").slideUp()
})
$(".dgf-add-adr ul li").on("click",function() {
    var proIndex = $(this).index()
    var cityNum = cityArr[$(this).index()].length;
    addEle(citys, "<li></li>", cityNum);
    $("#writeadr .prov").text($(this).text()).siblings("div").text("")
    $(this).parent().slideUp()
    if($(this).index() == $(this).index()) {
        for(var i = 0; i < cityNum  ; i++) {
            $(".citys-lis li").eq(i).text(cityArr[proIndex][i])
        }
    }
    var list = citys.getElementsByTagName("li")
    for(var j = 0; j < list.length; j++) {
        list[j].index = j
        citys.onclick = function(event) {
            var evt = event || window.event;
            var target = evt.srcElement?evt.srcElement:evt.target;
            if(target.tagName == "LI") {
                $("#writeadr .city").text(target.innerText)
                $(this).slideUp()
                var cityIndex = target.index
            }
            var countyNum = countyArr[proIndex][cityIndex].length;
            addEle(countys, "<li></li>", countyNum);
            if(target.index == target.index) {
                for(var z = 0; z < countyNum; z++) {
                    $(".countys-lis li").eq(z).text(countyArr[proIndex][cityIndex][z])
                }
            }
            var lists = countys.getElementsByTagName("li")
            for(var a = 0; a < lists.length ;a++) {
                lists[a].index = a
                countys.onclick = function(event) {
                    var evt = event || window.event;
                    // var target = evt.srcElement?evt.srcElement:evt.target;
                    if(target.tagName == "LI") {
                        $("#writeadr .county").text(target.innerText)
                        $(this).slideUp()
                        var countyIndex = target.index
                    }
                    var streetNum = streetArr[proIndex][cityIndex][countyIndex].length;
                    addEle(street, "<li></li>", streetNum);
                    if(target.index == target.index) {
                        for(var y = 0; y < streetNum; y++) {
                            $(".streets-lis li").eq(y).text(streetArr[proIndex][cityIndex][countyIndex][y])
                        }
                    }
                    street.onclick = function(event) {
                        var evt = event || window.event;
                        // var target = evt.srcElement?evt.srcElement:evt.target;
                        if(target.tagName == "LI") {
                            $("#writeadr .street").text(target.innerText)
                            $(this).slideUp()
                        }
                    }
                }
            }
        }
    }

})
/**
* [我的资料页]
* @我的家乡二级联动
*/ 
$(function() {
	var provArr = ["北京市","天津市","上海市","重庆市","河北省","山西省","内蒙古"];
	var bigArr = [
		["北京市"],
		["天津市"],
		["上海市"],
		["万州","涪陵","渝中","大渡口","江北","沙坪坝","九龙坡","双挢"],
		["石家庄","邯郸","邢台","保定","张家口","衡水"],
		["太原","大同","阳泉","长治","晋城","朔州","吕梁","忻州"],
		["呼和浩特","包头","乌海","赤峰","呼伦贝尔盟","阿拉善盟","哲里木盟"]
	]
	var city = document.getElementById("city-lis");
	var province = document.getElementById("prov-lis");
	// 动态插入li标签
	function addEle(parentEle, fullTag, n) {
	    var str = "";
	    for(var i = 0; i < n; i++) {
	       str += fullTag;
	    }
	    parentEle.innerHTML = str ;   
	}
	addEle(province, "<li></li>", provArr.length)
	// 向li中插入省份
	function insertProv() {
		for(var i = 0; i < provArr.length; i++) {
			$(".prov-lis li").eq(i).text(provArr[i])
		}
	}
	insertProv()
	// 点击下拉列表，实现下拉和收回
	$(".dgf-hometown div").click(function() {
		var index = $(this).index(".nationality, .province")
		$(this).siblings("ul").eq(index).slideToggle().siblings("ul").slideUp()
	})
	// 插入li及市区
	$(".dgf-hometown ul li").on("click",function() {
		var cityNum = bigArr[$(this).index()].length;
		addEle(city, "<li></li>", cityNum);
		$(this).parent().siblings(".nationality").children("strong").text($(this).text())
		$(this).parent().slideUp()
		if($(this).index() == $(this).index()) {
			for(var i = 0; i < cityNum	; i++) {
				$(".city-lis li").eq(i).text(bigArr[$(this).index()][i])
			}
		}
	})
	// 事件委托绑定点击事件
	city.onclick = function(event) {
		var evt = event || window.event;
		var target = evt.srcElement?evt.srcElement:evt.target;
		if(target.tagName == "LI") {
			$(this).slideUp().siblings(".province").children("strong").text(target.innerText)
		}
	}
})

// 。。。。。丁国富JS结束。。。。。
// 。。。。。丁国富JS结束。。。。。
// 。。。。。丁国富JS结束。。。。。