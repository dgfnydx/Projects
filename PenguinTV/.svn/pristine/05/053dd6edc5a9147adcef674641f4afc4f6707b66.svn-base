// 音乐效果
var musicHyq = document.getElementById("music-hyq");
var musicSwitch = true;
$(".music-hyq").on("tap",function() {
    if(musicSwitch) {
        $(this).css({
            "background" : "url('images/end_audio.png') 0 0 no-repeat",
            "background-size" : "100% 100%"
        })
        musicHyq.pause();
        musicSwitch = false;
    } else {
        $(this).css({
            "background" : "url('images/start_audio.png') 0 0 no-repeat",
            "background-size" : "100% 100%"
        })
        musicHyq.play();
        musicSwitch = true;
    }
})
// loading页 效果
var loadingnum = 0;
var timer = null;
$(".loading-word p").eq(0).stop(true).fadeIn(1800,function() {
	$(this).next().stop(true).fadeIn(1800, function() {		
		$(this).next().stop(true).fadeIn(1800);
	})
});
function loadingImg() {
	$(".img-con img").eq(loadingnum).css({"display" : "block"}).siblings().css({"display" : "none"});
	if(loadingnum % 2 != 0) {
		timer = setTimeout(loadingImg, 800);		
	} else {
		timer = setTimeout(loadingImg, 2500);				
	}
	loadingnum++;
	if(loadingnum >= 9) {
		clearTimeout(timer);
		$(".wrap-loading").fadeOut(1500, function() {
			$(".dgf-wrap-home").fadeIn(1500, function(){
				var lengtwo = $('.pen-text p').length;
				for(var j = 0; j < lengtwo; j++) {
				    setTimeout('two(' + j + ')', j*2000);
				}
			});
			
		}); 
	}
}
loadingImg();
function two(j) {
    $('.pen-text p').eq(j).show();
    $('.pen-text p').eq(j).textillate({
        //默认多文本动画
        selector: ".texts",
        // 是否循环
        loop: false,
        // 在文本被替换前做少显示时间
        minDisplayTime: 1500,
        // 在动画开始前设置延迟时间
        initialDelay: 0,
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
            callback: function () {
            	var lengtwo = $('.pen-text p').length;
            	if(j==lengtwo-1){
            		$(".dgf-wrap-home .next-hyq").show();
            	}
            }
        }
    })
}

// 基友闺蜜
var brotherPast = document.querySelector(".brother-past-hyq img");
var brotherNow = document.querySelector(".brother-nowpic");
var sisterPast = document.querySelector(".sister-past-hyq img");
var sisterNow = document.querySelector(".sister-nowpic");
//动画结束时事件 
// 基友 效果
brotherPast.addEventListener("webkitAnimationEnd", function() { 
	$(".brother-past-hyq").hide();
	$(".brother-now-hyq .brother-nowpic").show().css({
		"-webkit-animation": "smallerHyq 4s",
		"animation": "smallerHyq 4s"
	});
}, false);
brotherNow.addEventListener("webkitAnimationEnd", function() {		
	$(".brother-word p").eq(0).css({"display" : "block"}).textillate({
	  	loop: false,
		minDisplayTime: 2000,
		initialDelay: 0,
		autoStart: true,
		inEffects: [],
		in: {
		 	 effect: 'fadeInLeftBig',
		 	delayScale: 2,
		    delay: 50,
		    sync: false,
		    shuffle: false,
		    reverse: false,
		    callback: function () {
		    	$(".brother-word p").eq(1).css({"display" : "block"}).textillate({
	    		    // selector: '.tit',
	    		  	loop: false,
	    			minDisplayTime: 2000,
	    			initialDelay: 0,
	    			autoStart: true,
	    			inEffects: [],
	    			in: {
	    			 	 effect: 'fadeInLeftBig',
	    			 	delayScale: 2,
	    			    delay: 50,
	    			    sync: false,
	    			    shuffle: false,
	    			    reverse: false,
	    			    callback: function () {
		    		    	$(".brother-word p").eq(2).css({"display" : "block"}).textillate({
		    	    		    // selector: '.tit',
		    	    		  	loop: false,
		    	    			minDisplayTime: 2000,
		    	    			initialDelay: 0,
		    	    			autoStart: true,
		    	    			inEffects: [],
		    	    			in: {
		    	    			 	 effect: 'fadeInLeftBig',
		    	    			 	delayScale: 2,
		    	    			    delay: 50,
		    	    			    sync: false,
		    	    			    shuffle: false,
		    	    			    reverse: false,
		    	    			    callback: function () {
		    	    			    	$(".brother-word img").fadeIn();
		    	    			    }
		    	    			}
		    			    })
	    			    }
	    			}
			    })
			},
		}	
	})
}, false);

