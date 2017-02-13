/* 
* @Author: anchen
* @Date:   2016-07-31 23:01:02
* @Last Modified by:   anchen
* @Last Modified time: 2016-08-02 21:31:09
*/

$(document).ready(function(){
    // jQuery.noConflict();
    function drag(ele) {
        var startX, startY, nowX, nowY;
            $(ele).on("touchstart",function(event) {
                event.preventDefault();
                startX = $(this).offset().left + $(this).offset().width / 2;
                startY = $(this).offset().top + $(this).offset().height / 2;
            })
            $(ele).on("touchmove", function(event) {
                event.preventDefault();
                var touchs = event.targetTouches[0];
                nowX = (touchs.clientX - startX) + "px";
                nowY = (touchs.clientY - startY) + "px";
                $(this).css({
                    "-webkit-transform" : "translateX(" + nowX + ") translateY(" + nowY + ")",
                    "transform" : "translateX(" + nowX + ") translateY(" + nowY + ")"
                });
                var pos = $(this).offset().left + $(this).offset().width / 2 > $("#sofa").offset().left + $("#sofa").offset().width / 4 && $(this).offset().left + $(this).offset().width / 2 < $("#sofa").offset().left + $("#sofa").offset().width * (3 / 4) && $(this).offset().top + $(this).offset().height / 2 > $("#sofa").offset().top + $("#sofa").offset().height / 4 && $(this).offset().top + $(this).offset().height / 2 < $("#sofa").offset().top + $("#sofa").offset().height * (3 / 4) ? true : false;
                if(pos) {
                    if(ele == "#sister") {
                        window.location.href = "langya.html";
                    } else if (ele == "#brother") {
                        window.location.href = "weimi.html";
                    } else if (ele == "#broandsis") {
                        window.location.href = "dasheng.html";
                    } else if (ele == "#mom") {
                        window.location.href = "xiangcun.html";
                    } else {
                        window.location.href = "gangjiong.html";                       
                    }
                }
            })
            $(ele).on("touchend", function(event) {
                event.preventDefault();
                nowX = 0;
                nowY = 0;
                $(this).animate({
                    "-webkit-transform" : "translateX(" + nowX + ") translateY(" + nowY + ")",
                    "transform" : "translateX(" + nowX + ") translateY(" + nowY + ")"
            },400);
            }) 
    }
    drag("#sister");
    drag("#brother");
    drag("#broandsis");
    drag("#mom");
    drag("#dad");   
});
// 随机奖品
$(function() {
    var prizeArr = ["../images/Upan.png", "../images/usb.png", "../images/television.png", "../images/logo_load.png"]
    var randomNum = Math.floor(Math.random() * 10);
    if(randomNum > 3) {
        $(".prizes div").eq(0).css({"display": "block"}).siblings().css({"display": "none"});
    } else {
        $(".prizes div").eq(1).css({"display": "block"}).children().attr("src", prizeArr[randomNum]).parent().siblings().css({"display": "none"});
    }

    // 点击确认领取按钮弹窗蒙板
    $(".tip-btn").tap(function() {
        var qqReg = /^[1-9]\d{4,8}$/,
            qqNum = $(".qq-num input").val();
        if(qqReg.test(qqNum)) {
            $(".cover").css({"display": "block"});
            $(".tips p").text("领取成功！");
        } else {
           $(".cover").css({"display": "block"});
           $(".tips p").text("QQ号错误！");
        }
        $(".jump-btn").tap(function() {
            if(qqReg.test(qqNum)) {
                window.location.href ="../cn/select.html";
            } else {
                $(".cover").css({"display": "none"});
            }
        })
    })
})