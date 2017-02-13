/**
 * 
 * @authors  ()
 * @date    2016-07-14
 * @version $Id$
 */

// 首页焦点图切换
$(function() {
	var mySwiper = new Swiper('.swiper-index .swiper-container',{
		autoplay : 3000,//可选选项，自动滑动
		loop : true,//可选选项，开启循环
		pagination: '.swiper-index .swiper-pagination',
		paginationClickable :true,
	})
})

$(document).ready(function(){
    var mySwiper = new Swiper('.sup-swiper .swiper-container', {
        autoplay: 5000,//可选选项，自动滑动
        loop:true,
        pagination : '.sup-swiper .swiper-pagination',
        paginationClickable :true,
    })
});