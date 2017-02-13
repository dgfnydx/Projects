$(function() {
	 $(".z-btn span").bind("touchstart", function() {
    	$(this).css({"background" : "#ffa851", "color": "#fff"})
    })
	 $(".z-btn span").bind("touchend", function() {
    	$(this).css({"background" : "#fff", "color": "#000"})
    })
    var City = ["全部","北京", "上海"]
    for(var i = 0; i < City.length; i++) {
          $(".z-city div").append("<span class='z-sel-city'>" + City[i] + "</span>")
    }
    $(".z-city div span").eq(0).css({"color" : "#fff", "background" : "#ff9f40"});
    var Zarea = [['全部','东城区','西城区','崇文区','宣武区','朝阳区','丰台区','石景山区','海淀区','门头沟区','房山区','通州区','顺义区','昌平区','大兴区','怀柔区','平谷区','密云县','延庆县'],['全部','东城区','西城区','崇文区','宣武区','朝阳区','丰台区','石景山区','海淀区','门头沟区','房山区','通州区','顺义区','昌平区','大兴区','怀柔区','平谷区','密云县','延庆县'],['全部','黄浦区','徐汇区','长宁区','静安区','普陀区','虹口区','杨浦区','闵行区','宝山区','嘉定区','浦东新区','金山区','松江区','青浦区','奉贤区','崇明县']];
    $(".z-city div ").delegate("span[class = 'z-sel-city']","tap", function() {
         $(".z-area div").html("")
        $(this).css({"background" : "#ff9f40", "color" : "#fff"}).siblings().css({"background" : "#e9e9e9", "color" : "#757575"});
        for(var i = 0; i < Zarea[$(this).index()].length; i++) {
        $(".z-area div").append("<span>" + Zarea[$(this).index()][i] + "</span>")
        }
         $(".select-box section div span").tap(function() {
            $(this).css({"background" : "#ff9f40", "color" : "#fff"}).siblings().css({"background" : "#e9e9e9", "color" : "#757575"})
        })
    })
    for(var i = 0; i < Zarea[0].length; i++) {
        $(".z-area div").append("<span>" + Zarea[0][i] + "</span>")
    }
    $(".z-area div span").eq(0).css({"color" : "#fff", "background" : "#ff9f40"});
    $(".z-area div span, .z-hous span").tap(function() {
        $(this).css({"background" : "#ff9f40", "color" : "#fff"}).siblings().css({"background" : "#e9e9e9", "color" : "#757575"})
    })
    // 工地直播菜单切换
    $(".z-live-header span").tap(function(event) {
        $(".mask").show();
        $('html').toggleClass('alpha');
        $(this).css({"color" : "#ff9f40"}).siblings().css({"color" : "#4d4d4d"});
        $(this).children("i").css({"background" : "url('../images/tip2.png') center center no-repeat", "background-size" : "100%","-webkit-transform" : "rotate(0deg)"}).parent().siblings().children("i").css({"background" : "url('../images/tip1.png') center center no-repeat", "background-size" : "100%","-webkit-transform" : "rotate(180deg)"});
        $(".z-selected div").eq($(this).index()).show().siblings().hide();
    })
    // 点击确定
    $(".z-live-btn").tap(function() {
        $(".z-ranking, .mask").hide();
        $('html').toggleClass('alpha');
        $(".z-live-header span").css({"color" : "#4d4d4d"}).children("i").css({"background" : "url('../images/tip2.png') center center no-repeat", "background-size" : "100%","-webkit-transform" : "rotate(180deg)"}).parent().siblings().children("i").css({"background" : "url('../images/tip1.png') center center no-repeat", "background-size" : "100%","-webkit-transform" : "rotate(0deg)"});
    })
    $(".z-selected ul li").tap(function() {
        $(this).css({"color" : "#ff9f40"}).siblings().css({"color" : "#4d4d4d"})
        $(".z-selected>div, .mask").hide();
        $('html').toggleClass('alpha');
        $(".z-live-header span").css({"color" : "#4d4d4d"}).children("i").css({"background" : "url('../images/tip2.png') center center no-repeat", "background-size" : "100%","-webkit-transform" : "rotate(0deg)"}).parent().siblings().children("i").css({"background" : "url('../images/tip1.png') center center no-repeat", "background-size" : "100%"});
    })
    // 页面到底部自动加载
    var _h = $(window).height();
    $(window).scroll(function(){
      var fh = $(".footer").scrollTop();
    　　var scrollTop = $(this).scrollTop(),
            scrollHeight = $(document).height(),
            windowHeight = $(this).height();
        if (scrollTop>_h){  
            $("#scrolltop").show();  
        }else{  
            $("#scrolltop").hide();  
        }
    });
    $(window).scroll(function(event) {
        /* Act on the event */
        var scrollTop = $(this).scrollTop() , scrollHeight = $(document).height(),windowHeight = $(this).height();
        if(scrollHeight < 15000) {
            if(scrollTop + windowHeight >= scrollHeight-50) {
                // $("#pulladd").hide();
                $("#addmore").show();
                $.ajax({
                    url: 'ajaxRequestData/cool.html',
                    type: 'get',
                    success: function(data) {
                        for(var i = 0; i < 2; i++){
                            $(".z-live-cont").append(data);
                        }
                    }
                });
            }
        } else {
             $("#addmore").hide();
        }
    })
    // 写评论
    $(".z-write").tap(function() {
        $(".z-write-com").show();
        $(".z-sy-footer").hide();
    })
    // 点击发布
     $(".z-btn-yes").tap(function() {
        if($(".z-write-com textarea").val() == "") {
            $(".z-write-com i").html("内容不能为空");
             $(".z-write-com").show();
        } else {
            $(".z-write-com").hide().children('i').html("");
            $(".z-write-com strong em").html(500);
            $(".z-say-main").append("<dl class='z-says clearfix'><dt><a href='#'><img src='../images/says_03.png' alt=''></a></dt><dd><h3>马雪阳<em>36F</em></h3><p>"+$('.z-textarea').val()+"</p><span>刚刚<i></i><em>0</em></span></dd></dl>")
            $(".z-write-com textarea").val("");
            $(".z-sy-footer").show();
        } 
    })
    
     // 点赞
     $(".swiper-slide span").tap(function() {
        if($(this).hasClass('z-wei')){
            $(this).removeClass('z-wei').html(parseInt($(this).html())-1).css({"backgroundColor" : "#ffa851"});
            yougood = false;
        } else {
            $(this).addClass('z-wei').html(parseInt($(this).html())+1).css({"backgroundColor" : "#e0872e"});
             yougood = true;
        }
        
     })
     // keyup事件
     $(".z-write-com textarea").keyup(function() {
        var keynum = 500-$(this).val().length;
        console.log(keynum)
        $(".z-write-com strong em").html(keynum)
        if(keynum <= 0) {
            $(".z-write-com strong em").css({"color" : "red"})
        }
     })
     // 点击空白处消失
    $(document).bind("tap",function(e){
        var target = $(e.target);
         if(target.closest($(".z-write-com")).length == 0){
            $(".z-write-com").hide().children('textarea').val("");
            $(".z-sy-footer").show();
            $(".z-write-com i").html("");
        }
    })
    // 服务报告
     // 点赞
    $(".s-laud").tap(function() {
        if($(this).hasClass('s-top')) {
            $(this).css({"backgroundColor" : "#e89849"}).removeClass('s-top').children('em').html(parseInt($(this).children('em').html())+1)
        } else {
            $(this).css({"backgroundColor" : "#ffa751"}).addClass('s-top').children('em').html(parseInt($(this).children('em').html())-1)
        }
        
    })

})
// 事件委托
var see = $("#see");
var scc = $(".s-review ");
Top(see,"em","z-tops");
Top(scc,"i","s-tops");
function Top(name,biao,han) {
    name.click(function(ev){
    var ev = ev || window.event;
    var target = ev.target || ev.srcElement;
    if(target.nodeName.toLowerCase() == biao){
        var nums = parseInt(target.innerHTML);
           if(target.className != han ) {
                target.className = han;
                nums++;
            } else {
                 target.className = ""
                 nums--;
            }
                target.innerHTML = nums;
        }
    })
}

// 服务报告
    $(document).bind("click",function(e){
        var target = $(e.target);
         if(target.closest($(".k-write-com")).length == 0){
            $(".k-write-com").hide().children('textarea').val("");
            $(".k-sy-footer").show();
            $(".k-write-com i").html("");
        }
    })
   