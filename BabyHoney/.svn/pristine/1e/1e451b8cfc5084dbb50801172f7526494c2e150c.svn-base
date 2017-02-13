/* 
* @Author: anchen
* @Date:   2016-07-12 17:21:26
* @Last Modified by:   anchen
* @Last Modified time: 2016-07-18 16:48:40
*/
$(function(){
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 5000,//可选选项，自动滑动
        loop: true,
        speed: 500,
    })
});
$(function(){
    var sped = true;
    $("#nav-list>span>a").on('touchstart', function() {
        var _this = $(this);
        if(sped) {
            _this.parent().css({
            borderColor: $(this).css("background-color")
            }).siblings().css({
                borderColor: "#ffffff"
            });            
            $("#project").css({
                display: 'block'
            });
            var list = $(this).text();
            $("#pro-list").text(list);
        }
    })
});
$(function(){
    $(window).scroll(function(event) {
        /* Act on the event */
        var scrollTop = $(this).scrollTop() , scrollHeight = $(document).height(),windowHeight = $(this).height();
        if(scrollHeight < 1500) {
            if(scrollTop + windowHeight >= scrollHeight-50) {
                $("#pulladd").hide();
                $("#addmore").show();
                $.ajax({
                    url: 'ajaxRequestData/fap.html',
                    type: 'get',
                    success: function(data) {
                        for(var i = 0; i < 2; i++){
                            $("#sit-content").append(data);
                        }
                    }
                });
            }
        } else {
             $("#addmore").hide();
        }
       
    });
});
// 显示弹层
$(function() {
    $(".project-pic").hide()
    $(".project .show-picture").tap(function(event) {
        event.stopPropagation();
        $(".project-pic").show();
    })
    $(".project-pic").doubleTap(function(event) {
        event.stopPropagation();
        $(this).hide();
    })
    var textArr = ["肯尼亚摄影团火热报名团已报满尚有不多余位", "拉斯维加斯", "地中海风情", "欧美简约型"]
    $(".swiper-slide").tap(function() {
        var index = $(this).attr("data-swiper-slide-index")
        $(".project-text strong").text(textArr[index]);
        $(".project-text i").text(parseInt(index) + 1);
    })
})
