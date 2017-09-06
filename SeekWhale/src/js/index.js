var main = {
	video: document.getElementById("video"),
	playBtn: document.getElementById("pbtn"),
	vbbtn: document.getElementById("vbbtn"),
	// banner轮播
	cycle: function() {
		$("#myCarousel, #myCarousel1").carousel({
			pause: "none"//鼠标悬停不停止轮播
		});
		// $("#myCarousel1").carousel('pause');
	},
	// 导航栏锚点
	anchor: function(btnTag, boxTag, n) {
		$(btnTag).click(function() {
		    $("body,html").animate({
		        'scrollTop': $(boxTag).offset().top - n
		    }, '1000');
		});
	},
	videoPlay: function() {
		var _this = this;
		this.playBtn.onclick = function() {
			_this.video.play()
			_this.vbbtn.style.display = "none";
		}
	},
	cooperate: function() {
		$(".row .col-xs-6").hover(function(){
			var index = $(this).index() - 0;
			var n = index + 1
			$(".row img").eq(index).attr("src", "images/demo/partner/partner" + n + "-1.png")
			$(".row img").eq(index).removeClass("suo").addClass("fang")
		},function(){
			var index = $(this).index() - 0;
			var n = index + 1
		    $(".row img").eq(index).attr("src", "images/demo/partner/partner" + n + ".png")
		    $(".row img").eq(index).removeClass("fang").addClass("suo")
		});
	},
	start: function() {
		this.cycle();
		this.cooperate();
		this.anchor(".aboutus", ".about", 20);
		this.anchor(".solve", ".solution", 20);
		this.anchor(".beaut", ".display", 68);
		this.anchor(".contact", ".contacts", 60);
		// this.videoPlay();
	}
}
main.start()

$(".shows, #pbtn").click(function() {
	$(".mask").show()
	$('body').css({"overflow":'hidden' });
})
$(".mask button").click(function() {
	$(".mask").hide()
	$('body').css({"overflow":'auto' });
})



// var timer = null;
// var clicks = true;
// function toTop() {
// 	if(clicks) {
// 		clearTimeout(timer);
// 		var about = document.getElementById("about");
// 		var ab = about.offsetTop
// 		window.scrollBy(0, 10);
// 		var top = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
// 		console.log(top)
// 		timer = setTimeout(toTop, 10);
// 		if(top >= ab) {
// 			clearTimeout(timer);
// 			clicks = false
// 		}
// 	}
// }
// $(".aboutus").click(function() {
// 	toTop()

// })
// function Anchor() {
// 	this.timer = null;
// 	this.clicks = true;
// 	this.btnTag = document.getElementById(tag);

// }

// function ScollPostion() {
//     var t, l, w, h;
//     if (document.documentElement && document.documentElement.scrollTop) {
//         t = document.documentElement.scrollTop;
//         l = document.documentElement.scrollLeft;
//         w = document.documentElement.scrollWidth;
//         h = document.documentElement.scrollHeight;
//     } else if (document.body) {
//         t = document.body.scrollTop;
//         l = document.body.scrollLeft;
//         w = document.body.scrollWidth;
//         h = document.body.scrollHeight;
//     }
//     return {
//         top: t,
//         left: l,
//         width: w,
//         height: h
//     };
// }
// console.log(ScollPostion())