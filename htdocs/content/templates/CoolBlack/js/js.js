$(document).ready(function(e) {
    $("nav ul li").click(function(){
		$(this).addClass("cli");
		$(this).siblings().removeClass("cli");
			})
});
 $(document).ready(function(e) {
    $(".hot ol li").click(function(){
		$(this).addClass("sli");
		$(this).siblings().removeClass("sli");
		$key=$(".hot ol li").index(this);
		$(".hot ul li").eq($key).css({ display:"block" });
		$(".hot ul li").eq($key).siblings().css({display:"none"});
		clearTimeout($auto);
		auto_click();       
		})
		auto_click();      
		$(".hot ul li").hover(function(){
		clearTimeout($auto);    
			})
		$(".hot ul li").mouseout(function(){
		auto_click();           
		})
});
function auto_click(){
	$obj=$(".hot ol").find(".sli");      
	$index=$(".hot ol li").index($obj)+1;
	if($index<=4){
	$auto=setTimeout(function(){ $(".hot  ol li").eq($index).trigger("click")},3000)  
	}else{
	$auto=setTimeout(function(){ $(".hot ol li").eq(0).trigger("click")},3000)  
	}
	return $auto;  
}

function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('#gotop').click(function(){
		$(document).scrollTop(0);	
	})
});

$(window).scroll(function(e){
	b();		
})
$(document).ready(function(){
//sub-nav
$("nav ul li").mousemove(function(){
$(this).find("ul").css({"height":"auto"});
$(this).find("ul").stop().slideDown("1000");
});
$("nav ul li").mouseleave(function(){
$(this).find("ul").css({"height":"auto"});
$(this).find("ul").stop().slideUp("fast");
});
//返回顶部
$(".fhdb").click(function(){
$('body,html').animate({scrollTop:0},1000);
return false;
});
//分享
$(".zd_share").click(function(){
$('#bodybg,#share_box').fadeIn();
$('body').addClass('overflow')
});
$("#bodybg,#share_box a").click(function(){
$('#bodybg,#share_box').fadeOut();
$('body').removeClass('overflow');
});
//tips
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('c q={x:E,y:3,o:"a,r,s,1 ",g:B,h:2(){c b=0.g;$(0.o).t(2(){$(0).u(2(e){8(b){f=C}K{f=$.D(0.5)!=\'\'}8(f){0.6=0.5;0.5="";c a="<1 9=\'7\'><1 9=\'d-j d-j-n\'></1><1 9=\'d-v\'>"+0.6+"</1></1>";$(\'w\').z(a);$(\'.7\').k({"l":(e.m+3)+"4","p":(e.i-3)+"4"}).F(\'G\')}}).H(2(){8(0.6!=I){0.5=0.6;$(\'.7\').J()}}).A(2(e){$(\'.7\').k({"l":(e.m+3)+"4","p":(e.i-3)+"4"})})})}};$(2(){q.h()});',47,47,'this|div|function|20|px|title|myTitle|tooltip|if|class|||var|tipsy||isTitle|noTitle|init|pageX|arrow|css|top|pageY||tipElements|left|sweetTitles|span|img|each|mouseover|inner|body|||append|mousemove|false|true|trim|10|show|fast|mouseout|null|remove|else'.split('|'),0,{}))
//点击下滑到评论
$(".zd_comm").click(function(){
 $("html,body").stop(true);$("html,body").animate({scrollTop: $(".ajax_comment").offset().top}, 1000);})
//点击发布评论
$(".comm_tijiao").click(function(){
$(".comm_infobox").fadeIn('slow');
}) 
$(".comm_close,#comment_submit").click(function(){
$(".comm_infobox").fadeOut('slow');
}) 
//清空输入
$(".comm_rest").click(function(){
$("#comname,#commail,#comurl,#comment").attr("value","");
});
//鼠标离开隐藏表情
$(".smilebg").mouseleave(function(){
$(".smilebg").slideUp(200);
});
//点击显示手机导航
$('.mobi_nav').click(function(){
$('#bodybg').css("opacity","0.5")
$("#bodybg,.mobi_menu").show();
$(".mobi_menu").animate({right:'0'});
$("body").css("overflow-y","hidden");
});
$('#mobi_close').click(function(){
$("#bodybg").hide();
$(".mobi_menu").animate({right:'-50%'});
$("body").css("overflow-y","auto");
});
});
//评论工具栏
function tool_img() {
	var URL = prompt('请输入图片的地址（禁止发违法图片）:','http://');
	if (URL) {
		document.getElementById('comment').value = document.getElementById('comment').value + '[img]' + URL + '[/img]';
	}
}
function tool_link() {
	var URL = prompt('请输入链接地址:','http://');
	if (URL) {
		document.getElementById('comment').value = document.getElementById('comment').value + '[link]' + URL + '[/link]';
	}
}
function tool_code() {
		document.getElementById('comment').value = document.getElementById('comment').value + '[code]代码内容[/code]';
}
function tool_qiand() {
 var myDate = new Date();
 var ShiJian = myDate.toLocaleString();
		document.getElementById('comment').value = document.getElementById('comment').value + '[code]签到成功！签到时间：'+ ShiJian + '，每日签到，生活更精彩！[/code]';
  $('.tool_qiand').hide();
}
function tool_bq() {
	if($('.smilebg').css('display')=='none'){
		$('.smilebg').slideDown(200)
	}else{
		$('.smilebg').slideUp(200)
	}
}
//表情所用脚本
function grin(tag) {
    	var myField;
    	tag = '' + tag + '';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
function commentReply(pid,c){
	var response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = pid;
	document.getElementById('cancel-reply').style.display = '';
	c.parentNode.parentNode.appendChild(response);
}
function cancelReply(){
	var commentPlace = document.getElementById('comment-place'),response = document.getElementById('comment-post');
	document.getElementById('comment-pid').value = 0;
	document.getElementById('cancel-reply').style.display = 'none';
	commentPlace.appendChild(response);
}

$(document).ready(function(){$("#navigation").click(function(){$(".media_bg,.m_sort").show();$(".m_sort").animate({right:'0'});$("body").css("overflow-y","hidden");});$("#close_m,.media_bg").click(function(){$(".m_sort").animate({right:'-50%'});$(".media_bg").hide();$("body").css("overflow-y","auto");});
});