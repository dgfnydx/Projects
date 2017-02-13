$(".s-contact p").tap(function() {
	var reg1 = /\S/;
	var str1 = $(".s-name").val();
	var reg2 = /^0?(13|14|15|18)[0-9]{9}$/;
	var str2 = $(".s-phone").val();
	if(reg1.test(str1) == true && reg2.test(str2) == true) {
		console.log(5)
	} 
	if(reg1.test(str1) == true) {
		$("#name").css({"visibility" : "hidden"})
	}
	if(reg1.test(str1) != true) {
		$("#name").css({"visibility" : "visible"})
	}
	if(reg2.test(str2) == true) {
		$("#tel").css({"visibility" : "hidden"})
	}
	if(reg2.test(str2) != true) {
		$("#tel").css({"visibility" : "visible"})
	}
})


$(".s-laud").tap(function() {
	var score = 0;
	score++;
	$(this).children().html(score);
})