// 闺蜜
sisterPast.addEventListener("webkitAnimationEnd", function() {
	$(".sister-past-hyq").hide();
	$(".sister-now-hyq .sister-nowpic").show().css({
		"-webkit-animation" : "smallersisHyq 4s",
		"aimation" : "smallersisHyq 4s"
	})
}, false);
sisterNow.addEventListener("webkitAnimationEnd", function() {
	$(".sister-word p").eq(0).css({"display" : "block"}).textillate({		
	    selector: '.tit',
	  	loop: false,
		minDisplayTime: 2000,	
		initialDelay: 0,
		autoStart: true,
		inEffects: [],
		in: {
		 	 effect: 'fadeInLeftBig',
		 	delayScale: 2,
		    delay: 50,
		    sync: false,
		    shuffle: false,
		    reverse: false,
		    callback: function () {
		    	$(".sister-word p").eq(1).css({"display" : "block"}).textillate({
	    		    selector: '.tit',
	    		  	loop: false,
	    			minDisplayTime: 2000,
	    			initialDelay: 0,
	    			autoStart: true,
	    			inEffects: [],
	    			in: {
	    			 	 effect: 'fadeInLeftBig',
	    			 	delayScale: 2,
	    			    delay: 50,
	    			    sync: false,
	    			    shuffle: false,
	    			    reverse: false,
	    			    callback: function () {
		    		    	$(".sister-word p").eq(2).css({"display" : "block"}).textillate({
		    	    		    selector: '.tit',
		    	    		  	loop: false,
		    	    			minDisplayTime: 2000,
		    	    			initialDelay: 0,
		    	    			autoStart: true,
		    	    			inEffects: [],
		    	    			in: {
		    	    			 	 effect: 'fadeInLeftBig',
		    	    			 	delayScale: 2,
		    	    			    delay: 50,
		    	    			    sync: false,
		    	    			    shuffle: false,
		    	    			    reverse: false,
		    	    			    callback: function () {
		    	    			    	$(".sister-word img").fadeIn();
		    	    			    }
		    	    			}
		    			    })
	    			    }
	    			}
			    })
			},
		}	
	})
}, false);

// 钟摆下一页
$(".dgf-wrap-home .next-hyq").on("tap", function() {
	$(".dgf-wrap-home").stop(true).fadeOut(1000, function() {
		$(".wrap-brother-hyq").stop(true).fadeIn().children(".brother-past-hyq").children("img").css({
			"display" : "block",
			"-webkit-animation": "biggerHyq 4s",
			"animation": "biggerHyq 4s"
		});
	})
})
// 基友下一页
$(".wrap-brother-hyq .next-hyq").on("tap", function() {
	$(".wrap-brother-hyq").stop(true).fadeOut(1000, function() {
		$(".sister-past-hyq img").stop(true).fadeIn(1000, function() {
			$(this).css({
				"-webkit-animation": "biggersisHyq 4s",
				"animation": "biggersisHyq 4s"
			});	
		})	
	});
})
// 闺蜜下一页
$(".wrap-sister-hyq .next-hyq").on("tap", function() {
	$(".wrap-sister-hyq").stop(true).fadeOut(1000, function() {
		$(".wrap-wlf").stop(true).fadeIn(1000, function() {
			$(".wrap-wlf").children(".before-bro-sis-wlf").children("img").css({
				"-webkit-animation": "Beforebrosis 4s",
				   "-moz-animation": "Beforebrosis 4s",
				    "-ms-animation": "Beforebrosis 4s",
				     "-o-animation": "Beforebrosis 4s",
				       "animation": "Beforebrosis 4s",
				"-webkit-transform-origin": "17.72% 12.48%",
				   "-moz-transform-origin": "17.72% 12.48%",
				    "-ms-transform-origin": "17.72% 12.48%",
				     "-o-transform-origin": "17.72% 12.48%",
				        "transform-origin": "17.72% 12.48%"
			})
		})
	})
})

