$(document).ready(function(){ 
    var prevpage=$(".prev").attr("href"); 
    var nextpage=$(".next").attr("href"); 
    $("body").keydown(function(event){ 
      if(event.keyCode==37 && prevpage!=undefined) location=prevpage; 
      if(event.keyCode==39 && nextpage!=undefined) location=nextpage; 
       
    }); 
 }); 


jQuery(document).ready(function($) {
$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
$("#shang").mouseover(function() {
up()
    }).mouseout(function() {
        clearTimeout(fq)
    }).click(function() {
        $body.animate({
            scrollTop: 0
        },
        400)
    });
    $("#xia").mouseover(function() {
        dn()
    }).mouseout(function() {
        clearTimeout(fq)
    }).click(function() {
        $body.animate({
            scrollTop: $(document).height()
        },
        400)
    });
    $("#comt").click(function() {
        $body.animate({
            scrollTop: $("#respond").offset().top
        },
        400)
    });
});
function up() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() - 3);
    fq = setTimeout(up, 0);
}
function dn() {
    $wd = $(window);
    $wd.scrollTop($wd.scrollTop() + 2);
    fq = setTimeout(dn, 50);
}

function plbq() {
var faceQqHtml,ja_face_hide,ja_face_path,faceQq=["微笑","呲牙","哈哈","可爱","可怜","抠鼻","惊讶","害羞","调皮","闭嘴","鄙视","爱你","流泪","偷笑","亲亲","生病","白眼","右哼哼","左哼哼","嘘","衰","委屈","吐","打哈欠","抱抱","发怒","疑问","拜拜","汗","困","睡觉","难过","快哭了","酷","色","鼓掌","晕","抓狂","糗大了","阴险","坏笑","怒骂","心","伤心","钱","猪头","敲打","大兵","炸弹","太阳","月亮","玫瑰","凋谢","邮件","购物","麦克","啤酒","菜刀","刀","饥饿","面条","米饭","咖啡","蛋糕","香蕉","电话","飞机","汽车","火车坐","火车中","火车右","多云","下雨","OK","NO","耶","赞","弱","来","抱拳","握手","发财","帅","招财猫","双喜","鞭炮","灯笼","气球","伞","钻戒","药","蜡烛","礼物","闹钟","飞吻","爱情"];ja_face_getPath();if(typeof window.jQuery=="undefined"||window.jQuery.fn.jquery<1.7){a=document.createElement("script");a.src="http://gouji.org/api/js/jquery/jquery-1.10.2.min.js";a.onload=a.onreadystatechange=function(){if(!this.readyState||this.readyState=="loaded"||this.readyState=="complete"){ja_face_init()}};document.getElementsByTagName("head")[0].appendChild(a)}else{ja_face_init()}function ja_face_init(){$(document).on("click",".ja_face_box li img",function(){$this=$(this),_key=$this.attr("title");ja_face_insert_face($(".ja_face_text")[0],"["+_key+"/]");ja_face_box_hide()}).on("focus","textarea",function(){ja_face_box_show($(this))}).on("blur","textarea",function(){ja_face_box_hide()});ja_face_replace()}function ja_face_box_show(a){if(ja_face_hide){clearTimeout(ja_face_hide)}if(!faceQqHtml){faceQqHtml=true;$("body:first").append(ja_face_get_html())}_top=a.offset().top,_left=a.offset().left+a.innerWidth();a.addClass("ja_face_text");$(".ja_face_box").css({top:_top,left:_left}).show()}function ja_face_box_hide($this){if(ja_face_hide){clearTimeout(ja_face_hide)}ja_face_hide=setTimeout(function(){$(".ja_face_box").hide();$(".ja_face_text").removeClass("ja_face_text")},100)}function ja_face_get_html(){html_='<sapn class="ja_face_box"><ul>';for(var i=0,l=faceQq.length;i<l;i++){html_+='<li><img title="'+faceQq[i]+'" src="'+ja_face_path+"img/face-qq/"+i+'.gif"/></li>'}html_+="</ul></sapn>";return html_}function ja_face_insert_face(obj,str){if(document.selection){var sel=document.selection.createRange();sel.text=str}else{if(typeof obj.selectionStart==="number"&&typeof obj.selectionEnd==="number"){var startPos=obj.selectionStart,endPos=obj.selectionEnd,cursorPos=startPos,tmpStr=obj.value;obj.value=tmpStr.substring(0,startPos)+str+tmpStr.substring(endPos,tmpStr.length);cursorPos+=str.length;obj.selectionStart=obj.selectionEnd=cursorPos}else{obj.value+=str}}}function ja_face_getPath(){var a=document.getElementsByTagName("script"),len=a.length,b=document.createElement("link");ja_face_path=a[len-1].src.replace(/^(.*)\/.*/,"$1/");b.href=ja_face_path+"style.css";b.rel="stylesheet";b.type="text/css";document.getElementsByTagName("head")[0].appendChild(b)}function ja_face_replace(){var str=document.body.innerHTML;for(var i=0,l=faceQq.length;i<l;i++){str=str.replace(eval("/\\["+faceQq[i]+"\\/\\]/g"),'<img title="'+faceQq[i]+'" src="'+ja_face_path+"img/face-qq/"+i+'.gif"/>')}document.body.innerHTML=str};
}

