//窗口宽高
var win = $(window).width() / 2;
var winh = $(window).height() / 2;
//计数模块
var content = $(".content").width() / 2;
var left = win - content;
// loading
var loadw = $(".loading").width() / 2;
var loadh = $(".loading").height() / 2;
var loadTop = winh - loadh;
var loadLeft = win - loadw;

var datas = [];
var val = [];
var maxNum;
$(".content").css({"left": left});
$(".loading").css({"top": loadTop});
$(".loading").css({"left": loadLeft});
// 数组求和
function sum(arr) {
	return eval(arr.join("+"))
}
/**
 * [count description]
 * @param  {[type]} dataUrl [地址]
 * @param  {[type]} ratio   [系数]
 * @return {[type]}         [description]
 */
function count(dataUrl, ratio, colorArr, actionColor) {
   $.ajax({
		url: dataUrl,
        type: 'post',
        beforeSend: function() {
			$(".loading").show()
        },
        success: function(data) {
	        var resultObj = JSON.parse(data);
	        console.log(data)
	        for(var name in resultObj) {
		        if(name != "未知") {
				    var obj = {};  
			        obj.name = name;
			        obj.value = resultObj[name] * ratio;
					datas.push(obj)
					val.push(resultObj[name] * ratio)
				} else {
					var other = resultObj[name] * ratio;
				}
	        }
			maxNum = Math.max.apply(null, val)
			mapFun(maxNum, datas, colorArr, actionColor)
			var acounts = sum(val) + other
			$(".scan-people span").text(acounts)
        },
        complete: function() {
	        $(".loading").hide()
	        $("#main, .content").show()
        }
    }); 
}

function mapFun(maxNum, datas, colorArr, actionColor) {
	$.get('../../plugin/china.json', function (chinaJson) {
        echarts.registerMap('china', chinaJson);
        var chart = echarts.init(document.getElementById('main'));
        chart.setOption(option);
   });
   

   option = {
/*
       title: {
           text: '香飘飘',
           textStyle: {
               fontSize: 30
           },
           subtext: '本数据由厦门蚂蚁特工网络科技有限公司提供',
           left: 'center'
       },
*/
       tooltip: {
           trigger: 'item'//提示框触发类型
       },
       // legend: {
       //     orient: 'vertical',
       //     left: 'left',
       //     data:['香飘飘','美汁源','脉动']
       // },
       visualMap: {
           min: 0,
           max: maxNum,
// 	               orient: 'horizontal',
           left: 'left',
           top: 'bottom',
           text: ['高','低'],           // 文本，默认为数值文本
           calculable: true,
           color: colorArr
       },
       toolbox: {
           show: true,
           orient: 'horizontal',
           right: '10%',
           top: 'top',
           feature: {
               dataView: {readOnly: false},
               restore: {},
               saveAsImage: {}
           }
       },
       series: [
           {
               name: '互动次数',
               type: 'map',
               mapType: 'china',
               roam: false,
               label: {
                   normal: {
                       show: true
                   },
                   emphasis: {
                       show: true
                   }
               },
               itemStyle: {
               	   normal: {
	               	   show: true
               	   },
               	   emphasis: {
	               	   show: true,
	               	   areaColor: actionColor
               	   }  
               },
               data: datas            
            }
       ]
   };

}

function scanAcount(scanTotals) {
	$.ajax({
		url: scanTotals,
        type: 'get',
        beforeSend: function() {
			
        },
        success: function(data) {
	        var result = JSON.parse(data);
	        var acounts = result["Totals"];
	        $(".scan-acount span").text(acounts)
	        console.log(result["Totals"])
	    },
        complete: function() {
			
        }
    }); 

}