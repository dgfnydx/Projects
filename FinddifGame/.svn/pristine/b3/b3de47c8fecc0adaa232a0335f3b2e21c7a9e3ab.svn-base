<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <title>找不同游戏</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <script type="text/javascript" src="js/zepto.min.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <style type="text/css">
            html, body {
                min-width: 320px;
                height: 100%;
            }
            @font-face {
                font-family: "shifan";
                font-weight: normal;
                src: local("shifan"), url("font/shifan.ttf") format("truetype");
            }
            .wrap-start, .alert-lev, .wrap-over {
                width: 100%;
                /*height: 100%;*/
                background: url("images/bac.png") 0 0 no-repeat;
                background-size: 100% 100%;
            }
            .wrap-start h1 {
                padding-top: 5.24rem;
                text-align: center;
                font-size: 3.33rem;
                font-weight: bold;
                font-family: "shifan";
            }
            .wrap-start p {
                width: 46%;
                margin: 2.67rem auto 2.76rem;
                font-size: 1.1rem;
            }
            .wrap-start span, .wrap-over a {
                display: block;
                width: 17.63%;
                height: 2.67rem;
                margin: 0 auto 5.83rem;
                border: 0.1rem solid #000;
                -webkit-border-radius: 0.24rem;
                border-radius: 0.24rem;
                line-height: 2.67rem;
                text-align: center;
                font-size: 1.1rem;
                font-weight: bold;
            }
            .game {
                display: none;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .game h1 {
                /*height: 1.81rem;*/
                height: 14.44%;
                font-family: "shifan";
            }
            .game h1 span {
                display: block;
                height: 100%;
                line-height: 300%;
                font-size: 1.39rem;
            }
            .game h1 span:nth-child(1) {
                float: left;
                width: 14.13%;
                padding-left: 8.44%;
                background: url("images/lev.png") 12% 50% no-repeat;
                background-size: 22.44% 50.24%;
            }
            .game h1 span:nth-child(2) {
                float: left;
                width: 14.13%;
                padding-left: 8.44%;
                background: url("images/time.png") 12% 50% no-repeat;
                background-size: 23.44% 52.24%;
            }
            .game h1 span:nth-child(3) {
                float: right;
                width: 27.13%;
                line-height: 253%;
            }
            .game h1 em {
                color: red;
                display: inline-block;
                height: 100%;
                /*padding-top: 2%;*/
                font-size: 2rem;
                /*line-height: 300%;*/
            }
            .game .picture {
                width: 97.97%;
                height: 100%;
                margin: 0 auto;
            }
            .picture-left {
                position: relative;
                float: left;
                width: 46.31%;
                /*height: 10.57rem;*/
                height: 78.98%;
                padding: 1.3% 1.5% 1.5% 1.3%;
                border: 1px solid green;
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
            }
            .picture-right {
                position: relative;
                float: right;
                width: 46.31%;
                /*height: 10.57rem;*/
                height: 78.98%;
                padding: 1.3% 1.5% 1.5% 1.3%;
                margin-left: 0.41%;
                border: 1px solid green;
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
            }
           .change {
                width: 100%;
                height: 100%;
                border: 1px solid green;
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
                /*background: url("images/4-1.jpg") 0 0 no-repeat;
                background-size: 100% 100%;*/
            }
            .change2 {
                width: 100%;
                height: 100%;
                border: 1px solid green;
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
                /*background: url("images/4-2.jpg") 0 0 no-repeat;
                background-size: 100% 100%;*/
            }
            .outer-left {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            .outer-right {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%; 
            }
            .picture-left span {
                display: block;
                position: absolute;
                /*top: 8%;
                left: 0%;*/
                width: 15%;
                height: 10%;
                /*border: 1px solid red;*/
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
                z-index: 333;
            }
            .picture-right span {
                display: block;
                position: absolute;
                /*top: 8%;
                left: 0%;*/
                width: 15%;
                height: 10%;
                /*border: 1px solid red;*/
                -webkit-border-radius: 0.12rem;
                border-radius: 0.12rem;
                z-index: 333;
            }
            /*过关弹窗*/
            .alert-lev {
                display: none;
                position: absolute;
                left: 0;
                top: 0;
                z-index: 666;
            }
            .alert-lev h1 {
                padding-top: 2.86rem;
                text-align: center;
                font-size: 2.33rem;
                font-weight: bold;
            }
            .alert-lev p {
                width: 100%;
                margin: 2.43rem 0 2.55rem 0;
                text-align: center;
                font-size: 1.31rem;
            }
            .alert-lev span {
                display: block;
                width: 17.63%;
                height: 2.67rem;
                margin: 0 auto 5.83rem;
                border: 0.1rem solid #000;
                -webkit-border-radius: 0.24rem;
                border-radius: 0.24rem;
                line-height: 2.67rem;
                text-align: center;
                font-size: 1.1rem;
                font-weight: bold;
            }
            .alert-lev em, .alert-lev strong {
                color: red;
                font-weight: bold;
            }
            .wrap-over {
                position: absolute;
                display: none;
                left: 0;
                top: 0;
            }
            .wrap-over h1 {
                padding-top: 4.24rem;
                text-align: center;
                font-size: 3.33rem;
            }
            .wrap-over dl {
                width: 62.67%;
                /*height: 7.43rem;*/
                margin: 1rem auto;
            }
            .wrap-over dl dt {
                float: left;
                overflow: hidden;
                width: 8.43rem;
                height: 8.43rem;
                border: 3px solid green;
                border-radius: 50%;
            }
            .wrap-over dl dt img {
                display: block;
                /*width: 13.43rem;
                height: 13.43rem;*/
                width: 100%;
                height: 100%;
                /*margin: -1rem 0 0 -1rem;*/
                /*border: 3px solid green;*/
                /*border-radius: 50%;*/
            }
            .wrap-over dl dd {
                float: right;
                width: 58.67%;
                height: 4.43rem;
            }
            .wrap-over dl h2 {
                font-size: 1.8rem;
                margin-bottom: 0.5rem;
            }
            .wrap-over dl p {
                font-size: 1.2rem;
            }
            .wrap-over a {
                margin-top: 1.48rem;
            }
            .loading {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: #eee;
                opacity: 0.8;
                z-index: 888;
            }
            .round {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 8.33rem;
                height: 8.33rem;
                margin: auto;
                border: 1px solid blue;
                border-left: 2px solid blue;
                -webkit-border-radius: 50%;
                -ms-border-radius: 50%;
                border-radius: 50%;
                color: red;
                line-height: 8.33rem;
                text-align: center;
                z-index: 999;
                -webkit-animation: circle 1s linear infinite;
                   -moz-animation: circle 1s linear infinite;
                    -ms-animation: circle 1s linear infinite;
                     -o-animation: circle 1s linear infinite;
                        animation: circle 1s linear infinite;
            }
            @-webkit-keyframes circle {
                from {
                    -webkit-transform: rotateZ(0deg);
                       -moz-transform: rotateZ(0deg);
                        -ms-transform: rotateZ(0deg);
                         -o-transform: rotateZ(0deg);
                            transform: rotateZ(0deg);
                }
                to {
                    -webkit-transform: rotateZ(360deg);
                       -moz-transform: rotateZ(360deg);
                        -ms-transform: rotateZ(360deg);
                         -o-transform: rotateZ(360deg);
                            transform: rotateZ(360deg);
                }
            }
            @media screen all (min-height: 400px) and (max-height: 450px) {
                .wrap-over dl  {
                    width: 80%;
                }
                .wrap-start h1 {
                    padding-top: 2rem;
                }
                .wrap-start p {
                    width: 46%;
                    margin: 2.67rem auto 1rem;
                    font-size: 1.1rem;
                }
                .game h1 span:nth-child(3) {
                    width: 33%;
                }
                .game h1 span {
                    line-height: 200%;
                }
                .game h1 span:nth-child(1) {
                    background: url("images/lev.png") 12% 50% no-repeat;
                    background-size: 22.44% 46.24%;
                }
                .game h1 span:nth-child(2) {
                    background: url("images/time.png") 12% 50% no-repeat;
                    background-size: 23.44% 48.24%;
                }
            }
        </style>
    </head>
    <body>
        <div class="wrap-start">
            <h1>找不同</h1>
            <p>游戏规则：在规定时间内，寻找两张类似图片中不同的部分。点击错误会被扣时2秒。</p>
            <span>开始游戏</span>
        </div>
        <div class="game">
            <h1>
                <span>1</span>
                <span>60s</span>
                <span>还有<em>5</em>处不同</span>
            </h1>
            <div class="picture clearfix" id="picture">
                <div class="picture-left">
                    <div class="change" id="changes"></div>                    
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>                   
                </div>
                <div class="picture-right">
                    <div class="change2" id="changes2"></div>                   
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>  
                </div>
            </div>
        </div>
        <!-- 过一关的弹窗 -->
        <div class="alert-lev">
            <h1>恭喜</h1>
            <p>您刚刚成功通过第<em>0</em>个关卡<br />前面还有<strong></strong>关等着你来闯哦</p>
            <span>继续闯关</span>
        </div>
        <!-- 游戏结束弹窗 -->
        <div class="wrap-over">
            <h1>游戏结束</h1>
            <dl class="clearfix">
                <dt><img src="" alt="" /></dt>
                <dd>
                    <h2></h2>
                    <p></p>
                </dd>
            </dl>           
            <a href="">再来一次</a>
        </div>
        <!-- 背景音乐 -->
        <div>
            <audio  id="music-bac" loop="true">
            <source src="video/7552.mp3" >
            </audio>
        </div>
        <!-- 点中成功配音      -->
        <div>
            <audio id="music-success">
            <source src="video/chenggong.mp3" >
            </audio>
        </div>
        <!-- 没点中失败配音      -->
        <div>
            <audio id="music-defeat">
            <source src="video/shibai.mp3" >
            </audio>
        </div>
        <div class="loading"></div>
        <div class="round" id="loading_rate">loading...</div>
    </body>
    <script type="text/javascript" src="js/touch.js"></script>
    <script type="text/javascript" src="js/event.js"></script>
    <script type="text/javascript">
        document.onreadystatechange = function() {
            if (document.readyState == "complete") {
                setTimeout(function () {
                    $('.loading, .round').hide();
                }, 500);
            };
        }
        // 屏幕强制横屏
        $(document).ready(function(){
            var bodyWidth = $(window).width();
            var bodyHeight = $(window).height();
            $(".wrap-start, .game, .alert-lev, .wrap-over, .loading").css({
                "width": bodyHeight + "px",
                "height": bodyWidth + "px",
                "-webkit-transform": "rotate(90deg) translate(" + (bodyHeight-bodyWidth)/2 + "px, " + (bodyHeight-bodyWidth)/2 + "px)",
                "-moz-transform": "rotate(90deg) translate(" + (bodyHeight-bodyWidth)/2 + "px, " + (bodyHeight-bodyWidth)/2 + "px)",
                "-ms-transform": "rotate(90deg) translate(" + (bodyHeight-bodyWidth)/2 + "px, " + (bodyHeight-bodyWidth)/2 + "px)",
                "transform": "rotate(90deg) translate(" + (bodyHeight-bodyWidth)/2 + "px, " + (bodyHeight-bodyWidth)/2 + "px)"
            })         
        });
        
        var musicBac = document.getElementById("music-bac");
        var success = document.getElementById("music-success");
        var defeat = document.getElementById("music-defeat");
        // var box = document.getElementById("picture").getElementsByTagName("span");
        var boxLeft = [
            [0, 82, 67, 56, 82], [67, 11, 53, 58, 29], [61, 58, 38, 58, 24], [3, 12, 50, 36, 71], [7, 72, 20, 5, 82],[3, 77, 64, 50, 42], [3, 56, 3, 33, 57], [62, 20, 82, 39, 13], [28, 27, 23, 82, 74], [64, 63, 66, 55, 58], [72, 9, 31, 33, 68], [36, 65, 54, 40, 65], [16, 74, 65, 42, 32], [6, 55, 51, 50, 73], [45, 75, 76, 27, 82], [19, 81, 79, 46, 82], [7, 63, 27, 13, 3], [3, 58, 27, 64, 82], [46, 27, 18, 78, 47], [37, 62, 3, 44, 82]
        ] 
        var boxTop = [
            [8, 8, 63, 57, 27], [7, 25, 38, 62, 82], [23, 41, 48, 63, 75], [43, 64, 69, 41, 67], [26, 25, 54, 67, 67], [20, 13, 47, 79, 19], [8, 4, 34, 75, 41], [21, 27, 40, 14, 60], [24, 52, 83, 65, 55], [9, 32, 43, 53, 62], [38, 72, 49, 86, 54], [33, 45, 42, 44, 87], [26, 2, 67, 45, 58], [5, 4, 60, 87, 41], [11, 24, 78, 35, 49], [44, 54, 84, 83, 31], [70, 53, 75, 84, 53], [13, 21, 52, 76, 78], [37, 32, 62, 58, 81], [5, 28, 70, 56, 61]
        ]     
        var a = 0,
            b = 1,
            c = 0,
            d = 60;
        var arr = [];
        var timer = null;
        $(".wrap-start span").tap(function() {
            musicBac.play();
            $(".game h1 span").eq(0).html("0" + b);
            $(this).parent().css({
                "display" : "none"
            })
            $(".game").css({
                "display" : "block"
            });
            timer = setInterval(showTime, 1000);
        })

        // 计时器
        function showTime() {
            d--;
            if(d <= 0) {
                musicBac.pause();
                d = 0;
                clearInterval(timer);
                $(".wrap-over").css({
                    "display" : "block"
                })
            }
            $(".game h1 span").eq(1).html(d + "s");
            var levOver = $(".alert-lev em").html();
            // 关卡设置
            if(levOver <= 2) {
                $(".wrap-over h2").html("高度近视");
                $(".wrap-over p").html("您已成功过" + levOver + "关注意保护您的眼睛哦~~~！");
                $(".wrap-over img").attr("src", "images/1.jpg");
            }
            if((2 < levOver) && (levOver <= 5)) {
                $(".wrap-over h2").html("轻微近视");
                $(".wrap-over p").html("您已成功过" + levOver + "关您有点近视了，眼神有待提高~~~！");
                $(".wrap-over img").attr("src", "images/2.jpg");
            }
            if((5 < levOver) && (levOver <= 8)) {
                $(".wrap-over h2").html("眼神利剑");
                $(".wrap-over p").html("您已成功过" + levOver + "关您有一双锐利的眼，可以发现各种不同的问题~~~！");
                $(".wrap-over img").attr("src", "images/3.jpg");
            }
            if((8 < levOver) && (levOver <= 11)) {
                $(".wrap-over h2").html("火眼金睛");
                $(".wrap-over p").html("您已成功过" + levOver + "关恭喜您练成了火眼金睛，看尽世间一切邪恶~~~！");
                $(".wrap-over img").attr("src", "images/4.jpg");
            }
            if(levOver >= 12) {
                $(".wrap-over h2").html("鹰隼之眼");
                $(".wrap-over p").html("您已成功过" + levOver + "关您的眼睛犹如苍鹰之眼，俯视世间一切~~~！");
                $(".wrap-over img").attr("src", "images/5.jpg");
            }
            if(levOver >= 16) {
                $(".wrap-over h2").html("望远镜");
                $(".wrap-over p").html("您已成功过" + levOver + "关您的眼睛比望远眼还好用，看破一切~~~！");
                $(".wrap-over img").attr("src", "images/6.jpg");
            }
        }
        // 点错扣2秒时间
        $(".change, .change2").tap(function() {
            defeat.play();
            d-=2;
            console.log(d);
        })
        // 点击不同之处显示出来，两边都可以点
        $(".picture span").tap(function() {
            success.play();
            // 随机数去重
            var index = $(this).index();
            arr.push(index);
            for(var i = 0; i < arr.length; i++) {
                for(var j = 0; j < i; j++) {                   
                    if(arr[i]== arr[j]) {
                        arr.splice(j, 1);
                        j--;
                    }
                }
            }
            $(this).css({
                "border" : "2px solid red"
            }).parent().siblings().children("span").eq($(this).index()-1).css({
                "border" : "2px solid red"
            })
            // 找出5处不同后进跳出继续游戏页面
            if(arr.length == 5) {
                c++;
                if(c < 20) {
                    setTimeout(function() {     
                        $(".alert-lev").css({
                            "display" : "block"
                        })
                    }, 500)                  
                }
                $(".alert-lev em").html(c);
                $(".alert-lev strong").html(20 - c);
                clearInterval(timer);
            }
            // 显示还有多少处不同
            var diffrent = 5 - arr.length;
            $(".game h1 em").html(diffrent);
            if((a == 19) && (arr.length == 5)) {
                $(".wrap-over").css({
                    "display" : "block"
                })
                $(".wrap-over h2").html("天文望远镜");
                $(".wrap-over p").html("您已成功通过" + 20 + "个关卡您的洞察力已超越了人类，简直是天文望远镜~~！！！");
                $(".wrap-over img").attr("src", "images/7.jpg");
                a = 0;
            }   
        })
        // 随机生成20组图片
        var arrA = differentRandom(20, 20, 0);
        // 进入下一关时图片成另一张图
        function start() {
            var backImg = arrA[a];
            $(".change").css({
                "background" : "url" + "(images/" + backImg + "-" + "1" + ".jpg)",
                "backgroundSize" : "100% 100%"
            })
            $(".change2").css({
                "background" : "url" + "(images/" + backImg + "-" + "2" + ".jpg)",
                "backgroundSize" : "100% 100%"
            })
            for(var i = 0; i < boxLeft[0].length; i++) {
                $(".picture-left span").eq(i).css({
                    "left" : boxLeft[arrA[a]-1][i] + "%",
                    "top" : boxTop[arrA[a]-1][i] + "%"
                })
                $(".picture-right span").eq(i).css({
                    "left" : boxLeft[arrA[a]-1][i] + "%",
                    "top" : boxTop[arrA[a]-1][i] + "%"
                })
            }
        }start();
        // 点击继续游戏进入下一关
        $(".alert-lev span").tap(function() {
            timer = setInterval(showTime, 1000);
            a++;
            b++;           
            var levGame = $(".game h1 span").eq(0).html;
            var backImg = arrA[a];
            d = 60;
            $(".game h1 span").eq(1).html(d);
            $(".game h1 em").html(5);
            if(b <= 9) {
                $(".game h1 span").eq(0).html("0" + b);
            } else {
                $(".game h1 span").eq(0).html(b);
            }
            // $(".game h1 span").eq(0).html("0" + b);
            arr = [];
            $(".picture span").css({
                "border" : "none"
            })           
            $(".alert-lev").css({
                "display" : "none"
            })         
            start();           
        })
        // 取随机数       
        function differentRandom(len, x, y) {
            var arr = [];
            var num;
            for(var i = 0; i < len; i++) {
                num = Math.ceil(Math.random() * x + y);
                for (var j = 0; j < arr.length; j++) {
                    if (num == arr[j]) {
                        num = Math.ceil(Math.random() * x + y);
                        j = -1;
                    }
                }
                arr.push(num);
            }
            return arr;
        }
         /*图片预加载*/
        var load = document.getElementById('loading');
        var imgPath = ''; // 存放图片的路径
        var loadingPage = (function () {
            var imgSources = ['images/1-1.jpg','images/1-2.jpg','images/2-1.jpg','images/2-2.jpg','images/3-1.jpg','images/3-2.jpg','images/4-1.jpg','images/4-2.jpg','images/5-1.jpg','images/5-2.jpg','images/6-1.jpg','images/6-2.jpg','images/7-1.jpg','images/7-2.jpg','images/8-1.jpg','images/8-2.jpg','images/9-1.jpg','images/9-2.jpg','images/10-1.jpg','images/10-2.jpg','images/11-1.jpg','images/11-2.jpg','images/12-1.jpg','images/12-2.jpg','images/13-1.jpg','images/13-2.jpg','images/14-1.jpg','images/14-2.jpg','images/15-1.jpg','images/15-2.jpg','images/16-1.jpg','images/16-2.jpg','images/17-1.jpg','images/17-2.jpg','images/18-1.jpg','images/18-2.jpg','images/19-1.jpg','images/19-2.jpg','images/19-1.jpg','images/19-2.jpg','images/1.jpg','images/2.jpg','images/3.jpg','images/4.jpg','images/5.jpg','images/6.jpg','images/7.jpg','images/bac.png','images/lev.png','images/time.png']; // 需要预加载的图片
            for (var i = 0; i < imgSources.length; i++) {
                imgSources[i] = (imgPath + imgSources[i])
             }
            var loadImage = function (path, callback) {
                var img = new Image();
                img.onload = function () {
                    img.onload = null;
                    callback(path);
                }
                 img.src = path;
            }
            var imgLoader = function (imgs, callback) {
                var len = imgs.length, i = 0;
                while (imgs.length) {
                    loadImage(imgs.shift(), function (path) {
                        callback(path, ++i, len);
                    })
                }
            }
            var rateNum = document.getElementById('loading_rate');
            var percent = 0;
            imgLoader(imgSources, function (path, curNum, total) {
                percent = curNum / total;
                // rateNum.innerHTML = Math.floor(percent * 100) + '%';
                if (percent == 1) {    // 图片预加载完成后的回调函数
                    
                }
            });
        })();
    </script>
</html>