// 百度分享代码
function bdfx() {
document.writeln("<div class=\"bdsharebuttonbox\">");
document.writeln("<a title=\"分享到QQ空间\" href=\"#\" class=\"bds_qzone\" data-cmd=\"qzone\"></a>");
document.writeln("<a title=\"分享到新浪微博\" href=\"#\" class=\"bds_tsina\" data-cmd=\"tsina\"></a>");
document.writeln("<a title=\"分享到腾讯微博\" href=\"#\" class=\"bds_tqq\" data-cmd=\"tqq\"></a>");
document.writeln("<a title=\"分享到搜狐微博\" href=\"#\" class=\"bds_tsohu\" data-cmd=\"tsohu\"></a>");
document.writeln("<a title=\"分享到网易微博\" href=\"#\" class=\"bds_t163\" data-cmd=\"t163\"></a>");
document.writeln("<a title=\"分享到微信\" href=\"#\" class=\"bds_weixin\" data-cmd=\"weixin\"></a>");
document.writeln("<a title=\"分享到百度空间\" href=\"#\" class=\"bds_hi\" data-cmd=\"hi\"></a>");
document.writeln("<a title=\"分享到人人网\" href=\"#\" class=\"bds_renren\" data-cmd=\"renren\"></a>");
document.writeln("<a title=\"分享到美丽说\" href=\"#\" class=\"bds_meilishuo\" data-cmd=\"meilishuo\"></a>");
document.writeln("<a title=\"分享到天涯社区\" href=\"#\" class=\"bds_ty\" data-cmd=\"ty\"></a>");
document.writeln("<a title=\"分享到腾讯朋友\" href=\"#\" class=\"bds_tqf\" data-cmd=\"tqf\"></a>");
document.writeln("<a href=\"#\" class=\"bds_more\" data-cmd=\"more\"></a>");
document.writeln("</div>");
document.writeln("<script>window._bd_share_config={\"common\":{\"bdSnsKey\":{},\"bdText\":\"\",\"bdMini\":\"2\",\"bdMiniList\":false,\"bdPic\":\"\",\"bdStyle\":\"0\",\"bdSize\":\"24\"},\"share\":{}};with(document)0[(getElementsByTagName(\'head\')[0]||body).appendChild(createElement(\'script\')).src=\'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=\'+~(-new Date()/36e5)];</script>");
}


