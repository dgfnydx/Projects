/* 
* @Author: anchen
* @Date:   2016-07-18 14:58:18
* @Last Modified by:   anchen
* @Last Modified time: 2016-07-18 15:05:42
*/

$(function(){
    $(window).scroll(function(event) {
        /* Act on the event */
        var scrollTop = $(this).scrollTop() , scrollHeight = $(document).height(),windowHeight = $(this).height();
        if(scrollHeight < 2800) {
            if(scrollTop + windowHeight >= scrollHeight-60) {
                $("#list-more").show();
                $.ajax({
                    url: 'ajaxRequestData/service.html',
                    type: 'get',
                    success: function(data) {
                        for(var i = 0; i < 2; i++){
                            $("#jreport").append(data);
                        }
                    }
                });
            }
        } else {
            $("#list-more").hide();
        }
       
    });
});