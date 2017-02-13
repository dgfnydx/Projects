/* 
* @Author: anchen
* @Date:   2016-08-07 09:30:07
* @Last Modified by:   anchen
* @Last Modified time: 2016-08-09 12:41:49
*/

$(document).ready(function(){
    $(".wrap-fund-hyq .inform-hyq li span em").each(function() {
         if($(this).html() < 0) {
            $(this).css({"background-color" : "#3db608"})
         } else if($(this).html() > 0) {
            $(this).css({"background-color" : "#d50000"})
        } else {
            $(this).css({"background-color": "#999"})
        }
    });
    $(".main-net-hyq .daily-trading li p em").each(function() {
        if(parseInt($(this).html()) < 0) {
            $(this).css({"background-color" : "#3db608"});
            $(this).parent().siblings().children('b').css({"color": "#40b80c"});
        } else if(parseInt($(this).html()) > 0) {
            $(this).css({"background-color" : "#d50000"})
        } else {
            $(this).css({"background-color": "#999"});
            $(this).parent().siblings().children('b').css({"color": "#999"});
        }
    })
    $(".main-cho-hyq .mychoice li p em").each(function() {
        if(parseInt($(this).html()) < 0) {
            $(this).css({"background-color" : "#3db608"});
            $(this).parent().siblings().children('b').css({"color": "#40b80c"});
        } else if(parseInt($(this).html()) > 0) {
            $(this).css({"background-color" : "#d50000"})
        } else {
            $(this).css({"background-color": "#999"})
            $(this).parent().siblings().children('b').css({"color": "#999"});
        }
    })
    $(".overview-hyq span").on("tap", function() {
        var spanIndex = $(this).index();
        $(this).css({
            "-webkit-box-shadow" : " 0 0 0 1px #fff",
            "-moz-box-shadow" : " 0 0 0 1px #fff",
            "-ms-box-shadow" : " 0 0 0 1px #fff",
            "box-shadow" : " 0 0 0 1px #fff"
        }).siblings().css({
            "-webkit-box-shadow" : "none",
            "-moz-box-shadow" : "none",
            "-ms-box-shadow" : "none",
            "box-shadow" : "none"
        })
        switch(spanIndex) {
            case 0:
                $(".fund-survey").show();
                $(".fund-change").hide();
                $(".fund-worth").hide();
                $(".fund-rate").hide();
                break;
            case 1:
                $(".fund-survey").hide();
                $(".fund-change").show();
                $(".fund-worth").hide();
                $(".fund-rate").hide();
                break;
            case 2:
                $(".fund-survey").hide();
                $(".fund-change").hide();
                $(".fund-worth").show();
                $(".fund-rate").hide();
                break;
            case 3:
                $(".fund-survey").hide();
                $(".fund-change").hide();
                $(".fund-worth").hide();
                $(".fund-rate").show();
                break;
        }
    })
    $(".chart-tab span").on("tap", function() {
        var spanIndex = $(this).index();
        $(this).css({
            "color": "#000",
            "background": "url('../images/triangledown_hyq.png') center -3% no-repeat",
            "background-size": "19% 28%"
        }).siblings('span').css({
            "color" : "#666",
            "background" : "none"
        });
        switch(spanIndex) {
            case 0: 
                charts();
                chartst();
                break;
            case 1:
                chartFiveDay();
                chartsFiveDay();
                break;
            case 2:
                chartDayK();
                chartsDayK();
                break;
            case 3:
                chartWeek();
                chartsWeek();
                break;
            case 4:
                chartMonthK();
                chartsMonthK();
                break;
        }
    })
});
// 基金详情页的图表
// 图表 分时
function charts() {
    var chartone = new Highcharts.Chart({
        chart: {
            renderTo: "chartone"
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime'
        },
        yAxis: [{
            title: null,
            gridLineDashStyle: 'longdash',
            labels: {
                style: {
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }         
        },{
            labels: {
                format: '{value}%',
                style: {
                    color: '#f00',
                    fontSize: "0.5rem"
                    },
                x: 0,
                y: 5
            },
            title: null,
            opposite: true,
            gridLineDashStyle: 'longdash',
        }],
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 0
                },
                lineWidth: 1,
                states: {
                    select: {
                        lineWidth: 0
                    }
                },
                threshold: null
            },
            line: {
                marker: {
                    radius: 0
                }
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        series: [{
            type: 'area',
            yAxis: 0,
            name: '实时数据',
            pointInterval: 0.17 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [10.12,10.23,10.58,10.12,10.23,10.55,11.02,10.09,11.12,11.34,11.56,11.85,12.01,12.12,12.01,11.45,10.87,10.78,10.98,10.54,9.96,9.45,9.37,9.89,10.01,10.21,10.23,11.56,9.84,9.01,9.45,9.45,10.23,10.89,10.56]
        },
        {
            type: 'line',
            yAxis: 1,
            color: '#ffbf7f',
            name: '涨跌',
            pointInterval: 0.17 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [0.21,0.32,0.43,0.54,0.65,0.74,0.85,0.96,1.14,1.38,1.35,1.42,1.23,1.11,1.05,0.98,0.88,0.78,0.65,0.55,0.42,0.23,0.12,0.83,-0.12,-0.09,-0.11,0.02,0.06,0.09,0.21,0.34,0.59,0.78,0.51],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    });
}
function chartst() {
   var chartwo = new Highcharts.Chart({
        chart: {
            renderTo: "charttwo",
            type: 'column'
        },
         title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime',
            labels: {
                enabled: false
            }
        },
        yAxis: {
            gridLineDashStyle: 'longdash',
            title: null,
            labels: {
                format: '{value}万',
                style: {
                    color: '#666',
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                // pointPadding: 0.2,
                // borderWidth: 0,
                color: "#c9c9c9"
            }
        },
        series: [{
            name: '收益',           
            pointInterval: 0.17 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [5.21,4.32,4.43,4.54,4.65,4.74,4.85,4.96,5.14,5.38,5.35,5.42,5.23,5.11,5.05,4.98,4.88,4.78,4.65,4.55,4.42,4.23,4.12,4.83,3.12,3.09,3.11,4.02,4.06,4.09,4.21,4.34,4.59,4.78,4.51],
            tooltip: {
                valueSuffix: '万'
            }
        }]
    })    
}
 // 图表 五日
function chartFiveDay() {
    var chartone = new Highcharts.Chart({
        chart: {
            renderTo: "chartone"
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime'
        },
        yAxis: [{
            title: null,
            gridLineDashStyle: 'longdash',
            labels: {
                style: {
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }         
        },{
            labels: {
                format: '{value}%',
                style: {
                    color: '#f00',
                    fontSize: "0.5rem"
                    },
                x: 0,
                y: 5
            },
            title: null,
            opposite: true,
            gridLineDashStyle: 'longdash',
        }],
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 0
                },
                lineWidth: 1,
                states: {
                    select: {
                        lineWidth: 0
                    }
                },
                threshold: null
            },
            line: {
                marker: {
                    radius: 0
                }
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        series: [{
            type: 'area',
            yAxis: 0,
            name: '实时数据',
            pointInterval: 4.11 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [10.12,10.23,10.58,10.12,10.23,10.55,11.02,10.09,11.12,11.34,11.56,11.85,12.01,12.12,12.01,11.45,10.87,10.78,10.98,10.54,9.96,9.45,9.37,9.89,10.01,10.21,10.23,11.56,9.84,9.01,9.45,9.45,10.23,10.89,10.56]
        },
        {
            type: 'line',
            yAxis: 1,
            color: '#ffbf7f',
            name: '涨跌',
            pointInterval: 4.11 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [0.21,0.32,0.43,0.54,0.65,0.74,0.85,0.96,1.14,1.38,1.35,1.42,1.23,1.11,1.05,0.98,0.88,0.78,0.65,0.55,0.42,0.23,0.12,0.83,-0.12,-0.09,-0.11,0.12,0.16,0.19,0.21,0.34,0.59,0.78,0.51],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    });
}
function chartsFiveDay() {
   var chartwo = new Highcharts.Chart({
        chart: {
            renderTo: "charttwo",
            type: 'column'
        },
         title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime',
            labels: {
                enabled: false
            }
        },
        yAxis: {
            gridLineDashStyle: 'longdash',
            title: null,
            labels: {
                format: '{value}万',
                style: {
                    color: '#666',
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                // pointPadding: 0.2,
                // borderWidth: 0,
                color: "#c9c9c9"
            }
        },
        series: [{
            name: '收益',           
            pointInterval: 4.11 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [5.21,4.32,4.43,4.54,4.65,4.74,4.85,4.96,5.14,5.38,5.35,5.42,5.23,5.11,5.05,4.98,4.88,4.78,4.65,4.55,4.42,4.23,4.12,4.83,3.12,3.09,3.11,4.02,4.06,4.09,4.21,4.34,4.59,4.78,4.51],
            tooltip: {
                valueSuffix: '万'
            }
        }]
    })    
}

// 图表 日K
function chartDayK() {
    var chartone = new Highcharts.Chart({
        chart: {
            renderTo: "chartone"
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime'
        },
        yAxis: [{
            title: null,
            gridLineDashStyle: 'longdash',
            labels: {
                style: {
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }         
        },{
            labels: {
                format: '{value}%',
                style: {
                    color: '#f00',
                    fontSize: "0.5rem"
                    },
                x: 0,
                y: 5
            },
            title: null,
            opposite: true,
            gridLineDashStyle: 'longdash',
        }],
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 0
                },
                lineWidth: 1,
                states: {
                    select: {
                        lineWidth: 0
                    }
                },
                threshold: null
            },
            line: {
                marker: {
                    radius: 0
                }
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        series: [{
            type: 'area',
            yAxis: 0,
            name: '实时数据',
            pointInterval: 24 *3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [10.12,10.23,10.58,10.12,10.23,10.55,11.02,10.09,11.12,11.34,11.56,11.85,12.01,12.12,12.01,11.45,10.87,10.78,10.98,10.54,9.96,9.45,9.37,9.89,10.01,10.21,10.23,11.56,9.84,9.01,9.45,9.45,10.23,10.89,10.56]
        },
        {
            type: 'line',
            yAxis: 1,
            color: '#ffbf7f',
            name: '涨跌',
            pointInterval:  24 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [0.21,0.32,0.43,0.54,0.65,0.74,0.85,0.96,1.14,1.38,1.35,1.42,1.23,1.11,1.05,0.98,0.88,0.78,0.65,0.55,0.42,0.23,0.12,0.83,-0.12,-0.09,-0.11,0.12,0.16,0.19,0.21,0.34,0.59,0.78,0.51],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    });
}
function chartsDayK() {
   var chartwo = new Highcharts.Chart({
        chart: {
            renderTo: "charttwo",
            type: 'column'
        },
         title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime',
            labels: {
                enabled: false
            }
        },
        yAxis: {
            gridLineDashStyle: 'longdash',
            title: null,
            labels: {
                format: '{value}万',
                style: {
                    color: '#666',
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                // pointPadding: 0.2,
                // borderWidth: 0,
                color: "#c9c9c9"
            }
        },
        series: [{
            name: '收益',           
            pointInterval: 24 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [5.21,4.32,4.43,4.54,4.65,4.74,4.85,4.96,5.14,5.38,5.35,5.42,5.23,5.11,5.05,4.98,4.88,4.78,4.65,4.55,4.42,4.23,4.12,4.83,3.12,3.09,3.11,4.02,4.06,4.09,4.21,4.34,4.59,4.78,4.51],
            tooltip: {
                valueSuffix: '万'
            }
        }]
    })    
} 
// 图表 周K
function chartWeek() {
    var chartone = new Highcharts.Chart({
        chart: {
            renderTo: "chartone"
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime'
        },
        yAxis: [{
            title: null,
            gridLineDashStyle: 'longdash',
            labels: {
                style: {
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }         
        },{
            labels: {
                format: '{value}%',
                style: {
                    color: '#f00',
                    fontSize: "0.5rem"
                    },
                x: 0,
                y: 5
            },
            title: null,
            opposite: true,
            gridLineDashStyle: 'longdash',
        }],
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 0
                },
                lineWidth: 1,
                states: {
                    select: {
                        lineWidth: 0
                    }
                },
                threshold: null
            },
            line: {
                marker: {
                    radius: 0
                }
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        series: [{
            type: 'area',
            yAxis: 0,
            name: '实时数据',
            pointInterval: 4.8 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [10.12,10.23,10.58,10.12,10.23,10.55,11.02,10.09,11.12,11.34,11.56,11.85,12.01,12.12,12.01,11.45,10.87,10.78,10.98,10.54,9.96,9.45,9.37,9.89,10.01,10.21,10.23,11.56,9.84,9.01,9.45,9.45,10.23,10.89,10.56]
        },
        {
            type: 'line',
            yAxis: 1,
            color: '#ffbf7f',
            name: '涨跌',
            pointInterval: 4.8 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [0.21,0.32,0.43,0.54,0.65,0.74,0.85,0.96,1.14,1.38,1.35,1.42,1.23,1.11,1.05,0.98,0.88,0.78,0.65,0.55,0.42,0.23,0.12,0.83,-0.12,-0.09,-0.11,0.12,0.16,0.19,0.21,0.34,0.59,0.78,0.51],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    });
}
function chartsWeek() {
   var chartwo = new Highcharts.Chart({
        chart: {
            renderTo: "charttwo",
            type: 'column'
        },
         title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime',
            labels: {
                enabled: false
            }
        },
        yAxis: {
            gridLineDashStyle: 'longdash',
            title: null,
            labels: {
                format: '{value}万',
                style: {
                    color: '#666',
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                // pointPadding: 0.2,
                // borderWidth: 0,
                color: "#c9c9c9"
            }
        },
        series: [{
            name: '收益',           
            pointInterval: 4.8 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [5.21,4.32,4.43,4.54,4.65,4.74,4.85,4.96,5.14,5.38,5.35,5.42,5.23,5.11,5.05,4.98,4.88,4.78,4.65,4.55,4.42,4.23,4.12,4.83,3.12,3.09,3.11,4.02,4.06,4.09,4.21,4.34,4.59,4.78,4.51],
            tooltip: {
                valueSuffix: '万'
            }
        }]
    })    
}
// 图表 月K
function chartMonthK() {
    var chartone = new Highcharts.Chart({
        chart: {
            renderTo: "chartone"
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime'
        },
        yAxis: [{
            title: null,
            gridLineDashStyle: 'longdash',
            labels: {
                style: {
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }         
        },{
            labels: {
                format: '{value}%',
                style: {
                    color: '#f00',
                    fontSize: "0.5rem"
                    },
                x: 0,
                y: 5
            },
            title: null,
            opposite: true,
            gridLineDashStyle: 'longdash',
        }],
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 0
                },
                lineWidth: 1,
                states: {
                    select: {
                        lineWidth: 0
                    }
                },
                threshold: null
            },
            line: {
                marker: {
                    radius: 0
                }
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        series: [{
            type: 'area',
            yAxis: 0,
            name: '实时数据',
            pointInterval: 20.57 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [10.12,10.23,10.58,10.12,10.23,10.55,11.02,10.09,11.12,11.34,11.56,11.85,12.01,12.12,12.01,11.45,10.87,10.78,10.98,10.54,9.96,9.45,9.37,9.89,10.01,10.21,10.23,11.56,9.84,9.01,9.45,9.45,10.23,10.89,10.56]
        },
        {
            type: 'line',
            yAxis: 1,
            color: '#ffbf7f',
            name: '涨跌',
            pointInterval: 20.57 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8),
            data: [0.21,0.32,0.43,0.54,0.65,0.74,0.85,0.96,1.14,1.38,1.35,1.42,1.23,1.11,1.05,0.98,0.88,0.78,0.65,0.55,0.42,0.23,0.12,0.83,-0.12,-0.09,-0.11,0.12,0.16,0.19,0.21,0.34,0.59,0.78,0.51],
            tooltip: {
                valueSuffix: '%'
            }
        }]
    });
}
function chartsMonthK() {
   var chartwo = new Highcharts.Chart({
        chart: {
            renderTo: "charttwo",
            type: 'column'
        },
         title: {
            text: null
        },
        subtitle: {
            text: null
        },
        credits: {
            enabled: false
        },//去掉版权信息
        xAxis: {
            type: 'datetime',
            labels: {
                enabled: false
            }
        },
        yAxis: {
            gridLineDashStyle: 'longdash',
            title: null,
            labels: {
                format: '{value}万',
                style: {
                    color: '#666',
                    fontSize: "0.5rem"
                },
                x: 0,
                y: 5
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                // pointPadding: 0.2,
                // borderWidth: 0,
                color: "#c9c9c9"
            }
        },
        series: [{
            name: '收益',           
            pointInterval: 20.57 * 3600 * 1000,
            pointStart: Date.UTC(2016, 7, 8, 11,0,0,0),
            data: [5.21,4.32,4.43,4.54,4.65,4.74,4.85,4.96,5.14,5.38,5.35,5.42,5.23,5.11,5.05,4.98,4.88,4.78,4.65,4.55,4.42,4.23,4.12,4.83,3.12,3.09,3.11,4.02,4.06,4.09,4.21,4.34,4.59,4.78,4.51],
            tooltip: {
                valueSuffix: '万'
            }
        }]
    })    
}