function bdfx32() {
document.writeln("<div class=\"bdsharebuttonbox\">");
document.writeln("<a title=\"分享到QQ空间\" href=\"#\" class=\"bds_qzone\" data-cmd=\"qzone\"></a>");
document.writeln("<a title=\"分享到新浪微博\" href=\"#\" class=\"bds_tsina\" data-cmd=\"tsina\"></a>");
document.writeln("<a title=\"分享到腾讯微博\" href=\"#\" class=\"bds_tqq\" data-cmd=\"tqq\"></a>");
document.writeln("<a title=\"分享到搜狐微博\" href=\"#\" class=\"bds_tsohu\" data-cmd=\"tsohu\"></a>");
document.writeln("<a title=\"分享到网易微博\" href=\"#\" class=\"bds_t163\" data-cmd=\"t163\"></a>");
document.writeln("<a title=\"分享到微信\" href=\"#\" class=\"bds_weixin\" data-cmd=\"weixin\"></a>");
document.writeln("<a title=\"分享到百度空间\" href=\"#\" class=\"bds_hi\" data-cmd=\"hi\"></a>");
document.writeln("<a title=\"分享到人人网\" href=\"#\" class=\"bds_renren\" data-cmd=\"renren\"></a>");
document.writeln("<a title=\"分享到美丽说\" href=\"#\" class=\"bds_meilishuo\" data-cmd=\"meilishuo\"></a>");
document.writeln("<a title=\"分享到天涯社区\" href=\"#\" class=\"bds_ty\" data-cmd=\"ty\"></a>");
document.writeln("<a title=\"分享到腾讯朋友\" href=\"#\" class=\"bds_tqf\" data-cmd=\"tqf\"></a>");
document.writeln("<a href=\"#\" class=\"bds_more\" data-cmd=\"more\"></a>");
document.writeln("</div>");
document.writeln("<script>window._bd_share_config={\"common\":{\"bdSnsKey\":{},\"bdText\":\"\",\"bdMini\":\"2\",\"bdMiniList\":false,\"bdPic\":\"\",\"bdStyle\":\"0\",\"bdSize\":\"32\"},\"share\":{}};with(document)0[(getElementsByTagName(\'head\')[0]||body).appendChild(createElement(\'script\')).src=\'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=\'+~(-new Date()/36e5)];</script>");
}

function openNav(){
nav = document.getElementById("m-left-nav");
if(nav.style.display == "none"){
nav.style.display = "block";}
else{
nav.style.display = "none";
}}


//时间格式：今天是xx年x月x日
function sjdm1() {
var day=""; 
var month=""; 
var year=""; 
mydate=new Date(); 
mymonth=mydate.getMonth()+1; 
myday= mydate.getDate(); 
myyear= mydate.getYear(); 
year=(myyear > 200) ? myyear : 1900 + myyear; 
document.write(year+"年"+mymonth+"月"+myday+"日")
}

function sjdm2() {
var urodz= new Date("1/31/2014");
var s="<font style=\"font-size:18px;color:#FF0000;font-weight:bold\">春节</font>";
var now = new Date();
var ile = urodz.getTime() - now.getTime();
var dni = Math.floor(ile / (1000 * 60 * 60 * 24))+1;
if (dni > 1)
document.write("还有<font style=\"font-size:18px;color:#FF0000;font-weight:bold\">"+dni +"</font>天"+"就是"+s+"啦！")
else if (dni == 1)
document.write("<font style=\"font-size:18px;color:#FF0000;font-weight:bold\">除夕</font>，明天就是"+s+"啦！")
else if (dni == 0)
document.write("农历正月初一("+s+")")
else
document.write("")
}


//网址导航
function daohang(){
document.writeln("<script charset=\"utf-8\" src=\"http://daohang.shuyong.net/daohang.js\" type=\"text/javascript\"></script>");
}

//时间格式：今天是xx年x月x日
function sjdm1() {
var day=""; 
var month=""; 
var year=""; 
mydate=new Date(); 
mymonth=mydate.getMonth()+1; 
myday= mydate.getDate(); 
myyear= mydate.getYear(); 
year=(myyear > 200) ? myyear : 1900 + myyear; 
document.write(year+"年"+mymonth+"月"+myday+"日")
}

//时间格式：今天是xx年x月x日
function sjdm2() {
var tags_before_clock = ""
var tags_after_clock = ""
if(navigator.appName == "Netscape") {
document.write('<layer id="clock"></layer>');
}
if (navigator.appVersion.indexOf("MSIE") != -1){
document.write('<span id="clock"></span>');
}
function showclock()
{ 
var date = new Date();
var hour = date.getHours();
var min = date.getMinutes(); 
var sec = date.getSeconds();
var col = ":";
var spc = " ";
var apm; 
if ( hour >12 ) 
{ 
apm="P.M.";
hour=hour-12;
}
else 
{
apm="A.M.";
}
if (hour == 0) hour=12;
if (min<=9) min="0"+min;
if (sec<=9) sec="0"+sec;
if(navigator.appName == "Netscape") 
{
document.clock.document.write(tags_before_clock
+hour+col+min+col+sec+spc+tags_after_clock);
document.clock.document.close();
}
if (navigator.appVersion.indexOf("MSIE") != -1)
{
clock.innerHTML = tags_before_clock+hour
+col+min+col+sec;
}
} 
setInterval("showclock()",1000);
}

