// 文本动画
var length = $('.tlt p').length;
for(var i = 0; i < length; i++) {
    setTimeout('one(' + i + ')', i*1000);
}
function one(i) {
    $('p').eq(i).show();
    $('.tlt p').eq(i).textillate({
        //默认多文本动画
        selector: ".texts",
        // 是否循环
        loop: false,
        // 在文本被替换前做少显示时间
        minDisplayTime: 1000,
        // 在动画开始前设置延迟时间
        initialDelay: 1000,
        // 是否自动动画
        autoStart: true,
        // 文字进入之前的动画效果文字进入之前的动画效果
        inEffects: [],
        // 文字出来时动画效果文字进入之前的动画效果
        outEffects: [ 'hinge' ],
        // 进入动画设置
        in: {
            // 设置动画名称
            effect: 'fadeInLeft',
            // 每个文本的延迟时间
            delayScale: 0,
            // 每个字符之间的间隔
            delay: 150,
            // 是否同步动画
            sync: false,
            // 是否排序进入
            sequence: true,
            // 是否打乱出现
            shuffle: false,
            // 反向出现动画
            reverse: false,
            // 动画完成时会调函数
            callback: function () {}
        }
    })
}
// 点击红包出现
$(".red-cxg").on("tap", function() {
    $(".dgf-red-packet").fadeIn();
    redpack();
})

// 红包效果
function redpack() {
    var i = 0;
    var time = null;
    function cicShow() {
        // 光圈动画
        $(".cicle").eq(i).animate({"opacity": 1}, 3000)
        i++;
        if(i >= 3) {
            clearInterval(time);
            setTimeout(redPacket, 2000);
        }
    }
    time = setInterval(cicShow, 1000)
    function redPacket() {
        // 红包动画
        $(".redpacket").css({
            "-webkit-animation": "redpacket 3s linear",
            "animation": "redpacket 3s linear",
            "opacity" : 1
        })
        // 礼花飘落
        createSnow("../images/", 88);
    }
}