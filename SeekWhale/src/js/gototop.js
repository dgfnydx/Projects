/*
* @Author: dgf
* @Date:   2017-05-03 17:54:29
* @Last Modified by:   dgf
* @Last Modified time: 2017-05-03 18:16:41
*/

function goToTop() {
	function goTopDom() {
	    return '<div id="backtoTop">'+
	              '<canvas id="backtoTopCanvas" width="48" height="48"></canvas>'+
	              '<div class="toptext" title="返回顶部">0</div>'+
	        '</div>'
	}
	$("body").append(goTopDom())
	$("#backtoTop").css({
	    "position": "fixed",
	    "bottom": "10%",
	    "right": "-100px",
	    "z-index": "5000",
	    "width": "48px",
	    "height": "48px",
	    "background": "#eee",
	    "border-radius": "50%",
	    "transition": "0.5s",
	    "-webkit-transition": "0.5s"
	})
	$(".toptext").css({
	    "position": "absolute",
	    "top": "0",
	    "left": "0",
	    "width": "48px",
	    "height": "48px",
	    "line-height": "48px",
	    "text-align": "center",
	    "cursor": "pointer"
	})
	function drawCircle(id, percentage, color) {
	    var width = $(id).width();
	    var height = $(id).height();
	    var radius = parseInt(width/2.20);
	    var position = width;
	    var positionBy2 = position/2;
	    var bg = $(id)[0];
	    var ctx = bg.getContext('2d');
	    var imd = null;
	    var circ = Math.PI * 2;
	    var quart = Math.PI / 2;
	    ctx.clearRect(0,0,width,height);
	    ctx.beginPath();
	    ctx.strokeStyle = color;
	    ctx.lineCap = 'square';
	    ctx.closePath();
	    ctx.fill();
	    ctx.lineWidth = 3;
	    imd = ctx.getImageData(0, 0, position, position);
	    var draw = function(current, ctxPass) {
	        ctxPass.putImageData(imd, 0, 0);
	        ctxPass.beginPath();
	        ctxPass.arc(positionBy2, positionBy2, radius, -(quart), ((circ) * current) - quart, false);
	        ctxPass.stroke();
	    }
	    draw(percentage / 100, ctx);
	}
	$("#backtoTop").click(function() {      
	    $("body,html").animate({
	        scrollTop: 0
	    },
	    600);
	    return false;
	})     
	var defaultScroll = 0
	var percentage = 0;
	$(window).scroll(function() {
	    var docHeight = document.body.scrollHeight - window.innerHeight;
	    defaultScroll = $(this).scrollTop();
	    percentage = parseInt(( defaultScroll / docHeight ) * 100);
	    
	    if (defaultScroll > 200) {
	        $("#backtoTop").css({"right" : "10px"});
	    } else {
	        $("#backtoTop").css({"right" : "-100px"});
	    }   
	    $(".toptext").text(percentage)
	    drawCircle('#backtoTopCanvas', percentage, '#666');
	})
	$(".toptext").hover(function() {
	    $(this).text("顶")
	},function() {
	    $(this).text(percentage)
	})
}