function sjdm1() {
<!--
var lunarInfo=new Array(
0x04bd8,0x04ae0,0x0a570,0x054d5,0x0d260,0x0d950,0x16554,0x056a0,0x09ad0,0x055d2,
0x04ae0,0x0a5b6,0x0a4d0,0x0d250,0x1d255,0x0b540,0x0d6a0,0x0ada2,0x095b0,0x14977,
0x04970,0x0a4b0,0x0b4b5,0x06a50,0x06d40,0x1ab54,0x02b60,0x09570,0x052f2,0x04970,
0x06566,0x0d4a0,0x0ea50,0x06e95,0x05ad0,0x02b60,0x186e3,0x092e0,0x1c8d7,0x0c950,
0x0d4a0,0x1d8a6,0x0b550,0x056a0,0x1a5b4,0x025d0,0x092d0,0x0d2b2,0x0a950,0x0b557,
0x06ca0,0x0b550,0x15355,0x04da0,0x0a5d0,0x14573,0x052d0,0x0a9a8,0x0e950,0x06aa0,
0x0aea6,0x0ab50,0x04b60,0x0aae4,0x0a570,0x05260,0x0f263,0x0d950,0x05b57,0x056a0,
0x096d0,0x04dd5,0x04ad0,0x0a4d0,0x0d4d4,0x0d250,0x0d558,0x0b540,0x0b5a0,0x195a6,

0x095b0,0x049b0,0x0a974,0x0a4b0,0x0b27a,0x06a50,0x06d40,0x0af46,0x0ab60,0x09570,
0x04af5,0x04970,0x064b0,0x074a3,0x0ea50,0x06b58,0x055c0,0x0ab60,0x096d5,0x092e0,
0x0c960,0x0d954,0x0d4a0,0x0da50,0x07552,0x056a0,0x0abb7,0x025d0,0x092d0,0x0cab5,
0x0a950,0x0b4a0,0x0baa4,0x0ad50,0x055d9,0x04ba0,0x0a5b0,0x15176,0x052b0,0x0a930,
0x07954,0x06aa0,0x0ad50,0x05b52,0x04b60,0x0a6e6,0x0a4e0,0x0d260,0x0ea65,0x0d530,
0x05aa0,0x076a3,0x096d0,0x04bd7,0x04ad0,0x0a4d0,0x1d0b6,0x0d250,0x0d520,0x0dd45,
0x0b5a0,0x056d0,0x055b2,0x049b0,0x0a577,0x0a4b0,0x0aa50,0x1b255,0x06d20,0x0ada0)
var Animals=new Array("鼠","牛","虎","兔","龙","蛇","马","羊","猴","鸡","狗","金猪");
var Gan=new Array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
var Zhi=new Array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
var now = new Date();
var SY = now.getFullYear(); 
var SM = now.getMonth();
var SD = now.getDate();
 
//==== 传入 offset 传回干支, 0=甲子
function cyclical(num) { return(Gan[num%10]+Zhi[num%12])}

//==== 传回农历 y年的总天数
function lYearDays(y) {
   var i, sum = 348
   for(i=0x8000; i>0x8; i>>=1) sum += (lunarInfo[y-1900] & i)? 1: 0
   return(sum+leapDays(y))
}

//==== 传回农历 y年闰月的天数
function leapDays(y) {
   if(leapMonth(y))  return((lunarInfo[y-1900] & 0x10000)? 30: 29)
   else return(0)
}

//==== 传回农历 y年闰哪个月 1-12 , 没闰传回 0
function leapMonth(y) { return(lunarInfo[y-1900] & 0xf)}

//====================================== 传回农历 y年m月的总天数
function monthDays(y,m) { return( (lunarInfo[y-1900] & (0x10000>>m))? 30: 29 )}

//==== 算出农历, 传入日期物件, 传回农历日期物件
//     该物件属性有 .year .month .day .isLeap .yearCyl .dayCyl .monCyl
function Lunar(objDate) {
   var i, leap=0, temp=0
   var baseDate = new Date(1900,0,31)
   var offset   = (objDate - baseDate)/86400000

   this.dayCyl = offset + 40
   this.monCyl = 14

   for(i=1900; i<2050 && offset>0; i++) {
      temp = lYearDays(i)
      offset -= temp
      this.monCyl += 12
   }
   if(offset<0) {
      offset += temp;
      i--;
      this.monCyl -= 12
   }

   this.year = i
   this.yearCyl = i-1864

   leap = leapMonth(i) //闰哪个月
   this.isLeap = false

   for(i=1; i<13 && offset>0; i++) {
      //闰月
      if(leap>0 && i==(leap+1) && this.isLeap==false)
         { --i; this.isLeap = true; temp = leapDays(this.year); }
      else
         { temp = monthDays(this.year, i); }

      //解除闰月
      if(this.isLeap==true && i==(leap+1)) this.isLeap = false

      offset -= temp
      if(this.isLeap == false) this.monCyl ++
   }

   if(offset==0 && leap>0 && i==leap+1)
      if(this.isLeap)
         { this.isLeap = false; }
      else
         { this.isLeap = true; --i; --this.monCyl;}

   if(offset<0){ offset += temp; --i; --this.monCyl; }

   this.month = i
   this.day = offset + 1
}

 function YYMMDD(){ 
    var cl = '<font color="" style="font-size:9pt;">'; 
    if (now.getDay() == 0) cl = '<font color="" style="font-size:9pt;">'; 
    if (now.getDay() == 6) cl = '<font color="" style="font-size:9pt;">';
    return(cl+SY+'年'+(SM+1)+'月'+SD+'日</font>'); 
 }
 function weekday(){ 
    var day = new Array("<font color='red'>星期日</font>","星期一","星期二","星期三","星期四","星期五","星期六");
    if (now.getDay() == 0) cl = '<font color="" style="font-size:9pt;">';
    if (now.getDay() == 6) cl = '<font color="" style="font-size:9pt;"">'; 
    return(day[now.getDay()]); 
 }
//==== 中文日期
function cDay(m,d){
 var nStr1 = new Array('日','一','二','三','四','五','六','七','八','九','十');
 var nStr2 = new Array('初','十','廿','卅','　');
 var s;
 if (m>10){s = '十'+nStr1[m-10]} else {s = nStr1[m]} s += '月'
 switch (d) {
  case 10:s += '初十'; break;
  case 20:s += '二十'; break;
  case 30:s += '三十'; break;
  default:s += nStr2[Math.floor(d/10)]; s += nStr1[d%10];
 }
 return(s);
}
 function solarDay1(){
    var sDObj = new Date(SY,SM,SD);
    var lDObj = new Lunar(sDObj);
    var tt = '【'+Animals[(SY-4)%12]+'】'+cyclical(lDObj.monCyl)+'月 '+cyclical(lDObj.dayCyl++)+'日' ;
    return(tt);
 }
 function solarDay2(){
    var sDObj = new Date(SY,SM,SD);
    var lDObj = new Lunar(sDObj);
    var cl = '<font color="" style="font-size:9pt;">'; 
    //农历BB'+(cld[d].isLeap?'闰 ':' ')+cld[d].lMonth+' 月 '+cld[d].lDay+' 日
    var tt = cyclical(SY-1900+36)+'年 '+cDay(lDObj.month,lDObj.day);
    return(cl+tt+'</font>');
 }document.write("");
 function solarDay3(){
var sTermInfo = new Array(0,21208,42467,63836,85337,107014,128867,150921,173149,195551,218072,240693,263343,285989,308563,331033,353350,375494,397447,419210,440795,462224,483532,504758)
var solarTerm = new Array("小寒","大寒","立春","雨水","惊蛰","春分","清明","谷雨","立夏","小满","芒种","夏至","小暑","大暑","立秋","处暑","白露","秋分","寒露","霜降","立冬","小雪","大雪","冬至")
var lFtv = new Array("0101*春节","0115 元宵节","0505 端午节","0707 七夕情人节","0715 中元节","0815 中秋节","0909 重阳节","1208 腊八节","1224 小年","0100*除夕")
var sFtv = new Array("0101*元旦","0214 情人节","0308 妇女节","0312 植树节","0315 消费者权益日",
"0401 愚人节","0501 劳动节","0504 青年节","0512 护士节","0601 儿童节","0628 老Y发布纪念日","0701 建党节 香港回归纪念",
"0801 建军节","0808 父亲节","0909 毛泽东逝世纪念","0910 教师节","0928 小侄女生日","1001*国庆节",
"1006 老人节","1001 国庆节","1024 联合国日","1112 孙中山诞辰","1220 澳门回归纪念","1225 圣诞节","1226 毛泽东诞辰")

  var sDObj = new Date(SY,SM,SD);
  var lDObj = new Lunar(sDObj);
  var lDPOS = new Array(3)
  var festival='',solarTerms='',solarFestival='',lunarFestival='',tmp1,tmp2;
  //农历节日 
  for(i in lFtv)
  if(lFtv[i].match(/^(\d{2})(.{2})([\s\*])(.+)$/)) {
   tmp1=Number(RegExp.$1)-lDObj.month
   tmp2=Number(RegExp.$2)-lDObj.day
   if(tmp1==0 && tmp2==0) lunarFestival=RegExp.$4 
  }
  //国历节日
  for(i in sFtv)
  if(sFtv[i].match(/^(\d{2})(\d{2})([\s\*])(.+)$/)){
   tmp1=Number(RegExp.$1)-(SM+1)
   tmp2=Number(RegExp.$2)-SD
   if(tmp1==0 && tmp2==0) solarFestival = RegExp.$4 
  }
  //节气
  tmp1 = new Date((31556925974.7*(SY-1900)+sTermInfo[SM*2+1]*60000)+Date.UTC(1900,0,6,2,5))
  tmp2 = tmp1.getUTCDate()
  if (tmp2==SD) solarTerms = solarTerm[SM*2+1]  
  tmp1 = new Date((31556925974.7*(SY-1900)+sTermInfo[SM*2]*60000)+Date.UTC(1900,0,6,2,5))
  tmp2= tmp1.getUTCDate()
  if (tmp2==SD) solarTerms = solarTerm[SM*2] 

  if(solarTerms == '' && solarFestival == '' && lunarFestival == '')
    festival = '';
  else
    festival = '<font color="#FF0000" style="font-size:9pt;">'+solarTerms + ' ' + solarFestival + ' ' + lunarFestival+'</font>';
  var cl = '<font color="" style="font-size:9pt;">';
  return(cl+festival+'</font>');
 }
 function setCalendar(){
    document.write(YYMMDD()+'&nbsp;'+weekday() + "&nbsp;");
    //document.write(" <span style=\"font-size:9pt;color:\">农历：</span>" );
    document.write(" " + solarDay2());
    document.write(" " + solarDay3());
    document.write(" " + solarDay1());
 }
 setCalendar();
//-->
}

