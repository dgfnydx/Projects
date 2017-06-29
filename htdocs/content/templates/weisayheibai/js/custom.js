// 滚屏
jQuery(document).ready(function($){
$('#roll_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
$('#ct').click(function(){$('html,body').animate({scrollTop:$('#comments').offset().top}, 800);});
$('#fall').click(function(){$('html,body').animate({scrollTop:$('.footer').offset().top}, 800);});
});


