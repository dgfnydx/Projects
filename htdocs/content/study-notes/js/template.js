/**
 * 
 * @authors  (DGF)
 * @date    2016-11-27
 * @version $Id$
 */
$(function() {
	// 保持知识点与示例效果的高度一致
	function sameHeight() {
		var kph = $(".notes-content .knowledge-point"),
			kphs = $(".demos-content .knowledge-point"),
			wrapw = $(".wrap").width()
		// for(var i = 0; i < kph.length; i++) {
		// 	kphs.eq(i).css({"minHeight": kph.eq(i).height()})
		// }
		if(wrapw > 770) {
			for(var i = 0; i < kph.length; i++) {
				if(kph.eq(i).height() > kphs.eq(i).height()) {
					kphs.eq(i).css({"minHeight": kph.eq(i).height()})
				} else {
					kph.eq(i).css({"minHeight": kphs.eq(i).height()})
				}
			}
		} else {
			$(".demos-content .knowledge-point, .notes-content .knowledge-point").css({"minHeight": 0})
		}
	}
	// 加载时执行
	sameHeight()
	// 窗口变化时执行
	$(window).resize(function() {
		sameHeight()
	})
	
	
})