function img_ad() {
document.writeln("<a href=\"http://www.hkywg.cn/?post=1\" target=\"_blank\" title=\"赞助商广告\" ><img src=\"http://www.hkywg.cn/content/uploadfile/201408/cce58f5ab76d57423638f061ff6818fd20140806061050.gif\" alt=\"瑶族药浴\" /></a>");
}

function ffz() {
function addCopyright() {
    var Original = "本文来源：" + location.href; //修改你的网站名称
    if ("function" == typeof window.getSelection) {
        var c = window.getSelection();
        if ("Microsoft Internet Explorer" == navigator.appName && navigator.appVersion.match(/MSIE ([\d.]+)/)[1] >= 10 || "Opera" == navigator.appName) {
            var g = c.getRangeAt(0),
            h = document.createElement("span");
            h.appendChild(g.cloneContents()),
            g.insertNode(h);
            var i = h.innerHTML.replace(/(?:\n|\r\n|\r)/gi, "").replace(/<\s*script[^>]*>[\s\S]*?<\/script>/gim, "").replace(/<\s*style[^>]*>[\s\S]*?<\/style>/gim, "").replace(/<!--.*?-->/gim, "").replace(/<!DOCTYPE.*?>/gi, "");
            try {
                document.getElementsByTagName("body")[0].removeChild(h)
            } catch(f) {
                h.style.display = "none",
                h.innerHTML = ""
            }
        } else var d = "" + c;
        var e = document.getElementsByTagName("body")[0],
        f = document.createElement("div");
        f.style.position = "absolute",
        f.style.left = "-99999px",
        e.appendChild(f),
        f.innerHTML = d.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "$1<br />$2") + "<br />" + Original,
        c.selectAllChildren(f),
        setTimeout(function() {
            e.removeChild(f)
        },
        0)
    } else if ("object" == typeof document.selection.createRange) {
        event.returnValue = !1;
        var c = document.selection.createRange().text;
        window.clipboardData.setData("Text", c + "\n" + Original)
    }
};
document.body.oncopy = addCopyright;
}

