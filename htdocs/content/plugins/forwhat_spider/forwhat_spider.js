var dqpage=0;
function forwhat_spider_getxml()
{
	$("#forwhat_spider_showresult").empty();
	$("#forwhat_spider_showresult").append("please wait ...");
	
	  $.post('plugin.php?plugin=forwhat_spider'+'&'+'t='+Math.random(),{uhowtodo:'list',unum:dqpage},function(data){
		//重新生成控制菜单
		$("#forwhat_spider_control").empty();
		dqpage=parseInt($(data).find('control').find('dqnum').text());
		var html="<a href='#' id='forwhat_spider_begin'>上一页</a>  <a href='#' id='forwhat_spider_forward'>首页</a>  <a href='#' id='forwhat_spider_next'>下一页</a> 当前第"+dqpage+"个  总共"+$(data).find('control').find('num').text()+"个";
		$("#forwhat_spider_control").append(html);
		


		html="<table class = 'table_result_class'  id='table_result' ><tr class=table_result_header'>";
		html=html+"<th class ='table_result_column1'>名称</th>";
		html=html+"<th class ='table_result_column2'>时间</th>";
		html=html+"<th class ='table_result_column3'>地址</th>";
		html=html+"<th class ='table_result_column4'>来访IP</th></tr>";
		var setbgcolor=0;

			$(data).find('show').each(function(index,ele){
			if(setbgcolor==0)
			{
				setbgcolor=1;
				html+="<tr><td class='table_result_column1'>";
			}
			else
			{
				html+="<tr class='table_result_setbgcolor'><td class='table_result_column1'>";
				setbgcolor=0;
			}
			html+="<a href='#' id = 'table_result_text_getbyname'>";
			html+=$(ele).find('sname').text();
			html+="</a></td><td class='table_result_column2'>";
			html+=$(ele).find('stime').text();
			html+="</td><td class='table_result_column3'>";
			html+=$(ele).find('surl').text();
			html=html+"</td><td class='table_result_column4'>"+$(ele).find('sip').text()+"</td></tr>";
		});	
	

		html+="</table>";		

		$("#forwhat_spider_showresult").empty();
		$("#forwhat_spider_showresult").append(html);
	});
	//alert('11');
}

$(document).ready(function(){
	$("a").live('click',function(){
		if(this.id=='forwhat_spider_begin')
		{
			dqpage=0;
			forwhat_spider_getxml();
			return false;
		}
		else if(this.id=='forwhat_spider_forward')
		{
			if(dqpage<=16){dqpage=0;}else{dqpage-=16;}
			forwhat_spider_getxml();
			return false;
		}
		else if(this.id=='forwhat_spider_next')
		{
			dqpage+=16;
			forwhat_spider_getxml();
			return false;
		}
	});
});