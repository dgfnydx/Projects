// banner轮播
$("#myCarousel").carousel('cycle');

function anchor(btnTag, boxTag, n) {
	$(btnTag).click(function() {
	    $("body,html").animate({
	        'scrollTop': $(boxTag).offset().top - n
	    }, '1000');
	});
}
anchor(".aboutus", ".about", 20)
anchor(".solve", ".solution", 20)
anchor(".beaut", ".display", 68)
anchor(".contact", ".contacts", 60)

var about = document.getElementById("about");
var ab = about.offsetTop
// document.documentElement.scrollTop = 475
document.body.scrollTop = 500
window.scrollTo(500,200)
console.log(ab)

// function Anchor() {
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